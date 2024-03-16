<?php

namespace pagopa\crawler\paymentlist\resp;

use pagopa\crawler\paymentlist\AbstractPaymentList;
use pagopa\database\sherlock\Transaction;
use pagopa\database\sherlock\TransactionDetails;
use pagopa\database\sherlock\TransactionRe;
use Datetime;
use pagopa\crawler\CacheInterface;
use pagopa\database\sherlock\Workflow;
use Illuminate\Database\Capsule\Manager as DB;

class activatePaymentNotice extends AbstractPaymentList
{

    /**
     * @inheritDoc
     */
    public function createEventInstance(array $eventData): void
    {
        $event = new \pagopa\crawler\events\resp\activatePaymentNotice($eventData);
        $this->setEvent($event);
    }

    /**
     * @inheritDoc
     */
    public function isValidPayment(int $index = 0): bool
    {
        return ($this->getEvent()->getIuv($index) && $this->getEvent()->getPaEmittente($index));
    }

    /**
     * @inheritDoc
     */
    public function isAttempt(int $index = 0): bool
    {
        return ($this->getEvent()->getIuv($index) && $this->getEvent()->getPaEmittente($index) && $this->getEvent()->getPaymentToken($index));
    }

    /**
     * @inheritDoc
     */
    public function isAttemptInCache(int $index = 0): bool
    {
        $date       = $this->getEvent()->getInsertedTimestamp()->format('Ymd');
        $iuv        = $this->getEvent()->getIuv($index);
        $pa         = $this->getEvent()->getPaEmittente($index);
        $token      = $this->getEvent()->getPaymentToken($index);
        $key        = base64_encode(sprintf('attempt_%s_%s_%s_%s', $date, $iuv, $pa, $token));
        return $this->hasInCache($key);
    }

    /**
     * @inheritDoc
     */
    public function isPaymentInCache(int $index = 0): bool
    {
        $date       = $this->getEvent()->getInsertedTimestamp()->format('Ymd');
        $iuv        = $this->getEvent()->getIuv($index);
        $pa         = $this->getEvent()->getPaEmittente($index);
        $key        = base64_encode(sprintf('payment_%s_%s_%s', $date, $iuv, $pa));
        return $this->hasInCache($key);
    }

    /**
     * @inheritDoc
     */
    public function isFoundOnDb(int $index = 0): bool
    {
        if ($this->search_on_db === false)
        {
            return false;
        }
        $notice_id  =   $this->getEvent()->getNoticeNumber($index);
        $pa         =   $this->getEvent()->getPaEmittente($index);
        return !is_null(Transaction::searchByNoticeId($notice_id, $pa));
    }

    /**
     * @inheritDoc
     */
    public function runCreatePayment(int $index = 0): array
    {
        $iuv            =   $this->getEvent()->getIuv($index);
        $pa_emittente   =   $this->getEvent()->getPaEmittente($index);
        $date_event     =   $this->getEvent()->getInsertedTimestamp()->format('Y-m-d');
        $date_x_cache   =   $this->getEvent()->getInsertedTimestamp()->format('Ymd');

        $transaction    = $this->getEvent()->transaction($index);
        $transaction->removeReadyColumn('id_psp');
        $transaction->removeReadyColumn('stazione');
        $transaction->removeReadyColumn('canale');

        $transaction->insert();
        DB::statement($transaction->getQuery(), $transaction->getBindParams());
        $last_inserted_id = DB::connection()->getPdo()->lastInsertId();



        $cache_key      =   base64_encode(sprintf('payment_%s_%s_%s', $date_x_cache, $iuv, $pa_emittente));
        $cache_value    =   [
            'date_event'    =>  $date_event,
            'id'            =>  $last_inserted_id,
            'iuv'           =>  $iuv,
            'pa_emittente'  =>  $pa_emittente,
            'transfer_added'    =>  false,
            'amount_update'     =>  false
        ];
        $this->addValueCache($cache_key, $cache_value);

        $workflow = $this->getEvent()->workflowEvent($index);
        $workflow->setFkTipoEvento(2);
        $workflow->insert();
        DB::statement($workflow->getQuery(), $workflow->getBindParams());

        return $cache_value;

    }

    /**
     * @inheritDoc
     */
    public function runCreateAttempt(int $index = 0): array
    {
        $iuv            =   $this->getEvent()->getIuv($index);
        $pa_emittente   =   $this->getEvent()->getPaEmittente($index);
        $token          =   $this->getEvent()->getPaymentToken($index);
        $date_event     =   $this->getEvent()->getInsertedTimestamp()->format('Y-m-d');
        $date_x_cache   =   $this->getEvent()->getInsertedTimestamp()->format('Ymd');

        $transaction = $this->getEvent()->transaction($index);
        $transaction->setTokenCcp($token);
        $transaction->insert();
        DB::statement($transaction->getQuery(), $transaction->getBindParams());
        $last_inserted_id = DB::connection()->getPdo()->lastInsertId();

        for($i=0;$i<$this->getEvent()->getTransferCount($index);$i++)
        {
            $transaction_details = new TransactionDetails($this->getEvent()->getInsertedTimestamp());
            $transaction_details->setFkPayment($last_inserted_id);
            $transaction_details->setNewColumnValue('date_event', $date_event);
            $transaction_details->setPaTransfer($this->getEvent()->getMethodInterface()->getTransferPa($i, 0));
            $transaction_details->setAmountTransfer($this->getEvent()->getMethodInterface()->getTransferAmount($i, 0));
            $transaction_details->setTransferIban($this->getEvent()->getMethodInterface()->getTransferIban($i, 0));
            $transaction_details->setIdTransfer($this->getEvent()->getMethodInterface()->getTransferId($i, 0));
            $transaction_details->insert();
            DB::statement($transaction_details->getQuery(), $transaction_details->getBindParams());
        }




        $cache_key      =   base64_encode(sprintf('attempt_%s_%s_%s_%s', $date_x_cache, $iuv, $pa_emittente, $token));
        $cache_value    =   [
            'date_event'    =>  $date_event,
            'id'            =>  $last_inserted_id,
            'iuv'           =>  $iuv,
            'pa_emittente'  =>  $pa_emittente,
            'token_ccp'     =>  $token,
            'transfer_add'  =>  true,
            'amount_update' =>  true
        ];
        $this->addValueCache($cache_key, $cache_value);

        $workflow = $this->getEvent()->workflowEvent($index);
        $workflow->setFkPayment($last_inserted_id);
        $workflow->insert();
        DB::statement($workflow->getQuery(), $workflow->getBindParams());

        return $cache_value;

    }

    /**
     * @inheritDoc
     */
    public function runPaymentAlreadyEvaluated(int $index = 0): void
    {
        $iuv            =   $this->getEvent()->getIuv($index);
        $pa_emittente   =   $this->getEvent()->getPaEmittente($index);
        $date_event     =   $this->getEvent()->getInsertedTimestamp()->format('Y-m-d');

        $cache_key      =   base64_encode(sprintf('payment_%s_%s_%s', $date_event, $iuv, $pa_emittente));

        $cached_attempts = $this->getFromCache($cache_key);

        if (!is_array($cached_attempts))
        {
            $cached_attempts = []; // fix per la get dalla cache
        }

        foreach($cached_attempts as $key => $attempt)
        {
            $id = $attempt['id'];
            $date = $attempt['date_event'];
            $transfer_added = $attempt['transfer_added'];
            $amount_import = $attempt['amount_update'];

            if (!$this->getEvent()->getMethodInterface()->isFaultEvent())
            {
                if ($amount_import === false)
                {
                    // se non è un faultCode, e non ho aggiornato l'importo, lo faccio
                    $transaction = new Transaction($this->getEvent()->getInsertedTimestamp(), $attempt);
                    $transaction->setNewColumnValue('importo', $this->getEvent()->getMethodInterface()->getImportoTotale());
                    $transaction->update();
                    DB::statement($transaction->getQuery(), $transaction->getBindParams());
                    $attempt['amount_update'] = true;
                }

                if ($transfer_added === false)
                {
                    for($i=0;$i<$this->getEvent()->getTransferCount($index);$i++)
                    {
                        $transaction_details = new TransactionDetails($this->getEvent()->getInsertedTimestamp());
                        $transaction_details->setFkPayment($id);
                        $transaction_details->setNewColumnValue('date_event', $date_event);
                        $transaction_details->setPaTransfer($this->getEvent()->getMethodInterface()->getTransferPa($i, 0));
                        $transaction_details->setAmountTransfer($this->getEvent()->getMethodInterface()->getTransferAmount($i, 0));
                        $transaction_details->setTransferIban($this->getEvent()->getMethodInterface()->getTransferIban($i, 0));
                        $transaction_details->setIdTransfer($this->getEvent()->getMethodInterface()->getTransferId($i, 0));
                        $transaction_details->insert();
                        DB::statement($transaction_details->getQuery(), $transaction_details->getBindParams());
                        $attempt['transfer_added'] = true;
                    }
                }
            }

            $cached_attempts[$key] = $attempt; // aggiorno la cache con le nuove info (se aggiornate) di aggiunta transfer e aggiornamento importo


            $workflow = $this->getEvent()->workflowEvent($index);
            $workflow->setFkPayment($id);
            $workflow->insert();
            DB::statement($workflow->getQuery(), $workflow->getBindParams());
        }

        if (count($cached_attempts) > 0)
        {
            // se ho valori in cache , la aggiorno
            $this->delFromCache($cache_key);
            foreach($cached_attempts as $v)
            {
                $this->addValueCache($cache_key, $v);
            }
        }
    }

    /**
     * @inheritDoc
     */
    public function runAttemptAlreadyEvaluated(int $index = 0): void
    {
        $iuv            =   $this->getEvent()->getIuv($index);
        $pa_emittente   =   $this->getEvent()->getPaEmittente($index);
        $token          =   $this->getEvent()->getPaymentToken($index);
        $date_event     =   $this->getEvent()->getInsertedTimestamp()->format('Ymd');

        $cache_key      =   base64_encode(sprintf('attempt_%s_%s_%s_%s', $date_event, $iuv, $pa_emittente, $token));

        $cached_attempts = $this->getFromCache($cache_key);

        if (!is_array($cached_attempts))
        {
            $cached_attempts = [];
        }

        foreach($cached_attempts as $key => $attempt)
        {
            // scorrro tutta la cache per questa transazione
            $id = $attempt['id'];
            $date = $attempt['date_event'];
            $transfer_added = (array_key_exists('transfer_added', $attempt)) ? $attempt['transfer_added'] : 'block';
            $amount_import  = (array_key_exists('amount_update', $attempt)) ? $attempt['amount_update']  : 'block';


            if (!$this->getEvent()->getMethodInterface()->isFaultEvent())
            {
                if ($amount_import === false)
                {
                    // se non è un faultCode, e non ho aggiornato l'importo, lo faccio
                    $transaction = new Transaction($this->getEvent()->getInsertedTimestamp(), $attempt);
                    $transaction->setNewColumnValue('importo', $this->getEvent()->getMethodInterface()->getImportoTotale());
                    $transaction->update();
                    DB::statement($transaction->getQuery(), $transaction->getBindParams());
                    $attempt['amount_update'] = true;
                }

                if ($transfer_added === false)
                {
                    for($i=0;$i<$this->getEvent()->getTransferCount($index);$i++)
                    {
                        $transaction_details = new TransactionDetails($this->getEvent()->getInsertedTimestamp());
                        $transaction_details->setFkPayment($id);
                        $transaction_details->setNewColumnValue('date_event', $date_event);
                        $transaction_details->setPaTransfer($this->getEvent()->getMethodInterface()->getTransferPa($i, 0));
                        $transaction_details->setAmountTransfer($this->getEvent()->getMethodInterface()->getTransferAmount($i, 0));
                        $transaction_details->setTransferIban($this->getEvent()->getMethodInterface()->getTransferIban($i, 0));
                        $transaction_details->setIdTransfer($this->getEvent()->getMethodInterface()->getTransferId($i, 0));
                        $transaction_details->insert();
                        DB::statement($transaction_details->getQuery(), $transaction_details->getBindParams());
                        $attempt['transfer_added'] = true;
                    }
                }
            }

            $cached_attempts[$key] = $attempt; // aggiorno la cache con le nuove info (se aggiornate) di aggiunta transfer e aggiornamento importo

            $workflow = $this->getEvent()->workflowEvent($index);
            $workflow->setFkPayment($id);
            $workflow->setFkTipoEvento(2);
            $workflow->insert();
            DB::statement($workflow->getQuery(), $workflow->getBindParams());

        }

        if (count($cached_attempts) > 0)
        {
            // se ho valori in cache , la aggiorno
            $this->delFromCache($cache_key);
            foreach($cached_attempts as $v)
            {
                $this->addValueCache($cache_key, $v);
            }
        }

    }

    /**
     * @inheritDoc
     */
    public function runCopyPaymentToday(int $index = 0): void
    {
        // TODO: Implement runCopyPaymentToday() method.
    }

    /**
     * @inheritDoc
     */
    public function runRejectedEvent(string $message = null): TransactionRe
    {
        return $this->getEvent()->getEventRowInstance()->reject($message)->update();
    }

    /**
     * @inheritDoc
     */
    public function runCompleteEvent(string $message = null): TransactionRe
    {
        return $this->getEvent()->getEventRowInstance()->loaded($message)->update();
    }
}
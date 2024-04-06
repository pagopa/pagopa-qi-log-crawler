<?php

namespace pagopa\crawler\paymentlist\req;

use pagopa\crawler\paymentlist\AbstractPaymentList;
use pagopa\database\sherlock\TransactionRe;
use pagopa\database\sherlock\Transaction;
use pagopa\database\sherlock\Workflow;
use Illuminate\Database\Capsule\Manager as DB;

class nodoInviaCarrelloRPT extends AbstractPaymentList
{

    protected bool $isCreateTransactionEvent = true;

    /**
     * @inheritDoc
     */
    public function createEventInstance(array $eventData): void
    {
        $event = new \pagopa\crawler\events\req\nodoInviaCarrelloRPT($eventData);
        $this->setEvent($event);
    }

    /**
     * @inheritDoc
     */
    public function isValidPayment(int $index = 0): bool
    {
        return !is_null($this->getEvent()->getSessionIdOriginal());
        //return ($this->getEvent()->getIuv($index) && $this->getEvent()->getPaEmittente($index));
    }

    /**
     * @inheritDoc
     */
    public function isAttempt(int $index = 0): bool
    {
        return !is_null($this->getEvent()->getSessionIdOriginal());
        //return ($this->getEvent()->getIuv($index) && $this->getEvent()->getPaEmittente($index) && $this->getEvent()->getCcp($index));
    }

    /**
     * @inheritDoc
     */
    public function isAttemptInCache(int $index = 0): bool
    {
        $date = $this->getEvent()->getInsertedTimestamp()->format('Ymd');
        $iuv = $this->getEvent()->getIuv($index);
        $pa = $this->getEvent()->getPaEmittente($index);
        $ccp = $this->getEvent()->getCcp($index);
        $id_carrello = $this->getEvent()->getIdCarrello();
        $session = $this->getEvent()->getSessionIdOriginal();
        $key = base64_encode(sprintf('sessionOriginal_%s', $session));
        return $this->hasInCache($key);
    }

    /**
     * @inheritDoc
     */
    public function isPaymentInCache(int $index = 0): bool
    {
        $date = $this->getEvent()->getInsertedTimestamp()->format('Ymd');
        $iuv = $this->getEvent()->getIuv($index);
        $pa = $this->getEvent()->getPaEmittente($index);
        $session = $this->getEvent()->getSessionIdOriginal();
        $key = base64_encode(sprintf('sessionOriginal_%s', $session));
        return $this->hasInCache($key);
    }

    /**
     * @inheritDoc
     */
    public function isFoundOnDb(int $index = 0): bool
    {
        if ($this->search_on_db === false) {
            return false;
        }
        $iuv = $this->getEvent()->getIuv($index);
        $pa = $this->getEvent()->getPaEmittente($index);
        return !is_null(Transaction::searchByPayment($iuv, $pa));
    }

    /**
     * @inheritDoc
     */
    public function runAttemptAlreadyEvaluated(int $index = 0): void
    {

        $cache_key = $this->getEvent()->getCacheKeyAttempt();
        $cached_data = $this->getFromCache($cache_key);

        if (is_array($cached_data))
        {
            foreach($cached_data as $ck => $cached_attempt)
            {
                $id = $cached_attempt['id'];
                $date = $cached_attempt['date_event'];

                $workflow = $this->getEvent()->workflowEvent();
                $workflow->setFkPayment($id);
                $workflow->insert();
                DB::statement($workflow->getQuery(), $workflow->getBindParams());
            }
        }
    }

    /**
     * @inheritDoc
     */
    public function runCreateAttempt(int $index = 0): array
    {
        $date_event = $this->getEvent()->getInsertedTimestamp()->format('Y-m-d');
        $date_x_cache = $this->getEvent()->getInsertedTimestamp()->format('Ymd');
        $id_carrello = $this->getEvent()->getIdCarrello();

        $session_key = $this->getEvent()->getCacheKeyAttempt();

        for($x=0;$x<$this->getEvent()->getPaymentsCount();$x++)
        {
            $ccp = $this->getEvent()->getCcp($x);
            $transaction = $this->getEvent()->transaction($x);
            $transaction->setTokenCcp($ccp);
            $transaction->insert();
            DB::statement($transaction->getQuery(), $transaction->getBindParams());
            $last_inserted_id = DB::connection()->getPdo()->lastInsertId();

            $iuv = $this->getEvent()->getIuv($x);
            $pa_emittente = $this->getEvent()->getPaEmittente($x);
            $ccp = $this->getEvent()->getCcp($x);
            $cache_key = base64_encode(sprintf('attempt_%s_%s_%s_%s_%s', $date_x_cache, $id_carrello, $iuv, $pa_emittente, $ccp));
            $transfer_add = array();
            $cache_value = [
                'date_event' => $date_event,
                'id' => $last_inserted_id,
                'iuv' => $iuv,
                'pa_emittente' => $pa_emittente,
                'token_ccp' => $ccp,
                'id_carrello' => $id_carrello,
                'transfer_add' => true,
                'esito' => false,
                'amount_update' => true
            ];
            for ($i = 0; $i < $this->getEvent()->getTransferCount($x); $i++) {
                $details = $this->getEvent()->transactionDetails($i, $x);
                $details->setFkPayment($last_inserted_id);
                $details->insert();
                DB::statement($details->getQuery(), $details->getBindParams());
                $last_inserted_id_transfer = DB::connection()->getPdo()->lastInsertId();

                if ($this->getEvent()->getMethodInterface()->isBollo($i, $x)) {
                    $transfer_add = [
                        'pa_transfer' => $this->getEvent()->getMethodInterface()->getTransferPa($i, $x),
                        'bollo' => true,
                        'amount_transfer' => $this->getEvent()->getMethodInterface()->getTransferAmount($i, $x),
                        'iban_transfer' => ''
                    ];
                } else {
                    $transfer_add = [
                        'pa_transfer' => $this->getEvent()->getMethodInterface()->getTransferPa($i, $x),
                        'bollo' => false,
                        'amount_transfer' => $this->getEvent()->getMethodInterface()->getTransferAmount($i, $x),
                        'iban_transfer' => $this->getEvent()->getMethodInterface()->getTransferIban($i, $x)
                    ];
                }
                $transfer_add['id'] = $last_inserted_id_transfer;
                $transfer_add['date_event'] = $this->getEvent()->getInsertedTimestamp()->format('Y-m-d');
                $cache_value['transfer_list'][] = $transfer_add;
            }
            $this->addValueCache($cache_key, $cache_value);
            $this->addValueCache($session_key, $cache_value);

            $workflow = $this->getEvent()->workflowEvent($x);
            $workflow->setFkPayment($last_inserted_id);
            $workflow->insert();
            DB::statement($workflow->getQuery(), $workflow->getBindParams());
        }

        return $cache_value;

    }

    /**
     * @inheritDoc
     */
    public function runPaymentAlreadyEvaluated(int $index = 0): void
    {
        $this->runAttemptAlreadyEvaluated();
    }

    /**
     * @inheritDoc
     */
    public function runCreatePayment(int $index = 0): array
    {
        return $this->runCreateAttempt();
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

    public function runAnalysisSingleEventaa() : void
    {
        try {
            // aggiustare l'update dell'evento , capire se mettere il ciclo dentro o fuori la validazione
            $date_event = $this->getEvent()->getInsertedTimestamp()->format('Y-m-d');
            if ($this->isValidPayment())
            {
                // se è ALMENO un pagamento
                if ($this->isAttempt())
                {
                    // se è un tentativo
                    if ($this->isAttemptInCache())
                    {
                        //se il tentativo è in cache, a parità di medesimo evento
                        $this->runAttemptAlreadyEvaluated();
                    }
                    else
                    {
                        // creo il tentativo
                        $this->runCreateAttempt();
                    }
                }
                else
                {
                    if ($this->isPaymentInCache())
                    {
                        $this->runPaymentAlreadyEvaluated();
                    }
                    else
                    {
                        $this->runCreatePayment();
                    }
                }
                $rowid = $this->getEvent()->getEventRowInstance()->loaded()->update();
                DB::statement($rowid->getQuery(), $rowid->getBindParams());
            }
            else
            {
                $rowid = $this->getEvent()->getEventRowInstance()->reject('Evento non valido')->update();
                DB::statement($rowid->getQuery(), $rowid->getBindParams());
            }
        }
        catch (\Exception $e)
        {
            $rowid = $this->getEvent()->getEventRowInstance()->reject(substr($e->getMessage(), 0, 190))->update();
            DB::statement($rowid->getQuery(), $rowid->getBindParams());
        }
    }
}
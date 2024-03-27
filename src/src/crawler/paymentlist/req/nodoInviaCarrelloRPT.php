<?php

namespace pagopa\crawler\paymentlist\req;

use pagopa\crawler\paymentlist\AbstractPaymentList;
use pagopa\database\sherlock\TransactionRe;
use pagopa\database\sherlock\Transaction;
use pagopa\database\sherlock\Workflow;
use Illuminate\Database\Capsule\Manager as DB;

class nodoInviaCarrelloRPT extends AbstractPaymentList
{

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
        return ($this->getEvent()->getIuv($index) && $this->getEvent()->getPaEmittente($index));
    }

    /**
     * @inheritDoc
     */
    public function isAttempt(int $index = 0): bool
    {
        return ($this->getEvent()->getIuv($index) && $this->getEvent()->getPaEmittente($index) && $this->getEvent()->getCcp($index));
    }

    /**
     * @inheritDoc
     */
    public function isAttemptInCache(int $index = 0): bool
    {
        $date           = $this->getEvent()->getInsertedTimestamp()->format('Ymd');
        $iuv            = $this->getEvent()->getIuv($index);
        $pa             = $this->getEvent()->getPaEmittente($index);
        $ccp            = $this->getEvent()->getCcp($index);
        $id_carrello    = $this->getEvent()->getIdCarrello();
        $key            = base64_encode(sprintf('attempt_%s_%s_%s_%s_%s', $date, $id_carrello, $iuv, $pa, $ccp));
        return $this->hasInCache($key);
    }

    /**
     * @inheritDoc
     */
    public function isPaymentInCache(int $index = 0): bool
    {
        $date           = $this->getEvent()->getInsertedTimestamp()->format('Ymd');
        $iuv            = $this->getEvent()->getIuv($index);
        $pa             = $this->getEvent()->getPaEmittente($index);
        $key            = base64_encode(sprintf('payment_%s_%s_%s', $date, $iuv, $pa));
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
        $iuv        = $this->getEvent()->getIuv($index);
        $pa         = $this->getEvent()->getPaEmittente($index);
        return !is_null(Transaction::searchByPayment($iuv, $pa));
    }

    /**
     * @inheritDoc
     */
    public function runAttemptAlreadyEvaluated(int $index = 0): void
    {
        $iuv            =   $this->getEvent()->getIuv($index);
        $pa_emittente   =   $this->getEvent()->getPaEmittente($index);
        $ccp            =   $this->getEvent()->getPaymentToken($index);
        $date_event     =   $this->getEvent()->getInsertedTimestamp()->format('Ymd');
        $date_x_cache   =   $this->getEvent()->getInsertedTimestamp()->format('Ymd');
        $id_carrello    =   $this->getEvent()->getIdCarrello();

        $cache_key      =   base64_encode(sprintf('attempt_%s_%s_%s_%s_%s', $date_x_cache, $id_carrello, $iuv, $pa_emittente, $ccp));

        $cached_attempts = $this->getFromCache($cache_key);

        if (!is_array($cached_attempts))
        {
            $cached_attempts = [];
        }

        foreach($cached_attempts as $attempt)
        {
            $id     = $attempt['id'];
            $date   = $attempt['date_event'];

            $workflow = $this->getEvent()->workflowEvent($index);
            $workflow->setFkPayment($id);
            $workflow->insert();
            DB::statement($workflow->getQuery(), $workflow->getBindParams());
        }

    }

    /**
     * @inheritDoc
     */
    public function runCreateAttempt(int $index = 0): array
    {
        $ccp      = $this->getEvent()->getCcp($index);

        $transaction = $this->getEvent()->transaction($index);
        $transaction->setTokenCcp($ccp);
        $transaction->insert();
        DB::statement($transaction->getQuery(), $transaction->getBindParams());
        $last_inserted_id = DB::connection()->getPdo()->lastInsertId();

        $iuv            =   $this->getEvent()->getIuv($index);
        $pa_emittente   =   $this->getEvent()->getPaEmittente($index);
        $ccp            =   $this->getEvent()->getCcp($index);
        $date_event     =   $this->getEvent()->getInsertedTimestamp()->format('Y-m-d');
        $date_x_cache   =   $this->getEvent()->getInsertedTimestamp()->format('Ymd');
        $id_carrello    =   $this->getEvent()->getIdCarrello();

        $session_key    =   base64_encode(sprintf('session_original_%s', $this->getEvent()->getSessionIdOriginal()));
        $cache_key      =   base64_encode(sprintf('attempt_%s_%s_%s_%s_%s', $date_x_cache, $id_carrello, $iuv, $pa_emittente, $ccp));
        $transfer_add = array();
        $cache_value    =   [
            'date_event'    => $date_event,
            'id'            => $last_inserted_id,
            'iuv'           => $iuv,
            'pa_emittente'  => $pa_emittente,
            'token_ccp'     => $ccp,
            'id_carrello'   => $id_carrello,
            'transfer_add'  => true,
            'amount_update' => true
        ];

        for($i=0;$i<$this->getEvent()->getTransferCount($index);$i++)
        {
            $details = $this->getEvent()->transactionDetails($i, $index);
            $details->setFkPayment($last_inserted_id);
            $details->insert();
            DB::statement($details->getQuery(), $details->getBindParams());

            if ($this->getEvent()->getMethodInterface()->isBollo($i, $index))
            {
                $transfer_add = [
                    'pa_transfer'       => $this->getEvent()->getMethodInterface()->getTransferPa($i, $index),
                    'bollo'             => true,
                    'amount_transfer'   => $this->getEvent()->getMethodInterface()->getTransferAmount($i, $index),
                    'iban_transfer'              => ''
                ];
            }
            else
            {
                $transfer_add = [
                    'pa_transfer'       => $this->getEvent()->getMethodInterface()->getTransferPa($i, $index),
                    'bollo'             => false,
                    'amount_transfer'   => $this->getEvent()->getMethodInterface()->getTransferAmount($i, $index),
                    'iban_transfer'     => $this->getEvent()->getMethodInterface()->getTransferIban($i, $index)
                ];
            }
            $cache_value['transfer_list'][] = $transfer_add;
        }


        $this->addValueCache($cache_key, $cache_value);
        $this->addValueCache($session_key, $cache_value);


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
        $iuv            = $this->getEvent()->getIuv($index);
        $pa_emittente   = $this->getEvent()->getPaEmittente($index);
        $date_event     = $this->getEvent()->getInsertedTimestamp()->format('Y-m-d');
        $date_x_cache   = $this->getEvent()->getInsertedTimestamp()->format('Ymd');

        $cache_key      =   base64_encode(sprintf('payment_%s_%s_%s', $date_x_cache, $iuv, $pa_emittente));

        $cached_attempts = $this->getFromCache($cache_key);

        if (!is_array($cached_attempts))
        {
            $cached_attempts = [];
        }

        foreach($cached_attempts as $attempt)
        {
            $id = $attempt['id'];

            $workflow = $this->getEvent()->workflowEvent($index);
            $workflow->setFkPayment($id);
            $workflow->insert();
            DB::statement($workflow->getQuery(), $workflow->getBindParams());
        }

    }

    /**
     * @inheritDoc
     */
    public function runCreatePayment(int $index = 0): array
    {
        $iuv            = $this->getEvent()->getIuv($index);
        $pa_emittente   = $this->getEvent()->getPaEmittente($index);
        $date_event     = $this->getEvent()->getInsertedTimestamp()->format('Y-m-d');
        $date_x_cache   = $this->getEvent()->getInsertedTimestamp()->format('Ymd');


        $transaction = $this->getEvent()->transaction($index);
        $transaction->removeReadyColumn('id_psp');
        $transaction->removeReadyColumn('stazione');
        $transaction->removeReadyColumn('canale');

        $transaction->insert();
        DB::statement($transaction->getQuery(), $transaction->getBindParams());
        $last_inserted_id = DB::connection()->getPdo()->lastInsertId();

        $cache_key      =   base64_encode(sprintf('payment_%s_%s_%s', $date_x_cache, $iuv, $pa_emittente));
        $cache_value    =   [
            'date_event'        => $date_event,
            'id'                => $last_inserted_id,
            'iuv'               => $iuv,
            'pa_emittente'      => $pa_emittente,
            'transfer_added'    => false,
            'amount_update'     => true
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
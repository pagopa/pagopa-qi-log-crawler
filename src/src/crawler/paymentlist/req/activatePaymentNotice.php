<?php

namespace pagopa\crawler\paymentlist\req;

use Datetime;
use pagopa\crawler\CacheInterface;
use pagopa\crawler\paymentlist\AbstractPaymentList;
use pagopa\database\sherlock\Transaction;
use pagopa\database\sherlock\TransactionRe;
use pagopa\database\sherlock\Workflow;
use Illuminate\Database\Capsule\Manager as DB;

class activatePaymentNotice extends AbstractPaymentList
{



    /**
     * @inheritDoc
     */
    public function createEventInstance(array $eventData): void
    {
        $event = new \pagopa\crawler\events\req\activatePaymentNotice($eventData);
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

        $transaction = $this->getEvent()->transaction($index);
        $transaction->removeReadyColumn('id_psp');
        $transaction->removeReadyColumn('stazione');
        $transaction->removeReadyColumn('canale');

        $transaction->insert();
        DB::statement($transaction->getQuery(), $transaction->getBindParams());
        $last_inserted_id = DB::connection()->getPdo()->lastInsertId();


        $cache_key      =   base64_encode(sprintf('payment_%s_%s_%s', $date_x_cache, $iuv, $pa_emittente));
        $cache_value    =   [
            'date_event'        =>  $date_event,
            'id'                =>  $last_inserted_id,
            'iuv'               =>  $iuv,
            'pa_emittente'      =>  $pa_emittente,
            'transfer_added'    =>  false,
            'amount_update'     =>  false
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
    public function runCreateAttempt(int $index = 0): array
    {
        $token          =   $this->getEvent()->getCcp($index);

        $transaction = $this->getEvent()->transaction($index);
        $transaction->setTokenCcp($token);
        $transaction->insert();
        DB::statement($transaction->getQuery(), $transaction->getBindParams());
        $last_inserted_id = DB::connection()->getPdo()->lastInsertId();


        $iuv            =   $this->getEvent()->getIuv($index);
        $pa_emittente   =   $this->getEvent()->getPaEmittente($index);
        $token          =   $this->getEvent()->getPaymentToken($index);
        $date_event     =   $this->getEvent()->getInsertedTimestamp()->format('Y-m-d');
        $date_x_cache   =   $this->getEvent()->getInsertedTimestamp()->format('Ymd');


        $cache_key      =   base64_encode(sprintf('attempt_%s_%s_%s_%s', $date_x_cache, $iuv, $pa_emittente, $token));
        $cache_value    =   [
            'date_event'        =>  $date_event,
            'id'                =>  $last_inserted_id,
            'iuv'               =>  $iuv,
            'pa_emittente'      =>  $pa_emittente,
            'token_ccp'         =>  $token,
            'transfer_added'    =>  false,
            'esito'             =>  false,
            'amount_update'     =>  false
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

        foreach($cached_attempts as $attempt)
        {
            $id = $attempt['id'];

            $workflow = $this->getEvent()->workflowEvent($index);
            $workflow->setFkPayment($id);
            $workflow->setFkTipoEvento(1);
            $workflow->insert();
            DB::statement($workflow->getQuery(), $workflow->getBindParams());
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

        foreach($cached_attempts as $attempt)
        {
            $id = $attempt['id'];
            $date = $attempt['date_event'];

            $workflow = $this->getEvent()->workflowEvent($index);
            $workflow->setFkPayment($id);
            $workflow->setFkTipoEvento(1);
            $workflow->insert();
            DB::statement($workflow->getQuery(), $workflow->getBindParams());
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
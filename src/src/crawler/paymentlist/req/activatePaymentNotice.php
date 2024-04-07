<?php

namespace pagopa\crawler\paymentlist\req;

use pagopa\crawler\paymentlist\AbstractPaymentList;
use pagopa\database\sherlock\TransactionRe;
use Illuminate\Database\Capsule\Manager as DB;

class activatePaymentNotice extends AbstractPaymentList
{


    protected bool $isCreateTransactionEvent = true;


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
        return ($this->getEvent()->getIuv(0) && $this->getEvent()->getPaEmittente(0));
    }

    /**
     * @inheritDoc
     */
    public function isAttempt(int $index = 0): bool
    {
        return ($this->getEvent()->getIuv(0) && $this->getEvent()->getPaEmittente(0) && $this->getEvent()->getPaymentToken(0));
    }

    /**
     * @inheritDoc
     */
    public function isAttemptInCache(int $index = 0): bool
    {
        $date       = $this->getEvent()->getInsertedTimestamp()->format('Ymd');
        $iuv        = $this->getEvent()->getIuv(0);
        $pa         = $this->getEvent()->getPaEmittente(0);
        $token      = $this->getEvent()->getPaymentToken(0);
        $key        = base64_encode(sprintf('attempt_%s_%s_%s', $iuv, $pa, $token));
        $cache_key  = $this->getEvent()->getCacheKeyAttempt();
        return $this->hasInCache($cache_key);
    }

    /**
     * @inheritDoc
     */
    public function isPaymentInCache(int $index = 0): bool
    {
        $date       = $this->getEvent()->getInsertedTimestamp()->format('Ymd');
        $iuv        = $this->getEvent()->getIuv($index);
        $pa         = $this->getEvent()->getPaEmittente($index);
        $key        = base64_encode(sprintf('payment_%s_%s', $iuv, $pa));
        $cache_key  = $this->getEvent()->getCacheKeyPayment();
        return $this->hasInCache($cache_key);
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


    public function createTransaction(int $index = 0) : array|null
    {
        // devo creare la transazione e il workflow
        // se sono qui, è perchè non esiste la cache
        $date_event     =   $this->getEvent()->getInsertedTimestamp()->format('Y-m-d');
        $token          =   $this->getEvent()->getCcp($index);

        $transaction = $this->getEvent()->transaction($index);
        $transaction->setTokenCcp($token);
        $transaction->insert();
        DB::statement($transaction->getQuery(), $transaction->getBindParams());
        $last_inserted_id = DB::connection()->getPdo()->lastInsertId();

        $cache_value    =   [
            'date_event'        =>  $date_event,
            'id'                =>  $last_inserted_id,
            'iuv'               =>  $this->getEvent()->getIuv(0),
            'pa_emittente'      =>  $this->getEvent()->getPaEmittente(0),
            'token_ccp'         =>  $token,
            'transfer_added'    =>  false,
            'esito'             =>  false,
            'amount_update'     =>  false,
            'date_wf'           => json_encode(array())
        ];
        return $cache_value;
    }

    public function createPayment(int $index = 0): array|null
    {
        $date_event     =   $this->getEvent()->getInsertedTimestamp()->format('Y-m-d');
        $iuv            =   $this->getEvent()->getIuv($index);
        $pa_emittente   =   $this->getEvent()->getPaEmittente($index);

        $transaction = $this->getEvent()->transaction($index);
        $transaction->removeReadyColumn('id_psp');
        $transaction->removeReadyColumn('stazione');
        $transaction->removeReadyColumn('canale');
        $transaction->insert();
        DB::statement($transaction->getQuery(), $transaction->getBindParams());
        $last_inserted_id = DB::connection()->getPdo()->lastInsertId();

        return [
            'date_event'        =>  $date_event,
            'id'                =>  $last_inserted_id,
            'iuv'               =>  $iuv,
            'pa_emittente'      =>  $pa_emittente,
            'transfer_added'    =>  false,
            'amount_update'     =>  false,
            'esito'             =>  false,
            'date_wf'           => json_encode(array())
        ];
    }
}
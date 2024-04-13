<?php

namespace pagopa\crawler\paymentlist\req;

use pagopa\crawler\CacheObject;
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

        $cache_value = CacheObject::createInstance();
        $cache_value->setDateEvent($date_event);
        $cache_value->setId($last_inserted_id);
        $cache_value->setIuv($this->getEvent()->getIuv(0));
        $cache_value->setPaEmittente($this->getEvent()->getPaEmittente(0));
        $cache_value->setToken($token);

        return $cache_value->getCacheData();
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


        $cache_value = CacheObject::createInstance();
        $cache_value->setDateEvent($date_event);
        $cache_value->setId($last_inserted_id);
        $cache_value->setIuv($iuv);
        $cache_value->setPaEmittente($pa_emittente);
        $cache_value->deleteKey('token_ccp');
        $cache_value->deleteKey('transfer_list');
        $cache_value->deleteKey('metadata_payment');
        return $cache_value->getCacheData();
    }
}
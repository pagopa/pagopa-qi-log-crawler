<?php

namespace pagopa\crawler\paymentlist\req;

use pagopa\crawler\CacheObject;
use pagopa\crawler\paymentlist\AbstractPaymentList;
use pagopa\database\sherlock\TransactionRe;
use pagopa\database\sherlock\Transaction;
use Illuminate\Database\Capsule\Manager as DB;

class sendPaymentOutcome extends AbstractPaymentList
{

    /**
     * @inheritDoc
     */
    public function createEventInstance(array $eventData): void
    {
        $event = new \pagopa\crawler\events\req\sendPaymentOutcome($eventData);
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
        $token = (is_null($this->getEvent()->getPaymentToken($index))) ? $this->getEvent()->getMethodInterface()->getToken($index) : $this->getEvent()->getPaymentToken($index);
        if (is_null($token))
        {
            return false;
        }
        return ($this->getEvent()->getIuv(0) && $this->getEvent()->getPaEmittente(0) && $token);
    }

    /**
     * @inheritDoc
     */
    public function isAttemptInCache(int $index = 0): bool
    {
        $cache_key      =   $this->getEvent()->getCacheKeyAttempt();
        return $this->hasInCache($cache_key);
    }

    /**
     * @inheritDoc
     */
    public function isPaymentInCache(int $index = 0): bool
    {
        $cache_key      =   $this->getEvent()->getCacheKeyPayment();
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


    public function updateTransaction(CacheObject $cache, int $index = 0): array|null
    {
        if ((!$this->getEvent()->isValidPayload()) || ($cache->getEsito()))
        {
            return $cache->getCacheData();
        }
        $id             =   $cache->getId();
        $date_event     =   $cache->getDateEvent();

        $transaction    =   Transaction::getTransactionByIdAndDateEvent($id, $date_event);
        $transaction->setEsito($this->getEvent()->getMethodInterface()->outcome());
        $transaction->update();
        DB::statement($transaction->getQuery(), $transaction->getBindParams());
        $cache->setKey('esito', true);
        return $cache->getCacheData();
    }
}
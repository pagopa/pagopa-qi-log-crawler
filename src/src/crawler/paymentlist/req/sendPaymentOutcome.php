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
        // una SPO senza token non può esistere
        $token = (is_null($this->getEvent()->getPaymentToken($index))) ? $this->getEvent()->getMethodInterface()->getToken($index) : $this->getEvent()->getPaymentToken($index);
        if (is_null($token))
        {
            return false;
        }
        return true;

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
        return true;
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
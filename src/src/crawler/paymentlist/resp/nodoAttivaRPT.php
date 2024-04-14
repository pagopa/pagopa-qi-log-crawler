<?php

namespace pagopa\crawler\paymentlist\resp;

use Illuminate\Database\Capsule\Manager as DB;
use pagopa\crawler\CacheObject;
use pagopa\crawler\paymentlist\AbstractPaymentList;
use pagopa\database\sherlock\Transaction;

class nodoAttivaRPT extends AbstractPaymentList
{

    /**
     * @inheritDoc
     */
    public function createEventInstance(array $eventData): void
    {
        $event = new \pagopa\crawler\events\resp\nodoAttivaRPT($eventData);
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
        return ($this->getEvent()->getIuv(0) && $this->getEvent()->getPaEmittente(0) && $this->getEvent()->getCcp(0));
    }

    public function updateTransaction(CacheObject $cache, int $index = 0): array|null
    {
        if (($cache->getAmountUpdate()) || ($this->getEvent()->isFaultEvent()))
        {
            return $cache->getCacheData();
        }
        $id = $cache->getId();
        $date_event = $cache->getDateEvent();
        $transaction = Transaction::getTransactionByIdAndDateEvent($id, $date_event);
        $transaction->setImporto($this->getEvent()->getMethodInterface()->getImporto());
        $transaction->update();
        DB::statement($transaction->getQuery(), $transaction->getBindParams());
        $cache->setAmountUpdate(true);
        return parent::updateTransaction($cache, $index);
    }

}
<?php

namespace pagopa\crawler\paymentlist\resp;

use Illuminate\Database\Capsule\Manager as DB;
use pagopa\crawler\CacheObject;
use pagopa\crawler\paymentlist\AbstractPaymentList;
use pagopa\database\sherlock\Transaction;

class activateIOPayment extends AbstractPaymentList
{

    /**
     * @inheritDoc
     */
    public function createEventInstance(array $eventData): void
    {
        $event = new \pagopa\crawler\events\resp\activateIOPayment($eventData);
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

    public function updateTransaction(CacheObject $cache, int $index = 0): array|null
    {
        if (($this->getEvent()->isFaultEvent()) || ($cache->getAmountUpdate()))
        {
            return $cache->getCacheData();
        }

        $id             =   $cache->getId();
        $date_event     =   $cache->getDateEvent();
        $transaction = new Transaction(new \Datetime($date_event), ['id' => $id, 'date_event' => $date_event]);
        $transaction->setImporto($this->getEvent()->getMethodInterface()->getImportoTotale());
        $transaction->update();
        DB::statement($transaction->getQuery(), $transaction->getBindParams());
        $cache->setAmountUpdate(true);

        return $cache->getCacheData();
    }
}
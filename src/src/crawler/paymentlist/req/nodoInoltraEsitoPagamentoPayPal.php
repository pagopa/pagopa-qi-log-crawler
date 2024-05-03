<?php

namespace pagopa\crawler\paymentlist\req;

use Illuminate\Database\Capsule\Manager as DB;
use pagopa\crawler\CacheObject;
use pagopa\crawler\paymentlist\AbstractPaymentList;
use pagopa\database\sherlock\ExtraInfo;
use pagopa\database\sherlock\Transaction;

class nodoInoltraEsitoPagamentoPayPal extends AbstractPaymentList
{

    /**
     * @inheritDoc
     */
    public function createEventInstance(array $eventData): void
    {
        $event = new \pagopa\crawler\events\req\nodoInoltraEsitoPagamentoPayPal($eventData);
        $this->setEvent($event);
    }

    /**
     * @inheritDoc
     */
    public function isValidPayment(int $index = 0): bool
    {
        if ((!is_null($this->getEvent()->getSessionIdOriginal())) || (!empty($this->getEvent()->getSessionIdOriginal())))
        {
            return true;
        }
        return ($this->getEvent()->getIuv(0) && $this->getEvent()->getPaEmittente(0));
    }

    /**
     * @inheritDoc
     */
    public function isAttempt(int $index = 0): bool
    {
        if ((!is_null($this->getEvent()->getSessionIdOriginal())) || (!empty($this->getEvent()->getSessionIdOriginal())))
        {
            return true;
        }
        return ($this->getEvent()->getIuv(0) && $this->getEvent()->getPaEmittente(0) && $this->getEvent()->getPaymentToken(0));
    }

    public function updateTransaction(CacheObject $cache, int $index = 0): array|null
    {
        if ($cache->getPaymentType())
        {
            return $cache->getCacheData();
        }
        $id = $cache->getId();
        $date_event = $cache->getDateEvent();
        $transaction = Transaction::getTransactionByIdAndDateEvent($id, $date_event);
        $transaction->setPaymentType('PPAL');
        $transaction->update();
        DB::statement($transaction->getQuery(), $transaction->getBindParams());

        return $cache->getCacheData();
    }
}
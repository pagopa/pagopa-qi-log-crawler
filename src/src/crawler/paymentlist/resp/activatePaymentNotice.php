<?php

namespace pagopa\crawler\paymentlist\resp;

use pagopa\crawler\CacheObject;
use pagopa\crawler\paymentlist\AbstractPaymentList;
use pagopa\database\sherlock\Transaction;
use pagopa\database\sherlock\TransactionRe;
use Illuminate\Database\Capsule\Manager as DB;

class activatePaymentNotice extends AbstractPaymentList
{

    /**
     * @inheritDoc
     */
    public function createEventInstance(array $eventData): void
    {
        $event = new \pagopa\crawler\events\resp\activatePaymentNotice($eventData);
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
        $key        = base64_encode(sprintf('attempt_%s_%s_%s', $iuv, $pa, $token));
        $key        = $this->getEvent()->getCacheKeyAttempt();
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
        $key        = base64_encode(sprintf('payment_%s_%s', $iuv, $pa));
        return $this->hasInCache($key);
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
        // una activatePaymentNotice Resp aggiorna la transaction se non rappresenta un fault e pure i transfer

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
        $cache->setKey('amount_update', true);

        return $cache->getCacheData();
    }

    public function updateDetails(CacheObject $cache, int $index = 0): array|null
    {
        // se è un fault oppure se ho già aggiunto i transfer, non faccio nulla
        if (($this->getEvent()->isFaultEvent()) || $cache->getTransferAdded())
        {
            return $cache->getCacheData();
        }

        $id         =   $cache->getId();
        for($i=0;$i<$this->getEvent()->getTransferCount($index);$i++)
        {
            $transaction_details = $this->getEvent()->transactionDetails($i, $index);
            $transaction_details->setFkPayment($id);
            $transaction_details->insert();
            DB::statement($transaction_details->getQuery(), $transaction_details->getBindParams());
        }

        $cache->setKey('transfer_added', true);

        return $cache->getCacheData();
    }
}
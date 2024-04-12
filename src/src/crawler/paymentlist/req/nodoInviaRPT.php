<?php

namespace pagopa\crawler\paymentlist\req;

use Illuminate\Database\Capsule\Manager as DB;
use pagopa\crawler\CacheObject;
use pagopa\crawler\paymentlist\AbstractPaymentList;
use pagopa\database\sherlock\TransactionRe;

class nodoInviaRPT extends AbstractPaymentList
{

    protected bool $isCreateTransactionEvent = true;

    /**
     * @inheritDoc
     */
    public function createEventInstance(array $eventData): void
    {
        $event = new \pagopa\crawler\events\req\nodoInviaRPT($eventData);
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

    /**
     * @inheritDoc
     */
    public function isAttemptInCache(int $index = 0): bool
    {
        // una nodoInviaRPT è in cache con attempt_* se c'è stata già una attivazione con nodoAttivaRPT
        // una nodoInviaRPT non è in cache con attempt_* se non c'è stata una attivazione con nodoAttivaRPT
        $key = $this->getEvent()->getCacheKeyAttempt();
        return $this->hasInCache($key);
    }

    /**
     * @inheritDoc
     */
    public function isPaymentInCache(int $index = 0): bool
    {
        $key = $this->getEvent()->getCacheKeyPayment();
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

    public function updateDetails(CacheObject $cache, int $index = 0): array|null
    {
        // qui aggiungo i versamenti della RPT
        if ($cache->getTransferAdded())
        {
            return $cache->getCacheData();
        }

        $id = $cache->getId();
        $transfer_add = array();
        for($i=0;$i<$this->getEvent()->getTransferCount();$i++)
        {
            $transaction_details = $this->getEvent()->transactionDetails($i, $index);
            $transaction_details->setFkPayment($id);
            $transaction_details->insert();
            DB::statement($transaction_details->getQuery(), $transaction_details->getBindParams());
            $last_inserted_transfer_id = DB::connection()->getPdo()->lastInsertId();

            if ($this->getEvent()->getMethodInterface()->isBollo($i, $index)) {
                $transfer_add[] = [
                    'pa_transfer' => $this->getEvent()->getMethodInterface()->getTransferPa($i, $index),
                    'bollo' => true,
                    'amount_transfer' => $this->getEvent()->getMethodInterface()->getTransferAmount($i, $index),
                    'iban_transfer' => ''
                ];
            } else {
                $transfer_add[] = [
                    'pa_transfer' => $this->getEvent()->getMethodInterface()->getTransferPa($i, $index),
                    'bollo' => false,
                    'amount_transfer' => $this->getEvent()->getMethodInterface()->getTransferAmount($i, $index),
                    'iban_transfer' => $this->getEvent()->getMethodInterface()->getTransferIban($i, $index)
                ];
            }
        }

        $cache->setTransferAdded(true);
        $cache->setTransferList($transfer_add);

        return $cache->getCacheData();
    }

    public function createTransaction(int $index = 0): array|null
    {
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
        $cache_value->setAmountUpdate(true);

        return $cache_value->getCacheData();
        // qui ci vengo quando la nodoInviaRPT arriva senza una nodoAttivaRPT
    }

    public function detailsTransaction(CacheObject $cache, int $index = 0): array|null
    {
        // qui aggiungo i versamenti della RPT
        if ($cache->getTransferAdded())
        {
            return $cache->getCacheData();
        }

        $id = $cache->getId();
        $transfer_add = array();
        for($i=0;$i<$this->getEvent()->getTransferCount();$i++)
        {
            $transaction_details = $this->getEvent()->transactionDetails($i, $index);
            $transaction_details->setFkPayment($id);
            $transaction_details->insert();
            DB::statement($transaction_details->getQuery(), $transaction_details->getBindParams());
            $last_inserted_transfer_id = DB::connection()->getPdo()->lastInsertId();

            if ($this->getEvent()->getMethodInterface()->isBollo($i, $index)) {
                $transfer_add[] = [
                    'pa_transfer' => $this->getEvent()->getMethodInterface()->getTransferPa($i, $index),
                    'bollo' => true,
                    'amount_transfer' => $this->getEvent()->getMethodInterface()->getTransferAmount($i, $index),
                    'iban_transfer' => ''
                ];
            } else {
                $transfer_add[] = [
                    'pa_transfer' => $this->getEvent()->getMethodInterface()->getTransferPa($i, $index),
                    'bollo' => false,
                    'amount_transfer' => $this->getEvent()->getMethodInterface()->getTransferAmount($i, $index),
                    'iban_transfer' => $this->getEvent()->getMethodInterface()->getTransferIban($i, $index)
                ];
            }
        }

        $cache->setTransferAdded(true);
        $cache->setTransferList($transfer_add);

        return $cache->getCacheData();
    }
}
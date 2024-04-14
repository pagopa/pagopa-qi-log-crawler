<?php

namespace pagopa\crawler\paymentlist\req;

use Illuminate\Database\Capsule\Manager as DB;
use pagopa\crawler\CacheObject;
use pagopa\crawler\paymentlist\AbstractPaymentList;
use pagopa\database\sherlock\Transaction;
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
                    'iban_transfer' => '',
                    'id' => $last_inserted_transfer_id
                ];
            } else {
                $transfer_add[] = [
                    'pa_transfer' => $this->getEvent()->getMethodInterface()->getTransferPa($i, $index),
                    'bollo' => false,
                    'amount_transfer' => $this->getEvent()->getMethodInterface()->getTransferAmount($i, $index),
                    'iban_transfer' => $this->getEvent()->getMethodInterface()->getTransferIban($i, $index),
                    'id' => $last_inserted_transfer_id
                ];
            }
        }

        $cache->setTransferAdded(true);
        $cache->setTransferList($transfer_add);

        return $cache->getCacheData();
    }


    public function updateTransaction(CacheObject $cache, int $index = 0): array|null
    {
        if ($cache->getAmountUpdate())
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
        return $cache->getCacheData();
    }
}
<?php

namespace pagopa\crawler\paymentlist\req;

use pagopa\crawler\CacheObject;
use pagopa\crawler\paymentlist\AbstractPaymentList;
use pagopa\database\sherlock\TransactionRe;
use pagopa\database\sherlock\Transaction;
use Illuminate\Database\Capsule\Manager as DB;

class nodoInviaCarrelloRPT extends AbstractPaymentList
{

    protected bool $isCreateTransactionEvent = true;

    /**
     * @inheritDoc
     */
    public function createEventInstance(array $eventData): void
    {
        $event = new \pagopa\crawler\events\req\nodoInviaCarrelloRPT($eventData);
        $this->setEvent($event);
    }

    /**
     * @inheritDoc
     */
    public function isValidPayment(int $index = 0): bool
    {
        return !is_null($this->getEvent()->getSessionIdOriginal());
    }

    /**
     * @inheritDoc
     */
    public function isAttempt(int $index = 0): bool
    {
        return !is_null($this->getEvent()->getSessionIdOriginal());
    }
    /**
     * @inheritDoc
     */
    public function isFoundOnDb(int $index = 0): bool
    {
        if ($this->search_on_db === false) {
            return false;
        }
        $iuv = $this->getEvent()->getIuv($index);
        $pa = $this->getEvent()->getPaEmittente($index);
        return !is_null(Transaction::searchByPayment($iuv, $pa));
    }

    public function createTransaction(int $index = 0) : array|null
    {
        $iuv            =   $this->getEvent()->getIuv($index);
        $pa_emittente   =   $this->getEvent()->getPaEmittente($index);
        $ccp            =   $this->getEvent()->getCcp($index);
        $id_carrello    =   $this->getEvent()->getIdCarrello();
        $date_event     =   $this->getEvent()->getInsertedTimestamp()->format('Y-m-d');

        $transaction = $this->getEvent()->transaction($index);
        $transaction->setTokenCcp($ccp);
        $transaction->insert();
        DB::statement($transaction->getQuery(), $transaction->getBindParams());
        $last_inserted_id = DB::connection()->getPdo()->lastInsertId();

        $cache_value = CacheObject::createInstance();
        $cache_value->setDateEvent($date_event);
        $cache_value->setId($last_inserted_id);
        $cache_value->setIuv($iuv);
        $cache_value->setPaEmittente($pa_emittente);
        $cache_value->setToken($ccp);
        $cache_value->setKey('id_carrello', $id_carrello);
        $cache_value->setAmountUpdate(true);

        return $cache_value->getCacheData();

    }


    public function detailsTransaction(CacheObject $cache, int $index = 0): array|null
    {
        if ($cache->getTransferAdded() === true)
        {
            return $cache->getCacheData();
        }
        $id             =   $cache->getId();
        $transfer_list  =   array();
        for ($i = 0; $i < $this->getEvent()->getTransferCount($index); $i++) {
            $details = $this->getEvent()->transactionDetails($i, $index);
            $details->setFkPayment($id);
            $details->insert();
            DB::statement($details->getQuery(), $details->getBindParams());
            $last_inserted_id_transfer = DB::connection()->getPdo()->lastInsertId();

            if ($this->getEvent()->getMethodInterface()->isBollo($i, $index)) {
                $transfer_add = [
                    'pa_transfer' => $this->getEvent()->getMethodInterface()->getTransferPa($i, $index),
                    'bollo' => true,
                    'amount_transfer' => $this->getEvent()->getMethodInterface()->getTransferAmount($i, $index),
                    'iban_transfer' => ''
                ];
            } else {
                $transfer_add = [
                    'pa_transfer' => $this->getEvent()->getMethodInterface()->getTransferPa($i, $index),
                    'bollo' => false,
                    'amount_transfer' => $this->getEvent()->getMethodInterface()->getTransferAmount($i, $index),
                    'iban_transfer' => $this->getEvent()->getMethodInterface()->getTransferIban($i, $index)
                ];
            }
            $transfer_add['id'] = $last_inserted_id_transfer;
            $transfer_add['date_event'] = $this->getEvent()->getInsertedTimestamp()->format('Y-m-d');
            $transfer_list[] = $transfer_add;
        }
        $cache->setKey('transfer_added', true);
        $cache->setKey('transfer_list', $transfer_list);
        return $cache->getCacheData();
    }
}
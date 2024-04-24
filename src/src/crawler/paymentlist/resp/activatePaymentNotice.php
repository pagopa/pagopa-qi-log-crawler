<?php

namespace pagopa\crawler\paymentlist\resp;

use pagopa\crawler\CacheObject;
use pagopa\crawler\paymentlist\AbstractPaymentList;
use pagopa\database\sherlock\Metadata;
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
        $cache->setAmountUpdate(true);

        return $cache->getCacheData();
    }

    public function updateDetails(CacheObject $cache, int $index = 0): array|null
    {
        // se è un fault oppure se ho già aggiunto i transfer, non faccio nulla
        if (($this->getEvent()->isFaultEvent()) || $cache->getTransferAdded())
        {
            return $cache->getCacheData();
        }

        $id             =   $cache->getId();
        $transfer_list  =   array();

        for($i=0;$i<$this->getEvent()->getTransferCount($index);$i++)
        {
            $transaction_details = $this->getEvent()->transactionDetails($i, $index);
            $transaction_details->setFkPayment($id);
            $transaction_details->insert();
            DB::statement($transaction_details->getQuery(), $transaction_details->getBindParams());
            $last_inserted_transfer_id = DB::connection()->getPdo()->lastInsertId();
            $transfer_list[] = [
                'date_event'        => $this->getEvent()->getInsertedTimestamp()->format('Y-m-d'),
                'id'                => $last_inserted_transfer_id,
                'pa_transfer'       => $this->getEvent()->getMethodInterface()->getTransferPa($i, $index),
                'amount_transfer'   => $this->getEvent()->getMethodInterface()->getTransferAmount($i, $index),
                'transfer_iban'     => $this->getEvent()->getMethodInterface()->getTransferIban($i, $index),
                'id_transfer'       => $this->getEvent()->getMethodInterface()->getTransferId($i, $index)
            ];
        }

        $cache->setTransferAdded(true);
        $cache->setTransferList($transfer_list);
        return $cache->getCacheData();
    }


    public function updateMetadataDetails(CacheObject $cache, int $index = 0): array|null
    {
        if (($this->getEvent()->isFaultEvent()) || ($cache->getMetadataTransfer()))
        {
            return $cache->getCacheData();
        }

        $metadata_all_transfer_list = [];
        for($i=0;$i<$this->getEvent()->getMethodInterface()->getTransferCount($index);$i++)
        {
            // per ogni transfer, con $i che mi seleziona il transfer
            $transfer_id = $cache->getTransferList()[$i]['id'];
            $payment_id = $cache->getId();
            $metadata_single_transfer_list = [];
            for($x=0;$x<$this->getEvent()->getMethodInterface()->getTransferMetaDataCount($i, $index);$x++)
            {
                // per ogni metadata del transfer, con $x che mi seleziona il transfer
                $key    =   $this->getEvent()->getMethodInterface()->getTransferMetaDataKey($i, $index, $x);
                $value  =   $this->getEvent()->getMethodInterface()->getTransferMetaDataValue($i, $index, $x);
                $metadata_db = new Metadata(new \DateTime($cache->getDateEvent()));
                $metadata_db->setFkTransfer($transfer_id);
                $metadata_db->setFkPayment($payment_id);
                $metadata_db->setNewColumnValue('date_event', $cache->getDateEvent());
                $metadata_db->setMetaData($key, $value, Metadata::ACTIVATE_TRANSFER_LIST);
                $metadata_db->insert();
                DB::statement($metadata_db->getQuery(), $metadata_db->getBindParams());
                $last_id_transfer = DB::connection()->getPdo()->lastInsertId();
                $metadata_single_transfer_list[] = [
                    'id' => $last_id_transfer,
                    'date_event' => $cache->getDateEvent(),
                    'key' => $key,
                    'value' => $value,
                    'fk_transfer' => $transfer_id,
                    'fk_payment' => $payment_id
                ];
            }
            $metadata_all_transfer_list[] = $metadata_single_transfer_list;
        }

        $cache->setMetadataTransfer($metadata_all_transfer_list);
        $cache->setMetadataTransferAdded(true);
        return $cache->getCacheData();
    }
}
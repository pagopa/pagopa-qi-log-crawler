<?php

namespace pagopa\crawler\paymentlist\resp;

use Illuminate\Database\Capsule\Manager as DB;
use pagopa\crawler\CacheObject;
use pagopa\crawler\paymentlist\AbstractPaymentList;
use pagopa\database\sherlock\Metadata;
use pagopa\database\sherlock\Transaction;

class activatePaymentNoticeV2 extends AbstractPaymentList
{

    /**
     * @inheritDoc
     */
    public function createEventInstance(array $eventData): void
    {
        $event = new \pagopa\crawler\events\resp\activatePaymentNoticeV2($eventData);
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

        if (($this->getEvent()->isFaultEvent()) || ($cache->getAmountUpdate())) {
            return $cache->getCacheData();
        }

        $id = $cache->getId();
        $date_event = $cache->getDateEvent();
        $transaction = Transaction::getTransactionByIdAndDateEvent($id, $date_event);
        $transaction->setImporto($this->getEvent()->getMethodInterface()->getImportoTotale());
        $transaction->update();
        DB::statement($transaction->getQuery(), $transaction->getBindParams());
        $cache->setAmountUpdate(true);

        return $cache->getCacheData();
    }

    public function updateDetails(CacheObject $cache, int $index = 0): array|null
    {
        if (($this->getEvent()->isFaultEvent()) || $cache->getTransferAdded()) {
            return $cache->getCacheData();
        }

        $id = $cache->getId();
        $transfer_list = array();

        for ($i = 0; $i < $this->getEvent()->getTransferCount($index); $i++) {
            $transaction_details = $this->getEvent()->transactionDetails($i, $index);
            $transaction_details->setFkPayment($id);
            $transaction_details->insert();
            DB::statement($transaction_details->getQuery(), $transaction_details->getBindParams());
            $last_inserted_transfer_id = DB::connection()->getPdo()->lastInsertId();
            if ($this->getEvent()->getMethodInterface()->isBollo($i, $index)) {
                $transfer_list[] = [
                    'date_event' => $this->getEvent()->getInsertedTimestamp()->format('Y-m-d'),
                    'id' => $last_inserted_transfer_id,
                    'pa_transfer' => $this->getEvent()->getMethodInterface()->getTransferPa($i, $index),
                    'amount_transfer' => $this->getEvent()->getMethodInterface()->getTransferAmount($i, $index),
                    'bollo' => true,
                    'iban' => '',
                    'id_transfer' => $this->getEvent()->getMethodInterface()->getTransferId($i, $index)
                ];
            } else {
                $transfer_list[] = [
                    'date_event' => $this->getEvent()->getInsertedTimestamp()->format('Y-m-d'),
                    'id' => $last_inserted_transfer_id,
                    'pa_transfer' => $this->getEvent()->getMethodInterface()->getTransferPa($i, $index),
                    'amount_transfer' => $this->getEvent()->getMethodInterface()->getTransferAmount($i, $index),
                    'transfer_iban' => $this->getEvent()->getMethodInterface()->getTransferIban($i, $index),
                    'id_transfer' => $this->getEvent()->getMethodInterface()->getTransferId($i, $index),
                    'bollo' => false
                ];
            }
        }
        $cache->setTransferAdded(true);
        $cache->setTransferList($transfer_list);
        return $cache->getCacheData();
    }

    public function updateMetadataDetails(CacheObject $cache, int $index = 0): array|null
    {
        if ($this->getEvent()->isFaultEvent())
        {
            // se è un evento di fault, non faccio nulla
            return $cache->getCacheData();
        }

        if (!$cache->getMetadataTransfer())
        {
            // se non ho aggiunto i transfer dei metadata, lo faccio
            $metadata_all_transfer_list = [];
            for ($i = 0; $i < $this->getEvent()->getMethodInterface()->getTransferCount($index); $i++) {
                // per ogni transfer, con $i che mi seleziona il transfer
                $transfer_id = $cache->getTransferList()[$i]['id'];
                $payment_id = $cache->getId();
                $metadata_single_transfer_list = [];
                for ($x = 0; $x < $this->getEvent()->getMethodInterface()->getTransferMetaDataCount($i, $index); $x++) {
                    // per ogni metadata del transfer $i, con $x che mi seleziona il transfer
                    $key = $this->getEvent()->getMethodInterface()->getTransferMetaDataKey($i, $index, $x);
                    $value = $this->getEvent()->getMethodInterface()->getTransferMetaDataValue($i, $index, $x);
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
        }

        if (!$cache->getMetadataPayment())
        {
            // se non ho già aggiunto i metadata del pagamento (fuori dalla transferlist)
            $payment_id = $cache->getId();
            $metadata_all_payment_list = [];
            for ($x = 0; $x < $this->getEvent()->getMethodInterface()->getPaymentMetaDataCount($index); $x++)
            {
                // me li ciclo uno ad uno
                $key = $this->getEvent()->getMethodInterface()->getPaymentMetaDataKey($index, $x);
                $value = $this->getEvent()->getMethodInterface()->getPaymentMetaDataValue($index, $x);
                $metadata_db = new Metadata(new \DateTime($cache->getDateEvent()));
                $metadata_db->setFkPayment($payment_id);
                $metadata_db->setNewColumnValue('date_event', $cache->getDateEvent());
                $metadata_db->setMetaData($key, $value, Metadata::ACTIVATE_TRANSFER_LIST);
                $metadata_db->insert();
                DB::statement($metadata_db->getQuery(), $metadata_db->getBindParams());
                $last_id_payment_metadata = DB::connection()->getPdo()->lastInsertId();
                $metadata_all_payment_list[] =
                    [
                        'id' => $last_id_payment_metadata,
                        'date_event' => $cache->getDateEvent(),
                        'key' => $key,
                        'value' => $value,
                        'fk_payment' => $payment_id
                    ];
                // x ogni $x che rappresenta un metadata del payment
            }
            $cache->setMetadataPayment($metadata_all_payment_list);
            $cache->setMetadataPaymentAdded(true);
        }
        return $cache->getCacheData();
    }
}
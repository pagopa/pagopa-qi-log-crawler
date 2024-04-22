<?php

namespace pagopa\crawler\paymentlist\req;

use pagopa\crawler\CacheObject;
use pagopa\crawler\paymentlist\AbstractPaymentList;
use pagopa\database\sherlock\ExtraInfo;
use Illuminate\Database\Capsule\Manager as DB;
use pagopa\database\sherlock\Metadata;
use pagopa\database\sherlock\Transaction;


class pspNotifyPayment extends AbstractPaymentList
{

    /**
     * @inheritDoc
     */
    public function createEventInstance(array $eventData): void
    {
        $event = new \pagopa\crawler\events\req\pspNotifyPayment($eventData);
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


    public function updateDetails(CacheObject $cache, int $index = 0): array|null
    {
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

    public function createExtraInfo(CacheObject $cache, int $index = 0): array|null
    {
        $extra_info = $cache->getExtraInfo();
        if (array_key_exists('typePaymentPspNotifyPayment', $extra_info))
        {
            return $cache->getCacheData();
        }

        $type_payment = $this->getEvent()->getMethodInterface()->getChoiceAdditionalPayment();
        if (is_null($type_payment))
        {
            return $cache->getCacheData();
        }
        $cache_data = [
            'typePayment' => $this->getEvent()->getMethodInterface()->getChoiceAdditionalPayment()
        ];

        if ($type_payment == 'creditCardPayment')
        {
            $rrn = $this->getEvent()->getMethodInterface()->getRRN();
            $authcode = $this->getEvent()->getMethodInterface()->getAuthCode();
            $cache_data['rrn'] = $rrn;
            $cache_data['authcode'] = $authcode;
            $extra_info['typePaymentPspNotifyPayment'] = $cache_data;
            $cache->setExtraInfo($extra_info);

            $db_rrn = new ExtraInfo(new \DateTime($cache->getDateEvent()), ['id' => $cache->getId(), 'date_event' => $cache->getDateEvent()]);
            $db_rrn->setNewColumnValue('date_event', $cache->getDateEvent());
            $db_rrn->setFkPayment($cache->getId());
            $db_rrn->setMetaData('rrn', $rrn);
            $db_rrn->insert();
            DB::statement($db_rrn->getQuery(), $db_rrn->getBindParams());

            $db_authcode = new ExtraInfo(new \DateTime($cache->getDateEvent()), ['id' => $cache->getId(), 'date_event' => $cache->getDateEvent()]);
            $db_authcode->setNewColumnValue('date_event', $cache->getDateEvent());
            $db_authcode->setFkPayment($cache->getId());
            $db_authcode->setMetaData('authcode', $authcode);
            $db_authcode->insert();
            DB::statement($db_authcode->getQuery(), $db_authcode->getBindParams());

        }

        if ($type_payment == 'paypalPayment')
        {
            $transaction_id = $this->getEvent()->getMethodInterface()->getTransactionId();
            $pspTransactionId = $this->getEvent()->getMethodInterface()->getPspTransactionId();
            $cache_data['pspTransactionId'] = $pspTransactionId;
            $cache_data['transactionId'] = $transaction_id;
            $extra_info['typePaymentPspNotifyPayment'] = $cache_data;
            $cache->setExtraInfo($extra_info);

            $db_transactionId = new ExtraInfo(new \DateTime($cache->getDateEvent()), ['id' => $cache->getId(), 'date_event' => $cache->getDateEvent()]);
            $db_transactionId->setNewColumnValue('date_event', $cache->getDateEvent());
            $db_transactionId->setFkPayment($cache->getId());
            $db_transactionId->setMetaData('transactionId', $transaction_id);
            $db_transactionId->insert();
            DB::statement($db_transactionId->getQuery(), $db_transactionId->getBindParams());

            $db_pspTransactionId = new ExtraInfo(new \DateTime($cache->getDateEvent()), ['id' => $cache->getId(), 'date_event' => $cache->getDateEvent()]);
            $db_pspTransactionId->setNewColumnValue('date_event', $cache->getDateEvent());
            $db_pspTransactionId->setFkPayment($cache->getId());
            $db_pspTransactionId->setMetaData('pspTransactionId', $pspTransactionId);
            $db_pspTransactionId->insert();
            DB::statement($db_pspTransactionId->getQuery(), $db_pspTransactionId->getBindParams());

        }

        if ($type_payment == 'bancomatpayPayment')
        {
            $transactionId = $this->getEvent()->getMethodInterface()->getTransactionId();
            $authcode = $this->getEvent()->getMethodInterface()->getAuthCode();
            $cache_data['transactionId'] = $transactionId;
            $cache_data['authcode'] = $authcode;
            $extra_info['typePaymentPspNotifyPayment'] = $cache_data;
            $cache->setExtraInfo($extra_info);



            $db_transactionId = new ExtraInfo(new \DateTime($cache->getDateEvent()), ['id' => $cache->getId(), 'date_event' => $cache->getDateEvent()]);
            $db_transactionId->setNewColumnValue('date_event', $cache->getDateEvent());
            $db_transactionId->setFkPayment($cache->getId());
            $db_transactionId->setMetaData('transactionId', $transactionId);
            $db_transactionId->insert();
            DB::statement($db_transactionId->getQuery(), $db_transactionId->getBindParams());

            $db_authcode = new ExtraInfo(new \DateTime($cache->getDateEvent()), ['id' => $cache->getId(), 'date_event' => $cache->getDateEvent()]);
            $db_authcode->setNewColumnValue('date_event', $cache->getDateEvent());
            $db_authcode->setFkPayment($cache->getId());
            $db_authcode->setMetaData('authcode', $authcode);
            $db_authcode->insert();
            DB::statement($db_authcode->getQuery(), $db_authcode->getBindParams());
        }
        return $cache->getCacheData();
    }


    public function updateTransaction(CacheObject $cache, int $index = 0): array|null
    {
        $to_update = false;

        $id = $cache->getId();
        $date_event = $cache->getDateEvent();
        $transaction = Transaction::getTransactionByIdAndDateEvent($id, $date_event);

        $psp = $this->getEvent()->getPsp();
        $canale = $this->getEvent()->getCanale();

        if (!$cache->hasTouchPoint())
        {
            $transaction->setTouchPoint('CHECKOUT');
            $to_update = true;
        }
        if (!is_null($psp))
        {
            $to_update = true;
            $transaction->setPsp($psp);
        }
        if (!is_null($canale))
        {
            $to_update = true;
            $transaction->setCanale($canale);
        }

        if ($to_update)
        {
            $transaction->update();
            DB::statement($transaction->getQuery(), $transaction->getBindParams());
        }
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
                $metadata_db->setMetaData($key, $value, Metadata::PSP_TRANSFER_LIST);
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
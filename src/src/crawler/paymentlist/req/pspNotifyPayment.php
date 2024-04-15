<?php

namespace pagopa\crawler\paymentlist\req;

use pagopa\crawler\CacheObject;
use pagopa\crawler\paymentlist\AbstractPaymentList;
use pagopa\database\sherlock\ExtraInfo;
use Illuminate\Database\Capsule\Manager as DB;
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
        $id = $cache->getId();
        $date_event = $cache->getDateEvent();
        $transaction = Transaction::getTransactionByIdAndDateEvent($id, $date_event);

        $transaction->setTouchPoint('CHECKOUT');
        $transaction->update();
        DB::statement($transaction->getQuery(), $transaction->getBindParams());
        return $cache->getCacheData();
    }


}
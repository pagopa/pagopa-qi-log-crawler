<?php

namespace pagopa\crawler\paymentlist\req;

use pagopa\crawler\CacheObject;
use pagopa\crawler\paymentlist\AbstractPaymentList;
use pagopa\database\sherlock\ExtraInfo;
use pagopa\database\sherlock\TransactionRe;
use pagopa\database\sherlock\Transaction;
use Illuminate\Database\Capsule\Manager as DB;

class pspInviaCarrelloRPTCarte extends AbstractPaymentList
{

    /**
     * @inheritDoc
     */
    public function createEventInstance(array $eventData): void
    {
        $event = new \pagopa\crawler\events\req\pspInviaCarrelloRPTCarte($eventData);
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
    public function isAttemptInCache(int $index = 0): bool
    {
        $key = $this->getEvent()->getCacheKeyAttempt();
        return $this->hasInCache($key);
    }

    /**
     * @inheritDoc
     */
    public function isPaymentInCache(int $index = 0): bool
    {
        $key = $this->getEvent()->getCacheKeyAttempt();
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
        $id             =       $cache->getId();
        $date_event     =       $cache->getDateEvent();
        $psp            =       $this->getEvent()->getPsp();
        $canale         =       $this->getEvent()->getCanale();
        $transaction    =       Transaction::getTransactionByIdAndDateEvent($id, $date_event);

        $transaction->setPsp($psp);
        $transaction->setCanale($canale);
        $transaction->setNewColumnValue('payment_type', $this->getEvent()->getMethodInterface()->getTipoVersamento($index));
        $transaction->update();
        DB::statement($transaction->getQuery(), $transaction->getBindParams());
        return $cache->getCacheData();
    }

    public function createExtraInfo(CacheObject $cache, int $index = 0): array|null
    {
        $id             =       $cache->getId();
        $date_event     =       $this->getEvent()->getInsertedTimestamp()->format('Y-m-d');
        $key_event      =       strtolower(sprintf('%s_%s', $this->getMethodName(), $this->getType()));

        if (array_key_exists($key_event, $cache->getExtraInfo()))
        {
            return $cache->getCacheData();
        }
        $update         = false;
        $rrn            = $this->getEvent()->getMethodInterface()->getTransactionRRN();
        $authcode       = $this->getEvent()->getMethodInterface()->getTransactionCodeAuth();
        $esito_carta    = $this->getEvent()->getMethodInterface()->getEsitoTransazioneCarta();
        $cache_add      = array();
        if (!is_null($rrn))
        {
            $extra_info_rrn = new ExtraInfo($this->getEvent()->getInsertedTimestamp(), ['date_event' => $date_event]);
            $extra_info_rrn->setFkPayment($id);
            $extra_info_rrn->setNewColumnValue('date_event', $date_event);
            $extra_info_rrn->setMetaData('rrn', $rrn);
            $extra_info_rrn->insert();
            DB::statement($extra_info_rrn->getQuery(), $extra_info_rrn->getBindParams());
            $cache_add['rrn'] = $rrn;
            $update = true;
        }
        if (!is_null($authcode))
        {
            $extra_info_auth_code = new ExtraInfo($this->getEvent()->getInsertedTimestamp(), ['date_event' => $date_event]);
            $extra_info_auth_code->setFkPayment($id);
            $extra_info_auth_code->setNewColumnValue('date_event', $date_event);
            $extra_info_auth_code->setMetaData('authcode', $authcode);
            $extra_info_auth_code->insert();
            DB::statement($extra_info_auth_code->getQuery(), $extra_info_auth_code->getBindParams());
            $cache_add['authcode'] = $authcode;
            $update = true;

        }
        if (!is_null($esito_carta))
        {
            $extra_info_esito_carta = new ExtraInfo($this->getEvent()->getInsertedTimestamp(), ['date_event' => $date_event]);
            $extra_info_esito_carta->setFkPayment($id);
            $extra_info_esito_carta->setNewColumnValue('date_event', $date_event);
            $extra_info_esito_carta->setMetaData('esito_carta', $esito_carta);
            $extra_info_esito_carta->insert();
            DB::statement($extra_info_esito_carta->getQuery(), $extra_info_esito_carta->getBindParams());
            $update = true;
            $cache_add['esito_carta'] = $esito_carta;
        }

        if ($update)
        {
            $new_cache_value = $cache->getExtraInfo();
            $new_cache_value[$key_event] = $cache_add;
            $cache->setExtraInfo($new_cache_value);
        }
        return $cache->getCacheData();
    }
}
<?php

namespace pagopa\crawler\paymentlist\req;

use Illuminate\Database\Capsule\Manager as DB;
use pagopa\crawler\CacheObject;
use pagopa\crawler\paymentlist\AbstractPaymentList;
use pagopa\database\sherlock\Transaction;

class sendPaymentOutcomeV2 extends AbstractPaymentList
{

    /**
     * @inheritDoc
     */
    public function createEventInstance(array $eventData): void
    {
        $event = new \pagopa\crawler\events\req\sendPaymentOutcomeV2($eventData);
        $this->setEvent($event);
    }

    /**
     * @inheritDoc
     */
    public function isValidPayment(int $index = 0): bool
    {
        $token = (is_null($this->getEvent()->getPaymentToken($index))) ? $this->getEvent()->getMethodInterface()->getToken($index) : $this->getEvent()->getPaymentToken($index);
        if (is_null($token))
        {
            return false;
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function isAttempt(int $index = 0): bool
    {
        $token = (is_null($this->getEvent()->getPaymentToken($index))) ? $this->getEvent()->getMethodInterface()->getToken($index) : $this->getEvent()->getPaymentToken($index);
        if (is_null($token))
        {
            return false;
        }
        return true;
    }

    public function updateTransaction(CacheObject $cache, int $index = 0): array|null
    {
        if ((!$this->getEvent()->isValidPayload()) || ($cache->getEsito()))
        {
            return $cache->getCacheData();
        }
        $id             =   $cache->getId();
        $date_event     =   $cache->getDateEvent();

        $transaction    =   Transaction::getTransactionByIdAndDateEvent($id, $date_event);
        $transaction->setEsito($this->getEvent()->getMethodInterface()->outcome());
        $transaction->update();
        DB::statement($transaction->getQuery(), $transaction->getBindParams());
        $cache->setKey('esito', true);
        return $cache->getCacheData();
    }

    public function getListOfCacheKey(): array
    {
        $token_list = array();
        $key_token_cache = 'token_%s';
        for($i=0;$i<$this->getEvent()->getPaymentsCount();$i++)
        {
            $token = $this->getEvent()->getMethodInterface()->getToken($i);
            $render_key = sprintf($key_token_cache, $token);
            if ($this->hasInCache($render_key))
            {
                $token_list = array_merge($token_list, $this->getFromCache($render_key));
            }
        }
        return $token_list;
    }
}
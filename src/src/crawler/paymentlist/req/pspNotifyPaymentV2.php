<?php

namespace pagopa\crawler\paymentlist\req;

use Illuminate\Database\Capsule\Manager as DB;
use pagopa\crawler\CacheObject;
use pagopa\crawler\paymentlist\AbstractPaymentList;
use pagopa\database\sherlock\ExtraInfo;

class pspNotifyPaymentV2 extends AbstractPaymentList
{

    /**
     * @inheritDoc
     */
    public function createEventInstance(array $eventData): void
    {
        $event = new \pagopa\crawler\events\req\pspNotifyPaymentV2($eventData);
        $this->setEvent($event);
    }

    /**
     * @inheritDoc
     */
    public function isValidPayment(int $index = 0): bool
    {
        return true;
    }

    /**
     * @inheritDoc
     */
    public function isAttempt(int $index = 0): bool
    {
        return true;
    }

    public function createExtraInfo(CacheObject $cache, int $index = 0): array|null
    {
        $extra_info = $cache->getExtraInfo();
        if (array_key_exists('typePaymentPspNotifyPaymentV2', $extra_info))
        {
            return $cache->getCacheData();
        }

        $cache_data = [];
        for($i=0;$i<$this->getEvent()->getMethodInterface()->getCartMetadataCount();$i++)
        {
            $metakey = $this->getEvent()->getMethodInterface()->getCartMetadataKey($i);
            if ($metakey == 'authorizationCode')
            {
                $authcode = $this->getEvent()->getMethodInterface()->getCartMetaDataValue($i);
                $cache_data['authcode'] = $authcode;
                $db_authcode = new ExtraInfo(new \DateTime($cache->getDateEvent()), ['id' => $cache->getId(), 'date_event' => $cache->getDateEvent()]);
                $db_authcode->setNewColumnValue('date_event', $cache->getDateEvent());
                $db_authcode->setFkPayment($cache->getId());
                $db_authcode->setMetaData('authcode', $authcode);
                $db_authcode->insert();
                DB::statement($db_authcode->getQuery(), $db_authcode->getBindParams());
            }
            if ($metakey == 'rrn')
            {
                $rrn = $this->getEvent()->getMethodInterface()->getCartMetaDataValue($i);
                $cache_data['rrn'] = $rrn;

                $db_rrn = new ExtraInfo(new \DateTime($cache->getDateEvent()), ['id' => $cache->getId(), 'date_event' => $cache->getDateEvent()]);
                $db_rrn->setNewColumnValue('date_event', $cache->getDateEvent());
                $db_rrn->setFkPayment($cache->getId());
                $db_rrn->setMetaData('rrn', $rrn);
                $db_rrn->insert();
                DB::statement($db_rrn->getQuery(), $db_rrn->getBindParams());
            }
        }
        if (count($cache_data) > 0)
        {
            $extra_info['typePaymentPspNotifyPaymentV2'] = $cache_data;
            $cache->setExtraInfo($extra_info);
        }

        return $cache->getCacheData();
    }
}
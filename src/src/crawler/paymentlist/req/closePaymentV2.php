<?php

namespace pagopa\crawler\paymentlist\req;

use Illuminate\Database\Capsule\Manager as DB;
use pagopa\crawler\CacheObject;
use pagopa\crawler\paymentlist\AbstractPaymentList;

class closePaymentV2 extends AbstractPaymentList
{

    /**
     * @inheritDoc
     */
    public function createEventInstance(array $eventData): void
    {
        $event = new \pagopa\crawler\events\req\closePaymentV2($eventData);
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

    public function isAttemptInCache(int $index = 0): bool
    {
        $key = sprintf('token_%s', $this->getEvent()->getMethodInterface()->getToken($index));
        return $this->hasInCache($key);
    }

    private function getFromCacheClosePayment($index) : mixed
    {
        $key = sprintf('token_%s', $this->getEvent()->getMethodInterface()->getToken($index));
        return $this->getFromCache($key);
    }


    public function runAnalysisSingleEvent(): void
    {
        try {
            $state      = 'LOADED';
            $message    = null;
            $session_key = null;
            if (!is_null($this->getEvent()->getSessionId()))
            {
                $session_key = base64_encode(sprintf('session_id_%s_%s', $this->getEvent()->getSessionId(), $this->getMethodName()));
            }
            if ($this->isValidPayment())
            {
                $cache_key = $this->getEvent()->getCacheKeyAttempt();
                $cache_to_add = [];
                for($i=0;$i<$this->getEvent()->getPaymentsCount();$i++)
                {
                    // per ogni pagamento della closePayment-V2
                    if ($this->isAttemptInCache($i))
                    {
                        // mi prendo il pagamento in base all'iesimo token dell'evento (preso dal json della closePayment-V2)
                        $cta = $this->workflow(new CacheObject($this->getFromCacheClosePayment($i)), $i);
                        $cache_to_add[] = $cta;
                    }
                }
                // metto nella cache dell'evento (sessionIdOriginal) tutti i pagamenti trovati
                $this->setCache($cache_key, $cache_to_add);
            }
            else
            {
                $state      = 'TO_SEARCH';
                $message    = 'Evento non associabile a nessun tentativo in cache, va ricercato';
            }
            $rowid = $this->getEvent()->getEventRowInstance()->setState($state, $message)->update();
            DB::statement($rowid->getQuery(), $rowid->getBindParams());
        }
        catch (\Exception $e)
        {
            $state      = 'ERROR';
            $message    = $e->getMessage();
            $rowid = $this->getEvent()->getEventRowInstance()->setState($state, $message)->update();
            DB::statement($rowid->getQuery(), $rowid->getBindParams());
        }
    }
}
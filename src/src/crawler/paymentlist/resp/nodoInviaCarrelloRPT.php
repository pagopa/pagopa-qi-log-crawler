<?php

namespace pagopa\crawler\paymentlist\resp;

use Illuminate\Database\Capsule\Manager as DB;
use pagopa\crawler\CacheObject;
use pagopa\crawler\paymentlist\AbstractPaymentList;
use pagopa\database\sherlock\Transaction;
use pagopa\database\sherlock\TransactionDetails;
use pagopa\database\sherlock\TransactionRe;
use pagopa\database\sherlock\Workflow;

/**
 * la nodoInviaCarrello Response ha sempre un carrello associato, se l'id session original della
 * request è stato già analizzato
 */
class nodoInviaCarrelloRPT extends AbstractPaymentList
{

    /**
     * @inheritDoc
     */
    public function createEventInstance(array $eventData): void
    {
        $event = new \pagopa\crawler\events\resp\nodoInviaCarrelloRPT($eventData);
        $this->setEvent($event);
    }

    /**
     * @inheritDoc
     */
    public function isValidPayment(int $index = 0): bool
    {
        return !is_null($this->getEvent()->getSessionIdOriginal());
        $session_key    =   base64_encode(sprintf('session_original_%s', $this->getEvent()->getSessionIdOriginal()));
        $cache_data     =   $this->getFromCache($session_key);
        if (!is_array($cache_data))
        {
            return false;
        }
        return array_key_exists($index, $cache_data);
    }

    /**
     * @inheritDoc
     */
    public function isAttempt(int $index = 0): bool
    {
        return $this->isValidPayment($index);
    }

    /**
     * @inheritDoc
     */
    public function isAttemptInCache(int $index = 0): bool
    {

        $session        = $this->getEvent()->getSessionIdOriginal();
        $key            = base64_encode(sprintf('sessionOriginal_%s', $session));
        $key            = $this->getEvent()->getCacheKeyAttempt();
        return $this->hasInCache($key);

        $session_key    =   base64_encode(sprintf('session_original_%s', $this->getEvent()->getSessionIdOriginal()));
        $cache_value    =   $this->getFromCache($session_key);

        $attempt = $cache_value[$index];


        $date           = $attempt['date_event'];
        $iuv            = $attempt['iuv'];
        $pa             = $attempt['pa_emittente'];
        $ccp            = $attempt['token_ccp'];
        $id_carrello    = $attempt['id_carrello'];
        $date_x_cache   = $this->getEvent()->getInsertedTimestamp()->format('Ymd');
        $key            = base64_encode(sprintf('attempt_%s_%s_%s_%s_%s', $date_x_cache, $id_carrello, $iuv, $pa, $ccp));

        return $this->hasInCache($key);

    }

    /**
     * @inheritDoc
     */
    public function isPaymentInCache(int $index = 0): bool
    {
        $session        = $this->getEvent()->getSessionIdOriginal();
        $key            = base64_encode(sprintf('sessionOriginal_%s', $session));
        return $this->hasInCache($key);
        return $this->isAttemptInCache($index);
    }

    /**
     * @inheritDoc
     */
    public function isFoundOnDb(int $index = 0): bool
    {
        return false;
    }

    /**
     * @inheritDoc
     */
    public function runAttemptAlreadyEvaluated(int $index = 0): void
    {
        $cache_key = $this->getEvent()->getCacheKeyAttempt();
        $cached_data = $this->getFromCache($cache_key);

        if (is_array($cached_data))
        {
            foreach($cached_data as $ck => $cached_attempt)
            {
                $id = $cached_attempt['id'];
                $workflow = $this->getEvent()->workflowEvent();
                $workflow->setFkPayment($id);
                $workflow->insert();
                DB::statement($workflow->getQuery(), $workflow->getBindParams());
            }
        }
    }

    /**
     * @inheritDoc
     */
    public function runCreateAttempt(int $index = 0): array
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function runPaymentAlreadyEvaluated(int $index = 0): void
    {
        $this->runAttemptAlreadyEvaluated();
    }

    /**
     * @inheritDoc
     */
    public function runCreatePayment(int $index = 0): array
    {
        return $this->runCreateAttempt();
    }

    /**
     * @inheritDoc
     */
    public function runCopyPaymentToday(int $index = 0): void
    {
        // TODO: Implement runCopyPaymentToday() method.
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

    public function workflow(CacheObject $cache, int $index = 0): array|null
    {
        $id             =   $cache->getId();
        $date_event     =   $cache->getDateEvent();
        $date_wf        =   json_decode($cache->getDateWf(), JSON_OBJECT_AS_ARRAY);

        $workflow = $this->getEvent()->workflowEvent($index);
        $workflow->setFkPayment($id);
        $workflow->insert();
        DB::statement($workflow->getQuery(), $workflow->getBindParams());

        $new_date_event = $this->getEvent()->getInsertedTimestamp()->format('Y-m-d');
        if (($new_date_event != $date_event) && (!in_array($new_date_event, $date_wf)))
        {

            $date_wf[] = $new_date_event;
            $cache->setKey('date_wf', json_encode($date_wf));
            $transaction = Transaction::getTransactionByIdAndDateEvent($cache->getId(), $date_event);
            $transaction->addNewDate($date_wf);
            $transaction->update();
            DB::statement($transaction->getQuery(), $transaction->getBindParams());
        }
        return $cache->getCacheData();
   }
}
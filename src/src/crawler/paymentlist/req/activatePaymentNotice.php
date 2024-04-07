<?php

namespace pagopa\crawler\paymentlist\req;

use Datetime;
use pagopa\crawler\CacheInterface;
use pagopa\crawler\CacheObject;
use pagopa\crawler\MapEvents;
use pagopa\crawler\paymentlist\AbstractPaymentList;
use pagopa\database\sherlock\Transaction;
use pagopa\database\sherlock\TransactionRe;
use pagopa\database\sherlock\Workflow;
use Illuminate\Database\Capsule\Manager as DB;

class activatePaymentNotice extends AbstractPaymentList
{


    protected bool $isCreateTransactionEvent = true;


    /**
     * @inheritDoc
     */
    public function createEventInstance(array $eventData): void
    {
        $event = new \pagopa\crawler\events\req\activatePaymentNotice($eventData);
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

    /**
     * @inheritDoc
     */
    public function isAttemptInCache(int $index = 0): bool
    {
        $date       = $this->getEvent()->getInsertedTimestamp()->format('Ymd');
        $iuv        = $this->getEvent()->getIuv(0);
        $pa         = $this->getEvent()->getPaEmittente(0);
        $token      = $this->getEvent()->getPaymentToken(0);
        $key        = base64_encode(sprintf('attempt_%s_%s_%s', $iuv, $pa, $token));
        $cache_key  = $this->getEvent()->getCacheKeyAttempt();
        return $this->hasInCache($cache_key);
    }

    /**
     * @inheritDoc
     */
    public function isPaymentInCache(int $index = 0): bool
    {
        $date       = $this->getEvent()->getInsertedTimestamp()->format('Ymd');
        $iuv        = $this->getEvent()->getIuv($index);
        $pa         = $this->getEvent()->getPaEmittente($index);
        $key        = base64_encode(sprintf('payment_%s_%s', $iuv, $pa));
        $cache_key  = $this->getEvent()->getCacheKeyPayment();
        return $this->hasInCache($cache_key);
    }

    /**
     * @inheritDoc
     */
    public function isFoundOnDb(int $index = 0): bool
    {
        if ($this->search_on_db === false)
        {
            return false;
        }
        $notice_id  =   $this->getEvent()->getNoticeNumber($index);
        $pa         =   $this->getEvent()->getPaEmittente($index);
        return !is_null(Transaction::searchByNoticeId($notice_id, $pa));
    }

    /**
     * @inheritDoc
     */
    public function runCreatePayment(int $index = 0): array
    {
        // devo creare la transazione e il workflow
        // se sono qui, è perchè non esiste la cache
        $date_event     =   $this->getEvent()->getInsertedTimestamp()->format('Y-m-d');
        $iuv            =   $this->getEvent()->getIuv(0);
        $pa_emittente   =   $this->getEvent()->getPaEmittente(0);

        $transaction = $this->getEvent()->transaction(0);
        $transaction->removeReadyColumn('id_psp');
        $transaction->removeReadyColumn('stazione');
        $transaction->removeReadyColumn('canale');
        $transaction->insert();
        DB::statement($transaction->getQuery(), $transaction->getBindParams());
        $last_inserted_id = DB::connection()->getPdo()->lastInsertId();

        $cache_key      = $this->getEvent()->getCacheKeyPayment();
        $cache_value    =   [
            'date_event'        =>  $date_event,
            'id'                =>  $last_inserted_id,
            'iuv'               =>  $iuv,
            'pa_emittente'      =>  $pa_emittente,
            'transfer_added'    =>  false,
            'amount_update'     =>  false,
            'esito'             =>  false,
            'date_wf'           => json_encode(array())
        ];
        $this->addValueCache($cache_key, $cache_value);

        $workflow = $this->getEvent()->workflowEvent($index);
        $workflow->setFkPayment($last_inserted_id);
        $workflow->insert();
        DB::statement($workflow->getQuery(), $workflow->getBindParams());

        return $cache_value;
    }

    /**
     * @inheritDoc
     */
    public function runCreateAttempt(int $index = 0): array
    {
        // devo creare la transazione e il workflow
        // se sono qui, è perchè non esiste la cache
        $date_event     =   $this->getEvent()->getInsertedTimestamp()->format('Y-m-d');
        $token          =   $this->getEvent()->getCcp(0);

        $transaction = $this->getEvent()->transaction(0);
        $transaction->setTokenCcp($token);
        $transaction->insert();
        DB::statement($transaction->getQuery(), $transaction->getBindParams());
        $last_inserted_id = DB::connection()->getPdo()->lastInsertId();

        $cache_key      = $this->getEvent()->getCacheKeyAttempt();
        $cache_value    =   [
            'date_event'        =>  $date_event,
            'id'                =>  $last_inserted_id,
            'iuv'               =>  $this->getEvent()->getIuv(0),
            'pa_emittente'      =>  $this->getEvent()->getPaEmittente(0),
            'token_ccp'         =>  $token,
            'transfer_added'    =>  false,
            'esito'             =>  false,
            'amount_update'     =>  false,
            'date_wf'           => json_encode(array())
        ];
        $this->addValueCache($cache_key, $cache_value);

        $workflow = $this->getEvent()->workflowEvent($index);
        $workflow->setFkPayment($last_inserted_id);
        $workflow->insert();
        DB::statement($workflow->getQuery(), $workflow->getBindParams());

        return $cache_value;

    }

    /**
     * @inheritDoc
     */
    public function runPaymentAlreadyEvaluated(int $index = 0): void
    {
        $cache_key      =   $this->getEvent()->getCacheKeyPayment();
        $cache_data     =   $this->getFromCache($cache_key);

        foreach($cache_data as $ck => $cache_value)
        {
            $id             =   $cache_value['id'];
            $date_event     =   $cache_value['date_event'];
            $date_wf        =   json_decode($cache_value['date_wf'], JSON_OBJECT_AS_ARRAY);
            $workflow = $this->getEvent()->workflowEvent($index);
            $workflow->setFkPayment($id);
            $workflow->insert();
            DB::statement($workflow->getQuery(), $workflow->getBindParams());

            // se la data dell'evento che sto analizzando è diversa dalla date in cache
            // aggiungo la data
            $new_date_event = $this->getEvent()->getInsertedTimestamp()->format('Y-m-d');
            if (($new_date_event != $date_event) && (!in_array($new_date_event, $date_wf)))
            {
                $date_wf[] = $new_date_event;
                $cache_data[$ck]['date_wf'] = json_encode($date_wf);
                $transaction = Transaction::searchByPrimaryKey($id, $date_event);
                $transaction->addNewDate($date_wf);
                $transaction->update();
                DB::statement($transaction->getQuery(), $transaction->getBindParams());
            }
        }
        $this->setCache($cache_key, $cache_data);
    }

    /**
     * @inheritDoc
     */
    public function runAttemptAlreadyEvaluated(int $index = 0): void
    {

        $cache_key      =   $this->getEvent()->getCacheKeyAttempt();
        $cache_data     =   $this->getFromCache($cache_key);

        foreach($cache_data as $ck => $cache_value)
        {
            $id             =   $cache_value['id'];
            $date_event     =   $cache_value['date_event'];
            $date_wf        =   json_decode($cache_value['date_wf'], JSON_OBJECT_AS_ARRAY);
            $workflow = $this->getEvent()->workflowEvent($index);
            $workflow->setFkPayment($id);
            $workflow->insert();
            DB::statement($workflow->getQuery(), $workflow->getBindParams());

            // se la data dell'evento che sto analizzando è diversa dalla date in cache
            // aggiungo la data
            $new_date_event = $this->getEvent()->getInsertedTimestamp()->format('Y-m-d');
            if (($new_date_event != $date_event) && (!in_array($new_date_event, $date_wf)))
            {
                $date_wf[] = $new_date_event;
                $cache_data[$ck]['date_wf'] = json_encode($date_wf);
                $transaction = Transaction::searchByPrimaryKey($id, $date_event);
                $transaction->addNewDate($date_wf);
                $transaction->update();
                DB::statement($transaction->getQuery(), $transaction->getBindParams());
            }
        }
        $this->setCache($cache_key, $cache_data);
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






    public function runAnalysisSingleEventaaa() : void
    {
        try {
            // aggiustare l'update dell'evento , capire se mettere il ciclo dentro o fuori la validazione
            $date_event = $this->getEvent()->getInsertedTimestamp()->format('Y-m-d');
            if ($this->isValidPayment())
            {
                // se è ALMENO un pagamento
                if ($this->isAttempt())
                {
                    // se è un tentativo
                    if ($this->isAttemptInCache())
                    {
                        //se il tentativo è in cache, a parità di medesimo evento
                        $this->runAttemptAlreadyEvaluated();
                    }
                    else
                    {
                        // creo il tentativo
                        $this->runCreateAttempt();
                    }
                }
                else
                {
                    if ($this->isPaymentInCache())
                    {
                        $this->runPaymentAlreadyEvaluated();
                    }
                    else
                    {
                        $this->runCreatePayment();
                    }
                }
                $rowid = $this->getEvent()->getEventRowInstance()->loaded()->update();
                DB::statement($rowid->getQuery(), $rowid->getBindParams());
            }
            else
            {
                $rowid = $this->getEvent()->getEventRowInstance()->reject('Evento non valido')->update();
                DB::statement($rowid->getQuery(), $rowid->getBindParams());
            }
        }
        catch (\Exception $e)
        {
            $rowid = $this->getEvent()->getEventRowInstance()->reject(substr($e->getMessage(), 0, 190))->update();
            DB::statement($rowid->getQuery(), $rowid->getBindParams());
        }
    }


    public function createTransaction(int $index = 0) : array|null
    {
        // devo creare la transazione e il workflow
        // se sono qui, è perchè non esiste la cache
        $date_event     =   $this->getEvent()->getInsertedTimestamp()->format('Y-m-d');
        $token          =   $this->getEvent()->getCcp($index);

        $transaction = $this->getEvent()->transaction($index);
        $transaction->setTokenCcp($token);
        $transaction->insert();
        DB::statement($transaction->getQuery(), $transaction->getBindParams());
        $last_inserted_id = DB::connection()->getPdo()->lastInsertId();

        $cache_value    =   [
            'date_event'        =>  $date_event,
            'id'                =>  $last_inserted_id,
            'iuv'               =>  $this->getEvent()->getIuv(0),
            'pa_emittente'      =>  $this->getEvent()->getPaEmittente(0),
            'token_ccp'         =>  $token,
            'transfer_added'    =>  false,
            'esito'             =>  false,
            'amount_update'     =>  false,
            'date_wf'           => json_encode(array())
        ];
//        $this->addValueCache($cache_key, $cache_value);
        return $cache_value;

//        $workflow = $this->getEvent()->workflowEvent($index);
//        $workflow->setFkPayment($last_inserted_id);
        //       $workflow->insert();
        //DB::statement($workflow->getQuery(), $workflow->getBindParams());

    }

    public function createPayment(int $index = 0): array|null
    {
        // devo creare la transazione e il workflow
        // se sono qui, è perchè non esiste la cache
        $date_event     =   $this->getEvent()->getInsertedTimestamp()->format('Y-m-d');
        $iuv            =   $this->getEvent()->getIuv($index);
        $pa_emittente   =   $this->getEvent()->getPaEmittente($index);

        $transaction = $this->getEvent()->transaction($index);
        $transaction->removeReadyColumn('id_psp');
        $transaction->removeReadyColumn('stazione');
        $transaction->removeReadyColumn('canale');
        $transaction->insert();
        DB::statement($transaction->getQuery(), $transaction->getBindParams());
        $last_inserted_id = DB::connection()->getPdo()->lastInsertId();

        $cache_value    =   [
            'date_event'        =>  $date_event,
            'id'                =>  $last_inserted_id,
            'iuv'               =>  $iuv,
            'pa_emittente'      =>  $pa_emittente,
            'transfer_added'    =>  false,
            'amount_update'     =>  false,
            'esito'             =>  false,
            'date_wf'           => json_encode(array())
        ];
//        $this->addValueCache($cache_key, $cache_value);

//        $workflow = $this->getEvent()->workflowEvent($index);
//        $workflow->setFkPayment($last_inserted_id);
//        $workflow->insert();
//        DB::statement($workflow->getQuery(), $workflow->getBindParams());

        return $cache_value;
    }


    public function detailsPayment(CacheObject $cache, int $index = 0): array|null
    {
        return $cache->getCacheData();
    }

    public function detailsTransaction(CacheObject $cache, int $index = 0): array|null
    {
        return $cache->getCacheData();
    }

    public function workflow(CacheObject $cache, int $index = 0): array|null
    {

        $date_event     =   $cache->getDateEvent();
        $id             =   $cache->getId();
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

    public function updateDetails(CacheObject $cache, int $index = 0): array|null
    {
        return $cache->getCacheData();
    }

    public function updateTransaction(CacheObject $cache, int $index = 0): array|null
    {
        return $cache->getCacheData();
    }
}
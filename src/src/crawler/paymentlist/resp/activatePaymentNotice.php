<?php

namespace pagopa\crawler\paymentlist\resp;

use pagopa\crawler\CacheObject;
use pagopa\crawler\paymentlist\AbstractPaymentList;
use pagopa\database\sherlock\Transaction;
use pagopa\database\sherlock\TransactionDetails;
use pagopa\database\sherlock\TransactionRe;
use Datetime;
use pagopa\crawler\CacheInterface;
use pagopa\database\sherlock\Workflow;
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

    /**
     * @inheritDoc
     */
    public function isAttemptInCache(int $index = 0): bool
    {
        $date       = $this->getEvent()->getInsertedTimestamp()->format('Ymd');
        $iuv        = $this->getEvent()->getIuv($index);
        $pa         = $this->getEvent()->getPaEmittente($index);
        $token      = $this->getEvent()->getPaymentToken($index);
        $key        = base64_encode(sprintf('attempt_%s_%s_%s', $iuv, $pa, $token));
        $key        = $this->getEvent()->getCacheKeyAttempt();
        return $this->hasInCache($key);
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
        return $this->hasInCache($key);
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
        // è difficile che la response di una activate non abbia già in cache la sua req
        return [];
    }

    /**
     * @inheritDoc
     */
    public function runCreateAttempt(int $index = 0): array
    {
        // è difficile che una response di una activate vada a creare un pagamento nuovo. Che ci fa una response se
        // non ho in cache la activate?
        return [];

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
            $workflow->setFkTipoEvento(2);
            $workflow->insert();
            DB::statement($workflow->getQuery(), $workflow->getBindParams());

            $transaction = new Transaction(new \Datetime($date_event), ['id' => $id, 'date_event' => $date_event]);
            $update = false;
            if ($cache_value['amount_update'] === false)
            {
                if (!$this->getEvent()->getMethodInterface()->isFaultEvent())
                {
                $transaction->setImporto($this->getEvent()->getMethodInterface()->getImportoTotale());
                    $update = true;
                    $cache_data[$ck]['amount_update'] = true;
                }
            }

            $new_date_event = $this->getEvent()->getInsertedTimestamp()->format('Y-m-d');
            if (($new_date_event != $date_event) && (!in_array($new_date_event, $date_wf)))
            {
                $date_wf[] = $new_date_event;
                $cache_data[$ck]['date_wf'] = json_encode($date_wf);
                $transaction->addNewDate($date_wf);
                $update = true;
            }

            if ($cache_value['transfer_added'] === false)
            {
                if (!$this->getEvent()->getMethodInterface()->isFaultEvent())
                {
                    for($i=0;$i<$this->getEvent()->getTransferCount($index);$i++)
                    {
                        $transaction_details = $this->getEvent()->transactionDetails($i, 0);
                        $transaction_details->setFkPayment($id);
                        $transaction_details->insert();
                        DB::statement($transaction_details->getQuery(), $transaction_details->getBindParams());
                    }
                    $cache_data[$ck]['transfer_added'] = true;
                    $update = true;
                }
            }
            if ($update === true)
            {
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
            $workflow = $this->getEvent()->workflowEvent();
            $workflow->setFkPayment($id);
            $workflow->insert();
            DB::statement($workflow->getQuery(), $workflow->getBindParams());

            $transaction = new Transaction(new \Datetime($date_event), ['id' => $id, 'date_event' => $date_event]);
            $update = false;
            if ($cache_value['amount_update'] === false)
            {
                // aggiorno l'importo se non fatto e se non è un fault event
                if (!$this->getEvent()->getMethodInterface()->isFaultEvent())
                {
                    $transaction->setImporto($this->getEvent()->getMethodInterface()->getImportoTotale());
                    $update = true;
                    $cache_data[$ck]['amount_update'] = true;
                }
            }

            $new_date_event = $this->getEvent()->getInsertedTimestamp()->format('Y-m-d');
            if (($new_date_event != $date_event) && (!in_array($new_date_event, $date_wf)))
            {
                // aggiungo nuove date se l'evento è in una data precedente alla nascita del tentativo
                $date_wf[] = $new_date_event;
                $cache_data[$ck]['date_wf'] = json_encode($date_wf);
                $transaction->addNewDate($date_wf);
                $update = true;
            }

            if ($cache_value['transfer_added'] === false)
            {
                // se non ho già aggiunto i transfer, e non è un fault, li aggiungo
                if (!$this->getEvent()->getMethodInterface()->isFaultEvent())
                {
                    for($i=0;$i<$this->getEvent()->getTransferCount($index);$i++)
                    {
                        $transaction_details = $this->getEvent()->transactionDetails($i, 0);
                        $transaction_details->setFkPayment($id);
                        $transaction_details->insert();
                        DB::statement($transaction_details->getQuery(), $transaction_details->getBindParams());
                    }
                    $cache_data[$ck]['transfer_added'] = true;
//                    $update = true;
                }
            }
            if ($update === true)
            {
                // se c'è stato qualche aggiornamento , faccio update
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

    public function runAnalysisSingleEvent() : void
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
                        // deve per forza essere in cache, non può esistere una RESP senza una REQ
                        $this->runAttemptAlreadyEvaluated();
                    }
                    else
                    {
                        // creo il tentativo
                        // che ci fa una RESP senza cache?
                        $rowid = $this->runRejectedEvent('Attempt di RESP senza REQ in cache. Anomalo');
                        DB::statement($rowid->getQuery(), $rowid->getBindParams());
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
                        $rowid = $this->runRejectedEvent('Payment di RESP senza REQ in cache. Anomalo');
                        DB::statement($rowid->getQuery(), $rowid->getBindParams());
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

    public function createTransaction(int $index = 0): array|null
    {
        // una activatePaymentNotice Resp non può creare transaction, solo aggiornarle
        return [];
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
        $cache->setKey('amount_update', true);

        return $cache->getCacheData();
    }

    public function detailsTransaction(CacheObject $cache, int $index = 0): array|null
    {

        // questo metodo viene lanciato quando un evento che rappresenta un tentativo non è in cache
        // l'activatePaymentNotice RESP non può non essere in cache, vuol dire che c'è un problema
        return $cache->getCacheData();
    }

    public function updateDetails(CacheObject $cache, int $index = 0): array|null
    {
        // se è un fault oppure se ho già aggiunto i transfer, non faccio nulla
        if (($this->getEvent()->isFaultEvent()) || $cache->getTransferAdded())
        {
            return $cache->getCacheData();
        }


        $id         =   $cache->getId();
        for($i=0;$i<$this->getEvent()->getTransferCount($index);$i++)
        {
            $transaction_details = $this->getEvent()->transactionDetails($i, $index);
            $transaction_details->setFkPayment($id);
            $transaction_details->insert();
            DB::statement($transaction_details->getQuery(), $transaction_details->getBindParams());
        }

        $cache->setKey('transfer_added', true);

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


    public function createPayment(int $index = 0): array|null
    {
        // non è possibile creare un payment da una RESP che non trova occorrenze in cache
        return [];
    }

    public function detailsPayment(CacheObject $cache, int $index = 0): array|null
    {
        // non è possibile aggiornare un payment da una RESP che non trova occorrenze in cache
        return $cache->getCacheData();
    }
}
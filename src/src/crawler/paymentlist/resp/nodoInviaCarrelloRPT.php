<?php

namespace pagopa\crawler\paymentlist\resp;

use Illuminate\Database\Capsule\Manager as DB;
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



    public function runAnalysisSingleEventa() : void
    {
        try {
            // la nodo invia carrello può essere OK o KO
            // ok carrello accettato, ho sicuramente in cache i pagamenti
            // ko carrello non accettato, ma registro comunque l'evento
            // non ho l'id sessione, rigetto l'evento

            $session_key    =   base64_encode(sprintf('session_original_%s', $this->getEvent()->getSessionIdOriginal()));
            $cached_data    =   $this->getFromCache($session_key);
            if (is_array($cached_data))
            {
                $n = count($cached_data);
                for($i=0;$i<$n;$i++)
                {
                    if ($this->isAttemptInCache($i))
                    {
                        // se esiste in cache, aggiungo solo l'evento di workflow
                        $workflow = $this->getEvent()->workflowEvent($i);
                        $id = $cached_data[$i]['id'];
                        $workflow->setFkPayment($id);
                        $workflow->insert();
                        DB::statement($workflow->getQuery(), $workflow->getBindParams());
                    }
                    else
                    {
                        // non esiste, mi ricopio i dettagli del pagamento nella nuova giornata e aggiorno la cache

                        $attempt        =   $cached_data[$i];
                        $iuv            =   $attempt['iuv'];
                        $pa_emittente   =   $attempt['pa_emittente'];
                        $ccp            =   $attempt['token_ccp'];
                        $id_carrello    =   $attempt['id_carrello'];
                        $stazione       =   $this->getEvent()->getStazione();


                        $transaction = new Transaction($this->getEvent()->getInsertedTimestamp());
                        $transaction->setIuv($iuv);
                        $transaction->setPaEmittente($pa_emittente);
                        $transaction->setTokenCcp($ccp);
                        $transaction->setInsertedTimestamp($this->getEvent()->getInsertedTimestamp());
                        $transaction->setNewColumnValue('date_event', $this->getEvent()->getInsertedTimestamp()->format('Y-m-d'));

                        if (!is_null($id_carrello))
                        {
                            $transaction->setIdCarrello($id_carrello);
                        }
                        if (!is_null($stazione))
                        {
                            $transaction->setStazione($stazione);
                        }

                        $transaction->insert();
                        DB::statement($transaction->getQuery(), $transaction->getBindParams());
                        $last_inserted_id = DB::connection()->getPdo()->lastInsertId();

                        /*$transfer_add = [];
                        $new_cache_data = [
                            'date_event'    => $this->getEvent()->getInsertedTimestamp()->format('Y-m-d'),
                            'id'            => $last_inserted_id,
                            'iuv'           => $iuv,
                            'pa_emittente'  => $pa_emittente,
                            'token_ccp'     => $ccp,
                            'id_carrello'   => $id_carrello,
                            'transfer_add'  => true,
                            'amount_update' => false
                        ];
                        foreach($attempt['transfer_list'] as $transfer_details)
                        {
                            $details = new TransactionDetails($this->getEvent()->getInsertedTimestamp());
                            $details->setNewColumnValue('date_event', $this->getEvent()->getInsertedTimestamp()->format('Y-m-d'));
                            $details->setAmountTransfer($transfer_details['amount_transfer']);
                            $details->setBollo($transfer_details['bollo']);
                            $details->setTransferIban($transfer_details['iban_transfer']);
                            $details->setPaTransfer($transfer_details['pa_transfer']);
                            $details->setFkPayment($last_inserted_id);
                            $details->insert();
                            DB::statement($details->getQuery(), $details->getBindParams());

                            if ($transfer_details['bollo'] === true)
                            {
                                $transfer_add = [
                                    'pa_transfer'       => $transfer_details['pa_transfer'],
                                    'bollo'             => true,
                                    'amount_transfer'   => $transfer_details['amount_transfer'],
                                    'iban_transfer'              => ''
                                ];
                            }
                            else
                            {
                                $transfer_add = [
                                    'pa_transfer'       => $transfer_details['pa_transfer'],
                                    'bollo'             => false,
                                    'amount_transfer'   => $transfer_details['amount_transfer'],
                                    'iban_transfer'     => $transfer_details['iban_transfer']
                                ];
                            }
                            $new_cache_data['transfer_details'] = $transfer_add;
                            $date_x_cache   =   $this->getEvent()->getInsertedTimestamp()->format('Ymd');
                            $cache_key      =   base64_encode(sprintf('attempt_%s_%s_%s_%s_%s', $date_x_cache, $id_carrello, $iuv, $pa_emittente, $ccp));
                            if (!$this->hasInCache($cache_key))
                            {
                                $this->setCache($cache_key, $new_cache_data);
                            }
                        }*/
                        $date_x_cache   =   $this->getEvent()->getInsertedTimestamp()->format('Ymd');
                        $cache_key      =   base64_encode(sprintf('attempt_%s_%s_%s_%s_%s', $date_x_cache, $id_carrello, $iuv, $pa_emittente, $ccp));

                        $new_cache_data = [
                            'date_event'    => $this->getEvent()->getInsertedTimestamp()->format('Y-m-d'),
                            'id'            => $last_inserted_id,
                            'iuv'           => $iuv,
                            'pa_emittente'  => $pa_emittente,
                            'token_ccp'     => $ccp,
                            'id_carrello'   => $id_carrello,
                            'transfer_add'  => true,
                            'amount_update' => false
                        ];
                        if (!$this->hasInCache($cache_key))
                        {
                            $this->setCache($cache_key, $new_cache_data);
                        }
                        $workflow = $this->getEvent()->workflowEvent(0);
                        $workflow->setFkPayment($last_inserted_id);
                        $workflow->insert();
                        DB::statement($workflow->getQuery(), $workflow->getBindParams());
                    }
                }

                $rowid = $this->runCompleteEvent();
                DB::statement($rowid->getQuery(), $rowid->getBindParams());
            }
            else
            {
                $error = $this->runRejectedEvent('Id Sessione Originale non trovato in cache');
                DB::statement($error->getQuery(), $error->getBindParams());
            }

        }
        catch (\Exception $e)
        {
            $rowid = $this->getEvent()->getEventRowInstance()->reject(substr($e->getMessage(), 0, 190))->update();
            DB::statement($rowid->getQuery(), $rowid->getBindParams());
        }
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
                        //se il tentativo è in cache, a parità di medesimo evento
                        $this->runAttemptAlreadyEvaluated();
                        $rowid = $this->getEvent()->getEventRowInstance()->loaded()->update();
                        DB::statement($rowid->getQuery(), $rowid->getBindParams());
                    }
                    else
                    {
                        // creo il tentativo
                        $rowid = $this->getEvent()->getEventRowInstance()->reject()->update();
                        DB::statement($rowid->getQuery(), $rowid->getBindParams());
                    }
                }
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
}
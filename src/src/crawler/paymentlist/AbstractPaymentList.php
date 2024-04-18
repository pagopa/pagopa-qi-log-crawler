<?php

namespace pagopa\crawler\paymentlist;

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Support\Facades\Cache;
use pagopa\crawler\CacheInterface;
use pagopa\crawler\CacheObject;
use pagopa\crawler\EventInterface;
use pagopa\crawler\paymentlist\req\activatePaymentNotice;
use pagopa\crawler\PaymentListInterface;
use \Datetime;
use pagopa\database\sherlock\Transaction;
use pagopa\database\sherlock\TransactionDetails;
use pagopa\database\sherlock\TransactionRe;
use pagopa\database\sherlock\Workflow;
use pagopa\database\SingleRowException;

abstract class AbstractPaymentList implements PaymentListInterface
{

    /**
     * Contiene la data di analisi degli eventi
     * @var DateTime
     */
    protected DateTime $date;

    /**
     * Contiene il nome del metodo da analizzare
     * @var string
     */
    protected string $method;

    /**
     * Contiene il sottoTipoEvento (REQ, RESP, INTERN)
     * @var string
     */
    protected string $subType;

    /**
     * Contiene l'istanza che gestisce la cache
     * @var CacheInterface
     */
    protected CacheInterface $cache;

    /**
     * Contiene il numero di eventi da prelevare dal DB in ogni singolo blocco
     * @var int
     */
    protected int $limit = 500;


    /**
     * Contiene l'informazione relativa a l'abilitazione della ricerca sul DB
     * @var bool
     */
    protected bool $search_on_db = false;


    /**
     * Contiene l'informazione relativa alla possibilità di creare transazioni da parte dell'evento
     * @var bool
     */
    protected bool $isCreateTransactionEvent = false;


    /**
     * Contiene la classe che gestisce l'evento+payload
     * @var EventInterface
     */
    protected EventInterface $event;

    public function __construct(DateTime $date, string $method, string $subType, CacheInterface $cache, $limit = 500, $search_on_db = false)
    {
        $this->setMethodName($method);
        $this->setType($subType);
        $this->setCacheManager($cache);
        $this->setSearchOnDb($search_on_db);
        $this->limit = $limit;
        $this->date = $date;
    }
    /**
     * @inheritDoc
     */
    public function setMethodName(string $method): void
    {
        $this->method = $method;
    }

    /**
     * @inheritDoc
     */
    public function getMethodName(): string
    {
        return $this->method;
    }

    /**
     * @inheritDoc
     */
    public function setType(string $type): void
    {
        $this->subType = $type;
    }

    /**
     * @inheritDoc
     */
    public function getType(): string
    {
        return strtoupper($this->subType);
    }

    /**
     * @inheritDoc
     */
    public function getLimit(): int
    {
        return $this->limit;
    }

    /**
     * @inheritDoc
     */
    public function getDate(): DateTime
    {
        return $this->date;
    }

    /**
     * @inheritDoc
     */
    public function setSearchOnDb(bool $search_on_db = false): void
    {
        $this->search_on_db = $search_on_db;
    }

    /**
     * @inheritDoc
     */
    public function setCacheManager(CacheInterface $cache): void
    {
        $this->cache = $cache;
    }

    /**
     * @return EventInterface
     */
    public function getEvent(): EventInterface
    {
        return $this->event;
    }

    /**
     * @param EventInterface $event
     * @return void
     */
    public function setEvent(EventInterface $event): void
    {
        $this->event = $event;
    }


    /**
     * @inheritDoc
     */
    abstract public function createEventInstance(array $eventData): void;

    /**
     * @inheritDoc
     */
    public function run(): void
    {

//        $this->setEvent(new activatePaymentNotice());

        $date   =   $this->getDate()->format('Y-m-d');
        $year   =   $this->getDate()->format('Y');
        $method =   $this->getMethodName();
        $type   =   $this->getType();
        $limit  =   $this->limit;
        $table  =   sprintf('transaction_re_%s', $year);

        // mettere il ciclo che scorre sul db

        $events = DB::table($table)
            ->where('date_event', '=', $date)
            ->where('tipoevento', '=', $method)
            ->where('sottotipoevento', '=', $type)
            ->where('state', '=', 'TO_LOAD')
            ->orderBy('inserted_timestamp', 'asc')
            ->limit($limit)
            ->get();

        echo 'Lancio la procedura per ' .$this->getMethodName() . ' ' .$this->getType() .PHP_EOL;
            foreach($events as $event)
            {
                $this->createEventInstance((array) $event);
                $this->runAnalysisSingleEvent();
            }
    }

    /**
     * @inheritDoc
     */
    public function hasInCache(string $key): bool
    {
        return $this->cache->hasKey($key);
    }

    /**
     * @inheritDoc
     */
    public function getFromCache(string $key): mixed
    {
        return $this->cache->getValue($key);
    }

    /**
     * @inheritDoc
     */
    public function setCache(string $key, mixed $value): void
    {
        $this->cache->setValue($key, $value, 86400);
    }

    /**
     * @inheritDoc
     */
    public function delFromCache(string $key): void
    {
        $this->cache->deleteFromCache($key);
    }

    /**
     * @inheritDoc
     */
    public function addValueCache(string $key, mixed $value, int $ttl = 86400): void
    {
        $this->cache->addValue($key, $value, $ttl);
    }

    /**
     * @inheritDoc
     */
    abstract public function isValidPayment(int $index = 0): bool;

    /**
     * @inheritDoc
     */
    abstract public function isAttempt(int $index = 0): bool;


    /**
     * @inheritDoc
     */
    public function isAttemptInCache(int $index = 0): bool
    {
        $key            = $this->getEvent()->getCacheKeyAttempt();
        return $this->hasInCache($key);
    }

    /**
     * @inheritDoc
     */
    public function isPaymentInCache(int $index = 0): bool
    {
        $key            = $this->getEvent()->getCacheKeyPayment();
        return $this->hasInCache($key);
    }

    /**
     * @inheritDoc
     */
    public function isEnableSearch(): bool
    {
        return $this->search_on_db;
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
            $state      = 'LOADED';
            $message    = null;
            $session_key = null;
            if (!is_null($this->getEvent()->getSessionId()))
            {
                $session_key = base64_encode(sprintf('session_id_%s_%s', $this->getEvent()->getSessionId(), $this->getMethodName()));
            }
            if ($this->isValidPayment())
            {
                // l'evento può essere associato ad uno o più pagamente e/o tentativi?
                if ($this->isAttempt())
                {
                    // l'evento può essere associato ad uno o più tentativi ?
                    if ($this->isAttemptInCache())
                    {
                        // se l'evento è associabile ad uno o più tentativi, vuol dire che anche se è riguarda un nuovo tentativo non devo creare transaction
                        // quindi lancio i metodi di dettaglio e/o workflow
                            // l'evento può essere associato ad metodo che crea transazioni
                            // dato che l'evento è già in cache, vuol dire che si è ripetuto , per tanto ciclo la cache e aggiorno i workflow
                            $cache_key      =   $this->getEvent()->getCacheKeyAttempt();
                            $cache_data     =   $this->getFromCache($cache_key);
                            $new_cache_data =   array();
                            foreach($cache_data as $ck => $cache_value)
                            {
                                $refresh_cache = $this->updateTransaction(new CacheObject($cache_value), $ck);
                                $refresh_cache = $this->updateDetails(new CacheObject($refresh_cache), $ck);
                                $refresh_cache = $this->updateMetadataDetails(new CacheObject($refresh_cache), $ck);
                                $refresh_cache = $this->createExtraInfo(new CacheObject($refresh_cache), $ck);
                                $refresh_cache = $this->workflow(new CacheObject($refresh_cache), $ck);
                                $new_cache_data[] = $refresh_cache;
                                // add/update details to $cache_value and return new value
                                // add workflow to $cache_value and return new value
                            }
                            $this->setCache($cache_key, $new_cache_data);
                            $this->addSessionIdInCache($cache_key);
                            // store new cache in $cache_key
                    }
                    else
                    {
                        // è un tentativo nuovo in quanto non è in cache, quindi procedo alla creazione delle transaction
                        if ($this->isCreateTransactionEvent())
                        {
                            // se è un tentativo non in cache e riguarda una creazione, procedo alla creazione
                            $cache_key      =   $this->getEvent()->getCacheKeyAttempt();
                            for($i=0;$i<$this->getEvent()->getPaymentsCount();$i++)
                            {
                                $refresh_cache = $this->createTransaction($i);
                                $refresh_cache = $this->detailsTransaction(new CacheObject($refresh_cache), $i);
                                $refresh_cache = $this->createMetadataDetails(new CacheObject($refresh_cache), $i);
                                $refresh_cache = $this->createExtraInfo(new CacheObject($refresh_cache), $i);
                                $refresh_cache = $this->workflow(new CacheObject($refresh_cache), $i);
                                $this->addValueCache($cache_key,$refresh_cache);
                                // create transaction and return a new cache value
                                // add details to cache value and return a new cache value
                                // add workflow to cache_value and return a new cache value
                                // save cache_value in $cache_data
                                $this->addSessionIdInCache($cache_key);
                            }
                        }
                        else
                        {
                            // se non è in cache e non riguarda un tentativo, c'è un problema
                            $state      = 'TO_SEARCH';
                            $message    = 'Evento non associabile a nessun tentativo in cache, va ricercato';
                        }
                    }
                }
                else
                {
                    // è sicuramente un pagamento, quindi non associabile a tentativi
                    if ($this->isPaymentInCache())
                    {
                        // se è un pagamento in cache
                        // che sia di creazione pagamento o meno, è già in cahce quindi aggiorno solo il workflow e dettagli
                        $cache_key      =   $this->getEvent()->getCacheKeyPayment();
                        $cache_data     =   $this->getFromCache($cache_key);
                        $new_cache_data =   array();
                        foreach($cache_data as $ck => $cache_value)
                        {
                            $refresh_cache = $this->updateTransaction(new CacheObject($cache_value), $ck);
                            $refresh_cache = $this->updateDetails(new CacheObject($refresh_cache), $ck);
                            $refresh_cache = $this->updateMetadataDetails(new CacheObject($refresh_cache), $ck);
                            $refresh_cache = $this->createExtraInfo(new CacheObject($refresh_cache), $ck);
                            $refresh_cache = $this->workflow(new CacheObject($refresh_cache), $ck);
                            $new_cache_data[] = $refresh_cache;
                            // add/update details to $cache_value and return new value
                            // add workflow to $cache_value and return new value
                        }
                        $this->setCache($cache_key, $new_cache_data);
                        $this->addSessionIdInCache($cache_key);

                        // store new cache in $cache_key
                    }
                    else
                    {
                        // se è un pagamento non in cache
                        if ($this->isCreateTransactionEvent())
                        {
                            // se è un pagamento non in cache, ed è una primitiva associabile ad una nuova transaction
                            $cache_key      =   $this->getEvent()->getCacheKeyPayment();
                            for($i=0;$i<$this->getEvent()->getPaymentsCount();$i++)
                            {
                                $cached_object = new CacheObject($this->createPayment($i));
                                $cached_object = new CacheObject($this->detailsPayment($cached_object, $i));
                                $cached_object = $this->workflow($cached_object, $i);
                                $this->addValueCache($cache_key, $cached_object);
                                $this->addSessionIdInCache($cache_key);
                                // store cache
                            }
                        }
                        else
                        {
                            // se è un pagamento non in cache ed è una primitiva non associabile ad una nuova transaction
                            $state      = 'TO_SEARCH';
                            $message    = 'Evento non associabile a nessun pagamento in cache, va ricercato manualmente';
                        }
                    }
                }
            }
            else if (($this->isSessionIdInCache()))
            {
                // se non è un pagamento valido (ovvero non ha uno tra iuv e id dominio, provo a verificare se c'è la sessione
                $key = $this->getSessionIdCacheKey();
                $cache_data = $this->getFromCache($key);
                foreach($cache_data as $payment_key)
                {
                    // per ogni cache key associata a questo session id, mi prendo i dati della chiave ($payment_key)
                    $payment_in_cache = $this->getFromCache($payment_key);
                    $new_cache_data = [];
                    foreach($payment_in_cache as $ck => $payment)
                    {
                        // ed effettuo aggiornamento dati e cache
                        $refresh_cache = $this->updateTransaction(new CacheObject($payment), $ck);
                        $refresh_cache = $this->updateDetails(new CacheObject($refresh_cache), $ck);
                        $refresh_cache = $this->updateMetadataDetails(new CacheObject($refresh_cache), $ck);
                        $refresh_cache = $this->createExtraInfo(new CacheObject($refresh_cache), $ck);
                        $refresh_cache = $this->workflow(new CacheObject($refresh_cache), $ck);
                        $new_cache_data[] = $refresh_cache;
                    }
                    $this->setCache($payment_key, $new_cache_data); // aggiorno la cache per quanto riguarda i pagamenti
                    // dovrei eliminare la chiave $payment_key da $key
                    $this->deletePaymentKeyFromSessionCache($payment_key, $key);
                }
            }
            else
            {
                $state      = 'REJECTED';
                $message    = 'Evento non valido';
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

    /**
     * @inheritDoc
     * @return bool
     */
    public function isCreateTransactionEvent(): bool
    {
        return $this->isCreateTransactionEvent;
    }

    /**
     * @inheritDoc
     * @return array|null
     */
    public function createTransaction(int $index = 0): array|null
    {
        return null;
    }

    /**
     * @inheritDoc
     * @return array|null
     */
    public function detailsTransaction(CacheObject $cache, int $index = 0): array|null
    {
        return $cache->getCacheData();
    }

    /**
     * @inheritDoc
     * @return array|null
     */
    public function createPayment(int $index = 0): array|null
    {
        return null;
    }

    /**
     * @inheritDoc
     * @return array|null
     */
    public function detailsPayment(CacheObject $cache, int $index = 0): array|null
    {
        return $cache->getCacheData();
    }

    /**
     * @inheritDoc
     * @param CacheObject $cache
     * @param int $index
     * @return array|null
     * @throws SingleRowException
     */
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

    /**
     * @inheritDoc
     * @return array|null
     */
    public function updateDetails(CacheObject $cache, int $index = 0): array|null
    {
        return $cache->getCacheData();
    }

    /**
     * @inheritDoc
     * @return array|null
     */
    public function updateTransaction(CacheObject $cache, int $index = 0): array|null
    {
        return $cache->getCacheData();
    }


    /**
     * @inheritDoc
     * @param CacheObject $cache
     * @param int $index
     * @return array|null
     */
    public function createMetadataDetails(CacheObject $cache, int $index = 0): array|null
    {
        return $cache->getCacheData();
    }

    /**
     * @inheritDoc
     * @param CacheObject $cache
     * @param int $index
     * @return array|null
     */
    public function updateMetadataDetails(CacheObject $cache, int $index = 0): array|null
    {
        return $cache->getCacheData();
    }

    public function createExtraInfo(CacheObject $cache, int $index = 0): array|null
    {
        return $cache->getCacheData();
    }


    /**
     * Restituisce true/false se una chiave session id è in cache
     * @return bool
     */
    public function isSessionIdInCache() : bool
    {
        $value = $this->getEvent()->getSessionId();
        if (is_null($value))
        {
            return false;
        }
        $key = base64_encode(sprintf('session_id_%s_%s', $value, $this->getMethodName()));
        return $this->hasInCache($key);
    }

    /**
     * Restituisce la chiave dove storicizzare tutte le chiavi della cache relative ai pagamenti impattati dal session id
     * @return string|null
     */
    public function getSessionIdCacheKey() : string|null
    {
        $value = $this->getEvent()->getSessionId();
        if (is_null($value))
        {
            return null;
        }
        return base64_encode(sprintf('session_id_%s_%s', $value, $this->getMethodName()));
    }


    /**
     * Aggiunge una chiave cache, relativa ad una lista di pagamenti, al session id dell'evento analizzato
     * @param string $key
     * @return void
     */
    public function addSessionIdInCache(string $key) : void
    {
        $session = $this->getEvent()->getSessionId();
        if (!is_null($session)) {
            if ($this->isSessionIdInCache())
            {
                // esiste già una chiave in cache con i pagamenti associati al session id
                $cache_data = $this->getFromCache($this->getSessionIdCacheKey());
                if (!in_array($key, $cache_data))
                {
                    $this->addValueCache($this->getSessionIdCacheKey(), $key, 1200);
                }
            }
            else
            {
                // non esiste una chiave in cache con i pagamenti associati al session id
                $this->addValueCache($this->getSessionIdCacheKey(), $key, 1200);
            }
        }
    }


    /**
     * Elimina una chiave $payment_key dalla lista dei pagamenti associati al session id $key
     * @param string $payment_key
     * @param string $key
     * @return void
     */
    public function deletePaymentKeyFromSessionCache(string $payment_key, string $key) : void
    {
        $value = $this->getFromCache($key);
        if (is_array($value))
        {
            // se è un array , lo ciclo ed elimino $payment_key
            $found = array_search($payment_key, $value);
            if ($found !== false)
            {
                unset($value[$found]);
            }
            if (count($value) == 0)
            {
                $this->delFromCache($key);
            }
            else
            {
                $this->setCache($key, array_values($value));
            }
        }
    }
}
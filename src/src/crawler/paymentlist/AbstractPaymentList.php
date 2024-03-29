<?php

namespace pagopa\crawler\paymentlist;

use Illuminate\Database\Capsule\Manager as DB;
use pagopa\crawler\CacheInterface;
use pagopa\crawler\EventInterface;
use pagopa\crawler\paymentlist\req\activatePaymentNotice;
use pagopa\crawler\PaymentListInterface;
use \Datetime;
use pagopa\database\sherlock\TransactionRe;

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

            foreach($events as $event)
            {
                $this->createEventInstance((array) $event);
                $this->runAnalysisSingleEvent();
            }

            //$this->runAnalysisSingleEvent();
            // commit
            // extract other events
            // init transaction

    }

    public function runAnalysisSingleEvent() : void
    {
        try {
            // aggiustare l'update dell'evento , capire se mettere il ciclo dentro o fuori la validazione
            $date_event = $this->getEvent()->getInsertedTimestamp()->format('Y-m-d');
            for($i=0;$i<$this->getEvent()->getPaymentsCount();$i++)
            {
                if ($this->isValidPayment($i))
                {
                    $iuv            = $this->getEvent()->getIuv($i);
                    $pa_emittente   = $this->getEvent()->getPaEmittente($i);
                    if ($this->isAttempt($i))
                    {
                        $token      = $this->getEvent()->getPaymentToken($i);
                        if ($this->isAttemptInCache($i))
                        {
                            $this->runAttemptAlreadyEvaluated($i);
                        }
                        else
                        {
                            $this->runCreateAttempt($i);
                        }
                    }
                    else
                    {
                        if ($this->isPaymentInCache($i))
                        {
                            $this->runPaymentAlreadyEvaluated($i);
                        }
                        else
                        {
                            $this->runCreatePayment($i);
                        }
                    }
                    $eventInstance = $this->runCompleteEvent();
                    DB::statement($eventInstance->getQuery(), $eventInstance->getBindParams());
                }
                else
                {
                    $eventInstance = $this->runRejectedEvent();
                    DB::statement($eventInstance->getQuery(), $eventInstance->getBindParams());
                }
                /*                else
            {

                if ($this->isEnableSearch())
                {
                    if ($this->isFoundOnDb($i))
                    {
                        $this->runCopyPaymentToday($i);
                        $eventInstance = $this->runCompleteEvent();
                        DB::statement($eventInstance->getQuery(), $eventInstance->getBindParams());
                    }
                    else
                    {
                        $eventInstance = $this->runRejectedEvent();
                        DB::statement($eventInstance->getQuery(), $eventInstance->getBindParams());
                    }
                }
                else
                {
                    $eventInstance = $this->runRejectedEvent();
                    DB::statement($eventInstance->getQuery(), $eventInstance->getBindParams());
                }

                }
*/
            }
        }
        catch (\Exception $e)
        {
            $rowid = $this->getEvent()->getEventRowInstance()->reject(substr($e->getMessage(), 0, 190))->update();
            DB::statement($rowid->getQuery(), $rowid->getBindParams());
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
    public function addValueCache(string $key, mixed $value): void
    {
        $this->cache->addValue($key, $value, 86400);
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
    abstract public function isAttemptInCache(int $index = 0): bool;

    /**
     * @inheritDoc
     */
    abstract public function isPaymentInCache(int $index = 0): bool;

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
    abstract public function isFoundOnDb(int $index = 0): bool;

    /**
     * @inheritDoc
     */
    abstract public function runAttemptAlreadyEvaluated(int $index = 0): void;

    /**
     * @inheritDoc
     */
    abstract public function runCreateAttempt(int $index = 0): array;

    /**
     * @inheritDoc
     */
    abstract public function runPaymentAlreadyEvaluated(int $index = 0): void;

    /**
     * @inheritDoc
     */
    abstract public function runCreatePayment(int $index = 0): array;

    /**
     * @inheritDoc
     */
    abstract public function runCopyPaymentToday(int $index = 0): void;

    /**
     * @inheritDoc
     */
    abstract public function runRejectedEvent(string $message = null): TransactionRe;

    /**
     * @inheritDoc
     */
    abstract public function runCompleteEvent(string $message = null): TransactionRe;
}
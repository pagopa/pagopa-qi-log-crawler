<?php

namespace pagopa\sert\events;

use DateMalformedStringException;
use DateTime;
use Exception;
use pagopa\sert\payload\AbstractPayload;

abstract class AbstractEvent
{

    /**
     * Definisce se l'evento crea nuove posizioni debitorie/tentativi o meno
     * @var bool
     */
    protected bool $isBornPaymentEvent = false;

    /**
     * Contiene i dati dell'evento
     * @var array
     */
    protected array $dataEvent = [];


    /**
     * Indica quali sono le chiavi necessarie per gestire l'evento
     * @var array|string[]
     */
    protected array $keyNeeded = [
        'INSERTED_TIMESTAMP',
        'TIPO_EVENTO',
        'SOTTO_TIPO_EVENTO',
        'NAV',
        'DOMINIO',
        'IUV',
        'TOKEN',
        'CCP',
        'CREDITOR_REFERENCE_ID',
        'SESSION_ID',
        'SESSION_ID_ORIGINAL',
        'UNIQUE_ID',
        'PSP',
        'STAZIONE',
        'CANALE',
        'PAYLOAD'
    ];

    /**
     * Flag che vale true/false se l'evento ha superato i check o meno
     * @var bool
     */
    protected bool $isValidEvent = true;


    /**
     * Contiene il riferimento alla classe che gestisce il payload
     * @var AbstractPayload
     */
    protected AbstractPayload $methodInstance;


    public function __construct(array $dataEvent)
    {
        $this->dataEvent = $dataEvent;
        try {
            $this->checkAllFields();
            $this->checkPayload();
            $this->createMethodInstance();
        }
        catch (Exception $e)
        {
            $this->isValidEvent = false;
        }
    }

    /**
     * Verifica che tutte le chiavi necessarie siano presenti nell'evento
     * @return void
     * @throws Exception
     */
    private function checkAllFields() : void
    {
        foreach($this->keyNeeded as $key)
        {
            if (!array_key_exists($key, $this->dataEvent))
            {
                throw new Exception(sprintf("Key %s not found", $key));
            }
        }
    }

    /**
     * Verifica se esiste una classe per gestire il payload dell'evento
     * @return void
     * @throws Exception
     */
    private function checkPayload() : void
    {
        $sub = $this->getSottoTipoEvento();
        $method = $this->getTipoEvento();
        $className = sprintf('%s\\%s\\%s', '\pagopa\sert\payload\methods', $sub, $method);
        if (!class_exists($className))
        {
            throw new Exception(sprintf("Class for payload %s not found", $method));
        }
    }

    private function createMethodInstance() : void
    {
        $sub = $this->getSottoTipoEvento();
        $method = $this->getTipoEvento();
        $className = sprintf('%s\\%s\\%s', '\pagopa\sert\payload\methods', $sub, $method);
        $this->methodInstance = new $className(base64_decode($this->dataEvent['PAYLOAD']));
    }

    /**
     * Restituisce il valore di una colonna dell'evento
     * Se la colonna non esiste, oppure esiste ma il valore è vuoto, restituisce null
     * @param string $column
     * @return string|null
     */
    public function getColumn(string $column) : string|null
    {
        if (!array_key_exists($column, $this->dataEvent))
        {
            return null;
        }
        if (empty($this->dataEvent[$column]))
        {
            return null;
        }
        return $this->dataEvent[$column];
    }

    /**
     * Restituisce il valore del tipo evento
     * @return string
     */
    public function getTipoEvento() : string
    {
        return $this->getColumn('TIPO_EVENTO');
    }

    /**
     * Restituisce il valore del sotto tipo evento
     * @return string
     */
    public function getSottoTipoEvento() : string
    {
        return $this->getColumn('SOTTO_TIPO_EVENTO');
    }


    /**
     * Restituisce la data INSERTED_TIMESTAMP in formato DateTime
     * @return DateTime|null
     * @throws DateMalformedStringException
     */
    public function getInsertedTimestamp() : DateTime|null
    {
        if (is_null($this->getColumn('INSERTED_TIMESTAMP')))
        {
            return null;
        }
        return new DateTime($this->getColumn('INSERTED_TIMESTAMP'));
    }

    /**
     * Restituisce la data dell'evento in formato Y-m-d
     * @return string
     * @throws DateMalformedStringException
     */
    public function getDateEvent() : string
    {
        return $this->getInsertedTimestamp()->format('Y-m-d');
    }


    /**
     * Restituisce il valore del campo NAV. Se vuoto, restituisce null
     * @return string|null
     */
    public function getNoticeNumber() : string|null
    {
        return $this->getColumn('NAV');
    }

    /**
     * Restituisce il valore del campo DOMINIO. Se vuoto, restituisce null
     * @return string|null
     */
    public function getPaEmittente() : string|null
    {
        return $this->getColumn('DOMINIO');
    }

    /**
     * Restituisce il valore del campo CCP. Se vuoto, restituisce null
     * @return string|null
     */
    public function getCcp() : string|null
    {
        return $this->getColumn('CCP');
    }


    /**
     * Restituisce il valore del campo IUV. Se vuoto, restituisce null
     * @return string|null
     */
    public function getIuv() : string|null
    {
        return $this->getColumn('IUV');
    }

    /**
     * Restituisce il valore del campo TOKEN. Se vuoto, restituisce null
     * @return string|null
     */
    public function getToken() : string|null
    {
        return $this->getColumn('TOKEN');
    }

    /**
     * Restituisce il valore del campo CREDITOR_REFERENCE_ID. Se vuoto, restituisce null
     * @return string|null
     */
    public function getCreditReferenceId() : string|null
    {
        return $this->getColumn('CREDITOR_REFERENCE_ID');
    }

    /**
     * Restituisce il valore del campo SESSION_ID. Se vuoto, restituisce null
     * @return string|null
     */
    public function getSessionId() : string|null
    {
        return $this->getColumn('SESSION_ID');
    }

    /**
     * Restituisce il valore del campo SESSION_ID_ORIGINAL. Se vuoto, restituisce null
     * @return string|null
     */
    public function getSessionIdOriginal() : string|null
    {
        return $this->getColumn('SESSION_ID_ORIGINAL');
    }

    /**
     * Restituisce il valore del campo UNIQUE_ID. Se vuoto, restituisce null
     * @return string
     */
    public function getUniqueId() : string
    {
        return $this->getColumn('UNIQUE_ID');
    }

    /**
     * Restituisce il valore del campo PSP. Se vuoto, restituisce null
     * @return string
     */
    public function getPsp() : string
    {
        return $this->getColumn('PSP');
    }

    /**
     * Restituisce il valore del campo STAZIONE. Se vuoto, restituisce null
     * @return string
     */
    public function getStazione() : string
    {
        return $this->getColumn('STAZIONE');
    }

    /**
     * Restituisce il valore del campo CANALE. Se vuoto, restituisce null
     * @return string
     */
    public function getCanale() : string
    {
        return $this->getColumn('CANALE');
    }


    /**
     * Restituisce l'istanza della classe che gestisce il payload dell'evento
     * @return \pagopa\sert\payload\AbstractPayload
     */
    public function getPayload() : AbstractPayload
    {
        return $this->methodInstance;
    }

    /**
     * Fornisce una nuova istanza dell'evento in base ai dati forniti
     * @param array $dataEvent
     * @return AbstractEvent
     * @throws Exception
     */
    public static function getInstance(array $dataEvent) : AbstractEvent
    {
        if ((!array_key_exists('TIPO_EVENTO', $dataEvent)) || (!array_key_exists('SOTTO_TIPO_EVENTO', $dataEvent)))
        {
            throw new Exception("Missing key TIPO_EVENTO or SOTTO_TIPO_EVENTO");
        }
        $method = $dataEvent['TIPO_EVENTO'];
        $sub = $dataEvent['SOTTO_TIPO_EVENTO'];
        $className = sprintf('%s\\%s\\%s', '\pagopa\sert\events', $sub, $method);
        return new $className($dataEvent);
    }


    /**
     * Restituisce true/false se l'evento è valido o meno
     * @return bool
     */
    public function isValidEvent() : bool
    {
        return $this->isValidEvent;
    }

    /**
     * Restituisce true/false se l'evento può creare nuove posizioni debitorie
     * @return bool
     */
    public function isBornEvent() : bool
    {
        return $this->isBornPaymentEvent;
    }

    /**
     * Restituisce tutti i notice number impattati dall'evento.
     * Il metodo chiede all'istanza che gestisce l'evento i valori. Se non esistono, restituisce un array con il singolo valore della colonna NAV.
     * Se la colonna NAV è vuota, restituisce null.
     * @return array|null
     */
    public function getAllNoticeNumber() : array|null
    {
        if (is_null($this->getNoticeNumber()))
        {
            return (is_null($this->getPayload()->getNoticeNumber())) ? null : [$this->getPayload()->getNoticeNumber()];
        }
        return [$this->getNoticeNumber()];
    }

    /**
     * Restituisce tutti gli iuv impattati dall'evento.
     * Il metodo chiede all'istanza che gestisce l'evento i valori. Se non esistono, restituisce un array con il singolo valore della colonna IUV.
     * Se la colonna IUV è vuota, restituisce null.
     * @return array|null
     */
    public function getIuvs() : array|null
    {
        if (is_null($this->getIuv()))
        {
            return (is_null($this->getPayload()->getIuv())) ? null : [$this->getPayload()->getIuv()];
        }
        return [$this->getIuv()];
    }

    /**
     * Restituisce tutte le pa emittenti impattate dall'evento.
     * Il metodo chiede all'istanza che gestisce l'evento i valori. Se non esistono, restituisce un array con il singolo valore della colonna DOMINIO.
     * Se la colonna DOMINIO è vuota, restituisce null.
     * @return array|null
     */
    public function getPaEmittenti() : array|null
    {
        if (is_null($this->getPaEmittente()))
        {
            return (is_null($this->getPayload()->getPaEmittente())) ? null : [$this->getPayload()->getPaEmittente()];
        }
        return [$this->getPaEmittente()];
    }

    /**
     * Restituisce tutti i ccp impattati dall'evento.
     * Il metodo chiede all'istanza che gestisce l'evento i valori. Se non esistono, restituisce un array con il singolo valore della colonna CCP.
     * Se la colonna CCP è vuota, restituisce null.
     * @return array|null
     */
    public function getCcps() : array|null
    {
        if (is_null($this->getCcp()))
        {
            return (is_null($this->getPayload()->getCcp())) ? null : [$this->getPayload()->getCcp()];
        }
        return [$this->getCcp()];
    }

    /**
     * Restituisce tutti i token impattati dall'evento.
     * Il metodo chiede all'istanza che gestisce l'evento i valori. Se non esistono, restituisce un array con il singolo valore della colonna TOKEN.
     * Se la colonna TOKEN è vuota, restituisce null.
     * @return array|null
     */
    public function getTokens() : array|null
    {
        if (is_null($this->getToken()))
        {
            return (is_null($this->getPayload()->getToken())) ? null : [$this->getPayload()->getToken()];
        }
        return [$this->getToken()];
    }


    /**
     * Restituisce il numero di pagamenti gestiti dall'evento
     * @return int
     */
    public function getPaymentCount() : int
    {
        return 1;
    }
}
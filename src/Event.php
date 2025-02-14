<?php

namespace pagopa\sert;

use DateTime;
use pagopa\sert\payload\RequestJson;
use pagopa\sert\payload\RequestXML;
use pagopa\sert\payload\ResponseJson;
use pagopa\sert\payload\ResponseXML;

/**
 * <p>Classe che serve a gestire i dati di un singolo evento</p>
 * <p>L'evento è gestito come un array di coppie chiave=>valore</p>
 */
class Event
{

    /**
     * <p>Dati del singolo evento</p>
     * @var array|mixed
     */
    protected array $eventData;

    public function __construct($eventData = array())
    {
        $this->eventData = array_change_key_case($eventData, CASE_LOWER);
    }

    /**
     * <p>Restituisce il valore di un singolo campo dell'evento</p>
     * @param string $column <p>Nome del campo dell'evento</p>
     * @return string|null <p><code>null</code> Se il campo non esiste</p>
     */
    public function getColumnValue(string $column) : string|null
    {
        $column = strtolower($column);
        return (array_key_exists($column, $this->eventData)) ? $this->eventData[$column] : null;
    }

    /**
     * <p>Restituisce il campo insertedTimestamp in formato DateTime</p>
     * @return DateTime|null <p><code>null</code> se il campo non esiste o non è un formato <code>DateTime</code> valido</p>
     * @see DateTime
     */
    public function getInsertedTimestamp() : DateTime|null
    {
        $value = $this->getColumnValue('insertedTimestamp');
        try {
            return new \DateTime($value);
        }
        catch (\DateMalformedStringException $e) {
            return null;
        }
    }
    public function getEventData() : string|null
    {
        $date = $this->getInsertedTimestamp();
        return (is_null($date)) ? null : $date->format('Y-m-d');
    }

    public function getCategoriaEvento() : string|null
    {
        return $this->getColumnValue('categoriaEvento');
    }

    public function getTipoEvento() : string|null
    {
        return $this->getColumnValue('tipoEvento');
    }

    public function getSottoTipoEvento() : string|null
    {
        return $this->getColumnValue('sottoTipoEvento');
    }

    public function getNav() : string|null
    {
        return $this->getColumnValue('noticeNumber');
    }

    public function getPaEmittente() : string|null
    {
        return $this->getColumnValue('idDominio');
    }

    public function getIuv() : string|null
    {
        return $this->getColumnValue('iuv');
    }

    public function getCreditorReferenceId() : string|null
    {
        return $this->getColumnValue('creditorReferenceId');
    }

    public function getCcp() : string|null
    {
        return $this->getColumnValue('ccp');
    }

    public function getToken() : string|null
    {
        return $this->getColumnValue('paymentToken');
    }

    public function getStation() : string|null
    {
        return $this->getColumnValue('stazione');
    }

    public function getChannel() : string|null
    {
        return $this->getColumnValue('canale');
    }

    public function getPsp() : string|null
    {
        return $this->getColumnValue('psp');
    }

    public function getSessionIdOriginal() : string|null
    {
        return $this->getColumnValue('sessionIdOriginal');
    }

    public function getUniqueId() : string|null
    {
        return $this->getColumnValue('uniqueId');
    }

    public function getPayLoad() : string|null
    {
        $payload = $this->getColumnValue('payload');
        return (is_null($payload)) ? null : base64_decode($payload);
    }


}
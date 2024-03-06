<?php
/**
 * Questa classe rappresenta il singolo evento in analisi
 */
namespace pagopa\crawler;

use pagopa\database\sherlock\Transaction;
use pagopa\methods\MethodInterface;

interface EventInterface
{

    /**
     * Restituisce il valore della colonna $column nell'evento
     * @param string $column
     * @return string|null
     */
    public function getColumn(string $column) : string|null;


    /**
     * Restituisce la data dell'evento
     * @return \DateTime
     */
    public function getInsertedTimestamp() : \DateTime;


    /**
     * Restituisce il tipo evento
     * @return string
     */
    public function getTipoEvento() : string;


    /**
     * Restituisce il sotto tipo evento (REQ, RESP, INTERN))
     * @return string
     */
    public function getSottoTipoEvento() : string;


    /**
     * Restituisce l'i-esimo dominio dell'evento
     * @param int $index
     * @return string|null
     */
    public function getPaEmittente(int $index = 0) : string|null;


    /**
     * Restituisce l'i-esimo iuv dell'evento
     * @param int $index
     * @return string|null
     */
    public function getIuv(int $index = 0) : string|null;


    /**
     * Restituisce l'i-esimo ccp/token dell'evento
     * @param int $index
     * @return string|null
     */
    public function getCcp(int $index = 0) : string|null;


    /**
     * Restituisce l'i-esimo notice number dell'evento (per i carrelli modello unico)
     * @param int $index
     * @return string|null
     */
    public function getNoticeNumber(int $index = 0) : string|null;


    /**
     * Restituisce l'i-esimo creditorReferenceId dell'evento
     * @param int $index
     * @return string|null
     */
    public function getCreditorReferenceId(int $index = 0) : string|null;


    /**
     * Restituisce l'i-esimo paymenttoken dell'evento
     * @param int $index
     * @return string|null
     */
    public function getPaymentToken(int $index = 0) : string|null;


    /**
     * Restituisce il PSP dell'evento
     * @return string|null
     */
    public function getPsp() : string|null;


    /**
     * Restituisce la stazione dell'evento
     * @return string|null
     */
    public function getStazione() : string|null;


    /**
     * Restituisce il canale dell'evento
     * @return string|null
     */
    public function getCanale() : string|null;


    /**
     * Ricava l'id broker pa dalla stazione
     * @return string|null
     */
    public function getBrokerPa() : string|null;


    /**
     * Ricava l'id broker psp dalla stazione
     * @return string|null
     */
    public function getBrokerPsp() : string|null;


    /**
     * Restituisce l'id sessione dell'evento
     * @return string|null
     */
    public function getSessionId() : string|null;


    /**
     * Restituisce l'id session originale
     * @return string|null
     */
    public function getSessionIdOriginal() : string|null;

    /**
     * Restituisce l'id univoco dell'evento
     * @return string|null
     */
    public function getUniqueId() : string|null;


    /**
     * Restituisce il payload
     * @return string|null
     */
    public function getPayload() : string|null;


    /**
     * Restituisce il numero di pagamenti gestiti dall'evento
     * @return int
     */
    public function getPaymentsCount() : int;


    /**
     * Restituisce la lista degli IUV del carrello associato all'evento
     * @return array
     */
    public function getIuvs() : array;


    /**
     * Restituisce la lista delle PA Emittenti del carrello associato all'evento
     * @return array
     */
    public function getPaEmittenti() : array;


    /**
     * Restituisce la lista dei ccp del carrello associato all'evento
     * @return array
     */
    public function getCcps() : array;


    /**
     * Restituisce l'id del carrello
     * @return string
     */
    public function getIdCarrello() : string;


    /**
     * Restituisce una chiave utile per storicizzare i dati in cache
     * @param int $index
     * @return string
     */
    public function getKey(int $index = 0) : string;


    /**
     * Restituisce una istanza transaction per salvare la transazione sul db
     * @param int $index
     * @return Transaction|null
     */
    public function transaction(int $index = 0) : Transaction|null;


    /**
     * Restituisce true/false se la transazione i-esima del carrello contiene elementi sufficienti
     * @param int $index
     * @return bool
     */
    public function isValid(int $index = 0) : bool;


    /**
     * Restituisce l'istanza che gestisce il payload dell'evento
     * @return MethodInterface
     */
    public function getMethodInterface() : MethodInterface;

}
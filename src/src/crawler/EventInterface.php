<?php
/**
 * Questa classe rappresenta il singolo evento in analisi
 */
namespace pagopa\crawler;

use pagopa\crawler\methods\MethodInterface;
use pagopa\database\sherlock\Transaction;
use pagopa\database\sherlock\TransactionDetails;
use pagopa\database\sherlock\TransactionRe;
use pagopa\database\sherlock\Workflow;

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
     * @return int|null
     */
    public function getPaymentsCount() : int|null;


    /**
     * Restituisce il numero di versamenti dell'iesimo pagamento del carrello
     * @param int $index
     * @return int|null
     */
    public function getTransferCount(int $index = 0) : int|null;


    /**
     * Restituisce la lista degli IUV del carrello associato all'evento
     * @return array|null
     */
    public function getIuvs() : array|null;


    /**
     * Restituisce la lista delle PA Emittenti del carrello associato all'evento
     * @return array|null
     */
    public function getPaEmittenti() : array|null;


    /**
     * Restituisce la lista dei ccp del carrello associato all'evento
     * @return array
     */
    public function getCcps() : array|null;


    /**
     * Restituisce l'id del carrello
     * @return string|null
     */
    public function getIdCarrello() : string|null;

    /**
     * Restituisce una istanza transaction per salvare la transazione sul db
     * @param int $index
     * @return Transaction|null
     */
    public function transaction(int $index = 0) : Transaction|null;

    /**
     * Restituisce una istanza per l'inserimento/aggiornamento nella transaction update
     * @param int $transfer
     * @param int $index
     * @return TransactionDetails|null
     */
    public function transactionDetails(int $transfer, int $index = 0) : TransactionDetails|null;


    /**
     * Restituisce una istanza per l'inserimento nella transaction events
     * @param int $index
     * @return Workflow|null
     */
    public function workflowEvent(int $index = 0) : Workflow|null;

    /**
     * Restituisce l'istanza che gestisce il payload dell'evento
     * @return MethodInterface
     */
    public function getMethodInterface() : MethodInterface;


    /**
     * Restituisce l'istanza SingleRow che gestisce l'evento sul db
     * @return TransactionRe
     */
    public function getEventRowInstance() : TransactionRe;


    /**
     * Restituisce la chiave cache dove sono presenti tutti pagamenti impattati da questo evento
     * @return string
     */
    public function getCacheKeyPayment(int $index = 0) : string|null;


    /**
     * Restituisce la chiave cache dove sono presenti tutti i pagamenti impattati da questo tentativo associato all'evento
     * @return string
     */
    public function getCacheKeyAttempt(int $index = 0) : string|null;


    /**
     * Restituisce la lista di chiavi dove andare a memorizzare le chiavi associate ai pagamenti gestiti dall'evento
     * @return array
     */
    public function getCacheKeyList() : array;



    /**
     * Restituisce true/false se un evento impatta un carrello di pagamenti
     * @return bool
     */
    public function isCartEvent() : bool;


    /**
     * Restituisce true/false se l'evento ha la struttura faultBean
     * @return bool
     */
    public function isFaultEvent() : bool;

    /**
     * Restituisce il faultCode
     * @return string|null
     */
    public function getFaultCode() : string|null;


    /**
     * Restituisce il faultString
     * @return string|null
     */
    public function getFaultString() : string|null;


    /**
     * Restituisce il faultDescription
     * @return string|null
     */
    public function getFaultDescription() : string|null;


    /**
     * Restituisce true/false se il payload è valido (check del formato json/xml)
     * @return bool
     */
    public function isValidPayload() : bool;


}
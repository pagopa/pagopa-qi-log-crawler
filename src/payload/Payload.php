<?php


namespace pagopa\sert\payload;


interface Payload
{


    /**
     * Restituisce il numero di pagamenti gestiti da questo payload
     * @return int|null
     */
    public function getPaymentsCount() : int|null;

    /**
     * Restituisce la lista degli iuv gestiti da questo payload.
     * Restituisce null se il payload non permette di ricavare il dato
     * @return array|null
     */
    public function getIuvs() : array|null;


    /**
     * Restituisce la lista delle pa emittenti gestiti da questo payload
     * Restituisce null se il payload non permette di ricavare il dato
     * @return array|null
     */
    public function getPaEmittenti() : array|null;

    /**
     * Restituisce la lista dei ccp gestiti da questo payload
     * Restituisce null se il payload non permette di ricavare il dato
     * @return array|null
     */
    public function getCcps() : array|null;

    /**
     * Restituisce la lista dei token gestiti da questo payload
     * Restituisce null se il payload non permette di ricavare il dato
     * @return array|null
     */
    public function getAllTokens() : array|null;


    /**
     * Restituisce la lista dei notice number gestiti da questo payload
     * Restituisce null se il payload non permette di ricavare il dato
     * @return array|null
     */
    public function getAllNoticesNumbers() : array|null;

    /**
     * Restituisce l'i-esimo iuv presente nel payload.
     * Restituisce null se non vi è la presenza del dato nel payload
     * @param int $index
     * @return string|null
     */
    public function getIuv(int $index = 0) : string|null;


    /**
     * Restituisce l'i-esima pa emittente presente nel payload.
     * Restituisce null se non vi è la presenza del dato nel payload
     * @param int $index
     * @return string|null
     */
    public function getPaEmittente(int $index = 0) : string|null;



    /**
     * Restituisce l'i-esimo ccp presente nel payload
     * Restituisce null se non vi è la presenza del dato nel payload
     * @param int $index
     * @return string|null
     */
    public function getCcp(int $index = 0) : string|null;


    /**
     * Restituisce l'i-esimo token presente nel payload
     * Restituisce null se non vi è la presenza del dato nel payload
     * @param int $index
     * @return string|null
     */
    public function getToken(int $index = 0) : string|null;

    /**
     * Restituisce l'i-esimo notice number presente nel payload
     * Restituisce null se non vi è la presenza del dato nel payload
     * @param int $index
     * @return string|null
     */
    public function getNoticeNumber(int $index = 0): string|null;


    /**
     * Restituisce l'importo totale del pagamento. Se è un carrello, restituisce l'importo totale del carrello
     * @return string|null
     */
    public function getImportoTotale() : string|null;

    /**
     * Restituisce l'importo totale del singolo pagamento del carrello. Se l'evento non tratta un carrello, è uguale a getImportoTotale())
     * @param int $index
     * @return string|null
     */
    public function getImporto(int $index = 0) : string|null;


    /**
     * Restituisce l'importo del transfer alla posizione $transfer del pagamento alla posizione $index del carrello.
     * Se l'evento non gestisce un carrello, $index viene ignorato
     * @param int $transfer
     * @param int $index
     * @return string|null
     */
    public function getTransferAmount(int $transfer = 0, int $index = 0) : string|null;


    /**
     * Restituisce la pa del transfer alla posizione $transfer del pagamento alla posizione $index del carrello.
     * Se l'evento non gestisce un carrello, $index viene ignorato
     * @param int $transfer
     * @param int $index
     * @return string|null
     */
    public function getTransferPa(int $transfer = 0, int $index = 0) : string|null;


    /**
     * Restituisce l'iban del transfer alla posizione $transfer del pagamento alla posizione $index del carrello
     * Se l'evento non gestisce un carrello, $index viene ignorato
     * @param int $transfer
     * @param int $index
     * @return string|null
     */
    public function getTransferIban(int $transfer = 0, int $index = 0) : string|null;


    /**
     * Restituisce l'id transfer alla posizione $transfer del pagamento alla posizione $index
     * del carrello. Se l'evento non gestisce un carrello, $index viene ignorato
     * @param int $transfer
     * @param int $index
     * @return string|null
     */
    public function getTransferId(int $transfer = 0, int $index = 0) : string|null;


    /**
     * Restituisce il numero di transfer dell'iesimo pagamento gestito dal metodo
     * @param int $index
     * @return int|null
     */
    public function getTransferCount(int $index = 0) : int|null;



    /**
     * Restituisce true/false se il transfer alla posizione $transfer del pagamento alla posizione $index del carrello è relativo ad un versamento di marca da bollo o meno
     * true => indica che è un versamento per marca da bollo
     * false => indica che non è un versamento per marca da bollo
     * @param int $transfer
     * @param int $index
     * @return bool
     */
    public function isBollo(int $transfer = 0, int $index = 0) : bool;



    /**
     * Restituisce l'id psp prelevandolo dal payload, se presente
     * @return string|null
     */
    public function getPsp() : string|null;


    /**
     * Restituisce il broker PSP prelevandolo dal payload, se presente
     * @return string|null
     */
    public function getBrokerPsp() : string|null;


    /**
     * Restituisce il canale prelevandolo dal payload, se presente
     * @return string|null
     */
    public function getCanale() : string|null;



    /**
     * Restituisce il broker pa prelevandola dal payload, se presente
     * @return string|null
     */
    public function getBrokerPa() : string|null;

    /**
     * Restituisce la stazione prelevandola dal payload, se presente
     * @return string|null
     */
    public function getStazione() : string|null;


    /**
     * Restituisce ok/ko se l'outcome per i metodi che prevedono outcome
     * Restituisce ok/ko per i metodi che non prevedono un outcome ma hanno un faultCode
     * @return string|null
     */
    public function outcome() : string|null;


    /**
     * Restituisce il numero di metadata del pagamento
     * @param int $index
     * @return string|null
     */
    public function getPaymentMetaDataCount(int $index = 0) : string|null;


    /**
     * Restituisce il metadata alla posizione $metaKey del pagamento $index gestito dall'evento
     * @param int $metaKey
     * @param int $index
     * @return string|null
     */
    public function getPaymentMetaDataKey(int $metaKey = 0, int $index = 0) : string|null;

    /**
     * Restituisce il valore del metadata alla posizione $metakey del pagamento $index gestito dall'evento
     * @param int $metaKey
     * @param int $index
     * @return string|null
     */
    public function getPaymentMetaDataValue(int $metaKey = 0, int $index = 0) : string|null;


    /**
     * Restituisce il numero di metadata del transfer $transfer relativo al pagamento $index gestito dall'evento
     * @param int $transfer
     * @param int $index
     * @return string|null
     */
    public function getTransferMetaDataCount(int $transfer = 0, int $index = 0) : string|null;

    /**
     * Restituisce la chiave del metadata alla posizione $metakey del pagamento $index gestito dall'evento relativo al transfer numero $transfer
     * @param int $metaKey
     * @param int $transfer
     * @param int $index
     * @return string|null
     */
    public function getTransferMetaDataKey(int $metaKey = 0, int $transfer = 0, int $index = 0) : string|null;

    /**
     * Restituisce il valore del metadata alla posizione $metakey del pagamento $index gestito dall'evento relativo al transfer numero $transfer
     * @param int $metaKey
     * @param int $transfer
     * @param int $index
     * @return string|null
     */
    public function getTransferMetaDataValue(int $metaKey = 0, int $transfer = 0, int $index = 0) : string|null;
}
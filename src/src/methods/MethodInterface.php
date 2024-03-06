<?php
/**
 * Interfaccia che definisce i metodi per ricavare dai da un payload
 */
namespace pagopa\methods;

interface MethodInterface
{

    /**
     * Restituisce la lista degli iuv (nel caso di carrello) altrimenti un array con dentro un solo iuv
     * Restituisce null se il payload non permette di ricavare il dato
     * @return array|null
     */
    public function getIuvs() : array|null;


    /**
     * Restituisce la lista delle pa emittenti (nel caso di carrello) altrimenti un array con dentro una sola pa emittente
     * Restituisce null se il payload non permette di ricavare il dato
     * @return array|null
     */
    public function getPaEmittenti() : array|null;


    /**
     * Restituisce la lista dei ccp (nel caso di carrello) altrimenti un array con dentro un solo ccp
     * Restituisce null se il payload non permette di ricavare il dato
     * @return array|null
     */
    public function getCcps() : array|null;

    /**
     * Restituisce la lista dei token (nel caso di carrello) altrimenti un array con dentro un solo token
     * Restituisce null se il payload non permette di ricavare il dato
     * @return array|null
     */
    public function getAllTokens() : array|null;


    /**
     * Restituisce la lista dei notice number (nel caso di carrello) altrimenti un array con dentro un solo notice number
     * Restituisce null se il payload non permette di ricavare il dato
     * @return array|null
     */
    public function getAllNoticesNumbers() : array|null;


    /**
     * Restituisce l'i-esimo iuv del carrello. Se l'evento gestisce un solo pagamento, restituisce il singolo iuv
     * Restituisce null se non vi è la presenza del dato nel payload
     * @param int $index
     * @return string|null
     */
    public function getIuv(int $index = 0) : string|null;

    /**
     * Restituisce l'i-esima pa emittente del carrello. Se l'evento gestisce un solo pagamento, restituisce la singola pa emittente
     * Restituisce null se non vi è la presenza del dato nel payload
     * @param int $index
     * @return string|null
     */
    public function getPaEmittente(int $index = 0) : string|null;


    /**
     * Restituisce l'i-esimo ccp del carrello. Se l'evento gestisce un solo pagamento, restituisce il singolo ccp
     * Restituisce null se non vi è la presenza del dato nel payload
     * @param int $index
     * @return string|null
     */
    public function getCcp(int $index = 0) : string|null;


    /**
     * Restituisce l'i-esimo token del carrello. Se l'evento gestisce un solo pagamento, restituisce il singolo token
     * Restituisce null se non vi è la presenza del dato nel payload
     * Assume lo stesso comportamento di getCcp()
     * @param int $index
     * @return string|null
     */
    public function getToken(int $index = 0) : string|null;


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
     * Restituisce true/false se il transfer alla posizione $transfer del pagamento alla posizione $index del carrello è relativo ad un versamento di marca da bollo o meno
     * true => indica che è un versamento per marca da bollo
     * false => indica che non è un versamento per marca da bollo
     * @param int $transfer
     * @param int $index
     * @return bool
     */
    public function isBollo(int $transfer = 0, int $index = 0) : bool;





}
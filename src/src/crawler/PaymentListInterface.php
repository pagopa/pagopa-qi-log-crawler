<?php

namespace pagopa\crawler;

use pagopa\database\sherlock\TransactionRe;

/**
 * Questa interfaccia gestisce l'analisi di un blocco di eventi della stessa tipologia (es. tutte activatePaymentNotice Request, tutte nodoInviaCarrello Req, tutte pspNotifyPayment Response, etc)
 *
 * Si basa su due concetti, Attempt e Payment
 * Attempt sta a indicare un evento che rappresenta un tentativo riuscito di pagamento, ovvero nell'evento + payload ci sono tutte le informazioni utili per risalire ad un evento di pagamento (iuv+cf+token+data)
 * Payment sta a indicare un evento che rappresenta un tentativo non riuscito di pagamento, ovvero nell'evento + payload ci sono solo le informazioni utili a riconoscere il pagamento (iuv+cf) ma non un token
 */

interface PaymentListInterface
{


    /**
     * Configura il nome dell'evento da analizzare
     * @param string $method
     * @return void
     */
    public function setMethodName(string $method) : void;


    /**
     * Restituisce il nome dell'evento analizzato dall'istanza
     * @return string
     */
    public function getMethodName(): string;


    /**
     * Configura il tipo di evento (REQ, RESP, INTERN)
     * @param string $type
     * @return void
     */
    public function setType(string $type) : void;


    /**
     * Restituisce il tipo di evento
     * @return string
     */
    public function getType() : string;


    /**
     * Definisce il limite di eventi da analizzare per ogni blocco
     * @return int
     */
    public function getLimit() : int;


    /**
     * Restituisce la giornata da analizzare
     * @return \DateTime
     */
    public function getDate() : \DateTime;


    /**
     * Configura l'istanza per cercare o meno le informazioni di una transazione sul db
     * @param bool $search_on_db
     * @return void
     */
    public function setSearchOnDb(bool $search_on_db = false) : void;


    /**
     * Configura l'istanza che si occuperà di gestire la cache
     * @param CacheInterface $cache
     * @return void
     */
    public function setCacheManager(CacheInterface $cache) : void;


    /**
     * Restituisce l'istanza che rappressenta l'evento in analisi
     * @return EventInterface
     */
    public function getEvent() : EventInterface;


    /**
     * Configura l'evento attualmente in analisi
     * @param EventInterface $event
     * @return void
     */
    public function setEvent(EventInterface $event) : void;


    /**
     * Crea l'istanza Evento
     * @param array $eventData
     * @return void
     */
    public function createEventInstance(array $eventData) : void;


    /**
     * Avvia l'analisi
     * @return void
     */
    public function run() : void;



    /**
     * Restituisce true/false se la chiave $key è presente in cache
     * @return bool
     */
    public function hasInCache(string $key) : bool;


    /**
     * Restituisce il valore della chiave $key presente in cache
     * @param string $key
     * @return mixed
     */
    public function getFromCache(string $key) : mixed;


    /**
     * Memorizza in cache la coppia $key=$value
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function setCache(string $key, mixed $value) : void;


    /**
     * Rimuove una chiave dalla cache
     * @param string $key
     * @return void
     */
    public function delFromCache(string $key) : void;


    /**
     * Aggiunge un elemento all'array in cache alla chiave $key
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function addValueCache(string $key, mixed $value) : void;


    /**
     * Restituisce true/false se ci sono i dati minimi per gestire un evento di Pagamento
     * @param int $index
     * @return bool
     */
    public function isValidPayment(int $index = 0) : bool;


    /**
     * Restituisce true/false se ci sono i dati utili per gestire un evento di Tentativo di Pagamento
     * @param int $index
     * @return bool
     */
    public function isAttempt(int $index = 0) : bool;


    /**
     * Restituisce true/false se il tentativo di pagamento è in cache
     * @param int $index
     * @return bool
     */
    public function isAttemptInCache(int $index = 0) : bool;


    /**
     * Restituisce true/false se il Pagamento è in cache
     * @param int $index
     * @return bool
     */
    public function isPaymentInCache(int $index = 0) : bool;


    /**
     * Restituisce true/false se è abilitata la ricerca sul DB per questo genere di eventi
     * @return bool
     */
    public function isEnableSearch() : bool;


    /**
     * Restituisce true/false se è stato trovato il Payment sul DB
     * @param int $index
     * @return bool
     */
    public function isFoundOnDb(int $index = 0) : bool;


    /**
     * Questo metodo viene eseguito quando vengono soddisfatte le seguenti condizioni (in cascata)
     *  Evento Valido
     *      Rappresenta un tentativo
     *          Il tentativo è in cache, ovvero ho già creato un tentativo di pagamento nella giornata odierna
     * @param int $index
     * @return void
     */
    public function runAttemptAlreadyEvaluated(int $index = 0) : void;


    /**
     * <p>Questo metodo viene eseguito quando vengono soddisfatte le seguenti condizioni (in cascata)</p>
     * <p>Evento Valido</p>
     * <p>Rappresenta un tentativo</p>
     * <p>Il tentativo non è in cache per la giornata odierna, quindi è la prima volta che vedo questo tentativo</p>
     *
     * <p>Restituisce un array nel seguente formato</p>
     * <code>
     *  [
     *   'date_event'   => <data_evento> // Rappresenta la data del tentativo
     *   'iuv'          => <iuv> // Rappresenta lo iuv del tentativo
     *   'pa_emittente' => <pa_emittente> // Rappresenta la pa emittente del tentativo
     *   'token_ccp'    => <token> // Rappresenta il token/ccp del tentativo
     *   'id'           => <id> // Rappresenta l'id univoco sulla tabella Transaction
     *  ]
     * </code>
     * @param int $index
     * @return array
     */
    public function runCreateAttempt(int $index = 0) : array;


    /**
     * Questo metodo viene eseguito quando vengono soddisfatte le seguenti condizioni
     *  Evento Valido
     *     Non rappresenta un tentativo
     *         Il Pagamento è in cache
     * @param int $index
     * @return void
     */
    public function runPaymentAlreadyEvaluated(int $index = 0) : void;


    /**
     *  <p>Questo metodo viene eseguito quando vengono soddisfatte le seguenti condizioni</p>
     *  <p>1. Evento Valido</p>
     *  <p>2. Non rappresenta un tentativo</p>
     *  <p>3. Il pagamento non è in cache</p>
     *
     *  <p>Restituisce un array nel seguente formato</p>
     *  <code>
     *   [
     *    'date_event'   => <data_evento> // Rappresenta la data del tentativo
     *    'iuv'          => <iuv> // Rappresenta lo iuv del tentativo
     *    'pa_emittente' => <pa_emittente> // Rappresenta la pa emittente del tentativo
     *    'id'           => <id> // Rappresenta l'id univoco sulla tabella Transaction
     *   ]
     *  </code>
     * @return array
     * /
     */
    public function runCreatePayment(int $index = 0) : array;


    /**
     * Questo metodo viene eseguito quando vengono soddisfatte le seguenti condizioni
     *  Evento non valido
     *      Ricerca abilitata
     *          Trovato su DB
     * @param int $index
     * @return void
     */
    public function runCopyPaymentToday(int $index = 0) : void;


    /**
     * Questo metodo viene eseguito quando vengono soddisfatte le seguenti condizioni
     *  Evento non valido
     *      Ricerca abilitata
     *          Non trovato su DB
     *
     *  oppure quando vengono soddisfatte le seguenti condizioni
     *  Evento non valido
     *      Ricerca non abilitata
     * @param string|null $message
     * @return TransactionRe
     */
    public function runRejectedEvent(string $message = null) : TransactionRe;


    /**
     * Questo evento viene eseguito quando l'evento è stato l'evento è stato correttamente caricato
     * @param string|null $message
     * @return TransactionRe
     */
    public function runCompleteEvent(string $message = null) : TransactionRe;


    /**
     * Restituisce true/false se l'evento può creare transazioni
     * @return bool
     */
    public function isCreateTransactionEvent() : bool;
}
<?php

namespace pagopa\crawler;

use Illuminate\Support\Facades\Cache;
use pagopa\database\sherlock\Transaction;
use pagopa\database\sherlock\TransactionDetails;
use pagopa\database\sherlock\TransactionRe;
use pagopa\database\sherlock\Workflow;

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


    /**
     * Metodo eseguito quando un viene trattato un evento di tentativo di pagamento che può inizializzare una sessione di pagamento
     * (activatePaymentNotice, nodoInviaCarrelloRPT, etc)
     * Restituisce un array di informazioni da storicizzare in cache
     * @param int $index
     * @return array|null
     */
    public function createTransaction(int $index = 0) : array|null;


    /**
     * Metodo che viene richiamato dopo la creazione di una transazione. Riceve i dati dalla cache per associare correttamente
     * i transfer al tentativo
     * Restituisce un array di informazioni da storicizzare in cache
     * @param CacheObject $cache
     * @param int $index
     * @return array|null
     */
    public function detailsTransaction(CacheObject $cache, int $index = 0) : array|null;


    /**
     * Crea un evento di workflow per l'evento analizzato, associandolo ad ogni pagamento impattato.
     * Aggiunge anche extra data alla transaction se l'evento avviene in date diverse rispetto alla nascita
     * del tentativo.
     * Restituisce un array di informazioni da storicizzare in cache
     * @param CacheObject $cache
     * @param int $index
     * @return array|null
     */
    public function workflow(CacheObject $cache, int $index = 0) : array|null;

    /**
     * Metodo che viene lanciato quando la transazione già esiste ed è necessario aggiornarla
     * I dati vengono recuperati fornendo ogni pagamento presente in cache.
     * Restituisce un array di informazioni da storicizzare in cache
     * @param CacheObject $cache
     * @param int $index
     * @return array|null
     */
    public function updateTransaction(CacheObject $cache, int $index = 0) : array|null;

    /**
     * Metodo che viene lanciato quando la transazione già esiste ed è necessario aggiornare i dettagli.
     * I dati vengono recuperati fornendo ogni pagamento presente in cache.
     * Restituisce un array di informazioni da storicizzare in cache
     * @param CacheObject $cache
     * @param int $index
     * @return array|null
     */
    public function updateDetails(CacheObject $cache, int $index = 0) : array|null;

    /**
     * Crea un pagamento, che è relativo a una chiamata senza token (es. verifyPaymentNotice).
     * Restituisce un array di informazioni da storicizzare in cache
     * @param int $index
     * @return array|null
     */
    public function createPayment(int $index = 0): array|null;

    /**
     * Aggiorna i dettagli di un pagamento se necessario.
     * Restituisce un array di informazioni da storicizzare in cache
     * @param CacheObject $cache
     * @param int $index
     * @return array|null
     */
    public function detailsPayment(CacheObject $cache, int $index = 0): array|null;


    /**
     * Inserisce i transfer di un tentativo
     * @param CacheObject $cache
     * @param int $index
     * @return array|null
     */
    public function createMetadataDetails(CacheObject $cache, int $index = 0): array|null;


    /**
     * Aggiorna i transfer di un tentativo se necessario
     * @param CacheObject $cache
     * @param int $index
     * @return array|null
     */
    public function updateMetadataDetails(CacheObject $cache, int $index = 0): array|null;
}
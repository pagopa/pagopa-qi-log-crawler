<?php

namespace pagopa\crawler;

interface CacheInterface
{


    /**
     * Cancella tutta la cache
     * @return void
     */
    public function clearCache() : void;


    /**
     * Aggiunge una coppia chiave/valore alla cache con scadenza $expiration indicata in secondi.
     * Se l'expiration è 0, la chiave non scade mai
     * @param string $key
     * @param mixed $value
     * @param int $expiration
     * @return void
     */
    public function setValue(string $key, mixed $value, int $expiration = 0) : void;


    /**
     * Aggiunge un elemento all'array memorizzato in $key
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function addValue(string $key, mixed $value) : void;


    /**
     * Restituisce il valore memorizzato in cache associato a $key
     * @param string $key
     * @return mixed
     */
    public function getValue(string $key) : mixed;


    /**
     * Elimina una coppia chiave/valore dalla cache
     * @param string $key
     * @return void
     */
    public function deleteFromCache(string $key) : void;


    /**
     * Aggiorna la scadenza della chiave $key
     * @param string $key
     * @param int $expiration
     * @return void
     */
    public function refreshExpired(string $key, int $expiration = 0) : void;


    /**
     * Restituisce true/false se la chiave $key è memorizzata in cache
     * @param string $key
     * @return bool
     */
    public function hasKey(string $key) : bool;


    /**
     * Restituisce tutte le chiavi in cache
     * @return array
     */
    public function getAllKeys() : array;

}
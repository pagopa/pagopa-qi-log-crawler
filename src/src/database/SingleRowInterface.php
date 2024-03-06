<?php

namespace pagopa\database;


/**
 * Questa interfaccia gestisce una SINGOLA riga di una tabella del database (insert, update, retrieve by Primary Key)
 */
interface SingleRowInterface
{


    /**
     * Restituisce il valore della colonna
     * @param string $column
     * @return mixed
     */
    public function getColumnValue(string $column) : mixed;


    /**
     * Restituisce il valore della colonna pronta per l'inserimento/aggiornamento
     * @param string $column
     * @return mixed
     */
    public function getReadyColumnValue(string $column) : mixed;


    /**
     * Configura un valore fittizio per simulare il fetch dei dati (utile per dati recuperati dalla cache che non rappresentano classi serializzate)
     * @param string $column
     * @param mixed $value
     * @return self
     */
    public function setColumnValue(string $column, mixed $value) : self;


    /**
     * Configura un valore della colonna pronto per l'inserimento/aggiornamento
     * @param string $column
     * @param mixed $value
     * @return self
     */
    public function setNewColumnValue(string $column, mixed $value) : self;


    /**
     * Restituisce la riga prelevata dal db (o quella con i dati fittizi)
     * @return array
     */
    public function getRow() : array;


    /**
     * Restituisce il nome della tabella alla quale appartiene la riga
     * @return string
     */
    public function getTable() : string;


    /**
     * Restituisce le primary keys sufficienti a una operazione di insert.
     * Utile nel caso in cui una insert abbia una sequence come primary key
     * @return array
     */
    public function getNeedPrimaryKeys() : array;


    /**
     * Restituisce la lista di tutte le primary keys della classe
     * @return array
     */
    public function getPrimaryKeys() : array;


    /**
     * Restituisce la uniqid generata per i suffissi dei bind value nei prepared statement
     * @return string
     */
    public function getUniqueId() : string;


    /**
     * Restituisce la query da effettuare
     * @return string
     */
    public function getQuery() : string;


    /**
     * Restituisce la lista dei bindparams
     * @return array
     */
    public function getBindParams() : array;


    /**
     * Restituisce un array nella forma [ "query" => string, "params" => array()) ] dove l'indice query contiene la query da eseguire
     * e params contiene i bindparams
     * @return array
     */
    public function getQueryAndBindParams() : array;


    /**
     * Restituisce true/false se la query è stata già compilata.
     * Per ogni setNewColumnValue ritorna a essere false
     * @return bool
     */
    public function hasAlreadyGenerated() : bool;


    /**
     * Prepara la query e i bindparams per l'inserimento in tabella
     * @return self
     */
    public function insert() : self;


    /**
     * Prepara la query e i bindparams per l'operazione di update
     * @return self
     */
    public function update() : self;

}
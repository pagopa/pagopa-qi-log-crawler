<?php

namespace pagopa\sert\payload;

/**
 * <p>Interfaccia per la gestione di payload di vario genere (xml, json)</p>
 */
interface ParserInterface
{

    /**
     * <p>Restituisce true/false se il contenuto gestito è valido</p>
     * @return bool
     */
    public function isValid() : bool;


    /**
     * <p>Restituisce un elemento in base al path <b>$xpath</b>.</p>
     * <p>Deve restituire <code>null</code> se <b>$xpath</b> è vuoto o se l'elemento ricercato non esiste</p>
     * @param string $xpath
     * @return string|null
     */
    public function getElement(string $xpath) : string|null;

    /**
     * <p>Restituisce il numero di elementi trovati nel contenuto in base ad <b>$xpath</b></p>
     * <p>Se non ci sono elementi o <b>$xpath</b> è vuoto, restituisce 0</p>
     * @param string $xpath
     * @return int
     */
    public function getElementsCount(string $xpath) : int;


}
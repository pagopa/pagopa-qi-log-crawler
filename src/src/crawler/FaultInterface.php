<?php

namespace pagopa\crawler;

interface FaultInterface
{

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

}
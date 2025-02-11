<?php

namespace pagopa\sert\payload;

/**
 * <p>Estende la <code>RequestJson</code> aggiungendo i metodi per il recupero dell'errore <code>getFaultCode()</code> e <code>getFaultString()</code></p>
 *
 * @see RequestJson
 */
class ResponseJson extends RequestJson
{

    /**
     * <p>Xpath per recuperare dal payload il faultCode</p>
     */
    const string XPATH_FAULT_CODE = '';

    /**
     * <p>Xpath per recuperare dal payload il faultString</p>
     */
    const string XPATH_FAULT_STRING = '';


    /**
     * <p>Restituisce il faultCode del payload di una Response. Se non presente restituisce null</p>
     * @return string|null
     * @see static::XPATH_FAULT_CODE
     */
    public function getFaultCode() : string|null
    {
        return $this->getElement(static::XPATH_FAULT_CODE);
    }

    /**
     * <p>Restituisce il faultString del payload di una Response. Se non presente restituisce null</p>
     * @return string|null
     * @see static::XPATH_FAULT_STRING
     */
    public function getFaultString() : string|null
    {
        return $this->getElement(static::XPATH_FAULT_STRING);
    }

}
<?php

namespace pagopa\sert\payload;

class ResponseXML extends RequestXML
{
    const string XPATH_FAULT_CODE = '';

    const string XPATH_FAULT_STRING = '';


    public function getFaultCode() : string|null
    {
        return $this->getElement(static::XPATH_FAULT_CODE);
    }

    public function getFaultString() : string|null
    {
        return $this->getElement(static::XPATH_FAULT_STRING);
    }


}
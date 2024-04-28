<?php

namespace pagopa\crawler\methods;

use pagopa\crawler\FaultInterface;

/**
 * La classe AbstractMethod offre constanti di configurazione usate dai corrispondenti metodi per ricavare
 * informazioni dalle strutture xml/json sfruttando Xpath/JsonPath
 *
 * Ogni Constante definita viene utilizzata attraverso dei placeholder numerati
 *
 * %1$d
 * %2$d
 * %3$d
 * etc
 *
 * Ogni costante sostituisce a questi placeholder vari valori.
 * Le sostituzioni sono 3 e riguardano la posizione iesima del pagamento (nel carrello), la posizione iesima del transfer, la posizione iesima del metadata (key, value)
 * Ogni costante usa i placeholder a modo suo (alcune costanti usano %1$d per l'iesimo transfer, altri per l'iesimo payment)
 */
class AbstractResponseXmlPayload extends AbstractXmlPayload implements FaultInterface
{

    const XPATH_FAULT_CODE = '/fault/faultCode';

    const XPATH_FAULT_STRING = '/fault/faultString';

    const XPATH_FAULT_DESCRIPTION = '/fault/description';


    /**
     * @return bool
     */
    public function isFaultEvent(): bool
    {
        if (static::XPATH_FAULT_CODE == null)
        {
            return false;
        }
        return !(is_null($this->getElement(static::XPATH_FAULT_CODE)));
    }

    /**
     * @return string|null
     */
    public function getFaultCode(): string|null
    {
        if (static::XPATH_FAULT_CODE == null)
        {
            return false;
        }
        return $this->getElement(static::XPATH_FAULT_CODE);
    }

    /**
     * @return string|null
     */
    public function getFaultString(): string|null
    {
        if (static::XPATH_FAULT_STRING == null)
        {
            return false;
        }
        return $this->getElement(static::XPATH_FAULT_STRING);
    }

    /**
     * @return string|null
     */
    public function getFaultDescription(): string|null
    {
        if (static::XPATH_FAULT_DESCRIPTION == null)
        {
            return false;
        }
        return $this->getElement(static::XPATH_FAULT_DESCRIPTION);
    }
}
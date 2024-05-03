<?php

namespace pagopa\crawler\methods\req;

use pagopa\crawler\methods\AbstractJsonPayload;

class nodoInoltraEsitoPagamentoPayPal extends AbstractJsonPayload
{

    const JPATH_PSP = 'identificativoPsp';

    const JPATH_BROKER_PSP = 'identificativoIntermediario';

    const JPATH_CHANNEL = 'identificativoCanale';

    const JPATH_TOTAL_CART_AMOUNT = 'importoTotalePagato';

    public function __construct(string $payload, string $type = self::XML_PAYLOAD)
    {
        parent::__construct($payload, $type);
    }

    public function getPaymentsCount(): int|null
    {
        return null;
    }

    public function getImporto(int $index = 0): string|null
    {
        return $this->getImportoTotale();
    }


    /**
     * Restituisce il valore del campo id Transazione (generato dal PM))
     * @return string|null
     * @throws \Exception
     */
    public function getIdTransazione() : string|null
    {
        return $this->getElement('idTransazione');

    }

    /**
     * Restituisce il valore del campo idTransazione Psp (generato dal PSP))
     * @return string|null
     * @throws \Exception
     */
    public function getIdTransazionePsp() : string|null
    {
        return $this->getElement('idTransazionePsp');

    }

}
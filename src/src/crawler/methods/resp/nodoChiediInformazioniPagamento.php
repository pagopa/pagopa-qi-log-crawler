<?php

namespace pagopa\crawler\methods\resp;

use pagopa\crawler\methods\AbstractResponseJsonPayload;

class nodoChiediInformazioniPagamento extends AbstractResponseJsonPayload
{

    const JPATH_TOTAL_CART_AMOUNT = 'importoTotale';


    public function __construct(string $payload, string $type = self::XML_PAYLOAD)
    {
        parent::__construct($payload, $type);
    }

    public function getImporto(int $index = 0): string|null
    {
        return $this->getImportoTotale();
    }

    public function getPaymentsCount(): int|null
    {
        return null;
    }
}
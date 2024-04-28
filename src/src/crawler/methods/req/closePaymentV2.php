<?php

namespace pagopa\crawler\methods\req;

use pagopa\crawler\methods\AbstractJsonPayload;
use pagopa\crawler\methods\AbstractXmlPayload;

class closePaymentV2 extends AbstractJsonPayload
{

    protected string $typePayload = 'json';


    const JPATH_TOKEN_CCP = 'paymentTokens';


    const JPATH_PSP = 'idPSP';

    const JPATH_CHANNEL = 'idChannel';

    const JPATH_BROKER_PSP = 'idBrokerPSP';

    const JPATH_OUTCOME_ESITO = 'outcome';

    const JPATH_TOTAL_CART_AMOUNT = 'totalAmount';

    public function __construct(string $payload)
    {
        parent::__construct($payload, self::JSON_PAYLOAD);
    }


    public function getImportoTotale(): string|null
    {
        $totalAmount = (float) $this->getElement(self::JPATH_TOTAL_CART_AMOUNT);
        $fee = (float) $this->getElement('fee');
        return ($totalAmount - $fee);
    }


    public function getPaymentsCount(): int|null
    {
        return $this->getElementCount(static::JPATH_TOKEN_CCP);
    }


    public function getRRN() : string|null
    {
        return $this->getElement('additionalPaymentInformations->rrn');
    }

    public function getAuthCode() : string|null
    {
        return $this->getElement('additionalPaymentInformations->authorizationCode');
    }

}
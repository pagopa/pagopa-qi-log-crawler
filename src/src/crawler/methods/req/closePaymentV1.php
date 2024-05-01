<?php

namespace pagopa\crawler\methods\req;

use pagopa\crawler\methods\AbstractJsonPayload;

class closePaymentV1 extends AbstractJsonPayload
{


    protected string $typePayload = 'json';


    const JPATH_TOKEN_CCP = 'paymentTokens';

    const JPATH_PSP = 'identificativoPsp';

    const JPATH_CHANNEL = 'identificativoCanale';

    const JPATH_BROKER_PSP = 'identificativoIntermediario';

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
        $onlyPayment = ($totalAmount - $fee);
        return number_format($onlyPayment, 2, '.', '');
    }

    public function getImporto(int $index = 0): string|null
    {
        return $this->getImportoTotale();
    }

    public function getPaymentsCount(): int|null
    {
        return 1;
    }

    public function getRRN() : string|null
    {
        return null;
    }

    public function getAuthCode() : string|null
    {
        return $this->getElement('additionalPaymentInformations->authorizationCode');
    }



}
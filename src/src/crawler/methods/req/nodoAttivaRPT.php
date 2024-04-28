<?php

namespace pagopa\crawler\methods\req;

use pagopa\crawler\methods\AbstractXmlPayload;
use XMLReader;

class nodoAttivaRPT extends AbstractXmlPayload
{

    protected $prefix_xpath = 'nodoAttivaRPT';


    const XPATH_IUV = '/codiceIdRPT/QrCode/CodIUV';

    const XPATH_PA_EMITTENTE = '/codiceIdRPT/QrCode/CF';
    const XPATH_TOKEN_CCP = '/codiceContestoPagamento';

    const XPATH_TOTAL_CART_AMOUNT = '/datiPagamentoPSP/importoSingoloVersamento';

    const XPATH_SINGLE_PAYMENT_IMPORT = '/datiPagamentoPSP/importoSingoloVersamento';


    const XPATH_PSP = '/identificativoPSP';

    const XPATH_BROKER_PSP = '/identificativoIntermediarioPSP';

    const XPATH_CHANNEL = '/identificativoCanale';


    private function getElementFromPayload(string $element) : string|null
    {
        $xml = new XMLReader();
        $xml->XML($this->payload);
        while($xml->read())
        {
            if (($xml->nodeType == XMLReader::ELEMENT) && (strtolower($xml->localName) == strtolower($element)))
            {
                return $xml->readString();
            }
        }
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getPaymentsCount(): int|null
    {
        return 1;
    }

    /**
     * @inheritDoc
     */
    public function getNoticeNumber(int $index = 0): string|null
    {
        $auxdigit = $this->getElementFromPayload('AuxDigit');
        $iuv = $this->getElementFromPayload('CodIUV');
        if ((!is_null($auxdigit)) && (!is_null($iuv)))
        {
            return sprintf('%s%s', $auxdigit, $iuv);
        }
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getAllNoticesNumbers(): array|null
    {
        $value = $this->getNoticeNumber();
        return (is_null($value)) ? null : array($value);
    }

}
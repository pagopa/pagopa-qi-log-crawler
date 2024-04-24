<?php

namespace pagopa\crawler\methods\resp;

use pagopa\crawler\AbstractResponseMethod;
use pagopa\crawler\FaultInterface;
use pagopa\crawler\methods\MethodInterface;
use \XMLReader;

class nodoAttivaRPT extends AbstractResponseMethod
{

    protected $prefix_xpath = 'nodoAttivaRPTRisposta';


    const XPATH_TOTAL_CART_AMOUNT = '/datiPagamentoPA/importoSingoloVersamento';

    const XPATH_SINGLE_PAYMENT_IMPORT = '/datiPagamentoPA/importoSingoloVersamento';

    const XPATH_OUTCOME_ESITO = '/esito';

    /**
     * @inheritDoc
     */
    public function getPaymentsCount(): int|null
    {
        return 1;
    }

    /**
     * @return bool
     */
    public function isFaultEvent(): bool
    {
        return $this->outcome() == 'KO';
    }

}
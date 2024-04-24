<?php

namespace pagopa\crawler\methods\resp;

use pagopa\crawler\methods\AbstractResponseMethod;

class activatePaymentNotice extends AbstractResponseMethod
{

    protected $prefix_xpath = 'activatePaymentNoticeRes';

    const XPATH_IUV = '/creditorReferenceId';

    const XPATH_PA_EMITTENTE = '/fiscalCodePA';

    const XPATH_TOKEN_CCP = '/paymentToken';

    const XPATH_TOTAL_CART_AMOUNT = '/totalAmount';

    const XPATH_SINGLE_PAYMENT_IMPORT = '/totalAmount';

    const XPATH_SINGLE_TRANSFER_AMOUNT = '/transferList/transfer[%1$d]/transferAmount';

    const XPATH_SINGLE_TRANSFER_PA = '/transferList/transfer[%1$d]/fiscalCodePA';

    const XPATH_SINGLE_IBAN_PA = '/transferList/transfer[%1$d]/IBAN';

    const XPATH_TRANSFER_COUNT = '/transferList/transfer';


    const XPATH_SINGLE_TRANSFER_ID = '/transferList/transfer[%1$d]/idTransfer';

    const XPATH_OUTCOME_ESITO = '/outcome';


    const XPATH_TRANSFER_METADATA = '/transferList/transfer[%1$d]/metadata/mapEntry';

    const XPATH_TRANSFER_METADATA_KEY = '/transferList/transfer[%2$d]/metadata/mapEntry[%1$d]/key';

    const XPATH_TRANSFER_METADATA_VALUE = '/transferList/transfer[%2$d]/metadata/mapEntry[%1$d]/value';

    public function getPaymentsCount(): int|null
    {
        return 1;
    }


}
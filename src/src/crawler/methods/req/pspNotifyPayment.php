<?php

namespace pagopa\crawler\methods\req;

use pagopa\crawler\AbstractMethod;
use pagopa\crawler\methods\MethodInterface;
use \XMLReader;

class pspNotifyPayment extends AbstractMethod
{

    protected $prefix_xpath = 'pspNotifyPaymentReq';

    const XPATH_IUV = '/creditorReferenceId';

    const XPATH_PA_EMITTENTE = '/fiscalCodePA';

    const XPATH_TOKEN_CCP = '/paymentToken';

    const XPATH_TOTAL_CART_AMOUNT = '/debtAmount';

    const XPATH_SINGLE_PAYMENT_IMPORT = '/debtAmount';


    const XPATH_SINGLE_TRANSFER_AMOUNT = '/transferList/transfer[%1$d]/transferAmount';

    const XPATH_SINGLE_TRANSFER_PA = '/transferList/transfer[%1$d]/fiscalCodePA';

    const XPATH_SINGLE_IBAN_PA = '/transferList/transfer[%1$d]/IBAN';

    const XPATH_SINGLE_TRANSFER_ID = '/transferList/transfer[%1$d]/idTransfer';

    const XPATH_TRANSFER_COUNT = '/transferList/transfer';

    const XPATH_TRANSFER_METADATA = '/transferList/transfer[%2$d]/metadata/mapEntry';

    const XPATH_TRANSFER_METADATA_KEY = '/transferList/transfer[%2$d]/metadata/mapEntry[%1$d]/key';

    const XPATH_TRANSFER_METADATA_VALUE = '/transferList/transfer[%2$d]/metadata/mapEntry[%1$d]/value';


    const XPATH_PAYMENT_METADATA = '/additionalPaymentInformations/metadata/mapEntry';

    const XPATH_PAYMENT_METADATA_KEY = '/additionalPaymentInformations/metadata/mapEntry[%1$d]/key';

    const XPATH_PAYMENT_METADATA_VALUE = '/additionalPaymentInformations/metadata/mapEntry[%1$d]/value';


    const XPATH_PSP = '/idPSP';

    const XPATH_BROKER_PSP = '/idBrokerPSP';

    const XPATH_CHANNEL = '/idChannel';

    const XPATH_RRN = '/creditCardPayment/rrn';

    const XPATH_AUTH_CODE = '/%1$s/authorizationCode';

    const XPATH_TRANSACTION_ID = '/%1$s/transactionId';

    const XPATH_PSP_TRANSACTION_ID = '/%1$s/pspTransactionId';


    const XPATH_CREDIT_CARD_PAYMENT = '/creditCardPayment';

    const XPATH_BANCOMAT_PAY_PAYMENT = '/bancomatpayPayment';

    const XPATH_PAYPAL_PAYMENT = '/paypalPayment';

    const XPATH_ADDITIOTNAL_INFO_PAYMENT = '/additionalPaymentInformations';

    public function getChoiceAdditionalPayment() : string|null
    {
        $element = $this->getElement(static::XPATH_CREDIT_CARD_PAYMENT);
        if (!is_null($element))
        {
            return 'creditCardPayment';
        }
        $element = $this->getElement(static::XPATH_PAYPAL_PAYMENT);
        if (!is_null($element))
        {
            return 'paypalPayment';
        }

        $element = $this->getElement(static::XPATH_BANCOMAT_PAY_PAYMENT);
        if (!is_null($element))
        {
            return 'bancomatpayPayment';
        }

        $element = $this->getElement(static::XPATH_ADDITIOTNAL_INFO_PAYMENT);
        if (!is_null($element))
        {
            return 'additionalPaymentInformations';
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


    public function getRRN() : string|null
    {
        return $this->getElement(static::XPATH_RRN);
    }

    public function getAuthCode() : string|null
    {
        $prefix = $this->getChoiceAdditionalPayment();
        $render_xpath = vsprintf(static::XPATH_AUTH_CODE, [$prefix]);
        return $this->getElement($render_xpath);
    }

    public function getTransactionId() : string|null
    {
        $prefix = $this->getChoiceAdditionalPayment();
        $render_xpath = vsprintf(static::XPATH_TRANSACTION_ID, [$prefix]);
        return $this->getElement($render_xpath);
    }

    public function getPspTransactionId() : string|null
    {
        $prefix = $this->getChoiceAdditionalPayment();
        $render_xpath = vsprintf(static::XPATH_PSP_TRANSACTION_ID, [$prefix]);
        return $this->getElement($render_xpath);
    }

}
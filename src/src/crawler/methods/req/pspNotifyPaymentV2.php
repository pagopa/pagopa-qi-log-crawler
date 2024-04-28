<?php

namespace pagopa\crawler\methods\req;

use pagopa\crawler\methods\AbstractXmlPayload;

class pspNotifyPaymentV2 extends AbstractXmlPayload
{

    protected $prefix_xpath = 'pspNotifyPaymentV2';

    const XPATH_PAYMENT_COUNT = '/paymentList/payment';

    const XPATH_SINGLE_PAYMENT_IMPORT = '/paymentList/payment/debtAmount';

    const XPATH_IUV = '/paymentList/payment[%1$d]/creditorReferenceId';

    const XPATH_PA_EMITTENTE = '/paymentList/payment[%1$d]/fiscalCodePA';

    const XPATH_TOKEN_CCP = '/paymentList/payment[%1$d]/paymentToken';



    const XPATH_TRANSFER_COUNT = '/paymentList/payment[%1$d]/transferList/transfer';
    const XPATH_SINGLE_TRANSFER_PA = '/paymentList/payment[%2$d]/transferList/transfer[%1$d]/fiscalCodePA';

    const XPATH_SINGLE_TRANSFER_AMOUNT = '/paymentList/payment[%2$d]/transferList/transfer[%1$d]/transferAmount';

    const XPATH_SINGLE_IBAN_PA = '/paymentList/payment[%2$d]/transferList/transfer[%1$d]/IBAN';

    const XPATH_SINGLE_TRANSFER_ID = '/paymentList/payment[%2$d]/transferList/transfer[%1$d]/idTransfer';

    const XPATH_IS_BOLLO_TRANSFER = '/paymentList/payment[%2$d]/transferList/transfer[%1$d]/richiestaMarcaDaBollo';


    const XPATH_PAYMENT_METADATA = '/paymentList/payment[%1$d]/metadata/mapEntry';

    const XPATH_PAYMENT_METADATA_KEY = '/paymentList/payment[%2$d]/metadata/mapEntry[%1$d]/key';

    const XPATH_PAYMENT_METADATA_VALUE = '/paymentList/payment[%2$d]/metadata/mapEntry[%1$d]/value';



    const XPATH_TRANSFER_METADATA = '/paymentList/payment[%2$d]/transferList/transfer[%1$d]/metadata/mapEntry';

    const XPATH_TRANSFER_METADATA_KEY = '/paymentList/payment[%3$d]/transferList/transfer[%2$d]/metadata/mapEntry[%1$d]/key';

    const XPATH_TRANSFER_METADATA_VALUE = '/paymentList/payment[%3$d]/transferList/transfer[%2$d]/metadata/mapEntry[%1$d]/value';


    const XPATH_CART_METADATA_COUNT = '/additionalPaymentInformations/metadata/mapEntry';

    const XPATH_CART_METADATA_KEY = '/additionalPaymentInformations/metadata/mapEntry[%1$d]/key';

    const XPATH_CART_METADATA_VALUE = '/additionalPaymentInformations/metadata/mapEntry[%1$d]/value';


    const XPATH_PSP = '/idPSP';

    const XPATH_BROKER_PSP = '/idBrokerPSP';

    const XPATH_CHANNEL = '/idChannel';


    public function getPaymentsCount(): int|null
    {
        return $this->getElementCount(static::XPATH_PAYMENT_COUNT);
    }

    public function getImportoTotale(): string|null
    {
        $tot = 0;
        for($i=0;$i<$this->getPaymentsCount();$i++)
        {
            $tot += $this->getImporto($i);
        }
        return number_format($tot, 2, '.', '');
    }

    /**
     * Restituisce il numero di metadata nel tag <additionalPaymentInformations>
     * @return string|null
     * @throws \Exception
     */
    public function getCartMetadataCount() : string|null
    {
        return $this->getElementCount(static::XPATH_CART_METADATA_COUNT);
    }


    /**
     * Restituisce il valore della i-esima chiave nel tag <additionalPaymentInformations>
     * @param int $position
     * @return string|null
     * @throws \Exception
     */
    public function getCartMetadataKey(int $position = 0) : string|null
    {
        $m = $position + 1;
        $render_xpath = vsprintf(static::XPATH_CART_METADATA_KEY, [$m]);
        return $this->getElement($render_xpath);
    }

    /**
     * Restituisce il valore dell'i-esimo metadata nel tag <additionalPaymentInformations>
     * @param int $position
     * @return string|null
     * @throws \Exception
     */
    public function getCartMetaDataValue(int $position) : string|null
    {
        $m = $position + 1;
        $render_xpath = vsprintf(static::XPATH_CART_METADATA_VALUE, [$m]);
        return $this->getElement($render_xpath);
    }


}
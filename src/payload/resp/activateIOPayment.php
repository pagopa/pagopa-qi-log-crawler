<?php

namespace pagopa\sert\payload\resp;

use pagopa\sert\payload\ResponseXML;

class activateIOPayment extends ResponseXML
{

    const string XPATH_OUTCOME                  = '//activateIOPaymentRes/outcome';
    const string XPATH_TOTAL_AMOUNT             = '//activateIOPaymentRes/totalAmount';
    const string XPATH_AMOUNT                   = '//activateIOPaymentRes/totalAmount';
    const string XPATH_IUV                      = '//activateIOPaymentRes/creditorReferenceId';
    const string XPATH_CREDITOR_REFERENCE       = '//activateIOPaymentRes/creditorReferenceId';
    const string XPATH_PA_EMITTENTE             = '//activateIOPaymentRes/fiscalCodePA';
    const string XPATH_TOKEN                    = '//activateIOPaymentRes/paymentToken';
    const string XPATH_FAULT_CODE               = '//activateIOPaymentRes/fault/faultCode';
    const string XPATH_FAULT_STRING             = '//activateIOPaymentRes/fault/faultString';
	public function getPaymentsCount(): int
	{
		if ($this->getOutcome() == 'KO')
        {
            return 0;
        }
        return 1;
	}
}

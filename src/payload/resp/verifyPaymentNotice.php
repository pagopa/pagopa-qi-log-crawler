<?php

namespace pagopa\sert\payload\resp;

use pagopa\sert\payload\RequestXML;

class verifyPaymentNotice extends \pagopa\sert\payload\ResponseXML
{
    const string XPATH_OUTCOME                  = '//verifyPaymentNoticeRes/outcome';
    const string XPATH_PA_EMITTENTE             = '//verifyPaymentNoticeRes/fiscalCodePA';
    const string XPATH_TOTAL_AMOUNT             = '//verifyPaymentNoticeRes/paymentList/paymentOptionDescription/amount';
    const string XPATH_AMOUNT                   = '//verifyPaymentNoticeRes/paymentList/paymentOptionDescription/amount';
    const string XPATH_FAULT_CODE               = '//verifyPaymentNoticeRes/fault/faultCode';
    const string XPATH_FAULT_STRING             = '//verifyPaymentNoticeRes/fault/faultString';

	public function getPaymentsCount(): int
	{
		if ($this->getOutcome() == 'KO')
        {
            return 0;
        }
        return 1;
	}
}

<?php

namespace pagopa\sert\payload\resp;

use pagopa\sert\payload\ResponseXML;

class paVerifyPaymentNotice extends ResponseXML
{

    const string XPATH_TOTAL_AMOUNT         = '//paVerifyPaymentNoticeRes/paymentList/paymentOptionDescription/amount';
    const string XPATH_AMOUNT               = '//paVerifyPaymentNoticeRes/paymentList/paymentOptionDescription/amount';
    const string XPATH_PA_EMITTENTE         = '//paVerifyPaymentNoticeRes/fiscalCodePA';
    const string XPATH_OUTCOME              = '//paVerifyPaymentNoticeRes/outcome';
    const string XPATH_FAULT_CODE           = '//paVerifyPaymentNoticeRes/fault/faultCode';
    const string XPATH_FAULT_STRING         = '//paVerifyPaymentNoticeRes/fault/faultString';

	public function getPaymentsCount(): int
	{
		if ($this->getOutcome() == 'KO')
		        {
		            return 0;
		        }
		        return 1;
	}
}

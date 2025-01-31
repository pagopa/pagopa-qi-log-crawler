<?php

namespace pagopa\sert\payload\resp;

use pagopa\sert\payload\RequestXML;

class pspNotifyPayment extends \pagopa\sert\payload\ResponseXML
{
	public function getPaymentsCount(): int
	{
		if ($this->getOutcome() == 'KO')
		        {
		            return 0;
		        }
		        return 1;
	}
}

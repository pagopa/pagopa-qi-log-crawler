<?php

namespace pagopa\sert\payload\resp;

use pagopa\sert\payload\RequestXML;

class paSendRTV2 extends \pagopa\sert\payload\ResponseXML
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

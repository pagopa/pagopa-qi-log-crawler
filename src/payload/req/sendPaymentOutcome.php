<?php

namespace pagopa\sert\payload\req;

use pagopa\sert\payload\RequestXML;

class sendPaymentOutcome extends RequestXML
{
	public function getPaymentsCount(): int
	{
		return 1;
	}
}

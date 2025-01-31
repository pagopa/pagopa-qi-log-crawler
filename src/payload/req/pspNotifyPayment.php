<?php

namespace pagopa\sert\payload\req;

use pagopa\sert\payload\RequestXML;

class pspNotifyPayment extends RequestXML
{
	public function getPaymentsCount(): int
	{
		return 1;
	}
}

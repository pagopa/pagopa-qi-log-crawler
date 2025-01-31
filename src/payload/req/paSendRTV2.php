<?php

namespace pagopa\sert\payload\req;

use pagopa\sert\payload\RequestXML;

class paSendRTV2 extends RequestXML
{
	public function getPaymentsCount(): int
	{
		return 1;
	}
}

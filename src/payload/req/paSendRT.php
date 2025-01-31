<?php

namespace pagopa\sert\payload\req;

use pagopa\sert\payload\RequestXML;

class paSendRT extends RequestXML
{
	public function getPaymentsCount(): int
	{
		return 1;
	}
}

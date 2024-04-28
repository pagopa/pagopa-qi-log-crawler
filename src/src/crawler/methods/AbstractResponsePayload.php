<?php

namespace pagopa\crawler\methods;

use pagopa\crawler\FaultInterface;
use pagopa\crawler\methods\AbstractPayload;

abstract class AbstractResponsePayload extends AbstractXmlPayload implements FaultInterface
{

}
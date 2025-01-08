<?php

namespace pagopa\sert\events\req;

use pagopa\sert\events\AbstractEvent;

class activatePaymentNotice extends AbstractEvent
{

    protected bool $isBornPaymentEvent = true;

}
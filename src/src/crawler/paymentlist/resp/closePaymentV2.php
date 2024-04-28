<?php

namespace pagopa\crawler\paymentlist\resp;

use pagopa\crawler\paymentlist\AbstractPaymentList;

class closePaymentV2 extends AbstractPaymentList
{

    /**
     * @inheritDoc
     */
    public function createEventInstance(array $eventData): void
    {
        $event = new \pagopa\crawler\events\resp\closePaymentV2($eventData);
        $this->setEvent($event);
    }

    /**
     * @inheritDoc
     */
    public function isValidPayment(int $index = 0): bool
    {
        return true;
    }

    /**
     * @inheritDoc
     */
    public function isAttempt(int $index = 0): bool
    {
        return true;
    }
}
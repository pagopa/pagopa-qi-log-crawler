<?php

namespace pagopa\crawler\paymentlist\resp;

use pagopa\crawler\paymentlist\AbstractPaymentList;

class sendPaymentOutcomeV2 extends AbstractPaymentList
{

    /**
     * @inheritDoc
     */
    public function createEventInstance(array $eventData): void
    {
        $event = new \pagopa\crawler\events\resp\sendPaymentOutcomeV2($eventData);
        $this->setEvent($event);
    }

    /**
     * @inheritDoc
     */
    public function isValidPayment(int $index = 0): bool
    {
        $token = (is_null($this->getEvent()->getPaymentToken($index))) ? $this->getEvent()->getMethodInterface()->getToken($index) : $this->getEvent()->getPaymentToken($index);
        if (is_null($token))
        {
            return false;
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function isAttempt(int $index = 0): bool
    {
        $token = (is_null($this->getEvent()->getPaymentToken($index))) ? $this->getEvent()->getMethodInterface()->getToken($index) : $this->getEvent()->getPaymentToken($index);
        if (is_null($token))
        {
            return false;
        }
        return true;
    }
}
<?php

namespace pagopa\crawler\paymentlist\req;

use pagopa\crawler\paymentlist\AbstractPaymentList;

class nodoInoltraEsitoPagamentoCarta extends AbstractPaymentList
{

    /**
     * @inheritDoc
     */
    public function createEventInstance(array $eventData): void
    {
        $event = new \pagopa\crawler\events\req\nodoInoltraEsitoPagamentoCarta($eventData);
        $this->setEvent($event);
    }

    /**
     * @inheritDoc
     */
    public function isValidPayment(int $index = 0): bool
    {
        if ((!is_null($this->getEvent()->getSessionIdOriginal())) || (!empty($this->getEvent()->getSessionIdOriginal())))
        {
            return true;
        }
        return ($this->getEvent()->getIuv(0) && $this->getEvent()->getPaEmittente(0));
    }

    /**
     * @inheritDoc
     */
    public function isAttempt(int $index = 0): bool
    {
        if ((!is_null($this->getEvent()->getSessionIdOriginal())) || (!empty($this->getEvent()->getSessionIdOriginal())))
        {
            return true;
        }
        return ($this->getEvent()->getIuv(0) && $this->getEvent()->getPaEmittente(0) && $this->getEvent()->getPaymentToken(0));
    }
}
<?php

namespace pagopa\crawler\paymentlist\resp;

use pagopa\crawler\paymentlist\AbstractPaymentList;
use pagopa\database\sherlock\TransactionRe;

/**
 * la nodoInviaCarrello Response ha sempre un carrello associato, se l'id session original della
 * request è stato già analizzato
 */
class nodoInviaCarrelloRPT extends AbstractPaymentList
{

    /**
     * @inheritDoc
     */
    public function createEventInstance(array $eventData): void
    {
        $event = new \pagopa\crawler\events\resp\nodoInviaCarrelloRPT($eventData);
        $this->setEvent($event);
    }

    /**
     * @inheritDoc
     */
    public function isValidPayment(int $index = 0): bool
    {
        return !is_null($this->getEvent()->getSessionIdOriginal());
    }

    /**
     * @inheritDoc
     */
    public function isAttempt(int $index = 0): bool
    {
        return $this->isValidPayment($index);
    }
}
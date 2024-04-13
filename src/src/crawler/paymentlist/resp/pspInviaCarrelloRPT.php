<?php

namespace pagopa\crawler\paymentlist\resp;

use pagopa\crawler\CacheObject;
use pagopa\crawler\paymentlist\AbstractPaymentList;
use pagopa\database\sherlock\TransactionRe;
use Illuminate\Database\Capsule\Manager as DB;

class pspInviaCarrelloRPT extends AbstractPaymentList
{

    /**
     * @inheritDoc
     */
    public function createEventInstance(array $eventData): void
    {
        $event = new \pagopa\crawler\events\resp\pspInviaCarrelloRPT($eventData);
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
        return !is_null($this->getEvent()->getSessionIdOriginal());
    }
}
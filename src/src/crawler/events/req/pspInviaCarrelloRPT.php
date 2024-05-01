<?php

namespace pagopa\crawler\events\req;

use pagopa\crawler\events\AbstractEvent;
use pagopa\crawler\MapEvents;
use pagopa\crawler\methods\req\pspInviaCarrelloRPT as Payload;
use pagopa\database\sherlock\Transaction;
use pagopa\database\sherlock\TransactionDetails;
use pagopa\database\sherlock\Workflow;

class pspInviaCarrelloRPT extends AbstractEvent
{

    protected Payload $method;

    public function __construct(array $eventData)
    {
        parent::__construct($eventData);
        $this->method = new Payload($this->data['payload']);
    }

    /**
     * @inheritDoc
     */
    public function getNoticeNumber(int $index = 0): string|null
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getIuvs(): array|null
    {
        return $this->getMethodInterface()->getIuvs();
    }

    /**
     * @inheritDoc
     */
    public function getPaEmittenti(): array|null
    {
        return $this->getMethodInterface()->getPaEmittenti();
    }

    /**
     * @inheritDoc
     */
    public function getCcps(): array|null
    {
        return $this->getMethodInterface()->getCcps();
    }


    /**
     * @inheritDoc
     */
    public function getStazione(): string|null
    {
        return null;
    }

    public function getBrokerPa(): string|null
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function transaction(int $index = 0): Transaction|null
    {
        return null;
    }

    public function transactionDetails(int $transfer, int $index = 0): TransactionDetails|null
    {
        return null;
    }

    public function workflowEvent(int $index = 0): Workflow|null
    {
        if (($index + 1) > $this->getPaymentsCount())
        {
            return null;
        }

        $workflow = new Workflow($this->getInsertedTimestamp());
        $workflow->setNewColumnValue('date_event', $this->getInsertedTimestamp()->format('Y-m-d'));
        $workflow->setEventId($this->getUniqueId());
        $workflow->setEventTimestamp($this->getInsertedTimestamp());
        if (!is_null($this->getCanale()))
        {
            $workflow->setCanale($this->getCanale());
        }
        if (!is_null($this->getPsp()))
        {
            $workflow->setPsp($this->getPsp());
        }
        $workflow->setFkTipoEvento(MapEvents::getMethodId($this->getTipoEvento(), $this->getSottoTipoEvento()));
        return $workflow;
    }

    /**
     * @inheritDoc
     */
    public function getMethodInterface(): Payload
    {
        return $this->method;
    }

    /**
     * @inheritDoc
     */
    public function getPaymentsCount(): int|null
    {
        return $this->getMethodInterface()->getPaymentsCount();
    }

    /**
     * @inheritDoc
     */
    public function getTransferCount(int $index = 0): int|null
    {
        return $this->getMethodInterface()->getTransferCount($index);
    }

    /**
     * @return string|null
     */
    public function getIdCarrello(): string|null
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getCacheKeyPayment(int $index = 0): string|null
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getCacheKeyAttempt(int $index = 0): string|null
    {
        // la pspInviaCarrelloRPT non è la prima primitiva per un pagamento, quindi non restituisce chiavi cache per i suoi pagamenti
        // sono già state cachate attraverso il sessionIdOriginal grazie ad una nodoInviaCarrelloRPT/nodoInviaRPT
        return null;
    }

    /**
     * @inheritDoc
     */
    public function isFaultEvent(): bool
    {
        return false;
    }

    /**
     * @inheritDoc
     */
    public function getFaultCode(): string|null
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getFaultString(): string|null
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getFaultDescription(): string|null
    {
        return null;
    }

    /**
     * @return array
     */
    public function getCacheKeyList(): array
    {
        $return = array();
        if (!is_null($this->getSessionIdOriginal()))
        {
            $key = sprintf('sessionOriginal_%s', $this->getSessionIdOriginal());
            $return[] = $key;
        }
        return $return;
    }
}
<?php

namespace pagopa\crawler\events\resp;

use pagopa\crawler\events\AbstractEvent;
use pagopa\crawler\MapEvents;
use pagopa\crawler\methods\resp\nodoInviaCarrelloRPT as Payload;
use pagopa\database\sherlock\Transaction;
use pagopa\database\sherlock\TransactionDetails;
use pagopa\database\sherlock\Workflow;

class nodoInviaCarrelloRPT extends AbstractEvent
{

    protected Payload $method;

    protected bool $isCart = true;


    public function __construct(array $eventData)
    {
        parent::__construct($eventData);
        $this->method = new Payload($this->data['payload']);
    }

    /**
     * @inheritDoc
     */
    public function getIuvs(): array|null
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getPaEmittenti(): array|null
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getCcps(): array|null
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
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getTransferCount(int $index = 0): int|null
    {
        return null;
    }

    /**
     * @param int $transfer
     * @param int $index
     * @return TransactionDetails|null
     */
    public function transactionDetails(int $transfer, int $index = 0): TransactionDetails|null
    {
        return null;
    }

    /**
     * @param int $index
     * @return Workflow|null
     */
    public function workflowEvent(int $index = 0): Workflow|null
    {
        $workflow = new Workflow($this->getInsertedTimestamp());
        $workflow->setNewColumnValue('date_event', $this->getInsertedTimestamp()->format('Y-m-d'));
        $workflow->setEventId($this->getUniqueId());
        $workflow->setEventTimestamp($this->getInsertedTimestamp());
        $workflow->setFkTipoEvento(MapEvents::getMethodId($this->getTipoEvento(), $this->getSottoTipoEvento()));
        $stazione = $this->getStazione();
        $canale = $this->getCanale();
        $workflow->setOutcomeEvent($this->getMethodInterface()->outcome());
        if (!is_null($stazione))
        {
            $workflow->setStazione($stazione);
        }
        if (!is_null($canale))
        {
            $workflow->setCanale($canale);
        }
        if ($this->getMethodInterface()->isFaultEvent())
        {
            $workflow->setFaultCode($this->getMethodInterface()->getFaultCode());
        }
        return $workflow;
    }

    /**
     * @inheritDoc
     */
    public function getCacheKeyPayment(int $index = 0): string|null
    {
        // restituisco null tanto la Resp della nodoInviaCarrelloRPT non ha informazioni dentro
        // la chiave cache per recuperare i pagamenti associati a questa Resp è il sessionIdOriginal
        // generato con la REQ corrispondente
        // la nodoInviaCarrelloRPT non può avere solo iuv+dominio
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getCacheKeyAttempt(int $index = 0): string|null
    {
        return null;
    }

    /**
     * @return bool
     */
    public function isFaultEvent(): bool
    {
        return $this->getMethodInterface()->isFaultEvent();
    }

    /**
     * @return string|null
     */
    public function getFaultCode(): string|null
    {
        return $this->getMethodInterface()->getFaultCode();
    }

    /**
     * @return string|null
     */
    public function getFaultString(): string|null
    {
        return $this->getMethodInterface()->getFaultString();
    }

    /**
     * @return string|null
     */
    public function getFaultDescription(): string|null
    {
        return $this->getMethodInterface()->getFaultDescription();
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
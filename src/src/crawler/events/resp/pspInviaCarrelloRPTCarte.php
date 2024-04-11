<?php

namespace pagopa\crawler\events\resp;

use pagopa\crawler\AbstractEvent;
use pagopa\crawler\MapEvents;
use pagopa\crawler\methods\MethodInterface;
use pagopa\database\sherlock\Transaction;
use pagopa\database\sherlock\TransactionDetails;
use pagopa\database\sherlock\Workflow;
use pagopa\crawler\methods\resp\pspInviaCarrelloRPTCarte as Payload;

class pspInviaCarrelloRPTCarte extends AbstractEvent
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
    public function getPaEmittente(int $index = 0): string|null
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getIuv(int $index = 0): string|null
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getCcp(int $index = 0): string|null
    {
        return null;
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
    public function getCreditorReferenceId(int $index = 0): string|null
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getPaymentToken(int $index = 0): string|null
    {
        return null;
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
    public function getPsp(): string|null
    {
        $column = $this->getColumn('psp');
        return (empty($column)) ? null : $column;
    }

    /**
     * @inheritDoc
     */
    public function getStazione(): string|null
    {
        $column = $this->getColumn('stazione');
        return (empty($column)) ? null : $column;
    }

    public function getCanale(): string|null
    {
        $column = $this->getColumn('canale');
        return (empty($column)) ? null : $column;
    }

    public function getBrokerPa(): string|null
    {
        $column = $this->getColumn('stazione');
        if (empty($column))
        {
            return null;
        }
        $e = explode('_', $column, 2);
        return $e[0];
    }

    public function getBrokerPsp(): string|null
    {
        $column = $this->getColumn('canale');
        if (empty($column))
        {
            return null;
        }
        $e = explode('_', $column, 2);
        return $e[0];
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
        if ($this->isFaultEvent())
        {
            $workflow->setFaultCode($this->getFaultCode());
        }
        if (!is_null($this->getMethodInterface()->outcome()))
        {
            $workflow->setOutcomeEvent($this->getMethodInterface()->outcome());
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
     * @inheritDoc
     */
    public function getCacheKeyPayment(): string
    {
        $session        = $this->getSessionIdOriginal();
        return base64_encode(sprintf('sessionOriginal_%s', $session));
    }

    /**
     * @inheritDoc
     */
    public function getCacheKeyAttempt(): string
    {
        $session        = $this->getSessionIdOriginal();
        return base64_encode(sprintf('sessionOriginal_%s', $session));
    }

    /**
     * @inheritDoc
     */
    public function isFaultEvent(): bool
    {
        return $this->getMethodInterface()->isFaultEvent();
    }

    /**
     * @inheritDoc
     */
    public function getFaultCode(): string|null
    {
        return $this->getMethodInterface()->getFaultCode();
    }

    /**
     * @inheritDoc
     */
    public function getFaultString(): string|null
    {
        return $this->getMethodInterface()->getFaultString();
    }

    /**
     * @inheritDoc
     */
    public function getFaultDescription(): string|null
    {
        return $this->getMethodInterface()->getFaultDescription();
    }
}
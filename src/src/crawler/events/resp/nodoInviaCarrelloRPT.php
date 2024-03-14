<?php

namespace pagopa\crawler\events\resp;

use pagopa\crawler\AbstractEvent;
use pagopa\crawler\methods\MethodInterface;
use pagopa\database\sherlock\Transaction;
use pagopa\crawler\methods\resp\nodoInviaCarrelloRPT as Payload;
use pagopa\database\sherlock\TransactionDetails;
use pagopa\database\sherlock\Workflow;

class nodoInviaCarrelloRPT extends AbstractEvent
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
    public function getKey(int $index = 0): string|null
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
    public function isValid(int $index = 0): bool
    {
        return !empty($this->getColumn('sessionidoriginal'));
    }

    /**
     * @inheritDoc
     */
    public function getMethodInterface(): MethodInterface
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
        $workflow->setFkTipoEvento(4);
        if (!is_null($this->getMethodInterface()->getFaultCode()))
        {
            $workflow->setFaultCode($this->getMethodInterface()->getFaultCode());
        }

        return $workflow;
    }
}
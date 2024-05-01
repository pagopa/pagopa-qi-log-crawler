<?php

namespace pagopa\crawler\events\resp;

use pagopa\crawler\events\AbstractEvent;
use pagopa\crawler\MapEvents;
use pagopa\crawler\methods\resp\nodoInviaRPT as Payload;
use pagopa\database\sherlock\Transaction;
use pagopa\database\sherlock\TransactionDetails;
use pagopa\database\sherlock\Workflow;

class nodoInviaRPT extends AbstractEvent
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
        $value = $this->getIuv();
        return (empty($value)) ? null : array($value);
    }

    /**
     * @inheritDoc
     */
    public function getPaEmittenti(): array|null
    {
        $value = $this->getPaEmittente();
        return (empty($value)) ? null : array($value);
    }

    /**
     * @inheritDoc
     */
    public function getCcps(): array|null
    {
        $value = $this->getCcp();
        return (empty($value)) ? null : array($value);
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
        $outcome = $this->getMethodInterface()->outcome();
        $workflow->setNewColumnValue('date_event', $this->getInsertedTimestamp()->format('Y-m-d'));
        $workflow->setEventId($this->getUniqueId());
        $workflow->setEventTimestamp($this->getInsertedTimestamp());
        if (!is_null($this->getStazione()))
        {
            $workflow->setStazione($this->getStazione());
        }
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
        if (!is_null($outcome))
        {
            $workflow->setOutcomeEvent($outcome);
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
    public function getCacheKeyPayment(int $index = 0): string|null
    {
        $iuv            = $this->getIuv();
        $pa_emittente   = $this->getPaEmittente();
        return sprintf('payment_%s_%s', $iuv, $pa_emittente);
    }

    /**
     * @inheritDoc
     */
    public function getCacheKeyAttempt(int $index = 0): string|null
    {
        $iuv            = $this->getIuv();
        $pa_emittente   = $this->getPaEmittente();
        $token          = $this->getCcp();
        return sprintf('attempt_%s_%s_%s', $iuv, $pa_emittente, $token);
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

    /**
     * @return array
     */
    public function getCacheKeyList(): array
    {
        $return = array();
        if (!is_null($this->getSessionId()))
        {
            $key = sprintf('session_id_%s_%s_%s', $this->getSessionId(), $this->getTipoEvento(), $this->getSottoTipoEvento());
            $return[] = $key;
        }
        if (!is_null($this->getPaymentToken()))
        {
            $key = sprintf('token_%s', $this->getPaymentToken());
            $return[] = $key;
        }
        return $return;
    }
}
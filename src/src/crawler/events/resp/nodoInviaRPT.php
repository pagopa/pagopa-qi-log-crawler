<?php

namespace pagopa\crawler\events\resp;

use pagopa\crawler\AbstractEvent;
use pagopa\crawler\MapEvents;
use pagopa\crawler\methods\MethodInterface;
use pagopa\database\sherlock\Transaction;
use pagopa\database\sherlock\TransactionDetails;
use pagopa\database\sherlock\Workflow;
use pagopa\crawler\methods\resp\nodoInviaRPT as Payload;

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
    public function getPaEmittente(int $index = 0): string|null
    {
        $column = $this->getColumn('iddominio');
        return (empty($column)) ? $this->getMethodInterface()->getPaEmittente() : $column;
    }

    /**
     * @inheritDoc
     */
    public function getIuv(int $index = 0): string|null
    {
        $column = $this->getColumn('iuv');
        return (empty($column)) ? $this->getMethodInterface()->getIuv() : $column;
    }

    /**
     * @inheritDoc
     */
    public function getCcp(int $index = 0): string|null
    {
        $column = $this->getColumn('ccp');
        return (empty($column)) ? $this->getMethodInterface()->getCcp() : $column;
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
        $value = $this->getColumn('creditorreferenceid');
        return (empty($value)) ? null : $value;
    }

    /**
     * @inheritDoc
     */
    public function getPaymentToken(int $index = 0): string|null
    {
        $value = $this->getColumn('paymenttoken');
        return (empty($value)) ? null : $value;
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
    public function getPsp(): string|null
    {
        $value = $this->getColumn('psp');
        return (empty($value)) ? null : $value;
    }

    /**
     * @inheritDoc
     */
    public function getStazione(): string|null
    {
        $value = $this->getColumn('stazione');
        return (empty($value)) ? $this->getMethodInterface()->getStazione() : $value;
    }

    public function getCanale(): string|null
    {
        $value = $this->getColumn('canale');
        return (empty($value)) ? $this->getMethodInterface()->getStazione() : $value;
    }

    public function getBrokerPa(): string|null
    {
        if (empty($this->getStazione()))
        {
            return null;
        }
        $stazione = explode('_', $this->getStazione(), 2);
        return $stazione[0]; // ricavo il broker pa splittando la stazione
    }

    public function getBrokerPsp(): string|null
    {
        if (empty($this->getCanale()))
        {
            return null;
        }
        $stazione = explode('_', $this->getCanale(), 2);
        return $stazione[0]; // ricavo il broker pa splittando la stazione
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
    public function getCacheKeyPayment(): string
    {
        $iuv            = $this->getIuv();
        $pa_emittente   = $this->getPaEmittente();
        return base64_encode(sprintf('payment_%s_%s', $iuv, $pa_emittente));
    }

    /**
     * @inheritDoc
     */
    public function getCacheKeyAttempt(): string
    {
        $iuv            = $this->getIuv();
        $pa_emittente   = $this->getPaEmittente();
        $token          = $this->getCcp();
        return base64_encode(sprintf('attempt_%s_%s_%s', $iuv, $pa_emittente, $token));
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
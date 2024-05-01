<?php

namespace pagopa\crawler\events\resp;

use pagopa\crawler\events\AbstractEvent;
use pagopa\crawler\MapEvents;
use pagopa\crawler\methods\resp\activateIOPayment as Payload;
use pagopa\database\sherlock\Transaction;
use pagopa\database\sherlock\TransactionDetails;
use pagopa\database\sherlock\Workflow;

class activateIOPayment extends AbstractEvent
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
    public function getIuvs(): array|null
    {
        return (is_null($this->getIuv(0))) ? $this->getMethodInterface()->getIuvs() : [$this->getIuv(0)];
    }

    /**
     * @inheritDoc
     */
    public function getPaEmittenti(): array|null
    {
        return (is_null($this->getPaEmittente(0))) ? $this->getMethodInterface()->getPaEmittenti() : [$this->getPaEmittente(0)];
    }

    /**
     * @inheritDoc
     */
    public function getCcps(): array|null
    {
        return (is_null($this->getCcp())) ? $this->getMethodInterface()->getCcps() : [$this->getCcp()];
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
        $workflow->setEventTimestamp($this->getInsertedTimestamp());
        $workflow->setEventId($this->getUniqueId());
        $workflow->setFkTipoEvento(MapEvents::getMethodId($this->getTipoEvento(), $this->getSottoTipoEvento()));

        $id_psp     = $this->getPsp();
        $stazione   = $this->getStazione();
        $canale     = $this->getCanale();

        if (!is_null($id_psp))
        {
            $workflow->setPsp($id_psp);
        }
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
        if (!is_null($this->getMethodInterface()->outcome()))
        {
            $workflow->setOutcomeEvent($this->getMethodInterface()->outcome());
        }

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
        return 1;
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
        $iuv            =   $this->getIuv(0);
        $pa_emittente   =   $this->getPaEmittente(0);

        return sprintf('payment_%s_%s', $iuv, $pa_emittente);
    }

    /**
     * @inheritDoc
     */
    public function getCacheKeyAttempt(int $index = 0): string|null
    {
        $iuv            =   $this->getIuv(0);
        $pa_emittente   =   $this->getPaEmittente(0);
        $token          =   $this->getPaymentToken(0);

        return sprintf('attempt_%s_%s_%s', $iuv, $pa_emittente, $token);
    }

    /**
     * @inheritDoc
     */
    public function isFaultEvent(): bool
    {
        return $this->method->isFaultEvent();
    }

    /**
     * @inheritDoc
     */
    public function getFaultCode(): string|null
    {
        return $this->method->getFaultCode();
    }

    /**
     * @inheritDoc
     */
    public function getFaultString(): string|null
    {
        return $this->method->getFaultString();
    }

    /**
     * @inheritDoc
     */
    public function getFaultDescription(): string|null
    {
        return $this->method->getFaultDescription();
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
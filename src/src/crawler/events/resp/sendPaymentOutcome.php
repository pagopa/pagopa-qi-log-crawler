<?php

namespace pagopa\crawler\events\resp;

use pagopa\crawler\AbstractEvent;
use pagopa\crawler\MapEvents;
use pagopa\crawler\methods\resp\sendPaymentOutcome as Payload;
use pagopa\database\sherlock\Transaction;
use pagopa\database\sherlock\TransactionDetails;
use pagopa\database\sherlock\Workflow;

class sendPaymentOutcome extends AbstractEvent
{
    /**
     * @var Payload
     */
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
        return (is_null($this->getIuv(0))) ? null : [$this->getIuv(0)];
    }

    /**
     * @inheritDoc
     */
    public function getPaEmittenti(): array|null
    {
        return (is_null($this->getPaEmittente(0))) ? null : [$this->getPaEmittente(0)];
    }

    /**
     * @inheritDoc
     */
    public function getCcps(): array|null
    {
        return (is_null($this->getCcp(0))) ? null : [$this->getCcp(0)];
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
        $outcome    = $this->getMethodInterface()->outcome();
        $faultcode  = $this->getMethodInterface()->getFaultCode();

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
        if (!is_null($outcome))
        {
            $workflow->setOutcomeEvent($outcome);
        }
        if (!is_null($faultcode))
        {
            $workflow->setFaultCode($faultcode);
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
    public function getCacheKeyPayment(): string
    {
        $iuv            =   $this->getIuv(0);
        $pa_emittente   =   $this->getPaEmittente(0);
        return base64_encode(sprintf('payment_%s_%s', $iuv, $pa_emittente));
    }

    /**
     * @inheritDoc
     */
    public function getCacheKeyAttempt(): string
    {
        $iuv            =   $this->getIuv(0);
        $pa_emittente   =   $this->getPaEmittente(0);
        $token          =   $this->getPaymentToken(0);
        return base64_encode(sprintf('attempt_%s_%s_%s', $iuv, $pa_emittente, $token));
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
}
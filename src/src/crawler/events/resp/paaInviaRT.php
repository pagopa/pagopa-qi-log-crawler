<?php

namespace pagopa\crawler\events\resp;

use pagopa\crawler\AbstractEvent;
use pagopa\crawler\MapEvents;
use pagopa\crawler\methods\resp\paaInviaRT as Payload;
use pagopa\database\sherlock\Transaction;
use pagopa\database\sherlock\TransactionDetails;
use pagopa\database\sherlock\Workflow;

class paaInviaRT extends AbstractEvent
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
        $value = $this->getIuv();
        return (is_null($value)) ? $this->getMethodInterface()->getIuvs() : array($value);
    }

    /**
     * @inheritDoc
     */
    public function getPaEmittenti(): array|null
    {
        $value = $this->getPaEmittente();
        return (is_null($value)) ? $this->getMethodInterface()->getPaEmittenti() : array($value);
    }

    /**
     * @inheritDoc
     */
    public function getCcps(): array|null
    {
        $value = $this->getCcp();
        return (is_null($value)) ? $this->getMethodInterface()->getCcps() : array($value);
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
     * @inheritDoc
     */
    public function getCacheKeyPayment(): string
    {
        if ((is_null($this->getSessionIdOriginal())) || (empty($this->getSessionIdOriginal())))
        {
            $iuv            =   $this->getIuv(0);
            $pa_emittente   =   $this->getPaEmittente(0);
            $token          =   $this->getCcp(0);
            return base64_encode(sprintf('attempt_%s_%s_%s', $iuv, $pa_emittente, $token));
        }
        $session        = $this->getSessionIdOriginal();
        return base64_encode(sprintf('sessionOriginal_%s', $session));
    }

    /**
     * @inheritDoc
     */
    public function getCacheKeyAttempt(): string
    {
        if ((is_null($this->getSessionIdOriginal())) || (empty($this->getSessionIdOriginal())))
        {
            $iuv            =   $this->getIuv(0);
            $pa_emittente   =   $this->getPaEmittente(0);
            $token          =   $this->getCcp(0);
            return base64_encode(sprintf('attempt_%s_%s_%s', $iuv, $pa_emittente, $token));
        }
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
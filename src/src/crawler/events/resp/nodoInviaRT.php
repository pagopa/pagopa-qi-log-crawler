<?php

namespace pagopa\crawler\events\resp;

use pagopa\crawler\events\AbstractEvent;
use pagopa\crawler\MapEvents;
use pagopa\crawler\methods\resp\nodoInviaRT as Payload;
use pagopa\database\sherlock\Transaction;
use pagopa\database\sherlock\TransactionDetails;
use pagopa\database\sherlock\Workflow;

class nodoInviaRT extends AbstractEvent
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
        $workflow->setEventId($this->getUniqueId());
        $workflow->setEventTimestamp($this->getInsertedTimestamp());
        $outcome = $this->getMethodInterface()->outcome();
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
        // la nodoInviaRT può essere presente sia per pagamenti mod3 a vecchio che mod1
        // per quelli a mod3 a vecchio, il sessionIdOriginal non è presente, e si gestisce un solo tentativo (iuv+dominio+ccp)
        // se invece il sessionIdOriginal è presente, verrà recuperato dalla getCacheKeyList e questo metodo restituirà null
        if ((is_null($this->getSessionIdOriginal())) || (empty($this->getSessionIdOriginal())))
        {
            $iuv            =   $this->getIuv(0);
            $pa_emittente   =   $this->getPaEmittente(0);
            $token          =   $this->getCcp(0);
            return sprintf('attempt_%s_%s_%s', $iuv, $pa_emittente, $token);
        }
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getCacheKeyAttempt(int $index = 0): string|null
    {
        if ((is_null($this->getSessionIdOriginal())) || (empty($this->getSessionIdOriginal())))
        {
            $iuv            =   $this->getIuv(0);
            $pa_emittente   =   $this->getPaEmittente(0);
            $token          =   $this->getCcp(0);
            return sprintf('attempt_%s_%s_%s', $iuv, $pa_emittente, $token);
        }
        return null;
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
        if (!is_null($this->getSessionIdOriginal()))
        {
            $key = sprintf('sessionOriginal_%s', $this->getSessionIdOriginal());
            $return[] = $key;
        }
        return $return;
    }
}
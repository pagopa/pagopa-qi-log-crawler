<?php

namespace pagopa\crawler\events\req;

use pagopa\crawler\events\AbstractEvent;
use pagopa\crawler\MapEvents;
use pagopa\crawler\methods\MethodInterface;
use pagopa\crawler\methods\req\sendPaymentOutcome as Payload;
use pagopa\database\sherlock\Transaction;
use pagopa\database\sherlock\TransactionDetails;
use pagopa\database\sherlock\Workflow;

class sendPaymentOutcome extends AbstractEvent
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
        return (is_null($this->getIuv())) ? null : array($this->getIuv());
    }

    /**
     * @inheritDoc
     */
    public function getPaEmittenti(): array|null
    {
        return (is_null($this->getPaEmittente())) ? null : array($this->getPaEmittente());
    }

    /**
     * @inheritDoc
     */
    public function getCcps(): array|null
    {
        return (is_null($this->getCcp())) ? null : array($this->getCcp());
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

        return $workflow;
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
    public function getCacheKeyPayment(int $index = 0): string
    {
        $iuv            =   $this->getIuv(0);
        $pa_emittente   =   $this->getPaEmittente(0);

        return sprintf('payment_%s_%s', $iuv, $pa_emittente);

    }

    /**
     * @inheritDoc
     */
    public function getCacheKeyAttempt(int $index = 0): string
    {
        $iuv            =   $this->getIuv(0);
        $pa_emittente   =   $this->getPaEmittente(0);
        $token          =   $this->getPaymentToken(0);

        return sprintf('attempt_%s_%s_%s', $iuv, $pa_emittente, $token);
    }

    /**
     * @return bool
     */
    public function isFaultEvent(): bool
    {
        return false;
    }

    /**
     * @return string|null
     */
    public function getFaultCode(): string|null
    {
        return null;
    }

    /**
     * @return string|null
     */
    public function getFaultString(): string|null
    {
        return null;
    }

    /**
     * @return string|null
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
        if (!is_null($this->getPaymentToken()))
        {
            $key = sprintf('token_%s', $this->getPaymentToken());
            $return[] = $key;
        }
        if (!is_null($this->getSessionId()))
        {
            $key = sprintf('session_id_%s_%s_%s', $this->getSessionId(), $this->getTipoEvento(), $this->getSottoTipoEvento());
            $return[] = $key;
        }
        return $return;
    }
}
<?php

namespace pagopa\crawler\events\req;

use pagopa\crawler\events\AbstractEvent;
use pagopa\crawler\MapEvents;
use pagopa\crawler\methods\MethodInterface;
use pagopa\database\sherlock\Transaction;
use pagopa\database\sherlock\TransactionDetails;
use pagopa\database\sherlock\Workflow;
use pagopa\crawler\methods\req\pspNotifyPaymentV2 as Payload;

class pspNotifyPaymentV2 extends AbstractEvent
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
        $value = $this->getMethodInterface()->getIuvs();
        return (is_null($value)) ? null : $value;
    }

    /**
     * @inheritDoc
     */
    public function getPaEmittenti(): array|null
    {
        $value = $this->getMethodInterface()->getPaEmittenti();
        return (is_null($value)) ? null : $value;
    }

    /**
     * @inheritDoc
     */
    public function getCcps(): array|null
    {
        $value = $this->getMethodInterface()->getCcps();
        return (is_null($value)) ? null : $value;
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
    public function getCacheKeyPayment(int $index = 0): string|null
    {
        // la pspNotifyPaymentV2 non restituisce chiavi anche se potrebbe
        // Questo perchè arriva dopo la closePayment-V2 che genera il sessionIdOriginal
        // sarà lei a creare la chiave cache del sessionIdOriginal con i pagamenti impattati al suo interno
        // quindi in fase di analisi di una pspNotifyPayumentV2 verrà utilizzata la chiave di getCacheKeyList
        // i Payment (solo iuv+dominio) non possono esistere nella pspNotifyPayment/pspNotifyPaymentV2
        // questa logica è applicabile perchè il crawler analizza prima le closePayment-V2
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
     * @inheritDoc
     */
    public function isFaultEvent(): bool
    {
        return false;
    }

    /**
     * @inheritDoc
     */
    public function getFaultCode(): string|null
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getFaultString(): string|null
    {
        return null;
    }

    /**
     * @inheritDoc
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
        if (!is_null($this->getSessionIdOriginal()))
        {
            $key = sprintf('sessionOriginal_%s', $this->getSessionIdOriginal());
            $return[] = $key;
        }
        return $return;
    }
}
<?php

namespace pagopa\crawler\events\req;

use pagopa\crawler\events\AbstractEvent;
use pagopa\crawler\MapEvents;
use pagopa\crawler\methods\req\nodoInviaRPT as Payload;
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
        return (is_null($value)) ? null : array($value);
    }

    /**
     * @inheritDoc
     */
    public function getPaEmittenti(): array|null
    {
        $value = $this->getPaEmittente();
        return (is_null($value)) ? null : array($value);
    }

    /**
     * @inheritDoc
     */
    public function getCcps(): array|null
    {
        $value = $this->getCcp();
        return (is_null($value)) ? null : array($value);
    }

    /**
     * @inheritDoc
     */
    public function transaction(int $index = 0): Transaction|null
    {
        $iuv            =   $this->getIuv();
        $pa_emittente   =   $this->getPaEmittente();
        $ccp            =   $this->getCcp();
        $date_event     =   $this->getInsertedTimestamp()->format('Y-m-d');

        $stazione       =   $this->getStazione();
        $psp_id         =   $this->getPsp();
        $canale         =   $this->getCanale();

        $importo        =   $this->getMethodInterface()->getImporto($index);

        $transaction = new Transaction($this->getInsertedTimestamp());
        $transaction->setIuv($iuv);
        $transaction->setPaEmittente($pa_emittente);
        $transaction->setTokenCcp($ccp);
        $transaction->setInsertedTimestamp($this->getInsertedTimestamp());
        $transaction->setNewColumnValue('date_event', $date_event);
        $transaction->setTouchPoint('TOUCHPOINT_EC_OLD');

        if (!is_null($stazione))
        {
            $transaction->setStazione($stazione);
        }

        if (!is_null($importo))
        {
            $transaction->setImporto($importo);
        }

        if (!is_null($psp_id))
        {
            $transaction->setPsp($psp_id);
        }

        if (!is_null($canale))
        {
            $transaction->setCanale($canale);
        }

        return $transaction;
    }

    public function transactionDetails(int $transfer, int $index = 0): TransactionDetails|null
    {
        $transaction_details = new TransactionDetails($this->getInsertedTimestamp());
        $transaction_details->setNewColumnValue('date_event', $this->getInsertedTimestamp()->format('Y-m-d'));
        $transaction_details->setPaTransfer($this->getMethodInterface()->getTransferPa($transfer, 0));
        $transaction_details->setAmountTransfer($this->getMethodInterface()->getTransferAmount($transfer, 0));
        if ($this->getMethodInterface()->isBollo($transfer, 0))
        {
            $transaction_details->setBollo(true);
        }
        else
        {
            $transaction_details->setTransferIban($this->getMethodInterface()->getTransferIban($transfer, 0));
            $transaction_details->setBollo(false);
        }

        return $transaction_details;
    }

    public function workflowEvent(int $index = 0): Workflow|null
    {
        $workflow = new Workflow($this->getInsertedTimestamp());
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
        return 1;
    }

    /**
     * @inheritDoc
     */
    public function getTransferCount(int $index = 0): int|null
    {
        return $this->getMethodInterface()->getTransferCount();
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
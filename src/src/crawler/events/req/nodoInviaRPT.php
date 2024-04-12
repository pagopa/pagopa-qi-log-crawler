<?php

namespace pagopa\crawler\events\req;

use pagopa\crawler\AbstractEvent;
use pagopa\crawler\MapEvents;
use pagopa\crawler\methods\MethodInterface;
use pagopa\database\sherlock\Transaction;
use pagopa\database\sherlock\TransactionDetails;
use pagopa\database\sherlock\Workflow;
use pagopa\crawler\methods\req\nodoInviaRPT as Payload;

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
        $column = $this->getColumn('iuv');
        return (empty($column)) ? $this->getMethodInterface()->getIuv() : $column;

    }

    /**
     * @inheritDoc
     */
    public function getPaymentToken(int $index = 0): string|null
    {
        $column = $this->getColumn('ccp');
        return (empty($column)) ? $this->getMethodInterface()->getToken() : $column;

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
    public function getPsp(): string|null
    {
        $column = $this->getColumn('psp');
        return (empty($column)) ? $this->getMethodInterface()->getPsp() : $column;
    }

    /**
     * @inheritDoc
     */
    public function getStazione(): string|null
    {
        $column = $this->getColumn('stazione');
        return (empty($column)) ? $this->getMethodInterface()->getStazione() : $column;
    }

    public function getCanale(): string|null
    {
        $column = $this->getColumn('canale');
        return (empty($column)) ? $this->getMethodInterface()->getCanale() : $column;

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
}
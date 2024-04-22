<?php

namespace pagopa\crawler\events\req;

use pagopa\crawler\AbstractEvent;
use pagopa\crawler\MapEvents;
use pagopa\crawler\methods\MethodInterface;
use pagopa\database\sherlock\Transaction;
use pagopa\database\sherlock\TransactionDetails;
use pagopa\database\sherlock\Workflow;
use pagopa\crawler\methods\req\activateIOPayment as Payload;

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
        return (is_null($this->getPaEmittente())) ? $this->getMethodInterface()->getPaEmittenti() : [$this->getPaEmittente()];
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
        $iuv            =   $this->getIuv($index);
        $pa_emittente   =   $this->getPaEmittente($index);
        $date_event     =   $this->getInsertedTimestamp()->format('Y-m-d');

        $notice_id      =   $this->getNoticeNumber($index);

        $psp_id         =   $this->getPsp();
        $canale         =   $this->getCanale();
        $stazione       =   $this->getStazione();

        $importo        =   $this->getMethodInterface()->getImporto(0);

        $transaction = new Transaction($this->getInsertedTimestamp());
        $transaction->setIuv($iuv);
        $transaction->setPaEmittente($pa_emittente);
        $transaction->setInsertedTimestamp($this->getInsertedTimestamp());
        $transaction->setNewColumnValue('date_event', $date_event);
        $transaction->setTouchPoint('APP_IO');

        if (!is_null($notice_id))
        {
            $transaction->setNoticeId($notice_id);
        }

        if (!is_null($psp_id))
        {
            $transaction->setPsp($psp_id);
        }

        if (!is_null($canale))
        {
            $transaction->setCanale($canale);
        }

        if (!is_null($stazione))
        {
            $transaction->setStazione($stazione);
        }

        if (!is_null($importo))
        {
            $transaction->setImporto($importo);
        }

        return $transaction;
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
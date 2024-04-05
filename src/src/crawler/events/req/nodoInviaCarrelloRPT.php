<?php

namespace pagopa\crawler\events\req;

use pagopa\crawler\AbstractEvent;
use pagopa\crawler\MapEvents;
use pagopa\database\sherlock\Transaction;
use pagopa\crawler\methods\req\nodoInviaCarrelloRPT as Payload;
use pagopa\database\sherlock\TransactionDetails;
use pagopa\database\sherlock\Workflow;

class nodoInviaCarrelloRPT extends AbstractEvent
{

    protected Payload $method;

    protected bool $isCart = true;


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
        return $this->getMethodInterface()->getPaEmittente($index);
    }

    /**
     * @inheritDoc
     */
    public function getIuv(int $index = 0): string|null
    {
        return $this->getMethodInterface()->getIuv($index);
    }

    /**
     * @inheritDoc
     */
    public function getCcp(int $index = 0): string|null
    {
        return $this->getMethodInterface()->getCcp($index);
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
        return $this->getMethodInterface()->getIuv($index);
    }

    /**
     * @inheritDoc
     */
    public function getPaymentToken(int $index = 0): string|null
    {
        return $this->getCcp($index);
    }

    /**
     * @inheritDoc
     */
    public function getIuvs(): array|null
    {
        return $this->getMethodInterface()->getIuvs();
    }

    /**
     * @inheritDoc
     */
    public function getPaEmittenti(): array|null
    {
        return $this->getMethodInterface()->getPaEmittenti();
    }

    /**
     * @inheritDoc
     */
    public function getCcps(): array|null
    {
        return $this->getMethodInterface()->getCcps();
    }

    /**
     * @inheritDoc
     */
    public function getPsp(): string|null
    {
        $column = $this->getColumn('psp');
        if (empty($column))
        {
            return $this->getMethodInterface()->getPsp();
        }
        return $column;
    }

    /**
     * @inheritDoc
     */
    public function getStazione(): string|null
    {
        $column = $this->getColumn('stazione');
        if (empty($column))
        {
            return $this->getMethodInterface()->getStazione();
        }
        return $column;
    }

    public function getCanale(): string|null
    {
        $canale = $this->getColumn('canale');
        if (empty($canale))
        {
            return $this->getMethodInterface()->getCanale();
        }
        return $canale;
    }

    public function getBrokerPa(): string|null
    {
        $broker = $this->getColumn('stazione');
        if (empty($broker))
        {
            return $this->getMethodInterface()->getBrokerPa();
        }
        $e = explode('_', $broker, 2);
        return $e[0];
    }

    public function getBrokerPsp(): string|null
    {
        $broker = $this->getColumn('canale');
        if (empty($broker))
        {
            return $this->getMethodInterface()->getBrokerPsp();
        }
        $e = explode('_', $broker, 2);
        return $e[0];
    }

    /**
     * @inheritDoc
     */
    public function getKey(int $index = 0): string
    {
        $date           =   $this->getInsertedTimestamp()->format('Ymd');
        $iuv            =   $this->getIuv($index);
        $pa             =   $this->getPaEmittente($index);
        $ccp            =   $this->getCcp($index);
        $id_carrello    =   $this->getIdCarrello();
        return base64_encode(sprintf('payment_%s_%s_%s_%s_%s', $date, $iuv, $pa, $ccp, $id_carrello));
    }

    /**
     * @inheritDoc
     */
    public function transaction(int $index = 0): Transaction|null
    {
        if (($index + 1) > $this->getPaymentsCount())
        {
            return null;
        }
        $iuv            =   $this->getIuv($index);
        $pa_emittente   =   $this->getPaEmittente($index);
        $ccp            =   $this->getCcp($index);
        $date_event     =   $this->getInsertedTimestamp()->format('Y-m-d');

        $id_carrello    =   $this->getIdCarrello();

        $broker_psp     =   $this->getBrokerPsp();
        $psp_id         =   $this->getPsp();
        $canale         =   $this->getCanale();

        $broker_pa      =   $this->getBrokerPa();
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

        if (!is_null($id_carrello))
        {
            $transaction->setIdCarrello($id_carrello);
        }

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

    /**
     * @param int $transfer
     * @param int $index
     * @return TransactionDetails|null
     */
    public function transactionDetails(int $transfer = 0, int $index = 0): TransactionDetails|null
    {
        if (($index + 1) > $this->getPaymentsCount())
        {
            return null;
        }

        if (($transfer + 1) > $this->getTransferCount($index))
        {
            return null;
        }

        $transfer_details = new TransactionDetails($this->getInsertedTimestamp());
        $transfer_details->setNewColumnValue('date_event', $this->getInsertedTimestamp()->format('Y-m-d'));
        $transfer_details->setAmountTransfer($this->getMethodInterface()->getTransferAmount($transfer, $index));
        $transfer_details->setPaTransfer($this->getMethodInterface()->getTransferPa($transfer, $index));
        if ($this->getMethodInterface()->isBollo($transfer, $index))
        {
            $transfer_details->setBollo(true);
        }
        else
        {
            $transfer_details->setTransferIban($this->getMethodInterface()->getTransferIban($transfer, $index));
            $transfer_details->setBollo(false);
        }
        return $transfer_details;
    }

    /**
     * @param int $index
     * @return Workflow|null
     */
    public function workflowEvent(int $index = 0): Workflow|null
    {
        if (($index + 1) > $this->getPaymentsCount())
        {
            return null;
        }
        $workflow = new Workflow($this->getInsertedTimestamp());
        $workflow->setNewColumnValue('date_event', $this->getInsertedTimestamp()->format('Y-m-d'));
        $workflow->setEventId($this->getUniqueId());
        $workflow->setEventTimestamp($this->getInsertedTimestamp());
        if (!is_null($this->getStazione()))
        {
            $workflow->setStazione($this->getStazione());
        }
        $workflow->setFkTipoEvento(MapEvents::getMethodId($this->getTipoEvento(), $this->getSottoTipoEvento()));
        return $workflow;
    }

    /**
     * @inheritDoc
     */
    public function isValid(int $index = 0): bool
    {
        return !empty($this->getColumn('sessionidoriginal'));
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
     * Restituisce l'id carrello
     * @return string
     */
    public function getIdCarrello(): string|null
    {
        return $this->getMethodInterface()->getIdCarrello();
    }

    /**
     * @return string
     */
    public function getCacheKeyPayment(): string
    {
        $session        = $this->getSessionIdOriginal();
        return base64_encode(sprintf('sessionOriginal_%s', $session));
    }

    /**
     * @return string
     */
    public function getCacheKeyAttempt(): string
    {
        $session        = $this->getSessionIdOriginal();
        return base64_encode(sprintf('sessionOriginal_%s', $session));

    }
}
<?php

namespace pagopa\crawler\events\req;

use pagopa\crawler\AbstractEvent;
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
    public function getPaEmittente(int $index = 0): string|null
    {
        return $this->getColumn('iddominio');
    }

    /**
     * @inheritDoc
     */
    public function getIuv(int $index = 0): string|null
    {
        return $this->getColumn('iuv');
    }

    /**
     * @inheritDoc
     */
    public function getCcp(int $index = 0): string|null
    {
        return $this->getColumn('ccp');
    }

    /**
     * @inheritDoc
     */
    public function getNoticeNumber(int $index = 0): string|null
    {
        return $this->getColumn('noticenumber');
    }

    /**
     * @inheritDoc
     */
    public function getCreditorReferenceId(int $index = 0): string|null
    {
        return $this->getColumn('creditorreferenceid');
    }

    /**
     * @inheritDoc
     */
    public function getPaymentToken(int $index = 0): string|null
    {
        return $this->getColumn('paymenttoken');
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
    public function getPsp(): string|null
    {
        return $this->getColumn('psp');
    }

    /**
     * @inheritDoc
     */
    public function getStazione(): string|null
    {
        return $this->getColumn('stazione');
    }

    /**
     * @inheritDoc
     */
    public function getCanale(): string|null
    {
        $column = $this->getColumn('canale');
        return (empty($column)) ? $this->getMethodInterface()->getCanale() : $column;
    }

    /**
     * @inheritDoc
     */
    public function getBrokerPa(): string|null
    {
        if (empty($this->getStazione()))
        {
            return null;
        }
        $stazione = explode('_', $this->getStazione(), 2);
        return $stazione[0]; // ricavo il broker pa splittando la stazione
    }

    /**
     * @inheritDoc
     */
    public function getBrokerPsp(): string|null
    {
        if (is_null($this->getMethodInterface()->getBrokerPsp()))
        {
            if (empty($this->getCanale()))
            {
                return null;
            }
            $canale = explode('_', $this->getCanale(), 2);
            return $canale[0];
        }
        return $this->getMethodInterface()->getBrokerPsp();
    }

    /**
     * @inheritDoc
     */
    public function getKey(int $index = 0): string|null
    {
        // TODO: Implement getKey() method.
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
    public function isValid(int $index = 0): bool
    {
        $iuv = $this->getIuv(0);
        $pa = $this->getPaEmittente(0);
        $token = $this->getPaymentToken(0);
        return ($iuv && $pa && $token);
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
}
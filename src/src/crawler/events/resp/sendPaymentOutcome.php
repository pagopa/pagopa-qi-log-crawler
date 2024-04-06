<?php

namespace pagopa\crawler\events\resp;

use pagopa\crawler\AbstractEvent;
use pagopa\crawler\FaultInterface;
use pagopa\crawler\MapEvents;
use pagopa\crawler\methods\MethodInterface;
use pagopa\crawler\methods\resp\sendPaymentOutcome as Payload;
use pagopa\database\sherlock\Transaction;
use pagopa\database\sherlock\TransactionDetails;
use pagopa\database\sherlock\Workflow;

class sendPaymentOutcome extends AbstractEvent implements FaultInterface
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
    public function getPaEmittente(int $index = 0): string|null
    {
        $pa = $this->getColumn('iddominio');
        return (empty($pa)) ? null : $pa;

    }

    /**
     * @inheritDoc
     */
    public function getIuv(int $index = 0): string|null
    {
        $iuv = $this->getColumn('iuv');
        return (empty($iuv)) ? null : $iuv;

    }

    /**
     * @inheritDoc
     */
    public function getCcp(int $index = 0): string|null
    {
        $ccp = $this->getColumn('ccp');
        return (empty($ccp)) ? null : $ccp;
    }

    /**
     * @inheritDoc
     */
    public function getNoticeNumber(int $index = 0): string|null
    {
        return (empty($this->getColumn('noticenumber'))) ? null : $this->getColumn('noticenumber');
    }

    /**
     * @inheritDoc
     */
    public function getCreditorReferenceId(int $index = 0): string|null
    {
        $iuv = $this->getColumn('creditorreferenceid');
        return (empty($iuv)) ? null : $iuv;
    }

    /**
     * @inheritDoc
     */
    public function getPaymentToken(int $index = 0): string|null
    {
        $token = $this->getColumn('paymenttoken');
        return (empty($token)) ? null : $token;
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

    public function getCanale(): string|null
    {
        return $this->getColumn('canale');
    }

    public function getBrokerPa(): string|null
    {
        if (is_null($this->getStazione()))
        {
            return null;
        }
        $stazione = explode('_', $this->getStazione(), 2);
        return $stazione[0];
    }

    public function getBrokerPsp(): string|null
    {
        if (is_null($this->getCanale()))
        {
            return null;
        }
        $canale = explode('_', $this->getCanale(), 2);
        return $canale[0];
    }

    /**
     * @inheritDoc
     */
    public function getKey(int $index = 0): string|null
    {
        return '';
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
        $date = $this->getInsertedTimestamp()->format('Y-m-d');
        return ($date && $iuv && $pa && $token);
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
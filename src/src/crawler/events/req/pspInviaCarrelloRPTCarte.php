<?php

namespace pagopa\crawler\events\req;

use pagopa\crawler\events\AbstractEvent;
use pagopa\crawler\MapEvents;
use pagopa\crawler\methods\req\pspInviaCarrelloRPTCarte as Payload;
use pagopa\database\sherlock\Transaction;
use pagopa\database\sherlock\TransactionDetails;
use pagopa\database\sherlock\Workflow;

class pspInviaCarrelloRPTCarte extends AbstractEvent
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
        return $this->getMethodInterface()->getPsp();
    }

    /**
     * @inheritDoc
     */
    public function getStazione(): string|null
    {
        return null;
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
        return null;
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
        if (($index + 1) > $this->getPaymentsCount())
        {
            return null;
        }

        $workflow = new Workflow($this->getInsertedTimestamp());
        $workflow->setNewColumnValue('date_event', $this->getInsertedTimestamp()->format('Y-m-d'));
        $workflow->setEventId($this->getUniqueId());
        $workflow->setEventTimestamp($this->getInsertedTimestamp());
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
        // la pspInviaCarrelloRPT carte mette i pagamenti in cache quando si tratta di pagamento POS
        // in questo caso le colonne di iuv/dominio/ccp sono valorizzate e il pagamento non è nato con
        // una nodoInviaCarrelloRPT/nodoInviaRPT.
        // nel caso in cui queste informazioni non siano presenti nell'evento, restituisce null
        // e i pagamenti vengono recuperati dal sessionIdOriginal , perchè il pagamento è nato con una
        // nodoInviaCarrelloRPT/nodoInviaRPT
        $iuv            = $this->getColumn('iuv');
        $pa_emittente   = $this->getColumn('iddominio');
        $token          = $this->getColumn('ccp');
        $key            = null;
        if (($iuv) && ($pa_emittente) && ($token))
        {
            $key = base64_encode(sprintf('attempt_%s_%s_%s', $iuv, $pa_emittente, $token));
        }
        return $key;
    }

    /**
     * @inheritDoc
     */
    public function getCacheKeyAttempt(int $index = 0): string|null
    {
        $iuv            = $this->getColumn('iuv');
        $pa_emittente   = $this->getColumn('iddominio');
        $token          = $this->getColumn('ccp');
        $key            = null;
        if (($iuv) && ($pa_emittente) && ($token))
        {
            $key = base64_encode(sprintf('attempt_%s_%s_%s', $iuv, $pa_emittente, $token));
        }
        return $key;
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
        if (!is_null($this->getSessionId()))
        {
            $key = sprintf('session_id_%s_%s_%s', $this->getSessionId(), $this->getTipoEvento(), $this->getSottoTipoEvento());
            $return[] = $key;
        }
        return $return;
    }
}
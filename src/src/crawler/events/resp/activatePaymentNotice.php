<?php

namespace pagopa\crawler\events\resp;

use pagopa\crawler\AbstractEvent;
use pagopa\crawler\FaultInterface;
use pagopa\crawler\methods\resp\activatePaymentNotice as Payload;
use pagopa\database\sherlock\Transaction;

class activatePaymentNotice extends AbstractEvent implements FaultInterface
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
        if (empty($this->getColumn('iddominio')))
        {
            // se la colonna iddominio è vuota, provo a recuperare dal payload
            return $this->getMethodInterface()->getPaEmittente(0);
        }
        return $this->getColumn('iddominio');
    }

    /**
     * @inheritDoc
     */
    public function getIuv(int $index = 0): string|null
    {
        if (empty($this->getColumn('iuv')))
        {
            // se la colonna iuv è vuota, provo a recuperare dal payload visto che nella response dell'activatePaymentNotice il valore c'è (se non c'è fault)
            return $this->getMethodInterface()->getIuv(0);
        }
        return $this->getColumn('iuv');
    }

    /**
     * @inheritDoc
     */
    public function getCcp(int $index = 0): string|null
    {
        if (empty($this->getColumn('ccp')))
        {
            // se la colonna iddominio è vuota, provo a recuperare dal payload
            return $this->getMethodInterface()->getCcp(0);
        }
        return $this->getColumn('ccp');
    }

    /**
     * Restituisce il notice number dalle info dell'evento. Nel payload non c'è
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
        if (empty($this->getColumn('creditorreferenceid')))
        {
            // se la colonna iuv è vuota, provo a recuperare dal payload visto che nella response dell'activatePaymentNotice il valore c'è (se non c'è fault)
            return $this->getMethodInterface()->getIuv(0);
        }
        return $this->getColumn('creditorreferenceid');
    }

    /**
     * @inheritDoc
     */
    public function getPaymentToken(int $index = 0): string|null
    {
        if (empty($this->getColumn('paymenttoken')))
        {
            // se la colonna iuv è vuota, provo a recuperare dal payload visto che nella response dell'activatePaymentNotice il valore c'è (se non c'è fault)
            return $this->getMethodInterface()->getToken(0);
        }
        return $this->getColumn('paymenttoken');
    }

    /**
     * Chiedo al mio metodo, che preleva o dall'evento o dal payload.
     * Sarà sempre e solo 1 lo IUV
     */
    public function getIuvs(): array|null
    {
        return (is_null($this->getIuv(0))) ? null : [$this->getIuv(0)];
    }

    /**
     * Come per getIuvs())
     */
    public function getPaEmittenti(): array|null
    {
        return (is_null($this->getPaEmittente(0))) ? null : [$this->getPaEmittente(0)];
    }

    /**
     * Come per getIuvs())
     */
    public function getCcps(): array|null
    {
        return (is_null($this->getCcp(0))) ? null : [$this->getCcp(0)];
    }

    /**
     * Nel payload non c'è
     */
    public function getPsp(): string|null
    {
        return (empty($this->getColumn('psp'))) ? null : $this->getColumn('psp');
    }

    /**
     * Nel payload non c'è
     */
    public function getStazione(): string|null
    {
        return (empty($this->getColumn('stazione'))) ? null : $this->getColumn('stazione');
    }

    /**
     * Nel payload non c'è
     * @return string|null
     */
    public function getCanale(): string|null
    {
        return (empty($this->getColumn('canale'))) ? null : $this->getColumn('canale');
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
    public function getKey(int $index = 0): string
    {
        // TODO: Implement getKey() method.
    }

    /**
     * @inheritDoc
     */
    public function transaction(int $index = 0): Transaction|null
    {
        // TODO: Implement transaction() method.
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
     * Restituisce sempre 1 perchè l'activatePaymentNotice non gestisce più di uno IUV
     */
    public function getPaymentsCount(): int
    {
        return 1;
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

    /**
     * @param int $index
     * @return int|null
     */
    public function getTransferCount(int $index = 0): int|null
    {
        return $this->getMethodInterface()->getTransferCount($index);
    }
}
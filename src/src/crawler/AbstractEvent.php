<?php

namespace pagopa\crawler;

use pagopa\crawler\methods\MethodInterface;
use pagopa\database\sherlock\Transaction;
use pagopa\database\sherlock\TransactionRe;

abstract class AbstractEvent implements EventInterface
{

    /**
     * Contiene i dati dell'evento
     * @var array
     */
    protected array $data = [];

    /**
     * Rappresenta la singola riga dell'evento prelevata dal Registro Eventi
     * @var Transaction
     */
    protected TransactionRe $instance;


    public function __construct(array $eventData)
    {
        $this->data = $eventData;
        $payload = '';
        if (array_key_exists('payload', $eventData))
        {
            $payload = (is_resource($eventData["payload"])) ? base64_decode(stream_get_contents($eventData["payload"])) : base64_decode($eventData["payload"]);
            $this->data["payload"] = $payload;
        }
        $date = new \DateTime($eventData['insertedtimestamp']);
        $this->instance = new TransactionRe($date, $eventData);
    }

    /**
     * @inheritDoc
     */
    public function getColumn(string $column): string|null
    {
        return (array_key_exists($column, $this->data)) ? $this->data[$column] : null;
    }

    /**
     * @inheritDoc
     */
    public function getInsertedTimestamp(): \DateTime
    {
        return new \DateTime($this->getColumn('insertedtimestamp'));
    }

    /**
     * @inheritDoc
     */
    public function getTipoEvento(): string
    {
        return $this->getColumn('tipoevento');
    }

    /**
     * @inheritDoc
     */
    public function getSottoTipoEvento(): string
    {
        return $this->getColumn('sottotipoevento');
    }

    /**
     * Restituisce il session id dell'evento
     * @return string|null
     */
    public function getSessionId() : string|null
    {
        return $this->getColumn('sessionid');
    }


    /**
     * Restituisce il session id originale dell'evento
     * @return string|null
     */
    public function getSessionIdOriginal(): string|null
    {
        return $this->getColumn('sessionidoriginal');
    }

    /**
     * Restituisce lo unique id dell'evento
     * @return string|null
     */
    public function getUniqueId() : string|null
    {
        return $this->getColumn('uniqueid');
    }

    /**
     * Restituisce il payload dell'evento già decodificato in base 64
     * @return string|null
     */
    public function getPayload(): string|null
    {
        return $this->getColumn('payload');
    }


    /**
     * @inheritDoc
     */
    abstract public function getPaEmittente(int $index = 0): string|null;

    /**
     * @inheritDoc
     */
    abstract public function getIuv(int $index = 0): string|null;

    /**
     * @inheritDoc
     */
    abstract public function getCcp(int $index = 0): string|null;

    /**
     * @inheritDoc
     */
    abstract public function getNoticeNumber(int $index = 0): string|null;

    /**
     * @inheritDoc
     */
    abstract public function getCreditorReferenceId(int $index = 0): string|null;

    /**
     * @inheritDoc
     */
    abstract public function getPaymentToken(int $index = 0): string|null;

    /**
     * @inheritDoc
     */
    abstract public function getIuvs(): array|null;

    /**
     * @inheritDoc
     */
    abstract public function getPaEmittenti(): array|null;

    /**
     * @inheritDoc
     */
    abstract public function getCcps(): array|null;

    /**
     * Restituisce il psp dell'evento. Sarà la classe che implementa la AbstractEvent a decidere se usare l'evento o il payload
     * @return string|null
     */
    abstract public function getPsp(): string|null;

    /**
     * Restituisce la stazione dell'evento. Sarà la classe che implementa la AbstractEvent a decidere se usare l'evento o il payload
     * @return string|null
     */
    abstract public function getStazione(): string|null;


    abstract public function getCanale(): string|null;


    abstract public function getBrokerPa(): string|null;


    abstract public function getBrokerPsp(): string|null;


    /**
     * @inheritDoc
     */
    public function getIdCarrello(): string
    {
        return '';
    }

    /**
     * @inheritDoc
     */
    abstract public function getKey(int $index = 0): string;

    /**
     * @inheritDoc
     */
    abstract public function transaction(int $index = 0): Transaction|null;

    /**
     * @inheritDoc
     */
    abstract public function isValid(int $index = 0): bool;

    /**
     * @inheritDoc
     */
    abstract public function getMethodInterface(): MethodInterface;


    public function getEventRowInstance(): TransactionRe
    {
        return $this->instance;
    }
}
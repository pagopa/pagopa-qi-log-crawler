<?php

namespace pagopa\crawler;

use pagopa\crawler\EventInterface;
use pagopa\database\sherlock\Transaction;
use pagopa\methods\MethodInterface;

abstract class AbstractEvent implements EventInterface
{

    /**
     * Contiene i dati dell'evento
     * @var array
     */
    protected array $data = [];

    protected MethodInterface $method;


    public function __construct(array $eventData)
    {
        $this->data = $eventData;
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
    abstract public function getIuvs(): array;

    /**
     * @inheritDoc
     */
    abstract public function getPaEmittenti(): array;

    /**
     * @inheritDoc
     */
    abstract public function getCcps(): array;

    /**
     * @inheritDoc
     */
    public function getIdCarrello(): string
    {
        // TODO: Implement getIdCarrello() method.
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
}
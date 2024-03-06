<?php

class ActivatePaymentNotice extends \pagopa\crawler\AbstractEvent
{



    /**
     * @inheritDoc
     */
    public function getPaEmittente(int $index = 0): string|null
    {
        // TODO: Implement getPaEmittente() method.
    }

    /**
     * @inheritDoc
     */
    public function getIuv(int $index = 0): string|null
    {
        // TODO: Implement getIuv() method.
    }

    /**
     * @inheritDoc
     */
    public function getCcp(int $index = 0): string|null
    {
        // TODO: Implement getCcp() method.
    }

    /**
     * @inheritDoc
     */
    public function getNoticeNumber(int $index = 0): string|null
    {
        // TODO: Implement getNoticeNumber() method.
    }

    /**
     * @inheritDoc
     */
    public function getCreditorReferenceId(int $index = 0): string|null
    {
        // TODO: Implement getCreditorReferenceId() method.
    }

    /**
     * @inheritDoc
     */
    public function getPaymentToken(int $index = 0): string|null
    {
        // TODO: Implement getPaymentToken() method.
    }

    /**
     * @inheritDoc
     */
    public function getIuvs(): array
    {
        // TODO: Implement getIuvs() method.
    }

    /**
     * @inheritDoc
     */
    public function getPaEmittenti(): array
    {
        // TODO: Implement getPaEmittenti() method.
    }

    /**
     * @inheritDoc
     */
    public function getCcps(): array
    {
        // TODO: Implement getCcps() method.
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
    public function transaction(int $index = 0): \pagopa\database\sherlock\Transaction|null
    {
        // TODO: Implement transaction() method.
    }

    /**
     * @inheritDoc
     */
    public function isValid(int $index = 0): bool
    {
        // TODO: Implement isValid() method.
    }

    /**
     * @inheritDoc
     */
    public function getMethodInterface(): \pagopa\methods\MethodInterface
    {
        // TODO: Implement getMethodInterface() method.
    }

    /**
     * @inheritDoc
     */
    public function getPsp(): string|null
    {
        // TODO: Implement getPsp() method.
    }

    /**
     * @inheritDoc
     */
    public function getStazione(): string|null
    {
        // TODO: Implement getStazione() method.
    }

    /**
     * @inheritDoc
     */
    public function getCanale(): string|null
    {
        // TODO: Implement getCanale() method.
    }

    /**
     * @inheritDoc
     */
    public function getBrokerPa(): string|null
    {
        // TODO: Implement getBrokerPa() method.
    }

    /**
     * @inheritDoc
     */
    public function getBrokerPsp(): string|null
    {
        // TODO: Implement getBrokerPsp() method.
    }

    /**
     * @inheritDoc
     */
    public function getSessionId(): string|null
    {
        // TODO: Implement getSessionId() method.
    }

    /**
     * @inheritDoc
     */
    public function getSessionIdOriginal(): string|null
    {
        // TODO: Implement getSessionIdOriginal() method.
    }

    /**
     * @inheritDoc
     */
    public function getUniqueId(): string|null
    {
        // TODO: Implement getUniqueId() method.
    }

    /**
     * @inheritDoc
     */
    public function getPayload(): string|null
    {
        // TODO: Implement getPayload() method.
    }

    /**
     * @inheritDoc
     */
    public function getPaymentsCount(): int
    {
        // TODO: Implement getPaymentsCount() method.
    }
}
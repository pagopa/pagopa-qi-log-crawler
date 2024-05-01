<?php

namespace pagopa\crawler\events\req;

use pagopa\crawler\events\AbstractEvent;
use pagopa\crawler\methods\MethodInterface;
use pagopa\database\sherlock\Transaction;
use pagopa\database\sherlock\TransactionDetails;
use pagopa\database\sherlock\Workflow;

class closePaymentV1 extends AbstractEvent
{

    /**
     * @inheritDoc
     */
    public function getIuvs(): array|null
    {
        // TODO: Implement getIuvs() method.
    }

    /**
     * @inheritDoc
     */
    public function getPaEmittenti(): array|null
    {
        // TODO: Implement getPaEmittenti() method.
    }

    /**
     * @inheritDoc
     */
    public function getCcps(): array|null
    {
        // TODO: Implement getCcps() method.
    }

    /**
     * @inheritDoc
     */
    public function transaction(int $index = 0): Transaction|null
    {
        // TODO: Implement transaction() method.
    }

    public function transactionDetails(int $transfer, int $index = 0): TransactionDetails|null
    {
        // TODO: Implement transactionDetails() method.
    }

    public function workflowEvent(int $index = 0): Workflow|null
    {
        // TODO: Implement workflowEvent() method.
    }

    /**
     * @inheritDoc
     */
    public function getMethodInterface(): MethodInterface
    {
        // TODO: Implement getMethodInterface() method.
    }

    /**
     * @inheritDoc
     */
    public function getPaymentsCount(): int|null
    {
        // TODO: Implement getPaymentsCount() method.
    }

    /**
     * @inheritDoc
     */
    public function getTransferCount(int $index = 0): int|null
    {
        // TODO: Implement getTransferCount() method.
    }

    /**
     * @inheritDoc
     */
    public function getCacheKeyPayment(int $index = 0): string|null
    {
        // TODO: Implement getCacheKeyPayment() method.
    }

    /**
     * @inheritDoc
     */
    public function getCacheKeyAttempt(int $index = 0): string|null
    {
        // TODO: Implement getCacheKeyAttempt() method.
    }

    /**
     * @inheritDoc
     */
    public function getCacheKeyList(): array
    {
        // TODO: Implement getCacheKeyList() method.
    }

    /**
     * @inheritDoc
     */
    public function isFaultEvent(): bool
    {
        // TODO: Implement isFaultEvent() method.
    }

    /**
     * @inheritDoc
     */
    public function getFaultCode(): string|null
    {
        // TODO: Implement getFaultCode() method.
    }

    /**
     * @inheritDoc
     */
    public function getFaultString(): string|null
    {
        // TODO: Implement getFaultString() method.
    }

    /**
     * @inheritDoc
     */
    public function getFaultDescription(): string|null
    {
        // TODO: Implement getFaultDescription() method.
    }
}
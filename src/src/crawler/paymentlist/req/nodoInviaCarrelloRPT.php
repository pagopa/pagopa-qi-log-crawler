<?php

namespace pagopa\crawler\paymentlist\req;

use pagopa\crawler\paymentlist\AbstractPaymentList;
use pagopa\database\sherlock\TransactionRe;

class nodoInviaCarrelloRPT extends AbstractPaymentList
{

    /**
     * @inheritDoc
     */
    public function createEventInstance(array $eventData): void
    {
        // TODO: Implement createEventInstance() method.
    }

    /**
     * @inheritDoc
     */
    public function isValidPayment(int $index = 0): bool
    {
        // TODO: Implement isValidPayment() method.
    }

    /**
     * @inheritDoc
     */
    public function isAttempt(int $index = 0): bool
    {
        // TODO: Implement isAttempt() method.
    }

    /**
     * @inheritDoc
     */
    public function isAttemptInCache(int $index = 0): bool
    {
        // TODO: Implement isAttemptInCache() method.
    }

    /**
     * @inheritDoc
     */
    public function isPaymentInCache(int $index = 0): bool
    {
        // TODO: Implement isPaymentInCache() method.
    }

    /**
     * @inheritDoc
     */
    public function isFoundOnDb(int $index = 0): bool
    {
        // TODO: Implement isFoundOnDb() method.
    }

    /**
     * @inheritDoc
     */
    public function runAttemptAlreadyEvaluated(int $index = 0): void
    {
        // TODO: Implement runAttemptAlreadyEvaluated() method.
    }

    /**
     * @inheritDoc
     */
    public function runCreateAttempt(int $index = 0): array
    {
        // TODO: Implement runCreateAttempt() method.
    }

    /**
     * @inheritDoc
     */
    public function runPaymentAlreadyEvaluated(int $index = 0): void
    {
        // TODO: Implement runPaymentAlreadyEvaluated() method.
    }

    /**
     * @inheritDoc
     */
    public function runCreatePayment(int $index = 0): array
    {
        // TODO: Implement runCreatePayment() method.
    }

    /**
     * @inheritDoc
     */
    public function runCopyPaymentToday(int $index = 0): void
    {
        // TODO: Implement runCopyPaymentToday() method.
    }

    /**
     * @inheritDoc
     */
    public function runRejectedEvent(string $message = null): TransactionRe
    {
        // TODO: Implement runRejectedEvent() method.
    }

    /**
     * @inheritDoc
     */
    public function runCompleteEvent(string $message = null): TransactionRe
    {
        // TODO: Implement runCompleteEvent() method.
    }
}
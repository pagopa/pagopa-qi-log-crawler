<?php

namespace pagopa\crawler\methods;

use pagopa\methods\MethodInterface;

class activatePaymentNotice implements MethodInterface
{

    /**
     * Restituisce sempre null perchè nel payload non vi è presenza dello iuv o di più iuv
     * @return array|null
     */
    public function getIuvs(): array|null
    {
        return null;
    }

    /**
     * Restituisce un array con un singolo valore al cui interno c'è il valore del campo qrCode.fiscalCode
     * @return array|null
     */
    public function getPaEmittenti(): array|null
    {
        // TODO: Implement getPaEmittenti() method.
    }

    /**
     * Restituisce sempre null perchè non ci sono ccp/token nel payload
     * @return array|null
     */
    public function getCcps(): array|null
    {
        // TODO: Implement getCcps() method.
    }

    /**
     * Restitiuisce sempre null perchè non ci sono nel payload
     * @return array|null
     */
    public function getAllTokens(): array|null
    {
        // TODO: Implement getAllTokens() method.
    }

    /**
     * Restituisce un array con un singolo valore che rappresenta il campo qrCode.noticeNumber
     * @return array|null
     */
    public function getAllNoticesNumbers(): array|null
    {
        // TODO: Implement getAllNoticesNumbers() method.
    }

    /**
     * Restituisce sempre null
     * @param int $index
     * @return string|null
     */
    public function getIuv(int $index = 0): string|null
    {
        return null;
    }

    /**
     * Restituisce il valore del campo in posizione 0 restituisto da getPaEmittenti()
     * @param int $index
     * @return string|null
     */
    public function getPaEmittente(int $index = 0): string|null
    {
        return (is_null($this->getPaEmittente())) ? null : $this->getPaEmittenti()[0];
    }

    /**
     * Restituisce sempre null
     * @param int $index
     * @return string|null
     */
    public function getCcp(int $index = 0): string|null
    {
        return null;
    }

    /**
     * Restituisce sempre null;
     * @param int $index
     * @return string|null
     */
    public function getToken(int $index = 0): string|null
    {
        return null;
    }

    /**
     * Restituisce l'importo presente al campo <amount> del payload. Questo importo non è attualizzato.
     * @return string|null
     */
    public function getImportoTotale(): string|null
    {
        // TODO: Implement getImportoTotale() method.
    }

    /**
     * Restituisce l'importo presente al campo <amount> del payload. Questo importo non è attualizzato.
     * @param int $index
     * @return string|null
     */
    public function getImporto(int $index = 0): string|null
    {
        // TODO: Implement getImporto() method.
    }

    /**
     * Restituisce null perchè nel payload non ci sono transfer
     * @param int $transfer
     * @param int $index
     * @return string|null
     */
    public function getTransferAmount(int $transfer = 0, int $index = 0): string|null
    {
        return null;
    }

    /**
     * Restituisce null perchè nel payload non ci sono transfer
     * @param int $transfer
     * @param int $index
     * @return string|null
     */
    public function getTransferPa(int $transfer = 0, int $index = 0): string|null
    {
        return null;
    }

    /**
     * Restituisce null perchè nel payload non ci sono transfer
     * @param int $transfer
     * @param int $index
     * @return string|null
     */
    public function getTransferIban(int $transfer = 0, int $index = 0): string|null
    {
        return null;
    }

    /**
     * Restituisce false perchè nel payload non ci sono transfer
     * @param int $transfer
     * @param int $index
     * @return bool
     */
    public function isBollo(int $transfer = 0, int $index = 0): bool
    {
        return false;
    }
}
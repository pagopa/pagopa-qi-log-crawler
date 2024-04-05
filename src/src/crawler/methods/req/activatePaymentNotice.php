<?php

namespace pagopa\crawler\methods\req;

use pagopa\crawler\methods\MethodInterface;
use \XMLReader;

class activatePaymentNotice implements MethodInterface
{

    /**
     * Rappresenta il payload dell'evento
     * @var string
     */
    protected string $payload;


    public function __construct(string $payload = null)
    {
        $this->payload = $payload;
    }

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
        $xml = new XMLReader();
        $xml->XML($this->payload);
        while($xml->read())
        {
            if (($xml->nodeType == XMLReader::ELEMENT) && ($xml->localName == "fiscalCode"))
            {
                return [$xml->readString()];
            }
        }
        return null;
    }

    /**
     * Restituisce sempre null perchè non ci sono ccp/token nel payload
     * @return array|null
     */
    public function getCcps(): array|null
    {
        return null;
    }

    /**
     * Restitiuisce sempre null perchè non ci sono nel payload
     * @return array|null
     */
    public function getAllTokens(): array|null
    {
        return null;
    }

    /**
     * Restituisce un array con un singolo valore che rappresenta il campo qrCode.noticeNumber
     * @return array|null
     */
    public function getAllNoticesNumbers(): array|null
    {
        $xml = new XMLReader();
        $xml->XML($this->payload);
        while($xml->read())
        {
            if (($xml->nodeType == XMLReader::ELEMENT) && ($xml->localName == "noticeNumber"))
            {
                return [$xml->readString()];
            }
        }
        return null;
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
        return (is_null($this->getPaEmittenti())) ? null : $this->getPaEmittenti()[0];
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
     * Restituisce un array con un singolo valore che rappresenta il campo qrCode.noticeNumber
     * @param int $index
     * @return string|null
     */
    public function getNoticeNumber(int $index = 0): string|null
    {
        return (is_null($this->getAllNoticesNumbers())) ? null : $this->getAllNoticesNumbers()[0];
    }

    /**
     * Restituisce l'importo presente al campo <amount> del payload. Questo importo non è attualizzato.
     * @return string|null
     */
    public function getImportoTotale(): string|null
    {
        $xml = new XMLReader();
        $xml->XML($this->payload);
        while($xml->read())
        {
            if (($xml->nodeType == XMLReader::ELEMENT) && ($xml->localName == "amount"))
            {
                return $xml->readString();
            }
        }
        return null;
    }

    /**
     * Restituisce l'importo presente al campo <amount> del payload. Questo importo non è attualizzato.
     * @param int $index
     * @return string|null
     */
    public function getImporto(int $index = 0): string|null
    {
        return $this->getImportoTotale();
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


    /**
     * Restituisce il valore del campo idPSP
     * @return string|null
     */
    public function getPsp(): string|null
    {
        $xml = new XMLReader();
        $xml->XML($this->payload);
        while($xml->read())
        {
            if (($xml->nodeType == XMLReader::ELEMENT) && ($xml->localName == "idPSP"))
            {
                return $xml->readString();
            }
        }
        return null;
    }

    /**
     * Restituisce il valore del campo idBrokerPSP
     * @return string|null
     */
    public function getBrokerPsp(): string|null
    {
        $xml = new XMLReader();
        $xml->XML($this->payload);
        while($xml->read())
        {
            if (($xml->nodeType == XMLReader::ELEMENT) && ($xml->localName == "idBrokerPSP"))
            {
                return $xml->readString();
            }
        }
        return null;
    }

    /**
     * Restituisce il valore del campo idChannel
     * @return string|null
     */
    public function getCanale(): string|null
    {
        $xml = new XMLReader();
        $xml->XML($this->payload);
        while($xml->read())
        {
            if (($xml->nodeType == XMLReader::ELEMENT) && ($xml->localName == "idChannel"))
            {
                return $xml->readString();
            }
        }
        return null;
    }

    /**
     * Restituisce null perchè nel payload non c'è il broker PA
     * @return string|null
     */
    public function getBrokerPa(): string|null
    {
        return null;
    }

    /**
     * Restituisce null perchè nel payload non c'è la stazione
     * @return string|null
     */
    public function getStazione(): string|null
    {
        return null;
    }

    /**
     * @param int $index
     * @return int|null
     */
    public function getTransferCount(int $index = 0): int|null
    {
        return null;
    }

    /**
     * @param int $transfer
     * @param int $index
     * @return string|null
     */
    public function getTransferId(int $transfer = 0, int $index = 0): string|null
    {
        return null;
    }

    /**
     * @return int|null
     */
    public function getPaymentsCount(): int|null
    {
        return 1;
    }

    /**
     * Le request non hanno outcome
     * @return string|null
     */
    public function outcome(): string|null
    {
        return null;
    }
}
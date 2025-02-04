<?php

namespace pagopa\sert\payload;

use Exception;

/**
 * <p>Classe generica che serve a recuperare le informazioni di un payload di una qualsiasi primitiva.
 * Va estesa in base al payload, e nella classe estesa vanno dichiarate solo le costanti utili per recuperare
 * le informazioni presenti nel payload.</p>
 * <p>Ogni costante ha uno scopo, e viene richiamata da un metodo specifico.</p>
 *
 * <p>Es.
 * Se si crea la classe <code>req/activatePaymentNotice</code> che estende <code>RequestXML</code>, è inutile dichiarare <code>XPATH_IUV</code> in quanto
 * nella <code>activatePaymentNotice</code> Request lo IUV non è presente.</p>
 *
 * @see XmlParser
 */
class RequestXML extends XmlParser
{
    /**
     * Xpath per recuperare dal payload il notice Number
     */
    const string XPATH_NAV = '';

    /**
     * Xpath per recuperare dal payload la PA che ha emesso l'avviso
     */
    const string XPATH_PA_EMITTENTE = '';

    /**
     * Xpath per recuperare dal payload lo IUV associato all'avviso
     */
    const string XPATH_IUV = '';

    /**
     * Xpath per recuperare dal payload il creditorReferenceId associato all'avviso (utile per DW)
     */
    const string XPATH_CREDITOR_REFERENCE = '';

    /**
     * Xpath per recuperare dal payload il token relativo al tentativo di pagamento
     */
    const string XPATH_TOKEN = '';

    /**
     * Xpath per recuperare dal payload l'importo del pagamento
     */
    const string XPATH_AMOUNT = '';

    /**
     * Xpath per recuperare dal payload il totale dell'importo (utile per carrelli a vecchio modello)
     */
    const string XPATH_TOTAL_AMOUNT = '';

    /**
     * Xpath per recuperare dal payload il numero di transfers in un payload (si può indicare anche il payment per le primitive che riportano un carrello di avvisi)
     */
    const string XPATH_TRANSFER_COUNT = '';

    /**
     * <p>Xpath per recuperare dal payload il transfer di un pagamento o carrello di pagamenti</p>
     * <p><code>%1$d</code> -> posizione del payment nel payload. <b>default=0</b></p>
     */
    const string XPATH_TRANSFER_ID = '';

    /**
     * <p>Xpath per recuperare dal payload l'importo di un singolo transfer di un pagamento o carrello di pagamenti</p>
     * <p><code>%1$d</code> -> posizione del transfer all'interno del payment presente nel payload. default=0</p>
     * <p><code>%2$d</code> -> posizione del payment all'interno del payload. default=0</p>
     */
    const string XPATH_TRANSFER_AMOUNT = '';

    /**
     * <p>Xpath per recuperare dal payload la pa associata al singolo transfer di un pagamento o carrello di pagamenti</p>
     * <p><code>%1$d</code> -> posizione del transfer all'interno del payment presente nel payload. default=0</p>
     * <p><code>%2$d</code> -> posizione del payment all'interno del payload. default=0</p>
     */
    const string XPATH_TRANSFER_PA = '';

    /**
     * <p>Xpath per recuperare dal payload l'iban associato al singolo transfer di un pagamento o carrello di pagamenti</p>
     * <p><code>%1$d</code> -> posizione del transfer all'interno del payment presente nel payload. default=0</p>
     * <p><code>%2$d</code> -> posizione del payment all'interno del payload. default=0</p>
     */
    const string XPATH_TRANSFER_IBAN = '';

    /**
     * <p>Xpath per recuperare dal payload se il transfer è relativo o meno ad un bollo.</p>
     * <p><code>%1$d</code> -> posizione del transfer all'interno del payment presente nel payload. default=0</p>
     * <p><code>%2$d</code> -> posizione del payment all'interno del payload. default=0</p>
     */
    const string XPATH_TRANSFER_BOLLO = '';

    /**
     * <p>Xpath per recuperare dal payload se il numero di metadata associati al payment (si può indicare anche la posizione del payment nel caso di carrelli)</p>
     * <p><code>%1$d</code> -> posizione del payment all'interno del payload. default=0</p>
     */
    const string XPATH_PAYMENT_METADATA_COUNT = '';

    /**
     * <p>Xpath per recuperare dal payload se il nome dell'iesimo metadata associato al payment (si può indicare anche la posizione del payment nel caso di carrelli)</p>
     * <p><code>%1$d</code> -> posizione del metadata all'interno del payment presente nel payload. default=0</p>
     * <p><code>%2$d</code> -> posizione del payment all'interno del payload. default=0</p>
     */
    const string XPATH_PAYMENT_METADATA_NAME = '';

    /**
     * <p>Xpath per recuperare dal payload se il valore dell'iesimo metadata associato al payment (si può indicare anche la posizione del payment nel caso di carrelli)</p>
     * <p><code>%1$d</code> -> posizione del metadata all'interno del payment presente nel payload. default=0</p>
     * <p><code>%2$d</code> -> posizione del payment all'interno del payload. default=0</p>
     */
    const string XPATH_PAYMENT_METADATA_VALUE = '';

    /**
     * <p>Xpath per recuperare il numero di metadata associati all'iesimo transfer relativo al payment presente nel payload. (si può indicare anche la posizione del payment nel caso di carrelli)</p>
     * <p><code>%1$d</code> -> posizione del metadata all'interno del payment presente nel transfer. default=0</p>
     * <p><code>%2$d</code> -> posizione del transfer all'interno del payment presente nel payload. default=0</p>
     * <p><code>%3$d</code> -> posizione del payment all'interno del payload. default=0</p>
     */
    const string XPATH_TRANSFER_METADATA_COUNT = '';

    /**
     * <p>Xpath per recuperare dal payload se il nome dell'iesimo metadata associato ad un transfer del payment (si può indicare anche la posizione del transfer di un payment e del payment nel caso di carrelli)</p>
     * <p><code>%1$d</code> -> posizione del metadata all'interno del payment presente nel transfer. default=0</p>
     * <p><code>%2$d</code> -> posizione del transfer all'interno del payment presente nel payload. default=0</p>
     * <p><code>%3$d</code> -> posizione del payment all'interno del payload. default=0</p>
     */
    const string XPATH_TRANSFER_METADATA_NAME = '';

    /**
     * <p>Xpath per recuperare dal payload se il valore dell'iesimo metadata associato ad un transfer del payment (si può indicare anche la posizione del transfer di un payment e del payment nel caso di carrelli)</p>
     * <p><code>%1$d</code> -> posizione del metadata all'interno del payment presente nel transfer. default=0</p>
     * <p><code>%2$d</code> -> posizione del transfer all'interno del payment presente nel payload. default=0</p>
     * <p><code>%3$d</code> -> posizione del payment all'interno del payload. default=0
     */
    const string XPATH_TRANSFER_METADATA_VALUE = '';

    /**
     * <p>Xpath per recuperare dal payload il CF del Partner Tecnologo / Intermediario che intermedia la PA emittente</p>
     */
    const string XPATH_BROKER_PA = '';

    /**
     * <p>Xpath per recuperare dal payload il la stazione del Partner Tecnologo / Intermediario che intermedia la PA emittente</p>
     */
    const string XPATH_BROKER_STATION = '';

    /**
     * <p>Xpath per recuperare dal payload il PSP ID che effettua la transazione</p>
     */
    const string XPATH_PSP_ID = '';

    /**
     * <p>Xpath per recuperare dal payload il canale usato dal Partner Tecnologico / Intermediario che intermedia il PSP che effettua il pagamento</p>
     */
    const string XPATH_BROKER_CHANNEL = '';

    /**
     * <p>Xpath per recuperare dal payload il CF del Partner Tecnologico / Intermediario che intermedia il PSP che effettua il pagamento</p>
     */
    const string XPATH_BROKER_PSP = '';

    /**
     * <p>Xpath per recuperare dal payload l'outcome di una operazione, che sia essa una Request o una Response</p>
     */
    const string XPATH_OUTCOME = '';

    /**
     * <p>Restituisce l'i-esimo noticeNumber gestito dal payload</p>
     * @param int $index <p>Posizione del nav all'interno del payload. </p><p>default=0</p>
     * @return string|null
     * @see static::XPATH_NAV
     */
    public function getNav(int $index = 0): string|null
    {
        $xpath = vsprintf(static::XPATH_NAV, [$index]);
        return $this->getElement($xpath);
    }

    /**
     * <p>Restituisce l'i-esima PA che ha emesso l'avviso presente nel payload</p>
     * @param int $index <p>Posizione della PA all'interno del payload</p><p>default=0</p>
     * @return string|null
     * @see static::XPATH_PA_EMITTENTE
     */
    public function getPaEmittente(int $index = 0): string|null
    {
        $index++;
        $xpath = vsprintf(static::XPATH_PA_EMITTENTE, [$index]);
        return $this->getElement($xpath);
    }

    /**
     * <p>Restituisce l'i-esimo IUV associato all'avviso presente nel payload</p>
     * @param int $index <p>Posizione dello IUV all'interno del payload</p><p>default=0</p>
     * @return string|null
     * @see static::XPATH_IUV
     */
    public function getIuv(int $index = 0): string|null
    {
        $index++;
        $xpath = vsprintf(static::XPATH_IUV, [$index]);
        return $this->getElement($xpath);
    }

    /**
     * <p>Restituisce l'i-esimo Creditor Reference Id associato all'avviso presente nel payload</p>
     * @param int $index <p>Posizione del Creditor Reference Id all'interno del payload</p><p>default=0</p>
     * @return string|null
     * @see static::XPATH_CREDITOR_REFERENCE
     */
    public function getCreditorReference(int $index = 0): string|null
    {
        $index++;
        $xpath = vsprintf(static::XPATH_CREDITOR_REFERENCE, [$index]);
        return $this->getElement($xpath);
    }

    /**
     * <p>Restituisce il numero di pagamenti gestito dal payload.</p>
     * <p>Se il payload rappresenta una Response con faultCode, deve restituire 0</p>
     * @return int <p>Numero di pagamenti gestiti dal payload</p>
     */
    public function getPaymentsCount(): int
    {
        return 1;
    }

    /**
     * <p>Restituisce l'i-esimo Token associato all'avviso presente nel payload</p>
     * @param int $index <p>Posizione del token all'interno del payload</p><p>default=0</p>
     * @return string|null
     * @see static::XPATH_TOKEN
     */
    public function getToken(int $index = 0): string|null
    {
        $index++;
        $xpath = vsprintf(static::XPATH_TOKEN, [$index]);
        return $this->getElement($xpath);
    }

    /**
     * <p>Restituisce l'i-esimo importo associato all'avviso presente nel payload</p>
     * @param int $index <p>Posizione dell'importo all'interno del payload</p>
     * @return string|null
     * @see static::XPATH_AMOUNT
     */
    public function getAmount(int $index = 0) : string|null
    {
        $index++;
        $xpath = vsprintf(static::XPATH_AMOUNT, [$index]);
        return $this->getElement($xpath);
    }

    /**
     * <p>Restituisce l'importo totale presente nel payload. Per le primitive che non gestiscono carrelli corrisponde al metodo <code>getAmount()</code></p>
     * @return string|null
     * @see static::XPATH_TOTAL_AMOUNT
     */
    public function getTotalAmount() : string|null
    {
        return $this->getElement(static::XPATH_TOTAL_AMOUNT);
    }

    /**
     * <p>Restituisce il numero di transfer associati al pagamento</p>
     * @param int $paymentPosition <p>Posizione del pagamento nel payload (utile per le <code>pspNotifyPaymentV2</code>). </p><p>default=0</p>
     * @return int
     * @see static::XPATH_TRANSFER_COUNT
     */
    public function getTransferCount(int $paymentPosition = 0): int
    {
        $paymentPosition++;
        $xpath = vsprintf(static::XPATH_TRANSFER_COUNT, [$paymentPosition]);
        return $this->getElementsCount($xpath);
    }

    /**
     * <p>Restituisce l'identificativo del transfer associato al pagamento</p>
     * @param int $transferPosition <p>Posizione del transfer nel payload.</p><p>default=0</p>
     * @param int $paymentPosition <p>Posizione del pagamento nel payload.</p><p>default=0</p>
     * @return string|null
     * @see static::XPATH_TRANSFER_ID
     */
    public function getTransferId(int $transferPosition = 0, int $paymentPosition = 0): string|null
    {
        $transferPosition++;
        $paymentPosition++;
        $xpath = vsprintf(static::XPATH_TRANSFER_ID, [$transferPosition, $paymentPosition]);
        return $this->getElement($xpath);
    }

    /**
     * <p>Restituisce l'importo del transfer alla posizione <code>\$transferPosition</code> del payment <code>\$paymentPosition</code></p>
     * @param int $transferPosition <p>Posizione del transfer nel payload.</p><p>default=0</p>
     * @param int $paymentPosition <p>Posizione del pagamento nel payload, utile nel caso di <code>pspNotifyPaymentV2</code>.</p><p>default=0</p>
     * @return string|null
     * @see static::XPATH_TRANSFER_AMOUNT
     */
    public function getTransferAmount(int $transferPosition = 0, int $paymentPosition = 0): string|null
    {
        $transferPosition++;
        $paymentPosition++;
        $xpath = vsprintf(static::XPATH_TRANSFER_AMOUNT, [$transferPosition, $paymentPosition]);
        return $this->getElement($xpath);
    }

    /**
     * <p>Restituisce l'identificativo della PA associata al transfer <code>\$transferPosition</code> del payment <code>\$paymentPosition</code></p>
     * @param int $transferPosition <p>Posizione del transfer nel payload.</p><p>default=0</p>
     * @param int $paymentPosition <p>Posizione del pagamento nel payload, utile nel caso di <code>pspNotifyPaymentV2</code>.</p><p>default=0</p>
     * @return string|null
     * @see static::XPATH_TRANSFER_PA
     */
    public function getTransferPa(int $transferPosition = 0, int $paymentPosition = 0): string|null
    {
        $transferPosition++;
        $paymentPosition++;
        $xpath = vsprintf(static::XPATH_TRANSFER_PA, [$transferPosition, $paymentPosition]);
        return $this->getElement($xpath);
    }

    /**
     * <p>Restituisce l'IBAN associato al transfer <code>\$transferPosition</code> del payment <code>\$paymentPosition</code></p>
     * @param int $transferPosition <p>Posizione del transfer nel payload.</p><p>default=0</p>
     * @param int $paymentPosition <p>Posizione del pagamento nel payload, utile nel caso di <code>pspNotifyPaymentV2</code>.</p><p>default=0</p>
     * @return string|null
     * @see static::XPATH_TRANSFER_IBAN
     */
    public function getTransferIban(int $transferPosition = 0, int $paymentPosition = 0): string|null
    {
        $transferPosition++;
        $paymentPosition++;
        $xpath = vsprintf(static::XPATH_TRANSFER_IBAN, [$transferPosition, $paymentPosition]);
        return $this->getElement($xpath);
    }

    /**
     * <p>Restituisce <code>true/false</code> se il transfer <code>\$transferPosition</code> del payment <code>\$paymentPosition</code> è un bollo</p>
     * @param int $transferPosition <p>Posizione del transfer nel payload.</p><p>default=0</p>
     * @param int $paymentPosition <p>Posizione del pagamento nel payload, utile nel caso di <code>pspNotifyPaymentV2</code>.</p><p>default=0</p>
     * @return bool
     * @see static::XPATH_TRANSFER_BOLLO
     */
    public function isBollo(int $transferPosition = 0, int $paymentPosition = 0): bool
    {
        $transferPosition++;
        $paymentPosition++;
        $xpath = vsprintf(static::XPATH_TRANSFER_BOLLO, [$transferPosition, $paymentPosition]);
        return !is_null($this->getElement($xpath));
    }

    /**
     * <p>Restituisce il numero di metadata associati al payment.</p>
     * @param int $paymentPosition <p>Posizione del payment nel payload, utile nel caso di <code>pspNotifyPaymentV2</code>.</p><p>default=0</p>
     * @return int
     * @see static::XPATH_PAYMENT_METADATA_COUNT
     */
    public function getPaymentMetaDataCount(int $paymentPosition = 0): int
    {
        $paymentPosition++;
        $xpath = vsprintf(static::XPATH_PAYMENT_METADATA_COUNT, [$paymentPosition]);
        return $this->getElementsCount($xpath);
    }

    /**
     * <p>Restituisce il nome del metadata alla posizione <code>\$metadataPosition</code> associato al payment in posizione <code>\$paymentPosition</code></p>
     * @param int $metadataPosition <p>Posizione del metadata nel payment.</p><p>default=0</p>
     * @param int $paymentPosition <p>Posizione del payment nel payload, utile nel caso di <code>pspNotifyPaymentV2</code>.</p></p>default=0</p>
     * @return string|null
     * @see static::XPATH_PAYMENT_METADATA_NAME
     */
    public function getPaymentMetaDataName(int $metadataPosition = 0, int $paymentPosition = 0): string|null
    {
        $metadataPosition++;
        $paymentPosition++;
        $xpath = vsprintf(static::XPATH_PAYMENT_METADATA_NAME, [$metadataPosition, $paymentPosition]);
        return $this->getElement($xpath);
    }

    /**
     * <p>Restituisce il nome del metadata alla posizione<code>\$metadataPosition</code> associato al payment in posizione <code>\$paymentPosition</code></p>
     * @param int $metadataPosition <p>Posizione del metadata nel payment.</p><p>default=0</p>
     * @param int $paymentPosition <p>Posizione del payment nel payload, utile nel caso di <code>pspNotifyPaymentV2</code>.</p><p>default=0</p>
     * @return string|null
     * @see static::XPATH_PAYMENT_METADATA_VALUE
     */
    public function getPaymentMetaDataValue(int $metadataPosition = 0, int $paymentPosition = 0): string|null
    {
        $metadataPosition++;
        $paymentPosition++;
        $xpath = vsprintf(static::XPATH_PAYMENT_METADATA_VALUE, [$metadataPosition, $paymentPosition]);
        return $this->getElement($xpath);
    }

    /**
     * <p>Restituisce il numero di metadata associati al transfer in posizione <code>\$transferPosition</code> per il payment <code>\$paymentPosition</code></p>
     * @param int $transferPosition <p>Posizione del transfer nel payment.</p><p>default=0</p>
     * @param int $paymentPosition <p>Posizione del payment nel payload, utile nel caso di <code>pspNotifyPaymentV2</code>.</p><p>default=0</p>
     * @return int
     * @see static::XPATH_TRANSFER_METADATA_COUNT
     */
    public function getTransferMetaDataCount(int $transferPosition = 0, int $paymentPosition = 0): int
    {
        $transferPosition++;
        $paymentPosition++;
        $xpath = vsprintf(static::XPATH_TRANSFER_METADATA_COUNT, [$transferPosition, $paymentPosition]);
        return $this->getElementsCount($xpath);
    }

    /**
     * <p>Restituisce il nome del metadata in posizione <code>\$metadataPosition</code>, associato al transfer in posizione <code>\$transferPosition</code>, per il payment in posizione <code>\$paymentPosition</code></p>
     * @param int $metadataPosition <p>Posizione del metadata nel transfer.</p><p>default=0</p>
     * @param int $transferPosition <p>Posizione del transfer nel payment.</p><p>default=0</p>
     * @param int $paymentPosition <p>Posizione del payment nel payload, utile nel caso di <code>pspNotifyPaymentV2</code>.</p><p>default=0</p>
     * @return string|null
     * @see static::XPATH_TRANSFER_METADATA_NAME
     */
    public function getTransferMetaDataName(int $metadataPosition = 0, int $transferPosition = 0, int $paymentPosition = 0): string|null
    {
        $metadataPosition++;
        $transferPosition++;
        $paymentPosition++;
        $xpath = vsprintf(static::XPATH_TRANSFER_METADATA_NAME, [$metadataPosition, $transferPosition, $paymentPosition]);
        return $this->getElement($xpath);
    }

    /**
     * <p>Restituisce il valore del metadata in posizione <code>\$metadataPosition</code>, associato al transfer in posizione <code>\$transferPosition</code>, per il payment in posizione <code>\$paymentPosition</code></p>
     * @param int $metadataPosition <p>Posizione del metadata nel transfer.</p><p>default=0</p>
     * @param int $transferPosition <p>Posizione del transfer nel payment.</p><p>default=0</p>
     * @param int $paymentPosition <p>Posizione del payment nel payload, utile nel caso di <code>pspNotifyPaymentV2</code>.</p><p>default=0</p>
     * @return string|null
     * @see static::XPATH_TRANSFER_METADATA_VALUE
     */
    public function getTransferMetaDataValue(int $metadataPosition = 0, int $transferPosition = 0, int $paymentPosition = 0): string|null
    {
        $metadataPosition++;
        $transferPosition++;
        $paymentPosition++;
        $xpath = vsprintf(static::XPATH_TRANSFER_METADATA_VALUE, [$metadataPosition, $transferPosition, $paymentPosition]);
        return $this->getElement($xpath);
    }

    /**
     * <p>Restituisce l'intermediario il CF del <b>Partner Tecnologico</b> / <b>Intermediario</b> che intermedia la PA che emette l'avviso</p>
     * @return string|null
     * @see static::XPATH_BROKER_PA
     */
    public function getBrokerPa(): string|null
    {
        return $this->getElement(static::XPATH_BROKER_PA);
    }

    /**
     * <p>Restituisce la stazione del <b>Partner Tecnologico</b> / <b>Intermediario</b> che intermedia la PA che emette l'avviso</p>
     * @return string|null
     * @see static::XPATH_BROKER_STATION
     */
    public function getBrokerStation(): string|null
    {
        return $this->getElement(static::XPATH_BROKER_STATION);
    }

    /**
     * <p>Restituisce il PSP ID che gestisce la transazione</p>
     * @return string|null
     * @see static::XPATH_PSP_ID
     */
    public function getPspId(): string|null
    {
        return $this->getElement(static::XPATH_PSP_ID);
    }

    /**
     * <p>Restituisce il canale del <b>Partner Tecnologico</b> / <b>Intermediario</b> che intermedia il PSP che effettua la transazione</p>
     * @return string|null
     * @see static::XPATH_BROKER_CHANNEL
     */
    public function getPspChannel(): string|null
    {
        return $this->getElement(static::XPATH_BROKER_CHANNEL);
    }

    /**
     * <p>Restituisce il CF del <b>Partner Tecnologico</b> / <b>Intermediario</b> che intermedia il PSP che effettua la transazione</p>
     * @return string|null
     * @see static::XPATH_BROKER_PSP;
     */
    public function getPspBroker(): string|null
    {
        return $this->getElement(static::XPATH_BROKER_PSP);
    }

    /**
     * <p>Restituisce l'outcome del payload.</p>
     * @return string|null
     * @see static::XPATH_OUTCOME
     */
    public function getOutcome(): string|null
    {
        return $this->getElement(static::XPATH_OUTCOME);
    }
}
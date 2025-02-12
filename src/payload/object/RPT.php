<?php

namespace pagopa\sert\payload\object;

use pagopa\sert\payload\XmlParser;

/**
 * <p>Questa classe serve a gestire il singolo oggetto RPT presente nei metodi del vecchio modello di pagamento</p>*
 */
class RPT extends XmlParser
{

    /**
     * <p>Restituisce l'importo totale della RPT</p>
     * @return string|null <p><code>null</code> se il valore non viene trovato (payload errato)</p>
     */
    public function getImportoSingolaRpt() : string|null
    {
        return $this->getElement('//datiVersamento/importoTotaleDaVersare');
    }

    /**
     * <p>Restituisce l'importo del singolo versamento alla posizione <code>$index</code> di una RPT</p>
     * @param int $index <p>Posizione del versamento. Inizia da 0, default=0</p>
     * @return string|null <p><code>null</code> se il valore non viene trovato (payload errato)</p>
     */
    public function getSingoloVersamento(int $index = 0) : string|null
    {
        $index++;
        $xpath = vsprintf('//datiVersamento/datiSingoloVersamento[%1$d]/importoSingoloVersamento', [$index]);
        return $this->getElement($xpath);
    }

    /**
     * <p>Restituisce l'IBAN del singolo versamento alla posizione <code>$index</code> di una RPT</p>
     * @param int $index <p>Posizione del versamento. Inizia da 0, default=0</p>
     * @return string|null <p><code>null</code> se il valore non viene trovato (probabile bollo)</p>
     */
    public function getIbanAccredito(int $index = 0) : string|null
    {
        $index++;
        $xpath = vsprintf('//datiVersamento/datiSingoloVersamento[%1$d]/ibanAccredito', [$index]);
        return $this->getElement($xpath);
    }

    /**
     * <p>Restituisce la PA alla quale sono destinati i versamenti</p>
     * @return string|null <p><code>null</code> se il valore non viene trovato (payload errato)</p>
     */
    public function getPaTransfer() : string|null
    {
        return $this->getElement('//dominio/identificativoDominio');
    }

    /**
     * <p>Restituisce il numero di versamenti presenti in una RPT</p>
     * @return string|null <p><code>null</code> se non ci sono versamenti (payload errato)</p>
     */
    public function getTransferCount() : string|null
    {
        return $this->getElementsCount('//datiVersamento/datiSingoloVersamento');
    }

    /**
     * <p>Restituisce true/false se il versamento alla posizione <code>$index</code> della RPT è relativo ad un bollo digitale</p>
     * @param int $index
     * @return bool <p><code>true</code> se il versamento <code>$index</code> è un bollo, <code>false</code> se è un SEPA</p>
     */
    public function isBollo(int $index) : bool
    {
        $index++;
        $xpath = vsprintf('//datiVersamento/datiSingoloVersamento[%1$d]/datiMarcaBolloDigitale', [$index]);
        return !is_null($this->getElement($xpath));
    }
}
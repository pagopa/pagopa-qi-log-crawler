<?php

namespace pagopa\sert\payload\object;

use pagopa\sert\payload\XmlParser;


/**
 * <p>Questa classe serve a gestire il singolo oggetto RT presente nei metodi del vecchio modello di pagamento</p>*
 */
class RT extends XmlParser
{

    /**
     * <p>Restituisce la PA destinataria della RT che ha emesso la corrispettiva RPT</p>
     * @return string|null <p><code>null</code> se il valore non viene trovato (payload errato)</p>
     */
    public function getPaEmittente() : string|null
    {
        return $this->getElement('//dominio/identificativoDominio');
    }

    /**
     * <p>Restituisce l'importo totale della RT</p>
     * @return string|null <p><code>null</code> se il valore non viene trovato (payload errato)</p>
     */
    public function getImporto() : string|null
    {
        return $this->getElement('//datiPagamento/importoTotalePagato');
    }

    /**
     * <p>Restituisce l'importo del versamento alla posizione <code>$index</code> nella RT</p>
     * @param int $index <p>Posizione del versamento. Inizia da 0, default=0</p>
     * @return string|null <p><code>null</code> se il valore non viene trovato (payload errato o versamento <code>$index</code> inesistente)</p>
     */
    public function getImportoVersamento(int $index = 0) : string|null
    {
        $index++;
        $xpath = vsprintf('//datiPagamento/datiSingoloPagamento[%1$d]/singoloImportoPagato', [$index]);
        return $this->getElement($xpath);
    }

    /**
     * <p>Restituisce lo IUR (Identificativo Univoco Riscossione) prodotto dal PSP per il versamento alla posizione <code>$index</code> nella RT</p>
     * @param int $index <p>Posizione del versamento. Inizia da 0, default=0</p>
     * @return string|null <p><code>null</code> se il versamento non esiste (payload errato o versamento <code>$index</code> inesistente</p>
     */
    public function getIur(int $index = 0) : string|null
    {
        $index++;
        $xpath = vsprintf('//datiPagamento/datiSingoloPagamento[%1$d]/identificativoUnivocoRiscossione', [$index]);
        return $this->getElement($xpath);
    }

    /**
     * <p>Restituisce l'esito per il versamento alla posizione <code>$index</code> nella RT</p>
     * @param int $index <p>Posizione del versamento. Inizia da 0, default=0</p>
     * @return string|null <p><code>null</code> se il versamento non esiste (payload errato o versamento <code>$index</code> inesistente</p>
     */
    public function getEsito(int $index = 0) : string|null
    {
        $index++;
        $xpath = vsprintf('//datiPagamento/datiSingoloPagamento[%1$d]/esitoSingoloPagamento', [$index]);
        return $this->getElement($xpath);
    }

    /**
     * <p>Restituisce l'esito per il versamento alla posizione <code>$index</code> nella RT</p>
     * @param int $index <p>Posizione del versamento. Inizia da 0, default=0</p>
     * @return bool <p><code>true</code> se il versamento <code>$index</code> è un bollo, <code>false</code> se è un SEPA.</p>
     */
    public function isBollo(int $index = 0) : bool
    {
        $index++;
        $xpath = vsprintf('//datiPagamento/datiSingoloPagamento[%1$d]/allegatoRicevuta', [$index]);
        return !is_null($this->getElement($xpath));
    }

    /**
     * <p>Restituisce il numero di versamenti per la RT</p>
     * @return int <p>Non può essere 0</p>
     */
    public function getVersamentiCount() : int
    {
        return $this->getElementsCount('//datiPagamento/datiSingoloPagamento');
    }

}
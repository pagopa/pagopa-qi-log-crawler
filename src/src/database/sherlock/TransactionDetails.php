<?php

namespace pagopa\database\sherlock;

use pagopa\database\SingleRow;
use Illuminate\Database\Capsule\Manager as Capsule;

class TransactionDetails extends SingleRow
{

    /**
     * Chiavi primarie della tabella TRANSACTION
     * @var array|string[]
     */
    protected array $primary_keys = ['id', 'date_event'];

    /**
     * Solo date event è sufficiente per le insert
     * @var array
     */
    protected array $need_primary_keys = ['date_event'];


    public function __construct(\DateTime $date, array $eventData = [])
    {
        $table = sprintf(TRANSACTION_DETAILS_TABLE, $date->format('Y'));
        parent::__construct($table, $eventData, ['id', 'date_event'], ['date_event']);

    }


    /**
     * Configura la foreign key che punta al Payment/Attempt
     * @param string $fk_payment
     * @return $this
     */
    public function setFkPayment(string $fk_payment) : self
    {
        $this->setNewColumnValue('fk_payment', $fk_payment);
        return $this;
    }

    /**
     * Configura lo IUR del transfer (nel caso di evento di SPO/RT)
     * @param string $iur
     * @return self
     */
    public function setIur(string $iur) : self
    {
        $this->setNewColumnValue('iur', $iur);
        return $this;
    }


    /**
     * Configura la PA che riceverà il transfer
     * @param string $pa
     * @return self
     */
    public function setPaTransfer(string $pa) : self
    {
        $this->setNewColumnValue('pa_transfer', $pa);
        return $this;
    }

    /**
     * Configura l'id del transfer
     * @param string $id_transfer
     * @return $this
     */
    public function setIdTransfer(string $id_transfer) : self
    {
        $this->setNewColumnValue('id_transfer', $id_transfer);
        return $this;
    }

    /**
     * Configura l'iban del transfer
     * @param string $iban
     * @return self
     */
    public function setTransferIban(string $iban) : self
    {
        $this->setNewColumnValue('iban_transfer', $iban);
        return $this;
    }


    /**
     * Configura l'amount del transfer
     * @param string $amount_transfer
     * @return $this
     */
    public function setAmountTransfer(string $amount_transfer) : self
    {
        $this->setNewColumnValue('amount_transfer', $amount_transfer);
        return $this;
    }


    /**
     * Configura true/false se è un bollo
     * @param bool $is_bollo
     * @return self
     */
    public function setBollo(bool $is_bollo) : self
    {
        $this->setNewColumnValue('is_bollo', $is_bollo);
        return $this;
    }


    public static function getDetailsByIdAndDateEvent(string $id, string $date_event) : TransactionDetails
    {
        $datetime = new \DateTime($date_event);
        return new TransactionDetails($datetime, ['id' => $id, 'date_event' => $date_event]);
    }

}
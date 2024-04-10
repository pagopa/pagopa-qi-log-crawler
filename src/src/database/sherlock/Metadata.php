<?php

namespace pagopa\database\sherlock;

use pagopa\database\SingleRow;
use Illuminate\Database\Capsule\Manager as Capsule;

class Metadata extends SingleRow
{
    const ACTIVATE_PAYMENT_LIST         =   'ACTIVATE_PAYMENT_LIST';
    const ACTIVATE_TRANSFER_LIST        =   'ACTIVATE_TRANSFER_LIST';
    const PA_PAYMENT_LIST               =   'PA_PAYMENT_LIST';
    const PA_TRANSFER_LIST              =   'PA_TRANSFER_LIST';
    const PSP_PAYMENT_LIST              =   'PSP_PAYMENT_LIST';
    const PSP_TRANSFER_LIST             =   'PSP_TRANSFER_LIST';

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
        $table = sprintf(METADATA_TABLE, $date->format('Y'));
        parent::__construct($table, $eventData, ['id', 'date_event'], ['date_event']);
    }


    /**
     * Configura la inserted timestamp
     * @param \DateTime $date
     * @return $this
     */
    public function setInsertedTimestamp(\DateTime $date) : self
    {
        $this->setNewColumnValue('inserted_timestamp', $date->format('Y-m-d H:i:s.v'));
        return $this;
    }

    /**
     * Configura l'id del pagamento
     * @param string $fk_payment
     * @return $this
     */
    public function setFkPayment(string $fk_payment) : self
    {
        $this->setNewColumnValue('fk_payment', $fk_payment);
        return $this;
    }


    /**
     * Configura l'id del transfer
     * @param string $fk_transfer
     * @return $this
     */
    public function setFkTransfer(string $fk_transfer) : self
    {
        $this->setNewColumnValue('fk_transfer', $fk_transfer);
        return $this;
    }

    /**
     * Configura il metadata
     * @param string $key
     * @param string $value
     * @param string $method_name
     * @return $this
     */
    public function setMetaData(string $key, string $value, string $method_name = self::ACTIVATE_PAYMENT_LIST) : self
    {
        $this->setNewColumnValue('meta_key', $key);
        $this->setNewColumnValue('meta_value', $value);
        $this->setNewColumnValue('method_name', $method_name);
        return $this;
    }
}
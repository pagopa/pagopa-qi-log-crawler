<?php

namespace pagopa\database\sherlock;

use pagopa\database\SingleRow;
use Illuminate\Database\Capsule\Manager as Capsule;

class ExtraInfo extends SingleRow
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
        $table = sprintf(EXTRA_INFO_TABLE, $date->format('Y'));
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
     * Configura il metadata
     * @param string $key
     * @param string $value
     * @return $this
     */
    public function setMetaData(string $key, string $value) : self
    {
        $this->setNewColumnValue('info_name', $key);
        $this->setNewColumnValue('info_value', $value);
        return $this;
    }
}
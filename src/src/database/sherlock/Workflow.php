<?php

namespace pagopa\database\sherlock;

use pagopa\database\SingleRow;
use Illuminate\Database\Capsule\Manager as Capsule;
use DateTime;

class Workflow extends SingleRow
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


    public function __construct(DateTime $date, array $eventData = [])
    {
        $table = sprintf('transaction_events_%s', $date->format('Y'));
        parent::__construct($table, $eventData, ['id', 'date_event'], ['date_event']);
    }


    /**
     * Configura la inserted timestamp
     * @return $this
     */
    public function setFkPayment(string $fk_payment) : self
    {
        $this->setNewColumnValue('fk_payment', $fk_payment);
        return $this;
    }


    /**
     * Configura l'inserted timestamp dell'evento
     * @param DateTime $date
     * @return $this
     */
    public function setEventTimestamp(DateTime $date) : self
    {
        $this->setNewColumnValue('event_timestamp', $date->format('Y-m-d H:i:s.v'));
        return $this;
    }

    /**
     * Configura l'eventhub id dell'evento
     * @param string $event_id
     * @return $this
     */
    public function setEventId(string $event_id) : self
    {
        $this->setNewColumnValue('event_id', $event_id);
        return $this;
    }


    /**
     * Configura la foreign key al tipoEvento/sottoTipoEvento
     * @param string $fkTipoEvento
     * @return $this
     */
    public function setFkTipoEvento(string $fkTipoEvento) : self
    {
        $this->setNewColumnValue('fk_tipoevento', $fkTipoEvento);
        return $this;
    }


    /**
     * Configura il faultCode dell'evento se esiste
     * @param string $faultCode
     * @return $this
     */
    public function setFaultCode(string $faultCode) : self
    {
        $this->setNewColumnValue('faultcode', $faultCode);
        return $this;
    }
}
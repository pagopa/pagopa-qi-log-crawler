<?php

namespace pagopa\database\sherlock;

use pagopa\database\SingleRow;

class TransactionRe extends SingleRow
{


    public function __construct(\DateTime $date, $eventData = [])
    {
        $table = sprintf(TRANSACTION_RE_TABLE, $date->format('Y'));
        parent::__construct($table, $eventData, ['id', 'date_event'], ['date_event']);

    }


    /**
     * Configura un evento in stato LOADED
     * @param string|null $message
     * @return $this
     */
    public function loaded(string $message = null) : self
    {
        $this->setNewColumnValue('state', 'LOADED');
        if (!is_null($message))
        {
            $this->setNewColumnValue('message', $message);
        }
        return $this;
    }


    public function reject(string $message = null) : self
    {
        $this->setNewColumnValue('state', 'REJECTED');
        if (!is_null($message))
        {
            $this->setNewColumnValue('message', $message);
        }
        return $this;
    }

}
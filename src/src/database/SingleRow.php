<?php

namespace pagopa\database;


class SingleRow implements SingleRowInterface
{


    /**
     * Contiene il nome della tabella
     * @var string
     */
    protected string $table;


    /**
     * Contiene i dati della riga, comprese le primary keys
     * @var array
     */
    protected array $data = array();


    /**
     * Contiene i nuovi dati che andranno a essere inseriti/aggiornati.
     * @var array
     */
    protected array $newdata = array();


    /**
     * Contiene lo uniqid
     * @var string
     */
    protected string $uniqid;


    /**
     * Indica se lo statement e i bindparams sono già stati compilati
     * @var bool
     */
    protected bool $hasAlreadyGenerated = false;


    /**
     * Contiene la query da eseguire
     * @var string
     */
    protected string $query;


    /**
     * Contiene i bind params
     * @var array
     */
    protected array $bindParams;


    /**
     * Contiene la lista delle primary keys
     * @var array
     */
    protected array $primary_keys = [];


    /**
     * Contiene la lista delle primary keys sufficienti a una operazione di insert
     * @var array
     */
    protected array $need_primary_keys = [];


    public function __construct(string $table, array $cached_data = [], array $primary_keys = [], array $need_primary_keys = [])
    {
        $this->table = $table;
        $this->data = $cached_data;
        $this->primary_keys = $primary_keys;
        $this->need_primary_keys = $need_primary_keys;
        $this->uniqid = uniqid();
    }

    /**
     * @inheritDoc
     */
    public function getColumnValue(string $column): mixed
    {
        return (array_key_exists($column, $this->data)) ? $this->data[$column] : null;
    }

    /**
     * @inheritDoc
     */
    public function getReadyColumnValue(string $column): mixed
    {
        return (array_key_exists($column, $this->newdata)) ? $this->newdata[$column] : null;
    }

    /**
     * @inheritDoc
     */
    public function setColumnValue(string $column, mixed $value): self
    {
        $this->data[$column] = $value;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setNewColumnValue(string $column, mixed $value): self
    {
        $this->newdata[$column] = $value;
        return $this;
    }

    /**
     * @param string $column
     * @return self
     */
    public function removeReadyColumn(string $column): self
    {
        if (array_key_exists($column, $this->newdata))
        {
            unset($this->newdata[$column]);
        }
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getRow(): array
    {
        return $this->data;
    }

    /**
     * @inheritDoc
     */
    public function getTable(): string
    {
        return $this->table;
    }

    /**
     * @inheritDoc
     */
    public function getNeedPrimaryKeys(): array
    {
        return $this->need_primary_keys;
    }

    /**
     * @inheritDoc
     */
    public function getPrimaryKeys(): array
    {
        return $this->primary_keys;
    }

    /**
     * @inheritDoc
     */
    public function getUniqueId(): string
    {
        return $this->uniqid;
    }

    /**
     * @inheritDoc
     */
    public function getQuery(): string
    {
        return $this->query;
    }

    /**
     * @inheritDoc
     */
    public function getBindParams(): array
    {
        return $this->bindParams;
    }

    /**
     * @inheritDoc
     */
    public function getQueryAndBindParams(): array
    {
        return ["query" => $this->getQuery(), "params" => $this->getBindParams()];
    }

    /**
     * @inheritDoc
     */
    public function hasAlreadyGenerated(): bool
    {
        return $this->hasAlreadyGenerated;
    }

    /**
     * @return $this
     * @throws SingleRowException
     */
    public function insert(): self
    {
        if ($this->hasAlreadyGenerated)
        {
            return $this;
        }

        foreach($this->getNeedPrimaryKeys() as $key)
        {
            if (!array_key_exists($key, $this->newdata))
            {
                throw new SingleRowException(sprintf('La chiave %s è necessaria', $key));
            }
        }

        foreach($this->getPrimaryKeys() as $key)
        {
            if (!in_array($key, $this->getNeedPrimaryKeys()) && (array_key_exists($key, $this->newdata)))
            {
                // se una chiave primaria non è necessaria ed esiste in newdata, la elimino
                unset($this->newdata[$key]);
            }

        }

        $this->uniqid = uniqid();
        $model = "INSERT INTO %s(%s) VALUES(%s)";

        $columns = implode(",", array_keys($this->newdata)); // tutte le colonne utili per l'insert, quindi escludo le PK non necessaria

        $bindColumns = [];
        foreach($this->newdata as $column => $value)
        {
            $bindName = sprintf(":%s_%s", $column, $this->uniqid);
            $bindColumns[$bindName] = $value;
        }

        $this->query = sprintf($model, $this->getTable(), $columns, implode(",", array_keys($bindColumns)));
        $this->bindParams = $bindColumns;
        $this->hasAlreadyGenerated = true;
        return $this;

    }

    /**
     * @return $this
     * @throws SingleRowException
     */
    public function update(): self
    {
        if ($this->hasAlreadyGenerated)
        {
            return $this;
        }

        $pkeys = [];

        if (count($this->primary_keys) == 0)
        {
            throw new SingleRowException('Non è possibile effettuare una update senza chiavi primarie');
        }


        // prendo dai dati in cache quelle che possono essere le chiavi primarie
        foreach($this->data as $pKey => $pValue)
        {
            if (in_array($pKey, $this->primary_keys))
            {
                $this->setNewColumnValue($pKey, $pValue);
            }
        }


        foreach($this->getPrimaryKeys() as $key)
        {
            // per ogni primary key presente, se essa non esiste nella lista dei dati nuovi, lancio l'exception
            if (!array_key_exists($key, $this->newdata))
            {
                throw new SingleRowException(sprintf("La chiave %s è necessaria per le update su %s", $key, $this->table));
            }
        }

        // remove primary key from newdata
        $backup_data = []; // need for restore primary key in case of multiple update() call
        foreach($this->getPrimaryKeys() as $key)
        {
            $pkeys[$key] = $this->newdata[$key];
            $backup_data[$key] = $this->newdata[$key];
            unset($this->newdata[$key]);
        }


        $model = "UPDATE %s SET %s WHERE %s";

        $sets = [];
        $where = [];
        // set parameters
        $bindParams = [];

        foreach($this->newdata as $column => $value)
        {
            $bindColumn = sprintf(":%s_%s", $column, $this->uniqid);
            $bindParams[$bindColumn] = $value;
            $sets[] = sprintf("%s = %s", $column, $bindColumn);
        }

        $bindParamsKey = [];
        foreach($pkeys as $pkey => $pvalue)
        {
            $pkBindColumn = sprintf(":%s_%s", $pkey, $this->uniqid);
            $bindParamsKey[$pkBindColumn] = $pvalue;
            $where[] = sprintf("%s = %s", $pkey, $pkBindColumn);
        }

        $this->query = sprintf($model, $this->getTable(), implode(",", $sets), implode(" AND ", $where));
        $this->bindParams = array_merge($bindParams, $bindParamsKey);

        // restore delle pkey nel caso di update multipli
        foreach($backup_data as $key => $value)
        {
            $this->newdata[$key] = $value;
        }
        return $this;
    }
}
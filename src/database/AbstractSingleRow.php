<?php

namespace pagopa\sert\database;

use ReflectionClass;


/**
 * <h1>AbstractSingleRow</h1>
 * <p>
 * La classe <code>AbstractSingleRow</code> rappresenta una riga singola di una tabella in un database.
 * Offre funzionalità per la gestione di operazioni comuni sui database come insert e update,
 * inclusa la preparazione dei dati e dei parametri di bind associati.
 * </p>
 * <h2>Esempi di utilizzo</h2>
 * <h3>1. Inserimento di una nuova riga</h3>
 *
 * <code>
 * // extend & configure AbstractSingleRow
 * class MyRow extends AbstractSingleRow {
 *     protected string $table = 'MyTable';
 *
 *     protected array $primary_keys = array('id', 'date_event');
 *
 *     protected array $need_primary_keys = array('date_event');
 *
 * }
 * </code>
 * <code>
 *
 * $row = new MyRow();
 * $row->setReadyColumnValue('colonna1', 'valore1')
 *     ->setReadyColumnValue('colonna2', 'valore2')
 *     ->setReadyColumnValue('date_event', '2024-12-01')
 *     ->insert();
 *  $row->getQueryString(); // Restituisce la query SQL completa INSERT INTO MyTable (date_event, colonna1, colonna2) values (:date_event, :colonna1, :colonna2)
 *  $row->getBindParams(); Restituisce i parametri di binding // array(':date_event' => '2024-12-01', ':colonna1' => 'valore1', ':colonna2' => 'valore2')
 *
 * </code>
 * <h3>2. Aggiornamento di una riga esistente</h3>
 *
 * <code>
 * $row = MyRow::createFromRow(array('id' => 10993, 'date_event' => '2024-12-01', 'colonna1' => 'valore1', 'colonna2' => 'valore2'))
 * $row->setReadyColumnValue('colonna1', 'nuovoValore')
 *     ->update();
 * $row->getQueryString(); // Restituisce la query SQL per l'aggiornamento UPDATE MyTable SET colonna1 = :colonna1 WHERE id = :id AND date_event = :date_event
 * $row->getBindParams(); // Restituisce i parametri di binding array(':id' => 10993, ':date_event' => '2024-12-01', ':colonna1' => 'nuovoValore');
 *
 * </code>
 *
 */
class AbstractSingleRow
{

    /**
     * Nome della tabella
     * @var string
     */
    protected string $table;


    /**
     * Contiene le primary keys della tabella appartenente a questa riga
     * @var array
     */
    protected array $primary_keys = [];


    /**
     * Contiene le primary keys sufficienti ad una insert.
     * Usata per quelle insert dove una primary keys equivale ad una sequence e non è necessario
     * indicarla nella query
     * @var array
     */
    protected array $need_primary_keys = [];


    /**
     * Dati da utilizzare nel caso in cui si conoscano già i dati della riga
     * @var array
     */
    protected array $data = [];


    /**
     * Valori da inserire e/o aggiornare (insert/update))
     * @var array
     */
    protected array $newData = [];


    /**
     * Unique id
     * @var string
     */
    protected string $unique;


    /**
     * Indica se i valori per lo statement sono già stati preparati
     * @var bool
     */
    protected bool $alreadyGenerated = false;


    /**
     * Contiene la query elaborata
     * @var string
     */

    protected string $query;


    /**
     * Contiene i bindParams per le operazioni di insert/update
     * @var array
     */
    protected array $bindParams = [];


    /**
     * Costruttore della classe.
     * @param string $table
     * @param array $primary_keys
     * @param array $need_primary_keys
     */
    public function __construct(string $table = '', array $primary_keys = [], array $need_primary_keys = [])
    {
        $this->setTable($table);
        $this->setPrimaryKeys($primary_keys);
        $this->setNeededPrimaryKeys($need_primary_keys);
        $this->unique = uniqid();

    }

    /**
     * Imposta il nome della tabella
     * @param string $table
     * @return $this
     */
    public function setTable(string $table) : self
    {
        if ($table !== '')
        {
            $this->table = $table;
        }
        return $this;
    }

    /**
     * Restituisce il nome della tabella
     * @return string
     */
    public function getTable() : string
    {
        return $this->table;
    }

    /**
     * Imposta le primary keys della riga
     * @param array $primary_keys
     * @return $this
     */
    public function setPrimaryKeys(array $primary_keys) : self
    {
        if (count($primary_keys) > 0)
        {
            $this->primary_keys = $primary_keys;
        }
        return $this;
    }

    /**
     * Restituisce le primary keys della riga
     * @return array
     */
    public function getPrimaryKeys() : array
    {
        return $this->primary_keys;
    }

    /**
     * Configura le primary key sufficienti per una insert
     * @param array $need_primary_keys
     * @return $this
     */
    public function setNeededPrimaryKeys(array $need_primary_keys) : self
    {
        if (count($need_primary_keys) > 0)
        {
            $this->need_primary_keys = $need_primary_keys;
        }
        return $this;
    }

    /**
     * Restituisce le primary key sufficienti per una insert
     * @return array
     */
    public function getNeededPrimaryKeys() : array
    {
        return $this->need_primary_keys;
    }

    /**
     * Imposta i dati della riga se già si conoscono
     * @param array $data
     * @return $this
     */
    public function setData(array $data) : self
    {
        if (count($data) > 0)
        {
            $this->data = $data;
        }
        return $this;
    }

    /**
     * Restituisce i dati della riga se si conoscono
     * @return array
     */
    public function getData() : array
    {
        return $this->data;
    }

    /**
     * Restituisce il valore di una colonna della riga
     * @param string $column
     * @return mixed
     */
    public function getColumn(string $column) : mixed
    {
        return (array_key_exists($column, $this->data)) ? $this->data[$column] : null;
    }

    /**
     * Configura il valore di una colonna (non configura il valore da inserire/modificare)
     * @param string $column
     * @param mixed $value
     * @return $this
     */
    public function setColumn(string $column, mixed $value) : self
    {
        $this->data[$column] = $value;
        return $this;
    }

    /**
     * Restituisce il valore di una colonna pronta per l'aggiornamento/inserimento
     * @param string $column
     * @return mixed
     */
    public function getReadyColumnValue(string $column) : mixed
    {
        return (array_key_exists($column, $this->newData)) ? $this->newData[$column] : null;
    }

    /**
     * Configura il valore di una colonna pronta per l'aggiornamento/inserimento
     * @param string $column
     * @param mixed $value
     * @return $this
     */
    public function setReadyColumnValue(string $column, mixed $value) : self
    {
        $this->newData[$column] = $value;
        $this->alreadyGenerated = false;
        return $this;
    }


    /**
     * Rimuove una colonna dalla lista dei valori pronti per l'aggiornamento/inserimento
     * @param string $column
     * @return $this
     */
    public function removeReadyColumnValue(string $column) : self
    {
        if (array_key_exists($column, $this->newData))
        {
            unset($this->newData[$column]);
        }
        $this->alreadyGenerated = false;
        return $this;
    }

    /**
     * Restituisce tutta la riga
     * @return array
     */
    public function getRow() : array
    {
        return $this->data;
    }

    /**
     * Restituisce un id univoco usato per le colonne nelle operazioni di bind dei valori
     * @return string
     */
    public function getUnique() : string
    {
        return $this->unique;
    }

    /**
     * Verifica se nell'array dei dati da aggiornare sono presenti le primary key per una update
     * @return void
     * @throws \Exception
     */
    public function checkPrimaryKeys() : void
    {
        foreach($this->getPrimaryKeys() as $primaryKey)
        {
            if (!array_key_exists($primaryKey, $this->newData))
            {
                throw new \Exception(sprintf("Primary key '%s' does not exist", $primaryKey));
            }
        }
    }

    /**
     * Verifica se nell'array di dati da inserire sono presenti le primary key per una insert
     * @return void
     * @throws SingleRowException
     */
    public function checkNeedPrimaryKeys() : void
    {
        foreach($this->getNeededPrimaryKeys() as $column)
        {
            if (!array_key_exists($column, $this->newData))
            {
                throw new SingleRowException(sprintf("Need Column '%s' does not exist", $column));
            }
        }
    }

    /**
     * Prepara i dati (statement e bind values) per una operazione di inserimento
     * @return $this
     */
    public function insert() : self
    {
        // insert into table_name(column_1, column_2, column_3) values(value_1, value_2, value_3)

        if ($this->alreadyGenerated)
        {
            return $this;
        }
        try {
            $this->checkNeedPrimaryKeys();
            // dato che le colonne necessarie all'insert ci sono, creo i bindParams
            $value_binds = [];
            foreach($this->newData as $column => $value)
            {
                $value_binds[sprintf(':%s_%s', $this->getUnique(), $column)] = $value;
            }

            $query = sprintf('INSERT INTO %s(%s) VALUES(%s)',
                $this->getTable(),
                implode(',', array_keys($this->newData)),
                implode(', ', array_keys($value_binds)));
            $this->query = $query;
            $this->bindParams = $value_binds;
            $this->alreadyGenerated = true;
        }
        catch (\Exception $e)
        {
            echo sprintf('Exception: %s -> %s', get_class($e), $e->getMessage());
        }

        return $this;
    }


    /**
     * Prepara i dati per una operazione di aggiornamento
     * @return $this
     */
    public function update() : self
    {
        if ($this->alreadyGenerated)
        {
            return $this;
        }

        try {
            $this->checkPrimaryKeys();
            // remove primary keys from newData
            $newData = $this->newData;
            $pkValues = [];
            $value_binds = [];
            foreach($this->getPrimaryKeys() as $primaryKey)
            {
                // creo i bind per le primary key
                $bindValue = sprintf(':%s_%s', $this->getUnique(), $primaryKey);
                $pkValues[] = sprintf('%s = %s', $primaryKey, $bindValue);
                $value_binds[$bindValue] = $newData[$primaryKey];
                unset($newData[$primaryKey]);
            }
            if (count($newData) == 0)
            {
                throw new \Exception(sprintf("No value(s) to add in '%s'", $this->getTable()));
            }
            $setValues = [];
            foreach($newData as $column => $value)
            {
                // creo i bind per le colonne da modificare
                $bindValue = sprintf(':%s_%s', $this->getUnique(), $column);
                $setValues[] = sprintf('%s = %s',$column, $bindValue); // contiene tutte le colonne da aggiornare
                $value_binds[$bindValue] = $value;
            }

            $query = sprintf('UPDATE %s SET %s WHERE %s',
            $this->getTable(),
            implode(' , ', $setValues),
            implode(' AND ', $pkValues));

            $this->query = $query;
            $this->bindParams = $value_binds;
        }
        catch (\Exception $e)
        {
            echo sprintf('Exception: %s -> %s', get_class($e), $e->getMessage());
        }
        return $this;
    }

    /**
     * Restituisce la query da effettuare (compresa di bindColumn e bindValue)
     * @return string
     */
    public function getQueryString() : string
    {
        return $this->query;
    }

    /**
     * Restituisce la lista dei bind params
     * @return array
     */
    public function getBindParams() : array
    {
        return $this->bindParams;
    }


    /**
     * Restituisce un array contenente la query e i bind params
     * @return array
     */
    public function getQueryAndBindParams() : array
    {
        return [
            'query' => $this->getQueryString(),
            'bindParams' => $this->getBindParams(),
        ];
    }

    /**
     * Configura il valore di una colonna pronta per l'aggiornamento/inserimento
     * @param string $column
     * @param mixed $value
     * @return void
     */
    public function __set(string $column, mixed $value) : void
    {
        $this->newData[$column] = $value;
        $this->alreadyGenerated = false;
    }

    /**
     * Restituisce il valore di una colonna pronta per l'aggiornamento/inserimento
     * @param string $column
     * @return mixed
     */
    public function __get(string $column) : mixed
    {
        if (array_key_exists($column, $this->newData))
        {
            return $this->newData[$column];
        }
        return null;
    }


    /**
     * Crea una classe static::class con dati già al suo interno
     * @throws \ReflectionException
     * @throws SingleRowException
     */
    public static function createFromRow(array $row) : static
    {
        if (static::class === AbstractSingleRow::class)
        {
            throw new SingleRowException(sprintf("Non puoi creare oggetti di tipo %s", AbstractSingleRow::class));
        }

        $className = static::class;
        $reflect = new ReflectionClass($className);
        $instance = $reflect->newInstanceWithoutConstructor();
        $dataProperty = $reflect->getProperty('data');
        $dataProperty->setValue($instance, $row);
        return $instance;
    }

}
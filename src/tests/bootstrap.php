<?php

use Illuminate\Database\Capsule\Manager as Capsule;
use pagopa\database\sherlock\Transaction;
use pagopa\database\sherlock\TransactionRe;
use pagopa\database\sherlock\TransactionDetails;
use pagopa\database\sherlock\Workflow;
use pagopa\database\sherlock\Metadata;
use pagopa\database\sherlock\ExtraInfo;




class GetInfoFromDb
{

    protected Capsule $db;

    public function __construct()
    {
        $capsule = new Capsule;

        $capsule->addConnection([
            'driver' => 'pgsql',
            'host' => DB_HOST,
            'port' => DB_PORT,
            'database' => DB_DATABASE,
            'username' => DB_USERNAME,
            'password' => DB_PASSWORD,
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci'
        ]);

        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }

    public function getTransaction(DateTime $date, string $iuv, string $token = null) : Transaction|null
    {
        $y = $date->format('Y');
        $table = sprintf(TRANSACTION_TABLE, $y);
        $ymd = $date->format('Y-m-d');

        $statement = Capsule::table($table)
            ->where('iuv', '=', $iuv)
            ->where('date_event', '=', $ymd);
        if (!is_null($token))
        {
            $statement->where('token_ccp', '=', $token);
        }
        $result = $statement->get();

        if (is_null($result->get(0)))
        {
            return null;
        }

        return new Transaction($date, (array) $result->get(0));
    }


    public function getTransactionDetails(Transaction $transaction, int $index = 0) : TransactionDetails|null
    {
        $date = new DateTime($transaction->getColumnValue('inserted_timestamp'));
        $ymd = $date->format('Y_m_d');
        $table = sprintf(TRANSACTION_DETAILS_TABLE, $ymd);

        $result = Capsule::table($table)
            ->where('fk_payment', '=', $transaction->getColumnValue('id'))
            ->orderBy('amount_transfer', 'asc')
            ->get();

        $collect = [];
        foreach($result as $details)
        {
            $collect[] = new TransactionDetails($date, (array) $details);
        }

        return (array_key_exists($index, $collect)) ? $collect[$index] : null;
    }

    public function getWorkFlow(Transaction $transaction, int $index = 0) : Workflow|null
    {
        $date = new DateTime($transaction->getColumnValue('inserted_timestamp'));
        $ymd = $date->format('Y_m_d');
        $table = sprintf(TRANSACTION_EVENTS_TABLE, $ymd);
        $table = 'transaction_events_2024';

        $result = Capsule::table($table)
            ->where('fk_payment', '=', $transaction->getColumnValue('id'))
            ->orderBy('event_timestamp', 'asc')
            ->get();

        $collect = [];
        foreach($result as $details)
        {
            $collect[] = new Workflow($date, (array) $details);
        }

        return (array_key_exists($index, $collect)) ? $collect[$index] : null;
    }


    public function getMetadataTransfer(TransactionDetails $details, int $index) : Metadata|null
    {
        $date = new DateTime($details->getColumnValue('date_event'));
        $ymd = $date->format('Y_m_d');
        $table = sprintf(METADATA_TABLE, $ymd);
        $result = Capsule::table($table)
            ->where('fk_payment', '=', $details->getColumnValue('fk_payment'))
            ->where('fk_transfer', '=', $details->getColumnValue('id'))
            ->orderBy('id', 'asc')
            ->get();

        $collect = [];
        foreach($result as $details)
        {
            $collect[] = new Metadata($date, (array) $details);
        }
        return (array_key_exists($index, $collect)) ? $collect[$index] : null;
    }


    public function getExtraInfo(Transaction $transaction, string $extra_info) : ExtraInfo|null
    {
        $date = new DateTime($transaction->getColumnValue('date_event'));
        $ymd = $date->format('Y_m_d');
        $table = sprintf(EXTRA_INFO_TABLE, $ymd);
        $result = Capsule::table($table)
            ->where('fk_payment', '=', $transaction->getColumnValue('id'))
            ->where('date_event', '=', $transaction->getColumnValue('date_event'))
            ->where('info_name','=', $extra_info)
            ->get();

        if ($result->count() == 0)
        {
            return null;
        }

        return new ExtraInfo($date, (array) $result->get(0));
    }


    public function getReEvent(Datetime $date, int $id) : TransactionRe
    {
        $table = sprintf(TRANSACTION_RE_TABLE,$date->format('Y_m_d'));

        $result = Capsule::table($table)
            ->where('id', '=', $id)
            ->get();

        return new TransactionRe($date, (array) $result->get(0));
    }

}

$fake_init = new GetInfoFromDb();

\pagopa\crawler\MapEvents::init();

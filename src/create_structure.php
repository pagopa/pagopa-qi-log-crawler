<?php


if ($argc == 1)
{
    printf("Error: Usage %s <year>", basename(__FILE__));
    echo PHP_EOL;
    printf("Example: php create_structure.php 2024");
    echo PHP_EOL;
    exit(1);
}



require_once './vendor/autoload.php';



use Illuminate\Database\Capsule\Manager as Capsule;




const DB_HOST           =   '172.21.0.2';
const DB_PORT           =   5432;
const DB_DATABASE       =   'postgres';
const DB_USERNAME       =   'postgres';
const DB_PASSWORD       =   'admin';

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

$year = $argv[1];

$sequences = [
    'transaction_%s_id_seq',
    'transaction_%s_details_id_seq',
    'transaction_%s_events_id_seq'
];

$tables = [
    "create table if not exists public.transaction_%s
(
   id            bigint default nextval('transaction_%s_id_seq'::regclass) not null,
   date_event    date                                                        not null,
   inserted_timestamp timestamp                                              not null,
   iuv           varchar(35)                                                 not null,
   pa_emittente  varchar(11)                                                 not null,
   notice_id     varchar(18),
   id_carrello   varchar(35),
   token_ccp     varchar(35)                                                 not null,
   id_broker_pa  varchar(35),
   id_broker_psp varchar(35),
   id_psp        varchar(35),
   stazione      varchar(35),
   canale        varchar(30),
   importo       numeric,
   esito         varchar(10),
   date_wf       json,
   constraint TRANSACTION_%s_pk primary key (date_event, id)
)
partition by RANGE (date_event);",
    "create table if not exists public.transaction_details_%s
(
    id              bigint  default nextval('transaction_%s_details_id_seq'::regclass) not null,
    date_event      date                                                                 not null,
    fk_payment      bigint                                                               not null,
    iur             varchar(35),
    pa_transfer     varchar(11)                                                          not null,
    id_transfer     smallint,
    iban_transfer   varchar(40)                                                          not null,
    amount_transfer numeric,
    is_bollo        boolean default false,
    constraint TRANSACTION_DETAILS_%s_pk primary key (date_event, id)
)
partition by RANGE (date_event);",
    "create table if not exists public.transaction_events_%s
(
    id                bigint default nextval('transaction_%s_events_id_seq'::regclass) not null,
    date_event        date                                                               not null,
    iuv               varchar(35),
    pa_emittente      varchar(11),
    token_ccp         varchar(35),
    event_timestamp   timestamp                                                          not null,
    event_id          varchar(50),
    tipoevento        varchar(40)                                                        not null,
    sotto_tipo_evento varchar(15)                                                       not null,
    faultcode         varchar(50),
    constraint transaction_events_%s_pk primary key (date_event, id)
)
partition by RANGE (date_event);"
];


try {
    $date = new DateTime(sprintf('%s-01-01', $year));
    $date_partition = clone $date;


    /* create sequences */

    printf("Creating sequences..");
    foreach($sequences as $seq)
    {
        $seq_name = sprintf($seq, $date->format('Y'));
        $string = sprintf('create sequence if not exists public.%s', $seq_name);
        Capsule::statement($string);
    }
    printf("done!%s", PHP_EOL);

    /* create tables */
    printf("Creating tables..");
    foreach($tables as $table)
    {
        $table_name = sprintf($table, $date->format('Y'),$date->format('Y'),$date->format('Y'));
        Capsule::statement($table_name);
    }
    printf("done!%s", PHP_EOL);


    /* create monthly partition for transaction */
    printf("Creating monthly partitions and index..");
    while($date_partition->format('Y') == $date->format('Y'))
    {
        $start = clone $date_partition;
        $date_partition->add(new DateInterval('P1M'));
        $end = $date_partition;

        $year = $start->format('Y');
        $month = $start->format('m');
        $ym = sprintf('%s_%s', $year, $month);
        $statement_partition = sprintf("create table if not exists public.transaction_%s partition of public.transaction_%s FOR VALUES FROM ('%s') TO ('%s');", $ym, $year, $start->format('Y-m-d'), $end->format('Y-m-d'));
        $statement_index_iuv = sprintf('create index if not exists transaction_%s_idx_iuv on public.transaction_%s using hash (iuv)', $ym, $ym);
        $statement_index_token = sprintf('create index if not exists transaction_%s_idx_token on public.transaction_%s using hash (token_ccp)', $ym, $ym);
        $statement_index_carrello = sprintf('create index if not exists transaction_%s_idx_carrello on public.transaction_%s using hash (id_carrello)', $ym, $ym);
        Capsule::statement($statement_partition);
        Capsule::statement($statement_index_iuv);
        Capsule::statement($statement_index_token);
        Capsule::statement($statement_index_carrello);
    }
    printf("done!%s", PHP_EOL);

    /* create daily partition for details and workflow */
    printf("Creating daily partitions for events/details..");
    $date_partition = clone $date;
    while($date_partition->format('Y') == $date->format('Y'))
    {
        $start = clone $date_partition;
        $date_partition->add(new DateInterval('P1D'));
        $end = $date_partition;

        $year = $start->format('Y');
        $month = $start->format('m');
        $day = $start->format('d');
        $ymd = sprintf('%s_%s_%s', $year, $month, $day);
        $statement_details = sprintf("create table if not exists public.transaction_details_%s partition of public.transaction_details_%s FOR VALUES FROM ('%s') TO ('%s');", $ymd, $year, $start->format('Y-m-d'), $end->format('Y-m-d'));
        $statement_workflow = sprintf("create table if not exists public.transaction_events_%s partition of public.transaction_events_%s FOR VALUES FROM ('%s') TO ('%s');", $ymd, $year, $start->format('Y-m-d'), $end->format('Y-m-d'));
        Capsule::statement($statement_details);
        Capsule::statement($statement_workflow);
    }
    printf("done!%s", PHP_EOL);

}
catch (Exception $e)
{
    printf("Exception: %s %s", get_class($e), PHP_EOL);
    printf("Message: %s %s", $e->getMessage(), PHP_EOL);
}
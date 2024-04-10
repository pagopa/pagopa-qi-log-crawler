<?php
require_once './vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;


const MEMCACHED_HOST                = '172.17.0.3';
const MEMCACHED_PORT                = "11211";
const DB_HOST                       = '172.17.0.5';
const DB_PORT                       = '5432';
const DB_DATABASE                   = 'postgres';
const DB_USERNAME                   = 'postgres';
const DB_PASSWORD                   = 'mock';
const TRANSACTION_TABLE             = "transaction_%s";
const TRANSACTION_DETAILS_TABLE     = "transaction_details_%s";
const TRANSACTION_EVENTS_TABLE      = "transaction_events_%s";
const TRANSACTION_RE_TABLE          = "transaction_re_%s";



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


$columns = [
    'id',
    'date_event',
    'inserted_timestamp',
    'tipoevento',
    'sottotipoevento',
    'iddominio',
    'iuv',
    'ccp',
    'noticenumber',
    'creditorreferenceid',
    'paymenttoken',
    'psp',
    'stazione',
    'canale',
    'sessionid',
    'sessionidoriginal',
    'uniqueid',
    'payload'
];

Capsule::statement('truncate table transaction_re_2024, transaction_2024, transaction_details_2024, transaction_events_2024, metadata_2024;');
//Analisi singolo evento REQ buono che crea attempt
$table = 'transaction_re_2024';
$query = 'INSERT INTO %s (%s) VALUES(%s)';


/* crawler/activatePaymentNotice/SingleEvent */


$data = [
    ':id'                       => 1,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 09:29:25.232010',
    ':tipoevento'               => 'activatePaymentNotice',
    ':sottotipoevento'          => 'REQ',
    ':iddominio'                => '77777777777',
    ':iuv'                      => '01000000000000001',
    ':ccp'                      => 't0000000000000000000000000000001',
    ':noticenumber'             => '301000000000000001',
    ':creditorreferenceid'      => '01000000000000001',
    ':paymenttoken'             => 't0000000000000000000000000000001',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000001',
    ':sessionidoriginal'        => '',
    ':uniqueid'                 => 'T000001',
    ':payload'                  => 'PHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6bm9kPSJodHRwOi8vcGFnb3BhLWFwaS5wYWdvcGEuZ292Lml0L25vZGUvbm9kZUZvclBzcC54c2QiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIj4KICA8c29hcGVudjpIZWFkZXIvPgogIDxzb2FwZW52OkJvZHk+CiAgICA8bm9kOmFjdGl2YXRlUGF5bWVudE5vdGljZVJlcT4KICAgICAgPGlkUFNQPlBTUF8wMTwvaWRQU1A+CiAgICAgIDxpZEJyb2tlclBTUD44ODg4ODg4ODg4ODwvaWRCcm9rZXJQU1A+CiAgICAgIDxpZENoYW5uZWw+ODg4ODg4ODg4ODhfMDE8L2lkQ2hhbm5lbD4KICAgICAgPHBhc3N3b3JkPioqKioqPC9wYXNzd29yZD4KICAgICAgPHFyQ29kZT4KICAgICAgICA8ZmlzY2FsQ29kZT43Nzc3Nzc3Nzc3NzwvZmlzY2FsQ29kZT4KICAgICAgICA8bm90aWNlTnVtYmVyPjMwMTAwMDAwMDAwMDAwMDAwMTwvbm90aWNlTnVtYmVyPgogICAgICA8L3FyQ29kZT4KICAgICAgPGFtb3VudD4wLjAwPC9hbW91bnQ+CiAgICA8L25vZDphY3RpdmF0ZVBheW1lbnROb3RpY2VSZXE+CiAgPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4=',
];
$render_query = sprintf($query, $table, implode(',', $columns), implode(',', array_keys($data)));

Capsule::statement($render_query, $data);


$data = [
    ':id'                       => 2,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 09:30:00.232010',
    ':tipoevento'               => 'activatePaymentNotice',
    ':sottotipoevento'          => 'REQ',
    ':iddominio'                => '77777777777',
    ':iuv'                      => '01000000000000002',
    ':ccp'                      => 't0000000000000000000000000000002',
    ':noticenumber'             => '301000000000000002',
    ':creditorreferenceid'      => '01000000000000002',
    ':paymenttoken'             => 't0000000000000000000000000000002',
    ':psp'                      => '',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000002',
    ':sessionidoriginal'        => '',
    ':uniqueid'                 => 'T000002',
    ':payload'                  => 'PHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6bm9kPSJodHRwOi8vcGFnb3BhLWFwaS5wYWdvcGEuZ292Lml0L25vZGUvbm9kZUZvclBzcC54c2QiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIj4KICA8c29hcGVudjpIZWFkZXIvPgogIDxzb2FwZW52OkJvZHk+CiAgICA8bm9kOmFjdGl2YXRlUGF5bWVudE5vdGljZVJlcT4KICAgICAgPGlkUFNQPlBTUF8wMTwvaWRQU1A+CiAgICAgIDxpZEJyb2tlclBTUD44ODg4ODg4ODg4ODwvaWRCcm9rZXJQU1A+CiAgICAgIDxpZENoYW5uZWw+ODg4ODg4ODg4ODhfMDE8L2lkQ2hhbm5lbD4KICAgICAgPHBhc3N3b3JkPioqKioqPC9wYXNzd29yZD4KICAgICAgPHFyQ29kZT4KICAgICAgICA8ZmlzY2FsQ29kZT43Nzc3Nzc3Nzc3NzwvZmlzY2FsQ29kZT4KICAgICAgICA8bm90aWNlTnVtYmVyPjMwMTAwMDAwMDAwMDAwMDAwMTwvbm90aWNlTnVtYmVyPgogICAgICA8L3FyQ29kZT4KICAgICAgPGFtb3VudD4wLjAwPC9hbW91bnQ+CiAgICA8L25vZDphY3RpdmF0ZVBheW1lbnROb3RpY2VSZXE+CiAgPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4=',
];

Capsule::statement($render_query, $data);





$data = [
    ':id'                       => 3,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 09:40:00.232010',
    ':tipoevento'               => 'activatePaymentNotice',
    ':sottotipoevento'          => 'REQ',
    ':iddominio'                => '77777777777',
    ':iuv'                      => '01000000000000003',
    ':ccp'                      => '',
    ':noticenumber'             => '301000000000000003',
    ':creditorreferenceid'      => '01000000000000003',
    ':paymenttoken'             => '',
    ':psp'                      => 'PSP_02',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000003',
    ':sessionidoriginal'        => '',
    ':uniqueid'                 => 'T000003',
    ':payload'                  => 'PHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6bm9kPSJodHRwOi8vcGFnb3BhLWFwaS5wYWdvcGEuZ292Lml0L25vZGUvbm9kZUZvclBzcC54c2QiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIj4KICA8c29hcGVudjpIZWFkZXIvPgogIDxzb2FwZW52OkJvZHk+CiAgICA8bm9kOmFjdGl2YXRlUGF5bWVudE5vdGljZVJlcT4KICAgICAgPGlkUFNQPlBTUF8wMTwvaWRQU1A+CiAgICAgIDxpZEJyb2tlclBTUD44ODg4ODg4ODg4ODwvaWRCcm9rZXJQU1A+CiAgICAgIDxpZENoYW5uZWw+ODg4ODg4ODg4ODhfMDE8L2lkQ2hhbm5lbD4KICAgICAgPHBhc3N3b3JkPioqKioqPC9wYXNzd29yZD4KICAgICAgPHFyQ29kZT4KICAgICAgICA8ZmlzY2FsQ29kZT43Nzc3Nzc3Nzc3NzwvZmlzY2FsQ29kZT4KICAgICAgICA8bm90aWNlTnVtYmVyPjMwMTAwMDAwMDAwMDAwMDAwMTwvbm90aWNlTnVtYmVyPgogICAgICA8L3FyQ29kZT4KICAgICAgPGFtb3VudD4wLjAwPC9hbW91bnQ+CiAgICA8L25vZDphY3RpdmF0ZVBheW1lbnROb3RpY2VSZXE+CiAgPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4=',
];

Capsule::statement($render_query, $data);





$data = [
    ':id'                       => 4,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 09:41:00.232010',
    ':tipoevento'               => 'activatePaymentNotice',
    ':sottotipoevento'          => 'REQ',
    ':iddominio'                => '77777777777',
    ':iuv'                      => '01000000000000004',
    ':ccp'                      => '',
    ':noticenumber'             => '301000000000000004',
    ':creditorreferenceid'      => '01000000000000004',
    ':paymenttoken'             => '',
    ':psp'                      => '',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000003',
    ':sessionidoriginal'        => '',
    ':uniqueid'                 => 'T000004',
    ':payload'                  => 'PHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6bm9kPSJodHRwOi8vcGFnb3BhLWFwaS5wYWdvcGEuZ292Lml0L25vZGUvbm9kZUZvclBzcC54c2QiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIj4KICA8c29hcGVudjpIZWFkZXIvPgogIDxzb2FwZW52OkJvZHk+CiAgICA8bm9kOmFjdGl2YXRlUGF5bWVudE5vdGljZVJlcT4KICAgICAgPGlkUFNQPlBTUF8wMTwvaWRQU1A+CiAgICAgIDxpZEJyb2tlclBTUD44ODg4ODg4ODg4ODwvaWRCcm9rZXJQU1A+CiAgICAgIDxpZENoYW5uZWw+ODg4ODg4ODg4ODhfMDE8L2lkQ2hhbm5lbD4KICAgICAgPHBhc3N3b3JkPioqKioqPC9wYXNzd29yZD4KICAgICAgPHFyQ29kZT4KICAgICAgICA8ZmlzY2FsQ29kZT43Nzc3Nzc3Nzc3NzwvZmlzY2FsQ29kZT4KICAgICAgICA8bm90aWNlTnVtYmVyPjMwMTAwMDAwMDAwMDAwMDAwMTwvbm90aWNlTnVtYmVyPgogICAgICA8L3FyQ29kZT4KICAgICAgPGFtb3VudD4wLjAwPC9hbW91bnQ+CiAgICA8L25vZDphY3RpdmF0ZVBheW1lbnROb3RpY2VSZXE+CiAgPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4=',
];

Capsule::statement($render_query, $data);


$data = [
    ':id'                       => 5,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 09:42:00.232010',
    ':tipoevento'               => 'activatePaymentNotice',
    ':sottotipoevento'          => 'REQ',
    ':iddominio'                => '77777777777',
    ':iuv'                      => '',
    ':ccp'                      => '',
    ':noticenumber'             => '301000000000000005',
    ':creditorreferenceid'      => '',
    ':paymenttoken'             => '',
    ':psp'                      => '',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000003',
    ':sessionidoriginal'        => '',
    ':uniqueid'                 => 'T000005',
    ':payload'                  => 'PHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6bm9kPSJodHRwOi8vcGFnb3BhLWFwaS5wYWdvcGEuZ292Lml0L25vZGUvbm9kZUZvclBzcC54c2QiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIj4KICA8c29hcGVudjpIZWFkZXIvPgogIDxzb2FwZW52OkJvZHk+CiAgICA8bm9kOmFjdGl2YXRlUGF5bWVudE5vdGljZVJlcT4KICAgICAgPGlkUFNQPlBTUF8wMTwvaWRQU1A+CiAgICAgIDxpZEJyb2tlclBTUD44ODg4ODg4ODg4ODwvaWRCcm9rZXJQU1A+CiAgICAgIDxpZENoYW5uZWw+ODg4ODg4ODg4ODhfMDE8L2lkQ2hhbm5lbD4KICAgICAgPHBhc3N3b3JkPioqKioqPC9wYXNzd29yZD4KICAgICAgPHFyQ29kZT4KICAgICAgICA8ZmlzY2FsQ29kZT43Nzc3Nzc3Nzc3NzwvZmlzY2FsQ29kZT4KICAgICAgICA8bm90aWNlTnVtYmVyPjMwMTAwMDAwMDAwMDAwMDAwMTwvbm90aWNlTnVtYmVyPgogICAgICA8L3FyQ29kZT4KICAgICAgPGFtb3VudD4wLjAwPC9hbW91bnQ+CiAgICA8L25vZDphY3RpdmF0ZVBheW1lbnROb3RpY2VSZXE+CiAgPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4=',
];

Capsule::statement($render_query, $data);



$data = [
    ':id'                       => 6,
    ':date_event'               => '2024-03-11',
    ':inserted_timestamp'       => '2024-03-11 09:29:25.232010',
    ':tipoevento'               => 'activatePaymentNotice',
    ':sottotipoevento'          => 'REQ',
    ':iddominio'                => '77777777777',
    ':iuv'                      => '01000000000000001',
    ':ccp'                      => 't0000000000000000000000000000001',
    ':noticenumber'             => '301000000000000001',
    ':creditorreferenceid'      => '01000000000000001',
    ':paymenttoken'             => 't0000000000000000000000000000001',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000003',
    ':sessionidoriginal'        => '',
    ':uniqueid'                 => 'T000006',
    ':payload'                  => 'PHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6bm9kPSJodHRwOi8vcGFnb3BhLWFwaS5wYWdvcGEuZ292Lml0L25vZGUvbm9kZUZvclBzcC54c2QiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIj4KICA8c29hcGVudjpIZWFkZXIvPgogIDxzb2FwZW52OkJvZHk+CiAgICA8bm9kOmFjdGl2YXRlUGF5bWVudE5vdGljZVJlcT4KICAgICAgPGlkUFNQPlBTUF8wMTwvaWRQU1A+CiAgICAgIDxpZEJyb2tlclBTUD44ODg4ODg4ODg4ODwvaWRCcm9rZXJQU1A+CiAgICAgIDxpZENoYW5uZWw+ODg4ODg4ODg4ODhfMDE8L2lkQ2hhbm5lbD4KICAgICAgPHBhc3N3b3JkPioqKioqPC9wYXNzd29yZD4KICAgICAgPHFyQ29kZT4KICAgICAgICA8ZmlzY2FsQ29kZT43Nzc3Nzc3Nzc3NzwvZmlzY2FsQ29kZT4KICAgICAgICA8bm90aWNlTnVtYmVyPjMwMTAwMDAwMDAwMDAwMDAwMTwvbm90aWNlTnVtYmVyPgogICAgICA8L3FyQ29kZT4KICAgICAgPGFtb3VudD4wLjAwPC9hbW91bnQ+CiAgICA8L25vZDphY3RpdmF0ZVBheW1lbnROb3RpY2VSZXE+CiAgPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4=',
];

Capsule::statement($render_query, $data);





$data = [
    ':id'                       => 7,
    ':date_event'               => '2024-03-11',
    ':inserted_timestamp'       => '2024-03-11 09:49:25.232010',
    ':tipoevento'               => 'activatePaymentNotice',
    ':sottotipoevento'          => 'REQ',
    ':iddominio'                => '77777777777',
    ':iuv'                      => '01000000000000002',
    ':ccp'                      => 't0000000000000000000000000000002',
    ':noticenumber'             => '301000000000000002',
    ':creditorreferenceid'      => '01000000000000002',
    ':paymenttoken'             => 't0000000000000000000000000000002',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000003',
    ':sessionidoriginal'        => '',
    ':uniqueid'                 => 'T000007',
    ':payload'                  => 'PHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6bm9kPSJodHRwOi8vcGFnb3BhLWFwaS5wYWdvcGEuZ292Lml0L25vZGUvbm9kZUZvclBzcC54c2QiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIj4KICA8c29hcGVudjpIZWFkZXIvPgogIDxzb2FwZW52OkJvZHk+CiAgICA8bm9kOmFjdGl2YXRlUGF5bWVudE5vdGljZVJlcT4KICAgICAgPGlkUFNQPlBTUF8wMTwvaWRQU1A+CiAgICAgIDxpZEJyb2tlclBTUD44ODg4ODg4ODg4ODwvaWRCcm9rZXJQU1A+CiAgICAgIDxpZENoYW5uZWw+ODg4ODg4ODg4ODhfMDE8L2lkQ2hhbm5lbD4KICAgICAgPHBhc3N3b3JkPioqKioqPC9wYXNzd29yZD4KICAgICAgPHFyQ29kZT4KICAgICAgICA8ZmlzY2FsQ29kZT43Nzc3Nzc3Nzc3NzwvZmlzY2FsQ29kZT4KICAgICAgICA8bm90aWNlTnVtYmVyPjMwMTAwMDAwMDAwMDAwMDAwMTwvbm90aWNlTnVtYmVyPgogICAgICA8L3FyQ29kZT4KICAgICAgPGFtb3VudD4wLjAwPC9hbW91bnQ+CiAgICA8L25vZDphY3RpdmF0ZVBheW1lbnROb3RpY2VSZXE+CiAgPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4=',
];

Capsule::statement($render_query, $data);



$data = [
    ':id'                       => 8,
    ':date_event'               => '2024-03-11',
    ':inserted_timestamp'       => '2024-03-11 09:41:25.232010',
    ':tipoevento'               => 'activatePaymentNotice',
    ':sottotipoevento'          => 'REQ',
    ':iddominio'                => '77777777777',
    ':iuv'                      => '01000000000000003',
    ':ccp'                      => '',
    ':noticenumber'             => '301000000000000003',
    ':creditorreferenceid'      => '01000000000000003',
    ':paymenttoken'             => '',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000003',
    ':sessionidoriginal'        => '',
    ':uniqueid'                 => 'T000008',
    ':payload'                  => 'PHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6bm9kPSJodHRwOi8vcGFnb3BhLWFwaS5wYWdvcGEuZ292Lml0L25vZGUvbm9kZUZvclBzcC54c2QiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIj4KICA8c29hcGVudjpIZWFkZXIvPgogIDxzb2FwZW52OkJvZHk+CiAgICA8bm9kOmFjdGl2YXRlUGF5bWVudE5vdGljZVJlcT4KICAgICAgPGlkUFNQPlBTUF8wMTwvaWRQU1A+CiAgICAgIDxpZEJyb2tlclBTUD44ODg4ODg4ODg4ODwvaWRCcm9rZXJQU1A+CiAgICAgIDxpZENoYW5uZWw+ODg4ODg4ODg4ODhfMDE8L2lkQ2hhbm5lbD4KICAgICAgPHBhc3N3b3JkPioqKioqPC9wYXNzd29yZD4KICAgICAgPHFyQ29kZT4KICAgICAgICA8ZmlzY2FsQ29kZT43Nzc3Nzc3Nzc3NzwvZmlzY2FsQ29kZT4KICAgICAgICA8bm90aWNlTnVtYmVyPjMwMTAwMDAwMDAwMDAwMDAwMTwvbm90aWNlTnVtYmVyPgogICAgICA8L3FyQ29kZT4KICAgICAgPGFtb3VudD4wLjAwPC9hbW91bnQ+CiAgICA8L25vZDphY3RpdmF0ZVBheW1lbnROb3RpY2VSZXE+CiAgPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4=',
];

Capsule::statement($render_query, $data);




$data = [
    ':id'                       => 9,
    ':date_event'               => '2024-03-11',
    ':inserted_timestamp'       => '2024-03-11 09:42:25.232010',
    ':tipoevento'               => 'activatePaymentNotice',
    ':sottotipoevento'          => 'REQ',
    ':iddominio'                => '77777777777',
    ':iuv'                      => '01000000000000004',
    ':ccp'                      => '',
    ':noticenumber'             => '301000000000000004',
    ':creditorreferenceid'      => '01000000000000004',
    ':paymenttoken'             => '',
    ':psp'                      => '',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000003',
    ':sessionidoriginal'        => '',
    ':uniqueid'                 => 'T000009',
    ':payload'                  => 'PHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6bm9kPSJodHRwOi8vcGFnb3BhLWFwaS5wYWdvcGEuZ292Lml0L25vZGUvbm9kZUZvclBzcC54c2QiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIj4KICA8c29hcGVudjpIZWFkZXIvPgogIDxzb2FwZW52OkJvZHk+CiAgICA8bm9kOmFjdGl2YXRlUGF5bWVudE5vdGljZVJlcT4KICAgICAgPGlkUFNQPlBTUF8wMTwvaWRQU1A+CiAgICAgIDxpZEJyb2tlclBTUD44ODg4ODg4ODg4ODwvaWRCcm9rZXJQU1A+CiAgICAgIDxpZENoYW5uZWw+ODg4ODg4ODg4ODhfMDE8L2lkQ2hhbm5lbD4KICAgICAgPHBhc3N3b3JkPioqKioqPC9wYXNzd29yZD4KICAgICAgPHFyQ29kZT4KICAgICAgICA8ZmlzY2FsQ29kZT43Nzc3Nzc3Nzc3NzwvZmlzY2FsQ29kZT4KICAgICAgICA8bm90aWNlTnVtYmVyPjMwMTAwMDAwMDAwMDAwMDAwMTwvbm90aWNlTnVtYmVyPgogICAgICA8L3FyQ29kZT4KICAgICAgPGFtb3VudD4wLjAwPC9hbW91bnQ+CiAgICA8L25vZDphY3RpdmF0ZVBheW1lbnROb3RpY2VSZXE+CiAgPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4=',
];

Capsule::statement($render_query, $data);






/* crawler/activatePaymentNotice/BothEvent */



$data_req = [
    ':id'                       => 10,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 10:30:00.197',
    ':tipoevento'               => 'activatePaymentNotice',
    ':sottotipoevento'          => 'REQ',
    ':iddominio'                => '77777777777',
    ':iuv'                      => '01000000000000006',
    ':ccp'                      => 't0000000000000000000000000000006',
    ':noticenumber'             => '301000000000000006',
    ':creditorreferenceid'      => '01000000000000006',
    ':paymenttoken'             => 't0000000000000000000000000000006',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000003',
    ':sessionidoriginal'        => '',
    ':uniqueid'                 => 'T000010',
    ':payload'                  => 'PHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6bm9kPSJodHRwOi8vcGFnb3BhLWFwaS5wYWdvcGEuZ292Lml0L25vZGUvbm9kZUZvclBzcC54c2QiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIj4KCTxzb2FwZW52OkhlYWRlci8+Cgk8c29hcGVudjpCb2R5PgoJCTxub2Q6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVxPgoJCQk8aWRQU1A+UFNQXzAxPC9pZFBTUD4KCQkJPGlkQnJva2VyUFNQPjg4ODg4ODg4ODg4PC9pZEJyb2tlclBTUD4KCQkJPGlkQ2hhbm5lbD44ODg4ODg4ODg4OF8wMTwvaWRDaGFubmVsPgoJCQk8cGFzc3dvcmQ+KioqKio8L3Bhc3N3b3JkPgoJCQk8cXJDb2RlPgoJCQkJPGZpc2NhbENvZGU+Nzc3Nzc3Nzc3Nzc8L2Zpc2NhbENvZGU+CgkJCQk8bm90aWNlTnVtYmVyPjMwMTAwMDAwMDAwMDAwMDAwNjwvbm90aWNlTnVtYmVyPgoJCQk8L3FyQ29kZT4KCQkJPGFtb3VudD4wLjAwPC9hbW91bnQ+CgkJPC9ub2Q6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVxPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4=',
];
$data_resp = [
    ':id'                       => 11,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 10:31:00.197',
    ':tipoevento'               => 'activatePaymentNotice',
    ':sottotipoevento'          => 'RESP',
    ':iddominio'                => '77777777777',
    ':iuv'                      => '01000000000000006',
    ':ccp'                      => 't0000000000000000000000000000006',
    ':noticenumber'             => '301000000000000006',
    ':creditorreferenceid'      => '01000000000000006',
    ':paymenttoken'             => 't0000000000000000000000000000006',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000003',
    ':sessionidoriginal'        => '',
    ':uniqueid'                 => 'T000011',
    ':payload'                  => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVzPgoJCQk8b3V0Y29tZT5PSzwvb3V0Y29tZT4KCQkJPHRvdGFsQW1vdW50PjgwLjAwPC90b3RhbEFtb3VudD4KCQkJPHBheW1lbnREZXNjcmlwdGlvbj54eHh4eHh4PC9wYXltZW50RGVzY3JpcHRpb24+CgkJCTxmaXNjYWxDb2RlUEE+Nzc3Nzc3Nzc3Nzc8L2Zpc2NhbENvZGVQQT4KCQkJPGNvbXBhbnlOYW1lPnh4eHh4eHg8L2NvbXBhbnlOYW1lPgoJCQk8cGF5bWVudFRva2VuPnQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDA2PC9wYXltZW50VG9rZW4+CgkJCTx0cmFuc2Zlckxpc3Q+CgkJCQk8dHJhbnNmZXI+CgkJCQkJPGlkVHJhbnNmZXI+MTwvaWRUcmFuc2Zlcj4KCQkJCQk8dHJhbnNmZXJBbW91bnQ+ODAuMDA8L3RyYW5zZmVyQW1vdW50PgoJCQkJCTxmaXNjYWxDb2RlUEE+Nzc3Nzc3Nzc3Nzc8L2Zpc2NhbENvZGVQQT4KCQkJCQk8SUJBTj5JVDE4VTAwMDAwMDAwMDAwMDAwMDAwMDAwMDE8L0lCQU4+CgkJCQkJPHJlbWl0dGFuY2VJbmZvcm1hdGlvbj54eHh4PC9yZW1pdHRhbmNlSW5mb3JtYXRpb24+CgkJCQk8L3RyYW5zZmVyPgoJCQk8L3RyYW5zZmVyTGlzdD4KCQkJPGNyZWRpdG9yUmVmZXJlbmNlSWQ+MDEwMDAwMDAwMDAwMDAwMDY8L2NyZWRpdG9yUmVmZXJlbmNlSWQ+CgkJPC9uZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVzPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4=',
];
Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);





$data_req = [
    ':id'                       => 12,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 10:31:00.197',
    ':tipoevento'               => 'activatePaymentNotice',
    ':sottotipoevento'          => 'REQ',
    ':iddominio'                => '77777777777',
    ':iuv'                      => '01000000000000007',
    ':ccp'                      => 't0000000000000000000000000000007',
    ':noticenumber'             => '301000000000000007',
    ':creditorreferenceid'      => '01000000000000007',
    ':paymenttoken'             => 't0000000000000000000000000000007',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000003',
    ':sessionidoriginal'        => '',
    ':uniqueid'                 => 'T000012',
    ':payload'                  => 'PHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6bm9kPSJodHRwOi8vcGFnb3BhLWFwaS5wYWdvcGEuZ292Lml0L25vZGUvbm9kZUZvclBzcC54c2QiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIj4KCTxzb2FwZW52OkhlYWRlci8+Cgk8c29hcGVudjpCb2R5PgoJCTxub2Q6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVxPgoJCQk8aWRQU1A+UFNQXzAxPC9pZFBTUD4KCQkJPGlkQnJva2VyUFNQPjg4ODg4ODg4ODg4PC9pZEJyb2tlclBTUD4KCQkJPGlkQ2hhbm5lbD44ODg4ODg4ODg4OF8wMTwvaWRDaGFubmVsPgoJCQk8cGFzc3dvcmQ+KioqKio8L3Bhc3N3b3JkPgoJCQk8cXJDb2RlPgoJCQkJPGZpc2NhbENvZGU+Nzc3Nzc3Nzc3Nzc8L2Zpc2NhbENvZGU+CgkJCQk8bm90aWNlTnVtYmVyPjMwMTAwMDAwMDAwMDAwMDAwNzwvbm90aWNlTnVtYmVyPgoJCQk8L3FyQ29kZT4KCQkJPGFtb3VudD4wLjAwPC9hbW91bnQ+CgkJPC9ub2Q6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVxPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4=',
];
$data_resp = [
    ':id'                       => 13,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 10:32:00.197',
    ':tipoevento'               => 'activatePaymentNotice',
    ':sottotipoevento'          => 'RESP',
    ':iddominio'                => '77777777777',
    ':iuv'                      => '01000000000000007',
    ':ccp'                      => 't0000000000000000000000000000007',
    ':noticenumber'             => '301000000000000007',
    ':creditorreferenceid'      => '01000000000000007',
    ':paymenttoken'             => 't0000000000000000000000000000007',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000003',
    ':sessionidoriginal'        => '',
    ':uniqueid'                 => 'T000013',
    ':payload'                  => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVzPgoJCQk8b3V0Y29tZT5PSzwvb3V0Y29tZT4KCQkJPHRvdGFsQW1vdW50PjgwLjAwPC90b3RhbEFtb3VudD4KCQkJPHBheW1lbnREZXNjcmlwdGlvbj54eHh4eHh4PC9wYXltZW50RGVzY3JpcHRpb24+CgkJCTxmaXNjYWxDb2RlUEE+Nzc3Nzc3Nzc3Nzc8L2Zpc2NhbENvZGVQQT4KCQkJPGNvbXBhbnlOYW1lPnh4eHh4eHg8L2NvbXBhbnlOYW1lPgoJCQk8cGF5bWVudFRva2VuPnQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDA3PC9wYXltZW50VG9rZW4+CgkJCTx0cmFuc2Zlckxpc3Q+CgkJCQk8dHJhbnNmZXI+CgkJCQkJPGlkVHJhbnNmZXI+MTwvaWRUcmFuc2Zlcj4KCQkJCQk8dHJhbnNmZXJBbW91bnQ+NTAuMDA8L3RyYW5zZmVyQW1vdW50PgoJCQkJCTxmaXNjYWxDb2RlUEE+Nzc3Nzc3Nzc3Nzc8L2Zpc2NhbENvZGVQQT4KCQkJCQk8SUJBTj5JVDE4VTAwMDAwMDAwMDAwMDAwMDAwMDAwMDE8L0lCQU4+CgkJCQkJPHJlbWl0dGFuY2VJbmZvcm1hdGlvbj54eHh4PC9yZW1pdHRhbmNlSW5mb3JtYXRpb24+CgkJCQk8L3RyYW5zZmVyPgoJCQkJPHRyYW5zZmVyPgoJCQkJCTxpZFRyYW5zZmVyPjI8L2lkVHJhbnNmZXI+CgkJCQkJPHRyYW5zZmVyQW1vdW50PjMwLjAwPC90cmFuc2ZlckFtb3VudD4KCQkJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc4PC9maXNjYWxDb2RlUEE+CgkJCQkJPElCQU4+SVQxOFUwMDAwMDAwMDAwMDAwMDAwMDAwMDAyPC9JQkFOPgoJCQkJCTxyZW1pdHRhbmNlSW5mb3JtYXRpb24+eHh4eDwvcmVtaXR0YW5jZUluZm9ybWF0aW9uPgoJCQkJPC90cmFuc2Zlcj4KCQkJPC90cmFuc2Zlckxpc3Q+CgkJCTxjcmVkaXRvclJlZmVyZW5jZUlkPjAxMDAwMDAwMDAwMDAwMDA3PC9jcmVkaXRvclJlZmVyZW5jZUlkPgoJCTwvbmZwOmFjdGl2YXRlUGF5bWVudE5vdGljZVJlcz4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+',
];
Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);






$data_req = [
    ':id'                       => 14,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 10:35:00.197',
    ':tipoevento'               => 'activatePaymentNotice',
    ':sottotipoevento'          => 'REQ',
    ':iddominio'                => '77777777777',
    ':iuv'                      => '01000000000000008',
    ':ccp'                      => 't0000000000000000000000000000008',
    ':noticenumber'             => '301000000000000008',
    ':creditorreferenceid'      => '01000000000000008',
    ':paymenttoken'             => 't0000000000000000000000000000008',
    ':psp'                      => '',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000003',
    ':sessionidoriginal'        => '',
    ':uniqueid'                 => 'T000014',
    ':payload'                  => 'PHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6bm9kPSJodHRwOi8vcGFnb3BhLWFwaS5wYWdvcGEuZ292Lml0L25vZGUvbm9kZUZvclBzcC54c2QiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIj4KCTxzb2FwZW52OkhlYWRlci8+Cgk8c29hcGVudjpCb2R5PgoJCTxub2Q6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVxPgoJCQk8aWRQU1A+UFNQXzAxPC9pZFBTUD4KCQkJPGlkQnJva2VyUFNQPjg4ODg4ODg4ODg4PC9pZEJyb2tlclBTUD4KCQkJPGlkQ2hhbm5lbD44ODg4ODg4ODg4OF8wMTwvaWRDaGFubmVsPgoJCQk8cGFzc3dvcmQ+KioqKio8L3Bhc3N3b3JkPgoJCQk8cXJDb2RlPgoJCQkJPGZpc2NhbENvZGU+Nzc3Nzc3Nzc3Nzc8L2Zpc2NhbENvZGU+CgkJCQk8bm90aWNlTnVtYmVyPjMwMTAwMDAwMDAwMDAwMDAwODwvbm90aWNlTnVtYmVyPgoJCQk8L3FyQ29kZT4KCQkJPGFtb3VudD4wLjAwPC9hbW91bnQ+CgkJPC9ub2Q6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVxPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4=',
];
$data_resp = [
    ':id'                       => 15,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 10:36:00.197',
    ':tipoevento'               => 'activatePaymentNotice',
    ':sottotipoevento'          => 'RESP',
    ':iddominio'                => '77777777777',
    ':iuv'                      => '01000000000000008',
    ':ccp'                      => 't0000000000000000000000000000008',
    ':noticenumber'             => '301000000000000008',
    ':creditorreferenceid'      => '01000000000000008',
    ':paymenttoken'             => 't0000000000000000000000000000008',
    ':psp'                      => '',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000003',
    ':sessionidoriginal'        => '',
    ':uniqueid'                 => 'T000015',
    ':payload'                  => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVzPgoJCQk8b3V0Y29tZT5PSzwvb3V0Y29tZT4KCQkJPHRvdGFsQW1vdW50PjEyMC4wMDwvdG90YWxBbW91bnQ+CgkJCTxwYXltZW50RGVzY3JpcHRpb24+eHh4eHh4eDwvcGF5bWVudERlc2NyaXB0aW9uPgoJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCTxjb21wYW55TmFtZT54eHh4eHh4PC9jb21wYW55TmFtZT4KCQkJPHBheW1lbnRUb2tlbj50MDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwODwvcGF5bWVudFRva2VuPgoJCQk8dHJhbnNmZXJMaXN0PgoJCQkJPHRyYW5zZmVyPgoJCQkJCTxpZFRyYW5zZmVyPjE8L2lkVHJhbnNmZXI+CgkJCQkJPHRyYW5zZmVyQW1vdW50PjEyMC4wMDwvdHJhbnNmZXJBbW91bnQ+CgkJCQkJPGZpc2NhbENvZGVQQT43Nzc3Nzc3Nzc3NzwvZmlzY2FsQ29kZVBBPgoJCQkJCTxJQkFOPklUMThVMDAwMDAwMDAwMDAwMDAwMDAwMDAwMTwvSUJBTj4KCQkJCQk8cmVtaXR0YW5jZUluZm9ybWF0aW9uPnh4eHg8L3JlbWl0dGFuY2VJbmZvcm1hdGlvbj4KCQkJCTwvdHJhbnNmZXI+CgkJCTwvdHJhbnNmZXJMaXN0PgoJCQk8Y3JlZGl0b3JSZWZlcmVuY2VJZD4wMTAwMDAwMDAwMDAwMDAwODwvY3JlZGl0b3JSZWZlcmVuY2VJZD4KCQk8L25mcDphY3RpdmF0ZVBheW1lbnROb3RpY2VSZXM+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg==',
];
Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);







$data_req = [
    ':id'                       => 16,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 10:38:00.197',
    ':tipoevento'               => 'activatePaymentNotice',
    ':sottotipoevento'          => 'REQ',
    ':iddominio'                => '77777777777',
    ':iuv'                      => '01000000000000009',
    ':ccp'                      => 't0000000000000000000000000000009',
    ':noticenumber'             => '301000000000000009',
    ':creditorreferenceid'      => '01000000000000009',
    ':paymenttoken'             => 't0000000000000000000000000000009',
    ':psp'                      => '',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000003',
    ':sessionidoriginal'        => '',
    ':uniqueid'                 => 'T000016',
    ':payload'                  => 'PHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6bm9kPSJodHRwOi8vcGFnb3BhLWFwaS5wYWdvcGEuZ292Lml0L25vZGUvbm9kZUZvclBzcC54c2QiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIj4KCTxzb2FwZW52OkhlYWRlci8+Cgk8c29hcGVudjpCb2R5PgoJCTxub2Q6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVxPgoJCQk8aWRQU1A+UFNQXzAxPC9pZFBTUD4KCQkJPGlkQnJva2VyUFNQPjg4ODg4ODg4ODg4PC9pZEJyb2tlclBTUD4KCQkJPGlkQ2hhbm5lbD44ODg4ODg4ODg4OF8wMTwvaWRDaGFubmVsPgoJCQk8cGFzc3dvcmQ+KioqKio8L3Bhc3N3b3JkPgoJCQk8cXJDb2RlPgoJCQkJPGZpc2NhbENvZGU+Nzc3Nzc3Nzc3Nzc8L2Zpc2NhbENvZGU+CgkJCQk8bm90aWNlTnVtYmVyPjMwMTAwMDAwMDAwMDAwMDAwOTwvbm90aWNlTnVtYmVyPgoJCQk8L3FyQ29kZT4KCQkJPGFtb3VudD4wLjAwPC9hbW91bnQ+CgkJPC9ub2Q6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVxPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4=',
];
$data_resp = [
    ':id'                       => 17,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 10:39:00.197',
    ':tipoevento'               => 'activatePaymentNotice',
    ':sottotipoevento'          => 'RESP',
    ':iddominio'                => '77777777777',
    ':iuv'                      => '01000000000000009',
    ':ccp'                      => 't0000000000000000000000000000009',
    ':noticenumber'             => '301000000000000009',
    ':creditorreferenceid'      => '01000000000000009',
    ':paymenttoken'             => 't0000000000000000000000000000009',
    ':psp'                      => '',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000003',
    ':sessionidoriginal'        => '',
    ':uniqueid'                 => 'T000017',
    ':payload'                  => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVzPgoJCQk8b3V0Y29tZT5PSzwvb3V0Y29tZT4KCQkJPHRvdGFsQW1vdW50PjE1MC4wMDwvdG90YWxBbW91bnQ+CgkJCTxwYXltZW50RGVzY3JpcHRpb24+eHh4eHh4eDwvcGF5bWVudERlc2NyaXB0aW9uPgoJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCTxjb21wYW55TmFtZT54eHh4eHh4PC9jb21wYW55TmFtZT4KCQkJPHBheW1lbnRUb2tlbj50MDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwOTwvcGF5bWVudFRva2VuPgoJCQk8dHJhbnNmZXJMaXN0PgoJCQkJPHRyYW5zZmVyPgoJCQkJCTxpZFRyYW5zZmVyPjE8L2lkVHJhbnNmZXI+CgkJCQkJPHRyYW5zZmVyQW1vdW50PjExMC4wMDwvdHJhbnNmZXJBbW91bnQ+CgkJCQkJPGZpc2NhbENvZGVQQT43Nzc3Nzc3Nzc3NzwvZmlzY2FsQ29kZVBBPgoJCQkJCTxJQkFOPklUMThVMDAwMDAwMDAwMDAwMDAwMDAwMDAwMTwvSUJBTj4KCQkJCQk8cmVtaXR0YW5jZUluZm9ybWF0aW9uPnh4eHg8L3JlbWl0dGFuY2VJbmZvcm1hdGlvbj4KCQkJCTwvdHJhbnNmZXI+CgkJCQk8dHJhbnNmZXI+CgkJCQkJPGlkVHJhbnNmZXI+MjwvaWRUcmFuc2Zlcj4KCQkJCQk8dHJhbnNmZXJBbW91bnQ+NDAuMDA8L3RyYW5zZmVyQW1vdW50PgoJCQkJCTxmaXNjYWxDb2RlUEE+Nzc3Nzc3Nzc3Nzg8L2Zpc2NhbENvZGVQQT4KCQkJCQk8SUJBTj5JVDE4VTAwMDAwMDAwMDAwMDAwMDAwMDAwMDI8L0lCQU4+CgkJCQkJPHJlbWl0dGFuY2VJbmZvcm1hdGlvbj54eHh4PC9yZW1pdHRhbmNlSW5mb3JtYXRpb24+CgkJCQk8L3RyYW5zZmVyPgoJCQk8L3RyYW5zZmVyTGlzdD4KCQkJPGNyZWRpdG9yUmVmZXJlbmNlSWQ+MDEwMDAwMDAwMDAwMDAwMDk8L2NyZWRpdG9yUmVmZXJlbmNlSWQ+CgkJPC9uZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVzPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4=',
];
Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);








$data_req = [
    ':id'                       => 18,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 10:43:00.197',
    ':tipoevento'               => 'activatePaymentNotice',
    ':sottotipoevento'          => 'REQ',
    ':iddominio'                => '77777777777',
    ':iuv'                      => '01000000000000010',
    ':ccp'                      => '',
    ':noticenumber'             => '301000000000000010',
    ':creditorreferenceid'      => '01000000000000010',
    ':paymenttoken'             => '',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000003',
    ':sessionidoriginal'        => '',
    ':uniqueid'                 => 'T000018',
    ':payload'                  => 'PHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6bm9kPSJodHRwOi8vcGFnb3BhLWFwaS5wYWdvcGEuZ292Lml0L25vZGUvbm9kZUZvclBzcC54c2QiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIj4KCTxzb2FwZW52OkhlYWRlci8+Cgk8c29hcGVudjpCb2R5PgoJCTxub2Q6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVxPgoJCQk8aWRQU1A+UFNQXzAxPC9pZFBTUD4KCQkJPGlkQnJva2VyUFNQPjg4ODg4ODg4ODg4PC9pZEJyb2tlclBTUD4KCQkJPGlkQ2hhbm5lbD44ODg4ODg4ODg4OF8wMTwvaWRDaGFubmVsPgoJCQk8cGFzc3dvcmQ+KioqKio8L3Bhc3N3b3JkPgoJCQk8cXJDb2RlPgoJCQkJPGZpc2NhbENvZGU+Nzc3Nzc3Nzc3Nzc8L2Zpc2NhbENvZGU+CgkJCQk8bm90aWNlTnVtYmVyPjMwMTAwMDAwMDAwMDAwMDAxMDwvbm90aWNlTnVtYmVyPgoJCQk8L3FyQ29kZT4KCQkJPGFtb3VudD4wLjAwPC9hbW91bnQ+CgkJPC9ub2Q6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVxPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4=',
];
$data_resp = [
    ':id'                       => 19,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 10:44:00.197',
    ':tipoevento'               => 'activatePaymentNotice',
    ':sottotipoevento'          => 'RESP',
    ':iddominio'                => '77777777777',
    ':iuv'                      => '01000000000000010',
    ':ccp'                      => '',
    ':noticenumber'             => '301000000000000010',
    ':creditorreferenceid'      => '01000000000000010',
    ':paymenttoken'             => '',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000003',
    ':sessionidoriginal'        => '',
    ':uniqueid'                 => 'T000019',
    ':payload'                  => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVzPgoJCQk8b3V0Y29tZT5LTzwvb3V0Y29tZT4KCQkJPGZhdWx0PgoJCQkJPGZhdWx0Q29kZT5QUFRfUEFHQU1FTlRPX0RVUExJQ0FUTzwvZmF1bHRDb2RlPgoJCQkJPGZhdWx0U3RyaW5nPlBhZ2FtZW50byBpbiBhdHRlc2EgcmlzdWx0YSBjb25jbHVzbyBhbCBzaXN0ZW1hIHBhZ29QQTwvZmF1bHRTdHJpbmc+CgkJCQk8aWQ+Tm9kb0RlaVBhZ2FtZW50aVNQQzwvaWQ+CgkJCQk8ZGVzY3JpcHRpb24+UGFnYW1lbnRvIGR1cGxpY2F0bzwvZGVzY3JpcHRpb24+CgkJCTwvZmF1bHQ+CgkJPC9uZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVzPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4=',
];
Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);



















$data_req = [
    ':id'                       => 20,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 10:20:00.197',
    ':tipoevento'               => 'nodoInviaCarrelloRPT',
    ':sottotipoevento'          => 'REQ',
    ':iddominio'                => '',
    ':iuv'                      => '',
    ':ccp'                      => '',
    ':noticenumber'             => '',
    ':creditorreferenceid'      => '',
    ':paymenttoken'             => '',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000010',
    ':sessionidoriginal'        => 'session_id_original_000001',
    ':uniqueid'                 => 'T000020',
    ':payload'                  => 'PFNPQVAtRU5WOkVudmVsb3BlIHhtbG5zOlNPQVAtRU5WPSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyIgeG1sbnM6cHB0PSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOndzPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyI+Cgk8U09BUC1FTlY6SGVhZGVyPgoJCTxwcHQ6aW50ZXN0YXppb25lQ2FycmVsbG9QUFQ+CgkJCTxpZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QQT43Nzc3Nzc3Nzc3NzwvaWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUEE+CgkJCTxpZGVudGlmaWNhdGl2b1N0YXppb25lSW50ZXJtZWRpYXJpb1BBPjc3Nzc3Nzc3Nzc3XzAxPC9pZGVudGlmaWNhdGl2b1N0YXppb25lSW50ZXJtZWRpYXJpb1BBPgoJCQk8aWRlbnRpZmljYXRpdm9DYXJyZWxsbz5jMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMTwvaWRlbnRpZmljYXRpdm9DYXJyZWxsbz4KCQk8L3BwdDppbnRlc3RhemlvbmVDYXJyZWxsb1BQVD4KCTwvU09BUC1FTlY6SGVhZGVyPgoJPFNPQVAtRU5WOkJvZHk+CgkJPG5zMzpub2RvSW52aWFDYXJyZWxsb1JQVCB4bWxuczpuczM9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIj4KCQkJPHBhc3N3b3JkPlBMQUNFSE9MREVSPC9wYXNzd29yZD4KCQkJPGlkZW50aWZpY2F0aXZvUFNQPkFHSURfMDE8L2lkZW50aWZpY2F0aXZvUFNQPgoJCQk8aWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUFNQPjg4ODg4ODg4ODg4PC9pZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QU1A+CgkJCTxpZGVudGlmaWNhdGl2b0NhbmFsZT44ODg4ODg4ODg4OF8wMTwvaWRlbnRpZmljYXRpdm9DYW5hbGU+CgkJCTxsaXN0YVJQVD4KCQkJCTxlbGVtZW50b0xpc3RhUlBUPgoJCQkJCTxpZGVudGlmaWNhdGl2b0RvbWluaW8+Nzc3Nzc3Nzc3Nzc8L2lkZW50aWZpY2F0aXZvRG9taW5pbz4KCQkJCQk8aWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4wMTAwMDAwMDAwMDAwMDAxMTwvaWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4KCQkJCQk8Y29kaWNlQ29udGVzdG9QYWdhbWVudG8+dDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMTA8L2NvZGljZUNvbnRlc3RvUGFnYW1lbnRvPgoJCQkJCTxycHQ+UEZKUVZDQjRiV3h1Y3owaWFIUjBjRG92TDNkM2R5NWthV2RwZEhCaExtZHZkaTVwZEM5elkyaGxiV0Z6THpJd01URXZVR0ZuWVcxbGJuUnBMeUkrQ2drOGRtVnljMmx2Ym1WUFoyZGxkSFJ2UGpFdU1Ed3ZkbVZ5YzJsdmJtVlBaMmRsZEhSdlBnb0pQR1J2YldsdWFXOCtDZ2tKUEdsa1pXNTBhV1pwWTJGMGFYWnZSRzl0YVc1cGJ6NDNOemMzTnpjM056YzNOend2YVdSbGJuUnBabWxqWVhScGRtOUViMjFwYm1sdlBnb0pQQzlrYjIxcGJtbHZQZ29KUEdsa1pXNTBhV1pwWTJGMGFYWnZUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQakl3TWpNeE1qRTFNREV3TVRVek9XRmlZbUV6TXpVdFlXSTBaUzAwWkRFNExXRXpQQzlwWkdWdWRHbG1hV05oZEdsMmIwMWxjM05oWjJkcGIxSnBZMmhwWlhOMFlUNEtDVHhrWVhSaFQzSmhUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQakl3TWpNdE1USXRNVFZVTVRNNk1ERTZOVE11TmpFNUt6QXhPakF3UEM5a1lYUmhUM0poVFdWemMyRm5aMmx2VW1samFHbGxjM1JoUGdvSlBHRjFkR1Z1ZEdsallYcHBiMjVsVTI5bloyVjBkRzgrVGk5QlBDOWhkWFJsYm5ScFkyRjZhVzl1WlZOdloyZGxkSFJ2UGdvSlBITnZaMmRsZEhSdlZtVnljMkZ1ZEdVK0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFabGNuTmhiblJsUGdvSkNRazhkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NUhQQzkwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1FrOFkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBqYzNOemMzTnpjM056YzNQQzlqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSlBDOXBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlXWlhKellXNTBaVDRLQ1FrOFlXNWhaM0poWm1sallWWmxjbk5oYm5SbFBuaDRlSGg0ZUhoNGVEd3ZZVzVoWjNKaFptbGpZVlpsY25OaGJuUmxQZ29KUEM5emIyZG5aWFIwYjFabGNuTmhiblJsUGdvSlBITnZaMmRsZEhSdlVHRm5ZWFJ2Y21VK0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFCaFoyRjBiM0psUGdvSkNRazhkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NUhQQzkwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1FrOFkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBqYzNOemMzTnpjM056YzNQQzlqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSlBDOXBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlRWVdkaGRHOXlaVDRLQ1FrOFlXNWhaM0poWm1sallWQmhaMkYwYjNKbFBuaDRlSGg0ZUhoNGVEd3ZZVzVoWjNKaFptbGpZVkJoWjJGMGIzSmxQZ29KUEM5emIyZG5aWFIwYjFCaFoyRjBiM0psUGdvSlBHVnVkR1ZDWlc1bFptbGphV0Z5YVc4K0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjBKbGJtVm1hV05wWVhKcGJ6NEtDUWtKUEhScGNHOUpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrUnp3dmRHbHdiMGxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno0S0NRa0pQR052WkdsalpVbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejQzTnpjM056YzNOemMzTnp3dlkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBnb0pDVHd2YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlFtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4a1pXNXZiV2x1WVhwcGIyNWxRbVZ1WldacFkybGhjbWx2UG5oNGVIaDRlSGc4TDJSbGJtOXRhVzVoZW1sdmJtVkNaVzVsWm1samFXRnlhVzgrQ2drSlBHTnZaR2xqWlZWdWFYUlBjR1Z5UW1WdVpXWnBZMmxoY21sdlBuaDRQQzlqYjJScFkyVlZibWwwVDNCbGNrSmxibVZtYVdOcFlYSnBiejRLQ1FrOFpHVnViMjFWYm1sMFQzQmxja0psYm1WbWFXTnBZWEpwYno1NGVIaDRlSGc4TDJSbGJtOXRWVzVwZEU5d1pYSkNaVzVsWm1samFXRnlhVzgrQ2drSlBHbHVaR2x5YVhwNmIwSmxibVZtYVdOcFlYSnBiejU0ZUhoNFBDOXBibVJwY21sNmVtOUNaVzVsWm1samFXRnlhVzgrQ2drSlBHTnBkbWxqYjBKbGJtVm1hV05wWVhKcGJ6NTRlSGc4TDJOcGRtbGpiMEpsYm1WbWFXTnBZWEpwYno0S0NRazhZMkZ3UW1WdVpXWnBZMmxoY21sdlBuaDRlSGg0UEM5allYQkNaVzVsWm1samFXRnlhVzgrQ2drSlBHeHZZMkZzYVhSaFFtVnVaV1pwWTJsaGNtbHZQbmg0ZUhnOEwyeHZZMkZzYVhSaFFtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4d2NtOTJhVzVqYVdGQ1pXNWxabWxqYVdGeWFXOCtlSGc4TDNCeWIzWnBibU5wWVVKbGJtVm1hV05wWVhKcGJ6NEtDUWs4Ym1GNmFXOXVaVUpsYm1WbWFXTnBZWEpwYno1NGVEd3ZibUY2YVc5dVpVSmxibVZtYVdOcFlYSnBiejRLQ1R3dlpXNTBaVUpsYm1WbWFXTnBZWEpwYno0S0NUeGtZWFJwVm1WeWMyRnRaVzUwYno0S0NRazhaR0YwWVVWelpXTjFlbWx2Ym1WUVlXZGhiV1Z1ZEc4K01qQXlNeTB4TWkweE5Tc3dNVG93TUR3dlpHRjBZVVZ6WldOMWVtbHZibVZRWVdkaGJXVnVkRzgrQ2drSlBHbHRjRzl5ZEc5VWIzUmhiR1ZFWVZabGNuTmhjbVUrTmpVMUxqQXdQQzlwYlhCdmNuUnZWRzkwWVd4bFJHRldaWEp6WVhKbFBnb0pDVHgwYVhCdlZtVnljMkZ0Wlc1MGJ6NUNRbFE4TDNScGNHOVdaWEp6WVcxbGJuUnZQZ29KQ1R4cFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOVdaWEp6WVcxbGJuUnZQakF4TURBd01EQXdNREF3TURBd01ERXhQQzlwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5V1pYSnpZVzFsYm5SdlBnb0pDVHhqYjJScFkyVkRiMjUwWlhOMGIxQmhaMkZ0Wlc1MGJ6NTBNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREF4TUR3dlkyOWthV05sUTI5dWRHVnpkRzlRWVdkaGJXVnVkRzgrQ2drSlBHWnBjbTFoVW1salpYWjFkR0UrTUR3dlptbHliV0ZTYVdObGRuVjBZVDRLQ1FrOFpHRjBhVk5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KQ1FrOGFXMXdiM0owYjFOcGJtZHZiRzlXWlhKellXMWxiblJ2UGpZMU5TNHdNRHd2YVcxd2IzSjBiMU5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KQ1FrOGFXSmhia0ZqWTNKbFpHbDBiejVKVkRFNFZUQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNVEE4TDJsaVlXNUJZMk55WldScGRHOCtDZ2tKQ1R4allYVnpZV3hsVm1WeWMyRnRaVzUwYno1NGVIaDRlSGg0UEM5allYVnpZV3hsVm1WeWMyRnRaVzUwYno0S0NRa0pQR1JoZEdsVGNHVmphV1pwWTJsU2FYTmpiM056YVc5dVpUNTRlSGg0ZUhoNFBDOWtZWFJwVTNCbFkybG1hV05wVW1selkyOXpjMmx2Ym1VK0Nna0pQQzlrWVhScFUybHVaMjlzYjFabGNuTmhiV1Z1ZEc4K0NnazhMMlJoZEdsV1pYSnpZVzFsYm5SdlBnbzhMMUpRVkQ0PTwvcnB0PgoJCQkJPC9lbGVtZW50b0xpc3RhUlBUPgoJCQk8L2xpc3RhUlBUPgoJCQk8bXVsdGlCZW5lZmljaWFyaW8+ZmFsc2U8L211bHRpQmVuZWZpY2lhcmlvPgoJCTwvbnMzOm5vZG9JbnZpYUNhcnJlbGxvUlBUPgoJPC9TT0FQLUVOVjpCb2R5Pgo8L1NPQVAtRU5WOkVudmVsb3BlPg==',
];

Capsule::statement($render_query, $data_req);






$data_req = [
    ':id'                       => 21,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 10:21:00.197',
    ':tipoevento'               => 'nodoInviaCarrelloRPT',
    ':sottotipoevento'          => 'REQ',
    ':iddominio'                => '',
    ':iuv'                      => '',
    ':ccp'                      => '',
    ':noticenumber'             => '',
    ':creditorreferenceid'      => '',
    ':paymenttoken'             => '',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000011',
    ':sessionidoriginal'        => 'session_id_original_000002',
    ':uniqueid'                 => 'T000021',
    ':payload'                  => 'PFNPQVAtRU5WOkVudmVsb3BlIHhtbG5zOlNPQVAtRU5WPSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyIgeG1sbnM6cHB0PSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOndzPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyI+Cgk8U09BUC1FTlY6SGVhZGVyPgoJCTxwcHQ6aW50ZXN0YXppb25lQ2FycmVsbG9QUFQ+CgkJCTxpZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QQT43Nzc3Nzc3Nzc3NzwvaWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUEE+CgkJCTxpZGVudGlmaWNhdGl2b1N0YXppb25lSW50ZXJtZWRpYXJpb1BBPjc3Nzc3Nzc3Nzc3XzAxPC9pZGVudGlmaWNhdGl2b1N0YXppb25lSW50ZXJtZWRpYXJpb1BBPgoJCQk8aWRlbnRpZmljYXRpdm9DYXJyZWxsbz5jMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMjwvaWRlbnRpZmljYXRpdm9DYXJyZWxsbz4KCQk8L3BwdDppbnRlc3RhemlvbmVDYXJyZWxsb1BQVD4KCTwvU09BUC1FTlY6SGVhZGVyPgoJPFNPQVAtRU5WOkJvZHk+CgkJPG5zMzpub2RvSW52aWFDYXJyZWxsb1JQVCB4bWxuczpuczM9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIj4KCQkJPHBhc3N3b3JkPlBMQUNFSE9MREVSPC9wYXNzd29yZD4KCQkJPGlkZW50aWZpY2F0aXZvUFNQPkFHSURfMDE8L2lkZW50aWZpY2F0aXZvUFNQPgoJCQk8aWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUFNQPjg4ODg4ODg4ODg4PC9pZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QU1A+CgkJCTxpZGVudGlmaWNhdGl2b0NhbmFsZT44ODg4ODg4ODg4OF8wMTwvaWRlbnRpZmljYXRpdm9DYW5hbGU+CgkJCTxsaXN0YVJQVD4KCQkJCTxlbGVtZW50b0xpc3RhUlBUPgoJCQkJCTxpZGVudGlmaWNhdGl2b0RvbWluaW8+Nzc3Nzc3Nzc3Nzc8L2lkZW50aWZpY2F0aXZvRG9taW5pbz4KCQkJCQk8aWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4wMTAwMDAwMDAwMDAwMDAxMjwvaWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4KCQkJCQk8Y29kaWNlQ29udGVzdG9QYWdhbWVudG8+dDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMTI8L2NvZGljZUNvbnRlc3RvUGFnYW1lbnRvPgoJCQkJCTxycHQ+UEZKUVZDQjRiV3h1Y3owaWFIUjBjRG92TDNkM2R5NWthV2RwZEhCaExtZHZkaTVwZEM5elkyaGxiV0Z6THpJd01URXZVR0ZuWVcxbGJuUnBMeUkrQ2drOGRtVnljMmx2Ym1WUFoyZGxkSFJ2UGpFdU1Ed3ZkbVZ5YzJsdmJtVlBaMmRsZEhSdlBnb0pQR1J2YldsdWFXOCtDZ2tKUEdsa1pXNTBhV1pwWTJGMGFYWnZSRzl0YVc1cGJ6NDNOemMzTnpjM056YzNOend2YVdSbGJuUnBabWxqWVhScGRtOUViMjFwYm1sdlBnb0pQQzlrYjIxcGJtbHZQZ29KUEdsa1pXNTBhV1pwWTJGMGFYWnZUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQakl3TWpNeE1qRTFNREV3TVRVek9XRmlZbUV6TXpVdFlXSTBaUzAwWkRFNExXRXpQQzlwWkdWdWRHbG1hV05oZEdsMmIwMWxjM05oWjJkcGIxSnBZMmhwWlhOMFlUNEtDVHhrWVhSaFQzSmhUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQakl3TWpNdE1USXRNVFZVTVRNNk1ERTZOVE11TmpFNUt6QXhPakF3UEM5a1lYUmhUM0poVFdWemMyRm5aMmx2VW1samFHbGxjM1JoUGdvSlBHRjFkR1Z1ZEdsallYcHBiMjVsVTI5bloyVjBkRzgrVGk5QlBDOWhkWFJsYm5ScFkyRjZhVzl1WlZOdloyZGxkSFJ2UGdvSlBITnZaMmRsZEhSdlZtVnljMkZ1ZEdVK0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFabGNuTmhiblJsUGdvSkNRazhkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NUhQQzkwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1FrOFkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBqYzNOemMzTnpjM056YzNQQzlqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSlBDOXBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlXWlhKellXNTBaVDRLQ1FrOFlXNWhaM0poWm1sallWWmxjbk5oYm5SbFBuaDRlSGg0ZUhoNGVEd3ZZVzVoWjNKaFptbGpZVlpsY25OaGJuUmxQZ29KUEM5emIyZG5aWFIwYjFabGNuTmhiblJsUGdvSlBITnZaMmRsZEhSdlVHRm5ZWFJ2Y21VK0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFCaFoyRjBiM0psUGdvSkNRazhkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NUhQQzkwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1FrOFkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBqYzNOemMzTnpjM056YzNQQzlqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSlBDOXBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlRWVdkaGRHOXlaVDRLQ1FrOFlXNWhaM0poWm1sallWQmhaMkYwYjNKbFBuaDRlSGg0ZUhoNGVEd3ZZVzVoWjNKaFptbGpZVkJoWjJGMGIzSmxQZ29KUEM5emIyZG5aWFIwYjFCaFoyRjBiM0psUGdvSlBHVnVkR1ZDWlc1bFptbGphV0Z5YVc4K0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjBKbGJtVm1hV05wWVhKcGJ6NEtDUWtKUEhScGNHOUpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrUnp3dmRHbHdiMGxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno0S0NRa0pQR052WkdsalpVbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejQzTnpjM056YzNOemMzTnp3dlkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBnb0pDVHd2YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlFtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4a1pXNXZiV2x1WVhwcGIyNWxRbVZ1WldacFkybGhjbWx2UG5oNGVIaDRlSGc4TDJSbGJtOXRhVzVoZW1sdmJtVkNaVzVsWm1samFXRnlhVzgrQ2drSlBHTnZaR2xqWlZWdWFYUlBjR1Z5UW1WdVpXWnBZMmxoY21sdlBuaDRQQzlqYjJScFkyVlZibWwwVDNCbGNrSmxibVZtYVdOcFlYSnBiejRLQ1FrOFpHVnViMjFWYm1sMFQzQmxja0psYm1WbWFXTnBZWEpwYno1NGVIaDRlSGc4TDJSbGJtOXRWVzVwZEU5d1pYSkNaVzVsWm1samFXRnlhVzgrQ2drSlBHbHVaR2x5YVhwNmIwSmxibVZtYVdOcFlYSnBiejU0ZUhoNFBDOXBibVJwY21sNmVtOUNaVzVsWm1samFXRnlhVzgrQ2drSlBHTnBkbWxqYjBKbGJtVm1hV05wWVhKcGJ6NTRlSGc4TDJOcGRtbGpiMEpsYm1WbWFXTnBZWEpwYno0S0NRazhZMkZ3UW1WdVpXWnBZMmxoY21sdlBuaDRlSGg0UEM5allYQkNaVzVsWm1samFXRnlhVzgrQ2drSlBHeHZZMkZzYVhSaFFtVnVaV1pwWTJsaGNtbHZQbmg0ZUhnOEwyeHZZMkZzYVhSaFFtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4d2NtOTJhVzVqYVdGQ1pXNWxabWxqYVdGeWFXOCtlSGc4TDNCeWIzWnBibU5wWVVKbGJtVm1hV05wWVhKcGJ6NEtDUWs4Ym1GNmFXOXVaVUpsYm1WbWFXTnBZWEpwYno1NGVEd3ZibUY2YVc5dVpVSmxibVZtYVdOcFlYSnBiejRLQ1R3dlpXNTBaVUpsYm1WbWFXTnBZWEpwYno0S0NUeGtZWFJwVm1WeWMyRnRaVzUwYno0S0NRazhaR0YwWVVWelpXTjFlbWx2Ym1WUVlXZGhiV1Z1ZEc4K01qQXlNeTB4TWkweE5Tc3dNVG93TUR3dlpHRjBZVVZ6WldOMWVtbHZibVZRWVdkaGJXVnVkRzgrQ2drSlBHbHRjRzl5ZEc5VWIzUmhiR1ZFWVZabGNuTmhjbVUrTmpVMUxqQXdQQzlwYlhCdmNuUnZWRzkwWVd4bFJHRldaWEp6WVhKbFBnb0pDVHgwYVhCdlZtVnljMkZ0Wlc1MGJ6NUNRbFE4TDNScGNHOVdaWEp6WVcxbGJuUnZQZ29KQ1R4cFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOVdaWEp6WVcxbGJuUnZQakF4TURBd01EQXdNREF3TURBd01ERXlQQzlwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5V1pYSnpZVzFsYm5SdlBnb0pDVHhqYjJScFkyVkRiMjUwWlhOMGIxQmhaMkZ0Wlc1MGJ6NTBNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREF4TWp3dlkyOWthV05sUTI5dWRHVnpkRzlRWVdkaGJXVnVkRzgrQ2drSlBHWnBjbTFoVW1salpYWjFkR0UrTUR3dlptbHliV0ZTYVdObGRuVjBZVDRLQ1FrOFpHRjBhVk5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KQ1FrOGFXMXdiM0owYjFOcGJtZHZiRzlXWlhKellXMWxiblJ2UGpNMU5TNHdNRHd2YVcxd2IzSjBiMU5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KQ1FrOGFXSmhia0ZqWTNKbFpHbDBiejVKVkRFNFZUQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNVEE4TDJsaVlXNUJZMk55WldScGRHOCtDZ2tKQ1R4allYVnpZV3hsVm1WeWMyRnRaVzUwYno1NGVIaDRlSGg0UEM5allYVnpZV3hsVm1WeWMyRnRaVzUwYno0S0NRa0pQR1JoZEdsVGNHVmphV1pwWTJsU2FYTmpiM056YVc5dVpUNTRlSGg0ZUhoNFBDOWtZWFJwVTNCbFkybG1hV05wVW1selkyOXpjMmx2Ym1VK0Nna0pQQzlrWVhScFUybHVaMjlzYjFabGNuTmhiV1Z1ZEc4K0Nna0pQR1JoZEdsVGFXNW5iMnh2Vm1WeWMyRnRaVzUwYno0S0NRa0pQR2x0Y0c5eWRHOVRhVzVuYjJ4dlZtVnljMkZ0Wlc1MGJ6NHpNREF1TURBOEwybHRjRzl5ZEc5VGFXNW5iMnh2Vm1WeWMyRnRaVzUwYno0S0NRa0pQR2xpWVc1QlkyTnlaV1JwZEc4K1NWUXhPRlV3TURBd01EQXdNREF3TURBd01EQXdNREF3TURFeFBDOXBZbUZ1UVdOamNtVmthWFJ2UGdvSkNRazhZMkYxYzJGc1pWWmxjbk5oYldWdWRHOCtlSGg0ZUhoNGVEd3ZZMkYxYzJGc1pWWmxjbk5oYldWdWRHOCtDZ2tKQ1R4a1lYUnBVM0JsWTJsbWFXTnBVbWx6WTI5emMybHZibVUrZUhoNGVIaDRlRHd2WkdGMGFWTndaV05wWm1samFWSnBjMk52YzNOcGIyNWxQZ29KQ1R3dlpHRjBhVk5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KUEM5a1lYUnBWbVZ5YzJGdFpXNTBiejRLUEM5U1VGUSs8L3JwdD4KCQkJCTwvZWxlbWVudG9MaXN0YVJQVD4KCQkJPC9saXN0YVJQVD4KCQkJPG11bHRpQmVuZWZpY2lhcmlvPmZhbHNlPC9tdWx0aUJlbmVmaWNpYXJpbz4KCQk8L25zMzpub2RvSW52aWFDYXJyZWxsb1JQVD4KCTwvU09BUC1FTlY6Qm9keT4KPC9TT0FQLUVOVjpFbnZlbG9wZT4=',
];

Capsule::statement($render_query, $data_req);









$data_req = [
    ':id'                       => 22,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 10:25:00.197',
    ':tipoevento'               => 'nodoInviaCarrelloRPT',
    ':sottotipoevento'          => 'REQ',
    ':iddominio'                => '',
    ':iuv'                      => '',
    ':ccp'                      => '',
    ':noticenumber'             => '',
    ':creditorreferenceid'      => '',
    ':paymenttoken'             => '',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000013',
    ':sessionidoriginal'        => 'session_id_original_000003',
    ':uniqueid'                 => 'T000022',
    ':payload'                  => 'PFNPQVAtRU5WOkVudmVsb3BlIHhtbG5zOlNPQVAtRU5WPSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyIgeG1sbnM6cHB0PSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOndzPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyI+Cgk8U09BUC1FTlY6SGVhZGVyPgoJCTxwcHQ6aW50ZXN0YXppb25lQ2FycmVsbG9QUFQ+CgkJCTxpZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QQT43Nzc3Nzc3Nzc3NzwvaWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUEE+CgkJCTxpZGVudGlmaWNhdGl2b1N0YXppb25lSW50ZXJtZWRpYXJpb1BBPjc3Nzc3Nzc3Nzc3XzAxPC9pZGVudGlmaWNhdGl2b1N0YXppb25lSW50ZXJtZWRpYXJpb1BBPgoJCQk8aWRlbnRpZmljYXRpdm9DYXJyZWxsbz5jMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMzwvaWRlbnRpZmljYXRpdm9DYXJyZWxsbz4KCQk8L3BwdDppbnRlc3RhemlvbmVDYXJyZWxsb1BQVD4KCTwvU09BUC1FTlY6SGVhZGVyPgoJPFNPQVAtRU5WOkJvZHk+CgkJPG5zMzpub2RvSW52aWFDYXJyZWxsb1JQVCB4bWxuczpuczM9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIj4KCQkJPHBhc3N3b3JkPlBMQUNFSE9MREVSPC9wYXNzd29yZD4KCQkJPGlkZW50aWZpY2F0aXZvUFNQPkFHSURfMDE8L2lkZW50aWZpY2F0aXZvUFNQPgoJCQk8aWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUFNQPjg4ODg4ODg4ODg4PC9pZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QU1A+CgkJCTxpZGVudGlmaWNhdGl2b0NhbmFsZT44ODg4ODg4ODg4OF8wMTwvaWRlbnRpZmljYXRpdm9DYW5hbGU+CgkJCTxsaXN0YVJQVD4KCQkJCTxlbGVtZW50b0xpc3RhUlBUPgoJCQkJCTxpZGVudGlmaWNhdGl2b0RvbWluaW8+Nzc3Nzc3Nzc3Nzc8L2lkZW50aWZpY2F0aXZvRG9taW5pbz4KCQkJCQk8aWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4wMTAwMDAwMDAwMDAwMDAxMzwvaWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4KCQkJCQk8Y29kaWNlQ29udGVzdG9QYWdhbWVudG8+dDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMTM8L2NvZGljZUNvbnRlc3RvUGFnYW1lbnRvPgoJCQkJCTxycHQ+UEZKUVZDQjRiV3h1Y3owaWFIUjBjRG92TDNkM2R5NWthV2RwZEhCaExtZHZkaTVwZEM5elkyaGxiV0Z6THpJd01URXZVR0ZuWVcxbGJuUnBMeUkrQ2drOGRtVnljMmx2Ym1WUFoyZGxkSFJ2UGpFdU1Ed3ZkbVZ5YzJsdmJtVlBaMmRsZEhSdlBnb0pQR1J2YldsdWFXOCtDZ2tKUEdsa1pXNTBhV1pwWTJGMGFYWnZSRzl0YVc1cGJ6NDNOemMzTnpjM056YzNOend2YVdSbGJuUnBabWxqWVhScGRtOUViMjFwYm1sdlBnb0pQQzlrYjIxcGJtbHZQZ29KUEdsa1pXNTBhV1pwWTJGMGFYWnZUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQakl3TWpNeE1qRTFNREV3TVRVek9XRmlZbUV6TXpVdFlXSTBaUzAwWkRFNExXRXpQQzlwWkdWdWRHbG1hV05oZEdsMmIwMWxjM05oWjJkcGIxSnBZMmhwWlhOMFlUNEtDVHhrWVhSaFQzSmhUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQakl3TWpNdE1USXRNVFZVTVRNNk1ERTZOVE11TmpFNUt6QXhPakF3UEM5a1lYUmhUM0poVFdWemMyRm5aMmx2VW1samFHbGxjM1JoUGdvSlBHRjFkR1Z1ZEdsallYcHBiMjVsVTI5bloyVjBkRzgrVGk5QlBDOWhkWFJsYm5ScFkyRjZhVzl1WlZOdloyZGxkSFJ2UGdvSlBITnZaMmRsZEhSdlZtVnljMkZ1ZEdVK0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFabGNuTmhiblJsUGdvSkNRazhkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NUhQQzkwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1FrOFkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBqYzNOemMzTnpjM056YzNQQzlqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSlBDOXBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlXWlhKellXNTBaVDRLQ1FrOFlXNWhaM0poWm1sallWWmxjbk5oYm5SbFBuaDRlSGg0ZUhoNGVEd3ZZVzVoWjNKaFptbGpZVlpsY25OaGJuUmxQZ29KUEM5emIyZG5aWFIwYjFabGNuTmhiblJsUGdvSlBITnZaMmRsZEhSdlVHRm5ZWFJ2Y21VK0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFCaFoyRjBiM0psUGdvSkNRazhkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NUhQQzkwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1FrOFkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBqYzNOemMzTnpjM056YzNQQzlqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSlBDOXBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlRWVdkaGRHOXlaVDRLQ1FrOFlXNWhaM0poWm1sallWQmhaMkYwYjNKbFBuaDRlSGg0ZUhoNGVEd3ZZVzVoWjNKaFptbGpZVkJoWjJGMGIzSmxQZ29KUEM5emIyZG5aWFIwYjFCaFoyRjBiM0psUGdvSlBHVnVkR1ZDWlc1bFptbGphV0Z5YVc4K0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjBKbGJtVm1hV05wWVhKcGJ6NEtDUWtKUEhScGNHOUpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrUnp3dmRHbHdiMGxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno0S0NRa0pQR052WkdsalpVbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejQzTnpjM056YzNOemMzTnp3dlkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBnb0pDVHd2YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlFtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4a1pXNXZiV2x1WVhwcGIyNWxRbVZ1WldacFkybGhjbWx2UG5oNGVIaDRlSGc4TDJSbGJtOXRhVzVoZW1sdmJtVkNaVzVsWm1samFXRnlhVzgrQ2drSlBHTnZaR2xqWlZWdWFYUlBjR1Z5UW1WdVpXWnBZMmxoY21sdlBuaDRQQzlqYjJScFkyVlZibWwwVDNCbGNrSmxibVZtYVdOcFlYSnBiejRLQ1FrOFpHVnViMjFWYm1sMFQzQmxja0psYm1WbWFXTnBZWEpwYno1NGVIaDRlSGc4TDJSbGJtOXRWVzVwZEU5d1pYSkNaVzVsWm1samFXRnlhVzgrQ2drSlBHbHVaR2x5YVhwNmIwSmxibVZtYVdOcFlYSnBiejU0ZUhoNFBDOXBibVJwY21sNmVtOUNaVzVsWm1samFXRnlhVzgrQ2drSlBHTnBkbWxqYjBKbGJtVm1hV05wWVhKcGJ6NTRlSGc4TDJOcGRtbGpiMEpsYm1WbWFXTnBZWEpwYno0S0NRazhZMkZ3UW1WdVpXWnBZMmxoY21sdlBuaDRlSGg0UEM5allYQkNaVzVsWm1samFXRnlhVzgrQ2drSlBHeHZZMkZzYVhSaFFtVnVaV1pwWTJsaGNtbHZQbmg0ZUhnOEwyeHZZMkZzYVhSaFFtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4d2NtOTJhVzVqYVdGQ1pXNWxabWxqYVdGeWFXOCtlSGc4TDNCeWIzWnBibU5wWVVKbGJtVm1hV05wWVhKcGJ6NEtDUWs4Ym1GNmFXOXVaVUpsYm1WbWFXTnBZWEpwYno1NGVEd3ZibUY2YVc5dVpVSmxibVZtYVdOcFlYSnBiejRLQ1R3dlpXNTBaVUpsYm1WbWFXTnBZWEpwYno0S0NUeGtZWFJwVm1WeWMyRnRaVzUwYno0S0NRazhaR0YwWVVWelpXTjFlbWx2Ym1WUVlXZGhiV1Z1ZEc4K01qQXlNeTB4TWkweE5Tc3dNVG93TUR3dlpHRjBZVVZ6WldOMWVtbHZibVZRWVdkaGJXVnVkRzgrQ2drSlBHbHRjRzl5ZEc5VWIzUmhiR1ZFWVZabGNuTmhjbVUrTWpVd0xqQXdQQzlwYlhCdmNuUnZWRzkwWVd4bFJHRldaWEp6WVhKbFBnb0pDVHgwYVhCdlZtVnljMkZ0Wlc1MGJ6NUNRbFE4TDNScGNHOVdaWEp6WVcxbGJuUnZQZ29KQ1R4cFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOVdaWEp6WVcxbGJuUnZQakF4TURBd01EQXdNREF3TURBd01ERXpQQzlwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5V1pYSnpZVzFsYm5SdlBnb0pDVHhqYjJScFkyVkRiMjUwWlhOMGIxQmhaMkZ0Wlc1MGJ6NTBNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREF4TXp3dlkyOWthV05sUTI5dWRHVnpkRzlRWVdkaGJXVnVkRzgrQ2drSlBHWnBjbTFoVW1salpYWjFkR0UrTUR3dlptbHliV0ZTYVdObGRuVjBZVDRLQ1FrOFpHRjBhVk5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KQ1FrOGFXMXdiM0owYjFOcGJtZHZiRzlXWlhKellXMWxiblJ2UGpFMU1DNHdNRHd2YVcxd2IzSjBiMU5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KQ1FrOGFXSmhia0ZqWTNKbFpHbDBiejVKVkRFNFZUQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNVEE4TDJsaVlXNUJZMk55WldScGRHOCtDZ2tKQ1R4allYVnpZV3hsVm1WeWMyRnRaVzUwYno1NGVIaDRlSGg0UEM5allYVnpZV3hsVm1WeWMyRnRaVzUwYno0S0NRa0pQR1JoZEdsVGNHVmphV1pwWTJsU2FYTmpiM056YVc5dVpUNTRlSGg0ZUhoNFBDOWtZWFJwVTNCbFkybG1hV05wVW1selkyOXpjMmx2Ym1VK0Nna0pQQzlrWVhScFUybHVaMjlzYjFabGNuTmhiV1Z1ZEc4K0Nna0pQR1JoZEdsVGFXNW5iMnh2Vm1WeWMyRnRaVzUwYno0S0NRa0pQR2x0Y0c5eWRHOVRhVzVuYjJ4dlZtVnljMkZ0Wlc1MGJ6NHhNREF1TURBOEwybHRjRzl5ZEc5VGFXNW5iMnh2Vm1WeWMyRnRaVzUwYno0S0NRa0pQR2xpWVc1QlkyTnlaV1JwZEc4K1NWUXhPRlV3TURBd01EQXdNREF3TURBd01EQXdNREF3TURFeFBDOXBZbUZ1UVdOamNtVmthWFJ2UGdvSkNRazhZMkYxYzJGc1pWWmxjbk5oYldWdWRHOCtlSGg0ZUhoNGVEd3ZZMkYxYzJGc1pWWmxjbk5oYldWdWRHOCtDZ2tKQ1R4a1lYUnBVM0JsWTJsbWFXTnBVbWx6WTI5emMybHZibVUrZUhoNGVIaDRlRHd2WkdGMGFWTndaV05wWm1samFWSnBjMk52YzNOcGIyNWxQZ29KQ1R3dlpHRjBhVk5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KUEM5a1lYUnBWbVZ5YzJGdFpXNTBiejRLUEM5U1VGUSs8L3JwdD4KCQkJCTwvZWxlbWVudG9MaXN0YVJQVD4KCQkJCTxlbGVtZW50b0xpc3RhUlBUPgoJCQkJCTxpZGVudGlmaWNhdGl2b0RvbWluaW8+Nzc3Nzc3Nzc3Nzg8L2lkZW50aWZpY2F0aXZvRG9taW5pbz4KCQkJCQk8aWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4wMTAwMDAwMDAwMDAwMDAxNDwvaWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4KCQkJCQk8Y29kaWNlQ29udGVzdG9QYWdhbWVudG8+dDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMTM8L2NvZGljZUNvbnRlc3RvUGFnYW1lbnRvPgoJCQkJCTxycHQ+UEZKUVZDQjRiV3h1Y3owaWFIUjBjRG92TDNkM2R5NWthV2RwZEhCaExtZHZkaTVwZEM5elkyaGxiV0Z6THpJd01URXZVR0ZuWVcxbGJuUnBMeUkrQ2drOGRtVnljMmx2Ym1WUFoyZGxkSFJ2UGpFdU1Ed3ZkbVZ5YzJsdmJtVlBaMmRsZEhSdlBnb0pQR1J2YldsdWFXOCtDZ2tKUEdsa1pXNTBhV1pwWTJGMGFYWnZSRzl0YVc1cGJ6NDNOemMzTnpjM056YzNPRHd2YVdSbGJuUnBabWxqWVhScGRtOUViMjFwYm1sdlBnb0pQQzlrYjIxcGJtbHZQZ29KUEdsa1pXNTBhV1pwWTJGMGFYWnZUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQakl3TWpNeE1qRTFNREV3TVRVek9XRmlZbUV6TXpVdFlXSTBaUzAwWkRFNExXRXpQQzlwWkdWdWRHbG1hV05oZEdsMmIwMWxjM05oWjJkcGIxSnBZMmhwWlhOMFlUNEtDVHhrWVhSaFQzSmhUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQakl3TWpNdE1USXRNVFZVTVRNNk1ERTZOVE11TmpFNUt6QXhPakF3UEM5a1lYUmhUM0poVFdWemMyRm5aMmx2VW1samFHbGxjM1JoUGdvSlBHRjFkR1Z1ZEdsallYcHBiMjVsVTI5bloyVjBkRzgrVGk5QlBDOWhkWFJsYm5ScFkyRjZhVzl1WlZOdloyZGxkSFJ2UGdvSlBITnZaMmRsZEhSdlZtVnljMkZ1ZEdVK0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFabGNuTmhiblJsUGdvSkNRazhkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NUhQQzkwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1FrOFkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBqYzNOemMzTnpjM056YzRQQzlqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSlBDOXBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlXWlhKellXNTBaVDRLQ1FrOFlXNWhaM0poWm1sallWWmxjbk5oYm5SbFBuaDRlSGg0ZUhoNGVEd3ZZVzVoWjNKaFptbGpZVlpsY25OaGJuUmxQZ29KUEM5emIyZG5aWFIwYjFabGNuTmhiblJsUGdvSlBITnZaMmRsZEhSdlVHRm5ZWFJ2Y21VK0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFCaFoyRjBiM0psUGdvSkNRazhkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NUhQQzkwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1FrOFkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBqYzNOemMzTnpjM056YzRQQzlqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSlBDOXBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlRWVdkaGRHOXlaVDRLQ1FrOFlXNWhaM0poWm1sallWQmhaMkYwYjNKbFBuaDRlSGg0ZUhoNGVEd3ZZVzVoWjNKaFptbGpZVkJoWjJGMGIzSmxQZ29KUEM5emIyZG5aWFIwYjFCaFoyRjBiM0psUGdvSlBHVnVkR1ZDWlc1bFptbGphV0Z5YVc4K0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjBKbGJtVm1hV05wWVhKcGJ6NEtDUWtKUEhScGNHOUpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrUnp3dmRHbHdiMGxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno0S0NRa0pQR052WkdsalpVbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejQzTnpjM056YzNOemMzT0R3dlkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBnb0pDVHd2YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlFtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4a1pXNXZiV2x1WVhwcGIyNWxRbVZ1WldacFkybGhjbWx2UG5oNGVIaDRlSGc4TDJSbGJtOXRhVzVoZW1sdmJtVkNaVzVsWm1samFXRnlhVzgrQ2drSlBHTnZaR2xqWlZWdWFYUlBjR1Z5UW1WdVpXWnBZMmxoY21sdlBuaDRQQzlqYjJScFkyVlZibWwwVDNCbGNrSmxibVZtYVdOcFlYSnBiejRLQ1FrOFpHVnViMjFWYm1sMFQzQmxja0psYm1WbWFXTnBZWEpwYno1NGVIaDRlSGc4TDJSbGJtOXRWVzVwZEU5d1pYSkNaVzVsWm1samFXRnlhVzgrQ2drSlBHbHVaR2x5YVhwNmIwSmxibVZtYVdOcFlYSnBiejU0ZUhoNFBDOXBibVJwY21sNmVtOUNaVzVsWm1samFXRnlhVzgrQ2drSlBHTnBkbWxqYjBKbGJtVm1hV05wWVhKcGJ6NTRlSGc4TDJOcGRtbGpiMEpsYm1WbWFXTnBZWEpwYno0S0NRazhZMkZ3UW1WdVpXWnBZMmxoY21sdlBuaDRlSGg0UEM5allYQkNaVzVsWm1samFXRnlhVzgrQ2drSlBHeHZZMkZzYVhSaFFtVnVaV1pwWTJsaGNtbHZQbmg0ZUhnOEwyeHZZMkZzYVhSaFFtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4d2NtOTJhVzVqYVdGQ1pXNWxabWxqYVdGeWFXOCtlSGc4TDNCeWIzWnBibU5wWVVKbGJtVm1hV05wWVhKcGJ6NEtDUWs4Ym1GNmFXOXVaVUpsYm1WbWFXTnBZWEpwYno1NGVEd3ZibUY2YVc5dVpVSmxibVZtYVdOcFlYSnBiejRLQ1R3dlpXNTBaVUpsYm1WbWFXTnBZWEpwYno0S0NUeGtZWFJwVm1WeWMyRnRaVzUwYno0S0NRazhaR0YwWVVWelpXTjFlbWx2Ym1WUVlXZGhiV1Z1ZEc4K01qQXlNeTB4TWkweE5Tc3dNVG93TUR3dlpHRjBZVVZ6WldOMWVtbHZibVZRWVdkaGJXVnVkRzgrQ2drSlBHbHRjRzl5ZEc5VWIzUmhiR1ZFWVZabGNuTmhjbVUrTVRVd0xqQXdQQzlwYlhCdmNuUnZWRzkwWVd4bFJHRldaWEp6WVhKbFBnb0pDVHgwYVhCdlZtVnljMkZ0Wlc1MGJ6NUNRbFE4TDNScGNHOVdaWEp6WVcxbGJuUnZQZ29KQ1R4cFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOVdaWEp6WVcxbGJuUnZQakF4TURBd01EQXdNREF3TURBd01ERTBQQzlwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5V1pYSnpZVzFsYm5SdlBnb0pDVHhqYjJScFkyVkRiMjUwWlhOMGIxQmhaMkZ0Wlc1MGJ6NTBNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREF4TkR3dlkyOWthV05sUTI5dWRHVnpkRzlRWVdkaGJXVnVkRzgrQ2drSlBHWnBjbTFoVW1salpYWjFkR0UrTUR3dlptbHliV0ZTYVdObGRuVjBZVDRLQ1FrOFpHRjBhVk5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KQ1FrOGFXMXdiM0owYjFOcGJtZHZiRzlXWlhKellXMWxiblJ2UGpnd0xqQXdQQzlwYlhCdmNuUnZVMmx1WjI5c2IxWmxjbk5oYldWdWRHOCtDZ2tKQ1R4cFltRnVRV05qY21Wa2FYUnZQa2xVTVRoVk1EQXdNREF3TURBd01EQXdNREF3TURBd01EQXhNand2YVdKaGJrRmpZM0psWkdsMGJ6NEtDUWtKUEdOaGRYTmhiR1ZXWlhKellXMWxiblJ2UG5oNGVIaDRlSGc4TDJOaGRYTmhiR1ZXWlhKellXMWxiblJ2UGdvSkNRazhaR0YwYVZOd1pXTnBabWxqYVZKcGMyTnZjM05wYjI1bFBuaDRlSGg0ZUhnOEwyUmhkR2xUY0dWamFXWnBZMmxTYVhOamIzTnphVzl1WlQ0S0NRazhMMlJoZEdsVGFXNW5iMnh2Vm1WeWMyRnRaVzUwYno0S0NRazhaR0YwYVZOcGJtZHZiRzlXWlhKellXMWxiblJ2UGdvSkNRazhhVzF3YjNKMGIxTnBibWR2Ykc5V1pYSnpZVzFsYm5SdlBqY3dMakF3UEM5cGJYQnZjblJ2VTJsdVoyOXNiMVpsY25OaGJXVnVkRzgrQ2drSkNUeHBZbUZ1UVdOamNtVmthWFJ2UGtsVU1UaFZNREF3TURBd01EQXdNREF3TURBd01EQXdNREF4TXp3dmFXSmhia0ZqWTNKbFpHbDBiejRLQ1FrSlBHTmhkWE5oYkdWV1pYSnpZVzFsYm5SdlBuaDRlSGg0ZUhnOEwyTmhkWE5oYkdWV1pYSnpZVzFsYm5SdlBnb0pDUWs4WkdGMGFWTndaV05wWm1samFWSnBjMk52YzNOcGIyNWxQbmg0ZUhoNGVIZzhMMlJoZEdsVGNHVmphV1pwWTJsU2FYTmpiM056YVc5dVpUNEtDUWs4TDJSaGRHbFRhVzVuYjJ4dlZtVnljMkZ0Wlc1MGJ6NEtDVHd2WkdGMGFWWmxjbk5oYldWdWRHOCtDand2VWxCVVBnPT08L3JwdD4KCQkJCTwvZWxlbWVudG9MaXN0YVJQVD4KCQkJPC9saXN0YVJQVD4KCQkJPG11bHRpQmVuZWZpY2lhcmlvPmZhbHNlPC9tdWx0aUJlbmVmaWNpYXJpbz4KCQk8L25zMzpub2RvSW52aWFDYXJyZWxsb1JQVD4KCTwvU09BUC1FTlY6Qm9keT4KPC9TT0FQLUVOVjpFbnZlbG9wZT4=',
];

Capsule::statement($render_query, $data_req);







$data_req = [
    ':id'                       => 23,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 10:25:00.197',
    ':tipoevento'               => 'nodoInviaCarrelloRPT',
    ':sottotipoevento'          => 'REQ',
    ':iddominio'                => '',
    ':iuv'                      => '',
    ':ccp'                      => '',
    ':noticenumber'             => '',
    ':creditorreferenceid'      => '',
    ':paymenttoken'             => '',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000014',
    ':sessionidoriginal'        => 'session_id_original_000004',
    ':uniqueid'                 => 'T000023',
    ':payload'                  => 'PFNPQVAtRU5WOkVudmVsb3BlIHhtbG5zOlNPQVAtRU5WPSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyIgeG1sbnM6cHB0PSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOndzPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyI+Cgk8U09BUC1FTlY6SGVhZGVyPgoJCTxwcHQ6aW50ZXN0YXppb25lQ2FycmVsbG9QUFQ+CgkJCTxpZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QQT43Nzc3Nzc3Nzc3NzwvaWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUEE+CgkJCTxpZGVudGlmaWNhdGl2b1N0YXppb25lSW50ZXJtZWRpYXJpb1BBPjc3Nzc3Nzc3Nzc3XzAxPC9pZGVudGlmaWNhdGl2b1N0YXppb25lSW50ZXJtZWRpYXJpb1BBPgoJCQk8aWRlbnRpZmljYXRpdm9DYXJyZWxsbz5jMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwNDwvaWRlbnRpZmljYXRpdm9DYXJyZWxsbz4KCQk8L3BwdDppbnRlc3RhemlvbmVDYXJyZWxsb1BQVD4KCTwvU09BUC1FTlY6SGVhZGVyPgoJPFNPQVAtRU5WOkJvZHk+CgkJPG5zMzpub2RvSW52aWFDYXJyZWxsb1JQVCB4bWxuczpuczM9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIj4KCQkJPHBhc3N3b3JkPlBMQUNFSE9MREVSPC9wYXNzd29yZD4KCQkJPGlkZW50aWZpY2F0aXZvUFNQPkFHSURfMDE8L2lkZW50aWZpY2F0aXZvUFNQPgoJCQk8aWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUFNQPjg4ODg4ODg4ODg4PC9pZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QU1A+CgkJCTxpZGVudGlmaWNhdGl2b0NhbmFsZT44ODg4ODg4ODg4OF8wMTwvaWRlbnRpZmljYXRpdm9DYW5hbGU+CgkJCTxsaXN0YVJQVD4KCQkJCTxlbGVtZW50b0xpc3RhUlBUPgoJCQkJCTxpZGVudGlmaWNhdGl2b0RvbWluaW8+Nzc3Nzc3Nzc3Nzc8L2lkZW50aWZpY2F0aXZvRG9taW5pbz4KCQkJCQk8aWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4wMTAwMDAwMDAwMDAwMDAxNTwvaWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4KCQkJCQk8Y29kaWNlQ29udGVzdG9QYWdhbWVudG8+dDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMTQ8L2NvZGljZUNvbnRlc3RvUGFnYW1lbnRvPgoJCQkJCTxycHQ+UEZKUVZDQjRiV3h1Y3owaWFIUjBjRG92TDNkM2R5NWthV2RwZEhCaExtZHZkaTVwZEM5elkyaGxiV0Z6THpJd01URXZVR0ZuWVcxbGJuUnBMeUkrQ2drOGRtVnljMmx2Ym1WUFoyZGxkSFJ2UGpFdU1Ed3ZkbVZ5YzJsdmJtVlBaMmRsZEhSdlBnb0pQR1J2YldsdWFXOCtDZ2tKUEdsa1pXNTBhV1pwWTJGMGFYWnZSRzl0YVc1cGJ6NDNOemMzTnpjM056YzNOend2YVdSbGJuUnBabWxqWVhScGRtOUViMjFwYm1sdlBnb0pQQzlrYjIxcGJtbHZQZ29KUEdsa1pXNTBhV1pwWTJGMGFYWnZUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQakl3TWpNeE1qRTFNREV3TVRVek9XRmlZbUV6TXpVdFlXSTBaUzAwWkRFNExXRXpQQzlwWkdWdWRHbG1hV05oZEdsMmIwMWxjM05oWjJkcGIxSnBZMmhwWlhOMFlUNEtDVHhrWVhSaFQzSmhUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQakl3TWpNdE1USXRNVFZVTVRNNk1ERTZOVE11TmpFNUt6QXhPakF3UEM5a1lYUmhUM0poVFdWemMyRm5aMmx2VW1samFHbGxjM1JoUGdvSlBHRjFkR1Z1ZEdsallYcHBiMjVsVTI5bloyVjBkRzgrVGk5QlBDOWhkWFJsYm5ScFkyRjZhVzl1WlZOdloyZGxkSFJ2UGdvSlBITnZaMmRsZEhSdlZtVnljMkZ1ZEdVK0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFabGNuTmhiblJsUGdvSkNRazhkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NUhQQzkwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1FrOFkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBqYzNOemMzTnpjM056YzNQQzlqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSlBDOXBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlXWlhKellXNTBaVDRLQ1FrOFlXNWhaM0poWm1sallWWmxjbk5oYm5SbFBuaDRlSGg0ZUhoNGVEd3ZZVzVoWjNKaFptbGpZVlpsY25OaGJuUmxQZ29KUEM5emIyZG5aWFIwYjFabGNuTmhiblJsUGdvSlBITnZaMmRsZEhSdlVHRm5ZWFJ2Y21VK0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFCaFoyRjBiM0psUGdvSkNRazhkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NUhQQzkwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1FrOFkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBqYzNOemMzTnpjM056YzNQQzlqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSlBDOXBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlRWVdkaGRHOXlaVDRLQ1FrOFlXNWhaM0poWm1sallWQmhaMkYwYjNKbFBuaDRlSGg0ZUhoNGVEd3ZZVzVoWjNKaFptbGpZVkJoWjJGMGIzSmxQZ29KUEM5emIyZG5aWFIwYjFCaFoyRjBiM0psUGdvSlBHVnVkR1ZDWlc1bFptbGphV0Z5YVc4K0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjBKbGJtVm1hV05wWVhKcGJ6NEtDUWtKUEhScGNHOUpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrUnp3dmRHbHdiMGxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno0S0NRa0pQR052WkdsalpVbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejQzTnpjM056YzNOemMzTnp3dlkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBnb0pDVHd2YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlFtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4a1pXNXZiV2x1WVhwcGIyNWxRbVZ1WldacFkybGhjbWx2UG5oNGVIaDRlSGc4TDJSbGJtOXRhVzVoZW1sdmJtVkNaVzVsWm1samFXRnlhVzgrQ2drSlBHTnZaR2xqWlZWdWFYUlBjR1Z5UW1WdVpXWnBZMmxoY21sdlBuaDRQQzlqYjJScFkyVlZibWwwVDNCbGNrSmxibVZtYVdOcFlYSnBiejRLQ1FrOFpHVnViMjFWYm1sMFQzQmxja0psYm1WbWFXTnBZWEpwYno1NGVIaDRlSGc4TDJSbGJtOXRWVzVwZEU5d1pYSkNaVzVsWm1samFXRnlhVzgrQ2drSlBHbHVaR2x5YVhwNmIwSmxibVZtYVdOcFlYSnBiejU0ZUhoNFBDOXBibVJwY21sNmVtOUNaVzVsWm1samFXRnlhVzgrQ2drSlBHTnBkbWxqYjBKbGJtVm1hV05wWVhKcGJ6NTRlSGc4TDJOcGRtbGpiMEpsYm1WbWFXTnBZWEpwYno0S0NRazhZMkZ3UW1WdVpXWnBZMmxoY21sdlBuaDRlSGg0UEM5allYQkNaVzVsWm1samFXRnlhVzgrQ2drSlBHeHZZMkZzYVhSaFFtVnVaV1pwWTJsaGNtbHZQbmg0ZUhnOEwyeHZZMkZzYVhSaFFtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4d2NtOTJhVzVqYVdGQ1pXNWxabWxqYVdGeWFXOCtlSGc4TDNCeWIzWnBibU5wWVVKbGJtVm1hV05wWVhKcGJ6NEtDUWs4Ym1GNmFXOXVaVUpsYm1WbWFXTnBZWEpwYno1NGVEd3ZibUY2YVc5dVpVSmxibVZtYVdOcFlYSnBiejRLQ1R3dlpXNTBaVUpsYm1WbWFXTnBZWEpwYno0S0NUeGtZWFJwVm1WeWMyRnRaVzUwYno0S0NRazhaR0YwWVVWelpXTjFlbWx2Ym1WUVlXZGhiV1Z1ZEc4K01qQXlNeTB4TWkweE5Tc3dNVG93TUR3dlpHRjBZVVZ6WldOMWVtbHZibVZRWVdkaGJXVnVkRzgrQ2drSlBHbHRjRzl5ZEc5VWIzUmhiR1ZFWVZabGNuTmhjbVUrTkRBd0xqQXdQQzlwYlhCdmNuUnZWRzkwWVd4bFJHRldaWEp6WVhKbFBnb0pDVHgwYVhCdlZtVnljMkZ0Wlc1MGJ6NUNRbFE4TDNScGNHOVdaWEp6WVcxbGJuUnZQZ29KQ1R4cFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOVdaWEp6WVcxbGJuUnZQakF4TURBd01EQXdNREF3TURBd01ERTFQQzlwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5V1pYSnpZVzFsYm5SdlBnb0pDVHhqYjJScFkyVkRiMjUwWlhOMGIxQmhaMkZ0Wlc1MGJ6NTBNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREF4TkR3dlkyOWthV05sUTI5dWRHVnpkRzlRWVdkaGJXVnVkRzgrQ2drSlBHWnBjbTFoVW1salpYWjFkR0UrTUR3dlptbHliV0ZTYVdObGRuVjBZVDRLQ1FrOFpHRjBhVk5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KQ1FrOGFXMXdiM0owYjFOcGJtZHZiRzlXWlhKellXMWxiblJ2UGpJd01DNHdNRHd2YVcxd2IzSjBiMU5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KQ1FrOGFXSmhia0ZqWTNKbFpHbDBiejVKVkRFNFZUQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNVEE4TDJsaVlXNUJZMk55WldScGRHOCtDZ2tKQ1R4allYVnpZV3hsVm1WeWMyRnRaVzUwYno1NGVIaDRlSGg0UEM5allYVnpZV3hsVm1WeWMyRnRaVzUwYno0S0NRa0pQR1JoZEdsVGNHVmphV1pwWTJsU2FYTmpiM056YVc5dVpUNTRlSGg0ZUhoNFBDOWtZWFJwVTNCbFkybG1hV05wVW1selkyOXpjMmx2Ym1VK0Nna0pQQzlrWVhScFUybHVaMjlzYjFabGNuTmhiV1Z1ZEc4K0Nna0pQR1JoZEdsVGFXNW5iMnh2Vm1WeWMyRnRaVzUwYno0S0NRa0pQR2x0Y0c5eWRHOVRhVzVuYjJ4dlZtVnljMkZ0Wlc1MGJ6NHhOVEF1TURBOEwybHRjRzl5ZEc5VGFXNW5iMnh2Vm1WeWMyRnRaVzUwYno0S0NRa0pQR2xpWVc1QlkyTnlaV1JwZEc4K1NWUXhPRlV3TURBd01EQXdNREF3TURBd01EQXdNREF3TURFeFBDOXBZbUZ1UVdOamNtVmthWFJ2UGdvSkNRazhZMkYxYzJGc1pWWmxjbk5oYldWdWRHOCtlSGg0ZUhoNGVEd3ZZMkYxYzJGc1pWWmxjbk5oYldWdWRHOCtDZ2tKQ1R4a1lYUnBVM0JsWTJsbWFXTnBVbWx6WTI5emMybHZibVUrZUhoNGVIaDRlRHd2WkdGMGFWTndaV05wWm1samFWSnBjMk52YzNOcGIyNWxQZ29KQ1R3dlpHRjBhVk5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KUEM5a1lYUnBWbVZ5YzJGdFpXNTBiejRLUEM5U1VGUSs8L3JwdD4KCQkJCTwvZWxlbWVudG9MaXN0YVJQVD4KCQkJCTxlbGVtZW50b0xpc3RhUlBUPgoJCQkJCTxpZGVudGlmaWNhdGl2b0RvbWluaW8+Nzc3Nzc3Nzc3Nzg8L2lkZW50aWZpY2F0aXZvRG9taW5pbz4KCQkJCQk8aWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4wMTAwMDAwMDAwMDAwMDAxNjwvaWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4KCQkJCQk8Y29kaWNlQ29udGVzdG9QYWdhbWVudG8+dDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMTQ8L2NvZGljZUNvbnRlc3RvUGFnYW1lbnRvPgoJCQkJCTxycHQ+UEZKUVZDQjRiV3h1Y3owaWFIUjBjRG92TDNkM2R5NWthV2RwZEhCaExtZHZkaTVwZEM5elkyaGxiV0Z6THpJd01URXZVR0ZuWVcxbGJuUnBMeUkrQ2drOGRtVnljMmx2Ym1WUFoyZGxkSFJ2UGpFdU1Ed3ZkbVZ5YzJsdmJtVlBaMmRsZEhSdlBnb0pQR1J2YldsdWFXOCtDZ2tKUEdsa1pXNTBhV1pwWTJGMGFYWnZSRzl0YVc1cGJ6NDNOemMzTnpjM056YzNPRHd2YVdSbGJuUnBabWxqWVhScGRtOUViMjFwYm1sdlBnb0pQQzlrYjIxcGJtbHZQZ29KUEdsa1pXNTBhV1pwWTJGMGFYWnZUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQakl3TWpNeE1qRTFNREV3TVRVek9XRmlZbUV6TXpVdFlXSTBaUzAwWkRFNExXRXpQQzlwWkdWdWRHbG1hV05oZEdsMmIwMWxjM05oWjJkcGIxSnBZMmhwWlhOMFlUNEtDVHhrWVhSaFQzSmhUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQakl3TWpNdE1USXRNVFZVTVRNNk1ERTZOVE11TmpFNUt6QXhPakF3UEM5a1lYUmhUM0poVFdWemMyRm5aMmx2VW1samFHbGxjM1JoUGdvSlBHRjFkR1Z1ZEdsallYcHBiMjVsVTI5bloyVjBkRzgrVGk5QlBDOWhkWFJsYm5ScFkyRjZhVzl1WlZOdloyZGxkSFJ2UGdvSlBITnZaMmRsZEhSdlZtVnljMkZ1ZEdVK0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFabGNuTmhiblJsUGdvSkNRazhkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NUhQQzkwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1FrOFkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBqYzNOemMzTnpjM056YzRQQzlqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSlBDOXBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlXWlhKellXNTBaVDRLQ1FrOFlXNWhaM0poWm1sallWWmxjbk5oYm5SbFBuaDRlSGg0ZUhoNGVEd3ZZVzVoWjNKaFptbGpZVlpsY25OaGJuUmxQZ29KUEM5emIyZG5aWFIwYjFabGNuTmhiblJsUGdvSlBITnZaMmRsZEhSdlVHRm5ZWFJ2Y21VK0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFCaFoyRjBiM0psUGdvSkNRazhkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NUhQQzkwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1FrOFkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBqYzNOemMzTnpjM056YzRQQzlqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSlBDOXBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlRWVdkaGRHOXlaVDRLQ1FrOFlXNWhaM0poWm1sallWQmhaMkYwYjNKbFBuaDRlSGg0ZUhoNGVEd3ZZVzVoWjNKaFptbGpZVkJoWjJGMGIzSmxQZ29KUEM5emIyZG5aWFIwYjFCaFoyRjBiM0psUGdvSlBHVnVkR1ZDWlc1bFptbGphV0Z5YVc4K0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjBKbGJtVm1hV05wWVhKcGJ6NEtDUWtKUEhScGNHOUpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrUnp3dmRHbHdiMGxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno0S0NRa0pQR052WkdsalpVbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejQzTnpjM056YzNOemMzT0R3dlkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBnb0pDVHd2YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlFtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4a1pXNXZiV2x1WVhwcGIyNWxRbVZ1WldacFkybGhjbWx2UG5oNGVIaDRlSGc4TDJSbGJtOXRhVzVoZW1sdmJtVkNaVzVsWm1samFXRnlhVzgrQ2drSlBHTnZaR2xqWlZWdWFYUlBjR1Z5UW1WdVpXWnBZMmxoY21sdlBuaDRQQzlqYjJScFkyVlZibWwwVDNCbGNrSmxibVZtYVdOcFlYSnBiejRLQ1FrOFpHVnViMjFWYm1sMFQzQmxja0psYm1WbWFXTnBZWEpwYno1NGVIaDRlSGc4TDJSbGJtOXRWVzVwZEU5d1pYSkNaVzVsWm1samFXRnlhVzgrQ2drSlBHbHVaR2x5YVhwNmIwSmxibVZtYVdOcFlYSnBiejU0ZUhoNFBDOXBibVJwY21sNmVtOUNaVzVsWm1samFXRnlhVzgrQ2drSlBHTnBkbWxqYjBKbGJtVm1hV05wWVhKcGJ6NTRlSGc4TDJOcGRtbGpiMEpsYm1WbWFXTnBZWEpwYno0S0NRazhZMkZ3UW1WdVpXWnBZMmxoY21sdlBuaDRlSGg0UEM5allYQkNaVzVsWm1samFXRnlhVzgrQ2drSlBHeHZZMkZzYVhSaFFtVnVaV1pwWTJsaGNtbHZQbmg0ZUhnOEwyeHZZMkZzYVhSaFFtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4d2NtOTJhVzVqYVdGQ1pXNWxabWxqYVdGeWFXOCtlSGc4TDNCeWIzWnBibU5wWVVKbGJtVm1hV05wWVhKcGJ6NEtDUWs4Ym1GNmFXOXVaVUpsYm1WbWFXTnBZWEpwYno1NGVEd3ZibUY2YVc5dVpVSmxibVZtYVdOcFlYSnBiejRLQ1R3dlpXNTBaVUpsYm1WbWFXTnBZWEpwYno0S0NUeGtZWFJwVm1WeWMyRnRaVzUwYno0S0NRazhaR0YwWVVWelpXTjFlbWx2Ym1WUVlXZGhiV1Z1ZEc4K01qQXlNeTB4TWkweE5Tc3dNVG93TUR3dlpHRjBZVVZ6WldOMWVtbHZibVZRWVdkaGJXVnVkRzgrQ2drSlBHbHRjRzl5ZEc5VWIzUmhiR1ZFWVZabGNuTmhjbVUrTVRFMkxqQXdQQzlwYlhCdmNuUnZWRzkwWVd4bFJHRldaWEp6WVhKbFBnb0pDVHgwYVhCdlZtVnljMkZ0Wlc1MGJ6NUNRbFE4TDNScGNHOVdaWEp6WVcxbGJuUnZQZ29KQ1R4cFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOVdaWEp6WVcxbGJuUnZQakF4TURBd01EQXdNREF3TURBd01ERTJQQzlwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5V1pYSnpZVzFsYm5SdlBnb0pDVHhqYjJScFkyVkRiMjUwWlhOMGIxQmhaMkZ0Wlc1MGJ6NTBNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREF4TkR3dlkyOWthV05sUTI5dWRHVnpkRzlRWVdkaGJXVnVkRzgrQ2drSlBHWnBjbTFoVW1salpYWjFkR0UrTUR3dlptbHliV0ZTYVdObGRuVjBZVDRLQ1FrOFpHRjBhVk5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KQ1FrOGFXMXdiM0owYjFOcGJtZHZiRzlXWlhKellXMWxiblJ2UGpFd01DNHdNRHd2YVcxd2IzSjBiMU5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KQ1FrOGFXSmhia0ZqWTNKbFpHbDBiejVKVkRFNFZUQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNVEk4TDJsaVlXNUJZMk55WldScGRHOCtDZ2tKQ1R4allYVnpZV3hsVm1WeWMyRnRaVzUwYno1NGVIaDRlSGg0UEM5allYVnpZV3hsVm1WeWMyRnRaVzUwYno0S0NRa0pQR1JoZEdsVGNHVmphV1pwWTJsU2FYTmpiM056YVc5dVpUNTRlSGg0ZUhoNFBDOWtZWFJwVTNCbFkybG1hV05wVW1selkyOXpjMmx2Ym1VK0Nna0pQQzlrWVhScFUybHVaMjlzYjFabGNuTmhiV1Z1ZEc4K0NpQWdJQ0FnSUNBZ1BHUmhkR2xUYVc1bmIyeHZWbVZ5YzJGdFpXNTBiejRLSUNBZ0lDQWdJQ0FnSUNBOGFXMXdiM0owYjFOcGJtZHZiRzlXWlhKellXMWxiblJ2UGpFMkxqQXdQQzlwYlhCdmNuUnZVMmx1WjI5c2IxWmxjbk5oYldWdWRHOCtDaUFnSUNBZ0lDQWdJQ0FnUEdOaGRYTmhiR1ZXWlhKellXMWxiblJ2UG5oNGVIaDRlRHd2WTJGMWMyRnNaVlpsY25OaGJXVnVkRzgrQ2lBZ0lDQWdJQ0FnSUNBZ1BHUmhkR2xUY0dWamFXWnBZMmxTYVhOamIzTnphVzl1WlQ1NGVIaDRlSGc4TDJSaGRHbFRjR1ZqYVdacFkybFNhWE5qYjNOemFXOXVaVDRLSUNBZ0lDQWdJQ0FnSUNBOFpHRjBhVTFoY21OaFFtOXNiRzlFYVdkcGRHRnNaVDRLSUNBZ0lDQWdJQ0FnSUNBZ0lDQThkR2x3YjBKdmJHeHZQbmg0ZUhnOEwzUnBjRzlDYjJ4c2J6NEtJQ0FnSUNBZ0lDQWdJQ0FnSUNBOGFHRnphRVJ2WTNWdFpXNTBiejU0ZUhoNFBDOW9ZWE5vUkc5amRXMWxiblJ2UGdvZ0lDQWdJQ0FnSUNBZ0lDQWdJRHh3Y205MmFXNWphV0ZTWlhOcFpHVnVlbUUrZUhnOEwzQnliM1pwYm1OcFlWSmxjMmxrWlc1NllUNEtJQ0FnSUNBZ0lDQWdJQ0E4TDJSaGRHbE5ZWEpqWVVKdmJHeHZSR2xuYVhSaGJHVStDaUFnSUNBZ0lDQWdQQzlrWVhScFUybHVaMjlzYjFabGNuTmhiV1Z1ZEc4K0Nnb0pQQzlrWVhScFZtVnljMkZ0Wlc1MGJ6NEtQQzlTVUZRKzwvcnB0PgoJCQkJPC9lbGVtZW50b0xpc3RhUlBUPgoJCQk8L2xpc3RhUlBUPgoJCQk8bXVsdGlCZW5lZmljaWFyaW8+ZmFsc2U8L211bHRpQmVuZWZpY2lhcmlvPgoJCTwvbnMzOm5vZG9JbnZpYUNhcnJlbGxvUlBUPgoJPC9TT0FQLUVOVjpCb2R5Pgo8L1NPQVAtRU5WOkVudmVsb3BlPg==',
];

Capsule::statement($render_query, $data_req);









// nodo invia carrello RPT both events

$data_req = [
    ':id'                       => 24,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 10:30:00.197',
    ':tipoevento'               => 'nodoInviaCarrelloRPT',
    ':sottotipoevento'          => 'REQ',
    ':iddominio'                => '',
    ':iuv'                      => '',
    ':ccp'                      => '',
    ':noticenumber'             => '',
    ':creditorreferenceid'      => '',
    ':paymenttoken'             => '',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000010',
    ':sessionidoriginal'        => 'session_id_original_000010',
    ':uniqueid'                 => 'T000024',
    ':payload'                  => 'PFNPQVAtRU5WOkVudmVsb3BlIHhtbG5zOlNPQVAtRU5WPSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyIgeG1sbnM6cHB0PSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOndzPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyI+Cgk8U09BUC1FTlY6SGVhZGVyPgoJCTxwcHQ6aW50ZXN0YXppb25lQ2FycmVsbG9QUFQ+CgkJCTxpZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QQT43Nzc3Nzc3Nzc3NzwvaWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUEE+CgkJCTxpZGVudGlmaWNhdGl2b1N0YXppb25lSW50ZXJtZWRpYXJpb1BBPjc3Nzc3Nzc3Nzc3XzAxPC9pZGVudGlmaWNhdGl2b1N0YXppb25lSW50ZXJtZWRpYXJpb1BBPgoJCQk8aWRlbnRpZmljYXRpdm9DYXJyZWxsbz5jMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxMDwvaWRlbnRpZmljYXRpdm9DYXJyZWxsbz4KCQk8L3BwdDppbnRlc3RhemlvbmVDYXJyZWxsb1BQVD4KCTwvU09BUC1FTlY6SGVhZGVyPgoJPFNPQVAtRU5WOkJvZHk+CgkJPG5zMzpub2RvSW52aWFDYXJyZWxsb1JQVCB4bWxuczpuczM9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIj4KCQkJPHBhc3N3b3JkPlBMQUNFSE9MREVSPC9wYXNzd29yZD4KCQkJPGlkZW50aWZpY2F0aXZvUFNQPkFHSURfMDE8L2lkZW50aWZpY2F0aXZvUFNQPgoJCQk8aWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUFNQPjg4ODg4ODg4ODg4PC9pZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QU1A+CgkJCTxpZGVudGlmaWNhdGl2b0NhbmFsZT44ODg4ODg4ODg4OF8wMTwvaWRlbnRpZmljYXRpdm9DYW5hbGU+CgkJCTxsaXN0YVJQVD4KCQkJCTxlbGVtZW50b0xpc3RhUlBUPgoJCQkJCTxpZGVudGlmaWNhdGl2b0RvbWluaW8+Nzc3Nzc3Nzc3Nzc8L2lkZW50aWZpY2F0aXZvRG9taW5pbz4KCQkJCQk8aWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4wMTAwMDAwMDAwMDAwMDAyMDwvaWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4KCQkJCQk8Y29kaWNlQ29udGVzdG9QYWdhbWVudG8+dDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMjA8L2NvZGljZUNvbnRlc3RvUGFnYW1lbnRvPgoJCQkJCTxycHQ+UEZKUVZDQjRiV3h1Y3owaWFIUjBjRG92TDNkM2R5NWthV2RwZEhCaExtZHZkaTVwZEM5elkyaGxiV0Z6THpJd01URXZVR0ZuWVcxbGJuUnBMeUkrQ2drOGRtVnljMmx2Ym1WUFoyZGxkSFJ2UGpFdU1Ed3ZkbVZ5YzJsdmJtVlBaMmRsZEhSdlBnb0pQR1J2YldsdWFXOCtDZ2tKUEdsa1pXNTBhV1pwWTJGMGFYWnZSRzl0YVc1cGJ6NDNOemMzTnpjM056YzNOend2YVdSbGJuUnBabWxqWVhScGRtOUViMjFwYm1sdlBnb0pQQzlrYjIxcGJtbHZQZ29KUEdsa1pXNTBhV1pwWTJGMGFYWnZUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQakl3TWpNeE1qRTFNREV3TVRVek9XRmlZbUV6TXpVdFlXSTBaUzAwWkRFNExXRXpQQzlwWkdWdWRHbG1hV05oZEdsMmIwMWxjM05oWjJkcGIxSnBZMmhwWlhOMFlUNEtDVHhrWVhSaFQzSmhUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQakl3TWpNdE1USXRNVFZVTVRNNk1ERTZOVE11TmpFNUt6QXhPakF3UEM5a1lYUmhUM0poVFdWemMyRm5aMmx2VW1samFHbGxjM1JoUGdvSlBHRjFkR1Z1ZEdsallYcHBiMjVsVTI5bloyVjBkRzgrVGk5QlBDOWhkWFJsYm5ScFkyRjZhVzl1WlZOdloyZGxkSFJ2UGdvSlBITnZaMmRsZEhSdlZtVnljMkZ1ZEdVK0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFabGNuTmhiblJsUGdvSkNRazhkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NUhQQzkwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1FrOFkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBqYzNOemMzTnpjM056YzNQQzlqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSlBDOXBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlXWlhKellXNTBaVDRLQ1FrOFlXNWhaM0poWm1sallWWmxjbk5oYm5SbFBuaDRlSGg0ZUhoNGVEd3ZZVzVoWjNKaFptbGpZVlpsY25OaGJuUmxQZ29KUEM5emIyZG5aWFIwYjFabGNuTmhiblJsUGdvSlBITnZaMmRsZEhSdlVHRm5ZWFJ2Y21VK0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFCaFoyRjBiM0psUGdvSkNRazhkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NUhQQzkwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1FrOFkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBqYzNOemMzTnpjM056YzNQQzlqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSlBDOXBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlRWVdkaGRHOXlaVDRLQ1FrOFlXNWhaM0poWm1sallWQmhaMkYwYjNKbFBuaDRlSGg0ZUhoNGVEd3ZZVzVoWjNKaFptbGpZVkJoWjJGMGIzSmxQZ29KUEM5emIyZG5aWFIwYjFCaFoyRjBiM0psUGdvSlBHVnVkR1ZDWlc1bFptbGphV0Z5YVc4K0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjBKbGJtVm1hV05wWVhKcGJ6NEtDUWtKUEhScGNHOUpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrUnp3dmRHbHdiMGxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno0S0NRa0pQR052WkdsalpVbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejQzTnpjM056YzNOemMzTnp3dlkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBnb0pDVHd2YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlFtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4a1pXNXZiV2x1WVhwcGIyNWxRbVZ1WldacFkybGhjbWx2UG5oNGVIaDRlSGc4TDJSbGJtOXRhVzVoZW1sdmJtVkNaVzVsWm1samFXRnlhVzgrQ2drSlBHTnZaR2xqWlZWdWFYUlBjR1Z5UW1WdVpXWnBZMmxoY21sdlBuaDRQQzlqYjJScFkyVlZibWwwVDNCbGNrSmxibVZtYVdOcFlYSnBiejRLQ1FrOFpHVnViMjFWYm1sMFQzQmxja0psYm1WbWFXTnBZWEpwYno1NGVIaDRlSGc4TDJSbGJtOXRWVzVwZEU5d1pYSkNaVzVsWm1samFXRnlhVzgrQ2drSlBHbHVaR2x5YVhwNmIwSmxibVZtYVdOcFlYSnBiejU0ZUhoNFBDOXBibVJwY21sNmVtOUNaVzVsWm1samFXRnlhVzgrQ2drSlBHTnBkbWxqYjBKbGJtVm1hV05wWVhKcGJ6NTRlSGc4TDJOcGRtbGpiMEpsYm1WbWFXTnBZWEpwYno0S0NRazhZMkZ3UW1WdVpXWnBZMmxoY21sdlBuaDRlSGg0UEM5allYQkNaVzVsWm1samFXRnlhVzgrQ2drSlBHeHZZMkZzYVhSaFFtVnVaV1pwWTJsaGNtbHZQbmg0ZUhnOEwyeHZZMkZzYVhSaFFtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4d2NtOTJhVzVqYVdGQ1pXNWxabWxqYVdGeWFXOCtlSGc4TDNCeWIzWnBibU5wWVVKbGJtVm1hV05wWVhKcGJ6NEtDUWs4Ym1GNmFXOXVaVUpsYm1WbWFXTnBZWEpwYno1NGVEd3ZibUY2YVc5dVpVSmxibVZtYVdOcFlYSnBiejRLQ1R3dlpXNTBaVUpsYm1WbWFXTnBZWEpwYno0S0NUeGtZWFJwVm1WeWMyRnRaVzUwYno0S0NRazhaR0YwWVVWelpXTjFlbWx2Ym1WUVlXZGhiV1Z1ZEc4K01qQXlNeTB4TWkweE5Tc3dNVG93TUR3dlpHRjBZVVZ6WldOMWVtbHZibVZRWVdkaGJXVnVkRzgrQ2drSlBHbHRjRzl5ZEc5VWIzUmhiR1ZFWVZabGNuTmhjbVUrTmpBd0xqQXdQQzlwYlhCdmNuUnZWRzkwWVd4bFJHRldaWEp6WVhKbFBnb0pDVHgwYVhCdlZtVnljMkZ0Wlc1MGJ6NUNRbFE4TDNScGNHOVdaWEp6WVcxbGJuUnZQZ29KQ1R4cFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOVdaWEp6WVcxbGJuUnZQakF4TURBd01EQXdNREF3TURBd01ESXdQQzlwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5V1pYSnpZVzFsYm5SdlBnb0pDVHhqYjJScFkyVkRiMjUwWlhOMGIxQmhaMkZ0Wlc1MGJ6NTBNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREF5TUR3dlkyOWthV05sUTI5dWRHVnpkRzlRWVdkaGJXVnVkRzgrQ2drSlBHWnBjbTFoVW1salpYWjFkR0UrTUR3dlptbHliV0ZTYVdObGRuVjBZVDRLQ1FrOFpHRjBhVk5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KQ1FrOGFXMXdiM0owYjFOcGJtZHZiRzlXWlhKellXMWxiblJ2UGpZd01DNHdNRHd2YVcxd2IzSjBiMU5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KQ1FrOGFXSmhia0ZqWTNKbFpHbDBiejVKVkRFNFZUQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNVEE4TDJsaVlXNUJZMk55WldScGRHOCtDZ2tKQ1R4allYVnpZV3hsVm1WeWMyRnRaVzUwYno1NGVIaDRlSGg0UEM5allYVnpZV3hsVm1WeWMyRnRaVzUwYno0S0NRa0pQR1JoZEdsVGNHVmphV1pwWTJsU2FYTmpiM056YVc5dVpUNTRlSGg0ZUhoNFBDOWtZWFJwVTNCbFkybG1hV05wVW1selkyOXpjMmx2Ym1VK0Nna0pQQzlrWVhScFUybHVaMjlzYjFabGNuTmhiV1Z1ZEc4K0NnazhMMlJoZEdsV1pYSnpZVzFsYm5SdlBnbzhMMUpRVkQ0PTwvcnB0PgoJCQkJPC9lbGVtZW50b0xpc3RhUlBUPgoJCQk8L2xpc3RhUlBUPgoJCQk8bXVsdGlCZW5lZmljaWFyaW8+ZmFsc2U8L211bHRpQmVuZWZpY2lhcmlvPgoJCTwvbnMzOm5vZG9JbnZpYUNhcnJlbGxvUlBUPgoJPC9TT0FQLUVOVjpCb2R5Pgo8L1NPQVAtRU5WOkVudmVsb3BlPg==',
];

$data_resp = [
    ':id'                       => 25,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 10:32:00.197',
    ':tipoevento'               => 'nodoInviaCarrelloRPT',
    ':sottotipoevento'          => 'RESP',
    ':iddominio'                => '',
    ':iuv'                      => '',
    ':ccp'                      => '',
    ':noticenumber'             => '',
    ':creditorreferenceid'      => '',
    ':paymenttoken'             => '',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000010',
    ':sessionidoriginal'        => 'session_id_original_000010',
    ':uniqueid'                 => 'T000025',
    ':payload'                  => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpwcHQ9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIiB4bWxuczpwcHRoZWFkPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIiB4bWxuczp0bnM9Imh0dHA6Ly9Ob2RvUGFnYW1lbnRpU1BDLnNwY29vcC5nb3YuaXQvc2Vydml6aS9QYWdhbWVudGlUZWxlbWF0aWNpUlBUIiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBwdDpub2RvSW52aWFDYXJyZWxsb1JQVFJpc3Bvc3RhPgoJCQk8ZXNpdG9Db21wbGVzc2l2b09wZXJhemlvbmU+T0s8L2VzaXRvQ29tcGxlc3Npdm9PcGVyYXppb25lPgoJCQk8dXJsPmh0dHBzOi8vd2lzcDIucGFnb3BhLmdvdi5pdC93YWxsZXQvd2VsY29tZT9pZFNlc3Npb249NjA2N2FiMGItMGIxNi00NDVhLThlN2MtZGVkZGQ3Y2IxYzZiPC91cmw+CgkJPC9wcHQ6bm9kb0ludmlhQ2FycmVsbG9SUFRSaXNwb3N0YT4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+',
];



Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);





$data_req = [
    ':id'                       => 26,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 10:33:00.197',
    ':tipoevento'               => 'nodoInviaCarrelloRPT',
    ':sottotipoevento'          => 'REQ',
    ':iddominio'                => '',
    ':iuv'                      => '',
    ':ccp'                      => '',
    ':noticenumber'             => '',
    ':creditorreferenceid'      => '',
    ':paymenttoken'             => '',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000010',
    ':sessionidoriginal'        => 'session_id_original_000011',
    ':uniqueid'                 => 'T000026',
    ':payload'                  => 'PFNPQVAtRU5WOkVudmVsb3BlIHhtbG5zOlNPQVAtRU5WPSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyIgeG1sbnM6cHB0PSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOndzPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyI+Cgk8U09BUC1FTlY6SGVhZGVyPgoJCTxwcHQ6aW50ZXN0YXppb25lQ2FycmVsbG9QUFQ+CgkJCTxpZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QQT43Nzc3Nzc3Nzc3NzwvaWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUEE+CgkJCTxpZGVudGlmaWNhdGl2b1N0YXppb25lSW50ZXJtZWRpYXJpb1BBPjc3Nzc3Nzc3Nzc3XzAxPC9pZGVudGlmaWNhdGl2b1N0YXppb25lSW50ZXJtZWRpYXJpb1BBPgoJCQk8aWRlbnRpZmljYXRpdm9DYXJyZWxsbz5jMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxMTwvaWRlbnRpZmljYXRpdm9DYXJyZWxsbz4KCQk8L3BwdDppbnRlc3RhemlvbmVDYXJyZWxsb1BQVD4KCTwvU09BUC1FTlY6SGVhZGVyPgoJPFNPQVAtRU5WOkJvZHk+CgkJPG5zMzpub2RvSW52aWFDYXJyZWxsb1JQVCB4bWxuczpuczM9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIj4KCQkJPHBhc3N3b3JkPlBMQUNFSE9MREVSPC9wYXNzd29yZD4KCQkJPGlkZW50aWZpY2F0aXZvUFNQPkFHSURfMDE8L2lkZW50aWZpY2F0aXZvUFNQPgoJCQk8aWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUFNQPjg4ODg4ODg4ODg4PC9pZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QU1A+CgkJCTxpZGVudGlmaWNhdGl2b0NhbmFsZT44ODg4ODg4ODg4OF8wMTwvaWRlbnRpZmljYXRpdm9DYW5hbGU+CgkJCTxsaXN0YVJQVD4KCQkJCTxlbGVtZW50b0xpc3RhUlBUPgoJCQkJCTxpZGVudGlmaWNhdGl2b0RvbWluaW8+Nzc3Nzc3Nzc3Nzc8L2lkZW50aWZpY2F0aXZvRG9taW5pbz4KCQkJCQk8aWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4wMTAwMDAwMDAwMDAwMDAyMTwvaWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4KCQkJCQk8Y29kaWNlQ29udGVzdG9QYWdhbWVudG8+dDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMjE8L2NvZGljZUNvbnRlc3RvUGFnYW1lbnRvPgoJCQkJCTxycHQ+UEZKUVZDQjRiV3h1Y3owaWFIUjBjRG92TDNkM2R5NWthV2RwZEhCaExtZHZkaTVwZEM5elkyaGxiV0Z6THpJd01URXZVR0ZuWVcxbGJuUnBMeUkrQ2drOGRtVnljMmx2Ym1WUFoyZGxkSFJ2UGpFdU1Ed3ZkbVZ5YzJsdmJtVlBaMmRsZEhSdlBnb0pQR1J2YldsdWFXOCtDZ2tKUEdsa1pXNTBhV1pwWTJGMGFYWnZSRzl0YVc1cGJ6NDNOemMzTnpjM056YzNOend2YVdSbGJuUnBabWxqWVhScGRtOUViMjFwYm1sdlBnb0pQQzlrYjIxcGJtbHZQZ29KUEdsa1pXNTBhV1pwWTJGMGFYWnZUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQakl3TWpNeE1qRTFNREV3TVRVek9XRmlZbUV6TXpVdFlXSTBaUzAwWkRFNExXRXpQQzlwWkdWdWRHbG1hV05oZEdsMmIwMWxjM05oWjJkcGIxSnBZMmhwWlhOMFlUNEtDVHhrWVhSaFQzSmhUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQakl3TWpNdE1USXRNVFZVTVRNNk1ERTZOVE11TmpFNUt6QXhPakF3UEM5a1lYUmhUM0poVFdWemMyRm5aMmx2VW1samFHbGxjM1JoUGdvSlBHRjFkR1Z1ZEdsallYcHBiMjVsVTI5bloyVjBkRzgrVGk5QlBDOWhkWFJsYm5ScFkyRjZhVzl1WlZOdloyZGxkSFJ2UGdvSlBITnZaMmRsZEhSdlZtVnljMkZ1ZEdVK0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFabGNuTmhiblJsUGdvSkNRazhkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NUhQQzkwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1FrOFkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBqYzNOemMzTnpjM056YzNQQzlqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSlBDOXBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlXWlhKellXNTBaVDRLQ1FrOFlXNWhaM0poWm1sallWWmxjbk5oYm5SbFBuaDRlSGg0ZUhoNGVEd3ZZVzVoWjNKaFptbGpZVlpsY25OaGJuUmxQZ29KUEM5emIyZG5aWFIwYjFabGNuTmhiblJsUGdvSlBITnZaMmRsZEhSdlVHRm5ZWFJ2Y21VK0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFCaFoyRjBiM0psUGdvSkNRazhkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NUhQQzkwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1FrOFkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBqYzNOemMzTnpjM056YzNQQzlqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSlBDOXBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlRWVdkaGRHOXlaVDRLQ1FrOFlXNWhaM0poWm1sallWQmhaMkYwYjNKbFBuaDRlSGg0ZUhoNGVEd3ZZVzVoWjNKaFptbGpZVkJoWjJGMGIzSmxQZ29KUEM5emIyZG5aWFIwYjFCaFoyRjBiM0psUGdvSlBHVnVkR1ZDWlc1bFptbGphV0Z5YVc4K0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjBKbGJtVm1hV05wWVhKcGJ6NEtDUWtKUEhScGNHOUpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrUnp3dmRHbHdiMGxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno0S0NRa0pQR052WkdsalpVbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejQzTnpjM056YzNOemMzTnp3dlkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBnb0pDVHd2YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlFtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4a1pXNXZiV2x1WVhwcGIyNWxRbVZ1WldacFkybGhjbWx2UG5oNGVIaDRlSGc4TDJSbGJtOXRhVzVoZW1sdmJtVkNaVzVsWm1samFXRnlhVzgrQ2drSlBHTnZaR2xqWlZWdWFYUlBjR1Z5UW1WdVpXWnBZMmxoY21sdlBuaDRQQzlqYjJScFkyVlZibWwwVDNCbGNrSmxibVZtYVdOcFlYSnBiejRLQ1FrOFpHVnViMjFWYm1sMFQzQmxja0psYm1WbWFXTnBZWEpwYno1NGVIaDRlSGc4TDJSbGJtOXRWVzVwZEU5d1pYSkNaVzVsWm1samFXRnlhVzgrQ2drSlBHbHVaR2x5YVhwNmIwSmxibVZtYVdOcFlYSnBiejU0ZUhoNFBDOXBibVJwY21sNmVtOUNaVzVsWm1samFXRnlhVzgrQ2drSlBHTnBkbWxqYjBKbGJtVm1hV05wWVhKcGJ6NTRlSGc4TDJOcGRtbGpiMEpsYm1WbWFXTnBZWEpwYno0S0NRazhZMkZ3UW1WdVpXWnBZMmxoY21sdlBuaDRlSGg0UEM5allYQkNaVzVsWm1samFXRnlhVzgrQ2drSlBHeHZZMkZzYVhSaFFtVnVaV1pwWTJsaGNtbHZQbmg0ZUhnOEwyeHZZMkZzYVhSaFFtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4d2NtOTJhVzVqYVdGQ1pXNWxabWxqYVdGeWFXOCtlSGc4TDNCeWIzWnBibU5wWVVKbGJtVm1hV05wWVhKcGJ6NEtDUWs4Ym1GNmFXOXVaVUpsYm1WbWFXTnBZWEpwYno1NGVEd3ZibUY2YVc5dVpVSmxibVZtYVdOcFlYSnBiejRLQ1R3dlpXNTBaVUpsYm1WbWFXTnBZWEpwYno0S0NUeGtZWFJwVm1WeWMyRnRaVzUwYno0S0NRazhaR0YwWVVWelpXTjFlbWx2Ym1WUVlXZGhiV1Z1ZEc4K01qQXlNeTB4TWkweE5Tc3dNVG93TUR3dlpHRjBZVVZ6WldOMWVtbHZibVZRWVdkaGJXVnVkRzgrQ2drSlBHbHRjRzl5ZEc5VWIzUmhiR1ZFWVZabGNuTmhjbVUrTmpBd0xqQXdQQzlwYlhCdmNuUnZWRzkwWVd4bFJHRldaWEp6WVhKbFBnb0pDVHgwYVhCdlZtVnljMkZ0Wlc1MGJ6NUNRbFE4TDNScGNHOVdaWEp6WVcxbGJuUnZQZ29KQ1R4cFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOVdaWEp6WVcxbGJuUnZQakF4TURBd01EQXdNREF3TURBd01ESXhQQzlwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5V1pYSnpZVzFsYm5SdlBnb0pDVHhqYjJScFkyVkRiMjUwWlhOMGIxQmhaMkZ0Wlc1MGJ6NTBNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREF5TVR3dlkyOWthV05sUTI5dWRHVnpkRzlRWVdkaGJXVnVkRzgrQ2drSlBHWnBjbTFoVW1salpYWjFkR0UrTUR3dlptbHliV0ZTYVdObGRuVjBZVDRLQ1FrOFpHRjBhVk5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KQ1FrOGFXMXdiM0owYjFOcGJtZHZiRzlXWlhKellXMWxiblJ2UGpJMU1DNHdNRHd2YVcxd2IzSjBiMU5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KQ1FrOGFXSmhia0ZqWTNKbFpHbDBiejVKVkRFNFZUQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNVEE4TDJsaVlXNUJZMk55WldScGRHOCtDZ2tKQ1R4allYVnpZV3hsVm1WeWMyRnRaVzUwYno1NGVIaDRlSGg0UEM5allYVnpZV3hsVm1WeWMyRnRaVzUwYno0S0NRa0pQR1JoZEdsVGNHVmphV1pwWTJsU2FYTmpiM056YVc5dVpUNTRlSGg0ZUhoNFBDOWtZWFJwVTNCbFkybG1hV05wVW1selkyOXpjMmx2Ym1VK0Nna0pQQzlrWVhScFUybHVaMjlzYjFabGNuTmhiV1Z1ZEc4K0Nna0pQR1JoZEdsVGFXNW5iMnh2Vm1WeWMyRnRaVzUwYno0S0NRa0pQR2x0Y0c5eWRHOVRhVzVuYjJ4dlZtVnljMkZ0Wlc1MGJ6NHpOVEF1TURBOEwybHRjRzl5ZEc5VGFXNW5iMnh2Vm1WeWMyRnRaVzUwYno0S0NRa0pQR2xpWVc1QlkyTnlaV1JwZEc4K1NWUXhPRlV3TURBd01EQXdNREF3TURBd01EQXdNREF3TURFeFBDOXBZbUZ1UVdOamNtVmthWFJ2UGdvSkNRazhZMkYxYzJGc1pWWmxjbk5oYldWdWRHOCtlSGg0ZUhoNGVEd3ZZMkYxYzJGc1pWWmxjbk5oYldWdWRHOCtDZ2tKQ1R4a1lYUnBVM0JsWTJsbWFXTnBVbWx6WTI5emMybHZibVUrZUhoNGVIaDRlRHd2WkdGMGFWTndaV05wWm1samFWSnBjMk52YzNOcGIyNWxQZ29KQ1R3dlpHRjBhVk5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KUEM5a1lYUnBWbVZ5YzJGdFpXNTBiejRLUEM5U1VGUSs8L3JwdD4KCQkJCTwvZWxlbWVudG9MaXN0YVJQVD4KCQkJPC9saXN0YVJQVD4KCQkJPG11bHRpQmVuZWZpY2lhcmlvPmZhbHNlPC9tdWx0aUJlbmVmaWNpYXJpbz4KCQk8L25zMzpub2RvSW52aWFDYXJyZWxsb1JQVD4KCTwvU09BUC1FTlY6Qm9keT4KPC9TT0FQLUVOVjpFbnZlbG9wZT4=',
];

$data_resp = [
    ':id'                       => 27,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 10:34:00.197',
    ':tipoevento'               => 'nodoInviaCarrelloRPT',
    ':sottotipoevento'          => 'RESP',
    ':iddominio'                => '',
    ':iuv'                      => '',
    ':ccp'                      => '',
    ':noticenumber'             => '',
    ':creditorreferenceid'      => '',
    ':paymenttoken'             => '',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000010',
    ':sessionidoriginal'        => 'session_id_original_000011',
    ':uniqueid'                 => 'T000027',
    ':payload'                  => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpwcHQ9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIiB4bWxuczpwcHRoZWFkPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIiB4bWxuczp0bnM9Imh0dHA6Ly9Ob2RvUGFnYW1lbnRpU1BDLnNwY29vcC5nb3YuaXQvc2Vydml6aS9QYWdhbWVudGlUZWxlbWF0aWNpUlBUIiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBwdDpub2RvSW52aWFDYXJyZWxsb1JQVFJpc3Bvc3RhPgoJCQk8ZXNpdG9Db21wbGVzc2l2b09wZXJhemlvbmU+T0s8L2VzaXRvQ29tcGxlc3Npdm9PcGVyYXppb25lPgoJCQk8dXJsPmh0dHBzOi8vd2lzcDIucGFnb3BhLmdvdi5pdC93YWxsZXQvd2VsY29tZT9pZFNlc3Npb249NjA2N2FiMGItMGIxNi00NDVhLThlN2MtZGVkZGQ3Y2IxYzZiPC91cmw+CgkJPC9wcHQ6bm9kb0ludmlhQ2FycmVsbG9SUFRSaXNwb3N0YT4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+',
];



Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);







$data_req = [
    ':id'                       => 28,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 10:35:00.197',
    ':tipoevento'               => 'nodoInviaCarrelloRPT',
    ':sottotipoevento'          => 'REQ',
    ':iddominio'                => '',
    ':iuv'                      => '',
    ':ccp'                      => '',
    ':noticenumber'             => '',
    ':creditorreferenceid'      => '',
    ':paymenttoken'             => '',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000010',
    ':sessionidoriginal'        => 'session_id_original_000012',
    ':uniqueid'                 => 'T000028',
    ':payload'                  => 'PFNPQVAtRU5WOkVudmVsb3BlIHhtbG5zOlNPQVAtRU5WPSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyIgeG1sbnM6cHB0PSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOndzPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyI+Cgk8U09BUC1FTlY6SGVhZGVyPgoJCTxwcHQ6aW50ZXN0YXppb25lQ2FycmVsbG9QUFQ+CgkJCTxpZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QQT43Nzc3Nzc3Nzc3NzwvaWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUEE+CgkJCTxpZGVudGlmaWNhdGl2b1N0YXppb25lSW50ZXJtZWRpYXJpb1BBPjc3Nzc3Nzc3Nzc3XzAxPC9pZGVudGlmaWNhdGl2b1N0YXppb25lSW50ZXJtZWRpYXJpb1BBPgoJCQk8aWRlbnRpZmljYXRpdm9DYXJyZWxsbz5jMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxMjwvaWRlbnRpZmljYXRpdm9DYXJyZWxsbz4KCQk8L3BwdDppbnRlc3RhemlvbmVDYXJyZWxsb1BQVD4KCTwvU09BUC1FTlY6SGVhZGVyPgoJPFNPQVAtRU5WOkJvZHk+CgkJPG5zMzpub2RvSW52aWFDYXJyZWxsb1JQVCB4bWxuczpuczM9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIj4KCQkJPHBhc3N3b3JkPlBMQUNFSE9MREVSPC9wYXNzd29yZD4KCQkJPGlkZW50aWZpY2F0aXZvUFNQPkFHSURfMDE8L2lkZW50aWZpY2F0aXZvUFNQPgoJCQk8aWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUFNQPjg4ODg4ODg4ODg4PC9pZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QU1A+CgkJCTxpZGVudGlmaWNhdGl2b0NhbmFsZT44ODg4ODg4ODg4OF8wMTwvaWRlbnRpZmljYXRpdm9DYW5hbGU+CgkJCTxsaXN0YVJQVD4KCQkJCTxlbGVtZW50b0xpc3RhUlBUPgoJCQkJCTxpZGVudGlmaWNhdGl2b0RvbWluaW8+Nzc3Nzc3Nzc3Nzc8L2lkZW50aWZpY2F0aXZvRG9taW5pbz4KCQkJCQk8aWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4wMTAwMDAwMDAwMDAwMDAyMjwvaWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4KCQkJCQk8Y29kaWNlQ29udGVzdG9QYWdhbWVudG8+dDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMjI8L2NvZGljZUNvbnRlc3RvUGFnYW1lbnRvPgoJCQkJCTxycHQ+UEZKUVZDQjRiV3h1Y3owaWFIUjBjRG92TDNkM2R5NWthV2RwZEhCaExtZHZkaTVwZEM5elkyaGxiV0Z6THpJd01URXZVR0ZuWVcxbGJuUnBMeUkrQ2drOGRtVnljMmx2Ym1WUFoyZGxkSFJ2UGpFdU1Ed3ZkbVZ5YzJsdmJtVlBaMmRsZEhSdlBnb0pQR1J2YldsdWFXOCtDZ2tKUEdsa1pXNTBhV1pwWTJGMGFYWnZSRzl0YVc1cGJ6NDNOemMzTnpjM056YzNOend2YVdSbGJuUnBabWxqWVhScGRtOUViMjFwYm1sdlBnb0pQQzlrYjIxcGJtbHZQZ29KUEdsa1pXNTBhV1pwWTJGMGFYWnZUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQakl3TWpNeE1qRTFNREV3TVRVek9XRmlZbUV6TXpVdFlXSTBaUzAwWkRFNExXRXpQQzlwWkdWdWRHbG1hV05oZEdsMmIwMWxjM05oWjJkcGIxSnBZMmhwWlhOMFlUNEtDVHhrWVhSaFQzSmhUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQakl3TWpNdE1USXRNVFZVTVRNNk1ERTZOVE11TmpFNUt6QXhPakF3UEM5a1lYUmhUM0poVFdWemMyRm5aMmx2VW1samFHbGxjM1JoUGdvSlBHRjFkR1Z1ZEdsallYcHBiMjVsVTI5bloyVjBkRzgrVGk5QlBDOWhkWFJsYm5ScFkyRjZhVzl1WlZOdloyZGxkSFJ2UGdvSlBITnZaMmRsZEhSdlZtVnljMkZ1ZEdVK0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFabGNuTmhiblJsUGdvSkNRazhkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NUhQQzkwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1FrOFkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBqYzNOemMzTnpjM056YzNQQzlqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSlBDOXBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlXWlhKellXNTBaVDRLQ1FrOFlXNWhaM0poWm1sallWWmxjbk5oYm5SbFBuaDRlSGg0ZUhoNGVEd3ZZVzVoWjNKaFptbGpZVlpsY25OaGJuUmxQZ29KUEM5emIyZG5aWFIwYjFabGNuTmhiblJsUGdvSlBITnZaMmRsZEhSdlVHRm5ZWFJ2Y21VK0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFCaFoyRjBiM0psUGdvSkNRazhkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NUhQQzkwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1FrOFkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBqYzNOemMzTnpjM056YzNQQzlqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSlBDOXBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlRWVdkaGRHOXlaVDRLQ1FrOFlXNWhaM0poWm1sallWQmhaMkYwYjNKbFBuaDRlSGg0ZUhoNGVEd3ZZVzVoWjNKaFptbGpZVkJoWjJGMGIzSmxQZ29KUEM5emIyZG5aWFIwYjFCaFoyRjBiM0psUGdvSlBHVnVkR1ZDWlc1bFptbGphV0Z5YVc4K0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjBKbGJtVm1hV05wWVhKcGJ6NEtDUWtKUEhScGNHOUpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrUnp3dmRHbHdiMGxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno0S0NRa0pQR052WkdsalpVbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejQzTnpjM056YzNOemMzTnp3dlkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBnb0pDVHd2YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlFtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4a1pXNXZiV2x1WVhwcGIyNWxRbVZ1WldacFkybGhjbWx2UG5oNGVIaDRlSGc4TDJSbGJtOXRhVzVoZW1sdmJtVkNaVzVsWm1samFXRnlhVzgrQ2drSlBHTnZaR2xqWlZWdWFYUlBjR1Z5UW1WdVpXWnBZMmxoY21sdlBuaDRQQzlqYjJScFkyVlZibWwwVDNCbGNrSmxibVZtYVdOcFlYSnBiejRLQ1FrOFpHVnViMjFWYm1sMFQzQmxja0psYm1WbWFXTnBZWEpwYno1NGVIaDRlSGc4TDJSbGJtOXRWVzVwZEU5d1pYSkNaVzVsWm1samFXRnlhVzgrQ2drSlBHbHVaR2x5YVhwNmIwSmxibVZtYVdOcFlYSnBiejU0ZUhoNFBDOXBibVJwY21sNmVtOUNaVzVsWm1samFXRnlhVzgrQ2drSlBHTnBkbWxqYjBKbGJtVm1hV05wWVhKcGJ6NTRlSGc4TDJOcGRtbGpiMEpsYm1WbWFXTnBZWEpwYno0S0NRazhZMkZ3UW1WdVpXWnBZMmxoY21sdlBuaDRlSGg0UEM5allYQkNaVzVsWm1samFXRnlhVzgrQ2drSlBHeHZZMkZzYVhSaFFtVnVaV1pwWTJsaGNtbHZQbmg0ZUhnOEwyeHZZMkZzYVhSaFFtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4d2NtOTJhVzVqYVdGQ1pXNWxabWxqYVdGeWFXOCtlSGc4TDNCeWIzWnBibU5wWVVKbGJtVm1hV05wWVhKcGJ6NEtDUWs4Ym1GNmFXOXVaVUpsYm1WbWFXTnBZWEpwYno1NGVEd3ZibUY2YVc5dVpVSmxibVZtYVdOcFlYSnBiejRLQ1R3dlpXNTBaVUpsYm1WbWFXTnBZWEpwYno0S0NUeGtZWFJwVm1WeWMyRnRaVzUwYno0S0NRazhaR0YwWVVWelpXTjFlbWx2Ym1WUVlXZGhiV1Z1ZEc4K01qQXlNeTB4TWkweE5Tc3dNVG93TUR3dlpHRjBZVVZ6WldOMWVtbHZibVZRWVdkaGJXVnVkRzgrQ2drSlBHbHRjRzl5ZEc5VWIzUmhiR1ZFWVZabGNuTmhjbVUrTmpBd0xqQXdQQzlwYlhCdmNuUnZWRzkwWVd4bFJHRldaWEp6WVhKbFBnb0pDVHgwYVhCdlZtVnljMkZ0Wlc1MGJ6NUNRbFE4TDNScGNHOVdaWEp6WVcxbGJuUnZQZ29KQ1R4cFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOVdaWEp6WVcxbGJuUnZQakF4TURBd01EQXdNREF3TURBd01ESXlQQzlwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5V1pYSnpZVzFsYm5SdlBnb0pDVHhqYjJScFkyVkRiMjUwWlhOMGIxQmhaMkZ0Wlc1MGJ6NTBNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREF5TVR3dlkyOWthV05sUTI5dWRHVnpkRzlRWVdkaGJXVnVkRzgrQ2drSlBHWnBjbTFoVW1salpYWjFkR0UrTUR3dlptbHliV0ZTYVdObGRuVjBZVDRLQ1FrOFpHRjBhVk5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KQ1FrOGFXMXdiM0owYjFOcGJtZHZiRzlXWlhKellXMWxiblJ2UGpJMU1DNHdNRHd2YVcxd2IzSjBiMU5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KQ1FrOGFXSmhia0ZqWTNKbFpHbDBiejVKVkRFNFZUQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNVEE4TDJsaVlXNUJZMk55WldScGRHOCtDZ2tKQ1R4allYVnpZV3hsVm1WeWMyRnRaVzUwYno1NGVIaDRlSGg0UEM5allYVnpZV3hsVm1WeWMyRnRaVzUwYno0S0NRa0pQR1JoZEdsVGNHVmphV1pwWTJsU2FYTmpiM056YVc5dVpUNTRlSGg0ZUhoNFBDOWtZWFJwVTNCbFkybG1hV05wVW1selkyOXpjMmx2Ym1VK0Nna0pQQzlrWVhScFUybHVaMjlzYjFabGNuTmhiV1Z1ZEc4K0Nna0pQR1JoZEdsVGFXNW5iMnh2Vm1WeWMyRnRaVzUwYno0S0NRa0pQR2x0Y0c5eWRHOVRhVzVuYjJ4dlZtVnljMkZ0Wlc1MGJ6NHpOVEF1TURBOEwybHRjRzl5ZEc5VGFXNW5iMnh2Vm1WeWMyRnRaVzUwYno0S0NRa0pQR2xpWVc1QlkyTnlaV1JwZEc4K1NWUXhPRlV3TURBd01EQXdNREF3TURBd01EQXdNREF3TURFeFBDOXBZbUZ1UVdOamNtVmthWFJ2UGdvSkNRazhZMkYxYzJGc1pWWmxjbk5oYldWdWRHOCtlSGg0ZUhoNGVEd3ZZMkYxYzJGc1pWWmxjbk5oYldWdWRHOCtDZ2tKQ1R4a1lYUnBVM0JsWTJsbWFXTnBVbWx6WTI5emMybHZibVUrZUhoNGVIaDRlRHd2WkdGMGFWTndaV05wWm1samFWSnBjMk52YzNOcGIyNWxQZ29KQ1R3dlpHRjBhVk5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KUEM5a1lYUnBWbVZ5YzJGdFpXNTBiejRLUEM5U1VGUSs8L3JwdD4KCQkJCTwvZWxlbWVudG9MaXN0YVJQVD4KCQkJCTxlbGVtZW50b0xpc3RhUlBUPgoJCQkJCTxpZGVudGlmaWNhdGl2b0RvbWluaW8+Nzc3Nzc3Nzc3Nzc8L2lkZW50aWZpY2F0aXZvRG9taW5pbz4KCQkJCQk8aWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4wMTAwMDAwMDAwMDAwMDAyMzwvaWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4KCQkJCQk8Y29kaWNlQ29udGVzdG9QYWdhbWVudG8+dDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMjI8L2NvZGljZUNvbnRlc3RvUGFnYW1lbnRvPgoJCQkJCTxycHQ+UEZKUVZDQjRiV3h1Y3owaWFIUjBjRG92TDNkM2R5NWthV2RwZEhCaExtZHZkaTVwZEM5elkyaGxiV0Z6THpJd01URXZVR0ZuWVcxbGJuUnBMeUkrQ2drOGRtVnljMmx2Ym1WUFoyZGxkSFJ2UGpFdU1Ed3ZkbVZ5YzJsdmJtVlBaMmRsZEhSdlBnb0pQR1J2YldsdWFXOCtDZ2tKUEdsa1pXNTBhV1pwWTJGMGFYWnZSRzl0YVc1cGJ6NDNOemMzTnpjM056YzNPRHd2YVdSbGJuUnBabWxqWVhScGRtOUViMjFwYm1sdlBnb0pQQzlrYjIxcGJtbHZQZ29KUEdsa1pXNTBhV1pwWTJGMGFYWnZUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQakl3TWpNeE1qRTFNREV3TVRVek9XRmlZbUV6TXpVdFlXSTBaUzAwWkRFNExXRXpQQzlwWkdWdWRHbG1hV05oZEdsMmIwMWxjM05oWjJkcGIxSnBZMmhwWlhOMFlUNEtDVHhrWVhSaFQzSmhUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQakl3TWpNdE1USXRNVFZVTVRNNk1ERTZOVE11TmpFNUt6QXhPakF3UEM5a1lYUmhUM0poVFdWemMyRm5aMmx2VW1samFHbGxjM1JoUGdvSlBHRjFkR1Z1ZEdsallYcHBiMjVsVTI5bloyVjBkRzgrVGk5QlBDOWhkWFJsYm5ScFkyRjZhVzl1WlZOdloyZGxkSFJ2UGdvSlBITnZaMmRsZEhSdlZtVnljMkZ1ZEdVK0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFabGNuTmhiblJsUGdvSkNRazhkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NUhQQzkwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1FrOFkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBqYzNOemMzTnpjM056YzNQQzlqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSlBDOXBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlXWlhKellXNTBaVDRLQ1FrOFlXNWhaM0poWm1sallWWmxjbk5oYm5SbFBuaDRlSGg0ZUhoNGVEd3ZZVzVoWjNKaFptbGpZVlpsY25OaGJuUmxQZ29KUEM5emIyZG5aWFIwYjFabGNuTmhiblJsUGdvSlBITnZaMmRsZEhSdlVHRm5ZWFJ2Y21VK0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFCaFoyRjBiM0psUGdvSkNRazhkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NUhQQzkwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1FrOFkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBqYzNOemMzTnpjM056YzNQQzlqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSlBDOXBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlRWVdkaGRHOXlaVDRLQ1FrOFlXNWhaM0poWm1sallWQmhaMkYwYjNKbFBuaDRlSGg0ZUhoNGVEd3ZZVzVoWjNKaFptbGpZVkJoWjJGMGIzSmxQZ29KUEM5emIyZG5aWFIwYjFCaFoyRjBiM0psUGdvSlBHVnVkR1ZDWlc1bFptbGphV0Z5YVc4K0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjBKbGJtVm1hV05wWVhKcGJ6NEtDUWtKUEhScGNHOUpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrUnp3dmRHbHdiMGxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno0S0NRa0pQR052WkdsalpVbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejQzTnpjM056YzNOemMzTnp3dlkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBnb0pDVHd2YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlFtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4a1pXNXZiV2x1WVhwcGIyNWxRbVZ1WldacFkybGhjbWx2UG5oNGVIaDRlSGc4TDJSbGJtOXRhVzVoZW1sdmJtVkNaVzVsWm1samFXRnlhVzgrQ2drSlBHTnZaR2xqWlZWdWFYUlBjR1Z5UW1WdVpXWnBZMmxoY21sdlBuaDRQQzlqYjJScFkyVlZibWwwVDNCbGNrSmxibVZtYVdOcFlYSnBiejRLQ1FrOFpHVnViMjFWYm1sMFQzQmxja0psYm1WbWFXTnBZWEpwYno1NGVIaDRlSGc4TDJSbGJtOXRWVzVwZEU5d1pYSkNaVzVsWm1samFXRnlhVzgrQ2drSlBHbHVaR2x5YVhwNmIwSmxibVZtYVdOcFlYSnBiejU0ZUhoNFBDOXBibVJwY21sNmVtOUNaVzVsWm1samFXRnlhVzgrQ2drSlBHTnBkbWxqYjBKbGJtVm1hV05wWVhKcGJ6NTRlSGc4TDJOcGRtbGpiMEpsYm1WbWFXTnBZWEpwYno0S0NRazhZMkZ3UW1WdVpXWnBZMmxoY21sdlBuaDRlSGg0UEM5allYQkNaVzVsWm1samFXRnlhVzgrQ2drSlBHeHZZMkZzYVhSaFFtVnVaV1pwWTJsaGNtbHZQbmg0ZUhnOEwyeHZZMkZzYVhSaFFtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4d2NtOTJhVzVqYVdGQ1pXNWxabWxqYVdGeWFXOCtlSGc4TDNCeWIzWnBibU5wWVVKbGJtVm1hV05wWVhKcGJ6NEtDUWs4Ym1GNmFXOXVaVUpsYm1WbWFXTnBZWEpwYno1NGVEd3ZibUY2YVc5dVpVSmxibVZtYVdOcFlYSnBiejRLQ1R3dlpXNTBaVUpsYm1WbWFXTnBZWEpwYno0S0NUeGtZWFJwVm1WeWMyRnRaVzUwYno0S0NRazhaR0YwWVVWelpXTjFlbWx2Ym1WUVlXZGhiV1Z1ZEc4K01qQXlNeTB4TWkweE5Tc3dNVG93TUR3dlpHRjBZVVZ6WldOMWVtbHZibVZRWVdkaGJXVnVkRzgrQ2drSlBHbHRjRzl5ZEc5VWIzUmhiR1ZFWVZabGNuTmhjbVUrTXpBd0xqQXdQQzlwYlhCdmNuUnZWRzkwWVd4bFJHRldaWEp6WVhKbFBnb0pDVHgwYVhCdlZtVnljMkZ0Wlc1MGJ6NUNRbFE4TDNScGNHOVdaWEp6WVcxbGJuUnZQZ29KQ1R4cFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOVdaWEp6WVcxbGJuUnZQakF4TURBd01EQXdNREF3TURBd01ESXpQQzlwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5V1pYSnpZVzFsYm5SdlBnb0pDVHhqYjJScFkyVkRiMjUwWlhOMGIxQmhaMkZ0Wlc1MGJ6NTBNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREF5TVR3dlkyOWthV05sUTI5dWRHVnpkRzlRWVdkaGJXVnVkRzgrQ2drSlBHWnBjbTFoVW1salpYWjFkR0UrTUR3dlptbHliV0ZTYVdObGRuVjBZVDRLQ1FrOFpHRjBhVk5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KQ1FrOGFXMXdiM0owYjFOcGJtZHZiRzlXWlhKellXMWxiblJ2UGpJd01DNHdNRHd2YVcxd2IzSjBiMU5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KQ1FrOGFXSmhia0ZqWTNKbFpHbDBiejVKVkRFNFZUQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNVEk4TDJsaVlXNUJZMk55WldScGRHOCtDZ2tKQ1R4allYVnpZV3hsVm1WeWMyRnRaVzUwYno1NGVIaDRlSGg0UEM5allYVnpZV3hsVm1WeWMyRnRaVzUwYno0S0NRa0pQR1JoZEdsVGNHVmphV1pwWTJsU2FYTmpiM056YVc5dVpUNTRlSGg0ZUhoNFBDOWtZWFJwVTNCbFkybG1hV05wVW1selkyOXpjMmx2Ym1VK0Nna0pQQzlrWVhScFUybHVaMjlzYjFabGNuTmhiV1Z1ZEc4K0Nna0pQR1JoZEdsVGFXNW5iMnh2Vm1WeWMyRnRaVzUwYno0S0NRa0pQR2x0Y0c5eWRHOVRhVzVuYjJ4dlZtVnljMkZ0Wlc1MGJ6NHhNREF1TURBOEwybHRjRzl5ZEc5VGFXNW5iMnh2Vm1WeWMyRnRaVzUwYno0S0NRa0pQR2xpWVc1QlkyTnlaV1JwZEc4K1NWUXhPRlV3TURBd01EQXdNREF3TURBd01EQXdNREF3TURFelBDOXBZbUZ1UVdOamNtVmthWFJ2UGdvSkNRazhZMkYxYzJGc1pWWmxjbk5oYldWdWRHOCtlSGg0ZUhoNGVEd3ZZMkYxYzJGc1pWWmxjbk5oYldWdWRHOCtDZ2tKQ1R4a1lYUnBVM0JsWTJsbWFXTnBVbWx6WTI5emMybHZibVUrZUhoNGVIaDRlRHd2WkdGMGFWTndaV05wWm1samFWSnBjMk52YzNOcGIyNWxQZ29KQ1R3dlpHRjBhVk5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KUEM5a1lYUnBWbVZ5YzJGdFpXNTBiejRLUEM5U1VGUSs8L3JwdD4KCQkJCTwvZWxlbWVudG9MaXN0YVJQVD4KCQkJPC9saXN0YVJQVD4KCQkJPG11bHRpQmVuZWZpY2lhcmlvPmZhbHNlPC9tdWx0aUJlbmVmaWNpYXJpbz4KCQk8L25zMzpub2RvSW52aWFDYXJyZWxsb1JQVD4KCTwvU09BUC1FTlY6Qm9keT4KPC9TT0FQLUVOVjpFbnZlbG9wZT4=',
];

$data_resp = [
    ':id'                       => 29,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 10:36:00.197',
    ':tipoevento'               => 'nodoInviaCarrelloRPT',
    ':sottotipoevento'          => 'RESP',
    ':iddominio'                => '',
    ':iuv'                      => '',
    ':ccp'                      => '',
    ':noticenumber'             => '',
    ':creditorreferenceid'      => '',
    ':paymenttoken'             => '',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000010',
    ':sessionidoriginal'        => 'session_id_original_000012',
    ':uniqueid'                 => 'T000029',
    ':payload'                  => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpwcHQ9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIiB4bWxuczpwcHRoZWFkPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIiB4bWxuczp0bnM9Imh0dHA6Ly9Ob2RvUGFnYW1lbnRpU1BDLnNwY29vcC5nb3YuaXQvc2Vydml6aS9QYWdhbWVudGlUZWxlbWF0aWNpUlBUIiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBwdDpub2RvSW52aWFDYXJyZWxsb1JQVFJpc3Bvc3RhPgoJCQk8ZXNpdG9Db21wbGVzc2l2b09wZXJhemlvbmU+T0s8L2VzaXRvQ29tcGxlc3Npdm9PcGVyYXppb25lPgoJCQk8dXJsPmh0dHBzOi8vd2lzcDIucGFnb3BhLmdvdi5pdC93YWxsZXQvd2VsY29tZT9pZFNlc3Npb249NjA2N2FiMGItMGIxNi00NDVhLThlN2MtZGVkZGQ3Y2IxYzZiPC91cmw+CgkJPC9wcHQ6bm9kb0ludmlhQ2FycmVsbG9SUFRSaXNwb3N0YT4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+',
];


Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);










$data_req = [
    ':id'                       => 30,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 10:38:00.197',
    ':tipoevento'               => 'nodoInviaCarrelloRPT',
    ':sottotipoevento'          => 'REQ',
    ':iddominio'                => '',
    ':iuv'                      => '',
    ':ccp'                      => '',
    ':noticenumber'             => '',
    ':creditorreferenceid'      => '',
    ':paymenttoken'             => '',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000010',
    ':sessionidoriginal'        => 'session_id_original_000013',
    ':uniqueid'                 => 'T000030',
    ':payload'                  => 'PFNPQVAtRU5WOkVudmVsb3BlIHhtbG5zOlNPQVAtRU5WPSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyIgeG1sbnM6cHB0PSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOndzPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyI+Cgk8U09BUC1FTlY6SGVhZGVyPgoJCTxwcHQ6aW50ZXN0YXppb25lQ2FycmVsbG9QUFQ+CgkJCTxpZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QQT43Nzc3Nzc3Nzc3NzwvaWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUEE+CgkJCTxpZGVudGlmaWNhdGl2b1N0YXppb25lSW50ZXJtZWRpYXJpb1BBPjc3Nzc3Nzc3Nzc3XzAxPC9pZGVudGlmaWNhdGl2b1N0YXppb25lSW50ZXJtZWRpYXJpb1BBPgoJCQk8aWRlbnRpZmljYXRpdm9DYXJyZWxsbz5jMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxMzwvaWRlbnRpZmljYXRpdm9DYXJyZWxsbz4KCQk8L3BwdDppbnRlc3RhemlvbmVDYXJyZWxsb1BQVD4KCTwvU09BUC1FTlY6SGVhZGVyPgoJPFNPQVAtRU5WOkJvZHk+CgkJPG5zMzpub2RvSW52aWFDYXJyZWxsb1JQVCB4bWxuczpuczM9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIj4KCQkJPHBhc3N3b3JkPlBMQUNFSE9MREVSPC9wYXNzd29yZD4KCQkJPGlkZW50aWZpY2F0aXZvUFNQPkFHSURfMDE8L2lkZW50aWZpY2F0aXZvUFNQPgoJCQk8aWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUFNQPjg4ODg4ODg4ODg4PC9pZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QU1A+CgkJCTxpZGVudGlmaWNhdGl2b0NhbmFsZT44ODg4ODg4ODg4OF8wMTwvaWRlbnRpZmljYXRpdm9DYW5hbGU+CgkJCTxsaXN0YVJQVD4KCQkJCTxlbGVtZW50b0xpc3RhUlBUPgoJCQkJCTxpZGVudGlmaWNhdGl2b0RvbWluaW8+Nzc3Nzc3Nzc3Nzc8L2lkZW50aWZpY2F0aXZvRG9taW5pbz4KCQkJCQk8aWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4wMTAwMDAwMDAwMDAwMDAyNDwvaWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4KCQkJCQk8Y29kaWNlQ29udGVzdG9QYWdhbWVudG8+dDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMjM8L2NvZGljZUNvbnRlc3RvUGFnYW1lbnRvPgoJCQkJCTxycHQ+UEZKUVZDQjRiV3h1Y3owaWFIUjBjRG92TDNkM2R5NWthV2RwZEhCaExtZHZkaTVwZEM5elkyaGxiV0Z6THpJd01URXZVR0ZuWVcxbGJuUnBMeUkrQ2drOGRtVnljMmx2Ym1WUFoyZGxkSFJ2UGpFdU1Ed3ZkbVZ5YzJsdmJtVlBaMmRsZEhSdlBnb0pQR1J2YldsdWFXOCtDZ2tKUEdsa1pXNTBhV1pwWTJGMGFYWnZSRzl0YVc1cGJ6NDNOemMzTnpjM056YzNOend2YVdSbGJuUnBabWxqWVhScGRtOUViMjFwYm1sdlBnb0pQQzlrYjIxcGJtbHZQZ29KUEdsa1pXNTBhV1pwWTJGMGFYWnZUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQakl3TWpNeE1qRTFNREV3TVRVek9XRmlZbUV6TXpVdFlXSTBaUzAwWkRFNExXRXpQQzlwWkdWdWRHbG1hV05oZEdsMmIwMWxjM05oWjJkcGIxSnBZMmhwWlhOMFlUNEtDVHhrWVhSaFQzSmhUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQakl3TWpNdE1USXRNVFZVTVRNNk1ERTZOVE11TmpFNUt6QXhPakF3UEM5a1lYUmhUM0poVFdWemMyRm5aMmx2VW1samFHbGxjM1JoUGdvSlBHRjFkR1Z1ZEdsallYcHBiMjVsVTI5bloyVjBkRzgrVGk5QlBDOWhkWFJsYm5ScFkyRjZhVzl1WlZOdloyZGxkSFJ2UGdvSlBITnZaMmRsZEhSdlZtVnljMkZ1ZEdVK0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFabGNuTmhiblJsUGdvSkNRazhkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NUhQQzkwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1FrOFkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBqYzNOemMzTnpjM056YzNQQzlqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSlBDOXBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlXWlhKellXNTBaVDRLQ1FrOFlXNWhaM0poWm1sallWWmxjbk5oYm5SbFBuaDRlSGg0ZUhoNGVEd3ZZVzVoWjNKaFptbGpZVlpsY25OaGJuUmxQZ29KUEM5emIyZG5aWFIwYjFabGNuTmhiblJsUGdvSlBITnZaMmRsZEhSdlVHRm5ZWFJ2Y21VK0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFCaFoyRjBiM0psUGdvSkNRazhkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NUhQQzkwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1FrOFkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBqYzNOemMzTnpjM056YzNQQzlqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSlBDOXBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlRWVdkaGRHOXlaVDRLQ1FrOFlXNWhaM0poWm1sallWQmhaMkYwYjNKbFBuaDRlSGg0ZUhoNGVEd3ZZVzVoWjNKaFptbGpZVkJoWjJGMGIzSmxQZ29KUEM5emIyZG5aWFIwYjFCaFoyRjBiM0psUGdvSlBHVnVkR1ZDWlc1bFptbGphV0Z5YVc4K0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjBKbGJtVm1hV05wWVhKcGJ6NEtDUWtKUEhScGNHOUpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrUnp3dmRHbHdiMGxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno0S0NRa0pQR052WkdsalpVbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejQzTnpjM056YzNOemMzTnp3dlkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBnb0pDVHd2YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlFtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4a1pXNXZiV2x1WVhwcGIyNWxRbVZ1WldacFkybGhjbWx2UG5oNGVIaDRlSGc4TDJSbGJtOXRhVzVoZW1sdmJtVkNaVzVsWm1samFXRnlhVzgrQ2drSlBHTnZaR2xqWlZWdWFYUlBjR1Z5UW1WdVpXWnBZMmxoY21sdlBuaDRQQzlqYjJScFkyVlZibWwwVDNCbGNrSmxibVZtYVdOcFlYSnBiejRLQ1FrOFpHVnViMjFWYm1sMFQzQmxja0psYm1WbWFXTnBZWEpwYno1NGVIaDRlSGc4TDJSbGJtOXRWVzVwZEU5d1pYSkNaVzVsWm1samFXRnlhVzgrQ2drSlBHbHVaR2x5YVhwNmIwSmxibVZtYVdOcFlYSnBiejU0ZUhoNFBDOXBibVJwY21sNmVtOUNaVzVsWm1samFXRnlhVzgrQ2drSlBHTnBkbWxqYjBKbGJtVm1hV05wWVhKcGJ6NTRlSGc4TDJOcGRtbGpiMEpsYm1WbWFXTnBZWEpwYno0S0NRazhZMkZ3UW1WdVpXWnBZMmxoY21sdlBuaDRlSGg0UEM5allYQkNaVzVsWm1samFXRnlhVzgrQ2drSlBHeHZZMkZzYVhSaFFtVnVaV1pwWTJsaGNtbHZQbmg0ZUhnOEwyeHZZMkZzYVhSaFFtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4d2NtOTJhVzVqYVdGQ1pXNWxabWxqYVdGeWFXOCtlSGc4TDNCeWIzWnBibU5wWVVKbGJtVm1hV05wWVhKcGJ6NEtDUWs4Ym1GNmFXOXVaVUpsYm1WbWFXTnBZWEpwYno1NGVEd3ZibUY2YVc5dVpVSmxibVZtYVdOcFlYSnBiejRLQ1R3dlpXNTBaVUpsYm1WbWFXTnBZWEpwYno0S0NUeGtZWFJwVm1WeWMyRnRaVzUwYno0S0NRazhaR0YwWVVWelpXTjFlbWx2Ym1WUVlXZGhiV1Z1ZEc4K01qQXlNeTB4TWkweE5Tc3dNVG93TUR3dlpHRjBZVVZ6WldOMWVtbHZibVZRWVdkaGJXVnVkRzgrQ2drSlBHbHRjRzl5ZEc5VWIzUmhiR1ZFWVZabGNuTmhjbVUrTXpBd0xqQXdQQzlwYlhCdmNuUnZWRzkwWVd4bFJHRldaWEp6WVhKbFBnb0pDVHgwYVhCdlZtVnljMkZ0Wlc1MGJ6NUNRbFE4TDNScGNHOVdaWEp6WVcxbGJuUnZQZ29KQ1R4cFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOVdaWEp6WVcxbGJuUnZQakF4TURBd01EQXdNREF3TURBd01ESTBQQzlwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5V1pYSnpZVzFsYm5SdlBnb0pDVHhqYjJScFkyVkRiMjUwWlhOMGIxQmhaMkZ0Wlc1MGJ6NTBNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREF5TXp3dlkyOWthV05sUTI5dWRHVnpkRzlRWVdkaGJXVnVkRzgrQ2drSlBHWnBjbTFoVW1salpYWjFkR0UrTUR3dlptbHliV0ZTYVdObGRuVjBZVDRLQ1FrOFpHRjBhVk5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KQ1FrOGFXMXdiM0owYjFOcGJtZHZiRzlXWlhKellXMWxiblJ2UGpFNE1DNHdNRHd2YVcxd2IzSjBiMU5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KQ1FrOGFXSmhia0ZqWTNKbFpHbDBiejVKVkRFNFZUQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNVEE4TDJsaVlXNUJZMk55WldScGRHOCtDZ2tKQ1R4allYVnpZV3hsVm1WeWMyRnRaVzUwYno1NGVIaDRlSGg0UEM5allYVnpZV3hsVm1WeWMyRnRaVzUwYno0S0NRa0pQR1JoZEdsVGNHVmphV1pwWTJsU2FYTmpiM056YVc5dVpUNTRlSGg0ZUhoNFBDOWtZWFJwVTNCbFkybG1hV05wVW1selkyOXpjMmx2Ym1VK0Nna0pQQzlrWVhScFUybHVaMjlzYjFabGNuTmhiV1Z1ZEc4K0Nna0pQR1JoZEdsVGFXNW5iMnh2Vm1WeWMyRnRaVzUwYno0S0NRa0pQR2x0Y0c5eWRHOVRhVzVuYjJ4dlZtVnljMkZ0Wlc1MGJ6NHlNQzR3TUR3dmFXMXdiM0owYjFOcGJtZHZiRzlXWlhKellXMWxiblJ2UGdvSkNRazhhV0poYmtGalkzSmxaR2wwYno1SlZERTRWVEF3TURBd01EQXdNREF3TURBd01EQXdNREF3TVRFOEwybGlZVzVCWTJOeVpXUnBkRzgrQ2drSkNUeGpZWFZ6WVd4bFZtVnljMkZ0Wlc1MGJ6NTRlSGg0ZUhoNFBDOWpZWFZ6WVd4bFZtVnljMkZ0Wlc1MGJ6NEtDUWtKUEdSaGRHbFRjR1ZqYVdacFkybFNhWE5qYjNOemFXOXVaVDU0ZUhoNGVIaDRQQzlrWVhScFUzQmxZMmxtYVdOcFVtbHpZMjl6YzJsdmJtVStDZ2tKUEM5a1lYUnBVMmx1WjI5c2IxWmxjbk5oYldWdWRHOCtDZ2s4TDJSaGRHbFdaWEp6WVcxbGJuUnZQZ284TDFKUVZEND08L3JwdD4KCQkJCTwvZWxlbWVudG9MaXN0YVJQVD4KCQkJCTxlbGVtZW50b0xpc3RhUlBUPgoJCQkJCTxpZGVudGlmaWNhdGl2b0RvbWluaW8+Nzc3Nzc3Nzc3Nzc8L2lkZW50aWZpY2F0aXZvRG9taW5pbz4KCQkJCQk8aWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4wMTAwMDAwMDAwMDAwMDAyNTwvaWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4KCQkJCQk8Y29kaWNlQ29udGVzdG9QYWdhbWVudG8+dDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMjM8L2NvZGljZUNvbnRlc3RvUGFnYW1lbnRvPgoJCQkJCTxycHQ+UEZKUVZDQjRiV3h1Y3owaWFIUjBjRG92TDNkM2R5NWthV2RwZEhCaExtZHZkaTVwZEM5elkyaGxiV0Z6THpJd01URXZVR0ZuWVcxbGJuUnBMeUkrQ2drOGRtVnljMmx2Ym1WUFoyZGxkSFJ2UGpFdU1Ed3ZkbVZ5YzJsdmJtVlBaMmRsZEhSdlBnb0pQR1J2YldsdWFXOCtDZ2tKUEdsa1pXNTBhV1pwWTJGMGFYWnZSRzl0YVc1cGJ6NDNOemMzTnpjM056YzNPRHd2YVdSbGJuUnBabWxqWVhScGRtOUViMjFwYm1sdlBnb0pQQzlrYjIxcGJtbHZQZ29KUEdsa1pXNTBhV1pwWTJGMGFYWnZUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQakl3TWpNeE1qRTFNREV3TVRVek9XRmlZbUV6TXpVdFlXSTBaUzAwWkRFNExXRXpQQzlwWkdWdWRHbG1hV05oZEdsMmIwMWxjM05oWjJkcGIxSnBZMmhwWlhOMFlUNEtDVHhrWVhSaFQzSmhUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQakl3TWpNdE1USXRNVFZVTVRNNk1ERTZOVE11TmpFNUt6QXhPakF3UEM5a1lYUmhUM0poVFdWemMyRm5aMmx2VW1samFHbGxjM1JoUGdvSlBHRjFkR1Z1ZEdsallYcHBiMjVsVTI5bloyVjBkRzgrVGk5QlBDOWhkWFJsYm5ScFkyRjZhVzl1WlZOdloyZGxkSFJ2UGdvSlBITnZaMmRsZEhSdlZtVnljMkZ1ZEdVK0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFabGNuTmhiblJsUGdvSkNRazhkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NUhQQzkwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1FrOFkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBqYzNOemMzTnpjM056YzNQQzlqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSlBDOXBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlXWlhKellXNTBaVDRLQ1FrOFlXNWhaM0poWm1sallWWmxjbk5oYm5SbFBuaDRlSGg0ZUhoNGVEd3ZZVzVoWjNKaFptbGpZVlpsY25OaGJuUmxQZ29KUEM5emIyZG5aWFIwYjFabGNuTmhiblJsUGdvSlBITnZaMmRsZEhSdlVHRm5ZWFJ2Y21VK0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFCaFoyRjBiM0psUGdvSkNRazhkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NUhQQzkwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1FrOFkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBqYzNOemMzTnpjM056YzNQQzlqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSlBDOXBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlRWVdkaGRHOXlaVDRLQ1FrOFlXNWhaM0poWm1sallWQmhaMkYwYjNKbFBuaDRlSGg0ZUhoNGVEd3ZZVzVoWjNKaFptbGpZVkJoWjJGMGIzSmxQZ29KUEM5emIyZG5aWFIwYjFCaFoyRjBiM0psUGdvSlBHVnVkR1ZDWlc1bFptbGphV0Z5YVc4K0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjBKbGJtVm1hV05wWVhKcGJ6NEtDUWtKUEhScGNHOUpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrUnp3dmRHbHdiMGxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno0S0NRa0pQR052WkdsalpVbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejQzTnpjM056YzNOemMzTnp3dlkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBnb0pDVHd2YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlFtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4a1pXNXZiV2x1WVhwcGIyNWxRbVZ1WldacFkybGhjbWx2UG5oNGVIaDRlSGc4TDJSbGJtOXRhVzVoZW1sdmJtVkNaVzVsWm1samFXRnlhVzgrQ2drSlBHTnZaR2xqWlZWdWFYUlBjR1Z5UW1WdVpXWnBZMmxoY21sdlBuaDRQQzlqYjJScFkyVlZibWwwVDNCbGNrSmxibVZtYVdOcFlYSnBiejRLQ1FrOFpHVnViMjFWYm1sMFQzQmxja0psYm1WbWFXTnBZWEpwYno1NGVIaDRlSGc4TDJSbGJtOXRWVzVwZEU5d1pYSkNaVzVsWm1samFXRnlhVzgrQ2drSlBHbHVaR2x5YVhwNmIwSmxibVZtYVdOcFlYSnBiejU0ZUhoNFBDOXBibVJwY21sNmVtOUNaVzVsWm1samFXRnlhVzgrQ2drSlBHTnBkbWxqYjBKbGJtVm1hV05wWVhKcGJ6NTRlSGc4TDJOcGRtbGpiMEpsYm1WbWFXTnBZWEpwYno0S0NRazhZMkZ3UW1WdVpXWnBZMmxoY21sdlBuaDRlSGg0UEM5allYQkNaVzVsWm1samFXRnlhVzgrQ2drSlBHeHZZMkZzYVhSaFFtVnVaV1pwWTJsaGNtbHZQbmg0ZUhnOEwyeHZZMkZzYVhSaFFtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4d2NtOTJhVzVqYVdGQ1pXNWxabWxqYVdGeWFXOCtlSGc4TDNCeWIzWnBibU5wWVVKbGJtVm1hV05wWVhKcGJ6NEtDUWs4Ym1GNmFXOXVaVUpsYm1WbWFXTnBZWEpwYno1NGVEd3ZibUY2YVc5dVpVSmxibVZtYVdOcFlYSnBiejRLQ1R3dlpXNTBaVUpsYm1WbWFXTnBZWEpwYno0S0NUeGtZWFJwVm1WeWMyRnRaVzUwYno0S0NRazhaR0YwWVVWelpXTjFlbWx2Ym1WUVlXZGhiV1Z1ZEc4K01qQXlNeTB4TWkweE5Tc3dNVG93TUR3dlpHRjBZVVZ6WldOMWVtbHZibVZRWVdkaGJXVnVkRzgrQ2drSlBHbHRjRzl5ZEc5VWIzUmhiR1ZFWVZabGNuTmhjbVUrTXpBd0xqQXdQQzlwYlhCdmNuUnZWRzkwWVd4bFJHRldaWEp6WVhKbFBnb0pDVHgwYVhCdlZtVnljMkZ0Wlc1MGJ6NUNRbFE4TDNScGNHOVdaWEp6WVcxbGJuUnZQZ29KQ1R4cFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOVdaWEp6WVcxbGJuUnZQakF4TURBd01EQXdNREF3TURBd01ESTFQQzlwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5V1pYSnpZVzFsYm5SdlBnb0pDVHhqYjJScFkyVkRiMjUwWlhOMGIxQmhaMkZ0Wlc1MGJ6NTBNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREF5TXp3dlkyOWthV05sUTI5dWRHVnpkRzlRWVdkaGJXVnVkRzgrQ2drSlBHWnBjbTFoVW1salpYWjFkR0UrTUR3dlptbHliV0ZTYVdObGRuVjBZVDRLQ1FrOFpHRjBhVk5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KQ1FrOGFXMXdiM0owYjFOcGJtZHZiRzlXWlhKellXMWxiblJ2UGpFNE1DNHdNRHd2YVcxd2IzSjBiMU5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KQ1FrOGFXSmhia0ZqWTNKbFpHbDBiejVKVkRFNFZUQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNVEk4TDJsaVlXNUJZMk55WldScGRHOCtDZ2tKQ1R4allYVnpZV3hsVm1WeWMyRnRaVzUwYno1NGVIaDRlSGg0UEM5allYVnpZV3hsVm1WeWMyRnRaVzUwYno0S0NRa0pQR1JoZEdsVGNHVmphV1pwWTJsU2FYTmpiM056YVc5dVpUNTRlSGg0ZUhoNFBDOWtZWFJwVTNCbFkybG1hV05wVW1selkyOXpjMmx2Ym1VK0Nna0pQQzlrWVhScFUybHVaMjlzYjFabGNuTmhiV1Z1ZEc4K0Nna0pQR1JoZEdsVGFXNW5iMnh2Vm1WeWMyRnRaVzUwYno0S0NRa0pQR2x0Y0c5eWRHOVRhVzVuYjJ4dlZtVnljMkZ0Wlc1MGJ6NHhNakF1TURBOEwybHRjRzl5ZEc5VGFXNW5iMnh2Vm1WeWMyRnRaVzUwYno0S0NRa0pQR2xpWVc1QlkyTnlaV1JwZEc4K1NWUXhPRlV3TURBd01EQXdNREF3TURBd01EQXdNREF3TURFelBDOXBZbUZ1UVdOamNtVmthWFJ2UGdvSkNRazhZMkYxYzJGc1pWWmxjbk5oYldWdWRHOCtlSGg0ZUhoNGVEd3ZZMkYxYzJGc1pWWmxjbk5oYldWdWRHOCtDZ2tKQ1R4a1lYUnBVM0JsWTJsbWFXTnBVbWx6WTI5emMybHZibVUrZUhoNGVIaDRlRHd2WkdGMGFWTndaV05wWm1samFWSnBjMk52YzNOcGIyNWxQZ29KQ1R3dlpHRjBhVk5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KUEM5a1lYUnBWbVZ5YzJGdFpXNTBiejRLUEM5U1VGUSs8L3JwdD4KCQkJCTwvZWxlbWVudG9MaXN0YVJQVD4KCQkJPC9saXN0YVJQVD4KCQkJPG11bHRpQmVuZWZpY2lhcmlvPmZhbHNlPC9tdWx0aUJlbmVmaWNpYXJpbz4KCQk8L25zMzpub2RvSW52aWFDYXJyZWxsb1JQVD4KCTwvU09BUC1FTlY6Qm9keT4KPC9TT0FQLUVOVjpFbnZlbG9wZT4=',
];

$data_resp = [
    ':id'                       => 31,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 10:39:00.197',
    ':tipoevento'               => 'nodoInviaCarrelloRPT',
    ':sottotipoevento'          => 'RESP',
    ':iddominio'                => '',
    ':iuv'                      => '',
    ':ccp'                      => '',
    ':noticenumber'             => '',
    ':creditorreferenceid'      => '',
    ':paymenttoken'             => '',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000010',
    ':sessionidoriginal'        => 'session_id_original_000013',
    ':uniqueid'                 => 'T000031',
    ':payload'                  => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpwcHQ9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIiB4bWxuczpwcHRoZWFkPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIiB4bWxuczp0bnM9Imh0dHA6Ly9Ob2RvUGFnYW1lbnRpU1BDLnNwY29vcC5nb3YuaXQvc2Vydml6aS9QYWdhbWVudGlUZWxlbWF0aWNpUlBUIiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBwdDpub2RvSW52aWFDYXJyZWxsb1JQVFJpc3Bvc3RhPgoJCQk8ZXNpdG9Db21wbGVzc2l2b09wZXJhemlvbmU+T0s8L2VzaXRvQ29tcGxlc3Npdm9PcGVyYXppb25lPgoJCQk8dXJsPmh0dHBzOi8vd2lzcDIucGFnb3BhLmdvdi5pdC93YWxsZXQvd2VsY29tZT9pZFNlc3Npb249NjA2N2FiMGItMGIxNi00NDVhLThlN2MtZGVkZGQ3Y2IxYzZiPC91cmw+CgkJPC9wcHQ6bm9kb0ludmlhQ2FycmVsbG9SUFRSaXNwb3N0YT4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+',
];

$data_resp_2 = [
    ':id'                       => 32,
    ':date_event'               => '2024-03-11',
    ':inserted_timestamp'       => '2024-03-11 10:40:00.197',
    ':tipoevento'               => 'nodoInviaCarrelloRPT',
    ':sottotipoevento'          => 'RESP',
    ':iddominio'                => '',
    ':iuv'                      => '',
    ':ccp'                      => '',
    ':noticenumber'             => '',
    ':creditorreferenceid'      => '',
    ':paymenttoken'             => '',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000010',
    ':sessionidoriginal'        => 'session_id_original_000013',
    ':uniqueid'                 => 'T000032',
    ':payload'                  => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpwcHQ9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIiB4bWxuczpwcHRoZWFkPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIiB4bWxuczp0bnM9Imh0dHA6Ly9Ob2RvUGFnYW1lbnRpU1BDLnNwY29vcC5nb3YuaXQvc2Vydml6aS9QYWdhbWVudGlUZWxlbWF0aWNpUlBUIiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBwdDpub2RvSW52aWFDYXJyZWxsb1JQVFJpc3Bvc3RhPgoJCQk8ZXNpdG9Db21wbGVzc2l2b09wZXJhemlvbmU+T0s8L2VzaXRvQ29tcGxlc3Npdm9PcGVyYXppb25lPgoJCQk8dXJsPmh0dHBzOi8vd2lzcDIucGFnb3BhLmdvdi5pdC93YWxsZXQvd2VsY29tZT9pZFNlc3Npb249NjA2N2FiMGItMGIxNi00NDVhLThlN2MtZGVkZGQ3Y2IxYzZiPC91cmw+CgkJPC9wcHQ6bm9kb0ludmlhQ2FycmVsbG9SUFRSaXNwb3N0YT4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+',
];

Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);
Capsule::statement($render_query, $data_resp_2);














$data_req = [
    ':id'                       => 33,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 10:45:00.197',
    ':tipoevento'               => 'nodoInviaCarrelloRPT',
    ':sottotipoevento'          => 'REQ',
    ':iddominio'                => '',
    ':iuv'                      => '',
    ':ccp'                      => '',
    ':noticenumber'             => '',
    ':creditorreferenceid'      => '',
    ':paymenttoken'             => '',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000010',
    ':sessionidoriginal'        => 'session_id_original_000014',
    ':uniqueid'                 => 'T000033',
    ':payload'                  => 'PFNPQVAtRU5WOkVudmVsb3BlIHhtbG5zOlNPQVAtRU5WPSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyIgeG1sbnM6cHB0PSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOndzPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyI+Cgk8U09BUC1FTlY6SGVhZGVyPgoJCTxwcHQ6aW50ZXN0YXppb25lQ2FycmVsbG9QUFQ+CgkJCTxpZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QQT43Nzc3Nzc3Nzc3NzwvaWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUEE+CgkJCTxpZGVudGlmaWNhdGl2b1N0YXppb25lSW50ZXJtZWRpYXJpb1BBPjc3Nzc3Nzc3Nzc3XzAxPC9pZGVudGlmaWNhdGl2b1N0YXppb25lSW50ZXJtZWRpYXJpb1BBPgoJCQk8aWRlbnRpZmljYXRpdm9DYXJyZWxsbz5jMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxNjwvaWRlbnRpZmljYXRpdm9DYXJyZWxsbz4KCQk8L3BwdDppbnRlc3RhemlvbmVDYXJyZWxsb1BQVD4KCTwvU09BUC1FTlY6SGVhZGVyPgoJPFNPQVAtRU5WOkJvZHk+CgkJPG5zMzpub2RvSW52aWFDYXJyZWxsb1JQVCB4bWxuczpuczM9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIj4KCQkJPHBhc3N3b3JkPlBMQUNFSE9MREVSPC9wYXNzd29yZD4KCQkJPGlkZW50aWZpY2F0aXZvUFNQPkFHSURfMDE8L2lkZW50aWZpY2F0aXZvUFNQPgoJCQk8aWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUFNQPjg4ODg4ODg4ODg4PC9pZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QU1A+CgkJCTxpZGVudGlmaWNhdGl2b0NhbmFsZT44ODg4ODg4ODg4OF8wMTwvaWRlbnRpZmljYXRpdm9DYW5hbGU+CgkJCTxsaXN0YVJQVD4KCQkJCTxlbGVtZW50b0xpc3RhUlBUPgoJCQkJCTxpZGVudGlmaWNhdGl2b0RvbWluaW8+Nzc3Nzc3Nzc3Nzc8L2lkZW50aWZpY2F0aXZvRG9taW5pbz4KCQkJCQk8aWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4wMTAwMDAwMDAwMDAwMDAyNjwvaWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4KCQkJCQk8Y29kaWNlQ29udGVzdG9QYWdhbWVudG8+dDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMjY8L2NvZGljZUNvbnRlc3RvUGFnYW1lbnRvPgoJCQkJCTxycHQ+UEZKUVZDQjRiV3h1Y3owaWFIUjBjRG92TDNkM2R5NWthV2RwZEhCaExtZHZkaTVwZEM5elkyaGxiV0Z6THpJd01URXZVR0ZuWVcxbGJuUnBMeUkrQ2drOGRtVnljMmx2Ym1WUFoyZGxkSFJ2UGpFdU1Ed3ZkbVZ5YzJsdmJtVlBaMmRsZEhSdlBnb0pQR1J2YldsdWFXOCtDZ2tKUEdsa1pXNTBhV1pwWTJGMGFYWnZSRzl0YVc1cGJ6NDNOemMzTnpjM056YzNOend2YVdSbGJuUnBabWxqWVhScGRtOUViMjFwYm1sdlBnb0pQQzlrYjIxcGJtbHZQZ29KUEdsa1pXNTBhV1pwWTJGMGFYWnZUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQakl3TWpNeE1qRTFNREV3TVRVek9XRmlZbUV6TXpVdFlXSTBaUzAwWkRFNExXRXpQQzlwWkdWdWRHbG1hV05oZEdsMmIwMWxjM05oWjJkcGIxSnBZMmhwWlhOMFlUNEtDVHhrWVhSaFQzSmhUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQakl3TWpNdE1USXRNVFZVTVRNNk1ERTZOVE11TmpFNUt6QXhPakF3UEM5a1lYUmhUM0poVFdWemMyRm5aMmx2VW1samFHbGxjM1JoUGdvSlBHRjFkR1Z1ZEdsallYcHBiMjVsVTI5bloyVjBkRzgrVGk5QlBDOWhkWFJsYm5ScFkyRjZhVzl1WlZOdloyZGxkSFJ2UGdvSlBITnZaMmRsZEhSdlZtVnljMkZ1ZEdVK0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFabGNuTmhiblJsUGdvSkNRazhkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NUhQQzkwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1FrOFkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBqYzNOemMzTnpjM056YzNQQzlqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSlBDOXBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlXWlhKellXNTBaVDRLQ1FrOFlXNWhaM0poWm1sallWWmxjbk5oYm5SbFBuaDRlSGg0ZUhoNGVEd3ZZVzVoWjNKaFptbGpZVlpsY25OaGJuUmxQZ29KUEM5emIyZG5aWFIwYjFabGNuTmhiblJsUGdvSlBITnZaMmRsZEhSdlVHRm5ZWFJ2Y21VK0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFCaFoyRjBiM0psUGdvSkNRazhkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NUhQQzkwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1FrOFkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBqYzNOemMzTnpjM056YzNQQzlqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSlBDOXBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlRWVdkaGRHOXlaVDRLQ1FrOFlXNWhaM0poWm1sallWQmhaMkYwYjNKbFBuaDRlSGg0ZUhoNGVEd3ZZVzVoWjNKaFptbGpZVkJoWjJGMGIzSmxQZ29KUEM5emIyZG5aWFIwYjFCaFoyRjBiM0psUGdvSlBHVnVkR1ZDWlc1bFptbGphV0Z5YVc4K0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjBKbGJtVm1hV05wWVhKcGJ6NEtDUWtKUEhScGNHOUpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrUnp3dmRHbHdiMGxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno0S0NRa0pQR052WkdsalpVbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejQzTnpjM056YzNOemMzTnp3dlkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBnb0pDVHd2YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlFtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4a1pXNXZiV2x1WVhwcGIyNWxRbVZ1WldacFkybGhjbWx2UG5oNGVIaDRlSGc4TDJSbGJtOXRhVzVoZW1sdmJtVkNaVzVsWm1samFXRnlhVzgrQ2drSlBHTnZaR2xqWlZWdWFYUlBjR1Z5UW1WdVpXWnBZMmxoY21sdlBuaDRQQzlqYjJScFkyVlZibWwwVDNCbGNrSmxibVZtYVdOcFlYSnBiejRLQ1FrOFpHVnViMjFWYm1sMFQzQmxja0psYm1WbWFXTnBZWEpwYno1NGVIaDRlSGc4TDJSbGJtOXRWVzVwZEU5d1pYSkNaVzVsWm1samFXRnlhVzgrQ2drSlBHbHVaR2x5YVhwNmIwSmxibVZtYVdOcFlYSnBiejU0ZUhoNFBDOXBibVJwY21sNmVtOUNaVzVsWm1samFXRnlhVzgrQ2drSlBHTnBkbWxqYjBKbGJtVm1hV05wWVhKcGJ6NTRlSGc4TDJOcGRtbGpiMEpsYm1WbWFXTnBZWEpwYno0S0NRazhZMkZ3UW1WdVpXWnBZMmxoY21sdlBuaDRlSGg0UEM5allYQkNaVzVsWm1samFXRnlhVzgrQ2drSlBHeHZZMkZzYVhSaFFtVnVaV1pwWTJsaGNtbHZQbmg0ZUhnOEwyeHZZMkZzYVhSaFFtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4d2NtOTJhVzVqYVdGQ1pXNWxabWxqYVdGeWFXOCtlSGc4TDNCeWIzWnBibU5wWVVKbGJtVm1hV05wWVhKcGJ6NEtDUWs4Ym1GNmFXOXVaVUpsYm1WbWFXTnBZWEpwYno1NGVEd3ZibUY2YVc5dVpVSmxibVZtYVdOcFlYSnBiejRLQ1R3dlpXNTBaVUpsYm1WbWFXTnBZWEpwYno0S0NUeGtZWFJwVm1WeWMyRnRaVzUwYno0S0NRazhaR0YwWVVWelpXTjFlbWx2Ym1WUVlXZGhiV1Z1ZEc4K01qQXlNeTB4TWkweE5Tc3dNVG93TUR3dlpHRjBZVVZ6WldOMWVtbHZibVZRWVdkaGJXVnVkRzgrQ2drSlBHbHRjRzl5ZEc5VWIzUmhiR1ZFWVZabGNuTmhjbVUrTWpJd0xqQXdQQzlwYlhCdmNuUnZWRzkwWVd4bFJHRldaWEp6WVhKbFBnb0pDVHgwYVhCdlZtVnljMkZ0Wlc1MGJ6NUNRbFE4TDNScGNHOVdaWEp6WVcxbGJuUnZQZ29KQ1R4cFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOVdaWEp6WVcxbGJuUnZQakF4TURBd01EQXdNREF3TURBd01ESTJQQzlwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5V1pYSnpZVzFsYm5SdlBnb0pDVHhqYjJScFkyVkRiMjUwWlhOMGIxQmhaMkZ0Wlc1MGJ6NTBNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREF5Tmp3dlkyOWthV05sUTI5dWRHVnpkRzlRWVdkaGJXVnVkRzgrQ2drSlBHWnBjbTFoVW1salpYWjFkR0UrTUR3dlptbHliV0ZTYVdObGRuVjBZVDRLQ1FrOFpHRjBhVk5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KQ1FrOGFXMXdiM0owYjFOcGJtZHZiRzlXWlhKellXMWxiblJ2UGpFNE1DNHdNRHd2YVcxd2IzSjBiMU5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KQ1FrOGFXSmhia0ZqWTNKbFpHbDBiejVKVkRFNFZUQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNVEE4TDJsaVlXNUJZMk55WldScGRHOCtDZ2tKQ1R4allYVnpZV3hsVm1WeWMyRnRaVzUwYno1NGVIaDRlSGg0UEM5allYVnpZV3hsVm1WeWMyRnRaVzUwYno0S0NRa0pQR1JoZEdsVGNHVmphV1pwWTJsU2FYTmpiM056YVc5dVpUNTRlSGg0ZUhoNFBDOWtZWFJwVTNCbFkybG1hV05wVW1selkyOXpjMmx2Ym1VK0Nna0pQQzlrWVhScFUybHVaMjlzYjFabGNuTmhiV1Z1ZEc4K0Nna0pQR1JoZEdsVGFXNW5iMnh2Vm1WeWMyRnRaVzUwYno0S0NRa0pQR2x0Y0c5eWRHOVRhVzVuYjJ4dlZtVnljMkZ0Wlc1MGJ6NDBNQzR3TUR3dmFXMXdiM0owYjFOcGJtZHZiRzlXWlhKellXMWxiblJ2UGdvSkNRazhhV0poYmtGalkzSmxaR2wwYno1SlZERTRWVEF3TURBd01EQXdNREF3TURBd01EQXdNREF3TVRFOEwybGlZVzVCWTJOeVpXUnBkRzgrQ2drSkNUeGpZWFZ6WVd4bFZtVnljMkZ0Wlc1MGJ6NTRlSGg0ZUhoNFBDOWpZWFZ6WVd4bFZtVnljMkZ0Wlc1MGJ6NEtDUWtKUEdSaGRHbFRjR1ZqYVdacFkybFNhWE5qYjNOemFXOXVaVDU0ZUhoNGVIaDRQQzlrWVhScFUzQmxZMmxtYVdOcFVtbHpZMjl6YzJsdmJtVStDZ2tKUEM5a1lYUnBVMmx1WjI5c2IxWmxjbk5oYldWdWRHOCtDZ2s4TDJSaGRHbFdaWEp6WVcxbGJuUnZQZ284TDFKUVZEND08L3JwdD4KCQkJCTwvZWxlbWVudG9MaXN0YVJQVD4KCQkJPC9saXN0YVJQVD4KCQkJPG11bHRpQmVuZWZpY2lhcmlvPmZhbHNlPC9tdWx0aUJlbmVmaWNpYXJpbz4KCQk8L25zMzpub2RvSW52aWFDYXJyZWxsb1JQVD4KCTwvU09BUC1FTlY6Qm9keT4KPC9TT0FQLUVOVjpFbnZlbG9wZT4=',
];

$data_resp = [
    ':id'                       => 34,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 10:46:00.197',
    ':tipoevento'               => 'nodoInviaCarrelloRPT',
    ':sottotipoevento'          => 'RESP',
    ':iddominio'                => '',
    ':iuv'                      => '',
    ':ccp'                      => '',
    ':noticenumber'             => '',
    ':creditorreferenceid'      => '',
    ':paymenttoken'             => '',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000010',
    ':sessionidoriginal'        => 'session_id_original_000014',
    ':uniqueid'                 => 'T000034',
    ':payload'                  => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpwcHQ9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIiB4bWxuczpwcHRoZWFkPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIiB4bWxuczp0bnM9Imh0dHA6Ly9Ob2RvUGFnYW1lbnRpU1BDLnNwY29vcC5nb3YuaXQvc2Vydml6aS9QYWdhbWVudGlUZWxlbWF0aWNpUlBUIiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBwdDpub2RvSW52aWFDYXJyZWxsb1JQVFJpc3Bvc3RhPgoJCQk8ZXNpdG9Db21wbGVzc2l2b09wZXJhemlvbmU+S088L2VzaXRvQ29tcGxlc3Npdm9PcGVyYXppb25lPgoJCQk8bGlzdGFFcnJvcmlSUFQ+CgkJCQk8ZmF1bHQ+CgkJCQkJPGZhdWx0Q29kZT5QUFRfSUJBTl9OT05fQ0VOU0lUTzwvZmF1bHRDb2RlPgoJCQkJCTxmYXVsdFN0cmluZz5JbCBjb2RpY2UgSUJBTiBpbmRpY2F0byBkYWwgRUMgbm9uIMOoIHByZXNlbnRlIG5lbGxhIGxpc3RhIGRlZ2xpIElCQU4gY29tdW5pY2F0aSBhbCBzaXN0ZW1hIHBhZ29QQS48L2ZhdWx0U3RyaW5nPgoJCQkJCTxpZD5Ob2RvRGVpUGFnYW1lbnRpU1BDPC9pZD4KCQkJCQk8ZGVzY3JpcHRpb24+SSB2YWxvcmkgZGkgSUJBTiBpbmRpY2F0aSBuZWkgdmVyc2FtZW50aSBbSVQ5N0kwMTAzMDMyNDIwMDAwMDYxMzAyMzMxXSBub24gZmFubm8gcGFydGUgZGVnbGkgSUJBTiB2YWxpZGkgcGVyIGxhIFBBPC9kZXNjcmlwdGlvbj4KCQkJCQk8c2VyaWFsPjE8L3NlcmlhbD4KCQkJCTwvZmF1bHQ+CgkJCTwvbGlzdGFFcnJvcmlSUFQ+CgkJPC9wcHQ6bm9kb0ludmlhQ2FycmVsbG9SUFRSaXNwb3N0YT4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+',
];


Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);







$data_req = [
    ':id'                       => 35,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 10:47:00.197',
    ':tipoevento'               => 'nodoInviaCarrelloRPT',
    ':sottotipoevento'          => 'REQ',
    ':iddominio'                => '',
    ':iuv'                      => '',
    ':ccp'                      => '',
    ':noticenumber'             => '',
    ':creditorreferenceid'      => '',
    ':paymenttoken'             => '',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000010',
    ':sessionidoriginal'        => 'session_id_original_000015',
    ':uniqueid'                 => 'T000035',
    ':payload'                  => 'PFNPQVAtRU5WOkVudmVsb3BlIHhtbG5zOlNPQVAtRU5WPSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyIgeG1sbnM6cHB0PSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOndzPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyI+Cgk8U09BUC1FTlY6SGVhZGVyPgoJCTxwcHQ6aW50ZXN0YXppb25lQ2FycmVsbG9QUFQ+CgkJCTxpZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QQT43Nzc3Nzc3Nzc3NzwvaWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUEE+CgkJCTxpZGVudGlmaWNhdGl2b1N0YXppb25lSW50ZXJtZWRpYXJpb1BBPjc3Nzc3Nzc3Nzc3XzAxPC9pZGVudGlmaWNhdGl2b1N0YXppb25lSW50ZXJtZWRpYXJpb1BBPgoJCQk8aWRlbnRpZmljYXRpdm9DYXJyZWxsbz5jMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxNzwvaWRlbnRpZmljYXRpdm9DYXJyZWxsbz4KCQk8L3BwdDppbnRlc3RhemlvbmVDYXJyZWxsb1BQVD4KCTwvU09BUC1FTlY6SGVhZGVyPgoJPFNPQVAtRU5WOkJvZHk+CgkJPG5zMzpub2RvSW52aWFDYXJyZWxsb1JQVCB4bWxuczpuczM9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIj4KCQkJPHBhc3N3b3JkPlBMQUNFSE9MREVSPC9wYXNzd29yZD4KCQkJPGlkZW50aWZpY2F0aXZvUFNQPkFHSURfMDE8L2lkZW50aWZpY2F0aXZvUFNQPgoJCQk8aWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUFNQPjg4ODg4ODg4ODg4PC9pZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QU1A+CgkJCTxpZGVudGlmaWNhdGl2b0NhbmFsZT44ODg4ODg4ODg4OF8wMTwvaWRlbnRpZmljYXRpdm9DYW5hbGU+CgkJCTxsaXN0YVJQVD4KCQkJCTxlbGVtZW50b0xpc3RhUlBUPgoJCQkJCTxpZGVudGlmaWNhdGl2b0RvbWluaW8+Nzc3Nzc3Nzc3Nzc8L2lkZW50aWZpY2F0aXZvRG9taW5pbz4KCQkJCQk8aWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4wMTAwMDAwMDAwMDAwMDAyNzwvaWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4KCQkJCQk8Y29kaWNlQ29udGVzdG9QYWdhbWVudG8+dDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMjc8L2NvZGljZUNvbnRlc3RvUGFnYW1lbnRvPgoJCQkJCTxycHQ+UEZKUVZDQjRiV3h1Y3owaWFIUjBjRG92TDNkM2R5NWthV2RwZEhCaExtZHZkaTVwZEM5elkyaGxiV0Z6THpJd01URXZVR0ZuWVcxbGJuUnBMeUkrQ2drOGRtVnljMmx2Ym1WUFoyZGxkSFJ2UGpFdU1Ed3ZkbVZ5YzJsdmJtVlBaMmRsZEhSdlBnb0pQR1J2YldsdWFXOCtDZ2tKUEdsa1pXNTBhV1pwWTJGMGFYWnZSRzl0YVc1cGJ6NDNOemMzTnpjM056YzNOend2YVdSbGJuUnBabWxqWVhScGRtOUViMjFwYm1sdlBnb0pQQzlrYjIxcGJtbHZQZ29KUEdsa1pXNTBhV1pwWTJGMGFYWnZUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQakl3TWpNeE1qRTFNREV3TVRVek9XRmlZbUV6TXpVdFlXSTBaUzAwWkRFNExXRXpQQzlwWkdWdWRHbG1hV05oZEdsMmIwMWxjM05oWjJkcGIxSnBZMmhwWlhOMFlUNEtDVHhrWVhSaFQzSmhUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQakl3TWpNdE1USXRNVFZVTVRNNk1ERTZOVE11TmpFNUt6QXhPakF3UEM5a1lYUmhUM0poVFdWemMyRm5aMmx2VW1samFHbGxjM1JoUGdvSlBHRjFkR1Z1ZEdsallYcHBiMjVsVTI5bloyVjBkRzgrVGk5QlBDOWhkWFJsYm5ScFkyRjZhVzl1WlZOdloyZGxkSFJ2UGdvSlBITnZaMmRsZEhSdlZtVnljMkZ1ZEdVK0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFabGNuTmhiblJsUGdvSkNRazhkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NUhQQzkwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1FrOFkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBqYzNOemMzTnpjM056YzNQQzlqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSlBDOXBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlXWlhKellXNTBaVDRLQ1FrOFlXNWhaM0poWm1sallWWmxjbk5oYm5SbFBuaDRlSGg0ZUhoNGVEd3ZZVzVoWjNKaFptbGpZVlpsY25OaGJuUmxQZ29KUEM5emIyZG5aWFIwYjFabGNuTmhiblJsUGdvSlBITnZaMmRsZEhSdlVHRm5ZWFJ2Y21VK0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFCaFoyRjBiM0psUGdvSkNRazhkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NUhQQzkwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1FrOFkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBqYzNOemMzTnpjM056YzNQQzlqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSlBDOXBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlRWVdkaGRHOXlaVDRLQ1FrOFlXNWhaM0poWm1sallWQmhaMkYwYjNKbFBuaDRlSGg0ZUhoNGVEd3ZZVzVoWjNKaFptbGpZVkJoWjJGMGIzSmxQZ29KUEM5emIyZG5aWFIwYjFCaFoyRjBiM0psUGdvSlBHVnVkR1ZDWlc1bFptbGphV0Z5YVc4K0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjBKbGJtVm1hV05wWVhKcGJ6NEtDUWtKUEhScGNHOUpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrUnp3dmRHbHdiMGxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno0S0NRa0pQR052WkdsalpVbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejQzTnpjM056YzNOemMzTnp3dlkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBnb0pDVHd2YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlFtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4a1pXNXZiV2x1WVhwcGIyNWxRbVZ1WldacFkybGhjbWx2UG5oNGVIaDRlSGc4TDJSbGJtOXRhVzVoZW1sdmJtVkNaVzVsWm1samFXRnlhVzgrQ2drSlBHTnZaR2xqWlZWdWFYUlBjR1Z5UW1WdVpXWnBZMmxoY21sdlBuaDRQQzlqYjJScFkyVlZibWwwVDNCbGNrSmxibVZtYVdOcFlYSnBiejRLQ1FrOFpHVnViMjFWYm1sMFQzQmxja0psYm1WbWFXTnBZWEpwYno1NGVIaDRlSGc4TDJSbGJtOXRWVzVwZEU5d1pYSkNaVzVsWm1samFXRnlhVzgrQ2drSlBHbHVaR2x5YVhwNmIwSmxibVZtYVdOcFlYSnBiejU0ZUhoNFBDOXBibVJwY21sNmVtOUNaVzVsWm1samFXRnlhVzgrQ2drSlBHTnBkbWxqYjBKbGJtVm1hV05wWVhKcGJ6NTRlSGc4TDJOcGRtbGpiMEpsYm1WbWFXTnBZWEpwYno0S0NRazhZMkZ3UW1WdVpXWnBZMmxoY21sdlBuaDRlSGg0UEM5allYQkNaVzVsWm1samFXRnlhVzgrQ2drSlBHeHZZMkZzYVhSaFFtVnVaV1pwWTJsaGNtbHZQbmg0ZUhnOEwyeHZZMkZzYVhSaFFtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4d2NtOTJhVzVqYVdGQ1pXNWxabWxqYVdGeWFXOCtlSGc4TDNCeWIzWnBibU5wWVVKbGJtVm1hV05wWVhKcGJ6NEtDUWs4Ym1GNmFXOXVaVUpsYm1WbWFXTnBZWEpwYno1NGVEd3ZibUY2YVc5dVpVSmxibVZtYVdOcFlYSnBiejRLQ1R3dlpXNTBaVUpsYm1WbWFXTnBZWEpwYno0S0NUeGtZWFJwVm1WeWMyRnRaVzUwYno0S0NRazhaR0YwWVVWelpXTjFlbWx2Ym1WUVlXZGhiV1Z1ZEc4K01qQXlNeTB4TWkweE5Tc3dNVG93TUR3dlpHRjBZVVZ6WldOMWVtbHZibVZRWVdkaGJXVnVkRzgrQ2drSlBHbHRjRzl5ZEc5VWIzUmhiR1ZFWVZabGNuTmhjbVUrTWpJd0xqQXdQQzlwYlhCdmNuUnZWRzkwWVd4bFJHRldaWEp6WVhKbFBnb0pDVHgwYVhCdlZtVnljMkZ0Wlc1MGJ6NUNRbFE4TDNScGNHOVdaWEp6WVcxbGJuUnZQZ29KQ1R4cFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOVdaWEp6WVcxbGJuUnZQakF4TURBd01EQXdNREF3TURBd01ESTNQQzlwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5V1pYSnpZVzFsYm5SdlBnb0pDVHhqYjJScFkyVkRiMjUwWlhOMGIxQmhaMkZ0Wlc1MGJ6NTBNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREF5Tnp3dlkyOWthV05sUTI5dWRHVnpkRzlRWVdkaGJXVnVkRzgrQ2drSlBHWnBjbTFoVW1salpYWjFkR0UrTUR3dlptbHliV0ZTYVdObGRuVjBZVDRLQ1FrOFpHRjBhVk5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KQ1FrOGFXMXdiM0owYjFOcGJtZHZiRzlXWlhKellXMWxiblJ2UGpFNE1DNHdNRHd2YVcxd2IzSjBiMU5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KQ1FrOGFXSmhia0ZqWTNKbFpHbDBiejVKVkRFNFZUQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNVEE4TDJsaVlXNUJZMk55WldScGRHOCtDZ2tKQ1R4allYVnpZV3hsVm1WeWMyRnRaVzUwYno1NGVIaDRlSGg0UEM5allYVnpZV3hsVm1WeWMyRnRaVzUwYno0S0NRa0pQR1JoZEdsVGNHVmphV1pwWTJsU2FYTmpiM056YVc5dVpUNTRlSGg0ZUhoNFBDOWtZWFJwVTNCbFkybG1hV05wVW1selkyOXpjMmx2Ym1VK0Nna0pQQzlrWVhScFUybHVaMjlzYjFabGNuTmhiV1Z1ZEc4K0Nna0pQR1JoZEdsVGFXNW5iMnh2Vm1WeWMyRnRaVzUwYno0S0NRa0pQR2x0Y0c5eWRHOVRhVzVuYjJ4dlZtVnljMkZ0Wlc1MGJ6NDBNQzR3TUR3dmFXMXdiM0owYjFOcGJtZHZiRzlXWlhKellXMWxiblJ2UGdvSkNRazhhV0poYmtGalkzSmxaR2wwYno1SlZERTRWVEF3TURBd01EQXdNREF3TURBd01EQXdNREF3TVRFOEwybGlZVzVCWTJOeVpXUnBkRzgrQ2drSkNUeGpZWFZ6WVd4bFZtVnljMkZ0Wlc1MGJ6NTRlSGg0ZUhoNFBDOWpZWFZ6WVd4bFZtVnljMkZ0Wlc1MGJ6NEtDUWtKUEdSaGRHbFRjR1ZqYVdacFkybFNhWE5qYjNOemFXOXVaVDU0ZUhoNGVIaDRQQzlrWVhScFUzQmxZMmxtYVdOcFVtbHpZMjl6YzJsdmJtVStDZ2tKUEM5a1lYUnBVMmx1WjI5c2IxWmxjbk5oYldWdWRHOCtDZ2s4TDJSaGRHbFdaWEp6WVcxbGJuUnZQZ284TDFKUVZEND08L3JwdD4KCQkJCTwvZWxlbWVudG9MaXN0YVJQVD4KCQkJPC9saXN0YVJQVD4KCQkJPG11bHRpQmVuZWZpY2lhcmlvPmZhbHNlPC9tdWx0aUJlbmVmaWNpYXJpbz4KCQk8L25zMzpub2RvSW52aWFDYXJyZWxsb1JQVD4KCTwvU09BUC1FTlY6Qm9keT4KPC9TT0FQLUVOVjpFbnZlbG9wZT4=',
];

$data_resp = [
    ':id'                       => 36,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 10:48:00.197',
    ':tipoevento'               => 'nodoInviaCarrelloRPT',
    ':sottotipoevento'          => 'RESP',
    ':iddominio'                => '',
    ':iuv'                      => '',
    ':ccp'                      => '',
    ':noticenumber'             => '',
    ':creditorreferenceid'      => '',
    ':paymenttoken'             => '',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000010',
    ':sessionidoriginal'        => 'session_id_original_000016',
    ':uniqueid'                 => 'T000036',
    ':payload'                  => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpwcHQ9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIiB4bWxuczpwcHRoZWFkPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIiB4bWxuczp0bnM9Imh0dHA6Ly9Ob2RvUGFnYW1lbnRpU1BDLnNwY29vcC5nb3YuaXQvc2Vydml6aS9QYWdhbWVudGlUZWxlbWF0aWNpUlBUIiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBwdDpub2RvSW52aWFDYXJyZWxsb1JQVFJpc3Bvc3RhPgoJCQk8ZXNpdG9Db21wbGVzc2l2b09wZXJhemlvbmU+S088L2VzaXRvQ29tcGxlc3Npdm9PcGVyYXppb25lPgoJCQk8bGlzdGFFcnJvcmlSUFQ+CgkJCQk8ZmF1bHQ+CgkJCQkJPGZhdWx0Q29kZT5QUFRfSUJBTl9OT05fQ0VOU0lUTzwvZmF1bHRDb2RlPgoJCQkJCTxmYXVsdFN0cmluZz5JbCBjb2RpY2UgSUJBTiBpbmRpY2F0byBkYWwgRUMgbm9uIMOoIHByZXNlbnRlIG5lbGxhIGxpc3RhIGRlZ2xpIElCQU4gY29tdW5pY2F0aSBhbCBzaXN0ZW1hIHBhZ29QQS48L2ZhdWx0U3RyaW5nPgoJCQkJCTxpZD5Ob2RvRGVpUGFnYW1lbnRpU1BDPC9pZD4KCQkJCQk8ZGVzY3JpcHRpb24+SSB2YWxvcmkgZGkgSUJBTiBpbmRpY2F0aSBuZWkgdmVyc2FtZW50aSBbSVQ5N0kwMTAzMDMyNDIwMDAwMDYxMzAyMzMxXSBub24gZmFubm8gcGFydGUgZGVnbGkgSUJBTiB2YWxpZGkgcGVyIGxhIFBBPC9kZXNjcmlwdGlvbj4KCQkJCQk8c2VyaWFsPjE8L3NlcmlhbD4KCQkJCTwvZmF1bHQ+CgkJCTwvbGlzdGFFcnJvcmlSUFQ+CgkJPC9wcHQ6bm9kb0ludmlhQ2FycmVsbG9SUFRSaXNwb3N0YT4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+',
];


Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);





/* inserimento eventi per sendPaymentOutcome */


// activate+sendPayment OK con 2 transfer

$data_req = [
    ':id'                       => 40,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 12:35:00.197',
    ':tipoevento'               => 'activatePaymentNotice',
    ':sottotipoevento'          => 'REQ',
    ':iddominio'                => '77777777777',
    ':iuv'                      => '01000000000000030',
    ':ccp'                      => 't0000000000000000000000000000030',
    ':noticenumber'             => '301000000000000030',
    ':creditorreferenceid'      => '01000000000000030',
    ':paymenttoken'             => 't0000000000000000000000000000030',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000030',
    ':sessionidoriginal'        => '',
    ':uniqueid'                 => 'T000040',
    ':payload'                  => 'PHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6bm9kPSJodHRwOi8vcGFnb3BhLWFwaS5wYWdvcGEuZ292Lml0L25vZGUvbm9kZUZvclBzcC54c2QiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIj4KCTxzb2FwZW52OkhlYWRlci8+Cgk8c29hcGVudjpCb2R5PgoJCTxub2Q6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVxPgoJCQk8aWRQU1A+UFNQXzAxPC9pZFBTUD4KCQkJPGlkQnJva2VyUFNQPjg4ODg4ODg4ODg4PC9pZEJyb2tlclBTUD4KCQkJPGlkQ2hhbm5lbD44ODg4ODg4ODg4OF8wMTwvaWRDaGFubmVsPgoJCQk8cGFzc3dvcmQ+KioqKio8L3Bhc3N3b3JkPgoJCQk8cXJDb2RlPgoJCQkJPGZpc2NhbENvZGU+Nzc3Nzc3Nzc3Nzc8L2Zpc2NhbENvZGU+CgkJCQk8bm90aWNlTnVtYmVyPjMwMTAwMDAwMDAwMDAwMDAzMDwvbm90aWNlTnVtYmVyPgoJCQk8L3FyQ29kZT4KCQkJPGFtb3VudD4wLjAwPC9hbW91bnQ+CgkJPC9ub2Q6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVxPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4=',
];
$data_resp = [
    ':id'                       => 41,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 12:36:00.197',
    ':tipoevento'               => 'activatePaymentNotice',
    ':sottotipoevento'          => 'RESP',
    ':iddominio'                => '77777777777',
    ':iuv'                      => '01000000000000030',
    ':ccp'                      => 't0000000000000000000000000000030',
    ':noticenumber'             => '301000000000000030',
    ':creditorreferenceid'      => '01000000000000030',
    ':paymenttoken'             => 't0000000000000000000000000000030',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000030',
    ':sessionidoriginal'        => '',
    ':uniqueid'                 => 'T000041',
    ':payload'                  => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVzPgoJCQk8b3V0Y29tZT5PSzwvb3V0Y29tZT4KCQkJPHRvdGFsQW1vdW50PjE4MC4wMDwvdG90YWxBbW91bnQ+CgkJCTxwYXltZW50RGVzY3JpcHRpb24+eHh4eHh4eDwvcGF5bWVudERlc2NyaXB0aW9uPgoJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCTxjb21wYW55TmFtZT54eHh4eHh4PC9jb21wYW55TmFtZT4KCQkJPHBheW1lbnRUb2tlbj50MDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAzMDwvcGF5bWVudFRva2VuPgoJCQk8dHJhbnNmZXJMaXN0PgoJCQkJPHRyYW5zZmVyPgoJCQkJCTxpZFRyYW5zZmVyPjE8L2lkVHJhbnNmZXI+CgkJCQkJPHRyYW5zZmVyQW1vdW50PjEyMC4wMDwvdHJhbnNmZXJBbW91bnQ+CgkJCQkJPGZpc2NhbENvZGVQQT43Nzc3Nzc3Nzc3NzwvZmlzY2FsQ29kZVBBPgoJCQkJCTxJQkFOPklUMThVMDAwMDAwMDAwMDAwMDAwMDAwMDAwMTwvSUJBTj4KCQkJCQk8cmVtaXR0YW5jZUluZm9ybWF0aW9uPnh4eHg8L3JlbWl0dGFuY2VJbmZvcm1hdGlvbj4KCQkJCTwvdHJhbnNmZXI+CgkJCQk8dHJhbnNmZXI+CgkJCQkJPGlkVHJhbnNmZXI+MjwvaWRUcmFuc2Zlcj4KCQkJCQk8dHJhbnNmZXJBbW91bnQ+NjAuMDA8L3RyYW5zZmVyQW1vdW50PgoJCQkJCTxmaXNjYWxDb2RlUEE+Nzc3Nzc3Nzc3Nzc8L2Zpc2NhbENvZGVQQT4KCQkJCQk8SUJBTj5JVDE4VTAwMDAwMDAwMDAwMDAwMDAwMDAwMDI8L0lCQU4+CgkJCQkJPHJlbWl0dGFuY2VJbmZvcm1hdGlvbj54eHh4PC9yZW1pdHRhbmNlSW5mb3JtYXRpb24+CgkJCQk8L3RyYW5zZmVyPgoJCQk8L3RyYW5zZmVyTGlzdD4KCQkJPGNyZWRpdG9yUmVmZXJlbmNlSWQ+MDEwMDAwMDAwMDAwMDAwMzA8L2NyZWRpdG9yUmVmZXJlbmNlSWQ+CgkJPC9uZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVzPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4=',
];
Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);
$data_req = [
    ':id'                       => 42,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 12:37:00.197',
    ':tipoevento'               => 'sendPaymentOutcome',
    ':sottotipoevento'          => 'REQ',
    ':iddominio'                => '77777777777',
    ':iuv'                      => '01000000000000030',
    ':ccp'                      => 't0000000000000000000000000000030',
    ':noticenumber'             => '301000000000000030',
    ':creditorreferenceid'      => '01000000000000030',
    ':paymenttoken'             => 't0000000000000000000000000000030',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000031',
    ':sessionidoriginal'        => '',
    ':uniqueid'                 => 'T000042',
    ':payload'                  => 'PHNvYXA6RW52ZWxvcGUgeG1sbnM6c29hcD0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPgoJPHNvYXA6Qm9keT4KCQk8bnMyOnNlbmRQYXltZW50T3V0Y29tZVJlcSB4bWxuczpuczI9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6bnMzPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyI+CgkJCTxpZFBTUD5BR0lEXzAxPC9pZFBTUD4KCQkJPGlkQnJva2VyUFNQPjg4ODg4ODg4ODg4PC9pZEJyb2tlclBTUD4KCQkJPGlkQ2hhbm5lbD44ODg4ODg4ODg4OF8wMTwvaWRDaGFubmVsPgoJCQk8cGFzc3dvcmQ+eHh4eHh4eHg8L3Bhc3N3b3JkPgoJCQk8cGF5bWVudFRva2VuPnQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDMwPC9wYXltZW50VG9rZW4+CgkJCTxvdXRjb21lPk9LPC9vdXRjb21lPgoJCQk8ZGV0YWlscz4KCQkJCTxwYXltZW50TWV0aG9kPm90aGVyPC9wYXltZW50TWV0aG9kPgoJCQkJPGZlZT4xLjAwPC9mZWU+CgkJCQk8YXBwbGljYXRpb25EYXRlPjIwMjQtMDQtMDI8L2FwcGxpY2F0aW9uRGF0ZT4KCQkJCTx0cmFuc2ZlckRhdGU+MjAyNC0wNC0wMzwvdHJhbnNmZXJEYXRlPgoJCQk8L2RldGFpbHM+CgkJPC9uczI6c2VuZFBheW1lbnRPdXRjb21lUmVxPgoJPC9zb2FwOkJvZHk+Cjwvc29hcDpFbnZlbG9wZT4=',
];
$data_resp = [
    ':id'                       => 43,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 12:38:00.197',
    ':tipoevento'               => 'sendPaymentOutcome',
    ':sottotipoevento'          => 'RESP',
    ':iddominio'                => '77777777777',
    ':iuv'                      => '01000000000000030',
    ':ccp'                      => 't0000000000000000000000000000030',
    ':noticenumber'             => '301000000000000030',
    ':creditorreferenceid'      => '01000000000000030',
    ':paymenttoken'             => 't0000000000000000000000000000030',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000031',
    ':sessionidoriginal'        => '',
    ':uniqueid'                 => 'T000043',
    ':payload'                  => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pjxzb2FwZW52OkVudmVsb3BlIHhtbG5zOnhzaT0iaHR0cDovL3d3dy53My5vcmcvMjAwMS9YTUxTY2hlbWEtaW5zdGFuY2UiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIiB4bWxuczp4cz0iaHR0cDovL3d3dy53My5vcmcvMjAwMS9YTUxTY2hlbWEiIHhtbG5zOmNvbW1vbj0iaHR0cDovL3BhZ29wYS1hcGkucGFnb3BhLmdvdi5pdC94c2QvY29tbW9uLXR5cGVzL3YxLjAuMC8iIHhtbG5zOm5mcD0iaHR0cDovL3BhZ29wYS1hcGkucGFnb3BhLmdvdi5pdC9ub2RlL25vZGVGb3JQc3AueHNkIj48c29hcGVudjpCb2R5PjxuZnA6c2VuZFBheW1lbnRPdXRjb21lUmVzPjxvdXRjb21lPk9LPC9vdXRjb21lPjwvbmZwOnNlbmRQYXltZW50T3V0Y29tZVJlcz48L3NvYXBlbnY6Qm9keT48L3NvYXBlbnY6RW52ZWxvcGU+',
];
Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);



$data_req = [
    ':id'                       => 44,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 12:30:00.197',
    ':tipoevento'               => 'activatePaymentNotice',
    ':sottotipoevento'          => 'REQ',
    ':iddominio'                => '77777777777',
    ':iuv'                      => '01000000000000031',
    ':ccp'                      => 't0000000000000000000000000000031',
    ':noticenumber'             => '301000000000000031',
    ':creditorreferenceid'      => '01000000000000031',
    ':paymenttoken'             => 't0000000000000000000000000000031',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000032',
    ':sessionidoriginal'        => '',
    ':uniqueid'                 => 'T000044',
    ':payload'                  => 'PHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6bm9kPSJodHRwOi8vcGFnb3BhLWFwaS5wYWdvcGEuZ292Lml0L25vZGUvbm9kZUZvclBzcC54c2QiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIj4KCTxzb2FwZW52OkhlYWRlci8+Cgk8c29hcGVudjpCb2R5PgoJCTxub2Q6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVxPgoJCQk8aWRQU1A+UFNQXzAxPC9pZFBTUD4KCQkJPGlkQnJva2VyUFNQPjg4ODg4ODg4ODg4PC9pZEJyb2tlclBTUD4KCQkJPGlkQ2hhbm5lbD44ODg4ODg4ODg4OF8wMTwvaWRDaGFubmVsPgoJCQk8cGFzc3dvcmQ+KioqKio8L3Bhc3N3b3JkPgoJCQk8cXJDb2RlPgoJCQkJPGZpc2NhbENvZGU+Nzc3Nzc3Nzc3Nzc8L2Zpc2NhbENvZGU+CgkJCQk8bm90aWNlTnVtYmVyPjMwMTAwMDAwMDAwMDAwMDAzMTwvbm90aWNlTnVtYmVyPgoJCQk8L3FyQ29kZT4KCQkJPGFtb3VudD4wLjAwPC9hbW91bnQ+CgkJPC9ub2Q6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVxPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4=',
];
$data_resp = [
    ':id'                       => 45,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 12:31:00.197',
    ':tipoevento'               => 'activatePaymentNotice',
    ':sottotipoevento'          => 'RESP',
    ':iddominio'                => '77777777777',
    ':iuv'                      => '01000000000000031',
    ':ccp'                      => 't0000000000000000000000000000031',
    ':noticenumber'             => '301000000000000031',
    ':creditorreferenceid'      => '01000000000000031',
    ':paymenttoken'             => 't0000000000000000000000000000031',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000032',
    ':sessionidoriginal'        => '',
    ':uniqueid'                 => 'T000045',
    ':payload'                  => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVzPgoJCQk8b3V0Y29tZT5PSzwvb3V0Y29tZT4KCQkJPHRvdGFsQW1vdW50PjI0NS4wMDwvdG90YWxBbW91bnQ+CgkJCTxwYXltZW50RGVzY3JpcHRpb24+eHh4eHh4eDwvcGF5bWVudERlc2NyaXB0aW9uPgoJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCTxjb21wYW55TmFtZT54eHh4eHh4PC9jb21wYW55TmFtZT4KCQkJPHBheW1lbnRUb2tlbj50MDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAzMTwvcGF5bWVudFRva2VuPgoJCQk8dHJhbnNmZXJMaXN0PgoJCQkJPHRyYW5zZmVyPgoJCQkJCTxpZFRyYW5zZmVyPjE8L2lkVHJhbnNmZXI+CgkJCQkJPHRyYW5zZmVyQW1vdW50PjYwLjAwPC90cmFuc2ZlckFtb3VudD4KCQkJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCQkJPElCQU4+SVQxOFUwMDAwMDAwMDAwMDAwMDAwMDAwMDAxPC9JQkFOPgoJCQkJCTxyZW1pdHRhbmNlSW5mb3JtYXRpb24+eHh4eDwvcmVtaXR0YW5jZUluZm9ybWF0aW9uPgoJCQkJPC90cmFuc2Zlcj4KCQkJCTx0cmFuc2Zlcj4KCQkJCQk8aWRUcmFuc2Zlcj4yPC9pZFRyYW5zZmVyPgoJCQkJCTx0cmFuc2ZlckFtb3VudD44NS4wMDwvdHJhbnNmZXJBbW91bnQ+CgkJCQkJPGZpc2NhbENvZGVQQT43Nzc3Nzc3Nzc3NzwvZmlzY2FsQ29kZVBBPgoJCQkJCTxJQkFOPklUMThVMDAwMDAwMDAwMDAwMDAwMDAwMDAwMjwvSUJBTj4KCQkJCQk8cmVtaXR0YW5jZUluZm9ybWF0aW9uPnh4eHg8L3JlbWl0dGFuY2VJbmZvcm1hdGlvbj4KCQkJCTwvdHJhbnNmZXI+CgkJCQk8dHJhbnNmZXI+CgkJCQkJPGlkVHJhbnNmZXI+MzwvaWRUcmFuc2Zlcj4KCQkJCQk8dHJhbnNmZXJBbW91bnQ+MTAwLjAwPC90cmFuc2ZlckFtb3VudD4KCQkJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCQkJPElCQU4+SVQxOFUwMDAwMDAwMDAwMDAwMDAwMDAwMDAzPC9JQkFOPgoJCQkJCTxyZW1pdHRhbmNlSW5mb3JtYXRpb24+eHh4eDwvcmVtaXR0YW5jZUluZm9ybWF0aW9uPgoJCQkJPC90cmFuc2Zlcj4KCQkJPC90cmFuc2Zlckxpc3Q+CgkJCTxjcmVkaXRvclJlZmVyZW5jZUlkPjAxMDAwMDAwMDAwMDAwMDMxPC9jcmVkaXRvclJlZmVyZW5jZUlkPgoJCTwvbmZwOmFjdGl2YXRlUGF5bWVudE5vdGljZVJlcz4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+',
];
Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);
$data_req = [
    ':id'                       => 46,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 12:32:00.197',
    ':tipoevento'               => 'sendPaymentOutcome',
    ':sottotipoevento'          => 'REQ',
    ':iddominio'                => '77777777777',
    ':iuv'                      => '01000000000000031',
    ':ccp'                      => 't0000000000000000000000000000031',
    ':noticenumber'             => '301000000000000031',
    ':creditorreferenceid'      => '01000000000000031',
    ':paymenttoken'             => 't0000000000000000000000000000031',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000033',
    ':sessionidoriginal'        => '',
    ':uniqueid'                 => 'T000046',
    ':payload'                  => 'PHNvYXA6RW52ZWxvcGUgeG1sbnM6c29hcD0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPgoJPHNvYXA6Qm9keT4KCQk8bnMyOnNlbmRQYXltZW50T3V0Y29tZVJlcSB4bWxuczpuczI9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6bnMzPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyI+CgkJCTxpZFBTUD5BR0lEXzAxPC9pZFBTUD4KCQkJPGlkQnJva2VyUFNQPjg4ODg4ODg4ODg4PC9pZEJyb2tlclBTUD4KCQkJPGlkQ2hhbm5lbD44ODg4ODg4ODg4OF8wMTwvaWRDaGFubmVsPgoJCQk8cGFzc3dvcmQ+eHh4eHh4eHg8L3Bhc3N3b3JkPgoJCQk8cGF5bWVudFRva2VuPnQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDMxPC9wYXltZW50VG9rZW4+CgkJCTxvdXRjb21lPktPPC9vdXRjb21lPgoJCQk8ZGV0YWlscz4KCQkJCTxwYXltZW50TWV0aG9kPm90aGVyPC9wYXltZW50TWV0aG9kPgoJCQkJPGZlZT4xLjAwPC9mZWU+CgkJCQk8YXBwbGljYXRpb25EYXRlPjIwMjQtMDQtMDI8L2FwcGxpY2F0aW9uRGF0ZT4KCQkJCTx0cmFuc2ZlckRhdGU+MjAyNC0wNC0wMzwvdHJhbnNmZXJEYXRlPgoJCQk8L2RldGFpbHM+CgkJPC9uczI6c2VuZFBheW1lbnRPdXRjb21lUmVxPgoJPC9zb2FwOkJvZHk+Cjwvc29hcDpFbnZlbG9wZT4=',
];
$data_resp = [
    ':id'                       => 47,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 12:33:00.197',
    ':tipoevento'               => 'sendPaymentOutcome',
    ':sottotipoevento'          => 'RESP',
    ':iddominio'                => '77777777777',
    ':iuv'                      => '01000000000000031',
    ':ccp'                      => 't0000000000000000000000000000031',
    ':noticenumber'             => '301000000000000031',
    ':creditorreferenceid'      => '01000000000000031',
    ':paymenttoken'             => 't0000000000000000000000000000031',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000033',
    ':sessionidoriginal'        => '',
    ':uniqueid'                 => 'T000047',
    ':payload'                  => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pjxzb2FwZW52OkVudmVsb3BlIHhtbG5zOnhzaT0iaHR0cDovL3d3dy53My5vcmcvMjAwMS9YTUxTY2hlbWEtaW5zdGFuY2UiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIiB4bWxuczp4cz0iaHR0cDovL3d3dy53My5vcmcvMjAwMS9YTUxTY2hlbWEiIHhtbG5zOmNvbW1vbj0iaHR0cDovL3BhZ29wYS1hcGkucGFnb3BhLmdvdi5pdC94c2QvY29tbW9uLXR5cGVzL3YxLjAuMC8iIHhtbG5zOm5mcD0iaHR0cDovL3BhZ29wYS1hcGkucGFnb3BhLmdvdi5pdC9ub2RlL25vZGVGb3JQc3AueHNkIj48c29hcGVudjpCb2R5PjxuZnA6c2VuZFBheW1lbnRPdXRjb21lUmVzPjxvdXRjb21lPk9LPC9vdXRjb21lPjwvbmZwOnNlbmRQYXltZW50T3V0Y29tZVJlcz48L3NvYXBlbnY6Qm9keT48L3NvYXBlbnY6RW52ZWxvcGU+',
];
Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);









$data_req = [
    ':id' => 48,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 13:30:00.197',
    ':tipoevento' => 'activatePaymentNotice',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000032',
    ':ccp' => 't0000000000000000000000000000032',
    ':noticenumber' => '301000000000000032',
    ':creditorreferenceid' => '01000000000000032',
    ':paymenttoken' => 't0000000000000000000000000000032',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_000033',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000048',
    ':payload' => 'PHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6bm9kPSJodHRwOi8vcGFnb3BhLWFwaS5wYWdvcGEuZ292Lml0L25vZGUvbm9kZUZvclBzcC54c2QiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIj4KCTxzb2FwZW52OkhlYWRlci8+Cgk8c29hcGVudjpCb2R5PgoJCTxub2Q6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVxPgoJCQk8aWRQU1A+UFNQXzAxPC9pZFBTUD4KCQkJPGlkQnJva2VyUFNQPjg4ODg4ODg4ODg4PC9pZEJyb2tlclBTUD4KCQkJPGlkQ2hhbm5lbD44ODg4ODg4ODg4OF8wMTwvaWRDaGFubmVsPgoJCQk8cGFzc3dvcmQ+KioqKio8L3Bhc3N3b3JkPgoJCQk8cXJDb2RlPgoJCQkJPGZpc2NhbENvZGU+Nzc3Nzc3Nzc3Nzc8L2Zpc2NhbENvZGU+CgkJCQk8bm90aWNlTnVtYmVyPjMwMTAwMDAwMDAwMDAwMDAzMjwvbm90aWNlTnVtYmVyPgoJCQk8L3FyQ29kZT4KCQkJPGFtb3VudD4wLjAwPC9hbW91bnQ+CgkJPC9ub2Q6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVxPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4=',
];
$data_resp = [
    ':id' => 49,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 13:31:00.197',
    ':tipoevento' => 'activatePaymentNotice',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000032',
    ':ccp' => 't0000000000000000000000000000032',
    ':noticenumber' => '301000000000000032',
    ':creditorreferenceid' => '01000000000000032',
    ':paymenttoken' => 't0000000000000000000000000000032',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_000033',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000049',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVzPgoJCQk8b3V0Y29tZT5PSzwvb3V0Y29tZT4KCQkJPHRvdGFsQW1vdW50PjI0NS4wMDwvdG90YWxBbW91bnQ+CgkJCTxwYXltZW50RGVzY3JpcHRpb24+eHh4eHh4eDwvcGF5bWVudERlc2NyaXB0aW9uPgoJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCTxjb21wYW55TmFtZT54eHh4eHh4PC9jb21wYW55TmFtZT4KCQkJPHBheW1lbnRUb2tlbj50MDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAzMjwvcGF5bWVudFRva2VuPgoJCQk8dHJhbnNmZXJMaXN0PgoJCQkJPHRyYW5zZmVyPgoJCQkJCTxpZFRyYW5zZmVyPjE8L2lkVHJhbnNmZXI+CgkJCQkJPHRyYW5zZmVyQW1vdW50PjUwLjAwPC90cmFuc2ZlckFtb3VudD4KCQkJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCQkJPElCQU4+SVQxOFUwMDAwMDAwMDAwMDAwMDAwMDAwMDAxPC9JQkFOPgoJCQkJCTxyZW1pdHRhbmNlSW5mb3JtYXRpb24+eHh4eDwvcmVtaXR0YW5jZUluZm9ybWF0aW9uPgoJCQkJPC90cmFuc2Zlcj4KCQkJCTx0cmFuc2Zlcj4KCQkJCQk8aWRUcmFuc2Zlcj4yPC9pZFRyYW5zZmVyPgoJCQkJCTx0cmFuc2ZlckFtb3VudD43NS4wMDwvdHJhbnNmZXJBbW91bnQ+CgkJCQkJPGZpc2NhbENvZGVQQT43Nzc3Nzc3Nzc3NzwvZmlzY2FsQ29kZVBBPgoJCQkJCTxJQkFOPklUMThVMDAwMDAwMDAwMDAwMDAwMDAwMDAwMjwvSUJBTj4KCQkJCQk8cmVtaXR0YW5jZUluZm9ybWF0aW9uPnh4eHg8L3JlbWl0dGFuY2VJbmZvcm1hdGlvbj4KCQkJCTwvdHJhbnNmZXI+CgkJCQk8dHJhbnNmZXI+CgkJCQkJPGlkVHJhbnNmZXI+MzwvaWRUcmFuc2Zlcj4KCQkJCQk8dHJhbnNmZXJBbW91bnQ+MTIwLjAwPC90cmFuc2ZlckFtb3VudD4KCQkJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCQkJPElCQU4+SVQxOFUwMDAwMDAwMDAwMDAwMDAwMDAwMDAzPC9JQkFOPgoJCQkJCTxyZW1pdHRhbmNlSW5mb3JtYXRpb24+eHh4eDwvcmVtaXR0YW5jZUluZm9ybWF0aW9uPgoJCQkJPC90cmFuc2Zlcj4KCQkJPC90cmFuc2Zlckxpc3Q+CgkJCTxjcmVkaXRvclJlZmVyZW5jZUlkPjAxMDAwMDAwMDAwMDAwMDMyPC9jcmVkaXRvclJlZmVyZW5jZUlkPgoJCTwvbmZwOmFjdGl2YXRlUGF5bWVudE5vdGljZVJlcz4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+',
];
Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);
$data_req = [
    ':id' => 50,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 13:32:00.197',
    ':tipoevento' => 'sendPaymentOutcome',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000032',
    ':ccp' => 't0000000000000000000000000000032',
    ':noticenumber' => '301000000000000032',
    ':creditorreferenceid' => '01000000000000032',
    ':paymenttoken' => 't0000000000000000000000000000032',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_000034',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000050',
    ':payload' => 'PHNvYXA6RW52ZWxvcGUgeG1sbnM6c29hcD0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPgoJPHNvYXA6Qm9keT4KCQk8bnMyOnNlbmRQYXltZW50T3V0Y29tZVJlcSB4bWxuczpuczI9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6bnMzPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyI+CgkJCTxpZFBTUD5BR0lEXzAxPC9pZFBTUD4KCQkJPGlkQnJva2VyUFNQPjg4ODg4ODg4ODg4PC9pZEJyb2tlclBTUD4KCQkJPGlkQ2hhbm5lbD44ODg4ODg4ODg4OF8wMTwvaWRDaGFubmVsPgoJCQk8cGFzc3dvcmQ+eHh4eHh4eHg8L3Bhc3N3b3JkPgoJCQk8cGF5bWVudFRva2VuPnQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDMyPC9wYXltZW50VG9rZW4+CgkJCTxvdXRjb21lPk9LPC9vdXRjb21lPgoJCQk8ZGV0YWlscz4KCQkJCTxwYXltZW50TWV0aG9kPm90aGVyPC9wYXltZW50TWV0aG9kPgoJCQkJPGZlZT4xLjAwPC9mZWU+CgkJCQk8YXBwbGljYXRpb25EYXRlPjIwMjQtMDQtMDI8L2FwcGxpY2F0aW9uRGF0ZT4KCQkJCTx0cmFuc2ZlckRhdGU+MjAyNC0wNC0wMzwvdHJhbnNmZXJEYXRlPgoJCQk8L2RldGFpbHM+CgkJPC9uczI6c2VuZFBheW1lbnRPdXRjb21lUmVxPgoJPC9zb2FwOkJvZHk+Cjwvc29hcDpFbnZlbG9wZT4=',
];
$data_resp = [
    ':id' => 51,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 13:33:00.197',
    ':tipoevento' => 'sendPaymentOutcome',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000032',
    ':ccp' => 't0000000000000000000000000000032',
    ':noticenumber' => '301000000000000032',
    ':creditorreferenceid' => '01000000000000032',
    ':paymenttoken' => 't0000000000000000000000000000032',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_000034',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000051',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pjxzb2FwZW52OkVudmVsb3BlIHhtbG5zOnhzaT0iaHR0cDovL3d3dy53My5vcmcvMjAwMS9YTUxTY2hlbWEtaW5zdGFuY2UiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIiB4bWxuczp4cz0iaHR0cDovL3d3dy53My5vcmcvMjAwMS9YTUxTY2hlbWEiIHhtbG5zOmNvbW1vbj0iaHR0cDovL3BhZ29wYS1hcGkucGFnb3BhLmdvdi5pdC94c2QvY29tbW9uLXR5cGVzL3YxLjAuMC8iIHhtbG5zOm5mcD0iaHR0cDovL3BhZ29wYS1hcGkucGFnb3BhLmdvdi5pdC9ub2RlL25vZGVGb3JQc3AueHNkIj48c29hcGVudjpCb2R5PjxuZnA6c2VuZFBheW1lbnRPdXRjb21lUmVzPjxvdXRjb21lPk9LPC9vdXRjb21lPjwvbmZwOnNlbmRQYXltZW50T3V0Y29tZVJlcz48L3NvYXBlbnY6Qm9keT48L3NvYXBlbnY6RW52ZWxvcGU+',
];
Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);
$data_req = [
    ':id' => 52,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 13:34:00.197',
    ':tipoevento' => 'sendPaymentOutcome',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000032',
    ':ccp' => 't0000000000000000000000000000032',
    ':noticenumber' => '301000000000000032',
    ':creditorreferenceid' => '01000000000000032',
    ':paymenttoken' => 't0000000000000000000000000000032',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_000035',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000052',
    ':payload' => 'PHNvYXA6RW52ZWxvcGUgeG1sbnM6c29hcD0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPgoJPHNvYXA6Qm9keT4KCQk8bnMyOnNlbmRQYXltZW50T3V0Y29tZVJlcSB4bWxuczpuczI9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6bnMzPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyI+CgkJCTxpZFBTUD5BR0lEXzAxPC9pZFBTUD4KCQkJPGlkQnJva2VyUFNQPjg4ODg4ODg4ODg4PC9pZEJyb2tlclBTUD4KCQkJPGlkQ2hhbm5lbD44ODg4ODg4ODg4OF8wMTwvaWRDaGFubmVsPgoJCQk8cGFzc3dvcmQ+eHh4eHh4eHg8L3Bhc3N3b3JkPgoJCQk8cGF5bWVudFRva2VuPnQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDMyPC9wYXltZW50VG9rZW4+CgkJCTxvdXRjb21lPktPPC9vdXRjb21lPgoJCQk8ZGV0YWlscz4KCQkJCTxwYXltZW50TWV0aG9kPm90aGVyPC9wYXltZW50TWV0aG9kPgoJCQkJPGZlZT4xLjAwPC9mZWU+CgkJCQk8YXBwbGljYXRpb25EYXRlPjIwMjQtMDQtMDI8L2FwcGxpY2F0aW9uRGF0ZT4KCQkJCTx0cmFuc2ZlckRhdGU+MjAyNC0wNC0wMzwvdHJhbnNmZXJEYXRlPgoJCQk8L2RldGFpbHM+CgkJPC9uczI6c2VuZFBheW1lbnRPdXRjb21lUmVxPgoJPC9zb2FwOkJvZHk+Cjwvc29hcDpFbnZlbG9wZT4=',
];
$data_resp = [
    ':id' => 53,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 13:35:00.197',
    ':tipoevento' => 'sendPaymentOutcome',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000032',
    ':ccp' => 't0000000000000000000000000000032',
    ':noticenumber' => '301000000000000032',
    ':creditorreferenceid' => '01000000000000032',
    ':paymenttoken' => 't0000000000000000000000000000032',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_000035',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000053',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6c2VuZFBheW1lbnRPdXRjb21lUmVzPgoJCQk8b3V0Y29tZT5LTzwvb3V0Y29tZT4KCQkJPGZhdWx0PgoJCQkJPGZhdWx0Q29kZT5QUFRfRVNJVE9fQUNRVUlTSVRPPC9mYXVsdENvZGU+CgkJCQk8ZmF1bHRTdHJpbmc+cGF5bWVudFRva2VuIGlzIGV4cGlyZWQ8L2ZhdWx0U3RyaW5nPgoJCQkJPGlkPk5vZG9EZWlQYWdhbWVudGlTUEM8L2lkPgoJCQkJPGRlc2NyaXB0aW9uPnBheW1lbnRUb2tlbiBpcyBleHBpcmVkPC9kZXNjcmlwdGlvbj4KCQkJPC9mYXVsdD4KCQk8L25mcDpzZW5kUGF5bWVudE91dGNvbWVSZXM+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg==',
];
Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);


$data_req = [
    ':id' => 54,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 14:05:00.201',
    ':tipoevento' => 'activatePaymentNotice',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000033',
    ':ccp' => 't0000000000000000000000000000033',
    ':noticenumber' => '301000000000000033',
    ':creditorreferenceid' => '01000000000000033',
    ':paymenttoken' => 't0000000000000000000000000000033',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_000036',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000054',
    ':payload' => 'PHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6bm9kPSJodHRwOi8vcGFnb3BhLWFwaS5wYWdvcGEuZ292Lml0L25vZGUvbm9kZUZvclBzcC54c2QiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIj4KCTxzb2FwZW52OkhlYWRlci8+Cgk8c29hcGVudjpCb2R5PgoJCTxub2Q6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVxPgoJCQk8aWRQU1A+UFNQXzAxPC9pZFBTUD4KCQkJPGlkQnJva2VyUFNQPjg4ODg4ODg4ODg4PC9pZEJyb2tlclBTUD4KCQkJPGlkQ2hhbm5lbD44ODg4ODg4ODg4OF8wMTwvaWRDaGFubmVsPgoJCQk8cGFzc3dvcmQ+KioqKio8L3Bhc3N3b3JkPgoJCQk8cXJDb2RlPgoJCQkJPGZpc2NhbENvZGU+Nzc3Nzc3Nzc3Nzc8L2Zpc2NhbENvZGU+CgkJCQk8bm90aWNlTnVtYmVyPjMwMTAwMDAwMDAwMDAwMDAzMzwvbm90aWNlTnVtYmVyPgoJCQk8L3FyQ29kZT4KCQkJPGFtb3VudD4wLjAwPC9hbW91bnQ+CgkJPC9ub2Q6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVxPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4=',
];
$data_resp = [
    ':id' => 55,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 14:06:00.201',
    ':tipoevento' => 'activatePaymentNotice',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000033',
    ':ccp' => 't0000000000000000000000000000033',
    ':noticenumber' => '301000000000000033',
    ':creditorreferenceid' => '01000000000000033',
    ':paymenttoken' => 't0000000000000000000000000000033',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_000036',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000055',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVzPgoJCQk8b3V0Y29tZT5PSzwvb3V0Y29tZT4KCQkJPHRvdGFsQW1vdW50PjI0NS4wMDwvdG90YWxBbW91bnQ+CgkJCTxwYXltZW50RGVzY3JpcHRpb24+eHh4eHh4eDwvcGF5bWVudERlc2NyaXB0aW9uPgoJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCTxjb21wYW55TmFtZT54eHh4eHh4PC9jb21wYW55TmFtZT4KCQkJPHBheW1lbnRUb2tlbj50MDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAzMzwvcGF5bWVudFRva2VuPgoJCQk8dHJhbnNmZXJMaXN0PgoJCQkJPHRyYW5zZmVyPgoJCQkJCTxpZFRyYW5zZmVyPjE8L2lkVHJhbnNmZXI+CgkJCQkJPHRyYW5zZmVyQW1vdW50PjI0NS4wMDwvdHJhbnNmZXJBbW91bnQ+CgkJCQkJPGZpc2NhbENvZGVQQT43Nzc3Nzc3Nzc3NzwvZmlzY2FsQ29kZVBBPgoJCQkJCTxJQkFOPklUMThVMDAwMDAwMDAwMDAwMDAwMDAwMDAwMTwvSUJBTj4KCQkJCQk8cmVtaXR0YW5jZUluZm9ybWF0aW9uPnh4eHg8L3JlbWl0dGFuY2VJbmZvcm1hdGlvbj4KCQkJCTwvdHJhbnNmZXI+CgkJCTwvdHJhbnNmZXJMaXN0PgoJCQk8Y3JlZGl0b3JSZWZlcmVuY2VJZD4wMTAwMDAwMDAwMDAwMDAzMzwvY3JlZGl0b3JSZWZlcmVuY2VJZD4KCQk8L25mcDphY3RpdmF0ZVBheW1lbnROb3RpY2VSZXM+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg==',
];
Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);
$data_req = [
    ':id' => 56,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 14:07:00.201',
    ':tipoevento' => 'sendPaymentOutcome',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000033',
    ':ccp' => 't0000000000000000000000000000033',
    ':noticenumber' => '301000000000000033',
    ':creditorreferenceid' => '01000000000000033',
    ':paymenttoken' => 't0000000000000000000000000000033',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_000037',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000056',
    ':payload' => 'PHNvYXA6RW52ZWxvcGUgeG1sbnM6c29hcD0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPgoJPHNvYXA6Qm9keT4KCQk8bnMyOnNlbmRQYXltZW50T3V0Y29tZVJlcSB4bWxuczpuczI9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6bnMzPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyI+CgkJCTxpZFBTUD5BR0lEXzAxPC9pZFBTUD4KCQkJPGlkQnJva2VyUFNQPjg4ODg4ODg4ODg4PC9pZEJyb2tlclBTUD4KCQkJPGlkQ2hhbm5lbD44ODg4ODg4ODg4OF8wMTwvaWRDaGFubmVsPgoJCQk8cGFzc3dvcmQ+eHh4eHh4eHg8L3Bhc3N3b3JkPgoJCQk8cGF5bWVudFRva2VuPnQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDMzPC9wYXltZW50VG9rZW4+CgkJCTxvdXRjb21lPk9LPC9vdXRjb21lPgoJCQk8ZGV0YWlscz4KCQkJCTxwYXltZW50TWV0aG9kPm90aGVyPC9wYXltZW50TWV0aG9kPgoJCQkJPGZlZT4xLjAwPC9mZWU+CgkJCQk8YXBwbGljYXRpb25EYXRlPjIwMjQtMDQtMDI8L2FwcGxpY2F0aW9uRGF0ZT4KCQkJCTx0cmFuc2ZlckRhdGU+MjAyNC0wNC0wMzwvdHJhbnNmZXJEYXRlPgoJCQk8L2RldGFpbHM+CgkJPC9uczI6c2VuZFBheW1lbnRPdXRjb21lUmVxPgoJPC9zb2FwOkJvZHk+Cjwvc29hcDpFbnZlbG9wZT4=',
];
$data_resp = [
    ':id' => 57,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 14:08:00.201',
    ':tipoevento' => 'sendPaymentOutcome',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000033',
    ':ccp' => 't0000000000000000000000000000033',
    ':noticenumber' => '301000000000000033',
    ':creditorreferenceid' => '01000000000000033',
    ':paymenttoken' => 't0000000000000000000000000000033',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_000037',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000057',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6c2VuZFBheW1lbnRPdXRjb21lUmVzPgoJCQk8b3V0Y29tZT5PSzwvb3V0Y29tZT4KCQk8L25mcDpzZW5kUGF5bWVudE91dGNvbWVSZXM+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg==',
];
Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);


$data_req = [
    ':id' => 58,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 14:09:00.201',
    ':tipoevento' => 'sendPaymentOutcome',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000033',
    ':ccp' => 't0000000000000000000000000000033',
    ':noticenumber' => '301000000000000033',
    ':creditorreferenceid' => '01000000000000033',
    ':paymenttoken' => 't0000000000000000000000000000033',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_000037',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000058',
    ':payload' => 'PHNvYXA6RW52ZWxvcGUgeG1sbnM6c29hcD0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPgoJPHNvYXA6Qm9keT4KCQk8bnMyOnNlbmRQYXltZW50T3V0Y29tZVJlcSB4bWxuczpuczI9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6bnMzPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyI+CgkJCTxpZFBTUD5BR0lEXzAxPC9pZFBTUD4KCQkJPGlkQnJva2VyUFNQPjg4ODg4ODg4ODg4PC9pZEJyb2tlclBTUD4KCQkJPGlkQ2hhbm5lbD44ODg4ODg4ODg4OF8wMTwvaWRDaGFubmVsPgoJCQk8cGFzc3dvcmQ+eHh4eHh4eHg8L3Bhc3N3b3JkPgoJCQk8cGF5bWVudFRva2VuPnQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDMzPC9wYXltZW50VG9rZW4+CgkJCTxvdXRjb21lPk9LPC9vdXRjb21lPgoJCQk8ZGV0YWlscz4KCQkJCTxwYXltZW50TWV0aG9kPm90aGVyPC9wYXltZW50TWV0aG9kPgoJCQkJPGZlZT4xLjAwPC9mZWU+CgkJCQk8YXBwbGljYXRpb25EYXRlPjIwMjQtMDQtMDI8L2FwcGxpY2F0aW9uRGF0ZT4KCQkJCTx0cmFuc2ZlckRhdGU+MjAyNC0wNC0wMzwvdHJhbnNmZXJEYXRlPgoJCQk8L2RldGFpbHM+CgkJPC9uczI6c2VuZFBheW1lbnRPdXRjb21lUmVxPgoJPC9zb2FwOkJvZHk+Cjwvc29hcDpFbnZlbG9wZT4=',
];
$data_resp = [
    ':id' => 59,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 14:10:00.201',
    ':tipoevento' => 'sendPaymentOutcome',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000033',
    ':ccp' => 't0000000000000000000000000000033',
    ':noticenumber' => '301000000000000033',
    ':creditorreferenceid' => '01000000000000033',
    ':paymenttoken' => 't0000000000000000000000000000033',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_000037',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000059',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6c2VuZFBheW1lbnRPdXRjb21lUmVzPgoJCQk8b3V0Y29tZT5LTzwvb3V0Y29tZT4KCQkJPGZhdWx0PgoJCQkJPGZhdWx0Q29kZT5QUFRfUEFHQU1FTlRPX0RVUExJQ0FUTzwvZmF1bHRDb2RlPgoJCQkJPGZhdWx0U3RyaW5nPnBheW1lbnRUb2tlbiBpcyBleHBpcmVkPC9mYXVsdFN0cmluZz4KCQkJCTxpZD5Ob2RvRGVpUGFnYW1lbnRpU1BDPC9pZD4KCQkJCTxkZXNjcmlwdGlvbj5wYXltZW50VG9rZW4gaXMgZXhwaXJlZDwvZGVzY3JpcHRpb24+CgkJCTwvZmF1bHQ+CgkJPC9uZnA6c2VuZFBheW1lbnRPdXRjb21lUmVzPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4=',
];
Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);






$data_req = [
    ':id' => 60,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 08:05:00.201',
    ':tipoevento' => 'activatePaymentNotice',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000034',
    ':ccp' => 't0000000000000000000000000000034',
    ':noticenumber' => '301000000000000034',
    ':creditorreferenceid' => '01000000000000034',
    ':paymenttoken' => 't0000000000000000000000000000034',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_000038',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000060',
    ':payload' => 'PHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6bm9kPSJodHRwOi8vcGFnb3BhLWFwaS5wYWdvcGEuZ292Lml0L25vZGUvbm9kZUZvclBzcC54c2QiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIj4KCTxzb2FwZW52OkhlYWRlci8+Cgk8c29hcGVudjpCb2R5PgoJCTxub2Q6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVxPgoJCQk8aWRQU1A+UFNQXzAxPC9pZFBTUD4KCQkJPGlkQnJva2VyUFNQPjg4ODg4ODg4ODg4PC9pZEJyb2tlclBTUD4KCQkJPGlkQ2hhbm5lbD44ODg4ODg4ODg4OF8wMTwvaWRDaGFubmVsPgoJCQk8cGFzc3dvcmQ+KioqKio8L3Bhc3N3b3JkPgoJCQk8cXJDb2RlPgoJCQkJPGZpc2NhbENvZGU+Nzc3Nzc3Nzc3Nzc8L2Zpc2NhbENvZGU+CgkJCQk8bm90aWNlTnVtYmVyPjMwMTAwMDAwMDAwMDAwMDAzNDwvbm90aWNlTnVtYmVyPgoJCQk8L3FyQ29kZT4KCQkJPGFtb3VudD4wLjAwPC9hbW91bnQ+CgkJPC9ub2Q6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVxPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4=',
];
$data_resp = [
    ':id' => 61,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 08:06:00.201',
    ':tipoevento' => 'activatePaymentNotice',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000034',
    ':ccp' => 't0000000000000000000000000000034',
    ':noticenumber' => '301000000000000034',
    ':creditorreferenceid' => '01000000000000034',
    ':paymenttoken' => 't0000000000000000000000000000034',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_000038',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000061',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVzPgoJCQk8b3V0Y29tZT5PSzwvb3V0Y29tZT4KCQkJPHRvdGFsQW1vdW50PjEwNS4wMDwvdG90YWxBbW91bnQ+CgkJCTxwYXltZW50RGVzY3JpcHRpb24+eHh4eHh4eDwvcGF5bWVudERlc2NyaXB0aW9uPgoJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCTxjb21wYW55TmFtZT54eHh4eHh4PC9jb21wYW55TmFtZT4KCQkJPHBheW1lbnRUb2tlbj50MDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAzNDwvcGF5bWVudFRva2VuPgoJCQk8dHJhbnNmZXJMaXN0PgoJCQkJPHRyYW5zZmVyPgoJCQkJCTxpZFRyYW5zZmVyPjE8L2lkVHJhbnNmZXI+CgkJCQkJPHRyYW5zZmVyQW1vdW50PjEwNS4wMDwvdHJhbnNmZXJBbW91bnQ+CgkJCQkJPGZpc2NhbENvZGVQQT43Nzc3Nzc3Nzc3NzwvZmlzY2FsQ29kZVBBPgoJCQkJCTxJQkFOPklUMThVMDAwMDAwMDAwMDAwMDAwMDAwMDAwMTwvSUJBTj4KCQkJCQk8cmVtaXR0YW5jZUluZm9ybWF0aW9uPnh4eHg8L3JlbWl0dGFuY2VJbmZvcm1hdGlvbj4KCQkJCTwvdHJhbnNmZXI+CgkJCTwvdHJhbnNmZXJMaXN0PgoJCQk8Y3JlZGl0b3JSZWZlcmVuY2VJZD4wMTAwMDAwMDAwMDAwMDAzNDwvY3JlZGl0b3JSZWZlcmVuY2VJZD4KCQk8L25mcDphY3RpdmF0ZVBheW1lbnROb3RpY2VSZXM+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg==',
];
Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);
$data_req = [
    ':id' => 62,
    ':date_event' => '2024-03-11',
    ':inserted_timestamp' => '2024-03-11 08:07:00.201',
    ':tipoevento' => 'sendPaymentOutcome',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000034',
    ':ccp' => 't0000000000000000000000000000034',
    ':noticenumber' => '301000000000000034',
    ':creditorreferenceid' => '01000000000000034',
    ':paymenttoken' => 't0000000000000000000000000000034',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_000039',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000062',
    ':payload' => 'PHNvYXA6RW52ZWxvcGUgeG1sbnM6c29hcD0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPgoJPHNvYXA6Qm9keT4KCQk8bnMyOnNlbmRQYXltZW50T3V0Y29tZVJlcSB4bWxuczpuczI9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6bnMzPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyI+CgkJCTxpZFBTUD5BR0lEXzAxPC9pZFBTUD4KCQkJPGlkQnJva2VyUFNQPjg4ODg4ODg4ODg4PC9pZEJyb2tlclBTUD4KCQkJPGlkQ2hhbm5lbD44ODg4ODg4ODg4OF8wMTwvaWRDaGFubmVsPgoJCQk8cGFzc3dvcmQ+eHh4eHh4eHg8L3Bhc3N3b3JkPgoJCQk8cGF5bWVudFRva2VuPnQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDM0PC9wYXltZW50VG9rZW4+CgkJCTxvdXRjb21lPktPPC9vdXRjb21lPgoJCQk8ZGV0YWlscz4KCQkJCTxwYXltZW50TWV0aG9kPm90aGVyPC9wYXltZW50TWV0aG9kPgoJCQkJPGZlZT4xLjAwPC9mZWU+CgkJCQk8YXBwbGljYXRpb25EYXRlPjIwMjQtMDQtMDI8L2FwcGxpY2F0aW9uRGF0ZT4KCQkJCTx0cmFuc2ZlckRhdGU+MjAyNC0wNC0wMzwvdHJhbnNmZXJEYXRlPgoJCQk8L2RldGFpbHM+CgkJPC9uczI6c2VuZFBheW1lbnRPdXRjb21lUmVxPgoJPC9zb2FwOkJvZHk+Cjwvc29hcDpFbnZlbG9wZT4=',
];
$data_resp = [
    ':id' => 63,
    ':date_event' => '2024-03-11',
    ':inserted_timestamp' => '2024-03-11 08:08:00.201',
    ':tipoevento' => 'sendPaymentOutcome',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000034',
    ':ccp' => 't0000000000000000000000000000034',
    ':noticenumber' => '301000000000000034',
    ':creditorreferenceid' => '01000000000000034',
    ':paymenttoken' => 't0000000000000000000000000000034',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_000039',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000063',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6c2VuZFBheW1lbnRPdXRjb21lUmVzPgoJCQk8b3V0Y29tZT5PSzwvb3V0Y29tZT4KCQk8L25mcDpzZW5kUGF5bWVudE91dGNvbWVSZXM+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg==',
];
Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);





$data_req = [
    ':id' => 64,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 08:05:00.201',
    ':tipoevento' => 'activatePaymentNotice',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000040',
    ':ccp' => 't0000000000000000000000000000040',
    ':noticenumber' => '301000000000000040',
    ':creditorreferenceid' => '01000000000000040',
    ':paymenttoken' => 't0000000000000000000000000000040',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_000040',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000062',
    ':payload' => 'PHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6bm9kPSJodHRwOi8vcGFnb3BhLWFwaS5wYWdvcGEuZ292Lml0L25vZGUvbm9kZUZvclBzcC54c2QiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIj4KCTxzb2FwZW52OkhlYWRlci8+Cgk8c29hcGVudjpCb2R5PgoJCTxub2Q6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVxPgoJCQk8aWRQU1A+UFNQXzAxPC9pZFBTUD4KCQkJPGlkQnJva2VyUFNQPjg4ODg4ODg4ODg4PC9pZEJyb2tlclBTUD4KCQkJPGlkQ2hhbm5lbD44ODg4ODg4ODg4OF8wMTwvaWRDaGFubmVsPgoJCQk8cGFzc3dvcmQ+KioqKio8L3Bhc3N3b3JkPgoJCQk8cXJDb2RlPgoJCQkJPGZpc2NhbENvZGU+Nzc3Nzc3Nzc3Nzc8L2Zpc2NhbENvZGU+CgkJCQk8bm90aWNlTnVtYmVyPjMwMTAwMDAwMDAwMDAwMDA0MDwvbm90aWNlTnVtYmVyPgoJCQk8L3FyQ29kZT4KCQkJPGFtb3VudD4wLjAwPC9hbW91bnQ+CgkJPC9ub2Q6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVxPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4=',
];
$data_resp = [
    ':id' => 65,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 08:06:00.201',
    ':tipoevento' => 'activatePaymentNotice',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000040',
    ':ccp' => 't0000000000000000000000000000040',
    ':noticenumber' => '301000000000000040',
    ':creditorreferenceid' => '01000000000000040',
    ':paymenttoken' => 't0000000000000000000000000000040',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_000040',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000063',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVzPgoJCQk8b3V0Y29tZT5PSzwvb3V0Y29tZT4KCQkJPHRvdGFsQW1vdW50PjE4MC4wMDwvdG90YWxBbW91bnQ+CgkJCTxwYXltZW50RGVzY3JpcHRpb24+eHh4eHh4eDwvcGF5bWVudERlc2NyaXB0aW9uPgoJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCTxjb21wYW55TmFtZT54eHh4eHh4eDwvY29tcGFueU5hbWU+CgkJCTxwYXltZW50VG9rZW4+dDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwNDA8L3BheW1lbnRUb2tlbj4KCQkJPHRyYW5zZmVyTGlzdD4KCQkJCTx0cmFuc2Zlcj4KCQkJCQk8aWRUcmFuc2Zlcj4xPC9pZFRyYW5zZmVyPgoJCQkJCTx0cmFuc2ZlckFtb3VudD4xMDAuMDA8L3RyYW5zZmVyQW1vdW50PgoJCQkJCTxmaXNjYWxDb2RlUEE+Nzc3Nzc3Nzc3Nzc8L2Zpc2NhbENvZGVQQT4KCQkJCQk8SUJBTj5JVDE4VTAwMDAwMDAwMDAwMDAwMDAwMDAwMDE8L0lCQU4+CgkJCQkJPHJlbWl0dGFuY2VJbmZvcm1hdGlvbj54eHh4eHg8L3JlbWl0dGFuY2VJbmZvcm1hdGlvbj4KCQkJCQk8bWV0YWRhdGE+CgkJCQkJCTxtYXBFbnRyeT4KCQkJCQkJCTxrZXk+Y2hpYXZlX3RyYW5zZmVyXzFfMTwva2V5PgoJCQkJCQkJPHZhbHVlPnZhbHVlX3RyYW5zZmVyXzFfMTwvdmFsdWU+CgkJCQkJCTwvbWFwRW50cnk+CgkJCQkJCTxtYXBFbnRyeT4KCQkJCQkJCTxrZXk+Y2hpYXZlX3RyYW5zZmVyXzFfMjwva2V5PgoJCQkJCQkJPHZhbHVlPnZhbHVlX3RyYW5zZmVyXzFfMjwvdmFsdWU+CgkJCQkJCTwvbWFwRW50cnk+CgkJCQkJPC9tZXRhZGF0YT4KCQkJCTwvdHJhbnNmZXI+CgkJCQk8dHJhbnNmZXI+CgkJCQkJPGlkVHJhbnNmZXI+MjwvaWRUcmFuc2Zlcj4KCQkJCQk8dHJhbnNmZXJBbW91bnQ+NTAuMDA8L3RyYW5zZmVyQW1vdW50PgoJCQkJCTxmaXNjYWxDb2RlUEE+Nzc3Nzc3Nzc3Nzg8L2Zpc2NhbENvZGVQQT4KCQkJCQk8SUJBTj5JVDE4VTAwMDAwMDAwMDAwMDAwMDAwMDAwMDI8L0lCQU4+CgkJCQkJPHJlbWl0dGFuY2VJbmZvcm1hdGlvbj54eHh4eHh4eDwvcmVtaXR0YW5jZUluZm9ybWF0aW9uPgoJCQkJCTxtZXRhZGF0YT4KCQkJCQkJPG1hcEVudHJ5PgoJCQkJCQkJPGtleT5jaGlhdmVfdHJhbnNmZXJfMl8xPC9rZXk+CgkJCQkJCQk8dmFsdWU+dmFsdWVfdHJhbnNmZXJfMl8xPC92YWx1ZT4KCQkJCQkJPC9tYXBFbnRyeT4KCQkJCQkJPG1hcEVudHJ5PgoJCQkJCQkJPGtleT5jaGlhdmVfdHJhbnNmZXJfMl8yPC9rZXk+CgkJCQkJCQk8dmFsdWU+dmFsdWVfdHJhbnNmZXJfMl8yPC92YWx1ZT4KCQkJCQkJPC9tYXBFbnRyeT4KCQkJCQkJPG1hcEVudHJ5PgoJCQkJCQkJPGtleT5jaGlhdmVfdHJhbnNmZXJfMl8zPC9rZXk+CgkJCQkJCQk8dmFsdWU+dmFsdWVfdHJhbnNmZXJfMl8zPC92YWx1ZT4KCQkJCQkJPC9tYXBFbnRyeT4KCQkJCQk8L21ldGFkYXRhPgoJCQkJPC90cmFuc2Zlcj4KCQkJCTx0cmFuc2Zlcj4KCQkJCQk8aWRUcmFuc2Zlcj4zPC9pZFRyYW5zZmVyPgoJCQkJCTx0cmFuc2ZlckFtb3VudD4zMC4wMDwvdHJhbnNmZXJBbW91bnQ+CgkJCQkJPGZpc2NhbENvZGVQQT43Nzc3Nzc3Nzc3OTwvZmlzY2FsQ29kZVBBPgoJCQkJCTxJQkFOPklUMThVMDAwMDAwMDAwMDAwMDAwMDAwMDAwMzwvSUJBTj4KCQkJCQk8cmVtaXR0YW5jZUluZm9ybWF0aW9uPnh4eHh4eHh4PC9yZW1pdHRhbmNlSW5mb3JtYXRpb24+CgkJCQk8L3RyYW5zZmVyPgoJCQk8L3RyYW5zZmVyTGlzdD4KCQkJPGNyZWRpdG9yUmVmZXJlbmNlSWQ+MDEwMDAwMDAwMDAwMDAwNDA8L2NyZWRpdG9yUmVmZXJlbmNlSWQ+CgkJPC9uZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVzPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4=',
];
Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);


$data_req = [
    ':id' => 66,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 08:07:00.201',
    ':tipoevento' => 'activatePaymentNotice',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000040',
    ':ccp' => 't0000000000000000000000000000040',
    ':noticenumber' => '301000000000000040',
    ':creditorreferenceid' => '01000000000000040',
    ':paymenttoken' => 't0000000000000000000000000000040',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_000040',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000062',
    ':payload' => 'PHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6bm9kPSJodHRwOi8vcGFnb3BhLWFwaS5wYWdvcGEuZ292Lml0L25vZGUvbm9kZUZvclBzcC54c2QiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIj4KCTxzb2FwZW52OkhlYWRlci8+Cgk8c29hcGVudjpCb2R5PgoJCTxub2Q6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVxPgoJCQk8aWRQU1A+UFNQXzAxPC9pZFBTUD4KCQkJPGlkQnJva2VyUFNQPjg4ODg4ODg4ODg4PC9pZEJyb2tlclBTUD4KCQkJPGlkQ2hhbm5lbD44ODg4ODg4ODg4OF8wMTwvaWRDaGFubmVsPgoJCQk8cGFzc3dvcmQ+KioqKio8L3Bhc3N3b3JkPgoJCQk8cXJDb2RlPgoJCQkJPGZpc2NhbENvZGU+Nzc3Nzc3Nzc3Nzc8L2Zpc2NhbENvZGU+CgkJCQk8bm90aWNlTnVtYmVyPjMwMTAwMDAwMDAwMDAwMDA0MDwvbm90aWNlTnVtYmVyPgoJCQk8L3FyQ29kZT4KCQkJPGFtb3VudD4wLjAwPC9hbW91bnQ+CgkJPC9ub2Q6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVxPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4=',
];
$data_resp = [
    ':id' => 67,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 08:08:00.201',
    ':tipoevento' => 'activatePaymentNotice',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000040',
    ':ccp' => 't0000000000000000000000000000040',
    ':noticenumber' => '301000000000000040',
    ':creditorreferenceid' => '01000000000000040',
    ':paymenttoken' => 't0000000000000000000000000000040',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_000040',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000063',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVzPgoJCQk8b3V0Y29tZT5PSzwvb3V0Y29tZT4KCQkJPHRvdGFsQW1vdW50PjE4MC4wMDwvdG90YWxBbW91bnQ+CgkJCTxwYXltZW50RGVzY3JpcHRpb24+eHh4eHh4eDwvcGF5bWVudERlc2NyaXB0aW9uPgoJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCTxjb21wYW55TmFtZT54eHh4eHh4eDwvY29tcGFueU5hbWU+CgkJCTxwYXltZW50VG9rZW4+dDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwNDA8L3BheW1lbnRUb2tlbj4KCQkJPHRyYW5zZmVyTGlzdD4KCQkJCTx0cmFuc2Zlcj4KCQkJCQk8aWRUcmFuc2Zlcj4xPC9pZFRyYW5zZmVyPgoJCQkJCTx0cmFuc2ZlckFtb3VudD4xMDAuMDA8L3RyYW5zZmVyQW1vdW50PgoJCQkJCTxmaXNjYWxDb2RlUEE+Nzc3Nzc3Nzc3Nzc8L2Zpc2NhbENvZGVQQT4KCQkJCQk8SUJBTj5JVDE4VTAwMDAwMDAwMDAwMDAwMDAwMDAwMDE8L0lCQU4+CgkJCQkJPHJlbWl0dGFuY2VJbmZvcm1hdGlvbj54eHh4eHg8L3JlbWl0dGFuY2VJbmZvcm1hdGlvbj4KCQkJCQk8bWV0YWRhdGE+CgkJCQkJCTxtYXBFbnRyeT4KCQkJCQkJCTxrZXk+Y2hpYXZlX3RyYW5zZmVyXzFfMTwva2V5PgoJCQkJCQkJPHZhbHVlPnZhbHVlX3RyYW5zZmVyXzFfMTwvdmFsdWU+CgkJCQkJCTwvbWFwRW50cnk+CgkJCQkJCTxtYXBFbnRyeT4KCQkJCQkJCTxrZXk+Y2hpYXZlX3RyYW5zZmVyXzFfMjwva2V5PgoJCQkJCQkJPHZhbHVlPnZhbHVlX3RyYW5zZmVyXzFfMjwvdmFsdWU+CgkJCQkJCTwvbWFwRW50cnk+CgkJCQkJPC9tZXRhZGF0YT4KCQkJCTwvdHJhbnNmZXI+CgkJCQk8dHJhbnNmZXI+CgkJCQkJPGlkVHJhbnNmZXI+MjwvaWRUcmFuc2Zlcj4KCQkJCQk8dHJhbnNmZXJBbW91bnQ+NTAuMDA8L3RyYW5zZmVyQW1vdW50PgoJCQkJCTxmaXNjYWxDb2RlUEE+Nzc3Nzc3Nzc3Nzg8L2Zpc2NhbENvZGVQQT4KCQkJCQk8SUJBTj5JVDE4VTAwMDAwMDAwMDAwMDAwMDAwMDAwMDI8L0lCQU4+CgkJCQkJPHJlbWl0dGFuY2VJbmZvcm1hdGlvbj54eHh4eHh4eDwvcmVtaXR0YW5jZUluZm9ybWF0aW9uPgoJCQkJCTxtZXRhZGF0YT4KCQkJCQkJPG1hcEVudHJ5PgoJCQkJCQkJPGtleT5jaGlhdmVfdHJhbnNmZXJfMl8xPC9rZXk+CgkJCQkJCQk8dmFsdWU+dmFsdWVfdHJhbnNmZXJfMl8xPC92YWx1ZT4KCQkJCQkJPC9tYXBFbnRyeT4KCQkJCQkJPG1hcEVudHJ5PgoJCQkJCQkJPGtleT5jaGlhdmVfdHJhbnNmZXJfMl8yPC9rZXk+CgkJCQkJCQk8dmFsdWU+dmFsdWVfdHJhbnNmZXJfMl8yPC92YWx1ZT4KCQkJCQkJPC9tYXBFbnRyeT4KCQkJCQkJPG1hcEVudHJ5PgoJCQkJCQkJPGtleT5jaGlhdmVfdHJhbnNmZXJfMl8zPC9rZXk+CgkJCQkJCQk8dmFsdWU+dmFsdWVfdHJhbnNmZXJfMl8zPC92YWx1ZT4KCQkJCQkJPC9tYXBFbnRyeT4KCQkJCQk8L21ldGFkYXRhPgoJCQkJPC90cmFuc2Zlcj4KCQkJCTx0cmFuc2Zlcj4KCQkJCQk8aWRUcmFuc2Zlcj4zPC9pZFRyYW5zZmVyPgoJCQkJCTx0cmFuc2ZlckFtb3VudD4zMC4wMDwvdHJhbnNmZXJBbW91bnQ+CgkJCQkJPGZpc2NhbENvZGVQQT43Nzc3Nzc3Nzc3OTwvZmlzY2FsQ29kZVBBPgoJCQkJCTxJQkFOPklUMThVMDAwMDAwMDAwMDAwMDAwMDAwMDAwMzwvSUJBTj4KCQkJCQk8cmVtaXR0YW5jZUluZm9ybWF0aW9uPnh4eHh4eHh4PC9yZW1pdHRhbmNlSW5mb3JtYXRpb24+CgkJCQk8L3RyYW5zZmVyPgoJCQk8L3RyYW5zZmVyTGlzdD4KCQkJPGNyZWRpdG9yUmVmZXJlbmNlSWQ+MDEwMDAwMDAwMDAwMDAwNDA8L2NyZWRpdG9yUmVmZXJlbmNlSWQ+CgkJPC9uZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVzPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4=',
];
Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);













$data_req = [
    ':id'                       => 70,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 10:40:00.197',
    ':tipoevento'               => 'nodoInviaCarrelloRPT',
    ':sottotipoevento'          => 'REQ',
    ':iddominio'                => '',
    ':iuv'                      => '',
    ':ccp'                      => '',
    ':noticenumber'             => '',
    ':creditorreferenceid'      => '',
    ':paymenttoken'             => '',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000040',
    ':sessionidoriginal'        => 'session_id_original_000040',
    ':uniqueid'                 => 'T000070',
    ':payload'                  => 'PFNPQVAtRU5WOkVudmVsb3BlIHhtbG5zOlNPQVAtRU5WPSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyIgeG1sbnM6cHB0PSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOndzPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyI+Cgk8U09BUC1FTlY6SGVhZGVyPgoJCTxwcHQ6aW50ZXN0YXppb25lQ2FycmVsbG9QUFQ+CgkJCTxpZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QQT43Nzc3Nzc3Nzc3NzwvaWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUEE+CgkJCTxpZGVudGlmaWNhdGl2b1N0YXppb25lSW50ZXJtZWRpYXJpb1BBPjc3Nzc3Nzc3Nzc3XzAxPC9pZGVudGlmaWNhdGl2b1N0YXppb25lSW50ZXJtZWRpYXJpb1BBPgoJCQk8aWRlbnRpZmljYXRpdm9DYXJyZWxsbz5jMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDA0MTwvaWRlbnRpZmljYXRpdm9DYXJyZWxsbz4KCQk8L3BwdDppbnRlc3RhemlvbmVDYXJyZWxsb1BQVD4KCTwvU09BUC1FTlY6SGVhZGVyPgoJPFNPQVAtRU5WOkJvZHk+CgkJPG5zMzpub2RvSW52aWFDYXJyZWxsb1JQVCB4bWxuczpuczM9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIj4KCQkJPHBhc3N3b3JkPlBMQUNFSE9MREVSPC9wYXNzd29yZD4KCQkJPGlkZW50aWZpY2F0aXZvUFNQPkFHSURfMDE8L2lkZW50aWZpY2F0aXZvUFNQPgoJCQk8aWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUFNQPjg4ODg4ODg4ODg4PC9pZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QU1A+CgkJCTxpZGVudGlmaWNhdGl2b0NhbmFsZT44ODg4ODg4ODg4OF8wMTwvaWRlbnRpZmljYXRpdm9DYW5hbGU+CgkJCTxsaXN0YVJQVD4KCQkJCTxlbGVtZW50b0xpc3RhUlBUPgoJCQkJCTxpZGVudGlmaWNhdGl2b0RvbWluaW8+Nzc3Nzc3Nzc3Nzc8L2lkZW50aWZpY2F0aXZvRG9taW5pbz4KCQkJCQk8aWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4wMTAwMDAwMDAwMDAwMDA0MTwvaWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4KCQkJCQk8Y29kaWNlQ29udGVzdG9QYWdhbWVudG8+dDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwNDE8L2NvZGljZUNvbnRlc3RvUGFnYW1lbnRvPgoJCQkJCTxycHQ+UEZKUVZDQjRiV3h1Y3owaWFIUjBjRG92TDNkM2R5NWthV2RwZEhCaExtZHZkaTVwZEM5elkyaGxiV0Z6THpJd01URXZVR0ZuWVcxbGJuUnBMeUkrQ2drOGRtVnljMmx2Ym1WUFoyZGxkSFJ2UGpFdU1Ed3ZkbVZ5YzJsdmJtVlBaMmRsZEhSdlBnb0pQR1J2YldsdWFXOCtDZ2tKUEdsa1pXNTBhV1pwWTJGMGFYWnZSRzl0YVc1cGJ6NDNOemMzTnpjM056YzNOend2YVdSbGJuUnBabWxqWVhScGRtOUViMjFwYm1sdlBnb0pQQzlrYjIxcGJtbHZQZ29KUEdsa1pXNTBhV1pwWTJGMGFYWnZUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQakl3TWpNeE1qRTFNREV3TVRVek9XRmlZbUV6TXpVdFlXSTBaUzAwWkRFNExXRXpQQzlwWkdWdWRHbG1hV05oZEdsMmIwMWxjM05oWjJkcGIxSnBZMmhwWlhOMFlUNEtDVHhrWVhSaFQzSmhUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQakl3TWpNdE1USXRNVFZVTVRNNk1ERTZOVE11TmpFNUt6QXhPakF3UEM5a1lYUmhUM0poVFdWemMyRm5aMmx2VW1samFHbGxjM1JoUGdvSlBHRjFkR1Z1ZEdsallYcHBiMjVsVTI5bloyVjBkRzgrVGk5QlBDOWhkWFJsYm5ScFkyRjZhVzl1WlZOdloyZGxkSFJ2UGdvSlBITnZaMmRsZEhSdlZtVnljMkZ1ZEdVK0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFabGNuTmhiblJsUGdvSkNRazhkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NUhQQzkwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1FrOFkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBqYzNOemMzTnpjM056YzNQQzlqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSlBDOXBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlXWlhKellXNTBaVDRLQ1FrOFlXNWhaM0poWm1sallWWmxjbk5oYm5SbFBuaDRlSGg0ZUhoNGVEd3ZZVzVoWjNKaFptbGpZVlpsY25OaGJuUmxQZ29KUEM5emIyZG5aWFIwYjFabGNuTmhiblJsUGdvSlBITnZaMmRsZEhSdlVHRm5ZWFJ2Y21VK0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFCaFoyRjBiM0psUGdvSkNRazhkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NUhQQzkwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1FrOFkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBqYzNOemMzTnpjM056YzNQQzlqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSlBDOXBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlRWVdkaGRHOXlaVDRLQ1FrOFlXNWhaM0poWm1sallWQmhaMkYwYjNKbFBuaDRlSGg0ZUhoNGVEd3ZZVzVoWjNKaFptbGpZVkJoWjJGMGIzSmxQZ29KUEM5emIyZG5aWFIwYjFCaFoyRjBiM0psUGdvSlBHVnVkR1ZDWlc1bFptbGphV0Z5YVc4K0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjBKbGJtVm1hV05wWVhKcGJ6NEtDUWtKUEhScGNHOUpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrUnp3dmRHbHdiMGxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno0S0NRa0pQR052WkdsalpVbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejQzTnpjM056YzNOemMzTnp3dlkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBnb0pDVHd2YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlFtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4a1pXNXZiV2x1WVhwcGIyNWxRbVZ1WldacFkybGhjbWx2UG5oNGVIaDRlSGc4TDJSbGJtOXRhVzVoZW1sdmJtVkNaVzVsWm1samFXRnlhVzgrQ2drSlBHTnZaR2xqWlZWdWFYUlBjR1Z5UW1WdVpXWnBZMmxoY21sdlBuaDRQQzlqYjJScFkyVlZibWwwVDNCbGNrSmxibVZtYVdOcFlYSnBiejRLQ1FrOFpHVnViMjFWYm1sMFQzQmxja0psYm1WbWFXTnBZWEpwYno1NGVIaDRlSGc4TDJSbGJtOXRWVzVwZEU5d1pYSkNaVzVsWm1samFXRnlhVzgrQ2drSlBHbHVaR2x5YVhwNmIwSmxibVZtYVdOcFlYSnBiejU0ZUhoNFBDOXBibVJwY21sNmVtOUNaVzVsWm1samFXRnlhVzgrQ2drSlBHTnBkbWxqYjBKbGJtVm1hV05wWVhKcGJ6NTRlSGc4TDJOcGRtbGpiMEpsYm1WbWFXTnBZWEpwYno0S0NRazhZMkZ3UW1WdVpXWnBZMmxoY21sdlBuaDRlSGg0UEM5allYQkNaVzVsWm1samFXRnlhVzgrQ2drSlBHeHZZMkZzYVhSaFFtVnVaV1pwWTJsaGNtbHZQbmg0ZUhnOEwyeHZZMkZzYVhSaFFtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4d2NtOTJhVzVqYVdGQ1pXNWxabWxqYVdGeWFXOCtlSGc4TDNCeWIzWnBibU5wWVVKbGJtVm1hV05wWVhKcGJ6NEtDUWs4Ym1GNmFXOXVaVUpsYm1WbWFXTnBZWEpwYno1NGVEd3ZibUY2YVc5dVpVSmxibVZtYVdOcFlYSnBiejRLQ1R3dlpXNTBaVUpsYm1WbWFXTnBZWEpwYno0S0NUeGtZWFJwVm1WeWMyRnRaVzUwYno0S0NRazhaR0YwWVVWelpXTjFlbWx2Ym1WUVlXZGhiV1Z1ZEc4K01qQXlNeTB4TWkweE5Tc3dNVG93TUR3dlpHRjBZVVZ6WldOMWVtbHZibVZRWVdkaGJXVnVkRzgrQ2drSlBHbHRjRzl5ZEc5VWIzUmhiR1ZFWVZabGNuTmhjbVUrTmpBd0xqQXdQQzlwYlhCdmNuUnZWRzkwWVd4bFJHRldaWEp6WVhKbFBnb0pDVHgwYVhCdlZtVnljMkZ0Wlc1MGJ6NUNRbFE4TDNScGNHOVdaWEp6WVcxbGJuUnZQZ29KQ1R4cFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOVdaWEp6WVcxbGJuUnZQakF4TURBd01EQXdNREF3TURBd01EUXhQQzlwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5V1pYSnpZVzFsYm5SdlBnb0pDVHhqYjJScFkyVkRiMjUwWlhOMGIxQmhaMkZ0Wlc1MGJ6NTBNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREEwTVR3dlkyOWthV05sUTI5dWRHVnpkRzlRWVdkaGJXVnVkRzgrQ2drSlBHWnBjbTFoVW1salpYWjFkR0UrTUR3dlptbHliV0ZTYVdObGRuVjBZVDRLQ1FrOFpHRjBhVk5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KQ1FrOGFXMXdiM0owYjFOcGJtZHZiRzlXWlhKellXMWxiblJ2UGpZd01DNHdNRHd2YVcxd2IzSjBiMU5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KQ1FrOGFXSmhia0ZqWTNKbFpHbDBiejVKVkRFNFZUQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNVEE4TDJsaVlXNUJZMk55WldScGRHOCtDZ2tKQ1R4allYVnpZV3hsVm1WeWMyRnRaVzUwYno1NGVIaDRlSGg0UEM5allYVnpZV3hsVm1WeWMyRnRaVzUwYno0S0NRa0pQR1JoZEdsVGNHVmphV1pwWTJsU2FYTmpiM056YVc5dVpUNTRlSGg0ZUhoNFBDOWtZWFJwVTNCbFkybG1hV05wVW1selkyOXpjMmx2Ym1VK0Nna0pQQzlrWVhScFUybHVaMjlzYjFabGNuTmhiV1Z1ZEc4K0NnazhMMlJoZEdsV1pYSnpZVzFsYm5SdlBnbzhMMUpRVkQ0PTwvcnB0PgoJCQkJPC9lbGVtZW50b0xpc3RhUlBUPgoJCQk8L2xpc3RhUlBUPgoJCQk8bXVsdGlCZW5lZmljaWFyaW8+ZmFsc2U8L211bHRpQmVuZWZpY2lhcmlvPgoJCTwvbnMzOm5vZG9JbnZpYUNhcnJlbGxvUlBUPgoJPC9TT0FQLUVOVjpCb2R5Pgo8L1NPQVAtRU5WOkVudmVsb3BlPg==',
];
$data_resp = [
    ':id'                       => 71,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 10:40:01.197',
    ':tipoevento'               => 'nodoInviaCarrelloRPT',
    ':sottotipoevento'          => 'RESP',
    ':iddominio'                => '',
    ':iuv'                      => '',
    ':ccp'                      => '',
    ':noticenumber'             => '',
    ':creditorreferenceid'      => '',
    ':paymenttoken'             => '',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000040',
    ':sessionidoriginal'        => 'session_id_original_000040',
    ':uniqueid'                 => 'T000071',
    ':payload'                  => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpwcHQ9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIiB4bWxuczpwcHRoZWFkPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIiB4bWxuczp0bnM9Imh0dHA6Ly9Ob2RvUGFnYW1lbnRpU1BDLnNwY29vcC5nb3YuaXQvc2Vydml6aS9QYWdhbWVudGlUZWxlbWF0aWNpUlBUIiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBwdDpub2RvSW52aWFDYXJyZWxsb1JQVFJpc3Bvc3RhPgoJCQk8ZXNpdG9Db21wbGVzc2l2b09wZXJhemlvbmU+T0s8L2VzaXRvQ29tcGxlc3Npdm9PcGVyYXppb25lPgoJCQk8dXJsPmh0dHBzOi8vd2lzcDIucGFnb3BhLmdvdi5pdC93YWxsZXQvd2VsY29tZT9pZFNlc3Npb249NjA2N2FiMGItMGIxNi00NDVhLThlN2MtZGVkZGQ3Y2IxYzZiPC91cmw+CgkJPC9wcHQ6bm9kb0ludmlhQ2FycmVsbG9SUFRSaXNwb3N0YT4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+',
];

Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);


$data_req = [
    ':id' => 72,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 10:42:00.197',
    ':tipoevento' => 'pspInviaCarrelloRPT',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '',
    ':iuv' => '',
    ':ccp' => '',
    ':noticenumber' => '',
    ':creditorreferenceid' => '',
    ':paymenttoken' => '',
    ':psp' => 'PSP_RT',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_000041',
    ':sessionidoriginal' => 'session_id_original_000040',
    ':uniqueid' => 'T000072',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpwYXlfaj0iaHR0cDovL3d3dy5jbmlwYS5nb3YuaXQvc2NoZW1hcy8yMDEwL1BhZ2FtZW50aS9BY2tfMV8wLyIgeG1sbnM6cHB0PSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnRucz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0IiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBwdDpwc3BJbnZpYUNhcnJlbGxvUlBUPgoJCQk8aWRlbnRpZmljYXRpdm9QU1A+UFNQX1JQVDwvaWRlbnRpZmljYXRpdm9QU1A+CgkJCTxpZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QU1A+ODg4ODg4ODg4ODg8L2lkZW50aWZpY2F0aXZvSW50ZXJtZWRpYXJpb1BTUD4KCQkJPGlkZW50aWZpY2F0aXZvQ2FuYWxlPjg4ODg4ODg4ODg4XzAxPC9pZGVudGlmaWNhdGl2b0NhbmFsZT4KCQkJPG1vZGVsbG9QYWdhbWVudG8+MTwvbW9kZWxsb1BhZ2FtZW50bz4KCQkJPGxpc3RhUlBUPgoJCQkJPGVsZW1lbnRvTGlzdGFDYXJyZWxsb1JQVD4KCQkJCQk8aWRlbnRpZmljYXRpdm9Eb21pbmlvPjc3Nzc3Nzc3Nzc3PC9pZGVudGlmaWNhdGl2b0RvbWluaW8+CgkJCQkJPGlkZW50aWZpY2F0aXZvVW5pdm9jb1ZlcnNhbWVudG8+MDEwMDAwMDAwMDAwMDAwNDE8L2lkZW50aWZpY2F0aXZvVW5pdm9jb1ZlcnNhbWVudG8+CgkJCQkJPGNvZGljZUNvbnRlc3RvUGFnYW1lbnRvPnQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDQxPC9jb2RpY2VDb250ZXN0b1BhZ2FtZW50bz4KCQkJCQk8cnB0PlBGSlFWQ0I0Yld4dWN6MGlhSFIwY0RvdkwzZDNkeTVrYVdkcGRIQmhMbWR2ZGk1cGRDOXpZMmhsYldGekx6SXdNVEV2VUdGbllXMWxiblJwTHlJK0NpQWdJQ0E4ZG1WeWMybHZibVZQWjJkbGRIUnZQall1TWk0d1BDOTJaWEp6YVc5dVpVOW5aMlYwZEc4K0NpQWdJQ0E4Wkc5dGFXNXBiejRLSUNBZ0lDQWdJQ0E4YVdSbGJuUnBabWxqWVhScGRtOUViMjFwYm1sdlBqYzNOemMzTnpjM056YzNQQzlwWkdWdWRHbG1hV05oZEdsMmIwUnZiV2x1YVc4K0NpQWdJQ0FnSUNBZ1BHbGtaVzUwYVdacFkyRjBhWFp2VTNSaGVtbHZibVZTYVdOb2FXVmtaVzUwWlQ0M056YzNOemMzTnpjM04xOHdNVHd2YVdSbGJuUnBabWxqWVhScGRtOVRkR0Y2YVc5dVpWSnBZMmhwWldSbGJuUmxQZ29nSUNBZ1BDOWtiMjFwYm1sdlBnb2dJQ0FnUEdsa1pXNTBhV1pwWTJGMGFYWnZUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQbVl6WldNek5tUmlOemhrWVRRME5HWmhZalJqWmpCbU9UQTRPV0ptWkRrd1BDOXBaR1Z1ZEdsbWFXTmhkR2wyYjAxbGMzTmhaMmRwYjFKcFkyaHBaWE4wWVQ0S0lDQWdJRHhrWVhSaFQzSmhUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQakl3TWpRdE1EUXRNRGxVTWpFNk5UTTZNelk4TDJSaGRHRlBjbUZOWlhOellXZG5hVzlTYVdOb2FXVnpkR0UrQ2lBZ0lDQThZWFYwWlc1MGFXTmhlbWx2Ym1WVGIyZG5aWFIwYno1NGVIZzhMMkYxZEdWdWRHbGpZWHBwYjI1bFUyOW5aMlYwZEc4K0NpQWdJQ0E4YzI5bloyVjBkRzlRWVdkaGRHOXlaVDRLSUNBZ0lDQWdJQ0E4YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlVHRm5ZWFJ2Y21VK0NpQWdJQ0FnSUNBZ0lDQWdJRHgwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQbmc4TDNScGNHOUpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2lBZ0lDQWdJQ0FnSUNBZ0lEeGpiMlJwWTJWSlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtlSGg0ZUhoNGVEd3ZZMjlrYVdObFNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29nSUNBZ0lDQWdJRHd2YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlVHRm5ZWFJ2Y21VK0NpQWdJQ0FnSUNBZ1BHRnVZV2R5WVdacFkyRlFZV2RoZEc5eVpUNTRlSGg0ZUR3dllXNWhaM0poWm1sallWQmhaMkYwYjNKbFBnb2dJQ0FnSUNBZ0lEeHVZWHBwYjI1bFVHRm5ZWFJ2Y21VK1NWUThMMjVoZW1sdmJtVlFZV2RoZEc5eVpUNEtJQ0FnSUNBZ0lDQThaUzF0WVdsc1VHRm5ZWFJ2Y21VK2VIaDRlSGhBZUhoNGVDNWpiMjA4TDJVdGJXRnBiRkJoWjJGMGIzSmxQZ29nSUNBZ1BDOXpiMmRuWlhSMGIxQmhaMkYwYjNKbFBnb2dJQ0FnUEdWdWRHVkNaVzVsWm1samFXRnlhVzgrQ2lBZ0lDQWdJQ0FnUEdsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amIwSmxibVZtYVdOcFlYSnBiejRLSUNBZ0lDQWdJQ0FnSUNBZ1BIUnBjRzlKWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI4K1J6d3ZkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NEtJQ0FnSUNBZ0lDQWdJQ0FnUEdOdlpHbGpaVWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno1NGVIaDRlSGc4TDJOdlpHbGpaVWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno0S0lDQWdJQ0FnSUNBOEwybGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiMEpsYm1WbWFXTnBZWEpwYno0S0lDQWdJQ0FnSUNBOFpHVnViMjFwYm1GNmFXOXVaVUpsYm1WbWFXTnBZWEpwYno1NGVIaDRlRHd2WkdWdWIyMXBibUY2YVc5dVpVSmxibVZtYVdOcFlYSnBiejRLSUNBZ0lEd3ZaVzUwWlVKbGJtVm1hV05wWVhKcGJ6NEtJQ0FnSUR4a1lYUnBWbVZ5YzJGdFpXNTBiejRLSUNBZ0lDQWdJQ0E4WkdGMFlVVnpaV04xZW1sdmJtVlFZV2RoYldWdWRHOCtNakF5TkMwd05DMHdPVHd2WkdGMFlVVnpaV04xZW1sdmJtVlFZV2RoYldWdWRHOCtDaUFnSUNBZ0lDQWdQR2x0Y0c5eWRHOVViM1JoYkdWRVlWWmxjbk5oY21VK05qQXdMakF3UEM5cGJYQnZjblJ2Vkc5MFlXeGxSR0ZXWlhKellYSmxQZ29nSUNBZ0lDQWdJRHgwYVhCdlZtVnljMkZ0Wlc1MGJ6NURVRHd2ZEdsd2IxWmxjbk5oYldWdWRHOCtDaUFnSUNBZ0lDQWdQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFabGNuTmhiV1Z1ZEc4K01ERXdNREF3TURBd01EQXdNREF3TkRFOEwybGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiMVpsY25OaGJXVnVkRzgrQ2lBZ0lDQWdJQ0FnUEdOdlpHbGpaVU52Ym5SbGMzUnZVR0ZuWVcxbGJuUnZQblF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURReFBDOWpiMlJwWTJWRGIyNTBaWE4wYjFCaFoyRnRaVzUwYno0S0lDQWdJQ0FnSUNBOFptbHliV0ZTYVdObGRuVjBZVDR3UEM5bWFYSnRZVkpwWTJWMmRYUmhQZ29nSUNBZ0lDQWdJRHhrWVhScFUybHVaMjlzYjFabGNuTmhiV1Z1ZEc4K0NpQWdJQ0FnSUNBZ0lDQWdJRHhwYlhCdmNuUnZVMmx1WjI5c2IxWmxjbk5oYldWdWRHOCtOakF3TGpBd1BDOXBiWEJ2Y25SdlUybHVaMjlzYjFabGNuTmhiV1Z1ZEc4K0NpQWdJQ0FnSUNBZ0lDQWdJRHhwWW1GdVFXTmpjbVZrYVhSdlBrbFVNVGhWTURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01Ud3ZhV0poYmtGalkzSmxaR2wwYno0S0lDQWdJQ0FnSUNBZ0lDQWdQR05oZFhOaGJHVldaWEp6WVcxbGJuUnZQbmg0ZUhoNGVIZzhMMk5oZFhOaGJHVldaWEp6WVcxbGJuUnZQZ29nSUNBZ0lDQWdJQ0FnSUNBOFpHRjBhVk53WldOcFptbGphVkpwYzJOdmMzTnBiMjVsUG5oNGVIaDRlSGc4TDJSaGRHbFRjR1ZqYVdacFkybFNhWE5qYjNOemFXOXVaVDRLSUNBZ0lDQWdJQ0E4TDJSaGRHbFRhVzVuYjJ4dlZtVnljMkZ0Wlc1MGJ6NEtJQ0FnSUR3dlpHRjBhVlpsY25OaGJXVnVkRzgrQ2p3dlVsQlVQZz09PC9ycHQ+CgkJCQk8L2VsZW1lbnRvTGlzdGFDYXJyZWxsb1JQVD4KCQkJPC9saXN0YVJQVD4KCQk8L3BwdDpwc3BJbnZpYUNhcnJlbGxvUlBUPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4=',
];

$data_resp = [
    ':id' => 73,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 10:42:01.197',
    ':tipoevento' => 'pspInviaCarrelloRPT',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '',
    ':iuv' => '',
    ':ccp' => '',
    ':noticenumber' => '',
    ':creditorreferenceid' => '',
    ':paymenttoken' => '',
    ':psp' => 'PSP_RT',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_000041',
    ':sessionidoriginal' => 'session_id_original_000040',
    ':uniqueid' => 'T000073',
    ':payload' => 'PD94bWwgdmVyc2lvbj0nMS4wJyBlbmNvZGluZz0nVVRGLTgnPz4KPHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPgoJPHNvYXBlbnY6Qm9keT4KCQk8bnMyOnBzcEludmlhQ2FycmVsbG9SUFRSZXNwb25zZSB4bWxuczpuczI9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIj4KCQkJPHBzcEludmlhQ2FycmVsbG9SUFRSZXNwb25zZSB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIiB4c2k6dHlwZT0ibnMyOmVzaXRvUHNwSW52aWFDYXJyZWxsb1JQVCI+CgkJCQk8ZXNpdG9Db21wbGVzc2l2b09wZXJhemlvbmU+T0s8L2VzaXRvQ29tcGxlc3Npdm9PcGVyYXppb25lPgoJCQkJPGlkZW50aWZpY2F0aXZvQ2FycmVsbG8+eHh4eHh4eHh4eHh4eDwvaWRlbnRpZmljYXRpdm9DYXJyZWxsbz4KCQkJCTxwYXJhbWV0cmlQYWdhbWVudG9JbW1lZGlhdG8+aWRCcnVjaWF0dXJhPXh4dzIyPC9wYXJhbWV0cmlQYWdhbWVudG9JbW1lZGlhdG8+CgkJCTwvcHNwSW52aWFDYXJyZWxsb1JQVFJlc3BvbnNlPgoJCTwvbnMyOnBzcEludmlhQ2FycmVsbG9SUFRSZXNwb25zZT4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+',
];


Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);


$data_req = [
    ':id' => 74,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 10:45:00.197',
    ':tipoevento' => 'nodoInviaCarrelloRPT',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '',
    ':iuv' => '',
    ':ccp' => '',
    ':noticenumber' => '',
    ':creditorreferenceid' => '',
    ':paymenttoken' => '',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_000041',
    ':sessionidoriginal' => 'session_id_original_000041',
    ':uniqueid' => 'T000074',
    ':payload' => 'PFNPQVAtRU5WOkVudmVsb3BlIHhtbG5zOlNPQVAtRU5WPSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyIgeG1sbnM6cHB0PSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOndzPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyI+Cgk8U09BUC1FTlY6SGVhZGVyPgoJCTxwcHQ6aW50ZXN0YXppb25lQ2FycmVsbG9QUFQ+CgkJCTxpZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QQT43Nzc3Nzc3Nzc3NzwvaWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUEE+CgkJCTxpZGVudGlmaWNhdGl2b1N0YXppb25lSW50ZXJtZWRpYXJpb1BBPjc3Nzc3Nzc3Nzc3XzAxPC9pZGVudGlmaWNhdGl2b1N0YXppb25lSW50ZXJtZWRpYXJpb1BBPgoJCQk8aWRlbnRpZmljYXRpdm9DYXJyZWxsbz5jMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDA0MjwvaWRlbnRpZmljYXRpdm9DYXJyZWxsbz4KCQk8L3BwdDppbnRlc3RhemlvbmVDYXJyZWxsb1BQVD4KCTwvU09BUC1FTlY6SGVhZGVyPgoJPFNPQVAtRU5WOkJvZHk+CgkJPG5zMzpub2RvSW52aWFDYXJyZWxsb1JQVCB4bWxuczpuczM9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIj4KCQkJPHBhc3N3b3JkPlBMQUNFSE9MREVSPC9wYXNzd29yZD4KCQkJPGlkZW50aWZpY2F0aXZvUFNQPkFHSURfMDE8L2lkZW50aWZpY2F0aXZvUFNQPgoJCQk8aWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUFNQPjg4ODg4ODg4ODg4PC9pZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QU1A+CgkJCTxpZGVudGlmaWNhdGl2b0NhbmFsZT44ODg4ODg4ODg4OF8wMTwvaWRlbnRpZmljYXRpdm9DYW5hbGU+CgkJCTxsaXN0YVJQVD4KCQkJCTxlbGVtZW50b0xpc3RhUlBUPgoJCQkJCTxpZGVudGlmaWNhdGl2b0RvbWluaW8+Nzc3Nzc3Nzc3Nzc8L2lkZW50aWZpY2F0aXZvRG9taW5pbz4KCQkJCQk8aWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4wMTAwMDAwMDAwMDAwMDA0MjwvaWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4KCQkJCQk8Y29kaWNlQ29udGVzdG9QYWdhbWVudG8+dDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwNDI8L2NvZGljZUNvbnRlc3RvUGFnYW1lbnRvPgoJCQkJCTxycHQ+UEZKUVZDQjRiV3h1Y3owaWFIUjBjRG92TDNkM2R5NWthV2RwZEhCaExtZHZkaTVwZEM5elkyaGxiV0Z6THpJd01URXZVR0ZuWVcxbGJuUnBMeUkrQ2drOGRtVnljMmx2Ym1WUFoyZGxkSFJ2UGpFdU1Ed3ZkbVZ5YzJsdmJtVlBaMmRsZEhSdlBnb0pQR1J2YldsdWFXOCtDZ2tKUEdsa1pXNTBhV1pwWTJGMGFYWnZSRzl0YVc1cGJ6NDNOemMzTnpjM056YzNOend2YVdSbGJuUnBabWxqWVhScGRtOUViMjFwYm1sdlBnb0pQQzlrYjIxcGJtbHZQZ29KUEdsa1pXNTBhV1pwWTJGMGFYWnZUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQakl3TWpNeE1qRTFNREV3TVRVek9XRmlZbUV6TXpVdFlXSTBaUzAwWkRFNExXRXpQQzlwWkdWdWRHbG1hV05oZEdsMmIwMWxjM05oWjJkcGIxSnBZMmhwWlhOMFlUNEtDVHhrWVhSaFQzSmhUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQakl3TWpNdE1USXRNVFZVTVRNNk1ERTZOVE11TmpFNUt6QXhPakF3UEM5a1lYUmhUM0poVFdWemMyRm5aMmx2VW1samFHbGxjM1JoUGdvSlBHRjFkR1Z1ZEdsallYcHBiMjVsVTI5bloyVjBkRzgrVGk5QlBDOWhkWFJsYm5ScFkyRjZhVzl1WlZOdloyZGxkSFJ2UGdvSlBITnZaMmRsZEhSdlZtVnljMkZ1ZEdVK0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFabGNuTmhiblJsUGdvSkNRazhkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NUhQQzkwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1FrOFkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBqYzNOemMzTnpjM056YzNQQzlqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSlBDOXBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlXWlhKellXNTBaVDRLQ1FrOFlXNWhaM0poWm1sallWWmxjbk5oYm5SbFBuaDRlSGg0ZUhoNGVEd3ZZVzVoWjNKaFptbGpZVlpsY25OaGJuUmxQZ29KUEM5emIyZG5aWFIwYjFabGNuTmhiblJsUGdvSlBITnZaMmRsZEhSdlVHRm5ZWFJ2Y21VK0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFCaFoyRjBiM0psUGdvSkNRazhkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NUhQQzkwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1FrOFkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBqYzNOemMzTnpjM056YzNQQzlqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSlBDOXBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlRWVdkaGRHOXlaVDRLQ1FrOFlXNWhaM0poWm1sallWQmhaMkYwYjNKbFBuaDRlSGg0ZUhoNGVEd3ZZVzVoWjNKaFptbGpZVkJoWjJGMGIzSmxQZ29KUEM5emIyZG5aWFIwYjFCaFoyRjBiM0psUGdvSlBHVnVkR1ZDWlc1bFptbGphV0Z5YVc4K0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjBKbGJtVm1hV05wWVhKcGJ6NEtDUWtKUEhScGNHOUpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrUnp3dmRHbHdiMGxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno0S0NRa0pQR052WkdsalpVbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejQzTnpjM056YzNOemMzTnp3dlkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBnb0pDVHd2YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlFtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4a1pXNXZiV2x1WVhwcGIyNWxRbVZ1WldacFkybGhjbWx2UG5oNGVIaDRlSGc4TDJSbGJtOXRhVzVoZW1sdmJtVkNaVzVsWm1samFXRnlhVzgrQ2drSlBHTnZaR2xqWlZWdWFYUlBjR1Z5UW1WdVpXWnBZMmxoY21sdlBuaDRQQzlqYjJScFkyVlZibWwwVDNCbGNrSmxibVZtYVdOcFlYSnBiejRLQ1FrOFpHVnViMjFWYm1sMFQzQmxja0psYm1WbWFXTnBZWEpwYno1NGVIaDRlSGc4TDJSbGJtOXRWVzVwZEU5d1pYSkNaVzVsWm1samFXRnlhVzgrQ2drSlBHbHVaR2x5YVhwNmIwSmxibVZtYVdOcFlYSnBiejU0ZUhoNFBDOXBibVJwY21sNmVtOUNaVzVsWm1samFXRnlhVzgrQ2drSlBHTnBkbWxqYjBKbGJtVm1hV05wWVhKcGJ6NTRlSGc4TDJOcGRtbGpiMEpsYm1WbWFXTnBZWEpwYno0S0NRazhZMkZ3UW1WdVpXWnBZMmxoY21sdlBuaDRlSGg0UEM5allYQkNaVzVsWm1samFXRnlhVzgrQ2drSlBHeHZZMkZzYVhSaFFtVnVaV1pwWTJsaGNtbHZQbmg0ZUhnOEwyeHZZMkZzYVhSaFFtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4d2NtOTJhVzVqYVdGQ1pXNWxabWxqYVdGeWFXOCtlSGc4TDNCeWIzWnBibU5wWVVKbGJtVm1hV05wWVhKcGJ6NEtDUWs4Ym1GNmFXOXVaVUpsYm1WbWFXTnBZWEpwYno1NGVEd3ZibUY2YVc5dVpVSmxibVZtYVdOcFlYSnBiejRLQ1R3dlpXNTBaVUpsYm1WbWFXTnBZWEpwYno0S0NUeGtZWFJwVm1WeWMyRnRaVzUwYno0S0NRazhaR0YwWVVWelpXTjFlbWx2Ym1WUVlXZGhiV1Z1ZEc4K01qQXlNeTB4TWkweE5Tc3dNVG93TUR3dlpHRjBZVVZ6WldOMWVtbHZibVZRWVdkaGJXVnVkRzgrQ2drSlBHbHRjRzl5ZEc5VWIzUmhiR1ZFWVZabGNuTmhjbVUrTXpBd0xqQXdQQzlwYlhCdmNuUnZWRzkwWVd4bFJHRldaWEp6WVhKbFBnb0pDVHgwYVhCdlZtVnljMkZ0Wlc1MGJ6NUNRbFE4TDNScGNHOVdaWEp6WVcxbGJuUnZQZ29KQ1R4cFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOVdaWEp6WVcxbGJuUnZQakF4TURBd01EQXdNREF3TURBd01EUXlQQzlwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5V1pYSnpZVzFsYm5SdlBnb0pDVHhqYjJScFkyVkRiMjUwWlhOMGIxQmhaMkZ0Wlc1MGJ6NTBNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREEwTWp3dlkyOWthV05sUTI5dWRHVnpkRzlRWVdkaGJXVnVkRzgrQ2drSlBHWnBjbTFoVW1salpYWjFkR0UrTUR3dlptbHliV0ZTYVdObGRuVjBZVDRLQ1FrOFpHRjBhVk5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KQ1FrOGFXMXdiM0owYjFOcGJtZHZiRzlXWlhKellXMWxiblJ2UGpNd01DNHdNRHd2YVcxd2IzSjBiMU5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KQ1FrOGFXSmhia0ZqWTNKbFpHbDBiejVKVkRFNFZUQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREU4TDJsaVlXNUJZMk55WldScGRHOCtDZ2tKQ1R4allYVnpZV3hsVm1WeWMyRnRaVzUwYno1NGVIaDRlSGg0UEM5allYVnpZV3hsVm1WeWMyRnRaVzUwYno0S0NRa0pQR1JoZEdsVGNHVmphV1pwWTJsU2FYTmpiM056YVc5dVpUNTRlSGg0ZUhoNFBDOWtZWFJwVTNCbFkybG1hV05wVW1selkyOXpjMmx2Ym1VK0Nna0pQQzlrWVhScFUybHVaMjlzYjFabGNuTmhiV1Z1ZEc4K0NnazhMMlJoZEdsV1pYSnpZVzFsYm5SdlBnbzhMMUpRVkQ0PTwvcnB0PgoJCQkJPC9lbGVtZW50b0xpc3RhUlBUPgoJCQk8L2xpc3RhUlBUPgoJCQk8bXVsdGlCZW5lZmljaWFyaW8+ZmFsc2U8L211bHRpQmVuZWZpY2lhcmlvPgoJCTwvbnMzOm5vZG9JbnZpYUNhcnJlbGxvUlBUPgoJPC9TT0FQLUVOVjpCb2R5Pgo8L1NPQVAtRU5WOkVudmVsb3BlPg==',
];
$data_resp = [
    ':id' => 75,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 10:45:01.197',
    ':tipoevento' => 'nodoInviaCarrelloRPT',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '',
    ':iuv' => '',
    ':ccp' => '',
    ':noticenumber' => '',
    ':creditorreferenceid' => '',
    ':paymenttoken' => '',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_000041',
    ':sessionidoriginal' => 'session_id_original_000041',
    ':uniqueid' => 'T000075',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpwcHQ9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIiB4bWxuczpwcHRoZWFkPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIiB4bWxuczp0bnM9Imh0dHA6Ly9Ob2RvUGFnYW1lbnRpU1BDLnNwY29vcC5nb3YuaXQvc2Vydml6aS9QYWdhbWVudGlUZWxlbWF0aWNpUlBUIiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBwdDpub2RvSW52aWFDYXJyZWxsb1JQVFJpc3Bvc3RhPgoJCQk8ZXNpdG9Db21wbGVzc2l2b09wZXJhemlvbmU+T0s8L2VzaXRvQ29tcGxlc3Npdm9PcGVyYXppb25lPgoJCQk8dXJsPmh0dHBzOi8vd2lzcDIucGFnb3BhLmdvdi5pdC93YWxsZXQvd2VsY29tZT9pZFNlc3Npb249NjA2N2FiMGItMGIxNi00NDVhLThlN2MtZGVkZGQ3Y2IxYzZiPC91cmw+CgkJPC9wcHQ6bm9kb0ludmlhQ2FycmVsbG9SUFRSaXNwb3N0YT4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+',
];

Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);


$data_req = [
    ':id' => 76,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 10:46:00.197',
    ':tipoevento' => 'pspInviaCarrelloRPT',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '',
    ':iuv' => '',
    ':ccp' => '',
    ':noticenumber' => '',
    ':creditorreferenceid' => '',
    ':paymenttoken' => '',
    ':psp' => 'PSP_RPT_2',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_000041',
    ':sessionidoriginal' => 'session_id_original_000041',
    ':uniqueid' => 'T000076',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpwYXlfaj0iaHR0cDovL3d3dy5jbmlwYS5nb3YuaXQvc2NoZW1hcy8yMDEwL1BhZ2FtZW50aS9BY2tfMV8wLyIgeG1sbnM6cHB0PSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnRucz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0IiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBwdDpwc3BJbnZpYUNhcnJlbGxvUlBUPgoJCQk8aWRlbnRpZmljYXRpdm9QU1A+UFNQX1JQVF8yPC9pZGVudGlmaWNhdGl2b1BTUD4KCQkJPGlkZW50aWZpY2F0aXZvSW50ZXJtZWRpYXJpb1BTUD44ODg4ODg4ODg4ODwvaWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUFNQPgoJCQk8aWRlbnRpZmljYXRpdm9DYW5hbGU+ODg4ODg4ODg4ODhfMDE8L2lkZW50aWZpY2F0aXZvQ2FuYWxlPgoJCQk8bW9kZWxsb1BhZ2FtZW50bz4xPC9tb2RlbGxvUGFnYW1lbnRvPgoJCQk8bGlzdGFSUFQ+CgkJCQk8ZWxlbWVudG9MaXN0YUNhcnJlbGxvUlBUPgoJCQkJCTxpZGVudGlmaWNhdGl2b0RvbWluaW8+Nzc3Nzc3Nzc3Nzc8L2lkZW50aWZpY2F0aXZvRG9taW5pbz4KCQkJCQk8aWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4wMTAwMDAwMDAwMDAwMDA0MjwvaWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4KCQkJCQk8Y29kaWNlQ29udGVzdG9QYWdhbWVudG8+dDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwNDI8L2NvZGljZUNvbnRlc3RvUGFnYW1lbnRvPgoJCQkJCTxycHQ+UEZKUVZDQjRiV3h1Y3owaWFIUjBjRG92TDNkM2R5NWthV2RwZEhCaExtZHZkaTVwZEM5elkyaGxiV0Z6THpJd01URXZVR0ZuWVcxbGJuUnBMeUkrQ2lBZ0lDQThkbVZ5YzJsdmJtVlBaMmRsZEhSdlBqWXVNaTR3UEM5MlpYSnphVzl1WlU5bloyVjBkRzgrQ2lBZ0lDQThaRzl0YVc1cGJ6NEtJQ0FnSUNBZ0lDQThhV1JsYm5ScFptbGpZWFJwZG05RWIyMXBibWx2UGpjM056YzNOemMzTnpjM1BDOXBaR1Z1ZEdsbWFXTmhkR2wyYjBSdmJXbHVhVzgrQ2lBZ0lDQWdJQ0FnUEdsa1pXNTBhV1pwWTJGMGFYWnZVM1JoZW1sdmJtVlNhV05vYVdWa1pXNTBaVDQzTnpjM056YzNOemMzTjE4d01Ud3ZhV1JsYm5ScFptbGpZWFJwZG05VGRHRjZhVzl1WlZKcFkyaHBaV1JsYm5SbFBnb2dJQ0FnUEM5a2IyMXBibWx2UGdvZ0lDQWdQR2xrWlc1MGFXWnBZMkYwYVhadlRXVnpjMkZuWjJsdlVtbGphR2xsYzNSaFBtWXpaV016Tm1SaU56aGtZVFEwTkdaaFlqUmpaakJtT1RBNE9XSm1aRGt3UEM5cFpHVnVkR2xtYVdOaGRHbDJiMDFsYzNOaFoyZHBiMUpwWTJocFpYTjBZVDRLSUNBZ0lEeGtZWFJoVDNKaFRXVnpjMkZuWjJsdlVtbGphR2xsYzNSaFBqSXdNalF0TURRdE1EbFVNakU2TlRNNk16WThMMlJoZEdGUGNtRk5aWE56WVdkbmFXOVNhV05vYVdWemRHRStDaUFnSUNBOFlYVjBaVzUwYVdOaGVtbHZibVZUYjJkblpYUjBiejU0ZUhnOEwyRjFkR1Z1ZEdsallYcHBiMjVsVTI5bloyVjBkRzgrQ2lBZ0lDQThjMjluWjJWMGRHOVFZV2RoZEc5eVpUNEtJQ0FnSUNBZ0lDQThhV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52VUdGbllYUnZjbVUrQ2lBZ0lDQWdJQ0FnSUNBZ0lEeDBhWEJ2U1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBuZzhMM1JwY0c5SlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtDaUFnSUNBZ0lDQWdJQ0FnSUR4amIyUnBZMlZKWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI4K2VIaDRlSGg0ZUR3dlkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBnb2dJQ0FnSUNBZ0lEd3ZhV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52VUdGbllYUnZjbVUrQ2lBZ0lDQWdJQ0FnUEdGdVlXZHlZV1pwWTJGUVlXZGhkRzl5WlQ1NGVIaDRlRHd2WVc1aFozSmhabWxqWVZCaFoyRjBiM0psUGdvZ0lDQWdJQ0FnSUR4dVlYcHBiMjVsVUdGbllYUnZjbVUrU1ZROEwyNWhlbWx2Ym1WUVlXZGhkRzl5WlQ0S0lDQWdJQ0FnSUNBOFpTMXRZV2xzVUdGbllYUnZjbVUrZUhoNGVIaEFlSGg0ZUM1amIyMDhMMlV0YldGcGJGQmhaMkYwYjNKbFBnb2dJQ0FnUEM5emIyZG5aWFIwYjFCaFoyRjBiM0psUGdvZ0lDQWdQR1Z1ZEdWQ1pXNWxabWxqYVdGeWFXOCtDaUFnSUNBZ0lDQWdQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjBKbGJtVm1hV05wWVhKcGJ6NEtJQ0FnSUNBZ0lDQWdJQ0FnUEhScGNHOUpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrUnp3dmRHbHdiMGxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno0S0lDQWdJQ0FnSUNBZ0lDQWdQR052WkdsalpVbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejU0ZUhoNGVIZzhMMk52WkdsalpVbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejRLSUNBZ0lDQWdJQ0E4TDJsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amIwSmxibVZtYVdOcFlYSnBiejRLSUNBZ0lDQWdJQ0E4WkdWdWIyMXBibUY2YVc5dVpVSmxibVZtYVdOcFlYSnBiejU0ZUhoNGVEd3ZaR1Z1YjIxcGJtRjZhVzl1WlVKbGJtVm1hV05wWVhKcGJ6NEtJQ0FnSUR3dlpXNTBaVUpsYm1WbWFXTnBZWEpwYno0S0lDQWdJRHhrWVhScFZtVnljMkZ0Wlc1MGJ6NEtJQ0FnSUNBZ0lDQThaR0YwWVVWelpXTjFlbWx2Ym1WUVlXZGhiV1Z1ZEc4K01qQXlOQzB3TkMwd09Ud3ZaR0YwWVVWelpXTjFlbWx2Ym1WUVlXZGhiV1Z1ZEc4K0NpQWdJQ0FnSUNBZ1BHbHRjRzl5ZEc5VWIzUmhiR1ZFWVZabGNuTmhjbVUrTlRBd0xqQXdQQzlwYlhCdmNuUnZWRzkwWVd4bFJHRldaWEp6WVhKbFBnb2dJQ0FnSUNBZ0lEeDBhWEJ2Vm1WeWMyRnRaVzUwYno1RFVEd3ZkR2x3YjFabGNuTmhiV1Z1ZEc4K0NpQWdJQ0FnSUNBZ1BHbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiMVpsY25OaGJXVnVkRzgrTURFd01EQXdNREF3TURBd01EQXdOREk4TDJsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amIxWmxjbk5oYldWdWRHOCtDaUFnSUNBZ0lDQWdQR052WkdsalpVTnZiblJsYzNSdlVHRm5ZVzFsYm5SdlBuUXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNRFF5UEM5amIyUnBZMlZEYjI1MFpYTjBiMUJoWjJGdFpXNTBiejRLSUNBZ0lDQWdJQ0E4Wm1seWJXRlNhV05sZG5WMFlUNHdQQzltYVhKdFlWSnBZMlYyZFhSaFBnb2dJQ0FnSUNBZ0lEeGtZWFJwVTJsdVoyOXNiMVpsY25OaGJXVnVkRzgrQ2lBZ0lDQWdJQ0FnSUNBZ0lEeHBiWEJ2Y25SdlUybHVaMjlzYjFabGNuTmhiV1Z1ZEc4K05UQXdMakF3UEM5cGJYQnZjblJ2VTJsdVoyOXNiMVpsY25OaGJXVnVkRzgrQ2lBZ0lDQWdJQ0FnSUNBZ0lEeHBZbUZ1UVdOamNtVmthWFJ2UGtsVU1UaFZNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TVR3dmFXSmhia0ZqWTNKbFpHbDBiejRLSUNBZ0lDQWdJQ0FnSUNBZ1BHTmhkWE5oYkdWV1pYSnpZVzFsYm5SdlBuaDRlSGg0ZUhnOEwyTmhkWE5oYkdWV1pYSnpZVzFsYm5SdlBnb2dJQ0FnSUNBZ0lDQWdJQ0E4WkdGMGFWTndaV05wWm1samFWSnBjMk52YzNOcGIyNWxQbmg0ZUhoNGVIZzhMMlJoZEdsVGNHVmphV1pwWTJsU2FYTmpiM056YVc5dVpUNEtJQ0FnSUNBZ0lDQThMMlJoZEdsVGFXNW5iMnh2Vm1WeWMyRnRaVzUwYno0S0lDQWdJRHd2WkdGMGFWWmxjbk5oYldWdWRHOCtDand2VWxCVVBnPT08L3JwdD4KCQkJCTwvZWxlbWVudG9MaXN0YUNhcnJlbGxvUlBUPgoJCQk8L2xpc3RhUlBUPgoJCTwvcHB0OnBzcEludmlhQ2FycmVsbG9SUFQ+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg==',
];

$data_resp = [
    ':id' => 77,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 10:46:01.197',
    ':tipoevento' => 'pspInviaCarrelloRPT',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '',
    ':iuv' => '',
    ':ccp' => '',
    ':noticenumber' => '',
    ':creditorreferenceid' => '',
    ':paymenttoken' => '',
    ':psp' => 'PSP_RPT_2',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_000041',
    ':sessionidoriginal' => 'session_id_original_000041',
    ':uniqueid' => 'T000077',
    ':payload' => 'PHNvYXA6RW52ZWxvcGUgeG1sbnM6c29hcD0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPgoJPHNvYXA6Qm9keT4KCQk8bnMzOnBzcEludmlhQ2FycmVsbG9SUFRSZXNwb25zZSB4bWxuczpuczI9Imh0dHA6Ly93d3cuY25pcGEuZ292Lml0L3NjaGVtYXMvMjAxMC9QYWdhbWVudGkvQWNrXzFfMC8iIHhtbG5zOm5zMz0iaHR0cDovL3dzLnBhZ2FtZW50aS50ZWxlbWF0aWNpLmdvdi8iPgoJCQk8cHNwSW52aWFDYXJyZWxsb1JQVFJlc3BvbnNlPgoJCQkJPGVzaXRvQ29tcGxlc3Npdm9PcGVyYXppb25lPktPPC9lc2l0b0NvbXBsZXNzaXZvT3BlcmF6aW9uZT4KCQkJCTxsaXN0YUVycm9yaVJQVD4KCQkJCQk8ZmF1bHQ+CgkJCQkJCTxmYXVsdENvZGU+UFBUX1JQVF9EVVBMSUNBVEE8L2ZhdWx0Q29kZT4KCQkJCQkJPGZhdWx0U3RyaW5nPkVycm9yZSBkaSBzaW50YXNzaSBYU0Q8L2ZhdWx0U3RyaW5nPgoJCQkJCQk8aWQ+QUdJRF8wMTwvaWQ+CgkJCQkJCTxzZXJpYWw+MTwvc2VyaWFsPgoJCQkJCTwvZmF1bHQ+CgkJCQk8L2xpc3RhRXJyb3JpUlBUPgoJCQk8L3BzcEludmlhQ2FycmVsbG9SUFRSZXNwb25zZT4KCQk8L25zMzpwc3BJbnZpYUNhcnJlbGxvUlBUUmVzcG9uc2U+Cgk8L3NvYXA6Qm9keT4KPC9zb2FwOkVudmVsb3BlPg==',
];


Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);








$data_req = [
    ':id' => 78,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 10:55:00.197',
    ':tipoevento' => 'nodoInviaCarrelloRPT',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '',
    ':iuv' => '',
    ':ccp' => '',
    ':noticenumber' => '',
    ':creditorreferenceid' => '',
    ':paymenttoken' => '',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_000042',
    ':sessionidoriginal' => 'session_id_original_000042',
    ':uniqueid' => 'T000078',
    ':payload' => 'PFNPQVAtRU5WOkVudmVsb3BlIHhtbG5zOlNPQVAtRU5WPSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyIgeG1sbnM6cHB0PSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOndzPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyI+Cgk8U09BUC1FTlY6SGVhZGVyPgoJCTxwcHQ6aW50ZXN0YXppb25lQ2FycmVsbG9QUFQ+CgkJCTxpZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QQT43Nzc3Nzc3Nzc3NzwvaWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUEE+CgkJCTxpZGVudGlmaWNhdGl2b1N0YXppb25lSW50ZXJtZWRpYXJpb1BBPjc3Nzc3Nzc3Nzc3XzAxPC9pZGVudGlmaWNhdGl2b1N0YXppb25lSW50ZXJtZWRpYXJpb1BBPgoJCQk8aWRlbnRpZmljYXRpdm9DYXJyZWxsbz5jMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDA0MzwvaWRlbnRpZmljYXRpdm9DYXJyZWxsbz4KCQk8L3BwdDppbnRlc3RhemlvbmVDYXJyZWxsb1BQVD4KCTwvU09BUC1FTlY6SGVhZGVyPgoJPFNPQVAtRU5WOkJvZHk+CgkJPG5zMzpub2RvSW52aWFDYXJyZWxsb1JQVCB4bWxuczpuczM9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIj4KCQkJPHBhc3N3b3JkPlBMQUNFSE9MREVSPC9wYXNzd29yZD4KCQkJPGlkZW50aWZpY2F0aXZvUFNQPkFHSURfMDE8L2lkZW50aWZpY2F0aXZvUFNQPgoJCQk8aWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUFNQPjg4ODg4ODg4ODg4PC9pZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QU1A+CgkJCTxpZGVudGlmaWNhdGl2b0NhbmFsZT44ODg4ODg4ODg4OF8wMTwvaWRlbnRpZmljYXRpdm9DYW5hbGU+CgkJCTxsaXN0YVJQVD4KCQkJCTxlbGVtZW50b0xpc3RhUlBUPgoJCQkJCTxpZGVudGlmaWNhdGl2b0RvbWluaW8+Nzc3Nzc3Nzc3Nzc8L2lkZW50aWZpY2F0aXZvRG9taW5pbz4KCQkJCQk8aWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4wMTAwMDAwMDAwMDAwMDA0MzwvaWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4KCQkJCQk8Y29kaWNlQ29udGVzdG9QYWdhbWVudG8+dDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwNDM8L2NvZGljZUNvbnRlc3RvUGFnYW1lbnRvPgoJCQkJCTxycHQ+UEZKUVZDQjRiV3h1Y3owaWFIUjBjRG92TDNkM2R5NWthV2RwZEhCaExtZHZkaTVwZEM5elkyaGxiV0Z6THpJd01URXZVR0ZuWVcxbGJuUnBMeUkrQ2drOGRtVnljMmx2Ym1WUFoyZGxkSFJ2UGpFdU1Ed3ZkbVZ5YzJsdmJtVlBaMmRsZEhSdlBnb0pQR1J2YldsdWFXOCtDZ2tKUEdsa1pXNTBhV1pwWTJGMGFYWnZSRzl0YVc1cGJ6NDNOemMzTnpjM056YzNOend2YVdSbGJuUnBabWxqWVhScGRtOUViMjFwYm1sdlBnb0pQQzlrYjIxcGJtbHZQZ29KUEdsa1pXNTBhV1pwWTJGMGFYWnZUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQakl3TWpNeE1qRTFNREV3TVRVek9XRmlZbUV6TXpVdFlXSTBaUzAwWkRFNExXRXpQQzlwWkdWdWRHbG1hV05oZEdsMmIwMWxjM05oWjJkcGIxSnBZMmhwWlhOMFlUNEtDVHhrWVhSaFQzSmhUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQakl3TWpNdE1USXRNVFZVTVRNNk1ERTZOVE11TmpFNUt6QXhPakF3UEM5a1lYUmhUM0poVFdWemMyRm5aMmx2VW1samFHbGxjM1JoUGdvSlBHRjFkR1Z1ZEdsallYcHBiMjVsVTI5bloyVjBkRzgrVGk5QlBDOWhkWFJsYm5ScFkyRjZhVzl1WlZOdloyZGxkSFJ2UGdvSlBITnZaMmRsZEhSdlZtVnljMkZ1ZEdVK0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFabGNuTmhiblJsUGdvSkNRazhkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NUhQQzkwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1FrOFkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBqYzNOemMzTnpjM056YzNQQzlqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSlBDOXBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlXWlhKellXNTBaVDRLQ1FrOFlXNWhaM0poWm1sallWWmxjbk5oYm5SbFBuaDRlSGg0ZUhoNGVEd3ZZVzVoWjNKaFptbGpZVlpsY25OaGJuUmxQZ29KUEM5emIyZG5aWFIwYjFabGNuTmhiblJsUGdvSlBITnZaMmRsZEhSdlVHRm5ZWFJ2Y21VK0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFCaFoyRjBiM0psUGdvSkNRazhkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NUhQQzkwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1FrOFkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBqYzNOemMzTnpjM056YzNQQzlqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSlBDOXBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlRWVdkaGRHOXlaVDRLQ1FrOFlXNWhaM0poWm1sallWQmhaMkYwYjNKbFBuaDRlSGg0ZUhoNGVEd3ZZVzVoWjNKaFptbGpZVkJoWjJGMGIzSmxQZ29KUEM5emIyZG5aWFIwYjFCaFoyRjBiM0psUGdvSlBHVnVkR1ZDWlc1bFptbGphV0Z5YVc4K0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjBKbGJtVm1hV05wWVhKcGJ6NEtDUWtKUEhScGNHOUpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrUnp3dmRHbHdiMGxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno0S0NRa0pQR052WkdsalpVbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejQzTnpjM056YzNOemMzTnp3dlkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBnb0pDVHd2YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlFtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4a1pXNXZiV2x1WVhwcGIyNWxRbVZ1WldacFkybGhjbWx2UG5oNGVIaDRlSGc4TDJSbGJtOXRhVzVoZW1sdmJtVkNaVzVsWm1samFXRnlhVzgrQ2drSlBHTnZaR2xqWlZWdWFYUlBjR1Z5UW1WdVpXWnBZMmxoY21sdlBuaDRQQzlqYjJScFkyVlZibWwwVDNCbGNrSmxibVZtYVdOcFlYSnBiejRLQ1FrOFpHVnViMjFWYm1sMFQzQmxja0psYm1WbWFXTnBZWEpwYno1NGVIaDRlSGc4TDJSbGJtOXRWVzVwZEU5d1pYSkNaVzVsWm1samFXRnlhVzgrQ2drSlBHbHVaR2x5YVhwNmIwSmxibVZtYVdOcFlYSnBiejU0ZUhoNFBDOXBibVJwY21sNmVtOUNaVzVsWm1samFXRnlhVzgrQ2drSlBHTnBkbWxqYjBKbGJtVm1hV05wWVhKcGJ6NTRlSGc4TDJOcGRtbGpiMEpsYm1WbWFXTnBZWEpwYno0S0NRazhZMkZ3UW1WdVpXWnBZMmxoY21sdlBuaDRlSGg0UEM5allYQkNaVzVsWm1samFXRnlhVzgrQ2drSlBHeHZZMkZzYVhSaFFtVnVaV1pwWTJsaGNtbHZQbmg0ZUhnOEwyeHZZMkZzYVhSaFFtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4d2NtOTJhVzVqYVdGQ1pXNWxabWxqYVdGeWFXOCtlSGc4TDNCeWIzWnBibU5wWVVKbGJtVm1hV05wWVhKcGJ6NEtDUWs4Ym1GNmFXOXVaVUpsYm1WbWFXTnBZWEpwYno1NGVEd3ZibUY2YVc5dVpVSmxibVZtYVdOcFlYSnBiejRLQ1R3dlpXNTBaVUpsYm1WbWFXTnBZWEpwYno0S0NUeGtZWFJwVm1WeWMyRnRaVzUwYno0S0NRazhaR0YwWVVWelpXTjFlbWx2Ym1WUVlXZGhiV1Z1ZEc4K01qQXlNeTB4TWkweE5Tc3dNVG93TUR3dlpHRjBZVVZ6WldOMWVtbHZibVZRWVdkaGJXVnVkRzgrQ2drSlBHbHRjRzl5ZEc5VWIzUmhiR1ZFWVZabGNuTmhjbVUrTXpBd0xqQXdQQzlwYlhCdmNuUnZWRzkwWVd4bFJHRldaWEp6WVhKbFBnb0pDVHgwYVhCdlZtVnljMkZ0Wlc1MGJ6NUNRbFE4TDNScGNHOVdaWEp6WVcxbGJuUnZQZ29KQ1R4cFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOVdaWEp6WVcxbGJuUnZQakF4TURBd01EQXdNREF3TURBd01EUXpQQzlwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5V1pYSnpZVzFsYm5SdlBnb0pDVHhqYjJScFkyVkRiMjUwWlhOMGIxQmhaMkZ0Wlc1MGJ6NTBNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREEwTXp3dlkyOWthV05sUTI5dWRHVnpkRzlRWVdkaGJXVnVkRzgrQ2drSlBHWnBjbTFoVW1salpYWjFkR0UrTUR3dlptbHliV0ZTYVdObGRuVjBZVDRLQ1FrOFpHRjBhVk5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KQ1FrOGFXMXdiM0owYjFOcGJtZHZiRzlXWlhKellXMWxiblJ2UGpFd01DNHdNRHd2YVcxd2IzSjBiMU5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KQ1FrOGFXSmhia0ZqWTNKbFpHbDBiejVKVkRFNFZUQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREU4TDJsaVlXNUJZMk55WldScGRHOCtDZ2tKQ1R4allYVnpZV3hsVm1WeWMyRnRaVzUwYno1NGVIaDRlSGg0UEM5allYVnpZV3hsVm1WeWMyRnRaVzUwYno0S0NRa0pQR1JoZEdsVGNHVmphV1pwWTJsU2FYTmpiM056YVc5dVpUNTRlSGg0ZUhoNFBDOWtZWFJwVTNCbFkybG1hV05wVW1selkyOXpjMmx2Ym1VK0Nna0pQQzlrWVhScFUybHVaMjlzYjFabGNuTmhiV1Z1ZEc4K0Nna0pQR1JoZEdsVGFXNW5iMnh2Vm1WeWMyRnRaVzUwYno0S0NRa0pQR2x0Y0c5eWRHOVRhVzVuYjJ4dlZtVnljMkZ0Wlc1MGJ6NHlNREF1TURBOEwybHRjRzl5ZEc5VGFXNW5iMnh2Vm1WeWMyRnRaVzUwYno0S0NRa0pQR2xpWVc1QlkyTnlaV1JwZEc4K1NWUXhPRlV3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBeVBDOXBZbUZ1UVdOamNtVmthWFJ2UGdvSkNRazhZMkYxYzJGc1pWWmxjbk5oYldWdWRHOCtlSGg0ZUhoNGVEd3ZZMkYxYzJGc1pWWmxjbk5oYldWdWRHOCtDZ2tKQ1R4a1lYUnBVM0JsWTJsbWFXTnBVbWx6WTI5emMybHZibVUrZUhoNGVIaDRlRHd2WkdGMGFWTndaV05wWm1samFWSnBjMk52YzNOcGIyNWxQZ29KQ1R3dlpHRjBhVk5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KUEM5a1lYUnBWbVZ5YzJGdFpXNTBiejRLUEM5U1VGUSs8L3JwdD4KCQkJCTwvZWxlbWVudG9MaXN0YVJQVD4KCQkJCTxlbGVtZW50b0xpc3RhUlBUPgoJCQkJCTxpZGVudGlmaWNhdGl2b0RvbWluaW8+Nzc3Nzc3Nzc3Nzc8L2lkZW50aWZpY2F0aXZvRG9taW5pbz4KCQkJCQk8aWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4wMTAwMDAwMDAwMDAwMDA0NDwvaWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4KCQkJCQk8Y29kaWNlQ29udGVzdG9QYWdhbWVudG8+dDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwNDM8L2NvZGljZUNvbnRlc3RvUGFnYW1lbnRvPgoJCQkJCTxycHQ+UEZKUVZDQjRiV3h1Y3owaWFIUjBjRG92TDNkM2R5NWthV2RwZEhCaExtZHZkaTVwZEM5elkyaGxiV0Z6THpJd01URXZVR0ZuWVcxbGJuUnBMeUkrQ2drOGRtVnljMmx2Ym1WUFoyZGxkSFJ2UGpFdU1Ed3ZkbVZ5YzJsdmJtVlBaMmRsZEhSdlBnb0pQR1J2YldsdWFXOCtDZ2tKUEdsa1pXNTBhV1pwWTJGMGFYWnZSRzl0YVc1cGJ6NDNOemMzTnpjM056YzNOend2YVdSbGJuUnBabWxqWVhScGRtOUViMjFwYm1sdlBnb0pQQzlrYjIxcGJtbHZQZ29KUEdsa1pXNTBhV1pwWTJGMGFYWnZUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQakl3TWpNeE1qRTFNREV3TVRVek9XRmlZbUV6TXpVdFlXSTBaUzAwWkRFNExXRXpQQzlwWkdWdWRHbG1hV05oZEdsMmIwMWxjM05oWjJkcGIxSnBZMmhwWlhOMFlUNEtDVHhrWVhSaFQzSmhUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQakl3TWpNdE1USXRNVFZVTVRNNk1ERTZOVE11TmpFNUt6QXhPakF3UEM5a1lYUmhUM0poVFdWemMyRm5aMmx2VW1samFHbGxjM1JoUGdvSlBHRjFkR1Z1ZEdsallYcHBiMjVsVTI5bloyVjBkRzgrVGk5QlBDOWhkWFJsYm5ScFkyRjZhVzl1WlZOdloyZGxkSFJ2UGdvSlBITnZaMmRsZEhSdlZtVnljMkZ1ZEdVK0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFabGNuTmhiblJsUGdvSkNRazhkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NUhQQzkwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1FrOFkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBqYzNOemMzTnpjM056YzNQQzlqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSlBDOXBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlXWlhKellXNTBaVDRLQ1FrOFlXNWhaM0poWm1sallWWmxjbk5oYm5SbFBuaDRlSGg0ZUhoNGVEd3ZZVzVoWjNKaFptbGpZVlpsY25OaGJuUmxQZ29KUEM5emIyZG5aWFIwYjFabGNuTmhiblJsUGdvSlBITnZaMmRsZEhSdlVHRm5ZWFJ2Y21VK0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFCaFoyRjBiM0psUGdvSkNRazhkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NUhQQzkwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1FrOFkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBqYzNOemMzTnpjM056YzNQQzlqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSlBDOXBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlRWVdkaGRHOXlaVDRLQ1FrOFlXNWhaM0poWm1sallWQmhaMkYwYjNKbFBuaDRlSGg0ZUhoNGVEd3ZZVzVoWjNKaFptbGpZVkJoWjJGMGIzSmxQZ29KUEM5emIyZG5aWFIwYjFCaFoyRjBiM0psUGdvSlBHVnVkR1ZDWlc1bFptbGphV0Z5YVc4K0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjBKbGJtVm1hV05wWVhKcGJ6NEtDUWtKUEhScGNHOUpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrUnp3dmRHbHdiMGxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno0S0NRa0pQR052WkdsalpVbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejQzTnpjM056YzNOemMzTnp3dlkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBnb0pDVHd2YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlFtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4a1pXNXZiV2x1WVhwcGIyNWxRbVZ1WldacFkybGhjbWx2UG5oNGVIaDRlSGc4TDJSbGJtOXRhVzVoZW1sdmJtVkNaVzVsWm1samFXRnlhVzgrQ2drSlBHTnZaR2xqWlZWdWFYUlBjR1Z5UW1WdVpXWnBZMmxoY21sdlBuaDRQQzlqYjJScFkyVlZibWwwVDNCbGNrSmxibVZtYVdOcFlYSnBiejRLQ1FrOFpHVnViMjFWYm1sMFQzQmxja0psYm1WbWFXTnBZWEpwYno1NGVIaDRlSGc4TDJSbGJtOXRWVzVwZEU5d1pYSkNaVzVsWm1samFXRnlhVzgrQ2drSlBHbHVaR2x5YVhwNmIwSmxibVZtYVdOcFlYSnBiejU0ZUhoNFBDOXBibVJwY21sNmVtOUNaVzVsWm1samFXRnlhVzgrQ2drSlBHTnBkbWxqYjBKbGJtVm1hV05wWVhKcGJ6NTRlSGc4TDJOcGRtbGpiMEpsYm1WbWFXTnBZWEpwYno0S0NRazhZMkZ3UW1WdVpXWnBZMmxoY21sdlBuaDRlSGg0UEM5allYQkNaVzVsWm1samFXRnlhVzgrQ2drSlBHeHZZMkZzYVhSaFFtVnVaV1pwWTJsaGNtbHZQbmg0ZUhnOEwyeHZZMkZzYVhSaFFtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4d2NtOTJhVzVqYVdGQ1pXNWxabWxqYVdGeWFXOCtlSGc4TDNCeWIzWnBibU5wWVVKbGJtVm1hV05wWVhKcGJ6NEtDUWs4Ym1GNmFXOXVaVUpsYm1WbWFXTnBZWEpwYno1NGVEd3ZibUY2YVc5dVpVSmxibVZtYVdOcFlYSnBiejRLQ1R3dlpXNTBaVUpsYm1WbWFXTnBZWEpwYno0S0NUeGtZWFJwVm1WeWMyRnRaVzUwYno0S0NRazhaR0YwWVVWelpXTjFlbWx2Ym1WUVlXZGhiV1Z1ZEc4K01qQXlNeTB4TWkweE5Tc3dNVG93TUR3dlpHRjBZVVZ6WldOMWVtbHZibVZRWVdkaGJXVnVkRzgrQ2drSlBHbHRjRzl5ZEc5VWIzUmhiR1ZFWVZabGNuTmhjbVUrTkRJd0xqQXdQQzlwYlhCdmNuUnZWRzkwWVd4bFJHRldaWEp6WVhKbFBnb0pDVHgwYVhCdlZtVnljMkZ0Wlc1MGJ6NUNRbFE4TDNScGNHOVdaWEp6WVcxbGJuUnZQZ29KQ1R4cFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOVdaWEp6WVcxbGJuUnZQakF4TURBd01EQXdNREF3TURBd01EUTBQQzlwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5V1pYSnpZVzFsYm5SdlBnb0pDVHhqYjJScFkyVkRiMjUwWlhOMGIxQmhaMkZ0Wlc1MGJ6NTBNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREEwTXp3dlkyOWthV05sUTI5dWRHVnpkRzlRWVdkaGJXVnVkRzgrQ2drSlBHWnBjbTFoVW1salpYWjFkR0UrTUR3dlptbHliV0ZTYVdObGRuVjBZVDRLQ1FrOFpHRjBhVk5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KQ1FrOGFXMXdiM0owYjFOcGJtZHZiRzlXWlhKellXMWxiblJ2UGpFeU1DNHdNRHd2YVcxd2IzSjBiMU5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KQ1FrOGFXSmhia0ZqWTNKbFpHbDBiejVKVkRFNFZUQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNRE04TDJsaVlXNUJZMk55WldScGRHOCtDZ2tKQ1R4allYVnpZV3hsVm1WeWMyRnRaVzUwYno1NGVIaDRlSGg0UEM5allYVnpZV3hsVm1WeWMyRnRaVzUwYno0S0NRa0pQR1JoZEdsVGNHVmphV1pwWTJsU2FYTmpiM056YVc5dVpUNTRlSGg0ZUhoNFBDOWtZWFJwVTNCbFkybG1hV05wVW1selkyOXpjMmx2Ym1VK0Nna0pQQzlrWVhScFUybHVaMjlzYjFabGNuTmhiV1Z1ZEc4K0Nna0pQR1JoZEdsVGFXNW5iMnh2Vm1WeWMyRnRaVzUwYno0S0NRa0pQR2x0Y0c5eWRHOVRhVzVuYjJ4dlZtVnljMkZ0Wlc1MGJ6NHpNREF1TURBOEwybHRjRzl5ZEc5VGFXNW5iMnh2Vm1WeWMyRnRaVzUwYno0S0NRa0pQR2xpWVc1QlkyTnlaV1JwZEc4K1NWUXhPRlV3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBMFBDOXBZbUZ1UVdOamNtVmthWFJ2UGdvSkNRazhZMkYxYzJGc1pWWmxjbk5oYldWdWRHOCtlSGg0ZUhoNGVEd3ZZMkYxYzJGc1pWWmxjbk5oYldWdWRHOCtDZ2tKQ1R4a1lYUnBVM0JsWTJsbWFXTnBVbWx6WTI5emMybHZibVUrZUhoNGVIaDRlRHd2WkdGMGFWTndaV05wWm1samFWSnBjMk52YzNOcGIyNWxQZ29KQ1R3dlpHRjBhVk5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KUEM5a1lYUnBWbVZ5YzJGdFpXNTBiejRLUEM5U1VGUSs8L3JwdD4KCQkJCTwvZWxlbWVudG9MaXN0YVJQVD4KCQkJPC9saXN0YVJQVD4KCQkJPG11bHRpQmVuZWZpY2lhcmlvPmZhbHNlPC9tdWx0aUJlbmVmaWNpYXJpbz4KCQk8L25zMzpub2RvSW52aWFDYXJyZWxsb1JQVD4KCTwvU09BUC1FTlY6Qm9keT4KPC9TT0FQLUVOVjpFbnZlbG9wZT4=',
];
$data_resp = [
    ':id' => 79,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 10:55:01.197',
    ':tipoevento' => 'nodoInviaCarrelloRPT',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '',
    ':iuv' => '',
    ':ccp' => '',
    ':noticenumber' => '',
    ':creditorreferenceid' => '',
    ':paymenttoken' => '',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_000042',
    ':sessionidoriginal' => 'session_id_original_000042',
    ':uniqueid' => 'T000079',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpwcHQ9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIiB4bWxuczpwcHRoZWFkPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIiB4bWxuczp0bnM9Imh0dHA6Ly9Ob2RvUGFnYW1lbnRpU1BDLnNwY29vcC5nb3YuaXQvc2Vydml6aS9QYWdhbWVudGlUZWxlbWF0aWNpUlBUIiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBwdDpub2RvSW52aWFDYXJyZWxsb1JQVFJpc3Bvc3RhPgoJCQk8ZXNpdG9Db21wbGVzc2l2b09wZXJhemlvbmU+T0s8L2VzaXRvQ29tcGxlc3Npdm9PcGVyYXppb25lPgoJCQk8dXJsPmh0dHBzOi8vd2lzcDIucGFnb3BhLmdvdi5pdC93YWxsZXQvd2VsY29tZT9pZFNlc3Npb249NjA2N2FiMGItMGIxNi00NDVhLThlN2MtZGVkZGQ3Y2IxYzZiPC91cmw+CgkJPC9wcHQ6bm9kb0ludmlhQ2FycmVsbG9SUFRSaXNwb3N0YT4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+',
];

Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);


$data_req = [
    ':id' => 80,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 10:56:00.197',
    ':tipoevento' => 'pspInviaCarrelloRPT',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '',
    ':iuv' => '',
    ':ccp' => '',
    ':noticenumber' => '',
    ':creditorreferenceid' => '',
    ':paymenttoken' => '',
    ':psp' => 'PSP_RPT_3',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_000041',
    ':sessionidoriginal' => 'session_id_original_000042',
    ':uniqueid' => 'T000080',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpwYXlfaj0iaHR0cDovL3d3dy5jbmlwYS5nb3YuaXQvc2NoZW1hcy8yMDEwL1BhZ2FtZW50aS9BY2tfMV8wLyIgeG1sbnM6cHB0PSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnRucz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0IiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBwdDpwc3BJbnZpYUNhcnJlbGxvUlBUPgoJCQk8aWRlbnRpZmljYXRpdm9QU1A+UFNQX1JQVF8zPC9pZGVudGlmaWNhdGl2b1BTUD4KCQkJPGlkZW50aWZpY2F0aXZvSW50ZXJtZWRpYXJpb1BTUD44ODg4ODg4ODg4ODwvaWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUFNQPgoJCQk8aWRlbnRpZmljYXRpdm9DYW5hbGU+ODg4ODg4ODg4ODhfMDE8L2lkZW50aWZpY2F0aXZvQ2FuYWxlPgoJCQk8bW9kZWxsb1BhZ2FtZW50bz4xPC9tb2RlbGxvUGFnYW1lbnRvPgoJCQk8bGlzdGFSUFQ+CgkJCQk8ZWxlbWVudG9MaXN0YUNhcnJlbGxvUlBUPgoJCQkJCTxpZGVudGlmaWNhdGl2b0RvbWluaW8+Nzc3Nzc3Nzc3Nzc8L2lkZW50aWZpY2F0aXZvRG9taW5pbz4KCQkJCQk8aWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4wMTAwMDAwMDAwMDAwMDA0MzwvaWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4KCQkJCQk8Y29kaWNlQ29udGVzdG9QYWdhbWVudG8+dDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwNDM8L2NvZGljZUNvbnRlc3RvUGFnYW1lbnRvPgoJCQkJCTxycHQ+UEZKUVZDQjRiV3h1Y3owaWFIUjBjRG92TDNkM2R5NWthV2RwZEhCaExtZHZkaTVwZEM5elkyaGxiV0Z6THpJd01URXZVR0ZuWVcxbGJuUnBMeUkrQ2drOGRtVnljMmx2Ym1WUFoyZGxkSFJ2UGpFdU1Ed3ZkbVZ5YzJsdmJtVlBaMmRsZEhSdlBnb0pQR1J2YldsdWFXOCtDZ2tKUEdsa1pXNTBhV1pwWTJGMGFYWnZSRzl0YVc1cGJ6NDNOemMzTnpjM056YzNOend2YVdSbGJuUnBabWxqWVhScGRtOUViMjFwYm1sdlBnb0pQQzlrYjIxcGJtbHZQZ29KUEdsa1pXNTBhV1pwWTJGMGFYWnZUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQakl3TWpNeE1qRTFNREV3TVRVek9XRmlZbUV6TXpVdFlXSTBaUzAwWkRFNExXRXpQQzlwWkdWdWRHbG1hV05oZEdsMmIwMWxjM05oWjJkcGIxSnBZMmhwWlhOMFlUNEtDVHhrWVhSaFQzSmhUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQakl3TWpNdE1USXRNVFZVTVRNNk1ERTZOVE11TmpFNUt6QXhPakF3UEM5a1lYUmhUM0poVFdWemMyRm5aMmx2VW1samFHbGxjM1JoUGdvSlBHRjFkR1Z1ZEdsallYcHBiMjVsVTI5bloyVjBkRzgrVGk5QlBDOWhkWFJsYm5ScFkyRjZhVzl1WlZOdloyZGxkSFJ2UGdvSlBITnZaMmRsZEhSdlZtVnljMkZ1ZEdVK0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFabGNuTmhiblJsUGdvSkNRazhkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NUhQQzkwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1FrOFkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBqYzNOemMzTnpjM056YzNQQzlqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSlBDOXBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlXWlhKellXNTBaVDRLQ1FrOFlXNWhaM0poWm1sallWWmxjbk5oYm5SbFBuaDRlSGg0ZUhoNGVEd3ZZVzVoWjNKaFptbGpZVlpsY25OaGJuUmxQZ29KUEM5emIyZG5aWFIwYjFabGNuTmhiblJsUGdvSlBITnZaMmRsZEhSdlVHRm5ZWFJ2Y21VK0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFCaFoyRjBiM0psUGdvSkNRazhkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NUhQQzkwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1FrOFkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBqYzNOemMzTnpjM056YzNQQzlqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSlBDOXBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlRWVdkaGRHOXlaVDRLQ1FrOFlXNWhaM0poWm1sallWQmhaMkYwYjNKbFBuaDRlSGg0ZUhoNGVEd3ZZVzVoWjNKaFptbGpZVkJoWjJGMGIzSmxQZ29KUEM5emIyZG5aWFIwYjFCaFoyRjBiM0psUGdvSlBHVnVkR1ZDWlc1bFptbGphV0Z5YVc4K0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjBKbGJtVm1hV05wWVhKcGJ6NEtDUWtKUEhScGNHOUpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrUnp3dmRHbHdiMGxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno0S0NRa0pQR052WkdsalpVbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejQzTnpjM056YzNOemMzTnp3dlkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBnb0pDVHd2YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlFtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4a1pXNXZiV2x1WVhwcGIyNWxRbVZ1WldacFkybGhjbWx2UG5oNGVIaDRlSGc4TDJSbGJtOXRhVzVoZW1sdmJtVkNaVzVsWm1samFXRnlhVzgrQ2drSlBHTnZaR2xqWlZWdWFYUlBjR1Z5UW1WdVpXWnBZMmxoY21sdlBuaDRQQzlqYjJScFkyVlZibWwwVDNCbGNrSmxibVZtYVdOcFlYSnBiejRLQ1FrOFpHVnViMjFWYm1sMFQzQmxja0psYm1WbWFXTnBZWEpwYno1NGVIaDRlSGc4TDJSbGJtOXRWVzVwZEU5d1pYSkNaVzVsWm1samFXRnlhVzgrQ2drSlBHbHVaR2x5YVhwNmIwSmxibVZtYVdOcFlYSnBiejU0ZUhoNFBDOXBibVJwY21sNmVtOUNaVzVsWm1samFXRnlhVzgrQ2drSlBHTnBkbWxqYjBKbGJtVm1hV05wWVhKcGJ6NTRlSGc4TDJOcGRtbGpiMEpsYm1WbWFXTnBZWEpwYno0S0NRazhZMkZ3UW1WdVpXWnBZMmxoY21sdlBuaDRlSGg0UEM5allYQkNaVzVsWm1samFXRnlhVzgrQ2drSlBHeHZZMkZzYVhSaFFtVnVaV1pwWTJsaGNtbHZQbmg0ZUhnOEwyeHZZMkZzYVhSaFFtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4d2NtOTJhVzVqYVdGQ1pXNWxabWxqYVdGeWFXOCtlSGc4TDNCeWIzWnBibU5wWVVKbGJtVm1hV05wWVhKcGJ6NEtDUWs4Ym1GNmFXOXVaVUpsYm1WbWFXTnBZWEpwYno1NGVEd3ZibUY2YVc5dVpVSmxibVZtYVdOcFlYSnBiejRLQ1R3dlpXNTBaVUpsYm1WbWFXTnBZWEpwYno0S0NUeGtZWFJwVm1WeWMyRnRaVzUwYno0S0NRazhaR0YwWVVWelpXTjFlbWx2Ym1WUVlXZGhiV1Z1ZEc4K01qQXlNeTB4TWkweE5Tc3dNVG93TUR3dlpHRjBZVVZ6WldOMWVtbHZibVZRWVdkaGJXVnVkRzgrQ2drSlBHbHRjRzl5ZEc5VWIzUmhiR1ZFWVZabGNuTmhjbVUrTXpBd0xqQXdQQzlwYlhCdmNuUnZWRzkwWVd4bFJHRldaWEp6WVhKbFBnb0pDVHgwYVhCdlZtVnljMkZ0Wlc1MGJ6NUNRbFE4TDNScGNHOVdaWEp6WVcxbGJuUnZQZ29KQ1R4cFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOVdaWEp6WVcxbGJuUnZQakF4TURBd01EQXdNREF3TURBd01EUXpQQzlwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5V1pYSnpZVzFsYm5SdlBnb0pDVHhqYjJScFkyVkRiMjUwWlhOMGIxQmhaMkZ0Wlc1MGJ6NTBNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREEwTXp3dlkyOWthV05sUTI5dWRHVnpkRzlRWVdkaGJXVnVkRzgrQ2drSlBHWnBjbTFoVW1salpYWjFkR0UrTUR3dlptbHliV0ZTYVdObGRuVjBZVDRLQ1FrOFpHRjBhVk5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KQ1FrOGFXMXdiM0owYjFOcGJtZHZiRzlXWlhKellXMWxiblJ2UGpFd01DNHdNRHd2YVcxd2IzSjBiMU5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KQ1FrOGFXSmhia0ZqWTNKbFpHbDBiejVKVkRFNFZUQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREU4TDJsaVlXNUJZMk55WldScGRHOCtDZ2tKQ1R4allYVnpZV3hsVm1WeWMyRnRaVzUwYno1NGVIaDRlSGg0UEM5allYVnpZV3hsVm1WeWMyRnRaVzUwYno0S0NRa0pQR1JoZEdsVGNHVmphV1pwWTJsU2FYTmpiM056YVc5dVpUNTRlSGg0ZUhoNFBDOWtZWFJwVTNCbFkybG1hV05wVW1selkyOXpjMmx2Ym1VK0Nna0pQQzlrWVhScFUybHVaMjlzYjFabGNuTmhiV1Z1ZEc4K0Nna0pQR1JoZEdsVGFXNW5iMnh2Vm1WeWMyRnRaVzUwYno0S0NRa0pQR2x0Y0c5eWRHOVRhVzVuYjJ4dlZtVnljMkZ0Wlc1MGJ6NHlNREF1TURBOEwybHRjRzl5ZEc5VGFXNW5iMnh2Vm1WeWMyRnRaVzUwYno0S0NRa0pQR2xpWVc1QlkyTnlaV1JwZEc4K1NWUXhPRlV3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBeVBDOXBZbUZ1UVdOamNtVmthWFJ2UGdvSkNRazhZMkYxYzJGc1pWWmxjbk5oYldWdWRHOCtlSGg0ZUhoNGVEd3ZZMkYxYzJGc1pWWmxjbk5oYldWdWRHOCtDZ2tKQ1R4a1lYUnBVM0JsWTJsbWFXTnBVbWx6WTI5emMybHZibVUrZUhoNGVIaDRlRHd2WkdGMGFWTndaV05wWm1samFWSnBjMk52YzNOcGIyNWxQZ29KQ1R3dlpHRjBhVk5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KUEM5a1lYUnBWbVZ5YzJGdFpXNTBiejRLUEM5U1VGUSs8L3JwdD4KCQkJCTwvZWxlbWVudG9MaXN0YUNhcnJlbGxvUlBUPgoJCQkJPGVsZW1lbnRvTGlzdGFDYXJyZWxsb1JQVD4KCQkJCQk8aWRlbnRpZmljYXRpdm9Eb21pbmlvPjc3Nzc3Nzc3Nzc3PC9pZGVudGlmaWNhdGl2b0RvbWluaW8+CgkJCQkJPGlkZW50aWZpY2F0aXZvVW5pdm9jb1ZlcnNhbWVudG8+MDEwMDAwMDAwMDAwMDAwNDQ8L2lkZW50aWZpY2F0aXZvVW5pdm9jb1ZlcnNhbWVudG8+CgkJCQkJPGNvZGljZUNvbnRlc3RvUGFnYW1lbnRvPnQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDQzPC9jb2RpY2VDb250ZXN0b1BhZ2FtZW50bz4KCQkJCQk8cnB0PlBGSlFWQ0I0Yld4dWN6MGlhSFIwY0RvdkwzZDNkeTVrYVdkcGRIQmhMbWR2ZGk1cGRDOXpZMmhsYldGekx6SXdNVEV2VUdGbllXMWxiblJwTHlJK0NnazhkbVZ5YzJsdmJtVlBaMmRsZEhSdlBqRXVNRHd2ZG1WeWMybHZibVZQWjJkbGRIUnZQZ29KUEdSdmJXbHVhVzgrQ2drSlBHbGtaVzUwYVdacFkyRjBhWFp2Ukc5dGFXNXBiejQzTnpjM056YzNOemMzTnp3dmFXUmxiblJwWm1sallYUnBkbTlFYjIxcGJtbHZQZ29KUEM5a2IyMXBibWx2UGdvSlBHbGtaVzUwYVdacFkyRjBhWFp2VFdWemMyRm5aMmx2VW1samFHbGxjM1JoUGpJd01qTXhNakUxTURFd01UVXpPV0ZpWW1Fek16VXRZV0kwWlMwMFpERTRMV0V6UEM5cFpHVnVkR2xtYVdOaGRHbDJiMDFsYzNOaFoyZHBiMUpwWTJocFpYTjBZVDRLQ1R4a1lYUmhUM0poVFdWemMyRm5aMmx2VW1samFHbGxjM1JoUGpJd01qTXRNVEl0TVRWVU1UTTZNREU2TlRNdU5qRTVLekF4T2pBd1BDOWtZWFJoVDNKaFRXVnpjMkZuWjJsdlVtbGphR2xsYzNSaFBnb0pQR0YxZEdWdWRHbGpZWHBwYjI1bFUyOW5aMlYwZEc4K1RpOUJQQzloZFhSbGJuUnBZMkY2YVc5dVpWTnZaMmRsZEhSdlBnb0pQSE52WjJkbGRIUnZWbVZ5YzJGdWRHVStDZ2tKUEdsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amIxWmxjbk5oYm5SbFBnb0pDUWs4ZEdsd2IwbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejVIUEM5MGFYQnZTV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52UGdvSkNRazhZMjlrYVdObFNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQamMzTnpjM056YzNOemMzUEM5amIyUnBZMlZKWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI4K0Nna0pQQzlwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5V1pYSnpZVzUwWlQ0S0NRazhZVzVoWjNKaFptbGpZVlpsY25OaGJuUmxQbmg0ZUhoNGVIaDRlRHd2WVc1aFozSmhabWxqWVZabGNuTmhiblJsUGdvSlBDOXpiMmRuWlhSMGIxWmxjbk5oYm5SbFBnb0pQSE52WjJkbGRIUnZVR0ZuWVhSdmNtVStDZ2tKUEdsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amIxQmhaMkYwYjNKbFBnb0pDUWs4ZEdsd2IwbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejVIUEM5MGFYQnZTV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52UGdvSkNRazhZMjlrYVdObFNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQamMzTnpjM056YzNOemMzUEM5amIyUnBZMlZKWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI4K0Nna0pQQzlwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5UVlXZGhkRzl5WlQ0S0NRazhZVzVoWjNKaFptbGpZVkJoWjJGMGIzSmxQbmg0ZUhoNGVIaDRlRHd2WVc1aFozSmhabWxqWVZCaFoyRjBiM0psUGdvSlBDOXpiMmRuWlhSMGIxQmhaMkYwYjNKbFBnb0pQR1Z1ZEdWQ1pXNWxabWxqYVdGeWFXOCtDZ2tKUEdsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amIwSmxibVZtYVdOcFlYSnBiejRLQ1FrSlBIUnBjRzlKWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI4K1J6d3ZkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NEtDUWtKUEdOdlpHbGpaVWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno0M056YzNOemMzTnpjM056d3ZZMjlrYVdObFNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1R3dmFXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZRbVZ1WldacFkybGhjbWx2UGdvSkNUeGtaVzV2YldsdVlYcHBiMjVsUW1WdVpXWnBZMmxoY21sdlBuaDRlSGg0ZUhnOEwyUmxibTl0YVc1aGVtbHZibVZDWlc1bFptbGphV0Z5YVc4K0Nna0pQR052WkdsalpWVnVhWFJQY0dWeVFtVnVaV1pwWTJsaGNtbHZQbmg0UEM5amIyUnBZMlZWYm1sMFQzQmxja0psYm1WbWFXTnBZWEpwYno0S0NRazhaR1Z1YjIxVmJtbDBUM0JsY2tKbGJtVm1hV05wWVhKcGJ6NTRlSGg0ZUhnOEwyUmxibTl0Vlc1cGRFOXdaWEpDWlc1bFptbGphV0Z5YVc4K0Nna0pQR2x1WkdseWFYcDZiMEpsYm1WbWFXTnBZWEpwYno1NGVIaDRQQzlwYm1ScGNtbDZlbTlDWlc1bFptbGphV0Z5YVc4K0Nna0pQR05wZG1samIwSmxibVZtYVdOcFlYSnBiejU0ZUhnOEwyTnBkbWxqYjBKbGJtVm1hV05wWVhKcGJ6NEtDUWs4WTJGd1FtVnVaV1pwWTJsaGNtbHZQbmg0ZUhoNFBDOWpZWEJDWlc1bFptbGphV0Z5YVc4K0Nna0pQR3h2WTJGc2FYUmhRbVZ1WldacFkybGhjbWx2UG5oNGVIZzhMMnh2WTJGc2FYUmhRbVZ1WldacFkybGhjbWx2UGdvSkNUeHdjbTkyYVc1amFXRkNaVzVsWm1samFXRnlhVzgrZUhnOEwzQnliM1pwYm1OcFlVSmxibVZtYVdOcFlYSnBiejRLQ1FrOGJtRjZhVzl1WlVKbGJtVm1hV05wWVhKcGJ6NTRlRHd2Ym1GNmFXOXVaVUpsYm1WbWFXTnBZWEpwYno0S0NUd3ZaVzUwWlVKbGJtVm1hV05wWVhKcGJ6NEtDVHhrWVhScFZtVnljMkZ0Wlc1MGJ6NEtDUWs4WkdGMFlVVnpaV04xZW1sdmJtVlFZV2RoYldWdWRHOCtNakF5TXkweE1pMHhOU3N3TVRvd01Ed3ZaR0YwWVVWelpXTjFlbWx2Ym1WUVlXZGhiV1Z1ZEc4K0Nna0pQR2x0Y0c5eWRHOVViM1JoYkdWRVlWWmxjbk5oY21VK05ESXdMakF3UEM5cGJYQnZjblJ2Vkc5MFlXeGxSR0ZXWlhKellYSmxQZ29KQ1R4MGFYQnZWbVZ5YzJGdFpXNTBiejVDUWxROEwzUnBjRzlXWlhKellXMWxiblJ2UGdvSkNUeHBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlXWlhKellXMWxiblJ2UGpBeE1EQXdNREF3TURBd01EQXdNRFEwUEM5cFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOVdaWEp6WVcxbGJuUnZQZ29KQ1R4amIyUnBZMlZEYjI1MFpYTjBiMUJoWjJGdFpXNTBiejUwTURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBME16d3ZZMjlrYVdObFEyOXVkR1Z6ZEc5UVlXZGhiV1Z1ZEc4K0Nna0pQR1pwY20xaFVtbGpaWFoxZEdFK01Ed3ZabWx5YldGU2FXTmxkblYwWVQ0S0NRazhaR0YwYVZOcGJtZHZiRzlXWlhKellXMWxiblJ2UGdvSkNRazhhVzF3YjNKMGIxTnBibWR2Ykc5V1pYSnpZVzFsYm5SdlBqRXlNQzR3TUR3dmFXMXdiM0owYjFOcGJtZHZiRzlXWlhKellXMWxiblJ2UGdvSkNRazhhV0poYmtGalkzSmxaR2wwYno1SlZERTRWVEF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURNOEwybGlZVzVCWTJOeVpXUnBkRzgrQ2drSkNUeGpZWFZ6WVd4bFZtVnljMkZ0Wlc1MGJ6NTRlSGg0ZUhoNFBDOWpZWFZ6WVd4bFZtVnljMkZ0Wlc1MGJ6NEtDUWtKUEdSaGRHbFRjR1ZqYVdacFkybFNhWE5qYjNOemFXOXVaVDU0ZUhoNGVIaDRQQzlrWVhScFUzQmxZMmxtYVdOcFVtbHpZMjl6YzJsdmJtVStDZ2tKUEM5a1lYUnBVMmx1WjI5c2IxWmxjbk5oYldWdWRHOCtDZ2tKUEdSaGRHbFRhVzVuYjJ4dlZtVnljMkZ0Wlc1MGJ6NEtDUWtKUEdsdGNHOXlkRzlUYVc1bmIyeHZWbVZ5YzJGdFpXNTBiejR6TURBdU1EQThMMmx0Y0c5eWRHOVRhVzVuYjJ4dlZtVnljMkZ0Wlc1MGJ6NEtDUWtKUEdsaVlXNUJZMk55WldScGRHOCtTVlF4T0ZVd01EQXdNREF3TURBd01EQXdNREF3TURBd01EQTBQQzlwWW1GdVFXTmpjbVZrYVhSdlBnb0pDUWs4WTJGMWMyRnNaVlpsY25OaGJXVnVkRzgrZUhoNGVIaDRlRHd2WTJGMWMyRnNaVlpsY25OaGJXVnVkRzgrQ2drSkNUeGtZWFJwVTNCbFkybG1hV05wVW1selkyOXpjMmx2Ym1VK2VIaDRlSGg0ZUR3dlpHRjBhVk53WldOcFptbGphVkpwYzJOdmMzTnBiMjVsUGdvSkNUd3ZaR0YwYVZOcGJtZHZiRzlXWlhKellXMWxiblJ2UGdvSlBDOWtZWFJwVm1WeWMyRnRaVzUwYno0S1BDOVNVRlErPC9ycHQ+CgkJCQk8L2VsZW1lbnRvTGlzdGFDYXJyZWxsb1JQVD4KCQkJPC9saXN0YVJQVD4KCQk8L3BwdDpwc3BJbnZpYUNhcnJlbGxvUlBUPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4=',
];

$data_resp = [
    ':id' => 81,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 10:56:01.197',
    ':tipoevento' => 'pspInviaCarrelloRPT',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '',
    ':iuv' => '',
    ':ccp' => '',
    ':noticenumber' => '',
    ':creditorreferenceid' => '',
    ':paymenttoken' => '',
    ':psp' => 'PSP_RPT_3',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_000041',
    ':sessionidoriginal' => 'session_id_original_000042',
    ':uniqueid' => 'T000081',
    ':payload' => 'PD94bWwgdmVyc2lvbj0nMS4wJyBlbmNvZGluZz0nVVRGLTgnPz4KPHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPgoJPHNvYXBlbnY6Qm9keT4KCQk8bnMyOnBzcEludmlhQ2FycmVsbG9SUFRSZXNwb25zZSB4bWxuczpuczI9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIj4KCQkJPHBzcEludmlhQ2FycmVsbG9SUFRSZXNwb25zZSB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIiB4c2k6dHlwZT0ibnMyOmVzaXRvUHNwSW52aWFDYXJyZWxsb1JQVCI+CgkJCQk8ZXNpdG9Db21wbGVzc2l2b09wZXJhemlvbmU+T0s8L2VzaXRvQ29tcGxlc3Npdm9PcGVyYXppb25lPgoJCQkJPGlkZW50aWZpY2F0aXZvQ2FycmVsbG8+eHh4eHh4eHh4eHh4eDwvaWRlbnRpZmljYXRpdm9DYXJyZWxsbz4KCQkJCTxwYXJhbWV0cmlQYWdhbWVudG9JbW1lZGlhdG8+aWRCcnVjaWF0dXJhPXh4dzIyPC9wYXJhbWV0cmlQYWdhbWVudG9JbW1lZGlhdG8+CgkJCTwvcHNwSW52aWFDYXJyZWxsb1JQVFJlc3BvbnNlPgoJCTwvbnMyOnBzcEludmlhQ2FycmVsbG9SUFRSZXNwb25zZT4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+',
];


Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);





/*


$data_req = [
    ':id'                       => 240,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 10:30:00.197',
    ':tipoevento'               => 'nodoInviaCarrelloRPT',
    ':sottotipoevento'          => 'REQ',
    ':iddominio'                => '',
    ':iuv'                      => '',
    ':ccp'                      => '',
    ':noticenumber'             => '',
    ':creditorreferenceid'      => '',
    ':paymenttoken'             => '',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000010',
    ':sessionidoriginal'        => 'session_id_original_000010',
    ':uniqueid'                 => 'T000024',
    ':payload'                  => 'PFNPQVAtRU5WOkVudmVsb3BlIHhtbG5zOlNPQVAtRU5WPSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyIgeG1sbnM6cHB0PSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOndzPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyI+Cgk8U09BUC1FTlY6SGVhZGVyPgoJCTxwcHQ6aW50ZXN0YXppb25lQ2FycmVsbG9QUFQ+CgkJCTxpZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QQT43Nzc3Nzc3Nzc3NzwvaWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUEE+CgkJCTxpZGVudGlmaWNhdGl2b1N0YXppb25lSW50ZXJtZWRpYXJpb1BBPjc3Nzc3Nzc3Nzc3XzAxPC9pZGVudGlmaWNhdGl2b1N0YXppb25lSW50ZXJtZWRpYXJpb1BBPgoJCQk8aWRlbnRpZmljYXRpdm9DYXJyZWxsbz5jMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxMDwvaWRlbnRpZmljYXRpdm9DYXJyZWxsbz4KCQk8L3BwdDppbnRlc3RhemlvbmVDYXJyZWxsb1BQVD4KCTwvU09BUC1FTlY6SGVhZGVyPgoJPFNPQVAtRU5WOkJvZHk+CgkJPG5zMzpub2RvSW52aWFDYXJyZWxsb1JQVCB4bWxuczpuczM9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIj4KCQkJPHBhc3N3b3JkPlBMQUNFSE9MREVSPC9wYXNzd29yZD4KCQkJPGlkZW50aWZpY2F0aXZvUFNQPkFHSURfMDE8L2lkZW50aWZpY2F0aXZvUFNQPgoJCQk8aWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUFNQPjg4ODg4ODg4ODg4PC9pZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QU1A+CgkJCTxpZGVudGlmaWNhdGl2b0NhbmFsZT44ODg4ODg4ODg4OF8wMTwvaWRlbnRpZmljYXRpdm9DYW5hbGU+CgkJCTxsaXN0YVJQVD4KCQkJCTxlbGVtZW50b0xpc3RhUlBUPgoJCQkJCTxpZGVudGlmaWNhdGl2b0RvbWluaW8+Nzc3Nzc3Nzc3Nzc8L2lkZW50aWZpY2F0aXZvRG9taW5pbz4KCQkJCQk8aWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4wMTAwMDAwMDAwMDAwMDAyMDwvaWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4KCQkJCQk8Y29kaWNlQ29udGVzdG9QYWdhbWVudG8+dDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMjA8L2NvZGljZUNvbnRlc3RvUGFnYW1lbnRvPgoJCQkJCTxycHQ+UEZKUVZDQjRiV3h1Y3owaWFIUjBjRG92TDNkM2R5NWthV2RwZEhCaExtZHZkaTVwZEM5elkyaGxiV0Z6THpJd01URXZVR0ZuWVcxbGJuUnBMeUkrQ2drOGRtVnljMmx2Ym1WUFoyZGxkSFJ2UGpFdU1Ed3ZkbVZ5YzJsdmJtVlBaMmRsZEhSdlBnb0pQR1J2YldsdWFXOCtDZ2tKUEdsa1pXNTBhV1pwWTJGMGFYWnZSRzl0YVc1cGJ6NDNOemMzTnpjM056YzNOend2YVdSbGJuUnBabWxqWVhScGRtOUViMjFwYm1sdlBnb0pQQzlrYjIxcGJtbHZQZ29KUEdsa1pXNTBhV1pwWTJGMGFYWnZUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQakl3TWpNeE1qRTFNREV3TVRVek9XRmlZbUV6TXpVdFlXSTBaUzAwWkRFNExXRXpQQzlwWkdWdWRHbG1hV05oZEdsMmIwMWxjM05oWjJkcGIxSnBZMmhwWlhOMFlUNEtDVHhrWVhSaFQzSmhUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQakl3TWpNdE1USXRNVFZVTVRNNk1ERTZOVE11TmpFNUt6QXhPakF3UEM5a1lYUmhUM0poVFdWemMyRm5aMmx2VW1samFHbGxjM1JoUGdvSlBHRjFkR1Z1ZEdsallYcHBiMjVsVTI5bloyVjBkRzgrVGk5QlBDOWhkWFJsYm5ScFkyRjZhVzl1WlZOdloyZGxkSFJ2UGdvSlBITnZaMmRsZEhSdlZtVnljMkZ1ZEdVK0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFabGNuTmhiblJsUGdvSkNRazhkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NUhQQzkwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1FrOFkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBqYzNOemMzTnpjM056YzNQQzlqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSlBDOXBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlXWlhKellXNTBaVDRLQ1FrOFlXNWhaM0poWm1sallWWmxjbk5oYm5SbFBuaDRlSGg0ZUhoNGVEd3ZZVzVoWjNKaFptbGpZVlpsY25OaGJuUmxQZ29KUEM5emIyZG5aWFIwYjFabGNuTmhiblJsUGdvSlBITnZaMmRsZEhSdlVHRm5ZWFJ2Y21VK0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFCaFoyRjBiM0psUGdvSkNRazhkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NUhQQzkwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1FrOFkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBqYzNOemMzTnpjM056YzNQQzlqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSlBDOXBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlRWVdkaGRHOXlaVDRLQ1FrOFlXNWhaM0poWm1sallWQmhaMkYwYjNKbFBuaDRlSGg0ZUhoNGVEd3ZZVzVoWjNKaFptbGpZVkJoWjJGMGIzSmxQZ29KUEM5emIyZG5aWFIwYjFCaFoyRjBiM0psUGdvSlBHVnVkR1ZDWlc1bFptbGphV0Z5YVc4K0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjBKbGJtVm1hV05wWVhKcGJ6NEtDUWtKUEhScGNHOUpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrUnp3dmRHbHdiMGxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno0S0NRa0pQR052WkdsalpVbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejQzTnpjM056YzNOemMzTnp3dlkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBnb0pDVHd2YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlFtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4a1pXNXZiV2x1WVhwcGIyNWxRbVZ1WldacFkybGhjbWx2UG5oNGVIaDRlSGc4TDJSbGJtOXRhVzVoZW1sdmJtVkNaVzVsWm1samFXRnlhVzgrQ2drSlBHTnZaR2xqWlZWdWFYUlBjR1Z5UW1WdVpXWnBZMmxoY21sdlBuaDRQQzlqYjJScFkyVlZibWwwVDNCbGNrSmxibVZtYVdOcFlYSnBiejRLQ1FrOFpHVnViMjFWYm1sMFQzQmxja0psYm1WbWFXTnBZWEpwYno1NGVIaDRlSGc4TDJSbGJtOXRWVzVwZEU5d1pYSkNaVzVsWm1samFXRnlhVzgrQ2drSlBHbHVaR2x5YVhwNmIwSmxibVZtYVdOcFlYSnBiejU0ZUhoNFBDOXBibVJwY21sNmVtOUNaVzVsWm1samFXRnlhVzgrQ2drSlBHTnBkbWxqYjBKbGJtVm1hV05wWVhKcGJ6NTRlSGc4TDJOcGRtbGpiMEpsYm1WbWFXTnBZWEpwYno0S0NRazhZMkZ3UW1WdVpXWnBZMmxoY21sdlBuaDRlSGg0UEM5allYQkNaVzVsWm1samFXRnlhVzgrQ2drSlBHeHZZMkZzYVhSaFFtVnVaV1pwWTJsaGNtbHZQbmg0ZUhnOEwyeHZZMkZzYVhSaFFtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4d2NtOTJhVzVqYVdGQ1pXNWxabWxqYVdGeWFXOCtlSGc4TDNCeWIzWnBibU5wWVVKbGJtVm1hV05wWVhKcGJ6NEtDUWs4Ym1GNmFXOXVaVUpsYm1WbWFXTnBZWEpwYno1NGVEd3ZibUY2YVc5dVpVSmxibVZtYVdOcFlYSnBiejRLQ1R3dlpXNTBaVUpsYm1WbWFXTnBZWEpwYno0S0NUeGtZWFJwVm1WeWMyRnRaVzUwYno0S0NRazhaR0YwWVVWelpXTjFlbWx2Ym1WUVlXZGhiV1Z1ZEc4K01qQXlNeTB4TWkweE5Tc3dNVG93TUR3dlpHRjBZVVZ6WldOMWVtbHZibVZRWVdkaGJXVnVkRzgrQ2drSlBHbHRjRzl5ZEc5VWIzUmhiR1ZFWVZabGNuTmhjbVUrTmpVMUxqQXdQQzlwYlhCdmNuUnZWRzkwWVd4bFJHRldaWEp6WVhKbFBnb0pDVHgwYVhCdlZtVnljMkZ0Wlc1MGJ6NUNRbFE4TDNScGNHOVdaWEp6WVcxbGJuUnZQZ29KQ1R4cFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOVdaWEp6WVcxbGJuUnZQakF4TURBd01EQXdNREF3TURBd01ESXdQQzlwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5V1pYSnpZVzFsYm5SdlBnb0pDVHhqYjJScFkyVkRiMjUwWlhOMGIxQmhaMkZ0Wlc1MGJ6NTBNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREF5TUR3dlkyOWthV05sUTI5dWRHVnpkRzlRWVdkaGJXVnVkRzgrQ2drSlBHWnBjbTFoVW1salpYWjFkR0UrTUR3dlptbHliV0ZTYVdObGRuVjBZVDRLQ1FrOFpHRjBhVk5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KQ1FrOGFXMXdiM0owYjFOcGJtZHZiRzlXWlhKellXMWxiblJ2UGpZd01DNHdNRHd2YVcxd2IzSjBiMU5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KQ1FrOGFXSmhia0ZqWTNKbFpHbDBiejVKVkRFNFZUQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNVEE4TDJsaVlXNUJZMk55WldScGRHOCtDZ2tKQ1R4allYVnpZV3hsVm1WeWMyRnRaVzUwYno1NGVIaDRlSGg0UEM5allYVnpZV3hsVm1WeWMyRnRaVzUwYno0S0NRa0pQR1JoZEdsVGNHVmphV1pwWTJsU2FYTmpiM056YVc5dVpUNTRlSGg0ZUhoNFBDOWtZWFJwVTNCbFkybG1hV05wVW1selkyOXpjMmx2Ym1VK0Nna0pQQzlrWVhScFUybHVaMjlzYjFabGNuTmhiV1Z1ZEc4K0NnazhMMlJoZEdsV1pYSnpZVzFsYm5SdlBnbzhMMUpRVkQ0PTwvcnB0PgoJCQkJPC9lbGVtZW50b0xpc3RhUlBUPgoJCQk8L2xpc3RhUlBUPgoJCQk8bXVsdGlCZW5lZmljaWFyaW8+ZmFsc2U8L211bHRpQmVuZWZpY2lhcmlvPgoJCTwvbnMzOm5vZG9JbnZpYUNhcnJlbGxvUlBUPgoJPC9TT0FQLUVOVjpCb2R5Pgo8L1NPQVAtRU5WOkVudmVsb3BlPg==',
];
$data_resp = [
    ':id'                       => 251,
    ':date_event'               => '2024-03-11',
    ':inserted_timestamp'       => '2024-03-11 10:31:00.197',
    ':tipoevento'               => 'nodoInviaCarrelloRPT',
    ':sottotipoevento'          => 'RESP',
    ':iddominio'                => '',
    ':iuv'                      => '',
    ':ccp'                      => '',
    ':noticenumber'             => '',
    ':creditorreferenceid'      => '',
    ':paymenttoken'             => '',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000010',
    ':sessionidoriginal'        => 'session_id_original_000010',
    ':uniqueid'                 => 'T000025',
    ':payload'                  => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpwcHQ9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIiB4bWxuczpwcHRoZWFkPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIiB4bWxuczp0bnM9Imh0dHA6Ly9Ob2RvUGFnYW1lbnRpU1BDLnNwY29vcC5nb3YuaXQvc2Vydml6aS9QYWdhbWVudGlUZWxlbWF0aWNpUlBUIiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBwdDpub2RvSW52aWFDYXJyZWxsb1JQVFJpc3Bvc3RhPgoJCQk8ZXNpdG9Db21wbGVzc2l2b09wZXJhemlvbmU+T0s8L2VzaXRvQ29tcGxlc3Npdm9PcGVyYXppb25lPgoJCQk8dXJsPmh0dHBzOi8vd2lzcDIucGFnb3BhLmdvdi5pdC93YWxsZXQvd2VsY29tZT9pZFNlc3Npb249NjA2N2FiMGItMGIxNi00NDVhLThlN2MtZGVkZGQ3Y2IxYzZiPC91cmw+CgkJPC9wcHQ6bm9kb0ludmlhQ2FycmVsbG9SUFRSaXNwb3N0YT4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+',
];

Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);




$data_resp = [
    ':id'                       => 261,
    ':date_event'               => '2024-03-11',
    ':inserted_timestamp'       => '2024-03-11 10:32:00.197',
    ':tipoevento'               => 'nodoInviaCarrelloRPT',
    ':sottotipoevento'          => 'RESP',
    ':iddominio'                => '',
    ':iuv'                      => '',
    ':ccp'                      => '',
    ':noticenumber'             => '',
    ':creditorreferenceid'      => '',
    ':paymenttoken'             => '',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000010',
    ':sessionidoriginal'        => 'session_id_original_000010',
    ':uniqueid'                 => 'T000026',
    ':payload'                  => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpwcHQ9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIiB4bWxuczpwcHRoZWFkPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIiB4bWxuczp0bnM9Imh0dHA6Ly9Ob2RvUGFnYW1lbnRpU1BDLnNwY29vcC5nb3YuaXQvc2Vydml6aS9QYWdhbWVudGlUZWxlbWF0aWNpUlBUIiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBwdDpub2RvSW52aWFDYXJyZWxsb1JQVFJpc3Bvc3RhPgoJCQk8ZXNpdG9Db21wbGVzc2l2b09wZXJhemlvbmU+T0s8L2VzaXRvQ29tcGxlc3Npdm9PcGVyYXppb25lPgoJCQk8dXJsPmh0dHBzOi8vd2lzcDIucGFnb3BhLmdvdi5pdC93YWxsZXQvd2VsY29tZT9pZFNlc3Npb249NjA2N2FiMGItMGIxNi00NDVhLThlN2MtZGVkZGQ3Y2IxYzZiPC91cmw+CgkJPC9wcHQ6bm9kb0ludmlhQ2FycmVsbG9SUFRSaXNwb3N0YT4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+',
];
Capsule::statement($render_query, $data_resp);

*/
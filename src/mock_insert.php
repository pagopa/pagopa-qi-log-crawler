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

Capsule::statement('truncate table transaction_re_2024, transaction_2024, transaction_details_2024, transaction_events_2024;');
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
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


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

Capsule::statement('truncate table transaction_re_2024, transaction_2024, transaction_details_2024, transaction_events_2024, metadata_2024, extra_info_2024;');
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
    ':sessionid'                => 'sessid_140003',
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
    ':sessionid'                => 'sessid_130004',
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
    ':sessionid'                => 'sessid_120003',
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
    ':sessionid'                => 'sessid_110003',
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
    ':sessionid'                => 'sessid_100003',
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
    ':sessionid'                => 'sessid_700003',
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
    ':sessionid'                => 'sessid_500003',
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
    ':sessionid'                => 'sessid_500003',
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
    ':sessionid'                => 'sessid_400003',
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
    ':sessionid'                => 'sessid_400003',
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
    ':sessionid'                => 'sessid_300003',
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
    ':sessionid'                => 'sessid_300003',
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
    ':sessionid'                => 'sessid_200003',
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
    ':sessionid'                => 'sessid_200003',
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
    ':sessionid'                => 'sessid_100003',
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
    ':sessionid'                => 'sessid_100003',
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
    ':sessionid'                => '',
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
    ':sessionid'                => '',
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
    ':sessionid'                => '',
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
    ':sessionid'                => '',
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
    ':sessionid'                => '',
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
    ':sessionid'                => '',
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
    ':sessionid'                => '',
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
    ':sessionid'                => '',
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
    ':sessionid'                => '',
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
    ':sessionid'                => '',
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
    ':sessionid'                => '',
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
    ':sessionid'                => '',
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
    ':sessionid'                => '',
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
    ':sessionid'                => '',
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
    ':sessionid'                => '',
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
    ':sessionid'                => '',
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
    ':sessionid'                => '',
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
    ':uniqueid' => 'T100062',
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
    ':uniqueid' => 'T100063',
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
    ':sessionid' => 'sessid_000041',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T200062',
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
    ':sessionid' => 'sessid_000041',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T200063',
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
    ':sessionid'                => '',
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
    ':sessionid'                => '',
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
    ':sessionid' => 'sessid_100041',
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
    ':sessionid' => 'sessid_100041',
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
    ':sessionid' => '',
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
    ':sessionid' => '',
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
    ':sessionid' => 'sessid_010041',
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
    ':sessionid' => 'sessid_010041',
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
    ':sessionid' => '',
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
    ':sessionid' => '',
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
    ':sessionid' => 'sessid_030041',
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
    ':sessionid' => 'sessid_030041',
    ':sessionidoriginal' => 'session_id_original_000042',
    ':uniqueid' => 'T000081',
    ':payload' => 'PD94bWwgdmVyc2lvbj0nMS4wJyBlbmNvZGluZz0nVVRGLTgnPz4KPHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPgoJPHNvYXBlbnY6Qm9keT4KCQk8bnMyOnBzcEludmlhQ2FycmVsbG9SUFRSZXNwb25zZSB4bWxuczpuczI9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIj4KCQkJPHBzcEludmlhQ2FycmVsbG9SUFRSZXNwb25zZSB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIiB4c2k6dHlwZT0ibnMyOmVzaXRvUHNwSW52aWFDYXJyZWxsb1JQVCI+CgkJCQk8ZXNpdG9Db21wbGVzc2l2b09wZXJhemlvbmU+T0s8L2VzaXRvQ29tcGxlc3Npdm9PcGVyYXppb25lPgoJCQkJPGlkZW50aWZpY2F0aXZvQ2FycmVsbG8+eHh4eHh4eHh4eHh4eDwvaWRlbnRpZmljYXRpdm9DYXJyZWxsbz4KCQkJCTxwYXJhbWV0cmlQYWdhbWVudG9JbW1lZGlhdG8+aWRCcnVjaWF0dXJhPXh4dzIyPC9wYXJhbWV0cmlQYWdhbWVudG9JbW1lZGlhdG8+CgkJCTwvcHNwSW52aWFDYXJyZWxsb1JQVFJlc3BvbnNlPgoJCTwvbnMyOnBzcEludmlhQ2FycmVsbG9SUFRSZXNwb25zZT4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+',
];


Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);


$data_req = [
    ':id' => 82,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 10:40:00.197',
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
    ':sessionid' => '',
    ':sessionidoriginal' => 'session_id_original_000043',
    ':uniqueid' => 'T000082',
    ':payload' => 'PFNPQVAtRU5WOkVudmVsb3BlIHhtbG5zOlNPQVAtRU5WPSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyIgeG1sbnM6cHB0PSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOndzPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyI+Cgk8U09BUC1FTlY6SGVhZGVyPgoJCTxwcHQ6aW50ZXN0YXppb25lQ2FycmVsbG9QUFQ+CgkJCTxpZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QQT43Nzc3Nzc3Nzc3NzwvaWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUEE+CgkJCTxpZGVudGlmaWNhdGl2b1N0YXppb25lSW50ZXJtZWRpYXJpb1BBPjc3Nzc3Nzc3Nzc3XzAxPC9pZGVudGlmaWNhdGl2b1N0YXppb25lSW50ZXJtZWRpYXJpb1BBPgoJCQk8aWRlbnRpZmljYXRpdm9DYXJyZWxsbz5jMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDA1MTwvaWRlbnRpZmljYXRpdm9DYXJyZWxsbz4KCQk8L3BwdDppbnRlc3RhemlvbmVDYXJyZWxsb1BQVD4KCTwvU09BUC1FTlY6SGVhZGVyPgoJPFNPQVAtRU5WOkJvZHk+CgkJPG5zMzpub2RvSW52aWFDYXJyZWxsb1JQVCB4bWxuczpuczM9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIj4KCQkJPHBhc3N3b3JkPlBMQUNFSE9MREVSPC9wYXNzd29yZD4KCQkJPGlkZW50aWZpY2F0aXZvUFNQPkFHSURfMDE8L2lkZW50aWZpY2F0aXZvUFNQPgoJCQk8aWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUFNQPjg4ODg4ODg4ODg4PC9pZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QU1A+CgkJCTxpZGVudGlmaWNhdGl2b0NhbmFsZT44ODg4ODg4ODg4OF8wMTwvaWRlbnRpZmljYXRpdm9DYW5hbGU+CgkJCTxsaXN0YVJQVD4KCQkJCTxlbGVtZW50b0xpc3RhUlBUPgoJCQkJCTxpZGVudGlmaWNhdGl2b0RvbWluaW8+Nzc3Nzc3Nzc3Nzc8L2lkZW50aWZpY2F0aXZvRG9taW5pbz4KCQkJCQk8aWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4wMTAwMDAwMDAwMDAwMDA1MTwvaWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4KCQkJCQk8Y29kaWNlQ29udGVzdG9QYWdhbWVudG8+dDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwNTE8L2NvZGljZUNvbnRlc3RvUGFnYW1lbnRvPgoJCQkJCTxycHQ+UEZKUVZDQjRiV3h1Y3owaWFIUjBjRG92TDNkM2R5NWthV2RwZEhCaExtZHZkaTVwZEM5elkyaGxiV0Z6THpJd01URXZVR0ZuWVcxbGJuUnBMeUkrQ2drOGRtVnljMmx2Ym1WUFoyZGxkSFJ2UGpFdU1Ed3ZkbVZ5YzJsdmJtVlBaMmRsZEhSdlBnb0pQR1J2YldsdWFXOCtDZ2tKUEdsa1pXNTBhV1pwWTJGMGFYWnZSRzl0YVc1cGJ6NDNOemMzTnpjM056YzNOend2YVdSbGJuUnBabWxqWVhScGRtOUViMjFwYm1sdlBnb0pQQzlrYjIxcGJtbHZQZ29KUEdsa1pXNTBhV1pwWTJGMGFYWnZUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQakl3TWpNeE1qRTFNREV3TVRVek9XRmlZbUV6TXpVdFlXSTBaUzAwWkRFNExXRXpQQzlwWkdWdWRHbG1hV05oZEdsMmIwMWxjM05oWjJkcGIxSnBZMmhwWlhOMFlUNEtDVHhrWVhSaFQzSmhUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQakl3TWpNdE1USXRNVFZVTVRNNk1ERTZOVE11TmpFNUt6QXhPakF3UEM5a1lYUmhUM0poVFdWemMyRm5aMmx2VW1samFHbGxjM1JoUGdvSlBHRjFkR1Z1ZEdsallYcHBiMjVsVTI5bloyVjBkRzgrVGk5QlBDOWhkWFJsYm5ScFkyRjZhVzl1WlZOdloyZGxkSFJ2UGdvSlBITnZaMmRsZEhSdlZtVnljMkZ1ZEdVK0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFabGNuTmhiblJsUGdvSkNRazhkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NUhQQzkwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1FrOFkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBqYzNOemMzTnpjM056YzNQQzlqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSlBDOXBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlXWlhKellXNTBaVDRLQ1FrOFlXNWhaM0poWm1sallWWmxjbk5oYm5SbFBuaDRlSGg0ZUhoNGVEd3ZZVzVoWjNKaFptbGpZVlpsY25OaGJuUmxQZ29KUEM5emIyZG5aWFIwYjFabGNuTmhiblJsUGdvSlBITnZaMmRsZEhSdlVHRm5ZWFJ2Y21VK0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFCaFoyRjBiM0psUGdvSkNRazhkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NUhQQzkwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1FrOFkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBqYzNOemMzTnpjM056YzNQQzlqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSlBDOXBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlRWVdkaGRHOXlaVDRLQ1FrOFlXNWhaM0poWm1sallWQmhaMkYwYjNKbFBuaDRlSGg0ZUhoNGVEd3ZZVzVoWjNKaFptbGpZVkJoWjJGMGIzSmxQZ29KUEM5emIyZG5aWFIwYjFCaFoyRjBiM0psUGdvSlBHVnVkR1ZDWlc1bFptbGphV0Z5YVc4K0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjBKbGJtVm1hV05wWVhKcGJ6NEtDUWtKUEhScGNHOUpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrUnp3dmRHbHdiMGxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno0S0NRa0pQR052WkdsalpVbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejQzTnpjM056YzNOemMzTnp3dlkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBnb0pDVHd2YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlFtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4a1pXNXZiV2x1WVhwcGIyNWxRbVZ1WldacFkybGhjbWx2UG5oNGVIaDRlSGc4TDJSbGJtOXRhVzVoZW1sdmJtVkNaVzVsWm1samFXRnlhVzgrQ2drSlBHTnZaR2xqWlZWdWFYUlBjR1Z5UW1WdVpXWnBZMmxoY21sdlBuaDRQQzlqYjJScFkyVlZibWwwVDNCbGNrSmxibVZtYVdOcFlYSnBiejRLQ1FrOFpHVnViMjFWYm1sMFQzQmxja0psYm1WbWFXTnBZWEpwYno1NGVIaDRlSGc4TDJSbGJtOXRWVzVwZEU5d1pYSkNaVzVsWm1samFXRnlhVzgrQ2drSlBHbHVaR2x5YVhwNmIwSmxibVZtYVdOcFlYSnBiejU0ZUhoNFBDOXBibVJwY21sNmVtOUNaVzVsWm1samFXRnlhVzgrQ2drSlBHTnBkbWxqYjBKbGJtVm1hV05wWVhKcGJ6NTRlSGc4TDJOcGRtbGpiMEpsYm1WbWFXTnBZWEpwYno0S0NRazhZMkZ3UW1WdVpXWnBZMmxoY21sdlBuaDRlSGg0UEM5allYQkNaVzVsWm1samFXRnlhVzgrQ2drSlBHeHZZMkZzYVhSaFFtVnVaV1pwWTJsaGNtbHZQbmg0ZUhnOEwyeHZZMkZzYVhSaFFtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4d2NtOTJhVzVqYVdGQ1pXNWxabWxqYVdGeWFXOCtlSGc4TDNCeWIzWnBibU5wWVVKbGJtVm1hV05wWVhKcGJ6NEtDUWs4Ym1GNmFXOXVaVUpsYm1WbWFXTnBZWEpwYno1NGVEd3ZibUY2YVc5dVpVSmxibVZtYVdOcFlYSnBiejRLQ1R3dlpXNTBaVUpsYm1WbWFXTnBZWEpwYno0S0NUeGtZWFJwVm1WeWMyRnRaVzUwYno0S0NRazhaR0YwWVVWelpXTjFlbWx2Ym1WUVlXZGhiV1Z1ZEc4K01qQXlNeTB4TWkweE5Tc3dNVG93TUR3dlpHRjBZVVZ6WldOMWVtbHZibVZRWVdkaGJXVnVkRzgrQ2drSlBHbHRjRzl5ZEc5VWIzUmhiR1ZFWVZabGNuTmhjbVUrTmpBd0xqQXdQQzlwYlhCdmNuUnZWRzkwWVd4bFJHRldaWEp6WVhKbFBnb0pDVHgwYVhCdlZtVnljMkZ0Wlc1MGJ6NUNRbFE4TDNScGNHOVdaWEp6WVcxbGJuUnZQZ29KQ1R4cFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOVdaWEp6WVcxbGJuUnZQakF4TURBd01EQXdNREF3TURBd01EVXhQQzlwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5V1pYSnpZVzFsYm5SdlBnb0pDVHhqYjJScFkyVkRiMjUwWlhOMGIxQmhaMkZ0Wlc1MGJ6NTBNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREExTVR3dlkyOWthV05sUTI5dWRHVnpkRzlRWVdkaGJXVnVkRzgrQ2drSlBHWnBjbTFoVW1salpYWjFkR0UrTUR3dlptbHliV0ZTYVdObGRuVjBZVDRLQ1FrOFpHRjBhVk5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KQ1FrOGFXMXdiM0owYjFOcGJtZHZiRzlXWlhKellXMWxiblJ2UGpZd01DNHdNRHd2YVcxd2IzSjBiMU5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KQ1FrOGFXSmhia0ZqWTNKbFpHbDBiejVKVkRFNFZUQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNVEE4TDJsaVlXNUJZMk55WldScGRHOCtDZ2tKQ1R4allYVnpZV3hsVm1WeWMyRnRaVzUwYno1NGVIaDRlSGg0UEM5allYVnpZV3hsVm1WeWMyRnRaVzUwYno0S0NRa0pQR1JoZEdsVGNHVmphV1pwWTJsU2FYTmpiM056YVc5dVpUNTRlSGg0ZUhoNFBDOWtZWFJwVTNCbFkybG1hV05wVW1selkyOXpjMmx2Ym1VK0Nna0pQQzlrWVhScFUybHVaMjlzYjFabGNuTmhiV1Z1ZEc4K0NnazhMMlJoZEdsV1pYSnpZVzFsYm5SdlBnbzhMMUpRVkQ0PTwvcnB0PgoJCQkJPC9lbGVtZW50b0xpc3RhUlBUPgoJCQk8L2xpc3RhUlBUPgoJCQk8bXVsdGlCZW5lZmljaWFyaW8+ZmFsc2U8L211bHRpQmVuZWZpY2lhcmlvPgoJCTwvbnMzOm5vZG9JbnZpYUNhcnJlbGxvUlBUPgoJPC9TT0FQLUVOVjpCb2R5Pgo8L1NPQVAtRU5WOkVudmVsb3BlPg==',
];
$data_resp = [
    ':id' => 83,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 10:40:01.197',
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
    ':sessionid' => '',
    ':sessionidoriginal' => 'session_id_original_000043',
    ':uniqueid' => 'T000083',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpwcHQ9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIiB4bWxuczpwcHRoZWFkPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIiB4bWxuczp0bnM9Imh0dHA6Ly9Ob2RvUGFnYW1lbnRpU1BDLnNwY29vcC5nb3YuaXQvc2Vydml6aS9QYWdhbWVudGlUZWxlbWF0aWNpUlBUIiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBwdDpub2RvSW52aWFDYXJyZWxsb1JQVFJpc3Bvc3RhPgoJCQk8ZXNpdG9Db21wbGVzc2l2b09wZXJhemlvbmU+T0s8L2VzaXRvQ29tcGxlc3Npdm9PcGVyYXppb25lPgoJCQk8dXJsPmh0dHBzOi8vd2lzcDIucGFnb3BhLmdvdi5pdC93YWxsZXQvd2VsY29tZT9pZFNlc3Npb249NjA2N2FiMGItMGIxNi00NDVhLThlN2MtZGVkZGQ3Y2IxYzZiPC91cmw+CgkJPC9wcHQ6bm9kb0ludmlhQ2FycmVsbG9SUFRSaXNwb3N0YT4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+',
];

Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);


$data_req = [
    ':id' => 84,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 10:42:00.197',
    ':tipoevento' => 'pspInviaCarrelloRPTCarte',
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
    ':sessionid' => 'sessid_000043',
    ':sessionidoriginal' => 'session_id_original_000043',
    ':uniqueid' => 'T000084',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpwYXlfaj0iaHR0cDovL3d3dy5jbmlwYS5nb3YuaXQvc2NoZW1hcy8yMDEwL1BhZ2FtZW50aS9BY2tfMV8wLyIgeG1sbnM6cHB0PSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnRucz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0IiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBwdDpwc3BJbnZpYUNhcnJlbGxvUlBUQ2FydGU+CgkJCTxpZGVudGlmaWNhdGl2b1BTUD5QU1BfUlBUPC9pZGVudGlmaWNhdGl2b1BTUD4KCQkJPGlkZW50aWZpY2F0aXZvSW50ZXJtZWRpYXJpb1BTUD44ODg4ODg4ODg4ODwvaWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUFNQPgoJCQk8aWRlbnRpZmljYXRpdm9DYW5hbGU+ODg4ODg4ODg4ODhfMDE8L2lkZW50aWZpY2F0aXZvQ2FuYWxlPgoJCQk8bW9kZWxsb1BhZ2FtZW50bz4xPC9tb2RlbGxvUGFnYW1lbnRvPgoJCQk8bGlzdGFSUFQ+CgkJCQk8ZWxlbWVudG9MaXN0YUNhcnJlbGxvUlBUPgoJCQkJCTxpZGVudGlmaWNhdGl2b0RvbWluaW8+Nzc3Nzc3Nzc3Nzc8L2lkZW50aWZpY2F0aXZvRG9taW5pbz4KCQkJCQk8aWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4wMTAwMDAwMDAwMDAwMDA1MTwvaWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4KCQkJCQk8Y29kaWNlQ29udGVzdG9QYWdhbWVudG8+dDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwNTE8L2NvZGljZUNvbnRlc3RvUGFnYW1lbnRvPgoJCQkJCTxycHQ+UEZKUVZDQjRiV3h1Y3owaWFIUjBjRG92TDNkM2R5NWthV2RwZEhCaExtZHZkaTVwZEM5elkyaGxiV0Z6THpJd01URXZVR0ZuWVcxbGJuUnBMeUkrQ2lBZ0lDQThkbVZ5YzJsdmJtVlBaMmRsZEhSdlBqWXVNaTR3UEM5MlpYSnphVzl1WlU5bloyVjBkRzgrQ2lBZ0lDQThaRzl0YVc1cGJ6NEtJQ0FnSUNBZ0lDQThhV1JsYm5ScFptbGpZWFJwZG05RWIyMXBibWx2UGpjM056YzNOemMzTnpjM1BDOXBaR1Z1ZEdsbWFXTmhkR2wyYjBSdmJXbHVhVzgrQ2lBZ0lDQWdJQ0FnUEdsa1pXNTBhV1pwWTJGMGFYWnZVM1JoZW1sdmJtVlNhV05vYVdWa1pXNTBaVDQzTnpjM056YzNOemMzTjE4d01Ud3ZhV1JsYm5ScFptbGpZWFJwZG05VGRHRjZhVzl1WlZKcFkyaHBaV1JsYm5SbFBnb2dJQ0FnUEM5a2IyMXBibWx2UGdvZ0lDQWdQR2xrWlc1MGFXWnBZMkYwYVhadlRXVnpjMkZuWjJsdlVtbGphR2xsYzNSaFBtWXpaV016Tm1SaU56aGtZVFEwTkdaaFlqUmpaakJtT1RBNE9XSm1aRGt3UEM5cFpHVnVkR2xtYVdOaGRHbDJiMDFsYzNOaFoyZHBiMUpwWTJocFpYTjBZVDRLSUNBZ0lEeGtZWFJoVDNKaFRXVnpjMkZuWjJsdlVtbGphR2xsYzNSaFBqSXdNalF0TURRdE1EbFVNakU2TlRNNk16WThMMlJoZEdGUGNtRk5aWE56WVdkbmFXOVNhV05vYVdWemRHRStDaUFnSUNBOFlYVjBaVzUwYVdOaGVtbHZibVZUYjJkblpYUjBiejU0ZUhnOEwyRjFkR1Z1ZEdsallYcHBiMjVsVTI5bloyVjBkRzgrQ2lBZ0lDQThjMjluWjJWMGRHOVFZV2RoZEc5eVpUNEtJQ0FnSUNBZ0lDQThhV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52VUdGbllYUnZjbVUrQ2lBZ0lDQWdJQ0FnSUNBZ0lEeDBhWEJ2U1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBuZzhMM1JwY0c5SlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtDaUFnSUNBZ0lDQWdJQ0FnSUR4amIyUnBZMlZKWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI4K2VIaDRlSGg0ZUR3dlkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBnb2dJQ0FnSUNBZ0lEd3ZhV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52VUdGbllYUnZjbVUrQ2lBZ0lDQWdJQ0FnUEdGdVlXZHlZV1pwWTJGUVlXZGhkRzl5WlQ1NGVIaDRlRHd2WVc1aFozSmhabWxqWVZCaFoyRjBiM0psUGdvZ0lDQWdJQ0FnSUR4dVlYcHBiMjVsVUdGbllYUnZjbVUrU1ZROEwyNWhlbWx2Ym1WUVlXZGhkRzl5WlQ0S0lDQWdJQ0FnSUNBOFpTMXRZV2xzVUdGbllYUnZjbVUrZUhoNGVIaEFlSGg0ZUM1amIyMDhMMlV0YldGcGJGQmhaMkYwYjNKbFBnb2dJQ0FnUEM5emIyZG5aWFIwYjFCaFoyRjBiM0psUGdvZ0lDQWdQR1Z1ZEdWQ1pXNWxabWxqYVdGeWFXOCtDaUFnSUNBZ0lDQWdQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjBKbGJtVm1hV05wWVhKcGJ6NEtJQ0FnSUNBZ0lDQWdJQ0FnUEhScGNHOUpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrUnp3dmRHbHdiMGxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno0S0lDQWdJQ0FnSUNBZ0lDQWdQR052WkdsalpVbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejU0ZUhoNGVIZzhMMk52WkdsalpVbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejRLSUNBZ0lDQWdJQ0E4TDJsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amIwSmxibVZtYVdOcFlYSnBiejRLSUNBZ0lDQWdJQ0E4WkdWdWIyMXBibUY2YVc5dVpVSmxibVZtYVdOcFlYSnBiejU0ZUhoNGVEd3ZaR1Z1YjIxcGJtRjZhVzl1WlVKbGJtVm1hV05wWVhKcGJ6NEtJQ0FnSUR3dlpXNTBaVUpsYm1WbWFXTnBZWEpwYno0S0lDQWdJRHhrWVhScFZtVnljMkZ0Wlc1MGJ6NEtJQ0FnSUNBZ0lDQThaR0YwWVVWelpXTjFlbWx2Ym1WUVlXZGhiV1Z1ZEc4K01qQXlOQzB3TkMwd09Ud3ZaR0YwWVVWelpXTjFlbWx2Ym1WUVlXZGhiV1Z1ZEc4K0NpQWdJQ0FnSUNBZ1BHbHRjRzl5ZEc5VWIzUmhiR1ZFWVZabGNuTmhjbVUrTmpBd0xqQXdQQzlwYlhCdmNuUnZWRzkwWVd4bFJHRldaWEp6WVhKbFBnb2dJQ0FnSUNBZ0lEeDBhWEJ2Vm1WeWMyRnRaVzUwYno1RFVEd3ZkR2x3YjFabGNuTmhiV1Z1ZEc4K0NpQWdJQ0FnSUNBZ1BHbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiMVpsY25OaGJXVnVkRzgrTURFd01EQXdNREF3TURBd01EQXdOVEU4TDJsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amIxWmxjbk5oYldWdWRHOCtDaUFnSUNBZ0lDQWdQR052WkdsalpVTnZiblJsYzNSdlVHRm5ZVzFsYm5SdlBuUXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNRFV4UEM5amIyUnBZMlZEYjI1MFpYTjBiMUJoWjJGdFpXNTBiejRLSUNBZ0lDQWdJQ0E4Wm1seWJXRlNhV05sZG5WMFlUNHdQQzltYVhKdFlWSnBZMlYyZFhSaFBnb2dJQ0FnSUNBZ0lEeGtZWFJwVTJsdVoyOXNiMVpsY25OaGJXVnVkRzgrQ2lBZ0lDQWdJQ0FnSUNBZ0lEeHBiWEJ2Y25SdlUybHVaMjlzYjFabGNuTmhiV1Z1ZEc4K05qQXdMakF3UEM5cGJYQnZjblJ2VTJsdVoyOXNiMVpsY25OaGJXVnVkRzgrQ2lBZ0lDQWdJQ0FnSUNBZ0lEeHBZbUZ1UVdOamNtVmthWFJ2UGtsVU1UaFZNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TVR3dmFXSmhia0ZqWTNKbFpHbDBiejRLSUNBZ0lDQWdJQ0FnSUNBZ1BHTmhkWE5oYkdWV1pYSnpZVzFsYm5SdlBuaDRlSGg0ZUhnOEwyTmhkWE5oYkdWV1pYSnpZVzFsYm5SdlBnb2dJQ0FnSUNBZ0lDQWdJQ0E4WkdGMGFWTndaV05wWm1samFWSnBjMk52YzNOcGIyNWxQbmg0ZUhoNGVIZzhMMlJoZEdsVGNHVmphV1pwWTJsU2FYTmpiM056YVc5dVpUNEtJQ0FnSUNBZ0lDQThMMlJoZEdsVGFXNW5iMnh2Vm1WeWMyRnRaVzUwYno0S0lDQWdJRHd2WkdGMGFWWmxjbk5oYldWdWRHOCtDand2VWxCVVBnPT08L3JwdD4KCQkJCTwvZWxlbWVudG9MaXN0YUNhcnJlbGxvUlBUPgoJCQk8L2xpc3RhUlBUPgoJCQk8cnJuPjAwMDAwMDAwMDA1MTwvcnJuPgoJCQk8ZXNpdG9UcmFuc2F6aW9uZUNhcnRhPjAwPC9lc2l0b1RyYW5zYXppb25lQ2FydGE+CgkJCTxpbXBvcnRvVG90YWxlUGFnYXRvPjYwMS4wMDwvaW1wb3J0b1RvdGFsZVBhZ2F0bz4KCQkJPHRpbWVzdGFtcE9wZXJhemlvbmU+MjAyNC0wNC0xMFQyMToxNDo0OC45MTQrMDI6MDA8L3RpbWVzdGFtcE9wZXJhemlvbmU+CgkJCTxjb2RpY2VBdXRvcml6emF0aXZvPjAwMDAwMzwvY29kaWNlQXV0b3JpenphdGl2bz4KCQk8L3BwdDpwc3BJbnZpYUNhcnJlbGxvUlBUQ2FydGU+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg==',
];

$data_resp = [
    ':id' => 85,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 10:42:01.197',
    ':tipoevento' => 'pspInviaCarrelloRPTCarte',
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
    ':sessionid' => 'sessid_000043',
    ':sessionidoriginal' => 'session_id_original_000043',
    ':uniqueid' => 'T000085',
    ':payload' => 'PD94bWwgdmVyc2lvbj0nMS4wJyBlbmNvZGluZz0nVVRGLTgnPz4KPHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPgoJPHNvYXBlbnY6Qm9keT4KCQk8bnMyOnBzcEludmlhQ2FycmVsbG9SUFRDYXJ0ZVJlc3BvbnNlIHhtbG5zOm5zMj0iaHR0cDovL3dzLnBhZ2FtZW50aS50ZWxlbWF0aWNpLmdvdi8iPgoJCQk8cHNwSW52aWFDYXJyZWxsb1JQVENhcnRlUmVzcG9uc2UgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSIgeHNpOnR5cGU9Im5zMjplc2l0b1BzcEludmlhQ2FycmVsbG9SUFQiPgoJCQkJPGVzaXRvQ29tcGxlc3Npdm9PcGVyYXppb25lPk9LPC9lc2l0b0NvbXBsZXNzaXZvT3BlcmF6aW9uZT4KCQkJCTxpZGVudGlmaWNhdGl2b0NhcnJlbGxvPnh4eHh4eHh4eHh4eHg8L2lkZW50aWZpY2F0aXZvQ2FycmVsbG8+CgkJCQk8cGFyYW1ldHJpUGFnYW1lbnRvSW1tZWRpYXRvPmlkQnJ1Y2lhdHVyYT14eHcyMjwvcGFyYW1ldHJpUGFnYW1lbnRvSW1tZWRpYXRvPgoJCQk8L3BzcEludmlhQ2FycmVsbG9SUFRDYXJ0ZVJlc3BvbnNlPgoJCTwvbnMyOnBzcEludmlhQ2FycmVsbG9SUFRDYXJ0ZVJlc3BvbnNlPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4=',
];


Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);

























$data_req = [
    ':id' => 86,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 12:41:00.197',
    ':tipoevento' => 'nodoInviaRPT',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000055',
    ':ccp' => 'c0000000000000000000000000000055',
    ':noticenumber' => '',
    ':creditorreferenceid' => '',
    ':paymenttoken' => '',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_000044',
    ':sessionidoriginal' => 'session_id_original_000044',
    ':uniqueid' => 'T000086',
    ':payload' => 'PHNvYXA6RW52ZWxvcGUgeG1sbnM6c29hcD0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPgoJPHNvYXA6SGVhZGVyPgoJCTxuczQ6aW50ZXN0YXppb25lUFBUIFNPQVAtRU5WOmFjdG9yPSJodHRwOi8vcGRkNGoub3JnL3BvcnRhZG9taW5pbyIgU09BUC1FTlY6bXVzdFVuZGVyc3RhbmQ9IjEiIHhtbG5zPSIiIHhtbG5zOlNPQVAtRU5WPSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyIgeG1sbnM6bnMzPSJodHRwOi8vd3d3LmRpZ2l0cGEuZ292Lml0L3NjaGVtYXMvMjAxMS9QYWdhbWVudGkvIiB4bWxuczpuczQ9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvcHB0aGVhZCIgeG1sbnM6bnM1PSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyI+CgkJCTxpZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QQT43Nzc3Nzc3Nzc3NzwvaWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUEE+CgkJCTxpZGVudGlmaWNhdGl2b1N0YXppb25lSW50ZXJtZWRpYXJpb1BBPjc3Nzc3Nzc3Nzc3XzAxPC9pZGVudGlmaWNhdGl2b1N0YXppb25lSW50ZXJtZWRpYXJpb1BBPgoJCQk8aWRlbnRpZmljYXRpdm9Eb21pbmlvPjc3Nzc3Nzc3Nzc3PC9pZGVudGlmaWNhdGl2b0RvbWluaW8+CgkJCTxpZGVudGlmaWNhdGl2b1VuaXZvY29WZXJzYW1lbnRvPjAxMDAwMDAwMDAwMDAwMDU1PC9pZGVudGlmaWNhdGl2b1VuaXZvY29WZXJzYW1lbnRvPgoJCQk8Y29kaWNlQ29udGVzdG9QYWdhbWVudG8+YzAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwNTU8L2NvZGljZUNvbnRlc3RvUGFnYW1lbnRvPgoJCTwvbnM0OmludGVzdGF6aW9uZVBQVD4KCTwvc29hcDpIZWFkZXI+Cgk8c29hcDpCb2R5PgoJCTxuczU6bm9kb0ludmlhUlBUIHhtbG5zPSIiIHhtbG5zOm5zMz0iaHR0cDovL3d3dy5kaWdpdHBhLmdvdi5pdC9zY2hlbWFzLzIwMTEvUGFnYW1lbnRpLyIgeG1sbnM6bnM0PSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOm5zNT0iaHR0cDovL3dzLnBhZ2FtZW50aS50ZWxlbWF0aWNpLmdvdi8iPgoJCQk8cGFzc3dvcmQ+UExBQ0VIT0xERVI8L3Bhc3N3b3JkPgoJCQk8aWRlbnRpZmljYXRpdm9QU1A+QUdJRF8wMTwvaWRlbnRpZmljYXRpdm9QU1A+CgkJCTxpZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QU1A+ODg4ODg4ODg4ODg8L2lkZW50aWZpY2F0aXZvSW50ZXJtZWRpYXJpb1BTUD4KCQkJPGlkZW50aWZpY2F0aXZvQ2FuYWxlPjg4ODg4ODg4ODg4XzAxPC9pZGVudGlmaWNhdGl2b0NhbmFsZT4KCQkJPHRpcG9GaXJtYS8+CgkJCTxycHQ+UEQ5NGJXd2dkbVZ5YzJsdmJqMGlNUzR3SWlCbGJtTnZaR2x1WnowaVZWUkdMVGdpSUhOMFlXNWtZV3h2Ym1VOUlubGxjeUkvUGdvOFVsQlVJSGh0Ykc1elBTSm9kSFJ3T2k4dmQzZDNMbVJwWjJsMGNHRXVaMjkyTG1sMEwzTmphR1Z0WVhNdk1qQXhNUzlRWVdkaGJXVnVkR2t2SWo0S0NUeDJaWEp6YVc5dVpVOW5aMlYwZEc4K05pNHlQQzkyWlhKemFXOXVaVTluWjJWMGRHOCtDZ2s4Wkc5dGFXNXBiejRLQ1FrOGFXUmxiblJwWm1sallYUnBkbTlFYjIxcGJtbHZQamMzTnpjM056YzNOemMzUEM5cFpHVnVkR2xtYVdOaGRHbDJiMFJ2YldsdWFXOCtDZ2s4TDJSdmJXbHVhVzgrQ2drOGFXUmxiblJwWm1sallYUnBkbTlOWlhOellXZG5hVzlTYVdOb2FXVnpkR0UrZUhoNGVIaDRlRHd2YVdSbGJuUnBabWxqWVhScGRtOU5aWE56WVdkbmFXOVNhV05vYVdWemRHRStDZ2s4WkdGMFlVOXlZVTFsYzNOaFoyZHBiMUpwWTJocFpYTjBZVDR5TURJMExUQTBMVEV3VkRJeE9qRTBPak00UEM5a1lYUmhUM0poVFdWemMyRm5aMmx2VW1samFHbGxjM1JoUGdvSlBHRjFkR1Z1ZEdsallYcHBiMjVsVTI5bloyVjBkRzgrVGk5QlBDOWhkWFJsYm5ScFkyRjZhVzl1WlZOdloyZGxkSFJ2UGdvSlBITnZaMmRsZEhSdlVHRm5ZWFJ2Y21VK0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFCaFoyRjBiM0psUGdvSkNRazhkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NUdQQzkwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1FrOFkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBuaDRlSGg0ZUhoNGVEd3ZZMjlrYVdObFNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1R3dmFXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZVR0ZuWVhSdmNtVStDZ2tKUEdGdVlXZHlZV1pwWTJGUVlXZGhkRzl5WlQ1NGVIaDRlSGg0ZUhnOEwyRnVZV2R5WVdacFkyRlFZV2RoZEc5eVpUNEtDVHd2YzI5bloyVjBkRzlRWVdkaGRHOXlaVDRLQ1R4bGJuUmxRbVZ1WldacFkybGhjbWx2UGdvSkNUeHBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlDWlc1bFptbGphV0Z5YVc4K0Nna0pDVHgwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQa2M4TDNScGNHOUpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSkNUeGpiMlJwWTJWSlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtlSGg0ZUhoNFBDOWpiMlJwWTJWSlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtDZ2tKUEM5cFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOUNaVzVsWm1samFXRnlhVzgrQ2drSlBHUmxibTl0YVc1aGVtbHZibVZDWlc1bFptbGphV0Z5YVc4K2VIaDRlSGg0UEM5a1pXNXZiV2x1WVhwcGIyNWxRbVZ1WldacFkybGhjbWx2UGdvSlBDOWxiblJsUW1WdVpXWnBZMmxoY21sdlBnb0pQR1JoZEdsV1pYSnpZVzFsYm5SdlBnb0pDVHhrWVhSaFJYTmxZM1Y2YVc5dVpWQmhaMkZ0Wlc1MGJ6NHlNREkwTFRBMExURXdQQzlrWVhSaFJYTmxZM1Y2YVc5dVpWQmhaMkZ0Wlc1MGJ6NEtDUWs4YVcxd2IzSjBiMVJ2ZEdGc1pVUmhWbVZ5YzJGeVpUNDBOUzR3TUR3dmFXMXdiM0owYjFSdmRHRnNaVVJoVm1WeWMyRnlaVDRLQ1FrOGRHbHdiMVpsY25OaGJXVnVkRzgrVUU4OEwzUnBjRzlXWlhKellXMWxiblJ2UGdvSkNUeHBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlXWlhKellXMWxiblJ2UGpBeE1EQXdNREF3TURBd01EQXdNRFUxUEM5cFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOVdaWEp6WVcxbGJuUnZQZ29KQ1R4amIyUnBZMlZEYjI1MFpYTjBiMUJoWjJGdFpXNTBiejVqTURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBMU5Ud3ZZMjlrYVdObFEyOXVkR1Z6ZEc5UVlXZGhiV1Z1ZEc4K0Nna0pQR1pwY20xaFVtbGpaWFoxZEdFK01Ed3ZabWx5YldGU2FXTmxkblYwWVQ0S0NRazhaR0YwYVZOcGJtZHZiRzlXWlhKellXMWxiblJ2UGdvSkNRazhhVzF3YjNKMGIxTnBibWR2Ykc5V1pYSnpZVzFsYm5SdlBqUTFMakF3UEM5cGJYQnZjblJ2VTJsdVoyOXNiMVpsY25OaGJXVnVkRzgrQ2drSkNUeHBZbUZ1UVdOamNtVmthWFJ2UGtsVU1EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TVR3dmFXSmhia0ZqWTNKbFpHbDBiejRLQ1FrSlBHTmhkWE5oYkdWV1pYSnpZVzFsYm5SdlBuaDRlSGg0ZUhnOEwyTmhkWE5oYkdWV1pYSnpZVzFsYm5SdlBnb0pDUWs4WkdGMGFWTndaV05wWm1samFWSnBjMk52YzNOcGIyNWxQbmg0ZUhoNGVIaDRQQzlrWVhScFUzQmxZMmxtYVdOcFVtbHpZMjl6YzJsdmJtVStDZ2tKUEM5a1lYUnBVMmx1WjI5c2IxWmxjbk5oYldWdWRHOCtDZ2s4TDJSaGRHbFdaWEp6WVcxbGJuUnZQZ284TDFKUVZEND08L3JwdD4KCQk8L25zNTpub2RvSW52aWFSUFQ+Cgk8L3NvYXA6Qm9keT4KPC9zb2FwOkVudmVsb3BlPg==',
];

$data_resp = [
    ':id' => 87,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 12:42:01.197',
    ':tipoevento' => 'nodoInviaRPT',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000055',
    ':ccp' => 'c0000000000000000000000000000055',
    ':noticenumber' => '',
    ':creditorreferenceid' => '',
    ':paymenttoken' => '',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_000044',
    ':sessionidoriginal' => 'session_id_original_000044',
    ':uniqueid' => 'T000087',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpwcHQ9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIiB4bWxuczpwcHRoZWFkPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIiB4bWxuczp0bnM9Imh0dHA6Ly9Ob2RvUGFnYW1lbnRpU1BDLnNwY29vcC5nb3YuaXQvc2Vydml6aS9QYWdhbWVudGlUZWxlbWF0aWNpUlBUIiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBwdDpub2RvSW52aWFSUFRSaXNwb3N0YT4KCQkJPGVzaXRvPk9LPC9lc2l0bz4KCQkJPHJlZGlyZWN0PjE8L3JlZGlyZWN0PgoJCQk8dXJsPmh0dHBzOi8vd2lzcDIucGFnb3BhLmdvdi5pdC93YWxsZXQvd2VsY29tZT9pZFNlc3Npb249eHh4eHh4PC91cmw+CgkJPC9wcHQ6bm9kb0ludmlhUlBUUmlzcG9zdGE+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg==',
];

Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);

$data_req = [
    ':id' => 88,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 12:43:00.197',
    ':tipoevento' => 'nodoInviaRPT',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000055',
    ':ccp' => 'c0000000000000000000000000000055',
    ':noticenumber' => '',
    ':creditorreferenceid' => '',
    ':paymenttoken' => '',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_000044',
    ':sessionidoriginal' => 'session_id_original_000044',
    ':uniqueid' => 'T000088',
    ':payload' => 'PHNvYXA6RW52ZWxvcGUgeG1sbnM6c29hcD0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPgoJPHNvYXA6SGVhZGVyPgoJCTxuczQ6aW50ZXN0YXppb25lUFBUIFNPQVAtRU5WOmFjdG9yPSJodHRwOi8vcGRkNGoub3JnL3BvcnRhZG9taW5pbyIgU09BUC1FTlY6bXVzdFVuZGVyc3RhbmQ9IjEiIHhtbG5zPSIiIHhtbG5zOlNPQVAtRU5WPSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyIgeG1sbnM6bnMzPSJodHRwOi8vd3d3LmRpZ2l0cGEuZ292Lml0L3NjaGVtYXMvMjAxMS9QYWdhbWVudGkvIiB4bWxuczpuczQ9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvcHB0aGVhZCIgeG1sbnM6bnM1PSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyI+CgkJCTxpZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QQT43Nzc3Nzc3Nzc3NzwvaWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUEE+CgkJCTxpZGVudGlmaWNhdGl2b1N0YXppb25lSW50ZXJtZWRpYXJpb1BBPjc3Nzc3Nzc3Nzc3XzAxPC9pZGVudGlmaWNhdGl2b1N0YXppb25lSW50ZXJtZWRpYXJpb1BBPgoJCQk8aWRlbnRpZmljYXRpdm9Eb21pbmlvPjc3Nzc3Nzc3Nzc3PC9pZGVudGlmaWNhdGl2b0RvbWluaW8+CgkJCTxpZGVudGlmaWNhdGl2b1VuaXZvY29WZXJzYW1lbnRvPjAxMDAwMDAwMDAwMDAwMDU1PC9pZGVudGlmaWNhdGl2b1VuaXZvY29WZXJzYW1lbnRvPgoJCQk8Y29kaWNlQ29udGVzdG9QYWdhbWVudG8+YzAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwNTU8L2NvZGljZUNvbnRlc3RvUGFnYW1lbnRvPgoJCTwvbnM0OmludGVzdGF6aW9uZVBQVD4KCTwvc29hcDpIZWFkZXI+Cgk8c29hcDpCb2R5PgoJCTxuczU6bm9kb0ludmlhUlBUIHhtbG5zPSIiIHhtbG5zOm5zMz0iaHR0cDovL3d3dy5kaWdpdHBhLmdvdi5pdC9zY2hlbWFzLzIwMTEvUGFnYW1lbnRpLyIgeG1sbnM6bnM0PSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOm5zNT0iaHR0cDovL3dzLnBhZ2FtZW50aS50ZWxlbWF0aWNpLmdvdi8iPgoJCQk8cGFzc3dvcmQ+UExBQ0VIT0xERVI8L3Bhc3N3b3JkPgoJCQk8aWRlbnRpZmljYXRpdm9QU1A+QUdJRF8wMTwvaWRlbnRpZmljYXRpdm9QU1A+CgkJCTxpZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QU1A+ODg4ODg4ODg4ODg8L2lkZW50aWZpY2F0aXZvSW50ZXJtZWRpYXJpb1BTUD4KCQkJPGlkZW50aWZpY2F0aXZvQ2FuYWxlPjg4ODg4ODg4ODg4XzAxPC9pZGVudGlmaWNhdGl2b0NhbmFsZT4KCQkJPHRpcG9GaXJtYS8+CgkJCTxycHQ+UEQ5NGJXd2dkbVZ5YzJsdmJqMGlNUzR3SWlCbGJtTnZaR2x1WnowaVZWUkdMVGdpSUhOMFlXNWtZV3h2Ym1VOUlubGxjeUkvUGdvOFVsQlVJSGh0Ykc1elBTSm9kSFJ3T2k4dmQzZDNMbVJwWjJsMGNHRXVaMjkyTG1sMEwzTmphR1Z0WVhNdk1qQXhNUzlRWVdkaGJXVnVkR2t2SWo0S0NUeDJaWEp6YVc5dVpVOW5aMlYwZEc4K05pNHlQQzkyWlhKemFXOXVaVTluWjJWMGRHOCtDZ2s4Wkc5dGFXNXBiejRLQ1FrOGFXUmxiblJwWm1sallYUnBkbTlFYjIxcGJtbHZQamMzTnpjM056YzNOemMzUEM5cFpHVnVkR2xtYVdOaGRHbDJiMFJ2YldsdWFXOCtDZ2s4TDJSdmJXbHVhVzgrQ2drOGFXUmxiblJwWm1sallYUnBkbTlOWlhOellXZG5hVzlTYVdOb2FXVnpkR0UrZUhoNGVIaDRlRHd2YVdSbGJuUnBabWxqWVhScGRtOU5aWE56WVdkbmFXOVNhV05vYVdWemRHRStDZ2s4WkdGMFlVOXlZVTFsYzNOaFoyZHBiMUpwWTJocFpYTjBZVDR5TURJMExUQTBMVEV3VkRJeE9qRTBPak00UEM5a1lYUmhUM0poVFdWemMyRm5aMmx2VW1samFHbGxjM1JoUGdvSlBHRjFkR1Z1ZEdsallYcHBiMjVsVTI5bloyVjBkRzgrVGk5QlBDOWhkWFJsYm5ScFkyRjZhVzl1WlZOdloyZGxkSFJ2UGdvSlBITnZaMmRsZEhSdlVHRm5ZWFJ2Y21VK0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFCaFoyRjBiM0psUGdvSkNRazhkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NUdQQzkwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1FrOFkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBuaDRlSGg0ZUhoNGVEd3ZZMjlrYVdObFNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1R3dmFXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZVR0ZuWVhSdmNtVStDZ2tKUEdGdVlXZHlZV1pwWTJGUVlXZGhkRzl5WlQ1NGVIaDRlSGg0ZUhnOEwyRnVZV2R5WVdacFkyRlFZV2RoZEc5eVpUNEtDVHd2YzI5bloyVjBkRzlRWVdkaGRHOXlaVDRLQ1R4bGJuUmxRbVZ1WldacFkybGhjbWx2UGdvSkNUeHBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlDWlc1bFptbGphV0Z5YVc4K0Nna0pDVHgwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQa2M4TDNScGNHOUpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSkNUeGpiMlJwWTJWSlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtlSGg0ZUhoNFBDOWpiMlJwWTJWSlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtDZ2tKUEM5cFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOUNaVzVsWm1samFXRnlhVzgrQ2drSlBHUmxibTl0YVc1aGVtbHZibVZDWlc1bFptbGphV0Z5YVc4K2VIaDRlSGg0UEM5a1pXNXZiV2x1WVhwcGIyNWxRbVZ1WldacFkybGhjbWx2UGdvSlBDOWxiblJsUW1WdVpXWnBZMmxoY21sdlBnb0pQR1JoZEdsV1pYSnpZVzFsYm5SdlBnb0pDVHhrWVhSaFJYTmxZM1Y2YVc5dVpWQmhaMkZ0Wlc1MGJ6NHlNREkwTFRBMExURXdQQzlrWVhSaFJYTmxZM1Y2YVc5dVpWQmhaMkZ0Wlc1MGJ6NEtDUWs4YVcxd2IzSjBiMVJ2ZEdGc1pVUmhWbVZ5YzJGeVpUNDBOUzR3TUR3dmFXMXdiM0owYjFSdmRHRnNaVVJoVm1WeWMyRnlaVDRLQ1FrOGRHbHdiMVpsY25OaGJXVnVkRzgrVUU4OEwzUnBjRzlXWlhKellXMWxiblJ2UGdvSkNUeHBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlXWlhKellXMWxiblJ2UGpBeE1EQXdNREF3TURBd01EQXdNRFUxUEM5cFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOVdaWEp6WVcxbGJuUnZQZ29KQ1R4amIyUnBZMlZEYjI1MFpYTjBiMUJoWjJGdFpXNTBiejVqTURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBMU5Ud3ZZMjlrYVdObFEyOXVkR1Z6ZEc5UVlXZGhiV1Z1ZEc4K0Nna0pQR1pwY20xaFVtbGpaWFoxZEdFK01Ed3ZabWx5YldGU2FXTmxkblYwWVQ0S0NRazhaR0YwYVZOcGJtZHZiRzlXWlhKellXMWxiblJ2UGdvSkNRazhhVzF3YjNKMGIxTnBibWR2Ykc5V1pYSnpZVzFsYm5SdlBqUTFMakF3UEM5cGJYQnZjblJ2VTJsdVoyOXNiMVpsY25OaGJXVnVkRzgrQ2drSkNUeHBZbUZ1UVdOamNtVmthWFJ2UGtsVU1EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TVR3dmFXSmhia0ZqWTNKbFpHbDBiejRLQ1FrSlBHTmhkWE5oYkdWV1pYSnpZVzFsYm5SdlBuaDRlSGg0ZUhnOEwyTmhkWE5oYkdWV1pYSnpZVzFsYm5SdlBnb0pDUWs4WkdGMGFWTndaV05wWm1samFWSnBjMk52YzNOcGIyNWxQbmg0ZUhoNGVIaDRQQzlrWVhScFUzQmxZMmxtYVdOcFVtbHpZMjl6YzJsdmJtVStDZ2tKUEM5a1lYUnBVMmx1WjI5c2IxWmxjbk5oYldWdWRHOCtDZ2s4TDJSaGRHbFdaWEp6WVcxbGJuUnZQZ284TDFKUVZEND08L3JwdD4KCQk8L25zNTpub2RvSW52aWFSUFQ+Cgk8L3NvYXA6Qm9keT4KPC9zb2FwOkVudmVsb3BlPg==',
];

$data_resp = [
    ':id' => 89,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 12:44:01.197',
    ':tipoevento' => 'nodoInviaRPT',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000055',
    ':ccp' => 'c0000000000000000000000000000055',
    ':noticenumber' => '',
    ':creditorreferenceid' => '',
    ':paymenttoken' => '',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_000044',
    ':sessionidoriginal' => 'session_id_original_000044',
    ':uniqueid' => 'T000089',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpwcHQ9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIiB4bWxuczpwcHRoZWFkPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIiB4bWxuczp0bnM9Imh0dHA6Ly9Ob2RvUGFnYW1lbnRpU1BDLnNwY29vcC5nb3YuaXQvc2Vydml6aS9QYWdhbWVudGlUZWxlbWF0aWNpUlBUIiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBwdDpub2RvSW52aWFSUFRSaXNwb3N0YT4KCQkJPGVzaXRvPk9LPC9lc2l0bz4KCQkJPHJlZGlyZWN0PjE8L3JlZGlyZWN0PgoJCQk8dXJsPmh0dHBzOi8vd2lzcDIucGFnb3BhLmdvdi5pdC93YWxsZXQvd2VsY29tZT9pZFNlc3Npb249eHh4eHh4PC91cmw+CgkJPC9wcHQ6bm9kb0ludmlhUlBUUmlzcG9zdGE+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg==',
];

Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);
















$data_req = [
    ':id' => 90,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 12:45:00.197',
    ':tipoevento' => 'nodoAttivaRPT',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000090',
    ':ccp' => 'c0000000000000000000000000000090',
    ':noticenumber' => '',
    ':creditorreferenceid' => '',
    ':paymenttoken' => '',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_000090',
    ':sessionidoriginal' => 'session_id_original_000090',
    ':uniqueid' => 'T000090',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPHNvYXA6RW52ZWxvcGUgeG1sbnM6cGF5X2k9Imh0dHA6Ly93d3cuZGlnaXRwYS5nb3YuaXQvc2NoZW1hcy8yMDExL1BhZ2FtZW50aS8iIHhtbG5zOnBwdD0iaHR0cDovL3dzLnBhZ2FtZW50aS50ZWxlbWF0aWNpLmdvdi8iIHhtbG5zOnFyYz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0L1FyQ29kZSIgeG1sbnM6c29hcD0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnRucz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0L3NlcnZpemkvUGFnYW1lbnRpVGVsZW1hdGljaVBzcE5vZG8iIHhtbG5zOnhzaT0iaHR0cDovL3d3dy53My5vcmcvMjAwMS9YTUxTY2hlbWEtaW5zdGFuY2UiPgoJPHNvYXA6Qm9keT4KCQk8cHB0Om5vZG9BdHRpdmFSUFQgeG1sbnM6cHB0PSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyI+CgkJCTxpZGVudGlmaWNhdGl2b1BTUD5BR0lEXzAxPC9pZGVudGlmaWNhdGl2b1BTUD4KCQkJPGlkZW50aWZpY2F0aXZvSW50ZXJtZWRpYXJpb1BTUD44ODg4ODg4ODg4ODwvaWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUFNQPgoJCQk8aWRlbnRpZmljYXRpdm9DYW5hbGU+ODg4ODg4ODg4ODhfMDE8L2lkZW50aWZpY2F0aXZvQ2FuYWxlPgoJCQk8Y29kaWNlQ29udGVzdG9QYWdhbWVudG8+YzAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwOTA8L2NvZGljZUNvbnRlc3RvUGFnYW1lbnRvPgoJCQk8aWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUFNQUGFnYW1lbnRvPjg4ODg4ODg4ODg4PC9pZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QU1BQYWdhbWVudG8+CgkJCTxpZGVudGlmaWNhdGl2b0NhbmFsZVBhZ2FtZW50bz44ODg4ODg4ODg4OF8wMTwvaWRlbnRpZmljYXRpdm9DYW5hbGVQYWdhbWVudG8+CgkJCTxjb2RpZmljYUluZnJhc3RydXR0dXJhUFNQPlFSLUNPREU8L2NvZGlmaWNhSW5mcmFzdHJ1dHR1cmFQU1A+CgkJCTxjb2RpY2VJZFJQVD4KCQkJCTxxcmM6UXJDb2RlPgoJCQkJCTxxcmM6Q0Y+Nzc3Nzc3Nzc3Nzc8L3FyYzpDRj4KCQkJCQk8cXJjOkF1eERpZ2l0PjM8L3FyYzpBdXhEaWdpdD4KCQkJCQk8cXJjOkNvZElVVj4wMTAwMDAwMDAwMDAwMDA5MDwvcXJjOkNvZElVVj4KCQkJCTwvcXJjOlFyQ29kZT4KCQkJPC9jb2RpY2VJZFJQVD4KCQkJPGRhdGlQYWdhbWVudG9QU1A+CgkJCQk8aW1wb3J0b1NpbmdvbG9WZXJzYW1lbnRvPjMzLjEwPC9pbXBvcnRvU2luZ29sb1ZlcnNhbWVudG8+CgkJCTwvZGF0aVBhZ2FtZW50b1BTUD4KCQk8L3BwdDpub2RvQXR0aXZhUlBUPgoJPC9zb2FwOkJvZHk+Cjwvc29hcDpFbnZlbG9wZT4=',
];

$data_resp = [
    ':id' => 91,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 12:46:01.197',
    ':tipoevento' => 'nodoAttivaRPT',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000090',
    ':ccp' => 'c0000000000000000000000000000090',
    ':noticenumber' => '01000000000000090',
    ':creditorreferenceid' => '',
    ':paymenttoken' => '',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_000090',
    ':sessionidoriginal' => 'session_id_original_000090',
    ':uniqueid' => 'T000091',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpiYz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0L0JhckNvZGVfR1MxXzEyOF9Nb2RpZmllZCIgeG1sbnM6cGF5X2k9Imh0dHA6Ly93d3cuZGlnaXRwYS5nb3YuaXQvc2NoZW1hcy8yMDExL1BhZ2FtZW50aS8iIHhtbG5zOnBwdD0iaHR0cDovL3dzLnBhZ2FtZW50aS50ZWxlbWF0aWNpLmdvdi8iIHhtbG5zOnFyYz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0L1FyQ29kZSIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnRucz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0L3NlcnZpemkvUGFnYW1lbnRpVGVsZW1hdGljaVBzcE5vZG8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxwcHQ6bm9kb0F0dGl2YVJQVFJpc3Bvc3RhPgoJCQk8bm9kb0F0dGl2YVJQVFJpc3Bvc3RhPgoJCQkJPGVzaXRvPk9LPC9lc2l0bz4KCQkJCTxkYXRpUGFnYW1lbnRvUEE+CgkJCQkJPGltcG9ydG9TaW5nb2xvVmVyc2FtZW50bz4zMy4xMDwvaW1wb3J0b1NpbmdvbG9WZXJzYW1lbnRvPgoJCQkJCTxpYmFuQWNjcmVkaXRvPklUMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMTwvaWJhbkFjY3JlZGl0bz4KCQkJCQk8ZW50ZUJlbmVmaWNpYXJpbz4KCQkJCQkJPHBheV9pOmlkZW50aWZpY2F0aXZvVW5pdm9jb0JlbmVmaWNpYXJpbz4KCQkJCQkJCTxwYXlfaTp0aXBvSWRlbnRpZmljYXRpdm9Vbml2b2NvPkc8L3BheV9pOnRpcG9JZGVudGlmaWNhdGl2b1VuaXZvY28+CgkJCQkJCQk8cGF5X2k6Y29kaWNlSWRlbnRpZmljYXRpdm9Vbml2b2NvPjc3Nzc3Nzc3Nzc3PC9wYXlfaTpjb2RpY2VJZGVudGlmaWNhdGl2b1VuaXZvY28+CgkJCQkJCTwvcGF5X2k6aWRlbnRpZmljYXRpdm9Vbml2b2NvQmVuZWZpY2lhcmlvPgoJCQkJCQk8cGF5X2k6ZGVub21pbmF6aW9uZUJlbmVmaWNpYXJpbz54eHh4eHg8L3BheV9pOmRlbm9taW5hemlvbmVCZW5lZmljaWFyaW8+CgkJCQkJPC9lbnRlQmVuZWZpY2lhcmlvPgoJCQkJCTxjYXVzYWxlVmVyc2FtZW50bz54eHh4eHg8L2NhdXNhbGVWZXJzYW1lbnRvPgoJCQkJPC9kYXRpUGFnYW1lbnRvUEE+CgkJCTwvbm9kb0F0dGl2YVJQVFJpc3Bvc3RhPgoJCTwvcHB0Om5vZG9BdHRpdmFSUFRSaXNwb3N0YT4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+',
];

Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);


$data_req = [
    ':id' => 92,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 12:47:00.197',
    ':tipoevento' => 'nodoInviaRPT',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000090',
    ':ccp' => 'c0000000000000000000000000000090',
    ':noticenumber' => '',
    ':creditorreferenceid' => '',
    ':paymenttoken' => '',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_000091',
    ':sessionidoriginal' => 'session_id_original_000090',
    ':uniqueid' => 'T000092',
    ':payload' => 'PHNvYXA6RW52ZWxvcGUgeG1sbnM6c29hcD0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPgoJPHNvYXA6SGVhZGVyPgoJCTxuczQ6aW50ZXN0YXppb25lUFBUIFNPQVAtRU5WOmFjdG9yPSJodHRwOi8vcGRkNGoub3JnL3BvcnRhZG9taW5pbyIgU09BUC1FTlY6bXVzdFVuZGVyc3RhbmQ9IjEiIHhtbG5zPSIiIHhtbG5zOlNPQVAtRU5WPSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyIgeG1sbnM6bnMzPSJodHRwOi8vd3d3LmRpZ2l0cGEuZ292Lml0L3NjaGVtYXMvMjAxMS9QYWdhbWVudGkvIiB4bWxuczpuczQ9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvcHB0aGVhZCIgeG1sbnM6bnM1PSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyI+CgkJCTxpZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QQT43Nzc3Nzc3Nzc3NzwvaWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUEE+CgkJCTxpZGVudGlmaWNhdGl2b1N0YXppb25lSW50ZXJtZWRpYXJpb1BBPjc3Nzc3Nzc3Nzc3XzAxPC9pZGVudGlmaWNhdGl2b1N0YXppb25lSW50ZXJtZWRpYXJpb1BBPgoJCQk8aWRlbnRpZmljYXRpdm9Eb21pbmlvPjc3Nzc3Nzc3Nzc3PC9pZGVudGlmaWNhdGl2b0RvbWluaW8+CgkJCTxpZGVudGlmaWNhdGl2b1VuaXZvY29WZXJzYW1lbnRvPjAxMDAwMDAwMDAwMDAwMDkwPC9pZGVudGlmaWNhdGl2b1VuaXZvY29WZXJzYW1lbnRvPgoJCQk8Y29kaWNlQ29udGVzdG9QYWdhbWVudG8+YzAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwOTA8L2NvZGljZUNvbnRlc3RvUGFnYW1lbnRvPgoJCTwvbnM0OmludGVzdGF6aW9uZVBQVD4KCTwvc29hcDpIZWFkZXI+Cgk8c29hcDpCb2R5PgoJCTxuczU6bm9kb0ludmlhUlBUIHhtbG5zPSIiIHhtbG5zOm5zMz0iaHR0cDovL3d3dy5kaWdpdHBhLmdvdi5pdC9zY2hlbWFzLzIwMTEvUGFnYW1lbnRpLyIgeG1sbnM6bnM0PSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOm5zNT0iaHR0cDovL3dzLnBhZ2FtZW50aS50ZWxlbWF0aWNpLmdvdi8iPgoJCQk8cGFzc3dvcmQ+UExBQ0VIT0xERVI8L3Bhc3N3b3JkPgoJCQk8aWRlbnRpZmljYXRpdm9QU1A+ODg4ODg4ODg4ODg8L2lkZW50aWZpY2F0aXZvUFNQPgoJCQk8aWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUFNQPjg4ODg4ODg4ODg4PC9pZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QU1A+CgkJCTxpZGVudGlmaWNhdGl2b0NhbmFsZT44ODg4ODg4ODg4OF8wMTwvaWRlbnRpZmljYXRpdm9DYW5hbGU+CgkJCTx0aXBvRmlybWEvPgoJCQk8cnB0PlBEOTRiV3dnZG1WeWMybHZiajBpTVM0d0lpQmxibU52WkdsdVp6MGlWVlJHTFRnaUlITjBZVzVrWVd4dmJtVTlJbmxsY3lJL1BnbzhVbEJVSUhodGJHNXpQU0pvZEhSd09pOHZkM2QzTG1ScFoybDBjR0V1WjI5MkxtbDBMM05qYUdWdFlYTXZNakF4TVM5UVlXZGhiV1Z1ZEdrdklqNEtJQ0FnSUR4MlpYSnphVzl1WlU5bloyVjBkRzgrTmk0eVBDOTJaWEp6YVc5dVpVOW5aMlYwZEc4K0NpQWdJQ0E4Wkc5dGFXNXBiejRLSUNBZ0lDQWdJQ0E4YVdSbGJuUnBabWxqWVhScGRtOUViMjFwYm1sdlBqYzNOemMzTnpjM056YzNQQzlwWkdWdWRHbG1hV05oZEdsMmIwUnZiV2x1YVc4K0NpQWdJQ0E4TDJSdmJXbHVhVzgrQ2lBZ0lDQThhV1JsYm5ScFptbGpZWFJwZG05TlpYTnpZV2RuYVc5U2FXTm9hV1Z6ZEdFK2VIaDRlSGg0ZUhnOEwybGtaVzUwYVdacFkyRjBhWFp2VFdWemMyRm5aMmx2VW1samFHbGxjM1JoUGdvZ0lDQWdQR1JoZEdGUGNtRk5aWE56WVdkbmFXOVNhV05vYVdWemRHRStNakF5TkMwd05DMHhNRlF5TVRveE5Eb3pPRHd2WkdGMFlVOXlZVTFsYzNOaFoyZHBiMUpwWTJocFpYTjBZVDRLSUNBZ0lEeGhkWFJsYm5ScFkyRjZhVzl1WlZOdloyZGxkSFJ2UGs0dlFUd3ZZWFYwWlc1MGFXTmhlbWx2Ym1WVGIyZG5aWFIwYno0S0lDQWdJRHh6YjJkblpYUjBiMUJoWjJGMGIzSmxQZ29nSUNBZ0lDQWdJRHhwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5UVlXZGhkRzl5WlQ0S0lDQWdJQ0FnSUNBZ0lDQWdQSFJwY0c5SlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtSand2ZEdsd2IwbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejRLSUNBZ0lDQWdJQ0FnSUNBZ1BHTnZaR2xqWlVsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NTRlSGg0ZUhoNGVEd3ZZMjlrYVdObFNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29nSUNBZ0lDQWdJRHd2YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlVHRm5ZWFJ2Y21VK0NpQWdJQ0FnSUNBZ1BHRnVZV2R5WVdacFkyRlFZV2RoZEc5eVpUNTRlSGg0ZUhoNGVIZzhMMkZ1WVdkeVlXWnBZMkZRWVdkaGRHOXlaVDRLSUNBZ0lEd3ZjMjluWjJWMGRHOVFZV2RoZEc5eVpUNEtJQ0FnSUR4bGJuUmxRbVZ1WldacFkybGhjbWx2UGdvZ0lDQWdJQ0FnSUR4cFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOUNaVzVsWm1samFXRnlhVzgrQ2lBZ0lDQWdJQ0FnSUNBZ0lEeDBhWEJ2U1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBrYzhMM1JwY0c5SlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtDaUFnSUNBZ0lDQWdJQ0FnSUR4amIyUnBZMlZKWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI4K2VIaDRlSGg0UEM5amIyUnBZMlZKWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI4K0NpQWdJQ0FnSUNBZ1BDOXBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlDWlc1bFptbGphV0Z5YVc4K0NpQWdJQ0FnSUNBZ1BHUmxibTl0YVc1aGVtbHZibVZDWlc1bFptbGphV0Z5YVc4K2VIaDRlSGg0ZUR3dlpHVnViMjFwYm1GNmFXOXVaVUpsYm1WbWFXTnBZWEpwYno0S0lDQWdJRHd2Wlc1MFpVSmxibVZtYVdOcFlYSnBiejRLSUNBZ0lEeGtZWFJwVm1WeWMyRnRaVzUwYno0S0lDQWdJQ0FnSUNBOFpHRjBZVVZ6WldOMWVtbHZibVZRWVdkaGJXVnVkRzgrTWpBeU5DMHdOQzB4TUR3dlpHRjBZVVZ6WldOMWVtbHZibVZRWVdkaGJXVnVkRzgrQ2lBZ0lDQWdJQ0FnUEdsdGNHOXlkRzlVYjNSaGJHVkVZVlpsY25OaGNtVStNek11TVRBOEwybHRjRzl5ZEc5VWIzUmhiR1ZFWVZabGNuTmhjbVUrQ2lBZ0lDQWdJQ0FnUEhScGNHOVdaWEp6WVcxbGJuUnZQbEJQUEM5MGFYQnZWbVZ5YzJGdFpXNTBiejRLSUNBZ0lDQWdJQ0E4YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlZtVnljMkZ0Wlc1MGJ6NHdNVEF3TURBd01EQXdNREF3TURBNU1Ed3ZhV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52Vm1WeWMyRnRaVzUwYno0S0lDQWdJQ0FnSUNBOFkyOWthV05sUTI5dWRHVnpkRzlRWVdkaGJXVnVkRzgrWXpBd01EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBd09UQThMMk52WkdsalpVTnZiblJsYzNSdlVHRm5ZVzFsYm5SdlBnb2dJQ0FnSUNBZ0lEeG1hWEp0WVZKcFkyVjJkWFJoUGpBOEwyWnBjbTFoVW1salpYWjFkR0UrQ2lBZ0lDQWdJQ0FnUEdSaGRHbFRhVzVuYjJ4dlZtVnljMkZ0Wlc1MGJ6NEtJQ0FnSUNBZ0lDQWdJQ0FnUEdsdGNHOXlkRzlUYVc1bmIyeHZWbVZ5YzJGdFpXNTBiejR6TXk0eE1Ed3ZhVzF3YjNKMGIxTnBibWR2Ykc5V1pYSnpZVzFsYm5SdlBnb2dJQ0FnSUNBZ0lDQWdJQ0E4YVdKaGJrRmpZM0psWkdsMGJ6NUpWREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01ERThMMmxpWVc1QlkyTnlaV1JwZEc4K0NpQWdJQ0FnSUNBZ0lDQWdJRHhqWVhWellXeGxWbVZ5YzJGdFpXNTBiejU0ZUhoNGVIZzhMMk5oZFhOaGJHVldaWEp6WVcxbGJuUnZQZ29nSUNBZ0lDQWdJQ0FnSUNBOFpHRjBhVk53WldOcFptbGphVkpwYzJOdmMzTnBiMjVsUG5oNGVIaDRQQzlrWVhScFUzQmxZMmxtYVdOcFVtbHpZMjl6YzJsdmJtVStDaUFnSUNBZ0lDQWdQQzlrWVhScFUybHVaMjlzYjFabGNuTmhiV1Z1ZEc4K0NpQWdJQ0E4TDJSaGRHbFdaWEp6WVcxbGJuUnZQZ284TDFKUVZENEs8L3JwdD4KCQk8L25zNTpub2RvSW52aWFSUFQ+Cgk8L3NvYXA6Qm9keT4KPC9zb2FwOkVudmVsb3BlPg==',
];

$data_resp = [
    ':id' => 93,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 12:48:01.197',
    ':tipoevento' => 'nodoInviaRPT',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000090',
    ':ccp' => 'c0000000000000000000000000000090',
    ':noticenumber' => '',
    ':creditorreferenceid' => '',
    ':paymenttoken' => '',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_000091',
    ':sessionidoriginal' => 'session_id_original_000090',
    ':uniqueid' => 'T000093',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpwcHQ9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIiB4bWxuczpwcHRoZWFkPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIiB4bWxuczp0bnM9Imh0dHA6Ly9Ob2RvUGFnYW1lbnRpU1BDLnNwY29vcC5nb3YuaXQvc2Vydml6aS9QYWdhbWVudGlUZWxlbWF0aWNpUlBUIiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBwdDpub2RvSW52aWFSUFRSaXNwb3N0YT4KCQkJPGVzaXRvPk9LPC9lc2l0bz4KCQkJPHJlZGlyZWN0PjE8L3JlZGlyZWN0PgoJCQk8dXJsPmh0dHBzOi8vd2lzcDIucGFnb3BhLmdvdi5pdC93YWxsZXQvd2VsY29tZT9pZFNlc3Npb249eHh4eHh4PC91cmw+CgkJPC9wcHQ6bm9kb0ludmlhUlBUUmlzcG9zdGE+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg==',
];

Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);


$data_req = [
    ':id' => 94,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 12:49:00.197',
    ':tipoevento' => 'nodoInviaRPT',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000090',
    ':ccp' => 'c0000000000000000000000000000090',
    ':noticenumber' => '',
    ':creditorreferenceid' => '',
    ':paymenttoken' => '',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_000092',
    ':sessionidoriginal' => 'session_id_original_000090',
    ':uniqueid' => 'T000094',
    ':payload' => 'PHNvYXA6RW52ZWxvcGUgeG1sbnM6c29hcD0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPgoJPHNvYXA6SGVhZGVyPgoJCTxuczQ6aW50ZXN0YXppb25lUFBUIFNPQVAtRU5WOmFjdG9yPSJodHRwOi8vcGRkNGoub3JnL3BvcnRhZG9taW5pbyIgU09BUC1FTlY6bXVzdFVuZGVyc3RhbmQ9IjEiIHhtbG5zPSIiIHhtbG5zOlNPQVAtRU5WPSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyIgeG1sbnM6bnMzPSJodHRwOi8vd3d3LmRpZ2l0cGEuZ292Lml0L3NjaGVtYXMvMjAxMS9QYWdhbWVudGkvIiB4bWxuczpuczQ9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvcHB0aGVhZCIgeG1sbnM6bnM1PSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyI+CgkJCTxpZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QQT43Nzc3Nzc3Nzc3NzwvaWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUEE+CgkJCTxpZGVudGlmaWNhdGl2b1N0YXppb25lSW50ZXJtZWRpYXJpb1BBPjc3Nzc3Nzc3Nzc3XzAxPC9pZGVudGlmaWNhdGl2b1N0YXppb25lSW50ZXJtZWRpYXJpb1BBPgoJCQk8aWRlbnRpZmljYXRpdm9Eb21pbmlvPjc3Nzc3Nzc3Nzc3PC9pZGVudGlmaWNhdGl2b0RvbWluaW8+CgkJCTxpZGVudGlmaWNhdGl2b1VuaXZvY29WZXJzYW1lbnRvPjAxMDAwMDAwMDAwMDAwMDkwPC9pZGVudGlmaWNhdGl2b1VuaXZvY29WZXJzYW1lbnRvPgoJCQk8Y29kaWNlQ29udGVzdG9QYWdhbWVudG8+YzAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwOTA8L2NvZGljZUNvbnRlc3RvUGFnYW1lbnRvPgoJCTwvbnM0OmludGVzdGF6aW9uZVBQVD4KCTwvc29hcDpIZWFkZXI+Cgk8c29hcDpCb2R5PgoJCTxuczU6bm9kb0ludmlhUlBUIHhtbG5zPSIiIHhtbG5zOm5zMz0iaHR0cDovL3d3dy5kaWdpdHBhLmdvdi5pdC9zY2hlbWFzLzIwMTEvUGFnYW1lbnRpLyIgeG1sbnM6bnM0PSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOm5zNT0iaHR0cDovL3dzLnBhZ2FtZW50aS50ZWxlbWF0aWNpLmdvdi8iPgoJCQk8cGFzc3dvcmQ+UExBQ0VIT0xERVI8L3Bhc3N3b3JkPgoJCQk8aWRlbnRpZmljYXRpdm9QU1A+ODg4ODg4ODg4ODg8L2lkZW50aWZpY2F0aXZvUFNQPgoJCQk8aWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUFNQPjg4ODg4ODg4ODg4PC9pZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QU1A+CgkJCTxpZGVudGlmaWNhdGl2b0NhbmFsZT44ODg4ODg4ODg4OF8wMTwvaWRlbnRpZmljYXRpdm9DYW5hbGU+CgkJCTx0aXBvRmlybWEvPgoJCQk8cnB0PlBEOTRiV3dnZG1WeWMybHZiajBpTVM0d0lpQmxibU52WkdsdVp6MGlWVlJHTFRnaUlITjBZVzVrWVd4dmJtVTlJbmxsY3lJL1BnbzhVbEJVSUhodGJHNXpQU0pvZEhSd09pOHZkM2QzTG1ScFoybDBjR0V1WjI5MkxtbDBMM05qYUdWdFlYTXZNakF4TVM5UVlXZGhiV1Z1ZEdrdklqNEtJQ0FnSUR4MlpYSnphVzl1WlU5bloyVjBkRzgrTmk0eVBDOTJaWEp6YVc5dVpVOW5aMlYwZEc4K0NpQWdJQ0E4Wkc5dGFXNXBiejRLSUNBZ0lDQWdJQ0E4YVdSbGJuUnBabWxqWVhScGRtOUViMjFwYm1sdlBqYzNOemMzTnpjM056YzNQQzlwWkdWdWRHbG1hV05oZEdsMmIwUnZiV2x1YVc4K0NpQWdJQ0E4TDJSdmJXbHVhVzgrQ2lBZ0lDQThhV1JsYm5ScFptbGpZWFJwZG05TlpYTnpZV2RuYVc5U2FXTm9hV1Z6ZEdFK2VIaDRlSGg0ZUhnOEwybGtaVzUwYVdacFkyRjBhWFp2VFdWemMyRm5aMmx2VW1samFHbGxjM1JoUGdvZ0lDQWdQR1JoZEdGUGNtRk5aWE56WVdkbmFXOVNhV05vYVdWemRHRStNakF5TkMwd05DMHhNRlF5TVRveE5Eb3pPRHd2WkdGMFlVOXlZVTFsYzNOaFoyZHBiMUpwWTJocFpYTjBZVDRLSUNBZ0lEeGhkWFJsYm5ScFkyRjZhVzl1WlZOdloyZGxkSFJ2UGs0dlFUd3ZZWFYwWlc1MGFXTmhlbWx2Ym1WVGIyZG5aWFIwYno0S0lDQWdJRHh6YjJkblpYUjBiMUJoWjJGMGIzSmxQZ29nSUNBZ0lDQWdJRHhwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5UVlXZGhkRzl5WlQ0S0lDQWdJQ0FnSUNBZ0lDQWdQSFJwY0c5SlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtSand2ZEdsd2IwbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejRLSUNBZ0lDQWdJQ0FnSUNBZ1BHTnZaR2xqWlVsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NTRlSGg0ZUhoNGVEd3ZZMjlrYVdObFNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29nSUNBZ0lDQWdJRHd2YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlVHRm5ZWFJ2Y21VK0NpQWdJQ0FnSUNBZ1BHRnVZV2R5WVdacFkyRlFZV2RoZEc5eVpUNTRlSGg0ZUhoNGVIZzhMMkZ1WVdkeVlXWnBZMkZRWVdkaGRHOXlaVDRLSUNBZ0lEd3ZjMjluWjJWMGRHOVFZV2RoZEc5eVpUNEtJQ0FnSUR4bGJuUmxRbVZ1WldacFkybGhjbWx2UGdvZ0lDQWdJQ0FnSUR4cFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOUNaVzVsWm1samFXRnlhVzgrQ2lBZ0lDQWdJQ0FnSUNBZ0lEeDBhWEJ2U1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBrYzhMM1JwY0c5SlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtDaUFnSUNBZ0lDQWdJQ0FnSUR4amIyUnBZMlZKWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI4K2VIaDRlSGg0UEM5amIyUnBZMlZKWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI4K0NpQWdJQ0FnSUNBZ1BDOXBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlDWlc1bFptbGphV0Z5YVc4K0NpQWdJQ0FnSUNBZ1BHUmxibTl0YVc1aGVtbHZibVZDWlc1bFptbGphV0Z5YVc4K2VIaDRlSGg0ZUR3dlpHVnViMjFwYm1GNmFXOXVaVUpsYm1WbWFXTnBZWEpwYno0S0lDQWdJRHd2Wlc1MFpVSmxibVZtYVdOcFlYSnBiejRLSUNBZ0lEeGtZWFJwVm1WeWMyRnRaVzUwYno0S0lDQWdJQ0FnSUNBOFpHRjBZVVZ6WldOMWVtbHZibVZRWVdkaGJXVnVkRzgrTWpBeU5DMHdOQzB4TUR3dlpHRjBZVVZ6WldOMWVtbHZibVZRWVdkaGJXVnVkRzgrQ2lBZ0lDQWdJQ0FnUEdsdGNHOXlkRzlVYjNSaGJHVkVZVlpsY25OaGNtVStNek11TVRBOEwybHRjRzl5ZEc5VWIzUmhiR1ZFWVZabGNuTmhjbVUrQ2lBZ0lDQWdJQ0FnUEhScGNHOVdaWEp6WVcxbGJuUnZQbEJQUEM5MGFYQnZWbVZ5YzJGdFpXNTBiejRLSUNBZ0lDQWdJQ0E4YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlZtVnljMkZ0Wlc1MGJ6NHdNVEF3TURBd01EQXdNREF3TURBNU1Ed3ZhV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52Vm1WeWMyRnRaVzUwYno0S0lDQWdJQ0FnSUNBOFkyOWthV05sUTI5dWRHVnpkRzlRWVdkaGJXVnVkRzgrWXpBd01EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBd09UQThMMk52WkdsalpVTnZiblJsYzNSdlVHRm5ZVzFsYm5SdlBnb2dJQ0FnSUNBZ0lEeG1hWEp0WVZKcFkyVjJkWFJoUGpBOEwyWnBjbTFoVW1salpYWjFkR0UrQ2lBZ0lDQWdJQ0FnUEdSaGRHbFRhVzVuYjJ4dlZtVnljMkZ0Wlc1MGJ6NEtJQ0FnSUNBZ0lDQWdJQ0FnUEdsdGNHOXlkRzlUYVc1bmIyeHZWbVZ5YzJGdFpXNTBiejR6TXk0eE1Ed3ZhVzF3YjNKMGIxTnBibWR2Ykc5V1pYSnpZVzFsYm5SdlBnb2dJQ0FnSUNBZ0lDQWdJQ0E4YVdKaGJrRmpZM0psWkdsMGJ6NUpWREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01ERThMMmxpWVc1QlkyTnlaV1JwZEc4K0NpQWdJQ0FnSUNBZ0lDQWdJRHhqWVhWellXeGxWbVZ5YzJGdFpXNTBiejU0ZUhoNGVIZzhMMk5oZFhOaGJHVldaWEp6WVcxbGJuUnZQZ29nSUNBZ0lDQWdJQ0FnSUNBOFpHRjBhVk53WldOcFptbGphVkpwYzJOdmMzTnBiMjVsUG5oNGVIaDRQQzlrWVhScFUzQmxZMmxtYVdOcFVtbHpZMjl6YzJsdmJtVStDaUFnSUNBZ0lDQWdQQzlrWVhScFUybHVaMjlzYjFabGNuTmhiV1Z1ZEc4K0NpQWdJQ0E4TDJSaGRHbFdaWEp6WVcxbGJuUnZQZ284TDFKUVZENEs8L3JwdD4KCQk8L25zNTpub2RvSW52aWFSUFQ+Cgk8L3NvYXA6Qm9keT4KPC9zb2FwOkVudmVsb3BlPg==',
];

$data_resp = [
    ':id' => 95,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 12:50:01.197',
    ':tipoevento' => 'nodoInviaRPT',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000090',
    ':ccp' => 'c0000000000000000000000000000090',
    ':noticenumber' => '',
    ':creditorreferenceid' => '',
    ':paymenttoken' => '',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_000092',
    ':sessionidoriginal' => 'session_id_original_000090',
    ':uniqueid' => 'T000095',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpwcHQ9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIiB4bWxuczpwcHRoZWFkPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIiB4bWxuczp0bnM9Imh0dHA6Ly9Ob2RvUGFnYW1lbnRpU1BDLnNwY29vcC5nb3YuaXQvc2Vydml6aS9QYWdhbWVudGlUZWxlbWF0aWNpUlBUIiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBwdDpub2RvSW52aWFSUFRSaXNwb3N0YT4KCQkJPGVzaXRvPk9LPC9lc2l0bz4KCQkJPHJlZGlyZWN0PjE8L3JlZGlyZWN0PgoJCQk8dXJsPmh0dHBzOi8vd2lzcDIucGFnb3BhLmdvdi5pdC93YWxsZXQvd2VsY29tZT9pZFNlc3Npb249eHh4eHh4PC91cmw+CgkJPC9wcHQ6bm9kb0ludmlhUlBUUmlzcG9zdGE+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg==',
];

Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);





$data_req = [
    ':id' => 96,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 12:51:00.197',
    ':tipoevento' => 'nodoAttivaRPT',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000091',
    ':ccp' => 'c0000000000000000000000000000091',
    ':noticenumber' => '',
    ':creditorreferenceid' => '',
    ':paymenttoken' => '',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_000093',
    ':sessionidoriginal' => 'session_id_original_000091',
    ':uniqueid' => 'T000096',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPHNvYXA6RW52ZWxvcGUgeG1sbnM6cGF5X2k9Imh0dHA6Ly93d3cuZGlnaXRwYS5nb3YuaXQvc2NoZW1hcy8yMDExL1BhZ2FtZW50aS8iIHhtbG5zOnBwdD0iaHR0cDovL3dzLnBhZ2FtZW50aS50ZWxlbWF0aWNpLmdvdi8iIHhtbG5zOnFyYz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0L1FyQ29kZSIgeG1sbnM6c29hcD0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnRucz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0L3NlcnZpemkvUGFnYW1lbnRpVGVsZW1hdGljaVBzcE5vZG8iIHhtbG5zOnhzaT0iaHR0cDovL3d3dy53My5vcmcvMjAwMS9YTUxTY2hlbWEtaW5zdGFuY2UiPgoJPHNvYXA6Qm9keT4KCQk8cHB0Om5vZG9BdHRpdmFSUFQgeG1sbnM6cHB0PSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyI+CgkJCTxpZGVudGlmaWNhdGl2b1BTUD5BR0lEXzAxPC9pZGVudGlmaWNhdGl2b1BTUD4KCQkJPGlkZW50aWZpY2F0aXZvSW50ZXJtZWRpYXJpb1BTUD44ODg4ODg4ODg4ODwvaWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUFNQPgoJCQk8aWRlbnRpZmljYXRpdm9DYW5hbGU+ODg4ODg4ODg4ODhfMDE8L2lkZW50aWZpY2F0aXZvQ2FuYWxlPgoJCQk8Y29kaWNlQ29udGVzdG9QYWdhbWVudG8+YzAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwOTE8L2NvZGljZUNvbnRlc3RvUGFnYW1lbnRvPgoJCQk8aWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUFNQUGFnYW1lbnRvPjg4ODg4ODg4ODg4PC9pZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QU1BQYWdhbWVudG8+CgkJCTxpZGVudGlmaWNhdGl2b0NhbmFsZVBhZ2FtZW50bz44ODg4ODg4ODg4OF8wMTwvaWRlbnRpZmljYXRpdm9DYW5hbGVQYWdhbWVudG8+CgkJCTxjb2RpZmljYUluZnJhc3RydXR0dXJhUFNQPlFSLUNPREU8L2NvZGlmaWNhSW5mcmFzdHJ1dHR1cmFQU1A+CgkJCTxjb2RpY2VJZFJQVD4KCQkJCTxxcmM6UXJDb2RlPgoJCQkJCTxxcmM6Q0Y+Nzc3Nzc3Nzc3Nzc8L3FyYzpDRj4KCQkJCQk8cXJjOkF1eERpZ2l0PjM8L3FyYzpBdXhEaWdpdD4KCQkJCQk8cXJjOkNvZElVVj4wMTAwMDAwMDAwMDAwMDA5MTwvcXJjOkNvZElVVj4KCQkJCTwvcXJjOlFyQ29kZT4KCQkJPC9jb2RpY2VJZFJQVD4KCQkJPGRhdGlQYWdhbWVudG9QU1A+CgkJCQk8aW1wb3J0b1NpbmdvbG9WZXJzYW1lbnRvPjMzLjEwPC9pbXBvcnRvU2luZ29sb1ZlcnNhbWVudG8+CgkJCTwvZGF0aVBhZ2FtZW50b1BTUD4KCQk8L3BwdDpub2RvQXR0aXZhUlBUPgoJPC9zb2FwOkJvZHk+Cjwvc29hcDpFbnZlbG9wZT4=',
];

$data_resp = [
    ':id' => 97,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 12:52:01.197',
    ':tipoevento' => 'nodoAttivaRPT',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000091',
    ':ccp' => 'c0000000000000000000000000000091',
    ':noticenumber' => '',
    ':creditorreferenceid' => '',
    ':paymenttoken' => '',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_000093',
    ':sessionidoriginal' => 'session_id_original_000091',
    ':uniqueid' => 'T000097',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpiYz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0L0JhckNvZGVfR1MxXzEyOF9Nb2RpZmllZCIgeG1sbnM6cGF5X2k9Imh0dHA6Ly93d3cuZGlnaXRwYS5nb3YuaXQvc2NoZW1hcy8yMDExL1BhZ2FtZW50aS8iIHhtbG5zOnBwdD0iaHR0cDovL3dzLnBhZ2FtZW50aS50ZWxlbWF0aWNpLmdvdi8iIHhtbG5zOnFyYz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0L1FyQ29kZSIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnRucz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0L3NlcnZpemkvUGFnYW1lbnRpVGVsZW1hdGljaVBzcE5vZG8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxwcHQ6bm9kb0F0dGl2YVJQVFJpc3Bvc3RhPgoJCQk8bm9kb0F0dGl2YVJQVFJpc3Bvc3RhPgoJCQkJPGZhdWx0PgoJCQkJCTxmYXVsdENvZGU+UFBUX01VTFRJX0JFTkVGSUNJQVJJTzwvZmF1bHRDb2RlPgoJCQkJCTxmYXVsdFN0cmluZz5MYSBjaGlhbWF0YSBub24gw6ggY29tcGF0aWJpbGUgY29uIGlsIG51b3ZvIG1vZGVsbG8gUFNQLjwvZmF1bHRTdHJpbmc+CgkJCQkJPGlkPk5vZG9EZWlQYWdhbWVudGlTUEM8L2lkPgoJCQkJCTxkZXNjcmlwdGlvbj5MYSBjaGlhbWF0YSBub24gw6ggY29tcGF0aWJpbGUgY29uIGlsIG51b3ZvIG1vZGVsbG8gUFNQLjwvZGVzY3JpcHRpb24+CgkJCQk8L2ZhdWx0PgoJCQkJPGVzaXRvPktPPC9lc2l0bz4KCQkJPC9ub2RvQXR0aXZhUlBUUmlzcG9zdGE+CgkJPC9wcHQ6bm9kb0F0dGl2YVJQVFJpc3Bvc3RhPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4=',
];

Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);




























$data_req = [
    ':id'                       => 100,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 15:43:00.197',
    ':tipoevento'               => 'activatePaymentNotice',
    ':sottotipoevento'          => 'REQ',
    ':iddominio'                => '77777777777',
    ':iuv'                      => '01000000000000100',
    ':ccp'                      => 'c0000000000000000000000000000100',
    ':noticenumber'             => '301000000000000100',
    ':creditorreferenceid'      => '01000000000000100',
    ':paymenttoken'             => 'c0000000000000000000000000000100',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000100',
    ':sessionidoriginal'        => '',
    ':uniqueid'                 => 'T000100',
    ':payload'                  => 'PHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6bm9kPSJodHRwOi8vcGFnb3BhLWFwaS5wYWdvcGEuZ292Lml0L25vZGUvbm9kZUZvclBzcC54c2QiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIj4KCTxzb2FwZW52OkhlYWRlci8+Cgk8c29hcGVudjpCb2R5PgoJCTxub2Q6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVxPgoJCQk8aWRQU1A+QUdJRF8wMTwvaWRQU1A+CgkJCTxpZEJyb2tlclBTUD44ODg4ODg4ODg4ODwvaWRCcm9rZXJQU1A+CgkJCTxpZENoYW5uZWw+ODg4ODg4ODg4ODhfMDE8L2lkQ2hhbm5lbD4KCQkJPHBhc3N3b3JkPioqKioqPC9wYXNzd29yZD4KCQkJPHFyQ29kZT4KCQkJCTxmaXNjYWxDb2RlPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlPgoJCQkJPG5vdGljZU51bWJlcj4zMDEwMDAwMDAwMDAwMDAxMDA8L25vdGljZU51bWJlcj4KCQkJPC9xckNvZGU+CgkJCTxhbW91bnQ+MC4wMDwvYW1vdW50PgoJCTwvbm9kOmFjdGl2YXRlUGF5bWVudE5vdGljZVJlcT4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+',
];
$data_resp = [
    ':id'                       => 101,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 15:43:01.197',
    ':tipoevento'               => 'activatePaymentNotice',
    ':sottotipoevento'          => 'RESP',
    ':iddominio'                => '77777777777',
    ':iuv'                      => '01000000000000100',
    ':ccp'                      => 'c0000000000000000000000000000100',
    ':noticenumber'             => '301000000000000100',
    ':creditorreferenceid'      => '01000000000000100',
    ':paymenttoken'             => 'c0000000000000000000000000000100',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000100',
    ':sessionidoriginal'        => '',
    ':uniqueid'                 => 'T000101',
    ':payload'                  => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVzPgoJCQk8b3V0Y29tZT5PSzwvb3V0Y29tZT4KCQkJPHRvdGFsQW1vdW50PjE1MC4wMDwvdG90YWxBbW91bnQ+CgkJCTxwYXltZW50RGVzY3JpcHRpb24+eHh4eHh4eDwvcGF5bWVudERlc2NyaXB0aW9uPgoJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCTxjb21wYW55TmFtZT54eHh4eHh4PC9jb21wYW55TmFtZT4KCQkJPHBheW1lbnRUb2tlbj50MDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDEwMDwvcGF5bWVudFRva2VuPgoJCQk8dHJhbnNmZXJMaXN0PgoJCQkJPHRyYW5zZmVyPgoJCQkJCTxpZFRyYW5zZmVyPjE8L2lkVHJhbnNmZXI+CgkJCQkJPHRyYW5zZmVyQW1vdW50PjExMC4wMDwvdHJhbnNmZXJBbW91bnQ+CgkJCQkJPGZpc2NhbENvZGVQQT43Nzc3Nzc3Nzc3NzwvZmlzY2FsQ29kZVBBPgoJCQkJCTxJQkFOPklUMThVMDAwMDAwMDAwMDAwMDAwMDAwMDAwMTwvSUJBTj4KCQkJCQk8cmVtaXR0YW5jZUluZm9ybWF0aW9uPnh4eHg8L3JlbWl0dGFuY2VJbmZvcm1hdGlvbj4KCQkJCQk8bWV0YWRhdGE+CgkJCQkJCTxtYXBFbnRyeT4KCQkJCQkJCTxrZXk+Y2hpYXZlXzFfMTwva2V5PgoJCQkJCQkJPHZhbHVlPnZhbG9yZV8xXzE8L3ZhbHVlPgoJCQkJCQk8L21hcEVudHJ5PgoJCQkJCQk8bWFwRW50cnk+CgkJCQkJCQk8a2V5PmNoaWF2ZV8xXzI8L2tleT4KCQkJCQkJCTx2YWx1ZT52YWxvcmVfMV8yPC92YWx1ZT4KCQkJCQkJPC9tYXBFbnRyeT4KCQkJCQk8L21ldGFkYXRhPgoJCQkJPC90cmFuc2Zlcj4KCQkJCTx0cmFuc2Zlcj4KCQkJCQk8aWRUcmFuc2Zlcj4yPC9pZFRyYW5zZmVyPgoJCQkJCTx0cmFuc2ZlckFtb3VudD40MC4wMDwvdHJhbnNmZXJBbW91bnQ+CgkJCQkJPGZpc2NhbENvZGVQQT43Nzc3Nzc3Nzc3ODwvZmlzY2FsQ29kZVBBPgoJCQkJCTxJQkFOPklUMThVMDAwMDAwMDAwMDAwMDAwMDAwMDAwMjwvSUJBTj4KCQkJCQk8cmVtaXR0YW5jZUluZm9ybWF0aW9uPnh4eHg8L3JlbWl0dGFuY2VJbmZvcm1hdGlvbj4KCQkJCQk8bWV0YWRhdGE+CgkJCQkJCTxtYXBFbnRyeT4KCQkJCQkJCTxrZXk+Y2hpYXZlXzJfMTwva2V5PgoJCQkJCQkJPHZhbHVlPnZhbG9yZV8yXzE8L3ZhbHVlPgoJCQkJCQk8L21hcEVudHJ5PgoJCQkJCQk8bWFwRW50cnk+CgkJCQkJCQk8a2V5PmNoaWF2ZV8yXzI8L2tleT4KCQkJCQkJCTx2YWx1ZT52YWxvcmVfMl8yPC92YWx1ZT4KCQkJCQkJPC9tYXBFbnRyeT4KCQkJCQk8L21ldGFkYXRhPgoJCQkJPC90cmFuc2Zlcj4KCQkJPC90cmFuc2Zlckxpc3Q+CgkJCTxjcmVkaXRvclJlZmVyZW5jZUlkPjAxMDAwMDAwMDAwMDAwMTAwPC9jcmVkaXRvclJlZmVyZW5jZUlkPgoJCTwvbmZwOmFjdGl2YXRlUGF5bWVudE5vdGljZVJlcz4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+',
];
Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);


$data_req = [
    ':id'                       => 102,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 15:44:00.197',
    ':tipoevento'               => 'pspNotifyPayment',
    ':sottotipoevento'          => 'REQ',
    ':iddominio'                => '77777777777',
    ':iuv'                      => '01000000000000100',
    ':ccp'                      => 'c0000000000000000000000000000100',
    ':noticenumber'             => '301000000000000100',
    ':creditorreferenceid'      => '01000000000000100',
    ':paymenttoken'             => 'c0000000000000000000000000000100',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000101',
    ':sessionidoriginal'        => '',
    ':uniqueid'                 => 'T000102',
    ':payload'                  => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpwZm49Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvcHNwL3BzcEZvck5vZGUueHNkIiB4bWxuczpzb2FwZW52PSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyIgeG1sbnM6eHM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hIiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBmbjpwc3BOb3RpZnlQYXltZW50UmVxPgoJCQk8aWRQU1A+QUdJRF8wMTwvaWRQU1A+CgkJCTxpZEJyb2tlclBTUD44ODg4ODg4ODg4ODwvaWRCcm9rZXJQU1A+CgkJCTxpZENoYW5uZWw+ODg4ODg4ODg4ODhfMDE8L2lkQ2hhbm5lbD4KCQkJPHBheW1lbnRUb2tlbj50MDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDEwMDwvcGF5bWVudFRva2VuPgoJCQk8cGF5bWVudERlc2NyaXB0aW9uPnBhZ2FtZW50byBtdWx0aWJlbmVmaWNpYXJpbzwvcGF5bWVudERlc2NyaXB0aW9uPgoJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCTxjb21wYW55TmFtZT54eHh4eHh4PC9jb21wYW55TmFtZT4KCQkJPGNyZWRpdG9yUmVmZXJlbmNlSWQ+MDEwMDAwMDAwMDAwMDAxMDA8L2NyZWRpdG9yUmVmZXJlbmNlSWQ+CgkJCTxkZWJ0QW1vdW50PjE1MC4wMDwvZGVidEFtb3VudD4KCQkJPHRyYW5zZmVyTGlzdD4KCQkJCTx0cmFuc2Zlcj4KCQkJCQk8aWRUcmFuc2Zlcj4xPC9pZFRyYW5zZmVyPgoJCQkJCTx0cmFuc2ZlckFtb3VudD4xMTAuMDA8L3RyYW5zZmVyQW1vdW50PgoJCQkJCTxmaXNjYWxDb2RlUEE+Nzc3Nzc3Nzc3Nzc8L2Zpc2NhbENvZGVQQT4KCQkJCQk8SUJBTj5JVDE4VTAwMDAwMDAwMDAwMDAwMDAwMDAwMDE8L0lCQU4+CgkJCQkJPHJlbWl0dGFuY2VJbmZvcm1hdGlvbj54eHh4PC9yZW1pdHRhbmNlSW5mb3JtYXRpb24+CgkJCQkJPG1ldGFkYXRhPgoJCQkJCQk8bWFwRW50cnk+CgkJCQkJCQk8a2V5PmNoaWF2ZV8xXzE8L2tleT4KCQkJCQkJCTx2YWx1ZT52YWxvcmVfMV8xPC92YWx1ZT4KCQkJCQkJPC9tYXBFbnRyeT4KCQkJCQkJPG1hcEVudHJ5PgoJCQkJCQkJPGtleT5jaGlhdmVfMV8yPC9rZXk+CgkJCQkJCQk8dmFsdWU+dmFsb3JlXzFfMjwvdmFsdWU+CgkJCQkJCTwvbWFwRW50cnk+CgkJCQkJPC9tZXRhZGF0YT4KCQkJCTwvdHJhbnNmZXI+CgkJCQk8dHJhbnNmZXI+CgkJCQkJPGlkVHJhbnNmZXI+MjwvaWRUcmFuc2Zlcj4KCQkJCQk8dHJhbnNmZXJBbW91bnQ+NDAuMDA8L3RyYW5zZmVyQW1vdW50PgoJCQkJCTxmaXNjYWxDb2RlUEE+Nzc3Nzc3Nzc3Nzg8L2Zpc2NhbENvZGVQQT4KCQkJCQk8SUJBTj5JVDE4VTAwMDAwMDAwMDAwMDAwMDAwMDAwMDI8L0lCQU4+CgkJCQkJPHJlbWl0dGFuY2VJbmZvcm1hdGlvbj54eHh4PC9yZW1pdHRhbmNlSW5mb3JtYXRpb24+CgkJCQkJPG1ldGFkYXRhPgoJCQkJCQk8bWFwRW50cnk+CgkJCQkJCQk8a2V5PmNoaWF2ZV8yXzE8L2tleT4KCQkJCQkJCTx2YWx1ZT52YWxvcmVfMl8xPC92YWx1ZT4KCQkJCQkJPC9tYXBFbnRyeT4KCQkJCQkJPG1hcEVudHJ5PgoJCQkJCQkJPGtleT5jaGlhdmVfMl8yPC9rZXk+CgkJCQkJCQk8dmFsdWU+dmFsb3JlXzJfMjwvdmFsdWU+CgkJCQkJCTwvbWFwRW50cnk+CgkJCQkJPC9tZXRhZGF0YT4KCQkJCTwvdHJhbnNmZXI+CgkJCTwvdHJhbnNmZXJMaXN0PgoJCQk8Y3JlZGl0Q2FyZFBheW1lbnQ+CgkJCQk8cnJuPjExMTExMTExMTExMTwvcnJuPgoJCQkJPG91dGNvbWVQYXltZW50R2F0ZXdheT5PSzwvb3V0Y29tZVBheW1lbnRHYXRld2F5PgoJCQkJPHRvdGFsQW1vdW50PjE1MS4zMDwvdG90YWxBbW91bnQ+CgkJCQk8ZmVlPjEuMzA8L2ZlZT4KCQkJCTx0aW1lc3RhbXBPcGVyYXRpb24+MjAyNC0wNC0xMFQyMToxNDo0NzwvdGltZXN0YW1wT3BlcmF0aW9uPgoJCQkJPGF1dGhvcml6YXRpb25Db2RlPjExMTExMTwvYXV0aG9yaXphdGlvbkNvZGU+CgkJCTwvY3JlZGl0Q2FyZFBheW1lbnQ+CgkJPC9wZm46cHNwTm90aWZ5UGF5bWVudFJlcT4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+',
];
$data_resp = [
    ':id'                       => 103,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 15:44:01.197',
    ':tipoevento'               => 'pspNotifyPayment',
    ':sottotipoevento'          => 'RESP',
    ':iddominio'                => '77777777777',
    ':iuv'                      => '01000000000000100',
    ':ccp'                      => 'c0000000000000000000000000000100',
    ':noticenumber'             => '301000000000000100',
    ':creditorreferenceid'      => '01000000000000100',
    ':paymenttoken'             => 'c0000000000000000000000000000100',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000101',
    ':sessionidoriginal'        => '',
    ':uniqueid'                 => 'T000103',
    ':payload'                  => 'PFNPQVAtRU5WOkVudmVsb3BlIHhtbG5zOlNPQVAtRU5WPSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyI+PFNPQVAtRU5WOkhlYWRlci8+PFNPQVAtRU5WOkJvZHk+PG5zMzpwc3BOb3RpZnlQYXltZW50UmVzIHhtbG5zOm5zMz0iaHR0cDovL3BhZ29wYS1hcGkucGFnb3BhLmdvdi5pdC9wc3AvcHNwRm9yTm9kZS54c2QiPjxvdXRjb21lPk9LPC9vdXRjb21lPjwvbnMzOnBzcE5vdGlmeVBheW1lbnRSZXM+PC9TT0FQLUVOVjpCb2R5PjwvU09BUC1FTlY6RW52ZWxvcGU+',
];

Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);




$data_req = [
    ':id'                       => 104,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 15:45:00.197',
    ':tipoevento'               => 'pspNotifyPayment',
    ':sottotipoevento'          => 'REQ',
    ':iddominio'                => '77777777777',
    ':iuv'                      => '01000000000000100',
    ':ccp'                      => 'c0000000000000000000000000000100',
    ':noticenumber'             => '301000000000000100',
    ':creditorreferenceid'      => '01000000000000100',
    ':paymenttoken'             => 'c0000000000000000000000000000100',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000102',
    ':sessionidoriginal'        => '',
    ':uniqueid'                 => 'T000104',
    ':payload'                  => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpwZm49Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvcHNwL3BzcEZvck5vZGUueHNkIiB4bWxuczpzb2FwZW52PSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyIgeG1sbnM6eHM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hIiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBmbjpwc3BOb3RpZnlQYXltZW50UmVxPgoJCQk8aWRQU1A+QUdJRF8wMTwvaWRQU1A+CgkJCTxpZEJyb2tlclBTUD44ODg4ODg4ODg4ODwvaWRCcm9rZXJQU1A+CgkJCTxpZENoYW5uZWw+ODg4ODg4ODg4ODhfMDE8L2lkQ2hhbm5lbD4KCQkJPHBheW1lbnRUb2tlbj50MDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDEwMDwvcGF5bWVudFRva2VuPgoJCQk8cGF5bWVudERlc2NyaXB0aW9uPnBhZ2FtZW50byBtdWx0aWJlbmVmaWNpYXJpbzwvcGF5bWVudERlc2NyaXB0aW9uPgoJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCTxjb21wYW55TmFtZT54eHh4eHh4PC9jb21wYW55TmFtZT4KCQkJPGNyZWRpdG9yUmVmZXJlbmNlSWQ+MDEwMDAwMDAwMDAwMDAxMDA8L2NyZWRpdG9yUmVmZXJlbmNlSWQ+CgkJCTxkZWJ0QW1vdW50PjE1MC4wMDwvZGVidEFtb3VudD4KCQkJPHRyYW5zZmVyTGlzdD4KCQkJCTx0cmFuc2Zlcj4KCQkJCQk8aWRUcmFuc2Zlcj4xPC9pZFRyYW5zZmVyPgoJCQkJCTx0cmFuc2ZlckFtb3VudD4xMTAuMDA8L3RyYW5zZmVyQW1vdW50PgoJCQkJCTxmaXNjYWxDb2RlUEE+Nzc3Nzc3Nzc3Nzc8L2Zpc2NhbENvZGVQQT4KCQkJCQk8SUJBTj5JVDE4VTAwMDAwMDAwMDAwMDAwMDAwMDAwMDE8L0lCQU4+CgkJCQkJPHJlbWl0dGFuY2VJbmZvcm1hdGlvbj54eHh4PC9yZW1pdHRhbmNlSW5mb3JtYXRpb24+CgkJCQkJPG1ldGFkYXRhPgoJCQkJCQk8bWFwRW50cnk+CgkJCQkJCQk8a2V5PmNoaWF2ZV8xXzE8L2tleT4KCQkJCQkJCTx2YWx1ZT52YWxvcmVfMV8xPC92YWx1ZT4KCQkJCQkJPC9tYXBFbnRyeT4KCQkJCQkJPG1hcEVudHJ5PgoJCQkJCQkJPGtleT5jaGlhdmVfMV8yPC9rZXk+CgkJCQkJCQk8dmFsdWU+dmFsb3JlXzFfMjwvdmFsdWU+CgkJCQkJCTwvbWFwRW50cnk+CgkJCQkJPC9tZXRhZGF0YT4KCQkJCTwvdHJhbnNmZXI+CgkJCQk8dHJhbnNmZXI+CgkJCQkJPGlkVHJhbnNmZXI+MjwvaWRUcmFuc2Zlcj4KCQkJCQk8dHJhbnNmZXJBbW91bnQ+NDAuMDA8L3RyYW5zZmVyQW1vdW50PgoJCQkJCTxmaXNjYWxDb2RlUEE+Nzc3Nzc3Nzc3Nzg8L2Zpc2NhbENvZGVQQT4KCQkJCQk8SUJBTj5JVDE4VTAwMDAwMDAwMDAwMDAwMDAwMDAwMDI8L0lCQU4+CgkJCQkJPHJlbWl0dGFuY2VJbmZvcm1hdGlvbj54eHh4PC9yZW1pdHRhbmNlSW5mb3JtYXRpb24+CgkJCQkJPG1ldGFkYXRhPgoJCQkJCQk8bWFwRW50cnk+CgkJCQkJCQk8a2V5PmNoaWF2ZV8yXzE8L2tleT4KCQkJCQkJCTx2YWx1ZT52YWxvcmVfMl8xPC92YWx1ZT4KCQkJCQkJPC9tYXBFbnRyeT4KCQkJCQkJPG1hcEVudHJ5PgoJCQkJCQkJPGtleT5jaGlhdmVfMl8yPC9rZXk+CgkJCQkJCQk8dmFsdWU+dmFsb3JlXzJfMjwvdmFsdWU+CgkJCQkJCTwvbWFwRW50cnk+CgkJCQkJPC9tZXRhZGF0YT4KCQkJCTwvdHJhbnNmZXI+CgkJCTwvdHJhbnNmZXJMaXN0PgoJCQk8Y3JlZGl0Q2FyZFBheW1lbnQ+CgkJCQk8cnJuPjExMTExMTExMTExMTwvcnJuPgoJCQkJPG91dGNvbWVQYXltZW50R2F0ZXdheT5PSzwvb3V0Y29tZVBheW1lbnRHYXRld2F5PgoJCQkJPHRvdGFsQW1vdW50PjE1MS4zMDwvdG90YWxBbW91bnQ+CgkJCQk8ZmVlPjEuMzA8L2ZlZT4KCQkJCTx0aW1lc3RhbXBPcGVyYXRpb24+MjAyNC0wNC0xMFQyMToxNDo0NzwvdGltZXN0YW1wT3BlcmF0aW9uPgoJCQkJPGF1dGhvcml6YXRpb25Db2RlPjExMTExMTwvYXV0aG9yaXphdGlvbkNvZGU+CgkJCTwvY3JlZGl0Q2FyZFBheW1lbnQ+CgkJPC9wZm46cHNwTm90aWZ5UGF5bWVudFJlcT4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+',
];
$data_resp = [
    ':id'                       => 105,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 15:45:01.197',
    ':tipoevento'               => 'pspNotifyPayment',
    ':sottotipoevento'          => 'RESP',
    ':iddominio'                => '77777777777',
    ':iuv'                      => '01000000000000100',
    ':ccp'                      => 'c0000000000000000000000000000100',
    ':noticenumber'             => '301000000000000100',
    ':creditorreferenceid'      => '01000000000000100',
    ':paymenttoken'             => 'c0000000000000000000000000000100',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000102',
    ':sessionidoriginal'        => '',
    ':uniqueid'                 => 'T000105',
    ':payload'                  => 'PFNPQVAtRU5WOkVudmVsb3BlIHhtbG5zOlNPQVAtRU5WPSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyI+PFNPQVAtRU5WOkhlYWRlci8+PFNPQVAtRU5WOkJvZHk+PG5zMzpwc3BOb3RpZnlQYXltZW50UmVzIHhtbG5zOm5zMz0iaHR0cDovL3BhZ29wYS1hcGkucGFnb3BhLmdvdi5pdC9wc3AvcHNwRm9yTm9kZS54c2QiPjxvdXRjb21lPk9LPC9vdXRjb21lPjwvbnMzOnBzcE5vdGlmeVBheW1lbnRSZXM+PC9TT0FQLUVOVjpCb2R5PjwvU09BUC1FTlY6RW52ZWxvcGU+',
];

Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);




$data_req = [
    ':id'                       => 106,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 15:46:00.197',
    ':tipoevento'               => 'sendPaymentOutcome',
    ':sottotipoevento'          => 'REQ',
    ':iddominio'                => '77777777777',
    ':iuv'                      => '01000000000000100',
    ':ccp'                      => 'c0000000000000000000000000000100',
    ':noticenumber'             => '301000000000000100',
    ':creditorreferenceid'      => '01000000000000100',
    ':paymenttoken'             => 'c0000000000000000000000000000100',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000103',
    ':sessionidoriginal'        => '',
    ':uniqueid'                 => 'T000106',
    ':payload'                  => 'PHNvYXA6RW52ZWxvcGUgeG1sbnM6c29hcD0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPgoJPHNvYXA6Qm9keT4KCQk8bnMyOnNlbmRQYXltZW50T3V0Y29tZVJlcSB4bWxuczpuczI9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6bnMzPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyI+CgkJCTxpZFBTUD5BR0lEXzAxPC9pZFBTUD4KCQkJPGlkQnJva2VyUFNQPjg4ODg4ODg4ODg4PC9pZEJyb2tlclBTUD4KCQkJPGlkQ2hhbm5lbD44ODg4ODg4ODg4OF8wMTwvaWRDaGFubmVsPgoJCQk8cGFzc3dvcmQ+eHh4eHh4eHg8L3Bhc3N3b3JkPgoJCQk8cGF5bWVudFRva2VuPmMwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMTAwPC9wYXltZW50VG9rZW4+CgkJCTxvdXRjb21lPk9LPC9vdXRjb21lPgoJCQk8ZGV0YWlscz4KCQkJCTxwYXltZW50TWV0aG9kPm90aGVyPC9wYXltZW50TWV0aG9kPgoJCQkJPGZlZT4xLjAwPC9mZWU+CgkJCQk8YXBwbGljYXRpb25EYXRlPjIwMjQtMDQtMDI8L2FwcGxpY2F0aW9uRGF0ZT4KCQkJCTx0cmFuc2ZlckRhdGU+MjAyNC0wNC0wMzwvdHJhbnNmZXJEYXRlPgoJCQk8L2RldGFpbHM+CgkJPC9uczI6c2VuZFBheW1lbnRPdXRjb21lUmVxPgoJPC9zb2FwOkJvZHk+Cjwvc29hcDpFbnZlbG9wZT4=',
];
$data_resp = [
    ':id'                       => 107,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 15:46:01.197',
    ':tipoevento'               => 'sendPaymentOutcome',
    ':sottotipoevento'          => 'RESP',
    ':iddominio'                => '77777777777',
    ':iuv'                      => '01000000000000100',
    ':ccp'                      => 'c0000000000000000000000000000100',
    ':noticenumber'             => '301000000000000100',
    ':creditorreferenceid'      => '01000000000000100',
    ':paymenttoken'             => 'c0000000000000000000000000000100',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000103',
    ':sessionidoriginal'        => '',
    ':uniqueid'                 => 'T000107',
    ':payload'                  => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6c2VuZFBheW1lbnRPdXRjb21lUmVzPgoJCQk8b3V0Y29tZT5PSzwvb3V0Y29tZT4KCQk8L25mcDpzZW5kUGF5bWVudE91dGNvbWVSZXM+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg==',
];

Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);












































$data_req = [
    ':id'                       => 108,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 15:43:00.197',
    ':tipoevento'               => 'activatePaymentNotice',
    ':sottotipoevento'          => 'REQ',
    ':iddominio'                => '77777777777',
    ':iuv'                      => '01000000000000101',
    ':ccp'                      => 'c0000000000000000000000000000101',
    ':noticenumber'             => '301000000000000101',
    ':creditorreferenceid'      => '01000000000000101',
    ':paymenttoken'             => 'c0000000000000000000000000000101',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000107',
    ':sessionidoriginal'        => '',
    ':uniqueid'                 => 'T000108',
    ':payload'                  => 'PHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6bm9kPSJodHRwOi8vcGFnb3BhLWFwaS5wYWdvcGEuZ292Lml0L25vZGUvbm9kZUZvclBzcC54c2QiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIj4KCTxzb2FwZW52OkhlYWRlci8+Cgk8c29hcGVudjpCb2R5PgoJCTxub2Q6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVxPgoJCQk8aWRQU1A+QUdJRF8wMTwvaWRQU1A+CgkJCTxpZEJyb2tlclBTUD44ODg4ODg4ODg4ODwvaWRCcm9rZXJQU1A+CgkJCTxpZENoYW5uZWw+ODg4ODg4ODg4ODhfMDE8L2lkQ2hhbm5lbD4KCQkJPHBhc3N3b3JkPioqKioqPC9wYXNzd29yZD4KCQkJPHFyQ29kZT4KCQkJCTxmaXNjYWxDb2RlPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlPgoJCQkJPG5vdGljZU51bWJlcj4zMDEwMDAwMDAwMDAwMDAxMDE8L25vdGljZU51bWJlcj4KCQkJPC9xckNvZGU+CgkJCTxhbW91bnQ+MC4wMDwvYW1vdW50PgoJCTwvbm9kOmFjdGl2YXRlUGF5bWVudE5vdGljZVJlcT4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+',
];
$data_resp = [
    ':id'                       => 109,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 15:43:01.197',
    ':tipoevento'               => 'activatePaymentNotice',
    ':sottotipoevento'          => 'RESP',
    ':iddominio'                => '77777777777',
    ':iuv'                      => '01000000000000101',
    ':ccp'                      => 'c0000000000000000000000000000101',
    ':noticenumber'             => '301000000000000101',
    ':creditorreferenceid'      => '01000000000000101',
    ':paymenttoken'             => 'c0000000000000000000000000000101',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000107',
    ':sessionidoriginal'        => '',
    ':uniqueid'                 => 'T000109',
    ':payload'                  => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVzPgoJCQk8b3V0Y29tZT5PSzwvb3V0Y29tZT4KCQkJPHRvdGFsQW1vdW50PjE1MC4wMDwvdG90YWxBbW91bnQ+CgkJCTxwYXltZW50RGVzY3JpcHRpb24+eHh4eHh4eDwvcGF5bWVudERlc2NyaXB0aW9uPgoJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCTxjb21wYW55TmFtZT54eHh4eHh4PC9jb21wYW55TmFtZT4KCQkJPHBheW1lbnRUb2tlbj50MDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDEwMTwvcGF5bWVudFRva2VuPgoJCQk8dHJhbnNmZXJMaXN0PgoJCQkJPHRyYW5zZmVyPgoJCQkJCTxpZFRyYW5zZmVyPjE8L2lkVHJhbnNmZXI+CgkJCQkJPHRyYW5zZmVyQW1vdW50PjExMC4wMDwvdHJhbnNmZXJBbW91bnQ+CgkJCQkJPGZpc2NhbENvZGVQQT43Nzc3Nzc3Nzc3NzwvZmlzY2FsQ29kZVBBPgoJCQkJCTxJQkFOPklUMThVMDAwMDAwMDAwMDAwMDAwMDAwMDAwMTwvSUJBTj4KCQkJCQk8cmVtaXR0YW5jZUluZm9ybWF0aW9uPnh4eHg8L3JlbWl0dGFuY2VJbmZvcm1hdGlvbj4KCQkJCQk8bWV0YWRhdGE+CgkJCQkJCTxtYXBFbnRyeT4KCQkJCQkJCTxrZXk+Y2hpYXZlXzFfMTwva2V5PgoJCQkJCQkJPHZhbHVlPnZhbG9yZV8xXzE8L3ZhbHVlPgoJCQkJCQk8L21hcEVudHJ5PgoJCQkJCQk8bWFwRW50cnk+CgkJCQkJCQk8a2V5PmNoaWF2ZV8xXzI8L2tleT4KCQkJCQkJCTx2YWx1ZT52YWxvcmVfMV8yPC92YWx1ZT4KCQkJCQkJPC9tYXBFbnRyeT4KCQkJCQk8L21ldGFkYXRhPgoJCQkJPC90cmFuc2Zlcj4KCQkJCTx0cmFuc2Zlcj4KCQkJCQk8aWRUcmFuc2Zlcj4yPC9pZFRyYW5zZmVyPgoJCQkJCTx0cmFuc2ZlckFtb3VudD40MC4wMDwvdHJhbnNmZXJBbW91bnQ+CgkJCQkJPGZpc2NhbENvZGVQQT43Nzc3Nzc3Nzc3ODwvZmlzY2FsQ29kZVBBPgoJCQkJCTxJQkFOPklUMThVMDAwMDAwMDAwMDAwMDAwMDAwMDAwMjwvSUJBTj4KCQkJCQk8cmVtaXR0YW5jZUluZm9ybWF0aW9uPnh4eHg8L3JlbWl0dGFuY2VJbmZvcm1hdGlvbj4KCQkJCQk8bWV0YWRhdGE+CgkJCQkJCTxtYXBFbnRyeT4KCQkJCQkJCTxrZXk+Y2hpYXZlXzJfMTwva2V5PgoJCQkJCQkJPHZhbHVlPnZhbG9yZV8yXzE8L3ZhbHVlPgoJCQkJCQk8L21hcEVudHJ5PgoJCQkJCQk8bWFwRW50cnk+CgkJCQkJCQk8a2V5PmNoaWF2ZV8yXzI8L2tleT4KCQkJCQkJCTx2YWx1ZT52YWxvcmVfMl8yPC92YWx1ZT4KCQkJCQkJPC9tYXBFbnRyeT4KCQkJCQk8L21ldGFkYXRhPgoJCQkJPC90cmFuc2Zlcj4KCQkJPC90cmFuc2Zlckxpc3Q+CgkJCTxjcmVkaXRvclJlZmVyZW5jZUlkPjAxMDAwMDAwMDAwMDAwMTAxPC9jcmVkaXRvclJlZmVyZW5jZUlkPgoJCTwvbmZwOmFjdGl2YXRlUGF5bWVudE5vdGljZVJlcz4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+',
];
Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);


$data_req = [
    ':id'                       => 110,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 15:44:00.197',
    ':tipoevento'               => 'pspNotifyPayment',
    ':sottotipoevento'          => 'REQ',
    ':iddominio'                => '77777777777',
    ':iuv'                      => '01000000000000101',
    ':ccp'                      => 'c0000000000000000000000000000101',
    ':noticenumber'             => '301000000000000101',
    ':creditorreferenceid'      => '01000000000000101',
    ':paymenttoken'             => 'c0000000000000000000000000000101',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000108',
    ':sessionidoriginal'        => '',
    ':uniqueid'                 => 'T000110',
    ':payload'                  => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpwZm49Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvcHNwL3BzcEZvck5vZGUueHNkIiB4bWxuczpzb2FwZW52PSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyIgeG1sbnM6eHM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hIiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBmbjpwc3BOb3RpZnlQYXltZW50UmVxPgoJCQk8aWRQU1A+QUdJRF8wMTwvaWRQU1A+CgkJCTxpZEJyb2tlclBTUD44ODg4ODg4ODg4ODwvaWRCcm9rZXJQU1A+CgkJCTxpZENoYW5uZWw+ODg4ODg4ODg4ODhfMDE8L2lkQ2hhbm5lbD4KCQkJPHBheW1lbnRUb2tlbj5jMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDEwMTwvcGF5bWVudFRva2VuPgoJCQk8cGF5bWVudERlc2NyaXB0aW9uPnBhZ2FtZW50byBtdWx0aWJlbmVmaWNpYXJpbzwvcGF5bWVudERlc2NyaXB0aW9uPgoJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCTxjb21wYW55TmFtZT54eHh4eHh4PC9jb21wYW55TmFtZT4KCQkJPGNyZWRpdG9yUmVmZXJlbmNlSWQ+MDEwMDAwMDAwMDAwMDAxMDE8L2NyZWRpdG9yUmVmZXJlbmNlSWQ+CgkJCTxkZWJ0QW1vdW50PjE1MC4wMDwvZGVidEFtb3VudD4KCQkJPHRyYW5zZmVyTGlzdD4KCQkJCTx0cmFuc2Zlcj4KCQkJCQk8aWRUcmFuc2Zlcj4xPC9pZFRyYW5zZmVyPgoJCQkJCTx0cmFuc2ZlckFtb3VudD4xMTAuMDA8L3RyYW5zZmVyQW1vdW50PgoJCQkJCTxmaXNjYWxDb2RlUEE+Nzc3Nzc3Nzc3Nzc8L2Zpc2NhbENvZGVQQT4KCQkJCQk8SUJBTj5JVDE4VTAwMDAwMDAwMDAwMDAwMDAwMDAwMDE8L0lCQU4+CgkJCQkJPHJlbWl0dGFuY2VJbmZvcm1hdGlvbj54eHh4PC9yZW1pdHRhbmNlSW5mb3JtYXRpb24+CgkJCQkJPG1ldGFkYXRhPgoJCQkJCQk8bWFwRW50cnk+CgkJCQkJCQk8a2V5PmNoaWF2ZV8xXzE8L2tleT4KCQkJCQkJCTx2YWx1ZT52YWxvcmVfMV8xPC92YWx1ZT4KCQkJCQkJPC9tYXBFbnRyeT4KCQkJCQkJPG1hcEVudHJ5PgoJCQkJCQkJPGtleT5jaGlhdmVfMV8yPC9rZXk+CgkJCQkJCQk8dmFsdWU+dmFsb3JlXzFfMjwvdmFsdWU+CgkJCQkJCTwvbWFwRW50cnk+CgkJCQkJPC9tZXRhZGF0YT4KCQkJCTwvdHJhbnNmZXI+CgkJCQk8dHJhbnNmZXI+CgkJCQkJPGlkVHJhbnNmZXI+MjwvaWRUcmFuc2Zlcj4KCQkJCQk8dHJhbnNmZXJBbW91bnQ+NDAuMDA8L3RyYW5zZmVyQW1vdW50PgoJCQkJCTxmaXNjYWxDb2RlUEE+Nzc3Nzc3Nzc3Nzg8L2Zpc2NhbENvZGVQQT4KCQkJCQk8SUJBTj5JVDE4VTAwMDAwMDAwMDAwMDAwMDAwMDAwMDI8L0lCQU4+CgkJCQkJPHJlbWl0dGFuY2VJbmZvcm1hdGlvbj54eHh4PC9yZW1pdHRhbmNlSW5mb3JtYXRpb24+CgkJCQkJPG1ldGFkYXRhPgoJCQkJCQk8bWFwRW50cnk+CgkJCQkJCQk8a2V5PmNoaWF2ZV8yXzE8L2tleT4KCQkJCQkJCTx2YWx1ZT52YWxvcmVfMl8xPC92YWx1ZT4KCQkJCQkJPC9tYXBFbnRyeT4KCQkJCQkJPG1hcEVudHJ5PgoJCQkJCQkJPGtleT5jaGlhdmVfMl8yPC9rZXk+CgkJCQkJCQk8dmFsdWU+dmFsb3JlXzJfMjwvdmFsdWU+CgkJCQkJCTwvbWFwRW50cnk+CgkJCQkJPC9tZXRhZGF0YT4KCQkJCTwvdHJhbnNmZXI+CgkJCTwvdHJhbnNmZXJMaXN0PgoJCQk8YmFuY29tYXRwYXlQYXltZW50PgoJCQkJPHRyYW5zYWN0aW9uSWQ+MTExMTExMTEyPC90cmFuc2FjdGlvbklkPgoJCQkJPG91dGNvbWVQYXltZW50R2F0ZXdheT4wPC9vdXRjb21lUGF5bWVudEdhdGV3YXk+CgkJCQk8dG90YWxBbW91bnQ+MTUwLjUwPC90b3RhbEFtb3VudD4KCQkJCTxmZWU+MC41MDwvZmVlPgoJCQkJPHRpbWVzdGFtcE9wZXJhdGlvbj4yMDI0LTA0LTEzVDIxOjE5OjQ1PC90aW1lc3RhbXBPcGVyYXRpb24+CgkJCQk8YXV0aG9yaXphdGlvbkNvZGU+MTExMTExMTExMTExMTExMTExMTExMTA8L2F1dGhvcml6YXRpb25Db2RlPgoJCQk8L2JhbmNvbWF0cGF5UGF5bWVudD4KCQk8L3Bmbjpwc3BOb3RpZnlQYXltZW50UmVxPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4=',
];
$data_resp = [
    ':id'                       => 111,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 15:44:01.197',
    ':tipoevento'               => 'pspNotifyPayment',
    ':sottotipoevento'          => 'RESP',
    ':iddominio'                => '77777777777',
    ':iuv'                      => '01000000000000101',
    ':ccp'                      => 'c0000000000000000000000000000101',
    ':noticenumber'             => '301000000000000101',
    ':creditorreferenceid'      => '01000000000000101',
    ':paymenttoken'             => 'c0000000000000000000000000000101',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000108',
    ':sessionidoriginal'        => '',
    ':uniqueid'                 => 'T000111',
    ':payload'                  => 'PFNPQVAtRU5WOkVudmVsb3BlIHhtbG5zOlNPQVAtRU5WPSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyI+PFNPQVAtRU5WOkhlYWRlci8+PFNPQVAtRU5WOkJvZHk+PG5zMzpwc3BOb3RpZnlQYXltZW50UmVzIHhtbG5zOm5zMz0iaHR0cDovL3BhZ29wYS1hcGkucGFnb3BhLmdvdi5pdC9wc3AvcHNwRm9yTm9kZS54c2QiPjxvdXRjb21lPk9LPC9vdXRjb21lPjwvbnMzOnBzcE5vdGlmeVBheW1lbnRSZXM+PC9TT0FQLUVOVjpCb2R5PjwvU09BUC1FTlY6RW52ZWxvcGU+',
];

Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);




$data_req = [
    ':id'                       => 112,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 15:45:00.197',
    ':tipoevento'               => 'pspNotifyPayment',
    ':sottotipoevento'          => 'REQ',
    ':iddominio'                => '77777777777',
    ':iuv'                      => '01000000000000101',
    ':ccp'                      => 'c0000000000000000000000000000101',
    ':noticenumber'             => '301000000000000101',
    ':creditorreferenceid'      => '01000000000000101',
    ':paymenttoken'             => 'c0000000000000000000000000000101',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000109',
    ':sessionidoriginal'        => '',
    ':uniqueid'                 => 'T000112',
    ':payload'                  => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpwZm49Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvcHNwL3BzcEZvck5vZGUueHNkIiB4bWxuczpzb2FwZW52PSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyIgeG1sbnM6eHM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hIiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBmbjpwc3BOb3RpZnlQYXltZW50UmVxPgoJCQk8aWRQU1A+QUdJRF8wMTwvaWRQU1A+CgkJCTxpZEJyb2tlclBTUD44ODg4ODg4ODg4ODwvaWRCcm9rZXJQU1A+CgkJCTxpZENoYW5uZWw+ODg4ODg4ODg4ODhfMDE8L2lkQ2hhbm5lbD4KCQkJPHBheW1lbnRUb2tlbj5jMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDEwMTwvcGF5bWVudFRva2VuPgoJCQk8cGF5bWVudERlc2NyaXB0aW9uPnBhZ2FtZW50byBtdWx0aWJlbmVmaWNpYXJpbzwvcGF5bWVudERlc2NyaXB0aW9uPgoJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCTxjb21wYW55TmFtZT54eHh4eHh4PC9jb21wYW55TmFtZT4KCQkJPGNyZWRpdG9yUmVmZXJlbmNlSWQ+MDEwMDAwMDAwMDAwMDAxMDE8L2NyZWRpdG9yUmVmZXJlbmNlSWQ+CgkJCTxkZWJ0QW1vdW50PjE1MC4wMDwvZGVidEFtb3VudD4KCQkJPHRyYW5zZmVyTGlzdD4KCQkJCTx0cmFuc2Zlcj4KCQkJCQk8aWRUcmFuc2Zlcj4xPC9pZFRyYW5zZmVyPgoJCQkJCTx0cmFuc2ZlckFtb3VudD4xMTAuMDA8L3RyYW5zZmVyQW1vdW50PgoJCQkJCTxmaXNjYWxDb2RlUEE+Nzc3Nzc3Nzc3Nzc8L2Zpc2NhbENvZGVQQT4KCQkJCQk8SUJBTj5JVDE4VTAwMDAwMDAwMDAwMDAwMDAwMDAwMDE8L0lCQU4+CgkJCQkJPHJlbWl0dGFuY2VJbmZvcm1hdGlvbj54eHh4PC9yZW1pdHRhbmNlSW5mb3JtYXRpb24+CgkJCQkJPG1ldGFkYXRhPgoJCQkJCQk8bWFwRW50cnk+CgkJCQkJCQk8a2V5PmNoaWF2ZV8xXzE8L2tleT4KCQkJCQkJCTx2YWx1ZT52YWxvcmVfMV8xPC92YWx1ZT4KCQkJCQkJPC9tYXBFbnRyeT4KCQkJCQkJPG1hcEVudHJ5PgoJCQkJCQkJPGtleT5jaGlhdmVfMV8yPC9rZXk+CgkJCQkJCQk8dmFsdWU+dmFsb3JlXzFfMjwvdmFsdWU+CgkJCQkJCTwvbWFwRW50cnk+CgkJCQkJPC9tZXRhZGF0YT4KCQkJCTwvdHJhbnNmZXI+CgkJCQk8dHJhbnNmZXI+CgkJCQkJPGlkVHJhbnNmZXI+MjwvaWRUcmFuc2Zlcj4KCQkJCQk8dHJhbnNmZXJBbW91bnQ+NDAuMDA8L3RyYW5zZmVyQW1vdW50PgoJCQkJCTxmaXNjYWxDb2RlUEE+Nzc3Nzc3Nzc3Nzg8L2Zpc2NhbENvZGVQQT4KCQkJCQk8SUJBTj5JVDE4VTAwMDAwMDAwMDAwMDAwMDAwMDAwMDI8L0lCQU4+CgkJCQkJPHJlbWl0dGFuY2VJbmZvcm1hdGlvbj54eHh4PC9yZW1pdHRhbmNlSW5mb3JtYXRpb24+CgkJCQkJPG1ldGFkYXRhPgoJCQkJCQk8bWFwRW50cnk+CgkJCQkJCQk8a2V5PmNoaWF2ZV8yXzE8L2tleT4KCQkJCQkJCTx2YWx1ZT52YWxvcmVfMl8xPC92YWx1ZT4KCQkJCQkJPC9tYXBFbnRyeT4KCQkJCQkJPG1hcEVudHJ5PgoJCQkJCQkJPGtleT5jaGlhdmVfMl8yPC9rZXk+CgkJCQkJCQk8dmFsdWU+dmFsb3JlXzJfMjwvdmFsdWU+CgkJCQkJCTwvbWFwRW50cnk+CgkJCQkJPC9tZXRhZGF0YT4KCQkJCTwvdHJhbnNmZXI+CgkJCTwvdHJhbnNmZXJMaXN0PgoJCQk8YmFuY29tYXRwYXlQYXltZW50PgoJCQkJPHRyYW5zYWN0aW9uSWQ+MTExMTExMTEyPC90cmFuc2FjdGlvbklkPgoJCQkJPG91dGNvbWVQYXltZW50R2F0ZXdheT4wPC9vdXRjb21lUGF5bWVudEdhdGV3YXk+CgkJCQk8dG90YWxBbW91bnQ+MTUwLjUwPC90b3RhbEFtb3VudD4KCQkJCTxmZWU+MC41MDwvZmVlPgoJCQkJPHRpbWVzdGFtcE9wZXJhdGlvbj4yMDI0LTA0LTEzVDIxOjE5OjQ1PC90aW1lc3RhbXBPcGVyYXRpb24+CgkJCQk8YXV0aG9yaXphdGlvbkNvZGU+MTExMTExMTExMTExMTExMTExMTExMTA8L2F1dGhvcml6YXRpb25Db2RlPgoJCQk8L2JhbmNvbWF0cGF5UGF5bWVudD4KCQk8L3Bmbjpwc3BOb3RpZnlQYXltZW50UmVxPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4=',
];
$data_resp = [
    ':id'                       => 113,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 15:45:01.197',
    ':tipoevento'               => 'pspNotifyPayment',
    ':sottotipoevento'          => 'RESP',
    ':iddominio'                => '77777777777',
    ':iuv'                      => '01000000000000101',
    ':ccp'                      => 'c0000000000000000000000000000101',
    ':noticenumber'             => '301000000000000101',
    ':creditorreferenceid'      => '01000000000000101',
    ':paymenttoken'             => 'c0000000000000000000000000000101',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000109',
    ':sessionidoriginal'        => '',
    ':uniqueid'                 => 'T000113',
    ':payload'                  => 'PFNPQVAtRU5WOkVudmVsb3BlIHhtbG5zOlNPQVAtRU5WPSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyI+PFNPQVAtRU5WOkhlYWRlci8+PFNPQVAtRU5WOkJvZHk+PG5zMzpwc3BOb3RpZnlQYXltZW50UmVzIHhtbG5zOm5zMz0iaHR0cDovL3BhZ29wYS1hcGkucGFnb3BhLmdvdi5pdC9wc3AvcHNwRm9yTm9kZS54c2QiPjxvdXRjb21lPk9LPC9vdXRjb21lPjwvbnMzOnBzcE5vdGlmeVBheW1lbnRSZXM+PC9TT0FQLUVOVjpCb2R5PjwvU09BUC1FTlY6RW52ZWxvcGU+',
];

Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);




$data_req = [
    ':id'                       => 114,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 15:46:00.197',
    ':tipoevento'               => 'sendPaymentOutcome',
    ':sottotipoevento'          => 'REQ',
    ':iddominio'                => '77777777777',
    ':iuv'                      => '01000000000000101',
    ':ccp'                      => 'c0000000000000000000000000000101',
    ':noticenumber'             => '301000000000000101',
    ':creditorreferenceid'      => '01000000000000101',
    ':paymenttoken'             => 'c0000000000000000000000000000101',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000110',
    ':sessionidoriginal'        => '',
    ':uniqueid'                 => 'T000114',
    ':payload'                  => 'PHNvYXA6RW52ZWxvcGUgeG1sbnM6c29hcD0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPgoJPHNvYXA6Qm9keT4KCQk8bnMyOnNlbmRQYXltZW50T3V0Y29tZVJlcSB4bWxuczpuczI9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6bnMzPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyI+CgkJCTxpZFBTUD5BR0lEXzAxPC9pZFBTUD4KCQkJPGlkQnJva2VyUFNQPjg4ODg4ODg4ODg4PC9pZEJyb2tlclBTUD4KCQkJPGlkQ2hhbm5lbD44ODg4ODg4ODg4OF8wMTwvaWRDaGFubmVsPgoJCQk8cGFzc3dvcmQ+eHh4eHh4eHg8L3Bhc3N3b3JkPgoJCQk8cGF5bWVudFRva2VuPmMwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMTAxPC9wYXltZW50VG9rZW4+CgkJCTxvdXRjb21lPk9LPC9vdXRjb21lPgoJCQk8ZGV0YWlscz4KCQkJCTxwYXltZW50TWV0aG9kPm90aGVyPC9wYXltZW50TWV0aG9kPgoJCQkJPGZlZT4xLjAwPC9mZWU+CgkJCQk8YXBwbGljYXRpb25EYXRlPjIwMjQtMDQtMDI8L2FwcGxpY2F0aW9uRGF0ZT4KCQkJCTx0cmFuc2ZlckRhdGU+MjAyNC0wNC0wMzwvdHJhbnNmZXJEYXRlPgoJCQk8L2RldGFpbHM+CgkJPC9uczI6c2VuZFBheW1lbnRPdXRjb21lUmVxPgoJPC9zb2FwOkJvZHk+Cjwvc29hcDpFbnZlbG9wZT4=',
];
$data_resp = [
    ':id'                       => 115,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 15:46:01.197',
    ':tipoevento'               => 'sendPaymentOutcome',
    ':sottotipoevento'          => 'RESP',
    ':iddominio'                => '77777777777',
    ':iuv'                      => '01000000000000101',
    ':ccp'                      => 'c0000000000000000000000000000101',
    ':noticenumber'             => '301000000000000101',
    ':creditorreferenceid'      => '01000000000000101',
    ':paymenttoken'             => 'c0000000000000000000000000000101',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000110',
    ':sessionidoriginal'        => '',
    ':uniqueid'                 => 'T000115',
    ':payload'                  => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6c2VuZFBheW1lbnRPdXRjb21lUmVzPgoJCQk8b3V0Y29tZT5PSzwvb3V0Y29tZT4KCQk8L25mcDpzZW5kUGF5bWVudE91dGNvbWVSZXM+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg==',
];

Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);





















































$data_req = [
    ':id'                       => 116,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 15:43:00.197',
    ':tipoevento'               => 'activatePaymentNotice',
    ':sottotipoevento'          => 'REQ',
    ':iddominio'                => '77777777777',
    ':iuv'                      => '01000000000000102',
    ':ccp'                      => 'c0000000000000000000000000000102',
    ':noticenumber'             => '301000000000000102',
    ':creditorreferenceid'      => '01000000000000102',
    ':paymenttoken'             => 'c0000000000000000000000000000102',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000116',
    ':sessionidoriginal'        => '',
    ':uniqueid'                 => 'T000116',
    ':payload'                  => 'PHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6bm9kPSJodHRwOi8vcGFnb3BhLWFwaS5wYWdvcGEuZ292Lml0L25vZGUvbm9kZUZvclBzcC54c2QiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIj4KCTxzb2FwZW52OkhlYWRlci8+Cgk8c29hcGVudjpCb2R5PgoJCTxub2Q6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVxPgoJCQk8aWRQU1A+QUdJRF8wMTwvaWRQU1A+CgkJCTxpZEJyb2tlclBTUD44ODg4ODg4ODg4ODwvaWRCcm9rZXJQU1A+CgkJCTxpZENoYW5uZWw+ODg4ODg4ODg4ODhfMDE8L2lkQ2hhbm5lbD4KCQkJPHBhc3N3b3JkPioqKioqPC9wYXNzd29yZD4KCQkJPHFyQ29kZT4KCQkJCTxmaXNjYWxDb2RlPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlPgoJCQkJPG5vdGljZU51bWJlcj4zMDEwMDAwMDAwMDAwMDAxMDI8L25vdGljZU51bWJlcj4KCQkJPC9xckNvZGU+CgkJCTxhbW91bnQ+MC4wMDwvYW1vdW50PgoJCTwvbm9kOmFjdGl2YXRlUGF5bWVudE5vdGljZVJlcT4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+',
];
$data_resp = [
    ':id'                       => 117,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 15:43:01.197',
    ':tipoevento'               => 'activatePaymentNotice',
    ':sottotipoevento'          => 'RESP',
    ':iddominio'                => '77777777777',
    ':iuv'                      => '01000000000000102',
    ':ccp'                      => 'c0000000000000000000000000000102',
    ':noticenumber'             => '301000000000000102',
    ':creditorreferenceid'      => '01000000000000102',
    ':paymenttoken'             => 'c0000000000000000000000000000102',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000116',
    ':sessionidoriginal'        => '',
    ':uniqueid'                 => 'T000117',
    ':payload'                  => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVzPgoJCQk8b3V0Y29tZT5PSzwvb3V0Y29tZT4KCQkJPHRvdGFsQW1vdW50PjE1MC4wMDwvdG90YWxBbW91bnQ+CgkJCTxwYXltZW50RGVzY3JpcHRpb24+eHh4eHh4eDwvcGF5bWVudERlc2NyaXB0aW9uPgoJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCTxjb21wYW55TmFtZT54eHh4eHh4PC9jb21wYW55TmFtZT4KCQkJPHBheW1lbnRUb2tlbj50MDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDEwMjwvcGF5bWVudFRva2VuPgoJCQk8dHJhbnNmZXJMaXN0PgoJCQkJPHRyYW5zZmVyPgoJCQkJCTxpZFRyYW5zZmVyPjE8L2lkVHJhbnNmZXI+CgkJCQkJPHRyYW5zZmVyQW1vdW50PjExMC4wMDwvdHJhbnNmZXJBbW91bnQ+CgkJCQkJPGZpc2NhbENvZGVQQT43Nzc3Nzc3Nzc3NzwvZmlzY2FsQ29kZVBBPgoJCQkJCTxJQkFOPklUMThVMDAwMDAwMDAwMDAwMDAwMDAwMDAwMTwvSUJBTj4KCQkJCQk8cmVtaXR0YW5jZUluZm9ybWF0aW9uPnh4eHg8L3JlbWl0dGFuY2VJbmZvcm1hdGlvbj4KCQkJCQk8bWV0YWRhdGE+CgkJCQkJCTxtYXBFbnRyeT4KCQkJCQkJCTxrZXk+Y2hpYXZlXzFfMTwva2V5PgoJCQkJCQkJPHZhbHVlPnZhbG9yZV8xXzE8L3ZhbHVlPgoJCQkJCQk8L21hcEVudHJ5PgoJCQkJCQk8bWFwRW50cnk+CgkJCQkJCQk8a2V5PmNoaWF2ZV8xXzI8L2tleT4KCQkJCQkJCTx2YWx1ZT52YWxvcmVfMV8yPC92YWx1ZT4KCQkJCQkJPC9tYXBFbnRyeT4KCQkJCQk8L21ldGFkYXRhPgoJCQkJPC90cmFuc2Zlcj4KCQkJCTx0cmFuc2Zlcj4KCQkJCQk8aWRUcmFuc2Zlcj4yPC9pZFRyYW5zZmVyPgoJCQkJCTx0cmFuc2ZlckFtb3VudD40MC4wMDwvdHJhbnNmZXJBbW91bnQ+CgkJCQkJPGZpc2NhbENvZGVQQT43Nzc3Nzc3Nzc3ODwvZmlzY2FsQ29kZVBBPgoJCQkJCTxJQkFOPklUMThVMDAwMDAwMDAwMDAwMDAwMDAwMDAwMjwvSUJBTj4KCQkJCQk8cmVtaXR0YW5jZUluZm9ybWF0aW9uPnh4eHg8L3JlbWl0dGFuY2VJbmZvcm1hdGlvbj4KCQkJCQk8bWV0YWRhdGE+CgkJCQkJCTxtYXBFbnRyeT4KCQkJCQkJCTxrZXk+Y2hpYXZlXzJfMTwva2V5PgoJCQkJCQkJPHZhbHVlPnZhbG9yZV8yXzE8L3ZhbHVlPgoJCQkJCQk8L21hcEVudHJ5PgoJCQkJCQk8bWFwRW50cnk+CgkJCQkJCQk8a2V5PmNoaWF2ZV8yXzI8L2tleT4KCQkJCQkJCTx2YWx1ZT52YWxvcmVfMl8yPC92YWx1ZT4KCQkJCQkJPC9tYXBFbnRyeT4KCQkJCQk8L21ldGFkYXRhPgoJCQkJPC90cmFuc2Zlcj4KCQkJPC90cmFuc2Zlckxpc3Q+CgkJCTxjcmVkaXRvclJlZmVyZW5jZUlkPjAxMDAwMDAwMDAwMDAwMTAyPC9jcmVkaXRvclJlZmVyZW5jZUlkPgoJCTwvbmZwOmFjdGl2YXRlUGF5bWVudE5vdGljZVJlcz4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+',
];
Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);


$data_req = [
    ':id'                       => 118,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 15:44:00.197',
    ':tipoevento'               => 'pspNotifyPayment',
    ':sottotipoevento'          => 'REQ',
    ':iddominio'                => '77777777777',
    ':iuv'                      => '01000000000000102',
    ':ccp'                      => 'c0000000000000000000000000000102',
    ':noticenumber'             => '301000000000000102',
    ':creditorreferenceid'      => '01000000000000102',
    ':paymenttoken'             => 'c0000000000000000000000000000102',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000117',
    ':sessionidoriginal'        => '',
    ':uniqueid'                 => 'T000118',
    ':payload'                  => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpwZm49Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvcHNwL3BzcEZvck5vZGUueHNkIiB4bWxuczpzb2FwZW52PSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyIgeG1sbnM6eHM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hIiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBmbjpwc3BOb3RpZnlQYXltZW50UmVxPgoJCQk8aWRQU1A+QUdJRF8wMTwvaWRQU1A+CgkJCTxpZEJyb2tlclBTUD44ODg4ODg4ODg4ODwvaWRCcm9rZXJQU1A+CgkJCTxpZENoYW5uZWw+ODg4ODg4ODg4ODhfMDE8L2lkQ2hhbm5lbD4KCQkJPHBheW1lbnRUb2tlbj5jMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDEwMjwvcGF5bWVudFRva2VuPgoJCQk8cGF5bWVudERlc2NyaXB0aW9uPnBhZ2FtZW50byBtdWx0aWJlbmVmaWNpYXJpbzwvcGF5bWVudERlc2NyaXB0aW9uPgoJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCTxjb21wYW55TmFtZT54eHh4eHh4PC9jb21wYW55TmFtZT4KCQkJPGNyZWRpdG9yUmVmZXJlbmNlSWQ+MDEwMDAwMDAwMDAwMDAxMDI8L2NyZWRpdG9yUmVmZXJlbmNlSWQ+CgkJCTxkZWJ0QW1vdW50PjE1MC4wMDwvZGVidEFtb3VudD4KCQkJPHRyYW5zZmVyTGlzdD4KCQkJCTx0cmFuc2Zlcj4KCQkJCQk8aWRUcmFuc2Zlcj4xPC9pZFRyYW5zZmVyPgoJCQkJCTx0cmFuc2ZlckFtb3VudD4xMTAuMDA8L3RyYW5zZmVyQW1vdW50PgoJCQkJCTxmaXNjYWxDb2RlUEE+Nzc3Nzc3Nzc3Nzc8L2Zpc2NhbENvZGVQQT4KCQkJCQk8SUJBTj5JVDE4VTAwMDAwMDAwMDAwMDAwMDAwMDAwMDE8L0lCQU4+CgkJCQkJPHJlbWl0dGFuY2VJbmZvcm1hdGlvbj54eHh4PC9yZW1pdHRhbmNlSW5mb3JtYXRpb24+CgkJCQkJPG1ldGFkYXRhPgoJCQkJCQk8bWFwRW50cnk+CgkJCQkJCQk8a2V5PmNoaWF2ZV8xXzE8L2tleT4KCQkJCQkJCTx2YWx1ZT52YWxvcmVfMV8xPC92YWx1ZT4KCQkJCQkJPC9tYXBFbnRyeT4KCQkJCQkJPG1hcEVudHJ5PgoJCQkJCQkJPGtleT5jaGlhdmVfMV8yPC9rZXk+CgkJCQkJCQk8dmFsdWU+dmFsb3JlXzFfMjwvdmFsdWU+CgkJCQkJCTwvbWFwRW50cnk+CgkJCQkJPC9tZXRhZGF0YT4KCQkJCTwvdHJhbnNmZXI+CgkJCQk8dHJhbnNmZXI+CgkJCQkJPGlkVHJhbnNmZXI+MjwvaWRUcmFuc2Zlcj4KCQkJCQk8dHJhbnNmZXJBbW91bnQ+NDAuMDA8L3RyYW5zZmVyQW1vdW50PgoJCQkJCTxmaXNjYWxDb2RlUEE+Nzc3Nzc3Nzc3Nzg8L2Zpc2NhbENvZGVQQT4KCQkJCQk8SUJBTj5JVDE4VTAwMDAwMDAwMDAwMDAwMDAwMDAwMDI8L0lCQU4+CgkJCQkJPHJlbWl0dGFuY2VJbmZvcm1hdGlvbj54eHh4PC9yZW1pdHRhbmNlSW5mb3JtYXRpb24+CgkJCQkJPG1ldGFkYXRhPgoJCQkJCQk8bWFwRW50cnk+CgkJCQkJCQk8a2V5PmNoaWF2ZV8yXzE8L2tleT4KCQkJCQkJCTx2YWx1ZT52YWxvcmVfMl8xPC92YWx1ZT4KCQkJCQkJPC9tYXBFbnRyeT4KCQkJCQkJPG1hcEVudHJ5PgoJCQkJCQkJPGtleT5jaGlhdmVfMl8yPC9rZXk+CgkJCQkJCQk8dmFsdWU+dmFsb3JlXzJfMjwvdmFsdWU+CgkJCQkJCTwvbWFwRW50cnk+CgkJCQkJPC9tZXRhZGF0YT4KCQkJCTwvdHJhbnNmZXI+CgkJCTwvdHJhbnNmZXJMaXN0PgoJCQk8cGF5cGFsUGF5bWVudD4KCQkJCTx0cmFuc2FjdGlvbklkPjExMTExMTExMzwvdHJhbnNhY3Rpb25JZD4KCQkJCTxwc3BUcmFuc2FjdGlvbklkPjExMTExMTExMTExMTEzPC9wc3BUcmFuc2FjdGlvbklkPgoJCQkJPHRvdGFsQW1vdW50PjQ0LjQwPC90b3RhbEFtb3VudD4KCQkJCTxmZWU+MS41MDwvZmVlPgoJCQkJPHRpbWVzdGFtcE9wZXJhdGlvbj4yMDI0LTA0LTEzVDIzOjIwOjIyPC90aW1lc3RhbXBPcGVyYXRpb24+CgkJCTwvcGF5cGFsUGF5bWVudD4KCQk8L3Bmbjpwc3BOb3RpZnlQYXltZW50UmVxPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4=',
];
$data_resp = [
    ':id'                       => 119,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 15:44:01.197',
    ':tipoevento'               => 'pspNotifyPayment',
    ':sottotipoevento'          => 'RESP',
    ':iddominio'                => '77777777777',
    ':iuv'                      => '01000000000000102',
    ':ccp'                      => 'c0000000000000000000000000000102',
    ':noticenumber'             => '301000000000000102',
    ':creditorreferenceid'      => '01000000000000102',
    ':paymenttoken'             => 'c0000000000000000000000000000102',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000117',
    ':sessionidoriginal'        => '',
    ':uniqueid'                 => 'T000119',
    ':payload'                  => 'PFNPQVAtRU5WOkVudmVsb3BlIHhtbG5zOlNPQVAtRU5WPSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyI+PFNPQVAtRU5WOkhlYWRlci8+PFNPQVAtRU5WOkJvZHk+PG5zMzpwc3BOb3RpZnlQYXltZW50UmVzIHhtbG5zOm5zMz0iaHR0cDovL3BhZ29wYS1hcGkucGFnb3BhLmdvdi5pdC9wc3AvcHNwRm9yTm9kZS54c2QiPjxvdXRjb21lPk9LPC9vdXRjb21lPjwvbnMzOnBzcE5vdGlmeVBheW1lbnRSZXM+PC9TT0FQLUVOVjpCb2R5PjwvU09BUC1FTlY6RW52ZWxvcGU+',
];

Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);




$data_req = [
    ':id'                       => 120,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 15:45:00.197',
    ':tipoevento'               => 'pspNotifyPayment',
    ':sottotipoevento'          => 'REQ',
    ':iddominio'                => '77777777777',
    ':iuv'                      => '01000000000000102',
    ':ccp'                      => 'c0000000000000000000000000000102',
    ':noticenumber'             => '301000000000000102',
    ':creditorreferenceid'      => '01000000000000102',
    ':paymenttoken'             => 'c0000000000000000000000000000102',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000118',
    ':sessionidoriginal'        => '',
    ':uniqueid'                 => 'T000120',
    ':payload'                  => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpwZm49Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvcHNwL3BzcEZvck5vZGUueHNkIiB4bWxuczpzb2FwZW52PSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyIgeG1sbnM6eHM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hIiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBmbjpwc3BOb3RpZnlQYXltZW50UmVxPgoJCQk8aWRQU1A+QUdJRF8wMTwvaWRQU1A+CgkJCTxpZEJyb2tlclBTUD44ODg4ODg4ODg4ODwvaWRCcm9rZXJQU1A+CgkJCTxpZENoYW5uZWw+ODg4ODg4ODg4ODhfMDE8L2lkQ2hhbm5lbD4KCQkJPHBheW1lbnRUb2tlbj5jMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDEwMjwvcGF5bWVudFRva2VuPgoJCQk8cGF5bWVudERlc2NyaXB0aW9uPnBhZ2FtZW50byBtdWx0aWJlbmVmaWNpYXJpbzwvcGF5bWVudERlc2NyaXB0aW9uPgoJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCTxjb21wYW55TmFtZT54eHh4eHh4PC9jb21wYW55TmFtZT4KCQkJPGNyZWRpdG9yUmVmZXJlbmNlSWQ+MDEwMDAwMDAwMDAwMDAxMDI8L2NyZWRpdG9yUmVmZXJlbmNlSWQ+CgkJCTxkZWJ0QW1vdW50PjE1MC4wMDwvZGVidEFtb3VudD4KCQkJPHRyYW5zZmVyTGlzdD4KCQkJCTx0cmFuc2Zlcj4KCQkJCQk8aWRUcmFuc2Zlcj4xPC9pZFRyYW5zZmVyPgoJCQkJCTx0cmFuc2ZlckFtb3VudD4xMTAuMDA8L3RyYW5zZmVyQW1vdW50PgoJCQkJCTxmaXNjYWxDb2RlUEE+Nzc3Nzc3Nzc3Nzc8L2Zpc2NhbENvZGVQQT4KCQkJCQk8SUJBTj5JVDE4VTAwMDAwMDAwMDAwMDAwMDAwMDAwMDE8L0lCQU4+CgkJCQkJPHJlbWl0dGFuY2VJbmZvcm1hdGlvbj54eHh4PC9yZW1pdHRhbmNlSW5mb3JtYXRpb24+CgkJCQkJPG1ldGFkYXRhPgoJCQkJCQk8bWFwRW50cnk+CgkJCQkJCQk8a2V5PmNoaWF2ZV8xXzE8L2tleT4KCQkJCQkJCTx2YWx1ZT52YWxvcmVfMV8xPC92YWx1ZT4KCQkJCQkJPC9tYXBFbnRyeT4KCQkJCQkJPG1hcEVudHJ5PgoJCQkJCQkJPGtleT5jaGlhdmVfMV8yPC9rZXk+CgkJCQkJCQk8dmFsdWU+dmFsb3JlXzFfMjwvdmFsdWU+CgkJCQkJCTwvbWFwRW50cnk+CgkJCQkJPC9tZXRhZGF0YT4KCQkJCTwvdHJhbnNmZXI+CgkJCQk8dHJhbnNmZXI+CgkJCQkJPGlkVHJhbnNmZXI+MjwvaWRUcmFuc2Zlcj4KCQkJCQk8dHJhbnNmZXJBbW91bnQ+NDAuMDA8L3RyYW5zZmVyQW1vdW50PgoJCQkJCTxmaXNjYWxDb2RlUEE+Nzc3Nzc3Nzc3Nzg8L2Zpc2NhbENvZGVQQT4KCQkJCQk8SUJBTj5JVDE4VTAwMDAwMDAwMDAwMDAwMDAwMDAwMDI8L0lCQU4+CgkJCQkJPHJlbWl0dGFuY2VJbmZvcm1hdGlvbj54eHh4PC9yZW1pdHRhbmNlSW5mb3JtYXRpb24+CgkJCQkJPG1ldGFkYXRhPgoJCQkJCQk8bWFwRW50cnk+CgkJCQkJCQk8a2V5PmNoaWF2ZV8yXzE8L2tleT4KCQkJCQkJCTx2YWx1ZT52YWxvcmVfMl8xPC92YWx1ZT4KCQkJCQkJPC9tYXBFbnRyeT4KCQkJCQkJPG1hcEVudHJ5PgoJCQkJCQkJPGtleT5jaGlhdmVfMl8yPC9rZXk+CgkJCQkJCQk8dmFsdWU+dmFsb3JlXzJfMjwvdmFsdWU+CgkJCQkJCTwvbWFwRW50cnk+CgkJCQkJPC9tZXRhZGF0YT4KCQkJCTwvdHJhbnNmZXI+CgkJCTwvdHJhbnNmZXJMaXN0PgoJCQk8cGF5cGFsUGF5bWVudD4KCQkJCTx0cmFuc2FjdGlvbklkPjExMTExMTExMzwvdHJhbnNhY3Rpb25JZD4KCQkJCTxwc3BUcmFuc2FjdGlvbklkPjExMTExMTExMTExMTEzPC9wc3BUcmFuc2FjdGlvbklkPgoJCQkJPHRvdGFsQW1vdW50PjQ0LjQwPC90b3RhbEFtb3VudD4KCQkJCTxmZWU+MS41MDwvZmVlPgoJCQkJPHRpbWVzdGFtcE9wZXJhdGlvbj4yMDI0LTA0LTEzVDIzOjIwOjIyPC90aW1lc3RhbXBPcGVyYXRpb24+CgkJCTwvcGF5cGFsUGF5bWVudD4KCQk8L3Bmbjpwc3BOb3RpZnlQYXltZW50UmVxPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4=',
];
$data_resp = [
    ':id'                       => 121,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 15:45:01.197',
    ':tipoevento'               => 'pspNotifyPayment',
    ':sottotipoevento'          => 'RESP',
    ':iddominio'                => '77777777777',
    ':iuv'                      => '01000000000000102',
    ':ccp'                      => 'c0000000000000000000000000000102',
    ':noticenumber'             => '301000000000000102',
    ':creditorreferenceid'      => '01000000000000102',
    ':paymenttoken'             => 'c0000000000000000000000000000102',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000118',
    ':sessionidoriginal'        => '',
    ':uniqueid'                 => 'T000121',
    ':payload'                  => 'PFNPQVAtRU5WOkVudmVsb3BlIHhtbG5zOlNPQVAtRU5WPSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyI+PFNPQVAtRU5WOkhlYWRlci8+PFNPQVAtRU5WOkJvZHk+PG5zMzpwc3BOb3RpZnlQYXltZW50UmVzIHhtbG5zOm5zMz0iaHR0cDovL3BhZ29wYS1hcGkucGFnb3BhLmdvdi5pdC9wc3AvcHNwRm9yTm9kZS54c2QiPjxvdXRjb21lPk9LPC9vdXRjb21lPjwvbnMzOnBzcE5vdGlmeVBheW1lbnRSZXM+PC9TT0FQLUVOVjpCb2R5PjwvU09BUC1FTlY6RW52ZWxvcGU+',
];

Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);




$data_req = [
    ':id'                       => 122,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 15:46:00.197',
    ':tipoevento'               => 'sendPaymentOutcome',
    ':sottotipoevento'          => 'REQ',
    ':iddominio'                => '77777777777',
    ':iuv'                      => '01000000000000102',
    ':ccp'                      => 'c0000000000000000000000000000102',
    ':noticenumber'             => '301000000000000102',
    ':creditorreferenceid'      => '01000000000000102',
    ':paymenttoken'             => 'c0000000000000000000000000000102',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000119',
    ':sessionidoriginal'        => '',
    ':uniqueid'                 => 'T000122',
    ':payload'                  => 'PHNvYXA6RW52ZWxvcGUgeG1sbnM6c29hcD0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPgoJPHNvYXA6Qm9keT4KCQk8bnMyOnNlbmRQYXltZW50T3V0Y29tZVJlcSB4bWxuczpuczI9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6bnMzPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyI+CgkJCTxpZFBTUD5BR0lEXzAxPC9pZFBTUD4KCQkJPGlkQnJva2VyUFNQPjg4ODg4ODg4ODg4PC9pZEJyb2tlclBTUD4KCQkJPGlkQ2hhbm5lbD44ODg4ODg4ODg4OF8wMTwvaWRDaGFubmVsPgoJCQk8cGFzc3dvcmQ+eHh4eHh4eHg8L3Bhc3N3b3JkPgoJCQk8cGF5bWVudFRva2VuPmMwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMTAxPC9wYXltZW50VG9rZW4+CgkJCTxvdXRjb21lPk9LPC9vdXRjb21lPgoJCQk8ZGV0YWlscz4KCQkJCTxwYXltZW50TWV0aG9kPm90aGVyPC9wYXltZW50TWV0aG9kPgoJCQkJPGZlZT4xLjAwPC9mZWU+CgkJCQk8YXBwbGljYXRpb25EYXRlPjIwMjQtMDQtMDI8L2FwcGxpY2F0aW9uRGF0ZT4KCQkJCTx0cmFuc2ZlckRhdGU+MjAyNC0wNC0wMzwvdHJhbnNmZXJEYXRlPgoJCQk8L2RldGFpbHM+CgkJPC9uczI6c2VuZFBheW1lbnRPdXRjb21lUmVxPgoJPC9zb2FwOkJvZHk+Cjwvc29hcDpFbnZlbG9wZT4=',
];
$data_resp = [
    ':id'                       => 123,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 15:46:01.197',
    ':tipoevento'               => 'sendPaymentOutcome',
    ':sottotipoevento'          => 'RESP',
    ':iddominio'                => '77777777777',
    ':iuv'                      => '',
    ':ccp'                      => 'c0000000000000000000000000000102',
    ':noticenumber'             => '301000000000000102',
    ':creditorreferenceid'      => '01000000000000102',
    ':paymenttoken'             => 'c0000000000000000000000000000102',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_000119',
    ':sessionidoriginal'        => '',
    ':uniqueid'                 => 'T000123',
    ':payload'                  => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6c2VuZFBheW1lbnRPdXRjb21lUmVzPgoJCQk8b3V0Y29tZT5PSzwvb3V0Y29tZT4KCQk8L25mcDpzZW5kUGF5bWVudE91dGNvbWVSZXM+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg==',
];

Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);


$data_req = [
    ':id' => 130,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 08:30:00.197',
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
    ':sessionid' => '',
    ':sessionidoriginal' => 'session_id_original_000101',
    ':uniqueid' => 'T000130',
    ':payload' => 'PFNPQVAtRU5WOkVudmVsb3BlIHhtbG5zOlNPQVAtRU5WPSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyIgeG1sbnM6cHB0PSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOndzPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyI+CiAgICA8U09BUC1FTlY6SGVhZGVyPgogICAgICAgIDxwcHQ6aW50ZXN0YXppb25lQ2FycmVsbG9QUFQ+CiAgICAgICAgICAgIDxpZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QQT43Nzc3Nzc3Nzc3NzwvaWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUEE+CiAgICAgICAgICAgIDxpZGVudGlmaWNhdGl2b1N0YXppb25lSW50ZXJtZWRpYXJpb1BBPjc3Nzc3Nzc3Nzc3XzAxPC9pZGVudGlmaWNhdGl2b1N0YXppb25lSW50ZXJtZWRpYXJpb1BBPgogICAgICAgICAgICA8aWRlbnRpZmljYXRpdm9DYXJyZWxsbz5jMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDExMDwvaWRlbnRpZmljYXRpdm9DYXJyZWxsbz4KICAgICAgICA8L3BwdDppbnRlc3RhemlvbmVDYXJyZWxsb1BQVD4KICAgIDwvU09BUC1FTlY6SGVhZGVyPgogICAgPFNPQVAtRU5WOkJvZHk+CiAgICAgICAgPG5zMzpub2RvSW52aWFDYXJyZWxsb1JQVCB4bWxuczpuczM9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIj4KICAgICAgICAgICAgPHBhc3N3b3JkPlBMQUNFSE9MREVSPC9wYXNzd29yZD4KICAgICAgICAgICAgPGlkZW50aWZpY2F0aXZvUFNQPkFHSURfMDE8L2lkZW50aWZpY2F0aXZvUFNQPgogICAgICAgICAgICA8aWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUFNQPjg4ODg4ODg4ODg4PC9pZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QU1A+CiAgICAgICAgICAgIDxpZGVudGlmaWNhdGl2b0NhbmFsZT44ODg4ODg4ODg4OF8wMTwvaWRlbnRpZmljYXRpdm9DYW5hbGU+CiAgICAgICAgICAgIDxsaXN0YVJQVD4KICAgICAgICAgICAgICAgIDxlbGVtZW50b0xpc3RhUlBUPgogICAgICAgICAgICAgICAgICAgIDxpZGVudGlmaWNhdGl2b0RvbWluaW8+Nzc3Nzc3Nzc3Nzc8L2lkZW50aWZpY2F0aXZvRG9taW5pbz4KICAgICAgICAgICAgICAgICAgICA8aWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4wMTAwMDAwMDAwMDAwMDExMDwvaWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4KICAgICAgICAgICAgICAgICAgICA8Y29kaWNlQ29udGVzdG9QYWdhbWVudG8+dDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxMTA8L2NvZGljZUNvbnRlc3RvUGFnYW1lbnRvPgogICAgICAgICAgICAgICAgICAgIDxycHQ+UEZKUVZDQjRiV3h1Y3owaWFIUjBjRG92TDNkM2R5NWthV2RwZEhCaExtZHZkaTVwZEM5elkyaGxiV0Z6THpJd01URXZVR0ZuWVcxbGJuUnBMeUkrQ2drOGRtVnljMmx2Ym1WUFoyZGxkSFJ2UGpFdU1Ed3ZkbVZ5YzJsdmJtVlBaMmRsZEhSdlBnb0pQR1J2YldsdWFXOCtDZ2tKUEdsa1pXNTBhV1pwWTJGMGFYWnZSRzl0YVc1cGJ6NDNOemMzTnpjM056YzNOend2YVdSbGJuUnBabWxqWVhScGRtOUViMjFwYm1sdlBnb0pQQzlrYjIxcGJtbHZQZ29KUEdsa1pXNTBhV1pwWTJGMGFYWnZUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQakl3TWpNeE1qRTFNREV3TVRVek9XRmlZbUV6TXpVdFlXSTBaUzAwWkRFNExXRXpQQzlwWkdWdWRHbG1hV05oZEdsMmIwMWxjM05oWjJkcGIxSnBZMmhwWlhOMFlUNEtDVHhrWVhSaFQzSmhUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQakl3TWpNdE1USXRNVFZVTVRNNk1ERTZOVE11TmpFNUt6QXhPakF3UEM5a1lYUmhUM0poVFdWemMyRm5aMmx2VW1samFHbGxjM1JoUGdvSlBHRjFkR1Z1ZEdsallYcHBiMjVsVTI5bloyVjBkRzgrVGk5QlBDOWhkWFJsYm5ScFkyRjZhVzl1WlZOdloyZGxkSFJ2UGdvSlBITnZaMmRsZEhSdlZtVnljMkZ1ZEdVK0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFabGNuTmhiblJsUGdvSkNRazhkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NUhQQzkwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1FrOFkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBqYzNOemMzTnpjM056YzNQQzlqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSlBDOXBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlXWlhKellXNTBaVDRLQ1FrOFlXNWhaM0poWm1sallWWmxjbk5oYm5SbFBuaDRlSGg0ZUhoNGVEd3ZZVzVoWjNKaFptbGpZVlpsY25OaGJuUmxQZ29KUEM5emIyZG5aWFIwYjFabGNuTmhiblJsUGdvSlBITnZaMmRsZEhSdlVHRm5ZWFJ2Y21VK0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFCaFoyRjBiM0psUGdvSkNRazhkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NUhQQzkwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1FrOFkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBqYzNOemMzTnpjM056YzNQQzlqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSlBDOXBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlRWVdkaGRHOXlaVDRLQ1FrOFlXNWhaM0poWm1sallWQmhaMkYwYjNKbFBuaDRlSGg0ZUhoNGVEd3ZZVzVoWjNKaFptbGpZVkJoWjJGMGIzSmxQZ29KUEM5emIyZG5aWFIwYjFCaFoyRjBiM0psUGdvSlBHVnVkR1ZDWlc1bFptbGphV0Z5YVc4K0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjBKbGJtVm1hV05wWVhKcGJ6NEtDUWtKUEhScGNHOUpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrUnp3dmRHbHdiMGxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno0S0NRa0pQR052WkdsalpVbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejQzTnpjM056YzNOemMzTnp3dlkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBnb0pDVHd2YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlFtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4a1pXNXZiV2x1WVhwcGIyNWxRbVZ1WldacFkybGhjbWx2UG5oNGVIaDRlSGc4TDJSbGJtOXRhVzVoZW1sdmJtVkNaVzVsWm1samFXRnlhVzgrQ2drSlBHTnZaR2xqWlZWdWFYUlBjR1Z5UW1WdVpXWnBZMmxoY21sdlBuaDRQQzlqYjJScFkyVlZibWwwVDNCbGNrSmxibVZtYVdOcFlYSnBiejRLQ1FrOFpHVnViMjFWYm1sMFQzQmxja0psYm1WbWFXTnBZWEpwYno1NGVIaDRlSGc4TDJSbGJtOXRWVzVwZEU5d1pYSkNaVzVsWm1samFXRnlhVzgrQ2drSlBHbHVaR2x5YVhwNmIwSmxibVZtYVdOcFlYSnBiejU0ZUhoNFBDOXBibVJwY21sNmVtOUNaVzVsWm1samFXRnlhVzgrQ2drSlBHTnBkbWxqYjBKbGJtVm1hV05wWVhKcGJ6NTRlSGc4TDJOcGRtbGpiMEpsYm1WbWFXTnBZWEpwYno0S0NRazhZMkZ3UW1WdVpXWnBZMmxoY21sdlBuaDRlSGg0UEM5allYQkNaVzVsWm1samFXRnlhVzgrQ2drSlBHeHZZMkZzYVhSaFFtVnVaV1pwWTJsaGNtbHZQbmg0ZUhnOEwyeHZZMkZzYVhSaFFtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4d2NtOTJhVzVqYVdGQ1pXNWxabWxqYVdGeWFXOCtlSGc4TDNCeWIzWnBibU5wWVVKbGJtVm1hV05wWVhKcGJ6NEtDUWs4Ym1GNmFXOXVaVUpsYm1WbWFXTnBZWEpwYno1NGVEd3ZibUY2YVc5dVpVSmxibVZtYVdOcFlYSnBiejRLQ1R3dlpXNTBaVUpsYm1WbWFXTnBZWEpwYno0S0NUeGtZWFJwVm1WeWMyRnRaVzUwYno0S0NRazhaR0YwWVVWelpXTjFlbWx2Ym1WUVlXZGhiV1Z1ZEc4K01qQXlNeTB4TWkweE5Tc3dNVG93TUR3dlpHRjBZVVZ6WldOMWVtbHZibVZRWVdkaGJXVnVkRzgrQ2drSlBHbHRjRzl5ZEc5VWIzUmhiR1ZFWVZabGNuTmhjbVUrTmpBd0xqQXdQQzlwYlhCdmNuUnZWRzkwWVd4bFJHRldaWEp6WVhKbFBnb0pDVHgwYVhCdlZtVnljMkZ0Wlc1MGJ6NUNRbFE4TDNScGNHOVdaWEp6WVcxbGJuUnZQZ29KQ1R4cFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOVdaWEp6WVcxbGJuUnZQakF4TURBd01EQXdNREF3TURBd01URXdQQzlwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5V1pYSnpZVzFsYm5SdlBnb0pDVHhqYjJScFkyVkRiMjUwWlhOMGIxQmhaMkZ0Wlc1MGJ6NTBNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREV4TUR3dlkyOWthV05sUTI5dWRHVnpkRzlRWVdkaGJXVnVkRzgrQ2drSlBHWnBjbTFoVW1salpYWjFkR0UrTUR3dlptbHliV0ZTYVdObGRuVjBZVDRLQ1FrOFpHRjBhVk5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KQ1FrOGFXMXdiM0owYjFOcGJtZHZiRzlXWlhKellXMWxiblJ2UGpJd01DNHdNRHd2YVcxd2IzSjBiMU5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KQ1FrOGFXSmhia0ZqWTNKbFpHbDBiejVKVkRFNFZUQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNVEE4TDJsaVlXNUJZMk55WldScGRHOCtDZ2tKQ1R4allYVnpZV3hsVm1WeWMyRnRaVzUwYno1NGVIaDRlSGg0UEM5allYVnpZV3hsVm1WeWMyRnRaVzUwYno0S0NRa0pQR1JoZEdsVGNHVmphV1pwWTJsU2FYTmpiM056YVc5dVpUNTRlSGg0ZUhoNFBDOWtZWFJwVTNCbFkybG1hV05wVW1selkyOXpjMmx2Ym1VK0Nna0pQQzlrWVhScFUybHVaMjlzYjFabGNuTmhiV1Z1ZEc4K0Nna0pQR1JoZEdsVGFXNW5iMnh2Vm1WeWMyRnRaVzUwYno0S0NRa0pQR2x0Y0c5eWRHOVRhVzVuYjJ4dlZtVnljMkZ0Wlc1MGJ6NHpNREF1TURBOEwybHRjRzl5ZEc5VGFXNW5iMnh2Vm1WeWMyRnRaVzUwYno0S0NRa0pQR2xpWVc1QlkyTnlaV1JwZEc4K1NWUXhPRlV3TURBd01EQXdNREF3TURBd01EQXdNREF3TURFeFBDOXBZbUZ1UVdOamNtVmthWFJ2UGdvSkNRazhZMkYxYzJGc1pWWmxjbk5oYldWdWRHOCtlSGg0ZUhoNGVEd3ZZMkYxYzJGc1pWWmxjbk5oYldWdWRHOCtDZ2tKQ1R4a1lYUnBVM0JsWTJsbWFXTnBVbWx6WTI5emMybHZibVUrZUhoNGVIaDRlRHd2WkdGMGFWTndaV05wWm1samFWSnBjMk52YzNOcGIyNWxQZ29KQ1R3dlpHRjBhVk5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KQ1R4a1lYUnBVMmx1WjI5c2IxWmxjbk5oYldWdWRHOCtDZ2tKQ1R4cGJYQnZjblJ2VTJsdVoyOXNiMVpsY25OaGJXVnVkRzgrTVRBd0xqQXdQQzlwYlhCdmNuUnZVMmx1WjI5c2IxWmxjbk5oYldWdWRHOCtDZ2tKQ1R4cFltRnVRV05qY21Wa2FYUnZQa2xVTVRoVk1EQXdNREF3TURBd01EQXdNREF3TURBd01EQXhNand2YVdKaGJrRmpZM0psWkdsMGJ6NEtDUWtKUEdOaGRYTmhiR1ZXWlhKellXMWxiblJ2UG5oNGVIaDRlSGc4TDJOaGRYTmhiR1ZXWlhKellXMWxiblJ2UGdvSkNRazhaR0YwYVZOd1pXTnBabWxqYVZKcGMyTnZjM05wYjI1bFBuaDRlSGg0ZUhnOEwyUmhkR2xUY0dWamFXWnBZMmxTYVhOamIzTnphVzl1WlQ0S0NRazhMMlJoZEdsVGFXNW5iMnh2Vm1WeWMyRnRaVzUwYno0S0NUd3ZaR0YwYVZabGNuTmhiV1Z1ZEc4K0Nqd3ZVbEJVUGc9PTwvcnB0PgogICAgICAgICAgICAgICAgPC9lbGVtZW50b0xpc3RhUlBUPgogICAgICAgICAgICA8L2xpc3RhUlBUPgogICAgICAgICAgICA8bXVsdGlCZW5lZmljaWFyaW8+ZmFsc2U8L211bHRpQmVuZWZpY2lhcmlvPgogICAgICAgIDwvbnMzOm5vZG9JbnZpYUNhcnJlbGxvUlBUPgogICAgPC9TT0FQLUVOVjpCb2R5Pgo8L1NPQVAtRU5WOkVudmVsb3BlPg==',
];

$data_resp = [
    ':id' => 131,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 08:30:01.197',
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
    ':sessionid' => '',
    ':sessionidoriginal' => 'session_id_original_000101',
    ':uniqueid' => 'T000131',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpwcHQ9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIiB4bWxuczpwcHRoZWFkPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIiB4bWxuczp0bnM9Imh0dHA6Ly9Ob2RvUGFnYW1lbnRpU1BDLnNwY29vcC5nb3YuaXQvc2Vydml6aS9QYWdhbWVudGlUZWxlbWF0aWNpUlBUIiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBwdDpub2RvSW52aWFDYXJyZWxsb1JQVFJpc3Bvc3RhPgoJCQk8ZXNpdG9Db21wbGVzc2l2b09wZXJhemlvbmU+T0s8L2VzaXRvQ29tcGxlc3Npdm9PcGVyYXppb25lPgoJCQk8dXJsPmh0dHBzOi8vd2lzcDIucGFnb3BhLmdvdi5pdC93YWxsZXQvd2VsY29tZT9pZFNlc3Npb249NjA2N2FiMGItMGIxNi00NDVhLThlN2MtZGVkZGQ3Y2IxYzZiPC91cmw+CgkJPC9wcHQ6bm9kb0ludmlhQ2FycmVsbG9SUFRSaXNwb3N0YT4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+',
];


Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);


$data_req = [
    ':id' => 132,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 08:35:00.197',
    ':tipoevento' => 'nodoInviaRT',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000110',
    ':ccp' => 't0000000000000000000000000000110',
    ':noticenumber' => '',
    ':creditorreferenceid' => '',
    ':paymenttoken' => '',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_001020',
    ':sessionidoriginal' => 'session_id_original_000101',
    ':uniqueid' => 'T000132',
    ':payload' => 'PHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPgoJPHNvYXBlbnY6Qm9keT4KCQk8bnMxOm5vZG9JbnZpYVJUIHhtbG5zOm5zMT0iaHR0cDovL3dzLnBhZ2FtZW50aS50ZWxlbWF0aWNpLmdvdi8iPgoJCQk8aWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUFNQPjg4ODg4ODg4ODg4PC9pZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QU1A+CgkJCTxpZGVudGlmaWNhdGl2b0NhbmFsZT44ODg4ODg4ODg4OF8wMTwvaWRlbnRpZmljYXRpdm9DYW5hbGU+CgkJCTxwYXNzd29yZD5QTEFDRUhPTERFUjwvcGFzc3dvcmQ+CgkJCTxpZGVudGlmaWNhdGl2b1BTUD5BR0lEXzAxPC9pZGVudGlmaWNhdGl2b1BTUD4KCQkJPGlkZW50aWZpY2F0aXZvRG9taW5pbz43Nzc3Nzc3Nzc3NzwvaWRlbnRpZmljYXRpdm9Eb21pbmlvPgoJCQk8aWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4wMTAwMDAwMDAwMDAwMDExMDwvaWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4KCQkJPGNvZGljZUNvbnRlc3RvUGFnYW1lbnRvPnQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMTEwPC9jb2RpY2VDb250ZXN0b1BhZ2FtZW50bz4KCQkJPHRpcG9GaXJtYS8+CgkJCTxydD5QRDk0Yld3Z2RtVnljMmx2YmowaU1TNHdJaUJsYm1OdlpHbHVaejBpVlZSR0xUZ2lQejRLUEhCaGVWOXBPbEpVSUhodGJHNXpPbkJoZVY5cFBTSm9kSFJ3T2k4dmQzZDNMbVJwWjJsMGNHRXVaMjkyTG1sMEwzTmphR1Z0WVhNdk1qQXhNUzlRWVdkaGJXVnVkR2t2SWlCNGJXeHVjenA0YzJrOUltaDBkSEE2THk5M2QzY3Vkek11YjNKbkx6SXdNREV2V0UxTVUyTm9aVzFoTFdsdWMzUmhibU5sSWlCNGMyazZjMk5vWlcxaFRHOWpZWFJwYjI0OUlpOXZjSFF2Y0hOd1lYaGxjSFJoTDNKbGMyOTFjbU5sY3k5UVlXZEpibVpmVWxCVVgxSlVYelpmTWw4d0xuaHpaQ0krQ2drOGNHRjVYMms2ZG1WeWMybHZibVZQWjJkbGRIUnZQall1TWp3dmNHRjVYMms2ZG1WeWMybHZibVZQWjJkbGRIUnZQZ29KUEhCaGVWOXBPbVJ2YldsdWFXOCtDZ2tKUEhCaGVWOXBPbWxrWlc1MGFXWnBZMkYwYVhadlJHOXRhVzVwYno0M056YzNOemMzTnpjM056d3ZjR0Y1WDJrNmFXUmxiblJwWm1sallYUnBkbTlFYjIxcGJtbHZQZ29KUEM5d1lYbGZhVHBrYjIxcGJtbHZQZ29KUEhCaGVWOXBPbWxrWlc1MGFXWnBZMkYwYVhadlRXVnpjMkZuWjJsdlVtbGpaWFoxZEdFK1lXUnpZWEl6TkdWa1pXUnpaSE5oUEM5d1lYbGZhVHBwWkdWdWRHbG1hV05oZEdsMmIwMWxjM05oWjJkcGIxSnBZMlYyZFhSaFBnb0pQSEJoZVY5cE9tUmhkR0ZQY21GTlpYTnpZV2RuYVc5U2FXTmxkblYwWVQ0eU1ESTBMVEEwTFRFMlZESXpPalExT2pBMlBDOXdZWGxmYVRwa1lYUmhUM0poVFdWemMyRm5aMmx2VW1salpYWjFkR0UrQ2drOGNHRjVYMms2Y21sbVpYSnBiV1Z1ZEc5TlpYTnpZV2RuYVc5U2FXTm9hV1Z6ZEdFK2MyUnpaR0U4TDNCaGVWOXBPbkpwWm1WeWFXMWxiblJ2VFdWemMyRm5aMmx2VW1samFHbGxjM1JoUGdvSlBIQmhlVjlwT25KcFptVnlhVzFsYm5SdlJHRjBZVkpwWTJocFpYTjBZVDR5TURJMExUQTBMVEUyUEM5d1lYbGZhVHB5YVdabGNtbHRaVzUwYjBSaGRHRlNhV05vYVdWemRHRStDZ2s4Y0dGNVgyazZhWE4wYVhSMWRHOUJkSFJsYzNSaGJuUmxQZ29KQ1R4d1lYbGZhVHBwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5QmRIUmxjM1JoYm5SbFBnb0pDUWs4Y0dGNVgyazZkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NUNQQzl3WVhsZmFUcDBhWEJ2U1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBnb0pDUWs4Y0dGNVgyazZZMjlrYVdObFNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQa0ZIU1VSZk1ERThMM0JoZVY5cE9tTnZaR2xqWlVsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NEtDUWs4TDNCaGVWOXBPbWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjBGMGRHVnpkR0Z1ZEdVK0Nna0pQSEJoZVY5cE9tUmxibTl0YVc1aGVtbHZibVZCZEhSbGMzUmhiblJsUG5oNGVIaDRlSGg0UEM5d1lYbGZhVHBrWlc1dmJXbHVZWHBwYjI1bFFYUjBaWE4wWVc1MFpUNEtDVHd2Y0dGNVgyazZhWE4wYVhSMWRHOUJkSFJsYzNSaGJuUmxQZ29KUEhCaGVWOXBPbVZ1ZEdWQ1pXNWxabWxqYVdGeWFXOCtDZ2tKUEhCaGVWOXBPbWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjBKbGJtVm1hV05wWVhKcGJ6NEtDUWtKUEhCaGVWOXBPblJwY0c5SlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtSend2Y0dGNVgyazZkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NEtDUWtKUEhCaGVWOXBPbU52WkdsalpVbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejQzTnpjM056YzNOemMzTnp3dmNHRjVYMms2WTI5a2FXTmxTV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52UGdvSkNUd3ZjR0Y1WDJrNmFXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZRbVZ1WldacFkybGhjbWx2UGdvSkNUeHdZWGxmYVRwa1pXNXZiV2x1WVhwcGIyNWxRbVZ1WldacFkybGhjbWx2UG5oNGVIZzhMM0JoZVY5cE9tUmxibTl0YVc1aGVtbHZibVZDWlc1bFptbGphV0Z5YVc4K0NnazhMM0JoZVY5cE9tVnVkR1ZDWlc1bFptbGphV0Z5YVc4K0NnazhjR0Y1WDJrNmMyOW5aMlYwZEc5V1pYSnpZVzUwWlQ0S0NRazhjR0Y1WDJrNmFXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZWbVZ5YzJGdWRHVStDZ2tKQ1R4d1lYbGZhVHAwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQa1k4TDNCaGVWOXBPblJwY0c5SlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtDZ2tKQ1R4d1lYbGZhVHBqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrZUhoNGVIaDRQQzl3WVhsZmFUcGpiMlJwWTJWSlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtDZ2tKUEM5d1lYbGZhVHBwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5V1pYSnpZVzUwWlQ0S0NRazhjR0Y1WDJrNllXNWhaM0poWm1sallWWmxjbk5oYm5SbFBuaDRlSGg0UEM5d1lYbGZhVHBoYm1GbmNtRm1hV05oVm1WeWMyRnVkR1UrQ2drOEwzQmhlVjlwT25OdloyZGxkSFJ2Vm1WeWMyRnVkR1UrQ2drOGNHRjVYMms2YzI5bloyVjBkRzlRWVdkaGRHOXlaVDRLQ1FrOGNHRjVYMms2YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlVHRm5ZWFJ2Y21VK0Nna0pDVHh3WVhsZmFUcDBhWEJ2U1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBrWThMM0JoZVY5cE9uUnBjRzlKWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI4K0Nna0pDVHh3WVhsZmFUcGpiMlJwWTJWSlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtlSGg0ZUhnOEwzQmhlVjlwT21OdlpHbGpaVWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno0S0NRazhMM0JoZVY5cE9tbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiMUJoWjJGMGIzSmxQZ29KQ1R4d1lYbGZhVHBoYm1GbmNtRm1hV05oVUdGbllYUnZjbVUrZUhoNGVIaDRQQzl3WVhsZmFUcGhibUZuY21GbWFXTmhVR0ZuWVhSdmNtVStDZ2s4TDNCaGVWOXBPbk52WjJkbGRIUnZVR0ZuWVhSdmNtVStDZ2s4Y0dGNVgyazZaR0YwYVZCaFoyRnRaVzUwYno0S0NRazhjR0Y1WDJrNlkyOWthV05sUlhOcGRHOVFZV2RoYldWdWRHOCtNRHd2Y0dGNVgyazZZMjlrYVdObFJYTnBkRzlRWVdkaGJXVnVkRzgrQ2drSlBIQmhlVjlwT21sdGNHOXlkRzlVYjNSaGJHVlFZV2RoZEc4K05qQXdMakF3UEM5d1lYbGZhVHBwYlhCdmNuUnZWRzkwWVd4bFVHRm5ZWFJ2UGdvSkNUeHdZWGxmYVRwcFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOVdaWEp6WVcxbGJuUnZQakF4TURBd01EQXdNREF3TURBd01URXdQQzl3WVhsZmFUcHBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlXWlhKellXMWxiblJ2UGdvSkNUeHdZWGxmYVRwRGIyUnBZMlZEYjI1MFpYTjBiMUJoWjJGdFpXNTBiejUwTURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURFeE1Ed3ZjR0Y1WDJrNlEyOWthV05sUTI5dWRHVnpkRzlRWVdkaGJXVnVkRzgrQ2drSlBIQmhlVjlwT21SaGRHbFRhVzVuYjJ4dlVHRm5ZVzFsYm5SdlBnb0pDUWs4Y0dGNVgyazZjMmx1WjI5c2IwbHRjRzl5ZEc5UVlXZGhkRzgrTWpBd0xqQXdQQzl3WVhsZmFUcHphVzVuYjJ4dlNXMXdiM0owYjFCaFoyRjBiejRLQ1FrSlBIQmhlVjlwT21WemFYUnZVMmx1WjI5c2IxQmhaMkZ0Wlc1MGJ6NVFRVWRCVkVFOEwzQmhlVjlwT21WemFYUnZVMmx1WjI5c2IxQmhaMkZ0Wlc1MGJ6NEtDUWtKUEhCaGVWOXBPbVJoZEdGRmMybDBiMU5wYm1kdmJHOVFZV2RoYldWdWRHOCtNakF5TkMwd05DMHhOand2Y0dGNVgyazZaR0YwWVVWemFYUnZVMmx1WjI5c2IxQmhaMkZ0Wlc1MGJ6NEtDUWtKUEhCaGVWOXBPbWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFKcGMyTnZjM05wYjI1bFBqQXdNVHd2Y0dGNVgyazZhV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52VW1selkyOXpjMmx2Ym1VK0Nna0pDVHh3WVhsZmFUcGpZWFZ6WVd4bFZtVnljMkZ0Wlc1MGJ6NTRlSGg0ZUhoNFBDOXdZWGxmYVRwallYVnpZV3hsVm1WeWMyRnRaVzUwYno0S0NRa0pQSEJoZVY5cE9tUmhkR2xUY0dWamFXWnBZMmxTYVhOamIzTnphVzl1WlQ1NGVIaDRlSGc4TDNCaGVWOXBPbVJoZEdsVGNHVmphV1pwWTJsU2FYTmpiM056YVc5dVpUNEtDUWs4TDNCaGVWOXBPbVJoZEdsVGFXNW5iMnh2VUdGbllXMWxiblJ2UGdvSkNUeHdZWGxmYVRwa1lYUnBVMmx1WjI5c2IxQmhaMkZ0Wlc1MGJ6NEtDUWtKUEhCaGVWOXBPbk5wYm1kdmJHOUpiWEJ2Y25SdlVHRm5ZWFJ2UGpNd01DNHdNRHd2Y0dGNVgyazZjMmx1WjI5c2IwbHRjRzl5ZEc5UVlXZGhkRzgrQ2drSkNUeHdZWGxmYVRwbGMybDBiMU5wYm1kdmJHOVFZV2RoYldWdWRHOCtVRUZIUVZSQlBDOXdZWGxmYVRwbGMybDBiMU5wYm1kdmJHOVFZV2RoYldWdWRHOCtDZ2tKQ1R4d1lYbGZhVHBrWVhSaFJYTnBkRzlUYVc1bmIyeHZVR0ZuWVcxbGJuUnZQakl3TWpRdE1EUXRNVFk4TDNCaGVWOXBPbVJoZEdGRmMybDBiMU5wYm1kdmJHOVFZV2RoYldWdWRHOCtDZ2tKQ1R4d1lYbGZhVHBwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5U2FYTmpiM056YVc5dVpUNHdNREk4TDNCaGVWOXBPbWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFKcGMyTnZjM05wYjI1bFBnb0pDUWs4Y0dGNVgyazZZMkYxYzJGc1pWWmxjbk5oYldWdWRHOCtlSGg0ZUhoNGVEd3ZjR0Y1WDJrNlkyRjFjMkZzWlZabGNuTmhiV1Z1ZEc4K0Nna0pDVHh3WVhsZmFUcGtZWFJwVTNCbFkybG1hV05wVW1selkyOXpjMmx2Ym1VK2VIaDRlSGg0UEM5d1lYbGZhVHBrWVhScFUzQmxZMmxtYVdOcFVtbHpZMjl6YzJsdmJtVStDZ2tKUEM5d1lYbGZhVHBrWVhScFUybHVaMjlzYjFCaFoyRnRaVzUwYno0S0NRazhjR0Y1WDJrNlpHRjBhVk5wYm1kdmJHOVFZV2RoYldWdWRHOCtDZ2tKQ1R4d1lYbGZhVHB6YVc1bmIyeHZTVzF3YjNKMGIxQmhaMkYwYno0eE1EQXVNREE4TDNCaGVWOXBPbk5wYm1kdmJHOUpiWEJ2Y25SdlVHRm5ZWFJ2UGdvSkNRazhjR0Y1WDJrNlpYTnBkRzlUYVc1bmIyeHZVR0ZuWVcxbGJuUnZQbEJCUjBGVVFUd3ZjR0Y1WDJrNlpYTnBkRzlUYVc1bmIyeHZVR0ZuWVcxbGJuUnZQZ29KQ1FrOGNHRjVYMms2WkdGMFlVVnphWFJ2VTJsdVoyOXNiMUJoWjJGdFpXNTBiejR5TURJMExUQTBMVEUyUEM5d1lYbGZhVHBrWVhSaFJYTnBkRzlUYVc1bmIyeHZVR0ZuWVcxbGJuUnZQZ29KQ1FrOGNHRjVYMms2YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlVtbHpZMjl6YzJsdmJtVStNREF6UEM5d1lYbGZhVHBwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5U2FYTmpiM056YVc5dVpUNEtDUWtKUEhCaGVWOXBPbU5oZFhOaGJHVldaWEp6WVcxbGJuUnZQbmg0ZUhoNGVIZzhMM0JoZVY5cE9tTmhkWE5oYkdWV1pYSnpZVzFsYm5SdlBnb0pDUWs4Y0dGNVgyazZaR0YwYVZOd1pXTnBabWxqYVZKcGMyTnZjM05wYjI1bFBuaDRlSGg0ZUR3dmNHRjVYMms2WkdGMGFWTndaV05wWm1samFWSnBjMk52YzNOcGIyNWxQZ29KQ1R3dmNHRjVYMms2WkdGMGFWTnBibWR2Ykc5UVlXZGhiV1Z1ZEc4K0NnazhMM0JoZVY5cE9tUmhkR2xRWVdkaGJXVnVkRzgrQ2p3dmNHRjVYMms2VWxRKzwvcnQ+CgkJPC9uczE6bm9kb0ludmlhUlQ+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg==',
];

$data_resp = [
    ':id' => 133,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 08:35:01.197',
    ':tipoevento' => 'nodoInviaRT',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000110',
    ':ccp' => 't0000000000000000000000000000110',
    ':noticenumber' => '',
    ':creditorreferenceid' => '',
    ':paymenttoken' => '',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_001020',
    ':sessionidoriginal' => 'session_id_original_000101',
    ':uniqueid' => 'T000133',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpiYz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0L0JhckNvZGVfR1MxXzEyOF9Nb2RpZmllZCIgeG1sbnM6cGF5X2k9Imh0dHA6Ly93d3cuZGlnaXRwYS5nb3YuaXQvc2NoZW1hcy8yMDExL1BhZ2FtZW50aS8iIHhtbG5zOnBwdD0iaHR0cDovL3dzLnBhZ2FtZW50aS50ZWxlbWF0aWNpLmdvdi8iIHhtbG5zOnFyYz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0L1FyQ29kZSIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnRucz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0L3NlcnZpemkvUGFnYW1lbnRpVGVsZW1hdGljaVBzcE5vZG8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxwcHQ6bm9kb0ludmlhUlRSaXNwb3N0YT4KCQkJPG5vZG9JbnZpYVJUUmlzcG9zdGE+CgkJCQk8ZXNpdG8+T0s8L2VzaXRvPgoJCQk8L25vZG9JbnZpYVJUUmlzcG9zdGE+CgkJPC9wcHQ6bm9kb0ludmlhUlRSaXNwb3N0YT4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+',
];


Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);


$data_req = [
    ':id' => 135,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 08:31:00.197',
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
    ':sessionid' => '',
    ':sessionidoriginal' => 'session_id_original_000102',
    ':uniqueid' => 'T000135',
    ':payload' => 'PFNPQVAtRU5WOkVudmVsb3BlIHhtbG5zOlNPQVAtRU5WPSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyIgeG1sbnM6cHB0PSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOndzPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyI+Cgk8U09BUC1FTlY6SGVhZGVyPgoJCTxwcHQ6aW50ZXN0YXppb25lQ2FycmVsbG9QUFQ+CgkJCTxpZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QQT43Nzc3Nzc3Nzc3NzwvaWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUEE+CgkJCTxpZGVudGlmaWNhdGl2b1N0YXppb25lSW50ZXJtZWRpYXJpb1BBPjc3Nzc3Nzc3Nzc3XzAxPC9pZGVudGlmaWNhdGl2b1N0YXppb25lSW50ZXJtZWRpYXJpb1BBPgoJCQk8aWRlbnRpZmljYXRpdm9DYXJyZWxsbz5jMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDExMTwvaWRlbnRpZmljYXRpdm9DYXJyZWxsbz4KCQk8L3BwdDppbnRlc3RhemlvbmVDYXJyZWxsb1BQVD4KCTwvU09BUC1FTlY6SGVhZGVyPgoJPFNPQVAtRU5WOkJvZHk+CgkJPG5zMzpub2RvSW52aWFDYXJyZWxsb1JQVCB4bWxuczpuczM9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIj4KCQkJPHBhc3N3b3JkPlBMQUNFSE9MREVSPC9wYXNzd29yZD4KCQkJPGlkZW50aWZpY2F0aXZvUFNQPkFHSURfMDE8L2lkZW50aWZpY2F0aXZvUFNQPgoJCQk8aWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUFNQPjg4ODg4ODg4ODg4PC9pZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QU1A+CgkJCTxpZGVudGlmaWNhdGl2b0NhbmFsZT44ODg4ODg4ODg4OF8wMTwvaWRlbnRpZmljYXRpdm9DYW5hbGU+CgkJCTxsaXN0YVJQVD4KCQkJCTxlbGVtZW50b0xpc3RhUlBUPgoJCQkJCTxpZGVudGlmaWNhdGl2b0RvbWluaW8+Nzc3Nzc3Nzc3Nzc8L2lkZW50aWZpY2F0aXZvRG9taW5pbz4KCQkJCQk8aWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4wMTAwMDAwMDAwMDAwMDExMTwvaWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4KCQkJCQk8Y29kaWNlQ29udGVzdG9QYWdhbWVudG8+dDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxMTE8L2NvZGljZUNvbnRlc3RvUGFnYW1lbnRvPgoJCQkJCTxycHQ+UEZKUVZDQjRiV3h1Y3owaWFIUjBjRG92TDNkM2R5NWthV2RwZEhCaExtZHZkaTVwZEM5elkyaGxiV0Z6THpJd01URXZVR0ZuWVcxbGJuUnBMeUkrQ2lBZ0lDQThkbVZ5YzJsdmJtVlBaMmRsZEhSdlBqRXVNRHd2ZG1WeWMybHZibVZQWjJkbGRIUnZQZ29nSUNBZ1BHUnZiV2x1YVc4K0NpQWdJQ0FnSUNBZ1BHbGtaVzUwYVdacFkyRjBhWFp2Ukc5dGFXNXBiejQzTnpjM056YzNOemMzTnp3dmFXUmxiblJwWm1sallYUnBkbTlFYjIxcGJtbHZQZ29nSUNBZ1BDOWtiMjFwYm1sdlBnb2dJQ0FnUEdsa1pXNTBhV1pwWTJGMGFYWnZUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQakl3TWpNeE1qRTFNREV3TVRVek9XRmlZbUV6TXpVdFlXSTBaUzAwWkRFNExXRXpQQzlwWkdWdWRHbG1hV05oZEdsMmIwMWxjM05oWjJkcGIxSnBZMmhwWlhOMFlUNEtJQ0FnSUR4a1lYUmhUM0poVFdWemMyRm5aMmx2VW1samFHbGxjM1JoUGpJd01qTXRNVEl0TVRWVU1UTTZNREU2TlRNdU5qRTVLekF4T2pBd1BDOWtZWFJoVDNKaFRXVnpjMkZuWjJsdlVtbGphR2xsYzNSaFBnb2dJQ0FnUEdGMWRHVnVkR2xqWVhwcGIyNWxVMjluWjJWMGRHOCtUaTlCUEM5aGRYUmxiblJwWTJGNmFXOXVaVk52WjJkbGRIUnZQZ29nSUNBZ1BITnZaMmRsZEhSdlZtVnljMkZ1ZEdVK0NpQWdJQ0FnSUNBZ1BHbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiMVpsY25OaGJuUmxQZ29nSUNBZ0lDQWdJQ0FnSUNBOGRHbHdiMGxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno1SFBDOTBhWEJ2U1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBnb2dJQ0FnSUNBZ0lDQWdJQ0E4WTI5a2FXTmxTV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52UGpjM056YzNOemMzTnpjM1BDOWpiMlJwWTJWSlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtDaUFnSUNBZ0lDQWdQQzlwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5V1pYSnpZVzUwWlQ0S0lDQWdJQ0FnSUNBOFlXNWhaM0poWm1sallWWmxjbk5oYm5SbFBuaDRlSGg0ZUhoNGVEd3ZZVzVoWjNKaFptbGpZVlpsY25OaGJuUmxQZ29nSUNBZ1BDOXpiMmRuWlhSMGIxWmxjbk5oYm5SbFBnb2dJQ0FnUEhOdloyZGxkSFJ2VUdGbllYUnZjbVUrQ2lBZ0lDQWdJQ0FnUEdsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amIxQmhaMkYwYjNKbFBnb2dJQ0FnSUNBZ0lDQWdJQ0E4ZEdsd2IwbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejVIUEM5MGFYQnZTV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52UGdvZ0lDQWdJQ0FnSUNBZ0lDQThZMjlrYVdObFNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQamMzTnpjM056YzNOemMzUEM5amIyUnBZMlZKWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI4K0NpQWdJQ0FnSUNBZ1BDOXBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlRWVdkaGRHOXlaVDRLSUNBZ0lDQWdJQ0E4WVc1aFozSmhabWxqWVZCaFoyRjBiM0psUG5oNGVIaDRlSGg0ZUR3dllXNWhaM0poWm1sallWQmhaMkYwYjNKbFBnb2dJQ0FnUEM5emIyZG5aWFIwYjFCaFoyRjBiM0psUGdvZ0lDQWdQR1Z1ZEdWQ1pXNWxabWxqYVdGeWFXOCtDaUFnSUNBZ0lDQWdQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjBKbGJtVm1hV05wWVhKcGJ6NEtJQ0FnSUNBZ0lDQWdJQ0FnUEhScGNHOUpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrUnp3dmRHbHdiMGxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno0S0lDQWdJQ0FnSUNBZ0lDQWdQR052WkdsalpVbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejQzTnpjM056YzNOemMzTnp3dlkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBnb2dJQ0FnSUNBZ0lEd3ZhV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52UW1WdVpXWnBZMmxoY21sdlBnb2dJQ0FnSUNBZ0lEeGtaVzV2YldsdVlYcHBiMjVsUW1WdVpXWnBZMmxoY21sdlBuaDRlSGg0ZUhnOEwyUmxibTl0YVc1aGVtbHZibVZDWlc1bFptbGphV0Z5YVc4K0NpQWdJQ0FnSUNBZ1BHTnZaR2xqWlZWdWFYUlBjR1Z5UW1WdVpXWnBZMmxoY21sdlBuaDRQQzlqYjJScFkyVlZibWwwVDNCbGNrSmxibVZtYVdOcFlYSnBiejRLSUNBZ0lDQWdJQ0E4WkdWdWIyMVZibWwwVDNCbGNrSmxibVZtYVdOcFlYSnBiejU0ZUhoNGVIZzhMMlJsYm05dFZXNXBkRTl3WlhKQ1pXNWxabWxqYVdGeWFXOCtDaUFnSUNBZ0lDQWdQR2x1WkdseWFYcDZiMEpsYm1WbWFXTnBZWEpwYno1NGVIaDRQQzlwYm1ScGNtbDZlbTlDWlc1bFptbGphV0Z5YVc4K0NpQWdJQ0FnSUNBZ1BHTnBkbWxqYjBKbGJtVm1hV05wWVhKcGJ6NTRlSGc4TDJOcGRtbGpiMEpsYm1WbWFXTnBZWEpwYno0S0lDQWdJQ0FnSUNBOFkyRndRbVZ1WldacFkybGhjbWx2UG5oNGVIaDRQQzlqWVhCQ1pXNWxabWxqYVdGeWFXOCtDaUFnSUNBZ0lDQWdQR3h2WTJGc2FYUmhRbVZ1WldacFkybGhjbWx2UG5oNGVIZzhMMnh2WTJGc2FYUmhRbVZ1WldacFkybGhjbWx2UGdvZ0lDQWdJQ0FnSUR4d2NtOTJhVzVqYVdGQ1pXNWxabWxqYVdGeWFXOCtlSGc4TDNCeWIzWnBibU5wWVVKbGJtVm1hV05wWVhKcGJ6NEtJQ0FnSUNBZ0lDQThibUY2YVc5dVpVSmxibVZtYVdOcFlYSnBiejU0ZUR3dmJtRjZhVzl1WlVKbGJtVm1hV05wWVhKcGJ6NEtJQ0FnSUR3dlpXNTBaVUpsYm1WbWFXTnBZWEpwYno0S0lDQWdJRHhrWVhScFZtVnljMkZ0Wlc1MGJ6NEtJQ0FnSUNBZ0lDQThaR0YwWVVWelpXTjFlbWx2Ym1WUVlXZGhiV1Z1ZEc4K01qQXlNeTB4TWkweE5Tc3dNVG93TUR3dlpHRjBZVVZ6WldOMWVtbHZibVZRWVdkaGJXVnVkRzgrQ2lBZ0lDQWdJQ0FnUEdsdGNHOXlkRzlVYjNSaGJHVkVZVlpsY25OaGNtVStOekF3TGpBd1BDOXBiWEJ2Y25SdlZHOTBZV3hsUkdGV1pYSnpZWEpsUGdvZ0lDQWdJQ0FnSUR4MGFYQnZWbVZ5YzJGdFpXNTBiejVDUWxROEwzUnBjRzlXWlhKellXMWxiblJ2UGdvZ0lDQWdJQ0FnSUR4cFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOVdaWEp6WVcxbGJuUnZQakF4TURBd01EQXdNREF3TURBd01URXhQQzlwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5V1pYSnpZVzFsYm5SdlBnb2dJQ0FnSUNBZ0lEeGpiMlJwWTJWRGIyNTBaWE4wYjFCaFoyRnRaVzUwYno1ME1EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01ERXhNVHd2WTI5a2FXTmxRMjl1ZEdWemRHOVFZV2RoYldWdWRHOCtDaUFnSUNBZ0lDQWdQR1pwY20xaFVtbGpaWFoxZEdFK01Ed3ZabWx5YldGU2FXTmxkblYwWVQ0S0lDQWdJQ0FnSUNBOFpHRjBhVk5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29nSUNBZ0lDQWdJQ0FnSUNBOGFXMXdiM0owYjFOcGJtZHZiRzlXWlhKellXMWxiblJ2UGpNd01DNHdNRHd2YVcxd2IzSjBiMU5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29nSUNBZ0lDQWdJQ0FnSUNBOGFXSmhia0ZqWTNKbFpHbDBiejVKVkRFNFZUQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNVEE4TDJsaVlXNUJZMk55WldScGRHOCtDaUFnSUNBZ0lDQWdJQ0FnSUR4allYVnpZV3hsVm1WeWMyRnRaVzUwYno1NGVIaDRlSGg0UEM5allYVnpZV3hsVm1WeWMyRnRaVzUwYno0S0lDQWdJQ0FnSUNBZ0lDQWdQR1JoZEdsVGNHVmphV1pwWTJsU2FYTmpiM056YVc5dVpUNTRlSGg0ZUhoNFBDOWtZWFJwVTNCbFkybG1hV05wVW1selkyOXpjMmx2Ym1VK0NpQWdJQ0FnSUNBZ1BDOWtZWFJwVTJsdVoyOXNiMVpsY25OaGJXVnVkRzgrQ2lBZ0lDQWdJQ0FnUEdSaGRHbFRhVzVuYjJ4dlZtVnljMkZ0Wlc1MGJ6NEtJQ0FnSUNBZ0lDQWdJQ0FnUEdsdGNHOXlkRzlUYVc1bmIyeHZWbVZ5YzJGdFpXNTBiejR6TlRBdU1EQThMMmx0Y0c5eWRHOVRhVzVuYjJ4dlZtVnljMkZ0Wlc1MGJ6NEtJQ0FnSUNBZ0lDQWdJQ0FnUEdsaVlXNUJZMk55WldScGRHOCtTVlF4T0ZVd01EQXdNREF3TURBd01EQXdNREF3TURBd01ERXhQQzlwWW1GdVFXTmpjbVZrYVhSdlBnb2dJQ0FnSUNBZ0lDQWdJQ0E4WTJGMWMyRnNaVlpsY25OaGJXVnVkRzgrZUhoNGVIaDRlRHd2WTJGMWMyRnNaVlpsY25OaGJXVnVkRzgrQ2lBZ0lDQWdJQ0FnSUNBZ0lEeGtZWFJwVTNCbFkybG1hV05wVW1selkyOXpjMmx2Ym1VK2VIaDRlSGg0ZUR3dlpHRjBhVk53WldOcFptbGphVkpwYzJOdmMzTnBiMjVsUGdvZ0lDQWdJQ0FnSUR3dlpHRjBhVk5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29nSUNBZ0lDQWdJRHhrWVhScFUybHVaMjlzYjFabGNuTmhiV1Z1ZEc4K0NpQWdJQ0FnSUNBZ0lDQWdJRHhwYlhCdmNuUnZVMmx1WjI5c2IxWmxjbk5oYldWdWRHOCtOVEF1TURBOEwybHRjRzl5ZEc5VGFXNW5iMnh2Vm1WeWMyRnRaVzUwYno0S0lDQWdJQ0FnSUNBZ0lDQWdQR2xpWVc1QlkyTnlaV1JwZEc4K1NWUXhPRlV3TURBd01EQXdNREF3TURBd01EQXdNREF3TURFeVBDOXBZbUZ1UVdOamNtVmthWFJ2UGdvZ0lDQWdJQ0FnSUNBZ0lDQThZMkYxYzJGc1pWWmxjbk5oYldWdWRHOCtlSGg0ZUhoNGVEd3ZZMkYxYzJGc1pWWmxjbk5oYldWdWRHOCtDaUFnSUNBZ0lDQWdJQ0FnSUR4a1lYUnBVM0JsWTJsbWFXTnBVbWx6WTI5emMybHZibVUrZUhoNGVIaDRlRHd2WkdGMGFWTndaV05wWm1samFWSnBjMk52YzNOcGIyNWxQZ29nSUNBZ0lDQWdJRHd2WkdGMGFWTnBibWR2Ykc5V1pYSnpZVzFsYm5SdlBnb2dJQ0FnUEM5a1lYUnBWbVZ5YzJGdFpXNTBiejRLUEM5U1VGUSs8L3JwdD4KCQkJCTwvZWxlbWVudG9MaXN0YVJQVD4KCQkJCTxlbGVtZW50b0xpc3RhUlBUPgoJCQkJCTxpZGVudGlmaWNhdGl2b0RvbWluaW8+Nzc3Nzc3Nzc3Nzc8L2lkZW50aWZpY2F0aXZvRG9taW5pbz4KCQkJCQk8aWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4wMTAwMDAwMDAwMDAwMDExMjwvaWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4KCQkJCQk8Y29kaWNlQ29udGVzdG9QYWdhbWVudG8+dDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxMTI8L2NvZGljZUNvbnRlc3RvUGFnYW1lbnRvPgoJCQkJCTxycHQ+UEZKUVZDQjRiV3h1Y3owaWFIUjBjRG92TDNkM2R5NWthV2RwZEhCaExtZHZkaTVwZEM5elkyaGxiV0Z6THpJd01URXZVR0ZuWVcxbGJuUnBMeUkrQ2lBZ0lDQThkbVZ5YzJsdmJtVlBaMmRsZEhSdlBqRXVNRHd2ZG1WeWMybHZibVZQWjJkbGRIUnZQZ29nSUNBZ1BHUnZiV2x1YVc4K0NpQWdJQ0FnSUNBZ1BHbGtaVzUwYVdacFkyRjBhWFp2Ukc5dGFXNXBiejQzTnpjM056YzNOemMzTnp3dmFXUmxiblJwWm1sallYUnBkbTlFYjIxcGJtbHZQZ29nSUNBZ1BDOWtiMjFwYm1sdlBnb2dJQ0FnUEdsa1pXNTBhV1pwWTJGMGFYWnZUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQakl3TWpNeE1qRTFNREV3TVRVek9XRmlZbUV6TXpVdFlXSTBaUzAwWkRFNExXRXpQQzlwWkdWdWRHbG1hV05oZEdsMmIwMWxjM05oWjJkcGIxSnBZMmhwWlhOMFlUNEtJQ0FnSUR4a1lYUmhUM0poVFdWemMyRm5aMmx2VW1samFHbGxjM1JoUGpJd01qTXRNVEl0TVRWVU1UTTZNREU2TlRNdU5qRTVLekF4T2pBd1BDOWtZWFJoVDNKaFRXVnpjMkZuWjJsdlVtbGphR2xsYzNSaFBnb2dJQ0FnUEdGMWRHVnVkR2xqWVhwcGIyNWxVMjluWjJWMGRHOCtUaTlCUEM5aGRYUmxiblJwWTJGNmFXOXVaVk52WjJkbGRIUnZQZ29nSUNBZ1BITnZaMmRsZEhSdlZtVnljMkZ1ZEdVK0NpQWdJQ0FnSUNBZ1BHbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiMVpsY25OaGJuUmxQZ29nSUNBZ0lDQWdJQ0FnSUNBOGRHbHdiMGxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno1SFBDOTBhWEJ2U1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBnb2dJQ0FnSUNBZ0lDQWdJQ0E4WTI5a2FXTmxTV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52UGpjM056YzNOemMzTnpjM1BDOWpiMlJwWTJWSlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtDaUFnSUNBZ0lDQWdQQzlwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5V1pYSnpZVzUwWlQ0S0lDQWdJQ0FnSUNBOFlXNWhaM0poWm1sallWWmxjbk5oYm5SbFBuaDRlSGg0ZUhoNGVEd3ZZVzVoWjNKaFptbGpZVlpsY25OaGJuUmxQZ29nSUNBZ1BDOXpiMmRuWlhSMGIxWmxjbk5oYm5SbFBnb2dJQ0FnUEhOdloyZGxkSFJ2VUdGbllYUnZjbVUrQ2lBZ0lDQWdJQ0FnUEdsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amIxQmhaMkYwYjNKbFBnb2dJQ0FnSUNBZ0lDQWdJQ0E4ZEdsd2IwbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejVIUEM5MGFYQnZTV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52UGdvZ0lDQWdJQ0FnSUNBZ0lDQThZMjlrYVdObFNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQamMzTnpjM056YzNOemMzUEM5amIyUnBZMlZKWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI4K0NpQWdJQ0FnSUNBZ1BDOXBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlRWVdkaGRHOXlaVDRLSUNBZ0lDQWdJQ0E4WVc1aFozSmhabWxqWVZCaFoyRjBiM0psUG5oNGVIaDRlSGg0ZUR3dllXNWhaM0poWm1sallWQmhaMkYwYjNKbFBnb2dJQ0FnUEM5emIyZG5aWFIwYjFCaFoyRjBiM0psUGdvZ0lDQWdQR1Z1ZEdWQ1pXNWxabWxqYVdGeWFXOCtDaUFnSUNBZ0lDQWdQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjBKbGJtVm1hV05wWVhKcGJ6NEtJQ0FnSUNBZ0lDQWdJQ0FnUEhScGNHOUpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrUnp3dmRHbHdiMGxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno0S0lDQWdJQ0FnSUNBZ0lDQWdQR052WkdsalpVbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejQzTnpjM056YzNOemMzTnp3dlkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBnb2dJQ0FnSUNBZ0lEd3ZhV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52UW1WdVpXWnBZMmxoY21sdlBnb2dJQ0FnSUNBZ0lEeGtaVzV2YldsdVlYcHBiMjVsUW1WdVpXWnBZMmxoY21sdlBuaDRlSGg0ZUhnOEwyUmxibTl0YVc1aGVtbHZibVZDWlc1bFptbGphV0Z5YVc4K0NpQWdJQ0FnSUNBZ1BHTnZaR2xqWlZWdWFYUlBjR1Z5UW1WdVpXWnBZMmxoY21sdlBuaDRQQzlqYjJScFkyVlZibWwwVDNCbGNrSmxibVZtYVdOcFlYSnBiejRLSUNBZ0lDQWdJQ0E4WkdWdWIyMVZibWwwVDNCbGNrSmxibVZtYVdOcFlYSnBiejU0ZUhoNGVIZzhMMlJsYm05dFZXNXBkRTl3WlhKQ1pXNWxabWxqYVdGeWFXOCtDaUFnSUNBZ0lDQWdQR2x1WkdseWFYcDZiMEpsYm1WbWFXTnBZWEpwYno1NGVIaDRQQzlwYm1ScGNtbDZlbTlDWlc1bFptbGphV0Z5YVc4K0NpQWdJQ0FnSUNBZ1BHTnBkbWxqYjBKbGJtVm1hV05wWVhKcGJ6NTRlSGc4TDJOcGRtbGpiMEpsYm1WbWFXTnBZWEpwYno0S0lDQWdJQ0FnSUNBOFkyRndRbVZ1WldacFkybGhjbWx2UG5oNGVIaDRQQzlqWVhCQ1pXNWxabWxqYVdGeWFXOCtDaUFnSUNBZ0lDQWdQR3h2WTJGc2FYUmhRbVZ1WldacFkybGhjbWx2UG5oNGVIZzhMMnh2WTJGc2FYUmhRbVZ1WldacFkybGhjbWx2UGdvZ0lDQWdJQ0FnSUR4d2NtOTJhVzVqYVdGQ1pXNWxabWxqYVdGeWFXOCtlSGc4TDNCeWIzWnBibU5wWVVKbGJtVm1hV05wWVhKcGJ6NEtJQ0FnSUNBZ0lDQThibUY2YVc5dVpVSmxibVZtYVdOcFlYSnBiejU0ZUR3dmJtRjZhVzl1WlVKbGJtVm1hV05wWVhKcGJ6NEtJQ0FnSUR3dlpXNTBaVUpsYm1WbWFXTnBZWEpwYno0S0lDQWdJRHhrWVhScFZtVnljMkZ0Wlc1MGJ6NEtJQ0FnSUNBZ0lDQThaR0YwWVVWelpXTjFlbWx2Ym1WUVlXZGhiV1Z1ZEc4K01qQXlNeTB4TWkweE5Tc3dNVG93TUR3dlpHRjBZVVZ6WldOMWVtbHZibVZRWVdkaGJXVnVkRzgrQ2lBZ0lDQWdJQ0FnUEdsdGNHOXlkRzlVYjNSaGJHVkVZVlpsY25OaGNtVStNekF3TGpBd1BDOXBiWEJ2Y25SdlZHOTBZV3hsUkdGV1pYSnpZWEpsUGdvZ0lDQWdJQ0FnSUR4MGFYQnZWbVZ5YzJGdFpXNTBiejVDUWxROEwzUnBjRzlXWlhKellXMWxiblJ2UGdvZ0lDQWdJQ0FnSUR4cFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOVdaWEp6WVcxbGJuUnZQakF4TURBd01EQXdNREF3TURBd01URXlQQzlwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5V1pYSnpZVzFsYm5SdlBnb2dJQ0FnSUNBZ0lEeGpiMlJwWTJWRGIyNTBaWE4wYjFCaFoyRnRaVzUwYno1ME1EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01ERXhNand2WTI5a2FXTmxRMjl1ZEdWemRHOVFZV2RoYldWdWRHOCtDaUFnSUNBZ0lDQWdQR1pwY20xaFVtbGpaWFoxZEdFK01Ed3ZabWx5YldGU2FXTmxkblYwWVQ0S0lDQWdJQ0FnSUNBOFpHRjBhVk5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29nSUNBZ0lDQWdJQ0FnSUNBOGFXMXdiM0owYjFOcGJtZHZiRzlXWlhKellXMWxiblJ2UGpJd01DNHdNRHd2YVcxd2IzSjBiMU5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29nSUNBZ0lDQWdJQ0FnSUNBOGFXSmhia0ZqWTNKbFpHbDBiejVKVkRFNFZUQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNVEE4TDJsaVlXNUJZMk55WldScGRHOCtDaUFnSUNBZ0lDQWdJQ0FnSUR4allYVnpZV3hsVm1WeWMyRnRaVzUwYno1NGVIaDRlSGg0UEM5allYVnpZV3hsVm1WeWMyRnRaVzUwYno0S0lDQWdJQ0FnSUNBZ0lDQWdQR1JoZEdsVGNHVmphV1pwWTJsU2FYTmpiM056YVc5dVpUNTRlSGg0ZUhoNFBDOWtZWFJwVTNCbFkybG1hV05wVW1selkyOXpjMmx2Ym1VK0NpQWdJQ0FnSUNBZ1BDOWtZWFJwVTJsdVoyOXNiMVpsY25OaGJXVnVkRzgrQ2lBZ0lDQWdJQ0FnUEdSaGRHbFRhVzVuYjJ4dlZtVnljMkZ0Wlc1MGJ6NEtJQ0FnSUNBZ0lDQWdJQ0FnUEdsdGNHOXlkRzlUYVc1bmIyeHZWbVZ5YzJGdFpXNTBiejR4TURBdU1EQThMMmx0Y0c5eWRHOVRhVzVuYjJ4dlZtVnljMkZ0Wlc1MGJ6NEtJQ0FnSUNBZ0lDQWdJQ0FnUEdsaVlXNUJZMk55WldScGRHOCtTVlF4T0ZVd01EQXdNREF3TURBd01EQXdNREF3TURBd01ERXhQQzlwWW1GdVFXTmpjbVZrYVhSdlBnb2dJQ0FnSUNBZ0lDQWdJQ0E4WTJGMWMyRnNaVlpsY25OaGJXVnVkRzgrZUhoNGVIaDRlRHd2WTJGMWMyRnNaVlpsY25OaGJXVnVkRzgrQ2lBZ0lDQWdJQ0FnSUNBZ0lEeGtZWFJwVTNCbFkybG1hV05wVW1selkyOXpjMmx2Ym1VK2VIaDRlSGg0ZUR3dlpHRjBhVk53WldOcFptbGphVkpwYzJOdmMzTnBiMjVsUGdvZ0lDQWdJQ0FnSUR3dlpHRjBhVk5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29nSUNBZ1BDOWtZWFJwVm1WeWMyRnRaVzUwYno0S1BDOVNVRlErPC9ycHQ+CgkJCQk8L2VsZW1lbnRvTGlzdGFSUFQ+CgkJCTwvbGlzdGFSUFQ+CgkJCTxtdWx0aUJlbmVmaWNpYXJpbz5mYWxzZTwvbXVsdGlCZW5lZmljaWFyaW8+CgkJPC9uczM6bm9kb0ludmlhQ2FycmVsbG9SUFQ+Cgk8L1NPQVAtRU5WOkJvZHk+CjwvU09BUC1FTlY6RW52ZWxvcGU+',
];

$data_resp = [
    ':id' => 136,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 08:31:01.197',
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
    ':sessionid' => '',
    ':sessionidoriginal' => 'session_id_original_000102',
    ':uniqueid' => 'T000136',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpwcHQ9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIiB4bWxuczpwcHRoZWFkPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIiB4bWxuczp0bnM9Imh0dHA6Ly9Ob2RvUGFnYW1lbnRpU1BDLnNwY29vcC5nb3YuaXQvc2Vydml6aS9QYWdhbWVudGlUZWxlbWF0aWNpUlBUIiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBwdDpub2RvSW52aWFDYXJyZWxsb1JQVFJpc3Bvc3RhPgoJCQk8ZXNpdG9Db21wbGVzc2l2b09wZXJhemlvbmU+T0s8L2VzaXRvQ29tcGxlc3Npdm9PcGVyYXppb25lPgoJCQk8dXJsPmh0dHBzOi8vd2lzcDIucGFnb3BhLmdvdi5pdC93YWxsZXQvd2VsY29tZT9pZFNlc3Npb249NjA2N2FiMGItMGIxNi00NDVhLThlN2MtZGVkZGQ3Y2IxYzZiPC91cmw+CgkJPC9wcHQ6bm9kb0ludmlhQ2FycmVsbG9SUFRSaXNwb3N0YT4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+',
];


Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);


$data_req = [
    ':id' => 137,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 08:36:00.197',
    ':tipoevento' => 'nodoInviaRT',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000111',
    ':ccp' => 't0000000000000000000000000000111',
    ':noticenumber' => '',
    ':creditorreferenceid' => '',
    ':paymenttoken' => '',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_000020',
    ':sessionidoriginal' => 'session_id_original_000102',
    ':uniqueid' => 'T000137',
    ':payload' => 'PHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPgoJPHNvYXBlbnY6Qm9keT4KCQk8bnMxOm5vZG9JbnZpYVJUIHhtbG5zOm5zMT0iaHR0cDovL3dzLnBhZ2FtZW50aS50ZWxlbWF0aWNpLmdvdi8iPgoJCQk8aWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUFNQPjg4ODg4ODg4ODg4PC9pZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QU1A+CgkJCTxpZGVudGlmaWNhdGl2b0NhbmFsZT44ODg4ODg4ODg4OF8wMTwvaWRlbnRpZmljYXRpdm9DYW5hbGU+CgkJCTxwYXNzd29yZD5QTEFDRUhPTERFUjwvcGFzc3dvcmQ+CgkJCTxpZGVudGlmaWNhdGl2b1BTUD5BR0lEXzAxPC9pZGVudGlmaWNhdGl2b1BTUD4KCQkJPGlkZW50aWZpY2F0aXZvRG9taW5pbz43Nzc3Nzc3Nzc3NzwvaWRlbnRpZmljYXRpdm9Eb21pbmlvPgoJCQk8aWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4wMTAwMDAwMDAwMDAwMDExMTwvaWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4KCQkJPGNvZGljZUNvbnRlc3RvUGFnYW1lbnRvPnQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMTExPC9jb2RpY2VDb250ZXN0b1BhZ2FtZW50bz4KCQkJPHRpcG9GaXJtYS8+CgkJCTxydD5QRDk0Yld3Z2RtVnljMmx2YmowaU1TNHdJaUJsYm1OdlpHbHVaejBpVlZSR0xUZ2lQejRLUEhCaGVWOXBPbEpVSUhodGJHNXpPbkJoZVY5cFBTSm9kSFJ3T2k4dmQzZDNMbVJwWjJsMGNHRXVaMjkyTG1sMEwzTmphR1Z0WVhNdk1qQXhNUzlRWVdkaGJXVnVkR2t2SWlCNGJXeHVjenA0YzJrOUltaDBkSEE2THk5M2QzY3Vkek11YjNKbkx6SXdNREV2V0UxTVUyTm9aVzFoTFdsdWMzUmhibU5sSWlCNGMyazZjMk5vWlcxaFRHOWpZWFJwYjI0OUlpOXZjSFF2Y0hOd1lYaGxjSFJoTDNKbGMyOTFjbU5sY3k5UVlXZEpibVpmVWxCVVgxSlVYelpmTWw4d0xuaHpaQ0krQ2drOGNHRjVYMms2ZG1WeWMybHZibVZQWjJkbGRIUnZQall1TWp3dmNHRjVYMms2ZG1WeWMybHZibVZQWjJkbGRIUnZQZ29KUEhCaGVWOXBPbVJ2YldsdWFXOCtDZ2tKUEhCaGVWOXBPbWxrWlc1MGFXWnBZMkYwYVhadlJHOXRhVzVwYno0M056YzNOemMzTnpjM056d3ZjR0Y1WDJrNmFXUmxiblJwWm1sallYUnBkbTlFYjIxcGJtbHZQZ29KUEM5d1lYbGZhVHBrYjIxcGJtbHZQZ29KUEhCaGVWOXBPbWxrWlc1MGFXWnBZMkYwYVhadlRXVnpjMkZuWjJsdlVtbGpaWFoxZEdFK1lXUnpZWEl6TkdWa1pXUnpaSE5oUEM5d1lYbGZhVHBwWkdWdWRHbG1hV05oZEdsMmIwMWxjM05oWjJkcGIxSnBZMlYyZFhSaFBnb0pQSEJoZVY5cE9tUmhkR0ZQY21GTlpYTnpZV2RuYVc5U2FXTmxkblYwWVQ0eU1ESTBMVEEwTFRFMlZESXpPalExT2pBMlBDOXdZWGxmYVRwa1lYUmhUM0poVFdWemMyRm5aMmx2VW1salpYWjFkR0UrQ2drOGNHRjVYMms2Y21sbVpYSnBiV1Z1ZEc5TlpYTnpZV2RuYVc5U2FXTm9hV1Z6ZEdFK2MyUnpaR0U4TDNCaGVWOXBPbkpwWm1WeWFXMWxiblJ2VFdWemMyRm5aMmx2VW1samFHbGxjM1JoUGdvSlBIQmhlVjlwT25KcFptVnlhVzFsYm5SdlJHRjBZVkpwWTJocFpYTjBZVDR5TURJMExUQTBMVEUyUEM5d1lYbGZhVHB5YVdabGNtbHRaVzUwYjBSaGRHRlNhV05vYVdWemRHRStDZ2s4Y0dGNVgyazZhWE4wYVhSMWRHOUJkSFJsYzNSaGJuUmxQZ29KQ1R4d1lYbGZhVHBwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5QmRIUmxjM1JoYm5SbFBnb0pDUWs4Y0dGNVgyazZkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NUNQQzl3WVhsZmFUcDBhWEJ2U1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBnb0pDUWs4Y0dGNVgyazZZMjlrYVdObFNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQa0ZIU1VSZk1ERThMM0JoZVY5cE9tTnZaR2xqWlVsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NEtDUWs4TDNCaGVWOXBPbWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjBGMGRHVnpkR0Z1ZEdVK0Nna0pQSEJoZVY5cE9tUmxibTl0YVc1aGVtbHZibVZCZEhSbGMzUmhiblJsUG5oNGVIaDRlSGg0UEM5d1lYbGZhVHBrWlc1dmJXbHVZWHBwYjI1bFFYUjBaWE4wWVc1MFpUNEtDVHd2Y0dGNVgyazZhWE4wYVhSMWRHOUJkSFJsYzNSaGJuUmxQZ29KUEhCaGVWOXBPbVZ1ZEdWQ1pXNWxabWxqYVdGeWFXOCtDZ2tKUEhCaGVWOXBPbWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjBKbGJtVm1hV05wWVhKcGJ6NEtDUWtKUEhCaGVWOXBPblJwY0c5SlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtSend2Y0dGNVgyazZkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NEtDUWtKUEhCaGVWOXBPbU52WkdsalpVbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejQzTnpjM056YzNOemMzTnp3dmNHRjVYMms2WTI5a2FXTmxTV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52UGdvSkNUd3ZjR0Y1WDJrNmFXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZRbVZ1WldacFkybGhjbWx2UGdvSkNUeHdZWGxmYVRwa1pXNXZiV2x1WVhwcGIyNWxRbVZ1WldacFkybGhjbWx2UG5oNGVIZzhMM0JoZVY5cE9tUmxibTl0YVc1aGVtbHZibVZDWlc1bFptbGphV0Z5YVc4K0NnazhMM0JoZVY5cE9tVnVkR1ZDWlc1bFptbGphV0Z5YVc4K0NnazhjR0Y1WDJrNmMyOW5aMlYwZEc5V1pYSnpZVzUwWlQ0S0NRazhjR0Y1WDJrNmFXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZWbVZ5YzJGdWRHVStDZ2tKQ1R4d1lYbGZhVHAwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQa1k4TDNCaGVWOXBPblJwY0c5SlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtDZ2tKQ1R4d1lYbGZhVHBqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrZUhoNGVIaDRQQzl3WVhsZmFUcGpiMlJwWTJWSlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtDZ2tKUEM5d1lYbGZhVHBwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5V1pYSnpZVzUwWlQ0S0NRazhjR0Y1WDJrNllXNWhaM0poWm1sallWWmxjbk5oYm5SbFBuaDRlSGg0UEM5d1lYbGZhVHBoYm1GbmNtRm1hV05oVm1WeWMyRnVkR1UrQ2drOEwzQmhlVjlwT25OdloyZGxkSFJ2Vm1WeWMyRnVkR1UrQ2drOGNHRjVYMms2YzI5bloyVjBkRzlRWVdkaGRHOXlaVDRLQ1FrOGNHRjVYMms2YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlVHRm5ZWFJ2Y21VK0Nna0pDVHh3WVhsZmFUcDBhWEJ2U1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBrWThMM0JoZVY5cE9uUnBjRzlKWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI4K0Nna0pDVHh3WVhsZmFUcGpiMlJwWTJWSlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtlSGg0ZUhnOEwzQmhlVjlwT21OdlpHbGpaVWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno0S0NRazhMM0JoZVY5cE9tbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiMUJoWjJGMGIzSmxQZ29KQ1R4d1lYbGZhVHBoYm1GbmNtRm1hV05oVUdGbllYUnZjbVUrZUhoNGVIaDRQQzl3WVhsZmFUcGhibUZuY21GbWFXTmhVR0ZuWVhSdmNtVStDZ2s4TDNCaGVWOXBPbk52WjJkbGRIUnZVR0ZuWVhSdmNtVStDZ2s4Y0dGNVgyazZaR0YwYVZCaFoyRnRaVzUwYno0S0NRazhjR0Y1WDJrNlkyOWthV05sUlhOcGRHOVFZV2RoYldWdWRHOCtNRHd2Y0dGNVgyazZZMjlrYVdObFJYTnBkRzlRWVdkaGJXVnVkRzgrQ2drSlBIQmhlVjlwT21sdGNHOXlkRzlVYjNSaGJHVlFZV2RoZEc4K056QXdMakF3UEM5d1lYbGZhVHBwYlhCdmNuUnZWRzkwWVd4bFVHRm5ZWFJ2UGdvSkNUeHdZWGxmYVRwcFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOVdaWEp6WVcxbGJuUnZQakF4TURBd01EQXdNREF3TURBd01URXhQQzl3WVhsZmFUcHBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlXWlhKellXMWxiblJ2UGdvSkNUeHdZWGxmYVRwRGIyUnBZMlZEYjI1MFpYTjBiMUJoWjJGdFpXNTBiejUwTURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURFeE1Ud3ZjR0Y1WDJrNlEyOWthV05sUTI5dWRHVnpkRzlRWVdkaGJXVnVkRzgrQ2drSlBIQmhlVjlwT21SaGRHbFRhVzVuYjJ4dlVHRm5ZVzFsYm5SdlBnb0pDUWs4Y0dGNVgyazZjMmx1WjI5c2IwbHRjRzl5ZEc5UVlXZGhkRzgrTXpBd0xqQXdQQzl3WVhsZmFUcHphVzVuYjJ4dlNXMXdiM0owYjFCaFoyRjBiejRLQ1FrSlBIQmhlVjlwT21WemFYUnZVMmx1WjI5c2IxQmhaMkZ0Wlc1MGJ6NVFRVWRCVkVFOEwzQmhlVjlwT21WemFYUnZVMmx1WjI5c2IxQmhaMkZ0Wlc1MGJ6NEtDUWtKUEhCaGVWOXBPbVJoZEdGRmMybDBiMU5wYm1kdmJHOVFZV2RoYldWdWRHOCtNakF5TkMwd05DMHhOand2Y0dGNVgyazZaR0YwWVVWemFYUnZVMmx1WjI5c2IxQmhaMkZ0Wlc1MGJ6NEtDUWtKUEhCaGVWOXBPbWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFKcGMyTnZjM05wYjI1bFBqQXhNVHd2Y0dGNVgyazZhV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52VW1selkyOXpjMmx2Ym1VK0Nna0pDVHh3WVhsZmFUcGpZWFZ6WVd4bFZtVnljMkZ0Wlc1MGJ6NTRlSGg0ZUhoNFBDOXdZWGxmYVRwallYVnpZV3hsVm1WeWMyRnRaVzUwYno0S0NRa0pQSEJoZVY5cE9tUmhkR2xUY0dWamFXWnBZMmxTYVhOamIzTnphVzl1WlQ1NGVIaDRlSGc4TDNCaGVWOXBPbVJoZEdsVGNHVmphV1pwWTJsU2FYTmpiM056YVc5dVpUNEtDUWs4TDNCaGVWOXBPbVJoZEdsVGFXNW5iMnh2VUdGbllXMWxiblJ2UGdvSkNUeHdZWGxmYVRwa1lYUnBVMmx1WjI5c2IxQmhaMkZ0Wlc1MGJ6NEtDUWtKUEhCaGVWOXBPbk5wYm1kdmJHOUpiWEJ2Y25SdlVHRm5ZWFJ2UGpNMU1DNHdNRHd2Y0dGNVgyazZjMmx1WjI5c2IwbHRjRzl5ZEc5UVlXZGhkRzgrQ2drSkNUeHdZWGxmYVRwbGMybDBiMU5wYm1kdmJHOVFZV2RoYldWdWRHOCtVRUZIUVZSQlBDOXdZWGxmYVRwbGMybDBiMU5wYm1kdmJHOVFZV2RoYldWdWRHOCtDZ2tKQ1R4d1lYbGZhVHBrWVhSaFJYTnBkRzlUYVc1bmIyeHZVR0ZuWVcxbGJuUnZQakl3TWpRdE1EUXRNVFk4TDNCaGVWOXBPbVJoZEdGRmMybDBiMU5wYm1kdmJHOVFZV2RoYldWdWRHOCtDZ2tKQ1R4d1lYbGZhVHBwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5U2FYTmpiM056YVc5dVpUNHdNVEk4TDNCaGVWOXBPbWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFKcGMyTnZjM05wYjI1bFBnb0pDUWs4Y0dGNVgyazZZMkYxYzJGc1pWWmxjbk5oYldWdWRHOCtlSGg0ZUhoNGVEd3ZjR0Y1WDJrNlkyRjFjMkZzWlZabGNuTmhiV1Z1ZEc4K0Nna0pDVHh3WVhsZmFUcGtZWFJwVTNCbFkybG1hV05wVW1selkyOXpjMmx2Ym1VK2VIaDRlSGg0UEM5d1lYbGZhVHBrWVhScFUzQmxZMmxtYVdOcFVtbHpZMjl6YzJsdmJtVStDZ2tKUEM5d1lYbGZhVHBrWVhScFUybHVaMjlzYjFCaFoyRnRaVzUwYno0S0NRazhjR0Y1WDJrNlpHRjBhVk5wYm1kdmJHOVFZV2RoYldWdWRHOCtDZ2tKQ1R4d1lYbGZhVHB6YVc1bmIyeHZTVzF3YjNKMGIxQmhaMkYwYno0MU1DNHdNRHd2Y0dGNVgyazZjMmx1WjI5c2IwbHRjRzl5ZEc5UVlXZGhkRzgrQ2drSkNUeHdZWGxmYVRwbGMybDBiMU5wYm1kdmJHOVFZV2RoYldWdWRHOCtVRUZIUVZSQlBDOXdZWGxmYVRwbGMybDBiMU5wYm1kdmJHOVFZV2RoYldWdWRHOCtDZ2tKQ1R4d1lYbGZhVHBrWVhSaFJYTnBkRzlUYVc1bmIyeHZVR0ZuWVcxbGJuUnZQakl3TWpRdE1EUXRNVFk4TDNCaGVWOXBPbVJoZEdGRmMybDBiMU5wYm1kdmJHOVFZV2RoYldWdWRHOCtDZ2tKQ1R4d1lYbGZhVHBwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5U2FYTmpiM056YVc5dVpUNHdNVE04TDNCaGVWOXBPbWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFKcGMyTnZjM05wYjI1bFBnb0pDUWs4Y0dGNVgyazZZMkYxYzJGc1pWWmxjbk5oYldWdWRHOCtlSGg0ZUhoNGVEd3ZjR0Y1WDJrNlkyRjFjMkZzWlZabGNuTmhiV1Z1ZEc4K0Nna0pDVHh3WVhsZmFUcGtZWFJwVTNCbFkybG1hV05wVW1selkyOXpjMmx2Ym1VK2VIaDRlSGg0UEM5d1lYbGZhVHBrWVhScFUzQmxZMmxtYVdOcFVtbHpZMjl6YzJsdmJtVStDZ2tKUEM5d1lYbGZhVHBrWVhScFUybHVaMjlzYjFCaFoyRnRaVzUwYno0S0NUd3ZjR0Y1WDJrNlpHRjBhVkJoWjJGdFpXNTBiejRLUEM5d1lYbGZhVHBTVkQ0PTwvcnQ+CgkJPC9uczE6bm9kb0ludmlhUlQ+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg==',
];

$data_resp = [
    ':id' => 138,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 08:36:01.197',
    ':tipoevento' => 'nodoInviaRT',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000111',
    ':ccp' => 't0000000000000000000000000000111',
    ':noticenumber' => '',
    ':creditorreferenceid' => '',
    ':paymenttoken' => '',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_000020',
    ':sessionidoriginal' => 'session_id_original_000102',
    ':uniqueid' => 'T000138',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpiYz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0L0JhckNvZGVfR1MxXzEyOF9Nb2RpZmllZCIgeG1sbnM6cGF5X2k9Imh0dHA6Ly93d3cuZGlnaXRwYS5nb3YuaXQvc2NoZW1hcy8yMDExL1BhZ2FtZW50aS8iIHhtbG5zOnBwdD0iaHR0cDovL3dzLnBhZ2FtZW50aS50ZWxlbWF0aWNpLmdvdi8iIHhtbG5zOnFyYz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0L1FyQ29kZSIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnRucz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0L3NlcnZpemkvUGFnYW1lbnRpVGVsZW1hdGljaVBzcE5vZG8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxwcHQ6bm9kb0ludmlhUlRSaXNwb3N0YT4KCQkJPG5vZG9JbnZpYVJUUmlzcG9zdGE+CgkJCQk8ZXNpdG8+T0s8L2VzaXRvPgoJCQk8L25vZG9JbnZpYVJUUmlzcG9zdGE+CgkJPC9wcHQ6bm9kb0ludmlhUlRSaXNwb3N0YT4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+',
];


Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);


$data_req = [
    ':id' => 139,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 08:37:00.197',
    ':tipoevento' => 'nodoInviaRT',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000112',
    ':ccp' => 't0000000000000000000000000000112',
    ':noticenumber' => '',
    ':creditorreferenceid' => '',
    ':paymenttoken' => '',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_000021',
    ':sessionidoriginal' => 'session_id_original_000102',
    ':uniqueid' => 'T000139',
    ':payload' => 'PHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPgoJPHNvYXBlbnY6Qm9keT4KCQk8bnMxOm5vZG9JbnZpYVJUIHhtbG5zOm5zMT0iaHR0cDovL3dzLnBhZ2FtZW50aS50ZWxlbWF0aWNpLmdvdi8iPgoJCQk8aWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUFNQPjg4ODg4ODg4ODg4PC9pZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QU1A+CgkJCTxpZGVudGlmaWNhdGl2b0NhbmFsZT44ODg4ODg4ODg4OF8wMTwvaWRlbnRpZmljYXRpdm9DYW5hbGU+CgkJCTxwYXNzd29yZD5QTEFDRUhPTERFUjwvcGFzc3dvcmQ+CgkJCTxpZGVudGlmaWNhdGl2b1BTUD5BR0lEXzAxPC9pZGVudGlmaWNhdGl2b1BTUD4KCQkJPGlkZW50aWZpY2F0aXZvRG9taW5pbz43Nzc3Nzc3Nzc3NzwvaWRlbnRpZmljYXRpdm9Eb21pbmlvPgoJCQk8aWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4wMTAwMDAwMDAwMDAwMDExMjwvaWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4KCQkJPGNvZGljZUNvbnRlc3RvUGFnYW1lbnRvPnQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMTEyPC9jb2RpY2VDb250ZXN0b1BhZ2FtZW50bz4KCQkJPHRpcG9GaXJtYS8+CgkJCTxydD5QRDk0Yld3Z2RtVnljMmx2YmowaU1TNHdJaUJsYm1OdlpHbHVaejBpVlZSR0xUZ2lQejRLUEhCaGVWOXBPbEpVSUhodGJHNXpPbkJoZVY5cFBTSm9kSFJ3T2k4dmQzZDNMbVJwWjJsMGNHRXVaMjkyTG1sMEwzTmphR1Z0WVhNdk1qQXhNUzlRWVdkaGJXVnVkR2t2SWlCNGJXeHVjenA0YzJrOUltaDBkSEE2THk5M2QzY3Vkek11YjNKbkx6SXdNREV2V0UxTVUyTm9aVzFoTFdsdWMzUmhibU5sSWlCNGMyazZjMk5vWlcxaFRHOWpZWFJwYjI0OUlpOXZjSFF2Y0hOd1lYaGxjSFJoTDNKbGMyOTFjbU5sY3k5UVlXZEpibVpmVWxCVVgxSlVYelpmTWw4d0xuaHpaQ0krQ2drOGNHRjVYMms2ZG1WeWMybHZibVZQWjJkbGRIUnZQall1TWp3dmNHRjVYMms2ZG1WeWMybHZibVZQWjJkbGRIUnZQZ29KUEhCaGVWOXBPbVJ2YldsdWFXOCtDZ2tKUEhCaGVWOXBPbWxrWlc1MGFXWnBZMkYwYVhadlJHOXRhVzVwYno0M056YzNOemMzTnpjM056d3ZjR0Y1WDJrNmFXUmxiblJwWm1sallYUnBkbTlFYjIxcGJtbHZQZ29KUEM5d1lYbGZhVHBrYjIxcGJtbHZQZ29KUEhCaGVWOXBPbWxrWlc1MGFXWnBZMkYwYVhadlRXVnpjMkZuWjJsdlVtbGpaWFoxZEdFK1lXUnpZWEl6TkdWa1pXUnpaSE5oUEM5d1lYbGZhVHBwWkdWdWRHbG1hV05oZEdsMmIwMWxjM05oWjJkcGIxSnBZMlYyZFhSaFBnb0pQSEJoZVY5cE9tUmhkR0ZQY21GTlpYTnpZV2RuYVc5U2FXTmxkblYwWVQ0eU1ESTBMVEEwTFRFMlZESXpPalExT2pBMlBDOXdZWGxmYVRwa1lYUmhUM0poVFdWemMyRm5aMmx2VW1salpYWjFkR0UrQ2drOGNHRjVYMms2Y21sbVpYSnBiV1Z1ZEc5TlpYTnpZV2RuYVc5U2FXTm9hV1Z6ZEdFK2MyUnpaR0U4TDNCaGVWOXBPbkpwWm1WeWFXMWxiblJ2VFdWemMyRm5aMmx2VW1samFHbGxjM1JoUGdvSlBIQmhlVjlwT25KcFptVnlhVzFsYm5SdlJHRjBZVkpwWTJocFpYTjBZVDR5TURJMExUQTBMVEUyUEM5d1lYbGZhVHB5YVdabGNtbHRaVzUwYjBSaGRHRlNhV05vYVdWemRHRStDZ2s4Y0dGNVgyazZhWE4wYVhSMWRHOUJkSFJsYzNSaGJuUmxQZ29KQ1R4d1lYbGZhVHBwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5QmRIUmxjM1JoYm5SbFBnb0pDUWs4Y0dGNVgyazZkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NUNQQzl3WVhsZmFUcDBhWEJ2U1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBnb0pDUWs4Y0dGNVgyazZZMjlrYVdObFNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQa0ZIU1VSZk1ERThMM0JoZVY5cE9tTnZaR2xqWlVsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NEtDUWs4TDNCaGVWOXBPbWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjBGMGRHVnpkR0Z1ZEdVK0Nna0pQSEJoZVY5cE9tUmxibTl0YVc1aGVtbHZibVZCZEhSbGMzUmhiblJsUG5oNGVIaDRlSGg0UEM5d1lYbGZhVHBrWlc1dmJXbHVZWHBwYjI1bFFYUjBaWE4wWVc1MFpUNEtDVHd2Y0dGNVgyazZhWE4wYVhSMWRHOUJkSFJsYzNSaGJuUmxQZ29KUEhCaGVWOXBPbVZ1ZEdWQ1pXNWxabWxqYVdGeWFXOCtDZ2tKUEhCaGVWOXBPbWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjBKbGJtVm1hV05wWVhKcGJ6NEtDUWtKUEhCaGVWOXBPblJwY0c5SlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtSend2Y0dGNVgyazZkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NEtDUWtKUEhCaGVWOXBPbU52WkdsalpVbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejQzTnpjM056YzNOemMzTnp3dmNHRjVYMms2WTI5a2FXTmxTV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52UGdvSkNUd3ZjR0Y1WDJrNmFXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZRbVZ1WldacFkybGhjbWx2UGdvSkNUeHdZWGxmYVRwa1pXNXZiV2x1WVhwcGIyNWxRbVZ1WldacFkybGhjbWx2UG5oNGVIZzhMM0JoZVY5cE9tUmxibTl0YVc1aGVtbHZibVZDWlc1bFptbGphV0Z5YVc4K0NnazhMM0JoZVY5cE9tVnVkR1ZDWlc1bFptbGphV0Z5YVc4K0NnazhjR0Y1WDJrNmMyOW5aMlYwZEc5V1pYSnpZVzUwWlQ0S0NRazhjR0Y1WDJrNmFXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZWbVZ5YzJGdWRHVStDZ2tKQ1R4d1lYbGZhVHAwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQa1k4TDNCaGVWOXBPblJwY0c5SlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtDZ2tKQ1R4d1lYbGZhVHBqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrZUhoNGVIaDRQQzl3WVhsZmFUcGpiMlJwWTJWSlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtDZ2tKUEM5d1lYbGZhVHBwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5V1pYSnpZVzUwWlQ0S0NRazhjR0Y1WDJrNllXNWhaM0poWm1sallWWmxjbk5oYm5SbFBuaDRlSGg0UEM5d1lYbGZhVHBoYm1GbmNtRm1hV05oVm1WeWMyRnVkR1UrQ2drOEwzQmhlVjlwT25OdloyZGxkSFJ2Vm1WeWMyRnVkR1UrQ2drOGNHRjVYMms2YzI5bloyVjBkRzlRWVdkaGRHOXlaVDRLQ1FrOGNHRjVYMms2YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlVHRm5ZWFJ2Y21VK0Nna0pDVHh3WVhsZmFUcDBhWEJ2U1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBrWThMM0JoZVY5cE9uUnBjRzlKWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI4K0Nna0pDVHh3WVhsZmFUcGpiMlJwWTJWSlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtlSGg0ZUhnOEwzQmhlVjlwT21OdlpHbGpaVWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno0S0NRazhMM0JoZVY5cE9tbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiMUJoWjJGMGIzSmxQZ29KQ1R4d1lYbGZhVHBoYm1GbmNtRm1hV05oVUdGbllYUnZjbVUrZUhoNGVIaDRQQzl3WVhsZmFUcGhibUZuY21GbWFXTmhVR0ZuWVhSdmNtVStDZ2s4TDNCaGVWOXBPbk52WjJkbGRIUnZVR0ZuWVhSdmNtVStDZ2s4Y0dGNVgyazZaR0YwYVZCaFoyRnRaVzUwYno0S0NRazhjR0Y1WDJrNlkyOWthV05sUlhOcGRHOVFZV2RoYldWdWRHOCtNRHd2Y0dGNVgyazZZMjlrYVdObFJYTnBkRzlRWVdkaGJXVnVkRzgrQ2drSlBIQmhlVjlwT21sdGNHOXlkRzlVYjNSaGJHVlFZV2RoZEc4K016QXdMakF3UEM5d1lYbGZhVHBwYlhCdmNuUnZWRzkwWVd4bFVHRm5ZWFJ2UGdvSkNUeHdZWGxmYVRwcFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOVdaWEp6WVcxbGJuUnZQakF4TURBd01EQXdNREF3TURBd01URXlQQzl3WVhsZmFUcHBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlXWlhKellXMWxiblJ2UGdvSkNUeHdZWGxmYVRwRGIyUnBZMlZEYjI1MFpYTjBiMUJoWjJGdFpXNTBiejUwTURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURFeE1qd3ZjR0Y1WDJrNlEyOWthV05sUTI5dWRHVnpkRzlRWVdkaGJXVnVkRzgrQ2drSlBIQmhlVjlwT21SaGRHbFRhVzVuYjJ4dlVHRm5ZVzFsYm5SdlBnb0pDUWs4Y0dGNVgyazZjMmx1WjI5c2IwbHRjRzl5ZEc5UVlXZGhkRzgrTWpBd0xqQXdQQzl3WVhsZmFUcHphVzVuYjJ4dlNXMXdiM0owYjFCaFoyRjBiejRLQ1FrSlBIQmhlVjlwT21WemFYUnZVMmx1WjI5c2IxQmhaMkZ0Wlc1MGJ6NVFRVWRCVkVFOEwzQmhlVjlwT21WemFYUnZVMmx1WjI5c2IxQmhaMkZ0Wlc1MGJ6NEtDUWtKUEhCaGVWOXBPbVJoZEdGRmMybDBiMU5wYm1kdmJHOVFZV2RoYldWdWRHOCtNakF5TkMwd05DMHhOand2Y0dGNVgyazZaR0YwWVVWemFYUnZVMmx1WjI5c2IxQmhaMkZ0Wlc1MGJ6NEtDUWtKUEhCaGVWOXBPbWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFKcGMyTnZjM05wYjI1bFBqRXhNVHd2Y0dGNVgyazZhV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52VW1selkyOXpjMmx2Ym1VK0Nna0pDVHh3WVhsZmFUcGpZWFZ6WVd4bFZtVnljMkZ0Wlc1MGJ6NTRlSGg0ZUhoNFBDOXdZWGxmYVRwallYVnpZV3hsVm1WeWMyRnRaVzUwYno0S0NRa0pQSEJoZVY5cE9tUmhkR2xUY0dWamFXWnBZMmxTYVhOamIzTnphVzl1WlQ1NGVIaDRlSGc4TDNCaGVWOXBPbVJoZEdsVGNHVmphV1pwWTJsU2FYTmpiM056YVc5dVpUNEtDUWs4TDNCaGVWOXBPbVJoZEdsVGFXNW5iMnh2VUdGbllXMWxiblJ2UGdvSkNUeHdZWGxmYVRwa1lYUnBVMmx1WjI5c2IxQmhaMkZ0Wlc1MGJ6NEtDUWtKUEhCaGVWOXBPbk5wYm1kdmJHOUpiWEJ2Y25SdlVHRm5ZWFJ2UGpFd01DNHdNRHd2Y0dGNVgyazZjMmx1WjI5c2IwbHRjRzl5ZEc5UVlXZGhkRzgrQ2drSkNUeHdZWGxmYVRwbGMybDBiMU5wYm1kdmJHOVFZV2RoYldWdWRHOCtVRUZIUVZSQlBDOXdZWGxmYVRwbGMybDBiMU5wYm1kdmJHOVFZV2RoYldWdWRHOCtDZ2tKQ1R4d1lYbGZhVHBrWVhSaFJYTnBkRzlUYVc1bmIyeHZVR0ZuWVcxbGJuUnZQakl3TWpRdE1EUXRNVFk4TDNCaGVWOXBPbVJoZEdGRmMybDBiMU5wYm1kdmJHOVFZV2RoYldWdWRHOCtDZ2tKQ1R4d1lYbGZhVHBwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5U2FYTmpiM056YVc5dVpUNHhNVEk4TDNCaGVWOXBPbWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFKcGMyTnZjM05wYjI1bFBnb0pDUWs4Y0dGNVgyazZZMkYxYzJGc1pWWmxjbk5oYldWdWRHOCtlSGg0ZUhoNGVEd3ZjR0Y1WDJrNlkyRjFjMkZzWlZabGNuTmhiV1Z1ZEc4K0Nna0pDVHh3WVhsZmFUcGtZWFJwVTNCbFkybG1hV05wVW1selkyOXpjMmx2Ym1VK2VIaDRlSGg0UEM5d1lYbGZhVHBrWVhScFUzQmxZMmxtYVdOcFVtbHpZMjl6YzJsdmJtVStDZ2tKUEM5d1lYbGZhVHBrWVhScFUybHVaMjlzYjFCaFoyRnRaVzUwYno0S0NUd3ZjR0Y1WDJrNlpHRjBhVkJoWjJGdFpXNTBiejRLUEM5d1lYbGZhVHBTVkQ0PTwvcnQ+CgkJPC9uczE6bm9kb0ludmlhUlQ+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg==',
];

$data_resp = [
    ':id' => 140,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 08:37:01.197',
    ':tipoevento' => 'nodoInviaRT',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000112',
    ':ccp' => 't0000000000000000000000000000112',
    ':noticenumber' => '',
    ':creditorreferenceid' => '',
    ':paymenttoken' => '',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_000021',
    ':sessionidoriginal' => 'session_id_original_000102',
    ':uniqueid' => 'T000140',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpiYz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0L0JhckNvZGVfR1MxXzEyOF9Nb2RpZmllZCIgeG1sbnM6cGF5X2k9Imh0dHA6Ly93d3cuZGlnaXRwYS5nb3YuaXQvc2NoZW1hcy8yMDExL1BhZ2FtZW50aS8iIHhtbG5zOnBwdD0iaHR0cDovL3dzLnBhZ2FtZW50aS50ZWxlbWF0aWNpLmdvdi8iIHhtbG5zOnFyYz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0L1FyQ29kZSIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnRucz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0L3NlcnZpemkvUGFnYW1lbnRpVGVsZW1hdGljaVBzcE5vZG8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxwcHQ6bm9kb0ludmlhUlRSaXNwb3N0YT4KCQkJPG5vZG9JbnZpYVJUUmlzcG9zdGE+CgkJCQk8ZXNpdG8+T0s8L2VzaXRvPgoJCQk8L25vZG9JbnZpYVJUUmlzcG9zdGE+CgkJPC9wcHQ6bm9kb0ludmlhUlRSaXNwb3N0YT4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+',
];


Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);

















































$data_req = [
    ':id'                       => 150,
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
    ':sessionid'                => '',
    ':sessionidoriginal'        => 'session_id_original_000150',
    ':uniqueid'                 => 'T000150',
    ':payload'                  => 'PFNPQVAtRU5WOkVudmVsb3BlIHhtbG5zOlNPQVAtRU5WPSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyIgeG1sbnM6cHB0PSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOndzPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyI+Cgk8U09BUC1FTlY6SGVhZGVyPgoJCTxwcHQ6aW50ZXN0YXppb25lQ2FycmVsbG9QUFQ+CgkJCTxpZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QQT43Nzc3Nzc3Nzc3NzwvaWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUEE+CgkJCTxpZGVudGlmaWNhdGl2b1N0YXppb25lSW50ZXJtZWRpYXJpb1BBPjc3Nzc3Nzc3Nzc3XzAxPC9pZGVudGlmaWNhdGl2b1N0YXppb25lSW50ZXJtZWRpYXJpb1BBPgoJCQk8aWRlbnRpZmljYXRpdm9DYXJyZWxsbz5jMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDE1MDwvaWRlbnRpZmljYXRpdm9DYXJyZWxsbz4KCQk8L3BwdDppbnRlc3RhemlvbmVDYXJyZWxsb1BQVD4KCTwvU09BUC1FTlY6SGVhZGVyPgoJPFNPQVAtRU5WOkJvZHk+CgkJPG5zMzpub2RvSW52aWFDYXJyZWxsb1JQVCB4bWxuczpuczM9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIj4KCQkJPHBhc3N3b3JkPlBMQUNFSE9MREVSPC9wYXNzd29yZD4KCQkJPGlkZW50aWZpY2F0aXZvUFNQPkFHSURfMDE8L2lkZW50aWZpY2F0aXZvUFNQPgoJCQk8aWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUFNQPjg4ODg4ODg4ODg4PC9pZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QU1A+CgkJCTxpZGVudGlmaWNhdGl2b0NhbmFsZT44ODg4ODg4ODg4OF8wMTwvaWRlbnRpZmljYXRpdm9DYW5hbGU+CgkJCTxsaXN0YVJQVD4KCQkJCTxlbGVtZW50b0xpc3RhUlBUPgoJCQkJCTxpZGVudGlmaWNhdGl2b0RvbWluaW8+Nzc3Nzc3Nzc3Nzc8L2lkZW50aWZpY2F0aXZvRG9taW5pbz4KCQkJCQk8aWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4wMTAwMDAwMDAwMDAwMDE1MDwvaWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4KCQkJCQk8Y29kaWNlQ29udGVzdG9QYWdhbWVudG8+dDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxNTA8L2NvZGljZUNvbnRlc3RvUGFnYW1lbnRvPgoJCQkJCTxycHQ+UEZKUVZDQjRiV3h1Y3owaWFIUjBjRG92TDNkM2R5NWthV2RwZEhCaExtZHZkaTVwZEM5elkyaGxiV0Z6THpJd01URXZVR0ZuWVcxbGJuUnBMeUkrQ2drOGRtVnljMmx2Ym1WUFoyZGxkSFJ2UGpFdU1Ed3ZkbVZ5YzJsdmJtVlBaMmRsZEhSdlBnb0pQR1J2YldsdWFXOCtDZ2tKUEdsa1pXNTBhV1pwWTJGMGFYWnZSRzl0YVc1cGJ6NDNOemMzTnpjM056YzNOend2YVdSbGJuUnBabWxqWVhScGRtOUViMjFwYm1sdlBnb0pQQzlrYjIxcGJtbHZQZ29KUEdsa1pXNTBhV1pwWTJGMGFYWnZUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQakl3TWpNeE1qRTFNREV3TVRVek9XRmlZbUV6TXpVdFlXSTBaUzAwWkRFNExXRXpQQzlwWkdWdWRHbG1hV05oZEdsMmIwMWxjM05oWjJkcGIxSnBZMmhwWlhOMFlUNEtDVHhrWVhSaFQzSmhUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQakl3TWpNdE1USXRNVFZVTVRNNk1ERTZOVE11TmpFNUt6QXhPakF3UEM5a1lYUmhUM0poVFdWemMyRm5aMmx2VW1samFHbGxjM1JoUGdvSlBHRjFkR1Z1ZEdsallYcHBiMjVsVTI5bloyVjBkRzgrVGk5QlBDOWhkWFJsYm5ScFkyRjZhVzl1WlZOdloyZGxkSFJ2UGdvSlBITnZaMmRsZEhSdlZtVnljMkZ1ZEdVK0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFabGNuTmhiblJsUGdvSkNRazhkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NUhQQzkwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1FrOFkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBqYzNOemMzTnpjM056YzNQQzlqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSlBDOXBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlXWlhKellXNTBaVDRLQ1FrOFlXNWhaM0poWm1sallWWmxjbk5oYm5SbFBuaDRlSGg0ZUhoNGVEd3ZZVzVoWjNKaFptbGpZVlpsY25OaGJuUmxQZ29KUEM5emIyZG5aWFIwYjFabGNuTmhiblJsUGdvSlBITnZaMmRsZEhSdlVHRm5ZWFJ2Y21VK0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFCaFoyRjBiM0psUGdvSkNRazhkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NUhQQzkwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1FrOFkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBqYzNOemMzTnpjM056YzNQQzlqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSlBDOXBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlRWVdkaGRHOXlaVDRLQ1FrOFlXNWhaM0poWm1sallWQmhaMkYwYjNKbFBuaDRlSGg0ZUhoNGVEd3ZZVzVoWjNKaFptbGpZVkJoWjJGMGIzSmxQZ29KUEM5emIyZG5aWFIwYjFCaFoyRjBiM0psUGdvSlBHVnVkR1ZDWlc1bFptbGphV0Z5YVc4K0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjBKbGJtVm1hV05wWVhKcGJ6NEtDUWtKUEhScGNHOUpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrUnp3dmRHbHdiMGxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno0S0NRa0pQR052WkdsalpVbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejQzTnpjM056YzNOemMzTnp3dlkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBnb0pDVHd2YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlFtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4a1pXNXZiV2x1WVhwcGIyNWxRbVZ1WldacFkybGhjbWx2UG5oNGVIaDRlSGc4TDJSbGJtOXRhVzVoZW1sdmJtVkNaVzVsWm1samFXRnlhVzgrQ2drSlBHTnZaR2xqWlZWdWFYUlBjR1Z5UW1WdVpXWnBZMmxoY21sdlBuaDRQQzlqYjJScFkyVlZibWwwVDNCbGNrSmxibVZtYVdOcFlYSnBiejRLQ1FrOFpHVnViMjFWYm1sMFQzQmxja0psYm1WbWFXTnBZWEpwYno1NGVIaDRlSGc4TDJSbGJtOXRWVzVwZEU5d1pYSkNaVzVsWm1samFXRnlhVzgrQ2drSlBHbHVaR2x5YVhwNmIwSmxibVZtYVdOcFlYSnBiejU0ZUhoNFBDOXBibVJwY21sNmVtOUNaVzVsWm1samFXRnlhVzgrQ2drSlBHTnBkbWxqYjBKbGJtVm1hV05wWVhKcGJ6NTRlSGc4TDJOcGRtbGpiMEpsYm1WbWFXTnBZWEpwYno0S0NRazhZMkZ3UW1WdVpXWnBZMmxoY21sdlBuaDRlSGg0UEM5allYQkNaVzVsWm1samFXRnlhVzgrQ2drSlBHeHZZMkZzYVhSaFFtVnVaV1pwWTJsaGNtbHZQbmg0ZUhnOEwyeHZZMkZzYVhSaFFtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4d2NtOTJhVzVqYVdGQ1pXNWxabWxqYVdGeWFXOCtlSGc4TDNCeWIzWnBibU5wWVVKbGJtVm1hV05wWVhKcGJ6NEtDUWs4Ym1GNmFXOXVaVUpsYm1WbWFXTnBZWEpwYno1NGVEd3ZibUY2YVc5dVpVSmxibVZtYVdOcFlYSnBiejRLQ1R3dlpXNTBaVUpsYm1WbWFXTnBZWEpwYno0S0NUeGtZWFJwVm1WeWMyRnRaVzUwYno0S0NRazhaR0YwWVVWelpXTjFlbWx2Ym1WUVlXZGhiV1Z1ZEc4K01qQXlNeTB4TWkweE5Tc3dNVG93TUR3dlpHRjBZVVZ6WldOMWVtbHZibVZRWVdkaGJXVnVkRzgrQ2drSlBHbHRjRzl5ZEc5VWIzUmhiR1ZFWVZabGNuTmhjbVUrTmpVMUxqQXdQQzlwYlhCdmNuUnZWRzkwWVd4bFJHRldaWEp6WVhKbFBnb0pDVHgwYVhCdlZtVnljMkZ0Wlc1MGJ6NUNRbFE4TDNScGNHOVdaWEp6WVcxbGJuUnZQZ29KQ1R4cFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOVdaWEp6WVcxbGJuUnZQakF4TURBd01EQXdNREF3TURBd01UVXdQQzlwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5V1pYSnpZVzFsYm5SdlBnb0pDVHhqYjJScFkyVkRiMjUwWlhOMGIxQmhaMkZ0Wlc1MGJ6NTBNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREUxTUR3dlkyOWthV05sUTI5dWRHVnpkRzlRWVdkaGJXVnVkRzgrQ2drSlBHWnBjbTFoVW1salpYWjFkR0UrTUR3dlptbHliV0ZTYVdObGRuVjBZVDRLQ1FrOFpHRjBhVk5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KQ1FrOGFXMXdiM0owYjFOcGJtZHZiRzlXWlhKellXMWxiblJ2UGpNMU5TNHdNRHd2YVcxd2IzSjBiMU5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KQ1FrOGFXSmhia0ZqWTNKbFpHbDBiejVKVkRFNFZUQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNVEE4TDJsaVlXNUJZMk55WldScGRHOCtDZ2tKQ1R4allYVnpZV3hsVm1WeWMyRnRaVzUwYno1NGVIaDRlSGg0UEM5allYVnpZV3hsVm1WeWMyRnRaVzUwYno0S0NRa0pQR1JoZEdsVGNHVmphV1pwWTJsU2FYTmpiM056YVc5dVpUNTRlSGg0ZUhoNFBDOWtZWFJwVTNCbFkybG1hV05wVW1selkyOXpjMmx2Ym1VK0Nna0pQQzlrWVhScFUybHVaMjlzYjFabGNuTmhiV1Z1ZEc4K0Nna0pQR1JoZEdsVGFXNW5iMnh2Vm1WeWMyRnRaVzUwYno0S0NRa0pQR2x0Y0c5eWRHOVRhVzVuYjJ4dlZtVnljMkZ0Wlc1MGJ6NHpNREF1TURBOEwybHRjRzl5ZEc5VGFXNW5iMnh2Vm1WeWMyRnRaVzUwYno0S0NRa0pQR2xpWVc1QlkyTnlaV1JwZEc4K1NWUXhPRlV3TURBd01EQXdNREF3TURBd01EQXdNREF3TURFeFBDOXBZbUZ1UVdOamNtVmthWFJ2UGdvSkNRazhZMkYxYzJGc1pWWmxjbk5oYldWdWRHOCtlSGg0ZUhoNGVEd3ZZMkYxYzJGc1pWWmxjbk5oYldWdWRHOCtDZ2tKQ1R4a1lYUnBVM0JsWTJsbWFXTnBVbWx6WTI5emMybHZibVUrZUhoNGVIaDRlRHd2WkdGMGFWTndaV05wWm1samFWSnBjMk52YzNOcGIyNWxQZ29KQ1R3dlpHRjBhVk5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ2tLQ1R3dlpHRjBhVlpsY25OaGJXVnVkRzgrQ2p3dlVsQlVQZz09PC9ycHQ+CgkJCQk8L2VsZW1lbnRvTGlzdGFSUFQ+CgkJCQk8ZWxlbWVudG9MaXN0YVJQVD4KCQkJCQk8aWRlbnRpZmljYXRpdm9Eb21pbmlvPjc3Nzc3Nzc3Nzc3PC9pZGVudGlmaWNhdGl2b0RvbWluaW8+CgkJCQkJPGlkZW50aWZpY2F0aXZvVW5pdm9jb1ZlcnNhbWVudG8+MDEwMDAwMDAwMDAwMDAxNTE8L2lkZW50aWZpY2F0aXZvVW5pdm9jb1ZlcnNhbWVudG8+CgkJCQkJPGNvZGljZUNvbnRlc3RvUGFnYW1lbnRvPnQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMTUwPC9jb2RpY2VDb250ZXN0b1BhZ2FtZW50bz4KCQkJCQk8cnB0PlBGSlFWQ0I0Yld4dWN6MGlhSFIwY0RvdkwzZDNkeTVrYVdkcGRIQmhMbWR2ZGk1cGRDOXpZMmhsYldGekx6SXdNVEV2VUdGbllXMWxiblJwTHlJK0NnazhkbVZ5YzJsdmJtVlBaMmRsZEhSdlBqRXVNRHd2ZG1WeWMybHZibVZQWjJkbGRIUnZQZ29KUEdSdmJXbHVhVzgrQ2drSlBHbGtaVzUwYVdacFkyRjBhWFp2Ukc5dGFXNXBiejQzTnpjM056YzNOemMzTnp3dmFXUmxiblJwWm1sallYUnBkbTlFYjIxcGJtbHZQZ29KUEM5a2IyMXBibWx2UGdvSlBHbGtaVzUwYVdacFkyRjBhWFp2VFdWemMyRm5aMmx2VW1samFHbGxjM1JoUGpJd01qTXhNakUxTURFd01UVXpPV0ZpWW1Fek16VXRZV0kwWlMwMFpERTRMV0V6UEM5cFpHVnVkR2xtYVdOaGRHbDJiMDFsYzNOaFoyZHBiMUpwWTJocFpYTjBZVDRLQ1R4a1lYUmhUM0poVFdWemMyRm5aMmx2VW1samFHbGxjM1JoUGpJd01qTXRNVEl0TVRWVU1UTTZNREU2TlRNdU5qRTVLekF4T2pBd1BDOWtZWFJoVDNKaFRXVnpjMkZuWjJsdlVtbGphR2xsYzNSaFBnb0pQR0YxZEdWdWRHbGpZWHBwYjI1bFUyOW5aMlYwZEc4K1RpOUJQQzloZFhSbGJuUnBZMkY2YVc5dVpWTnZaMmRsZEhSdlBnb0pQSE52WjJkbGRIUnZWbVZ5YzJGdWRHVStDZ2tKUEdsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amIxWmxjbk5oYm5SbFBnb0pDUWs4ZEdsd2IwbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejVIUEM5MGFYQnZTV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52UGdvSkNRazhZMjlrYVdObFNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQamMzTnpjM056YzNOemMzUEM5amIyUnBZMlZKWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI4K0Nna0pQQzlwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5V1pYSnpZVzUwWlQ0S0NRazhZVzVoWjNKaFptbGpZVlpsY25OaGJuUmxQbmg0ZUhoNGVIaDRlRHd2WVc1aFozSmhabWxqWVZabGNuTmhiblJsUGdvSlBDOXpiMmRuWlhSMGIxWmxjbk5oYm5SbFBnb0pQSE52WjJkbGRIUnZVR0ZuWVhSdmNtVStDZ2tKUEdsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amIxQmhaMkYwYjNKbFBnb0pDUWs4ZEdsd2IwbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejVIUEM5MGFYQnZTV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52UGdvSkNRazhZMjlrYVdObFNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQamMzTnpjM056YzNOemMzUEM5amIyUnBZMlZKWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI4K0Nna0pQQzlwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5UVlXZGhkRzl5WlQ0S0NRazhZVzVoWjNKaFptbGpZVkJoWjJGMGIzSmxQbmg0ZUhoNGVIaDRlRHd2WVc1aFozSmhabWxqWVZCaFoyRjBiM0psUGdvSlBDOXpiMmRuWlhSMGIxQmhaMkYwYjNKbFBnb0pQR1Z1ZEdWQ1pXNWxabWxqYVdGeWFXOCtDZ2tKUEdsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amIwSmxibVZtYVdOcFlYSnBiejRLQ1FrSlBIUnBjRzlKWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI4K1J6d3ZkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NEtDUWtKUEdOdlpHbGpaVWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno0M056YzNOemMzTnpjM056d3ZZMjlrYVdObFNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1R3dmFXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZRbVZ1WldacFkybGhjbWx2UGdvSkNUeGtaVzV2YldsdVlYcHBiMjVsUW1WdVpXWnBZMmxoY21sdlBuaDRlSGg0ZUhnOEwyUmxibTl0YVc1aGVtbHZibVZDWlc1bFptbGphV0Z5YVc4K0Nna0pQR052WkdsalpWVnVhWFJQY0dWeVFtVnVaV1pwWTJsaGNtbHZQbmg0UEM5amIyUnBZMlZWYm1sMFQzQmxja0psYm1WbWFXTnBZWEpwYno0S0NRazhaR1Z1YjIxVmJtbDBUM0JsY2tKbGJtVm1hV05wWVhKcGJ6NTRlSGg0ZUhnOEwyUmxibTl0Vlc1cGRFOXdaWEpDWlc1bFptbGphV0Z5YVc4K0Nna0pQR2x1WkdseWFYcDZiMEpsYm1WbWFXTnBZWEpwYno1NGVIaDRQQzlwYm1ScGNtbDZlbTlDWlc1bFptbGphV0Z5YVc4K0Nna0pQR05wZG1samIwSmxibVZtYVdOcFlYSnBiejU0ZUhnOEwyTnBkbWxqYjBKbGJtVm1hV05wWVhKcGJ6NEtDUWs4WTJGd1FtVnVaV1pwWTJsaGNtbHZQbmg0ZUhoNFBDOWpZWEJDWlc1bFptbGphV0Z5YVc4K0Nna0pQR3h2WTJGc2FYUmhRbVZ1WldacFkybGhjbWx2UG5oNGVIZzhMMnh2WTJGc2FYUmhRbVZ1WldacFkybGhjbWx2UGdvSkNUeHdjbTkyYVc1amFXRkNaVzVsWm1samFXRnlhVzgrZUhnOEwzQnliM1pwYm1OcFlVSmxibVZtYVdOcFlYSnBiejRLQ1FrOGJtRjZhVzl1WlVKbGJtVm1hV05wWVhKcGJ6NTRlRHd2Ym1GNmFXOXVaVUpsYm1WbWFXTnBZWEpwYno0S0NUd3ZaVzUwWlVKbGJtVm1hV05wWVhKcGJ6NEtDVHhrWVhScFZtVnljMkZ0Wlc1MGJ6NEtDUWs4WkdGMFlVVnpaV04xZW1sdmJtVlFZV2RoYldWdWRHOCtNakF5TXkweE1pMHhOU3N3TVRvd01Ed3ZaR0YwWVVWelpXTjFlbWx2Ym1WUVlXZGhiV1Z1ZEc4K0Nna0pQR2x0Y0c5eWRHOVViM1JoYkdWRVlWWmxjbk5oY21VK05qRTJMakF3UEM5cGJYQnZjblJ2Vkc5MFlXeGxSR0ZXWlhKellYSmxQZ29KQ1R4MGFYQnZWbVZ5YzJGdFpXNTBiejVDUWxROEwzUnBjRzlXWlhKellXMWxiblJ2UGdvSkNUeHBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlXWlhKellXMWxiblJ2UGpBeE1EQXdNREF3TURBd01EQXdNVFV4UEM5cFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOVdaWEp6WVcxbGJuUnZQZ29KQ1R4amIyUnBZMlZEYjI1MFpYTjBiMUJoWjJGdFpXNTBiejUwTURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURFMU1Ud3ZZMjlrYVdObFEyOXVkR1Z6ZEc5UVlXZGhiV1Z1ZEc4K0Nna0pQR1pwY20xaFVtbGpaWFoxZEdFK01Ed3ZabWx5YldGU2FXTmxkblYwWVQ0S0NRazhaR0YwYVZOcGJtZHZiRzlXWlhKellXMWxiblJ2UGdvSkNRazhhVzF3YjNKMGIxTnBibWR2Ykc5V1pYSnpZVzFsYm5SdlBqWXdNQzR3TUR3dmFXMXdiM0owYjFOcGJtZHZiRzlXWlhKellXMWxiblJ2UGdvSkNRazhhV0poYmtGalkzSmxaR2wwYno1SlZERTRWVEF3TURBd01EQXdNREF3TURBd01EQXdNREF3TVRBOEwybGlZVzVCWTJOeVpXUnBkRzgrQ2drSkNUeGpZWFZ6WVd4bFZtVnljMkZ0Wlc1MGJ6NTRlSGg0ZUhoNFBDOWpZWFZ6WVd4bFZtVnljMkZ0Wlc1MGJ6NEtDUWtKUEdSaGRHbFRjR1ZqYVdacFkybFNhWE5qYjNOemFXOXVaVDU0ZUhoNGVIaDRQQzlrWVhScFUzQmxZMmxtYVdOcFVtbHpZMjl6YzJsdmJtVStDZ2tKUEM5a1lYUnBVMmx1WjI5c2IxWmxjbk5oYldWdWRHOCtDZ2tKUEdSaGRHbFRhVzVuYjJ4dlZtVnljMkZ0Wlc1MGJ6NEtDUWtKUEdsdGNHOXlkRzlUYVc1bmIyeHZWbVZ5YzJGdFpXNTBiejR4Tmk0d01Ed3ZhVzF3YjNKMGIxTnBibWR2Ykc5V1pYSnpZVzFsYm5SdlBnb0pDUWs4WTJGMWMyRnNaVlpsY25OaGJXVnVkRzgrZUhoNGVIaDRlRHd2WTJGMWMyRnNaVlpsY25OaGJXVnVkRzgrQ2drSkNUeGtZWFJwVTNCbFkybG1hV05wVW1selkyOXpjMmx2Ym1VK2VIaDRlSGg0ZUR3dlpHRjBhVk53WldOcFptbGphVkpwYzJOdmMzTnBiMjVsUGdvSkNRazhaR0YwYVUxaGNtTmhRbTlzYkc5RWFXZHBkR0ZzWlQ0S0lDQWdJQ0FnSUNBZ0lDQWdDVHgwYVhCdlFtOXNiRzgrTURFOEwzUnBjRzlDYjJ4c2J6NEtJQ0FnSUNBZ0lDQWdJQ0FnQ1R4b1lYTm9SRzlqZFcxbGJuUnZQbmg0ZUhnOEwyaGhjMmhFYjJOMWJXVnVkRzgrQ2lBZ0lDQWdJQ0FnSUNBZ0lBazhjSEp2ZG1sdVkybGhVbVZ6YVdSbGJucGhQbEpOUEM5d2NtOTJhVzVqYVdGU1pYTnBaR1Z1ZW1FK0NpQWdJQ0FnSUNBZ0lBazhMMlJoZEdsTllYSmpZVUp2Ykd4dlJHbG5hWFJoYkdVK0Nna0pQQzlrWVhScFUybHVaMjlzYjFabGNuTmhiV1Z1ZEc4K0NRb0pQQzlrWVhScFZtVnljMkZ0Wlc1MGJ6NEtQQzlTVUZRKzwvcnB0PgoJCQkJPC9lbGVtZW50b0xpc3RhUlBUPgoJCQk8L2xpc3RhUlBUPgoJCQk8bXVsdGlCZW5lZmljaWFyaW8+ZmFsc2U8L211bHRpQmVuZWZpY2lhcmlvPgoJCTwvbnMzOm5vZG9JbnZpYUNhcnJlbGxvUlBUPgoJPC9TT0FQLUVOVjpCb2R5Pgo8L1NPQVAtRU5WOkVudmVsb3BlPg==',
];

$data_resp = [
    ':id'                       => 151,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 10:20:01.197',
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
    ':sessionid'                => '',
    ':sessionidoriginal'        => 'session_id_original_000150',
    ':uniqueid'                 => 'T000151',
    ':payload'                  => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpwcHQ9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIiB4bWxuczpwcHRoZWFkPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIiB4bWxuczp0bnM9Imh0dHA6Ly9Ob2RvUGFnYW1lbnRpU1BDLnNwY29vcC5nb3YuaXQvc2Vydml6aS9QYWdhbWVudGlUZWxlbWF0aWNpUlBUIiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBwdDpub2RvSW52aWFDYXJyZWxsb1JQVFJpc3Bvc3RhPgoJCQk8ZXNpdG9Db21wbGVzc2l2b09wZXJhemlvbmU+T0s8L2VzaXRvQ29tcGxlc3Npdm9PcGVyYXppb25lPgoJCQk8dXJsPmh0dHBzOi8vd2lzcDIucGFnb3BhLmdvdi5pdC93YWxsZXQvd2VsY29tZT9pZFNlc3Npb249eHh4eHh4PC91cmw+CgkJPC9wcHQ6bm9kb0ludmlhQ2FycmVsbG9SUFRSaXNwb3N0YT4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+',
];

Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);






$data_req = [
    ':id' => 152,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 10:21:00.197',
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
    ':sessionid' => 'sessid_100151',
    ':sessionidoriginal' => 'session_id_original_000150',
    ':uniqueid' => 'T000152',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpwYXlfaj0iaHR0cDovL3d3dy5jbmlwYS5nb3YuaXQvc2NoZW1hcy8yMDEwL1BhZ2FtZW50aS9BY2tfMV8wLyIgeG1sbnM6cHB0PSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnRucz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0IiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBwdDpwc3BJbnZpYUNhcnJlbGxvUlBUPgoJCQk8aWRlbnRpZmljYXRpdm9QU1A+UFNQX1JQVDwvaWRlbnRpZmljYXRpdm9QU1A+CgkJCTxpZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QU1A+ODg4ODg4ODg4ODg8L2lkZW50aWZpY2F0aXZvSW50ZXJtZWRpYXJpb1BTUD4KCQkJPGlkZW50aWZpY2F0aXZvQ2FuYWxlPjg4ODg4ODg4ODg4XzAxPC9pZGVudGlmaWNhdGl2b0NhbmFsZT4KCQkJPG1vZGVsbG9QYWdhbWVudG8+MTwvbW9kZWxsb1BhZ2FtZW50bz4KCQkJPGxpc3RhUlBUPgoJCQkJPGVsZW1lbnRvTGlzdGFDYXJyZWxsb1JQVD4KCQkJCQk8aWRlbnRpZmljYXRpdm9Eb21pbmlvPjc3Nzc3Nzc3Nzc3PC9pZGVudGlmaWNhdGl2b0RvbWluaW8+CgkJCQkJPGlkZW50aWZpY2F0aXZvVW5pdm9jb1ZlcnNhbWVudG8+MDEwMDAwMDAwMDAwMDAxNTA8L2lkZW50aWZpY2F0aXZvVW5pdm9jb1ZlcnNhbWVudG8+CgkJCQkJPGNvZGljZUNvbnRlc3RvUGFnYW1lbnRvPnQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMTUwPC9jb2RpY2VDb250ZXN0b1BhZ2FtZW50bz4KCQkJCQk8cnB0PlBGSlFWQ0I0Yld4dWN6MGlhSFIwY0RvdkwzZDNkeTVrYVdkcGRIQmhMbWR2ZGk1cGRDOXpZMmhsYldGekx6SXdNVEV2VUdGbllXMWxiblJwTHlJK0NpQWdJQ0E4ZG1WeWMybHZibVZQWjJkbGRIUnZQall1TWk0d1BDOTJaWEp6YVc5dVpVOW5aMlYwZEc4K0NpQWdJQ0E4Wkc5dGFXNXBiejRLSUNBZ0lDQWdJQ0E4YVdSbGJuUnBabWxqWVhScGRtOUViMjFwYm1sdlBqYzNOemMzTnpjM056YzNQQzlwWkdWdWRHbG1hV05oZEdsMmIwUnZiV2x1YVc4K0NpQWdJQ0FnSUNBZ1BHbGtaVzUwYVdacFkyRjBhWFp2VTNSaGVtbHZibVZTYVdOb2FXVmtaVzUwWlQ0M056YzNOemMzTnpjM04xOHdNVHd2YVdSbGJuUnBabWxqWVhScGRtOVRkR0Y2YVc5dVpWSnBZMmhwWldSbGJuUmxQZ29nSUNBZ1BDOWtiMjFwYm1sdlBnb2dJQ0FnUEdsa1pXNTBhV1pwWTJGMGFYWnZUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQbmg0ZUhoNFBDOXBaR1Z1ZEdsbWFXTmhkR2wyYjAxbGMzTmhaMmRwYjFKcFkyaHBaWE4wWVQ0S0lDQWdJRHhrWVhSaFQzSmhUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQakl3TWpRdE1EUXRNRGxVTWpFNk5UTTZNelk4TDJSaGRHRlBjbUZOWlhOellXZG5hVzlTYVdOb2FXVnpkR0UrQ2lBZ0lDQThZWFYwWlc1MGFXTmhlbWx2Ym1WVGIyZG5aWFIwYno1NGVIZzhMMkYxZEdWdWRHbGpZWHBwYjI1bFUyOW5aMlYwZEc4K0NpQWdJQ0E4YzI5bloyVjBkRzlRWVdkaGRHOXlaVDRLSUNBZ0lDQWdJQ0E4YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlVHRm5ZWFJ2Y21VK0NpQWdJQ0FnSUNBZ0lDQWdJRHgwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQbmc4TDNScGNHOUpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2lBZ0lDQWdJQ0FnSUNBZ0lEeGpiMlJwWTJWSlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtlSGg0ZUhoNGVEd3ZZMjlrYVdObFNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29nSUNBZ0lDQWdJRHd2YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlVHRm5ZWFJ2Y21VK0NpQWdJQ0FnSUNBZ1BHRnVZV2R5WVdacFkyRlFZV2RoZEc5eVpUNTRlSGg0ZUR3dllXNWhaM0poWm1sallWQmhaMkYwYjNKbFBnb2dJQ0FnSUNBZ0lEeHVZWHBwYjI1bFVHRm5ZWFJ2Y21VK1NWUThMMjVoZW1sdmJtVlFZV2RoZEc5eVpUNEtJQ0FnSUNBZ0lDQThaUzF0WVdsc1VHRm5ZWFJ2Y21VK2VIaDRlSGhBZUhoNGVDNWpiMjA4TDJVdGJXRnBiRkJoWjJGMGIzSmxQZ29nSUNBZ1BDOXpiMmRuWlhSMGIxQmhaMkYwYjNKbFBnb2dJQ0FnUEdWdWRHVkNaVzVsWm1samFXRnlhVzgrQ2lBZ0lDQWdJQ0FnUEdsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amIwSmxibVZtYVdOcFlYSnBiejRLSUNBZ0lDQWdJQ0FnSUNBZ1BIUnBjRzlKWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI4K1J6d3ZkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NEtJQ0FnSUNBZ0lDQWdJQ0FnUEdOdlpHbGpaVWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno1NGVIaDRlSGc4TDJOdlpHbGpaVWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno0S0lDQWdJQ0FnSUNBOEwybGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiMEpsYm1WbWFXTnBZWEpwYno0S0lDQWdJQ0FnSUNBOFpHVnViMjFwYm1GNmFXOXVaVUpsYm1WbWFXTnBZWEpwYno1NGVIaDRlRHd2WkdWdWIyMXBibUY2YVc5dVpVSmxibVZtYVdOcFlYSnBiejRLSUNBZ0lEd3ZaVzUwWlVKbGJtVm1hV05wWVhKcGJ6NEtDVHhrWVhScFZtVnljMkZ0Wlc1MGJ6NEtDUWs4WkdGMFlVVnpaV04xZW1sdmJtVlFZV2RoYldWdWRHOCtNakF5TXkweE1pMHhOU3N3TVRvd01Ed3ZaR0YwWVVWelpXTjFlbWx2Ym1WUVlXZGhiV1Z1ZEc4K0Nna0pQR2x0Y0c5eWRHOVViM1JoYkdWRVlWWmxjbk5oY21VK05qVTFMakF3UEM5cGJYQnZjblJ2Vkc5MFlXeGxSR0ZXWlhKellYSmxQZ29KQ1R4MGFYQnZWbVZ5YzJGdFpXNTBiejVDUWxROEwzUnBjRzlXWlhKellXMWxiblJ2UGdvSkNUeHBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlXWlhKellXMWxiblJ2UGpBeE1EQXdNREF3TURBd01EQXdNVFV3UEM5cFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOVdaWEp6WVcxbGJuUnZQZ29KQ1R4amIyUnBZMlZEYjI1MFpYTjBiMUJoWjJGdFpXNTBiejUwTURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURFMU1Ed3ZZMjlrYVdObFEyOXVkR1Z6ZEc5UVlXZGhiV1Z1ZEc4K0Nna0pQR1pwY20xaFVtbGpaWFoxZEdFK01Ed3ZabWx5YldGU2FXTmxkblYwWVQ0S0NRazhaR0YwYVZOcGJtZHZiRzlXWlhKellXMWxiblJ2UGdvSkNRazhhVzF3YjNKMGIxTnBibWR2Ykc5V1pYSnpZVzFsYm5SdlBqTTFOUzR3TUR3dmFXMXdiM0owYjFOcGJtZHZiRzlXWlhKellXMWxiblJ2UGdvSkNRazhhV0poYmtGalkzSmxaR2wwYno1SlZERTRWVEF3TURBd01EQXdNREF3TURBd01EQXdNREF3TVRBOEwybGlZVzVCWTJOeVpXUnBkRzgrQ2drSkNUeGpZWFZ6WVd4bFZtVnljMkZ0Wlc1MGJ6NTRlSGg0ZUhoNFBDOWpZWFZ6WVd4bFZtVnljMkZ0Wlc1MGJ6NEtDUWtKUEdSaGRHbFRjR1ZqYVdacFkybFNhWE5qYjNOemFXOXVaVDU0ZUhoNGVIaDRQQzlrWVhScFUzQmxZMmxtYVdOcFVtbHpZMjl6YzJsdmJtVStDZ2tKUEM5a1lYUnBVMmx1WjI5c2IxWmxjbk5oYldWdWRHOCtDZ2tKUEdSaGRHbFRhVzVuYjJ4dlZtVnljMkZ0Wlc1MGJ6NEtDUWtKUEdsdGNHOXlkRzlUYVc1bmIyeHZWbVZ5YzJGdFpXNTBiejR6TURBdU1EQThMMmx0Y0c5eWRHOVRhVzVuYjJ4dlZtVnljMkZ0Wlc1MGJ6NEtDUWtKUEdsaVlXNUJZMk55WldScGRHOCtTVlF4T0ZVd01EQXdNREF3TURBd01EQXdNREF3TURBd01ERXhQQzlwWW1GdVFXTmpjbVZrYVhSdlBnb0pDUWs4WTJGMWMyRnNaVlpsY25OaGJXVnVkRzgrZUhoNGVIaDRlRHd2WTJGMWMyRnNaVlpsY25OaGJXVnVkRzgrQ2drSkNUeGtZWFJwVTNCbFkybG1hV05wVW1selkyOXpjMmx2Ym1VK2VIaDRlSGg0ZUR3dlpHRjBhVk53WldOcFptbGphVkpwYzJOdmMzTnBiMjVsUGdvSkNUd3ZaR0YwYVZOcGJtZHZiRzlXWlhKellXMWxiblJ2UGdrS0NUd3ZaR0YwYVZabGNuTmhiV1Z1ZEc4K0Nqd3ZVbEJVUGc9PTwvcnB0PgoJCQkJPC9lbGVtZW50b0xpc3RhQ2FycmVsbG9SUFQ+CgkJCQk8ZWxlbWVudG9MaXN0YUNhcnJlbGxvUlBUPgoJCQkJCTxpZGVudGlmaWNhdGl2b0RvbWluaW8+Nzc3Nzc3Nzc3Nzc8L2lkZW50aWZpY2F0aXZvRG9taW5pbz4KCQkJCQk8aWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4wMTAwMDAwMDAwMDAwMDE1MTwvaWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4KCQkJCQk8Y29kaWNlQ29udGVzdG9QYWdhbWVudG8+dDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxNTA8L2NvZGljZUNvbnRlc3RvUGFnYW1lbnRvPgoJCQkJCTxycHQ+UEZKUVZDQjRiV3h1Y3owaWFIUjBjRG92TDNkM2R5NWthV2RwZEhCaExtZHZkaTVwZEM5elkyaGxiV0Z6THpJd01URXZVR0ZuWVcxbGJuUnBMeUkrQ2lBZ0lDQThkbVZ5YzJsdmJtVlBaMmRsZEhSdlBqWXVNaTR3UEM5MlpYSnphVzl1WlU5bloyVjBkRzgrQ2lBZ0lDQThaRzl0YVc1cGJ6NEtJQ0FnSUNBZ0lDQThhV1JsYm5ScFptbGpZWFJwZG05RWIyMXBibWx2UGpjM056YzNOemMzTnpjM1BDOXBaR1Z1ZEdsbWFXTmhkR2wyYjBSdmJXbHVhVzgrQ2lBZ0lDQWdJQ0FnUEdsa1pXNTBhV1pwWTJGMGFYWnZVM1JoZW1sdmJtVlNhV05vYVdWa1pXNTBaVDQzTnpjM056YzNOemMzTjE4d01Ud3ZhV1JsYm5ScFptbGpZWFJwZG05VGRHRjZhVzl1WlZKcFkyaHBaV1JsYm5SbFBnb2dJQ0FnUEM5a2IyMXBibWx2UGdvZ0lDQWdQR2xrWlc1MGFXWnBZMkYwYVhadlRXVnpjMkZuWjJsdlVtbGphR2xsYzNSaFBuaDRlSGg0UEM5cFpHVnVkR2xtYVdOaGRHbDJiMDFsYzNOaFoyZHBiMUpwWTJocFpYTjBZVDRLSUNBZ0lEeGtZWFJoVDNKaFRXVnpjMkZuWjJsdlVtbGphR2xsYzNSaFBqSXdNalF0TURRdE1EbFVNakU2TlRNNk16WThMMlJoZEdGUGNtRk5aWE56WVdkbmFXOVNhV05vYVdWemRHRStDaUFnSUNBOFlYVjBaVzUwYVdOaGVtbHZibVZUYjJkblpYUjBiejU0ZUhnOEwyRjFkR1Z1ZEdsallYcHBiMjVsVTI5bloyVjBkRzgrQ2lBZ0lDQThjMjluWjJWMGRHOVFZV2RoZEc5eVpUNEtJQ0FnSUNBZ0lDQThhV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52VUdGbllYUnZjbVUrQ2lBZ0lDQWdJQ0FnSUNBZ0lEeDBhWEJ2U1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBuZzhMM1JwY0c5SlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtDaUFnSUNBZ0lDQWdJQ0FnSUR4amIyUnBZMlZKWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI4K2VIaDRlSGg0ZUR3dlkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBnb2dJQ0FnSUNBZ0lEd3ZhV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52VUdGbllYUnZjbVUrQ2lBZ0lDQWdJQ0FnUEdGdVlXZHlZV1pwWTJGUVlXZGhkRzl5WlQ1NGVIaDRlRHd2WVc1aFozSmhabWxqWVZCaFoyRjBiM0psUGdvZ0lDQWdJQ0FnSUR4dVlYcHBiMjVsVUdGbllYUnZjbVUrU1ZROEwyNWhlbWx2Ym1WUVlXZGhkRzl5WlQ0S0lDQWdJQ0FnSUNBOFpTMXRZV2xzVUdGbllYUnZjbVUrZUhoNGVIaEFlSGg0ZUM1amIyMDhMMlV0YldGcGJGQmhaMkYwYjNKbFBnb2dJQ0FnUEM5emIyZG5aWFIwYjFCaFoyRjBiM0psUGdvZ0lDQWdQR1Z1ZEdWQ1pXNWxabWxqYVdGeWFXOCtDaUFnSUNBZ0lDQWdQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjBKbGJtVm1hV05wWVhKcGJ6NEtJQ0FnSUNBZ0lDQWdJQ0FnUEhScGNHOUpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrUnp3dmRHbHdiMGxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno0S0lDQWdJQ0FnSUNBZ0lDQWdQR052WkdsalpVbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejU0ZUhoNGVIZzhMMk52WkdsalpVbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejRLSUNBZ0lDQWdJQ0E4TDJsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amIwSmxibVZtYVdOcFlYSnBiejRLSUNBZ0lDQWdJQ0E4WkdWdWIyMXBibUY2YVc5dVpVSmxibVZtYVdOcFlYSnBiejU0ZUhoNGVEd3ZaR1Z1YjIxcGJtRjZhVzl1WlVKbGJtVm1hV05wWVhKcGJ6NEtJQ0FnSUR3dlpXNTBaVUpsYm1WbWFXTnBZWEpwYno0S0NUeGtZWFJwVm1WeWMyRnRaVzUwYno0S0NRazhaR0YwWVVWelpXTjFlbWx2Ym1WUVlXZGhiV1Z1ZEc4K01qQXlNeTB4TWkweE5Tc3dNVG93TUR3dlpHRjBZVVZ6WldOMWVtbHZibVZRWVdkaGJXVnVkRzgrQ2drSlBHbHRjRzl5ZEc5VWIzUmhiR1ZFWVZabGNuTmhjbVUrTmpFMkxqQXdQQzlwYlhCdmNuUnZWRzkwWVd4bFJHRldaWEp6WVhKbFBnb0pDVHgwYVhCdlZtVnljMkZ0Wlc1MGJ6NUNRbFE4TDNScGNHOVdaWEp6WVcxbGJuUnZQZ29KQ1R4cFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOVdaWEp6WVcxbGJuUnZQakF4TURBd01EQXdNREF3TURBd01UVXhQQzlwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5V1pYSnpZVzFsYm5SdlBnb0pDVHhqYjJScFkyVkRiMjUwWlhOMGIxQmhaMkZ0Wlc1MGJ6NTBNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREUxTUR3dlkyOWthV05sUTI5dWRHVnpkRzlRWVdkaGJXVnVkRzgrQ2drSlBHWnBjbTFoVW1salpYWjFkR0UrTUR3dlptbHliV0ZTYVdObGRuVjBZVDRLQ1FrOFpHRjBhVk5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KQ1FrOGFXMXdiM0owYjFOcGJtZHZiRzlXWlhKellXMWxiblJ2UGpZd01DNHdNRHd2YVcxd2IzSjBiMU5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KQ1FrOGFXSmhia0ZqWTNKbFpHbDBiejVKVkRFNFZUQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNVEE4TDJsaVlXNUJZMk55WldScGRHOCtDZ2tKQ1R4allYVnpZV3hsVm1WeWMyRnRaVzUwYno1NGVIaDRlSGg0UEM5allYVnpZV3hsVm1WeWMyRnRaVzUwYno0S0NRa0pQR1JoZEdsVGNHVmphV1pwWTJsU2FYTmpiM056YVc5dVpUNTRlSGg0ZUhoNFBDOWtZWFJwVTNCbFkybG1hV05wVW1selkyOXpjMmx2Ym1VK0Nna0pQQzlrWVhScFUybHVaMjlzYjFabGNuTmhiV1Z1ZEc4K0Nna0pQR1JoZEdsVGFXNW5iMnh2Vm1WeWMyRnRaVzUwYno0S0NRa0pQR2x0Y0c5eWRHOVRhVzVuYjJ4dlZtVnljMkZ0Wlc1MGJ6NHhOaTR3TUR3dmFXMXdiM0owYjFOcGJtZHZiRzlXWlhKellXMWxiblJ2UGdvSkNRazhZMkYxYzJGc1pWWmxjbk5oYldWdWRHOCtlSGg0ZUhoNGVEd3ZZMkYxYzJGc1pWWmxjbk5oYldWdWRHOCtDZ2tKQ1R4a1lYUnBVM0JsWTJsbWFXTnBVbWx6WTI5emMybHZibVUrZUhoNGVIaDRlRHd2WkdGMGFWTndaV05wWm1samFWSnBjMk52YzNOcGIyNWxQZ29KQ1FrOFpHRjBhVTFoY21OaFFtOXNiRzlFYVdkcGRHRnNaVDRLSUNBZ0lDQWdJQ0FnSUNBZ0NUeDBhWEJ2UW05c2JHOCtNREU4TDNScGNHOUNiMnhzYno0S0lDQWdJQ0FnSUNBZ0lDQWdDVHhvWVhOb1JHOWpkVzFsYm5SdlBuaDRlSGc4TDJoaGMyaEViMk4xYldWdWRHOCtDaUFnSUNBZ0lDQWdJQ0FnSUFrOGNISnZkbWx1WTJsaFVtVnphV1JsYm5waFBsSk5QQzl3Y205MmFXNWphV0ZTWlhOcFpHVnVlbUUrQ2lBZ0lDQWdJQ0FnSUFrOEwyUmhkR2xOWVhKallVSnZiR3h2UkdsbmFYUmhiR1UrQ2drSlBDOWtZWFJwVTJsdVoyOXNiMVpsY25OaGJXVnVkRzgrQ1FvSlBDOWtZWFJwVm1WeWMyRnRaVzUwYno0S1BDOVNVRlErPC9ycHQ+CgkJCQk8L2VsZW1lbnRvTGlzdGFDYXJyZWxsb1JQVD4KCQkJPC9saXN0YVJQVD4KCQk8L3BwdDpwc3BJbnZpYUNhcnJlbGxvUlBUPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4=',
];

$data_resp = [
    ':id' => 153,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 10:21:01.197',
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
    ':sessionid' => 'sessid_100151',
    ':sessionidoriginal' => 'session_id_original_000150',
    ':uniqueid' => 'T000153',
    ':payload' => 'PD94bWwgdmVyc2lvbj0nMS4wJyBlbmNvZGluZz0nVVRGLTgnPz4KPHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPgoJPHNvYXBlbnY6Qm9keT4KCQk8bnMyOnBzcEludmlhQ2FycmVsbG9SUFRSZXNwb25zZSB4bWxuczpuczI9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIj4KCQkJPHBzcEludmlhQ2FycmVsbG9SUFRSZXNwb25zZSB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIiB4c2k6dHlwZT0ibnMyOmVzaXRvUHNwSW52aWFDYXJyZWxsb1JQVCI+CgkJCQk8ZXNpdG9Db21wbGVzc2l2b09wZXJhemlvbmU+T0s8L2VzaXRvQ29tcGxlc3Npdm9PcGVyYXppb25lPgoJCQkJPGlkZW50aWZpY2F0aXZvQ2FycmVsbG8+eHh4eHh4eHh4eHh4eDwvaWRlbnRpZmljYXRpdm9DYXJyZWxsbz4KCQkJCTxwYXJhbWV0cmlQYWdhbWVudG9JbW1lZGlhdG8+aWRCcnVjaWF0dXJhPXh4dzIyPC9wYXJhbWV0cmlQYWdhbWVudG9JbW1lZGlhdG8+CgkJCTwvcHNwSW52aWFDYXJyZWxsb1JQVFJlc3BvbnNlPgoJCTwvbnMyOnBzcEludmlhQ2FycmVsbG9SUFRSZXNwb25zZT4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+',
];


Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);












$data_req = [
    ':id' => 154,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 10:22:00.197',
    ':tipoevento' => 'paaInviaRT',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000151',
    ':ccp' => 't0000000000000000000000000000150',
    ':noticenumber' => '',
    ':creditorreferenceid' => '01000000000000151',
    ':paymenttoken' => 't0000000000000000000000000000150',
    ':psp' => 'PSP_RT',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100152',
    ':sessionidoriginal' => 'session_id_original_000150',
    ':uniqueid' => 'T000154',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpwcHQ9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIiB4bWxuczpwcHRoZWFkPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIiB4bWxuczp0bnM9Imh0dHA6Ly9Ob2RvUGFnYW1lbnRpU1BDLnNwY29vcC5nb3YuaXQvc2Vydml6aS9QYWdhbWVudGlUZWxlbWF0aWNpUlQiIHhtbG5zOnhzaT0iaHR0cDovL3d3dy53My5vcmcvMjAwMS9YTUxTY2hlbWEtaW5zdGFuY2UiPgogICAgPHNvYXBlbnY6SGVhZGVyPgogICAgICAgIDxwcHRoZWFkOmludGVzdGF6aW9uZVBQVD4KICAgICAgICAgICAgPGlkZW50aWZpY2F0aXZvSW50ZXJtZWRpYXJpb1BBPjc3Nzc3Nzc3Nzc3PC9pZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QQT4KICAgICAgICAgICAgPGlkZW50aWZpY2F0aXZvU3RhemlvbmVJbnRlcm1lZGlhcmlvUEE+Nzc3Nzc3Nzc3NzdfMDE8L2lkZW50aWZpY2F0aXZvU3RhemlvbmVJbnRlcm1lZGlhcmlvUEE+CiAgICAgICAgICAgIDxpZGVudGlmaWNhdGl2b0RvbWluaW8+Nzc3Nzc3Nzc3Nzc8L2lkZW50aWZpY2F0aXZvRG9taW5pbz4KICAgICAgICAgICAgPGlkZW50aWZpY2F0aXZvVW5pdm9jb1ZlcnNhbWVudG8+MDEwMDAwMDAwMDAwMDAxNTE8L2lkZW50aWZpY2F0aXZvVW5pdm9jb1ZlcnNhbWVudG8+CiAgICAgICAgICAgIDxjb2RpY2VDb250ZXN0b1BhZ2FtZW50bz50MDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDE1MDwvY29kaWNlQ29udGVzdG9QYWdhbWVudG8+CiAgICAgICAgPC9wcHRoZWFkOmludGVzdGF6aW9uZVBQVD4KICAgIDwvc29hcGVudjpIZWFkZXI+CiAgICA8c29hcGVudjpCb2R5PgogICAgICAgIDxwcHQ6cGFhSW52aWFSVD4KICAgICAgICAgICAgPHRpcG9GaXJtYS8+CiAgICAgICAgICAgIDxydD5QRDk0Yld3Z2RtVnljMmx2YmowaU1TNHdJaUJsYm1OdlpHbHVaejBpVlZSR0xUZ2lQejRLUEhCaGVWOXBPbEpVSUhodGJHNXpPbkJoZVY5cFBTSm9kSFJ3T2k4dmQzZDNMbVJwWjJsMGNHRXVaMjkyTG1sMEwzTmphR1Z0WVhNdk1qQXhNUzlRWVdkaGJXVnVkR2t2SWlCNGJXeHVjenA0YzJrOUltaDBkSEE2THk5M2QzY3Vkek11YjNKbkx6SXdNREV2V0UxTVUyTm9aVzFoTFdsdWMzUmhibU5sSWlCNGMyazZjMk5vWlcxaFRHOWpZWFJwYjI0OUlpOXZjSFF2Y0hOd1lYaGxjSFJoTDNKbGMyOTFjbU5sY3k5UVlXZEpibVpmVWxCVVgxSlVYelpmTWw4d0xuaHpaQ0krQ2drOGNHRjVYMms2ZG1WeWMybHZibVZQWjJkbGRIUnZQakV1TUR3dmNHRjVYMms2ZG1WeWMybHZibVZQWjJkbGRIUnZQZ29KUEhCaGVWOXBPbVJ2YldsdWFXOCtDZ2tKUEhCaGVWOXBPbWxrWlc1MGFXWnBZMkYwYVhadlJHOXRhVzVwYno0M056YzNOemMzTnpjM056d3ZjR0Y1WDJrNmFXUmxiblJwWm1sallYUnBkbTlFYjIxcGJtbHZQZ29KUEM5d1lYbGZhVHBrYjIxcGJtbHZQZ29KUEhCaGVWOXBPbWxrWlc1MGFXWnBZMkYwYVhadlRXVnpjMkZuWjJsdlVtbGpaWFoxZEdFK2VIaDRlSGg0ZUR3dmNHRjVYMms2YVdSbGJuUnBabWxqWVhScGRtOU5aWE56WVdkbmFXOVNhV05sZG5WMFlUNEtDVHh3WVhsZmFUcGtZWFJoVDNKaFRXVnpjMkZuWjJsdlVtbGpaWFoxZEdFK01qQXlOQzB3TkMweE9WUXhOVG93T0Rvd09Ud3ZjR0Y1WDJrNlpHRjBZVTl5WVUxbGMzTmhaMmRwYjFKcFkyVjJkWFJoUGdvSlBIQmhlVjlwT25KcFptVnlhVzFsYm5SdlRXVnpjMkZuWjJsdlVtbGphR2xsYzNSaFBuaDRlSGg0TFhoNE9IaDRlRHd2Y0dGNVgyazZjbWxtWlhKcGJXVnVkRzlOWlhOellXZG5hVzlTYVdOb2FXVnpkR0UrQ2drOGNHRjVYMms2Y21sbVpYSnBiV1Z1ZEc5RVlYUmhVbWxqYUdsbGMzUmhQakl3TWpRdE1EUXRNVGs4TDNCaGVWOXBPbkpwWm1WeWFXMWxiblJ2UkdGMFlWSnBZMmhwWlhOMFlUNEtDVHh3WVhsZmFUcHBjM1JwZEhWMGIwRjBkR1Z6ZEdGdWRHVStDZ2tKUEhCaGVWOXBPbWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjBGMGRHVnpkR0Z1ZEdVK0Nna0pDVHh3WVhsZmFUcDBhWEJ2U1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBrSThMM0JoZVY5cE9uUnBjRzlKWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI4K0Nna0pDVHh3WVhsZmFUcGpiMlJwWTJWSlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtPRGc0T0RnNE9EZzRPRGc4TDNCaGVWOXBPbU52WkdsalpVbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejRLQ1FrOEwzQmhlVjlwT21sa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amIwRjBkR1Z6ZEdGdWRHVStDZ2tKUEhCaGVWOXBPbVJsYm05dGFXNWhlbWx2Ym1WQmRIUmxjM1JoYm5SbFBuaDRlSGg0UEM5d1lYbGZhVHBrWlc1dmJXbHVZWHBwYjI1bFFYUjBaWE4wWVc1MFpUNEtDVHd2Y0dGNVgyazZhWE4wYVhSMWRHOUJkSFJsYzNSaGJuUmxQZ29KUEhCaGVWOXBPbVZ1ZEdWQ1pXNWxabWxqYVdGeWFXOCtDZ2tKUEhCaGVWOXBPbWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjBKbGJtVm1hV05wWVhKcGJ6NEtDUWtKUEhCaGVWOXBPblJwY0c5SlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtSend2Y0dGNVgyazZkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NEtDUWtKUEhCaGVWOXBPbU52WkdsalpVbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejQzTnpjM056YzNOemMzTnp3dmNHRjVYMms2WTI5a2FXTmxTV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52UGdvSkNUd3ZjR0Y1WDJrNmFXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZRbVZ1WldacFkybGhjbWx2UGdvSkNUeHdZWGxmYVRwa1pXNXZiV2x1WVhwcGIyNWxRbVZ1WldacFkybGhjbWx2UG5oNGVIaDRQQzl3WVhsZmFUcGtaVzV2YldsdVlYcHBiMjVsUW1WdVpXWnBZMmxoY21sdlBnb0pDVHh3WVhsZmFUcGpiMlJwWTJWVmJtbDBUM0JsY2tKbGJtVm1hV05wWVhKcGJ6NTRlRHd2Y0dGNVgyazZZMjlrYVdObFZXNXBkRTl3WlhKQ1pXNWxabWxqYVdGeWFXOCtDZ2tKUEhCaGVWOXBPbVJsYm05dFZXNXBkRTl3WlhKQ1pXNWxabWxqYVdGeWFXOCtlSGg0ZUhnOEwzQmhlVjlwT21SbGJtOXRWVzVwZEU5d1pYSkNaVzVsWm1samFXRnlhVzgrQ2drSlBIQmhlVjlwT21sdVpHbHlhWHA2YjBKbGJtVm1hV05wWVhKcGJ6NTRlSGg0UEM5d1lYbGZhVHBwYm1ScGNtbDZlbTlDWlc1bFptbGphV0Z5YVc4K0Nna0pQSEJoZVY5cE9tTnBkbWxqYjBKbGJtVm1hV05wWVhKcGJ6NTRlSGc4TDNCaGVWOXBPbU5wZG1samIwSmxibVZtYVdOcFlYSnBiejRLQ1FrOGNHRjVYMms2WTJGd1FtVnVaV1pwWTJsaGNtbHZQbmg0ZUR3dmNHRjVYMms2WTJGd1FtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4d1lYbGZhVHBzYjJOaGJHbDBZVUpsYm1WbWFXTnBZWEpwYno1NGVIZzhMM0JoZVY5cE9teHZZMkZzYVhSaFFtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4d1lYbGZhVHB3Y205MmFXNWphV0ZDWlc1bFptbGphV0Z5YVc4K2VIZzhMM0JoZVY5cE9uQnliM1pwYm1OcFlVSmxibVZtYVdOcFlYSnBiejRLQ1FrOGNHRjVYMms2Ym1GNmFXOXVaVUpsYm1WbWFXTnBZWEpwYno1NGVIaDRQQzl3WVhsZmFUcHVZWHBwYjI1bFFtVnVaV1pwWTJsaGNtbHZQZ29KUEM5d1lYbGZhVHBsYm5SbFFtVnVaV1pwWTJsaGNtbHZQZ29KUEhCaGVWOXBPbk52WjJkbGRIUnZWbVZ5YzJGdWRHVStDZ2tKUEhCaGVWOXBPbWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFabGNuTmhiblJsUGdvSkNRazhjR0Y1WDJrNmRHbHdiMGxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno1SFBDOXdZWGxmYVRwMGFYQnZTV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52UGdvSkNRazhjR0Y1WDJrNlkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBqYzNOemMzTnpjM056YzNQQzl3WVhsZmFUcGpiMlJwWTJWSlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtDZ2tKUEM5d1lYbGZhVHBwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5V1pYSnpZVzUwWlQ0S0NRazhjR0Y1WDJrNllXNWhaM0poWm1sallWWmxjbk5oYm5SbFBuaDRlSGg0UEM5d1lYbGZhVHBoYm1GbmNtRm1hV05oVm1WeWMyRnVkR1UrQ2drSlBIQmhlVjlwT21sdVpHbHlhWHA2YjFabGNuTmhiblJsUG5oNGVIZzhMM0JoZVY5cE9tbHVaR2x5YVhwNmIxWmxjbk5oYm5SbFBnb0pDVHh3WVhsZmFUcGpZWEJXWlhKellXNTBaVDU0ZUhnOEwzQmhlVjlwT21OaGNGWmxjbk5oYm5SbFBnb0pDVHh3WVhsZmFUcHNiMk5oYkdsMFlWWmxjbk5oYm5SbFBuaDRlRHd2Y0dGNVgyazZiRzlqWVd4cGRHRldaWEp6WVc1MFpUNEtDUWs4Y0dGNVgyazZjSEp2ZG1sdVkybGhWbVZ5YzJGdWRHVStlSGg0UEM5d1lYbGZhVHB3Y205MmFXNWphV0ZXWlhKellXNTBaVDRLQ1FrOGNHRjVYMms2Ym1GNmFXOXVaVlpsY25OaGJuUmxQbmg0UEM5d1lYbGZhVHB1WVhwcGIyNWxWbVZ5YzJGdWRHVStDZ2s4TDNCaGVWOXBPbk52WjJkbGRIUnZWbVZ5YzJGdWRHVStDZ2s4Y0dGNVgyazZjMjluWjJWMGRHOVFZV2RoZEc5eVpUNEtDUWs4Y0dGNVgyazZhV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52VUdGbllYUnZjbVUrQ2drSkNUeHdZWGxmYVRwMGFYQnZTV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52UGtjOEwzQmhlVjlwT25ScGNHOUpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSkNUeHdZWGxmYVRwamIyUnBZMlZKWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI4K056YzNOemMzTnpjM056YzhMM0JoZVY5cE9tTnZaR2xqWlVsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NEtDUWs4TDNCaGVWOXBPbWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFCaFoyRjBiM0psUGdvSkNUeHdZWGxmYVRwaGJtRm5jbUZtYVdOaFVHRm5ZWFJ2Y21VK2VIaDRlSGg0UEM5d1lYbGZhVHBoYm1GbmNtRm1hV05oVUdGbllYUnZjbVUrQ2drSlBIQmhlVjlwT21sdVpHbHlhWHA2YjFCaFoyRjBiM0psUG5oNGVIaDRQQzl3WVhsZmFUcHBibVJwY21sNmVtOVFZV2RoZEc5eVpUNEtDUWs4Y0dGNVgyazZZMkZ3VUdGbllYUnZjbVUrZUhoNGVEd3ZjR0Y1WDJrNlkyRndVR0ZuWVhSdmNtVStDZ2tKUEhCaGVWOXBPbXh2WTJGc2FYUmhVR0ZuWVhSdmNtVStlSGg0UEM5d1lYbGZhVHBzYjJOaGJHbDBZVkJoWjJGMGIzSmxQZ29KQ1R4d1lYbGZhVHB3Y205MmFXNWphV0ZRWVdkaGRHOXlaVDU0ZUR3dmNHRjVYMms2Y0hKdmRtbHVZMmxoVUdGbllYUnZjbVUrQ2drSlBIQmhlVjlwT201aGVtbHZibVZRWVdkaGRHOXlaVDU0ZUhoNFBDOXdZWGxmYVRwdVlYcHBiMjVsVUdGbllYUnZjbVUrQ2drOEwzQmhlVjlwT25OdloyZGxkSFJ2VUdGbllYUnZjbVUrQ2drOGNHRjVYMms2WkdGMGFWQmhaMkZ0Wlc1MGJ6NEtDUWs4Y0dGNVgyazZZMjlrYVdObFJYTnBkRzlRWVdkaGJXVnVkRzgrTUR3dmNHRjVYMms2WTI5a2FXTmxSWE5wZEc5UVlXZGhiV1Z1ZEc4K0Nna0pQSEJoZVY5cE9tbHRjRzl5ZEc5VWIzUmhiR1ZRWVdkaGRHOCtNVFl1TURBOEwzQmhlVjlwT21sdGNHOXlkRzlVYjNSaGJHVlFZV2RoZEc4K0Nna0pQSEJoZVY5cE9tbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiMVpsY25OaGJXVnVkRzgrTURFd01EQXdNREF3TURBd01EQXhOVEU4TDNCaGVWOXBPbWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFabGNuTmhiV1Z1ZEc4K0Nna0pQSEJoZVY5cE9rTnZaR2xqWlVOdmJuUmxjM1J2VUdGbllXMWxiblJ2UG5Rd01EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01UVXdQQzl3WVhsZmFUcERiMlJwWTJWRGIyNTBaWE4wYjFCaFoyRnRaVzUwYno0S0NRazhjR0Y1WDJrNlpHRjBhVk5wYm1kdmJHOVFZV2RoYldWdWRHOCtDZ2tKQ1R4d1lYbGZhVHB6YVc1bmIyeHZTVzF3YjNKMGIxQmhaMkYwYno0Mk1EQXVNREE4TDNCaGVWOXBPbk5wYm1kdmJHOUpiWEJ2Y25SdlVHRm5ZWFJ2UGdvSkNRazhjR0Y1WDJrNlpYTnBkRzlUYVc1bmIyeHZVR0ZuWVcxbGJuUnZQbEJCUjBGVVFUd3ZjR0Y1WDJrNlpYTnBkRzlUYVc1bmIyeHZVR0ZuWVcxbGJuUnZQZ29KQ1FrOGNHRjVYMms2WkdGMFlVVnphWFJ2VTJsdVoyOXNiMUJoWjJGdFpXNTBiejR5TURJMExUQTBMVEU1UEM5d1lYbGZhVHBrWVhSaFJYTnBkRzlUYVc1bmIyeHZVR0ZuWVcxbGJuUnZQZ29KQ1FrOGNHRjVYMms2YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlVtbHpZMjl6YzJsdmJtVStNREF3TURBd01EQXdNREF4UEM5d1lYbGZhVHBwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5U2FYTmpiM056YVc5dVpUNEtDUWtKUEhCaGVWOXBPbU5oZFhOaGJHVldaWEp6WVcxbGJuUnZQbmg0ZUhoNGVIaDRQQzl3WVhsZmFUcGpZWFZ6WVd4bFZtVnljMkZ0Wlc1MGJ6NEtDUWtKUEhCaGVWOXBPbVJoZEdsVGNHVmphV1pwWTJsU2FYTmpiM056YVc5dVpUNTRlSGg0ZUhnOEwzQmhlVjlwT21SaGRHbFRjR1ZqYVdacFkybFNhWE5qYjNOemFXOXVaVDRLQ1FrOEwzQmhlVjlwT21SaGRHbFRhVzVuYjJ4dlVHRm5ZVzFsYm5SdlBnb0pDVHh3WVhsZmFUcGtZWFJwVTJsdVoyOXNiMUJoWjJGdFpXNTBiejRLQ1FrSlBIQmhlVjlwT25OcGJtZHZiRzlKYlhCdmNuUnZVR0ZuWVhSdlBqRTJMakF3UEM5d1lYbGZhVHB6YVc1bmIyeHZTVzF3YjNKMGIxQmhaMkYwYno0S0NRa0pQSEJoZVY5cE9tVnphWFJ2VTJsdVoyOXNiMUJoWjJGdFpXNTBiejVRUVVkQlZFRThMM0JoZVY5cE9tVnphWFJ2VTJsdVoyOXNiMUJoWjJGdFpXNTBiejRLQ1FrSlBIQmhlVjlwT21SaGRHRkZjMmwwYjFOcGJtZHZiRzlRWVdkaGJXVnVkRzgrTWpBeU5DMHdOQzB4T1R3dmNHRjVYMms2WkdGMFlVVnphWFJ2VTJsdVoyOXNiMUJoWjJGdFpXNTBiejRLQ1FrSlBIQmhlVjlwT21sa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amIxSnBjMk52YzNOcGIyNWxQakF3TURBd01EQXdNREF3TWp3dmNHRjVYMms2YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlVtbHpZMjl6YzJsdmJtVStDZ2tKQ1R4d1lYbGZhVHBqWVhWellXeGxWbVZ5YzJGdFpXNTBiejU0ZUhoNGVIaDRlRHd2Y0dGNVgyazZZMkYxYzJGc1pWWmxjbk5oYldWdWRHOCtDZ2tKQ1R4d1lYbGZhVHBrWVhScFUzQmxZMmxtYVdOcFVtbHpZMjl6YzJsdmJtVStlSGg0ZUhoNFBDOXdZWGxmYVRwa1lYUnBVM0JsWTJsbWFXTnBVbWx6WTI5emMybHZibVUrQ2drSlBDOXdZWGxmYVRwa1lYUnBVMmx1WjI5c2IxQmhaMkZ0Wlc1MGJ6NEtDVHd2Y0dGNVgyazZaR0YwYVZCaFoyRnRaVzUwYno0S1BDOXdZWGxmYVRwU1ZEND08L3J0PgogICAgICAgIDwvcHB0OnBhYUludmlhUlQ+CiAgICA8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg==',
];

$data_resp = [
    ':id' => 155,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 10:22:01.197',
    ':tipoevento' => 'paaInviaRT',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000151',
    ':ccp' => 't0000000000000000000000000000150',
    ':noticenumber' => '',
    ':creditorreferenceid' => '01000000000000151',
    ':paymenttoken' => 't0000000000000000000000000000150',
    ':psp' => 'PSP_RT',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100152',
    ':sessionidoriginal' => 'session_id_original_000150',
    ':uniqueid' => 'T000155',
    ':payload' => 'PHNvYXA6RW52ZWxvcGUgeG1sbnM6c29hcD0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPjxTT0FQLUVOVjpIZWFkZXIgeG1sbnM6U09BUC1FTlY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIi8+PHNvYXA6Qm9keT48bnM0OnBhYUludmlhUlRSaXNwb3N0YSB4bWxuczpuczI9Imh0dHA6Ly93d3cuZGlnaXRwYS5nb3YuaXQvc2NoZW1hcy8yMDExL1BhZ2FtZW50aS8iIHhtbG5zOm5zMz0iaHR0cDovL3dzLnBhZ2FtZW50aS50ZWxlbWF0aWNpLmdvdi9wcHRoZWFkIiB4bWxuczpuczQ9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIj48cGFhSW52aWFSVFJpc3Bvc3RhPjxlc2l0bz5PSzwvZXNpdG8+PC9wYWFJbnZpYVJUUmlzcG9zdGE+PC9uczQ6cGFhSW52aWFSVFJpc3Bvc3RhPjwvc29hcDpCb2R5Pjwvc29hcDpFbnZlbG9wZT4=',
];


Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);





































$data_req = [
    ':id' => 156,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 10:32:00.197',
    ':tipoevento' => 'paaInviaRT',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000150',
    ':ccp' => 't0000000000000000000000000000150',
    ':noticenumber' => '',
    ':creditorreferenceid' => '01000000000000150',
    ':paymenttoken' => 't0000000000000000000000000000150',
    ':psp' => 'PSP_RT',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100153',
    ':sessionidoriginal' => 'session_id_original_000150',
    ':uniqueid' => 'T000156',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpwcHQ9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIiB4bWxuczpwcHRoZWFkPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIiB4bWxuczp0bnM9Imh0dHA6Ly9Ob2RvUGFnYW1lbnRpU1BDLnNwY29vcC5nb3YuaXQvc2Vydml6aS9QYWdhbWVudGlUZWxlbWF0aWNpUlQiIHhtbG5zOnhzaT0iaHR0cDovL3d3dy53My5vcmcvMjAwMS9YTUxTY2hlbWEtaW5zdGFuY2UiPgogICAgPHNvYXBlbnY6SGVhZGVyPgogICAgICAgIDxwcHRoZWFkOmludGVzdGF6aW9uZVBQVD4KICAgICAgICAgICAgPGlkZW50aWZpY2F0aXZvSW50ZXJtZWRpYXJpb1BBPjc3Nzc3Nzc3Nzc3PC9pZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QQT4KICAgICAgICAgICAgPGlkZW50aWZpY2F0aXZvU3RhemlvbmVJbnRlcm1lZGlhcmlvUEE+Nzc3Nzc3Nzc3NzdfMDE8L2lkZW50aWZpY2F0aXZvU3RhemlvbmVJbnRlcm1lZGlhcmlvUEE+CiAgICAgICAgICAgIDxpZGVudGlmaWNhdGl2b0RvbWluaW8+Nzc3Nzc3Nzc3Nzc8L2lkZW50aWZpY2F0aXZvRG9taW5pbz4KICAgICAgICAgICAgPGlkZW50aWZpY2F0aXZvVW5pdm9jb1ZlcnNhbWVudG8+MDEwMDAwMDAwMDAwMDAxNTA8L2lkZW50aWZpY2F0aXZvVW5pdm9jb1ZlcnNhbWVudG8+CiAgICAgICAgICAgIDxjb2RpY2VDb250ZXN0b1BhZ2FtZW50bz50MDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDE1MDwvY29kaWNlQ29udGVzdG9QYWdhbWVudG8+CiAgICAgICAgPC9wcHRoZWFkOmludGVzdGF6aW9uZVBQVD4KICAgIDwvc29hcGVudjpIZWFkZXI+CiAgICA8c29hcGVudjpCb2R5PgogICAgICAgIDxwcHQ6cGFhSW52aWFSVD4KICAgICAgICAgICAgPHRpcG9GaXJtYS8+CiAgICAgICAgICAgIDxydD5QRDk0Yld3Z2RtVnljMmx2YmowaU1TNHdJaUJsYm1OdlpHbHVaejBpVlZSR0xUZ2lQejRLUEhCaGVWOXBPbEpVSUhodGJHNXpPbkJoZVY5cFBTSm9kSFJ3T2k4dmQzZDNMbVJwWjJsMGNHRXVaMjkyTG1sMEwzTmphR1Z0WVhNdk1qQXhNUzlRWVdkaGJXVnVkR2t2SWlCNGJXeHVjenA0YzJrOUltaDBkSEE2THk5M2QzY3Vkek11YjNKbkx6SXdNREV2V0UxTVUyTm9aVzFoTFdsdWMzUmhibU5sSWlCNGMyazZjMk5vWlcxaFRHOWpZWFJwYjI0OUlpOXZjSFF2Y0hOd1lYaGxjSFJoTDNKbGMyOTFjbU5sY3k5UVlXZEpibVpmVWxCVVgxSlVYelpmTWw4d0xuaHpaQ0krQ2drOGNHRjVYMms2ZG1WeWMybHZibVZQWjJkbGRIUnZQakV1TUR3dmNHRjVYMms2ZG1WeWMybHZibVZQWjJkbGRIUnZQZ29KUEhCaGVWOXBPbVJ2YldsdWFXOCtDZ2tKUEhCaGVWOXBPbWxrWlc1MGFXWnBZMkYwYVhadlJHOXRhVzVwYno0M056YzNOemMzTnpjM056d3ZjR0Y1WDJrNmFXUmxiblJwWm1sallYUnBkbTlFYjIxcGJtbHZQZ29KUEM5d1lYbGZhVHBrYjIxcGJtbHZQZ29KUEhCaGVWOXBPbWxrWlc1MGFXWnBZMkYwYVhadlRXVnpjMkZuWjJsdlVtbGpaWFoxZEdFK2VIaDRlSGg0ZUR3dmNHRjVYMms2YVdSbGJuUnBabWxqWVhScGRtOU5aWE56WVdkbmFXOVNhV05sZG5WMFlUNEtDVHh3WVhsZmFUcGtZWFJoVDNKaFRXVnpjMkZuWjJsdlVtbGpaWFoxZEdFK01qQXlOQzB3TkMweE9WUXhOVG93T0Rvd09Ud3ZjR0Y1WDJrNlpHRjBZVTl5WVUxbGMzTmhaMmRwYjFKcFkyVjJkWFJoUGdvSlBIQmhlVjlwT25KcFptVnlhVzFsYm5SdlRXVnpjMkZuWjJsdlVtbGphR2xsYzNSaFBuaDRlSGg0TFhoNE9IaDRlRHd2Y0dGNVgyazZjbWxtWlhKcGJXVnVkRzlOWlhOellXZG5hVzlTYVdOb2FXVnpkR0UrQ2drOGNHRjVYMms2Y21sbVpYSnBiV1Z1ZEc5RVlYUmhVbWxqYUdsbGMzUmhQakl3TWpRdE1EUXRNVGs4TDNCaGVWOXBPbkpwWm1WeWFXMWxiblJ2UkdGMFlWSnBZMmhwWlhOMFlUNEtDVHh3WVhsZmFUcHBjM1JwZEhWMGIwRjBkR1Z6ZEdGdWRHVStDZ2tKUEhCaGVWOXBPbWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjBGMGRHVnpkR0Z1ZEdVK0Nna0pDVHh3WVhsZmFUcDBhWEJ2U1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBrSThMM0JoZVY5cE9uUnBjRzlKWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI4K0Nna0pDVHh3WVhsZmFUcGpiMlJwWTJWSlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtPRGc0T0RnNE9EZzRPRGc4TDNCaGVWOXBPbU52WkdsalpVbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejRLQ1FrOEwzQmhlVjlwT21sa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amIwRjBkR1Z6ZEdGdWRHVStDZ2tKUEhCaGVWOXBPbVJsYm05dGFXNWhlbWx2Ym1WQmRIUmxjM1JoYm5SbFBuaDRlSGg0UEM5d1lYbGZhVHBrWlc1dmJXbHVZWHBwYjI1bFFYUjBaWE4wWVc1MFpUNEtDVHd2Y0dGNVgyazZhWE4wYVhSMWRHOUJkSFJsYzNSaGJuUmxQZ29KUEhCaGVWOXBPbVZ1ZEdWQ1pXNWxabWxqYVdGeWFXOCtDZ2tKUEhCaGVWOXBPbWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjBKbGJtVm1hV05wWVhKcGJ6NEtDUWtKUEhCaGVWOXBPblJwY0c5SlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtSend2Y0dGNVgyazZkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NEtDUWtKUEhCaGVWOXBPbU52WkdsalpVbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejQzTnpjM056YzNOemMzTnp3dmNHRjVYMms2WTI5a2FXTmxTV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52UGdvSkNUd3ZjR0Y1WDJrNmFXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZRbVZ1WldacFkybGhjbWx2UGdvSkNUeHdZWGxmYVRwa1pXNXZiV2x1WVhwcGIyNWxRbVZ1WldacFkybGhjbWx2UG5oNGVIaDRQQzl3WVhsZmFUcGtaVzV2YldsdVlYcHBiMjVsUW1WdVpXWnBZMmxoY21sdlBnb0pDVHh3WVhsZmFUcGpiMlJwWTJWVmJtbDBUM0JsY2tKbGJtVm1hV05wWVhKcGJ6NTRlRHd2Y0dGNVgyazZZMjlrYVdObFZXNXBkRTl3WlhKQ1pXNWxabWxqYVdGeWFXOCtDZ2tKUEhCaGVWOXBPbVJsYm05dFZXNXBkRTl3WlhKQ1pXNWxabWxqYVdGeWFXOCtlSGg0ZUhnOEwzQmhlVjlwT21SbGJtOXRWVzVwZEU5d1pYSkNaVzVsWm1samFXRnlhVzgrQ2drSlBIQmhlVjlwT21sdVpHbHlhWHA2YjBKbGJtVm1hV05wWVhKcGJ6NTRlSGg0UEM5d1lYbGZhVHBwYm1ScGNtbDZlbTlDWlc1bFptbGphV0Z5YVc4K0Nna0pQSEJoZVY5cE9tTnBkbWxqYjBKbGJtVm1hV05wWVhKcGJ6NTRlSGc4TDNCaGVWOXBPbU5wZG1samIwSmxibVZtYVdOcFlYSnBiejRLQ1FrOGNHRjVYMms2WTJGd1FtVnVaV1pwWTJsaGNtbHZQbmg0ZUR3dmNHRjVYMms2WTJGd1FtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4d1lYbGZhVHBzYjJOaGJHbDBZVUpsYm1WbWFXTnBZWEpwYno1NGVIZzhMM0JoZVY5cE9teHZZMkZzYVhSaFFtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4d1lYbGZhVHB3Y205MmFXNWphV0ZDWlc1bFptbGphV0Z5YVc4K2VIZzhMM0JoZVY5cE9uQnliM1pwYm1OcFlVSmxibVZtYVdOcFlYSnBiejRLQ1FrOGNHRjVYMms2Ym1GNmFXOXVaVUpsYm1WbWFXTnBZWEpwYno1NGVIaDRQQzl3WVhsZmFUcHVZWHBwYjI1bFFtVnVaV1pwWTJsaGNtbHZQZ29KUEM5d1lYbGZhVHBsYm5SbFFtVnVaV1pwWTJsaGNtbHZQZ29KUEhCaGVWOXBPbk52WjJkbGRIUnZWbVZ5YzJGdWRHVStDZ2tKUEhCaGVWOXBPbWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFabGNuTmhiblJsUGdvSkNRazhjR0Y1WDJrNmRHbHdiMGxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno1SFBDOXdZWGxmYVRwMGFYQnZTV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52UGdvSkNRazhjR0Y1WDJrNlkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBqYzNOemMzTnpjM056YzNQQzl3WVhsZmFUcGpiMlJwWTJWSlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtDZ2tKUEM5d1lYbGZhVHBwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5V1pYSnpZVzUwWlQ0S0NRazhjR0Y1WDJrNllXNWhaM0poWm1sallWWmxjbk5oYm5SbFBuaDRlSGg0UEM5d1lYbGZhVHBoYm1GbmNtRm1hV05oVm1WeWMyRnVkR1UrQ2drSlBIQmhlVjlwT21sdVpHbHlhWHA2YjFabGNuTmhiblJsUG5oNGVIZzhMM0JoZVY5cE9tbHVaR2x5YVhwNmIxWmxjbk5oYm5SbFBnb0pDVHh3WVhsZmFUcGpZWEJXWlhKellXNTBaVDU0ZUhnOEwzQmhlVjlwT21OaGNGWmxjbk5oYm5SbFBnb0pDVHh3WVhsZmFUcHNiMk5oYkdsMFlWWmxjbk5oYm5SbFBuaDRlRHd2Y0dGNVgyazZiRzlqWVd4cGRHRldaWEp6WVc1MFpUNEtDUWs4Y0dGNVgyazZjSEp2ZG1sdVkybGhWbVZ5YzJGdWRHVStlSGg0UEM5d1lYbGZhVHB3Y205MmFXNWphV0ZXWlhKellXNTBaVDRLQ1FrOGNHRjVYMms2Ym1GNmFXOXVaVlpsY25OaGJuUmxQbmg0UEM5d1lYbGZhVHB1WVhwcGIyNWxWbVZ5YzJGdWRHVStDZ2s4TDNCaGVWOXBPbk52WjJkbGRIUnZWbVZ5YzJGdWRHVStDZ2s4Y0dGNVgyazZjMjluWjJWMGRHOVFZV2RoZEc5eVpUNEtDUWs4Y0dGNVgyazZhV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52VUdGbllYUnZjbVUrQ2drSkNUeHdZWGxmYVRwMGFYQnZTV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52UGtjOEwzQmhlVjlwT25ScGNHOUpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSkNUeHdZWGxmYVRwamIyUnBZMlZKWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI4K056YzNOemMzTnpjM056YzhMM0JoZVY5cE9tTnZaR2xqWlVsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NEtDUWs4TDNCaGVWOXBPbWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFCaFoyRjBiM0psUGdvSkNUeHdZWGxmYVRwaGJtRm5jbUZtYVdOaFVHRm5ZWFJ2Y21VK2VIaDRlSGg0UEM5d1lYbGZhVHBoYm1GbmNtRm1hV05oVUdGbllYUnZjbVUrQ2drSlBIQmhlVjlwT21sdVpHbHlhWHA2YjFCaFoyRjBiM0psUG5oNGVIaDRQQzl3WVhsZmFUcHBibVJwY21sNmVtOVFZV2RoZEc5eVpUNEtDUWs4Y0dGNVgyazZZMkZ3VUdGbllYUnZjbVUrZUhoNGVEd3ZjR0Y1WDJrNlkyRndVR0ZuWVhSdmNtVStDZ2tKUEhCaGVWOXBPbXh2WTJGc2FYUmhVR0ZuWVhSdmNtVStlSGg0UEM5d1lYbGZhVHBzYjJOaGJHbDBZVkJoWjJGMGIzSmxQZ29KQ1R4d1lYbGZhVHB3Y205MmFXNWphV0ZRWVdkaGRHOXlaVDU0ZUR3dmNHRjVYMms2Y0hKdmRtbHVZMmxoVUdGbllYUnZjbVUrQ2drSlBIQmhlVjlwT201aGVtbHZibVZRWVdkaGRHOXlaVDU0ZUhoNFBDOXdZWGxmYVRwdVlYcHBiMjVsVUdGbllYUnZjbVUrQ2drOEwzQmhlVjlwT25OdloyZGxkSFJ2VUdGbllYUnZjbVUrQ2drOGNHRjVYMms2WkdGMGFWQmhaMkZ0Wlc1MGJ6NEtDUWs4Y0dGNVgyazZZMjlrYVdObFJYTnBkRzlRWVdkaGJXVnVkRzgrTUR3dmNHRjVYMms2WTI5a2FXTmxSWE5wZEc5UVlXZGhiV1Z1ZEc4K0Nna0pQSEJoZVY5cE9tbHRjRzl5ZEc5VWIzUmhiR1ZRWVdkaGRHOCtNVFl1TURBOEwzQmhlVjlwT21sdGNHOXlkRzlVYjNSaGJHVlFZV2RoZEc4K0Nna0pQSEJoZVY5cE9tbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiMVpsY25OaGJXVnVkRzgrTURFd01EQXdNREF3TURBd01EQXhOVEE4TDNCaGVWOXBPbWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFabGNuTmhiV1Z1ZEc4K0Nna0pQSEJoZVY5cE9rTnZaR2xqWlVOdmJuUmxjM1J2VUdGbllXMWxiblJ2UG5Rd01EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01UVXdQQzl3WVhsZmFUcERiMlJwWTJWRGIyNTBaWE4wYjFCaFoyRnRaVzUwYno0S0NRazhjR0Y1WDJrNlpHRjBhVk5wYm1kdmJHOVFZV2RoYldWdWRHOCtDZ2tKQ1R4d1lYbGZhVHB6YVc1bmIyeHZTVzF3YjNKMGIxQmhaMkYwYno0ek5UVXVNREE4TDNCaGVWOXBPbk5wYm1kdmJHOUpiWEJ2Y25SdlVHRm5ZWFJ2UGdvSkNRazhjR0Y1WDJrNlpYTnBkRzlUYVc1bmIyeHZVR0ZuWVcxbGJuUnZQbEJCUjBGVVFUd3ZjR0Y1WDJrNlpYTnBkRzlUYVc1bmIyeHZVR0ZuWVcxbGJuUnZQZ29KQ1FrOGNHRjVYMms2WkdGMFlVVnphWFJ2VTJsdVoyOXNiMUJoWjJGdFpXNTBiejR5TURJMExUQTBMVEU1UEM5d1lYbGZhVHBrWVhSaFJYTnBkRzlUYVc1bmIyeHZVR0ZuWVcxbGJuUnZQZ29KQ1FrOGNHRjVYMms2YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlVtbHpZMjl6YzJsdmJtVStNVEV4TVRFeE1URXhNVEV4UEM5d1lYbGZhVHBwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5U2FYTmpiM056YVc5dVpUNEtDUWtKUEhCaGVWOXBPbU5oZFhOaGJHVldaWEp6WVcxbGJuUnZQbmg0ZUhoNGVIaDRQQzl3WVhsZmFUcGpZWFZ6WVd4bFZtVnljMkZ0Wlc1MGJ6NEtDUWtKUEhCaGVWOXBPbVJoZEdsVGNHVmphV1pwWTJsU2FYTmpiM056YVc5dVpUNTRlSGg0ZUhnOEwzQmhlVjlwT21SaGRHbFRjR1ZqYVdacFkybFNhWE5qYjNOemFXOXVaVDRLQ1FrOEwzQmhlVjlwT21SaGRHbFRhVzVuYjJ4dlVHRm5ZVzFsYm5SdlBnb0pDVHh3WVhsZmFUcGtZWFJwVTJsdVoyOXNiMUJoWjJGdFpXNTBiejRLQ1FrSlBIQmhlVjlwT25OcGJtZHZiRzlKYlhCdmNuUnZVR0ZuWVhSdlBqTXdNQzR3TUR3dmNHRjVYMms2YzJsdVoyOXNiMGx0Y0c5eWRHOVFZV2RoZEc4K0Nna0pDVHh3WVhsZmFUcGxjMmwwYjFOcGJtZHZiRzlRWVdkaGJXVnVkRzgrVUVGSFFWUkJQQzl3WVhsZmFUcGxjMmwwYjFOcGJtZHZiRzlRWVdkaGJXVnVkRzgrQ2drSkNUeHdZWGxmYVRwa1lYUmhSWE5wZEc5VGFXNW5iMnh2VUdGbllXMWxiblJ2UGpJd01qUXRNRFF0TVRrOEwzQmhlVjlwT21SaGRHRkZjMmwwYjFOcGJtZHZiRzlRWVdkaGJXVnVkRzgrQ2drSkNUeHdZWGxmYVRwcFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOVNhWE5qYjNOemFXOXVaVDR4TVRFeE1URXhNVEV4TVRJOEwzQmhlVjlwT21sa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amIxSnBjMk52YzNOcGIyNWxQZ29KQ1FrOGNHRjVYMms2WTJGMWMyRnNaVlpsY25OaGJXVnVkRzgrZUhoNGVIaDRlSGc4TDNCaGVWOXBPbU5oZFhOaGJHVldaWEp6WVcxbGJuUnZQZ29KQ1FrOGNHRjVYMms2WkdGMGFWTndaV05wWm1samFWSnBjMk52YzNOcGIyNWxQbmg0ZUhoNGVEd3ZjR0Y1WDJrNlpHRjBhVk53WldOcFptbGphVkpwYzJOdmMzTnBiMjVsUGdvSkNUd3ZjR0Y1WDJrNlpHRjBhVk5wYm1kdmJHOVFZV2RoYldWdWRHOCtDZ2s4TDNCaGVWOXBPbVJoZEdsUVlXZGhiV1Z1ZEc4K0Nqd3ZjR0Y1WDJrNlVsUSs8L3J0PgogICAgICAgIDwvcHB0OnBhYUludmlhUlQ+CiAgICA8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg==',
];

$data_resp = [
    ':id' => 157,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 10:32:01.197',
    ':tipoevento' => 'paaInviaRT',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000150',
    ':ccp' => 't0000000000000000000000000000150',
    ':noticenumber' => '',
    ':creditorreferenceid' => '01000000000000150',
    ':paymenttoken' => 't0000000000000000000000000000150',
    ':psp' => 'PSP_RT',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100153',
    ':sessionidoriginal' => 'session_id_original_000150',
    ':uniqueid' => 'T000157',
    ':payload' => 'PHNvYXA6RW52ZWxvcGUgeG1sbnM6c29hcD0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPjxTT0FQLUVOVjpIZWFkZXIgeG1sbnM6U09BUC1FTlY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIi8+PHNvYXA6Qm9keT48bnM0OnBhYUludmlhUlRSaXNwb3N0YSB4bWxuczpuczI9Imh0dHA6Ly93d3cuZGlnaXRwYS5nb3YuaXQvc2NoZW1hcy8yMDExL1BhZ2FtZW50aS8iIHhtbG5zOm5zMz0iaHR0cDovL3dzLnBhZ2FtZW50aS50ZWxlbWF0aWNpLmdvdi9wcHRoZWFkIiB4bWxuczpuczQ9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIj48cGFhSW52aWFSVFJpc3Bvc3RhPjxlc2l0bz5PSzwvZXNpdG8+PC9wYWFJbnZpYVJUUmlzcG9zdGE+PC9uczQ6cGFhSW52aWFSVFJpc3Bvc3RhPjwvc29hcDpCb2R5Pjwvc29hcDpFbnZlbG9wZT4=',
];


Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);




























































$data_req = [
    ':id' => 160,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 10:42:00.197',
    ':tipoevento' => 'activateIOPayment',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000160',
    ':ccp' => 't0000000000000000000000000000160',
    ':noticenumber' => '301000000000000160',
    ':creditorreferenceid' => '01000000000000160',
    ':paymenttoken' => 't0000000000000000000000000000160',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100160',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000160',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPHNvYXA6RW52ZWxvcGUgeG1sbnM6bmZwc3A9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9ySU8ueHNkIiB4bWxuczpzb2FwPSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyIgeG1sbnM6dG5zPSJodHRwOi8vcGFnb3BhLWFwaS5wYWdvcGEuZ292Lml0L25vZGUvbm9kZUZvcklPLndzZGwiIHhtbG5zOnhzaT0iaHR0cDovL3d3dy53My5vcmcvMjAwMS9YTUxTY2hlbWEtaW5zdGFuY2UiPgoJPHNvYXA6Qm9keT4KCQk8bmZwc3A6YWN0aXZhdGVJT1BheW1lbnRSZXEgeG1sbnM6bmZwc3A9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9ySU8ueHNkIj4KCQkJPGlkUFNQPkFHSURfMDE8L2lkUFNQPgoJCQk8aWRCcm9rZXJQU1A+Nzc3Nzc3Nzc3Nzc8L2lkQnJva2VyUFNQPgoJCQk8aWRDaGFubmVsPjc3Nzc3Nzc3Nzc3XzAxPC9pZENoYW5uZWw+CgkJCTxwYXNzd29yZD54eHh4eHg8L3Bhc3N3b3JkPgoJCQk8cXJDb2RlPgoJCQkJPGZpc2NhbENvZGU+Nzc3Nzc3Nzc3Nzc8L2Zpc2NhbENvZGU+CgkJCQk8bm90aWNlTnVtYmVyPjMwMTAwMDAwMDAwMDAwMDE2MDwvbm90aWNlTnVtYmVyPgoJCQk8L3FyQ29kZT4KCQkJPGFtb3VudD4zMC4wMDwvYW1vdW50PgoJCTwvbmZwc3A6YWN0aXZhdGVJT1BheW1lbnRSZXE+Cgk8L3NvYXA6Qm9keT4KPC9zb2FwOkVudmVsb3BlPg==',
];

$data_resp = [
    ':id' => 161,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 10:42:01.197',
    ':tipoevento' => 'activateIOPayment',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000160',
    ':ccp' => 't0000000000000000000000000000160',
    ':noticenumber' => '301000000000000160',
    ':creditorreferenceid' => '01000000000000160',
    ':paymenttoken' => 't0000000000000000000000000000160',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100160',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000161',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpuZnBzcD0iaHR0cDovL3BhZ29wYS1hcGkucGFnb3BhLmdvdi5pdC9ub2RlL25vZGVGb3JJTy54c2QiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIiB4bWxuczp4cz0iaHR0cDovL3d3dy53My5vcmcvMjAwMS9YTUxTY2hlbWEiIHhtbG5zOnhzaT0iaHR0cDovL3d3dy53My5vcmcvMjAwMS9YTUxTY2hlbWEtaW5zdGFuY2UiPgoJPHNvYXBlbnY6Qm9keT4KCQk8bmZwc3A6YWN0aXZhdGVJT1BheW1lbnRSZXM+CgkJCTxvdXRjb21lPk9LPC9vdXRjb21lPgoJCQk8dG90YWxBbW91bnQ+MzUuNTA8L3RvdGFsQW1vdW50PgoJCQk8cGF5bWVudERlc2NyaXB0aW9uPnh4eHh4eDwvcGF5bWVudERlc2NyaXB0aW9uPgoJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCTxjb21wYW55TmFtZT54eHh4PC9jb21wYW55TmFtZT4KCQkJPHBheW1lbnRUb2tlbj50MDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDE2MDwvcGF5bWVudFRva2VuPgoJCQk8Y3JlZGl0b3JSZWZlcmVuY2VJZD4wMTAwMDAwMDAwMDAwMDE2MDwvY3JlZGl0b3JSZWZlcmVuY2VJZD4KCQk8L25mcHNwOmFjdGl2YXRlSU9QYXltZW50UmVzPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4=',
];


Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);


























$data_req = [
    ':id' => 162,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 10:45:00.197',
    ':tipoevento' => 'pspNotifyPayment',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000160',
    ':ccp' => 't0000000000000000000000000000160',
    ':noticenumber' => '301000000000000160',
    ':creditorreferenceid' => '01000000000000160',
    ':paymenttoken' => 't0000000000000000000000000000160',
    ':psp' => 'PSP_IO',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100161',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000162',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpwZm49Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvcHNwL3BzcEZvck5vZGUueHNkIiB4bWxuczpzb2FwZW52PSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyIgeG1sbnM6eHM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hIiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KICAgIDxzb2FwZW52OkJvZHk+CiAgICAgICAgPHBmbjpwc3BOb3RpZnlQYXltZW50UmVxPgogICAgICAgICAgICA8aWRQU1A+UFNQX0lPPC9pZFBTUD4KICAgICAgICAgICAgPGlkQnJva2VyUFNQPjg4ODg4ODg4ODg4PC9pZEJyb2tlclBTUD4KICAgICAgICAgICAgPGlkQ2hhbm5lbD44ODg4ODg4ODg4OF8wMTwvaWRDaGFubmVsPgogICAgICAgICAgICA8cGF5bWVudFRva2VuPnQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMTYwPC9wYXltZW50VG9rZW4+CiAgICAgICAgICAgIDxwYXltZW50RGVzY3JpcHRpb24+cGFnYW1lbnRvIG11bHRpYmVuZWZpY2lhcmlvPC9wYXltZW50RGVzY3JpcHRpb24+CiAgICAgICAgICAgIDxmaXNjYWxDb2RlUEE+Nzc3Nzc3Nzc3Nzc8L2Zpc2NhbENvZGVQQT4KICAgICAgICAgICAgPGNvbXBhbnlOYW1lPnh4eHh4eHg8L2NvbXBhbnlOYW1lPgogICAgICAgICAgICA8Y3JlZGl0b3JSZWZlcmVuY2VJZD4wMTAwMDAwMDAwMDAwMDEwMDwvY3JlZGl0b3JSZWZlcmVuY2VJZD4KICAgICAgICAgICAgPGRlYnRBbW91bnQ+MzUuNTA8L2RlYnRBbW91bnQ+CiAgICAgICAgICAgIDx0cmFuc2Zlckxpc3Q+CiAgICAgICAgICAgICAgICA8dHJhbnNmZXI+CiAgICAgICAgICAgICAgICAgICAgPGlkVHJhbnNmZXI+MTwvaWRUcmFuc2Zlcj4KICAgICAgICAgICAgICAgICAgICA8dHJhbnNmZXJBbW91bnQ+MjAuMDA8L3RyYW5zZmVyQW1vdW50PgogICAgICAgICAgICAgICAgICAgIDxmaXNjYWxDb2RlUEE+Nzc3Nzc3Nzc3Nzc8L2Zpc2NhbENvZGVQQT4KICAgICAgICAgICAgICAgICAgICA8SUJBTj5JVDE4VTAwMDAwMDAwMDAwMDAwMDAwMDAwMDE8L0lCQU4+CiAgICAgICAgICAgICAgICAgICAgPHJlbWl0dGFuY2VJbmZvcm1hdGlvbj54eHh4PC9yZW1pdHRhbmNlSW5mb3JtYXRpb24+CiAgICAgICAgICAgICAgICAgICAgPG1ldGFkYXRhPgogICAgICAgICAgICAgICAgICAgICAgICA8bWFwRW50cnk+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICA8a2V5PmNoaWF2ZV9JT18xXzE8L2tleT4KICAgICAgICAgICAgICAgICAgICAgICAgICAgIDx2YWx1ZT52YWxvcmVfSU9fMV8xPC92YWx1ZT4KICAgICAgICAgICAgICAgICAgICAgICAgPC9tYXBFbnRyeT4KICAgICAgICAgICAgICAgICAgICAgICAgPG1hcEVudHJ5PgogICAgICAgICAgICAgICAgICAgICAgICAgICAgPGtleT5jaGlhdmVfSU9fMV8yPC9rZXk+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICA8dmFsdWU+dmFsb3JlX0lPXzFfMjwvdmFsdWU+CiAgICAgICAgICAgICAgICAgICAgICAgIDwvbWFwRW50cnk+CiAgICAgICAgICAgICAgICAgICAgPC9tZXRhZGF0YT4KICAgICAgICAgICAgICAgIDwvdHJhbnNmZXI+CiAgICAgICAgICAgICAgICA8dHJhbnNmZXI+CiAgICAgICAgICAgICAgICAgICAgPGlkVHJhbnNmZXI+MjwvaWRUcmFuc2Zlcj4KICAgICAgICAgICAgICAgICAgICA8dHJhbnNmZXJBbW91bnQ+MTUuNTA8L3RyYW5zZmVyQW1vdW50PgogICAgICAgICAgICAgICAgICAgIDxmaXNjYWxDb2RlUEE+Nzc3Nzc3Nzc3Nzg8L2Zpc2NhbENvZGVQQT4KICAgICAgICAgICAgICAgICAgICA8SUJBTj5JVDE4VTAwMDAwMDAwMDAwMDAwMDAwMDAwMDI8L0lCQU4+CiAgICAgICAgICAgICAgICAgICAgPHJlbWl0dGFuY2VJbmZvcm1hdGlvbj54eHh4PC9yZW1pdHRhbmNlSW5mb3JtYXRpb24+CiAgICAgICAgICAgICAgICAgICAgPG1ldGFkYXRhPgogICAgICAgICAgICAgICAgICAgICAgICA8bWFwRW50cnk+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICA8a2V5PmNoaWF2ZV9JT18yXzE8L2tleT4KICAgICAgICAgICAgICAgICAgICAgICAgICAgIDx2YWx1ZT52YWxvcmVfSU9fMl8xPC92YWx1ZT4KICAgICAgICAgICAgICAgICAgICAgICAgPC9tYXBFbnRyeT4KICAgICAgICAgICAgICAgICAgICAgICAgPG1hcEVudHJ5PgogICAgICAgICAgICAgICAgICAgICAgICAgICAgPGtleT5jaGlhdmVfSU9fMl8yPC9rZXk+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICA8dmFsdWU+dmFsb3JlX0lPXzJfMjwvdmFsdWU+CiAgICAgICAgICAgICAgICAgICAgICAgIDwvbWFwRW50cnk+CiAgICAgICAgICAgICAgICAgICAgPC9tZXRhZGF0YT4KICAgICAgICAgICAgICAgIDwvdHJhbnNmZXI+CiAgICAgICAgICAgIDwvdHJhbnNmZXJMaXN0PgogICAgICAgICAgICA8Y3JlZGl0Q2FyZFBheW1lbnQ+CiAgICAgICAgICAgICAgICA8cnJuPjExMTExMTExMTExOTwvcnJuPgogICAgICAgICAgICAgICAgPG91dGNvbWVQYXltZW50R2F0ZXdheT5PSzwvb3V0Y29tZVBheW1lbnRHYXRld2F5PgogICAgICAgICAgICAgICAgPHRvdGFsQW1vdW50PjM1LjUwPC90b3RhbEFtb3VudD4KICAgICAgICAgICAgICAgIDxmZWU+MS4zMDwvZmVlPgogICAgICAgICAgICAgICAgPHRpbWVzdGFtcE9wZXJhdGlvbj4yMDI0LTA0LTEwVDIxOjE0OjQ3PC90aW1lc3RhbXBPcGVyYXRpb24+CiAgICAgICAgICAgICAgICA8YXV0aG9yaXphdGlvbkNvZGU+MTExMTE5PC9hdXRob3JpemF0aW9uQ29kZT4KICAgICAgICAgICAgPC9jcmVkaXRDYXJkUGF5bWVudD4KICAgICAgICA8L3Bmbjpwc3BOb3RpZnlQYXltZW50UmVxPgogICAgPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4=',
];

$data_resp = [
    ':id' => 163,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 10:45:01.197',
    ':tipoevento' => 'pspNotifyPayment',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000160',
    ':ccp' => 't0000000000000000000000000000160',
    ':noticenumber' => '301000000000000160',
    ':creditorreferenceid' => '01000000000000160',
    ':paymenttoken' => 't0000000000000000000000000000160',
    ':psp' => 'PSP_IO',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100161',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000163',
    ':payload' => 'PFNPQVAtRU5WOkVudmVsb3BlIHhtbG5zOlNPQVAtRU5WPSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyI+Cgk8U09BUC1FTlY6SGVhZGVyLz4KCTxTT0FQLUVOVjpCb2R5PgoJCTxuczM6cHNwTm90aWZ5UGF5bWVudFJlcyB4bWxuczpuczM9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvcHNwL3BzcEZvck5vZGUueHNkIj4KCQkJPG91dGNvbWU+T0s8L291dGNvbWU+CgkJPC9uczM6cHNwTm90aWZ5UGF5bWVudFJlcz4KCTwvU09BUC1FTlY6Qm9keT4KPC9TT0FQLUVOVjpFbnZlbG9wZT4=',
];


Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);


















$data_req = [
    ':id' => 164,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 10:47:00.197',
    ':tipoevento' => 'sendPaymentOutcome',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000160',
    ':ccp' => 't0000000000000000000000000000160',
    ':noticenumber' => '301000000000000160',
    ':creditorreferenceid' => '01000000000000160',
    ':paymenttoken' => 't0000000000000000000000000000160',
    ':psp' => 'PSP_IO',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100162',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000164',
    ':payload' => 'PHNvYXA6RW52ZWxvcGUgeG1sbnM6c29hcD0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPgoJPHNvYXA6Qm9keT4KCQk8bnMyOnNlbmRQYXltZW50T3V0Y29tZVJlcSB4bWxuczpuczI9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6bnMzPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyI+CgkJCTxpZFBTUD5QU1BfSU88L2lkUFNQPgoJCQk8aWRCcm9rZXJQU1A+ODg4ODg4ODg4ODg8L2lkQnJva2VyUFNQPgoJCQk8aWRDaGFubmVsPjg4ODg4ODg4ODg4XzAxPC9pZENoYW5uZWw+CgkJCTxwYXNzd29yZD54eHh4eHh4eDwvcGFzc3dvcmQ+CgkJCTxwYXltZW50VG9rZW4+dDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxNjA8L3BheW1lbnRUb2tlbj4KCQkJPG91dGNvbWU+T0s8L291dGNvbWU+CgkJCTxkZXRhaWxzPgoJCQkJPHBheW1lbnRNZXRob2Q+b3RoZXI8L3BheW1lbnRNZXRob2Q+CgkJCQk8ZmVlPjEuMDA8L2ZlZT4KCQkJCTxhcHBsaWNhdGlvbkRhdGU+MjAyNC0wNC0wMjwvYXBwbGljYXRpb25EYXRlPgoJCQkJPHRyYW5zZmVyRGF0ZT4yMDI0LTA0LTAzPC90cmFuc2ZlckRhdGU+CgkJCTwvZGV0YWlscz4KCQk8L25zMjpzZW5kUGF5bWVudE91dGNvbWVSZXE+Cgk8L3NvYXA6Qm9keT4KPC9zb2FwOkVudmVsb3BlPg==',
];

$data_resp = [
    ':id' => 165,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 10:47:01.197',
    ':tipoevento' => 'sendPaymentOutcome',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000160',
    ':ccp' => 't0000000000000000000000000000160',
    ':noticenumber' => '301000000000000160',
    ':creditorreferenceid' => '01000000000000160',
    ':paymenttoken' => 't0000000000000000000000000000160',
    ':psp' => 'PSP_IO',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100162',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000165',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6c2VuZFBheW1lbnRPdXRjb21lUmVzPgoJCQk8b3V0Y29tZT5PSzwvb3V0Y29tZT4KCQk8L25mcDpzZW5kUGF5bWVudE91dGNvbWVSZXM+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg==',
];


Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);




















$data_req = [
    ':id' => 166,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 10:52:00.197',
    ':tipoevento' => 'activatePaymentNoticeV2',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000161',
    ':ccp' => 't0000000000000000000000000000161',
    ':noticenumber' => '301000000000000161',
    ':creditorreferenceid' => '01000000000000161',
    ':paymenttoken' => 't0000000000000000000000000000161',
    ':psp' => 'PSP_V2',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100166',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000166',
    ':payload' => 'PHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6bm9kPSJodHRwOi8vcGFnb3BhLWFwaS5wYWdvcGEuZ292Lml0L25vZGUvbm9kZUZvclBzcC54c2QiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIj4KCTxzb2FwZW52OkhlYWRlci8+Cgk8c29hcGVudjpCb2R5PgoJCTxub2Q6YWN0aXZhdGVQYXltZW50Tm90aWNlVjJSZXF1ZXN0PgoJCQk8aWRQU1A+QUdJRF8wMTwvaWRQU1A+CgkJCTxpZEJyb2tlclBTUD44ODg4ODg4ODg4ODwvaWRCcm9rZXJQU1A+CgkJCTxpZENoYW5uZWw+ODg4ODg4ODg4ODhfMDE8L2lkQ2hhbm5lbD4KCQkJPHBhc3N3b3JkPnh4eHh4PC9wYXNzd29yZD4KCQkJPGlkZW1wb3RlbmN5S2V5Pnh4eHh4eHh4eDwvaWRlbXBvdGVuY3lLZXk+CgkJCTxxckNvZGU+CgkJCQk8ZmlzY2FsQ29kZT43Nzc3Nzc3Nzc3NzwvZmlzY2FsQ29kZT4KCQkJCTxub3RpY2VOdW1iZXI+MzAxMDAwMDAwMDAwMDAwMTYxPC9ub3RpY2VOdW1iZXI+CgkJCTwvcXJDb2RlPgoJCQk8ZXhwaXJhdGlvblRpbWU+OTAwMDAwPC9leHBpcmF0aW9uVGltZT4KCQkJPGFtb3VudD4zNjAuMDA8L2Ftb3VudD4KCQk8L25vZDphY3RpdmF0ZVBheW1lbnROb3RpY2VWMlJlcXVlc3Q+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg==',
];

$data_resp = [
    ':id' => 167,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 10:52:01.197',
    ':tipoevento' => 'activatePaymentNoticeV2',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000161',
    ':ccp' => 't0000000000000000000000000000161',
    ':noticenumber' => '301000000000000161',
    ':creditorreferenceid' => '01000000000000161',
    ':paymenttoken' => 't0000000000000000000000000000161',
    ':psp' => 'PSP_V2',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100166',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000167',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlVjJSZXNwb25zZT4KCQkJPG91dGNvbWU+T0s8L291dGNvbWU+CgkJCTx0b3RhbEFtb3VudD4zNjAuMDA8L3RvdGFsQW1vdW50PgoJCQk8cGF5bWVudERlc2NyaXB0aW9uPjMwMTAwMDAwMDAwMDAwMDAxMDwvcGF5bWVudERlc2NyaXB0aW9uPgoJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCTxjb21wYW55TmFtZT54eHh4eHg8L2NvbXBhbnlOYW1lPgoJCQk8b2ZmaWNlTmFtZT54eHh4eHg8L29mZmljZU5hbWU+CgkJCTxwYXltZW50VG9rZW4+dDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxNjE8L3BheW1lbnRUb2tlbj4KCQkJPHRyYW5zZmVyTGlzdD4KCQkJCTx0cmFuc2Zlcj4KCQkJCQk8aWRUcmFuc2Zlcj4xPC9pZFRyYW5zZmVyPgoJCQkJCTx0cmFuc2ZlckFtb3VudD4yMDAuMDA8L3RyYW5zZmVyQW1vdW50PgoJCQkJCTxmaXNjYWxDb2RlUEE+Nzc3Nzc3Nzc3Nzc8L2Zpc2NhbENvZGVQQT4KCQkJCQk8Y29tcGFueU5hbWU+eHh4eHh4eDwvY29tcGFueU5hbWU+CgkJCQkJPElCQU4+SVQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxPC9JQkFOPgoJCQkJCTxyZW1pdHRhbmNlSW5mb3JtYXRpb24+eHh4eHh4eDwvcmVtaXR0YW5jZUluZm9ybWF0aW9uPgoJCQkJCTx0cmFuc2ZlckNhdGVnb3J5Pnh4eHh4eDwvdHJhbnNmZXJDYXRlZ29yeT4KCQkJCTwvdHJhbnNmZXI+CgkJCQk8dHJhbnNmZXI+CgkJCQkJPGlkVHJhbnNmZXI+MjwvaWRUcmFuc2Zlcj4KCQkJCQk8dHJhbnNmZXJBbW91bnQ+MTYwLjAwPC90cmFuc2ZlckFtb3VudD4KCQkJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc4PC9maXNjYWxDb2RlUEE+CgkJCQkJPGNvbXBhbnlOYW1lPnh4eHh4eHg8L2NvbXBhbnlOYW1lPgoJCQkJCTxJQkFOPklUMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMjwvSUJBTj4KCQkJCQk8cmVtaXR0YW5jZUluZm9ybWF0aW9uPnh4eHh4eHg8L3JlbWl0dGFuY2VJbmZvcm1hdGlvbj4KCQkJCQk8dHJhbnNmZXJDYXRlZ29yeT54eHh4eHg8L3RyYW5zZmVyQ2F0ZWdvcnk+CgkJCQk8L3RyYW5zZmVyPgoJCQk8L3RyYW5zZmVyTGlzdD4KCQkJPGNyZWRpdG9yUmVmZXJlbmNlSWQ+MDEwMDAwMDAwMDAwMDAxNjE8L2NyZWRpdG9yUmVmZXJlbmNlSWQ+CgkJPC9uZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlVjJSZXNwb25zZT4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+',
];


Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);























$data_req = [
    ':id' => 168,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 10:53:00.197',
    ':tipoevento' => 'activatePaymentNoticeV2',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000162',
    ':ccp' => 't0000000000000000000000000000162',
    ':noticenumber' => '301000000000000162',
    ':creditorreferenceid' => '01000000000000162',
    ':paymenttoken' => 't0000000000000000000000000000162',
    ':psp' => 'PSP_V2',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100167',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000168',
    ':payload' => 'PHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6bm9kPSJodHRwOi8vcGFnb3BhLWFwaS5wYWdvcGEuZ292Lml0L25vZGUvbm9kZUZvclBzcC54c2QiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIj4KCTxzb2FwZW52OkhlYWRlci8+Cgk8c29hcGVudjpCb2R5PgoJCTxub2Q6YWN0aXZhdGVQYXltZW50Tm90aWNlVjJSZXF1ZXN0PgoJCQk8aWRQU1A+QUdJRF8wMTwvaWRQU1A+CgkJCTxpZEJyb2tlclBTUD44ODg4ODg4ODg4ODwvaWRCcm9rZXJQU1A+CgkJCTxpZENoYW5uZWw+ODg4ODg4ODg4ODhfMDE8L2lkQ2hhbm5lbD4KCQkJPHBhc3N3b3JkPnh4eHh4PC9wYXNzd29yZD4KCQkJPGlkZW1wb3RlbmN5S2V5Pnh4eHh4eHh4eDwvaWRlbXBvdGVuY3lLZXk+CgkJCTxxckNvZGU+CgkJCQk8ZmlzY2FsQ29kZT43Nzc3Nzc3Nzc3NzwvZmlzY2FsQ29kZT4KCQkJCTxub3RpY2VOdW1iZXI+MzAxMDAwMDAwMDAwMDAwMTYyPC9ub3RpY2VOdW1iZXI+CgkJCTwvcXJDb2RlPgoJCQk8ZXhwaXJhdGlvblRpbWU+OTAwMDAwPC9leHBpcmF0aW9uVGltZT4KCQkJPGFtb3VudD4zNjAuMDA8L2Ftb3VudD4KCQk8L25vZDphY3RpdmF0ZVBheW1lbnROb3RpY2VWMlJlcXVlc3Q+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg==',
];

$data_resp = [
    ':id' => 169,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 10:53:01.197',
    ':tipoevento' => 'activatePaymentNoticeV2',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000162',
    ':ccp' => 't0000000000000000000000000000162',
    ':noticenumber' => '301000000000000162',
    ':creditorreferenceid' => '01000000000000162',
    ':paymenttoken' => 't0000000000000000000000000000162',
    ':psp' => 'PSP_V2',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100167',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000169',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlVjJSZXNwb25zZT4KCQkJPG91dGNvbWU+T0s8L291dGNvbWU+CgkJCTx0b3RhbEFtb3VudD4zNjAuMDA8L3RvdGFsQW1vdW50PgoJCQk8cGF5bWVudERlc2NyaXB0aW9uPjMwMTAwMDAwMDAwMDAwMDAxMDwvcGF5bWVudERlc2NyaXB0aW9uPgoJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCTxjb21wYW55TmFtZT54eHh4eHg8L2NvbXBhbnlOYW1lPgoJCQk8b2ZmaWNlTmFtZT54eHh4eHg8L29mZmljZU5hbWU+CgkJCTxwYXltZW50VG9rZW4+dDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxNjI8L3BheW1lbnRUb2tlbj4KCQkJPHRyYW5zZmVyTGlzdD4KCQkJCTx0cmFuc2Zlcj4KCQkJCQk8aWRUcmFuc2Zlcj4xPC9pZFRyYW5zZmVyPgoJCQkJCTx0cmFuc2ZlckFtb3VudD4yMDAuMDA8L3RyYW5zZmVyQW1vdW50PgoJCQkJCTxmaXNjYWxDb2RlUEE+Nzc3Nzc3Nzc3Nzc8L2Zpc2NhbENvZGVQQT4KCQkJCQk8Y29tcGFueU5hbWU+eHh4eHh4eDwvY29tcGFueU5hbWU+CgkJCQkJPElCQU4+SVQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxPC9JQkFOPgoJCQkJCTxyZW1pdHRhbmNlSW5mb3JtYXRpb24+eHh4eHh4eDwvcmVtaXR0YW5jZUluZm9ybWF0aW9uPgoJCQkJCTx0cmFuc2ZlckNhdGVnb3J5Pnh4eHh4eDwvdHJhbnNmZXJDYXRlZ29yeT4KCQkJCQk8bWV0YWRhdGE+CgkJCQkJCTxtYXBFbnRyeT4KCQkJCQkJCTxrZXk+bWtfdHJhbnNmZXJfMV8xPC9rZXk+CgkJCQkJCQk8dmFsdWU+bXZfdHJhbnNmZXJfMV8xPC92YWx1ZT4KCQkJCQkJPC9tYXBFbnRyeT4KCQkJCQkJPG1hcEVudHJ5PgoJCQkJCQkJPGtleT5ta190cmFuc2Zlcl8xXzI8L2tleT4KCQkJCQkJCTx2YWx1ZT5tdl90cmFuc2Zlcl8xXzI8L3ZhbHVlPgoJCQkJCQk8L21hcEVudHJ5PgoJCQkJCTwvbWV0YWRhdGE+CgkJCQk8L3RyYW5zZmVyPgoJCQkJPHRyYW5zZmVyPgoJCQkJCTxpZFRyYW5zZmVyPjI8L2lkVHJhbnNmZXI+CgkJCQkJPHRyYW5zZmVyQW1vdW50PjE2MC4wMDwvdHJhbnNmZXJBbW91bnQ+CgkJCQkJPGZpc2NhbENvZGVQQT43Nzc3Nzc3Nzc3ODwvZmlzY2FsQ29kZVBBPgoJCQkJCTxjb21wYW55TmFtZT54eHh4eHh4PC9jb21wYW55TmFtZT4KCQkJCQk8SUJBTj5JVDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDI8L0lCQU4+CgkJCQkJPHJlbWl0dGFuY2VJbmZvcm1hdGlvbj54eHh4eHh4PC9yZW1pdHRhbmNlSW5mb3JtYXRpb24+CgkJCQkJPHRyYW5zZmVyQ2F0ZWdvcnk+eHh4eHh4PC90cmFuc2ZlckNhdGVnb3J5PgoJCQkJCTxtZXRhZGF0YT4KCQkJCQkJPG1hcEVudHJ5PgoJCQkJCQkJPGtleT5ta190cmFuc2Zlcl8yXzE8L2tleT4KCQkJCQkJCTx2YWx1ZT5tdl90cmFuc2Zlcl8yXzE8L3ZhbHVlPgoJCQkJCQk8L21hcEVudHJ5PgoJCQkJCQk8bWFwRW50cnk+CgkJCQkJCQk8a2V5Pm1rX3RyYW5zZmVyXzJfMjwva2V5PgoJCQkJCQkJPHZhbHVlPm12X3RyYW5zZmVyXzJfMjwvdmFsdWU+CgkJCQkJCTwvbWFwRW50cnk+CgkJCQkJPC9tZXRhZGF0YT4KCQkJCTwvdHJhbnNmZXI+CgkJCTwvdHJhbnNmZXJMaXN0PgoJCQk8bWV0YWRhdGE+CgkJCQk8bWFwRW50cnk+CgkJCQkJPGtleT5ta19wYXltZW50XzE8L2tleT4KCQkJCQk8dmFsdWU+bXZfcGF5bWVudF8xPC92YWx1ZT4KCQkJCTwvbWFwRW50cnk+CgkJCQk8bWFwRW50cnk+CgkJCQkJPGtleT5ta19wYXltZW50XzI8L2tleT4KCQkJCQk8dmFsdWU+bXZfcGF5bWVudF8yPC92YWx1ZT4KCQkJCTwvbWFwRW50cnk+CgkJCTwvbWV0YWRhdGE+CgkJCTxjcmVkaXRvclJlZmVyZW5jZUlkPjAxMDAwMDAwMDAwMDAwMTYyPC9jcmVkaXRvclJlZmVyZW5jZUlkPgoJCTwvbmZwOmFjdGl2YXRlUGF5bWVudE5vdGljZVYyUmVzcG9uc2U+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg==',
];


Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);














$data_req = [
    ':id' => 170,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 10:53:00.197',
    ':tipoevento' => 'activatePaymentNoticeV2',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000163',
    ':ccp' => 't0000000000000000000000000000163',
    ':noticenumber' => '301000000000000163',
    ':creditorreferenceid' => '01000000000000163',
    ':paymenttoken' => 't0000000000000000000000000000163',
    ':psp' => 'PSP_V2',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100168',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000170',
    ':payload' => 'PHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6bm9kPSJodHRwOi8vcGFnb3BhLWFwaS5wYWdvcGEuZ292Lml0L25vZGUvbm9kZUZvclBzcC54c2QiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIj4KCTxzb2FwZW52OkhlYWRlci8+Cgk8c29hcGVudjpCb2R5PgoJCTxub2Q6YWN0aXZhdGVQYXltZW50Tm90aWNlVjJSZXF1ZXN0PgoJCQk8aWRQU1A+QUdJRF8wMTwvaWRQU1A+CgkJCTxpZEJyb2tlclBTUD44ODg4ODg4ODg4ODwvaWRCcm9rZXJQU1A+CgkJCTxpZENoYW5uZWw+ODg4ODg4ODg4ODhfMDE8L2lkQ2hhbm5lbD4KCQkJPHBhc3N3b3JkPnh4eHh4PC9wYXNzd29yZD4KCQkJPGlkZW1wb3RlbmN5S2V5Pnh4eHh4eHh4eDwvaWRlbXBvdGVuY3lLZXk+CgkJCTxxckNvZGU+CgkJCQk8ZmlzY2FsQ29kZT43Nzc3Nzc3Nzc3NzwvZmlzY2FsQ29kZT4KCQkJCTxub3RpY2VOdW1iZXI+MzAxMDAwMDAwMDAwMDAwMTYzPC9ub3RpY2VOdW1iZXI+CgkJCTwvcXJDb2RlPgoJCQk8ZXhwaXJhdGlvblRpbWU+OTAwMDAwPC9leHBpcmF0aW9uVGltZT4KCQkJPGFtb3VudD4yMTYuMDA8L2Ftb3VudD4KCQk8L25vZDphY3RpdmF0ZVBheW1lbnROb3RpY2VWMlJlcXVlc3Q+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg==',
];

$data_resp = [
    ':id' => 171,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 10:53:01.197',
    ':tipoevento' => 'activatePaymentNoticeV2',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000163',
    ':ccp' => 't0000000000000000000000000000163',
    ':noticenumber' => '301000000000000163',
    ':creditorreferenceid' => '01000000000000163',
    ':paymenttoken' => 't0000000000000000000000000000163',
    ':psp' => 'PSP_V2',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100168',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000171',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlVjJSZXNwb25zZT4KCQkJPG91dGNvbWU+T0s8L291dGNvbWU+CgkJCTx0b3RhbEFtb3VudD4yMTYuMDA8L3RvdGFsQW1vdW50PgoJCQk8cGF5bWVudERlc2NyaXB0aW9uPjMwMTAwMDAwMDAwMDAwMDAxMDwvcGF5bWVudERlc2NyaXB0aW9uPgoJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCTxjb21wYW55TmFtZT54eHh4eHg8L2NvbXBhbnlOYW1lPgoJCQk8b2ZmaWNlTmFtZT54eHh4eHg8L29mZmljZU5hbWU+CgkJCTxwYXltZW50VG9rZW4+dDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxNjM8L3BheW1lbnRUb2tlbj4KCQkJPHRyYW5zZmVyTGlzdD4KCQkJCTx0cmFuc2Zlcj4KCQkJCQk8aWRUcmFuc2Zlcj4xPC9pZFRyYW5zZmVyPgoJCQkJCTx0cmFuc2ZlckFtb3VudD4yMDAuMDA8L3RyYW5zZmVyQW1vdW50PgoJCQkJCTxmaXNjYWxDb2RlUEE+Nzc3Nzc3Nzc3Nzc8L2Zpc2NhbENvZGVQQT4KCQkJCQk8Y29tcGFueU5hbWU+eHh4eHh4eDwvY29tcGFueU5hbWU+CgkJCQkJPElCQU4+SVQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxPC9JQkFOPgoJCQkJCTxyZW1pdHRhbmNlSW5mb3JtYXRpb24+eHh4eHh4eDwvcmVtaXR0YW5jZUluZm9ybWF0aW9uPgoJCQkJCTx0cmFuc2ZlckNhdGVnb3J5Pnh4eHh4eDwvdHJhbnNmZXJDYXRlZ29yeT4KCQkJCTwvdHJhbnNmZXI+CgkJCQk8dHJhbnNmZXI+CgkJCQkJPGlkVHJhbnNmZXI+MjwvaWRUcmFuc2Zlcj4KCQkJCQk8dHJhbnNmZXJBbW91bnQ+MTYuMDA8L3RyYW5zZmVyQW1vdW50PgoJCQkJCTxmaXNjYWxDb2RlUEE+Nzc3Nzc3Nzc3Nzg8L2Zpc2NhbENvZGVQQT4KCQkJCQk8Y29tcGFueU5hbWU+eHh4eHh4eDwvY29tcGFueU5hbWU+CgkJCQkJPHJpY2hpZXN0YU1hcmNhRGFCb2xsbz4KCQkJCQkJPGhhc2hEb2N1bWVudG8+eHh4eHg8L2hhc2hEb2N1bWVudG8+CgkJCQkJCTx0aXBvQm9sbG8+eHh4eHg8L3RpcG9Cb2xsbz4KCQkJCQkJPHByb3ZpbmNpYVJlc2lkZW56YT54eHh4eHg8L3Byb3ZpbmNpYVJlc2lkZW56YT4KCQkJCQk8L3JpY2hpZXN0YU1hcmNhRGFCb2xsbz4KCQkJCQk8cmVtaXR0YW5jZUluZm9ybWF0aW9uPnh4eHh4eHg8L3JlbWl0dGFuY2VJbmZvcm1hdGlvbj4KCQkJCQk8dHJhbnNmZXJDYXRlZ29yeT54eHh4eHg8L3RyYW5zZmVyQ2F0ZWdvcnk+CgkJCQk8L3RyYW5zZmVyPgoJCQk8L3RyYW5zZmVyTGlzdD4KCQkJPGNyZWRpdG9yUmVmZXJlbmNlSWQ+MDEwMDAwMDAwMDAwMDAxNjM8L2NyZWRpdG9yUmVmZXJlbmNlSWQ+CgkJPC9uZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlVjJSZXNwb25zZT4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+',
];


Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);























$data_req = [
    ':id' => 172,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 10:55:00.197',
    ':tipoevento' => 'activatePaymentNoticeV2',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000164',
    ':ccp' => 't0000000000000000000000000000164',
    ':noticenumber' => '301000000000000164',
    ':creditorreferenceid' => '01000000000000164',
    ':paymenttoken' => 't0000000000000000000000000000164',
    ':psp' => 'PSP_V2',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100169',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000172',
    ':payload' => 'PHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6bm9kPSJodHRwOi8vcGFnb3BhLWFwaS5wYWdvcGEuZ292Lml0L25vZGUvbm9kZUZvclBzcC54c2QiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIj4KCTxzb2FwZW52OkhlYWRlci8+Cgk8c29hcGVudjpCb2R5PgoJCTxub2Q6YWN0aXZhdGVQYXltZW50Tm90aWNlVjJSZXF1ZXN0PgoJCQk8aWRQU1A+QUdJRF8wMTwvaWRQU1A+CgkJCTxpZEJyb2tlclBTUD44ODg4ODg4ODg4ODwvaWRCcm9rZXJQU1A+CgkJCTxpZENoYW5uZWw+ODg4ODg4ODg4ODhfMDE8L2lkQ2hhbm5lbD4KCQkJPHBhc3N3b3JkPnh4eHh4PC9wYXNzd29yZD4KCQkJPGlkZW1wb3RlbmN5S2V5Pnh4eHh4eHh4eDwvaWRlbXBvdGVuY3lLZXk+CgkJCTxxckNvZGU+CgkJCQk8ZmlzY2FsQ29kZT43Nzc3Nzc3Nzc3NzwvZmlzY2FsQ29kZT4KCQkJCTxub3RpY2VOdW1iZXI+MzAxMDAwMDAwMDAwMDAwMTY0PC9ub3RpY2VOdW1iZXI+CgkJCTwvcXJDb2RlPgoJCQk8ZXhwaXJhdGlvblRpbWU+OTAwMDAwPC9leHBpcmF0aW9uVGltZT4KCQkJPGFtb3VudD4yMTYuMDA8L2Ftb3VudD4KCQk8L25vZDphY3RpdmF0ZVBheW1lbnROb3RpY2VWMlJlcXVlc3Q+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg==',
];

$data_resp = [
    ':id' => 173,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 10:55:01.197',
    ':tipoevento' => 'activatePaymentNoticeV2',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000164',
    ':ccp' => 't0000000000000000000000000000164',
    ':noticenumber' => '301000000000000164',
    ':creditorreferenceid' => '01000000000000164',
    ':paymenttoken' => 't0000000000000000000000000000164',
    ':psp' => 'PSP_V2',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100169',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000173',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlVjJSZXNwb25zZT4KCQkJPG91dGNvbWU+S088L291dGNvbWU+CgkJCTxmYXVsdD4KCQkJCTxmYXVsdENvZGU+UFBUX1NUQVpJT05FX0lOVF9QQV9TRVJWSVpJT19OT05BVFRJVk88L2ZhdWx0Q29kZT4KCQkJCTxmYXVsdFN0cmluZz5JbCBTZXJ2aXppbyBBcHBsaWNhdGl2byBkZWxsYSBTdGF6aW9uZSBub24gZScgYXR0aXZvLjwvZmF1bHRTdHJpbmc+CgkJCQk8aWQ+Tm9kb0RlaVBhZ2FtZW50aVNQQzwvaWQ+CgkJCQk8ZGVzY3JpcHRpb24+RXJyb3JlIG5lbCBwcm9jZXNzYW1lbnRvIGRlbCBtZXNzYWdnaW88L2Rlc2NyaXB0aW9uPgoJCQk8L2ZhdWx0PgoJCTwvbmZwOmFjdGl2YXRlUGF5bWVudE5vdGljZVYyUmVzcG9uc2U+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg==',
];


Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);










$data_req = [
    ':id' => 174,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 10:25:00.197',
    ':tipoevento' => 'activatePaymentNoticeV2',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000175',
    ':ccp' => 't0000000000000000000000000000175',
    ':noticenumber' => '301000000000000175',
    ':creditorreferenceid' => '01000000000000175',
    ':paymenttoken' => 't0000000000000000000000000000175',
    ':psp' => 'PSP_V2',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100174',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000174',
    ':payload' => 'PHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6bm9kPSJodHRwOi8vcGFnb3BhLWFwaS5wYWdvcGEuZ292Lml0L25vZGUvbm9kZUZvclBzcC54c2QiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIj4KCTxzb2FwZW52OkhlYWRlci8+Cgk8c29hcGVudjpCb2R5PgoJCTxub2Q6YWN0aXZhdGVQYXltZW50Tm90aWNlVjJSZXF1ZXN0PgoJCQk8aWRQU1A+QUdJRF8wMTwvaWRQU1A+CgkJCTxpZEJyb2tlclBTUD44ODg4ODg4ODg4ODwvaWRCcm9rZXJQU1A+CgkJCTxpZENoYW5uZWw+ODg4ODg4ODg4ODhfMDE8L2lkQ2hhbm5lbD4KCQkJPHBhc3N3b3JkPnh4eHh4PC9wYXNzd29yZD4KCQkJPGlkZW1wb3RlbmN5S2V5Pnh4eHh4eHh4eDwvaWRlbXBvdGVuY3lLZXk+CgkJCTxxckNvZGU+CgkJCQk8ZmlzY2FsQ29kZT43Nzc3Nzc3Nzc3NzwvZmlzY2FsQ29kZT4KCQkJCTxub3RpY2VOdW1iZXI+MzAxMDAwMDAwMDAwMDAwMTc1PC9ub3RpY2VOdW1iZXI+CgkJCTwvcXJDb2RlPgoJCQk8ZXhwaXJhdGlvblRpbWU+OTAwMDAwPC9leHBpcmF0aW9uVGltZT4KCQkJPGFtb3VudD4yMDAuMDA8L2Ftb3VudD4KCQk8L25vZDphY3RpdmF0ZVBheW1lbnROb3RpY2VWMlJlcXVlc3Q+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg==',
];

$data_resp = [
    ':id' => 175,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 10:25:01.197',
    ':tipoevento' => 'activatePaymentNoticeV2',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000175',
    ':ccp' => 't0000000000000000000000000000175',
    ':noticenumber' => '301000000000000175',
    ':creditorreferenceid' => '01000000000000175',
    ':paymenttoken' => 't0000000000000000000000000000175',
    ':psp' => 'PSP_V2',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100174',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000175',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlVjJSZXNwb25zZT4KCQkJPG91dGNvbWU+T0s8L291dGNvbWU+CgkJCTx0b3RhbEFtb3VudD4yMDAuMDA8L3RvdGFsQW1vdW50PgoJCQk8cGF5bWVudERlc2NyaXB0aW9uPjMwMTAwMDAwMDAwMDAwMDE3NTwvcGF5bWVudERlc2NyaXB0aW9uPgoJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCTxjb21wYW55TmFtZT54eHh4eHg8L2NvbXBhbnlOYW1lPgoJCQk8b2ZmaWNlTmFtZT54eHh4eHg8L29mZmljZU5hbWU+CgkJCTxwYXltZW50VG9rZW4+dDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxNzU8L3BheW1lbnRUb2tlbj4KCQkJPHRyYW5zZmVyTGlzdD4KCQkJCTx0cmFuc2Zlcj4KCQkJCQk8aWRUcmFuc2Zlcj4xPC9pZFRyYW5zZmVyPgoJCQkJCTx0cmFuc2ZlckFtb3VudD4xODAuMDA8L3RyYW5zZmVyQW1vdW50PgoJCQkJCTxmaXNjYWxDb2RlUEE+Nzc3Nzc3Nzc3Nzc8L2Zpc2NhbENvZGVQQT4KCQkJCQk8Y29tcGFueU5hbWU+eHh4eHh4eDwvY29tcGFueU5hbWU+CgkJCQkJPElCQU4+SVQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxPC9JQkFOPgoJCQkJCTxyZW1pdHRhbmNlSW5mb3JtYXRpb24+eHh4eHh4eDwvcmVtaXR0YW5jZUluZm9ybWF0aW9uPgoJCQkJCTx0cmFuc2ZlckNhdGVnb3J5Pnh4eHh4eDwvdHJhbnNmZXJDYXRlZ29yeT4KCQkJCTwvdHJhbnNmZXI+CgkJCQk8dHJhbnNmZXI+CgkJCQkJPGlkVHJhbnNmZXI+MjwvaWRUcmFuc2Zlcj4KCQkJCQk8dHJhbnNmZXJBbW91bnQ+MjAuMDA8L3RyYW5zZmVyQW1vdW50PgoJCQkJCTxmaXNjYWxDb2RlUEE+Nzc3Nzc3Nzc3Nzg8L2Zpc2NhbENvZGVQQT4KCQkJCQk8Y29tcGFueU5hbWU+eHh4eHh4eDwvY29tcGFueU5hbWU+CgkJCQkJPElCQU4+SVQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAyPC9JQkFOPgoJCQkJCTxyZW1pdHRhbmNlSW5mb3JtYXRpb24+eHh4eHh4eDwvcmVtaXR0YW5jZUluZm9ybWF0aW9uPgoJCQkJCTx0cmFuc2ZlckNhdGVnb3J5Pnh4eHh4eDwvdHJhbnNmZXJDYXRlZ29yeT4KCQkJCTwvdHJhbnNmZXI+CgkJCTwvdHJhbnNmZXJMaXN0PgoJCQk8Y3JlZGl0b3JSZWZlcmVuY2VJZD4wMTAwMDAwMDAwMDAwMDE3NTwvY3JlZGl0b3JSZWZlcmVuY2VJZD4KCQk8L25mcDphY3RpdmF0ZVBheW1lbnROb3RpY2VWMlJlc3BvbnNlPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4=',
];


Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);










$data_req = [
    ':id' => 176,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 10:26:00.197',
    ':tipoevento' => 'activatePaymentNoticeV2',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000176',
    ':ccp' => 't0000000000000000000000000000176',
    ':noticenumber' => '301000000000000176',
    ':creditorreferenceid' => '01000000000000176',
    ':paymenttoken' => 't0000000000000000000000000000176',
    ':psp' => 'PSP_V2',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100175',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000176',
    ':payload' => 'PHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6bm9kPSJodHRwOi8vcGFnb3BhLWFwaS5wYWdvcGEuZ292Lml0L25vZGUvbm9kZUZvclBzcC54c2QiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIj4KCTxzb2FwZW52OkhlYWRlci8+Cgk8c29hcGVudjpCb2R5PgoJCTxub2Q6YWN0aXZhdGVQYXltZW50Tm90aWNlVjJSZXF1ZXN0PgoJCQk8aWRQU1A+QUdJRF8wMTwvaWRQU1A+CgkJCTxpZEJyb2tlclBTUD44ODg4ODg4ODg4ODwvaWRCcm9rZXJQU1A+CgkJCTxpZENoYW5uZWw+ODg4ODg4ODg4ODhfMDE8L2lkQ2hhbm5lbD4KCQkJPHBhc3N3b3JkPnh4eHh4PC9wYXNzd29yZD4KCQkJPGlkZW1wb3RlbmN5S2V5Pnh4eHh4eHh4eDwvaWRlbXBvdGVuY3lLZXk+CgkJCTxxckNvZGU+CgkJCQk8ZmlzY2FsQ29kZT43Nzc3Nzc3Nzc3NzwvZmlzY2FsQ29kZT4KCQkJCTxub3RpY2VOdW1iZXI+MzAxMDAwMDAwMDAwMDAwMTc2PC9ub3RpY2VOdW1iZXI+CgkJCTwvcXJDb2RlPgoJCQk8ZXhwaXJhdGlvblRpbWU+OTAwMDAwPC9leHBpcmF0aW9uVGltZT4KCQkJPGFtb3VudD4xODAuMDA8L2Ftb3VudD4KCQk8L25vZDphY3RpdmF0ZVBheW1lbnROb3RpY2VWMlJlcXVlc3Q+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg=='
];

$data_resp = [
    ':id' => 177,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 10:26:01.197',
    ':tipoevento' => 'activatePaymentNoticeV2',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000176',
    ':ccp' => 't0000000000000000000000000000176',
    ':noticenumber' => '301000000000000176',
    ':creditorreferenceid' => '01000000000000176',
    ':paymenttoken' => 't0000000000000000000000000000176',
    ':psp' => 'PSP_V2',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100175',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000177',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlVjJSZXNwb25zZT4KCQkJPG91dGNvbWU+T0s8L291dGNvbWU+CgkJCTx0b3RhbEFtb3VudD4xODAuMDA8L3RvdGFsQW1vdW50PgoJCQk8cGF5bWVudERlc2NyaXB0aW9uPjMwMTAwMDAwMDAwMDAwMDE3NjwvcGF5bWVudERlc2NyaXB0aW9uPgoJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCTxjb21wYW55TmFtZT54eHh4eHg8L2NvbXBhbnlOYW1lPgoJCQk8b2ZmaWNlTmFtZT54eHh4eHg8L29mZmljZU5hbWU+CgkJCTxwYXltZW50VG9rZW4+dDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxNzY8L3BheW1lbnRUb2tlbj4KCQkJPHRyYW5zZmVyTGlzdD4KCQkJCTx0cmFuc2Zlcj4KCQkJCQk8aWRUcmFuc2Zlcj4xPC9pZFRyYW5zZmVyPgoJCQkJCTx0cmFuc2ZlckFtb3VudD4xNjAuMDA8L3RyYW5zZmVyQW1vdW50PgoJCQkJCTxmaXNjYWxDb2RlUEE+Nzc3Nzc3Nzc3Nzc8L2Zpc2NhbENvZGVQQT4KCQkJCQk8Y29tcGFueU5hbWU+eHh4eHh4eDwvY29tcGFueU5hbWU+CgkJCQkJPElCQU4+SVQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxPC9JQkFOPgoJCQkJCTxyZW1pdHRhbmNlSW5mb3JtYXRpb24+eHh4eHh4eDwvcmVtaXR0YW5jZUluZm9ybWF0aW9uPgoJCQkJCTx0cmFuc2ZlckNhdGVnb3J5Pnh4eHh4eDwvdHJhbnNmZXJDYXRlZ29yeT4KCQkJCTwvdHJhbnNmZXI+CgkJCQk8dHJhbnNmZXI+CgkJCQkJPGlkVHJhbnNmZXI+MjwvaWRUcmFuc2Zlcj4KCQkJCQk8dHJhbnNmZXJBbW91bnQ+MjAuMDA8L3RyYW5zZmVyQW1vdW50PgoJCQkJCTxmaXNjYWxDb2RlUEE+Nzc3Nzc3Nzc3Nzg8L2Zpc2NhbENvZGVQQT4KCQkJCQk8Y29tcGFueU5hbWU+eHh4eHh4eDwvY29tcGFueU5hbWU+CgkJCQkJPElCQU4+SVQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAyPC9JQkFOPgoJCQkJCTxyZW1pdHRhbmNlSW5mb3JtYXRpb24+eHh4eHh4eDwvcmVtaXR0YW5jZUluZm9ybWF0aW9uPgoJCQkJCTx0cmFuc2ZlckNhdGVnb3J5Pnh4eHh4eDwvdHJhbnNmZXJDYXRlZ29yeT4KCQkJCTwvdHJhbnNmZXI+CgkJCTwvdHJhbnNmZXJMaXN0PgoJCQk8Y3JlZGl0b3JSZWZlcmVuY2VJZD4wMTAwMDAwMDAwMDAwMDE3NjwvY3JlZGl0b3JSZWZlcmVuY2VJZD4KCQk8L25mcDphY3RpdmF0ZVBheW1lbnROb3RpY2VWMlJlc3BvbnNlPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4=',
];


Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);





$data_req = [
    ':id' => 178,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 10:27:00.197',
    ':tipoevento' => 'closePayment-v2',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000176',
    ':ccp' => 't0000000000000000000000000000176',
    ':noticenumber' => '301000000000000176',
    ':creditorreferenceid' => '01000000000000176',
    ':paymenttoken' => 't0000000000000000000000000000176',
    ':psp' => 'PSP_V2',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100176',
    ':sessionidoriginal' => 'sessidoriginal_closepayment_v2',
    ':uniqueid' => 'T000178',
    ':payload' => 'ewogICAgImFkZGl0aW9uYWxQYXltZW50SW5mb3JtYXRpb25zIjogewogICAgICAgICJhdXRob3JpemF0aW9uQ29kZSI6ICIxMTExMTUiLAogICAgICAgICJmZWUiOiAiMi4wMCIsCiAgICAgICAgIm91dGNvbWVQYXltZW50R2F0ZXdheSI6ICJPSyIsCiAgICAgICAgInJybiI6ICIwMDAwMDAwMDAwMDkiLAogICAgICAgICJ0aW1lc3RhbXBPcGVyYXRpb24iOiAiMjAyNC0wNC0yNFQwOTo0ODo1NyIsCiAgICAgICAgInRvdGFsQW1vdW50IjogIjI0Mi4wMCIKICAgIH0sCiAgICAiZmVlIjogMi4wLAogICAgImlkQnJva2VyUFNQIjogIjg4ODg4ODg4ODg4IiwKICAgICJpZENoYW5uZWwiOiAiODg4ODg4ODg4ODhfMDEiLAogICAgImlkUFNQIjogIlBTUF9DUCIsCiAgICAib3V0Y29tZSI6ICJPSyIsCiAgICAicGF5bWVudE1ldGhvZCI6ICJDUCIsCiAgICAicGF5bWVudFRva2VucyI6IFsKICAgICAgICAidDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxNzUiLAogICAgICAgICJ0MDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDE3NiIKICAgIF0sCiAgICAidGltZXN0YW1wT3BlcmF0aW9uIjogIjIwMjQtMDQtMjRUMDc6NDg6NTcuNDcyWiIsCiAgICAidG90YWxBbW91bnQiOiAyMDIuMCwKICAgICJ0cmFuc2FjdGlvbkRldGFpbHMiOiB7CiAgICAgICAgImluZm8iOiB7CiAgICAgICAgICAgICJicmFuZCI6ICJNQyIsCiAgICAgICAgICAgICJicmFuZExvZ28iOiAiaHR0cHM6Ly9hc3NldHMuY2RuLnBsYXRmb3JtLnBhZ29wYS5pdC9jcmVkaXRjYXJkL21hc3RlcmNhcmQucG5nIiwKICAgICAgICAgICAgImNsaWVudElkIjogIkNIRUNLT1VUIiwKICAgICAgICAgICAgInBheW1lbnRNZXRob2ROYW1lIjogIkNBUkRTIiwKICAgICAgICAgICAgInR5cGUiOiAiQ1AiCiAgICAgICAgfSwKICAgICAgICAidHJhbnNhY3Rpb24iOiB7CiAgICAgICAgICAgICJhbW91bnQiOiAyMDAwMCwKICAgICAgICAgICAgImF1dGhvcml6YXRpb25Db2RlIjogIjExMTExNSIsCiAgICAgICAgICAgICJjcmVhdGlvbkRhdGUiOiAiMjAyNC0wNC0yNFQwNzo0ODoxNC45MjAyMDY1MTVaIiwKICAgICAgICAgICAgImZlZSI6IDIwMCwKICAgICAgICAgICAgImdyYW5kVG90YWwiOiAyMDIwMCwKICAgICAgICAgICAgInBheW1lbnRHYXRld2F5IjogIk5QRyIsCiAgICAgICAgICAgICJwc3AiOiB7CiAgICAgICAgICAgICAgICAiYnJva2VyTmFtZSI6ICI4ODg4ODg4ODg4OCIsCiAgICAgICAgICAgICAgICAiYnVzaW5lc3NOYW1lIjogIlBzcENwIiwKICAgICAgICAgICAgICAgICJpZENoYW5uZWwiOiAiODg4ODg4ODg4ODhfMDEiLAogICAgICAgICAgICAgICAgImlkUHNwIjogIlBTUF9DUCIsCiAgICAgICAgICAgICAgICAicHNwT25VcyI6IGZhbHNlCiAgICAgICAgICAgIH0sCiAgICAgICAgICAgICJycm4iOiAiMDAwMDAwMDAwMDA5IiwKICAgICAgICAgICAgInRpbWVzdGFtcE9wZXJhdGlvbiI6ICIyMDI0LTA0LTI0VDA3OjQ4OjU3LjQ3MloiLAogICAgICAgICAgICAidHJhbnNhY3Rpb25JZCI6ICIwOGY2MTY2ZjNmOTM0ZTZiOGFlNTQ3MjZkNDVlMTJhOCIsCiAgICAgICAgICAgICJ0cmFuc2FjdGlvblN0YXR1cyI6ICJDb25mZXJtYXRvIgogICAgICAgIH0sCiAgICAgICAgInVzZXIiOiB7CiAgICAgICAgICAgICJ0eXBlIjogIkdVRVNUIgogICAgICAgIH0KICAgIH0sCiAgICAidHJhbnNhY3Rpb25JZCI6ICIwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxMCIKfQ==',
];

$data_resp = [
    ':id' => 179,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 10:27:01.197',
    ':tipoevento' => 'closePayment-v2',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000175',
    ':ccp' => 't0000000000000000000000000000175',
    ':noticenumber' => '301000000000000175',
    ':creditorreferenceid' => '01000000000000175',
    ':paymenttoken' => 't0000000000000000000000000000175',
    ':psp' => 'PSP_V2',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100176',
    ':sessionidoriginal' => 'sessidoriginal_closepayment_v2',
    ':uniqueid' => 'T000179',
    ':payload' => 'ewogICAgIm91dGNvbWUiOiAiT0siCn0=',
];


Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);














$data_req = [
    ':id' => 180,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 10:28:00.197',
    ':tipoevento' => 'pspNotifyPaymentV2',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000175',
    ':ccp' => 't0000000000000000000000000000175',
    ':noticenumber' => '301000000000000175',
    ':creditorreferenceid' => '01000000000000175',
    ':paymenttoken' => 't0000000000000000000000000000175',
    ':psp' => 'PSP_V2',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100177',
    ':sessionidoriginal' => 'sessidoriginal_closepayment_v2',
    ':uniqueid' => 'T000180',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpwZm49Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvcHNwL3BzcEZvck5vZGUueHNkIiB4bWxuczpzb2FwZW52PSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyIgeG1sbnM6eHM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hIiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBmbjpwc3BOb3RpZnlQYXltZW50VjI+CgkJCTxpZFBTUD5QU1BfVjI8L2lkUFNQPgoJCQk8aWRCcm9rZXJQU1A+ODg4ODg4ODg4ODg8L2lkQnJva2VyUFNQPgoJCQk8aWRDaGFubmVsPjg4ODg4ODg4ODg4XzAyPC9pZENoYW5uZWw+CgkJCTx0cmFuc2FjdGlvbklkPnQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxMDAxPC90cmFuc2FjdGlvbklkPgoJCQk8dG90YWxBbW91bnQ+MzgxLjUwPC90b3RhbEFtb3VudD4KCQkJPGZlZT4xLjAwPC9mZWU+CgkJCTx0aW1lc3RhbXBPcGVyYXRpb24+MjAyNC0wNC0xOVQyMzowMTo0NDwvdGltZXN0YW1wT3BlcmF0aW9uPgoJCQk8cGF5bWVudExpc3Q+CgkJCQk8cGF5bWVudD4KCQkJCQk8cGF5bWVudFRva2VuPnQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMTc1PC9wYXltZW50VG9rZW4+CgkJCQkJPHBheW1lbnREZXNjcmlwdGlvbj5wYWdhbWVudG8gbXVsdGliZW5lZmljaWFyaW88L3BheW1lbnREZXNjcmlwdGlvbj4KCQkJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCQkJPGNvbXBhbnlOYW1lPnh4eHh4eHh4PC9jb21wYW55TmFtZT4KCQkJCQk8Y3JlZGl0b3JSZWZlcmVuY2VJZD4wMTAwMDAwMDAwMDAwMDE3NTwvY3JlZGl0b3JSZWZlcmVuY2VJZD4KCQkJCQk8ZGVidEFtb3VudD4yMDAuMDA8L2RlYnRBbW91bnQ+CgkJCQkJPHRyYW5zZmVyTGlzdD4KCQkJCQkJPHRyYW5zZmVyPgoJCQkJCQkJPGlkVHJhbnNmZXI+MTwvaWRUcmFuc2Zlcj4KCQkJCQkJCTx0cmFuc2ZlckFtb3VudD4xODAuMDA8L3RyYW5zZmVyQW1vdW50PgoJCQkJCQkJPGZpc2NhbENvZGVQQT43Nzc3Nzc3Nzc3NzwvZmlzY2FsQ29kZVBBPgoJCQkJCQkJPElCQU4+SVQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxPC9JQkFOPgoJCQkJCQkJPHJlbWl0dGFuY2VJbmZvcm1hdGlvbj54eHh4eHh4eHh4eHg8L3JlbWl0dGFuY2VJbmZvcm1hdGlvbj4KCQkJCQkJCTxtZXRhZGF0YT4KCQkJCQkJCQk8bWFwRW50cnk+CgkJCQkJCQkJCTxrZXk+Y2hpYXZlXzFfMV8xPC9rZXk+CgkJCQkJCQkJCTx2YWx1ZT52YWx1ZV8xXzFfMTwvdmFsdWU+CgkJCQkJCQkJPC9tYXBFbnRyeT4KCQkJCQkJCQk8bWFwRW50cnk+CgkJCQkJCQkJCTxrZXk+Y2hpYXZlXzFfMV8yPC9rZXk+CgkJCQkJCQkJCTx2YWx1ZT52YWx1ZV8xXzFfMjwvdmFsdWU+CgkJCQkJCQkJPC9tYXBFbnRyeT4KCQkJCQkJCTwvbWV0YWRhdGE+CgkJCQkJCTwvdHJhbnNmZXI+CgkJCQkJCTx0cmFuc2Zlcj4KCQkJCQkJCTxpZFRyYW5zZmVyPjI8L2lkVHJhbnNmZXI+CgkJCQkJCQk8dHJhbnNmZXJBbW91bnQ+MjAuMDA8L3RyYW5zZmVyQW1vdW50PgoJCQkJCQkJPGZpc2NhbENvZGVQQT43Nzc3Nzc3Nzc3ODwvZmlzY2FsQ29kZVBBPgoJCQkJCQkJPElCQU4+SVQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAyPC9JQkFOPgoJCQkJCQkJPHJlbWl0dGFuY2VJbmZvcm1hdGlvbj54eHh4eHh4eHh4eDwvcmVtaXR0YW5jZUluZm9ybWF0aW9uPgoJCQkJCQkJPG1ldGFkYXRhPgoJCQkJCQkJCTxtYXBFbnRyeT4KCQkJCQkJCQkJPGtleT5jaGlhdmVfMV8yXzE8L2tleT4KCQkJCQkJCQkJPHZhbHVlPnZhbHVlXzFfMl8xPC92YWx1ZT4KCQkJCQkJCQk8L21hcEVudHJ5PgoJCQkJCQkJCTxtYXBFbnRyeT4KCQkJCQkJCQkJPGtleT5jaGlhdmVfMV8yXzI8L2tleT4KCQkJCQkJCQkJPHZhbHVlPnZhbHVlXzFfMl8yPC92YWx1ZT4KCQkJCQkJCQk8L21hcEVudHJ5PgoJCQkJCQkJPC9tZXRhZGF0YT4KCQkJCQkJPC90cmFuc2Zlcj4KCQkJCQk8L3RyYW5zZmVyTGlzdD4KCQkJCQk8bWV0YWRhdGE+CgkJCQkJCTxtYXBFbnRyeT4KCQkJCQkJCTxrZXk+Y2hpYXZlXzFfMTwva2V5PgoJCQkJCQkJPHZhbHVlPnZhbHVlXzFfMTwvdmFsdWU+CgkJCQkJCTwvbWFwRW50cnk+CgkJCQkJCTxtYXBFbnRyeT4KCQkJCQkJCTxrZXk+Y2hpYXZlXzFfMjwva2V5PgoJCQkJCQkJPHZhbHVlPnZhbHVlXzFfMjwvdmFsdWU+CgkJCQkJCTwvbWFwRW50cnk+CgkJCQkJPC9tZXRhZGF0YT4KCQkJCTwvcGF5bWVudD4KCQkJCTxwYXltZW50PgoJCQkJCTxwYXltZW50VG9rZW4+dDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxNzY8L3BheW1lbnRUb2tlbj4KCQkJCQk8cGF5bWVudERlc2NyaXB0aW9uPnBhZ2FtZW50byBtdWx0aWJlbmVmaWNpYXJpbzwvcGF5bWVudERlc2NyaXB0aW9uPgoJCQkJCTxmaXNjYWxDb2RlUEE+Nzc3Nzc3Nzc3ODc8L2Zpc2NhbENvZGVQQT4KCQkJCQk8Y29tcGFueU5hbWU+eHh4eHh4eHg8L2NvbXBhbnlOYW1lPgoJCQkJCTxjcmVkaXRvclJlZmVyZW5jZUlkPjAxMDAwMDAwMDAwMDAwMTc2PC9jcmVkaXRvclJlZmVyZW5jZUlkPgoJCQkJCTxkZWJ0QW1vdW50PjE4MC4wMDwvZGVidEFtb3VudD4KCQkJCQk8dHJhbnNmZXJMaXN0PgoJCQkJCQk8dHJhbnNmZXI+CgkJCQkJCQk8aWRUcmFuc2Zlcj4xPC9pZFRyYW5zZmVyPgoJCQkJCQkJPHRyYW5zZmVyQW1vdW50PjE2MC4wMDwvdHJhbnNmZXJBbW91bnQ+CgkJCQkJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzg3PC9maXNjYWxDb2RlUEE+CgkJCQkJCQk8SUJBTj5JVDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMTE8L0lCQU4+CgkJCQkJCQk8cmVtaXR0YW5jZUluZm9ybWF0aW9uPnh4eHh4eHh4eHh4eDwvcmVtaXR0YW5jZUluZm9ybWF0aW9uPgoJCQkJCQkJPG1ldGFkYXRhPgoJCQkJCQkJCTxtYXBFbnRyeT4KCQkJCQkJCQkJPGtleT5jaGlhdmVfMl8xXzE8L2tleT4KCQkJCQkJCQkJPHZhbHVlPnZhbHVlXzJfMV8xPC92YWx1ZT4KCQkJCQkJCQk8L21hcEVudHJ5PgoJCQkJCQkJCTxtYXBFbnRyeT4KCQkJCQkJCQkJPGtleT5jaGlhdmVfMl8xXzI8L2tleT4KCQkJCQkJCQkJPHZhbHVlPnZhbHVlXzJfMV8yPC92YWx1ZT4KCQkJCQkJCQk8L21hcEVudHJ5PgoJCQkJCQkJPC9tZXRhZGF0YT4KCQkJCQkJPC90cmFuc2Zlcj4KCQkJCQkJPHRyYW5zZmVyPgoJCQkJCQkJPGlkVHJhbnNmZXI+MjwvaWRUcmFuc2Zlcj4KCQkJCQkJCTx0cmFuc2ZlckFtb3VudD4yMC4wMDwvdHJhbnNmZXJBbW91bnQ+CgkJCQkJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzg4PC9maXNjYWxDb2RlUEE+CgkJCQkJCQk8SUJBTj5JVDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMTI8L0lCQU4+CgkJCQkJCQk8cmVtaXR0YW5jZUluZm9ybWF0aW9uPnh4eHh4eHh4eHh4PC9yZW1pdHRhbmNlSW5mb3JtYXRpb24+CgkJCQkJCQk8bWV0YWRhdGE+CgkJCQkJCQkJPG1hcEVudHJ5PgoJCQkJCQkJCQk8a2V5PmNoaWF2ZV8yXzJfMTwva2V5PgoJCQkJCQkJCQk8dmFsdWU+dmFsdWVfMl8yXzE8L3ZhbHVlPgoJCQkJCQkJCTwvbWFwRW50cnk+CgkJCQkJCQkJPG1hcEVudHJ5PgoJCQkJCQkJCQk8a2V5PmNoaWF2ZV8yXzJfMjwva2V5PgoJCQkJCQkJCQk8dmFsdWU+dmFsdWVfMl8yXzI8L3ZhbHVlPgoJCQkJCQkJCTwvbWFwRW50cnk+CgkJCQkJCQk8L21ldGFkYXRhPgoJCQkJCQk8L3RyYW5zZmVyPgoJCQkJCTwvdHJhbnNmZXJMaXN0PgoJCQkJCTxtZXRhZGF0YT4KCQkJCQkJPG1hcEVudHJ5PgoJCQkJCQkJPGtleT5jaGlhdmVfMl8xPC9rZXk+CgkJCQkJCQk8dmFsdWU+dmFsdWVfMl8xPC92YWx1ZT4KCQkJCQkJPC9tYXBFbnRyeT4KCQkJCQkJPG1hcEVudHJ5PgoJCQkJCQkJPGtleT5jaGlhdmVfMl8yPC9rZXk+CgkJCQkJCQk8dmFsdWU+dmFsdWVfMl8yPC92YWx1ZT4KCQkJCQkJPC9tYXBFbnRyeT4KCQkJCQk8L21ldGFkYXRhPgoJCQkJPC9wYXltZW50PgoJCQk8L3BheW1lbnRMaXN0PgoJCQk8YWRkaXRpb25hbFBheW1lbnRJbmZvcm1hdGlvbnM+CgkJCQk8bWV0YWRhdGE+CgkJCQkJPG1hcEVudHJ5PgoJCQkJCQk8a2V5PnRpcG9WZXJzYW1lbnRvPC9rZXk+CgkJCQkJCTx2YWx1ZT5DUDwvdmFsdWU+CgkJCQkJPC9tYXBFbnRyeT4KCQkJCQk8bWFwRW50cnk+CgkJCQkJCTxrZXk+b3V0Y29tZVBheW1lbnRHYXRld2F5PC9rZXk+CgkJCQkJCTx2YWx1ZT5PSzwvdmFsdWU+CgkJCQkJPC9tYXBFbnRyeT4KCQkJCQk8bWFwRW50cnk+CgkJCQkJCTxrZXk+dGltZXN0YW1wT3BlcmF0aW9uPC9rZXk+CgkJCQkJCTx2YWx1ZT4yMDI0LTA0LTE5VDIzOjAxOjQ0PC92YWx1ZT4KCQkJCQk8L21hcEVudHJ5PgoJCQkJCTxtYXBFbnRyeT4KCQkJCQkJPGtleT50b3RhbEFtb3VudDwva2V5PgoJCQkJCQk8dmFsdWU+NzAxLjAwPC92YWx1ZT4KCQkJCQk8L21hcEVudHJ5PgoJCQkJCTxtYXBFbnRyeT4KCQkJCQkJPGtleT5mZWU8L2tleT4KCQkJCQkJPHZhbHVlPjEuMDA8L3ZhbHVlPgoJCQkJCTwvbWFwRW50cnk+CgkJCQkJPG1hcEVudHJ5PgoJCQkJCQk8a2V5PmF1dGhvcml6YXRpb25Db2RlPC9rZXk+CgkJCQkJCTx2YWx1ZT4xMDAwMDE8L3ZhbHVlPgoJCQkJCTwvbWFwRW50cnk+CgkJCQkJPG1hcEVudHJ5PgoJCQkJCQk8a2V5PnJybjwva2V5PgoJCQkJCQk8dmFsdWU+enp6enp6enp6enp6enp6enp6enp6MTwvdmFsdWU+CgkJCQkJPC9tYXBFbnRyeT4KCQkJCTwvbWV0YWRhdGE+CgkJCTwvYWRkaXRpb25hbFBheW1lbnRJbmZvcm1hdGlvbnM+CgkJPC9wZm46cHNwTm90aWZ5UGF5bWVudFYyPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4=',
];

$data_resp = [
    ':id' => 181,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 10:28:01.197',
    ':tipoevento' => 'pspNotifyPaymentV2',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000175',
    ':ccp' => 't0000000000000000000000000000175',
    ':noticenumber' => '301000000000000175',
    ':creditorreferenceid' => '01000000000000175',
    ':paymenttoken' => 't0000000000000000000000000000175',
    ':psp' => 'PSP_V2',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100177',
    ':sessionidoriginal' => 'sessidoriginal_closepayment_v2',
    ':uniqueid' => 'T000181',
    ':payload' => 'PFNPQVAtRU5WOkVudmVsb3BlIHhtbG5zOlNPQVAtRU5WPSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyI+Cgk8U09BUC1FTlY6SGVhZGVyLz4KCTxTT0FQLUVOVjpCb2R5PgoJCTxuczM6cHNwTm90aWZ5UGF5bWVudFYyUmVzIHhtbG5zOm5zMz0iaHR0cDovL3BhZ29wYS1hcGkucGFnb3BhLmdvdi5pdC9wc3AvcHNwRm9yTm9kZS54c2QiPgoJCQk8b3V0Y29tZT5PSzwvb3V0Y29tZT4KCQk8L25zMzpwc3BOb3RpZnlQYXltZW50VjJSZXM+Cgk8L1NPQVAtRU5WOkJvZHk+CjwvU09BUC1FTlY6RW52ZWxvcGU+',
];


Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);


$data_req = [
    ':id' => 182,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 11:28:00.197',
    ':tipoevento' => 'activatePaymentNotice',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000180',
    ':ccp' => 't0000000000000000000000000000180',
    ':noticenumber' => '301000000000000180',
    ':creditorreferenceid' => '01000000000000180',
    ':paymenttoken' => 't0000000000000000000000000000180',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100180',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000182',
    ':payload' => 'PHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6bm9kPSJodHRwOi8vcGFnb3BhLWFwaS5wYWdvcGEuZ292Lml0L25vZGUvbm9kZUZvclBzcC54c2QiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIj4KICA8c29hcGVudjpIZWFkZXIvPgogIDxzb2FwZW52OkJvZHk+CiAgICA8bm9kOmFjdGl2YXRlUGF5bWVudE5vdGljZVJlcT4KICAgICAgPGlkUFNQPkFHSURfMDE8L2lkUFNQPgogICAgICA8aWRCcm9rZXJQU1A+ODg4ODg4ODg4ODg8L2lkQnJva2VyUFNQPgogICAgICA8aWRDaGFubmVsPjg4ODg4ODg4ODg4XzAxPC9pZENoYW5uZWw+CiAgICAgIDxwYXNzd29yZD4qKioqKjwvcGFzc3dvcmQ+CiAgICAgIDxxckNvZGU+CiAgICAgICAgPGZpc2NhbENvZGU+Nzc3Nzc3Nzc3Nzc8L2Zpc2NhbENvZGU+CiAgICAgICAgPG5vdGljZU51bWJlcj4zMDEwMDAwMDAwMDAwMDAxODA8L25vdGljZU51bWJlcj4KICAgICAgPC9xckNvZGU+CiAgICAgIDxhbW91bnQ+MC4wMDwvYW1vdW50PgogICAgPC9ub2Q6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVxPgogIDwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+',
];

$data_resp = [
    ':id' => 183,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 11:28:01.197',
    ':tipoevento' => 'activatePaymentNotice',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000180',
    ':ccp' => 't0000000000000000000000000000180',
    ':noticenumber' => '301000000000000180',
    ':creditorreferenceid' => '01000000000000180',
    ':paymenttoken' => 't0000000000000000000000000000180',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100180',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000183',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVzPgoJCQk8b3V0Y29tZT5PSzwvb3V0Y29tZT4KCQkJPHRvdGFsQW1vdW50PjgwLjAwPC90b3RhbEFtb3VudD4KCQkJPHBheW1lbnREZXNjcmlwdGlvbj54eHh4eHh4PC9wYXltZW50RGVzY3JpcHRpb24+CgkJCTxmaXNjYWxDb2RlUEE+Nzc3Nzc3Nzc3Nzc8L2Zpc2NhbENvZGVQQT4KCQkJPGNvbXBhbnlOYW1lPnh4eHh4eHg8L2NvbXBhbnlOYW1lPgoJCQk8cGF5bWVudFRva2VuPnQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMTgwPC9wYXltZW50VG9rZW4+CgkJCTx0cmFuc2Zlckxpc3Q+CgkJCQk8dHJhbnNmZXI+CgkJCQkJPGlkVHJhbnNmZXI+MTwvaWRUcmFuc2Zlcj4KCQkJCQk8dHJhbnNmZXJBbW91bnQ+ODAuMDA8L3RyYW5zZmVyQW1vdW50PgoJCQkJCTxmaXNjYWxDb2RlUEE+Nzc3Nzc3Nzc3Nzc8L2Zpc2NhbENvZGVQQT4KCQkJCQk8SUJBTj5JVDE4VTAwMDAwMDAwMDAwMDAwMDAwMDAwMDE8L0lCQU4+CgkJCQkJPHJlbWl0dGFuY2VJbmZvcm1hdGlvbj54eHh4PC9yZW1pdHRhbmNlSW5mb3JtYXRpb24+CgkJCQk8L3RyYW5zZmVyPgoJCQk8L3RyYW5zZmVyTGlzdD4KCQkJPGNyZWRpdG9yUmVmZXJlbmNlSWQ+MDEwMDAwMDAwMDAwMDAxODA8L2NyZWRpdG9yUmVmZXJlbmNlSWQ+CgkJPC9uZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVzPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4=',
];


Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);









$data_req = [
    ':id' => 184,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 11:29:00.197',
    ':tipoevento' => 'nodoChiediInformazioniPagamento',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000180',
    ':ccp' => 't0000000000000000000000000000180',
    ':noticenumber' => '301000000000000180',
    ':creditorreferenceid' => '01000000000000180',
    ':paymenttoken' => 't0000000000000000000000000000180',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100181',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000184',
    ':payload' => '',
];

$data_resp = [
    ':id' => 185,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 11:29:01.197',
    ':tipoevento' => 'nodoChiediInformazioniPagamento',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000180',
    ':ccp' => 't0000000000000000000000000000180',
    ':noticenumber' => '301000000000000180',
    ':creditorreferenceid' => '01000000000000180',
    ':paymenttoken' => 't0000000000000000000000000000180',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100181',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000185',
    ':payload' => 'ewogICAgIklCQU4iOiAiSVQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDEwIiwKICAgICJib2xsb0RpZ2l0YWxlIjogZmFsc2UsCiAgICAiY29kaWNlRmlzY2FsZSI6ICJYWFhYWFhYWFhYWFhYWFhYIiwKICAgICJkZXR0YWdsaSI6IFsKICAgICAgICB7CiAgICAgICAgICAgICJDQ1AiOiAidDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxODAiLAogICAgICAgICAgICAiSVVWIjogIjAxMDAwMDAwMDAwMDAwMTgwIiwKICAgICAgICAgICAgImNvZGljZVBhZ2F0b3JlIjogIlhYWFhYWFhYWFhYWFhYWFgiLAogICAgICAgICAgICAiZW50ZUJlbmVmaWNpYXJpbyI6ICJ4eHh4eHgiLAogICAgICAgICAgICAiaWREb21pbmlvIjogIjc3Nzc3Nzc3Nzc3IiwKICAgICAgICAgICAgImltcG9ydG8iOiA4MC4wLAogICAgICAgICAgICAibm9tZVBhZ2F0b3JlIjogInh4eHgiLAogICAgICAgICAgICAidGlwb1BhZ2F0b3JlIjogIkYiCiAgICAgICAgfQogICAgXSwKICAgICJpbXBvcnRvVG90YWxlIjogODAuMCwKICAgICJvZ2dldHRvUGFnYW1lbnRvIjogInh4eCIsCiAgICAicmFnaW9uZVNvY2lhbGUiOiAieHh4IiwKICAgICJ1cmxSZWRpcmVjdEVDIjogImh0dHBzOi8vZXhhbXBsZS5jb20iCn0=',
];


Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);








$data_req = [
    ':id' => 186,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 11:30:00.197',
    ':tipoevento' => 'pspNotifyPayment',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000180',
    ':ccp' => 't0000000000000000000000000000180',
    ':noticenumber' => '301000000000000180',
    ':creditorreferenceid' => '01000000000000180',
    ':paymenttoken' => 't0000000000000000000000000000180',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100182',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000186',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpwZm49Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvcHNwL3BzcEZvck5vZGUueHNkIiB4bWxuczpzb2FwZW52PSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyIgeG1sbnM6eHM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hIiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBmbjpwc3BOb3RpZnlQYXltZW50UmVxPgoJCQk8aWRQU1A+QUdJRF8wMTwvaWRQU1A+CgkJCTxpZEJyb2tlclBTUD44ODg4ODg4ODg4ODwvaWRCcm9rZXJQU1A+CgkJCTxpZENoYW5uZWw+ODg4ODg4ODg4ODhfMDE8L2lkQ2hhbm5lbD4KCQkJPHBheW1lbnRUb2tlbj50MDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDE4MDwvcGF5bWVudFRva2VuPgoJCQk8cGF5bWVudERlc2NyaXB0aW9uPnBhZ2FtZW50byBtdWx0aWJlbmVmaWNpYXJpbzwvcGF5bWVudERlc2NyaXB0aW9uPgoJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCTxjb21wYW55TmFtZT54eHh4eHh4PC9jb21wYW55TmFtZT4KCQkJPGNyZWRpdG9yUmVmZXJlbmNlSWQ+MDEwMDAwMDAwMDAwMDAxODA8L2NyZWRpdG9yUmVmZXJlbmNlSWQ+CgkJCTxkZWJ0QW1vdW50PjE1MC4wMDwvZGVidEFtb3VudD4KCQkJPHRyYW5zZmVyTGlzdD4KCQkJCTx0cmFuc2Zlcj4KCQkJCQk8aWRUcmFuc2Zlcj4xPC9pZFRyYW5zZmVyPgoJCQkJCTx0cmFuc2ZlckFtb3VudD44MC4wMDwvdHJhbnNmZXJBbW91bnQ+CgkJCQkJPGZpc2NhbENvZGVQQT43Nzc3Nzc3Nzc3NzwvZmlzY2FsQ29kZVBBPgoJCQkJCTxJQkFOPklUMThVMDAwMDAwMDAwMDAwMDAwMDAwMDAwMTwvSUJBTj4KCQkJCQk8cmVtaXR0YW5jZUluZm9ybWF0aW9uPnh4eHg8L3JlbWl0dGFuY2VJbmZvcm1hdGlvbj4KCQkJCTwvdHJhbnNmZXI+CgkJCTwvdHJhbnNmZXJMaXN0PgoJCQk8Y3JlZGl0Q2FyZFBheW1lbnQ+CgkJCQk8cnJuPjExMTExMTExMTExMTwvcnJuPgoJCQkJPG91dGNvbWVQYXltZW50R2F0ZXdheT5PSzwvb3V0Y29tZVBheW1lbnRHYXRld2F5PgoJCQkJPHRvdGFsQW1vdW50PjgxLjMwPC90b3RhbEFtb3VudD4KCQkJCTxmZWU+MS4zMDwvZmVlPgoJCQkJPHRpbWVzdGFtcE9wZXJhdGlvbj4yMDI0LTA0LTEwVDIxOjE0OjQ3PC90aW1lc3RhbXBPcGVyYXRpb24+CgkJCQk8YXV0aG9yaXphdGlvbkNvZGU+MTExMTE1PC9hdXRob3JpemF0aW9uQ29kZT4KCQkJPC9jcmVkaXRDYXJkUGF5bWVudD4KCQk8L3Bmbjpwc3BOb3RpZnlQYXltZW50UmVxPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4=',
];

$data_resp = [
    ':id' => 187,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 11:30:01.197',
    ':tipoevento' => 'pspNotifyPayment',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000180',
    ':ccp' => 't0000000000000000000000000000180',
    ':noticenumber' => '301000000000000180',
    ':creditorreferenceid' => '01000000000000180',
    ':paymenttoken' => 't0000000000000000000000000000180',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100182',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000187',
    ':payload' => 'PFNPQVAtRU5WOkVudmVsb3BlIHhtbG5zOlNPQVAtRU5WPSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyI+PFNPQVAtRU5WOkhlYWRlci8+PFNPQVAtRU5WOkJvZHk+PG5zMzpwc3BOb3RpZnlQYXltZW50UmVzIHhtbG5zOm5zMz0iaHR0cDovL3BhZ29wYS1hcGkucGFnb3BhLmdvdi5pdC9wc3AvcHNwRm9yTm9kZS54c2QiPjxvdXRjb21lPk9LPC9vdXRjb21lPjwvbnMzOnBzcE5vdGlmeVBheW1lbnRSZXM+PC9TT0FQLUVOVjpCb2R5PjwvU09BUC1FTlY6RW52ZWxvcGU+',
];


Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);






$data_req = [
    ':id' => 188,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 11:31:00.197',
    ':tipoevento' => 'sendPaymentOutcome',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000180',
    ':ccp' => 't0000000000000000000000000000180',
    ':noticenumber' => '301000000000000180',
    ':creditorreferenceid' => '01000000000000180',
    ':paymenttoken' => 't0000000000000000000000000000180',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100183',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000188',
    ':payload' => 'PHNvYXA6RW52ZWxvcGUgeG1sbnM6c29hcD0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPgoJPHNvYXA6Qm9keT4KCQk8bnMyOnNlbmRQYXltZW50T3V0Y29tZVJlcSB4bWxuczpuczI9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6bnMzPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyI+CgkJCTxpZFBTUD5BR0lEXzAxPC9pZFBTUD4KCQkJPGlkQnJva2VyUFNQPjg4ODg4ODg4ODg4PC9pZEJyb2tlclBTUD4KCQkJPGlkQ2hhbm5lbD44ODg4ODg4ODg4OF8wMTwvaWRDaGFubmVsPgoJCQk8cGFzc3dvcmQ+eHh4eHh4eHg8L3Bhc3N3b3JkPgoJCQk8cGF5bWVudFRva2VuPnQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMTgwPC9wYXltZW50VG9rZW4+CgkJCTxvdXRjb21lPk9LPC9vdXRjb21lPgoJCQk8ZGV0YWlscz4KCQkJCTxwYXltZW50TWV0aG9kPm90aGVyPC9wYXltZW50TWV0aG9kPgoJCQkJPGZlZT4xLjAwPC9mZWU+CgkJCQk8YXBwbGljYXRpb25EYXRlPjIwMjQtMDQtMDI8L2FwcGxpY2F0aW9uRGF0ZT4KCQkJCTx0cmFuc2ZlckRhdGU+MjAyNC0wNC0wMzwvdHJhbnNmZXJEYXRlPgoJCQk8L2RldGFpbHM+CgkJPC9uczI6c2VuZFBheW1lbnRPdXRjb21lUmVxPgoJPC9zb2FwOkJvZHk+Cjwvc29hcDpFbnZlbG9wZT4=',
];

$data_resp = [
    ':id' => 189,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 11:31:01.197',
    ':tipoevento' => 'sendPaymentOutcome',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000180',
    ':ccp' => 't0000000000000000000000000000180',
    ':noticenumber' => '301000000000000180',
    ':creditorreferenceid' => '01000000000000180',
    ':paymenttoken' => 't0000000000000000000000000000180',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100183',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000189',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6c2VuZFBheW1lbnRPdXRjb21lUmVzPgoJCQk8b3V0Y29tZT5PSzwvb3V0Y29tZT4KCQk8L25mcDpzZW5kUGF5bWVudE91dGNvbWVSZXM+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg==',
];


Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);




















$data_req = [
    ':id' => 190,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 11:38:00.197',
    ':tipoevento' => 'activatePaymentNotice',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000181',
    ':ccp' => 't0000000000000000000000000000181',
    ':noticenumber' => '301000000000000181',
    ':creditorreferenceid' => '01000000000000181',
    ':paymenttoken' => 't0000000000000000000000000000181',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100184',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000190',
    ':payload' => 'PHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6bm9kPSJodHRwOi8vcGFnb3BhLWFwaS5wYWdvcGEuZ292Lml0L25vZGUvbm9kZUZvclBzcC54c2QiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIj4KICA8c29hcGVudjpIZWFkZXIvPgogIDxzb2FwZW52OkJvZHk+CiAgICA8bm9kOmFjdGl2YXRlUGF5bWVudE5vdGljZVJlcT4KICAgICAgPGlkUFNQPkFHSURfMDE8L2lkUFNQPgogICAgICA8aWRCcm9rZXJQU1A+ODg4ODg4ODg4ODg8L2lkQnJva2VyUFNQPgogICAgICA8aWRDaGFubmVsPjg4ODg4ODg4ODg4XzAxPC9pZENoYW5uZWw+CiAgICAgIDxwYXNzd29yZD4qKioqKjwvcGFzc3dvcmQ+CiAgICAgIDxxckNvZGU+CiAgICAgICAgPGZpc2NhbENvZGU+Nzc3Nzc3Nzc3Nzc8L2Zpc2NhbENvZGU+CiAgICAgICAgPG5vdGljZU51bWJlcj4zMDEwMDAwMDAwMDAwMDAxODE8L25vdGljZU51bWJlcj4KICAgICAgPC9xckNvZGU+CiAgICAgIDxhbW91bnQ+MC4wMDwvYW1vdW50PgogICAgPC9ub2Q6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVxPgogIDwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+',
];

$data_resp = [
    ':id' => 191,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 11:38:01.197',
    ':tipoevento' => 'activatePaymentNotice',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000181',
    ':ccp' => 't0000000000000000000000000000181',
    ':noticenumber' => '301000000000000181',
    ':creditorreferenceid' => '01000000000000181',
    ':paymenttoken' => 't0000000000000000000000000000181',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100184',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000191',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVzPgoJCQk8b3V0Y29tZT5PSzwvb3V0Y29tZT4KCQkJPHRvdGFsQW1vdW50PjgwLjAwPC90b3RhbEFtb3VudD4KCQkJPHBheW1lbnREZXNjcmlwdGlvbj54eHh4eHh4PC9wYXltZW50RGVzY3JpcHRpb24+CgkJCTxmaXNjYWxDb2RlUEE+Nzc3Nzc3Nzc3Nzc8L2Zpc2NhbENvZGVQQT4KCQkJPGNvbXBhbnlOYW1lPnh4eHh4eHg8L2NvbXBhbnlOYW1lPgoJCQk8cGF5bWVudFRva2VuPnQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMTgxPC9wYXltZW50VG9rZW4+CgkJCTx0cmFuc2Zlckxpc3Q+CgkJCQk8dHJhbnNmZXI+CgkJCQkJPGlkVHJhbnNmZXI+MTwvaWRUcmFuc2Zlcj4KCQkJCQk8dHJhbnNmZXJBbW91bnQ+ODAuMDA8L3RyYW5zZmVyQW1vdW50PgoJCQkJCTxmaXNjYWxDb2RlUEE+Nzc3Nzc3Nzc3Nzc8L2Zpc2NhbENvZGVQQT4KCQkJCQk8SUJBTj5JVDE4VTAwMDAwMDAwMDAwMDAwMDAwMDAwMDE8L0lCQU4+CgkJCQkJPHJlbWl0dGFuY2VJbmZvcm1hdGlvbj54eHh4PC9yZW1pdHRhbmNlSW5mb3JtYXRpb24+CgkJCQk8L3RyYW5zZmVyPgoJCQk8L3RyYW5zZmVyTGlzdD4KCQkJPGNyZWRpdG9yUmVmZXJlbmNlSWQ+MDEwMDAwMDAwMDAwMDAxODE8L2NyZWRpdG9yUmVmZXJlbmNlSWQ+CgkJPC9uZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVzPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4=',
];


Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);






$data_req = [
    ':id' => 192,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 11:39:00.197',
    ':tipoevento' => 'nodoInoltraEsitoPagamentoCarta',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000181',
    ':ccp' => 't0000000000000000000000000000181',
    ':noticenumber' => '301000000000000181',
    ':creditorreferenceid' => '01000000000000181',
    ':paymenttoken' => 't0000000000000000000000000000181',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100185',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000192',
    ':payload' => 'ewogICAgIlJSTiI6IDExMTExMTExMTExMiwKICAgICJjb2RpY2VBdXRvcml6emF0aXZvIjogIjU1NTU1NSIsCiAgICAiZXNpdG9UcmFuc2F6aW9uZUNhcnRhIjogIjAwIiwKICAgICJpZFBhZ2FtZW50byI6ICJ0MDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDE4MSIsCiAgICAiaWRlbnRpZmljYXRpdm9DYW5hbGUiOiAiODg4ODg4ODg4ODhfMDEiLAogICAgImlkZW50aWZpY2F0aXZvSW50ZXJtZWRpYXJpbyI6ICI4ODg4ODg4ODg4OCIsCiAgICAiaWRlbnRpZmljYXRpdm9Qc3AiOiAiQUdJRF8wMSIsCiAgICAiaW1wb3J0b1RvdGFsZVBhZ2F0byI6IDI0Mi45LAogICAgInRpbWVzdGFtcE9wZXJhemlvbmUiOiAiMjAyNC0wNC0zMFQyMzo1MTo1OC4xODMrMDI6MDAiLAogICAgInRpcG9WZXJzYW1lbnRvIjogIkNQIgp9',
];

$data_resp = [
    ':id' => 193,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 11:39:01.197',
    ':tipoevento' => 'nodoInoltraEsitoPagamentoCarta',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000181',
    ':ccp' => 't0000000000000000000000000000181',
    ':noticenumber' => '301000000000000181',
    ':creditorreferenceid' => '01000000000000181',
    ':paymenttoken' => 't0000000000000000000000000000181',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100185',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000193',
    ':payload' => 'eyJlc2l0byI6Ik9LIn0=',
];


Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);





$data_req = [
    ':id' => 194,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 11:40:00.197',
    ':tipoevento' => 'pspNotifyPayment',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000181',
    ':ccp' => 't0000000000000000000000000000181',
    ':noticenumber' => '301000000000000181',
    ':creditorreferenceid' => '01000000000000181',
    ':paymenttoken' => 't0000000000000000000000000000181',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100186',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000194',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpwZm49Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvcHNwL3BzcEZvck5vZGUueHNkIiB4bWxuczpzb2FwZW52PSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyIgeG1sbnM6eHM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hIiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBmbjpwc3BOb3RpZnlQYXltZW50UmVxPgoJCQk8aWRQU1A+QUdJRF8wMTwvaWRQU1A+CgkJCTxpZEJyb2tlclBTUD44ODg4ODg4ODg4ODwvaWRCcm9rZXJQU1A+CgkJCTxpZENoYW5uZWw+ODg4ODg4ODg4ODhfMDE8L2lkQ2hhbm5lbD4KCQkJPHBheW1lbnRUb2tlbj50MDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDE4MTwvcGF5bWVudFRva2VuPgoJCQk8cGF5bWVudERlc2NyaXB0aW9uPnBhZ2FtZW50byBtdWx0aWJlbmVmaWNpYXJpbzwvcGF5bWVudERlc2NyaXB0aW9uPgoJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCTxjb21wYW55TmFtZT54eHh4eHh4PC9jb21wYW55TmFtZT4KCQkJPGNyZWRpdG9yUmVmZXJlbmNlSWQ+MDEwMDAwMDAwMDAwMDAxODE8L2NyZWRpdG9yUmVmZXJlbmNlSWQ+CgkJCTxkZWJ0QW1vdW50PjE1MC4wMDwvZGVidEFtb3VudD4KCQkJPHRyYW5zZmVyTGlzdD4KCQkJCTx0cmFuc2Zlcj4KCQkJCQk8aWRUcmFuc2Zlcj4xPC9pZFRyYW5zZmVyPgoJCQkJCTx0cmFuc2ZlckFtb3VudD44MC4wMDwvdHJhbnNmZXJBbW91bnQ+CgkJCQkJPGZpc2NhbENvZGVQQT43Nzc3Nzc3Nzc3NzwvZmlzY2FsQ29kZVBBPgoJCQkJCTxJQkFOPklUMThVMDAwMDAwMDAwMDAwMDAwMDAwMDAwMTwvSUJBTj4KCQkJCQk8cmVtaXR0YW5jZUluZm9ybWF0aW9uPnh4eHg8L3JlbWl0dGFuY2VJbmZvcm1hdGlvbj4KCQkJCTwvdHJhbnNmZXI+CgkJCTwvdHJhbnNmZXJMaXN0PgoJCQk8Y3JlZGl0Q2FyZFBheW1lbnQ+CgkJCQk8cnJuPjExMTExMTExMTExMTwvcnJuPgoJCQkJPG91dGNvbWVQYXltZW50R2F0ZXdheT5PSzwvb3V0Y29tZVBheW1lbnRHYXRld2F5PgoJCQkJPHRvdGFsQW1vdW50PjgxLjMwPC90b3RhbEFtb3VudD4KCQkJCTxmZWU+MS4zMDwvZmVlPgoJCQkJPHRpbWVzdGFtcE9wZXJhdGlvbj4yMDI0LTA0LTEwVDIxOjE0OjQ3PC90aW1lc3RhbXBPcGVyYXRpb24+CgkJCQk8YXV0aG9yaXphdGlvbkNvZGU+MTExMTE1PC9hdXRob3JpemF0aW9uQ29kZT4KCQkJPC9jcmVkaXRDYXJkUGF5bWVudD4KCQk8L3Bmbjpwc3BOb3RpZnlQYXltZW50UmVxPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4=',
];

$data_resp = [
    ':id' => 195,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 11:40:01.197',
    ':tipoevento' => 'pspNotifyPayment',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000181',
    ':ccp' => 't0000000000000000000000000000181',
    ':noticenumber' => '301000000000000181',
    ':creditorreferenceid' => '01000000000000181',
    ':paymenttoken' => 't0000000000000000000000000000181',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100186',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000195',
    ':payload' => 'PFNPQVAtRU5WOkVudmVsb3BlIHhtbG5zOlNPQVAtRU5WPSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyI+PFNPQVAtRU5WOkhlYWRlci8+PFNPQVAtRU5WOkJvZHk+PG5zMzpwc3BOb3RpZnlQYXltZW50UmVzIHhtbG5zOm5zMz0iaHR0cDovL3BhZ29wYS1hcGkucGFnb3BhLmdvdi5pdC9wc3AvcHNwRm9yTm9kZS54c2QiPjxvdXRjb21lPk9LPC9vdXRjb21lPjwvbnMzOnBzcE5vdGlmeVBheW1lbnRSZXM+PC9TT0FQLUVOVjpCb2R5PjwvU09BUC1FTlY6RW52ZWxvcGU+',
];


Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);





$data_req = [
    ':id' => 196,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 11:41:00.197',
    ':tipoevento' => 'sendPaymentOutcome',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000181',
    ':ccp' => 't0000000000000000000000000000181',
    ':noticenumber' => '301000000000000181',
    ':creditorreferenceid' => '01000000000000181',
    ':paymenttoken' => 't0000000000000000000000000000181',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100187',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000196',
    ':payload' => 'PHNvYXA6RW52ZWxvcGUgeG1sbnM6c29hcD0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPgoJPHNvYXA6Qm9keT4KCQk8bnMyOnNlbmRQYXltZW50T3V0Y29tZVJlcSB4bWxuczpuczI9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6bnMzPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyI+CgkJCTxpZFBTUD5BR0lEXzAxPC9pZFBTUD4KCQkJPGlkQnJva2VyUFNQPjg4ODg4ODg4ODg4PC9pZEJyb2tlclBTUD4KCQkJPGlkQ2hhbm5lbD44ODg4ODg4ODg4OF8wMTwvaWRDaGFubmVsPgoJCQk8cGFzc3dvcmQ+eHh4eHh4eHg8L3Bhc3N3b3JkPgoJCQk8cGF5bWVudFRva2VuPnQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMTgxPC9wYXltZW50VG9rZW4+CgkJCTxvdXRjb21lPk9LPC9vdXRjb21lPgoJCQk8ZGV0YWlscz4KCQkJCTxwYXltZW50TWV0aG9kPm90aGVyPC9wYXltZW50TWV0aG9kPgoJCQkJPGZlZT4xLjAwPC9mZWU+CgkJCQk8YXBwbGljYXRpb25EYXRlPjIwMjQtMDQtMDI8L2FwcGxpY2F0aW9uRGF0ZT4KCQkJCTx0cmFuc2ZlckRhdGU+MjAyNC0wNC0wMzwvdHJhbnNmZXJEYXRlPgoJCQk8L2RldGFpbHM+CgkJPC9uczI6c2VuZFBheW1lbnRPdXRjb21lUmVxPgoJPC9zb2FwOkJvZHk+Cjwvc29hcDpFbnZlbG9wZT4=',
];

$data_resp = [
    ':id' => 197,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 11:41:01.197',
    ':tipoevento' => 'sendPaymentOutcome',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000181',
    ':ccp' => 't0000000000000000000000000000181',
    ':noticenumber' => '301000000000000181',
    ':creditorreferenceid' => '01000000000000181',
    ':paymenttoken' => 't0000000000000000000000000000181',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100187',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000197',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6c2VuZFBheW1lbnRPdXRjb21lUmVzPgoJCQk8b3V0Y29tZT5PSzwvb3V0Y29tZT4KCQk8L25mcDpzZW5kUGF5bWVudE91dGNvbWVSZXM+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg==',
];


Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);




























$data_req = [
    ':id' => 198,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 12:38:00.197',
    ':tipoevento' => 'activatePaymentNotice',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000182',
    ':ccp' => 't0000000000000000000000000000182',
    ':noticenumber' => '301000000000000182',
    ':creditorreferenceid' => '01000000000000182',
    ':paymenttoken' => 't0000000000000000000000000000182',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100188',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000198',
    ':payload' => 'PHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6bm9kPSJodHRwOi8vcGFnb3BhLWFwaS5wYWdvcGEuZ292Lml0L25vZGUvbm9kZUZvclBzcC54c2QiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIj4KICA8c29hcGVudjpIZWFkZXIvPgogIDxzb2FwZW52OkJvZHk+CiAgICA8bm9kOmFjdGl2YXRlUGF5bWVudE5vdGljZVJlcT4KICAgICAgPGlkUFNQPkFHSURfMDE8L2lkUFNQPgogICAgICA8aWRCcm9rZXJQU1A+ODg4ODg4ODg4ODg8L2lkQnJva2VyUFNQPgogICAgICA8aWRDaGFubmVsPjg4ODg4ODg4ODg4XzAxPC9pZENoYW5uZWw+CiAgICAgIDxwYXNzd29yZD4qKioqKjwvcGFzc3dvcmQ+CiAgICAgIDxxckNvZGU+CiAgICAgICAgPGZpc2NhbENvZGU+Nzc3Nzc3Nzc3Nzc8L2Zpc2NhbENvZGU+CiAgICAgICAgPG5vdGljZU51bWJlcj4zMDEwMDAwMDAwMDAwMDAxODI8L25vdGljZU51bWJlcj4KICAgICAgPC9xckNvZGU+CiAgICAgIDxhbW91bnQ+MC4wMDwvYW1vdW50PgogICAgPC9ub2Q6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVxPgogIDwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+',
];

$data_resp = [
    ':id' => 199,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 12:38:01.197',
    ':tipoevento' => 'activatePaymentNotice',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000182',
    ':ccp' => 't0000000000000000000000000000182',
    ':noticenumber' => '301000000000000182',
    ':creditorreferenceid' => '01000000000000182',
    ':paymenttoken' => 't0000000000000000000000000000182',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100188',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000199',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVzPgoJCQk8b3V0Y29tZT5PSzwvb3V0Y29tZT4KCQkJPHRvdGFsQW1vdW50PjgwLjAwPC90b3RhbEFtb3VudD4KCQkJPHBheW1lbnREZXNjcmlwdGlvbj54eHh4eHh4PC9wYXltZW50RGVzY3JpcHRpb24+CgkJCTxmaXNjYWxDb2RlUEE+Nzc3Nzc3Nzc3Nzc8L2Zpc2NhbENvZGVQQT4KCQkJPGNvbXBhbnlOYW1lPnh4eHh4eHg8L2NvbXBhbnlOYW1lPgoJCQk8cGF5bWVudFRva2VuPnQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMTgyPC9wYXltZW50VG9rZW4+CgkJCTx0cmFuc2Zlckxpc3Q+CgkJCQk8dHJhbnNmZXI+CgkJCQkJPGlkVHJhbnNmZXI+MTwvaWRUcmFuc2Zlcj4KCQkJCQk8dHJhbnNmZXJBbW91bnQ+ODAuMDA8L3RyYW5zZmVyQW1vdW50PgoJCQkJCTxmaXNjYWxDb2RlUEE+Nzc3Nzc3Nzc3Nzc8L2Zpc2NhbENvZGVQQT4KCQkJCQk8SUJBTj5JVDE4VTAwMDAwMDAwMDAwMDAwMDAwMDAwMDE8L0lCQU4+CgkJCQkJPHJlbWl0dGFuY2VJbmZvcm1hdGlvbj54eHh4PC9yZW1pdHRhbmNlSW5mb3JtYXRpb24+CgkJCQk8L3RyYW5zZmVyPgoJCQk8L3RyYW5zZmVyTGlzdD4KCQkJPGNyZWRpdG9yUmVmZXJlbmNlSWQ+MDEwMDAwMDAwMDAwMDAxODI8L2NyZWRpdG9yUmVmZXJlbmNlSWQ+CgkJPC9uZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVzPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4=',
];


Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);



$data_req = [
    ':id' => 200,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 12:39:00.197',
    ':tipoevento' => 'nodoChiediAvanzamentoPagamento',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000182',
    ':ccp' => 't0000000000000000000000000000182',
    ':noticenumber' => '301000000000000182',
    ':creditorreferenceid' => '01000000000000182',
    ':paymenttoken' => 't0000000000000000000000000000182',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100189',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000200',
    ':payload' => '',
];

$data_resp = [
    ':id' => 201,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 12:39:01.197',
    ':tipoevento' => 'nodoChiediAvanzamentoPagamento',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000182',
    ':ccp' => 't0000000000000000000000000000182',
    ':noticenumber' => '301000000000000182',
    ':creditorreferenceid' => '01000000000000182',
    ':paymenttoken' => 't0000000000000000000000000000182',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100189',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000201',
    ':payload' => 'eyJlc2l0byI6Ik9LIn0=',
];


Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);


$data_req = [
    ':id' => 202,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 12:40:00.197',
    ':tipoevento' => 'pspNotifyPayment',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000182',
    ':ccp' => 't0000000000000000000000000000182',
    ':noticenumber' => '301000000000000182',
    ':creditorreferenceid' => '01000000000000182',
    ':paymenttoken' => 't0000000000000000000000000000182',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100190',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000202',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpwZm49Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvcHNwL3BzcEZvck5vZGUueHNkIiB4bWxuczpzb2FwZW52PSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyIgeG1sbnM6eHM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hIiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBmbjpwc3BOb3RpZnlQYXltZW50UmVxPgoJCQk8aWRQU1A+QUdJRF8wMTwvaWRQU1A+CgkJCTxpZEJyb2tlclBTUD44ODg4ODg4ODg4ODwvaWRCcm9rZXJQU1A+CgkJCTxpZENoYW5uZWw+ODg4ODg4ODg4ODhfMDE8L2lkQ2hhbm5lbD4KCQkJPHBheW1lbnRUb2tlbj50MDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDE4MjwvcGF5bWVudFRva2VuPgoJCQk8cGF5bWVudERlc2NyaXB0aW9uPnBhZ2FtZW50byBtdWx0aWJlbmVmaWNpYXJpbzwvcGF5bWVudERlc2NyaXB0aW9uPgoJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCTxjb21wYW55TmFtZT54eHh4eHh4PC9jb21wYW55TmFtZT4KCQkJPGNyZWRpdG9yUmVmZXJlbmNlSWQ+MDEwMDAwMDAwMDAwMDAxODI8L2NyZWRpdG9yUmVmZXJlbmNlSWQ+CgkJCTxkZWJ0QW1vdW50PjE1MC4wMDwvZGVidEFtb3VudD4KCQkJPHRyYW5zZmVyTGlzdD4KCQkJCTx0cmFuc2Zlcj4KCQkJCQk8aWRUcmFuc2Zlcj4xPC9pZFRyYW5zZmVyPgoJCQkJCTx0cmFuc2ZlckFtb3VudD44MC4wMDwvdHJhbnNmZXJBbW91bnQ+CgkJCQkJPGZpc2NhbENvZGVQQT43Nzc3Nzc3Nzc3NzwvZmlzY2FsQ29kZVBBPgoJCQkJCTxJQkFOPklUMThVMDAwMDAwMDAwMDAwMDAwMDAwMDAwMTwvSUJBTj4KCQkJCQk8cmVtaXR0YW5jZUluZm9ybWF0aW9uPnh4eHg8L3JlbWl0dGFuY2VJbmZvcm1hdGlvbj4KCQkJCTwvdHJhbnNmZXI+CgkJCTwvdHJhbnNmZXJMaXN0PgoJCQk8Y3JlZGl0Q2FyZFBheW1lbnQ+CgkJCQk8cnJuPjExMTExMTExMTExMTwvcnJuPgoJCQkJPG91dGNvbWVQYXltZW50R2F0ZXdheT5PSzwvb3V0Y29tZVBheW1lbnRHYXRld2F5PgoJCQkJPHRvdGFsQW1vdW50PjgxLjMwPC90b3RhbEFtb3VudD4KCQkJCTxmZWU+MS4zMDwvZmVlPgoJCQkJPHRpbWVzdGFtcE9wZXJhdGlvbj4yMDI0LTA0LTEwVDIxOjE0OjQ3PC90aW1lc3RhbXBPcGVyYXRpb24+CgkJCQk8YXV0aG9yaXphdGlvbkNvZGU+MTExMTE1PC9hdXRob3JpemF0aW9uQ29kZT4KCQkJPC9jcmVkaXRDYXJkUGF5bWVudD4KCQk8L3Bmbjpwc3BOb3RpZnlQYXltZW50UmVxPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4=',
];

$data_resp = [
    ':id' => 203,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 12:40:01.197',
    ':tipoevento' => 'pspNotifyPayment',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000182',
    ':ccp' => 't0000000000000000000000000000182',
    ':noticenumber' => '301000000000000182',
    ':creditorreferenceid' => '01000000000000182',
    ':paymenttoken' => 't0000000000000000000000000000182',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100190',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000203',
    ':payload' => 'PFNPQVAtRU5WOkVudmVsb3BlIHhtbG5zOlNPQVAtRU5WPSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyI+PFNPQVAtRU5WOkhlYWRlci8+PFNPQVAtRU5WOkJvZHk+PG5zMzpwc3BOb3RpZnlQYXltZW50UmVzIHhtbG5zOm5zMz0iaHR0cDovL3BhZ29wYS1hcGkucGFnb3BhLmdvdi5pdC9wc3AvcHNwRm9yTm9kZS54c2QiPjxvdXRjb21lPk9LPC9vdXRjb21lPjwvbnMzOnBzcE5vdGlmeVBheW1lbnRSZXM+PC9TT0FQLUVOVjpCb2R5PjwvU09BUC1FTlY6RW52ZWxvcGU+',
];


Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);


$data_req = [
    ':id' => 204,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 12:41:00.197',
    ':tipoevento' => 'sendPaymentOutcome',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000182',
    ':ccp' => 't0000000000000000000000000000182',
    ':noticenumber' => '301000000000000182',
    ':creditorreferenceid' => '01000000000000182',
    ':paymenttoken' => 't0000000000000000000000000000182',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100191',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000204',
    ':payload' => 'PHNvYXA6RW52ZWxvcGUgeG1sbnM6c29hcD0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPgoJPHNvYXA6Qm9keT4KCQk8bnMyOnNlbmRQYXltZW50T3V0Y29tZVJlcSB4bWxuczpuczI9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6bnMzPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyI+CgkJCTxpZFBTUD5BR0lEXzAxPC9pZFBTUD4KCQkJPGlkQnJva2VyUFNQPjg4ODg4ODg4ODg4PC9pZEJyb2tlclBTUD4KCQkJPGlkQ2hhbm5lbD44ODg4ODg4ODg4OF8wMTwvaWRDaGFubmVsPgoJCQk8cGFzc3dvcmQ+eHh4eHh4eHg8L3Bhc3N3b3JkPgoJCQk8cGF5bWVudFRva2VuPnQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMTgyPC9wYXltZW50VG9rZW4+CgkJCTxvdXRjb21lPk9LPC9vdXRjb21lPgoJCQk8ZGV0YWlscz4KCQkJCTxwYXltZW50TWV0aG9kPm90aGVyPC9wYXltZW50TWV0aG9kPgoJCQkJPGZlZT4xLjAwPC9mZWU+CgkJCQk8YXBwbGljYXRpb25EYXRlPjIwMjQtMDQtMDI8L2FwcGxpY2F0aW9uRGF0ZT4KCQkJCTx0cmFuc2ZlckRhdGU+MjAyNC0wNC0wMzwvdHJhbnNmZXJEYXRlPgoJCQk8L2RldGFpbHM+CgkJPC9uczI6c2VuZFBheW1lbnRPdXRjb21lUmVxPgoJPC9zb2FwOkJvZHk+Cjwvc29hcDpFbnZlbG9wZT4=',
];

$data_resp = [
    ':id' => 205,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 12:41:01.197',
    ':tipoevento' => 'sendPaymentOutcome',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000182',
    ':ccp' => 't0000000000000000000000000000182',
    ':noticenumber' => '301000000000000182',
    ':creditorreferenceid' => '01000000000000182',
    ':paymenttoken' => 't0000000000000000000000000000182',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100191',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000205',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6c2VuZFBheW1lbnRPdXRjb21lUmVzPgoJCQk8b3V0Y29tZT5PSzwvb3V0Y29tZT4KCQk8L25mcDpzZW5kUGF5bWVudE91dGNvbWVSZXM+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg==',
];


Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);














$data_req = [
    ':id' => 206,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 13:38:00.197',
    ':tipoevento' => 'activatePaymentNotice',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000183',
    ':ccp' => 't0000000000000000000000000000183',
    ':noticenumber' => '301000000000000183',
    ':creditorreferenceid' => '01000000000000183',
    ':paymenttoken' => 't0000000000000000000000000000183',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100192',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000206',
    ':payload' => 'PHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6bm9kPSJodHRwOi8vcGFnb3BhLWFwaS5wYWdvcGEuZ292Lml0L25vZGUvbm9kZUZvclBzcC54c2QiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIj4KICA8c29hcGVudjpIZWFkZXIvPgogIDxzb2FwZW52OkJvZHk+CiAgICA8bm9kOmFjdGl2YXRlUGF5bWVudE5vdGljZVJlcT4KICAgICAgPGlkUFNQPkFHSURfMDE8L2lkUFNQPgogICAgICA8aWRCcm9rZXJQU1A+ODg4ODg4ODg4ODg8L2lkQnJva2VyUFNQPgogICAgICA8aWRDaGFubmVsPjg4ODg4ODg4ODg4XzAxPC9pZENoYW5uZWw+CiAgICAgIDxwYXNzd29yZD4qKioqKjwvcGFzc3dvcmQ+CiAgICAgIDxxckNvZGU+CiAgICAgICAgPGZpc2NhbENvZGU+Nzc3Nzc3Nzc3Nzc8L2Zpc2NhbENvZGU+CiAgICAgICAgPG5vdGljZU51bWJlcj4zMDEwMDAwMDAwMDAwMDAxODM8L25vdGljZU51bWJlcj4KICAgICAgPC9xckNvZGU+CiAgICAgIDxhbW91bnQ+MC4wMDwvYW1vdW50PgogICAgPC9ub2Q6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVxPgogIDwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+',
];

$data_resp = [
    ':id' => 207,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 13:38:01.197',
    ':tipoevento' => 'activatePaymentNotice',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000183',
    ':ccp' => 't0000000000000000000000000000183',
    ':noticenumber' => '301000000000000183',
    ':creditorreferenceid' => '01000000000000183',
    ':paymenttoken' => 't0000000000000000000000000000183',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100192',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000207',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVzPgoJCQk8b3V0Y29tZT5PSzwvb3V0Y29tZT4KCQkJPHRvdGFsQW1vdW50PjgwLjAwPC90b3RhbEFtb3VudD4KCQkJPHBheW1lbnREZXNjcmlwdGlvbj54eHh4eHh4PC9wYXltZW50RGVzY3JpcHRpb24+CgkJCTxmaXNjYWxDb2RlUEE+Nzc3Nzc3Nzc3Nzc8L2Zpc2NhbENvZGVQQT4KCQkJPGNvbXBhbnlOYW1lPnh4eHh4eHg8L2NvbXBhbnlOYW1lPgoJCQk8cGF5bWVudFRva2VuPnQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMTgzPC9wYXltZW50VG9rZW4+CgkJCTx0cmFuc2Zlckxpc3Q+CgkJCQk8dHJhbnNmZXI+CgkJCQkJPGlkVHJhbnNmZXI+MTwvaWRUcmFuc2Zlcj4KCQkJCQk8dHJhbnNmZXJBbW91bnQ+ODAuMDA8L3RyYW5zZmVyQW1vdW50PgoJCQkJCTxmaXNjYWxDb2RlUEE+Nzc3Nzc3Nzc3Nzc8L2Zpc2NhbENvZGVQQT4KCQkJCQk8SUJBTj5JVDE4VTAwMDAwMDAwMDAwMDAwMDAwMDAwMDE8L0lCQU4+CgkJCQkJPHJlbWl0dGFuY2VJbmZvcm1hdGlvbj54eHh4PC9yZW1pdHRhbmNlSW5mb3JtYXRpb24+CgkJCQk8L3RyYW5zZmVyPgoJCQk8L3RyYW5zZmVyTGlzdD4KCQkJPGNyZWRpdG9yUmVmZXJlbmNlSWQ+MDEwMDAwMDAwMDAwMDAxODM8L2NyZWRpdG9yUmVmZXJlbmNlSWQ+CgkJPC9uZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVzPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4=',
];


Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);






$data_req = [
    ':id' => 208,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 13:39:00.197',
    ':tipoevento' => 'closePayment-v1',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000183',
    ':ccp' => 't0000000000000000000000000000183',
    ':noticenumber' => '301000000000000183',
    ':creditorreferenceid' => '01000000000000183',
    ':paymenttoken' => 't0000000000000000000000000000183',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100193',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000208',
    ':payload' => 'ewogICAgImFkZGl0aW9uYWxQYXltZW50SW5mb3JtYXRpb25zIjogewogICAgICAgICJhdXRob3JpemF0aW9uQ29kZSI6ICIwMDAwMDAwMDAwMDAwMDAwMDAwMDAxMCIsCiAgICAgICAgIm91dGNvbWVQYXltZW50R2F0ZXdheSI6ICIwIiwKICAgICAgICAidHJhbnNhY3Rpb25JZCI6ICIxMTExMTExMTIiCiAgICB9LAogICAgImZlZSI6IDAuNSwKICAgICJpZGVudGlmaWNhdGl2b0NhbmFsZSI6ICI4ODg4ODg4ODg4OF8wMSIsCiAgICAiaWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvIjogIjg4ODg4ODg4ODg4IiwKICAgICJpZGVudGlmaWNhdGl2b1BzcCI6ICJBR0lEXzAxIiwKICAgICJvdXRjb21lIjogIk9LIiwKICAgICJwYXltZW50VG9rZW5zIjogWwogICAgICAgICJ0MDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDE4MyIKICAgIF0sCiAgICAicHNwVHJhbnNhY3Rpb25JZCI6ICIxMTExMTExMTIiLAogICAgInRpbWVzdGFtcE9wZXJhdGlvbiI6ICIyMDI0LTA0LTMwVDIxOjE4OjAwLjM3OVoiLAogICAgInRpcG9WZXJzYW1lbnRvIjogIkJQQVkiLAogICAgInRvdGFsQW1vdW50IjogODAuMAp9',
];

$data_resp = [
    ':id' => 209,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 13:39:01.197',
    ':tipoevento' => 'closePayment-v1',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000183',
    ':ccp' => 't0000000000000000000000000000183',
    ':noticenumber' => '301000000000000183',
    ':creditorreferenceid' => '01000000000000183',
    ':paymenttoken' => 't0000000000000000000000000000183',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100193',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000209',
    ':payload' => 'eyJlc2l0byI6Ik9LIn0=',
];

Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);





$data_req = [
    ':id' => 210,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 13:40:00.197',
    ':tipoevento' => 'pspNotifyPayment',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000183',
    ':ccp' => 't0000000000000000000000000000183',
    ':noticenumber' => '301000000000000183',
    ':creditorreferenceid' => '01000000000000183',
    ':paymenttoken' => 't0000000000000000000000000000183',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100194',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000210',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpwZm49Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvcHNwL3BzcEZvck5vZGUueHNkIiB4bWxuczpzb2FwZW52PSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyIgeG1sbnM6eHM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hIiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBmbjpwc3BOb3RpZnlQYXltZW50UmVxPgoJCQk8aWRQU1A+QUdJRF8wMTwvaWRQU1A+CgkJCTxpZEJyb2tlclBTUD44ODg4ODg4ODg4ODwvaWRCcm9rZXJQU1A+CgkJCTxpZENoYW5uZWw+ODg4ODg4ODg4ODhfMDE8L2lkQ2hhbm5lbD4KCQkJPHBheW1lbnRUb2tlbj50MDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDE4MzwvcGF5bWVudFRva2VuPgoJCQk8cGF5bWVudERlc2NyaXB0aW9uPnBhZ2FtZW50byBtdWx0aWJlbmVmaWNpYXJpbzwvcGF5bWVudERlc2NyaXB0aW9uPgoJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCTxjb21wYW55TmFtZT54eHh4eHh4PC9jb21wYW55TmFtZT4KCQkJPGNyZWRpdG9yUmVmZXJlbmNlSWQ+MDEwMDAwMDAwMDAwMDAxODM8L2NyZWRpdG9yUmVmZXJlbmNlSWQ+CgkJCTxkZWJ0QW1vdW50PjE1MC4wMDwvZGVidEFtb3VudD4KCQkJPHRyYW5zZmVyTGlzdD4KCQkJCTx0cmFuc2Zlcj4KCQkJCQk8aWRUcmFuc2Zlcj4xPC9pZFRyYW5zZmVyPgoJCQkJCTx0cmFuc2ZlckFtb3VudD44MC4wMDwvdHJhbnNmZXJBbW91bnQ+CgkJCQkJPGZpc2NhbENvZGVQQT43Nzc3Nzc3Nzc3NzwvZmlzY2FsQ29kZVBBPgoJCQkJCTxJQkFOPklUMThVMDAwMDAwMDAwMDAwMDAwMDAwMDAwMTwvSUJBTj4KCQkJCQk8cmVtaXR0YW5jZUluZm9ybWF0aW9uPnh4eHg8L3JlbWl0dGFuY2VJbmZvcm1hdGlvbj4KCQkJCTwvdHJhbnNmZXI+CgkJCTwvdHJhbnNmZXJMaXN0PgoJCQk8Y3JlZGl0Q2FyZFBheW1lbnQ+CgkJCQk8cnJuPjExMTExMTExMTExMTwvcnJuPgoJCQkJPG91dGNvbWVQYXltZW50R2F0ZXdheT5PSzwvb3V0Y29tZVBheW1lbnRHYXRld2F5PgoJCQkJPHRvdGFsQW1vdW50PjgxLjMwPC90b3RhbEFtb3VudD4KCQkJCTxmZWU+MS4zMDwvZmVlPgoJCQkJPHRpbWVzdGFtcE9wZXJhdGlvbj4yMDI0LTA0LTEwVDIxOjE0OjQ3PC90aW1lc3RhbXBPcGVyYXRpb24+CgkJCQk8YXV0aG9yaXphdGlvbkNvZGU+MTExMTE1PC9hdXRob3JpemF0aW9uQ29kZT4KCQkJPC9jcmVkaXRDYXJkUGF5bWVudD4KCQk8L3Bmbjpwc3BOb3RpZnlQYXltZW50UmVxPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4=',
];

$data_resp = [
    ':id' => 211,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 13:40:01.197',
    ':tipoevento' => 'pspNotifyPayment',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000183',
    ':ccp' => 't0000000000000000000000000000183',
    ':noticenumber' => '301000000000000183',
    ':creditorreferenceid' => '01000000000000183',
    ':paymenttoken' => 't0000000000000000000000000000183',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100194',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000211',
    ':payload' => 'PFNPQVAtRU5WOkVudmVsb3BlIHhtbG5zOlNPQVAtRU5WPSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyI+PFNPQVAtRU5WOkhlYWRlci8+PFNPQVAtRU5WOkJvZHk+PG5zMzpwc3BOb3RpZnlQYXltZW50UmVzIHhtbG5zOm5zMz0iaHR0cDovL3BhZ29wYS1hcGkucGFnb3BhLmdvdi5pdC9wc3AvcHNwRm9yTm9kZS54c2QiPjxvdXRjb21lPk9LPC9vdXRjb21lPjwvbnMzOnBzcE5vdGlmeVBheW1lbnRSZXM+PC9TT0FQLUVOVjpCb2R5PjwvU09BUC1FTlY6RW52ZWxvcGU+',
];


Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);






$data_req = [
    ':id' => 212,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 13:41:00.197',
    ':tipoevento' => 'sendPaymentOutcome',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000183',
    ':ccp' => 't0000000000000000000000000000183',
    ':noticenumber' => '301000000000000183',
    ':creditorreferenceid' => '01000000000000183',
    ':paymenttoken' => 't0000000000000000000000000000183',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100195',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000212',
    ':payload' => 'PHNvYXA6RW52ZWxvcGUgeG1sbnM6c29hcD0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPgoJPHNvYXA6Qm9keT4KCQk8bnMyOnNlbmRQYXltZW50T3V0Y29tZVJlcSB4bWxuczpuczI9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6bnMzPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyI+CgkJCTxpZFBTUD5BR0lEXzAxPC9pZFBTUD4KCQkJPGlkQnJva2VyUFNQPjg4ODg4ODg4ODg4PC9pZEJyb2tlclBTUD4KCQkJPGlkQ2hhbm5lbD44ODg4ODg4ODg4OF8wMTwvaWRDaGFubmVsPgoJCQk8cGFzc3dvcmQ+eHh4eHh4eHg8L3Bhc3N3b3JkPgoJCQk8cGF5bWVudFRva2VuPnQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMTgzPC9wYXltZW50VG9rZW4+CgkJCTxvdXRjb21lPk9LPC9vdXRjb21lPgoJCQk8ZGV0YWlscz4KCQkJCTxwYXltZW50TWV0aG9kPm90aGVyPC9wYXltZW50TWV0aG9kPgoJCQkJPGZlZT4xLjAwPC9mZWU+CgkJCQk8YXBwbGljYXRpb25EYXRlPjIwMjQtMDQtMDI8L2FwcGxpY2F0aW9uRGF0ZT4KCQkJCTx0cmFuc2ZlckRhdGU+MjAyNC0wNC0wMzwvdHJhbnNmZXJEYXRlPgoJCQk8L2RldGFpbHM+CgkJPC9uczI6c2VuZFBheW1lbnRPdXRjb21lUmVxPgoJPC9zb2FwOkJvZHk+Cjwvc29hcDpFbnZlbG9wZT4=',
];

$data_resp = [
    ':id' => 213,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 13:41:01.197',
    ':tipoevento' => 'sendPaymentOutcome',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000183',
    ':ccp' => 't0000000000000000000000000000183',
    ':noticenumber' => '301000000000000183',
    ':creditorreferenceid' => '01000000000000183',
    ':paymenttoken' => 't0000000000000000000000000000183',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100195',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000213',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6c2VuZFBheW1lbnRPdXRjb21lUmVzPgoJCQk8b3V0Y29tZT5PSzwvb3V0Y29tZT4KCQk8L25mcDpzZW5kUGF5bWVudE91dGNvbWVSZXM+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg==',
];


Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);










































































$data_req = [
    ':id' => 214,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 14:41:00.197',
    ':tipoevento' => 'nodoAttivaRPT',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000184',
    ':ccp' => 't0000000000000000000000000000184',
    ':noticenumber' => '301000000000000184',
    ':creditorreferenceid' => '01000000000000184',
    ':paymenttoken' => 't0000000000000000000000000000184',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100196',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000214',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPHNvYXA6RW52ZWxvcGUgeG1sbnM6cGF5X2k9Imh0dHA6Ly93d3cuZGlnaXRwYS5nb3YuaXQvc2NoZW1hcy8yMDExL1BhZ2FtZW50aS8iIHhtbG5zOnBwdD0iaHR0cDovL3dzLnBhZ2FtZW50aS50ZWxlbWF0aWNpLmdvdi8iIHhtbG5zOnFyYz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0L1FyQ29kZSIgeG1sbnM6c29hcD0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnRucz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0L3NlcnZpemkvUGFnYW1lbnRpVGVsZW1hdGljaVBzcE5vZG8iIHhtbG5zOnhzaT0iaHR0cDovL3d3dy53My5vcmcvMjAwMS9YTUxTY2hlbWEtaW5zdGFuY2UiPgoJPHNvYXA6Qm9keT4KCQk8cHB0Om5vZG9BdHRpdmFSUFQgeG1sbnM6cHB0PSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyI+CgkJCTxpZGVudGlmaWNhdGl2b1BTUD5BR0lEXzAxPC9pZGVudGlmaWNhdGl2b1BTUD4KCQkJPGlkZW50aWZpY2F0aXZvSW50ZXJtZWRpYXJpb1BTUD44ODg4ODg4ODg4ODwvaWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUFNQPgoJCQk8aWRlbnRpZmljYXRpdm9DYW5hbGU+ODg4ODg4ODg4ODhfMDE8L2lkZW50aWZpY2F0aXZvQ2FuYWxlPgoJCQk8Y29kaWNlQ29udGVzdG9QYWdhbWVudG8+dDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxODQ8L2NvZGljZUNvbnRlc3RvUGFnYW1lbnRvPgoJCQk8aWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUFNQUGFnYW1lbnRvPjg4ODg4ODg4ODg4PC9pZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QU1BQYWdhbWVudG8+CgkJCTxpZGVudGlmaWNhdGl2b0NhbmFsZVBhZ2FtZW50bz44ODg4ODg4ODg4OF8wMTwvaWRlbnRpZmljYXRpdm9DYW5hbGVQYWdhbWVudG8+CgkJCTxjb2RpZmljYUluZnJhc3RydXR0dXJhUFNQPlFSLUNPREU8L2NvZGlmaWNhSW5mcmFzdHJ1dHR1cmFQU1A+CgkJCTxjb2RpY2VJZFJQVD4KCQkJCTxxcmM6UXJDb2RlPgoJCQkJCTxxcmM6Q0Y+Nzc3Nzc3Nzc3Nzc8L3FyYzpDRj4KCQkJCQk8cXJjOkF1eERpZ2l0PjM8L3FyYzpBdXhEaWdpdD4KCQkJCQk8cXJjOkNvZElVVj4wMTAwMDAwMDAwMDAwMDE4NDwvcXJjOkNvZElVVj4KCQkJCTwvcXJjOlFyQ29kZT4KCQkJPC9jb2RpY2VJZFJQVD4KCQkJPGRhdGlQYWdhbWVudG9QU1A+CgkJCQk8aW1wb3J0b1NpbmdvbG9WZXJzYW1lbnRvPjgwLjAwPC9pbXBvcnRvU2luZ29sb1ZlcnNhbWVudG8+CgkJCTwvZGF0aVBhZ2FtZW50b1BTUD4KCQk8L3BwdDpub2RvQXR0aXZhUlBUPgoJPC9zb2FwOkJvZHk+Cjwvc29hcDpFbnZlbG9wZT4=',
];

$data_resp = [
    ':id' => 215,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 14:41:01.197',
    ':tipoevento' => 'nodoAttivaRPT',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000184',
    ':ccp' => 't0000000000000000000000000000184',
    ':noticenumber' => '301000000000000184',
    ':creditorreferenceid' => '01000000000000184',
    ':paymenttoken' => 't0000000000000000000000000000184',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100196',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000215',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpiYz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0L0JhckNvZGVfR1MxXzEyOF9Nb2RpZmllZCIgeG1sbnM6cGF5X2k9Imh0dHA6Ly93d3cuZGlnaXRwYS5nb3YuaXQvc2NoZW1hcy8yMDExL1BhZ2FtZW50aS8iIHhtbG5zOnBwdD0iaHR0cDovL3dzLnBhZ2FtZW50aS50ZWxlbWF0aWNpLmdvdi8iIHhtbG5zOnFyYz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0L1FyQ29kZSIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnRucz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0L3NlcnZpemkvUGFnYW1lbnRpVGVsZW1hdGljaVBzcE5vZG8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxwcHQ6bm9kb0F0dGl2YVJQVFJpc3Bvc3RhPgoJCQk8bm9kb0F0dGl2YVJQVFJpc3Bvc3RhPgoJCQkJPGVzaXRvPk9LPC9lc2l0bz4KCQkJCTxkYXRpUGFnYW1lbnRvUEE+CgkJCQkJPGltcG9ydG9TaW5nb2xvVmVyc2FtZW50bz44MC4wMDwvaW1wb3J0b1NpbmdvbG9WZXJzYW1lbnRvPgoJCQkJCTxpYmFuQWNjcmVkaXRvPklUMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMTwvaWJhbkFjY3JlZGl0bz4KCQkJCQk8ZW50ZUJlbmVmaWNpYXJpbz4KCQkJCQkJPHBheV9pOmlkZW50aWZpY2F0aXZvVW5pdm9jb0JlbmVmaWNpYXJpbz4KCQkJCQkJCTxwYXlfaTp0aXBvSWRlbnRpZmljYXRpdm9Vbml2b2NvPkc8L3BheV9pOnRpcG9JZGVudGlmaWNhdGl2b1VuaXZvY28+CgkJCQkJCQk8cGF5X2k6Y29kaWNlSWRlbnRpZmljYXRpdm9Vbml2b2NvPjc3Nzc3Nzc3Nzc3PC9wYXlfaTpjb2RpY2VJZGVudGlmaWNhdGl2b1VuaXZvY28+CgkJCQkJCTwvcGF5X2k6aWRlbnRpZmljYXRpdm9Vbml2b2NvQmVuZWZpY2lhcmlvPgoJCQkJCQk8cGF5X2k6ZGVub21pbmF6aW9uZUJlbmVmaWNpYXJpbz54eHh4eHg8L3BheV9pOmRlbm9taW5hemlvbmVCZW5lZmljaWFyaW8+CgkJCQkJPC9lbnRlQmVuZWZpY2lhcmlvPgoJCQkJCTxjYXVzYWxlVmVyc2FtZW50bz54eHh4eHg8L2NhdXNhbGVWZXJzYW1lbnRvPgoJCQkJPC9kYXRpUGFnYW1lbnRvUEE+CgkJCTwvbm9kb0F0dGl2YVJQVFJpc3Bvc3RhPgoJCTwvcHB0Om5vZG9BdHRpdmFSUFRSaXNwb3N0YT4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+',
];


Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);







$data_req = [
    ':id' => 216,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 14:42:00.197',
    ':tipoevento' => 'nodoInviaRPT',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000184',
    ':ccp' => 't0000000000000000000000000000184',
    ':noticenumber' => '301000000000000184',
    ':creditorreferenceid' => '01000000000000184',
    ':paymenttoken' => 't0000000000000000000000000000184',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100197',
    ':sessionidoriginal' => 'sessionOriginal_cdInfoWisp',
    ':uniqueid' => 'T000216',
    ':payload' => 'PHNvYXA6RW52ZWxvcGUgeG1sbnM6c29hcD0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPgoJPHNvYXA6SGVhZGVyPgoJCTxuczQ6aW50ZXN0YXppb25lUFBUIFNPQVAtRU5WOmFjdG9yPSJodHRwOi8vcGRkNGoub3JnL3BvcnRhZG9taW5pbyIgU09BUC1FTlY6bXVzdFVuZGVyc3RhbmQ9IjEiIHhtbG5zPSIiIHhtbG5zOlNPQVAtRU5WPSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyIgeG1sbnM6bnMzPSJodHRwOi8vd3d3LmRpZ2l0cGEuZ292Lml0L3NjaGVtYXMvMjAxMS9QYWdhbWVudGkvIiB4bWxuczpuczQ9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvcHB0aGVhZCIgeG1sbnM6bnM1PSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyI+CgkJCTxpZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QQT43Nzc3Nzc3Nzc3NzwvaWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUEE+CgkJCTxpZGVudGlmaWNhdGl2b1N0YXppb25lSW50ZXJtZWRpYXJpb1BBPjc3Nzc3Nzc3Nzc3XzAxPC9pZGVudGlmaWNhdGl2b1N0YXppb25lSW50ZXJtZWRpYXJpb1BBPgoJCQk8aWRlbnRpZmljYXRpdm9Eb21pbmlvPjc3Nzc3Nzc3Nzc3PC9pZGVudGlmaWNhdGl2b0RvbWluaW8+CgkJCTxpZGVudGlmaWNhdGl2b1VuaXZvY29WZXJzYW1lbnRvPjAxMDAwMDAwMDAwMDAwMTg0PC9pZGVudGlmaWNhdGl2b1VuaXZvY29WZXJzYW1lbnRvPgoJCQk8Y29kaWNlQ29udGVzdG9QYWdhbWVudG8+dDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxODQ8L2NvZGljZUNvbnRlc3RvUGFnYW1lbnRvPgoJCTwvbnM0OmludGVzdGF6aW9uZVBQVD4KCTwvc29hcDpIZWFkZXI+Cgk8c29hcDpCb2R5PgoJCTxuczU6bm9kb0ludmlhUlBUIHhtbG5zPSIiIHhtbG5zOm5zMz0iaHR0cDovL3d3dy5kaWdpdHBhLmdvdi5pdC9zY2hlbWFzLzIwMTEvUGFnYW1lbnRpLyIgeG1sbnM6bnM0PSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOm5zNT0iaHR0cDovL3dzLnBhZ2FtZW50aS50ZWxlbWF0aWNpLmdvdi8iPgoJCQk8cGFzc3dvcmQ+UExBQ0VIT0xERVI8L3Bhc3N3b3JkPgoJCQk8aWRlbnRpZmljYXRpdm9QU1A+ODg4ODg4ODg4ODg8L2lkZW50aWZpY2F0aXZvUFNQPgoJCQk8aWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUFNQPjg4ODg4ODg4ODg4PC9pZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QU1A+CgkJCTxpZGVudGlmaWNhdGl2b0NhbmFsZT44ODg4ODg4ODg4OF8wMTwvaWRlbnRpZmljYXRpdm9DYW5hbGU+CgkJCTx0aXBvRmlybWEvPgoJCQk8cnB0PlBEOTRiV3dnZG1WeWMybHZiajBpTVM0d0lpQmxibU52WkdsdVp6MGlWVlJHTFRnaUlITjBZVzVrWVd4dmJtVTlJbmxsY3lJL1BnbzhVbEJVSUhodGJHNXpQU0pvZEhSd09pOHZkM2QzTG1ScFoybDBjR0V1WjI5MkxtbDBMM05qYUdWdFlYTXZNakF4TVM5UVlXZGhiV1Z1ZEdrdklqNEtJQ0FnSUR4MlpYSnphVzl1WlU5bloyVjBkRzgrTmk0eVBDOTJaWEp6YVc5dVpVOW5aMlYwZEc4K0NpQWdJQ0E4Wkc5dGFXNXBiejRLSUNBZ0lDQWdJQ0E4YVdSbGJuUnBabWxqWVhScGRtOUViMjFwYm1sdlBqYzNOemMzTnpjM056YzNQQzlwWkdWdWRHbG1hV05oZEdsMmIwUnZiV2x1YVc4K0NpQWdJQ0E4TDJSdmJXbHVhVzgrQ2lBZ0lDQThhV1JsYm5ScFptbGpZWFJwZG05TlpYTnpZV2RuYVc5U2FXTm9hV1Z6ZEdFK2VIaDRlSGg0ZUhnOEwybGtaVzUwYVdacFkyRjBhWFp2VFdWemMyRm5aMmx2VW1samFHbGxjM1JoUGdvZ0lDQWdQR1JoZEdGUGNtRk5aWE56WVdkbmFXOVNhV05vYVdWemRHRStNakF5TkMwd05DMHhNRlF5TVRveE5Eb3pPRHd2WkdGMFlVOXlZVTFsYzNOaFoyZHBiMUpwWTJocFpYTjBZVDRLSUNBZ0lEeGhkWFJsYm5ScFkyRjZhVzl1WlZOdloyZGxkSFJ2UGs0dlFUd3ZZWFYwWlc1MGFXTmhlbWx2Ym1WVGIyZG5aWFIwYno0S0lDQWdJRHh6YjJkblpYUjBiMUJoWjJGMGIzSmxQZ29nSUNBZ0lDQWdJRHhwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5UVlXZGhkRzl5WlQ0S0lDQWdJQ0FnSUNBZ0lDQWdQSFJwY0c5SlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtSand2ZEdsd2IwbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejRLSUNBZ0lDQWdJQ0FnSUNBZ1BHTnZaR2xqWlVsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NTRlSGg0ZUhoNGVEd3ZZMjlrYVdObFNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29nSUNBZ0lDQWdJRHd2YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlVHRm5ZWFJ2Y21VK0NpQWdJQ0FnSUNBZ1BHRnVZV2R5WVdacFkyRlFZV2RoZEc5eVpUNTRlSGg0ZUhoNGVIZzhMMkZ1WVdkeVlXWnBZMkZRWVdkaGRHOXlaVDRLSUNBZ0lEd3ZjMjluWjJWMGRHOVFZV2RoZEc5eVpUNEtJQ0FnSUR4bGJuUmxRbVZ1WldacFkybGhjbWx2UGdvZ0lDQWdJQ0FnSUR4cFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOUNaVzVsWm1samFXRnlhVzgrQ2lBZ0lDQWdJQ0FnSUNBZ0lEeDBhWEJ2U1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBrYzhMM1JwY0c5SlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtDaUFnSUNBZ0lDQWdJQ0FnSUR4amIyUnBZMlZKWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI4K2VIaDRlSGg0UEM5amIyUnBZMlZKWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI4K0NpQWdJQ0FnSUNBZ1BDOXBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlDWlc1bFptbGphV0Z5YVc4K0NpQWdJQ0FnSUNBZ1BHUmxibTl0YVc1aGVtbHZibVZDWlc1bFptbGphV0Z5YVc4K2VIaDRlSGg0ZUR3dlpHVnViMjFwYm1GNmFXOXVaVUpsYm1WbWFXTnBZWEpwYno0S0lDQWdJRHd2Wlc1MFpVSmxibVZtYVdOcFlYSnBiejRLSUNBZ0lEeGtZWFJwVm1WeWMyRnRaVzUwYno0S0lDQWdJQ0FnSUNBOFpHRjBZVVZ6WldOMWVtbHZibVZRWVdkaGJXVnVkRzgrTWpBeU5DMHdOQzB4TUR3dlpHRjBZVVZ6WldOMWVtbHZibVZRWVdkaGJXVnVkRzgrQ2lBZ0lDQWdJQ0FnUEdsdGNHOXlkRzlVYjNSaGJHVkVZVlpsY25OaGNtVStPREF1TURBOEwybHRjRzl5ZEc5VWIzUmhiR1ZFWVZabGNuTmhjbVUrQ2lBZ0lDQWdJQ0FnUEhScGNHOVdaWEp6WVcxbGJuUnZQbEJQUEM5MGFYQnZWbVZ5YzJGdFpXNTBiejRLSUNBZ0lDQWdJQ0E4YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlZtVnljMkZ0Wlc1MGJ6NHdNVEF3TURBd01EQXdNREF3TURFNE5Ed3ZhV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52Vm1WeWMyRnRaVzUwYno0S0lDQWdJQ0FnSUNBOFkyOWthV05sUTI5dWRHVnpkRzlRWVdkaGJXVnVkRzgrZERBd01EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBeE9EUThMMk52WkdsalpVTnZiblJsYzNSdlVHRm5ZVzFsYm5SdlBnb2dJQ0FnSUNBZ0lEeG1hWEp0WVZKcFkyVjJkWFJoUGpBOEwyWnBjbTFoVW1salpYWjFkR0UrQ2lBZ0lDQWdJQ0FnUEdSaGRHbFRhVzVuYjJ4dlZtVnljMkZ0Wlc1MGJ6NEtJQ0FnSUNBZ0lDQWdJQ0FnUEdsdGNHOXlkRzlUYVc1bmIyeHZWbVZ5YzJGdFpXNTBiejQ0TUM0d01Ed3ZhVzF3YjNKMGIxTnBibWR2Ykc5V1pYSnpZVzFsYm5SdlBnb2dJQ0FnSUNBZ0lDQWdJQ0E4YVdKaGJrRmpZM0psWkdsMGJ6NUpWREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01ERThMMmxpWVc1QlkyTnlaV1JwZEc4K0NpQWdJQ0FnSUNBZ0lDQWdJRHhqWVhWellXeGxWbVZ5YzJGdFpXNTBiejU0ZUhoNGVIZzhMMk5oZFhOaGJHVldaWEp6WVcxbGJuUnZQZ29nSUNBZ0lDQWdJQ0FnSUNBOFpHRjBhVk53WldOcFptbGphVkpwYzJOdmMzTnBiMjVsUG5oNGVIaDRQQzlrWVhScFUzQmxZMmxtYVdOcFVtbHpZMjl6YzJsdmJtVStDaUFnSUNBZ0lDQWdQQzlrWVhScFUybHVaMjlzYjFabGNuTmhiV1Z1ZEc4K0NpQWdJQ0E4TDJSaGRHbFdaWEp6WVcxbGJuUnZQZ284TDFKUVZENEs8L3JwdD4KCQk8L25zNTpub2RvSW52aWFSUFQ+Cgk8L3NvYXA6Qm9keT4KPC9zb2FwOkVudmVsb3BlPg==',
];

$data_resp = [
    ':id' => 217,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 14:42:01.197',
    ':tipoevento' => 'nodoInviaRPT',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000184',
    ':ccp' => 't0000000000000000000000000000184',
    ':noticenumber' => '301000000000000184',
    ':creditorreferenceid' => '01000000000000184',
    ':paymenttoken' => 't0000000000000000000000000000184',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100197',
    ':sessionidoriginal' => 'sessionOriginal_cdInfoWisp',
    ':uniqueid' => 'T000217',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpwcHQ9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIiB4bWxuczpwcHRoZWFkPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIiB4bWxuczp0bnM9Imh0dHA6Ly9Ob2RvUGFnYW1lbnRpU1BDLnNwY29vcC5nb3YuaXQvc2Vydml6aS9QYWdhbWVudGlUZWxlbWF0aWNpUlBUIiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBwdDpub2RvSW52aWFSUFRSaXNwb3N0YT4KCQkJPGVzaXRvPk9LPC9lc2l0bz4KCQkJPHJlZGlyZWN0PjE8L3JlZGlyZWN0PgoJCQk8dXJsPmh0dHBzOi8vd2lzcDIucGFnb3BhLmdvdi5pdC93YWxsZXQvd2VsY29tZT9pZFNlc3Npb249eHh4eHh4PC91cmw+CgkJPC9wcHQ6bm9kb0ludmlhUlBUUmlzcG9zdGE+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg==',
];


Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);






$data_req = [
    ':id' => 218,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 14:43:00.197',
    ':tipoevento' => 'cdInfoWisp',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000184',
    ':ccp' => 't0000000000000000000000000000184',
    ':noticenumber' => '301000000000000184',
    ':creditorreferenceid' => '01000000000000184',
    ':paymenttoken' => 't0000000000000000000000000000184',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100198',
    ':sessionidoriginal' => 'sessionOriginal_cdInfoWisp',
    ':uniqueid' => 'T000218',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpwcHQ9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIiB4bWxuczpzb2FwZW52PSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyIgeG1sbnM6dG5zPSJodHRwOi8vUHVudG9BY2Nlc3NvQ0Quc3Bjb29wLmdvdi5pdCIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxwcHQ6Y2RJbmZvV2lzcD4KCQkJPGlkZW50aWZpY2F0aXZvRG9taW5pbz43Nzc3Nzc3Nzc3NzwvaWRlbnRpZmljYXRpdm9Eb21pbmlvPgoJCQk8aWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4wMTAwMDAwMDAwMDAwMDE4NDwvaWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4KCQkJPGNvZGljZUNvbnRlc3RvUGFnYW1lbnRvPnQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMTg0PC9jb2RpY2VDb250ZXN0b1BhZ2FtZW50bz4KCQkJPGlkUGFnYW1lbnRvPjEyMjJkZGU4LTUxM2QtNGFlNC04NjI3LWE3MjVlNTE3NzRmZTwvaWRQYWdhbWVudG8+CgkJPC9wcHQ6Y2RJbmZvV2lzcD4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+',
];

$data_resp = [
    ':id' => 219,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 14:43:01.197',
    ':tipoevento' => 'cdInfoWisp',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000184',
    ':ccp' => 't0000000000000000000000000000184',
    ':noticenumber' => '301000000000000184',
    ':creditorreferenceid' => '01000000000000184',
    ':paymenttoken' => 't0000000000000000000000000000184',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100198',
    ':sessionidoriginal' => 'sessionOriginal_cdInfoWisp',
    ':uniqueid' => 'T000219',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPHNvYXA6RW52ZWxvcGUgeG1sbnM6cHB0PSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyIgeG1sbnM6c29hcD0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnRucz0iaHR0cDovL1B1bnRvQWNjZXNzb0NELnNwY29vcC5nb3YuaXQiIHhtbG5zOndzdT0iaHR0cDovL2RvY3Mub2FzaXMtb3Blbi5vcmcvd3NzLzIwMDQvMDEvb2FzaXMtMjAwNDAxLXdzcy13c3NlY3VyaXR5LXV0aWxpdHktMS4wLnhzZCI+Cgk8c29hcDpCb2R5PgoJCTxwcHQ6Y2RJbmZvV2lzcFJlc3BvbnNlIHhtbG5zOnBwdD0iaHR0cDovL3dzLnBhZ2FtZW50aS50ZWxlbWF0aWNpLmdvdi8iPgoJCQk8ZXNpdG8+T0s8L2VzaXRvPgoJCTwvcHB0OmNkSW5mb1dpc3BSZXNwb25zZT4KCTwvc29hcDpCb2R5Pgo8L3NvYXA6RW52ZWxvcGU+',
];


Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);





$data_req = [
    ':id' => 220,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 14:44:00.197',
    ':tipoevento' => 'nodoChiediInformazioniPagamento',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '77777777777',
    ':iuv' => '',
    ':ccp' => '',
    ':noticenumber' => '',
    ':creditorreferenceid' => '',
    ':paymenttoken' => '',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100199',
    ':sessionidoriginal' => 'sessionOriginal_cdInfoWisp',
    ':uniqueid' => 'T000220',
    ':payload' => '',
];

$data_resp = [
    ':id' => 221,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 14:44:01.197',
    ':tipoevento' => 'nodoChiediInformazioniPagamento',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '77777777777',
    ':iuv' => '',
    ':ccp' => '',
    ':noticenumber' => '',
    ':creditorreferenceid' => '',
    ':paymenttoken' => '',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100199',
    ':sessionidoriginal' => 'sessionOriginal_cdInfoWisp',
    ':uniqueid' => 'T000221',
    ':payload' => 'ewogICAgIklCQU4iOiAiSVQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxIiwKICAgICJib2xsb0RpZ2l0YWxlIjogZmFsc2UsCiAgICAiY29kaWNlRmlzY2FsZSI6ICJYWFhYWFhYWFhYWFhYWFhYIiwKICAgICJkZXR0YWdsaSI6IFsKICAgICAgICB7CiAgICAgICAgICAgICJDQ1AiOiAidDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxODQiLAogICAgICAgICAgICAiSVVWIjogIjAxMDAwMDAwMDAwMDAwMTg0IiwKICAgICAgICAgICAgImNvZGljZVBhZ2F0b3JlIjogIlhYWFhYWFhYWFhYWFhYWFgiLAogICAgICAgICAgICAiZW50ZUJlbmVmaWNpYXJpbyI6ICJ4eHh4eCIsCiAgICAgICAgICAgICJpZERvbWluaW8iOiAiNzc3Nzc3Nzc3NzciLAogICAgICAgICAgICAiaW1wb3J0byI6IDgwLjAsCiAgICAgICAgICAgICJub21lUGFnYXRvcmUiOiAiWFhYWFhYWFhYWFhYWFhYWCIsCiAgICAgICAgICAgICJ0aXBvUGFnYXRvcmUiOiAiRiIKICAgICAgICB9CiAgICBdLAogICAgImltcG9ydG9Ub3RhbGUiOiA4MC4wLAogICAgIm9nZ2V0dG9QYWdhbWVudG8iOiAieHh4eHh4eCIsCiAgICAicmFnaW9uZVNvY2lhbGUiOiAieHh4eCIsCiAgICAidXJsUmVkaXJlY3RFQyI6ICJodHRwczovL2V4YW1wbGUuY29tIgp9',
];


Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);







$data_req = [
    ':id' => 222,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 14:45:00.197',
    ':tipoevento' => 'nodoInoltraEsitoPagamentoCarta',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000184',
    ':ccp' => 't0000000000000000000000000000184',
    ':noticenumber' => '301000000000000184',
    ':creditorreferenceid' => '01000000000000184',
    ':paymenttoken' => 't0000000000000000000000000000184',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100200',
    ':sessionidoriginal' => 'sessionOriginal_cdInfoWisp',
    ':uniqueid' => 'T000222',
    ':payload' => 'ewogICAgIklCQU4iOiAiSVQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxIiwKICAgICJib2xsb0RpZ2l0YWxlIjogZmFsc2UsCiAgICAiY29kaWNlRmlzY2FsZSI6ICJYWFhYWFhYWFhYWFhYWFhYIiwKICAgICJkZXR0YWdsaSI6IFsKICAgICAgICB7CiAgICAgICAgICAgICJDQ1AiOiAidDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxODQiLAogICAgICAgICAgICAiSVVWIjogIjAxMDAwMDAwMDAwMDAwMTg0IiwKICAgICAgICAgICAgImNvZGljZVBhZ2F0b3JlIjogIlhYWFhYWFhYWFhYWFhYWFgiLAogICAgICAgICAgICAiZW50ZUJlbmVmaWNpYXJpbyI6ICJ4eHh4eCIsCiAgICAgICAgICAgICJpZERvbWluaW8iOiAiNzc3Nzc3Nzc3NzciLAogICAgICAgICAgICAiaW1wb3J0byI6IDgwLjAsCiAgICAgICAgICAgICJub21lUGFnYXRvcmUiOiAiWFhYWFhYWFhYWFhYWFhYWCIsCiAgICAgICAgICAgICJ0aXBvUGFnYXRvcmUiOiAiRiIKICAgICAgICB9CiAgICBdLAogICAgImltcG9ydG9Ub3RhbGUiOiA4MC4wLAogICAgIm9nZ2V0dG9QYWdhbWVudG8iOiAieHh4eHh4eCIsCiAgICAicmFnaW9uZVNvY2lhbGUiOiAieHh4eCIsCiAgICAidXJsUmVkaXJlY3RFQyI6ICJodHRwczovL2V4YW1wbGUuY29tIgp9',
];

$data_resp = [
    ':id' => 223,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 14:46:01.197',
    ':tipoevento' => 'nodoInoltraEsitoPagamentoCarta',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000184',
    ':ccp' => 't0000000000000000000000000000184',
    ':noticenumber' => '301000000000000184',
    ':creditorreferenceid' => '01000000000000184',
    ':paymenttoken' => 't0000000000000000000000000000184',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100200',
    ':sessionidoriginal' => 'sessionOriginal_cdInfoWisp',
    ':uniqueid' => 'T000223',
    ':payload' => 'eyJlc2l0byI6Ik9LIn0=',
];


Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);









$data_req = [
    ':id' => 224,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 14:45:30.197',
    ':tipoevento' => 'pspInviaCarrelloRPTCarte',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000184',
    ':ccp' => 't0000000000000000000000000000184',
    ':noticenumber' => '301000000000000184',
    ':creditorreferenceid' => '01000000000000184',
    ':paymenttoken' => 't0000000000000000000000000000184',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100201',
    ':sessionidoriginal' => 'sessionOriginal_cdInfoWisp',
    ':uniqueid' => 'T000224',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpwYXlfaj0iaHR0cDovL3d3dy5jbmlwYS5nb3YuaXQvc2NoZW1hcy8yMDEwL1BhZ2FtZW50aS9BY2tfMV8wLyIgeG1sbnM6cHB0PSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnRucz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0IiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBwdDpwc3BJbnZpYUNhcnJlbGxvUlBUQ2FydGU+CgkJCTxpZGVudGlmaWNhdGl2b1BTUD5BR0lEXzAxPC9pZGVudGlmaWNhdGl2b1BTUD4KCQkJPGlkZW50aWZpY2F0aXZvSW50ZXJtZWRpYXJpb1BTUD44ODg4ODg4ODg4ODwvaWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUFNQPgoJCQk8aWRlbnRpZmljYXRpdm9DYW5hbGU+ODg4ODg4ODg4ODhfMDE8L2lkZW50aWZpY2F0aXZvQ2FuYWxlPgoJCQk8bW9kZWxsb1BhZ2FtZW50bz4xPC9tb2RlbGxvUGFnYW1lbnRvPgoJCQk8bGlzdGFSUFQ+CgkJCQk8ZWxlbWVudG9MaXN0YUNhcnJlbGxvUlBUPgoJCQkJCTxpZGVudGlmaWNhdGl2b0RvbWluaW8+Nzc3Nzc3Nzc3Nzc8L2lkZW50aWZpY2F0aXZvRG9taW5pbz4KCQkJCQk8aWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4wMTAwMDAwMDAwMDAwMDE4NDwvaWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4KCQkJCQk8Y29kaWNlQ29udGVzdG9QYWdhbWVudG8+dDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxODQ8L2NvZGljZUNvbnRlc3RvUGFnYW1lbnRvPgoJCQkJCTxycHQ+UEZKUVZDQjRiV3h1Y3owaWFIUjBjRG92TDNkM2R5NWthV2RwZEhCaExtZHZkaTVwZEM5elkyaGxiV0Z6THpJd01URXZVR0ZuWVcxbGJuUnBMeUkrQ2lBZ0lDQThkbVZ5YzJsdmJtVlBaMmRsZEhSdlBqWXVNaTR3UEM5MlpYSnphVzl1WlU5bloyVjBkRzgrQ2lBZ0lDQThaRzl0YVc1cGJ6NEtJQ0FnSUNBZ0lDQThhV1JsYm5ScFptbGpZWFJwZG05RWIyMXBibWx2UGpjM056YzNOemMzTnpjM1BDOXBaR1Z1ZEdsbWFXTmhkR2wyYjBSdmJXbHVhVzgrQ2lBZ0lDQWdJQ0FnUEdsa1pXNTBhV1pwWTJGMGFYWnZVM1JoZW1sdmJtVlNhV05vYVdWa1pXNTBaVDQzTnpjM056YzNOemMzTjE4d01Ud3ZhV1JsYm5ScFptbGpZWFJwZG05VGRHRjZhVzl1WlZKcFkyaHBaV1JsYm5SbFBnb2dJQ0FnUEM5a2IyMXBibWx2UGdvZ0lDQWdQR2xrWlc1MGFXWnBZMkYwYVhadlRXVnpjMkZuWjJsdlVtbGphR2xsYzNSaFBtWXpaV016Tm1SaU56aGtZVFEwTkdaaFlqUmpaakJtT1RBNE9XSm1aRGt3UEM5cFpHVnVkR2xtYVdOaGRHbDJiMDFsYzNOaFoyZHBiMUpwWTJocFpYTjBZVDRLSUNBZ0lEeGtZWFJoVDNKaFRXVnpjMkZuWjJsdlVtbGphR2xsYzNSaFBqSXdNalF0TURRdE1EbFVNakU2TlRNNk16WThMMlJoZEdGUGNtRk5aWE56WVdkbmFXOVNhV05vYVdWemRHRStDaUFnSUNBOFlYVjBaVzUwYVdOaGVtbHZibVZUYjJkblpYUjBiejU0ZUhnOEwyRjFkR1Z1ZEdsallYcHBiMjVsVTI5bloyVjBkRzgrQ2lBZ0lDQThjMjluWjJWMGRHOVFZV2RoZEc5eVpUNEtJQ0FnSUNBZ0lDQThhV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52VUdGbllYUnZjbVUrQ2lBZ0lDQWdJQ0FnSUNBZ0lEeDBhWEJ2U1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBuZzhMM1JwY0c5SlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtDaUFnSUNBZ0lDQWdJQ0FnSUR4amIyUnBZMlZKWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI4K2VIaDRlSGg0ZUR3dlkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBnb2dJQ0FnSUNBZ0lEd3ZhV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52VUdGbllYUnZjbVUrQ2lBZ0lDQWdJQ0FnUEdGdVlXZHlZV1pwWTJGUVlXZGhkRzl5WlQ1NGVIaDRlRHd2WVc1aFozSmhabWxqWVZCaFoyRjBiM0psUGdvZ0lDQWdJQ0FnSUR4dVlYcHBiMjVsVUdGbllYUnZjbVUrU1ZROEwyNWhlbWx2Ym1WUVlXZGhkRzl5WlQ0S0lDQWdJQ0FnSUNBOFpTMXRZV2xzVUdGbllYUnZjbVUrZUhoNGVIaEFlSGg0ZUM1amIyMDhMMlV0YldGcGJGQmhaMkYwYjNKbFBnb2dJQ0FnUEM5emIyZG5aWFIwYjFCaFoyRjBiM0psUGdvZ0lDQWdQR1Z1ZEdWQ1pXNWxabWxqYVdGeWFXOCtDaUFnSUNBZ0lDQWdQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjBKbGJtVm1hV05wWVhKcGJ6NEtJQ0FnSUNBZ0lDQWdJQ0FnUEhScGNHOUpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrUnp3dmRHbHdiMGxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno0S0lDQWdJQ0FnSUNBZ0lDQWdQR052WkdsalpVbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejU0ZUhoNGVIZzhMMk52WkdsalpVbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejRLSUNBZ0lDQWdJQ0E4TDJsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amIwSmxibVZtYVdOcFlYSnBiejRLSUNBZ0lDQWdJQ0E4WkdWdWIyMXBibUY2YVc5dVpVSmxibVZtYVdOcFlYSnBiejU0ZUhoNGVEd3ZaR1Z1YjIxcGJtRjZhVzl1WlVKbGJtVm1hV05wWVhKcGJ6NEtJQ0FnSUR3dlpXNTBaVUpsYm1WbWFXTnBZWEpwYno0S0lDQWdJRHhrWVhScFZtVnljMkZ0Wlc1MGJ6NEtJQ0FnSUNBZ0lDQThaR0YwWVVWelpXTjFlbWx2Ym1WUVlXZGhiV1Z1ZEc4K01qQXlOQzB3TkMwd09Ud3ZaR0YwWVVWelpXTjFlbWx2Ym1WUVlXZGhiV1Z1ZEc4K0NpQWdJQ0FnSUNBZ1BHbHRjRzl5ZEc5VWIzUmhiR1ZFWVZabGNuTmhjbVUrT0RBdU1EQThMMmx0Y0c5eWRHOVViM1JoYkdWRVlWWmxjbk5oY21VK0NpQWdJQ0FnSUNBZ1BIUnBjRzlXWlhKellXMWxiblJ2UGtOUVBDOTBhWEJ2Vm1WeWMyRnRaVzUwYno0S0lDQWdJQ0FnSUNBOGFXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZWbVZ5YzJGdFpXNTBiejR3TVRBd01EQXdNREF3TURBd01ERTRORHd2YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlZtVnljMkZ0Wlc1MGJ6NEtJQ0FnSUNBZ0lDQThZMjlrYVdObFEyOXVkR1Z6ZEc5UVlXZGhiV1Z1ZEc4K2REQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01EQXhPRFE4TDJOdlpHbGpaVU52Ym5SbGMzUnZVR0ZuWVcxbGJuUnZQZ29nSUNBZ0lDQWdJRHhtYVhKdFlWSnBZMlYyZFhSaFBqQThMMlpwY20xaFVtbGpaWFoxZEdFK0NpQWdJQ0FnSUNBZ1BHUmhkR2xUYVc1bmIyeHZWbVZ5YzJGdFpXNTBiejRLSUNBZ0lDQWdJQ0FnSUNBZ1BHbHRjRzl5ZEc5VGFXNW5iMnh2Vm1WeWMyRnRaVzUwYno0NE1DNHdNRHd2YVcxd2IzSjBiMU5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29nSUNBZ0lDQWdJQ0FnSUNBOGFXSmhia0ZqWTNKbFpHbDBiejVKVkRFNFZUQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREU4TDJsaVlXNUJZMk55WldScGRHOCtDaUFnSUNBZ0lDQWdJQ0FnSUR4allYVnpZV3hsVm1WeWMyRnRaVzUwYno1NGVIaDRlSGg0UEM5allYVnpZV3hsVm1WeWMyRnRaVzUwYno0S0lDQWdJQ0FnSUNBZ0lDQWdQR1JoZEdsVGNHVmphV1pwWTJsU2FYTmpiM056YVc5dVpUNTRlSGg0ZUhoNFBDOWtZWFJwVTNCbFkybG1hV05wVW1selkyOXpjMmx2Ym1VK0NpQWdJQ0FnSUNBZ1BDOWtZWFJwVTJsdVoyOXNiMVpsY25OaGJXVnVkRzgrQ2lBZ0lDQThMMlJoZEdsV1pYSnpZVzFsYm5SdlBnbzhMMUpRVkQ0PTwvcnB0PgoJCQkJPC9lbGVtZW50b0xpc3RhQ2FycmVsbG9SUFQ+CgkJCTwvbGlzdGFSUFQ+CgkJCTxycm4+MDAwMDAwMDAwMDUxPC9ycm4+CgkJCTxlc2l0b1RyYW5zYXppb25lQ2FydGE+MDA8L2VzaXRvVHJhbnNhemlvbmVDYXJ0YT4KCQkJPGltcG9ydG9Ub3RhbGVQYWdhdG8+ODAuMDA8L2ltcG9ydG9Ub3RhbGVQYWdhdG8+CgkJCTx0aW1lc3RhbXBPcGVyYXppb25lPjIwMjQtMDQtMTBUMjE6MTQ6NDguOTE0KzAyOjAwPC90aW1lc3RhbXBPcGVyYXppb25lPgoJCQk8Y29kaWNlQXV0b3JpenphdGl2bz4wMDAwMDM8L2NvZGljZUF1dG9yaXp6YXRpdm8+CgkJPC9wcHQ6cHNwSW52aWFDYXJyZWxsb1JQVENhcnRlPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4=',
];

$data_resp = [
    ':id' => 225,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 14:45:40.197',
    ':tipoevento' => 'pspInviaCarrelloRPTCarte',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000184',
    ':ccp' => 't0000000000000000000000000000184',
    ':noticenumber' => '301000000000000184',
    ':creditorreferenceid' => '01000000000000184',
    ':paymenttoken' => 't0000000000000000000000000000184',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100201',
    ':sessionidoriginal' => 'sessionOriginal_cdInfoWisp',
    ':uniqueid' => 'T000225',
    ':payload' => 'PD94bWwgdmVyc2lvbj0nMS4wJyBlbmNvZGluZz0nVVRGLTgnPz4KPHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPgoJPHNvYXBlbnY6Qm9keT4KCQk8bnMyOnBzcEludmlhQ2FycmVsbG9SUFRDYXJ0ZVJlc3BvbnNlIHhtbG5zOm5zMj0iaHR0cDovL3dzLnBhZ2FtZW50aS50ZWxlbWF0aWNpLmdvdi8iPgoJCQk8cHNwSW52aWFDYXJyZWxsb1JQVENhcnRlUmVzcG9uc2UgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSIgeHNpOnR5cGU9Im5zMjplc2l0b1BzcEludmlhQ2FycmVsbG9SUFQiPgoJCQkJPGVzaXRvQ29tcGxlc3Npdm9PcGVyYXppb25lPk9LPC9lc2l0b0NvbXBsZXNzaXZvT3BlcmF6aW9uZT4KCQkJCTxpZGVudGlmaWNhdGl2b0NhcnJlbGxvPnh4eHh4eHh4eHh4eHg8L2lkZW50aWZpY2F0aXZvQ2FycmVsbG8+CgkJCQk8cGFyYW1ldHJpUGFnYW1lbnRvSW1tZWRpYXRvPmlkQnJ1Y2lhdHVyYT14eHcyMjwvcGFyYW1ldHJpUGFnYW1lbnRvSW1tZWRpYXRvPgoJCQk8L3BzcEludmlhQ2FycmVsbG9SUFRDYXJ0ZVJlc3BvbnNlPgoJCTwvbnMyOnBzcEludmlhQ2FycmVsbG9SUFRDYXJ0ZVJlc3BvbnNlPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4=',
];


Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);







$data_req = [
    ':id' => 226,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 14:47:00.197',
    ':tipoevento' => 'nodoInviaRT',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000184',
    ':ccp' => 't0000000000000000000000000000184',
    ':noticenumber' => '301000000000000184',
    ':creditorreferenceid' => '01000000000000184',
    ':paymenttoken' => 't0000000000000000000000000000184',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100202',
    ':sessionidoriginal' => 'sessionOriginal_cdInfoWisp',
    ':uniqueid' => 'T000226',
    ':payload' => 'PHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPgoJPHNvYXBlbnY6Qm9keT4KCQk8bnMxOm5vZG9JbnZpYVJUIHhtbG5zOm5zMT0iaHR0cDovL3dzLnBhZ2FtZW50aS50ZWxlbWF0aWNpLmdvdi8iPgoJCQk8aWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUFNQPjg4ODg4ODg4ODg4PC9pZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QU1A+CgkJCTxpZGVudGlmaWNhdGl2b0NhbmFsZT44ODg4ODg4ODg4OF8wMTwvaWRlbnRpZmljYXRpdm9DYW5hbGU+CgkJCTxwYXNzd29yZD5QTEFDRUhPTERFUjwvcGFzc3dvcmQ+CgkJCTxpZGVudGlmaWNhdGl2b1BTUD5BR0lEXzAxPC9pZGVudGlmaWNhdGl2b1BTUD4KCQkJPGlkZW50aWZpY2F0aXZvRG9taW5pbz43Nzc3Nzc3Nzc3NzwvaWRlbnRpZmljYXRpdm9Eb21pbmlvPgoJCQk8aWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4wMTAwMDAwMDAwMDAwMDE4NDwvaWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4KCQkJPGNvZGljZUNvbnRlc3RvUGFnYW1lbnRvPnQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMTg0PC9jb2RpY2VDb250ZXN0b1BhZ2FtZW50bz4KCQkJPHRpcG9GaXJtYS8+CgkJCTxydD5QRDk0Yld3Z2RtVnljMmx2YmowaU1TNHdJaUJsYm1OdlpHbHVaejBpVlZSR0xUZ2lQejRLUEhCaGVWOXBPbEpVSUhodGJHNXpPbkJoZVY5cFBTSm9kSFJ3T2k4dmQzZDNMbVJwWjJsMGNHRXVaMjkyTG1sMEwzTmphR1Z0WVhNdk1qQXhNUzlRWVdkaGJXVnVkR2t2SWlCNGJXeHVjenA0YzJrOUltaDBkSEE2THk5M2QzY3Vkek11YjNKbkx6SXdNREV2V0UxTVUyTm9aVzFoTFdsdWMzUmhibU5sSWlCNGMyazZjMk5vWlcxaFRHOWpZWFJwYjI0OUlpOXZjSFF2Y0hOd1lYaGxjSFJoTDNKbGMyOTFjbU5sY3k5UVlXZEpibVpmVWxCVVgxSlVYelpmTWw4d0xuaHpaQ0krQ2drOGNHRjVYMms2ZG1WeWMybHZibVZQWjJkbGRIUnZQall1TWp3dmNHRjVYMms2ZG1WeWMybHZibVZQWjJkbGRIUnZQZ29KUEhCaGVWOXBPbVJ2YldsdWFXOCtDZ2tKUEhCaGVWOXBPbWxrWlc1MGFXWnBZMkYwYVhadlJHOXRhVzVwYno0M056YzNOemMzTnpjM056d3ZjR0Y1WDJrNmFXUmxiblJwWm1sallYUnBkbTlFYjIxcGJtbHZQZ29KUEM5d1lYbGZhVHBrYjIxcGJtbHZQZ29KUEhCaGVWOXBPbWxrWlc1MGFXWnBZMkYwYVhadlRXVnpjMkZuWjJsdlVtbGpaWFoxZEdFK1lXUnpZWEl6TkdWa1pXUnpaSE5oUEM5d1lYbGZhVHBwWkdWdWRHbG1hV05oZEdsMmIwMWxjM05oWjJkcGIxSnBZMlYyZFhSaFBnb0pQSEJoZVY5cE9tUmhkR0ZQY21GTlpYTnpZV2RuYVc5U2FXTmxkblYwWVQ0eU1ESTBMVEEwTFRFMlZESXpPalExT2pBMlBDOXdZWGxmYVRwa1lYUmhUM0poVFdWemMyRm5aMmx2VW1salpYWjFkR0UrQ2drOGNHRjVYMms2Y21sbVpYSnBiV1Z1ZEc5TlpYTnpZV2RuYVc5U2FXTm9hV1Z6ZEdFK2MyUnpaR0U4TDNCaGVWOXBPbkpwWm1WeWFXMWxiblJ2VFdWemMyRm5aMmx2VW1samFHbGxjM1JoUGdvSlBIQmhlVjlwT25KcFptVnlhVzFsYm5SdlJHRjBZVkpwWTJocFpYTjBZVDR5TURJMExUQTBMVEUyUEM5d1lYbGZhVHB5YVdabGNtbHRaVzUwYjBSaGRHRlNhV05vYVdWemRHRStDZ2s4Y0dGNVgyazZhWE4wYVhSMWRHOUJkSFJsYzNSaGJuUmxQZ29KQ1R4d1lYbGZhVHBwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5QmRIUmxjM1JoYm5SbFBnb0pDUWs4Y0dGNVgyazZkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NUNQQzl3WVhsZmFUcDBhWEJ2U1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBnb0pDUWs4Y0dGNVgyazZZMjlrYVdObFNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQa0ZIU1VSZk1ERThMM0JoZVY5cE9tTnZaR2xqWlVsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NEtDUWs4TDNCaGVWOXBPbWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjBGMGRHVnpkR0Z1ZEdVK0Nna0pQSEJoZVY5cE9tUmxibTl0YVc1aGVtbHZibVZCZEhSbGMzUmhiblJsUG5oNGVIaDRlSGg0UEM5d1lYbGZhVHBrWlc1dmJXbHVZWHBwYjI1bFFYUjBaWE4wWVc1MFpUNEtDVHd2Y0dGNVgyazZhWE4wYVhSMWRHOUJkSFJsYzNSaGJuUmxQZ29KUEhCaGVWOXBPbVZ1ZEdWQ1pXNWxabWxqYVdGeWFXOCtDZ2tKUEhCaGVWOXBPbWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjBKbGJtVm1hV05wWVhKcGJ6NEtDUWtKUEhCaGVWOXBPblJwY0c5SlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtSend2Y0dGNVgyazZkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NEtDUWtKUEhCaGVWOXBPbU52WkdsalpVbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejQzTnpjM056YzNOemMzTnp3dmNHRjVYMms2WTI5a2FXTmxTV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52UGdvSkNUd3ZjR0Y1WDJrNmFXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZRbVZ1WldacFkybGhjbWx2UGdvSkNUeHdZWGxmYVRwa1pXNXZiV2x1WVhwcGIyNWxRbVZ1WldacFkybGhjbWx2UG5oNGVIZzhMM0JoZVY5cE9tUmxibTl0YVc1aGVtbHZibVZDWlc1bFptbGphV0Z5YVc4K0NnazhMM0JoZVY5cE9tVnVkR1ZDWlc1bFptbGphV0Z5YVc4K0NnazhjR0Y1WDJrNmMyOW5aMlYwZEc5V1pYSnpZVzUwWlQ0S0NRazhjR0Y1WDJrNmFXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZWbVZ5YzJGdWRHVStDZ2tKQ1R4d1lYbGZhVHAwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQa1k4TDNCaGVWOXBPblJwY0c5SlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtDZ2tKQ1R4d1lYbGZhVHBqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrZUhoNGVIaDRQQzl3WVhsZmFUcGpiMlJwWTJWSlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtDZ2tKUEM5d1lYbGZhVHBwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5V1pYSnpZVzUwWlQ0S0NRazhjR0Y1WDJrNllXNWhaM0poWm1sallWWmxjbk5oYm5SbFBuaDRlSGg0UEM5d1lYbGZhVHBoYm1GbmNtRm1hV05oVm1WeWMyRnVkR1UrQ2drOEwzQmhlVjlwT25OdloyZGxkSFJ2Vm1WeWMyRnVkR1UrQ2drOGNHRjVYMms2YzI5bloyVjBkRzlRWVdkaGRHOXlaVDRLQ1FrOGNHRjVYMms2YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlVHRm5ZWFJ2Y21VK0Nna0pDVHh3WVhsZmFUcDBhWEJ2U1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBrWThMM0JoZVY5cE9uUnBjRzlKWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI4K0Nna0pDVHh3WVhsZmFUcGpiMlJwWTJWSlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtlSGg0ZUhnOEwzQmhlVjlwT21OdlpHbGpaVWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno0S0NRazhMM0JoZVY5cE9tbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiMUJoWjJGMGIzSmxQZ29KQ1R4d1lYbGZhVHBoYm1GbmNtRm1hV05oVUdGbllYUnZjbVUrZUhoNGVIaDRQQzl3WVhsZmFUcGhibUZuY21GbWFXTmhVR0ZuWVhSdmNtVStDZ2s4TDNCaGVWOXBPbk52WjJkbGRIUnZVR0ZuWVhSdmNtVStDZ2s4Y0dGNVgyazZaR0YwYVZCaFoyRnRaVzUwYno0S0NRazhjR0Y1WDJrNlkyOWthV05sUlhOcGRHOVFZV2RoYldWdWRHOCtNRHd2Y0dGNVgyazZZMjlrYVdObFJYTnBkRzlRWVdkaGJXVnVkRzgrQ2drSlBIQmhlVjlwT21sdGNHOXlkRzlVYjNSaGJHVlFZV2RoZEc4K09EQXVNREE4TDNCaGVWOXBPbWx0Y0c5eWRHOVViM1JoYkdWUVlXZGhkRzgrQ2drSlBIQmhlVjlwT21sa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amIxWmxjbk5oYldWdWRHOCtNREV3TURBd01EQXdNREF3TURBeE9EUThMM0JoZVY5cE9tbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiMVpsY25OaGJXVnVkRzgrQ2drSlBIQmhlVjlwT2tOdlpHbGpaVU52Ym5SbGMzUnZVR0ZuWVcxbGJuUnZQblF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TVRnMFBDOXdZWGxmYVRwRGIyUnBZMlZEYjI1MFpYTjBiMUJoWjJGdFpXNTBiejRLQ1FrOGNHRjVYMms2WkdGMGFWTnBibWR2Ykc5UVlXZGhiV1Z1ZEc4K0Nna0pDVHh3WVhsZmFUcHphVzVuYjJ4dlNXMXdiM0owYjFCaFoyRjBiejQ0TUM0d01Ed3ZjR0Y1WDJrNmMybHVaMjlzYjBsdGNHOXlkRzlRWVdkaGRHOCtDZ2tKQ1R4d1lYbGZhVHBsYzJsMGIxTnBibWR2Ykc5UVlXZGhiV1Z1ZEc4K1VFRkhRVlJCUEM5d1lYbGZhVHBsYzJsMGIxTnBibWR2Ykc5UVlXZGhiV1Z1ZEc4K0Nna0pDVHh3WVhsZmFUcGtZWFJoUlhOcGRHOVRhVzVuYjJ4dlVHRm5ZVzFsYm5SdlBqSXdNalF0TURRdE1UWThMM0JoZVY5cE9tUmhkR0ZGYzJsMGIxTnBibWR2Ykc5UVlXZGhiV1Z1ZEc4K0Nna0pDVHh3WVhsZmFUcHBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlTYVhOamIzTnphVzl1WlQ0d01ERThMM0JoZVY5cE9tbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiMUpwYzJOdmMzTnBiMjVsUGdvSkNRazhjR0Y1WDJrNlkyRjFjMkZzWlZabGNuTmhiV1Z1ZEc4K2VIaDRlSGg0ZUR3dmNHRjVYMms2WTJGMWMyRnNaVlpsY25OaGJXVnVkRzgrQ2drSkNUeHdZWGxmYVRwa1lYUnBVM0JsWTJsbWFXTnBVbWx6WTI5emMybHZibVUrZUhoNGVIaDRQQzl3WVhsZmFUcGtZWFJwVTNCbFkybG1hV05wVW1selkyOXpjMmx2Ym1VK0Nna0pQQzl3WVhsZmFUcGtZWFJwVTJsdVoyOXNiMUJoWjJGdFpXNTBiejRLQ1R3dmNHRjVYMms2WkdGMGFWQmhaMkZ0Wlc1MGJ6NEtQQzl3WVhsZmFUcFNWRDQ9PC9ydD4KCQk8L25zMTpub2RvSW52aWFSVD4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+',
];

$data_resp = [
    ':id' => 227,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 14:47:30.197',
    ':tipoevento' => 'nodoInviaRT',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000184',
    ':ccp' => 't0000000000000000000000000000184',
    ':noticenumber' => '301000000000000184',
    ':creditorreferenceid' => '01000000000000184',
    ':paymenttoken' => 't0000000000000000000000000000184',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100202',
    ':sessionidoriginal' => 'sessionOriginal_cdInfoWisp',
    ':uniqueid' => 'T000227',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpiYz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0L0JhckNvZGVfR1MxXzEyOF9Nb2RpZmllZCIgeG1sbnM6cGF5X2k9Imh0dHA6Ly93d3cuZGlnaXRwYS5nb3YuaXQvc2NoZW1hcy8yMDExL1BhZ2FtZW50aS8iIHhtbG5zOnBwdD0iaHR0cDovL3dzLnBhZ2FtZW50aS50ZWxlbWF0aWNpLmdvdi8iIHhtbG5zOnFyYz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0L1FyQ29kZSIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnRucz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0L3NlcnZpemkvUGFnYW1lbnRpVGVsZW1hdGljaVBzcE5vZG8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxwcHQ6bm9kb0ludmlhUlRSaXNwb3N0YT4KCQkJPG5vZG9JbnZpYVJUUmlzcG9zdGE+CgkJCQk8ZXNpdG8+T0s8L2VzaXRvPgoJCQk8L25vZG9JbnZpYVJUUmlzcG9zdGE+CgkJPC9wcHQ6bm9kb0ludmlhUlRSaXNwb3N0YT4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+',
];


Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);














$data_req = [
    ':id' => 228,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 14:47:01.197',
    ':tipoevento' => 'paaInviaRT',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000184',
    ':ccp' => 't0000000000000000000000000000184',
    ':noticenumber' => '301000000000000184',
    ':creditorreferenceid' => '01000000000000184',
    ':paymenttoken' => 't0000000000000000000000000000184',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100203',
    ':sessionidoriginal' => 'sessionOriginal_cdInfoWisp',
    ':uniqueid' => 'T000228',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpwcHQ9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIiB4bWxuczpwcHRoZWFkPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIiB4bWxuczp0bnM9Imh0dHA6Ly9Ob2RvUGFnYW1lbnRpU1BDLnNwY29vcC5nb3YuaXQvc2Vydml6aS9QYWdhbWVudGlUZWxlbWF0aWNpUlQiIHhtbG5zOnhzaT0iaHR0cDovL3d3dy53My5vcmcvMjAwMS9YTUxTY2hlbWEtaW5zdGFuY2UiPgogICAgPHNvYXBlbnY6SGVhZGVyPgogICAgICAgIDxwcHRoZWFkOmludGVzdGF6aW9uZVBQVD4KICAgICAgICAgICAgPGlkZW50aWZpY2F0aXZvSW50ZXJtZWRpYXJpb1BBPjc3Nzc3Nzc3Nzc3PC9pZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QQT4KICAgICAgICAgICAgPGlkZW50aWZpY2F0aXZvU3RhemlvbmVJbnRlcm1lZGlhcmlvUEE+Nzc3Nzc3Nzc3NzdfMDE8L2lkZW50aWZpY2F0aXZvU3RhemlvbmVJbnRlcm1lZGlhcmlvUEE+CiAgICAgICAgICAgIDxpZGVudGlmaWNhdGl2b0RvbWluaW8+Nzc3Nzc3Nzc3Nzc8L2lkZW50aWZpY2F0aXZvRG9taW5pbz4KICAgICAgICAgICAgPGlkZW50aWZpY2F0aXZvVW5pdm9jb1ZlcnNhbWVudG8+MDEwMDAwMDAwMDAwMDAxODQ8L2lkZW50aWZpY2F0aXZvVW5pdm9jb1ZlcnNhbWVudG8+CiAgICAgICAgICAgIDxjb2RpY2VDb250ZXN0b1BhZ2FtZW50bz50MDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDE4NDwvY29kaWNlQ29udGVzdG9QYWdhbWVudG8+CiAgICAgICAgPC9wcHRoZWFkOmludGVzdGF6aW9uZVBQVD4KICAgIDwvc29hcGVudjpIZWFkZXI+CiAgICA8c29hcGVudjpCb2R5PgogICAgICAgIDxwcHQ6cGFhSW52aWFSVD4KICAgICAgICAgICAgPHRpcG9GaXJtYS8+CiAgICAgICAgICAgIDxydD5QRDk0Yld3Z2RtVnljMmx2YmowaU1TNHdJaUJsYm1OdlpHbHVaejBpVlZSR0xUZ2lQejRLUEhCaGVWOXBPbEpVSUhodGJHNXpPbkJoZVY5cFBTSm9kSFJ3T2k4dmQzZDNMbVJwWjJsMGNHRXVaMjkyTG1sMEwzTmphR1Z0WVhNdk1qQXhNUzlRWVdkaGJXVnVkR2t2SWlCNGJXeHVjenA0YzJrOUltaDBkSEE2THk5M2QzY3Vkek11YjNKbkx6SXdNREV2V0UxTVUyTm9aVzFoTFdsdWMzUmhibU5sSWlCNGMyazZjMk5vWlcxaFRHOWpZWFJwYjI0OUlpOXZjSFF2Y0hOd1lYaGxjSFJoTDNKbGMyOTFjbU5sY3k5UVlXZEpibVpmVWxCVVgxSlVYelpmTWw4d0xuaHpaQ0krQ2drOGNHRjVYMms2ZG1WeWMybHZibVZQWjJkbGRIUnZQakV1TUR3dmNHRjVYMms2ZG1WeWMybHZibVZQWjJkbGRIUnZQZ29KUEhCaGVWOXBPbVJ2YldsdWFXOCtDZ2tKUEhCaGVWOXBPbWxrWlc1MGFXWnBZMkYwYVhadlJHOXRhVzVwYno0M056YzNOemMzTnpjM056d3ZjR0Y1WDJrNmFXUmxiblJwWm1sallYUnBkbTlFYjIxcGJtbHZQZ29KUEM5d1lYbGZhVHBrYjIxcGJtbHZQZ29KUEhCaGVWOXBPbWxrWlc1MGFXWnBZMkYwYVhadlRXVnpjMkZuWjJsdlVtbGpaWFoxZEdFK2VIaDRlSGg0ZUR3dmNHRjVYMms2YVdSbGJuUnBabWxqWVhScGRtOU5aWE56WVdkbmFXOVNhV05sZG5WMFlUNEtDVHh3WVhsZmFUcGtZWFJoVDNKaFRXVnpjMkZuWjJsdlVtbGpaWFoxZEdFK01qQXlOQzB3TkMweE9WUXhOVG93T0Rvd09Ud3ZjR0Y1WDJrNlpHRjBZVTl5WVUxbGMzTmhaMmRwYjFKcFkyVjJkWFJoUGdvSlBIQmhlVjlwT25KcFptVnlhVzFsYm5SdlRXVnpjMkZuWjJsdlVtbGphR2xsYzNSaFBuaDRlSGg0TFhoNE9IaDRlRHd2Y0dGNVgyazZjbWxtWlhKcGJXVnVkRzlOWlhOellXZG5hVzlTYVdOb2FXVnpkR0UrQ2drOGNHRjVYMms2Y21sbVpYSnBiV1Z1ZEc5RVlYUmhVbWxqYUdsbGMzUmhQakl3TWpRdE1EUXRNVGs4TDNCaGVWOXBPbkpwWm1WeWFXMWxiblJ2UkdGMFlWSnBZMmhwWlhOMFlUNEtDVHh3WVhsZmFUcHBjM1JwZEhWMGIwRjBkR1Z6ZEdGdWRHVStDZ2tKUEhCaGVWOXBPbWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjBGMGRHVnpkR0Z1ZEdVK0Nna0pDVHh3WVhsZmFUcDBhWEJ2U1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBrSThMM0JoZVY5cE9uUnBjRzlKWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI4K0Nna0pDVHh3WVhsZmFUcGpiMlJwWTJWSlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtPRGc0T0RnNE9EZzRPRGc4TDNCaGVWOXBPbU52WkdsalpVbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejRLQ1FrOEwzQmhlVjlwT21sa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amIwRjBkR1Z6ZEdGdWRHVStDZ2tKUEhCaGVWOXBPbVJsYm05dGFXNWhlbWx2Ym1WQmRIUmxjM1JoYm5SbFBuaDRlSGg0UEM5d1lYbGZhVHBrWlc1dmJXbHVZWHBwYjI1bFFYUjBaWE4wWVc1MFpUNEtDVHd2Y0dGNVgyazZhWE4wYVhSMWRHOUJkSFJsYzNSaGJuUmxQZ29KUEhCaGVWOXBPbVZ1ZEdWQ1pXNWxabWxqYVdGeWFXOCtDZ2tKUEhCaGVWOXBPbWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjBKbGJtVm1hV05wWVhKcGJ6NEtDUWtKUEhCaGVWOXBPblJwY0c5SlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtSend2Y0dGNVgyazZkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NEtDUWtKUEhCaGVWOXBPbU52WkdsalpVbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejQzTnpjM056YzNOemMzTnp3dmNHRjVYMms2WTI5a2FXTmxTV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52UGdvSkNUd3ZjR0Y1WDJrNmFXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZRbVZ1WldacFkybGhjbWx2UGdvSkNUeHdZWGxmYVRwa1pXNXZiV2x1WVhwcGIyNWxRbVZ1WldacFkybGhjbWx2UG5oNGVIaDRQQzl3WVhsZmFUcGtaVzV2YldsdVlYcHBiMjVsUW1WdVpXWnBZMmxoY21sdlBnb0pDVHh3WVhsZmFUcGpiMlJwWTJWVmJtbDBUM0JsY2tKbGJtVm1hV05wWVhKcGJ6NTRlRHd2Y0dGNVgyazZZMjlrYVdObFZXNXBkRTl3WlhKQ1pXNWxabWxqYVdGeWFXOCtDZ2tKUEhCaGVWOXBPbVJsYm05dFZXNXBkRTl3WlhKQ1pXNWxabWxqYVdGeWFXOCtlSGg0ZUhnOEwzQmhlVjlwT21SbGJtOXRWVzVwZEU5d1pYSkNaVzVsWm1samFXRnlhVzgrQ2drSlBIQmhlVjlwT21sdVpHbHlhWHA2YjBKbGJtVm1hV05wWVhKcGJ6NTRlSGg0UEM5d1lYbGZhVHBwYm1ScGNtbDZlbTlDWlc1bFptbGphV0Z5YVc4K0Nna0pQSEJoZVY5cE9tTnBkbWxqYjBKbGJtVm1hV05wWVhKcGJ6NTRlSGc4TDNCaGVWOXBPbU5wZG1samIwSmxibVZtYVdOcFlYSnBiejRLQ1FrOGNHRjVYMms2WTJGd1FtVnVaV1pwWTJsaGNtbHZQbmg0ZUR3dmNHRjVYMms2WTJGd1FtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4d1lYbGZhVHBzYjJOaGJHbDBZVUpsYm1WbWFXTnBZWEpwYno1NGVIZzhMM0JoZVY5cE9teHZZMkZzYVhSaFFtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4d1lYbGZhVHB3Y205MmFXNWphV0ZDWlc1bFptbGphV0Z5YVc4K2VIZzhMM0JoZVY5cE9uQnliM1pwYm1OcFlVSmxibVZtYVdOcFlYSnBiejRLQ1FrOGNHRjVYMms2Ym1GNmFXOXVaVUpsYm1WbWFXTnBZWEpwYno1NGVIaDRQQzl3WVhsZmFUcHVZWHBwYjI1bFFtVnVaV1pwWTJsaGNtbHZQZ29KUEM5d1lYbGZhVHBsYm5SbFFtVnVaV1pwWTJsaGNtbHZQZ29KUEhCaGVWOXBPbk52WjJkbGRIUnZWbVZ5YzJGdWRHVStDZ2tKUEhCaGVWOXBPbWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFabGNuTmhiblJsUGdvSkNRazhjR0Y1WDJrNmRHbHdiMGxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno1SFBDOXdZWGxmYVRwMGFYQnZTV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52UGdvSkNRazhjR0Y1WDJrNlkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBqYzNOemMzTnpjM056YzNQQzl3WVhsZmFUcGpiMlJwWTJWSlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtDZ2tKUEM5d1lYbGZhVHBwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5V1pYSnpZVzUwWlQ0S0NRazhjR0Y1WDJrNllXNWhaM0poWm1sallWWmxjbk5oYm5SbFBuaDRlSGg0UEM5d1lYbGZhVHBoYm1GbmNtRm1hV05oVm1WeWMyRnVkR1UrQ2drSlBIQmhlVjlwT21sdVpHbHlhWHA2YjFabGNuTmhiblJsUG5oNGVIZzhMM0JoZVY5cE9tbHVaR2x5YVhwNmIxWmxjbk5oYm5SbFBnb0pDVHh3WVhsZmFUcGpZWEJXWlhKellXNTBaVDU0ZUhnOEwzQmhlVjlwT21OaGNGWmxjbk5oYm5SbFBnb0pDVHh3WVhsZmFUcHNiMk5oYkdsMFlWWmxjbk5oYm5SbFBuaDRlRHd2Y0dGNVgyazZiRzlqWVd4cGRHRldaWEp6WVc1MFpUNEtDUWs4Y0dGNVgyazZjSEp2ZG1sdVkybGhWbVZ5YzJGdWRHVStlSGg0UEM5d1lYbGZhVHB3Y205MmFXNWphV0ZXWlhKellXNTBaVDRLQ1FrOGNHRjVYMms2Ym1GNmFXOXVaVlpsY25OaGJuUmxQbmg0UEM5d1lYbGZhVHB1WVhwcGIyNWxWbVZ5YzJGdWRHVStDZ2s4TDNCaGVWOXBPbk52WjJkbGRIUnZWbVZ5YzJGdWRHVStDZ2s4Y0dGNVgyazZjMjluWjJWMGRHOVFZV2RoZEc5eVpUNEtDUWs4Y0dGNVgyazZhV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52VUdGbllYUnZjbVUrQ2drSkNUeHdZWGxmYVRwMGFYQnZTV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52UGtjOEwzQmhlVjlwT25ScGNHOUpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSkNUeHdZWGxmYVRwamIyUnBZMlZKWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI4K056YzNOemMzTnpjM056YzhMM0JoZVY5cE9tTnZaR2xqWlVsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NEtDUWs4TDNCaGVWOXBPbWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFCaFoyRjBiM0psUGdvSkNUeHdZWGxmYVRwaGJtRm5jbUZtYVdOaFVHRm5ZWFJ2Y21VK2VIaDRlSGg0UEM5d1lYbGZhVHBoYm1GbmNtRm1hV05oVUdGbllYUnZjbVUrQ2drSlBIQmhlVjlwT21sdVpHbHlhWHA2YjFCaFoyRjBiM0psUG5oNGVIaDRQQzl3WVhsZmFUcHBibVJwY21sNmVtOVFZV2RoZEc5eVpUNEtDUWs4Y0dGNVgyazZZMkZ3VUdGbllYUnZjbVUrZUhoNGVEd3ZjR0Y1WDJrNlkyRndVR0ZuWVhSdmNtVStDZ2tKUEhCaGVWOXBPbXh2WTJGc2FYUmhVR0ZuWVhSdmNtVStlSGg0UEM5d1lYbGZhVHBzYjJOaGJHbDBZVkJoWjJGMGIzSmxQZ29KQ1R4d1lYbGZhVHB3Y205MmFXNWphV0ZRWVdkaGRHOXlaVDU0ZUR3dmNHRjVYMms2Y0hKdmRtbHVZMmxoVUdGbllYUnZjbVUrQ2drSlBIQmhlVjlwT201aGVtbHZibVZRWVdkaGRHOXlaVDU0ZUhoNFBDOXdZWGxmYVRwdVlYcHBiMjVsVUdGbllYUnZjbVUrQ2drOEwzQmhlVjlwT25OdloyZGxkSFJ2VUdGbllYUnZjbVUrQ2drOGNHRjVYMms2WkdGMGFWQmhaMkZ0Wlc1MGJ6NEtDUWs4Y0dGNVgyazZZMjlrYVdObFJYTnBkRzlRWVdkaGJXVnVkRzgrTUR3dmNHRjVYMms2WTI5a2FXTmxSWE5wZEc5UVlXZGhiV1Z1ZEc4K0Nna0pQSEJoZVY5cE9tbHRjRzl5ZEc5VWIzUmhiR1ZRWVdkaGRHOCtPREF1TURBOEwzQmhlVjlwT21sdGNHOXlkRzlVYjNSaGJHVlFZV2RoZEc4K0Nna0pQSEJoZVY5cE9tbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiMVpsY25OaGJXVnVkRzgrTURFd01EQXdNREF3TURBd01EQXhPRFE4TDNCaGVWOXBPbWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFabGNuTmhiV1Z1ZEc4K0Nna0pQSEJoZVY5cE9rTnZaR2xqWlVOdmJuUmxjM1J2VUdGbllXMWxiblJ2UG5Rd01EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01UZzBQQzl3WVhsZmFUcERiMlJwWTJWRGIyNTBaWE4wYjFCaFoyRnRaVzUwYno0S0NRazhjR0Y1WDJrNlpHRjBhVk5wYm1kdmJHOVFZV2RoYldWdWRHOCtDZ2tKQ1R4d1lYbGZhVHB6YVc1bmIyeHZTVzF3YjNKMGIxQmhaMkYwYno0NE1DNHdNRHd2Y0dGNVgyazZjMmx1WjI5c2IwbHRjRzl5ZEc5UVlXZGhkRzgrQ2drSkNUeHdZWGxmYVRwbGMybDBiMU5wYm1kdmJHOVFZV2RoYldWdWRHOCtVRUZIUVZSQlBDOXdZWGxmYVRwbGMybDBiMU5wYm1kdmJHOVFZV2RoYldWdWRHOCtDZ2tKQ1R4d1lYbGZhVHBrWVhSaFJYTnBkRzlUYVc1bmIyeHZVR0ZuWVcxbGJuUnZQakl3TWpRdE1EUXRNVGs4TDNCaGVWOXBPbVJoZEdGRmMybDBiMU5wYm1kdmJHOVFZV2RoYldWdWRHOCtDZ2tKQ1R4d1lYbGZhVHBwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5U2FYTmpiM056YVc5dVpUNHdNREU4TDNCaGVWOXBPbWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFKcGMyTnZjM05wYjI1bFBnb0pDUWs4Y0dGNVgyazZZMkYxYzJGc1pWWmxjbk5oYldWdWRHOCtlSGg0ZUhoNGVIZzhMM0JoZVY5cE9tTmhkWE5oYkdWV1pYSnpZVzFsYm5SdlBnb0pDUWs4Y0dGNVgyazZaR0YwYVZOd1pXTnBabWxqYVZKcGMyTnZjM05wYjI1bFBuaDRlSGg0ZUR3dmNHRjVYMms2WkdGMGFWTndaV05wWm1samFWSnBjMk52YzNOcGIyNWxQZ29KQ1R3dmNHRjVYMms2WkdGMGFWTnBibWR2Ykc5UVlXZGhiV1Z1ZEc4K0NnazhMM0JoZVY5cE9tUmhkR2xRWVdkaGJXVnVkRzgrQ2p3dmNHRjVYMms2VWxRKzwvcnQ+CiAgICAgICAgPC9wcHQ6cGFhSW52aWFSVD4KICAgIDwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+',
];

$data_resp = [
    ':id' => 229,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 14:47:03.197',
    ':tipoevento' => 'paaInviaRT',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000184',
    ':ccp' => 't0000000000000000000000000000184',
    ':noticenumber' => '301000000000000184',
    ':creditorreferenceid' => '01000000000000184',
    ':paymenttoken' => 't0000000000000000000000000000184',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100203',
    ':sessionidoriginal' => 'sessionOriginal_cdInfoWisp',
    ':uniqueid' => 'T000229',
    ':payload' => 'PHNvYXA6RW52ZWxvcGUgeG1sbnM6c29hcD0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPjxTT0FQLUVOVjpIZWFkZXIgeG1sbnM6U09BUC1FTlY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIi8+PHNvYXA6Qm9keT48bnM0OnBhYUludmlhUlRSaXNwb3N0YSB4bWxuczpuczI9Imh0dHA6Ly93d3cuZGlnaXRwYS5nb3YuaXQvc2NoZW1hcy8yMDExL1BhZ2FtZW50aS8iIHhtbG5zOm5zMz0iaHR0cDovL3dzLnBhZ2FtZW50aS50ZWxlbWF0aWNpLmdvdi9wcHRoZWFkIiB4bWxuczpuczQ9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIj48cGFhSW52aWFSVFJpc3Bvc3RhPjxlc2l0bz5PSzwvZXNpdG8+PC9wYWFJbnZpYVJUUmlzcG9zdGE+PC9uczQ6cGFhSW52aWFSVFJpc3Bvc3RhPjwvc29hcDpCb2R5Pjwvc29hcDpFbnZlbG9wZT4=',
];


Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);


































$data_req = [
    ':id' => 230,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 15:42:00.197',
    ':tipoevento' => 'activateIOPayment',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000185',
    ':ccp' => 't0000000000000000000000000000185',
    ':noticenumber' => '301000000000000185',
    ':creditorreferenceid' => '01000000000000185',
    ':paymenttoken' => 't0000000000000000000000000000185',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100204',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000230',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPHNvYXA6RW52ZWxvcGUgeG1sbnM6bmZwc3A9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9ySU8ueHNkIiB4bWxuczpzb2FwPSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyIgeG1sbnM6dG5zPSJodHRwOi8vcGFnb3BhLWFwaS5wYWdvcGEuZ292Lml0L25vZGUvbm9kZUZvcklPLndzZGwiIHhtbG5zOnhzaT0iaHR0cDovL3d3dy53My5vcmcvMjAwMS9YTUxTY2hlbWEtaW5zdGFuY2UiPgoJPHNvYXA6Qm9keT4KCQk8bmZwc3A6YWN0aXZhdGVJT1BheW1lbnRSZXEgeG1sbnM6bmZwc3A9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9ySU8ueHNkIj4KCQkJPGlkUFNQPkFHSURfMDE8L2lkUFNQPgoJCQk8aWRCcm9rZXJQU1A+Nzc3Nzc3Nzc3Nzc8L2lkQnJva2VyUFNQPgoJCQk8aWRDaGFubmVsPjc3Nzc3Nzc3Nzc3XzAxPC9pZENoYW5uZWw+CgkJCTxwYXNzd29yZD54eHh4eHg8L3Bhc3N3b3JkPgoJCQk8cXJDb2RlPgoJCQkJPGZpc2NhbENvZGU+Nzc3Nzc3Nzc3Nzc8L2Zpc2NhbENvZGU+CgkJCQk8bm90aWNlTnVtYmVyPjMwMTAwMDAwMDAwMDAwMDE4NTwvbm90aWNlTnVtYmVyPgoJCQk8L3FyQ29kZT4KCQkJPGFtb3VudD41MC4wMDwvYW1vdW50PgoJCTwvbmZwc3A6YWN0aXZhdGVJT1BheW1lbnRSZXE+Cgk8L3NvYXA6Qm9keT4KPC9zb2FwOkVudmVsb3BlPg==',
];

$data_resp = [
    ':id' => 231,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 15:42:01.197',
    ':tipoevento' => 'activateIOPayment',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000185',
    ':ccp' => 't0000000000000000000000000000185',
    ':noticenumber' => '301000000000000185',
    ':creditorreferenceid' => '01000000000000185',
    ':paymenttoken' => 't0000000000000000000000000000185',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100204',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000231',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpuZnBzcD0iaHR0cDovL3BhZ29wYS1hcGkucGFnb3BhLmdvdi5pdC9ub2RlL25vZGVGb3JJTy54c2QiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIiB4bWxuczp4cz0iaHR0cDovL3d3dy53My5vcmcvMjAwMS9YTUxTY2hlbWEiIHhtbG5zOnhzaT0iaHR0cDovL3d3dy53My5vcmcvMjAwMS9YTUxTY2hlbWEtaW5zdGFuY2UiPgoJPHNvYXBlbnY6Qm9keT4KCQk8bmZwc3A6YWN0aXZhdGVJT1BheW1lbnRSZXM+CgkJCTxvdXRjb21lPk9LPC9vdXRjb21lPgoJCQk8dG90YWxBbW91bnQ+NTAuMDA8L3RvdGFsQW1vdW50PgoJCQk8cGF5bWVudERlc2NyaXB0aW9uPnh4eHh4eDwvcGF5bWVudERlc2NyaXB0aW9uPgoJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCTxjb21wYW55TmFtZT54eHh4PC9jb21wYW55TmFtZT4KCQkJPHBheW1lbnRUb2tlbj50MDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDE4NTwvcGF5bWVudFRva2VuPgoJCQk8Y3JlZGl0b3JSZWZlcmVuY2VJZD4wMTAwMDAwMDAwMDAwMDE4NTwvY3JlZGl0b3JSZWZlcmVuY2VJZD4KCQk8L25mcHNwOmFjdGl2YXRlSU9QYXltZW50UmVzPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4=',
];


Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);







$data_req = [
    ':id' => 232,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 15:43:00.197',
    ':tipoevento' => 'nodoChiediInformazioniPagamento',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000185',
    ':ccp' => 't0000000000000000000000000000185',
    ':noticenumber' => '301000000000000185',
    ':creditorreferenceid' => '01000000000000185',
    ':paymenttoken' => 't0000000000000000000000000000185',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100205',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000232',
    ':payload' => '',
];

$data_resp = [
    ':id' => 233,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 15:43:01.197',
    ':tipoevento' => 'nodoChiediInformazioniPagamento',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000185',
    ':ccp' => 't0000000000000000000000000000185',
    ':noticenumber' => '301000000000000185',
    ':creditorreferenceid' => '01000000000000185',
    ':paymenttoken' => 't0000000000000000000000000000185',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100205',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000233',
    ':payload' => 'ewogICAgIklCQU4iOiAiSVQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxIiwKICAgICJib2xsb0RpZ2l0YWxlIjogZmFsc2UsCiAgICAiY29kaWNlRmlzY2FsZSI6ICJYWFhYWFhYWFhYWFhYWFhYIiwKICAgICJkZXR0YWdsaSI6IFsKICAgICAgICB7CiAgICAgICAgICAgICJDQ1AiOiAidDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxODUiLAogICAgICAgICAgICAiSVVWIjogIjAxMDAwMDAwMDAwMDAwMTg1IiwKICAgICAgICAgICAgImNvZGljZVBhZ2F0b3JlIjogIlhYWFhYWFhYWFhYWFhYWFgiLAogICAgICAgICAgICAiZW50ZUJlbmVmaWNpYXJpbyI6ICJ4eHh4eCIsCiAgICAgICAgICAgICJpZERvbWluaW8iOiAiNzc3Nzc3Nzc3NzciLAogICAgICAgICAgICAiaW1wb3J0byI6IDUwLjAwLAogICAgICAgICAgICAibm9tZVBhZ2F0b3JlIjogIlhYWFhYWFhYWFhYWFhYWFgiLAogICAgICAgICAgICAidGlwb1BhZ2F0b3JlIjogIkYiCiAgICAgICAgfQogICAgXSwKICAgICJpbXBvcnRvVG90YWxlIjogNTAuMDAsCiAgICAib2dnZXR0b1BhZ2FtZW50byI6ICJ4eHh4eHh4IiwKICAgICJyYWdpb25lU29jaWFsZSI6ICJ4eHh4IiwKICAgICJ1cmxSZWRpcmVjdEVDIjogImh0dHBzOi8vZXhhbXBsZS5jb20iCn0=',
];


Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);











$data_req = [
    ':id' => 234,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 15:44:00.197',
    ':tipoevento' => 'nodoInoltraEsitoPagamentoPayPal',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000185',
    ':ccp' => 't0000000000000000000000000000185',
    ':noticenumber' => '301000000000000185',
    ':creditorreferenceid' => '01000000000000185',
    ':paymenttoken' => 't0000000000000000000000000000185',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100206',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000234',
    ':payload' => 'ewogICAgImlkUGFnYW1lbnRvIjogImFlYTllNmU5YzdlYzc5ZWU2YWM5YTZlNmU5NmM5ZWUyIiwKICAgICJpZFRyYW5zYXppb25lIjogIjIyMjIyMjIyMiIsCiAgICAiaWRUcmFuc2F6aW9uZVBzcCI6ICI5OTk5OTk5OTk5OTk5OSIsCiAgICAiaWRlbnRpZmljYXRpdm9DYW5hbGUiOiAiODg4ODg4ODg4ODhfMDEiLAogICAgImlkZW50aWZpY2F0aXZvSW50ZXJtZWRpYXJpbyI6ICI4ODg4ODg4ODg4OCIsCiAgICAiaWRlbnRpZmljYXRpdm9Qc3AiOiAiQUdJRF8wMSIsCiAgICAiaW1wb3J0b1RvdGFsZVBhZ2F0byI6IDUwLjAwLAogICAgInRpbWVzdGFtcE9wZXJhemlvbmUiOiAiMjAyNC0wNS0wMlQyMzo1NzozOC4wMDErMDI6MDAiCn0=',
];

$data_resp = [
    ':id' => 235,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 15:44:50.197',
    ':tipoevento' => 'nodoInoltraEsitoPagamentoPayPal',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000185',
    ':ccp' => 't0000000000000000000000000000185',
    ':noticenumber' => '301000000000000185',
    ':creditorreferenceid' => '01000000000000185',
    ':paymenttoken' => 't0000000000000000000000000000185',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100206',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000235',
    ':payload' => 'eyJlc2l0byI6Ik9LIn0=',
];


Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);






$data_req = [
    ':id' => 236,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 15:44:10.197',
    ':tipoevento' => 'pspNotifyPayment',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000185',
    ':ccp' => 't0000000000000000000000000000185',
    ':noticenumber' => '301000000000000185',
    ':creditorreferenceid' => '01000000000000185',
    ':paymenttoken' => 't0000000000000000000000000000185',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100207',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000236',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpwZm49Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvcHNwL3BzcEZvck5vZGUueHNkIiB4bWxuczpzb2FwZW52PSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyIgeG1sbnM6eHM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hIiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBmbjpwc3BOb3RpZnlQYXltZW50UmVxPgoJCQk8aWRQU1A+QUdJRF8wMTwvaWRQU1A+CgkJCTxpZEJyb2tlclBTUD44ODg4ODg4ODg4ODwvaWRCcm9rZXJQU1A+CgkJCTxpZENoYW5uZWw+ODg4ODg4ODg4ODhfMDE8L2lkQ2hhbm5lbD4KCQkJPHBheW1lbnRUb2tlbj50MDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDE4NTwvcGF5bWVudFRva2VuPgoJCQk8cGF5bWVudERlc2NyaXB0aW9uPnBhZ2FtZW50byBtdWx0aWJlbmVmaWNpYXJpbzwvcGF5bWVudERlc2NyaXB0aW9uPgoJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCTxjb21wYW55TmFtZT54eHh4eHh4PC9jb21wYW55TmFtZT4KCQkJPGNyZWRpdG9yUmVmZXJlbmNlSWQ+MDEwMDAwMDAwMDAwMDAxODU8L2NyZWRpdG9yUmVmZXJlbmNlSWQ+CgkJCTxkZWJ0QW1vdW50PjUwLjAwPC9kZWJ0QW1vdW50PgoJCQk8dHJhbnNmZXJMaXN0PgoJCQkJPHRyYW5zZmVyPgoJCQkJCTxpZFRyYW5zZmVyPjE8L2lkVHJhbnNmZXI+CgkJCQkJPHRyYW5zZmVyQW1vdW50PjUwLjAwPC90cmFuc2ZlckFtb3VudD4KCQkJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCQkJPElCQU4+SVQxOFUwMDAwMDAwMDAwMDAwMDAwMDAwMDAxPC9JQkFOPgoJCQkJCTxyZW1pdHRhbmNlSW5mb3JtYXRpb24+eHh4eDwvcmVtaXR0YW5jZUluZm9ybWF0aW9uPgoJCQkJPC90cmFuc2Zlcj4KCQkJPC90cmFuc2Zlckxpc3Q+CgkJCTxwYXlwYWxQYXltZW50PgoJCQkJPHRyYW5zYWN0aW9uSWQ+MjIyMjIyMjIyPC90cmFuc2FjdGlvbklkPgoJCQkJPHBzcFRyYW5zYWN0aW9uSWQ+OTk5OTk5OTk5OTk5OTk8L3BzcFRyYW5zYWN0aW9uSWQ+CgkJCQk8dG90YWxBbW91bnQ+NTEuNTA8L3RvdGFsQW1vdW50PgoJCQkJPGZlZT4xLjUwPC9mZWU+CgkJCQk8dGltZXN0YW1wT3BlcmF0aW9uPjIwMjQtMDUtMDJUMjI6MTA6MTg8L3RpbWVzdGFtcE9wZXJhdGlvbj4KCQkJPC9wYXlwYWxQYXltZW50PgoJCTwvcGZuOnBzcE5vdGlmeVBheW1lbnRSZXE+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg==',
];

$data_resp = [
    ':id' => 237,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 15:44:30.197',
    ':tipoevento' => 'pspNotifyPayment',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000185',
    ':ccp' => 't0000000000000000000000000000185',
    ':noticenumber' => '301000000000000185',
    ':creditorreferenceid' => '01000000000000185',
    ':paymenttoken' => 't0000000000000000000000000000185',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100207',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000237',
    ':payload' => 'PFNPQVAtRU5WOkVudmVsb3BlIHhtbG5zOlNPQVAtRU5WPSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyI+PFNPQVAtRU5WOkhlYWRlci8+PFNPQVAtRU5WOkJvZHk+PG5zMzpwc3BOb3RpZnlQYXltZW50UmVzIHhtbG5zOm5zMz0iaHR0cDovL3BhZ29wYS1hcGkucGFnb3BhLmdvdi5pdC9wc3AvcHNwRm9yTm9kZS54c2QiPjxvdXRjb21lPk9LPC9vdXRjb21lPjwvbnMzOnBzcE5vdGlmeVBheW1lbnRSZXM+PC9TT0FQLUVOVjpCb2R5PjwvU09BUC1FTlY6RW52ZWxvcGU+',
];


Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);








$data_req = [
    ':id' => 238,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 15:46:10.197',
    ':tipoevento' => 'sendPaymentOutcome',
    ':sottotipoevento' => 'REQ',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000185',
    ':ccp' => 't0000000000000000000000000000185',
    ':noticenumber' => '301000000000000185',
    ':creditorreferenceid' => '01000000000000185',
    ':paymenttoken' => 't0000000000000000000000000000185',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100208',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000238',
    ':payload' => 'PHNvYXA6RW52ZWxvcGUgeG1sbnM6c29hcD0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPgoJPHNvYXA6Qm9keT4KCQk8bnMyOnNlbmRQYXltZW50T3V0Y29tZVJlcSB4bWxuczpuczI9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6bnMzPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyI+CgkJCTxpZFBTUD5BR0lEXzAxPC9pZFBTUD4KCQkJPGlkQnJva2VyUFNQPjg4ODg4ODg4ODg4PC9pZEJyb2tlclBTUD4KCQkJPGlkQ2hhbm5lbD44ODg4ODg4ODg4OF8wMTwvaWRDaGFubmVsPgoJCQk8cGFzc3dvcmQ+eHh4eHh4eHg8L3Bhc3N3b3JkPgoJCQk8cGF5bWVudFRva2VuPnQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMTg1PC9wYXltZW50VG9rZW4+CgkJCTxvdXRjb21lPk9LPC9vdXRjb21lPgoJCQk8ZGV0YWlscz4KCQkJCTxwYXltZW50TWV0aG9kPm90aGVyPC9wYXltZW50TWV0aG9kPgoJCQkJPGZlZT4xLjUwPC9mZWU+CgkJCQk8YXBwbGljYXRpb25EYXRlPjIwMjQtMDQtMDI8L2FwcGxpY2F0aW9uRGF0ZT4KCQkJCTx0cmFuc2ZlckRhdGU+MjAyNC0wNC0wMzwvdHJhbnNmZXJEYXRlPgoJCQk8L2RldGFpbHM+CgkJPC9uczI6c2VuZFBheW1lbnRPdXRjb21lUmVxPgoJPC9zb2FwOkJvZHk+Cjwvc29hcDpFbnZlbG9wZT4=',
];

$data_resp = [
    ':id' => 239,
    ':date_event' => '2024-03-10',
    ':inserted_timestamp' => '2024-03-10 15:46:30.197',
    ':tipoevento' => 'sendPaymentOutcome',
    ':sottotipoevento' => 'RESP',
    ':iddominio' => '77777777777',
    ':iuv' => '01000000000000185',
    ':ccp' => 't0000000000000000000000000000185',
    ':noticenumber' => '301000000000000185',
    ':creditorreferenceid' => '01000000000000185',
    ':paymenttoken' => 't0000000000000000000000000000185',
    ':psp' => 'AGID_01',
    ':stazione' => '77777777777_01',
    ':canale' => '88888888888_01',
    ':sessionid' => 'sessid_100208',
    ':sessionidoriginal' => '',
    ':uniqueid' => 'T000239',
    ':payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6c2VuZFBheW1lbnRPdXRjb21lUmVzPgoJCQk8b3V0Y29tZT5PSzwvb3V0Y29tZT4KCQk8L25mcDpzZW5kUGF5bWVudE91dGNvbWVSZXM+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg==',
];


Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);























$data_req = [
    ':id'                       => 240,
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
    ':sessionid'                => '',
    ':sessionidoriginal'        => 'session_id_original_000240',
    ':uniqueid'                 => 'T000240',
    ':payload'                  => 'PFNPQVAtRU5WOkVudmVsb3BlIHhtbG5zOlNPQVAtRU5WPSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyIgeG1sbnM6cHB0PSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOndzPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyI+Cgk8U09BUC1FTlY6SGVhZGVyPgoJCTxwcHQ6aW50ZXN0YXppb25lQ2FycmVsbG9QUFQ+CgkJCTxpZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QQT43Nzc3Nzc3Nzc3NzwvaWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUEE+CgkJCTxpZGVudGlmaWNhdGl2b1N0YXppb25lSW50ZXJtZWRpYXJpb1BBPjc3Nzc3Nzc3Nzc3XzAxPC9pZGVudGlmaWNhdGl2b1N0YXppb25lSW50ZXJtZWRpYXJpb1BBPgoJCQk8aWRlbnRpZmljYXRpdm9DYXJyZWxsbz5jMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDI0MDwvaWRlbnRpZmljYXRpdm9DYXJyZWxsbz4KCQk8L3BwdDppbnRlc3RhemlvbmVDYXJyZWxsb1BQVD4KCTwvU09BUC1FTlY6SGVhZGVyPgoJPFNPQVAtRU5WOkJvZHk+CgkJPG5zMzpub2RvSW52aWFDYXJyZWxsb1JQVCB4bWxuczpuczM9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIj4KCQkJPHBhc3N3b3JkPlBMQUNFSE9MREVSPC9wYXNzd29yZD4KCQkJPGlkZW50aWZpY2F0aXZvUFNQPkFHSURfMDE8L2lkZW50aWZpY2F0aXZvUFNQPgoJCQk8aWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUFNQPjg4ODg4ODg4ODg4PC9pZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QU1A+CgkJCTxpZGVudGlmaWNhdGl2b0NhbmFsZT44ODg4ODg4ODg4OF8wMTwvaWRlbnRpZmljYXRpdm9DYW5hbGU+CgkJCTxsaXN0YVJQVD4KCQkJCTxlbGVtZW50b0xpc3RhUlBUPgoJCQkJCTxpZGVudGlmaWNhdGl2b0RvbWluaW8+Nzc3Nzc3Nzc3Nzc8L2lkZW50aWZpY2F0aXZvRG9taW5pbz4KCQkJCQk8aWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4wMTAwMDAwMDAwMDAwMDI0MDwvaWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4KCQkJCQk8Y29kaWNlQ29udGVzdG9QYWdhbWVudG8+dDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAyNDA8L2NvZGljZUNvbnRlc3RvUGFnYW1lbnRvPgoJCQkJCTxycHQ+UEZKUVZDQjRiV3h1Y3owaWFIUjBjRG92TDNkM2R5NWthV2RwZEhCaExtZHZkaTVwZEM5elkyaGxiV0Z6THpJd01URXZVR0ZuWVcxbGJuUnBMeUkrQ2drOGRtVnljMmx2Ym1WUFoyZGxkSFJ2UGpFdU1Ed3ZkbVZ5YzJsdmJtVlBaMmRsZEhSdlBnb0pQR1J2YldsdWFXOCtDZ2tKUEdsa1pXNTBhV1pwWTJGMGFYWnZSRzl0YVc1cGJ6NDNOemMzTnpjM056YzNOend2YVdSbGJuUnBabWxqWVhScGRtOUViMjFwYm1sdlBnb0pQQzlrYjIxcGJtbHZQZ29KUEdsa1pXNTBhV1pwWTJGMGFYWnZUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQakl3TWpNeE1qRTFNREV3TVRVek9XRmlZbUV6TXpVdFlXSTBaUzAwWkRFNExXRXpQQzlwWkdWdWRHbG1hV05oZEdsMmIwMWxjM05oWjJkcGIxSnBZMmhwWlhOMFlUNEtDVHhrWVhSaFQzSmhUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQakl3TWpNdE1USXRNVFZVTVRNNk1ERTZOVE11TmpFNUt6QXhPakF3UEM5a1lYUmhUM0poVFdWemMyRm5aMmx2VW1samFHbGxjM1JoUGdvSlBHRjFkR1Z1ZEdsallYcHBiMjVsVTI5bloyVjBkRzgrVGk5QlBDOWhkWFJsYm5ScFkyRjZhVzl1WlZOdloyZGxkSFJ2UGdvSlBITnZaMmRsZEhSdlZtVnljMkZ1ZEdVK0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFabGNuTmhiblJsUGdvSkNRazhkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NUhQQzkwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1FrOFkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBqYzNOemMzTnpjM056YzNQQzlqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSlBDOXBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlXWlhKellXNTBaVDRLQ1FrOFlXNWhaM0poWm1sallWWmxjbk5oYm5SbFBuaDRlSGg0ZUhoNGVEd3ZZVzVoWjNKaFptbGpZVlpsY25OaGJuUmxQZ29KUEM5emIyZG5aWFIwYjFabGNuTmhiblJsUGdvSlBITnZaMmRsZEhSdlVHRm5ZWFJ2Y21VK0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFCaFoyRjBiM0psUGdvSkNRazhkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NUhQQzkwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1FrOFkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBqYzNOemMzTnpjM056YzNQQzlqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSlBDOXBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlRWVdkaGRHOXlaVDRLQ1FrOFlXNWhaM0poWm1sallWQmhaMkYwYjNKbFBuaDRlSGg0ZUhoNGVEd3ZZVzVoWjNKaFptbGpZVkJoWjJGMGIzSmxQZ29KUEM5emIyZG5aWFIwYjFCaFoyRjBiM0psUGdvSlBHVnVkR1ZDWlc1bFptbGphV0Z5YVc4K0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjBKbGJtVm1hV05wWVhKcGJ6NEtDUWtKUEhScGNHOUpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrUnp3dmRHbHdiMGxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno0S0NRa0pQR052WkdsalpVbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejQzTnpjM056YzNOemMzTnp3dlkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBnb0pDVHd2YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlFtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4a1pXNXZiV2x1WVhwcGIyNWxRbVZ1WldacFkybGhjbWx2UG5oNGVIaDRlSGc4TDJSbGJtOXRhVzVoZW1sdmJtVkNaVzVsWm1samFXRnlhVzgrQ2drSlBHTnZaR2xqWlZWdWFYUlBjR1Z5UW1WdVpXWnBZMmxoY21sdlBuaDRQQzlqYjJScFkyVlZibWwwVDNCbGNrSmxibVZtYVdOcFlYSnBiejRLQ1FrOFpHVnViMjFWYm1sMFQzQmxja0psYm1WbWFXTnBZWEpwYno1NGVIaDRlSGc4TDJSbGJtOXRWVzVwZEU5d1pYSkNaVzVsWm1samFXRnlhVzgrQ2drSlBHbHVaR2x5YVhwNmIwSmxibVZtYVdOcFlYSnBiejU0ZUhoNFBDOXBibVJwY21sNmVtOUNaVzVsWm1samFXRnlhVzgrQ2drSlBHTnBkbWxqYjBKbGJtVm1hV05wWVhKcGJ6NTRlSGc4TDJOcGRtbGpiMEpsYm1WbWFXTnBZWEpwYno0S0NRazhZMkZ3UW1WdVpXWnBZMmxoY21sdlBuaDRlSGg0UEM5allYQkNaVzVsWm1samFXRnlhVzgrQ2drSlBHeHZZMkZzYVhSaFFtVnVaV1pwWTJsaGNtbHZQbmg0ZUhnOEwyeHZZMkZzYVhSaFFtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4d2NtOTJhVzVqYVdGQ1pXNWxabWxqYVdGeWFXOCtlSGc4TDNCeWIzWnBibU5wWVVKbGJtVm1hV05wWVhKcGJ6NEtDUWs4Ym1GNmFXOXVaVUpsYm1WbWFXTnBZWEpwYno1NGVEd3ZibUY2YVc5dVpVSmxibVZtYVdOcFlYSnBiejRLQ1R3dlpXNTBaVUpsYm1WbWFXTnBZWEpwYno0S0NUeGtZWFJwVm1WeWMyRnRaVzUwYno0S0NRazhaR0YwWVVWelpXTjFlbWx2Ym1WUVlXZGhiV1Z1ZEc4K01qQXlNeTB4TWkweE5Tc3dNVG93TUR3dlpHRjBZVVZ6WldOMWVtbHZibVZRWVdkaGJXVnVkRzgrQ2drSlBHbHRjRzl5ZEc5VWIzUmhiR1ZFWVZabGNuTmhjbVUrTmpBd0xqQXdQQzlwYlhCdmNuUnZWRzkwWVd4bFJHRldaWEp6WVhKbFBnb0pDVHgwYVhCdlZtVnljMkZ0Wlc1MGJ6NUNRbFE4TDNScGNHOVdaWEp6WVcxbGJuUnZQZ29KQ1R4cFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOVdaWEp6WVcxbGJuUnZQakF4TURBd01EQXdNREF3TURBd01qUXdQQzlwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5V1pYSnpZVzFsYm5SdlBnb0pDVHhqYjJScFkyVkRiMjUwWlhOMGIxQmhaMkZ0Wlc1MGJ6NTBNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREkwTUR3dlkyOWthV05sUTI5dWRHVnpkRzlRWVdkaGJXVnVkRzgrQ2drSlBHWnBjbTFoVW1salpYWjFkR0UrTUR3dlptbHliV0ZTYVdObGRuVjBZVDRLQ1FrOFpHRjBhVk5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KQ1FrOGFXMXdiM0owYjFOcGJtZHZiRzlXWlhKellXMWxiblJ2UGpZd01DNHdNRHd2YVcxd2IzSjBiMU5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KQ1FrOGFXSmhia0ZqWTNKbFpHbDBiejVKVkRFNFZUQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNVEE4TDJsaVlXNUJZMk55WldScGRHOCtDZ2tKQ1R4allYVnpZV3hsVm1WeWMyRnRaVzUwYno1NGVIaDRlSGg0UEM5allYVnpZV3hsVm1WeWMyRnRaVzUwYno0S0NRa0pQR1JoZEdsVGNHVmphV1pwWTJsU2FYTmpiM056YVc5dVpUNTRlSGg0ZUhoNFBDOWtZWFJwVTNCbFkybG1hV05wVW1selkyOXpjMmx2Ym1VK0Nna0pQQzlrWVhScFUybHVaMjlzYjFabGNuTmhiV1Z1ZEc4K0NnazhMMlJoZEdsV1pYSnpZVzFsYm5SdlBnbzhMMUpRVkQ0PTwvcnB0PgoJCQkJPC9lbGVtZW50b0xpc3RhUlBUPgoJCQk8L2xpc3RhUlBUPgoJCQk8bXVsdGlCZW5lZmljaWFyaW8+ZmFsc2U8L211bHRpQmVuZWZpY2lhcmlvPgoJCTwvbnMzOm5vZG9JbnZpYUNhcnJlbGxvUlBUPgoJPC9TT0FQLUVOVjpCb2R5Pgo8L1NPQVAtRU5WOkVudmVsb3BlPg==',
];

$data_resp = [
    ':id'                       => 241,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 10:42:00.197',
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
    ':sessionid'                => '',
    ':sessionidoriginal'        => 'session_id_original_000240',
    ':uniqueid'                 => 'T000241',
    ':payload'                  => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpwcHQ9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIiB4bWxuczpwcHRoZWFkPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIiB4bWxuczp0bnM9Imh0dHA6Ly9Ob2RvUGFnYW1lbnRpU1BDLnNwY29vcC5nb3YuaXQvc2Vydml6aS9QYWdhbWVudGlUZWxlbWF0aWNpUlBUIiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBwdDpub2RvSW52aWFDYXJyZWxsb1JQVFJpc3Bvc3RhPgoJCQk8ZXNpdG9Db21wbGVzc2l2b09wZXJhemlvbmU+T0s8L2VzaXRvQ29tcGxlc3Npdm9PcGVyYXppb25lPgoJCQk8dXJsPmh0dHBzOi8vd2lzcDIucGFnb3BhLmdvdi5pdC93YWxsZXQvd2VsY29tZT9pZFNlc3Npb249NjA2N2FiMGItMGIxNi00NDVhLThlN2MtZGVkZGQ3Y2IxYzZiPC91cmw+CgkJPC9wcHQ6bm9kb0ludmlhQ2FycmVsbG9SUFRSaXNwb3N0YT4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+',
];



Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);












$data_req = [
    ':id'                       => 242,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 10:44:00.197',
    ':tipoevento'               => 'nodoNotificaAnnullamento',
    ':sottotipoevento'          => 'REQ',
    ':iddominio'                => '77777777777',
    ':iuv'                      => '01000000000000240',
    ':ccp'                      => 't0000000000000000000000000000240',
    ':noticenumber'             => '',
    ':creditorreferenceid'      => '01000000000000240',
    ':paymenttoken'             => 't0000000000000000000000000000240',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => '',
    ':sessionidoriginal'        => 'session_id_original_000240',
    ':uniqueid'                 => 'T000242',
    ':payload'                  => '',
];

$data_resp = [
    ':id'                       => 243,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 10:44:05.197',
    ':tipoevento'               => 'nodoNotificaAnnullamento',
    ':sottotipoevento'          => 'RESP',
    ':iddominio'                => '77777777777',
    ':iuv'                      => '01000000000000240',
    ':ccp'                      => 't0000000000000000000000000000240',
    ':noticenumber'             => '',
    ':creditorreferenceid'      => '01000000000000240',
    ':paymenttoken'             => 't0000000000000000000000000000240',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => '',
    ':sessionidoriginal'        => 'session_id_original_000240',
    ':uniqueid'                 => 'T000243',
    ':payload'                  => 'eyJlc2l0byI6Ik9LIn0=',
];



Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);
























































$data_req = [
    ':id'                       => 244,
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
    ':sessionid'                => '',
    ':sessionidoriginal'        => 'session_id_original_000241',
    ':uniqueid'                 => 'T000244',
    ':payload'                  => 'PFNPQVAtRU5WOkVudmVsb3BlIHhtbG5zOlNPQVAtRU5WPSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyIgeG1sbnM6cHB0PSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOndzPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyI+Cgk8U09BUC1FTlY6SGVhZGVyPgoJCTxwcHQ6aW50ZXN0YXppb25lQ2FycmVsbG9QUFQ+CgkJCTxpZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QQT43Nzc3Nzc3Nzc3NzwvaWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUEE+CgkJCTxpZGVudGlmaWNhdGl2b1N0YXppb25lSW50ZXJtZWRpYXJpb1BBPjc3Nzc3Nzc3Nzc3XzAxPC9pZGVudGlmaWNhdGl2b1N0YXppb25lSW50ZXJtZWRpYXJpb1BBPgoJCQk8aWRlbnRpZmljYXRpdm9DYXJyZWxsbz5jMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDI0MTwvaWRlbnRpZmljYXRpdm9DYXJyZWxsbz4KCQk8L3BwdDppbnRlc3RhemlvbmVDYXJyZWxsb1BQVD4KCTwvU09BUC1FTlY6SGVhZGVyPgoJPFNPQVAtRU5WOkJvZHk+CgkJPG5zMzpub2RvSW52aWFDYXJyZWxsb1JQVCB4bWxuczpuczM9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIj4KCQkJPHBhc3N3b3JkPlBMQUNFSE9MREVSPC9wYXNzd29yZD4KCQkJPGlkZW50aWZpY2F0aXZvUFNQPkFHSURfMDE8L2lkZW50aWZpY2F0aXZvUFNQPgoJCQk8aWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUFNQPjg4ODg4ODg4ODg4PC9pZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QU1A+CgkJCTxpZGVudGlmaWNhdGl2b0NhbmFsZT44ODg4ODg4ODg4OF8wMTwvaWRlbnRpZmljYXRpdm9DYW5hbGU+CgkJCTxsaXN0YVJQVD4KCQkJCTxlbGVtZW50b0xpc3RhUlBUPgoJCQkJCTxpZGVudGlmaWNhdGl2b0RvbWluaW8+Nzc3Nzc3Nzc3Nzc8L2lkZW50aWZpY2F0aXZvRG9taW5pbz4KCQkJCQk8aWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4wMTAwMDAwMDAwMDAwMDI0MTwvaWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4KCQkJCQk8Y29kaWNlQ29udGVzdG9QYWdhbWVudG8+dDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAyNDE8L2NvZGljZUNvbnRlc3RvUGFnYW1lbnRvPgoJCQkJCTxycHQ+UEZKUVZDQjRiV3h1Y3owaWFIUjBjRG92TDNkM2R5NWthV2RwZEhCaExtZHZkaTVwZEM5elkyaGxiV0Z6THpJd01URXZVR0ZuWVcxbGJuUnBMeUkrQ2drOGRtVnljMmx2Ym1WUFoyZGxkSFJ2UGpFdU1Ed3ZkbVZ5YzJsdmJtVlBaMmRsZEhSdlBnb0pQR1J2YldsdWFXOCtDZ2tKUEdsa1pXNTBhV1pwWTJGMGFYWnZSRzl0YVc1cGJ6NDNOemMzTnpjM056YzNOend2YVdSbGJuUnBabWxqWVhScGRtOUViMjFwYm1sdlBnb0pQQzlrYjIxcGJtbHZQZ29KUEdsa1pXNTBhV1pwWTJGMGFYWnZUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQakl3TWpNeE1qRTFNREV3TVRVek9XRmlZbUV6TXpVdFlXSTBaUzAwWkRFNExXRXpQQzlwWkdWdWRHbG1hV05oZEdsMmIwMWxjM05oWjJkcGIxSnBZMmhwWlhOMFlUNEtDVHhrWVhSaFQzSmhUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQakl3TWpNdE1USXRNVFZVTVRNNk1ERTZOVE11TmpFNUt6QXhPakF3UEM5a1lYUmhUM0poVFdWemMyRm5aMmx2VW1samFHbGxjM1JoUGdvSlBHRjFkR1Z1ZEdsallYcHBiMjVsVTI5bloyVjBkRzgrVGk5QlBDOWhkWFJsYm5ScFkyRjZhVzl1WlZOdloyZGxkSFJ2UGdvSlBITnZaMmRsZEhSdlZtVnljMkZ1ZEdVK0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFabGNuTmhiblJsUGdvSkNRazhkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NUhQQzkwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1FrOFkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBqYzNOemMzTnpjM056YzNQQzlqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSlBDOXBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlXWlhKellXNTBaVDRLQ1FrOFlXNWhaM0poWm1sallWWmxjbk5oYm5SbFBuaDRlSGg0ZUhoNGVEd3ZZVzVoWjNKaFptbGpZVlpsY25OaGJuUmxQZ29KUEM5emIyZG5aWFIwYjFabGNuTmhiblJsUGdvSlBITnZaMmRsZEhSdlVHRm5ZWFJ2Y21VK0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFCaFoyRjBiM0psUGdvSkNRazhkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NUhQQzkwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1FrOFkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBqYzNOemMzTnpjM056YzNQQzlqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSlBDOXBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlRWVdkaGRHOXlaVDRLQ1FrOFlXNWhaM0poWm1sallWQmhaMkYwYjNKbFBuaDRlSGg0ZUhoNGVEd3ZZVzVoWjNKaFptbGpZVkJoWjJGMGIzSmxQZ29KUEM5emIyZG5aWFIwYjFCaFoyRjBiM0psUGdvSlBHVnVkR1ZDWlc1bFptbGphV0Z5YVc4K0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjBKbGJtVm1hV05wWVhKcGJ6NEtDUWtKUEhScGNHOUpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrUnp3dmRHbHdiMGxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno0S0NRa0pQR052WkdsalpVbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejQzTnpjM056YzNOemMzTnp3dlkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBnb0pDVHd2YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlFtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4a1pXNXZiV2x1WVhwcGIyNWxRbVZ1WldacFkybGhjbWx2UG5oNGVIaDRlSGc4TDJSbGJtOXRhVzVoZW1sdmJtVkNaVzVsWm1samFXRnlhVzgrQ2drSlBHTnZaR2xqWlZWdWFYUlBjR1Z5UW1WdVpXWnBZMmxoY21sdlBuaDRQQzlqYjJScFkyVlZibWwwVDNCbGNrSmxibVZtYVdOcFlYSnBiejRLQ1FrOFpHVnViMjFWYm1sMFQzQmxja0psYm1WbWFXTnBZWEpwYno1NGVIaDRlSGc4TDJSbGJtOXRWVzVwZEU5d1pYSkNaVzVsWm1samFXRnlhVzgrQ2drSlBHbHVaR2x5YVhwNmIwSmxibVZtYVdOcFlYSnBiejU0ZUhoNFBDOXBibVJwY21sNmVtOUNaVzVsWm1samFXRnlhVzgrQ2drSlBHTnBkbWxqYjBKbGJtVm1hV05wWVhKcGJ6NTRlSGc4TDJOcGRtbGpiMEpsYm1WbWFXTnBZWEpwYno0S0NRazhZMkZ3UW1WdVpXWnBZMmxoY21sdlBuaDRlSGg0UEM5allYQkNaVzVsWm1samFXRnlhVzgrQ2drSlBHeHZZMkZzYVhSaFFtVnVaV1pwWTJsaGNtbHZQbmg0ZUhnOEwyeHZZMkZzYVhSaFFtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4d2NtOTJhVzVqYVdGQ1pXNWxabWxqYVdGeWFXOCtlSGc4TDNCeWIzWnBibU5wWVVKbGJtVm1hV05wWVhKcGJ6NEtDUWs4Ym1GNmFXOXVaVUpsYm1WbWFXTnBZWEpwYno1NGVEd3ZibUY2YVc5dVpVSmxibVZtYVdOcFlYSnBiejRLQ1R3dlpXNTBaVUpsYm1WbWFXTnBZWEpwYno0S0NUeGtZWFJwVm1WeWMyRnRaVzUwYno0S0NRazhaR0YwWVVWelpXTjFlbWx2Ym1WUVlXZGhiV1Z1ZEc4K01qQXlNeTB4TWkweE5Tc3dNVG93TUR3dlpHRjBZVVZ6WldOMWVtbHZibVZRWVdkaGJXVnVkRzgrQ2drSlBHbHRjRzl5ZEc5VWIzUmhiR1ZFWVZabGNuTmhjbVUrTmpBd0xqQXdQQzlwYlhCdmNuUnZWRzkwWVd4bFJHRldaWEp6WVhKbFBnb0pDVHgwYVhCdlZtVnljMkZ0Wlc1MGJ6NUNRbFE4TDNScGNHOVdaWEp6WVcxbGJuUnZQZ29KQ1R4cFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOVdaWEp6WVcxbGJuUnZQakF4TURBd01EQXdNREF3TURBd01qUXhQQzlwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5V1pYSnpZVzFsYm5SdlBnb0pDVHhqYjJScFkyVkRiMjUwWlhOMGIxQmhaMkZ0Wlc1MGJ6NTBNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREkwTVR3dlkyOWthV05sUTI5dWRHVnpkRzlRWVdkaGJXVnVkRzgrQ2drSlBHWnBjbTFoVW1salpYWjFkR0UrTUR3dlptbHliV0ZTYVdObGRuVjBZVDRLQ1FrOFpHRjBhVk5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KQ1FrOGFXMXdiM0owYjFOcGJtZHZiRzlXWlhKellXMWxiblJ2UGpZd01DNHdNRHd2YVcxd2IzSjBiMU5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KQ1FrOGFXSmhia0ZqWTNKbFpHbDBiejVKVkRFNFZUQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNVEE4TDJsaVlXNUJZMk55WldScGRHOCtDZ2tKQ1R4allYVnpZV3hsVm1WeWMyRnRaVzUwYno1NGVIaDRlSGg0UEM5allYVnpZV3hsVm1WeWMyRnRaVzUwYno0S0NRa0pQR1JoZEdsVGNHVmphV1pwWTJsU2FYTmpiM056YVc5dVpUNTRlSGg0ZUhoNFBDOWtZWFJwVTNCbFkybG1hV05wVW1selkyOXpjMmx2Ym1VK0Nna0pQQzlrWVhScFUybHVaMjlzYjFabGNuTmhiV1Z1ZEc4K0NnazhMMlJoZEdsV1pYSnpZVzFsYm5SdlBnbzhMMUpRVkQ0PTwvcnB0PgoJCQkJPC9lbGVtZW50b0xpc3RhUlBUPgoJCQk8L2xpc3RhUlBUPgoJCQk8bXVsdGlCZW5lZmljaWFyaW8+ZmFsc2U8L211bHRpQmVuZWZpY2lhcmlvPgoJCTwvbnMzOm5vZG9JbnZpYUNhcnJlbGxvUlBUPgoJPC9TT0FQLUVOVjpCb2R5Pgo8L1NPQVAtRU5WOkVudmVsb3BlPg==',
];

$data_resp = [
    ':id'                       => 245,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 10:42:00.197',
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
    ':sessionid'                => '',
    ':sessionidoriginal'        => 'session_id_original_000241',
    ':uniqueid'                 => 'T000245',
    ':payload'                  => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpwcHQ9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIiB4bWxuczpwcHRoZWFkPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIiB4bWxuczp0bnM9Imh0dHA6Ly9Ob2RvUGFnYW1lbnRpU1BDLnNwY29vcC5nb3YuaXQvc2Vydml6aS9QYWdhbWVudGlUZWxlbWF0aWNpUlBUIiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBwdDpub2RvSW52aWFDYXJyZWxsb1JQVFJpc3Bvc3RhPgoJCQk8ZXNpdG9Db21wbGVzc2l2b09wZXJhemlvbmU+T0s8L2VzaXRvQ29tcGxlc3Npdm9PcGVyYXppb25lPgoJCQk8dXJsPmh0dHBzOi8vd2lzcDIucGFnb3BhLmdvdi5pdC93YWxsZXQvd2VsY29tZT9pZFNlc3Npb249NjA2N2FiMGItMGIxNi00NDVhLThlN2MtZGVkZGQ3Y2IxYzZiPC91cmw+CgkJPC9wcHQ6bm9kb0ludmlhQ2FycmVsbG9SUFRSaXNwb3N0YT4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+',
];



Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);




$data_req = [
    ':id'                       => 246,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 10:45:30.197',
    ':tipoevento'               => 'pspInviaCarrelloRPT',
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
    ':sessionid'                => '',
    ':sessionidoriginal'        => 'session_id_original_000241',
    ':uniqueid'                 => 'T000246',
    ':payload'                  => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpwYXlfaj0iaHR0cDovL3d3dy5jbmlwYS5nb3YuaXQvc2NoZW1hcy8yMDEwL1BhZ2FtZW50aS9BY2tfMV8wLyIgeG1sbnM6cHB0PSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnRucz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0IiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBwdDpwc3BJbnZpYUNhcnJlbGxvUlBUPgoJCQk8aWRlbnRpZmljYXRpdm9QU1A+UFNQX1JQVDwvaWRlbnRpZmljYXRpdm9QU1A+CgkJCTxpZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QU1A+ODg4ODg4ODg4ODg8L2lkZW50aWZpY2F0aXZvSW50ZXJtZWRpYXJpb1BTUD4KCQkJPGlkZW50aWZpY2F0aXZvQ2FuYWxlPjg4ODg4ODg4ODg4XzAxPC9pZGVudGlmaWNhdGl2b0NhbmFsZT4KCQkJPG1vZGVsbG9QYWdhbWVudG8+MTwvbW9kZWxsb1BhZ2FtZW50bz4KCQkJPGxpc3RhUlBUPgoJCQkJPGVsZW1lbnRvTGlzdGFDYXJyZWxsb1JQVD4KCQkJCQk8aWRlbnRpZmljYXRpdm9Eb21pbmlvPjc3Nzc3Nzc3Nzc3PC9pZGVudGlmaWNhdGl2b0RvbWluaW8+CgkJCQkJPGlkZW50aWZpY2F0aXZvVW5pdm9jb1ZlcnNhbWVudG8+MDEwMDAwMDAwMDAwMDAyNDE8L2lkZW50aWZpY2F0aXZvVW5pdm9jb1ZlcnNhbWVudG8+CgkJCQkJPGNvZGljZUNvbnRlc3RvUGFnYW1lbnRvPnQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMjQxPC9jb2RpY2VDb250ZXN0b1BhZ2FtZW50bz4KCQkJCQk8cnB0PlBGSlFWQ0I0Yld4dWN6MGlhSFIwY0RvdkwzZDNkeTVrYVdkcGRIQmhMbWR2ZGk1cGRDOXpZMmhsYldGekx6SXdNVEV2VUdGbllXMWxiblJwTHlJK0NpQWdJQ0E4ZG1WeWMybHZibVZQWjJkbGRIUnZQall1TWk0d1BDOTJaWEp6YVc5dVpVOW5aMlYwZEc4K0NpQWdJQ0E4Wkc5dGFXNXBiejRLSUNBZ0lDQWdJQ0E4YVdSbGJuUnBabWxqWVhScGRtOUViMjFwYm1sdlBqYzNOemMzTnpjM056YzNQQzlwWkdWdWRHbG1hV05oZEdsMmIwUnZiV2x1YVc4K0NpQWdJQ0FnSUNBZ1BHbGtaVzUwYVdacFkyRjBhWFp2VTNSaGVtbHZibVZTYVdOb2FXVmtaVzUwWlQ0M056YzNOemMzTnpjM04xOHdNVHd2YVdSbGJuUnBabWxqWVhScGRtOVRkR0Y2YVc5dVpWSnBZMmhwWldSbGJuUmxQZ29nSUNBZ1BDOWtiMjFwYm1sdlBnb2dJQ0FnUEdsa1pXNTBhV1pwWTJGMGFYWnZUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQbVl6WldNek5tUmlOemhrWVRRME5HWmhZalJqWmpCbU9UQTRPV0ptWkRrd1BDOXBaR1Z1ZEdsbWFXTmhkR2wyYjAxbGMzTmhaMmRwYjFKcFkyaHBaWE4wWVQ0S0lDQWdJRHhrWVhSaFQzSmhUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQakl3TWpRdE1EUXRNRGxVTWpFNk5UTTZNelk4TDJSaGRHRlBjbUZOWlhOellXZG5hVzlTYVdOb2FXVnpkR0UrQ2lBZ0lDQThZWFYwWlc1MGFXTmhlbWx2Ym1WVGIyZG5aWFIwYno1NGVIZzhMMkYxZEdWdWRHbGpZWHBwYjI1bFUyOW5aMlYwZEc4K0NpQWdJQ0E4YzI5bloyVjBkRzlRWVdkaGRHOXlaVDRLSUNBZ0lDQWdJQ0E4YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlVHRm5ZWFJ2Y21VK0NpQWdJQ0FnSUNBZ0lDQWdJRHgwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQbmc4TDNScGNHOUpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2lBZ0lDQWdJQ0FnSUNBZ0lEeGpiMlJwWTJWSlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtlSGg0ZUhoNGVEd3ZZMjlrYVdObFNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29nSUNBZ0lDQWdJRHd2YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlVHRm5ZWFJ2Y21VK0NpQWdJQ0FnSUNBZ1BHRnVZV2R5WVdacFkyRlFZV2RoZEc5eVpUNTRlSGg0ZUR3dllXNWhaM0poWm1sallWQmhaMkYwYjNKbFBnb2dJQ0FnSUNBZ0lEeHVZWHBwYjI1bFVHRm5ZWFJ2Y21VK1NWUThMMjVoZW1sdmJtVlFZV2RoZEc5eVpUNEtJQ0FnSUNBZ0lDQThaUzF0WVdsc1VHRm5ZWFJ2Y21VK2VIaDRlSGhBZUhoNGVDNWpiMjA4TDJVdGJXRnBiRkJoWjJGMGIzSmxQZ29nSUNBZ1BDOXpiMmRuWlhSMGIxQmhaMkYwYjNKbFBnb2dJQ0FnUEdWdWRHVkNaVzVsWm1samFXRnlhVzgrQ2lBZ0lDQWdJQ0FnUEdsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amIwSmxibVZtYVdOcFlYSnBiejRLSUNBZ0lDQWdJQ0FnSUNBZ1BIUnBjRzlKWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI4K1J6d3ZkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NEtJQ0FnSUNBZ0lDQWdJQ0FnUEdOdlpHbGpaVWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno1NGVIaDRlSGc4TDJOdlpHbGpaVWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno0S0lDQWdJQ0FnSUNBOEwybGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiMEpsYm1WbWFXTnBZWEpwYno0S0lDQWdJQ0FnSUNBOFpHVnViMjFwYm1GNmFXOXVaVUpsYm1WbWFXTnBZWEpwYno1NGVIaDRlRHd2WkdWdWIyMXBibUY2YVc5dVpVSmxibVZtYVdOcFlYSnBiejRLSUNBZ0lEd3ZaVzUwWlVKbGJtVm1hV05wWVhKcGJ6NEtJQ0FnSUR4a1lYUnBWbVZ5YzJGdFpXNTBiejRLSUNBZ0lDQWdJQ0E4WkdGMFlVVnpaV04xZW1sdmJtVlFZV2RoYldWdWRHOCtNakF5TkMwd05DMHdPVHd2WkdGMFlVVnpaV04xZW1sdmJtVlFZV2RoYldWdWRHOCtDaUFnSUNBZ0lDQWdQR2x0Y0c5eWRHOVViM1JoYkdWRVlWWmxjbk5oY21VK05qQXdMakF3UEM5cGJYQnZjblJ2Vkc5MFlXeGxSR0ZXWlhKellYSmxQZ29nSUNBZ0lDQWdJRHgwYVhCdlZtVnljMkZ0Wlc1MGJ6NURVRHd2ZEdsd2IxWmxjbk5oYldWdWRHOCtDaUFnSUNBZ0lDQWdQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFabGNuTmhiV1Z1ZEc4K01ERXdNREF3TURBd01EQXdNREF5TkRFOEwybGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiMVpsY25OaGJXVnVkRzgrQ2lBZ0lDQWdJQ0FnUEdOdlpHbGpaVU52Ym5SbGMzUnZVR0ZuWVcxbGJuUnZQblF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TWpReFBDOWpiMlJwWTJWRGIyNTBaWE4wYjFCaFoyRnRaVzUwYno0S0lDQWdJQ0FnSUNBOFptbHliV0ZTYVdObGRuVjBZVDR3UEM5bWFYSnRZVkpwWTJWMmRYUmhQZ29nSUNBZ0lDQWdJRHhrWVhScFUybHVaMjlzYjFabGNuTmhiV1Z1ZEc4K0NpQWdJQ0FnSUNBZ0lDQWdJRHhwYlhCdmNuUnZVMmx1WjI5c2IxWmxjbk5oYldWdWRHOCtOakF3TGpBd1BDOXBiWEJ2Y25SdlUybHVaMjlzYjFabGNuTmhiV1Z1ZEc4K0NpQWdJQ0FnSUNBZ0lDQWdJRHhwWW1GdVFXTmpjbVZrYVhSdlBrbFVNVGhWTURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01Ud3ZhV0poYmtGalkzSmxaR2wwYno0S0lDQWdJQ0FnSUNBZ0lDQWdQR05oZFhOaGJHVldaWEp6WVcxbGJuUnZQbmg0ZUhoNGVIZzhMMk5oZFhOaGJHVldaWEp6WVcxbGJuUnZQZ29nSUNBZ0lDQWdJQ0FnSUNBOFpHRjBhVk53WldOcFptbGphVkpwYzJOdmMzTnBiMjVsUG5oNGVIaDRlSGc4TDJSaGRHbFRjR1ZqYVdacFkybFNhWE5qYjNOemFXOXVaVDRLSUNBZ0lDQWdJQ0E4TDJSaGRHbFRhVzVuYjJ4dlZtVnljMkZ0Wlc1MGJ6NEtJQ0FnSUR3dlpHRjBhVlpsY25OaGJXVnVkRzgrQ2p3dlVsQlVQZz09PC9ycHQ+CgkJCQk8L2VsZW1lbnRvTGlzdGFDYXJyZWxsb1JQVD4KCQkJPC9saXN0YVJQVD4KCQk8L3BwdDpwc3BJbnZpYUNhcnJlbGxvUlBUPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4=',
];

$data_resp = [
    ':id'                       => 247,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 10:45:35.197',
    ':tipoevento'               => 'pspInviaCarrelloRPT',
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
    ':sessionid'                => '',
    ':sessionidoriginal'        => 'session_id_original_000241',
    ':uniqueid'                 => 'T000247',
    ':payload'                  => 'PD94bWwgdmVyc2lvbj0nMS4wJyBlbmNvZGluZz0nVVRGLTgnPz4KPHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPgoJPHNvYXBlbnY6Qm9keT4KCQk8bnMyOnBzcEludmlhQ2FycmVsbG9SUFRSZXNwb25zZSB4bWxuczpuczI9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIj4KCQkJPHBzcEludmlhQ2FycmVsbG9SUFRSZXNwb25zZSB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIiB4c2k6dHlwZT0ibnMyOmVzaXRvUHNwSW52aWFDYXJyZWxsb1JQVCI+CgkJCQk8ZXNpdG9Db21wbGVzc2l2b09wZXJhemlvbmU+T0s8L2VzaXRvQ29tcGxlc3Npdm9PcGVyYXppb25lPgoJCQkJPGlkZW50aWZpY2F0aXZvQ2FycmVsbG8+eHh4eHh4eHh4eHh4eDwvaWRlbnRpZmljYXRpdm9DYXJyZWxsbz4KCQkJCTxwYXJhbWV0cmlQYWdhbWVudG9JbW1lZGlhdG8+aWRCcnVjaWF0dXJhPXh4dzIyPC9wYXJhbWV0cmlQYWdhbWVudG9JbW1lZGlhdG8+CgkJCTwvcHNwSW52aWFDYXJyZWxsb1JQVFJlc3BvbnNlPgoJCTwvbnMyOnBzcEludmlhQ2FycmVsbG9SUFRSZXNwb25zZT4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+',
];



Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);










$data_req = [
    ':id'                       => 248,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 10:45:10.197',
    ':tipoevento'               => 'nodoInoltraPagamentoMod1',
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
    ':sessionid'                => '',
    ':sessionidoriginal'        => 'session_id_original_000241',
    ':uniqueid'                 => 'T000248',
    ':payload'                  => 'ewogICAgImlkUGFnYW1lbnRvIjogIjIyYmRlYmYzLThjZTgtNDM4OS1iMDA0LWI4MjIyOTM4YmFmOCIsCiAgICAiaWRlbnRpZmljYXRpdm9DYW5hbGUiOiAiODg4ODg4ODg4ODhfMDEiLAogICAgImlkZW50aWZpY2F0aXZvSW50ZXJtZWRpYXJpbyI6ICI4ODg4ODg4ODg4OCIsCiAgICAiaWRlbnRpZmljYXRpdm9Qc3AiOiAiQUdJRF8wMSIsCiAgICAidGlwb09wZXJhemlvbmUiOiAid2ViIiwKICAgICJ0aXBvVmVyc2FtZW50byI6ICJCQlQiCn0=',
];

$data_resp = [
    ':id'                       => 249,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 10:45:55.197',
    ':tipoevento'               => 'nodoInoltraPagamentoMod1',
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
    ':sessionid'                => '',
    ':sessionidoriginal'        => 'session_id_original_000241',
    ':uniqueid'                 => 'T000249',
    ':payload'                  => 'eyJlc2l0byI6Ik9LIiwidXJsUmVkaXJlY3RQU1AiOiJodHRwczovL3dmZXNwLnBhZ29wYS5nb3YuaXQvcmVkaXJlY3Qvd3BsMDIvZ2V0P2lkU2Vzc2lvbj0xODgxYTJhMi0xNmMzLTRlMjktYjk1OS0wNmZmNzhkYTRjYmMifQ==',
];



Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);




















































$data_req = [
    ':id'                       => 250,
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
    ':sessionid'                => '',
    ':sessionidoriginal'        => 'session_id_original_000250',
    ':uniqueid'                 => 'T000250',
    ':payload'                  => 'PFNPQVAtRU5WOkVudmVsb3BlIHhtbG5zOlNPQVAtRU5WPSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyIgeG1sbnM6cHB0PSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOndzPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyI+Cgk8U09BUC1FTlY6SGVhZGVyPgoJCTxwcHQ6aW50ZXN0YXppb25lQ2FycmVsbG9QUFQ+CgkJCTxpZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QQT43Nzc3Nzc3Nzc3NzwvaWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUEE+CgkJCTxpZGVudGlmaWNhdGl2b1N0YXppb25lSW50ZXJtZWRpYXJpb1BBPjc3Nzc3Nzc3Nzc3XzAxPC9pZGVudGlmaWNhdGl2b1N0YXppb25lSW50ZXJtZWRpYXJpb1BBPgoJCQk8aWRlbnRpZmljYXRpdm9DYXJyZWxsbz5jMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDI0MjwvaWRlbnRpZmljYXRpdm9DYXJyZWxsbz4KCQk8L3BwdDppbnRlc3RhemlvbmVDYXJyZWxsb1BQVD4KCTwvU09BUC1FTlY6SGVhZGVyPgoJPFNPQVAtRU5WOkJvZHk+CgkJPG5zMzpub2RvSW52aWFDYXJyZWxsb1JQVCB4bWxuczpuczM9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIj4KCQkJPHBhc3N3b3JkPlBMQUNFSE9MREVSPC9wYXNzd29yZD4KCQkJPGlkZW50aWZpY2F0aXZvUFNQPkFHSURfMDE8L2lkZW50aWZpY2F0aXZvUFNQPgoJCQk8aWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUFNQPjg4ODg4ODg4ODg4PC9pZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QU1A+CgkJCTxpZGVudGlmaWNhdGl2b0NhbmFsZT44ODg4ODg4ODg4OF8wMTwvaWRlbnRpZmljYXRpdm9DYW5hbGU+CgkJCTxsaXN0YVJQVD4KCQkJCTxlbGVtZW50b0xpc3RhUlBUPgoJCQkJCTxpZGVudGlmaWNhdGl2b0RvbWluaW8+Nzc3Nzc3Nzc3Nzc8L2lkZW50aWZpY2F0aXZvRG9taW5pbz4KCQkJCQk8aWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4wMTAwMDAwMDAwMDAwMDI0MjwvaWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4KCQkJCQk8Y29kaWNlQ29udGVzdG9QYWdhbWVudG8+dDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAyNDI8L2NvZGljZUNvbnRlc3RvUGFnYW1lbnRvPgoJCQkJCTxycHQ+UEZKUVZDQjRiV3h1Y3owaWFIUjBjRG92TDNkM2R5NWthV2RwZEhCaExtZHZkaTVwZEM5elkyaGxiV0Z6THpJd01URXZVR0ZuWVcxbGJuUnBMeUkrQ2drOGRtVnljMmx2Ym1WUFoyZGxkSFJ2UGpFdU1Ed3ZkbVZ5YzJsdmJtVlBaMmRsZEhSdlBnb0pQR1J2YldsdWFXOCtDZ2tKUEdsa1pXNTBhV1pwWTJGMGFYWnZSRzl0YVc1cGJ6NDNOemMzTnpjM056YzNOend2YVdSbGJuUnBabWxqWVhScGRtOUViMjFwYm1sdlBnb0pQQzlrYjIxcGJtbHZQZ29KUEdsa1pXNTBhV1pwWTJGMGFYWnZUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQakl3TWpNeE1qRTFNREV3TVRVek9XRmlZbUV6TXpVdFlXSTBaUzAwWkRFNExXRXpQQzlwWkdWdWRHbG1hV05oZEdsMmIwMWxjM05oWjJkcGIxSnBZMmhwWlhOMFlUNEtDVHhrWVhSaFQzSmhUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQakl3TWpNdE1USXRNVFZVTVRNNk1ERTZOVE11TmpFNUt6QXhPakF3UEM5a1lYUmhUM0poVFdWemMyRm5aMmx2VW1samFHbGxjM1JoUGdvSlBHRjFkR1Z1ZEdsallYcHBiMjVsVTI5bloyVjBkRzgrVGk5QlBDOWhkWFJsYm5ScFkyRjZhVzl1WlZOdloyZGxkSFJ2UGdvSlBITnZaMmRsZEhSdlZtVnljMkZ1ZEdVK0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFabGNuTmhiblJsUGdvSkNRazhkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NUhQQzkwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1FrOFkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBqYzNOemMzTnpjM056YzNQQzlqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSlBDOXBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlXWlhKellXNTBaVDRLQ1FrOFlXNWhaM0poWm1sallWWmxjbk5oYm5SbFBuaDRlSGg0ZUhoNGVEd3ZZVzVoWjNKaFptbGpZVlpsY25OaGJuUmxQZ29KUEM5emIyZG5aWFIwYjFabGNuTmhiblJsUGdvSlBITnZaMmRsZEhSdlVHRm5ZWFJ2Y21VK0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFCaFoyRjBiM0psUGdvSkNRazhkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NUhQQzkwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1FrOFkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBqYzNOemMzTnpjM056YzNQQzlqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSlBDOXBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlRWVdkaGRHOXlaVDRLQ1FrOFlXNWhaM0poWm1sallWQmhaMkYwYjNKbFBuaDRlSGg0ZUhoNGVEd3ZZVzVoWjNKaFptbGpZVkJoWjJGMGIzSmxQZ29KUEM5emIyZG5aWFIwYjFCaFoyRjBiM0psUGdvSlBHVnVkR1ZDWlc1bFptbGphV0Z5YVc4K0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjBKbGJtVm1hV05wWVhKcGJ6NEtDUWtKUEhScGNHOUpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrUnp3dmRHbHdiMGxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno0S0NRa0pQR052WkdsalpVbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejQzTnpjM056YzNOemMzTnp3dlkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBnb0pDVHd2YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlFtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4a1pXNXZiV2x1WVhwcGIyNWxRbVZ1WldacFkybGhjbWx2UG5oNGVIaDRlSGc4TDJSbGJtOXRhVzVoZW1sdmJtVkNaVzVsWm1samFXRnlhVzgrQ2drSlBHTnZaR2xqWlZWdWFYUlBjR1Z5UW1WdVpXWnBZMmxoY21sdlBuaDRQQzlqYjJScFkyVlZibWwwVDNCbGNrSmxibVZtYVdOcFlYSnBiejRLQ1FrOFpHVnViMjFWYm1sMFQzQmxja0psYm1WbWFXTnBZWEpwYno1NGVIaDRlSGc4TDJSbGJtOXRWVzVwZEU5d1pYSkNaVzVsWm1samFXRnlhVzgrQ2drSlBHbHVaR2x5YVhwNmIwSmxibVZtYVdOcFlYSnBiejU0ZUhoNFBDOXBibVJwY21sNmVtOUNaVzVsWm1samFXRnlhVzgrQ2drSlBHTnBkbWxqYjBKbGJtVm1hV05wWVhKcGJ6NTRlSGc4TDJOcGRtbGpiMEpsYm1WbWFXTnBZWEpwYno0S0NRazhZMkZ3UW1WdVpXWnBZMmxoY21sdlBuaDRlSGg0UEM5allYQkNaVzVsWm1samFXRnlhVzgrQ2drSlBHeHZZMkZzYVhSaFFtVnVaV1pwWTJsaGNtbHZQbmg0ZUhnOEwyeHZZMkZzYVhSaFFtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4d2NtOTJhVzVqYVdGQ1pXNWxabWxqYVdGeWFXOCtlSGc4TDNCeWIzWnBibU5wWVVKbGJtVm1hV05wWVhKcGJ6NEtDUWs4Ym1GNmFXOXVaVUpsYm1WbWFXTnBZWEpwYno1NGVEd3ZibUY2YVc5dVpVSmxibVZtYVdOcFlYSnBiejRLQ1R3dlpXNTBaVUpsYm1WbWFXTnBZWEpwYno0S0NUeGtZWFJwVm1WeWMyRnRaVzUwYno0S0NRazhaR0YwWVVWelpXTjFlbWx2Ym1WUVlXZGhiV1Z1ZEc4K01qQXlNeTB4TWkweE5Tc3dNVG93TUR3dlpHRjBZVVZ6WldOMWVtbHZibVZRWVdkaGJXVnVkRzgrQ2drSlBHbHRjRzl5ZEc5VWIzUmhiR1ZFWVZabGNuTmhjbVUrTmpBd0xqQXdQQzlwYlhCdmNuUnZWRzkwWVd4bFJHRldaWEp6WVhKbFBnb0pDVHgwYVhCdlZtVnljMkZ0Wlc1MGJ6NUNRbFE4TDNScGNHOVdaWEp6WVcxbGJuUnZQZ29KQ1R4cFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOVdaWEp6WVcxbGJuUnZQakF4TURBd01EQXdNREF3TURBd01qUXlQQzlwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5V1pYSnpZVzFsYm5SdlBnb0pDVHhqYjJScFkyVkRiMjUwWlhOMGIxQmhaMkZ0Wlc1MGJ6NTBNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREkwTWp3dlkyOWthV05sUTI5dWRHVnpkRzlRWVdkaGJXVnVkRzgrQ2drSlBHWnBjbTFoVW1salpYWjFkR0UrTUR3dlptbHliV0ZTYVdObGRuVjBZVDRLQ1FrOFpHRjBhVk5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KQ1FrOGFXMXdiM0owYjFOcGJtZHZiRzlXWlhKellXMWxiblJ2UGpZd01DNHdNRHd2YVcxd2IzSjBiMU5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KQ1FrOGFXSmhia0ZqWTNKbFpHbDBiejVKVkRFNFZUQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNVEE4TDJsaVlXNUJZMk55WldScGRHOCtDZ2tKQ1R4allYVnpZV3hsVm1WeWMyRnRaVzUwYno1NGVIaDRlSGg0UEM5allYVnpZV3hsVm1WeWMyRnRaVzUwYno0S0NRa0pQR1JoZEdsVGNHVmphV1pwWTJsU2FYTmpiM056YVc5dVpUNTRlSGg0ZUhoNFBDOWtZWFJwVTNCbFkybG1hV05wVW1selkyOXpjMmx2Ym1VK0Nna0pQQzlrWVhScFUybHVaMjlzYjFabGNuTmhiV1Z1ZEc4K0NnazhMMlJoZEdsV1pYSnpZVzFsYm5SdlBnbzhMMUpRVkQ0PTwvcnB0PgoJCQkJPC9lbGVtZW50b0xpc3RhUlBUPgoJCQk8L2xpc3RhUlBUPgoJCQk8bXVsdGlCZW5lZmljaWFyaW8+ZmFsc2U8L211bHRpQmVuZWZpY2lhcmlvPgoJCTwvbnMzOm5vZG9JbnZpYUNhcnJlbGxvUlBUPgoJPC9TT0FQLUVOVjpCb2R5Pgo8L1NPQVAtRU5WOkVudmVsb3BlPg==',
];

$data_resp = [
    ':id'                       => 251,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 10:42:00.197',
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
    ':sessionid'                => '',
    ':sessionidoriginal'        => 'session_id_original_000250',
    ':uniqueid'                 => 'T000251',
    ':payload'                  => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpwcHQ9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIiB4bWxuczpwcHRoZWFkPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIiB4bWxuczp0bnM9Imh0dHA6Ly9Ob2RvUGFnYW1lbnRpU1BDLnNwY29vcC5nb3YuaXQvc2Vydml6aS9QYWdhbWVudGlUZWxlbWF0aWNpUlBUIiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBwdDpub2RvSW52aWFDYXJyZWxsb1JQVFJpc3Bvc3RhPgoJCQk8ZXNpdG9Db21wbGVzc2l2b09wZXJhemlvbmU+T0s8L2VzaXRvQ29tcGxlc3Npdm9PcGVyYXppb25lPgoJCQk8dXJsPmh0dHBzOi8vd2lzcDIucGFnb3BhLmdvdi5pdC93YWxsZXQvd2VsY29tZT9pZFNlc3Npb249NjA2N2FiMGItMGIxNi00NDVhLThlN2MtZGVkZGQ3Y2IxYzZiPC91cmw+CgkJPC9wcHQ6bm9kb0ludmlhQ2FycmVsbG9SUFRSaXNwb3N0YT4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+',
];



Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);







$data_req = [
    ':id'                       => 252,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 10:45:30.197',
    ':tipoevento'               => 'pspInviaCarrelloRPT',
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
    ':sessionid'                => '',
    ':sessionidoriginal'        => 'session_id_original_000250',
    ':uniqueid'                 => 'T000252',
    ':payload'                  => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpwYXlfaj0iaHR0cDovL3d3dy5jbmlwYS5nb3YuaXQvc2NoZW1hcy8yMDEwL1BhZ2FtZW50aS9BY2tfMV8wLyIgeG1sbnM6cHB0PSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnRucz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0IiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBwdDpwc3BJbnZpYUNhcnJlbGxvUlBUPgoJCQk8aWRlbnRpZmljYXRpdm9QU1A+UFNQX1JQVDwvaWRlbnRpZmljYXRpdm9QU1A+CgkJCTxpZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QU1A+ODg4ODg4ODg4ODg8L2lkZW50aWZpY2F0aXZvSW50ZXJtZWRpYXJpb1BTUD4KCQkJPGlkZW50aWZpY2F0aXZvQ2FuYWxlPjg4ODg4ODg4ODg4XzAxPC9pZGVudGlmaWNhdGl2b0NhbmFsZT4KCQkJPG1vZGVsbG9QYWdhbWVudG8+MTwvbW9kZWxsb1BhZ2FtZW50bz4KCQkJPGxpc3RhUlBUPgoJCQkJPGVsZW1lbnRvTGlzdGFDYXJyZWxsb1JQVD4KCQkJCQk8aWRlbnRpZmljYXRpdm9Eb21pbmlvPjc3Nzc3Nzc3Nzc3PC9pZGVudGlmaWNhdGl2b0RvbWluaW8+CgkJCQkJPGlkZW50aWZpY2F0aXZvVW5pdm9jb1ZlcnNhbWVudG8+MDEwMDAwMDAwMDAwMDAyNDI8L2lkZW50aWZpY2F0aXZvVW5pdm9jb1ZlcnNhbWVudG8+CgkJCQkJPGNvZGljZUNvbnRlc3RvUGFnYW1lbnRvPnQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMjQyPC9jb2RpY2VDb250ZXN0b1BhZ2FtZW50bz4KCQkJCQk8cnB0PlBGSlFWQ0I0Yld4dWN6MGlhSFIwY0RvdkwzZDNkeTVrYVdkcGRIQmhMbWR2ZGk1cGRDOXpZMmhsYldGekx6SXdNVEV2VUdGbllXMWxiblJwTHlJK0NpQWdJQ0E4ZG1WeWMybHZibVZQWjJkbGRIUnZQall1TWk0d1BDOTJaWEp6YVc5dVpVOW5aMlYwZEc4K0NpQWdJQ0E4Wkc5dGFXNXBiejRLSUNBZ0lDQWdJQ0E4YVdSbGJuUnBabWxqWVhScGRtOUViMjFwYm1sdlBqYzNOemMzTnpjM056YzNQQzlwWkdWdWRHbG1hV05oZEdsMmIwUnZiV2x1YVc4K0NpQWdJQ0FnSUNBZ1BHbGtaVzUwYVdacFkyRjBhWFp2VTNSaGVtbHZibVZTYVdOb2FXVmtaVzUwWlQ0M056YzNOemMzTnpjM04xOHdNVHd2YVdSbGJuUnBabWxqWVhScGRtOVRkR0Y2YVc5dVpWSnBZMmhwWldSbGJuUmxQZ29nSUNBZ1BDOWtiMjFwYm1sdlBnb2dJQ0FnUEdsa1pXNTBhV1pwWTJGMGFYWnZUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQbVl6WldNek5tUmlOemhrWVRRME5HWmhZalJqWmpCbU9UQTRPV0ptWkRrd1BDOXBaR1Z1ZEdsbWFXTmhkR2wyYjAxbGMzTmhaMmRwYjFKcFkyaHBaWE4wWVQ0S0lDQWdJRHhrWVhSaFQzSmhUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQakl3TWpRdE1EUXRNRGxVTWpFNk5UTTZNelk4TDJSaGRHRlBjbUZOWlhOellXZG5hVzlTYVdOb2FXVnpkR0UrQ2lBZ0lDQThZWFYwWlc1MGFXTmhlbWx2Ym1WVGIyZG5aWFIwYno1NGVIZzhMMkYxZEdWdWRHbGpZWHBwYjI1bFUyOW5aMlYwZEc4K0NpQWdJQ0E4YzI5bloyVjBkRzlRWVdkaGRHOXlaVDRLSUNBZ0lDQWdJQ0E4YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlVHRm5ZWFJ2Y21VK0NpQWdJQ0FnSUNBZ0lDQWdJRHgwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQbmc4TDNScGNHOUpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2lBZ0lDQWdJQ0FnSUNBZ0lEeGpiMlJwWTJWSlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtlSGg0ZUhoNGVEd3ZZMjlrYVdObFNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29nSUNBZ0lDQWdJRHd2YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlVHRm5ZWFJ2Y21VK0NpQWdJQ0FnSUNBZ1BHRnVZV2R5WVdacFkyRlFZV2RoZEc5eVpUNTRlSGg0ZUR3dllXNWhaM0poWm1sallWQmhaMkYwYjNKbFBnb2dJQ0FnSUNBZ0lEeHVZWHBwYjI1bFVHRm5ZWFJ2Y21VK1NWUThMMjVoZW1sdmJtVlFZV2RoZEc5eVpUNEtJQ0FnSUNBZ0lDQThaUzF0WVdsc1VHRm5ZWFJ2Y21VK2VIaDRlSGhBZUhoNGVDNWpiMjA4TDJVdGJXRnBiRkJoWjJGMGIzSmxQZ29nSUNBZ1BDOXpiMmRuWlhSMGIxQmhaMkYwYjNKbFBnb2dJQ0FnUEdWdWRHVkNaVzVsWm1samFXRnlhVzgrQ2lBZ0lDQWdJQ0FnUEdsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amIwSmxibVZtYVdOcFlYSnBiejRLSUNBZ0lDQWdJQ0FnSUNBZ1BIUnBjRzlKWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI4K1J6d3ZkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NEtJQ0FnSUNBZ0lDQWdJQ0FnUEdOdlpHbGpaVWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno1NGVIaDRlSGc4TDJOdlpHbGpaVWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno0S0lDQWdJQ0FnSUNBOEwybGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiMEpsYm1WbWFXTnBZWEpwYno0S0lDQWdJQ0FnSUNBOFpHVnViMjFwYm1GNmFXOXVaVUpsYm1WbWFXTnBZWEpwYno1NGVIaDRlRHd2WkdWdWIyMXBibUY2YVc5dVpVSmxibVZtYVdOcFlYSnBiejRLSUNBZ0lEd3ZaVzUwWlVKbGJtVm1hV05wWVhKcGJ6NEtJQ0FnSUR4a1lYUnBWbVZ5YzJGdFpXNTBiejRLSUNBZ0lDQWdJQ0E4WkdGMFlVVnpaV04xZW1sdmJtVlFZV2RoYldWdWRHOCtNakF5TkMwd05DMHdPVHd2WkdGMFlVVnpaV04xZW1sdmJtVlFZV2RoYldWdWRHOCtDaUFnSUNBZ0lDQWdQR2x0Y0c5eWRHOVViM1JoYkdWRVlWWmxjbk5oY21VK05qQXdMakF3UEM5cGJYQnZjblJ2Vkc5MFlXeGxSR0ZXWlhKellYSmxQZ29nSUNBZ0lDQWdJRHgwYVhCdlZtVnljMkZ0Wlc1MGJ6NURVRHd2ZEdsd2IxWmxjbk5oYldWdWRHOCtDaUFnSUNBZ0lDQWdQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFabGNuTmhiV1Z1ZEc4K01ERXdNREF3TURBd01EQXdNREF5TkRJOEwybGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiMVpsY25OaGJXVnVkRzgrQ2lBZ0lDQWdJQ0FnUEdOdlpHbGpaVU52Ym5SbGMzUnZVR0ZuWVcxbGJuUnZQblF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TWpReVBDOWpiMlJwWTJWRGIyNTBaWE4wYjFCaFoyRnRaVzUwYno0S0lDQWdJQ0FnSUNBOFptbHliV0ZTYVdObGRuVjBZVDR3UEM5bWFYSnRZVkpwWTJWMmRYUmhQZ29nSUNBZ0lDQWdJRHhrWVhScFUybHVaMjlzYjFabGNuTmhiV1Z1ZEc4K0NpQWdJQ0FnSUNBZ0lDQWdJRHhwYlhCdmNuUnZVMmx1WjI5c2IxWmxjbk5oYldWdWRHOCtOakF3TGpBd1BDOXBiWEJ2Y25SdlUybHVaMjlzYjFabGNuTmhiV1Z1ZEc4K0NpQWdJQ0FnSUNBZ0lDQWdJRHhwWW1GdVFXTmpjbVZrYVhSdlBrbFVNVGhWTURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01Ud3ZhV0poYmtGalkzSmxaR2wwYno0S0lDQWdJQ0FnSUNBZ0lDQWdQR05oZFhOaGJHVldaWEp6WVcxbGJuUnZQbmg0ZUhoNGVIZzhMMk5oZFhOaGJHVldaWEp6WVcxbGJuUnZQZ29nSUNBZ0lDQWdJQ0FnSUNBOFpHRjBhVk53WldOcFptbGphVkpwYzJOdmMzTnBiMjVsUG5oNGVIaDRlSGc4TDJSaGRHbFRjR1ZqYVdacFkybFNhWE5qYjNOemFXOXVaVDRLSUNBZ0lDQWdJQ0E4TDJSaGRHbFRhVzVuYjJ4dlZtVnljMkZ0Wlc1MGJ6NEtJQ0FnSUR3dlpHRjBhVlpsY25OaGJXVnVkRzgrQ2p3dlVsQlVQZz09PC9ycHQ+CgkJCQk8L2VsZW1lbnRvTGlzdGFDYXJyZWxsb1JQVD4KCQkJPC9saXN0YVJQVD4KCQk8L3BwdDpwc3BJbnZpYUNhcnJlbGxvUlBUPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4=',
];

$data_resp = [
    ':id'                       => 253,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 10:45:35.197',
    ':tipoevento'               => 'pspInviaCarrelloRPT',
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
    ':sessionid'                => '',
    ':sessionidoriginal'        => 'session_id_original_000250',
    ':uniqueid'                 => 'T000253',
    ':payload'                  => 'PD94bWwgdmVyc2lvbj0nMS4wJyBlbmNvZGluZz0nVVRGLTgnPz4KPHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPgoJPHNvYXBlbnY6Qm9keT4KCQk8bnMyOnBzcEludmlhQ2FycmVsbG9SUFRSZXNwb25zZSB4bWxuczpuczI9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIj4KCQkJPHBzcEludmlhQ2FycmVsbG9SUFRSZXNwb25zZSB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIiB4c2k6dHlwZT0ibnMyOmVzaXRvUHNwSW52aWFDYXJyZWxsb1JQVCI+CgkJCQk8ZXNpdG9Db21wbGVzc2l2b09wZXJhemlvbmU+T0s8L2VzaXRvQ29tcGxlc3Npdm9PcGVyYXppb25lPgoJCQkJPGlkZW50aWZpY2F0aXZvQ2FycmVsbG8+eHh4eHh4eHh4eHh4eDwvaWRlbnRpZmljYXRpdm9DYXJyZWxsbz4KCQkJCTxwYXJhbWV0cmlQYWdhbWVudG9JbW1lZGlhdG8+aWRCcnVjaWF0dXJhPXh4dzIyPC9wYXJhbWV0cmlQYWdhbWVudG9JbW1lZGlhdG8+CgkJCTwvcHNwSW52aWFDYXJyZWxsb1JQVFJlc3BvbnNlPgoJCTwvbnMyOnBzcEludmlhQ2FycmVsbG9SUFRSZXNwb25zZT4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+',
];



Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);







$data_req = [
    ':id'                       => 254,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 10:45:40.197',
    ':tipoevento'               => 'nodoChiediCopiaRT',
    ':sottotipoevento'          => 'REQ',
    ':iddominio'                => '77777777777',
    ':iuv'                      => '01000000000000242',
    ':ccp'                      => 't0000000000000000000000000000242',
    ':noticenumber'             => '',
    ':creditorreferenceid'      => '01000000000000242',
    ':paymenttoken'             => 't0000000000000000000000000000242',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_254',
    ':sessionidoriginal'        => '',
    ':uniqueid'                 => 'T000254',
    ':payload'                  => 'PHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzZD0iaHR0cDovL3d3dy53My5vcmcvMjAwMS9YTUxTY2hlbWEiIHhtbG5zOnhzaT0iaHR0cDovL3d3dy53My5vcmcvMjAwMS9YTUxTY2hlbWEtaW5zdGFuY2UiPgoJPHNvYXBlbnY6Qm9keT4KCQk8bm9kb0NoaWVkaUNvcGlhUlQgeG1sbnM9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIj4KCQkJPGlkZW50aWZpY2F0aXZvSW50ZXJtZWRpYXJpb1BBIHhtbG5zPSIiPjc3Nzc3Nzc3Nzc3PC9pZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QQT4KCQkJPGlkZW50aWZpY2F0aXZvU3RhemlvbmVJbnRlcm1lZGlhcmlvUEEgeG1sbnM9IiI+Nzc3Nzc3Nzc3NzdfMDE8L2lkZW50aWZpY2F0aXZvU3RhemlvbmVJbnRlcm1lZGlhcmlvUEE+CgkJCTxwYXNzd29yZCB4bWxucz0iIj5QTEFDRUhPTERFUjwvcGFzc3dvcmQ+CgkJCTxpZGVudGlmaWNhdGl2b0RvbWluaW8geG1sbnM9IiI+Nzc3Nzc3Nzc3Nzc8L2lkZW50aWZpY2F0aXZvRG9taW5pbz4KCQkJPGlkZW50aWZpY2F0aXZvVW5pdm9jb1ZlcnNhbWVudG8geG1sbnM9IiI+MDEwMDAwMDAwMDAwMDAyNDI8L2lkZW50aWZpY2F0aXZvVW5pdm9jb1ZlcnNhbWVudG8+CgkJCTxjb2RpY2VDb250ZXN0b1BhZ2FtZW50byB4bWxucz0iIj50MDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDI0MjwvY29kaWNlQ29udGVzdG9QYWdhbWVudG8+CgkJPC9ub2RvQ2hpZWRpQ29waWFSVD4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+',
];

$data_resp = [
    ':id'                       => 255,
    ':date_event'               => '2024-03-10',
    ':inserted_timestamp'       => '2024-03-10 10:45:55.197',
    ':tipoevento'               => 'nodoChiediCopiaRT',
    ':sottotipoevento'          => 'RESP',
    ':iddominio'                => '77777777777',
    ':iuv'                      => '01000000000000242',
    ':ccp'                      => 't0000000000000000000000000000242',
    ':noticenumber'             => '',
    ':creditorreferenceid'      => '01000000000000242',
    ':paymenttoken'             => 't0000000000000000000000000000242',
    ':psp'                      => 'AGID_01',
    ':stazione'                 => '77777777777_01',
    ':canale'                   => '88888888888_01',
    ':sessionid'                => 'sessid_254',
    ':sessionidoriginal'        => '',
    ':uniqueid'                 => 'T000255',
    ':payload'                  => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpwcHQ9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIiB4bWxuczpwcHRoZWFkPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIiB4bWxuczp0bnM9Imh0dHA6Ly9Ob2RvUGFnYW1lbnRpU1BDLnNwY29vcC5nb3YuaXQvc2Vydml6aS9QYWdhbWVudGlUZWxlbWF0aWNpUlBUIiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBwdDpub2RvQ2hpZWRpQ29waWFSVFJpc3Bvc3RhPgoJCQk8cnQ+UEQ5NGJXd2dkbVZ5YzJsdmJqMGlNUzR3SWlCbGJtTnZaR2x1WnowaVZWUkdMVGdpUHo0S1BIQmhlVjlwT2xKVUlIaHRiRzV6T25CaGVWOXBQU0pvZEhSd09pOHZkM2QzTG1ScFoybDBjR0V1WjI5MkxtbDBMM05qYUdWdFlYTXZNakF4TVM5UVlXZGhiV1Z1ZEdrdklpQjRiV3h1Y3pwNGMyazlJbWgwZEhBNkx5OTNkM2N1ZHpNdWIzSm5Mekl3TURFdldFMU1VMk5vWlcxaExXbHVjM1JoYm1ObElpQjRjMms2YzJOb1pXMWhURzlqWVhScGIyNDlJaTl2Y0hRdmNITndZWGhsY0hSaEwzSmxjMjkxY21ObGN5OVFZV2RKYm1aZlVsQlVYMUpVWHpaZk1sOHdMbmh6WkNJK0NnazhjR0Y1WDJrNmRtVnljMmx2Ym1WUFoyZGxkSFJ2UGpZdU1pNHdQQzl3WVhsZmFUcDJaWEp6YVc5dVpVOW5aMlYwZEc4K0NnazhjR0Y1WDJrNlpHOXRhVzVwYno0S0NRazhjR0Y1WDJrNmFXUmxiblJwWm1sallYUnBkbTlFYjIxcGJtbHZQamMzTnpjM056YzNOemMzUEM5d1lYbGZhVHBwWkdWdWRHbG1hV05oZEdsMmIwUnZiV2x1YVc4K0Nna0pQSEJoZVY5cE9tbGtaVzUwYVdacFkyRjBhWFp2VTNSaGVtbHZibVZTYVdOb2FXVmtaVzUwWlQ0M056YzNOemMzTnpjM04xOHdNVHd2Y0dGNVgyazZhV1JsYm5ScFptbGpZWFJwZG05VGRHRjZhVzl1WlZKcFkyaHBaV1JsYm5SbFBnb0pQQzl3WVhsZmFUcGtiMjFwYm1sdlBnb0pQSEJoZVY5cE9tbGtaVzUwYVdacFkyRjBhWFp2VFdWemMyRm5aMmx2VW1salpYWjFkR0UrYzJSbVpEazRaSGR2Wm1wa2EyeHNNak5sT0hOaGMyUnpZVHd2Y0dGNVgyazZhV1JsYm5ScFptbGpZWFJwZG05TlpYTnpZV2RuYVc5U2FXTmxkblYwWVQ0S0NUeHdZWGxmYVRwa1lYUmhUM0poVFdWemMyRm5aMmx2VW1salpYWjFkR0UrTWpBeU5DMHdOUzB4TTFReU1Ub3lORG95TlR3dmNHRjVYMms2WkdGMFlVOXlZVTFsYzNOaFoyZHBiMUpwWTJWMmRYUmhQZ29KUEhCaGVWOXBPbkpwWm1WeWFXMWxiblJ2VFdWemMyRm5aMmx2VW1samFHbGxjM1JoUGpJeU5ESXpORE16TVR3dmNHRjVYMms2Y21sbVpYSnBiV1Z1ZEc5TlpYTnpZV2RuYVc5U2FXTm9hV1Z6ZEdFK0NnazhjR0Y1WDJrNmNtbG1aWEpwYldWdWRHOUVZWFJoVW1samFHbGxjM1JoUGpJd01qUXRNRFV0TVRNOEwzQmhlVjlwT25KcFptVnlhVzFsYm5SdlJHRjBZVkpwWTJocFpYTjBZVDRLQ1R4d1lYbGZhVHBwYzNScGRIVjBiMEYwZEdWemRHRnVkR1UrQ2drSlBIQmhlVjlwT21sa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amIwRjBkR1Z6ZEdGdWRHVStDZ2tKQ1R4d1lYbGZhVHAwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQa0k4TDNCaGVWOXBPblJwY0c5SlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtDZ2tKQ1R4d1lYbGZhVHBqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrUVVkSlJGOHdNVHd2Y0dGNVgyazZZMjlrYVdObFNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1R3dmNHRjVYMms2YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlFYUjBaWE4wWVc1MFpUNEtDUWs4Y0dGNVgyazZaR1Z1YjIxcGJtRjZhVzl1WlVGMGRHVnpkR0Z1ZEdVK1RXOWpheUJRVTFBOEwzQmhlVjlwT21SbGJtOXRhVzVoZW1sdmJtVkJkSFJsYzNSaGJuUmxQZ29KUEM5d1lYbGZhVHBwYzNScGRIVjBiMEYwZEdWemRHRnVkR1UrQ2drOGNHRjVYMms2Wlc1MFpVSmxibVZtYVdOcFlYSnBiejRLQ1FrOGNHRjVYMms2YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlFtVnVaV1pwWTJsaGNtbHZQZ29KQ1FrOGNHRjVYMms2ZEdsd2IwbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejVIUEM5d1lYbGZhVHAwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1FrOGNHRjVYMms2WTI5a2FXTmxTV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52UGpnNE9EZzRPRGc0T0RnNFBDOXdZWGxmYVRwamIyUnBZMlZKWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI4K0Nna0pQQzl3WVhsZmFUcHBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlDWlc1bFptbGphV0Z5YVc4K0Nna0pQSEJoZVY5cE9tUmxibTl0YVc1aGVtbHZibVZDWlc1bFptbGphV0Z5YVc4K1EyOXRkVzVsUEM5d1lYbGZhVHBrWlc1dmJXbHVZWHBwYjI1bFFtVnVaV1pwWTJsaGNtbHZQZ29KUEM5d1lYbGZhVHBsYm5SbFFtVnVaV1pwWTJsaGNtbHZQZ29KUEhCaGVWOXBPbk52WjJkbGRIUnZWbVZ5YzJGdWRHVStDZ2tKUEhCaGVWOXBPbWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFabGNuTmhiblJsUGdvSkNRazhjR0Y1WDJrNmRHbHdiMGxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno1R1BDOXdZWGxmYVRwMGFYQnZTV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52UGdvSkNRazhjR0Y1WDJrNlkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBuaDRlSGg0ZUhoNGVIaDRlSGg0ZUhnOEwzQmhlVjlwT21OdlpHbGpaVWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno0S0NRazhMM0JoZVY5cE9tbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiMVpsY25OaGJuUmxQZ29KQ1R4d1lYbGZhVHBoYm1GbmNtRm1hV05oVm1WeWMyRnVkR1UrZUhoNGVIaDRQQzl3WVhsZmFUcGhibUZuY21GbWFXTmhWbVZ5YzJGdWRHVStDZ2tKUEhCaGVWOXBPbWx1WkdseWFYcDZiMVpsY25OaGJuUmxQbmg0ZUhoNGVEd3ZjR0Y1WDJrNmFXNWthWEpwZW5wdlZtVnljMkZ1ZEdVK0Nna0pQSEJoZVY5cE9teHZZMkZzYVhSaFZtVnljMkZ1ZEdVK2VIaDRlRHd2Y0dGNVgyazZiRzlqWVd4cGRHRldaWEp6WVc1MFpUNEtDUWs4Y0dGNVgyazZjSEp2ZG1sdVkybGhWbVZ5YzJGdWRHVStlSGg0ZUR3dmNHRjVYMms2Y0hKdmRtbHVZMmxoVm1WeWMyRnVkR1UrQ2drSlBIQmhlVjlwT201aGVtbHZibVZXWlhKellXNTBaVDU0ZUhoNGVIZzhMM0JoZVY5cE9tNWhlbWx2Ym1WV1pYSnpZVzUwWlQ0S0NRazhjR0Y1WDJrNlpTMXRZV2xzVm1WeWMyRnVkR1UrZUhoNGVIaDRlRHd2Y0dGNVgyazZaUzF0WVdsc1ZtVnljMkZ1ZEdVK0NnazhMM0JoZVY5cE9uTnZaMmRsZEhSdlZtVnljMkZ1ZEdVK0NnazhjR0Y1WDJrNmMyOW5aMlYwZEc5UVlXZGhkRzl5WlQ0S0NRazhjR0Y1WDJrNmFXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZVR0ZuWVhSdmNtVStDZ2tKQ1R4d1lYbGZhVHAwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQa1k4TDNCaGVWOXBPblJwY0c5SlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtDZ2tKQ1R4d1lYbGZhVHBqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrZUhoNGVIaDRlSGg0ZUhoNGVEd3ZjR0Y1WDJrNlkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBnb0pDVHd2Y0dGNVgyazZhV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52VUdGbllYUnZjbVUrQ2drSlBIQmhlVjlwT21GdVlXZHlZV1pwWTJGUVlXZGhkRzl5WlQ1NGVIaDRlSGg0ZUhnOEwzQmhlVjlwT21GdVlXZHlZV1pwWTJGUVlXZGhkRzl5WlQ0S0NUd3ZjR0Y1WDJrNmMyOW5aMlYwZEc5UVlXZGhkRzl5WlQ0S0NUeHdZWGxmYVRwa1lYUnBVR0ZuWVcxbGJuUnZQZ29KQ1R4d1lYbGZhVHBqYjJScFkyVkZjMmwwYjFCaFoyRnRaVzUwYno0d1BDOXdZWGxmYVRwamIyUnBZMlZGYzJsMGIxQmhaMkZ0Wlc1MGJ6NEtDUWs4Y0dGNVgyazZhVzF3YjNKMGIxUnZkR0ZzWlZCaFoyRjBiejQ1TUM0d01Ed3ZjR0Y1WDJrNmFXMXdiM0owYjFSdmRHRnNaVkJoWjJGMGJ6NEtDUWs4Y0dGNVgyazZhV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52Vm1WeWMyRnRaVzUwYno0d01UQXdNREF3TURBd01EQXdNREkwTWp3dmNHRjVYMms2YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlZtVnljMkZ0Wlc1MGJ6NEtDUWs4Y0dGNVgyazZRMjlrYVdObFEyOXVkR1Z6ZEc5UVlXZGhiV1Z1ZEc4K2REQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01EQXlOREk4TDNCaGVWOXBPa052WkdsalpVTnZiblJsYzNSdlVHRm5ZVzFsYm5SdlBnb0pDVHh3WVhsZmFUcGtZWFJwVTJsdVoyOXNiMUJoWjJGdFpXNTBiejRLQ1FrSlBIQmhlVjlwT25OcGJtZHZiRzlKYlhCdmNuUnZVR0ZuWVhSdlBqa3dMakF3UEM5d1lYbGZhVHB6YVc1bmIyeHZTVzF3YjNKMGIxQmhaMkYwYno0S0NRa0pQSEJoZVY5cE9tVnphWFJ2VTJsdVoyOXNiMUJoWjJGdFpXNTBiejVRUVVkQlZFRThMM0JoZVY5cE9tVnphWFJ2VTJsdVoyOXNiMUJoWjJGdFpXNTBiejRLQ1FrSlBIQmhlVjlwT21SaGRHRkZjMmwwYjFOcGJtZHZiRzlRWVdkaGJXVnVkRzgrTWpBeU5DMHdOUzB4TXp3dmNHRjVYMms2WkdGMFlVVnphWFJ2VTJsdVoyOXNiMUJoWjJGdFpXNTBiejRLQ1FrSlBIQmhlVjlwT21sa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amIxSnBjMk52YzNOcGIyNWxQakV4TVRFeE1URXhNVEV4UEM5d1lYbGZhVHBwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5U2FYTmpiM056YVc5dVpUNEtDUWtKUEhCaGVWOXBPbU5oZFhOaGJHVldaWEp6WVcxbGJuUnZQbmg0ZUhoNGVIaDRlRHd2Y0dGNVgyazZZMkYxYzJGc1pWWmxjbk5oYldWdWRHOCtDZ2tKQ1R4d1lYbGZhVHBrWVhScFUzQmxZMmxtYVdOcFVtbHpZMjl6YzJsdmJtVStPUzh3TVRBM01UQXhWRk12UEM5d1lYbGZhVHBrWVhScFUzQmxZMmxtYVdOcFVtbHpZMjl6YzJsdmJtVStDZ2tKUEM5d1lYbGZhVHBrWVhScFUybHVaMjlzYjFCaFoyRnRaVzUwYno0S0NUd3ZjR0Y1WDJrNlpHRjBhVkJoWjJGdFpXNTBiejRLUEM5d1lYbGZhVHBTVkQ0PTwvcnQ+CgkJPC9wcHQ6bm9kb0NoaWVkaUNvcGlhUlRSaXNwb3N0YT4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+',
];



Capsule::statement($render_query, $data_req);
Capsule::statement($render_query, $data_resp);

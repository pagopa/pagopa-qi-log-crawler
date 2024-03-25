create table if not exists public.transaction_2024 (
    id                  bigint              default nextval('public.transaction_2024_id_seq'::regclass) NOT NULL,
    date_event          date                not null,
    inserted_timestamp  timestamp           not null,
    iuv                 varchar(35)         not null,
    pa_emittente        varchar(11)         not null,
    notice_id           varchar(18)         null,
    id_carrello         varchar(35)         null,
    token_ccp           varchar(50)         null,
    id_psp              varchar(25)         null,
    stazione            varchar(30)         null,
    canale              varchar(30)         null,
    importo             numeric             null,
    esito               varchar(10)         null,
    date_wf             json                null,
    CONSTRAINT "TRANSACTION_2024_pk" PRIMARY KEY (date_event, id)
)
PARTITION BY RANGE (date_event);

create table if not exists public.transaction_details_2024
(
    id                  bigint              default nextval('public.transaction_2024_details_id_seq'::regclass) not null,
    date_event          date                not null,
    fk_payment          bigint              not null,
    iur                 varchar(35)         null,
    pa_transfer         varchar(11)         not null,
    id_transfer         smallint            null,
    iban_transfer       varchar(40)         null,
    amount_transfer     numeric             null,
    is_bollo            boolean             default false,
    constraint "TRANSACTION_DETAILS_2024_pk" PRIMARY KEY (date_event, id)
)
partition by RANGE (date_event);

create table if not exists public.transaction_events_2024
(
    id                  bigint              default nextval('public.transaction_2024_events_id_seq'::regclass) not null,
    date_event          date                not null,
    fk_payment          bigint              not null,
    fk_tipoEvento       bigint              not null,
    event_timestamp     timestamp           not null,
    event_id            varchar(50)         null,
    id_psp              varchar(25)         null,
    stazione            varchar(30)         null,
    canale              varchar(30)         null,
    faultcode           varchar(50)         null,
    constraint transaction_events_2024_pk primary key (date_event, id)
)
partition by RANGE (date_event);


create table if not exists public.transaction_re_2024 (
    id                  bigint              default nextval('public.transaction_re_2024_id_seq'::regclass) not null,
    date_event          date                not null,
    inserted_timestamp  timestamp           not null,
    tipoevento          varchar(30)         null,
    sottotipoevento     varchar(15)         null,
    iddominio           varchar(30)         null,
    iuv                 varchar(50)         null,
    ccp                 varchar(50)         null,
    noticenumber        varchar(50)         null,
    creditorreferenceid varchar(50)         null,
    paymenttoken        varchar(50)         null,
    psp                 varchar(30)         null,
    stazione            varchar(30)         null,
    canale              varchar(30)         null,
    sessionid           varchar(50)         null,
    sessionidoriginal   varchar(50)         null,
    uniqueid            varchar(50)         null,
    payload             bytea               null,
    state               varchar(15)         not null default 'TO_LOAD'::character varying,
    message             varchar(200)        null,
    constraint "TRANSACTION_RE_2024_pk" primary key (date_event, id)
)
PARTITION BY RANGE (date_event);




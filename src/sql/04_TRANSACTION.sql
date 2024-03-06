CREATE TABLE public.transaction_2024 (
    id                  bigserial           default nextval('public.transaction_2024_id_seq'::regclass) NOT NULL,
    date_event          date                NOT NULL,
    insertedtimestamp   timestamp           NOT NULL,
    iuv                 varchar(35)         NOT NULL,
    pa_emittente        varchar(11)         NOT NULL,
    notice_id           varchar(18)         NULL,
    id_carrello         varchar(35)         NULL,
    token_ccp           varchar(50)         NOT NULL,
    id_broker_pa        varchar(25)         NULL,
    id_broker_psp       varchar(25)         NULL,
    id_psp              varchar(25)         NULL,
    stazione            varchar(30)         NULL,
    canale              varchar(30)         NULL,
    importo             numeric             NULL,
    esito               varchar(10)         NULL,
    date_wf             json                NULL,
    CONSTRAINT "TRANSACTION_2024_pk" PRIMARY KEY (date_event, id)
)
PARTITION BY RANGE (date_event);


CREATE UNIQUE INDEX "TRANSACTION_2024_pk" ON ONLY public.transaction_2024 USING btree (date_event, id);


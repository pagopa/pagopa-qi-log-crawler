CREATE TABLE public.transaction_details_2023 (
    id bigserial NOT NULL,
    date_event date NOT NULL,
    iuv varchar(50) NOT NULL,
    pa_emittente varchar(20) NOT NULL,
    token_ccp varchar(50) NOT NULL,
    iur varchar(50) NULL,
    pa_transfer varchar(20) NOT NULL,
    id_transfer int4 NULL,
    iban_transfer varchar(40) NOT NULL,
    amount_transfer numeric NULL,
    is_bollo bool NULL DEFAULT false,
    CONSTRAINT "TRANSACTION_DETAILS_2023_pk" PRIMARY KEY (date_event, id)
)
PARTITION BY RANGE (date_event);


CREATE TABLE public.transaction_details_2023_09_01 PARTITION OF
    public.transaction_details_2023
    FOR VALUES FROM ('2023-09-01') TO ('2023-09-02');


CREATE TABLE public.transaction_details_2023_09_02 PARTITION OF
    public.transaction_details_2023
    FOR VALUES FROM ('2023-09-02') TO ('2023-09-03');

CREATE TABLE public.transaction_details_2023_09_03 PARTITION OF
    public.transaction_details_2023
    FOR VALUES FROM ('2023-09-03') TO ('2023-09-04');


CREATE TABLE public.transaction_details_2023_09_04 PARTITION OF
    public.transaction_details_2023
    FOR VALUES FROM ('2023-09-04') TO ('2023-09-05');


CREATE UNIQUE INDEX "TRANSACTION_DETAILS_2023_pk" ON ONLY public.transaction_details_2023 USING btree (date_event, id);
CREATE INDEX TRANSACTION_DETAILS_2023_09_01_IDX ON ONLY public.transaction_details_2023_09_01 USING btree (iuv)


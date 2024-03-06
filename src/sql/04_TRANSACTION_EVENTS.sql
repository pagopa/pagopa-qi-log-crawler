CREATE TABLE public.transaction_events_2023 (
	id bigserial NOT NULL,
	date_event date NOT NULL,
	iuv varchar(50) NOT NULL,
	pa_emittente varchar(20) NOT NULL,
	token_ccp varchar(50) NOT NULL,
	event_timestamp timestamp NOT NULL,
	event_id varchar(50) NULL,
	tipo_evento varchar(50) NULL,
	sotto_tipo_evento varchar(50) NULL,
	faultcode varchar(50) NULL,
	CONSTRAINT transaction_events_2023_pk PRIMARY KEY (date_event, id)
)
PARTITION BY RANGE (date_event);

CREATE UNIQUE INDEX transaction_events_2023_pk ON ONLY public.transaction_events_2023 USING btree (date_event, id);

CREATE TABLE public.transaction_events_2023_09_01 PARTITION OF
    public.transaction_events_2023
    FOR VALUES FROM ('2023-09-01') TO ('2023-09-02');


CREATE TABLE public.transaction_events_2023_09_02 PARTITION OF
    public.transaction_events_2023
    FOR VALUES FROM ('2023-09-02') TO ('2023-09-03');
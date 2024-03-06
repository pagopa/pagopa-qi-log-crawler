CREATE TABLE public.transaction_re_2023 (
	id bigserial NOT NULL,
	date_event date NOT NULL,
	insertedtimestamp timestamp NULL,
	tipoevento varchar(30) NULL,
	sottotipoevento varchar(15) NULL,
	iddominio varchar(30) NULL,
	iuv varchar(50) NULL,
	ccp varchar(50) NULL,
	noticenumber varchar(50) NULL,
	creditorreferenceid varchar(50) NULL,
	paymenttoken varchar(50) NULL,
	psp varchar(30) NULL,
	stazione varchar(30) NULL,
	canale varchar(30) NULL,
	sessionid varchar(50) NULL,
	sessionidoriginal varchar(50) NULL,
	uniqueid varchar(50) NULL,
	payload bytea NULL,
	state varchar(15) NOT NULL DEFAULT 'TO_LOAD'::character varying,
	message varchar(200) NULL,
	CONSTRAINT "TRANSACTION_RE_2023_pk" PRIMARY KEY (date_event, id)
)
PARTITION BY RANGE (date_event);

CREATE TABLE public.transaction_re_2023_09_01 PARTITION OF
    public.transaction_re_2023
    FOR VALUES FROM ('2023-09-01') TO ('2023-09-02');

CREATE TABLE public.transaction_re_2023_09_02 PARTITION OF
    public.transaction_re_2023
    FOR VALUES FROM ('2023-09-02') TO ('2023-09-03');

CREATE UNIQUE INDEX "TRANSACTION_RE_2023_pk" ON ONLY public.transaction_re_2023 USING btree (date_event, id);

CREATE INDEX transaction_re_2023_sottotipoevento_2023_09_01_idx ON ONLY public.transaction_re_2023_09_01 USING btree (sottotipoevento);
CREATE INDEX transaction_re_2023_state_2023_09_01_idx ON ONLY public.transaction_re_2023_09_01 USING btree (state);
CREATE INDEX transaction_re_2023_tipoevento_2023_09_01_idx ON ONLY public.transaction_re_2023_09_01 USING btree (tipoevento);


CREATE INDEX transaction_re_2023_sottotipoevento_2023_09_02_idx ON ONLY public.transaction_re_2023_09_02 USING btree (sottotipoevento);
CREATE INDEX transaction_re_2023_state_2023_09_02_idx ON ONLY public.transaction_re_2023_09_02 USING btree (state);
CREATE INDEX transaction_re_2023_tipoevento_2023_09_02_idx ON ONLY public.transaction_re_2023_09_02 USING btree (tipoevento);

INSERT INTO mapped_events(tipo_evento,sotto_tipo_evento ,fk_event) values
    ('activatePaymentNotice'    , 'REQ' ,   1),
    ('activatePaymentNotice'    , 'RESP',   2),
    ('nodoInviaCarrelloRPT'     , 'REQ' ,   3),
    ('nodoInviaCarrelloRPT'     , 'RESP',   4),
    ('sendPaymentOutcome'       , 'REQ' ,   5),
    ('sendPaymentOutcome'       , 'RESP',   6);

insert into mapped_payment_methods (tipoversamento, descrizione) values
    ('CC', 'Carta di Credito'),
    ('PPAL', 'Paypal'),
    ('BPAY', 'Bancomat Pay'),
    ('APPL', 'Apple Pay'),
    ('GOOG', 'Google Pay'),
    ('MYBK', 'My Bank'),
    ('RBPR', 'Poste addebito in conto Retail'),
    ('RBPB', 'Poste addebito in conto Business'),
    ('RBPP', 'Paga con BottonePostePay'),
    ('RPIC', 'Pago in Conto Intesa'),
    ('RBPS', 'SCRIGNO Internet Banking');
INSERT INTO mapped_events(tipo_evento,sotto_tipo_evento ,fk_event) values
    ('activatePaymentNotice'                 , 'REQ' ,   1),
    ('activatePaymentNotice'                 , 'RESP',   2),
    ('nodoInviaCarrelloRPT'                  , 'REQ' ,   3),
    ('nodoInviaCarrelloRPT'                  , 'RESP',   4),
    ('sendPaymentOutcome'                    , 'REQ' ,   5),
    ('sendPaymentOutcome'                    , 'RESP',   6),
    ('pspInviaCarrelloRPT'                   , 'REQ' ,   7),
    ('pspInviaCarrelloRPT'                   , 'RESP',   8),
    ('pspInviaCarrelloRPTCarte'              , 'REQ' ,   9),
    ('pspInviaCarrelloRPTCarte'              , 'RESP',  10),
    ('nodoInviaRPT'                          , 'REQ' ,  11),
    ('nodoInviaRPT'                          , 'RESP',  12),
    ('nodoAttivaRPT'                         , 'REQ' ,  13),
    ('nodoAttivaRPT'                         , 'RESP',  14),
    ('pspNotifyPayment'                      , 'REQ' ,  15),
    ('pspNotifyPayment'                      , 'RESP',  16),
    ('nodoInviaRT'                           , 'REQ' ,  17),
    ('nodoInviaRT'                           , 'RESP',  18),
    ('paaInviaRT'                            , 'REQ' ,  19),
    ('paaInviaRT'                            , 'RESP',  20),
    ('activateIOPayment'                     , 'REQ' ,  21),
    ('activateIOPayment'                     , 'RESP',  22),
    ('activatePaymentNoticeV2'               , 'REQ' ,  23),
    ('activatePaymentNoticeV2'               , 'RESP',  24),
    ('pspNotifyPaymentV2'                    , 'REQ' ,  25),
    ('pspNotifyPaymentV2'                    , 'RESP',  26),
    ('closePayment-v2'                       , 'REQ' ,  27),
    ('closePayment-v2'                       , 'RESP',  28),
    ('closePayment-v1'                       , 'REQ' ,  29),
    ('closePayment-v1'                       , 'RESP',  30),
    ('nodoChiediInformazioniPagamento'       , 'REQ' ,  31),
    ('nodoChiediInformazioniPagamento'       , 'RESP',  32),
    ('nodoInoltraEsitoPagamentoCarta'        , 'REQ' ,  33),
    ('nodoInoltraEsitoPagamentoCarta'        , 'RESP',  34),
    ('nodoChiediAvanzamentoPagamento'        , 'REQ' ,  35),
    ('nodoChiediAvanzamentoPagamento'        , 'RESP',  36),
    ('cdInfoWisp'                            , 'REQ' ,  37),
    ('cdInfoWisp'                            , 'RESP',  38),
    ('nodoInoltraEsitoPagamentoPayPal'       , 'REQ' ,  39),
    ('nodoInoltraEsitoPagamentoPayPal'       , 'RESP',  40),
    ('nodoNotificaAnnullamento'              , 'REQ' ,  41),
    ('nodoNotificaAnnullamento'              , 'RESP',  42),
    ('nodoInoltraPagamentoMod1'              , 'REQ' ,  43),
    ('nodoInoltraPagamentoMod1'              , 'RESP',  44),
    ('nodoChiediCopiaRT'                     , 'REQ' ,  45),
    ('nodoChiediCopiaRT'                     , 'RESP',  46),
    ('paGetPayment'                          , 'REQ' ,  47),
    ('paGetPayment'                          , 'RESP',  48),
    ('paSendRT'                              , 'REQ' ,  49),
    ('paSendRT'                              , 'RESP',  50);

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
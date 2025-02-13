<?xml version="1.0" encoding="UTF-8"?>
<soapenv:Envelope xmlns:fn="http://www.w3.org/2005/xpath-functions" xmlns:pag="http://www.digitpa.gov.it/schemas/2011/Pagamenti/" xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ws="http://ws.pagamenti.telematici.gov/" xmlns:xs="http://www.w3.org/2001/XMLSchema">
    <soapenv:Body>
        <ws:paaVerificaRPTRisposta>
            <paaVerificaRPTRisposta>
                <esito>OK</esito>
                <datiPagamentoPA>
                    <importoSingoloVersamento>{{amount}}</importoSingoloVersamento>
                    <ibanAccredito>IT0000000000000000000000001</ibanAccredito>
                    <enteBeneficiario>
                        <pag:identificativoUnivocoBeneficiario>
                            <pag:tipoIdentificativoUnivoco>G</pag:tipoIdentificativoUnivoco>
                            <pag:codiceIdentificativoUnivoco>{{pa_emittente}}</pag:codiceIdentificativoUnivoco>
                        </pag:identificativoUnivocoBeneficiario>
                    </enteBeneficiario>
                    <causaleVersamento>--</causaleVersamento>
                </datiPagamentoPA>
            </paaVerificaRPTRisposta>
        </ws:paaVerificaRPTRisposta>
    </soapenv:Body>
</soapenv:Envelope>
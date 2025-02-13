<?xml version="1.0" encoding="UTF-8" standalone="no" ?>
<soapenv:Envelope xmlns:bc="http://PuntoAccessoPSP.spcoop.gov.it/BarCode_GS1_128_Modified" xmlns:pay_i="http://www.digitpa.gov.it/schemas/2011/Pagamenti/" xmlns:ppt="http://ws.pagamenti.telematici.gov/" xmlns:qrc="http://PuntoAccessoPSP.spcoop.gov.it/QrCode" xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:tns="http://PuntoAccessoPSP.spcoop.gov.it/servizi/PagamentiTelematiciPspNodo" xmlns:xs="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
    <soapenv:Body>
        <ppt:nodoAttivaRPTRisposta>
            <nodoAttivaRPTRisposta>
                <esito>OK</esito>
                <datiPagamentoPA>
                    <importoSingoloVersamento>{{amount}}</importoSingoloVersamento>
                    <ibanAccredito>IT0000000000000000000000001</ibanAccredito>
                    <enteBeneficiario>
                        <pay_i:identificativoUnivocoBeneficiario>
                            <pay_i:tipoIdentificativoUnivoco>G</pay_i:tipoIdentificativoUnivoco>
                            <pay_i:codiceIdentificativoUnivoco>77777777777</pay_i:codiceIdentificativoUnivoco>
                        </pay_i:identificativoUnivocoBeneficiario>
                    </enteBeneficiario>
                    <causaleVersamento>causale versamento</causaleVersamento>
                </datiPagamentoPA>
            </nodoAttivaRPTRisposta>
        </ppt:nodoAttivaRPTRisposta>
    </soapenv:Body>
</soapenv:Envelope>
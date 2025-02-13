<?xml version="1.0" encoding="UTF-8" standalone="no" ?>
<soapenv:Envelope xmlns:pay_i="http://www.digitpa.gov.it/schemas/2011/Pagamenti/" xmlns:ppt="http://ws.pagamenti.telematici.gov/" xmlns:ppthead="http://ws.pagamenti.telematici.gov/ppthead" xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xs="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
    <soapenv:Header>
        <ppthead:intestazionePPT>
            <identificativoIntermediarioPA>{{brokerpa}}</identificativoIntermediarioPA>
            <identificativoStazioneIntermediarioPA>{{station}}</identificativoStazioneIntermediarioPA>
            <identificativoDominio>{{pa_emittente}}</identificativoDominio>
            <identificativoUnivocoVersamento>{{iuv}}</identificativoUnivocoVersamento>
            <codiceContestoPagamento>{{token}}</codiceContestoPagamento>
        </ppthead:intestazionePPT>
    </soapenv:Header>
    <soapenv:Body>
        <ppt:paaVerificaRPT>
            <identificativoPSP>AGID_01</identificativoPSP>
        </ppt:paaVerificaRPT>
    </soapenv:Body>
</soapenv:Envelope>
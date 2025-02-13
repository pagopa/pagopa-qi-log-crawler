<?xml version="1.0" encoding="UTF-8" standalone="no" ?>
<soapenv:Envelope xmlns:ppt="http://ws.pagamenti.telematici.gov/" xmlns:ppthead="http://ws.pagamenti.telematici.gov/ppthead" xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:tns="http://NodoPagamentiSPC.spcoop.gov.it/servizi/PagamentiTelematiciRT" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
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
        <ppt:paaInviaRT>
            <tipoFirma/>
            <rt>{{rt_payload}}</rt>
        </ppt:paaInviaRT>
    </soapenv:Body>
</soapenv:Envelope>
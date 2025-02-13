<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/">
    <SOAP-ENV:Header>
        <a:intestazionePPT xmlns:a="http://ws.pagamenti.telematici.gov/ppthead" xmlns:b="http://schemas.xmlsoap.org/soap/envelope/" xmlns:c="http://ws.pagamenti.telematici.gov/">
            <identificativoIntermediarioPA>{{brokerpa}}</identificativoIntermediarioPA>
            <identificativoStazioneIntermediarioPA>{{station}}</identificativoStazioneIntermediarioPA>
            <identificativoDominio>{{pa_emittente}}</identificativoDominio>
            <identificativoUnivocoVersamento>{{iuv}}</identificativoUnivocoVersamento>
            <codiceContestoPagamento>{{token}}</codiceContestoPagamento>
        </a:intestazionePPT>
    </SOAP-ENV:Header>
    <SOAP-ENV:Body>
        <c:nodoInviaRPT xmlns:a="http://ws.pagamenti.telematici.gov/ppthead" xmlns:b="http://schemas.xmlsoap.org/soap/envelope/" xmlns:c="http://ws.pagamenti.telematici.gov/">
            <password>--</password>
            <identificativoPSP>{{psp}}</identificativoPSP>
            <identificativoIntermediarioPSP>{{brokerpsp}}</identificativoIntermediarioPSP>
            <identificativoCanale>{{channel}}</identificativoCanale>
            <tipoFirma/>
            <rpt>{{rpt_payload}}</rpt>
        </c:nodoInviaRPT>
    </SOAP-ENV:Body>
</SOAP-ENV:Envelope>
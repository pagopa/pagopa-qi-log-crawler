<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/">
    <soapenv:Body>
        <ns1:nodoInviaRT xmlns:ns1="http://ws.pagamenti.telematici.gov/">
            <identificativoIntermediarioPSP>{{brokerpsp}}</identificativoIntermediarioPSP>
            <identificativoCanale>{{channel}}</identificativoCanale>
            <password>--</password>
            <identificativoPSP>{{psp}}</identificativoPSP>
            <identificativoDominio>{{pa_emittente}}</identificativoDominio>
            <identificativoUnivocoVersamento>{{iuv}}</identificativoUnivocoVersamento>
            <codiceContestoPagamento>{{token}}</codiceContestoPagamento>
            <tipoFirma/>
            <rt>{{rt_payload}}</rt>
        </ns1:nodoInviaRT>
    </soapenv:Body>
</soapenv:Envelope>
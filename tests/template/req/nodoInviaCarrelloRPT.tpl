<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
    <soapenv:Header>
        <ns1:intestazioneCarrelloPPT xmlns:ns1="http://ws.pagamenti.telematici.gov/ppthead">
            <identificativoIntermediarioPA>{{brokerpa}}</identificativoIntermediarioPA>
            <identificativoStazioneIntermediarioPA>{{station}}</identificativoStazioneIntermediarioPA>
            <identificativoCarrello>{{id_cart}}</identificativoCarrello>
        </ns1:intestazioneCarrelloPPT>
    </soapenv:Header>
    <soapenv:Body>
        <nodoInviaCarrelloRPT xmlns="http://ws.pagamenti.telematici.gov/">
            <password xmlns="">--</password>
            <identificativoPSP xmlns="">{{psp}}</identificativoPSP>
            <identificativoIntermediarioPSP xmlns="">{{brokerpsp}}</identificativoIntermediarioPSP>
            <identificativoCanale xmlns="">{{channel}}</identificativoCanale>
            <listaRPT xmlns="">
                {% for p in payments %}
                <elementoListaRPT>
                    <identificativoDominio>{{p.pa_emittente}}</identificativoDominio>
                    <identificativoUnivocoVersamento>{{p.iuv}}</identificativoUnivocoVersamento>
                    <codiceContestoPagamento>{{p.token}}</codiceContestoPagamento>
                    <tipoFirma/>
                    <rpt>{{p.rpt_payload}}</rpt>
                </elementoListaRPT>
                {% endfor %}
            </listaRPT>
        </nodoInviaCarrelloRPT>
    </soapenv:Body>
</soapenv:Envelope>
<?xml version="1.0" encoding="UTF-8" standalone="no" ?>
<soapenv:Envelope xmlns:pay_j="http://www.cnipa.gov.it/schemas/2010/Pagamenti/Ack_1_0/" xmlns:ppt="http://ws.pagamenti.telematici.gov/" xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:tns="http://PuntoAccessoPSP.spcoop.gov.it" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
    <soapenv:Body>
        <ppt:pspInviaCarrelloRPTCarte>
            <identificativoPSP>{{psp}}</identificativoPSP>
            <identificativoIntermediarioPSP>{{brokerpsp}}</identificativoIntermediarioPSP>
            <identificativoCanale>{{channel}}</identificativoCanale>
            <modelloPagamento>1</modelloPagamento>
            <listaRPT>
                {% for p in payments %}
                <elementoListaCarrelloRPT>
                    <identificativoDominio>{{p.pa_emittente}}</identificativoDominio>
                    <identificativoUnivocoVersamento>{{p.iuv}}</identificativoUnivocoVersamento>
                    <codiceContestoPagamento>{{p.token}}</codiceContestoPagamento>
                    <tipoFirma/>
                    <rpt>{{p.rpt_payload}}</rpt>
                </elementoListaCarrelloRPT>
                {% endfor %}
            </listaRPT>
            <rrn>{{rrn}}</rrn>
            <esitoTransazioneCarta>00</esitoTransazioneCarta>
            <importoTotalePagato>{{totalAmount}}</importoTotalePagato>
            <timestampOperazione>2099-01-01T00:00:00.000+02:00</timestampOperazione>
            <codiceAutorizzativo>000000</codiceAutorizzativo>
        </ppt:pspInviaCarrelloRPTCarte>
    </soapenv:Body>
</soapenv:Envelope>
<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:pay_i="http://www.digitpa.gov.it/schemas/2011/Pagamenti/" xmlns:ppt="http://ws.pagamenti.telematici.gov/" xmlns:qrc="http://PuntoAccessoPSP.spcoop.gov.it/QrCode" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:tns="http://PuntoAccessoPSP.spcoop.gov.it/servizi/PagamentiTelematiciPspNodo" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
    <soap:Body>
        <ppt:nodoVerificaRPT xmlns:ppt="http://ws.pagamenti.telematici.gov/">
            <identificativoPSP>{{psp}}</identificativoPSP>
            <identificativoIntermediarioPSP>{{brokerpsp}}</identificativoIntermediarioPSP>
            <identificativoCanale>{{channel}}</identificativoCanale>
            <password>--</password>
            <codiceContestoPagamento>{{token}}</codiceContestoPagamento>
            <codificaInfrastrutturaPSP>QR-CODE</codificaInfrastrutturaPSP>
            <codiceIdRPT>
                <qrc:QrCode>
                    <qrc:CF>{{pa_emittente}}</qrc:CF>
                    <qrc:AuxDigit>3</qrc:AuxDigit>
                    <qrc:CodIUV>{{iuv}}</qrc:CodIUV>
                </qrc:QrCode>
            </codiceIdRPT>
        </ppt:nodoVerificaRPT>
    </soap:Body>
</soap:Envelope>
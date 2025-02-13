<?xml version="1.0" encoding="UTF-8" standalone="no" ?>
<soapenv:Envelope xmlns:bc="http://PuntoAccessoPSP.spcoop.gov.it/BarCode_GS1_128_Modified" xmlns:pay_i="http://www.digitpa.gov.it/schemas/2011/Pagamenti/" xmlns:ppt="http://ws.pagamenti.telematici.gov/" xmlns:qrc="http://PuntoAccessoPSP.spcoop.gov.it/QrCode" xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:tns="http://PuntoAccessoPSP.spcoop.gov.it/servizi/PagamentiTelematiciPspNodo" xmlns:xs="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
    <soapenv:Body>
        <ppt:paaInviaRTRisposta>
            <paaInviaRTRisposta>
                {% include('common/fault.tpl') %}
                <esito>KO</esito>
            </paaInviaRTRisposta>
        </ppt:paaInviaRTRisposta>
    </soapenv:Body>
</soapenv:Envelope>
<?xml version="1.0" encoding="UTF-8" standalone="no" ?>
<soapenv:Envelope xmlns:common="http://pagopa-api.pagopa.gov.it/xsd/common-types/v1.0.0/" xmlns:pafn="http://pagopa-api.pagopa.gov.it/pa/paForNode.xsd" xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:tns="http://pagopa-api.pagopa.gov.it/paForNode" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
    <soapenv:Body>
        <pafn:paSendRTV2Request>
            <idPA>{{pa_emittente}}</idPA>
            <idBrokerPA>{{brokerpa}}</idBrokerPA>
            <idStation>{{station}}</idStation>
            <receipt>
                <receiptId>{{token}}</receiptId>
                <noticeNumber>{{nav}}</noticeNumber>
                <fiscalCode>{{pa_emittente}}</fiscalCode>
                <outcome>OK</outcome>
                <creditorReferenceId>{{iuv}}</creditorReferenceId>
                <paymentAmount>{{amount}}</paymentAmount>
                <description>descrizione pagamento</description>
                <companyName>descrizione pa</companyName>
                <debtor>
                    <uniqueIdentifier>
                        <entityUniqueIdentifierType>F</entityUniqueIdentifierType>
                        <entityUniqueIdentifierValue>ANONIMO</entityUniqueIdentifierValue>
                    </uniqueIdentifier>
                </debtor>
                <transferList>
                    {% for t in transfers %}
                    {% include('common/transfer.tpl') %}
                    {% endfor %}
                </transferList>
                <idPSP>{{psp}}</idPSP>
                <pspFiscalCode>CF PSP</pspFiscalCode>
                <PSPCompanyName>Descrizione PSP</PSPCompanyName>
                <idChannel>{{channel}}</idChannel>
                <channelDescription>NA</channelDescription>
                <paymentMethod>other</paymentMethod>
                <fee>{{fee}}</fee>
                <paymentDateTime>2099-01-01T00:00:00</paymentDateTime>
                <applicationDate>2099-01-01</applicationDate>
                <transferDate>2099-01-01</transferDate>
                {% if metadata %}
                <metadata>
                    {% for mkey, mvalue in metadata %}
                    <mapEntry>
                        <key>{{mkey}}</key>
                        <value>{{mvalue}}</value>
                    </mapEntry>
                    {% endfor %}
                </metadata>
                {% endif %}
            </receipt>
        </pafn:paSendRTV2Request>
    </soapenv:Body>
</soapenv:Envelope>
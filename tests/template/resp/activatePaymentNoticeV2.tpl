<?xml version="1.0" encoding="UTF-8" standalone="no" ?>
<soapenv:Envelope xmlns:common="http://pagopa-api.pagopa.gov.it/xsd/common-types/v1.0.0/" xmlns:nfp="http://pagopa-api.pagopa.gov.it/node/nodeForPsp.xsd" xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xs="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
    <soapenv:Body>
        <nfp:activatePaymentNoticeV2Response>
            <outcome>{{outcome}}</outcome>
            <totalAmount>{{amount}}</totalAmount>
            <paymentDescription>Description</paymentDescription>
            <fiscalCodePA>{{pa_emittente}}</fiscalCodePA>
            <companyName>PagoPA EC</companyName>
            <paymentToken>{{token}}</paymentToken>
            <transferList>
                {% for t in transfers %}
                {% include('common/transfer.tpl') %}
                {% endfor %}
            </transferList>
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
            <creditorReferenceId>{{iuv}}</creditorReferenceId>
        </nfp:activatePaymentNoticeV2Response>
    </soapenv:Body>
</soapenv:Envelope>
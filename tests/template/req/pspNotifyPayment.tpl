<?xml version="1.0" encoding="UTF-8" standalone="no" ?>
<soapenv:Envelope xmlns:common="http://pagopa-api.pagopa.gov.it/xsd/common-types/v1.0.0/" xmlns:pfn="http://pagopa-api.pagopa.gov.it/psp/pspForNode.xsd" xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xs="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
    <soapenv:Body>
        <pfn:pspNotifyPaymentReq>
            <idPSP>{{psp}}</idPSP>
            <idBrokerPSP>{{brokerpsp}}</idBrokerPSP>
            <idChannel>{{channel}}</idChannel>
            <paymentToken>{{token}}</paymentToken>
            <paymentDescription>Pagamento multa</paymentDescription>
            <fiscalCodePA>{{pa_emittente}}</fiscalCodePA>
            <companyName>Descrizione PA</companyName>
            <creditorReferenceId>{{iuv}}</creditorReferenceId>
            <debtAmount>{{amount}}</debtAmount>
            <transferList>
                {% for t in transfers %}
                {% include('common/transfer.tpl') %}
                {% endfor %}
            </transferList>
            {% if creditCardPayment %}
            {% include('common/creditCardPayment.tpl') %}
            {% endif %}
            {% if paypalPayment %}
            {% include('common/paypalPayment.tpl') %}
            {% endif %}
            {% if bancomatPayPayment %}
            {% include('common/bancomatPayPayment.tpl') %}
            {% endif %}
            {% if additionalPaymentInformation %}
            {% include('common/additionalPaymentInformation.tpl') %}
            {% endif %}
        </pfn:pspNotifyPaymentReq>
    </soapenv:Body>
</soapenv:Envelope>
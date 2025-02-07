<?xml version="1.0" encoding="UTF-8" standalone="no" ?>
<soapenv:Envelope xmlns:common="http://pagopa-api.pagopa.gov.it/xsd/common-types/v1.0.0/" xmlns:pfn="http://pagopa-api.pagopa.gov.it/psp/pspForNode.xsd" xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xs="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
    <soapenv:Body>
        <pfn:pspNotifyPaymentV2>
            <idPSP>{{psp}}</idPSP>
            <idBrokerPSP>{{brokerpsp}}</idBrokerPSP>
            <idChannel>{{channel}}</idChannel>
            <transactionId>TRANSACTION_ID</transactionId>
            <totalAmount>{{totalAmount}}</totalAmount>
            <paymentList>
                {% for p in payments %}
                {% include('common/payment.tpl') %}
                {% endfor %}
            </paymentList>
        </pfn:pspNotifyPaymentV2>
    </soapenv:Body>
</soapenv:Envelope>
<?xml version="1.0" encoding="UTF-8" standalone="no" ?>
<soapenv:Envelope xmlns:common="http://pagopa-api.pagopa.gov.it/xsd/common-types/v1.0.0/" xmlns:nfp="http://pagopa-api.pagopa.gov.it/node/nodeForPsp.xsd" xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xs="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
    <soapenv:Body>
        <nfp:paVerifyPaymentNoticeRes>
            <outcome>KO</outcome>
            {% include('common/fault.tpl') %}
        </nfp:paVerifyPaymentNoticeRes>
    </soapenv:Body>
</soapenv:Envelope>
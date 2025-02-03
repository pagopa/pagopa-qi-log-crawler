<?xml version="1.0" encoding="UTF-8" standalone="no" ?>
<soapenv:Envelope xmlns:common="http://pagopa-api.pagopa.gov.it/xsd/common-types/v1.0.0/" xmlns:pafn="http://pagopa-api.pagopa.gov.it/pa/paForNode.xsd" xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:tns="http://pagopa-api.pagopa.gov.it/paForNode" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
    <soapenv:Body>
        <pafn:paVerifyPaymentNoticeReq>
            <idPA>{{pa_emittente}}</idPA>
            <idBrokerPA>{{brokerpa}}</idBrokerPA>
            <idStation>{{station}}</idStation>
            <qrCode>
                <fiscalCode>{{pa_emittente}}</fiscalCode>
                <noticeNumber>{{nav}}</noticeNumber>
            </qrCode>
        </pafn:paVerifyPaymentNoticeReq>
    </soapenv:Body>
</soapenv:Envelope>
<?xml version="1.0" encoding="UTF-8" standalone="no" ?>
<soapenv:Envelope xmlns:common="http://pagopa-api.pagopa.gov.it/xsd/common-types/v1.0.0/" xmlns:nfp="http://pagopa-api.pagopa.gov.it/node/nodeForPsp.xsd" xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xs="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
    <soapenv:Body>
        <nfp:verifyPaymentNoticeRes>
            <outcome>{{outcome}}</outcome>
            <paymentList>
                <paymentOptionDescription>
                    <amount>{{amount}}</amount>
                    <options>EQ</options>
                    <dueDate>2025-01-31</dueDate>
                    <paymentNote>Payment Note</paymentNote>
                </paymentOptionDescription>
            </paymentList>
            <paymentDescription>Payment Description</paymentDescription>
            <fiscalCodePA>{{pa_emittente}}</fiscalCodePA>
            <companyName>Company Name</companyName>
        </nfp:verifyPaymentNoticeRes>
    </soapenv:Body>
</soapenv:Envelope>
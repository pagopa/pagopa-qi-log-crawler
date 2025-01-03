<soapenv:Envelope xmlns:nod="http://pagopa-api.pagopa.gov.it/node/nodeForPsp.xsd" xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/">
    <soapenv:Header/>
    <soapenv:Body>
        <nod:activatePaymentNoticeReq>
            <idPSP>{{psp}}</idPSP>
            <idBrokerPSP>{{broker_psp}}</idBrokerPSP>
            <idChannel>{{broker_channel}}</idChannel>
            <password>PLACEHOLDER</password>
            <idempotencyKey>97249640588_24E4KH6SH8</idempotencyKey>
            <qrCode>
                <fiscalCode>{{pa_emittente}}</fiscalCode>
                <noticeNumber>{{nav}}</noticeNumber>
            </qrCode>
            <amount>{{amount}}</amount>
        </nod:activatePaymentNoticeReq>
    </soapenv:Body>
</soapenv:Envelope>
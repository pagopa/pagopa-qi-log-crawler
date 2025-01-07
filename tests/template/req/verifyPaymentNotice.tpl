<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
    <soap:Header/>
    <soap:Body>
        <ns2:verifyPaymentNoticeReq xmlns:ns2="http://pagopa-api.pagopa.gov.it/node/nodeForPsp.xsd">
            <idPSP>{{psp}}</idPSP>
            <idBrokerPSP>{{broker_psp}}</idBrokerPSP>
            <idChannel>{{broker_channel}}</idChannel>
            <password>password</password>
            <qrCode>
                <fiscalCode>{{pa_emittente}}</fiscalCode>
                <noticeNumber>{{nav}}</noticeNumber>
            </qrCode>
        </ns2:verifyPaymentNoticeReq>
    </soap:Body>
</soap:Envelope>
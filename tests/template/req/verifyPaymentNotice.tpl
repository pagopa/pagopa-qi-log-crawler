<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
    <soap:Header/>
    <soap:Body>
        <ns2:verifyPaymentNoticeReq xmlns:ns2="http://pagopa-api.pagopa.gov.it/node/nodeForPsp.xsd">
            <idPSP>{{psp}}</idPSP>
            <idBrokerPSP>{{brokerpsp}}</idBrokerPSP>
            <idChannel>{{channel}}</idChannel>
            <password>PLACEHOLDER</password>
            <qrCode>
                <fiscalCode>{{pa_emittente}}</fiscalCode>
                <noticeNumber>{{nav}}</noticeNumber>
            </qrCode>
        </ns2:verifyPaymentNoticeReq>
    </soap:Body>
</soap:Envelope>
<soapenv:Envelope xmlns:nod="http://pagopa-api.pagopa.gov.it/node/nodeForPsp.xsd" xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/">
    <soapenv:Header/>
    <soapenv:Body>
        <nod:activatePaymentNoticeReq>
            <idPSP>{{psp}}</idPSP>
            <idBrokerPSP>{{brokerpsp}}</idBrokerPSP>
            <idChannel>{{channel}}</idChannel>
            <password>PLACEHOLDER</password>
            <qrCode>
                <fiscalCode>{{pa_emittente}}</fiscalCode>
                <noticeNumber>{{nav}}</noticeNumber>
            </qrCode>
            <amount>{{amount}}</amount>
        </nod:activatePaymentNoticeReq>
    </soapenv:Body>
</soapenv:Envelope>
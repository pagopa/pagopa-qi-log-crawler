<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/">
    <SOAP-ENV:Header/>
    <SOAP-ENV:Body>
        <ns3:sendPaymentOutcomeReq xmlns:ns3="http://pagopa-api.pagopa.gov.it/node/nodeForPsp.xsd">
            <idPSP>{{psp}}</idPSP>
            <idBrokerPSP>{{brokerpsp}}</idBrokerPSP>
            <idChannel>{{channel}}</idChannel>
            <password>PLACEHOLDER</password>
            <paymentToken>{{token}}</paymentToken>
            <outcome>{{outcome}}</outcome>
        </ns3:sendPaymentOutcomeReq>
    </SOAP-ENV:Body>
</SOAP-ENV:Envelope>
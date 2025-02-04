<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/">
    <SOAP-ENV:Header/>
    <SOAP-ENV:Body>
        <ns3:sendPaymentOutcomeV2Request xmlns:ns3="http://pagopa-api.pagopa.gov.it/node/nodeForPsp.xsd">
            <idPSP>{{psp}}</idPSP>
            <idBrokerPSP>{{brokerpsp}}</idBrokerPSP>
            <idChannel>{{channel}}</idChannel>
            <password>PLACEHOLDER</password>
            <paymentTokens>
                {% for tok in tokens %}
                <paymentToken>{{tok}}</paymentToken>
                {% endfor %}
            </paymentTokens>
            <outcome>{{outcome}}</outcome>
            <details>
                <paymentMethod>other</paymentMethod>
                <fee>0.00</fee>
                <applicationDate>2099-01-01+01:00</applicationDate>
                <transferDate>2099-01-01+01:00</transferDate>
            </details>
        </ns3:sendPaymentOutcomeV2Request>
    </SOAP-ENV:Body>
</SOAP-ENV:Envelope>
<soap:Envelope xmlns:paf="http://pagopa-api.pagopa.gov.it/pa/paForNode.xsd" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
    <soap:Header/>
    <soap:Body>
        <paf:paSendRTV2Response>
            <outcome>KO</outcome>
            {% include('common/fault.tpl') %}
        </paf:paSendRTV2Response>
    </soap:Body>
</soap:Envelope>
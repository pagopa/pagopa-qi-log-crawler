<soap:Envelope xmlns:paf="http://pagopa-api.pagopa.gov.it/pa/paForNode.xsd" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
    <soap:Header/>
    <soap:Body>
        <paf:paSendRTRes>
            <outcome>KO</outcome>
            {% include('common/fault.tpl') %}
        </paf:paSendRTRes>
    </soap:Body>
</soap:Envelope>
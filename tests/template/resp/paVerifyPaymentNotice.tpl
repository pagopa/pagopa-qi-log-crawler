<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
    <soap:Body>
        <ns2:paVerifyPaymentNoticeRes xmlns:ns2="http://pagopa-api.pagopa.gov.it/pa/paForNode.xsd">
            <outcome>OK</outcome>
            <paymentList>
                <paymentOptionDescription>
                    <amount>{{amount}}</amount>
                    <options>EQ</options>
                    <dueDate>2099-01-01</dueDate>
                    <detailDescription>Descrizione del pagamento dettagliata</detailDescription>
                    <allCCP>false</allCCP>
                </paymentOptionDescription>
            </paymentList>
            <paymentDescription>Descrizione Pagamento</paymentDescription>
            <fiscalCodePA>{{pa_emittente}}</fiscalCodePA>
            <companyName>Nome della PA</companyName>
        </ns2:paVerifyPaymentNoticeRes>
    </soap:Body>
</soap:Envelope>
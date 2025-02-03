<soapenv:Envelope xmlns:pafn="http://pagopa-api.pagopa.gov.it/pa/paForNode.xsd" xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/">
    <soapenv:Header/>
    <soapenv:Body>
        <pafn:paGetPaymentRes>
            <outcome>OK</outcome>
            <data>
                <creditorReferenceId>{{iuv}}</creditorReferenceId>
                <paymentAmount>{{amount}}</paymentAmount>
                <dueDate>2100-01-01</dueDate>
                <description>Avviso pagamento {{nav}}</description>
                <companyName>Company Name</companyName>
                <debtor>
                    <uniqueIdentifier>
                        <entityUniqueIdentifierType>F</entityUniqueIdentifierType>
                        <entityUniqueIdentifierValue>ANONIMO</entityUniqueIdentifierValue>
                    </uniqueIdentifier>
                    <fullName>ANONIMO</fullName>
                </debtor>
                <transferList>
                    {% for t in transfers %}
                    {% include('common/transfer.tpl') %}
                    {% endfor %}
                </transferList>
                {% if metadata %}
                <metadata>
                    {% for mkey, mvalue in metadata %}
                    <mapEntry>
                        <key>{{mkey}}</key>
                        <value>{{mvalue}}</value>
                    </mapEntry>
                    {% endfor %}
                </metadata>
                {% endif %}
            </data>
        </pafn:paGetPaymentRes>
    </soapenv:Body>
</soapenv:Envelope>
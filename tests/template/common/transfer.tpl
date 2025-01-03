<transfer>
    <idTransfer>{{t.id}}</idTransfer>
    <transferAmount>{{t.amount}}</transferAmount>
    <fiscalCodePA>{{t.pa}}</fiscalCodePA>
    <IBAN>{{t.iban}}</IBAN>
    <remittanceInformation>Remittance</remittanceInformation>
    {% if t.metadata %}
    <metadata>
    {% for mkey, mvalue in t.metadata %}
        <mapEntry>
            <key>{{mkey}}</key>
            <value>{{mvalue}}</value>
        </mapEntry>
    {% endfor %}
    </metadata>
    {% endif %}
</transfer>

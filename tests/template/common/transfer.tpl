<transfer>
    <idTransfer>{{t.id}}</idTransfer>
    <transferAmount>{{t.amount}}</transferAmount>
    <fiscalCodePA>{{t.pa}}</fiscalCodePA>
    {% if t.iban %}
    <IBAN>{{t.iban}}</IBAN>
    {% else %}
    <richiestaMarcaDaBollo>
        <hashDocumento>hashdocumento</hashDocumento>
        <tipoBollo>01</tipoBollo>
        <provinciaResidenza>RM</provinciaResidenza>
    </richiestaMarcaDaBollo>
    {% endif %}
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

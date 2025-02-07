    <payment>
        <paymentToken>{{p.token}}</paymentToken>
        <paymentDescription>Descrizione</paymentDescription>
        <fiscalCodePA>{{p.pa_emittente}}</fiscalCodePA>
        <companyName>Nome PA</companyName>
        <creditorReferenceId>{{p.iuv}}</creditorReferenceId>
        <debtAmount>{{p.amount}}</debtAmount>
        <transferList>
            {% for t in p.transfers %}
            {% include('common/transfer.tpl') %}
            {% endfor %}
        </transferList>
        {% if p.metadata %}
        <metadata>
            {% for mkey, mvalue in p.metadata %}
            <mapEntry>
                <key>{{mkey}}</key>
                <value>{{mvalue}}</value>
            </mapEntry>
            {% endfor %}
        </metadata>
        {% endif %}
    </payment>




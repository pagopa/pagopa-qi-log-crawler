<additionalPaymentInformation>
    {% for mkey, mvalue in additionalPaymentInformation %}
    <mapEntry>
        <key>{{mkey}}</key>
        <value>{{mvalue}}</value>
    </mapEntry>
    {% endfor %}
</additionalPaymentInformation>
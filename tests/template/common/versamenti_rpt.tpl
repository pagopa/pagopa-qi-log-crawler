<datiSingoloVersamento>
    <importoSingoloVersamento>{{t.amount}}</importoSingoloVersamento>
    {% if t.iban %}
    <ibanAccredito>{{t.iban}}</ibanAccredito>
    {% else %}
    <datiMarcaBolloDigitale>
        <tipoBollo>01</tipoBollo>
        <hashDocumento>hashdoc</hashDocumento>
        <provinciaResidenza>RM</provinciaResidenza>
    </datiMarcaBolloDigitale>
    {% endif %}
    <causaleVersamento>causale</causaleVersamento>
</datiSingoloVersamento>

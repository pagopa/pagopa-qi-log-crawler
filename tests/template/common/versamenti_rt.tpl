<datiSingoloPagamento>
    <singoloImportoPagato>{{t.amount}}</singoloImportoPagato>
    <esitoSingoloPagamento>PAGATA</esitoSingoloPagamento>
    <dataEsitoSingoloPagamento>2099-01-01</dataEsitoSingoloPagamento>
    <identificativoUnivocoRiscossione>{{t.iur}}</identificativoUnivocoRiscossione>
    <causaleVersamento>-</causaleVersamento>
    <datiSpecificiRiscossione>-</datiSpecificiRiscossione>
    {% if not t.iban %}
    <allegatoRicevuta>
        <tipoAllegatoRicevuta></tipoAllegatoRicevuta>
        <testoAllegato>enc_64_text</testoAllegato>
    </allegatoRicevuta>
    {% endif %}
</datiSingoloPagamento>

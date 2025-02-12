<RPT xmlns="http://www.digitpa.gov.it/schemas/2011/Pagamenti/">
    <versioneOggetto>6.2.0</versioneOggetto>
    <dominio>
        <identificativoDominio>{{pa_emittente}}</identificativoDominio>
        <identificativoStazioneRichiedente>{{stazione}}</identificativoStazioneRichiedente>
    </dominio>
    <identificativoMessaggioRichiesta>identificativo_richiesta</identificativoMessaggioRichiesta>
    <dataOraMessaggioRichiesta>2099-01-01T00:00:00</dataOraMessaggioRichiesta>
    <autenticazioneSoggetto>XX</autenticazioneSoggetto>
    <soggettoVersante>
        <identificativoUnivocoVersante>
            <tipoIdentificativoUnivoco>X</tipoIdentificativoUnivoco>
            <codiceIdentificativoUnivoco>ANONIMO</codiceIdentificativoUnivoco>
        </identificativoUnivocoVersante>
    </soggettoVersante>
    <soggettoPagatore>
        <identificativoUnivocoPagatore>
            <tipoIdentificativoUnivoco>X</tipoIdentificativoUnivoco>
            <codiceIdentificativoUnivoco>ANONIMO</codiceIdentificativoUnivoco>
        </identificativoUnivocoPagatore>
    </soggettoPagatore>
    <enteBeneficiario>
        <identificativoUnivocoBeneficiario>
            <tipoIdentificativoUnivoco>G</tipoIdentificativoUnivoco>
            <codiceIdentificativoUnivoco>{{pa_emittente}}</codiceIdentificativoUnivoco>
        </identificativoUnivocoBeneficiario>
        <nazioneBeneficiario>IT</nazioneBeneficiario>
    </enteBeneficiario>
    <datiVersamento>
        <dataEsecuzionePagamento>2099-01-01</dataEsecuzionePagamento>
        <importoTotaleDaVersare>{{amount}}</importoTotaleDaVersare>
        <tipoVersamento>BBT</tipoVersamento>
        <identificativoUnivocoVersamento>{{iuv}}</identificativoUnivocoVersamento>
        <codiceContestoPagamento>{{token}}</codiceContestoPagamento>
        <firmaRicevuta>0</firmaRicevuta>
        {% for t in transfers %}
        {% include('common/versamenti_rpt.tpl') %}
        {% endfor %}
    </datiVersamento>
</RPT>
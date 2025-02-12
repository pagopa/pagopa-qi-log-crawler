<?xml version="1.0" encoding="UTF-8"?>
<pay_i:RT xmlns:pay_i="http://www.digitpa.gov.it/schemas/2011/Pagamenti/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="/opt/proctele/resources/PagInf_RPT_RT_6_2_0.xsd">
    <pay_i:versioneOggetto>6.2.0</pay_i:versioneOggetto>
    <pay_i:dominio>
        <pay_i:identificativoDominio>{{pa_emittente}}</pay_i:identificativoDominio>
        <pay_i:identificativoStazioneRichiedente>{{stazione}}</pay_i:identificativoStazioneRichiedente>
    </pay_i:dominio>
    <pay_i:identificativoMessaggioRicevuta>idmsg</pay_i:identificativoMessaggioRicevuta>
    <pay_i:dataOraMessaggioRicevuta>2099-01-01T00:00:00</pay_i:dataOraMessaggioRicevuta>
    <pay_i:riferimentoMessaggioRichiesta>rif_msg</pay_i:riferimentoMessaggioRichiesta>
    <pay_i:riferimentoDataRichiesta>2099-01-01</pay_i:riferimentoDataRichiesta>
    <pay_i:istitutoAttestante>
        <pay_i:identificativoUnivocoAttestante>
            <pay_i:tipoIdentificativoUnivoco>B</pay_i:tipoIdentificativoUnivoco>
            <pay_i:codiceIdentificativoUnivoco>AGID_01</pay_i:codiceIdentificativoUnivoco>
        </pay_i:identificativoUnivocoAttestante>
        <pay_i:denominazioneAttestante>PSP</pay_i:denominazioneAttestante>
    </pay_i:istitutoAttestante>
    <pay_i:enteBeneficiario>
        <pay_i:identificativoUnivocoBeneficiario>
            <pay_i:tipoIdentificativoUnivoco>G</pay_i:tipoIdentificativoUnivoco>
            <pay_i:codiceIdentificativoUnivoco>{{pa_emittente}}</pay_i:codiceIdentificativoUnivoco>
        </pay_i:identificativoUnivocoBeneficiario>
    </pay_i:enteBeneficiario>
    <pay_i:soggettoPagatore>
        <pay_i:identificativoUnivocoPagatore>
            <pay_i:tipoIdentificativoUnivoco>F</pay_i:tipoIdentificativoUnivoco>
            <pay_i:codiceIdentificativoUnivoco>ANONIMO</pay_i:codiceIdentificativoUnivoco>
        </pay_i:identificativoUnivocoPagatore>
    </pay_i:soggettoPagatore>
    <pay_i:datiPagamento>
        <pay_i:codiceEsitoPagamento>0</pay_i:codiceEsitoPagamento>
        <pay_i:importoTotalePagato>{{amount}}</pay_i:importoTotalePagato>
        <pay_i:identificativoUnivocoVersamento>{{iuv}}</pay_i:identificativoUnivocoVersamento>
        <pay_i:CodiceContestoPagamento>{{token}}</pay_i:CodiceContestoPagamento>
        {% for t in transfers %}
        {% include('common/versamenti_rt.tpl') %}
        {% endfor %}
    </pay_i:datiPagamento>
</pay_i:RT>
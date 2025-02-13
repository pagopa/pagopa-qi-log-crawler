<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
    <soap:Body>
        <ns3:pspInviaCarrelloRPTResponse xmlns:ns2="http://www.cnipa.gov.it/schemas/2010/Pagamenti/Ack_1_0/" xmlns:ns3="http://ws.pagamenti.telematici.gov/">
            <pspInviaCarrelloRPTResponse>
                <esitoComplessivoOperazione>KO</esitoComplessivoOperazione>
                <listaErroriRPT>
                    {% include('common/fault.tpl') %}
                </listaErroriRPT>
            </pspInviaCarrelloRPTResponse>
        </ns3:pspInviaCarrelloRPTResponse>
    </soap:Body>
</soap:Envelope>
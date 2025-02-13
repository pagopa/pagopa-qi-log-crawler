<?xml version='1.0' encoding='UTF-8'?>
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/">
    <soapenv:Header/>
    <soapenv:Body>
        <ns2:pspInviaCarrelloRPTCarteResponse xmlns:ns2="http://ws.pagamenti.telematici.gov/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:type="ns2:pspInviaCarrelloRPTCarteResponse">
            <pspInviaCarrelloRPTResponse xsi:type="ns2:esitoPspInviaCarrelloRPT">
                <esitoComplessivoOperazione>OK</esitoComplessivoOperazione>
                <identificativoCarrello>{{id_cart}}</identificativoCarrello>
            </pspInviaCarrelloRPTResponse>
        </ns2:pspInviaCarrelloRPTCarteResponse>
    </soapenv:Body>
</soapenv:Envelope>
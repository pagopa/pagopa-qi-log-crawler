<?php

namespace pagopa\events\req;

use pagopa\crawler\events\req\pspInviaCarrelloRPTCarte;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

#[TestDox('events\req\pspInviaCarrelloRPTCarteTest::class')]
class pspInviaCarrelloRPTCarteTest extends TestCase
{


    /**
     * Istanza con una RPT e 1 Versamento
     * @var pspInviaCarrelloRPTCarte
     */
    protected pspInviaCarrelloRPTCarte $instance_1;


    /**
     * Istanza con 1 RPT e 2 versamenti
     * @var pspInviaCarrelloRPTCarte
     */
    protected pspInviaCarrelloRPTCarte $instance_2;


    /**
     * Istanza con 2 RPT e 2 versamenti
     * @var pspInviaCarrelloRPTCarte
     */
    protected pspInviaCarrelloRPTCarte $instance_3;

    protected function setUp(): void
    {
        $this->instance_1 = new pspInviaCarrelloRPTCarte([
            "inserted_timestamp" =>  "2024-03-13 10:10:00.210",
            "tipoevento" =>  "pspInviaCarrelloRPTCarte",
            "sottotipoevento" =>  "REQ",
            "idDominio" =>  "",
            "iuv" =>  "",
            "ccp" =>  "",
            "noticeNumber" =>  "",
            "creditorReferenceId" =>  "",
            "paymentToken" =>  "",
            "psp" =>  "PSP_RPT",
            "stazione" =>  "77777777777_01",
            "canale" =>  "88888888888_01",
            "sessionid" =>  "SESSID_01",
            "sessionidoriginal" =>  "SESSORIGIN_01",
            "uniqueid" =>  "UNIQUE_RPT_1",
            "payload" => "PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpwYXlfaj0iaHR0cDovL3d3dy5jbmlwYS5nb3YuaXQvc2NoZW1hcy8yMDEwL1BhZ2FtZW50aS9BY2tfMV8wLyIgeG1sbnM6cHB0PSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnRucz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0IiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBwdDpwc3BJbnZpYUNhcnJlbGxvUlBUQ2FydGU+CgkJCTxpZGVudGlmaWNhdGl2b1BTUD5QU1BfUlBUPC9pZGVudGlmaWNhdGl2b1BTUD4KCQkJPGlkZW50aWZpY2F0aXZvSW50ZXJtZWRpYXJpb1BTUD44ODg4ODg4ODg4ODwvaWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUFNQPgoJCQk8aWRlbnRpZmljYXRpdm9DYW5hbGU+ODg4ODg4ODg4ODhfMDE8L2lkZW50aWZpY2F0aXZvQ2FuYWxlPgoJCQk8bW9kZWxsb1BhZ2FtZW50bz4xPC9tb2RlbGxvUGFnYW1lbnRvPgoJCQk8bGlzdGFSUFQ+CgkJCQk8ZWxlbWVudG9MaXN0YUNhcnJlbGxvUlBUPgoJCQkJCTxpZGVudGlmaWNhdGl2b0RvbWluaW8+Nzc3Nzc3Nzc3Nzc8L2lkZW50aWZpY2F0aXZvRG9taW5pbz4KCQkJCQk8aWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4wMjAwMDAwMDAwMDA2MDAwMDwvaWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4KCQkJCQk8Y29kaWNlQ29udGVzdG9QYWdhbWVudG8+MDAwMDAwMDAwMDAwMDAwMTAwPC9jb2RpY2VDb250ZXN0b1BhZ2FtZW50bz4KCQkJCQk8cnB0PlBGSlFWQ0I0Yld4dWN6MGlhSFIwY0RvdkwzZDNkeTVrYVdkcGRIQmhMbWR2ZGk1cGRDOXpZMmhsYldGekx6SXdNVEV2VUdGbllXMWxiblJwTHlJK0NnazhkbVZ5YzJsdmJtVlBaMmRsZEhSdlBqWXVNaTR3UEM5MlpYSnphVzl1WlU5bloyVjBkRzgrQ2drOFpHOXRhVzVwYno0S0NRazhhV1JsYm5ScFptbGpZWFJwZG05RWIyMXBibWx2UGpjM056YzNOemMzTnpjM1BDOXBaR1Z1ZEdsbWFXTmhkR2wyYjBSdmJXbHVhVzgrQ2drSlBHbGtaVzUwYVdacFkyRjBhWFp2VTNSaGVtbHZibVZTYVdOb2FXVmtaVzUwWlQ0M056YzNOemMzTnpjM04xOHdNVHd2YVdSbGJuUnBabWxqWVhScGRtOVRkR0Y2YVc5dVpWSnBZMmhwWldSbGJuUmxQZ29KUEM5a2IyMXBibWx2UGdvSlBHbGtaVzUwYVdacFkyRjBhWFp2VFdWemMyRm5aMmx2VW1samFHbGxjM1JoUG1ZelpXTXpObVJpTnpoa1lUUTBOR1poWWpSalpqQm1PVEE0T1dKbVpEa3dQQzlwWkdWdWRHbG1hV05oZEdsMmIwMWxjM05oWjJkcGIxSnBZMmhwWlhOMFlUNEtDVHhrWVhSaFQzSmhUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQakl3TWpRdE1EUXRNRGxVTWpFNk5UTTZNelk4TDJSaGRHRlBjbUZOWlhOellXZG5hVzlTYVdOb2FXVnpkR0UrQ2drOFlYVjBaVzUwYVdOaGVtbHZibVZUYjJkblpYUjBiejU0ZUhnOEwyRjFkR1Z1ZEdsallYcHBiMjVsVTI5bloyVjBkRzgrQ2drOGMyOW5aMlYwZEc5UVlXZGhkRzl5WlQ0S0NRazhhV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52VUdGbllYUnZjbVUrQ2drSkNUeDBhWEJ2U1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBuZzhMM1JwY0c5SlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtDZ2tKQ1R4amIyUnBZMlZKWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI4K2VIaDRlSGg0ZUR3dlkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBnb0pDVHd2YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlVHRm5ZWFJ2Y21VK0Nna0pQR0Z1WVdkeVlXWnBZMkZRWVdkaGRHOXlaVDU0ZUhoNGVEd3ZZVzVoWjNKaFptbGpZVkJoWjJGMGIzSmxQZ29KQ1R4dVlYcHBiMjVsVUdGbllYUnZjbVUrU1ZROEwyNWhlbWx2Ym1WUVlXZGhkRzl5WlQ0S0NRazhaUzF0WVdsc1VHRm5ZWFJ2Y21VK2VIaDRlSGhBZUhoNGVDNWpiMjA4TDJVdGJXRnBiRkJoWjJGMGIzSmxQZ29KUEM5emIyZG5aWFIwYjFCaFoyRjBiM0psUGdvSlBHVnVkR1ZDWlc1bFptbGphV0Z5YVc4K0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjBKbGJtVm1hV05wWVhKcGJ6NEtDUWtKUEhScGNHOUpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrUnp3dmRHbHdiMGxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno0S0NRa0pQR052WkdsalpVbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejU0ZUhoNGVIZzhMMk52WkdsalpVbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejRLQ1FrOEwybGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiMEpsYm1WbWFXTnBZWEpwYno0S0NRazhaR1Z1YjIxcGJtRjZhVzl1WlVKbGJtVm1hV05wWVhKcGJ6NTRlSGg0ZUR3dlpHVnViMjFwYm1GNmFXOXVaVUpsYm1WbWFXTnBZWEpwYno0S0NUd3ZaVzUwWlVKbGJtVm1hV05wWVhKcGJ6NEtDVHhrWVhScFZtVnljMkZ0Wlc1MGJ6NEtDUWs4WkdGMFlVVnpaV04xZW1sdmJtVlFZV2RoYldWdWRHOCtNakF5TkMwd05DMHdPVHd2WkdGMFlVVnpaV04xZW1sdmJtVlFZV2RoYldWdWRHOCtDZ2tKUEdsdGNHOXlkRzlVYjNSaGJHVkVZVlpsY25OaGNtVStNVFV4TGpVMlBDOXBiWEJ2Y25SdlZHOTBZV3hsUkdGV1pYSnpZWEpsUGdvSkNUeDBhWEJ2Vm1WeWMyRnRaVzUwYno1RFVEd3ZkR2x3YjFabGNuTmhiV1Z1ZEc4K0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFabGNuTmhiV1Z1ZEc4K01ESXdNREF3TURBd01EQXdOakF3TURBOEwybGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiMVpsY25OaGJXVnVkRzgrQ2drSlBHTnZaR2xqWlVOdmJuUmxjM1J2VUdGbllXMWxiblJ2UGpBd01EQXdNREF3TURBd01EQXdNREV3TUR3dlkyOWthV05sUTI5dWRHVnpkRzlRWVdkaGJXVnVkRzgrQ2drSlBHWnBjbTFoVW1salpYWjFkR0UrTUR3dlptbHliV0ZTYVdObGRuVjBZVDRLQ1FrOFpHRjBhVk5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KQ1FrOGFXMXdiM0owYjFOcGJtZHZiRzlXWlhKellXMWxiblJ2UGpFMU1TNDFOand2YVcxd2IzSjBiMU5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KQ1FrOGFXSmhia0ZqWTNKbFpHbDBiejVKVkRBd01EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREU4TDJsaVlXNUJZMk55WldScGRHOCtDZ2tKQ1R4allYVnpZV3hsVm1WeWMyRnRaVzUwYno1NGVIaDRlSGg0UEM5allYVnpZV3hsVm1WeWMyRnRaVzUwYno0S0NRa0pQR1JoZEdsVGNHVmphV1pwWTJsU2FYTmpiM056YVc5dVpUNTRlSGg0ZUhoNFBDOWtZWFJwVTNCbFkybG1hV05wVW1selkyOXpjMmx2Ym1VK0Nna0pQQzlrWVhScFUybHVaMjlzYjFabGNuTmhiV1Z1ZEc4K0NnazhMMlJoZEdsV1pYSnpZVzFsYm5SdlBnbzhMMUpRVkQ0PTwvcnB0PgoJCQkJPC9lbGVtZW50b0xpc3RhQ2FycmVsbG9SUFQ+CgkJCTwvbGlzdGFSUFQ+CgkJPC9wcHQ6cHNwSW52aWFDYXJyZWxsb1JQVENhcnRlPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4="
        ]);


        $this->instance_2 = new pspInviaCarrelloRPTCarte([
            "inserted_timestamp" =>  "2024-03-13 10:11:00.210",
            "tipoevento" =>  "pspInviaCarrelloRPTCarte",
            "sottotipoevento" =>  "REQ",
            "idDominio" =>  "",
            "iuv" =>  "",
            "ccp" =>  "",
            "noticeNumber" =>  "",
            "creditorReferenceId" =>  "",
            "paymentToken" =>  "",
            "psp" =>  "PSP_RPT",
            "stazione" =>  "77777777777_01",
            "canale" =>  "88888888888_01",
            "sessionid" =>  "SESSID_02",
            "sessionidoriginal" =>  "SESSORIGIN_02",
            "uniqueid" =>  "UNIQUE_RPT_2",
            "payload" => "PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpwYXlfaj0iaHR0cDovL3d3dy5jbmlwYS5nb3YuaXQvc2NoZW1hcy8yMDEwL1BhZ2FtZW50aS9BY2tfMV8wLyIgeG1sbnM6cHB0PSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnRucz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0IiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBwdDpwc3BJbnZpYUNhcnJlbGxvUlBUQ2FydGU+CgkJCTxpZGVudGlmaWNhdGl2b1BTUD5QU1BfUlBUPC9pZGVudGlmaWNhdGl2b1BTUD4KCQkJPGlkZW50aWZpY2F0aXZvSW50ZXJtZWRpYXJpb1BTUD44ODg4ODg4ODg4ODwvaWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUFNQPgoJCQk8aWRlbnRpZmljYXRpdm9DYW5hbGU+ODg4ODg4ODg4ODhfMDE8L2lkZW50aWZpY2F0aXZvQ2FuYWxlPgoJCQk8bW9kZWxsb1BhZ2FtZW50bz4xPC9tb2RlbGxvUGFnYW1lbnRvPgoJCQk8bGlzdGFSUFQ+CgkJCQk8ZWxlbWVudG9MaXN0YUNhcnJlbGxvUlBUPgoJCQkJCTxpZGVudGlmaWNhdGl2b0RvbWluaW8+Nzc3Nzc3Nzc3Nzc8L2lkZW50aWZpY2F0aXZvRG9taW5pbz4KCQkJCQk8aWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4wMjAwMDAwMDAwMDA2MDAwMTwvaWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4KCQkJCQk8Y29kaWNlQ29udGVzdG9QYWdhbWVudG8+MDAwMDAwMDAwMDAwMDAwMTAxPC9jb2RpY2VDb250ZXN0b1BhZ2FtZW50bz4KCQkJCQk8cnB0PlBGSlFWQ0I0Yld4dWN6MGlhSFIwY0RvdkwzZDNkeTVrYVdkcGRIQmhMbWR2ZGk1cGRDOXpZMmhsYldGekx6SXdNVEV2VUdGbllXMWxiblJwTHlJK0NnazhkbVZ5YzJsdmJtVlBaMmRsZEhSdlBqWXVNaTR3UEM5MlpYSnphVzl1WlU5bloyVjBkRzgrQ2drOFpHOXRhVzVwYno0S0NRazhhV1JsYm5ScFptbGpZWFJwZG05RWIyMXBibWx2UGpjM056YzNOemMzTnpjM1BDOXBaR1Z1ZEdsbWFXTmhkR2wyYjBSdmJXbHVhVzgrQ2drSlBHbGtaVzUwYVdacFkyRjBhWFp2VTNSaGVtbHZibVZTYVdOb2FXVmtaVzUwWlQ0M056YzNOemMzTnpjM04xOHdNVHd2YVdSbGJuUnBabWxqWVhScGRtOVRkR0Y2YVc5dVpWSnBZMmhwWldSbGJuUmxQZ29KUEM5a2IyMXBibWx2UGdvSlBHbGtaVzUwYVdacFkyRjBhWFp2VFdWemMyRm5aMmx2VW1samFHbGxjM1JoUG1ZelpXTXpObVJpTnpoa1lUUTBOR1poWWpSalpqQm1PVEE0T1dKbVpEa3dQQzlwWkdWdWRHbG1hV05oZEdsMmIwMWxjM05oWjJkcGIxSnBZMmhwWlhOMFlUNEtDVHhrWVhSaFQzSmhUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQakl3TWpRdE1EUXRNRGxVTWpFNk5UTTZNelk4TDJSaGRHRlBjbUZOWlhOellXZG5hVzlTYVdOb2FXVnpkR0UrQ2drOFlYVjBaVzUwYVdOaGVtbHZibVZUYjJkblpYUjBiejU0ZUhnOEwyRjFkR1Z1ZEdsallYcHBiMjVsVTI5bloyVjBkRzgrQ2drOGMyOW5aMlYwZEc5UVlXZGhkRzl5WlQ0S0NRazhhV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52VUdGbllYUnZjbVUrQ2drSkNUeDBhWEJ2U1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBuZzhMM1JwY0c5SlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtDZ2tKQ1R4amIyUnBZMlZKWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI4K2VIaDRlSGg0ZUR3dlkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBnb0pDVHd2YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlVHRm5ZWFJ2Y21VK0Nna0pQR0Z1WVdkeVlXWnBZMkZRWVdkaGRHOXlaVDU0ZUhoNGVEd3ZZVzVoWjNKaFptbGpZVkJoWjJGMGIzSmxQZ29KQ1R4dVlYcHBiMjVsVUdGbllYUnZjbVUrU1ZROEwyNWhlbWx2Ym1WUVlXZGhkRzl5WlQ0S0NRazhaUzF0WVdsc1VHRm5ZWFJ2Y21VK2VIaDRlSGhBZUhoNGVDNWpiMjA4TDJVdGJXRnBiRkJoWjJGMGIzSmxQZ29KUEM5emIyZG5aWFIwYjFCaFoyRjBiM0psUGdvSlBHVnVkR1ZDWlc1bFptbGphV0Z5YVc4K0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjBKbGJtVm1hV05wWVhKcGJ6NEtDUWtKUEhScGNHOUpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrUnp3dmRHbHdiMGxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno0S0NRa0pQR052WkdsalpVbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejU0ZUhoNGVIZzhMMk52WkdsalpVbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejRLQ1FrOEwybGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiMEpsYm1WbWFXTnBZWEpwYno0S0NRazhaR1Z1YjIxcGJtRjZhVzl1WlVKbGJtVm1hV05wWVhKcGJ6NTRlSGg0ZUR3dlpHVnViMjFwYm1GNmFXOXVaVUpsYm1WbWFXTnBZWEpwYno0S0NUd3ZaVzUwWlVKbGJtVm1hV05wWVhKcGJ6NEtDVHhrWVhScFZtVnljMkZ0Wlc1MGJ6NEtDUWs4WkdGMFlVVnpaV04xZW1sdmJtVlFZV2RoYldWdWRHOCtNakF5TkMwd05DMHdPVHd2WkdGMFlVVnpaV04xZW1sdmJtVlFZV2RoYldWdWRHOCtDZ2tKUEdsdGNHOXlkRzlVYjNSaGJHVkVZVlpsY25OaGNtVStNVFV4TGpVMlBDOXBiWEJ2Y25SdlZHOTBZV3hsUkdGV1pYSnpZWEpsUGdvSkNUeDBhWEJ2Vm1WeWMyRnRaVzUwYno1RFVEd3ZkR2x3YjFabGNuTmhiV1Z1ZEc4K0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFabGNuTmhiV1Z1ZEc4K01ESXdNREF3TURBd01EQXdOakF3TURBOEwybGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiMVpsY25OaGJXVnVkRzgrQ2drSlBHTnZaR2xqWlVOdmJuUmxjM1J2VUdGbllXMWxiblJ2UGpBd01EQXdNREF3TURBd01EQXdNREV3TUR3dlkyOWthV05sUTI5dWRHVnpkRzlRWVdkaGJXVnVkRzgrQ2drSlBHWnBjbTFoVW1salpYWjFkR0UrTUR3dlptbHliV0ZTYVdObGRuVjBZVDRLQ1FrOFpHRjBhVk5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KQ1FrOGFXMXdiM0owYjFOcGJtZHZiRzlXWlhKellXMWxiblJ2UGpjd0xqVTJQQzlwYlhCdmNuUnZVMmx1WjI5c2IxWmxjbk5oYldWdWRHOCtDZ2tKQ1R4cFltRnVRV05qY21Wa2FYUnZQa2xVTURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNVHd2YVdKaGJrRmpZM0psWkdsMGJ6NEtDUWtKUEdOaGRYTmhiR1ZXWlhKellXMWxiblJ2UG5oNGVIaDRlSGc4TDJOaGRYTmhiR1ZXWlhKellXMWxiblJ2UGdvSkNRazhaR0YwYVZOd1pXTnBabWxqYVZKcGMyTnZjM05wYjI1bFBuaDRlSGg0ZUhnOEwyUmhkR2xUY0dWamFXWnBZMmxTYVhOamIzTnphVzl1WlQ0S0NRazhMMlJoZEdsVGFXNW5iMnh2Vm1WeWMyRnRaVzUwYno0S0NRazhaR0YwYVZOcGJtZHZiRzlXWlhKellXMWxiblJ2UGdvSkNRazhhVzF3YjNKMGIxTnBibWR2Ykc5V1pYSnpZVzFsYm5SdlBqZ3hMakF3UEM5cGJYQnZjblJ2VTJsdVoyOXNiMVpsY25OaGJXVnVkRzgrQ2drSkNUeHBZbUZ1UVdOamNtVmthWFJ2UGtsVU1EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TWp3dmFXSmhia0ZqWTNKbFpHbDBiejRLQ1FrSlBHTmhkWE5oYkdWV1pYSnpZVzFsYm5SdlBuaDRlSGg0ZUhnOEwyTmhkWE5oYkdWV1pYSnpZVzFsYm5SdlBnb0pDUWs4WkdGMGFWTndaV05wWm1samFWSnBjMk52YzNOcGIyNWxQbmg0ZUhoNGVIZzhMMlJoZEdsVGNHVmphV1pwWTJsU2FYTmpiM056YVc5dVpUNEtDUWs4TDJSaGRHbFRhVzVuYjJ4dlZtVnljMkZ0Wlc1MGJ6NEtDVHd2WkdGMGFWWmxjbk5oYldWdWRHOCtDand2VWxCVVBnPT08L3JwdD4KCQkJCTwvZWxlbWVudG9MaXN0YUNhcnJlbGxvUlBUPgoJCQk8L2xpc3RhUlBUPgoJCTwvcHB0OnBzcEludmlhQ2FycmVsbG9SUFRDYXJ0ZT4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+"
        ]);

        $this->instance_3 = new pspInviaCarrelloRPTCarte(
            [
                "inserted_timestamp" =>  "2024-03-13 10:12:00.210",
                "tipoevento" =>  "pspInviaCarrelloRPTCarte",
                "sottotipoevento" =>  "REQ",
                "idDominio" =>  "",
                "iuv" =>  "",
                "ccp" =>  "",
                "noticeNumber" =>  "",
                "creditorReferenceId" =>  "",
                "paymentToken" =>  "",
                "psp" =>  "PSP_RPT",
                "stazione" =>  "77777777777_01",
                "canale" =>  "88888888888_01",
                "sessionid" =>  "SESSID_03",
                "sessionidoriginal" =>  "SESSORIGIN_03",
                "uniqueid" =>  "UNIQUE_RPT_3",
                "payload" => "PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpwYXlfaj0iaHR0cDovL3d3dy5jbmlwYS5nb3YuaXQvc2NoZW1hcy8yMDEwL1BhZ2FtZW50aS9BY2tfMV8wLyIgeG1sbnM6cHB0PSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnRucz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0IiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBwdDpwc3BJbnZpYUNhcnJlbGxvUlBUQ2FydGU+CgkJCTxpZGVudGlmaWNhdGl2b1BTUD5QU1BfUlBUPC9pZGVudGlmaWNhdGl2b1BTUD4KCQkJPGlkZW50aWZpY2F0aXZvSW50ZXJtZWRpYXJpb1BTUD44ODg4ODg4ODg4ODwvaWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUFNQPgoJCQk8aWRlbnRpZmljYXRpdm9DYW5hbGU+ODg4ODg4ODg4ODhfMDE8L2lkZW50aWZpY2F0aXZvQ2FuYWxlPgoJCQk8bW9kZWxsb1BhZ2FtZW50bz4xPC9tb2RlbGxvUGFnYW1lbnRvPgoJCQk8bGlzdGFSUFQ+CgkJCQk8ZWxlbWVudG9MaXN0YUNhcnJlbGxvUlBUPgoJCQkJCTxpZGVudGlmaWNhdGl2b0RvbWluaW8+Nzc3Nzc3Nzc3Nzc8L2lkZW50aWZpY2F0aXZvRG9taW5pbz4KCQkJCQk8aWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4wMjAwMDAwMDAwMDA2MDAwMjwvaWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4KCQkJCQk8Y29kaWNlQ29udGVzdG9QYWdhbWVudG8+MDAwMDAwMDAwMDAwMDAwMTAyPC9jb2RpY2VDb250ZXN0b1BhZ2FtZW50bz4KCQkJCQk8cnB0PlBGSlFWQ0I0Yld4dWN6MGlhSFIwY0RvdkwzZDNkeTVrYVdkcGRIQmhMbWR2ZGk1cGRDOXpZMmhsYldGekx6SXdNVEV2VUdGbllXMWxiblJwTHlJK0NnazhkbVZ5YzJsdmJtVlBaMmRsZEhSdlBqWXVNaTR3UEM5MlpYSnphVzl1WlU5bloyVjBkRzgrQ2drOFpHOXRhVzVwYno0S0NRazhhV1JsYm5ScFptbGpZWFJwZG05RWIyMXBibWx2UGpjM056YzNOemMzTnpjM1BDOXBaR1Z1ZEdsbWFXTmhkR2wyYjBSdmJXbHVhVzgrQ2drSlBHbGtaVzUwYVdacFkyRjBhWFp2VTNSaGVtbHZibVZTYVdOb2FXVmtaVzUwWlQ0M056YzNOemMzTnpjM04xOHdNVHd2YVdSbGJuUnBabWxqWVhScGRtOVRkR0Y2YVc5dVpWSnBZMmhwWldSbGJuUmxQZ29KUEM5a2IyMXBibWx2UGdvSlBHbGtaVzUwYVdacFkyRjBhWFp2VFdWemMyRm5aMmx2VW1samFHbGxjM1JoUG1ZelpXTXpObVJpTnpoa1lUUTBOR1poWWpSalpqQm1PVEE0T1dKbVpEa3dQQzlwWkdWdWRHbG1hV05oZEdsMmIwMWxjM05oWjJkcGIxSnBZMmhwWlhOMFlUNEtDVHhrWVhSaFQzSmhUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQakl3TWpRdE1EUXRNRGxVTWpFNk5UTTZNelk4TDJSaGRHRlBjbUZOWlhOellXZG5hVzlTYVdOb2FXVnpkR0UrQ2drOFlYVjBaVzUwYVdOaGVtbHZibVZUYjJkblpYUjBiejU0ZUhnOEwyRjFkR1Z1ZEdsallYcHBiMjVsVTI5bloyVjBkRzgrQ2drOGMyOW5aMlYwZEc5UVlXZGhkRzl5WlQ0S0NRazhhV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52VUdGbllYUnZjbVUrQ2drSkNUeDBhWEJ2U1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBuZzhMM1JwY0c5SlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtDZ2tKQ1R4amIyUnBZMlZKWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI4K2VIaDRlSGg0ZUR3dlkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBnb0pDVHd2YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlVHRm5ZWFJ2Y21VK0Nna0pQR0Z1WVdkeVlXWnBZMkZRWVdkaGRHOXlaVDU0ZUhoNGVEd3ZZVzVoWjNKaFptbGpZVkJoWjJGMGIzSmxQZ29KQ1R4dVlYcHBiMjVsVUdGbllYUnZjbVUrU1ZROEwyNWhlbWx2Ym1WUVlXZGhkRzl5WlQ0S0NRazhaUzF0WVdsc1VHRm5ZWFJ2Y21VK2VIaDRlSGhBZUhoNGVDNWpiMjA4TDJVdGJXRnBiRkJoWjJGMGIzSmxQZ29KUEM5emIyZG5aWFIwYjFCaFoyRjBiM0psUGdvSlBHVnVkR1ZDWlc1bFptbGphV0Z5YVc4K0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjBKbGJtVm1hV05wWVhKcGJ6NEtDUWtKUEhScGNHOUpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrUnp3dmRHbHdiMGxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno0S0NRa0pQR052WkdsalpVbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejU0ZUhoNGVIZzhMMk52WkdsalpVbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejRLQ1FrOEwybGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiMEpsYm1WbWFXTnBZWEpwYno0S0NRazhaR1Z1YjIxcGJtRjZhVzl1WlVKbGJtVm1hV05wWVhKcGJ6NTRlSGg0ZUR3dlpHVnViMjFwYm1GNmFXOXVaVUpsYm1WbWFXTnBZWEpwYno0S0NUd3ZaVzUwWlVKbGJtVm1hV05wWVhKcGJ6NEtDVHhrWVhScFZtVnljMkZ0Wlc1MGJ6NEtDUWs4WkdGMFlVVnpaV04xZW1sdmJtVlFZV2RoYldWdWRHOCtNakF5TkMwd05DMHdPVHd2WkdGMFlVVnpaV04xZW1sdmJtVlFZV2RoYldWdWRHOCtDZ2tKUEdsdGNHOXlkRzlVYjNSaGJHVkVZVlpsY25OaGNtVStNVFV4TGpVMlBDOXBiWEJ2Y25SdlZHOTBZV3hsUkdGV1pYSnpZWEpsUGdvSkNUeDBhWEJ2Vm1WeWMyRnRaVzUwYno1RFVEd3ZkR2x3YjFabGNuTmhiV1Z1ZEc4K0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFabGNuTmhiV1Z1ZEc4K01ESXdNREF3TURBd01EQXdOakF3TURJOEwybGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiMVpsY25OaGJXVnVkRzgrQ2drSlBHTnZaR2xqWlVOdmJuUmxjM1J2VUdGbllXMWxiblJ2UGpBd01EQXdNREF3TURBd01EQXdNREV3TWp3dlkyOWthV05sUTI5dWRHVnpkRzlRWVdkaGJXVnVkRzgrQ2drSlBHWnBjbTFoVW1salpYWjFkR0UrTUR3dlptbHliV0ZTYVdObGRuVjBZVDRLQ1FrOFpHRjBhVk5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KQ1FrOGFXMXdiM0owYjFOcGJtZHZiRzlXWlhKellXMWxiblJ2UGpjd0xqVTJQQzlwYlhCdmNuUnZVMmx1WjI5c2IxWmxjbk5oYldWdWRHOCtDZ2tKQ1R4cFltRnVRV05qY21Wa2FYUnZQa2xVTURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNVHd2YVdKaGJrRmpZM0psWkdsMGJ6NEtDUWtKUEdOaGRYTmhiR1ZXWlhKellXMWxiblJ2UG5oNGVIaDRlSGc4TDJOaGRYTmhiR1ZXWlhKellXMWxiblJ2UGdvSkNRazhaR0YwYVZOd1pXTnBabWxqYVZKcGMyTnZjM05wYjI1bFBuaDRlSGg0ZUhnOEwyUmhkR2xUY0dWamFXWnBZMmxTYVhOamIzTnphVzl1WlQ0S0NRazhMMlJoZEdsVGFXNW5iMnh2Vm1WeWMyRnRaVzUwYno0S0NRazhaR0YwYVZOcGJtZHZiRzlXWlhKellXMWxiblJ2UGdvSkNRazhhVzF3YjNKMGIxTnBibWR2Ykc5V1pYSnpZVzFsYm5SdlBqZ3hMakF3UEM5cGJYQnZjblJ2VTJsdVoyOXNiMVpsY25OaGJXVnVkRzgrQ2drSkNUeHBZbUZ1UVdOamNtVmthWFJ2UGtsVU1EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TWp3dmFXSmhia0ZqWTNKbFpHbDBiejRLQ1FrSlBHTmhkWE5oYkdWV1pYSnpZVzFsYm5SdlBuaDRlSGg0ZUhnOEwyTmhkWE5oYkdWV1pYSnpZVzFsYm5SdlBnb0pDUWs4WkdGMGFWTndaV05wWm1samFWSnBjMk52YzNOcGIyNWxQbmg0ZUhoNGVIZzhMMlJoZEdsVGNHVmphV1pwWTJsU2FYTmpiM056YVc5dVpUNEtDUWs4TDJSaGRHbFRhVzVuYjJ4dlZtVnljMkZ0Wlc1MGJ6NEtDVHd2WkdGMGFWWmxjbk5oYldWdWRHOCtDand2VWxCVVBnPT08L3JwdD4KCQkJCTwvZWxlbWVudG9MaXN0YUNhcnJlbGxvUlBUPgoJCQkJPGVsZW1lbnRvTGlzdGFDYXJyZWxsb1JQVD4KCQkJCQk8aWRlbnRpZmljYXRpdm9Eb21pbmlvPjc3Nzc3Nzc3Nzc4PC9pZGVudGlmaWNhdGl2b0RvbWluaW8+CgkJCQkJPGlkZW50aWZpY2F0aXZvVW5pdm9jb1ZlcnNhbWVudG8+MDIwMDAwMDAwMDAwNjAwMDM8L2lkZW50aWZpY2F0aXZvVW5pdm9jb1ZlcnNhbWVudG8+CgkJCQkJPGNvZGljZUNvbnRlc3RvUGFnYW1lbnRvPjAwMDAwMDAwMDAwMDAwMDEwMjwvY29kaWNlQ29udGVzdG9QYWdhbWVudG8+CgkJCQkJPHJwdD5QRkpRVkNCNGJXeHVjejBpYUhSMGNEb3ZMM2QzZHk1a2FXZHBkSEJoTG1kdmRpNXBkQzl6WTJobGJXRnpMekl3TVRFdlVHRm5ZVzFsYm5ScEx5SStDZ2s4ZG1WeWMybHZibVZQWjJkbGRIUnZQall1TWk0d1BDOTJaWEp6YVc5dVpVOW5aMlYwZEc4K0NnazhaRzl0YVc1cGJ6NEtDUWs4YVdSbGJuUnBabWxqWVhScGRtOUViMjFwYm1sdlBqYzNOemMzTnpjM056YzNQQzlwWkdWdWRHbG1hV05oZEdsMmIwUnZiV2x1YVc4K0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlUzUmhlbWx2Ym1WU2FXTm9hV1ZrWlc1MFpUNDNOemMzTnpjM056YzNOMTh3TVR3dmFXUmxiblJwWm1sallYUnBkbTlUZEdGNmFXOXVaVkpwWTJocFpXUmxiblJsUGdvSlBDOWtiMjFwYm1sdlBnb0pQR2xrWlc1MGFXWnBZMkYwYVhadlRXVnpjMkZuWjJsdlVtbGphR2xsYzNSaFBtWXpaV016Tm1SaU56aGtZVFEwTkdaaFlqUmpaakJtT1RBNE9XSm1aRGt3UEM5cFpHVnVkR2xtYVdOaGRHbDJiMDFsYzNOaFoyZHBiMUpwWTJocFpYTjBZVDRLQ1R4a1lYUmhUM0poVFdWemMyRm5aMmx2VW1samFHbGxjM1JoUGpJd01qUXRNRFF0TURsVU1qRTZOVE02TXpZOEwyUmhkR0ZQY21GTlpYTnpZV2RuYVc5U2FXTm9hV1Z6ZEdFK0NnazhZWFYwWlc1MGFXTmhlbWx2Ym1WVGIyZG5aWFIwYno1NGVIZzhMMkYxZEdWdWRHbGpZWHBwYjI1bFUyOW5aMlYwZEc4K0NnazhjMjluWjJWMGRHOVFZV2RoZEc5eVpUNEtDUWs4YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlVHRm5ZWFJ2Y21VK0Nna0pDVHgwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQbmc4TDNScGNHOUpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSkNUeGpiMlJwWTJWSlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtlSGg0ZUhoNGVEd3ZZMjlrYVdObFNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1R3dmFXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZVR0ZuWVhSdmNtVStDZ2tKUEdGdVlXZHlZV1pwWTJGUVlXZGhkRzl5WlQ1NGVIaDRlRHd2WVc1aFozSmhabWxqWVZCaFoyRjBiM0psUGdvSkNUeHVZWHBwYjI1bFVHRm5ZWFJ2Y21VK1NWUThMMjVoZW1sdmJtVlFZV2RoZEc5eVpUNEtDUWs4WlMxdFlXbHNVR0ZuWVhSdmNtVStlSGg0ZUhoQWVIaDRlQzVqYjIwOEwyVXRiV0ZwYkZCaFoyRjBiM0psUGdvSlBDOXpiMmRuWlhSMGIxQmhaMkYwYjNKbFBnb0pQR1Z1ZEdWQ1pXNWxabWxqYVdGeWFXOCtDZ2tKUEdsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amIwSmxibVZtYVdOcFlYSnBiejRLQ1FrSlBIUnBjRzlKWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI4K1J6d3ZkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NEtDUWtKUEdOdlpHbGpaVWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno1NGVIaDRlSGc4TDJOdlpHbGpaVWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno0S0NRazhMMmxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjBKbGJtVm1hV05wWVhKcGJ6NEtDUWs4WkdWdWIyMXBibUY2YVc5dVpVSmxibVZtYVdOcFlYSnBiejU0ZUhoNGVEd3ZaR1Z1YjIxcGJtRjZhVzl1WlVKbGJtVm1hV05wWVhKcGJ6NEtDVHd2Wlc1MFpVSmxibVZtYVdOcFlYSnBiejRLQ1R4a1lYUnBWbVZ5YzJGdFpXNTBiejRLQ1FrOFpHRjBZVVZ6WldOMWVtbHZibVZRWVdkaGJXVnVkRzgrTWpBeU5DMHdOQzB3T1R3dlpHRjBZVVZ6WldOMWVtbHZibVZRWVdkaGJXVnVkRzgrQ2drSlBHbHRjRzl5ZEc5VWIzUmhiR1ZFWVZabGNuTmhjbVUrTVRZeExqVTJQQzlwYlhCdmNuUnZWRzkwWVd4bFJHRldaWEp6WVhKbFBnb0pDVHgwYVhCdlZtVnljMkZ0Wlc1MGJ6NURVRHd2ZEdsd2IxWmxjbk5oYldWdWRHOCtDZ2tKUEdsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amIxWmxjbk5oYldWdWRHOCtNREl3TURBd01EQXdNREF3TmpBd01ETThMMmxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFabGNuTmhiV1Z1ZEc4K0Nna0pQR052WkdsalpVTnZiblJsYzNSdlVHRm5ZVzFsYm5SdlBqQXdNREF3TURBd01EQXdNREF3TURFd01qd3ZZMjlrYVdObFEyOXVkR1Z6ZEc5UVlXZGhiV1Z1ZEc4K0Nna0pQR1pwY20xaFVtbGpaWFoxZEdFK01Ed3ZabWx5YldGU2FXTmxkblYwWVQ0S0NRazhaR0YwYVZOcGJtZHZiRzlXWlhKellXMWxiblJ2UGdvSkNRazhhVzF3YjNKMGIxTnBibWR2Ykc5V1pYSnpZVzFsYm5SdlBqY3dMalUyUEM5cGJYQnZjblJ2VTJsdVoyOXNiMVpsY25OaGJXVnVkRzgrQ2drSkNUeHBZbUZ1UVdOamNtVmthWFJ2UGtsVU1EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TVR3dmFXSmhia0ZqWTNKbFpHbDBiejRLQ1FrSlBHTmhkWE5oYkdWV1pYSnpZVzFsYm5SdlBuaDRlSGg0ZUhnOEwyTmhkWE5oYkdWV1pYSnpZVzFsYm5SdlBnb0pDUWs4WkdGMGFWTndaV05wWm1samFWSnBjMk52YzNOcGIyNWxQbmg0ZUhoNGVIZzhMMlJoZEdsVGNHVmphV1pwWTJsU2FYTmpiM056YVc5dVpUNEtDUWs4TDJSaGRHbFRhVzVuYjJ4dlZtVnljMkZ0Wlc1MGJ6NEtDUWs4WkdGMGFWTnBibWR2Ykc5V1pYSnpZVzFsYm5SdlBnb0pDUWs4YVcxd2IzSjBiMU5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQamt4TGpBd1BDOXBiWEJ2Y25SdlUybHVaMjlzYjFabGNuTmhiV1Z1ZEc4K0Nna0pDVHhwWW1GdVFXTmpjbVZrYVhSdlBrbFVNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01qd3ZhV0poYmtGalkzSmxaR2wwYno0S0NRa0pQR05oZFhOaGJHVldaWEp6WVcxbGJuUnZQbmg0ZUhoNGVIZzhMMk5oZFhOaGJHVldaWEp6WVcxbGJuUnZQZ29KQ1FrOFpHRjBhVk53WldOcFptbGphVkpwYzJOdmMzTnBiMjVsUG5oNGVIaDRlSGc4TDJSaGRHbFRjR1ZqYVdacFkybFNhWE5qYjNOemFXOXVaVDRLQ1FrOEwyUmhkR2xUYVc1bmIyeHZWbVZ5YzJGdFpXNTBiejRLQ1R3dlpHRjBhVlpsY25OaGJXVnVkRzgrQ2p3dlVsQlVQZz09PC9ycHQ+CgkJCQk8L2VsZW1lbnRvTGlzdGFDYXJyZWxsb1JQVD4KCQkJPC9saXN0YVJQVD4KCQk8L3BwdDpwc3BJbnZpYUNhcnJlbGxvUlBUQ2FydGU+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg=="
            ]
        );
    }

    #[TestDox('getStazione()')]
    public function testGetStazione()
    {
        $this->assertNull($this->instance_1->getStazione());
        $this->assertNull($this->instance_2->getStazione());
        $this->assertNull($this->instance_3->getStazione());
    }

    #[TestDox('getCcp()')]
    public function testGetCcp()
    {
        $this->assertEquals('000000000000000100', $this->instance_1->getCcp(0));
        $this->assertEquals('000000000000000101', $this->instance_2->getCcp(0));
        $this->assertEquals('000000000000000102', $this->instance_3->getCcp(0));
        $this->assertEquals('000000000000000102', $this->instance_3->getCcp(1));

        $this->assertNull($this->instance_1->getCcp(1));
        $this->assertNull($this->instance_2->getCcp(1));
        $this->assertNull($this->instance_3->getCcp(2));

    }

    #[TestDox('getPsp()')]
    public function testGetPsp()
    {
        $this->assertEquals('PSP_RPT', $this->instance_1->getPsp());
        $this->assertEquals('PSP_RPT', $this->instance_2->getPsp());
        $this->assertEquals('PSP_RPT', $this->instance_3->getPsp());
    }

    #[TestDox('getBrokerPsp()')]
    public function testGetBrokerPsp()
    {
        $this->assertEquals('88888888888', $this->instance_1->getBrokerPsp());
        $this->assertEquals('88888888888', $this->instance_2->getBrokerPsp());
        $this->assertEquals('88888888888', $this->instance_3->getBrokerPsp());
    }

    #[TestDox('getBrokerPa()')]
    public function testGetBrokerPa()
    {
        $this->assertNull($this->instance_1->getBrokerPa());
        $this->assertNull($this->instance_2->getBrokerPa());
        $this->assertNull($this->instance_3->getBrokerPa());
    }

    #[TestDox('workflowEvent()')]
    public function testWorkflowEvent()
    {
        $workflow = $this->instance_1->workflowEvent(0);
        $this->assertEquals('UNIQUE_RPT_1', $workflow->getReadyColumnValue('event_id'));
        $this->assertEquals('2024-03-13 10:10:00.210', $workflow->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('PSP_RPT', $workflow->getReadyColumnValue('id_psp'));

        $workflow = $this->instance_1->workflowEvent(1);
        $this->assertNull($workflow);

        $workflow = $this->instance_2->workflowEvent(0);
        $this->assertEquals('UNIQUE_RPT_2', $workflow->getReadyColumnValue('event_id'));
        $this->assertEquals('2024-03-13 10:11:00.210', $workflow->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('PSP_RPT', $workflow->getReadyColumnValue('id_psp'));

        $workflow = $this->instance_2->workflowEvent(1);
        $this->assertNull($workflow);



        $workflow = $this->instance_3->workflowEvent(0);
        $this->assertEquals('UNIQUE_RPT_3', $workflow->getReadyColumnValue('event_id'));
        $this->assertEquals('2024-03-13 10:12:00.210', $workflow->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('PSP_RPT', $workflow->getReadyColumnValue('id_psp'));

        $workflow = $this->instance_3->workflowEvent(1);
        $this->assertEquals('UNIQUE_RPT_3', $workflow->getReadyColumnValue('event_id'));
        $this->assertEquals('2024-03-13 10:12:00.210', $workflow->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('PSP_RPT', $workflow->getReadyColumnValue('id_psp'));

        $workflow = $this->instance_3->workflowEvent(2);
        $this->assertNull($workflow);

    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $this->assertEquals(['02000000000060000'], $this->instance_1->getIuvs());
        $this->assertEquals(['02000000000060001'], $this->instance_2->getIuvs());
        $this->assertEquals(['02000000000060002', '02000000000060003'], $this->instance_3->getIuvs());
    }

    #[TestDox('getCreditorReferenceId()')]
    public function testGetCreditorReferenceId()
    {
        $this->assertEquals('02000000000060000', $this->instance_1->getCreditorReferenceId(0));
        $this->assertEquals('02000000000060001', $this->instance_2->getCreditorReferenceId(0));
        $this->assertEquals('02000000000060002', $this->instance_3->getCreditorReferenceId(0));
        $this->assertEquals('02000000000060003', $this->instance_3->getCreditorReferenceId(1));

        $this->assertNull($this->instance_1->getCreditorReferenceId(1));
        $this->assertNull($this->instance_2->getCreditorReferenceId(1));
        $this->assertNull($this->instance_3->getCreditorReferenceId(2));
    }

    #[TestDox('getCanale()')]
    public function testGetCanale()
    {
        $this->assertEquals('88888888888_01', $this->instance_1->getCanale());
        $this->assertEquals('88888888888_01', $this->instance_2->getCanale());
        $this->assertEquals('88888888888_01', $this->instance_3->getCanale());
    }

    #[TestDox('getFaultCode()')]
    public function testGetFaultCode()
    {
        $this->assertNull($this->instance_1->getFaultCode());
        $this->assertNull($this->instance_2->getFaultCode());
        $this->assertNull($this->instance_3->getFaultCode());
    }

    #[TestDox('getFaultCode()')]
    public function testGetFaultString()
    {
        $this->assertNull($this->instance_1->getFaultString());
        $this->assertNull($this->instance_2->getFaultString());
        $this->assertNull($this->instance_3->getFaultString());
    }

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $this->assertEquals('77777777777', $this->instance_1->getPaEmittente(0));
        $this->assertEquals('77777777777', $this->instance_2->getPaEmittente(0));
        $this->assertEquals('77777777777', $this->instance_3->getPaEmittente(0));
        $this->assertEquals('77777777778', $this->instance_3->getPaEmittente(1));
    }

    #[TestDox('transaction()')]
    public function testTransactionDetails()
    {
        $this->assertNull($this->instance_1->transaction(0));
        $this->assertNull($this->instance_2->transaction(0));
        $this->assertNull($this->instance_3->transaction(0));
    }

    #[TestDox('getPaymentToken()')]
    public function testGetPaymentToken()
    {
        $this->assertEquals('000000000000000100', $this->instance_1->getPaymentToken(0));
        $this->assertEquals('000000000000000101', $this->instance_2->getPaymentToken(0));
        $this->assertEquals('000000000000000102', $this->instance_3->getPaymentToken(0));
        $this->assertEquals('000000000000000102', $this->instance_3->getPaymentToken(1));

        $this->assertNull($this->instance_1->getPaymentToken(1));
        $this->assertNull($this->instance_2->getPaymentToken(1));
        $this->assertNull($this->instance_3->getPaymentToken(2));

    }

    #[TestDox('getNoticeNumber()')]
    public function testGetNoticeNumber()
    {
        $this->assertNull($this->instance_1->getNoticeNumber(0));
        $this->assertNull($this->instance_2->getNoticeNumber(0));
        $this->assertNull($this->instance_3->getNoticeNumber(0));
    }

    #[TestDox('getMethodInterface()')]
    public function testGetMethodInterface()
    {
        $this->assertInstanceOf(\pagopa\crawler\methods\req\pspInviaCarrelloRPTCarte::class, $this->instance_1->getMethodInterface());
        $this->assertInstanceOf(\pagopa\crawler\methods\req\pspInviaCarrelloRPTCarte::class, $this->instance_2->getMethodInterface());
        $this->assertInstanceOf(\pagopa\crawler\methods\req\pspInviaCarrelloRPTCarte::class, $this->instance_3->getMethodInterface());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $this->assertEquals(['77777777777'], $this->instance_1->getPaEmittenti());
        $this->assertEquals(['77777777777'], $this->instance_2->getPaEmittenti());
        $this->assertEquals(['77777777777', '77777777778'], $this->instance_3->getPaEmittenti());
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertEquals(1, $this->instance_1->getTransferCount(0));
        $this->assertNull($this->instance_1->getTransferCount(1));

        $this->assertEquals(2, $this->instance_2->getTransferCount(0));
        $this->assertNull($this->instance_2->getTransferCount(1));

        $this->assertEquals(2, $this->instance_3->getTransferCount(0));
        $this->assertEquals(2, $this->instance_3->getTransferCount(1));
        $this->assertNull($this->instance_3->getTransferCount(2));
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->instance_1->getPaymentsCount());
        $this->assertEquals(1, $this->instance_2->getPaymentsCount());
        $this->assertEquals(2, $this->instance_3->getPaymentsCount());
    }

    #[TestDox('getFaultDescription()')]
    public function testGetFaultDescription()
    {
        $this->assertNull($this->instance_1->getFaultDescription());
        $this->assertNull($this->instance_2->getFaultDescription());
        $this->assertNull($this->instance_3->getFaultDescription());
    }

    #[TestDox('getIuv()')]
    public function testGetIuv()
    {
        $this->assertEquals('02000000000060000', $this->instance_1->getIuv(0));
        $this->assertEquals('02000000000060001', $this->instance_2->getIuv(0));
        $this->assertEquals('02000000000060002', $this->instance_3->getIuv(0));
        $this->assertEquals('02000000000060003', $this->instance_3->getIuv(1));

        $this->assertNull($this->instance_1->getIuv(1));
        $this->assertNull($this->instance_2->getIuv(1));
        $this->assertNull($this->instance_3->getIuv(2));

    }

    #[TestDox('isFaultEvent()')]
    public function testIsFaultEvent()
    {
        $this->assertFalse($this->instance_1->isFaultEvent());
        $this->assertFalse($this->instance_2->isFaultEvent());
        $this->assertFalse($this->instance_3->isFaultEvent());
    }
    #[TestDox('isFaultEvent()')]
    public function testGetCcps()
    {
        $this->assertEquals(['000000000000000100'], $this->instance_1->getCcps());
        $this->assertEquals(['000000000000000101'], $this->instance_2->getCcps());
        $this->assertEquals(['000000000000000102', '000000000000000102'], $this->instance_3->getCcps());
    }
    #[TestDox('transaction()')]
    public function testTransaction()
    {
        $this->assertNull($this->instance_1->transaction(0));
        $this->assertNull($this->instance_2->transaction(0));
        $this->assertNull($this->instance_3->transaction(0));
    }
}

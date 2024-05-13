<?php

namespace pagopa\events\resp;

use pagopa\crawler\events\resp\nodoChiediCopiaRT;
use pagopa\crawler\MapEvents;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('events\resp\nodoChiediCopiaRTTest::class')]
class nodoChiediCopiaRTTest extends TestCase
{

    protected nodoChiediCopiaRT $nodoChiediCopiaRT;

    protected nodoChiediCopiaRT $fault;

    protected function setUp(): void
    {
        $this->nodoChiediCopiaRT = new nodoChiediCopiaRT(
            [
                'date_event' => '2023-09-01',
                'inserted_timestamp' => '2023-09-01 07:37:50',
                'tipoevento' => 'nodoChiediCopiaRT',
                'sottotipoevento' => 'RESP',
                'psp' => 'AGID_01',
                'stazione' => '77777777777_01',
                'canale' => '88888888888_01',
                'sessionid' => 'sessid_0010',
                'sessionidoriginal' => '',
                'uniqueid' => 'unique_id_activateIO_OK',
                'state' => 'TO_LOAD',
                'iddominio' => '77777777777',
                'iuv' => '01000000000000010',
                'ccp' => 'c000000000000000010',
                'noticeNumber' => '',
                'creditorreferenceid' => '01000000000000010',
                'paymenttoken' => 'c000000000000000010',
                'payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpwcHQ9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIiB4bWxuczpwcHRoZWFkPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIiB4bWxuczp0bnM9Imh0dHA6Ly9Ob2RvUGFnYW1lbnRpU1BDLnNwY29vcC5nb3YuaXQvc2Vydml6aS9QYWdhbWVudGlUZWxlbWF0aWNpUlBUIiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBwdDpub2RvQ2hpZWRpQ29waWFSVFJpc3Bvc3RhPgoJCQk8cnQ+UEQ5NGJXd2dkbVZ5YzJsdmJqMGlNUzR3SWlCbGJtTnZaR2x1WnowaVZWUkdMVGdpUHo0S1BIQmhlVjlwT2xKVUlIaHRiRzV6T25CaGVWOXBQU0pvZEhSd09pOHZkM2QzTG1ScFoybDBjR0V1WjI5MkxtbDBMM05qYUdWdFlYTXZNakF4TVM5UVlXZGhiV1Z1ZEdrdklpQjRiV3h1Y3pwNGMyazlJbWgwZEhBNkx5OTNkM2N1ZHpNdWIzSm5Mekl3TURFdldFMU1VMk5vWlcxaExXbHVjM1JoYm1ObElpQjRjMms2YzJOb1pXMWhURzlqWVhScGIyNDlJaTl2Y0hRdmNITndZWGhsY0hSaEwzSmxjMjkxY21ObGN5OVFZV2RKYm1aZlVsQlVYMUpVWHpaZk1sOHdMbmh6WkNJK0NnazhjR0Y1WDJrNmRtVnljMmx2Ym1WUFoyZGxkSFJ2UGpZdU1pNHdQQzl3WVhsZmFUcDJaWEp6YVc5dVpVOW5aMlYwZEc4K0NnazhjR0Y1WDJrNlpHOXRhVzVwYno0S0NRazhjR0Y1WDJrNmFXUmxiblJwWm1sallYUnBkbTlFYjIxcGJtbHZQamMzTnpjM056YzNOemMzUEM5d1lYbGZhVHBwWkdWdWRHbG1hV05oZEdsMmIwUnZiV2x1YVc4K0Nna0pQSEJoZVY5cE9tbGtaVzUwYVdacFkyRjBhWFp2VTNSaGVtbHZibVZTYVdOb2FXVmtaVzUwWlQ0M056YzNOemMzTnpjM04xOHdNVHd2Y0dGNVgyazZhV1JsYm5ScFptbGpZWFJwZG05VGRHRjZhVzl1WlZKcFkyaHBaV1JsYm5SbFBnb0pQQzl3WVhsZmFUcGtiMjFwYm1sdlBnb0pQSEJoZVY5cE9tbGtaVzUwYVdacFkyRjBhWFp2VFdWemMyRm5aMmx2VW1salpYWjFkR0UrYzJSbVpEazRaSGR2Wm1wa2EyeHNNak5sT0hOaGMyUnpZVHd2Y0dGNVgyazZhV1JsYm5ScFptbGpZWFJwZG05TlpYTnpZV2RuYVc5U2FXTmxkblYwWVQ0S0NUeHdZWGxmYVRwa1lYUmhUM0poVFdWemMyRm5aMmx2VW1salpYWjFkR0UrTWpBeU5DMHdOUzB4TTFReU1Ub3lORG95TlR3dmNHRjVYMms2WkdGMFlVOXlZVTFsYzNOaFoyZHBiMUpwWTJWMmRYUmhQZ29KUEhCaGVWOXBPbkpwWm1WeWFXMWxiblJ2VFdWemMyRm5aMmx2VW1samFHbGxjM1JoUGpJeU5ESXpORE16TVR3dmNHRjVYMms2Y21sbVpYSnBiV1Z1ZEc5TlpYTnpZV2RuYVc5U2FXTm9hV1Z6ZEdFK0NnazhjR0Y1WDJrNmNtbG1aWEpwYldWdWRHOUVZWFJoVW1samFHbGxjM1JoUGpJd01qUXRNRFV0TVRNOEwzQmhlVjlwT25KcFptVnlhVzFsYm5SdlJHRjBZVkpwWTJocFpYTjBZVDRLQ1R4d1lYbGZhVHBwYzNScGRIVjBiMEYwZEdWemRHRnVkR1UrQ2drSlBIQmhlVjlwT21sa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amIwRjBkR1Z6ZEdGdWRHVStDZ2tKQ1R4d1lYbGZhVHAwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQa0k4TDNCaGVWOXBPblJwY0c5SlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtDZ2tKQ1R4d1lYbGZhVHBqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrUVVkSlJGOHdNVHd2Y0dGNVgyazZZMjlrYVdObFNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1R3dmNHRjVYMms2YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlFYUjBaWE4wWVc1MFpUNEtDUWs4Y0dGNVgyazZaR1Z1YjIxcGJtRjZhVzl1WlVGMGRHVnpkR0Z1ZEdVK1RXOWpheUJRVTFBOEwzQmhlVjlwT21SbGJtOXRhVzVoZW1sdmJtVkJkSFJsYzNSaGJuUmxQZ29KUEM5d1lYbGZhVHBwYzNScGRIVjBiMEYwZEdWemRHRnVkR1UrQ2drOGNHRjVYMms2Wlc1MFpVSmxibVZtYVdOcFlYSnBiejRLQ1FrOGNHRjVYMms2YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlFtVnVaV1pwWTJsaGNtbHZQZ29KQ1FrOGNHRjVYMms2ZEdsd2IwbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejVIUEM5d1lYbGZhVHAwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1FrOGNHRjVYMms2WTI5a2FXTmxTV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52UGpnNE9EZzRPRGc0T0RnNFBDOXdZWGxmYVRwamIyUnBZMlZKWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI4K0Nna0pQQzl3WVhsZmFUcHBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlDWlc1bFptbGphV0Z5YVc4K0Nna0pQSEJoZVY5cE9tUmxibTl0YVc1aGVtbHZibVZDWlc1bFptbGphV0Z5YVc4K1EyOXRkVzVsUEM5d1lYbGZhVHBrWlc1dmJXbHVZWHBwYjI1bFFtVnVaV1pwWTJsaGNtbHZQZ29KUEM5d1lYbGZhVHBsYm5SbFFtVnVaV1pwWTJsaGNtbHZQZ29KUEhCaGVWOXBPbk52WjJkbGRIUnZWbVZ5YzJGdWRHVStDZ2tKUEhCaGVWOXBPbWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFabGNuTmhiblJsUGdvSkNRazhjR0Y1WDJrNmRHbHdiMGxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno1R1BDOXdZWGxmYVRwMGFYQnZTV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52UGdvSkNRazhjR0Y1WDJrNlkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBuaDRlSGg0ZUhoNGVIaDRlSGg0ZUhnOEwzQmhlVjlwT21OdlpHbGpaVWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno0S0NRazhMM0JoZVY5cE9tbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiMVpsY25OaGJuUmxQZ29KQ1R4d1lYbGZhVHBoYm1GbmNtRm1hV05oVm1WeWMyRnVkR1UrZUhoNGVIaDRQQzl3WVhsZmFUcGhibUZuY21GbWFXTmhWbVZ5YzJGdWRHVStDZ2tKUEhCaGVWOXBPbWx1WkdseWFYcDZiMVpsY25OaGJuUmxQbmg0ZUhoNGVEd3ZjR0Y1WDJrNmFXNWthWEpwZW5wdlZtVnljMkZ1ZEdVK0Nna0pQSEJoZVY5cE9teHZZMkZzYVhSaFZtVnljMkZ1ZEdVK2VIaDRlRHd2Y0dGNVgyazZiRzlqWVd4cGRHRldaWEp6WVc1MFpUNEtDUWs4Y0dGNVgyazZjSEp2ZG1sdVkybGhWbVZ5YzJGdWRHVStlSGg0ZUR3dmNHRjVYMms2Y0hKdmRtbHVZMmxoVm1WeWMyRnVkR1UrQ2drSlBIQmhlVjlwT201aGVtbHZibVZXWlhKellXNTBaVDU0ZUhoNGVIZzhMM0JoZVY5cE9tNWhlbWx2Ym1WV1pYSnpZVzUwWlQ0S0NRazhjR0Y1WDJrNlpTMXRZV2xzVm1WeWMyRnVkR1UrZUhoNGVIaDRlRHd2Y0dGNVgyazZaUzF0WVdsc1ZtVnljMkZ1ZEdVK0NnazhMM0JoZVY5cE9uTnZaMmRsZEhSdlZtVnljMkZ1ZEdVK0NnazhjR0Y1WDJrNmMyOW5aMlYwZEc5UVlXZGhkRzl5WlQ0S0NRazhjR0Y1WDJrNmFXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZVR0ZuWVhSdmNtVStDZ2tKQ1R4d1lYbGZhVHAwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQa1k4TDNCaGVWOXBPblJwY0c5SlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtDZ2tKQ1R4d1lYbGZhVHBqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrZUhoNGVIaDRlSGg0ZUhoNGVEd3ZjR0Y1WDJrNlkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBnb0pDVHd2Y0dGNVgyazZhV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52VUdGbllYUnZjbVUrQ2drSlBIQmhlVjlwT21GdVlXZHlZV1pwWTJGUVlXZGhkRzl5WlQ1NGVIaDRlSGg0ZUhnOEwzQmhlVjlwT21GdVlXZHlZV1pwWTJGUVlXZGhkRzl5WlQ0S0NUd3ZjR0Y1WDJrNmMyOW5aMlYwZEc5UVlXZGhkRzl5WlQ0S0NUeHdZWGxmYVRwa1lYUnBVR0ZuWVcxbGJuUnZQZ29KQ1R4d1lYbGZhVHBqYjJScFkyVkZjMmwwYjFCaFoyRnRaVzUwYno0d1BDOXdZWGxmYVRwamIyUnBZMlZGYzJsMGIxQmhaMkZ0Wlc1MGJ6NEtDUWs4Y0dGNVgyazZhVzF3YjNKMGIxUnZkR0ZzWlZCaFoyRjBiejQ1TUM0d01Ed3ZjR0Y1WDJrNmFXMXdiM0owYjFSdmRHRnNaVkJoWjJGMGJ6NEtDUWs4Y0dGNVgyazZhV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52Vm1WeWMyRnRaVzUwYno0d01UQXdNREF3TURBd01EQXdNREF4TUR3dmNHRjVYMms2YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlZtVnljMkZ0Wlc1MGJ6NEtDUWs4Y0dGNVgyazZRMjlrYVdObFEyOXVkR1Z6ZEc5UVlXZGhiV1Z1ZEc4K1l6QXdNREF3TURBd01EQXdNREF3TURBeE1Ed3ZjR0Y1WDJrNlEyOWthV05sUTI5dWRHVnpkRzlRWVdkaGJXVnVkRzgrQ2drSlBIQmhlVjlwT21SaGRHbFRhVzVuYjJ4dlVHRm5ZVzFsYm5SdlBnb0pDUWs4Y0dGNVgyazZjMmx1WjI5c2IwbHRjRzl5ZEc5UVlXZGhkRzgrT1RBdU1EQThMM0JoZVY5cE9uTnBibWR2Ykc5SmJYQnZjblJ2VUdGbllYUnZQZ29KQ1FrOGNHRjVYMms2WlhOcGRHOVRhVzVuYjJ4dlVHRm5ZVzFsYm5SdlBsQkJSMEZVUVR3dmNHRjVYMms2WlhOcGRHOVRhVzVuYjJ4dlVHRm5ZVzFsYm5SdlBnb0pDUWs4Y0dGNVgyazZaR0YwWVVWemFYUnZVMmx1WjI5c2IxQmhaMkZ0Wlc1MGJ6NHlNREkwTFRBMUxURXpQQzl3WVhsZmFUcGtZWFJoUlhOcGRHOVRhVzVuYjJ4dlVHRm5ZVzFsYm5SdlBnb0pDUWs4Y0dGNVgyazZhV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52VW1selkyOXpjMmx2Ym1VK01URXhNVEV4TVRFeE1URThMM0JoZVY5cE9tbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiMUpwYzJOdmMzTnBiMjVsUGdvSkNRazhjR0Y1WDJrNlkyRjFjMkZzWlZabGNuTmhiV1Z1ZEc4K2VIaDRlSGg0ZUhoNFBDOXdZWGxmYVRwallYVnpZV3hsVm1WeWMyRnRaVzUwYno0S0NRa0pQSEJoZVY5cE9tUmhkR2xUY0dWamFXWnBZMmxTYVhOamIzTnphVzl1WlQ0NUx6QXhNRGN4TURGVVV5ODhMM0JoZVY5cE9tUmhkR2xUY0dWamFXWnBZMmxTYVhOamIzTnphVzl1WlQ0S0NRazhMM0JoZVY5cE9tUmhkR2xUYVc1bmIyeHZVR0ZuWVcxbGJuUnZQZ29KUEM5d1lYbGZhVHBrWVhScFVHRm5ZVzFsYm5SdlBnbzhMM0JoZVY5cE9sSlVQZz09PC9ydD4KCQk8L3BwdDpub2RvQ2hpZWRpQ29waWFSVFJpc3Bvc3RhPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4='
            ]
        );

        $this->fault = new nodoChiediCopiaRT(
            [
                'date_event' => '2023-09-01',
                'inserted_timestamp' => '2023-09-01 07:37:50',
                'tipoevento' => 'nodoChiediCopiaRT',
                'sottotipoevento' => 'RESP',
                'psp' => 'AGID_01',
                'stazione' => '77777777777_01',
                'canale' => '88888888888_01',
                'sessionid' => 'sessid_0010',
                'sessionidoriginal' => '',
                'uniqueid' => 'unique_id_activateIO_OK',
                'state' => 'TO_LOAD',
                'iddominio' => '77777777777',
                'iuv' => '01000000000000010',
                'ccp' => 'c000000000000000010',
                'noticeNumber' => '',
                'creditorreferenceid' => '01000000000000010',
                'paymenttoken' => 'c000000000000000010',
                'payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpwcHQ9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIiB4bWxuczpwcHRoZWFkPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIiB4bWxuczp0bnM9Imh0dHA6Ly9Ob2RvUGFnYW1lbnRpU1BDLnNwY29vcC5nb3YuaXQvc2Vydml6aS9QYWdhbWVudGlUZWxlbWF0aWNpUlBUIiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBwdDpub2RvQ2hpZWRpQ29waWFSVFJpc3Bvc3RhPgoJCQk8ZmF1bHQ+CgkJCQk8ZmF1bHRDb2RlPlBQVF9SVF9OT05ESVNQT05JQklMRTwvZmF1bHRDb2RlPgoJCQkJPGZhdWx0U3RyaW5nPlJUIG5vbiBhbmNvcmEgcHJvbnRhLjwvZmF1bHRTdHJpbmc+CgkJCQk8aWQ+Tm9kb0RlaVBhZ2FtZW50aVNQQzwvaWQ+CgkJCQk8ZGVzY3JpcHRpb24+UlQgbm9uIGRpc3BvbmliaWxlLCByaXByb3ZhcmUgaW4gdW4gc2Vjb25kbyBtb21lbnRvPC9kZXNjcmlwdGlvbj4KCQkJPC9mYXVsdD4KCQk8L3BwdDpub2RvQ2hpZWRpQ29waWFSVFJpc3Bvc3RhPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4='
            ]
        );
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertNull($this->nodoChiediCopiaRT->getTransferCount());
        $this->assertNull($this->fault->getTransferCount());
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $value = ['01000000000000010'];
        $this->assertEquals($value, $this->nodoChiediCopiaRT->getIuvs());
        $this->assertEquals($value, $this->fault->getIuvs());
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $value = ['c000000000000000010'];
        $this->assertEquals($value, $this->nodoChiediCopiaRT->getCcps());
        $this->assertEquals($value, $this->fault->getCcps());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $value = ['77777777777'];
        $this->assertEquals($value, $this->nodoChiediCopiaRT->getPaEmittenti());
        $this->assertEquals($value, $this->fault->getPaEmittenti());
    }

    #[TestDox('transaction()')]
    public function testTransaction()
    {
        $this->assertNull($this->nodoChiediCopiaRT->transaction());
        $this->assertNull($this->fault->transaction());
    }

    #[TestDox('transactionDetails()')]
    public function testTransactionDetails()
    {
        $this->assertNull($this->nodoChiediCopiaRT->transactionDetails(0));
        $this->assertNull($this->fault->transactionDetails(0));
    }

    #[TestDox('getMethodInterface()')]
    public function testGetMethodInterface()
    {
        $this->assertInstanceOf(\pagopa\crawler\methods\resp\nodoChiediCopiaRT::class, $this->nodoChiediCopiaRT->getMethodInterface());
        $this->assertInstanceOf(\pagopa\crawler\methods\resp\nodoChiediCopiaRT::class, $this->fault->getMethodInterface());
    }

    #[TestDox('workflowEvent()')]
    public function testWorkflowEvent()
    {
        $workflow = $this->nodoChiediCopiaRT->workflowEvent();
        $this->assertEquals(MapEvents::getMethodId('nodoChiediCopiaRT', 'RESP'), $workflow->getReadyColumnValue('fk_tipoevento'));
        $this->assertEquals('2023-09-01 07:37:50.000', $workflow->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('unique_id_activateIO_OK', $workflow->getReadyColumnValue('event_id'));
        $this->assertEquals('AGID_01', $workflow->getReadyColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $workflow->getReadyColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getReadyColumnValue('canale'));
        $this->assertEquals('OK', $workflow->getReadyColumnValue('outcome'));
        $this->assertNull($workflow->getReadyColumnValue('faultcode'));

        $workflow = $this->fault->workflowEvent();
        $this->assertEquals(MapEvents::getMethodId('nodoChiediCopiaRT', 'RESP'), $workflow->getReadyColumnValue('fk_tipoevento'));
        $this->assertEquals('2023-09-01 07:37:50.000', $workflow->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('unique_id_activateIO_OK', $workflow->getReadyColumnValue('event_id'));
        $this->assertEquals('AGID_01', $workflow->getReadyColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $workflow->getReadyColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getReadyColumnValue('canale'));
        $this->assertEquals('KO', $workflow->getReadyColumnValue('outcome'));
        $this->assertEquals('PPT_RT_NONDISPONIBILE', $workflow->getReadyColumnValue('faultcode'));
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->nodoChiediCopiaRT->getPaymentsCount());
        $this->assertEquals(1, $this->fault->getPaymentsCount());
    }
}

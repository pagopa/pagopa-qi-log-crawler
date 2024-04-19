<?php

namespace pagopa\events\req;

use pagopa\crawler\events\req\nodoInviaRT;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

#[TestDox('events\req\nodoInviaRT::class')]
class nodoInviaRTTest extends TestCase
{

    protected nodoInviaRT $session_instance;

    protected nodoInviaRT $iuv_instance;

    protected function setUp(): void
    {
        $this->session_instance = new nodoInviaRT(
            [
                'date_event' => '2023-09-01',
                'inserted_timestamp' => '2023-09-01 07:37:50',
                'tipoevento' => 'nodoInviaRT',
                'sottotipoevento' => 'REQ',
                'psp' => 'AGID_01',
                'stazione' => '77777777777_01',
                'canale' => '88888888888_01',
                'sessionid' => 'sessid_01',
                'sessionidoriginal' => 'sessoriginal_01',
                'uniqueid' => 'unique_id_nodoInviaRT_OK',
                'state' => 'TO_LOAD',
                'iddominio' => '77777777777',
                'iuv' => '01000000000000010',
                'ccp' => 'c00000000000000010',
                'noticeNumber' => '',
                'creditorreferenceid' => '01000000000000010',
                'paymenttoken' => 'c00000000000000010',
                'payload' => 'PHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPgoJPHNvYXBlbnY6Qm9keT4KCQk8bnMxOm5vZG9JbnZpYVJUIHhtbG5zOm5zMT0iaHR0cDovL3dzLnBhZ2FtZW50aS50ZWxlbWF0aWNpLmdvdi8iPgoJCQk8aWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUFNQPjg4ODg4ODg4ODg4PC9pZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QU1A+CgkJCTxpZGVudGlmaWNhdGl2b0NhbmFsZT44ODg4ODg4ODg4OF8wMTwvaWRlbnRpZmljYXRpdm9DYW5hbGU+CgkJCTxwYXNzd29yZD5QTEFDRUhPTERFUjwvcGFzc3dvcmQ+CgkJCTxpZGVudGlmaWNhdGl2b1BTUD5BR0lEXzAxPC9pZGVudGlmaWNhdGl2b1BTUD4KCQkJPGlkZW50aWZpY2F0aXZvRG9taW5pbz43Nzc3Nzc3Nzc3NzwvaWRlbnRpZmljYXRpdm9Eb21pbmlvPgoJCQk8aWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4wMTAwMDAwMDAwMDAwMDAxMDwvaWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4KCQkJPGNvZGljZUNvbnRlc3RvUGFnYW1lbnRvPmMwMDAwMDAwMDAwMDAwMDAxMDwvY29kaWNlQ29udGVzdG9QYWdhbWVudG8+CgkJCTx0aXBvRmlybWEvPgoJCQk8cnQ+UEQ5NGJXd2dkbVZ5YzJsdmJqMGlNUzR3SWlCbGJtTnZaR2x1WnowaVZWUkdMVGdpUHo0S1BIQmhlVjlwT2xKVUlIaHRiRzV6T25CaGVWOXBQU0pvZEhSd09pOHZkM2QzTG1ScFoybDBjR0V1WjI5MkxtbDBMM05qYUdWdFlYTXZNakF4TVM5UVlXZGhiV1Z1ZEdrdklpQjRiV3h1Y3pwNGMyazlJbWgwZEhBNkx5OTNkM2N1ZHpNdWIzSm5Mekl3TURFdldFMU1VMk5vWlcxaExXbHVjM1JoYm1ObElpQjRjMms2YzJOb1pXMWhURzlqWVhScGIyNDlJaTl2Y0hRdmNITndZWGhsY0hSaEwzSmxjMjkxY21ObGN5OVFZV2RKYm1aZlVsQlVYMUpVWHpaZk1sOHdMbmh6WkNJK0NnazhjR0Y1WDJrNmRtVnljMmx2Ym1WUFoyZGxkSFJ2UGpZdU1qd3ZjR0Y1WDJrNmRtVnljMmx2Ym1WUFoyZGxkSFJ2UGdvSlBIQmhlVjlwT21SdmJXbHVhVzgrQ2drSlBIQmhlVjlwT21sa1pXNTBhV1pwWTJGMGFYWnZSRzl0YVc1cGJ6NDNOemMzTnpjM056YzNOend2Y0dGNVgyazZhV1JsYm5ScFptbGpZWFJwZG05RWIyMXBibWx2UGdvSlBDOXdZWGxmYVRwa2IyMXBibWx2UGdvSlBIQmhlVjlwT21sa1pXNTBhV1pwWTJGMGFYWnZUV1Z6YzJGbloybHZVbWxqWlhaMWRHRStZV1J6WVhJek5HVmtaV1J6WkhOaFBDOXdZWGxmYVRwcFpHVnVkR2xtYVdOaGRHbDJiMDFsYzNOaFoyZHBiMUpwWTJWMmRYUmhQZ29KUEhCaGVWOXBPbVJoZEdGUGNtRk5aWE56WVdkbmFXOVNhV05sZG5WMFlUNHlNREkwTFRBMExURTJWREl6T2pRMU9qQTJQQzl3WVhsZmFUcGtZWFJoVDNKaFRXVnpjMkZuWjJsdlVtbGpaWFoxZEdFK0NnazhjR0Y1WDJrNmNtbG1aWEpwYldWdWRHOU5aWE56WVdkbmFXOVNhV05vYVdWemRHRStjMlJ6WkdFOEwzQmhlVjlwT25KcFptVnlhVzFsYm5SdlRXVnpjMkZuWjJsdlVtbGphR2xsYzNSaFBnb0pQSEJoZVY5cE9uSnBabVZ5YVcxbGJuUnZSR0YwWVZKcFkyaHBaWE4wWVQ0eU1ESTBMVEEwTFRFMlBDOXdZWGxmYVRweWFXWmxjbWx0Wlc1MGIwUmhkR0ZTYVdOb2FXVnpkR0UrQ2drOGNHRjVYMms2YVhOMGFYUjFkRzlCZEhSbGMzUmhiblJsUGdvSkNUeHdZWGxmYVRwcFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOUJkSFJsYzNSaGJuUmxQZ29KQ1FrOGNHRjVYMms2ZEdsd2IwbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejVDUEM5d1lYbGZhVHAwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1FrOGNHRjVYMms2WTI5a2FXTmxTV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52UGtGSFNVUmZNREU4TDNCaGVWOXBPbU52WkdsalpVbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejRLQ1FrOEwzQmhlVjlwT21sa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amIwRjBkR1Z6ZEdGdWRHVStDZ2tKUEhCaGVWOXBPbVJsYm05dGFXNWhlbWx2Ym1WQmRIUmxjM1JoYm5SbFBuaDRlSGg0ZUhoNFBDOXdZWGxmYVRwa1pXNXZiV2x1WVhwcGIyNWxRWFIwWlhOMFlXNTBaVDRLQ1R3dmNHRjVYMms2YVhOMGFYUjFkRzlCZEhSbGMzUmhiblJsUGdvSlBIQmhlVjlwT21WdWRHVkNaVzVsWm1samFXRnlhVzgrQ2drSlBIQmhlVjlwT21sa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amIwSmxibVZtYVdOcFlYSnBiejRLQ1FrSlBIQmhlVjlwT25ScGNHOUpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrUnp3dmNHRjVYMms2ZEdsd2IwbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejRLQ1FrSlBIQmhlVjlwT21OdlpHbGpaVWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno0M056YzNOemMzTnpjM056d3ZjR0Y1WDJrNlkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBnb0pDVHd2Y0dGNVgyazZhV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52UW1WdVpXWnBZMmxoY21sdlBnb0pDVHh3WVhsZmFUcGtaVzV2YldsdVlYcHBiMjVsUW1WdVpXWnBZMmxoY21sdlBuaDRlSGc4TDNCaGVWOXBPbVJsYm05dGFXNWhlbWx2Ym1WQ1pXNWxabWxqYVdGeWFXOCtDZ2s4TDNCaGVWOXBPbVZ1ZEdWQ1pXNWxabWxqYVdGeWFXOCtDZ2s4Y0dGNVgyazZjMjluWjJWMGRHOVdaWEp6WVc1MFpUNEtDUWs4Y0dGNVgyazZhV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52Vm1WeWMyRnVkR1UrQ2drSkNUeHdZWGxmYVRwMGFYQnZTV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52UGtZOEwzQmhlVjlwT25ScGNHOUpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSkNUeHdZWGxmYVRwamIyUnBZMlZKWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI4K2VIaDRlSGg0UEM5d1lYbGZhVHBqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSlBDOXdZWGxmYVRwcFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOVdaWEp6WVc1MFpUNEtDUWs4Y0dGNVgyazZZVzVoWjNKaFptbGpZVlpsY25OaGJuUmxQbmg0ZUhoNFBDOXdZWGxmYVRwaGJtRm5jbUZtYVdOaFZtVnljMkZ1ZEdVK0NnazhMM0JoZVY5cE9uTnZaMmRsZEhSdlZtVnljMkZ1ZEdVK0NnazhjR0Y1WDJrNmMyOW5aMlYwZEc5UVlXZGhkRzl5WlQ0S0NRazhjR0Y1WDJrNmFXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZVR0ZuWVhSdmNtVStDZ2tKQ1R4d1lYbGZhVHAwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQa1k4TDNCaGVWOXBPblJwY0c5SlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtDZ2tKQ1R4d1lYbGZhVHBqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrZUhoNGVIZzhMM0JoZVY5cE9tTnZaR2xqWlVsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NEtDUWs4TDNCaGVWOXBPbWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFCaFoyRjBiM0psUGdvSkNUeHdZWGxmYVRwaGJtRm5jbUZtYVdOaFVHRm5ZWFJ2Y21VK2VIaDRlSGg0UEM5d1lYbGZhVHBoYm1GbmNtRm1hV05oVUdGbllYUnZjbVUrQ2drOEwzQmhlVjlwT25OdloyZGxkSFJ2VUdGbllYUnZjbVUrQ2drOGNHRjVYMms2WkdGMGFWQmhaMkZ0Wlc1MGJ6NEtDUWs4Y0dGNVgyazZZMjlrYVdObFJYTnBkRzlRWVdkaGJXVnVkRzgrTUR3dmNHRjVYMms2WTI5a2FXTmxSWE5wZEc5UVlXZGhiV1Z1ZEc4K0Nna0pQSEJoZVY5cE9tbHRjRzl5ZEc5VWIzUmhiR1ZRWVdkaGRHOCtNamd1TURBOEwzQmhlVjlwT21sdGNHOXlkRzlVYjNSaGJHVlFZV2RoZEc4K0Nna0pQSEJoZVY5cE9tbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiMVpsY25OaGJXVnVkRzgrTURFd01EQXdNREF3TURBd01EQXdNVEE4TDNCaGVWOXBPbWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFabGNuTmhiV1Z1ZEc4K0Nna0pQSEJoZVY5cE9rTnZaR2xqWlVOdmJuUmxjM1J2VUdGbllXMWxiblJ2UG1Nd01EQXdNREF3TURBd01EQXdNREF4TUR3dmNHRjVYMms2UTI5a2FXTmxRMjl1ZEdWemRHOVFZV2RoYldWdWRHOCtDZ2tKUEhCaGVWOXBPbVJoZEdsVGFXNW5iMnh2VUdGbllXMWxiblJ2UGdvSkNRazhjR0Y1WDJrNmMybHVaMjlzYjBsdGNHOXlkRzlRWVdkaGRHOCtNamd1TURBOEwzQmhlVjlwT25OcGJtZHZiRzlKYlhCdmNuUnZVR0ZuWVhSdlBnb0pDUWs4Y0dGNVgyazZaWE5wZEc5VGFXNW5iMnh2VUdGbllXMWxiblJ2UGxCQlIwRlVRVHd2Y0dGNVgyazZaWE5wZEc5VGFXNW5iMnh2VUdGbllXMWxiblJ2UGdvSkNRazhjR0Y1WDJrNlpHRjBZVVZ6YVhSdlUybHVaMjlzYjFCaFoyRnRaVzUwYno0eU1ESTBMVEEwTFRFMlBDOXdZWGxmYVRwa1lYUmhSWE5wZEc5VGFXNW5iMnh2VUdGbllXMWxiblJ2UGdvSkNRazhjR0Y1WDJrNmFXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZVbWx6WTI5emMybHZibVUrTVRFeE1URXhNVEV4TVRFeFBDOXdZWGxmYVRwcFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOVNhWE5qYjNOemFXOXVaVDRLQ1FrSlBIQmhlVjlwT21OaGRYTmhiR1ZXWlhKellXMWxiblJ2UG5oNGVIaDRlSGc4TDNCaGVWOXBPbU5oZFhOaGJHVldaWEp6WVcxbGJuUnZQZ29KQ1FrOGNHRjVYMms2WkdGMGFWTndaV05wWm1samFWSnBjMk52YzNOcGIyNWxQbmg0ZUhoNGVEd3ZjR0Y1WDJrNlpHRjBhVk53WldOcFptbGphVkpwYzJOdmMzTnBiMjVsUGdvSkNUd3ZjR0Y1WDJrNlpHRjBhVk5wYm1kdmJHOVFZV2RoYldWdWRHOCtDZ2s4TDNCaGVWOXBPbVJoZEdsUVlXZGhiV1Z1ZEc4K0Nqd3ZjR0Y1WDJrNlVsUSs8L3J0PgoJCTwvbnMxOm5vZG9JbnZpYVJUPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4='
            ]
        );

        $this->iuv_instance = new nodoInviaRT(
            [
                'date_event' => '2023-09-01',
                'inserted_timestamp' => '2023-09-01 07:37:50',
                'tipoevento' => 'nodoInviaRT',
                'sottotipoevento' => 'REQ',
                'psp' => 'AGID_01',
                'stazione' => '77777777777_01',
                'canale' => '88888888888_01',
                'sessionid' => 'sessid_01',
                'sessionidoriginal' => '',
                'uniqueid' => 'unique_id_nodoInviaRT_OK',
                'state' => 'TO_LOAD',
                'iddominio' => '77777777777',
                'iuv' => '01000000000000010',
                'ccp' => 'c00000000000000010',
                'noticeNumber' => '',
                'creditorreferenceid' => '01000000000000010',
                'paymenttoken' => 'c00000000000000010',
                'payload' => 'PHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPgoJPHNvYXBlbnY6Qm9keT4KCQk8bnMxOm5vZG9JbnZpYVJUIHhtbG5zOm5zMT0iaHR0cDovL3dzLnBhZ2FtZW50aS50ZWxlbWF0aWNpLmdvdi8iPgoJCQk8aWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUFNQPjg4ODg4ODg4ODg4PC9pZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QU1A+CgkJCTxpZGVudGlmaWNhdGl2b0NhbmFsZT44ODg4ODg4ODg4OF8wMTwvaWRlbnRpZmljYXRpdm9DYW5hbGU+CgkJCTxwYXNzd29yZD5QTEFDRUhPTERFUjwvcGFzc3dvcmQ+CgkJCTxpZGVudGlmaWNhdGl2b1BTUD5BR0lEXzAxPC9pZGVudGlmaWNhdGl2b1BTUD4KCQkJPGlkZW50aWZpY2F0aXZvRG9taW5pbz43Nzc3Nzc3Nzc3NzwvaWRlbnRpZmljYXRpdm9Eb21pbmlvPgoJCQk8aWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4wMTAwMDAwMDAwMDAwMDAxMDwvaWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4KCQkJPGNvZGljZUNvbnRlc3RvUGFnYW1lbnRvPmMwMDAwMDAwMDAwMDAwMDAxMDwvY29kaWNlQ29udGVzdG9QYWdhbWVudG8+CgkJCTx0aXBvRmlybWEvPgoJCQk8cnQ+UEQ5NGJXd2dkbVZ5YzJsdmJqMGlNUzR3SWlCbGJtTnZaR2x1WnowaVZWUkdMVGdpUHo0S1BIQmhlVjlwT2xKVUlIaHRiRzV6T25CaGVWOXBQU0pvZEhSd09pOHZkM2QzTG1ScFoybDBjR0V1WjI5MkxtbDBMM05qYUdWdFlYTXZNakF4TVM5UVlXZGhiV1Z1ZEdrdklpQjRiV3h1Y3pwNGMyazlJbWgwZEhBNkx5OTNkM2N1ZHpNdWIzSm5Mekl3TURFdldFMU1VMk5vWlcxaExXbHVjM1JoYm1ObElpQjRjMms2YzJOb1pXMWhURzlqWVhScGIyNDlJaTl2Y0hRdmNITndZWGhsY0hSaEwzSmxjMjkxY21ObGN5OVFZV2RKYm1aZlVsQlVYMUpVWHpaZk1sOHdMbmh6WkNJK0NnazhjR0Y1WDJrNmRtVnljMmx2Ym1WUFoyZGxkSFJ2UGpZdU1qd3ZjR0Y1WDJrNmRtVnljMmx2Ym1WUFoyZGxkSFJ2UGdvSlBIQmhlVjlwT21SdmJXbHVhVzgrQ2drSlBIQmhlVjlwT21sa1pXNTBhV1pwWTJGMGFYWnZSRzl0YVc1cGJ6NDNOemMzTnpjM056YzNOend2Y0dGNVgyazZhV1JsYm5ScFptbGpZWFJwZG05RWIyMXBibWx2UGdvSlBDOXdZWGxmYVRwa2IyMXBibWx2UGdvSlBIQmhlVjlwT21sa1pXNTBhV1pwWTJGMGFYWnZUV1Z6YzJGbloybHZVbWxqWlhaMWRHRStZV1J6WVhJek5HVmtaV1J6WkhOaFBDOXdZWGxmYVRwcFpHVnVkR2xtYVdOaGRHbDJiMDFsYzNOaFoyZHBiMUpwWTJWMmRYUmhQZ29KUEhCaGVWOXBPbVJoZEdGUGNtRk5aWE56WVdkbmFXOVNhV05sZG5WMFlUNHlNREkwTFRBMExURTJWREl6T2pRMU9qQTJQQzl3WVhsZmFUcGtZWFJoVDNKaFRXVnpjMkZuWjJsdlVtbGpaWFoxZEdFK0NnazhjR0Y1WDJrNmNtbG1aWEpwYldWdWRHOU5aWE56WVdkbmFXOVNhV05vYVdWemRHRStjMlJ6WkdFOEwzQmhlVjlwT25KcFptVnlhVzFsYm5SdlRXVnpjMkZuWjJsdlVtbGphR2xsYzNSaFBnb0pQSEJoZVY5cE9uSnBabVZ5YVcxbGJuUnZSR0YwWVZKcFkyaHBaWE4wWVQ0eU1ESTBMVEEwTFRFMlBDOXdZWGxmYVRweWFXWmxjbWx0Wlc1MGIwUmhkR0ZTYVdOb2FXVnpkR0UrQ2drOGNHRjVYMms2YVhOMGFYUjFkRzlCZEhSbGMzUmhiblJsUGdvSkNUeHdZWGxmYVRwcFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOUJkSFJsYzNSaGJuUmxQZ29KQ1FrOGNHRjVYMms2ZEdsd2IwbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejVDUEM5d1lYbGZhVHAwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1FrOGNHRjVYMms2WTI5a2FXTmxTV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52UGtGSFNVUmZNREU4TDNCaGVWOXBPbU52WkdsalpVbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejRLQ1FrOEwzQmhlVjlwT21sa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amIwRjBkR1Z6ZEdGdWRHVStDZ2tKUEhCaGVWOXBPbVJsYm05dGFXNWhlbWx2Ym1WQmRIUmxjM1JoYm5SbFBuaDRlSGg0ZUhoNFBDOXdZWGxmYVRwa1pXNXZiV2x1WVhwcGIyNWxRWFIwWlhOMFlXNTBaVDRLQ1R3dmNHRjVYMms2YVhOMGFYUjFkRzlCZEhSbGMzUmhiblJsUGdvSlBIQmhlVjlwT21WdWRHVkNaVzVsWm1samFXRnlhVzgrQ2drSlBIQmhlVjlwT21sa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amIwSmxibVZtYVdOcFlYSnBiejRLQ1FrSlBIQmhlVjlwT25ScGNHOUpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrUnp3dmNHRjVYMms2ZEdsd2IwbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejRLQ1FrSlBIQmhlVjlwT21OdlpHbGpaVWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno0M056YzNOemMzTnpjM056d3ZjR0Y1WDJrNlkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBnb0pDVHd2Y0dGNVgyazZhV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52UW1WdVpXWnBZMmxoY21sdlBnb0pDVHh3WVhsZmFUcGtaVzV2YldsdVlYcHBiMjVsUW1WdVpXWnBZMmxoY21sdlBuaDRlSGc4TDNCaGVWOXBPbVJsYm05dGFXNWhlbWx2Ym1WQ1pXNWxabWxqYVdGeWFXOCtDZ2s4TDNCaGVWOXBPbVZ1ZEdWQ1pXNWxabWxqYVdGeWFXOCtDZ2s4Y0dGNVgyazZjMjluWjJWMGRHOVdaWEp6WVc1MFpUNEtDUWs4Y0dGNVgyazZhV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52Vm1WeWMyRnVkR1UrQ2drSkNUeHdZWGxmYVRwMGFYQnZTV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52UGtZOEwzQmhlVjlwT25ScGNHOUpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSkNUeHdZWGxmYVRwamIyUnBZMlZKWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI4K2VIaDRlSGg0UEM5d1lYbGZhVHBqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSlBDOXdZWGxmYVRwcFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOVdaWEp6WVc1MFpUNEtDUWs4Y0dGNVgyazZZVzVoWjNKaFptbGpZVlpsY25OaGJuUmxQbmg0ZUhoNFBDOXdZWGxmYVRwaGJtRm5jbUZtYVdOaFZtVnljMkZ1ZEdVK0NnazhMM0JoZVY5cE9uTnZaMmRsZEhSdlZtVnljMkZ1ZEdVK0NnazhjR0Y1WDJrNmMyOW5aMlYwZEc5UVlXZGhkRzl5WlQ0S0NRazhjR0Y1WDJrNmFXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZVR0ZuWVhSdmNtVStDZ2tKQ1R4d1lYbGZhVHAwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQa1k4TDNCaGVWOXBPblJwY0c5SlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtDZ2tKQ1R4d1lYbGZhVHBqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrZUhoNGVIZzhMM0JoZVY5cE9tTnZaR2xqWlVsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NEtDUWs4TDNCaGVWOXBPbWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFCaFoyRjBiM0psUGdvSkNUeHdZWGxmYVRwaGJtRm5jbUZtYVdOaFVHRm5ZWFJ2Y21VK2VIaDRlSGg0UEM5d1lYbGZhVHBoYm1GbmNtRm1hV05oVUdGbllYUnZjbVUrQ2drOEwzQmhlVjlwT25OdloyZGxkSFJ2VUdGbllYUnZjbVUrQ2drOGNHRjVYMms2WkdGMGFWQmhaMkZ0Wlc1MGJ6NEtDUWs4Y0dGNVgyazZZMjlrYVdObFJYTnBkRzlRWVdkaGJXVnVkRzgrTUR3dmNHRjVYMms2WTI5a2FXTmxSWE5wZEc5UVlXZGhiV1Z1ZEc4K0Nna0pQSEJoZVY5cE9tbHRjRzl5ZEc5VWIzUmhiR1ZRWVdkaGRHOCtNamd1TURBOEwzQmhlVjlwT21sdGNHOXlkRzlVYjNSaGJHVlFZV2RoZEc4K0Nna0pQSEJoZVY5cE9tbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiMVpsY25OaGJXVnVkRzgrTURFd01EQXdNREF3TURBd01EQXdNVEE4TDNCaGVWOXBPbWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFabGNuTmhiV1Z1ZEc4K0Nna0pQSEJoZVY5cE9rTnZaR2xqWlVOdmJuUmxjM1J2VUdGbllXMWxiblJ2UG1Nd01EQXdNREF3TURBd01EQXdNREF4TUR3dmNHRjVYMms2UTI5a2FXTmxRMjl1ZEdWemRHOVFZV2RoYldWdWRHOCtDZ2tKUEhCaGVWOXBPbVJoZEdsVGFXNW5iMnh2VUdGbllXMWxiblJ2UGdvSkNRazhjR0Y1WDJrNmMybHVaMjlzYjBsdGNHOXlkRzlRWVdkaGRHOCtNamd1TURBOEwzQmhlVjlwT25OcGJtZHZiRzlKYlhCdmNuUnZVR0ZuWVhSdlBnb0pDUWs4Y0dGNVgyazZaWE5wZEc5VGFXNW5iMnh2VUdGbllXMWxiblJ2UGxCQlIwRlVRVHd2Y0dGNVgyazZaWE5wZEc5VGFXNW5iMnh2VUdGbllXMWxiblJ2UGdvSkNRazhjR0Y1WDJrNlpHRjBZVVZ6YVhSdlUybHVaMjlzYjFCaFoyRnRaVzUwYno0eU1ESTBMVEEwTFRFMlBDOXdZWGxmYVRwa1lYUmhSWE5wZEc5VGFXNW5iMnh2VUdGbllXMWxiblJ2UGdvSkNRazhjR0Y1WDJrNmFXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZVbWx6WTI5emMybHZibVUrTVRFeE1URXhNVEV4TVRFeFBDOXdZWGxmYVRwcFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOVNhWE5qYjNOemFXOXVaVDRLQ1FrSlBIQmhlVjlwT21OaGRYTmhiR1ZXWlhKellXMWxiblJ2UG5oNGVIaDRlSGc4TDNCaGVWOXBPbU5oZFhOaGJHVldaWEp6WVcxbGJuUnZQZ29KQ1FrOGNHRjVYMms2WkdGMGFWTndaV05wWm1samFWSnBjMk52YzNOcGIyNWxQbmg0ZUhoNGVEd3ZjR0Y1WDJrNlpHRjBhVk53WldOcFptbGphVkpwYzJOdmMzTnBiMjVsUGdvSkNUd3ZjR0Y1WDJrNlpHRjBhVk5wYm1kdmJHOVFZV2RoYldWdWRHOCtDZ2s4TDNCaGVWOXBPbVJoZEdsUVlXZGhiV1Z1ZEc4K0Nqd3ZjR0Y1WDJrNlVsUSs8L3J0PgoJCTwvbnMxOm5vZG9JbnZpYVJUPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4='
            ]
        );
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $this->assertEquals(['c00000000000000010'], $this->session_instance->getCcps());
        $this->assertEquals(['c00000000000000010'], $this->iuv_instance->getCcps());

    }

    #[TestDox('getFaultCode()')]
    public function testGetFaultCode()
    {
        $this->assertNull($this->session_instance->getFaultCode());
        $this->assertNull($this->iuv_instance->getFaultCode());
    }

    #[TestDox('getFaultDescription()')]
    public function testGetFaultDescription()
    {
        $this->assertNull($this->session_instance->getFaultDescription());
        $this->assertNull($this->iuv_instance->getFaultDescription());
    }

    #[TestDox('getMethodInterface()')]
    public function testGetMethodInterface()
    {
        $this->assertInstanceOf(\pagopa\crawler\methods\req\nodoInviaRT::class, $this->session_instance->getMethodInterface());
        $this->assertInstanceOf(\pagopa\crawler\methods\req\nodoInviaRT::class, $this->iuv_instance->getMethodInterface());
    }

    #[TestDox('transactionDetails()')]
    public function testTransactionDetails()
    {
        $this->assertNull($this->session_instance->transactionDetails(0));
        $this->assertNull($this->iuv_instance->transactionDetails(0));
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->session_instance->getPaymentsCount());
        $this->assertEquals(1, $this->iuv_instance->getPaymentsCount());
    }

    #[TestDox('getCacheKeyAttempt()')]
    public function testGetCacheKeyAttempt()
    {
        $string_session = base64_encode(sprintf('sessionOriginal_%s', $this->session_instance->getSessionIdOriginal()));
        $this->assertEquals($string_session, $this->session_instance->getCacheKeyAttempt());

        $iuv            =   $this->iuv_instance->getIuv();
        $pa_emittente   =   $this->iuv_instance->getPaEmittente(0);
        $token          =   $this->iuv_instance->getCcp(0);
        $string_iuv     =   base64_encode(sprintf('attempt_%s_%s_%s', $iuv, $pa_emittente, $token));

        $this->assertEquals($string_iuv, $this->iuv_instance->getCacheKeyAttempt());

    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $this->assertEquals(['01000000000000010'], $this->session_instance->getIuvs());
        $this->assertEquals(['01000000000000010'], $this->iuv_instance->getIuvs());
    }

    #[TestDox('transaction()')]
    public function testTransaction()
    {
        $this->assertNull($this->session_instance->transaction());
        $this->assertNull($this->iuv_instance->transaction());
    }

    #[TestDox('workflowEvent()')]
    public function testWorkflowEvent()
    {
        $workflow = $this->session_instance->workflowEvent();
        $this->assertEquals('AGID_01', $workflow->getReadyColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $workflow->getReadyColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getReadyColumnValue('canale'));
        $this->assertEquals('OK', $workflow->getReadyColumnValue('outcome'));
        $this->assertEquals('2023-09-01 07:37:50.000', $workflow->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('unique_id_nodoInviaRT_OK', $workflow->getReadyColumnValue('event_id'));
        $this->assertNull($workflow->getReadyColumnValue('faultcode'));

        $workflow = $this->iuv_instance->workflowEvent();
        $this->assertEquals('AGID_01', $workflow->getReadyColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $workflow->getReadyColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getReadyColumnValue('canale'));
        $this->assertEquals('OK', $workflow->getReadyColumnValue('outcome'));
        $this->assertEquals('2023-09-01 07:37:50.000', $workflow->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('unique_id_nodoInviaRT_OK', $workflow->getReadyColumnValue('event_id'));
        $this->assertNull($workflow->getReadyColumnValue('faultcode'));

    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $this->assertEquals(['77777777777'], $this->session_instance->getPaEmittenti());
        $this->assertEquals(['77777777777'], $this->iuv_instance->getPaEmittenti());
    }

    #[TestDox('getFaultString()')]
    public function testGetFaultString()
    {
        $this->assertNull($this->session_instance->getFaultString());
        $this->assertNull($this->iuv_instance->getFaultString());
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertEquals(1, $this->session_instance->getTransferCount());
        $this->assertEquals(1, $this->iuv_instance->getTransferCount());
    }

    #[TestDox('isFaultEvent()')]
    public function testIsFaultEvent()
    {
        $this->assertFalse($this->session_instance->isFaultEvent());
        $this->assertFalse($this->iuv_instance->isFaultEvent());
    }

    #[TestDox('getCacheKeyPayment()')]
    public function testGetCacheKeyPayment()
    {
        $string_session = base64_encode(sprintf('sessionOriginal_%s', $this->session_instance->getSessionIdOriginal()));
        $this->assertEquals($string_session, $this->session_instance->getCacheKeyAttempt());

        $iuv            =   $this->iuv_instance->getIuv();
        $pa_emittente   =   $this->iuv_instance->getPaEmittente(0);
        $token          =   $this->iuv_instance->getCcp(0);
        $string_iuv     =   base64_encode(sprintf('attempt_%s_%s_%s', $iuv, $pa_emittente, $token));

        $this->assertEquals($string_iuv, $this->iuv_instance->getCacheKeyAttempt());
    }
}

<?php

namespace pagopa\methods\req;

use pagopa\crawler\methods\req\nodoInviaRT;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

class nodoInviaRTTest extends TestCase
{

    protected nodoInviaRT $instance_1_v;

    protected nodoInviaRT $instance_2_v;

    protected function setUp(): void
    {
        $this->instance_1_v = new nodoInviaRT(base64_decode('PHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPgoJPHNvYXBlbnY6Qm9keT4KCQk8bnMxOm5vZG9JbnZpYVJUIHhtbG5zOm5zMT0iaHR0cDovL3dzLnBhZ2FtZW50aS50ZWxlbWF0aWNpLmdvdi8iPgoJCQk8aWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUFNQPjg4ODg4ODg4ODg4PC9pZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QU1A+CgkJCTxpZGVudGlmaWNhdGl2b0NhbmFsZT44ODg4ODg4ODg4OF8wMTwvaWRlbnRpZmljYXRpdm9DYW5hbGU+CgkJCTxwYXNzd29yZD5QTEFDRUhPTERFUjwvcGFzc3dvcmQ+CgkJCTxpZGVudGlmaWNhdGl2b1BTUD5BR0lEXzAxPC9pZGVudGlmaWNhdGl2b1BTUD4KCQkJPGlkZW50aWZpY2F0aXZvRG9taW5pbz43Nzc3Nzc3Nzc3NzwvaWRlbnRpZmljYXRpdm9Eb21pbmlvPgoJCQk8aWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4wMTAwMDAwMDAwMDAwMDAxMDwvaWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4KCQkJPGNvZGljZUNvbnRlc3RvUGFnYW1lbnRvPmMwMDAwMDAwMDAwMDAwMDAxMDwvY29kaWNlQ29udGVzdG9QYWdhbWVudG8+CgkJCTx0aXBvRmlybWEvPgoJCQk8cnQ+UEQ5NGJXd2dkbVZ5YzJsdmJqMGlNUzR3SWlCbGJtTnZaR2x1WnowaVZWUkdMVGdpUHo0S1BIQmhlVjlwT2xKVUlIaHRiRzV6T25CaGVWOXBQU0pvZEhSd09pOHZkM2QzTG1ScFoybDBjR0V1WjI5MkxtbDBMM05qYUdWdFlYTXZNakF4TVM5UVlXZGhiV1Z1ZEdrdklpQjRiV3h1Y3pwNGMyazlJbWgwZEhBNkx5OTNkM2N1ZHpNdWIzSm5Mekl3TURFdldFMU1VMk5vWlcxaExXbHVjM1JoYm1ObElpQjRjMms2YzJOb1pXMWhURzlqWVhScGIyNDlJaTl2Y0hRdmNITndZWGhsY0hSaEwzSmxjMjkxY21ObGN5OVFZV2RKYm1aZlVsQlVYMUpVWHpaZk1sOHdMbmh6WkNJK0NnazhjR0Y1WDJrNmRtVnljMmx2Ym1WUFoyZGxkSFJ2UGpZdU1qd3ZjR0Y1WDJrNmRtVnljMmx2Ym1WUFoyZGxkSFJ2UGdvSlBIQmhlVjlwT21SdmJXbHVhVzgrQ2drSlBIQmhlVjlwT21sa1pXNTBhV1pwWTJGMGFYWnZSRzl0YVc1cGJ6NDNOemMzTnpjM056YzNOend2Y0dGNVgyazZhV1JsYm5ScFptbGpZWFJwZG05RWIyMXBibWx2UGdvSlBDOXdZWGxmYVRwa2IyMXBibWx2UGdvSlBIQmhlVjlwT21sa1pXNTBhV1pwWTJGMGFYWnZUV1Z6YzJGbloybHZVbWxqWlhaMWRHRStZV1J6WVhJek5HVmtaV1J6WkhOaFBDOXdZWGxmYVRwcFpHVnVkR2xtYVdOaGRHbDJiMDFsYzNOaFoyZHBiMUpwWTJWMmRYUmhQZ29KUEhCaGVWOXBPbVJoZEdGUGNtRk5aWE56WVdkbmFXOVNhV05sZG5WMFlUNHlNREkwTFRBMExURTJWREl6T2pRMU9qQTJQQzl3WVhsZmFUcGtZWFJoVDNKaFRXVnpjMkZuWjJsdlVtbGpaWFoxZEdFK0NnazhjR0Y1WDJrNmNtbG1aWEpwYldWdWRHOU5aWE56WVdkbmFXOVNhV05vYVdWemRHRStjMlJ6WkdFOEwzQmhlVjlwT25KcFptVnlhVzFsYm5SdlRXVnpjMkZuWjJsdlVtbGphR2xsYzNSaFBnb0pQSEJoZVY5cE9uSnBabVZ5YVcxbGJuUnZSR0YwWVZKcFkyaHBaWE4wWVQ0eU1ESTBMVEEwTFRFMlBDOXdZWGxmYVRweWFXWmxjbWx0Wlc1MGIwUmhkR0ZTYVdOb2FXVnpkR0UrQ2drOGNHRjVYMms2YVhOMGFYUjFkRzlCZEhSbGMzUmhiblJsUGdvSkNUeHdZWGxmYVRwcFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOUJkSFJsYzNSaGJuUmxQZ29KQ1FrOGNHRjVYMms2ZEdsd2IwbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejVDUEM5d1lYbGZhVHAwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1FrOGNHRjVYMms2WTI5a2FXTmxTV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52UGtGSFNVUmZNREU4TDNCaGVWOXBPbU52WkdsalpVbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejRLQ1FrOEwzQmhlVjlwT21sa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amIwRjBkR1Z6ZEdGdWRHVStDZ2tKUEhCaGVWOXBPbVJsYm05dGFXNWhlbWx2Ym1WQmRIUmxjM1JoYm5SbFBuaDRlSGg0ZUhoNFBDOXdZWGxmYVRwa1pXNXZiV2x1WVhwcGIyNWxRWFIwWlhOMFlXNTBaVDRLQ1R3dmNHRjVYMms2YVhOMGFYUjFkRzlCZEhSbGMzUmhiblJsUGdvSlBIQmhlVjlwT21WdWRHVkNaVzVsWm1samFXRnlhVzgrQ2drSlBIQmhlVjlwT21sa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amIwSmxibVZtYVdOcFlYSnBiejRLQ1FrSlBIQmhlVjlwT25ScGNHOUpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrUnp3dmNHRjVYMms2ZEdsd2IwbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejRLQ1FrSlBIQmhlVjlwT21OdlpHbGpaVWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno0M056YzNOemMzTnpjM056d3ZjR0Y1WDJrNlkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBnb0pDVHd2Y0dGNVgyazZhV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52UW1WdVpXWnBZMmxoY21sdlBnb0pDVHh3WVhsZmFUcGtaVzV2YldsdVlYcHBiMjVsUW1WdVpXWnBZMmxoY21sdlBuaDRlSGc4TDNCaGVWOXBPbVJsYm05dGFXNWhlbWx2Ym1WQ1pXNWxabWxqYVdGeWFXOCtDZ2s4TDNCaGVWOXBPbVZ1ZEdWQ1pXNWxabWxqYVdGeWFXOCtDZ2s4Y0dGNVgyazZjMjluWjJWMGRHOVdaWEp6WVc1MFpUNEtDUWs4Y0dGNVgyazZhV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52Vm1WeWMyRnVkR1UrQ2drSkNUeHdZWGxmYVRwMGFYQnZTV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52UGtZOEwzQmhlVjlwT25ScGNHOUpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSkNUeHdZWGxmYVRwamIyUnBZMlZKWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI4K2VIaDRlSGg0UEM5d1lYbGZhVHBqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSlBDOXdZWGxmYVRwcFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOVdaWEp6WVc1MFpUNEtDUWs4Y0dGNVgyazZZVzVoWjNKaFptbGpZVlpsY25OaGJuUmxQbmg0ZUhoNFBDOXdZWGxmYVRwaGJtRm5jbUZtYVdOaFZtVnljMkZ1ZEdVK0NnazhMM0JoZVY5cE9uTnZaMmRsZEhSdlZtVnljMkZ1ZEdVK0NnazhjR0Y1WDJrNmMyOW5aMlYwZEc5UVlXZGhkRzl5WlQ0S0NRazhjR0Y1WDJrNmFXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZVR0ZuWVhSdmNtVStDZ2tKQ1R4d1lYbGZhVHAwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQa1k4TDNCaGVWOXBPblJwY0c5SlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtDZ2tKQ1R4d1lYbGZhVHBqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrZUhoNGVIZzhMM0JoZVY5cE9tTnZaR2xqWlVsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NEtDUWs4TDNCaGVWOXBPbWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFCaFoyRjBiM0psUGdvSkNUeHdZWGxmYVRwaGJtRm5jbUZtYVdOaFVHRm5ZWFJ2Y21VK2VIaDRlSGg0UEM5d1lYbGZhVHBoYm1GbmNtRm1hV05oVUdGbllYUnZjbVUrQ2drOEwzQmhlVjlwT25OdloyZGxkSFJ2VUdGbllYUnZjbVUrQ2drOGNHRjVYMms2WkdGMGFWQmhaMkZ0Wlc1MGJ6NEtDUWs4Y0dGNVgyazZZMjlrYVdObFJYTnBkRzlRWVdkaGJXVnVkRzgrTUR3dmNHRjVYMms2WTI5a2FXTmxSWE5wZEc5UVlXZGhiV1Z1ZEc4K0Nna0pQSEJoZVY5cE9tbHRjRzl5ZEc5VWIzUmhiR1ZRWVdkaGRHOCtNamd1TURBOEwzQmhlVjlwT21sdGNHOXlkRzlVYjNSaGJHVlFZV2RoZEc4K0Nna0pQSEJoZVY5cE9tbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiMVpsY25OaGJXVnVkRzgrTURFd01EQXdNREF3TURBd01EQXdNVEE4TDNCaGVWOXBPbWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFabGNuTmhiV1Z1ZEc4K0Nna0pQSEJoZVY5cE9rTnZaR2xqWlVOdmJuUmxjM1J2VUdGbllXMWxiblJ2UG1Nd01EQXdNREF3TURBd01EQXdNREF4TUR3dmNHRjVYMms2UTI5a2FXTmxRMjl1ZEdWemRHOVFZV2RoYldWdWRHOCtDZ2tKUEhCaGVWOXBPbVJoZEdsVGFXNW5iMnh2VUdGbllXMWxiblJ2UGdvSkNRazhjR0Y1WDJrNmMybHVaMjlzYjBsdGNHOXlkRzlRWVdkaGRHOCtNamd1TURBOEwzQmhlVjlwT25OcGJtZHZiRzlKYlhCdmNuUnZVR0ZuWVhSdlBnb0pDUWs4Y0dGNVgyazZaWE5wZEc5VGFXNW5iMnh2VUdGbllXMWxiblJ2UGxCQlIwRlVRVHd2Y0dGNVgyazZaWE5wZEc5VGFXNW5iMnh2VUdGbllXMWxiblJ2UGdvSkNRazhjR0Y1WDJrNlpHRjBZVVZ6YVhSdlUybHVaMjlzYjFCaFoyRnRaVzUwYno0eU1ESTBMVEEwTFRFMlBDOXdZWGxmYVRwa1lYUmhSWE5wZEc5VGFXNW5iMnh2VUdGbllXMWxiblJ2UGdvSkNRazhjR0Y1WDJrNmFXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZVbWx6WTI5emMybHZibVUrTVRFeE1URXhNVEV4TVRFeFBDOXdZWGxmYVRwcFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOVNhWE5qYjNOemFXOXVaVDRLQ1FrSlBIQmhlVjlwT21OaGRYTmhiR1ZXWlhKellXMWxiblJ2UG5oNGVIaDRlSGc4TDNCaGVWOXBPbU5oZFhOaGJHVldaWEp6WVcxbGJuUnZQZ29KQ1FrOGNHRjVYMms2WkdGMGFWTndaV05wWm1samFWSnBjMk52YzNOcGIyNWxQbmg0ZUhoNGVEd3ZjR0Y1WDJrNlpHRjBhVk53WldOcFptbGphVkpwYzJOdmMzTnBiMjVsUGdvSkNUd3ZjR0Y1WDJrNlpHRjBhVk5wYm1kdmJHOVFZV2RoYldWdWRHOCtDZ2s4TDNCaGVWOXBPbVJoZEdsUVlXZGhiV1Z1ZEc4K0Nqd3ZjR0Y1WDJrNlVsUSs8L3J0PgoJCTwvbnMxOm5vZG9JbnZpYVJUPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4='));
        $this->instance_2_v = new nodoInviaRT(base64_decode('PHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPgoJPHNvYXBlbnY6Qm9keT4KCQk8bnMxOm5vZG9JbnZpYVJUIHhtbG5zOm5zMT0iaHR0cDovL3dzLnBhZ2FtZW50aS50ZWxlbWF0aWNpLmdvdi8iPgoJCQk8aWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUFNQPjg4ODg4ODg4ODg4PC9pZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QU1A+CgkJCTxpZGVudGlmaWNhdGl2b0NhbmFsZT44ODg4ODg4ODg4OF8wMTwvaWRlbnRpZmljYXRpdm9DYW5hbGU+CgkJCTxwYXNzd29yZD5QTEFDRUhPTERFUjwvcGFzc3dvcmQ+CgkJCTxpZGVudGlmaWNhdGl2b1BTUD5BR0lEXzAxPC9pZGVudGlmaWNhdGl2b1BTUD4KCQkJPGlkZW50aWZpY2F0aXZvRG9taW5pbz43Nzc3Nzc3Nzc3NzwvaWRlbnRpZmljYXRpdm9Eb21pbmlvPgoJCQk8aWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4wMTAwMDAwMDAwMDAwMDAxMTwvaWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4KCQkJPGNvZGljZUNvbnRlc3RvUGFnYW1lbnRvPmMwMDAwMDAwMDAwMDAwMDAxMTwvY29kaWNlQ29udGVzdG9QYWdhbWVudG8+CgkJCTx0aXBvRmlybWEvPgoJCQk8cnQ+UEQ5NGJXd2dkbVZ5YzJsdmJqMGlNUzR3SWlCbGJtTnZaR2x1WnowaVZWUkdMVGdpUHo0S1BIQmhlVjlwT2xKVUlIaHRiRzV6T25CaGVWOXBQU0pvZEhSd09pOHZkM2QzTG1ScFoybDBjR0V1WjI5MkxtbDBMM05qYUdWdFlYTXZNakF4TVM5UVlXZGhiV1Z1ZEdrdklpQjRiV3h1Y3pwNGMyazlJbWgwZEhBNkx5OTNkM2N1ZHpNdWIzSm5Mekl3TURFdldFMU1VMk5vWlcxaExXbHVjM1JoYm1ObElpQjRjMms2YzJOb1pXMWhURzlqWVhScGIyNDlJaTl2Y0hRdmNITndZWGhsY0hSaEwzSmxjMjkxY21ObGN5OVFZV2RKYm1aZlVsQlVYMUpVWHpaZk1sOHdMbmh6WkNJK0NnazhjR0Y1WDJrNmRtVnljMmx2Ym1WUFoyZGxkSFJ2UGpZdU1qd3ZjR0Y1WDJrNmRtVnljMmx2Ym1WUFoyZGxkSFJ2UGdvSlBIQmhlVjlwT21SdmJXbHVhVzgrQ2drSlBIQmhlVjlwT21sa1pXNTBhV1pwWTJGMGFYWnZSRzl0YVc1cGJ6NDNOemMzTnpjM056YzNOend2Y0dGNVgyazZhV1JsYm5ScFptbGpZWFJwZG05RWIyMXBibWx2UGdvSlBDOXdZWGxmYVRwa2IyMXBibWx2UGdvSlBIQmhlVjlwT21sa1pXNTBhV1pwWTJGMGFYWnZUV1Z6YzJGbloybHZVbWxqWlhaMWRHRStZV1J6WVhJek5HVmtaV1J6WkhOaFBDOXdZWGxmYVRwcFpHVnVkR2xtYVdOaGRHbDJiMDFsYzNOaFoyZHBiMUpwWTJWMmRYUmhQZ29KUEhCaGVWOXBPbVJoZEdGUGNtRk5aWE56WVdkbmFXOVNhV05sZG5WMFlUNHlNREkwTFRBMExURTJWREl6T2pRMU9qQTJQQzl3WVhsZmFUcGtZWFJoVDNKaFRXVnpjMkZuWjJsdlVtbGpaWFoxZEdFK0NnazhjR0Y1WDJrNmNtbG1aWEpwYldWdWRHOU5aWE56WVdkbmFXOVNhV05vYVdWemRHRStjMlJ6WkdFOEwzQmhlVjlwT25KcFptVnlhVzFsYm5SdlRXVnpjMkZuWjJsdlVtbGphR2xsYzNSaFBnb0pQSEJoZVY5cE9uSnBabVZ5YVcxbGJuUnZSR0YwWVZKcFkyaHBaWE4wWVQ0eU1ESTBMVEEwTFRFMlBDOXdZWGxmYVRweWFXWmxjbWx0Wlc1MGIwUmhkR0ZTYVdOb2FXVnpkR0UrQ2drOGNHRjVYMms2YVhOMGFYUjFkRzlCZEhSbGMzUmhiblJsUGdvSkNUeHdZWGxmYVRwcFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOUJkSFJsYzNSaGJuUmxQZ29KQ1FrOGNHRjVYMms2ZEdsd2IwbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejVDUEM5d1lYbGZhVHAwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1FrOGNHRjVYMms2WTI5a2FXTmxTV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52UGtGSFNVUmZNREU4TDNCaGVWOXBPbU52WkdsalpVbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejRLQ1FrOEwzQmhlVjlwT21sa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amIwRjBkR1Z6ZEdGdWRHVStDZ2tKUEhCaGVWOXBPbVJsYm05dGFXNWhlbWx2Ym1WQmRIUmxjM1JoYm5SbFBuaDRlSGg0ZUhoNFBDOXdZWGxmYVRwa1pXNXZiV2x1WVhwcGIyNWxRWFIwWlhOMFlXNTBaVDRLQ1R3dmNHRjVYMms2YVhOMGFYUjFkRzlCZEhSbGMzUmhiblJsUGdvSlBIQmhlVjlwT21WdWRHVkNaVzVsWm1samFXRnlhVzgrQ2drSlBIQmhlVjlwT21sa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amIwSmxibVZtYVdOcFlYSnBiejRLQ1FrSlBIQmhlVjlwT25ScGNHOUpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrUnp3dmNHRjVYMms2ZEdsd2IwbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejRLQ1FrSlBIQmhlVjlwT21OdlpHbGpaVWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno0M056YzNOemMzTnpjM056d3ZjR0Y1WDJrNlkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBnb0pDVHd2Y0dGNVgyazZhV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52UW1WdVpXWnBZMmxoY21sdlBnb0pDVHh3WVhsZmFUcGtaVzV2YldsdVlYcHBiMjVsUW1WdVpXWnBZMmxoY21sdlBuaDRlSGc4TDNCaGVWOXBPbVJsYm05dGFXNWhlbWx2Ym1WQ1pXNWxabWxqYVdGeWFXOCtDZ2s4TDNCaGVWOXBPbVZ1ZEdWQ1pXNWxabWxqYVdGeWFXOCtDZ2s4Y0dGNVgyazZjMjluWjJWMGRHOVdaWEp6WVc1MFpUNEtDUWs4Y0dGNVgyazZhV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52Vm1WeWMyRnVkR1UrQ2drSkNUeHdZWGxmYVRwMGFYQnZTV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52UGtZOEwzQmhlVjlwT25ScGNHOUpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSkNUeHdZWGxmYVRwamIyUnBZMlZKWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI4K2VIaDRlSGg0UEM5d1lYbGZhVHBqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSlBDOXdZWGxmYVRwcFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOVdaWEp6WVc1MFpUNEtDUWs4Y0dGNVgyazZZVzVoWjNKaFptbGpZVlpsY25OaGJuUmxQbmg0ZUhoNFBDOXdZWGxmYVRwaGJtRm5jbUZtYVdOaFZtVnljMkZ1ZEdVK0NnazhMM0JoZVY5cE9uTnZaMmRsZEhSdlZtVnljMkZ1ZEdVK0NnazhjR0Y1WDJrNmMyOW5aMlYwZEc5UVlXZGhkRzl5WlQ0S0NRazhjR0Y1WDJrNmFXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZVR0ZuWVhSdmNtVStDZ2tKQ1R4d1lYbGZhVHAwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQa1k4TDNCaGVWOXBPblJwY0c5SlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtDZ2tKQ1R4d1lYbGZhVHBqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrZUhoNGVIZzhMM0JoZVY5cE9tTnZaR2xqWlVsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NEtDUWs4TDNCaGVWOXBPbWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFCaFoyRjBiM0psUGdvSkNUeHdZWGxmYVRwaGJtRm5jbUZtYVdOaFVHRm5ZWFJ2Y21VK2VIaDRlSGg0UEM5d1lYbGZhVHBoYm1GbmNtRm1hV05oVUdGbllYUnZjbVUrQ2drOEwzQmhlVjlwT25OdloyZGxkSFJ2VUdGbllYUnZjbVUrQ2drOGNHRjVYMms2WkdGMGFWQmhaMkZ0Wlc1MGJ6NEtDUWs4Y0dGNVgyazZZMjlrYVdObFJYTnBkRzlRWVdkaGJXVnVkRzgrTUR3dmNHRjVYMms2WTI5a2FXTmxSWE5wZEc5UVlXZGhiV1Z1ZEc4K0Nna0pQSEJoZVY5cE9tbHRjRzl5ZEc5VWIzUmhiR1ZRWVdkaGRHOCtOVEF1TURBOEwzQmhlVjlwT21sdGNHOXlkRzlVYjNSaGJHVlFZV2RoZEc4K0Nna0pQSEJoZVY5cE9tbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiMVpsY25OaGJXVnVkRzgrTURFd01EQXdNREF3TURBd01EQXdNVEU4TDNCaGVWOXBPbWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFabGNuTmhiV1Z1ZEc4K0Nna0pQSEJoZVY5cE9rTnZaR2xqWlVOdmJuUmxjM1J2VUdGbllXMWxiblJ2UG1Nd01EQXdNREF3TURBd01EQXdNREF4TVR3dmNHRjVYMms2UTI5a2FXTmxRMjl1ZEdWemRHOVFZV2RoYldWdWRHOCtDZ2tKUEhCaGVWOXBPbVJoZEdsVGFXNW5iMnh2VUdGbllXMWxiblJ2UGdvSkNRazhjR0Y1WDJrNmMybHVaMjlzYjBsdGNHOXlkRzlRWVdkaGRHOCtNamd1TURBOEwzQmhlVjlwT25OcGJtZHZiRzlKYlhCdmNuUnZVR0ZuWVhSdlBnb0pDUWs4Y0dGNVgyazZaWE5wZEc5VGFXNW5iMnh2VUdGbllXMWxiblJ2UGxCQlIwRlVRVHd2Y0dGNVgyazZaWE5wZEc5VGFXNW5iMnh2VUdGbllXMWxiblJ2UGdvSkNRazhjR0Y1WDJrNlpHRjBZVVZ6YVhSdlUybHVaMjlzYjFCaFoyRnRaVzUwYno0eU1ESTBMVEEwTFRFMlBDOXdZWGxmYVRwa1lYUmhSWE5wZEc5VGFXNW5iMnh2VUdGbllXMWxiblJ2UGdvSkNRazhjR0Y1WDJrNmFXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZVbWx6WTI5emMybHZibVUrTVRFeE1URXhNVEV4TVRFeFBDOXdZWGxmYVRwcFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOVNhWE5qYjNOemFXOXVaVDRLQ1FrSlBIQmhlVjlwT21OaGRYTmhiR1ZXWlhKellXMWxiblJ2UG5oNGVIaDRlSGc4TDNCaGVWOXBPbU5oZFhOaGJHVldaWEp6WVcxbGJuUnZQZ29KQ1FrOGNHRjVYMms2WkdGMGFWTndaV05wWm1samFWSnBjMk52YzNOcGIyNWxQbmg0ZUhoNGVEd3ZjR0Y1WDJrNlpHRjBhVk53WldOcFptbGphVkpwYzJOdmMzTnBiMjVsUGdvSkNUd3ZjR0Y1WDJrNlpHRjBhVk5wYm1kdmJHOVFZV2RoYldWdWRHOCtDZ2tKUEhCaGVWOXBPbVJoZEdsVGFXNW5iMnh2VUdGbllXMWxiblJ2UGdvSkNRazhjR0Y1WDJrNmMybHVaMjlzYjBsdGNHOXlkRzlRWVdkaGRHOCtNakl1TURBOEwzQmhlVjlwT25OcGJtZHZiRzlKYlhCdmNuUnZVR0ZuWVhSdlBnb0pDUWs4Y0dGNVgyazZaWE5wZEc5VGFXNW5iMnh2VUdGbllXMWxiblJ2UGxCQlIwRlVRVHd2Y0dGNVgyazZaWE5wZEc5VGFXNW5iMnh2VUdGbllXMWxiblJ2UGdvSkNRazhjR0Y1WDJrNlpHRjBZVVZ6YVhSdlUybHVaMjlzYjFCaFoyRnRaVzUwYno0eU1ESTBMVEEwTFRFMlBDOXdZWGxmYVRwa1lYUmhSWE5wZEc5VGFXNW5iMnh2VUdGbllXMWxiblJ2UGdvSkNRazhjR0Y1WDJrNmFXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZVbWx6WTI5emMybHZibVUrTVRFeE1URXhNVEV4TVRFeVBDOXdZWGxmYVRwcFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOVNhWE5qYjNOemFXOXVaVDRLQ1FrSlBIQmhlVjlwT21OaGRYTmhiR1ZXWlhKellXMWxiblJ2UG5oNGVIaDRlSGc4TDNCaGVWOXBPbU5oZFhOaGJHVldaWEp6WVcxbGJuUnZQZ29KQ1FrOGNHRjVYMms2WkdGMGFWTndaV05wWm1samFWSnBjMk52YzNOcGIyNWxQbmg0ZUhoNGVEd3ZjR0Y1WDJrNlpHRjBhVk53WldOcFptbGphVkpwYzJOdmMzTnBiMjVsUGdvSkNUd3ZjR0Y1WDJrNlpHRjBhVk5wYm1kdmJHOVFZV2RoYldWdWRHOCtDZ2s4TDNCaGVWOXBPbVJoZEdsUVlXZGhiV1Z1ZEc4K0Nqd3ZjR0Y1WDJrNlVsUSs8L3J0PgoJCTwvbnMxOm5vZG9JbnZpYVJUPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4='));
    }

    #[TestDox('getNoticeNumber()')]
    public function testGetNoticeNumber()
    {
        $this->assertNull($this->instance_1_v->getNoticeNumber());
        $this->assertNull($this->instance_2_v->getNoticeNumber());
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $this->assertEquals(['01000000000000010'], $this->instance_1_v->getIuvs());
        $this->assertEquals(['01000000000000011'], $this->instance_2_v->getIuvs());
    }

    #[TestDox('getImportoTotale()')]
    public function testGetImportoTotale()
    {
        $this->assertEquals('28.00', $this->instance_1_v->getImportoTotale());
        $this->assertEquals('50.00', $this->instance_2_v->getImportoTotale());
    }

    #[TestDox('outcome()')]
    public function testOutcome()
    {
        $this->assertEquals('OK', $this->instance_1_v->outcome());
        $this->assertEquals('OK', $this->instance_2_v->outcome());
    }

    #[TestDox('getTransferId()')]
    public function testGetTransferId()
    {
        $this->assertNull($this->instance_1_v->getTransferId());
        $this->assertNull($this->instance_2_v->getTransferId());
    }

    #[TestDox('getPaymentMetaDataKey()')]
    public function testGetPaymentMetaDataKey()
    {
        $this->assertNull($this->instance_1_v->getPaymentMetaDataKey());
        $this->assertNull($this->instance_2_v->getPaymentMetaDataKey());
    }

    #[TestDox('getToken()')]
    public function testGetToken()
    {
        $this->assertEquals('c00000000000000010', $this->instance_1_v->getToken());
        $this->assertEquals('c00000000000000011', $this->instance_2_v->getToken());
    }

    #[TestDox('getTransferAmount()')]
    public function testGetTransferAmount()
    {
        $this->assertEquals('28.00', $this->instance_1_v->getTransferAmount(0));
        $this->assertNull($this->instance_1_v->getTransferAmount(1));

        $this->assertEquals('28.00', $this->instance_2_v->getTransferAmount(0));
        $this->assertEquals('22.00', $this->instance_2_v->getTransferAmount(1));
        $this->assertNull($this->instance_2_v->getTransferAmount(2));
    }

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $this->assertEquals('77777777777', $this->instance_1_v->getPaEmittente());
        $this->assertEquals('77777777777', $this->instance_2_v->getPaEmittente());
    }

    #[TestDox('getCcp()')]
    public function testGetCcp()
    {
        $this->assertEquals('c00000000000000010', $this->instance_1_v->getCcp());
        $this->assertEquals('c00000000000000011', $this->instance_2_v->getCcp());
    }

    #[TestDox('getTransferMetaDataCount()')]
    public function testGetTransferMetaDataCount()
    {
        $this->assertNull($this->instance_1_v->getTransferMetaDataCount());
        $this->assertNull($this->instance_2_v->getTransferMetaDataCount());
    }

    #[TestDox('getAllTokens()')]
    public function testGetAllTokens()
    {
        $this->assertEquals(['c00000000000000010'], $this->instance_1_v->getAllTokens());
        $this->assertEquals(['c00000000000000011'], $this->instance_2_v->getAllTokens());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->instance_1_v->getPaymentsCount());
        $this->assertEquals(1, $this->instance_2_v->getPaymentsCount());
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $this->assertEquals(['c00000000000000010'], $this->instance_1_v->getAllTokens());
        $this->assertEquals(['c00000000000000011'], $this->instance_2_v->getAllTokens());
    }

    #[TestDox('getStazione()')]
    public function testGetStazione()
    {
        $this->assertNull($this->instance_1_v->getStazione());
        $this->assertNull($this->instance_2_v->getStazione());
    }

    #[TestDox('getAllNoticesNumbers()')]
    public function testGetAllNoticesNumbers()
    {
        $this->assertNull($this->instance_1_v->getAllNoticesNumbers());
        $this->assertNull($this->instance_2_v->getAllNoticesNumbers());
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertEquals(1, $this->instance_1_v->getTransferCount());
        $this->assertEquals(2, $this->instance_2_v->getTransferCount());
    }

    #[TestDox('getBrokerPa()')]
    public function testGetBrokerPa()
    {
        $this->assertNull($this->instance_1_v->getBrokerPa());
        $this->assertNull($this->instance_2_v->getBrokerPa());
    }

    #[TestDox('getIuv()')]
    public function testGetIuv()
    {
        $this->assertEquals('01000000000000010', $this->instance_1_v->getIuv());
        $this->assertEquals('01000000000000011', $this->instance_2_v->getIuv());
    }

    #[TestDox('getTransferMetaDataKey()')]
    public function testGetTransferMetaDataKey()
    {
        $this->assertNull($this->instance_1_v->getTransferMetaDataKey());
        $this->assertNull($this->instance_2_v->getTransferMetaDataKey());
    }

    #[TestDox('getCanale()')]
    public function testGetCanale()
    {
        $this->assertEquals('88888888888_01', $this->instance_1_v->getCanale());
        $this->assertEquals('88888888888_01', $this->instance_2_v->getCanale());
    }

    #[TestDox('getTransferMetaDataValue()')]
    public function testGetTransferMetaDataValue()
    {
        $this->assertNull($this->instance_1_v->getTransferMetaDataValue());
        $this->assertNull($this->instance_2_v->getTransferMetaDataValue());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $this->assertEquals(['77777777777'], $this->instance_1_v->getPaEmittenti());
        $this->assertEquals(['77777777777'], $this->instance_2_v->getPaEmittenti());
    }

    #[TestDox('isBollo()')]
    public function testIsBollo()
    {
        $this->assertFalse($this->instance_1_v->isBollo());
        $this->assertFalse($this->instance_2_v->isBollo());
    }

    #[TestDox('getTransferPa()')]
    public function testGetTransferPa()
    {
        $this->assertEquals('77777777777', $this->instance_1_v->getTransferPa(0));
        $this->assertNull($this->instance_1_v->getTransferPa(1));

        $this->assertEquals('77777777777', $this->instance_2_v->getTransferPa(0));
        $this->assertEquals('77777777777', $this->instance_2_v->getTransferPa(1));
        $this->assertNull($this->instance_2_v->getTransferPa(2));
    }

    #[TestDox('getImporto()')]
    public function testGetImporto()
    {
        $this->assertEquals('28.00', $this->instance_1_v->getImporto());
        $this->assertEquals('50.00', $this->instance_2_v->getImporto());
    }

    #[TestDox('getPaymentMetaDataCount()')]
    public function testGetPaymentMetaDataCount()
    {
        $this->assertNull($this->instance_1_v->getPaymentMetaDataCount());
        $this->assertNull($this->instance_2_v->getPaymentMetaDataCount());
    }

    #[TestDox('getTransferIban()')]
    public function testGetTransferIban()
    {
        $this->assertNull($this->instance_1_v->getTransferIban());
        $this->assertNull($this->instance_2_v->getTransferIban());
    }

    #[TestDox('getPsp()')]
    public function testGetPsp()
    {
        $this->assertEquals('AGID_01', $this->instance_1_v->getPsp());
        $this->assertEquals('AGID_01', $this->instance_2_v->getPsp());
    }

    #[TestDox('getPaymentMetaDataValue()')]
    public function testGetPaymentMetaDataValue()
    {
        $this->assertNull($this->instance_1_v->getPaymentMetaDataValue());
        $this->assertNull($this->instance_2_v->getPaymentMetaDataValue());
    }

    #[TestDox('getBrokerPsp()')]
    public function testGetBrokerPsp()
    {
        $this->assertEquals('88888888888', $this->instance_1_v->getBrokerPsp());
        $this->assertEquals('88888888888', $this->instance_2_v->getBrokerPsp());
    }
}

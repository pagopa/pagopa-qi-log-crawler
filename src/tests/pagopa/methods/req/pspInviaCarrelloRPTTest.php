<?php

namespace pagopa\methods\req;

use pagopa\crawler\methods\req\pspInviaCarrelloRPT;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('methods\req\pspInviaCarrelloRPTTest::class')]
class pspInviaCarrelloRPTTest extends TestCase
{


    protected pspInviaCarrelloRPT $instance_1_RPT;

    protected pspInviaCarrelloRPT $instance_2_RPT;

    public function setUp(): void
    {
        $this->instance_1_RPT = new pspInviaCarrelloRPT(base64_decode('PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpwYXlfaj0iaHR0cDovL3d3dy5jbmlwYS5nb3YuaXQvc2NoZW1hcy8yMDEwL1BhZ2FtZW50aS9BY2tfMV8wLyIgeG1sbnM6cHB0PSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnRucz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0IiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBwdDpwc3BJbnZpYUNhcnJlbGxvUlBUPgoJCQk8aWRlbnRpZmljYXRpdm9QU1A+UFNQX0NVU1RPTTwvaWRlbnRpZmljYXRpdm9QU1A+CgkJCTxpZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QU1A+ODg4ODg4ODg4ODg8L2lkZW50aWZpY2F0aXZvSW50ZXJtZWRpYXJpb1BTUD4KCQkJPGlkZW50aWZpY2F0aXZvQ2FuYWxlPjg4ODg4ODg4ODg4XzAxPC9pZGVudGlmaWNhdGl2b0NhbmFsZT4KCQkJPG1vZGVsbG9QYWdhbWVudG8+MTwvbW9kZWxsb1BhZ2FtZW50bz4KCQkJPHBhcmFtZXRyaVByb2ZpbG9QYWdhbWVudG8+Tk9CT0RZPC9wYXJhbWV0cmlQcm9maWxvUGFnYW1lbnRvPgoJCQk8bGlzdGFSUFQ+CgkJCQk8ZWxlbWVudG9MaXN0YUNhcnJlbGxvUlBUPgoJCQkJCTxpZGVudGlmaWNhdGl2b0RvbWluaW8+Nzc3Nzc3Nzc3Nzc8L2lkZW50aWZpY2F0aXZvRG9taW5pbz4KCQkJCQk8aWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4wMDAwMDQwMDAyMDMwMzAzMDwvaWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4KCQkJCQk8Y29kaWNlQ29udGVzdG9QYWdhbWVudG8+NzExMDk0NzU0OTkyOTQ4MjwvY29kaWNlQ29udGVzdG9QYWdhbWVudG8+CgkJCQkJPHRpcG9GaXJtYS8+CgkJCQkJPHJwdD5QRkpRVkNCNGJXeHVjejBpYUhSMGNEb3ZMM2QzZHk1a2FXZHBkSEJoTG1kdmRpNXBkQzl6WTJobGJXRnpMekl3TVRFdlVHRm5ZVzFsYm5ScEx5SStDaUFnSUNBOGRtVnljMmx2Ym1WUFoyZGxkSFJ2UGpZdU1pNHdQQzkyWlhKemFXOXVaVTluWjJWMGRHOCtDaUFnSUNBOFpHOXRhVzVwYno0S0lDQWdJQ0FnSUNBOGFXUmxiblJwWm1sallYUnBkbTlFYjIxcGJtbHZQamMzTnpjM056YzNOemMzUEM5cFpHVnVkR2xtYVdOaGRHbDJiMFJ2YldsdWFXOCtDaUFnSUNBZ0lDQWdQR2xrWlc1MGFXWnBZMkYwYVhadlUzUmhlbWx2Ym1WU2FXTm9hV1ZrWlc1MFpUNDNOemMzTnpjM056YzNOMTh3TVR3dmFXUmxiblJwWm1sallYUnBkbTlUZEdGNmFXOXVaVkpwWTJocFpXUmxiblJsUGdvZ0lDQWdQQzlrYjIxcGJtbHZQZ29nSUNBZ1BHbGtaVzUwYVdacFkyRjBhWFp2VFdWemMyRm5aMmx2VW1samFHbGxjM1JoUG5oNGVIaDRlSGg0ZUR3dmFXUmxiblJwWm1sallYUnBkbTlOWlhOellXZG5hVzlTYVdOb2FXVnpkR0UrQ2lBZ0lDQThaR0YwWVU5eVlVMWxjM05oWjJkcGIxSnBZMmhwWlhOMFlUNHlNREkwTFRBMExUQTVWREl4T2pVeU9qTTFQQzlrWVhSaFQzSmhUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQZ29nSUNBZ1BHRjFkR1Z1ZEdsallYcHBiMjVsVTI5bloyVjBkRzgrVGk5QlBDOWhkWFJsYm5ScFkyRjZhVzl1WlZOdloyZGxkSFJ2UGdvZ0lDQWdQSE52WjJkbGRIUnZWbVZ5YzJGdWRHVStDaUFnSUNBZ0lDQWdQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFabGNuTmhiblJsUGdvZ0lDQWdJQ0FnSUNBZ0lDQThkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NUhQQzkwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29nSUNBZ0lDQWdJQ0FnSUNBOFkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBrRk9UMDVaVFU5VlV6d3ZZMjlrYVdObFNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29nSUNBZ0lDQWdJRHd2YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlZtVnljMkZ1ZEdVK0NpQWdJQ0FnSUNBZ1BHRnVZV2R5WVdacFkyRldaWEp6WVc1MFpUNTRlSGg0ZUhoNGVEd3ZZVzVoWjNKaFptbGpZVlpsY25OaGJuUmxQZ29nSUNBZ0lDQWdJRHhwYm1ScGNtbDZlbTlXWlhKellXNTBaVDU0ZUhoNFBDOXBibVJwY21sNmVtOVdaWEp6WVc1MFpUNEtJQ0FnSUNBZ0lDQThZMmwyYVdOdlZtVnljMkZ1ZEdVK2VEd3ZZMmwyYVdOdlZtVnljMkZ1ZEdVK0NpQWdJQ0FnSUNBZ1BHTmhjRlpsY25OaGJuUmxQbmg0ZUhoNFBDOWpZWEJXWlhKellXNTBaVDRLSUNBZ0lDQWdJQ0E4Ykc5allXeHBkR0ZXWlhKellXNTBaVDU0ZUhoNGVIZzhMMnh2WTJGc2FYUmhWbVZ5YzJGdWRHVStDaUFnSUNBZ0lDQWdQSEJ5YjNacGJtTnBZVlpsY25OaGJuUmxQbmg0ZUhoNGVEd3ZjSEp2ZG1sdVkybGhWbVZ5YzJGdWRHVStDaUFnSUNBZ0lDQWdQR1V0YldGcGJGWmxjbk5oYm5SbFBuaDRlSGhBZUhoNGVDNWpiMjA4TDJVdGJXRnBiRlpsY25OaGJuUmxQZ29nSUNBZ1BDOXpiMmRuWlhSMGIxWmxjbk5oYm5SbFBnb2dJQ0FnUEhOdloyZGxkSFJ2VUdGbllYUnZjbVUrQ2lBZ0lDQWdJQ0FnUEdsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amIxQmhaMkYwYjNKbFBnb2dJQ0FnSUNBZ0lDQWdJQ0E4ZEdsd2IwbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejU0UEM5MGFYQnZTV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52UGdvZ0lDQWdJQ0FnSUNBZ0lDQThZMjlrYVdObFNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQbmg0ZUhoNGVIaDRlSGc4TDJOdlpHbGpaVWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno0S0lDQWdJQ0FnSUNBOEwybGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiMUJoWjJGMGIzSmxQZ29nSUNBZ0lDQWdJRHhoYm1GbmNtRm1hV05oVUdGbllYUnZjbVUrZUhoNGVIZzhMMkZ1WVdkeVlXWnBZMkZRWVdkaGRHOXlaVDRLSUNBZ0lDQWdJQ0E4YVc1a2FYSnBlbnB2VUdGbllYUnZjbVUrZUhoNGVIZzhMMmx1WkdseWFYcDZiMUJoWjJGMGIzSmxQZ29nSUNBZ0lDQWdJRHhqYVhacFkyOVFZV2RoZEc5eVpUNTRQQzlqYVhacFkyOVFZV2RoZEc5eVpUNEtJQ0FnSUNBZ0lDQThZMkZ3VUdGbllYUnZjbVUrZUhoNGVIZzhMMk5oY0ZCaFoyRjBiM0psUGdvZ0lDQWdJQ0FnSUR4c2IyTmhiR2wwWVZCaFoyRjBiM0psUG5oNGVIZzhMMnh2WTJGc2FYUmhVR0ZuWVhSdmNtVStDaUFnSUNBZ0lDQWdQSEJ5YjNacGJtTnBZVkJoWjJGMGIzSmxQbmg0ZUhnOEwzQnliM1pwYm1OcFlWQmhaMkYwYjNKbFBnb2dJQ0FnSUNBZ0lEeGxMVzFoYVd4UVlXZGhkRzl5WlQ1NGVIaDRRSGg0ZUhndVkyOXRQQzlsTFcxaGFXeFFZV2RoZEc5eVpUNEtJQ0FnSUR3dmMyOW5aMlYwZEc5UVlXZGhkRzl5WlQ0S0lDQWdJRHhsYm5SbFFtVnVaV1pwWTJsaGNtbHZQZ29nSUNBZ0lDQWdJRHhwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5Q1pXNWxabWxqYVdGeWFXOCtDaUFnSUNBZ0lDQWdJQ0FnSUR4MGFYQnZTV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52UG5oNGVIZzhMM1JwY0c5SlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtDaUFnSUNBZ0lDQWdJQ0FnSUR4amIyUnBZMlZKWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI4K2VIaDRlRHd2WTI5a2FXTmxTV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52UGdvZ0lDQWdJQ0FnSUR3dmFXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZRbVZ1WldacFkybGhjbWx2UGdvZ0lDQWdJQ0FnSUR4a1pXNXZiV2x1WVhwcGIyNWxRbVZ1WldacFkybGhjbWx2UG5oNGVIaDRlRHd2WkdWdWIyMXBibUY2YVc5dVpVSmxibVZtYVdOcFlYSnBiejRLSUNBZ0lDQWdJQ0E4YVc1a2FYSnBlbnB2UW1WdVpXWnBZMmxoY21sdlBuaDRlSGg0ZUR3dmFXNWthWEpwZW5wdlFtVnVaV1pwWTJsaGNtbHZQZ29nSUNBZ0lDQWdJRHhqYVhacFkyOUNaVzVsWm1samFXRnlhVzgrZUhoNGVEd3ZZMmwyYVdOdlFtVnVaV1pwWTJsaGNtbHZQZ29nSUNBZ0lDQWdJRHhqWVhCQ1pXNWxabWxqYVdGeWFXOCtlSGg0ZUhnOEwyTmhjRUpsYm1WbWFXTnBZWEpwYno0S0lDQWdJQ0FnSUNBOGJtRjZhVzl1WlVKbGJtVm1hV05wWVhKcGJ6NTRlSGg0UEM5dVlYcHBiMjVsUW1WdVpXWnBZMmxoY21sdlBnb2dJQ0FnUEM5bGJuUmxRbVZ1WldacFkybGhjbWx2UGdvZ0lDQWdQR1JoZEdsV1pYSnpZVzFsYm5SdlBnb2dJQ0FnSUNBZ0lEeGtZWFJoUlhObFkzVjZhVzl1WlZCaFoyRnRaVzUwYno0eU1ESTBMVEF6TFRFd1BDOWtZWFJoUlhObFkzVjZhVzl1WlZCaFoyRnRaVzUwYno0S0lDQWdJQ0FnSUNBOGFXMXdiM0owYjFSdmRHRnNaVVJoVm1WeWMyRnlaVDR6TURBdU1EQThMMmx0Y0c5eWRHOVViM1JoYkdWRVlWWmxjbk5oY21VK0NpQWdJQ0FnSUNBZ1BIUnBjRzlXWlhKellXMWxiblJ2UGsxWlFrczhMM1JwY0c5V1pYSnpZVzFsYm5SdlBnb2dJQ0FnSUNBZ0lEeHBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlXWlhKellXMWxiblJ2UGpBd01EQXdOREF3TURJd016QXpNRE13UEM5cFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOVdaWEp6WVcxbGJuUnZQZ29nSUNBZ0lDQWdJRHhqYjJScFkyVkRiMjUwWlhOMGIxQmhaMkZ0Wlc1MGJ6NDNNVEV3T1RRM05UUTVPVEk1TkRneVBDOWpiMlJwWTJWRGIyNTBaWE4wYjFCaFoyRnRaVzUwYno0S0lDQWdJQ0FnSUNBOFptbHliV0ZTYVdObGRuVjBZVDR3UEM5bWFYSnRZVkpwWTJWMmRYUmhQZ29nSUNBZ0lDQWdJRHhrWVhScFUybHVaMjlzYjFabGNuTmhiV1Z1ZEc4K0NpQWdJQ0FnSUNBZ0lDQWdJRHhwYlhCdmNuUnZVMmx1WjI5c2IxWmxjbk5oYldWdWRHOCtNekF3TGpBd1BDOXBiWEJ2Y25SdlUybHVaMjlzYjFabGNuTmhiV1Z1ZEc4K0NpQWdJQ0FnSUNBZ0lDQWdJRHhwWW1GdVFXTmpjbVZrYVhSdlBrbFVNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01Ud3ZhV0poYmtGalkzSmxaR2wwYno0S0lDQWdJQ0FnSUNBZ0lDQWdQR05oZFhOaGJHVldaWEp6WVcxbGJuUnZQbmg0ZUhoNGVIaDRQQzlqWVhWellXeGxWbVZ5YzJGdFpXNTBiejRLSUNBZ0lDQWdJQ0FnSUNBZ1BHUmhkR2xUY0dWamFXWnBZMmxTYVhOamIzTnphVzl1WlQ1NGVIaDRlSGc4TDJSaGRHbFRjR1ZqYVdacFkybFNhWE5qYjNOemFXOXVaVDRLSUNBZ0lDQWdJQ0E4TDJSaGRHbFRhVzVuYjJ4dlZtVnljMkZ0Wlc1MGJ6NEtJQ0FnSUR3dlpHRjBhVlpsY25OaGJXVnVkRzgrQ2p3dlVsQlVQZz09PC9ycHQ+CgkJCQk8L2VsZW1lbnRvTGlzdGFDYXJyZWxsb1JQVD4KCQkJPC9saXN0YVJQVD4KCQk8L3BwdDpwc3BJbnZpYUNhcnJlbGxvUlBUPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4='));
        $this->instance_2_RPT = new pspInviaCarrelloRPT(base64_decode('PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpwYXlfaj0iaHR0cDovL3d3dy5jbmlwYS5nb3YuaXQvc2NoZW1hcy8yMDEwL1BhZ2FtZW50aS9BY2tfMV8wLyIgeG1sbnM6cHB0PSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnRucz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0IiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBwdDpwc3BJbnZpYUNhcnJlbGxvUlBUPgoJCQk8aWRlbnRpZmljYXRpdm9QU1A+UFNQX0NVU1RPTTwvaWRlbnRpZmljYXRpdm9QU1A+CgkJCTxpZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QU1A+ODg4ODg4ODg4ODg8L2lkZW50aWZpY2F0aXZvSW50ZXJtZWRpYXJpb1BTUD4KCQkJPGlkZW50aWZpY2F0aXZvQ2FuYWxlPjg4ODg4ODg4ODg4XzAxPC9pZGVudGlmaWNhdGl2b0NhbmFsZT4KCQkJPG1vZGVsbG9QYWdhbWVudG8+MTwvbW9kZWxsb1BhZ2FtZW50bz4KCQkJPHBhcmFtZXRyaVByb2ZpbG9QYWdhbWVudG8+Tk9CT0RZPC9wYXJhbWV0cmlQcm9maWxvUGFnYW1lbnRvPgoJCQk8bGlzdGFSUFQ+CgkJCQk8ZWxlbWVudG9MaXN0YUNhcnJlbGxvUlBUPgoJCQkJCTxpZGVudGlmaWNhdGl2b0RvbWluaW8+Nzc3Nzc3Nzc3Nzc8L2lkZW50aWZpY2F0aXZvRG9taW5pbz4KCQkJCQk8aWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4wMDAwMDQwMDAyMDMwMzAzMzwvaWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4KCQkJCQk8Y29kaWNlQ29udGVzdG9QYWdhbWVudG8+NzExMDk0NzU0OTkyOTQ4MzwvY29kaWNlQ29udGVzdG9QYWdhbWVudG8+CgkJCQkJPHRpcG9GaXJtYS8+CgkJCQkJPHJwdD5QRkpRVkNCNGJXeHVjejBpYUhSMGNEb3ZMM2QzZHk1a2FXZHBkSEJoTG1kdmRpNXBkQzl6WTJobGJXRnpMekl3TVRFdlVHRm5ZVzFsYm5ScEx5SStDZ2s4ZG1WeWMybHZibVZQWjJkbGRIUnZQall1TWk0d1BDOTJaWEp6YVc5dVpVOW5aMlYwZEc4K0NnazhaRzl0YVc1cGJ6NEtDUWs4YVdSbGJuUnBabWxqWVhScGRtOUViMjFwYm1sdlBqYzNOemMzTnpjM056YzNQQzlwWkdWdWRHbG1hV05oZEdsMmIwUnZiV2x1YVc4K0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlUzUmhlbWx2Ym1WU2FXTm9hV1ZrWlc1MFpUNDNOemMzTnpjM056YzNOMTh3TVR3dmFXUmxiblJwWm1sallYUnBkbTlUZEdGNmFXOXVaVkpwWTJocFpXUmxiblJsUGdvSlBDOWtiMjFwYm1sdlBnb0pQR2xrWlc1MGFXWnBZMkYwYVhadlRXVnpjMkZuWjJsdlVtbGphR2xsYzNSaFBuaDRlSGg0ZUhoNGVEd3ZhV1JsYm5ScFptbGpZWFJwZG05TlpYTnpZV2RuYVc5U2FXTm9hV1Z6ZEdFK0NnazhaR0YwWVU5eVlVMWxjM05oWjJkcGIxSnBZMmhwWlhOMFlUNHlNREkwTFRBMExUQTVWREl4T2pVeU9qTTFQQzlrWVhSaFQzSmhUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQZ29KUEdGMWRHVnVkR2xqWVhwcGIyNWxVMjluWjJWMGRHOCtUaTlCUEM5aGRYUmxiblJwWTJGNmFXOXVaVk52WjJkbGRIUnZQZ29KUEhOdloyZGxkSFJ2Vm1WeWMyRnVkR1UrQ2drSlBHbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiMVpsY25OaGJuUmxQZ29KQ1FrOGRHbHdiMGxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno1SFBDOTBhWEJ2U1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBnb0pDUWs4WTI5a2FXTmxTV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52UGtGT1QwNVpUVTlWVXp3dlkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBnb0pDVHd2YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlZtVnljMkZ1ZEdVK0Nna0pQR0Z1WVdkeVlXWnBZMkZXWlhKellXNTBaVDU0ZUhoNGVIaDRlRHd2WVc1aFozSmhabWxqWVZabGNuTmhiblJsUGdvSkNUeHBibVJwY21sNmVtOVdaWEp6WVc1MFpUNTRlSGg0UEM5cGJtUnBjbWw2ZW05V1pYSnpZVzUwWlQ0S0NRazhZMmwyYVdOdlZtVnljMkZ1ZEdVK2VEd3ZZMmwyYVdOdlZtVnljMkZ1ZEdVK0Nna0pQR05oY0ZabGNuTmhiblJsUG5oNGVIaDRQQzlqWVhCV1pYSnpZVzUwWlQ0S0NRazhiRzlqWVd4cGRHRldaWEp6WVc1MFpUNTRlSGg0ZUhnOEwyeHZZMkZzYVhSaFZtVnljMkZ1ZEdVK0Nna0pQSEJ5YjNacGJtTnBZVlpsY25OaGJuUmxQbmg0ZUhoNGVEd3ZjSEp2ZG1sdVkybGhWbVZ5YzJGdWRHVStDZ2tKUEdVdGJXRnBiRlpsY25OaGJuUmxQbmg0ZUhoQWVIaDRlQzVqYjIwOEwyVXRiV0ZwYkZabGNuTmhiblJsUGdvSlBDOXpiMmRuWlhSMGIxWmxjbk5oYm5SbFBnb0pQSE52WjJkbGRIUnZVR0ZuWVhSdmNtVStDZ2tKUEdsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amIxQmhaMkYwYjNKbFBnb0pDUWs4ZEdsd2IwbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejU0UEM5MGFYQnZTV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52UGdvSkNRazhZMjlrYVdObFNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQbmg0ZUhoNGVIaDRlSGc4TDJOdlpHbGpaVWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno0S0NRazhMMmxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFCaFoyRjBiM0psUGdvSkNUeGhibUZuY21GbWFXTmhVR0ZuWVhSdmNtVStlSGg0ZUhnOEwyRnVZV2R5WVdacFkyRlFZV2RoZEc5eVpUNEtDUWs4YVc1a2FYSnBlbnB2VUdGbllYUnZjbVUrZUhoNGVIZzhMMmx1WkdseWFYcDZiMUJoWjJGMGIzSmxQZ29KQ1R4amFYWnBZMjlRWVdkaGRHOXlaVDU0UEM5amFYWnBZMjlRWVdkaGRHOXlaVDRLQ1FrOFkyRndVR0ZuWVhSdmNtVStlSGg0ZUhnOEwyTmhjRkJoWjJGMGIzSmxQZ29KQ1R4c2IyTmhiR2wwWVZCaFoyRjBiM0psUG5oNGVIZzhMMnh2WTJGc2FYUmhVR0ZuWVhSdmNtVStDZ2tKUEhCeWIzWnBibU5wWVZCaFoyRjBiM0psUG5oNGVIZzhMM0J5YjNacGJtTnBZVkJoWjJGMGIzSmxQZ29KQ1R4bExXMWhhV3hRWVdkaGRHOXlaVDU0ZUhoNFFIaDRlSGd1WTI5dFBDOWxMVzFoYVd4UVlXZGhkRzl5WlQ0S0NUd3ZjMjluWjJWMGRHOVFZV2RoZEc5eVpUNEtDVHhsYm5SbFFtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4cFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOUNaVzVsWm1samFXRnlhVzgrQ2drSkNUeDBhWEJ2U1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBuaDRlSGc4TDNScGNHOUpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSkNUeGpiMlJwWTJWSlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtlSGg0ZUR3dlkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBnb0pDVHd2YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlFtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4a1pXNXZiV2x1WVhwcGIyNWxRbVZ1WldacFkybGhjbWx2UG5oNGVIaDRlRHd2WkdWdWIyMXBibUY2YVc5dVpVSmxibVZtYVdOcFlYSnBiejRLQ1FrOGFXNWthWEpwZW5wdlFtVnVaV1pwWTJsaGNtbHZQbmg0ZUhoNGVEd3ZhVzVrYVhKcGVucHZRbVZ1WldacFkybGhjbWx2UGdvSkNUeGphWFpwWTI5Q1pXNWxabWxqYVdGeWFXOCtlSGg0ZUR3dlkybDJhV052UW1WdVpXWnBZMmxoY21sdlBnb0pDVHhqWVhCQ1pXNWxabWxqYVdGeWFXOCtlSGg0ZUhnOEwyTmhjRUpsYm1WbWFXTnBZWEpwYno0S0NRazhibUY2YVc5dVpVSmxibVZtYVdOcFlYSnBiejU0ZUhoNFBDOXVZWHBwYjI1bFFtVnVaV1pwWTJsaGNtbHZQZ29KUEM5bGJuUmxRbVZ1WldacFkybGhjbWx2UGdvSlBHUmhkR2xXWlhKellXMWxiblJ2UGdvSkNUeGtZWFJoUlhObFkzVjZhVzl1WlZCaFoyRnRaVzUwYno0eU1ESTBMVEF6TFRFd1BDOWtZWFJoUlhObFkzVjZhVzl1WlZCaFoyRnRaVzUwYno0S0NRazhhVzF3YjNKMGIxUnZkR0ZzWlVSaFZtVnljMkZ5WlQ0ek1EQXVNREE4TDJsdGNHOXlkRzlVYjNSaGJHVkVZVlpsY25OaGNtVStDZ2tKUEhScGNHOVdaWEp6WVcxbGJuUnZQazFaUWtzOEwzUnBjRzlXWlhKellXMWxiblJ2UGdvSkNUeHBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlXWlhKellXMWxiblJ2UGpBd01EQXdOREF3TURJd016QXpNRE16UEM5cFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOVdaWEp6WVcxbGJuUnZQZ29KQ1R4amIyUnBZMlZEYjI1MFpYTjBiMUJoWjJGdFpXNTBiejQzTVRFd09UUTNOVFE1T1RJNU5EZ3pQQzlqYjJScFkyVkRiMjUwWlhOMGIxQmhaMkZ0Wlc1MGJ6NEtDUWs4Wm1seWJXRlNhV05sZG5WMFlUNHdQQzltYVhKdFlWSnBZMlYyZFhSaFBnb0pDVHhrWVhScFUybHVaMjlzYjFabGNuTmhiV1Z1ZEc4K0Nna0pDVHhwYlhCdmNuUnZVMmx1WjI5c2IxWmxjbk5oYldWdWRHOCtNekF3TGpBd1BDOXBiWEJ2Y25SdlUybHVaMjlzYjFabGNuTmhiV1Z1ZEc4K0Nna0pDVHhwWW1GdVFXTmpjbVZrYVhSdlBrbFVNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01Ud3ZhV0poYmtGalkzSmxaR2wwYno0S0NRa0pQR05oZFhOaGJHVldaWEp6WVcxbGJuUnZQbmg0ZUhoNGVIZzhMMk5oZFhOaGJHVldaWEp6WVcxbGJuUnZQZ29KQ1FrOFpHRjBhVk53WldOcFptbGphVkpwYzJOdmMzTnBiMjVsUG5oNGVIaDRQQzlrWVhScFUzQmxZMmxtYVdOcFVtbHpZMjl6YzJsdmJtVStDZ2tKUEM5a1lYUnBVMmx1WjI5c2IxWmxjbk5oYldWdWRHOCtDZ2s4TDJSaGRHbFdaWEp6WVcxbGJuUnZQZ284TDFKUVZEND08L3JwdD4KCQkJCTwvZWxlbWVudG9MaXN0YUNhcnJlbGxvUlBUPgoJCQkJPGVsZW1lbnRvTGlzdGFDYXJyZWxsb1JQVD4KCQkJCQk8aWRlbnRpZmljYXRpdm9Eb21pbmlvPjc3Nzc3Nzc3Nzc3PC9pZGVudGlmaWNhdGl2b0RvbWluaW8+CgkJCQkJPGlkZW50aWZpY2F0aXZvVW5pdm9jb1ZlcnNhbWVudG8+MDAwMDA0MDAwMjAzMDMwMzQ8L2lkZW50aWZpY2F0aXZvVW5pdm9jb1ZlcnNhbWVudG8+CgkJCQkJPGNvZGljZUNvbnRlc3RvUGFnYW1lbnRvPjcxMTA5NDc1NDk5Mjk0ODM8L2NvZGljZUNvbnRlc3RvUGFnYW1lbnRvPgoJCQkJCTx0aXBvRmlybWEvPgoJCQkJCTxycHQ+UEZKUVZDQjRiV3h1Y3owaWFIUjBjRG92TDNkM2R5NWthV2RwZEhCaExtZHZkaTVwZEM5elkyaGxiV0Z6THpJd01URXZVR0ZuWVcxbGJuUnBMeUkrQ2drOGRtVnljMmx2Ym1WUFoyZGxkSFJ2UGpZdU1pNHdQQzkyWlhKemFXOXVaVTluWjJWMGRHOCtDZ2s4Wkc5dGFXNXBiejRLQ1FrOGFXUmxiblJwWm1sallYUnBkbTlFYjIxcGJtbHZQamMzTnpjM056YzNOemMzUEM5cFpHVnVkR2xtYVdOaGRHbDJiMFJ2YldsdWFXOCtDZ2tKUEdsa1pXNTBhV1pwWTJGMGFYWnZVM1JoZW1sdmJtVlNhV05vYVdWa1pXNTBaVDQzTnpjM056YzNOemMzTjE4d01Ud3ZhV1JsYm5ScFptbGpZWFJwZG05VGRHRjZhVzl1WlZKcFkyaHBaV1JsYm5SbFBnb0pQQzlrYjIxcGJtbHZQZ29KUEdsa1pXNTBhV1pwWTJGMGFYWnZUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQbmg0ZUhoNGVIaDRlRHd2YVdSbGJuUnBabWxqWVhScGRtOU5aWE56WVdkbmFXOVNhV05vYVdWemRHRStDZ2s4WkdGMFlVOXlZVTFsYzNOaFoyZHBiMUpwWTJocFpYTjBZVDR5TURJMExUQTBMVEE1VkRJeE9qVXlPak0xUEM5a1lYUmhUM0poVFdWemMyRm5aMmx2VW1samFHbGxjM1JoUGdvSlBHRjFkR1Z1ZEdsallYcHBiMjVsVTI5bloyVjBkRzgrVGk5QlBDOWhkWFJsYm5ScFkyRjZhVzl1WlZOdloyZGxkSFJ2UGdvSlBITnZaMmRsZEhSdlZtVnljMkZ1ZEdVK0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFabGNuTmhiblJsUGdvSkNRazhkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NUhQQzkwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1FrOFkyOWthV05sU1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBrRk9UMDVaVFU5VlV6d3ZZMjlrYVdObFNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1R3dmFXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZWbVZ5YzJGdWRHVStDZ2tKUEdGdVlXZHlZV1pwWTJGV1pYSnpZVzUwWlQ1NGVIaDRlSGg0ZUR3dllXNWhaM0poWm1sallWWmxjbk5oYm5SbFBnb0pDVHhwYm1ScGNtbDZlbTlXWlhKellXNTBaVDU0ZUhoNFBDOXBibVJwY21sNmVtOVdaWEp6WVc1MFpUNEtDUWs4WTJsMmFXTnZWbVZ5YzJGdWRHVStlRHd2WTJsMmFXTnZWbVZ5YzJGdWRHVStDZ2tKUEdOaGNGWmxjbk5oYm5SbFBuaDRlSGg0UEM5allYQldaWEp6WVc1MFpUNEtDUWs4Ykc5allXeHBkR0ZXWlhKellXNTBaVDU0ZUhoNGVIZzhMMnh2WTJGc2FYUmhWbVZ5YzJGdWRHVStDZ2tKUEhCeWIzWnBibU5wWVZabGNuTmhiblJsUG5oNGVIaDRlRHd2Y0hKdmRtbHVZMmxoVm1WeWMyRnVkR1UrQ2drSlBHVXRiV0ZwYkZabGNuTmhiblJsUG5oNGVIaEFlSGg0ZUM1amIyMDhMMlV0YldGcGJGWmxjbk5oYm5SbFBnb0pQQzl6YjJkblpYUjBiMVpsY25OaGJuUmxQZ29KUEhOdloyZGxkSFJ2VUdGbllYUnZjbVUrQ2drSlBHbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiMUJoWjJGMGIzSmxQZ29KQ1FrOGRHbHdiMGxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno1NFBDOTBhWEJ2U1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBnb0pDUWs4WTI5a2FXTmxTV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52UG5oNGVIaDRlSGg0ZUhnOEwyTnZaR2xqWlVsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NEtDUWs4TDJsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amIxQmhaMkYwYjNKbFBnb0pDVHhoYm1GbmNtRm1hV05oVUdGbllYUnZjbVUrZUhoNGVIZzhMMkZ1WVdkeVlXWnBZMkZRWVdkaGRHOXlaVDRLQ1FrOGFXNWthWEpwZW5wdlVHRm5ZWFJ2Y21VK2VIaDRlSGc4TDJsdVpHbHlhWHA2YjFCaFoyRjBiM0psUGdvSkNUeGphWFpwWTI5UVlXZGhkRzl5WlQ1NFBDOWphWFpwWTI5UVlXZGhkRzl5WlQ0S0NRazhZMkZ3VUdGbllYUnZjbVUrZUhoNGVIZzhMMk5oY0ZCaFoyRjBiM0psUGdvSkNUeHNiMk5oYkdsMFlWQmhaMkYwYjNKbFBuaDRlSGc4TDJ4dlkyRnNhWFJoVUdGbllYUnZjbVUrQ2drSlBIQnliM1pwYm1OcFlWQmhaMkYwYjNKbFBuaDRlSGc4TDNCeWIzWnBibU5wWVZCaFoyRjBiM0psUGdvSkNUeGxMVzFoYVd4UVlXZGhkRzl5WlQ1NGVIaDRRSGg0ZUhndVkyOXRQQzlsTFcxaGFXeFFZV2RoZEc5eVpUNEtDVHd2YzI5bloyVjBkRzlRWVdkaGRHOXlaVDRLQ1R4bGJuUmxRbVZ1WldacFkybGhjbWx2UGdvSkNUeHBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlDWlc1bFptbGphV0Z5YVc4K0Nna0pDVHgwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQbmg0ZUhnOEwzUnBjRzlKWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI4K0Nna0pDVHhqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrZUhoNGVEd3ZZMjlrYVdObFNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1R3dmFXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZRbVZ1WldacFkybGhjbWx2UGdvSkNUeGtaVzV2YldsdVlYcHBiMjVsUW1WdVpXWnBZMmxoY21sdlBuaDRlSGg0ZUR3dlpHVnViMjFwYm1GNmFXOXVaVUpsYm1WbWFXTnBZWEpwYno0S0NRazhhVzVrYVhKcGVucHZRbVZ1WldacFkybGhjbWx2UG5oNGVIaDRlRHd2YVc1a2FYSnBlbnB2UW1WdVpXWnBZMmxoY21sdlBnb0pDVHhqYVhacFkyOUNaVzVsWm1samFXRnlhVzgrZUhoNGVEd3ZZMmwyYVdOdlFtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4allYQkNaVzVsWm1samFXRnlhVzgrZUhoNGVIZzhMMk5oY0VKbGJtVm1hV05wWVhKcGJ6NEtDUWs4Ym1GNmFXOXVaVUpsYm1WbWFXTnBZWEpwYno1NGVIaDRQQzl1WVhwcGIyNWxRbVZ1WldacFkybGhjbWx2UGdvSlBDOWxiblJsUW1WdVpXWnBZMmxoY21sdlBnb0pQR1JoZEdsV1pYSnpZVzFsYm5SdlBnb0pDVHhrWVhSaFJYTmxZM1Y2YVc5dVpWQmhaMkZ0Wlc1MGJ6NHlNREkwTFRBekxURXdQQzlrWVhSaFJYTmxZM1Y2YVc5dVpWQmhaMkZ0Wlc1MGJ6NEtDUWs4YVcxd2IzSjBiMVJ2ZEdGc1pVUmhWbVZ5YzJGeVpUNHlNREF1TURBOEwybHRjRzl5ZEc5VWIzUmhiR1ZFWVZabGNuTmhjbVUrQ2drSlBIUnBjRzlXWlhKellXMWxiblJ2UGsxWlFrczhMM1JwY0c5V1pYSnpZVzFsYm5SdlBnb0pDVHhwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5V1pYSnpZVzFsYm5SdlBqQXdNREF3TkRBd01ESXdNekF6TURNMFBDOXBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlXWlhKellXMWxiblJ2UGdvSkNUeGpiMlJwWTJWRGIyNTBaWE4wYjFCaFoyRnRaVzUwYno0M01URXdPVFEzTlRRNU9USTVORGd5UEM5amIyUnBZMlZEYjI1MFpYTjBiMUJoWjJGdFpXNTBiejRLQ1FrOFptbHliV0ZTYVdObGRuVjBZVDR3UEM5bWFYSnRZVkpwWTJWMmRYUmhQZ29KQ1R4a1lYUnBVMmx1WjI5c2IxWmxjbk5oYldWdWRHOCtDZ2tKQ1R4cGJYQnZjblJ2VTJsdVoyOXNiMVpsY25OaGJXVnVkRzgrTWpBd0xqQXdQQzlwYlhCdmNuUnZVMmx1WjI5c2IxWmxjbk5oYldWdWRHOCtDZ2tKQ1R4cFltRnVRV05qY21Wa2FYUnZQa2xVTURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNVHd2YVdKaGJrRmpZM0psWkdsMGJ6NEtDUWtKUEdOaGRYTmhiR1ZXWlhKellXMWxiblJ2UG5oNGVIaDRlSGc4TDJOaGRYTmhiR1ZXWlhKellXMWxiblJ2UGdvSkNRazhaR0YwYVZOd1pXTnBabWxqYVZKcGMyTnZjM05wYjI1bFBuaDRlSGg0UEM5a1lYUnBVM0JsWTJsbWFXTnBVbWx6WTI5emMybHZibVUrQ2drSlBDOWtZWFJwVTJsdVoyOXNiMVpsY25OaGJXVnVkRzgrQ2drOEwyUmhkR2xXWlhKellXMWxiblJ2UGdvOEwxSlFWRDQ9PC9ycHQ+CgkJCQk8L2VsZW1lbnRvTGlzdGFDYXJyZWxsb1JQVD4KCQkJPC9saXN0YVJQVD4KCQk8L3BwdDpwc3BJbnZpYUNhcnJlbGxvUlBUPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4='));
    }

    #[TestDox('getBrokerPsp()')]
    public function testGetBrokerPsp()
    {
        $this->assertEquals('88888888888', $this->instance_1_RPT->getBrokerPsp());
        $this->assertEquals('88888888888', $this->instance_2_RPT->getBrokerPsp());

    }
    #[TestDox('getPsp()')]
    public function testGetPsp()
    {
        $this->assertEquals('PSP_CUSTOM', $this->instance_1_RPT->getPsp());
        $this->assertEquals('PSP_CUSTOM', $this->instance_2_RPT->getPsp());
    }

    #[TestDox('getStazione()')]
    public function testGetStazione()
    {
        $this->assertNull($this->instance_1_RPT->getStazione());
        $this->assertNull($this->instance_2_RPT->getStazione());
    }

    #[TestDox('getTransferAmount()')]
    public function testGetTransferAmount()
    {
        $this->assertEquals('300.00', $this->instance_1_RPT->getTransferAmount(0, 0));
        $this->assertNull($this->instance_1_RPT->getTransferAmount(1, 0));
        $this->assertNull($this->instance_1_RPT->getTransferAmount(0, 1));

        $this->assertEquals('300.00', $this->instance_2_RPT->getTransferAmount(0, 0));
        $this->assertEquals('200.00', $this->instance_2_RPT->getTransferAmount(0, 1));

        $this->assertNull($this->instance_2_RPT->getTransferAmount(1,0));
        $this->assertNull($this->instance_2_RPT->getTransferAmount(1,1));

    }


    #[TestDox('getNoticeNumber()')]
    public function testGetNoticeNumber()
    {
        $this->assertNull($this->instance_1_RPT->getNoticeNumber());
        $this->assertNull($this->instance_2_RPT->getNoticeNumber());
    }

    #[TestDox('getCcp()')]
    public function testGetCcp()
    {
        $this->assertEquals('7110947549929482', $this->instance_1_RPT->getCcp(0));
        $this->assertEquals('7110947549929483', $this->instance_2_RPT->getCcp(0));
        $this->assertEquals('7110947549929483', $this->instance_2_RPT->getCcp(1));
        $this->assertNull($this->instance_1_RPT->getCcp(1));
        $this->assertNull($this->instance_2_RPT->getCcp(2));
    }

    #[TestDox('getImportoTotale()')]
    public function testGetImportoTotale()
    {
        $this->assertEquals('300', $this->instance_1_RPT->getImportoTotale());
        $this->assertEquals('500', $this->instance_2_RPT->getImportoTotale());
    }

    #[TestDox('getIuv()')]
    public function testGetIuv()
    {
        $this->assertEquals('00000400020303030', $this->instance_1_RPT->getIuv(0));
        $this->assertEquals('00000400020303033', $this->instance_2_RPT->getIuv(0));
        $this->assertEquals('00000400020303034', $this->instance_2_RPT->getIuv(1));

        $this->assertNull($this->instance_1_RPT->getIuv(1));
        $this->assertNull($this->instance_2_RPT->getIuv(2));
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $this->assertEquals(['7110947549929482'], $this->instance_1_RPT->getCcps());
        $this->assertEquals(['7110947549929483', '7110947549929483'], $this->instance_2_RPT->getCcps());
    }

    #[TestDox('getCanale()')]
    public function testGetCanale()
    {
        $this->assertEquals('88888888888_01', $this->instance_1_RPT->getCanale());
        $this->assertEquals('88888888888_01', $this->instance_2_RPT->getCanale());
    }

    #[TestDox('isBollo()')]
    public function testIsBollo()
    {
        $this->assertFalse($this->instance_1_RPT->isBollo(0, 0));
        $this->assertFalse($this->instance_1_RPT->isBollo(0, 1));
        $this->assertFalse($this->instance_1_RPT->isBollo(1, 0));
        $this->assertFalse($this->instance_1_RPT->isBollo(1, 1));

        $this->assertFalse($this->instance_2_RPT->isBollo(0, 0));
        $this->assertFalse($this->instance_2_RPT->isBollo(0, 1));
        $this->assertFalse($this->instance_2_RPT->isBollo(1, 0));
        $this->assertFalse($this->instance_2_RPT->isBollo(1, 1));

        $this->assertFalse($this->instance_2_RPT->isBollo(2, 0));
        $this->assertFalse($this->instance_2_RPT->isBollo(2, 1));
    }

    #[TestDox('isBollo()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->instance_1_RPT->getPaymentsCount());
        $this->assertEquals(2, $this->instance_2_RPT->getPaymentsCount());
    }

    #[TestDox('getAllNoticesNumbers()')]
    public function testGetAllNoticesNumbers()
    {
        $this->assertNull($this->instance_1_RPT->getAllNoticesNumbers());
        $this->assertNull($this->instance_2_RPT->getAllNoticesNumbers());
    }

    #[TestDox('outcome()')]
    public function testOutcome()
    {
        $this->assertNull($this->instance_1_RPT->outcome());
        $this->assertNull($this->instance_2_RPT->outcome());
    }

    #[TestDox('getBrokerPa()')]
    public function testGetBrokerPa()
    {
        $this->assertNull($this->instance_1_RPT->getBrokerPa());
        $this->assertNull($this->instance_2_RPT->getBrokerPa());
    }

    #[TestDox('getTransferId()')]
    public function testGetTransferId()
    {
        $this->assertNull($this->instance_1_RPT->getTransferId(0, 0));
        $this->assertNull($this->instance_1_RPT->getTransferId(0, 1));
        $this->assertNull($this->instance_1_RPT->getTransferId(1, 0));
        $this->assertNull($this->instance_1_RPT->getTransferId(1, 1));

        $this->assertNull($this->instance_2_RPT->getTransferId(0, 0));
        $this->assertNull($this->instance_2_RPT->getTransferId(0, 1));
        $this->assertNull($this->instance_2_RPT->getTransferId(1, 0));
        $this->assertNull($this->instance_2_RPT->getTransferId(1, 1));

        $this->assertNull($this->instance_2_RPT->getTransferId(2, 0));
        $this->assertNull($this->instance_2_RPT->getTransferId(2, 1));

    }

    #[TestDox('getTransferMetaDataKey()')]
    public function testGetTransferMetaDataKey()
    {
        $this->assertNull($this->instance_1_RPT->getTransferMetaDataKey(0, 0, 0));
        $this->assertNull($this->instance_1_RPT->getTransferMetaDataKey(0, 0, 1));
        $this->assertNull($this->instance_1_RPT->getTransferMetaDataKey(0, 0, 2));

        $this->assertNull($this->instance_1_RPT->getTransferMetaDataKey(1, 0, 0));
        $this->assertNull($this->instance_1_RPT->getTransferMetaDataKey(1, 0, 1));
        $this->assertNull($this->instance_1_RPT->getTransferMetaDataKey(1, 0, 2));

        $this->assertNull($this->instance_1_RPT->getTransferMetaDataKey(0, 1, 0));
        $this->assertNull($this->instance_1_RPT->getTransferMetaDataKey(0, 1, 1));
        $this->assertNull($this->instance_1_RPT->getTransferMetaDataKey(0, 1, 2));

        $this->assertNull($this->instance_2_RPT->getTransferMetaDataKey(0, 0, 0));
        $this->assertNull($this->instance_2_RPT->getTransferMetaDataKey(0, 0, 1));
        $this->assertNull($this->instance_2_RPT->getTransferMetaDataKey(0, 0, 2));

        $this->assertNull($this->instance_2_RPT->getTransferMetaDataKey(1, 0, 0));
        $this->assertNull($this->instance_2_RPT->getTransferMetaDataKey(1, 0, 1));
        $this->assertNull($this->instance_2_RPT->getTransferMetaDataKey(1, 0, 2));

        $this->assertNull($this->instance_2_RPT->getTransferMetaDataKey(0, 1, 0));
        $this->assertNull($this->instance_2_RPT->getTransferMetaDataKey(0, 1, 1));
        $this->assertNull($this->instance_2_RPT->getTransferMetaDataKey(0, 1, 2));
    }

    #[TestDox('getTransferPa()')]
    public function testGetTransferPa()
    {
        $this->assertEquals('77777777777', $this->instance_1_RPT->getTransferPa(0, 0));
        $this->assertEquals('77777777777', $this->instance_2_RPT->getTransferPa(0, 0));
        $this->assertEquals('77777777777', $this->instance_2_RPT->getTransferPa(0, 1));

        $this->assertNull($this->instance_2_RPT->getTransferPa(1, 1));
        $this->assertNull($this->instance_2_RPT->getTransferPa(1, 2));
    }

    #[TestDox('getPaymentMetaDataValue()')]
    public function testGetPaymentMetaDataValue()
    {
        $this->assertNull($this->instance_1_RPT->getPaymentMetaDataValue(0, 0));
        $this->assertNull($this->instance_1_RPT->getPaymentMetaDataValue(0, 1));
        $this->assertNull($this->instance_1_RPT->getPaymentMetaDataValue(1, 0));
        $this->assertNull($this->instance_1_RPT->getPaymentMetaDataValue(1, 1));

        $this->assertNull($this->instance_2_RPT->getPaymentMetaDataValue(0, 0));
        $this->assertNull($this->instance_2_RPT->getPaymentMetaDataValue(0, 1));
        $this->assertNull($this->instance_2_RPT->getPaymentMetaDataValue(1, 0));
        $this->assertNull($this->instance_2_RPT->getPaymentMetaDataValue(1, 1));

    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $this->assertEquals(['00000400020303030'], $this->instance_1_RPT->getIuvs());
        $this->assertEquals(['00000400020303033', '00000400020303034'], $this->instance_2_RPT->getIuvs());
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertEquals(1, $this->instance_1_RPT->getTransferCount(0));
        $this->assertNull($this->instance_1_RPT->getTransferCount(1));

        $this->assertEquals(1, $this->instance_2_RPT->getTransferCount(0));
        $this->assertEquals(1, $this->instance_2_RPT->getTransferCount(1));
        $this->assertNull($this->instance_2_RPT->getTransferCount(2));
    }
    #[TestDox('getTransferIban()')]
    public function testGetTransferIban()
    {
        $this->assertEquals('IT0000000000000000000000001', $this->instance_1_RPT->getTransferIban(0, 0));
        $this->assertEquals('IT0000000000000000000000001', $this->instance_2_RPT->getTransferIban(0, 0));
        $this->assertEquals('IT0000000000000000000000001', $this->instance_2_RPT->getTransferIban(0, 1));

        $this->assertNull($this->instance_1_RPT->getTransferIban(1, 0));
        $this->assertNull($this->instance_1_RPT->getTransferIban(0, 1));

        $this->assertNull($this->instance_2_RPT->getTransferIban(2, 0));
        $this->assertNull($this->instance_2_RPT->getTransferIban(2, 1));
    }

    #[TestDox('getTransferMetaDataValue()')]
    public function testGetTransferMetaDataValue()
    {
        $this->assertNull($this->instance_1_RPT->getTransferMetaDataValue(0, 0, 0));
        $this->assertNull($this->instance_1_RPT->getTransferMetaDataValue(0, 0, 1));
        $this->assertNull($this->instance_1_RPT->getTransferMetaDataValue(0, 0, 2));

        $this->assertNull($this->instance_1_RPT->getTransferMetaDataValue(1, 0, 0));
        $this->assertNull($this->instance_1_RPT->getTransferMetaDataValue(1, 0, 1));
        $this->assertNull($this->instance_1_RPT->getTransferMetaDataValue(1, 0, 2));

        $this->assertNull($this->instance_1_RPT->getTransferMetaDataValue(0, 1, 0));
        $this->assertNull($this->instance_1_RPT->getTransferMetaDataValue(0, 1, 1));
        $this->assertNull($this->instance_1_RPT->getTransferMetaDataValue(0, 1, 2));

        $this->assertNull($this->instance_2_RPT->getTransferMetaDataValue(0, 0, 0));
        $this->assertNull($this->instance_2_RPT->getTransferMetaDataValue(0, 0, 1));
        $this->assertNull($this->instance_2_RPT->getTransferMetaDataValue(0, 0, 2));

        $this->assertNull($this->instance_2_RPT->getTransferMetaDataValue(1, 0, 0));
        $this->assertNull($this->instance_2_RPT->getTransferMetaDataValue(1, 0, 1));
        $this->assertNull($this->instance_2_RPT->getTransferMetaDataValue(1, 0, 2));

        $this->assertNull($this->instance_2_RPT->getTransferMetaDataValue(0, 1, 0));
        $this->assertNull($this->instance_2_RPT->getTransferMetaDataValue(0, 1, 1));
        $this->assertNull($this->instance_2_RPT->getTransferMetaDataValue(0, 1, 2));
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $this->assertEquals(['77777777777'], $this->instance_1_RPT->getPaEmittenti());
        $this->assertEquals(['77777777777', '77777777777'], $this->instance_2_RPT->getPaEmittenti());
    }

    #[TestDox('getToken()')]
    public function testGetToken()
    {
        $this->assertEquals('7110947549929482', $this->instance_1_RPT->getToken(0));
        $this->assertEquals('7110947549929483', $this->instance_2_RPT->getToken(0));
        $this->assertEquals('7110947549929483', $this->instance_2_RPT->getToken(1));
        $this->assertNull($this->instance_1_RPT->getToken(1));
        $this->assertNull($this->instance_2_RPT->getToken(2));
    }

    #[TestDox('getImporto()')]
    public function testGetImporto()
    {
        $this->assertEquals('300.00', $this->instance_1_RPT->getImporto(0));
        $this->assertEquals('300.00', $this->instance_2_RPT->getImporto(0));
        $this->assertEquals('200.00', $this->instance_2_RPT->getImporto(1));
    }

    #[TestDox('getTransferMetaDataCount()')]
    public function testGetTransferMetaDataCount()
    {
        $this->assertNull($this->instance_1_RPT->getTransferMetaDataCount(0, 0));
        $this->assertNull($this->instance_1_RPT->getTransferMetaDataCount(1, 0));
        $this->assertNull($this->instance_1_RPT->getTransferMetaDataCount(1, 0));
        $this->assertNull($this->instance_1_RPT->getTransferMetaDataCount(1, 1));

        $this->assertNull($this->instance_2_RPT->getTransferMetaDataCount(0, 0));
        $this->assertNull($this->instance_2_RPT->getTransferMetaDataCount(1, 0));
        $this->assertNull($this->instance_2_RPT->getTransferMetaDataCount(1, 0));
        $this->assertNull($this->instance_2_RPT->getTransferMetaDataCount(1, 1));
        $this->assertNull($this->instance_2_RPT->getTransferMetaDataCount(0, 2));
        $this->assertNull($this->instance_2_RPT->getTransferMetaDataCount(1, 2));
    }

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $this->assertEquals('77777777777', $this->instance_1_RPT->getPaEmittente(0));
        $this->assertEquals('77777777777', $this->instance_2_RPT->getPaEmittente(0));
        $this->assertEquals('77777777777', $this->instance_2_RPT->getPaEmittente(1));
    }

    #[TestDox('getCcps()')]
    public function testGetAllTokens()
    {
        $this->assertEquals(['7110947549929482'], $this->instance_1_RPT->getCcps());
        $this->assertEquals(['7110947549929483', '7110947549929483'], $this->instance_2_RPT->getCcps());
    }
}

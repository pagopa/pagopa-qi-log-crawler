<?php

namespace pagopa\methods\req;

use pagopa\crawler\methods\req\paaInviaRT;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

#[TestDox('methods\req\paaInviaRT::class')]
class paaInviaRTTest extends TestCase
{

    protected paaInviaRT $ok_instance;

    protected paaInviaRT $ko_instance;

    protected function setUp(): void
    {
        $this->ok_instance = new paaInviaRT(base64_decode('PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpwcHQ9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIiB4bWxuczpwcHRoZWFkPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIiB4bWxuczp0bnM9Imh0dHA6Ly9Ob2RvUGFnYW1lbnRpU1BDLnNwY29vcC5nb3YuaXQvc2Vydml6aS9QYWdhbWVudGlUZWxlbWF0aWNpUlQiIHhtbG5zOnhzaT0iaHR0cDovL3d3dy53My5vcmcvMjAwMS9YTUxTY2hlbWEtaW5zdGFuY2UiPgoJPHNvYXBlbnY6SGVhZGVyPgoJCTxwcHRoZWFkOmludGVzdGF6aW9uZVBQVD4KCQkJPGlkZW50aWZpY2F0aXZvSW50ZXJtZWRpYXJpb1BBPjc3Nzc3Nzc3Nzc3PC9pZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QQT4KCQkJPGlkZW50aWZpY2F0aXZvU3RhemlvbmVJbnRlcm1lZGlhcmlvUEE+Nzc3Nzc3Nzc3NzdfMDE8L2lkZW50aWZpY2F0aXZvU3RhemlvbmVJbnRlcm1lZGlhcmlvUEE+CgkJCTxpZGVudGlmaWNhdGl2b0RvbWluaW8+Nzc3Nzc3Nzc3Nzc8L2lkZW50aWZpY2F0aXZvRG9taW5pbz4KCQkJPGlkZW50aWZpY2F0aXZvVW5pdm9jb1ZlcnNhbWVudG8+MDEwMDAwMDAwMDAwMDAwMTA8L2lkZW50aWZpY2F0aXZvVW5pdm9jb1ZlcnNhbWVudG8+CgkJCTxjb2RpY2VDb250ZXN0b1BhZ2FtZW50bz5jMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxMDwvY29kaWNlQ29udGVzdG9QYWdhbWVudG8+CgkJPC9wcHRoZWFkOmludGVzdGF6aW9uZVBQVD4KCTwvc29hcGVudjpIZWFkZXI+Cgk8c29hcGVudjpCb2R5PgoJCTxwcHQ6cGFhSW52aWFSVD4KCQkJPHRpcG9GaXJtYS8+CgkJCTxydD5QRDk0Yld3Z2RtVnljMmx2YmowaU1TNHdJaUJsYm1OdlpHbHVaejBpVlZSR0xUZ2lJSE4wWVc1a1lXeHZibVU5SW01dklpQS9QZ284VWxRZ2VHMXNibk05SW1oMGRIQTZMeTkzZDNjdVpHbG5hWFJ3WVM1bmIzWXVhWFF2YzJOb1pXMWhjeTh5TURFeEwxQmhaMkZ0Wlc1MGFTOGlJSGh0Ykc1ek9uQmhlVjlwUFNKb2RIUndPaTh2ZDNkM0xtUnBaMmwwY0dFdVoyOTJMbWwwTDNOamFHVnRZWE12TWpBeE1TOVFZV2RoYldWdWRHa3ZJaUI0Yld4dWN6cDRjejBpYUhSMGNEb3ZMM2QzZHk1M015NXZjbWN2TWpBd01TOVlUVXhUWTJobGJXRWlJSGh0Ykc1ek9uaHphVDBpYUhSMGNEb3ZMM2QzZHk1M015NXZjbWN2TWpBd01TOVlUVXhUWTJobGJXRXRhVzV6ZEdGdVkyVWlQZ29KUEhabGNuTnBiMjVsVDJkblpYUjBiejQyTGpJdU1Ed3ZkbVZ5YzJsdmJtVlBaMmRsZEhSdlBnb0pQR1J2YldsdWFXOCtDZ2tKUEdsa1pXNTBhV1pwWTJGMGFYWnZSRzl0YVc1cGJ6NDNOemMzTnpjM056YzNOend2YVdSbGJuUnBabWxqWVhScGRtOUViMjFwYm1sdlBnb0pQQzlrYjIxcGJtbHZQZ29KUEdsa1pXNTBhV1pwWTJGMGFYWnZUV1Z6YzJGbloybHZVbWxqWlhaMWRHRStaSE5oWkhOelpHRThMMmxrWlc1MGFXWnBZMkYwYVhadlRXVnpjMkZuWjJsdlVtbGpaWFoxZEdFK0NnazhaR0YwWVU5eVlVMWxjM05oWjJkcGIxSnBZMlYyZFhSaFBqSXdNalF0TURRdE1UWlVNRGM2TlRNNk16TThMMlJoZEdGUGNtRk5aWE56WVdkbmFXOVNhV05sZG5WMFlUNEtDVHh5YVdabGNtbHRaVzUwYjAxbGMzTmhaMmRwYjFKcFkyaHBaWE4wWVQ1a2MyRmtjMlJoWkhNOEwzSnBabVZ5YVcxbGJuUnZUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQZ29KUEhKcFptVnlhVzFsYm5SdlJHRjBZVkpwWTJocFpYTjBZVDR5TURJMExUQTBMVEUyUEM5eWFXWmxjbWx0Wlc1MGIwUmhkR0ZTYVdOb2FXVnpkR0UrQ2drOGFYTjBhWFIxZEc5QmRIUmxjM1JoYm5SbFBnb0pDVHhwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5QmRIUmxjM1JoYm5SbFBnb0pDUWs4ZEdsd2IwbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejVIUEM5MGFYQnZTV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52UGdvSkNRazhZMjlrYVdObFNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQakUxTXpjMk16Y3hNREE1UEM5amIyUnBZMlZKWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI4K0Nna0pQQzlwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5QmRIUmxjM1JoYm5SbFBnb0pDVHhrWlc1dmJXbHVZWHBwYjI1bFFYUjBaWE4wWVc1MFpUNVFZV2R2VUVFZ1V5NXdMa0V1UEM5a1pXNXZiV2x1WVhwcGIyNWxRWFIwWlhOMFlXNTBaVDRLQ1FrOGFXNWthWEpwZW5wdlFYUjBaWE4wWVc1MFpUNVFhV0Y2ZW1FZ1EyOXNiMjV1WVR3dmFXNWthWEpwZW5wdlFYUjBaWE4wWVc1MFpUNEtDUWs4WTJsMmFXTnZRWFIwWlhOMFlXNTBaVDR6TnpBOEwyTnBkbWxqYjBGMGRHVnpkR0Z1ZEdVK0Nna0pQR05oY0VGMGRHVnpkR0Z1ZEdVK01EQXhPRGM4TDJOaGNFRjBkR1Z6ZEdGdWRHVStDZ2tKUEd4dlkyRnNhWFJoUVhSMFpYTjBZVzUwWlQ1U2IyMWhQQzlzYjJOaGJHbDBZVUYwZEdWemRHRnVkR1UrQ2drSlBIQnliM1pwYm1OcFlVRjBkR1Z6ZEdGdWRHVStVazA4TDNCeWIzWnBibU5wWVVGMGRHVnpkR0Z1ZEdVK0Nna0pQRzVoZW1sdmJtVkJkSFJsYzNSaGJuUmxQa2xVUEM5dVlYcHBiMjVsUVhSMFpYTjBZVzUwWlQ0S0NUd3ZhWE4wYVhSMWRHOUJkSFJsYzNSaGJuUmxQZ29KUEdWdWRHVkNaVzVsWm1samFXRnlhVzgrQ2drSlBHbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiMEpsYm1WbWFXTnBZWEpwYno0S0NRa0pQSFJwY0c5SlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtSend2ZEdsd2IwbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejRLQ1FrSlBHTnZaR2xqWlVsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NDNOemMzTnpjM056YzNOend2WTI5a2FXTmxTV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52UGdvSkNUd3ZhV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52UW1WdVpXWnBZMmxoY21sdlBnb0pDVHhrWlc1dmJXbHVZWHBwYjI1bFFtVnVaV1pwWTJsaGNtbHZQbmg0ZUhnOEwyUmxibTl0YVc1aGVtbHZibVZDWlc1bFptbGphV0Z5YVc4K0Nna0pQR052WkdsalpWVnVhWFJQY0dWeVFtVnVaV1pwWTJsaGNtbHZQbmg0ZUR3dlkyOWthV05sVlc1cGRFOXdaWEpDWlc1bFptbGphV0Z5YVc4K0Nna0pQR1JsYm05dFZXNXBkRTl3WlhKQ1pXNWxabWxqYVdGeWFXOCtlSGg0ZUhnOEwyUmxibTl0Vlc1cGRFOXdaWEpDWlc1bFptbGphV0Z5YVc4K0Nna0pQR2x1WkdseWFYcDZiMEpsYm1WbWFXTnBZWEpwYno1NGVIaDRlRHd2YVc1a2FYSnBlbnB2UW1WdVpXWnBZMmxoY21sdlBnb0pDVHhqYVhacFkyOUNaVzVsWm1samFXRnlhVzgrZUhoNGVEd3ZZMmwyYVdOdlFtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4allYQkNaVzVsWm1samFXRnlhVzgrZUhoNGVEd3ZZMkZ3UW1WdVpXWnBZMmxoY21sdlBnb0pDVHhzYjJOaGJHbDBZVUpsYm1WbWFXTnBZWEpwYno1NGVIZzhMMnh2WTJGc2FYUmhRbVZ1WldacFkybGhjbWx2UGdvSkNUeHdjbTkyYVc1amFXRkNaVzVsWm1samFXRnlhVzgrZUhoNGVEd3ZjSEp2ZG1sdVkybGhRbVZ1WldacFkybGhjbWx2UGdvSkNUeHVZWHBwYjI1bFFtVnVaV1pwWTJsaGNtbHZQbmg0ZUhnOEwyNWhlbWx2Ym1WQ1pXNWxabWxqYVdGeWFXOCtDZ2s4TDJWdWRHVkNaVzVsWm1samFXRnlhVzgrQ2drOGMyOW5aMlYwZEc5UVlXZGhkRzl5WlQ0S0NRazhhV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52VUdGbllYUnZjbVUrQ2drSkNUeDBhWEJ2U1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBrWThMM1JwY0c5SlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtDZ2tKQ1R4amIyUnBZMlZKWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI4K2VIaDRlSGg0UEM5amIyUnBZMlZKWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI4K0Nna0pQQzlwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5UVlXZGhkRzl5WlQ0S0NRazhZVzVoWjNKaFptbGpZVkJoWjJGMGIzSmxQbmg0ZUhnOEwyRnVZV2R5WVdacFkyRlFZV2RoZEc5eVpUNEtDUWs4WlMxdFlXbHNVR0ZuWVhSdmNtVStlSGg0ZUhoNFBDOWxMVzFoYVd4UVlXZGhkRzl5WlQ0S0NUd3ZjMjluWjJWMGRHOVFZV2RoZEc5eVpUNEtDVHhrWVhScFVHRm5ZVzFsYm5SdlBnb0pDVHhqYjJScFkyVkZjMmwwYjFCaFoyRnRaVzUwYno0d1BDOWpiMlJwWTJWRmMybDBiMUJoWjJGdFpXNTBiejRLQ1FrOGFXMXdiM0owYjFSdmRHRnNaVkJoWjJGMGJ6NHhNQzR3TUR3dmFXMXdiM0owYjFSdmRHRnNaVkJoWjJGMGJ6NEtDUWs4YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlZtVnljMkZ0Wlc1MGJ6NHdNVEF3TURBd01EQXdNREF3TURBeE1Ed3ZhV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52Vm1WeWMyRnRaVzUwYno0S0NRazhRMjlrYVdObFEyOXVkR1Z6ZEc5UVlXZGhiV1Z1ZEc4K1l6QXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNVEE4TDBOdlpHbGpaVU52Ym5SbGMzUnZVR0ZuWVcxbGJuUnZQZ29KQ1R4a1lYUnBVMmx1WjI5c2IxQmhaMkZ0Wlc1MGJ6NEtDUWtKUEhOcGJtZHZiRzlKYlhCdmNuUnZVR0ZuWVhSdlBqRXdMakF3UEM5emFXNW5iMnh2U1cxd2IzSjBiMUJoWjJGMGJ6NEtDUWtKUEdWemFYUnZVMmx1WjI5c2IxQmhaMkZ0Wlc1MGJ6NUJibTUxYkd4aGRHOGdjR1Z5SUhObGMzTnBiMjVsSUhOallXUjFkR0U4TDJWemFYUnZVMmx1WjI5c2IxQmhaMkZ0Wlc1MGJ6NEtDUWtKUEdSaGRHRkZjMmwwYjFOcGJtZHZiRzlRWVdkaGJXVnVkRzgrTWpBeU5DMHdOQzB4Tmp3dlpHRjBZVVZ6YVhSdlUybHVaMjlzYjFCaFoyRnRaVzUwYno0S0NRa0pQR2xrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFKcGMyTnZjM05wYjI1bFBqRXhNVEV4TUR3dmFXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZVbWx6WTI5emMybHZibVUrQ2drSkNUeGpZWFZ6WVd4bFZtVnljMkZ0Wlc1MGJ6NTRlSGg0ZUhoNFBDOWpZWFZ6WVd4bFZtVnljMkZ0Wlc1MGJ6NEtDUWtKUEdSaGRHbFRjR1ZqYVdacFkybFNhWE5qYjNOemFXOXVaVDU0ZUhoNGVEd3ZaR0YwYVZOd1pXTnBabWxqYVZKcGMyTnZjM05wYjI1bFBnb0pDVHd2WkdGMGFWTnBibWR2Ykc5UVlXZGhiV1Z1ZEc4K0NnazhMMlJoZEdsUVlXZGhiV1Z1ZEc4K0Nqd3ZVbFErPC9ydD4KCQk8L3BwdDpwYWFJbnZpYVJUPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4='));
        $this->ko_instance = new paaInviaRT(base64_decode('PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpwcHQ9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIiB4bWxuczpwcHRoZWFkPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIiB4bWxuczp0bnM9Imh0dHA6Ly9Ob2RvUGFnYW1lbnRpU1BDLnNwY29vcC5nb3YuaXQvc2Vydml6aS9QYWdhbWVudGlUZWxlbWF0aWNpUlQiIHhtbG5zOnhzaT0iaHR0cDovL3d3dy53My5vcmcvMjAwMS9YTUxTY2hlbWEtaW5zdGFuY2UiPgoJPHNvYXBlbnY6SGVhZGVyPgoJCTxwcHRoZWFkOmludGVzdGF6aW9uZVBQVD4KCQkJPGlkZW50aWZpY2F0aXZvSW50ZXJtZWRpYXJpb1BBPjc3Nzc3Nzc3Nzc3PC9pZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QQT4KCQkJPGlkZW50aWZpY2F0aXZvU3RhemlvbmVJbnRlcm1lZGlhcmlvUEE+Nzc3Nzc3Nzc3NzdfMDE8L2lkZW50aWZpY2F0aXZvU3RhemlvbmVJbnRlcm1lZGlhcmlvUEE+CgkJCTxpZGVudGlmaWNhdGl2b0RvbWluaW8+Nzc3Nzc3Nzc3Nzc8L2lkZW50aWZpY2F0aXZvRG9taW5pbz4KCQkJPGlkZW50aWZpY2F0aXZvVW5pdm9jb1ZlcnNhbWVudG8+MDEwMDAwMDAwMDAwMDAwMTA8L2lkZW50aWZpY2F0aXZvVW5pdm9jb1ZlcnNhbWVudG8+CgkJCTxjb2RpY2VDb250ZXN0b1BhZ2FtZW50bz5jMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxMDwvY29kaWNlQ29udGVzdG9QYWdhbWVudG8+CgkJPC9wcHRoZWFkOmludGVzdGF6aW9uZVBQVD4KCTwvc29hcGVudjpIZWFkZXI+Cgk8c29hcGVudjpCb2R5PgoJCTxwcHQ6cGFhSW52aWFSVD4KCQkJPHRpcG9GaXJtYS8+CgkJCTxydD5QRDk0Yld3Z2RtVnljMmx2YmowaU1TNHdJaUJsYm1OdlpHbHVaejBpVlZSR0xUZ2lJSE4wWVc1a1lXeHZibVU5SW01dklpQS9QZ284VWxRZ2VHMXNibk05SW1oMGRIQTZMeTkzZDNjdVpHbG5hWFJ3WVM1bmIzWXVhWFF2YzJOb1pXMWhjeTh5TURFeEwxQmhaMkZ0Wlc1MGFTOGlJSGh0Ykc1ek9uQmhlVjlwUFNKb2RIUndPaTh2ZDNkM0xtUnBaMmwwY0dFdVoyOTJMbWwwTDNOamFHVnRZWE12TWpBeE1TOVFZV2RoYldWdWRHa3ZJaUI0Yld4dWN6cDRjejBpYUhSMGNEb3ZMM2QzZHk1M015NXZjbWN2TWpBd01TOVlUVXhUWTJobGJXRWlJSGh0Ykc1ek9uaHphVDBpYUhSMGNEb3ZMM2QzZHk1M015NXZjbWN2TWpBd01TOVlUVXhUWTJobGJXRXRhVzV6ZEdGdVkyVWlQZ29KUEhabGNuTnBiMjVsVDJkblpYUjBiejQyTGpJdU1Ed3ZkbVZ5YzJsdmJtVlBaMmRsZEhSdlBnb0pQR1J2YldsdWFXOCtDZ2tKUEdsa1pXNTBhV1pwWTJGMGFYWnZSRzl0YVc1cGJ6NDNOemMzTnpjM056YzNOend2YVdSbGJuUnBabWxqWVhScGRtOUViMjFwYm1sdlBnb0pQQzlrYjIxcGJtbHZQZ29KUEdsa1pXNTBhV1pwWTJGMGFYWnZUV1Z6YzJGbloybHZVbWxqWlhaMWRHRStaSE5oWkhOelpHRThMMmxrWlc1MGFXWnBZMkYwYVhadlRXVnpjMkZuWjJsdlVtbGpaWFoxZEdFK0NnazhaR0YwWVU5eVlVMWxjM05oWjJkcGIxSnBZMlYyZFhSaFBqSXdNalF0TURRdE1UWlVNRGM2TlRNNk16TThMMlJoZEdGUGNtRk5aWE56WVdkbmFXOVNhV05sZG5WMFlUNEtDVHh5YVdabGNtbHRaVzUwYjAxbGMzTmhaMmRwYjFKcFkyaHBaWE4wWVQ1a2MyRmtjMlJoWkhNOEwzSnBabVZ5YVcxbGJuUnZUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQZ29KUEhKcFptVnlhVzFsYm5SdlJHRjBZVkpwWTJocFpYTjBZVDR5TURJMExUQTBMVEUyUEM5eWFXWmxjbWx0Wlc1MGIwUmhkR0ZTYVdOb2FXVnpkR0UrQ2drOGFYTjBhWFIxZEc5QmRIUmxjM1JoYm5SbFBnb0pDVHhwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5QmRIUmxjM1JoYm5SbFBnb0pDUWs4ZEdsd2IwbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejVIUEM5MGFYQnZTV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52UGdvSkNRazhZMjlrYVdObFNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQakUxTXpjMk16Y3hNREE1UEM5amIyUnBZMlZKWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI4K0Nna0pQQzlwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5QmRIUmxjM1JoYm5SbFBnb0pDVHhrWlc1dmJXbHVZWHBwYjI1bFFYUjBaWE4wWVc1MFpUNVFZV2R2VUVFZ1V5NXdMa0V1UEM5a1pXNXZiV2x1WVhwcGIyNWxRWFIwWlhOMFlXNTBaVDRLQ1FrOGFXNWthWEpwZW5wdlFYUjBaWE4wWVc1MFpUNVFhV0Y2ZW1FZ1EyOXNiMjV1WVR3dmFXNWthWEpwZW5wdlFYUjBaWE4wWVc1MFpUNEtDUWs4WTJsMmFXTnZRWFIwWlhOMFlXNTBaVDR6TnpBOEwyTnBkbWxqYjBGMGRHVnpkR0Z1ZEdVK0Nna0pQR05oY0VGMGRHVnpkR0Z1ZEdVK01EQXhPRGM4TDJOaGNFRjBkR1Z6ZEdGdWRHVStDZ2tKUEd4dlkyRnNhWFJoUVhSMFpYTjBZVzUwWlQ1U2IyMWhQQzlzYjJOaGJHbDBZVUYwZEdWemRHRnVkR1UrQ2drSlBIQnliM1pwYm1OcFlVRjBkR1Z6ZEdGdWRHVStVazA4TDNCeWIzWnBibU5wWVVGMGRHVnpkR0Z1ZEdVK0Nna0pQRzVoZW1sdmJtVkJkSFJsYzNSaGJuUmxQa2xVUEM5dVlYcHBiMjVsUVhSMFpYTjBZVzUwWlQ0S0NUd3ZhWE4wYVhSMWRHOUJkSFJsYzNSaGJuUmxQZ29KUEdWdWRHVkNaVzVsWm1samFXRnlhVzgrQ2drSlBHbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiMEpsYm1WbWFXTnBZWEpwYno0S0NRa0pQSFJwY0c5SlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtSend2ZEdsd2IwbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejRLQ1FrSlBHTnZaR2xqWlVsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NDNOemMzTnpjM056YzNOend2WTI5a2FXTmxTV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52UGdvSkNUd3ZhV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52UW1WdVpXWnBZMmxoY21sdlBnb0pDVHhrWlc1dmJXbHVZWHBwYjI1bFFtVnVaV1pwWTJsaGNtbHZQbmg0ZUhnOEwyUmxibTl0YVc1aGVtbHZibVZDWlc1bFptbGphV0Z5YVc4K0Nna0pQR052WkdsalpWVnVhWFJQY0dWeVFtVnVaV1pwWTJsaGNtbHZQbmg0ZUR3dlkyOWthV05sVlc1cGRFOXdaWEpDWlc1bFptbGphV0Z5YVc4K0Nna0pQR1JsYm05dFZXNXBkRTl3WlhKQ1pXNWxabWxqYVdGeWFXOCtlSGg0ZUhnOEwyUmxibTl0Vlc1cGRFOXdaWEpDWlc1bFptbGphV0Z5YVc4K0Nna0pQR2x1WkdseWFYcDZiMEpsYm1WbWFXTnBZWEpwYno1NGVIaDRlRHd2YVc1a2FYSnBlbnB2UW1WdVpXWnBZMmxoY21sdlBnb0pDVHhqYVhacFkyOUNaVzVsWm1samFXRnlhVzgrZUhoNGVEd3ZZMmwyYVdOdlFtVnVaV1pwWTJsaGNtbHZQZ29KQ1R4allYQkNaVzVsWm1samFXRnlhVzgrZUhoNGVEd3ZZMkZ3UW1WdVpXWnBZMmxoY21sdlBnb0pDVHhzYjJOaGJHbDBZVUpsYm1WbWFXTnBZWEpwYno1NGVIZzhMMnh2WTJGc2FYUmhRbVZ1WldacFkybGhjbWx2UGdvSkNUeHdjbTkyYVc1amFXRkNaVzVsWm1samFXRnlhVzgrZUhoNGVEd3ZjSEp2ZG1sdVkybGhRbVZ1WldacFkybGhjbWx2UGdvSkNUeHVZWHBwYjI1bFFtVnVaV1pwWTJsaGNtbHZQbmg0ZUhnOEwyNWhlbWx2Ym1WQ1pXNWxabWxqYVdGeWFXOCtDZ2s4TDJWdWRHVkNaVzVsWm1samFXRnlhVzgrQ2drOGMyOW5aMlYwZEc5UVlXZGhkRzl5WlQ0S0NRazhhV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52VUdGbllYUnZjbVUrQ2drSkNUeDBhWEJ2U1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBrWThMM1JwY0c5SlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtDZ2tKQ1R4amIyUnBZMlZKWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI4K2VIaDRlSGg0UEM5amIyUnBZMlZKWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI4K0Nna0pQQzlwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5UVlXZGhkRzl5WlQ0S0NRazhZVzVoWjNKaFptbGpZVkJoWjJGMGIzSmxQbmg0ZUhnOEwyRnVZV2R5WVdacFkyRlFZV2RoZEc5eVpUNEtDUWs4WlMxdFlXbHNVR0ZuWVhSdmNtVStlSGg0ZUhoNFBDOWxMVzFoYVd4UVlXZGhkRzl5WlQ0S0NUd3ZjMjluWjJWMGRHOVFZV2RoZEc5eVpUNEtDVHhrWVhScFVHRm5ZVzFsYm5SdlBnb0pDVHhqYjJScFkyVkZjMmwwYjFCaFoyRnRaVzUwYno0eFBDOWpiMlJwWTJWRmMybDBiMUJoWjJGdFpXNTBiejRLQ1FrOGFXMXdiM0owYjFSdmRHRnNaVkJoWjJGMGJ6NHdMakF3UEM5cGJYQnZjblJ2Vkc5MFlXeGxVR0ZuWVhSdlBnb0pDVHhwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5V1pYSnpZVzFsYm5SdlBqQXhNREF3TURBd01EQXdNREF3TURFd1BDOXBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlXWlhKellXMWxiblJ2UGdvSkNUeERiMlJwWTJWRGIyNTBaWE4wYjFCaFoyRnRaVzUwYno1ak1EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01EQXhNRHd2UTI5a2FXTmxRMjl1ZEdWemRHOVFZV2RoYldWdWRHOCtDZ2tKUEdSaGRHbFRhVzVuYjJ4dlVHRm5ZVzFsYm5SdlBnb0pDUWs4YzJsdVoyOXNiMGx0Y0c5eWRHOVFZV2RoZEc4K01DNHdNRHd2YzJsdVoyOXNiMGx0Y0c5eWRHOVFZV2RoZEc4K0Nna0pDVHhsYzJsMGIxTnBibWR2Ykc5UVlXZGhiV1Z1ZEc4K1FXNXVkV3hzWVhSdklIQmxjaUJ6WlhOemFXOXVaU0J6WTJGa2RYUmhQQzlsYzJsMGIxTnBibWR2Ykc5UVlXZGhiV1Z1ZEc4K0Nna0pDVHhrWVhSaFJYTnBkRzlUYVc1bmIyeHZVR0ZuWVcxbGJuUnZQakl3TWpRdE1EUXRNVFk4TDJSaGRHRkZjMmwwYjFOcGJtZHZiRzlRWVdkaGJXVnVkRzgrQ2drSkNUeHBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlTYVhOamIzTnphVzl1WlQ0d1BDOXBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlTYVhOamIzTnphVzl1WlQ0S0NRa0pQR05oZFhOaGJHVldaWEp6WVcxbGJuUnZQbmg0ZUhoNGVIZzhMMk5oZFhOaGJHVldaWEp6WVcxbGJuUnZQZ29KQ1FrOFpHRjBhVk53WldOcFptbGphVkpwYzJOdmMzTnBiMjVsUG5oNGVIaDRQQzlrWVhScFUzQmxZMmxtYVdOcFVtbHpZMjl6YzJsdmJtVStDZ2tKUEM5a1lYUnBVMmx1WjI5c2IxQmhaMkZ0Wlc1MGJ6NEtDVHd2WkdGMGFWQmhaMkZ0Wlc1MGJ6NEtQQzlTVkQ0PTwvcnQ+CgkJPC9wcHQ6cGFhSW52aWFSVD4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+'));
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertEquals(1, $this->ok_instance->getTransferCount());
        $this->assertEquals(1, $this->ko_instance->getTransferCount());
    }

    #[TestDox('getCanale()')]
    public function testGetCanale()
    {
        $this->assertNull($this->ok_instance->getCanale());
        $this->assertNull($this->ko_instance->getCanale());
    }

    #[TestDox('getPaymentMetaDataCount()')]
    public function testGetPaymentMetaDataCount()
    {
        $this->assertNull($this->ok_instance->getPaymentMetaDataCount());
        $this->assertNull($this->ko_instance->getPaymentMetaDataCount());
    }

    #[TestDox('getTransferMetaDataCount()')]
    public function testGetTransferMetaDataCount()
    {
        $this->assertNull($this->ok_instance->getTransferMetaDataCount());
        $this->assertNull($this->ko_instance->getTransferMetaDataCount());
    }

    #[TestDox('getNoticeNumber()')]
    public function testGetNoticeNumber()
    {
        $this->assertNull($this->ok_instance->getNoticeNumber());
        $this->assertNull($this->ko_instance->getNoticeNumber());
    }

    #[TestDox('getTransferMetaDataKey()')]
    public function testGetTransferMetaDataKey()
    {
        $this->assertNull($this->ok_instance->getTransferMetaDataKey());
        $this->assertNull($this->ko_instance->getTransferMetaDataKey());
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $this->assertEquals(['c0000000000000000000000000000010'], $this->ok_instance->getCcps());
        $this->assertEquals(['c0000000000000000000000000000010'], $this->ko_instance->getCcps());
    }

    #[TestDox('getPaymentMetaDataValue()')]
    public function testGetPaymentMetaDataValue()
    {
        $this->assertNull($this->ok_instance->getPaymentMetaDataValue());
        $this->assertNull($this->ko_instance->getPaymentMetaDataValue());
    }

    #[TestDox('getCcp()')]
    public function testGetCcp()
    {
        $this->assertEquals('c0000000000000000000000000000010', $this->ok_instance->getCcp());
        $this->assertEquals('c0000000000000000000000000000010', $this->ko_instance->getCcp());
    }

    #[TestDox('getIuv()')]
    public function testGetIuv()
    {
        $this->assertEquals('01000000000000010', $this->ok_instance->getIuv());
        $this->assertEquals('01000000000000010', $this->ko_instance->getIuv());
    }

    #[TestDox('isBollo()')]
    public function testIsBollo()
    {
        $this->assertFalse($this->ok_instance->isBollo(0));
        $this->assertFalse($this->ko_instance->isBollo(0));
    }

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $this->assertEquals('77777777777', $this->ok_instance->getPaEmittente());
        $this->assertEquals('77777777777', $this->ko_instance->getPaEmittente());
    }

    #[TestDox('getTransferMetaDataValue()')]
    public function testGetTransferMetaDataValue()
    {
        $this->assertNull($this->ok_instance->getTransferMetaDataValue());
        $this->assertNull($this->ko_instance->getTransferMetaDataValue());
    }

    #[TestDox('getPsp()')]
    public function testGetPsp()
    {
        $this->assertNull($this->ok_instance->getPsp());
        $this->assertNull($this->ko_instance->getPsp());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $this->assertEquals(['77777777777'], $this->ok_instance->getPaEmittenti());
        $this->assertEquals(['77777777777'], $this->ko_instance->getPaEmittenti());
    }

    #[TestDox('getPaymentMetaDataKey()')]
    public function testGetPaymentMetaDataKey()
    {
        $this->assertNull($this->ok_instance->getPaymentMetaDataKey());
        $this->assertNull($this->ko_instance->getPaymentMetaDataKey());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->ok_instance->getPaymentsCount());
        $this->assertEquals(1, $this->ko_instance->getPaymentsCount());
    }

    #[TestDox('getImportoTotale()')]
    public function testGetImportoTotale()
    {
        $this->assertEquals('10.00', $this->ok_instance->getImportoTotale());
        $this->assertEquals('0.00', $this->ko_instance->getImportoTotale());
    }

    #[TestDox('getTransferId()')]
    public function testGetTransferId()
    {
        $this->assertNull($this->ok_instance->getTransferId(0));
        $this->assertNull($this->ko_instance->getTransferId(0));
    }

    #[TestDox('getTransferAmount()')]
    public function testGetTransferAmount()
    {
        $this->assertEquals('10.00', $this->ok_instance->getTransferAmount(0));
        $this->assertEquals('0.00', $this->ko_instance->getTransferAmount(0));
    }

    #[TestDox('getStazione()')]
    public function testGetStazione()
    {
        $this->assertEquals('77777777777_01', $this->ok_instance->getStazione());
        $this->assertEquals('77777777777_01', $this->ko_instance->getStazione());
    }

    #[TestDox('getToken()')]
    public function testGetToken()
    {
        $this->assertEquals('c0000000000000000000000000000010', $this->ok_instance->getToken());
        $this->assertEquals('c0000000000000000000000000000010', $this->ko_instance->getToken());
    }

    #[TestDox('getAllNoticesNumbers()')]
    public function testGetAllNoticesNumbers()
    {
        $this->assertNull($this->ok_instance->getAllNoticesNumbers());
        $this->assertNull($this->ko_instance->getAllNoticesNumbers());
    }

    #[TestDox('outcome()')]
    public function testOutcome()
    {
        $this->assertEquals('OK', $this->ok_instance->outcome());
        $this->assertEquals('KO', $this->ko_instance->outcome());
    }

    #[TestDox('getTransferPa()')]
    public function testGetTransferPa()
    {
        $this->assertEquals('77777777777', $this->ok_instance->getTransferPa(0));
        $this->assertEquals('77777777777', $this->ko_instance->getTransferPa(0));
    }

    #[TestDox('getBrokerPsp()')]
    public function testGetBrokerPsp()
    {
        $this->assertNull($this->ok_instance->getBrokerPsp());
        $this->assertNull($this->ko_instance->getBrokerPsp());
    }

    #[TestDox('getBrokerPa()')]
    public function testGetBrokerPa()
    {
        $this->assertEquals('77777777777', $this->ok_instance->getBrokerPa());
        $this->assertEquals('77777777777', $this->ko_instance->getBrokerPa());
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $this->assertEquals(['01000000000000010'], $this->ok_instance->getIuvs());
        $this->assertEquals(['01000000000000010'], $this->ko_instance->getIuvs());
    }

    #[TestDox('getAllTokens()')]
    public function testGetAllTokens()
    {
        $this->assertEquals(['c0000000000000000000000000000010'], $this->ok_instance->getAllTokens());
        $this->assertEquals(['c0000000000000000000000000000010'], $this->ko_instance->getAllTokens());
    }

    #[TestDox('getImporto()')]
    public function testGetImporto()
    {
        $this->assertEquals('10.00', $this->ok_instance->getImporto());
        $this->assertEquals('0.00', $this->ko_instance->getImporto());

    }

    #[TestDox('getTransferIban()')]
    public function testGetTransferIban()
    {
        $this->assertNull($this->ok_instance->getTransferIban(0));
        $this->assertNull($this->ko_instance->getTransferIban(0));
    }
}

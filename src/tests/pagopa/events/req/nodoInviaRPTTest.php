<?php

namespace pagopa\events\req;

use pagopa\crawler\events\req\nodoInviaRPT;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('events\req\nodoInviaRPT::class')]
class nodoInviaRPTTest extends TestCase
{

    protected nodoInviaRPT $one_instance;

    protected nodoInviaRPT $no_data_event;


    protected function setUp(): void
    {
        $this->one_instance = new nodoInviaRPT([
            "inserted_timestamp" =>  "2024-03-13 09:10:00.210",
            "tipoevento" =>  "nodoInviaRPT",
            "sottotipoevento" =>  "REQ",
            "idDominio" =>  "77777777777",
            "iuv" =>  "01000000000000001",
            "ccp" =>  "0d70d69d3275491b94fd3ab8fae67337",
            "noticeNumber" =>  "",
            "creditorReferenceId" =>  "01000000000000001",
            "paymentToken" =>  "0d70d69d3275491b94fd3ab8fae67337",
            "psp" =>  "AGID_01",
            "stazione" =>  "77777777777_01",
            "canale" =>  "88888888888_01",
            "sessionid" =>  "SESSID_01",
            "sessionidoriginal" =>  "SESSORIGIN_01",
            "uniqueid" =>  "UNIQUE_RPT_1",
            "payload" => "PHNvYXA6RW52ZWxvcGUgeG1sbnM6c29hcD0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPgoJPHNvYXA6SGVhZGVyPgoJCTxuczQ6aW50ZXN0YXppb25lUFBUIFNPQVAtRU5WOmFjdG9yPSJodHRwOi8vcGRkNGoub3JnL3BvcnRhZG9taW5pbyIgU09BUC1FTlY6bXVzdFVuZGVyc3RhbmQ9IjEiIHhtbG5zPSIiIHhtbG5zOlNPQVAtRU5WPSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyIgeG1sbnM6bnMzPSJodHRwOi8vd3d3LmRpZ2l0cGEuZ292Lml0L3NjaGVtYXMvMjAxMS9QYWdhbWVudGkvIiB4bWxuczpuczQ9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvcHB0aGVhZCIgeG1sbnM6bnM1PSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyI+CgkJCTxpZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QQT43Nzc3Nzc3Nzc3NzwvaWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUEE+CgkJCTxpZGVudGlmaWNhdGl2b1N0YXppb25lSW50ZXJtZWRpYXJpb1BBPjc3Nzc3Nzc3Nzc3XzAxPC9pZGVudGlmaWNhdGl2b1N0YXppb25lSW50ZXJtZWRpYXJpb1BBPgoJCQk8aWRlbnRpZmljYXRpdm9Eb21pbmlvPjc3Nzc3Nzc3Nzc3PC9pZGVudGlmaWNhdGl2b0RvbWluaW8+CgkJCTxpZGVudGlmaWNhdGl2b1VuaXZvY29WZXJzYW1lbnRvPjAxMDAwMDAwMDAwMDAwMDAxPC9pZGVudGlmaWNhdGl2b1VuaXZvY29WZXJzYW1lbnRvPgoJCQk8Y29kaWNlQ29udGVzdG9QYWdhbWVudG8+MGQ3MGQ2OWQzMjc1NDkxYjk0ZmQzYWI4ZmFlNjczMzc8L2NvZGljZUNvbnRlc3RvUGFnYW1lbnRvPgoJCTwvbnM0OmludGVzdGF6aW9uZVBQVD4KCTwvc29hcDpIZWFkZXI+Cgk8c29hcDpCb2R5PgoJCTxuczU6bm9kb0ludmlhUlBUIHhtbG5zPSIiIHhtbG5zOm5zMz0iaHR0cDovL3d3dy5kaWdpdHBhLmdvdi5pdC9zY2hlbWFzLzIwMTEvUGFnYW1lbnRpLyIgeG1sbnM6bnM0PSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOm5zNT0iaHR0cDovL3dzLnBhZ2FtZW50aS50ZWxlbWF0aWNpLmdvdi8iPgoJCQk8cGFzc3dvcmQ+UExBQ0VIT0xERVI8L3Bhc3N3b3JkPgoJCQk8aWRlbnRpZmljYXRpdm9QU1A+MTUzNzYzNzEwMDk8L2lkZW50aWZpY2F0aXZvUFNQPgoJCQk8aWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUFNQPjE1Mzc2MzcxMDA5PC9pZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QU1A+CgkJCTxpZGVudGlmaWNhdGl2b0NhbmFsZT4xNTM3NjM3MTAwOV8wMTwvaWRlbnRpZmljYXRpdm9DYW5hbGU+CgkJCTx0aXBvRmlybWEvPgoJCQk8cnB0PlBEOTRiV3dnZG1WeWMybHZiajBpTVM0d0lpQmxibU52WkdsdVp6MGlWVlJHTFRnaUlITjBZVzVrWVd4dmJtVTlJbmxsY3lJL1BnbzhVbEJVSUhodGJHNXpQU0pvZEhSd09pOHZkM2QzTG1ScFoybDBjR0V1WjI5MkxtbDBMM05qYUdWdFlYTXZNakF4TVM5UVlXZGhiV1Z1ZEdrdklqNEtJQ0FnSUR4MlpYSnphVzl1WlU5bloyVjBkRzgrTmk0eVBDOTJaWEp6YVc5dVpVOW5aMlYwZEc4K0NpQWdJQ0E4Wkc5dGFXNXBiejRLSUNBZ0lDQWdJQ0E4YVdSbGJuUnBabWxqWVhScGRtOUViMjFwYm1sdlBqYzNOemMzTnpjM056YzNQQzlwWkdWdWRHbG1hV05oZEdsMmIwUnZiV2x1YVc4K0NpQWdJQ0E4TDJSdmJXbHVhVzgrQ2lBZ0lDQThhV1JsYm5ScFptbGpZWFJwZG05TlpYTnpZV2RuYVc5U2FXTm9hV1Z6ZEdFK2VIaDRlSGg0ZUhnOEwybGtaVzUwYVdacFkyRjBhWFp2VFdWemMyRm5aMmx2VW1samFHbGxjM1JoUGdvZ0lDQWdQR1JoZEdGUGNtRk5aWE56WVdkbmFXOVNhV05vYVdWemRHRStNakF5TkMwd05DMHhNRlF5TVRveE5Eb3pPRHd2WkdGMFlVOXlZVTFsYzNOaFoyZHBiMUpwWTJocFpYTjBZVDRLSUNBZ0lEeGhkWFJsYm5ScFkyRjZhVzl1WlZOdloyZGxkSFJ2UGs0dlFUd3ZZWFYwWlc1MGFXTmhlbWx2Ym1WVGIyZG5aWFIwYno0S0lDQWdJRHh6YjJkblpYUjBiMUJoWjJGMGIzSmxQZ29nSUNBZ0lDQWdJRHhwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5UVlXZGhkRzl5WlQ0S0lDQWdJQ0FnSUNBZ0lDQWdQSFJwY0c5SlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtSand2ZEdsd2IwbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejRLSUNBZ0lDQWdJQ0FnSUNBZ1BHTnZaR2xqWlVsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NTRlSGg0ZUhoNGVEd3ZZMjlrYVdObFNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29nSUNBZ0lDQWdJRHd2YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlVHRm5ZWFJ2Y21VK0NpQWdJQ0FnSUNBZ1BHRnVZV2R5WVdacFkyRlFZV2RoZEc5eVpUNTRlSGg0ZUhoNGVIZzhMMkZ1WVdkeVlXWnBZMkZRWVdkaGRHOXlaVDRLSUNBZ0lEd3ZjMjluWjJWMGRHOVFZV2RoZEc5eVpUNEtJQ0FnSUR4bGJuUmxRbVZ1WldacFkybGhjbWx2UGdvZ0lDQWdJQ0FnSUR4cFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOUNaVzVsWm1samFXRnlhVzgrQ2lBZ0lDQWdJQ0FnSUNBZ0lEeDBhWEJ2U1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBrYzhMM1JwY0c5SlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtDaUFnSUNBZ0lDQWdJQ0FnSUR4amIyUnBZMlZKWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI4K2VIaDRlSGg0UEM5amIyUnBZMlZKWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI4K0NpQWdJQ0FnSUNBZ1BDOXBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlDWlc1bFptbGphV0Z5YVc4K0NpQWdJQ0FnSUNBZ1BHUmxibTl0YVc1aGVtbHZibVZDWlc1bFptbGphV0Z5YVc4K2VIaDRlSGg0ZUR3dlpHVnViMjFwYm1GNmFXOXVaVUpsYm1WbWFXTnBZWEpwYno0S0lDQWdJRHd2Wlc1MFpVSmxibVZtYVdOcFlYSnBiejRLSUNBZ0lEeGtZWFJwVm1WeWMyRnRaVzUwYno0S0lDQWdJQ0FnSUNBOFpHRjBZVVZ6WldOMWVtbHZibVZRWVdkaGJXVnVkRzgrTWpBeU5DMHdOQzB4TUR3dlpHRjBZVVZ6WldOMWVtbHZibVZRWVdkaGJXVnVkRzgrQ2lBZ0lDQWdJQ0FnUEdsdGNHOXlkRzlVYjNSaGJHVkVZVlpsY25OaGNtVStORFV1TURBOEwybHRjRzl5ZEc5VWIzUmhiR1ZFWVZabGNuTmhjbVUrQ2lBZ0lDQWdJQ0FnUEhScGNHOVdaWEp6WVcxbGJuUnZQbEJQUEM5MGFYQnZWbVZ5YzJGdFpXNTBiejRLSUNBZ0lDQWdJQ0E4YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlZtVnljMkZ0Wlc1MGJ6NHdNVEF3TURBd01EQXdNREF3TURBd01Ud3ZhV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52Vm1WeWMyRnRaVzUwYno0S0lDQWdJQ0FnSUNBOFkyOWthV05sUTI5dWRHVnpkRzlRWVdkaGJXVnVkRzgrTUdRM01HUTJPV1F6TWpjMU5Ea3hZamswWm1RellXSTRabUZsTmpjek16YzhMMk52WkdsalpVTnZiblJsYzNSdlVHRm5ZVzFsYm5SdlBnb2dJQ0FnSUNBZ0lEeG1hWEp0WVZKcFkyVjJkWFJoUGpBOEwyWnBjbTFoVW1salpYWjFkR0UrQ2lBZ0lDQWdJQ0FnUEdSaGRHbFRhVzVuYjJ4dlZtVnljMkZ0Wlc1MGJ6NEtJQ0FnSUNBZ0lDQWdJQ0FnUEdsdGNHOXlkRzlUYVc1bmIyeHZWbVZ5YzJGdFpXNTBiejQwTlM0d01Ed3ZhVzF3YjNKMGIxTnBibWR2Ykc5V1pYSnpZVzFsYm5SdlBnb2dJQ0FnSUNBZ0lDQWdJQ0E4YVdKaGJrRmpZM0psWkdsMGJ6NUpWREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01ERThMMmxpWVc1QlkyTnlaV1JwZEc4K0NpQWdJQ0FnSUNBZ0lDQWdJRHhqWVhWellXeGxWbVZ5YzJGdFpXNTBiejU0ZUhoNGVIZzhMMk5oZFhOaGJHVldaWEp6WVcxbGJuUnZQZ29nSUNBZ0lDQWdJQ0FnSUNBOFpHRjBhVk53WldOcFptbGphVkpwYzJOdmMzTnBiMjVsUG5oNGVIaDRQQzlrWVhScFUzQmxZMmxtYVdOcFVtbHpZMjl6YzJsdmJtVStDaUFnSUNBZ0lDQWdQQzlrWVhScFUybHVaMjlzYjFabGNuTmhiV1Z1ZEc4K0NpQWdJQ0E4TDJSaGRHbFdaWEp6WVcxbGJuUnZQZ284TDFKUVZENEs8L3JwdD4KCQk8L25zNTpub2RvSW52aWFSUFQ+Cgk8L3NvYXA6Qm9keT4KPC9zb2FwOkVudmVsb3BlPg=="
        ]);

        $this->no_data_event = new nodoInviaRPT([
            "inserted_timestamp" =>  "2024-03-13 09:10:00.210",
            "tipoevento" =>  "nodoInviaRPT",
            "sottotipoevento" =>  "REQ",
            "idDominio" =>  "",
            "iuv" =>  "",
            "ccp" =>  "",
            "noticeNumber" =>  "",
            "creditorReferenceId" =>  "",
            "paymentToken" =>  "",
            "psp" =>  "",
            "stazione" =>  "",
            "canale" =>  "",
            "sessionid" =>  "SESSID_01",
            "sessionidoriginal" =>  "SESSORIGIN_01",
            "uniqueid" =>  "UNIQUE_RPT_1",
            "payload" => "PHNvYXA6RW52ZWxvcGUgeG1sbnM6c29hcD0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPgoJPHNvYXA6SGVhZGVyPgoJCTxuczQ6aW50ZXN0YXppb25lUFBUIFNPQVAtRU5WOmFjdG9yPSJodHRwOi8vcGRkNGoub3JnL3BvcnRhZG9taW5pbyIgU09BUC1FTlY6bXVzdFVuZGVyc3RhbmQ9IjEiIHhtbG5zPSIiIHhtbG5zOlNPQVAtRU5WPSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyIgeG1sbnM6bnMzPSJodHRwOi8vd3d3LmRpZ2l0cGEuZ292Lml0L3NjaGVtYXMvMjAxMS9QYWdhbWVudGkvIiB4bWxuczpuczQ9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvcHB0aGVhZCIgeG1sbnM6bnM1PSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyI+CgkJCTxpZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QQT43Nzc3Nzc3Nzc3NzwvaWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUEE+CgkJCTxpZGVudGlmaWNhdGl2b1N0YXppb25lSW50ZXJtZWRpYXJpb1BBPjc3Nzc3Nzc3Nzc3XzAxPC9pZGVudGlmaWNhdGl2b1N0YXppb25lSW50ZXJtZWRpYXJpb1BBPgoJCQk8aWRlbnRpZmljYXRpdm9Eb21pbmlvPjc3Nzc3Nzc3Nzc3PC9pZGVudGlmaWNhdGl2b0RvbWluaW8+CgkJCTxpZGVudGlmaWNhdGl2b1VuaXZvY29WZXJzYW1lbnRvPjAxMDAwMDAwMDAwMDAwMDAxPC9pZGVudGlmaWNhdGl2b1VuaXZvY29WZXJzYW1lbnRvPgoJCQk8Y29kaWNlQ29udGVzdG9QYWdhbWVudG8+MGQ3MGQ2OWQzMjc1NDkxYjk0ZmQzYWI4ZmFlNjczMzc8L2NvZGljZUNvbnRlc3RvUGFnYW1lbnRvPgoJCTwvbnM0OmludGVzdGF6aW9uZVBQVD4KCTwvc29hcDpIZWFkZXI+Cgk8c29hcDpCb2R5PgoJCTxuczU6bm9kb0ludmlhUlBUIHhtbG5zPSIiIHhtbG5zOm5zMz0iaHR0cDovL3d3dy5kaWdpdHBhLmdvdi5pdC9zY2hlbWFzLzIwMTEvUGFnYW1lbnRpLyIgeG1sbnM6bnM0PSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOm5zNT0iaHR0cDovL3dzLnBhZ2FtZW50aS50ZWxlbWF0aWNpLmdvdi8iPgoJCQk8cGFzc3dvcmQ+UExBQ0VIT0xERVI8L3Bhc3N3b3JkPgoJCQk8aWRlbnRpZmljYXRpdm9QU1A+MTUzNzYzNzEwMDk8L2lkZW50aWZpY2F0aXZvUFNQPgoJCQk8aWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUFNQPjE1Mzc2MzcxMDA5PC9pZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QU1A+CgkJCTxpZGVudGlmaWNhdGl2b0NhbmFsZT4xNTM3NjM3MTAwOV8wMTwvaWRlbnRpZmljYXRpdm9DYW5hbGU+CgkJCTx0aXBvRmlybWEvPgoJCQk8cnB0PlBEOTRiV3dnZG1WeWMybHZiajBpTVM0d0lpQmxibU52WkdsdVp6MGlWVlJHTFRnaUlITjBZVzVrWVd4dmJtVTlJbmxsY3lJL1BnbzhVbEJVSUhodGJHNXpQU0pvZEhSd09pOHZkM2QzTG1ScFoybDBjR0V1WjI5MkxtbDBMM05qYUdWdFlYTXZNakF4TVM5UVlXZGhiV1Z1ZEdrdklqNEtJQ0FnSUR4MlpYSnphVzl1WlU5bloyVjBkRzgrTmk0eVBDOTJaWEp6YVc5dVpVOW5aMlYwZEc4K0NpQWdJQ0E4Wkc5dGFXNXBiejRLSUNBZ0lDQWdJQ0E4YVdSbGJuUnBabWxqWVhScGRtOUViMjFwYm1sdlBqYzNOemMzTnpjM056YzNQQzlwWkdWdWRHbG1hV05oZEdsMmIwUnZiV2x1YVc4K0NpQWdJQ0E4TDJSdmJXbHVhVzgrQ2lBZ0lDQThhV1JsYm5ScFptbGpZWFJwZG05TlpYTnpZV2RuYVc5U2FXTm9hV1Z6ZEdFK2VIaDRlSGg0ZUhnOEwybGtaVzUwYVdacFkyRjBhWFp2VFdWemMyRm5aMmx2VW1samFHbGxjM1JoUGdvZ0lDQWdQR1JoZEdGUGNtRk5aWE56WVdkbmFXOVNhV05vYVdWemRHRStNakF5TkMwd05DMHhNRlF5TVRveE5Eb3pPRHd2WkdGMFlVOXlZVTFsYzNOaFoyZHBiMUpwWTJocFpYTjBZVDRLSUNBZ0lEeGhkWFJsYm5ScFkyRjZhVzl1WlZOdloyZGxkSFJ2UGs0dlFUd3ZZWFYwWlc1MGFXTmhlbWx2Ym1WVGIyZG5aWFIwYno0S0lDQWdJRHh6YjJkblpYUjBiMUJoWjJGMGIzSmxQZ29nSUNBZ0lDQWdJRHhwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5UVlXZGhkRzl5WlQ0S0lDQWdJQ0FnSUNBZ0lDQWdQSFJwY0c5SlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtSand2ZEdsd2IwbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejRLSUNBZ0lDQWdJQ0FnSUNBZ1BHTnZaR2xqWlVsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NTRlSGg0ZUhoNGVEd3ZZMjlrYVdObFNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29nSUNBZ0lDQWdJRHd2YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlVHRm5ZWFJ2Y21VK0NpQWdJQ0FnSUNBZ1BHRnVZV2R5WVdacFkyRlFZV2RoZEc5eVpUNTRlSGg0ZUhoNGVIZzhMMkZ1WVdkeVlXWnBZMkZRWVdkaGRHOXlaVDRLSUNBZ0lEd3ZjMjluWjJWMGRHOVFZV2RoZEc5eVpUNEtJQ0FnSUR4bGJuUmxRbVZ1WldacFkybGhjbWx2UGdvZ0lDQWdJQ0FnSUR4cFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOUNaVzVsWm1samFXRnlhVzgrQ2lBZ0lDQWdJQ0FnSUNBZ0lEeDBhWEJ2U1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBrYzhMM1JwY0c5SlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtDaUFnSUNBZ0lDQWdJQ0FnSUR4amIyUnBZMlZKWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI4K2VIaDRlSGg0UEM5amIyUnBZMlZKWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI4K0NpQWdJQ0FnSUNBZ1BDOXBaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjlDWlc1bFptbGphV0Z5YVc4K0NpQWdJQ0FnSUNBZ1BHUmxibTl0YVc1aGVtbHZibVZDWlc1bFptbGphV0Z5YVc4K2VIaDRlSGg0ZUR3dlpHVnViMjFwYm1GNmFXOXVaVUpsYm1WbWFXTnBZWEpwYno0S0lDQWdJRHd2Wlc1MFpVSmxibVZtYVdOcFlYSnBiejRLSUNBZ0lEeGtZWFJwVm1WeWMyRnRaVzUwYno0S0lDQWdJQ0FnSUNBOFpHRjBZVVZ6WldOMWVtbHZibVZRWVdkaGJXVnVkRzgrTWpBeU5DMHdOQzB4TUR3dlpHRjBZVVZ6WldOMWVtbHZibVZRWVdkaGJXVnVkRzgrQ2lBZ0lDQWdJQ0FnUEdsdGNHOXlkRzlVYjNSaGJHVkVZVlpsY25OaGNtVStORFV1TURBOEwybHRjRzl5ZEc5VWIzUmhiR1ZFWVZabGNuTmhjbVUrQ2lBZ0lDQWdJQ0FnUEhScGNHOVdaWEp6WVcxbGJuUnZQbEJQUEM5MGFYQnZWbVZ5YzJGdFpXNTBiejRLSUNBZ0lDQWdJQ0E4YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlZtVnljMkZ0Wlc1MGJ6NHdNVEF3TURBd01EQXdNREF3TURBd01Ud3ZhV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52Vm1WeWMyRnRaVzUwYno0S0lDQWdJQ0FnSUNBOFkyOWthV05sUTI5dWRHVnpkRzlRWVdkaGJXVnVkRzgrTUdRM01HUTJPV1F6TWpjMU5Ea3hZamswWm1RellXSTRabUZsTmpjek16YzhMMk52WkdsalpVTnZiblJsYzNSdlVHRm5ZVzFsYm5SdlBnb2dJQ0FnSUNBZ0lEeG1hWEp0WVZKcFkyVjJkWFJoUGpBOEwyWnBjbTFoVW1salpYWjFkR0UrQ2lBZ0lDQWdJQ0FnUEdSaGRHbFRhVzVuYjJ4dlZtVnljMkZ0Wlc1MGJ6NEtJQ0FnSUNBZ0lDQWdJQ0FnUEdsdGNHOXlkRzlUYVc1bmIyeHZWbVZ5YzJGdFpXNTBiejQwTlM0d01Ed3ZhVzF3YjNKMGIxTnBibWR2Ykc5V1pYSnpZVzFsYm5SdlBnb2dJQ0FnSUNBZ0lDQWdJQ0E4YVdKaGJrRmpZM0psWkdsMGJ6NUpWREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01ERThMMmxpWVc1QlkyTnlaV1JwZEc4K0NpQWdJQ0FnSUNBZ0lDQWdJRHhqWVhWellXeGxWbVZ5YzJGdFpXNTBiejU0ZUhoNGVIZzhMMk5oZFhOaGJHVldaWEp6WVcxbGJuUnZQZ29nSUNBZ0lDQWdJQ0FnSUNBOFpHRjBhVk53WldOcFptbGphVkpwYzJOdmMzTnBiMjVsUG5oNGVIaDRQQzlrWVhScFUzQmxZMmxtYVdOcFVtbHpZMjl6YzJsdmJtVStDaUFnSUNBZ0lDQWdQQzlrWVhScFUybHVaMjlzYjFabGNuTmhiV1Z1ZEc4K0NpQWdJQ0E4TDJSaGRHbFdaWEp6WVcxbGJuUnZQZ284TDFKUVZENEs8L3JwdD4KCQk8L25zNTpub2RvSW52aWFSUFQ+Cgk8L3NvYXA6Qm9keT4KPC9zb2FwOkVudmVsb3BlPg=="
        ]);
    }


    #[TestDox('getStazione()')]
    public function testGetStazione()
    {
        $this->assertEquals('77777777777_01', $this->one_instance->getStazione());
        $this->assertEquals('77777777777_01', $this->no_data_event->getStazione());
    }

    #[TestDox('getFaultString()')]
    public function testGetFaultString()
    {
        $this->assertNull($this->one_instance->getFaultString());
        $this->assertNull($this->no_data_event->getFaultDescription());
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $this->assertEquals(['0d70d69d3275491b94fd3ab8fae67337'], $this->one_instance->getCcps());
        $this->assertEquals(['0d70d69d3275491b94fd3ab8fae67337'], $this->no_data_event->getCcps());
    }

    #[TestDox('transaction()')]
    public function testTransaction()
    {
        $transaction = $this->one_instance->transaction();
        $this->assertEquals('2024-03-13', $transaction->getReadyColumnValue('date_event'));
        $this->assertEquals('01000000000000001', $transaction->getReadyColumnValue('iuv'));
        $this->assertEquals('77777777777', $transaction->getReadyColumnValue('pa_emittente'));
        $this->assertEquals('0d70d69d3275491b94fd3ab8fae67337', $transaction->getReadyColumnValue('token_ccp'));
        $this->assertEquals('AGID_01', $transaction->getReadyColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $transaction->getReadyColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $transaction->getReadyColumnValue('canale'));
        $this->assertEquals('45.00', $transaction->getReadyColumnValue('importo'));
        $this->assertEquals('TOUCHPOINT_EC_OLD', $transaction->getReadyColumnValue('touchpoint'));

        $this->assertNull($transaction->getReadyColumnValue('notice_id'));
        $this->assertNull($transaction->getReadyColumnValue('id_carrello'));
        $this->assertNull($transaction->getReadyColumnValue('esito'));
        $this->assertNull($transaction->getReadyColumnValue('date_wf'));
        $this->assertNull($transaction->getReadyColumnValue('payment_type'));

        $transaction = $this->no_data_event->transaction();
        $this->assertEquals('2024-03-13', $transaction->getReadyColumnValue('date_event'));
        $this->assertEquals('01000000000000001', $transaction->getReadyColumnValue('iuv'));
        $this->assertEquals('77777777777', $transaction->getReadyColumnValue('pa_emittente'));
        $this->assertEquals('0d70d69d3275491b94fd3ab8fae67337', $transaction->getReadyColumnValue('token_ccp'));
        $this->assertEquals('15376371009', $transaction->getReadyColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $transaction->getReadyColumnValue('stazione'));
        $this->assertEquals('15376371009_01', $transaction->getReadyColumnValue('canale'));
        $this->assertEquals('45.00', $transaction->getReadyColumnValue('importo'));
        $this->assertEquals('TOUCHPOINT_EC_OLD', $transaction->getReadyColumnValue('touchpoint'));

        $this->assertNull($transaction->getReadyColumnValue('notice_id'));
        $this->assertNull($transaction->getReadyColumnValue('id_carrello'));
        $this->assertNull($transaction->getReadyColumnValue('esito'));
        $this->assertNull($transaction->getReadyColumnValue('date_wf'));
        $this->assertNull($transaction->getReadyColumnValue('payment_type'));

    }

    #[TestDox('getMethodInterface()')]
    public function testGetMethodInterface()
    {
        $this->assertInstanceOf(\pagopa\crawler\methods\req\nodoInviaRPT::class, $this->one_instance->getMethodInterface());
        $this->assertInstanceOf(\pagopa\crawler\methods\req\nodoInviaRPT::class, $this->no_data_event->getMethodInterface());
    }

    #[TestDox('isFaultEvent()')]
    public function testIsFaultEvent()
    {
        $this->assertFalse($this->one_instance->isFaultEvent());
        $this->assertFalse($this->no_data_event->isFaultEvent());
    }

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $this->assertEquals('77777777777', $this->one_instance->getPaEmittente());
        $this->assertEquals('77777777777', $this->no_data_event->getPaEmittente());
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $this->assertEquals(['01000000000000001'], $this->one_instance->getIuvs());
        $this->assertEquals(['01000000000000001'], $this->no_data_event->getIuvs());
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertEquals(1, $this->one_instance->getTransferCount());
        $this->assertEquals(1, $this->no_data_event->getTransferCount());
    }

    #[TestDox('workflowEvent()')]
    public function testWorkflowEvent()
    {
        $transaction = $this->one_instance->workflowEvent();
        $this->assertEquals('2024-03-13', $transaction->getReadyColumnValue('date_event'));
        $this->assertEquals('2024-03-13 09:10:00.210', $transaction->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('AGID_01', $transaction->getReadyColumnValue('id_psp'));
        $this->assertEquals('UNIQUE_RPT_1', $transaction->getReadyColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $transaction->getReadyColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $transaction->getReadyColumnValue('canale'));

        $transaction = $this->no_data_event->workflowEvent();
        $this->assertEquals('2024-03-13', $transaction->getReadyColumnValue('date_event'));
        $this->assertEquals('2024-03-13 09:10:00.210', $transaction->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('15376371009', $transaction->getReadyColumnValue('id_psp'));
        $this->assertEquals('UNIQUE_RPT_1', $transaction->getReadyColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $transaction->getReadyColumnValue('stazione'));
        $this->assertEquals('15376371009_01', $transaction->getReadyColumnValue('canale'));

    }

    #[TestDox('getCanale()')]
    public function testGetCanale()
    {
        $this->assertEquals('88888888888_01', $this->one_instance->getCanale());
        $this->assertEquals('15376371009_01', $this->no_data_event->getCanale());
    }

    #[TestDox('getCreditorReferenceId()')]
    public function testGetCreditorReferenceId()
    {
        $this->assertEquals('01000000000000001', $this->one_instance->getCreditorReferenceId());
        $this->assertEquals('01000000000000001', $this->no_data_event->getCreditorReferenceId());
    }

    #[TestDox('getBrokerPsp()')]
    public function testGetBrokerPsp()
    {
        $this->assertEquals('88888888888', $this->one_instance->getBrokerPsp());
        $this->assertEquals('15376371009', $this->no_data_event->getBrokerPsp());
    }

    #[TestDox('getBrokerPa()')]
    public function testGetBrokerPa()
    {
        $this->assertEquals('77777777777', $this->one_instance->getBrokerPa());
        $this->assertEquals('77777777777', $this->no_data_event->getBrokerPa());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->one_instance->getPaymentsCount());
        $this->assertEquals(1, $this->no_data_event->getPaymentsCount());
    }

    #[TestDox('getPsp()')]
    public function testGetPsp()
    {
        $this->assertEquals('AGID_01', $this->one_instance->getPsp());
        $this->assertEquals('15376371009', $this->no_data_event->getPsp());
    }

    #[TestDox('getCcp()')]
    public function testGetCcp()
    {
        $this->assertEquals('0d70d69d3275491b94fd3ab8fae67337', $this->one_instance->getCcp());
        $this->assertEquals('0d70d69d3275491b94fd3ab8fae67337', $this->no_data_event->getCcp());
    }

    #[TestDox('getIuv()')]
    public function testGetIuv()
    {
        $this->assertEquals('01000000000000001', $this->one_instance->getIuv());
        $this->assertEquals('01000000000000001', $this->no_data_event->getIuv());
    }

    #[TestDox('transactionDetails()')]
    public function testTransactionDetails()
    {
        $details = $this->one_instance->transactionDetails(0);
        $this->assertEquals('2024-03-13', $details->getReadyColumnValue('date_event'));
        $this->assertEquals('77777777777', $details->getReadyColumnValue('pa_transfer'));
        $this->assertEquals('IT0000000000000000000000001', $details->getReadyColumnValue('iban_transfer'));
        $this->assertEquals('45.00', $details->getReadyColumnValue('amount_transfer'));
        $this->assertFalse($details->getReadyColumnValue('is_bollo'));

        $details = $this->no_data_event->transactionDetails(0);
        $this->assertEquals('2024-03-13', $details->getReadyColumnValue('date_event'));
        $this->assertEquals('77777777777', $details->getReadyColumnValue('pa_transfer'));
        $this->assertEquals('IT0000000000000000000000001', $details->getReadyColumnValue('iban_transfer'));
        $this->assertEquals('45.00', $details->getReadyColumnValue('amount_transfer'));
        $this->assertFalse($details->getReadyColumnValue('is_bollo'));

    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $this->assertEquals(['77777777777'], $this->one_instance->getPaEmittenti());
        $this->assertEquals(['77777777777'], $this->no_data_event->getPaEmittenti());
    }

    #[TestDox('getPaymentToken()')]
    public function testGetPaymentToken()
    {
        $this->assertEquals('0d70d69d3275491b94fd3ab8fae67337', $this->one_instance->getPaymentToken());
        $this->assertEquals('0d70d69d3275491b94fd3ab8fae67337', $this->no_data_event->getPaymentToken());
    }

    #[TestDox('getNoticeNumber()')]
    public function testGetNoticeNumber()
    {
        $this->assertNull($this->one_instance->getNoticeNumber());
        $this->assertNull($this->no_data_event->getNoticeNumber());
    }

    #[TestDox('getFaultCode()')]
    public function testGetFaultCode()
    {
        $this->assertNull($this->one_instance->getFaultCode());
        $this->assertNull($this->no_data_event->getFaultCode());
    }
}

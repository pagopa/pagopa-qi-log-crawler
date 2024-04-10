<?php

namespace pagopa\events\req;

use pagopa\crawler\events\req\pspInviaCarrelloRPT;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

#[TestDox('events\req\pspInviaCarrelloRPT::class')]
class pspInviaCarrelloRPTTest extends TestCase
{


    /**
     * Istanza con una RPT e 1 Versamento
     * @var pspInviaCarrelloRPT
     */
    protected pspInviaCarrelloRPT $instance_1;


    /**
     * Istanza con 1 RPT e 2 versamenti
     * @var pspInviaCarrelloRPT
     */
    protected pspInviaCarrelloRPT $instance_2;


    /**
     * Istanza con 2 RPT e 2 versamenti
     * @var pspInviaCarrelloRPT
     */
    protected pspInviaCarrelloRPT $instance_3;

    protected function setUp(): void
    {
        $this->instance_1 = new pspInviaCarrelloRPT([
            "inserted_timestamp" =>  "2024-03-13 10:10:00.210",
            "tipoevento" =>  "pspInviaCarrelloRPT",
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
            "payload" => "PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpwYXlfaj0iaHR0cDovL3d3dy5jbmlwYS5nb3YuaXQvc2NoZW1hcy8yMDEwL1BhZ2FtZW50aS9BY2tfMV8wLyIgeG1sbnM6cHB0PSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnRucz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0IiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBwdDpwc3BJbnZpYUNhcnJlbGxvUlBUPgoJCQk8aWRlbnRpZmljYXRpdm9QU1A+UFNQX1JQVDwvaWRlbnRpZmljYXRpdm9QU1A+CgkJCTxpZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QU1A+ODg4ODg4ODg4ODg8L2lkZW50aWZpY2F0aXZvSW50ZXJtZWRpYXJpb1BTUD4KCQkJPGlkZW50aWZpY2F0aXZvQ2FuYWxlPjg4ODg4ODg4ODg4XzAxPC9pZGVudGlmaWNhdGl2b0NhbmFsZT4KCQkJPG1vZGVsbG9QYWdhbWVudG8+MTwvbW9kZWxsb1BhZ2FtZW50bz4KCQkJPGxpc3RhUlBUPgoJCQkJPGVsZW1lbnRvTGlzdGFDYXJyZWxsb1JQVD4KCQkJCQk8aWRlbnRpZmljYXRpdm9Eb21pbmlvPjc3Nzc3Nzc3Nzc3PC9pZGVudGlmaWNhdGl2b0RvbWluaW8+CgkJCQkJPGlkZW50aWZpY2F0aXZvVW5pdm9jb1ZlcnNhbWVudG8+MDIwMDAwMDAwMDAwNjAwMDA8L2lkZW50aWZpY2F0aXZvVW5pdm9jb1ZlcnNhbWVudG8+CgkJCQkJPGNvZGljZUNvbnRlc3RvUGFnYW1lbnRvPjAwMDAwMDAwMDAwMDAwMDEwMDwvY29kaWNlQ29udGVzdG9QYWdhbWVudG8+CgkJCQkJPHJwdD5QRkpRVkNCNGJXeHVjejBpYUhSMGNEb3ZMM2QzZHk1a2FXZHBkSEJoTG1kdmRpNXBkQzl6WTJobGJXRnpMekl3TVRFdlVHRm5ZVzFsYm5ScEx5SStDZ2s4ZG1WeWMybHZibVZQWjJkbGRIUnZQall1TWk0d1BDOTJaWEp6YVc5dVpVOW5aMlYwZEc4K0NnazhaRzl0YVc1cGJ6NEtDUWs4YVdSbGJuUnBabWxqWVhScGRtOUViMjFwYm1sdlBqYzNOemMzTnpjM056YzNQQzlwWkdWdWRHbG1hV05oZEdsMmIwUnZiV2x1YVc4K0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlUzUmhlbWx2Ym1WU2FXTm9hV1ZrWlc1MFpUNDNOemMzTnpjM056YzNOMTh3TVR3dmFXUmxiblJwWm1sallYUnBkbTlUZEdGNmFXOXVaVkpwWTJocFpXUmxiblJsUGdvSlBDOWtiMjFwYm1sdlBnb0pQR2xrWlc1MGFXWnBZMkYwYVhadlRXVnpjMkZuWjJsdlVtbGphR2xsYzNSaFBtWXpaV016Tm1SaU56aGtZVFEwTkdaaFlqUmpaakJtT1RBNE9XSm1aRGt3UEM5cFpHVnVkR2xtYVdOaGRHbDJiMDFsYzNOaFoyZHBiMUpwWTJocFpYTjBZVDRLQ1R4a1lYUmhUM0poVFdWemMyRm5aMmx2VW1samFHbGxjM1JoUGpJd01qUXRNRFF0TURsVU1qRTZOVE02TXpZOEwyUmhkR0ZQY21GTlpYTnpZV2RuYVc5U2FXTm9hV1Z6ZEdFK0NnazhZWFYwWlc1MGFXTmhlbWx2Ym1WVGIyZG5aWFIwYno1NGVIZzhMMkYxZEdWdWRHbGpZWHBwYjI1bFUyOW5aMlYwZEc4K0NnazhjMjluWjJWMGRHOVFZV2RoZEc5eVpUNEtDUWs4YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlVHRm5ZWFJ2Y21VK0Nna0pDVHgwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQbmc4TDNScGNHOUpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSkNUeGpiMlJwWTJWSlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtlSGg0ZUhoNGVEd3ZZMjlrYVdObFNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1R3dmFXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZVR0ZuWVhSdmNtVStDZ2tKUEdGdVlXZHlZV1pwWTJGUVlXZGhkRzl5WlQ1NGVIaDRlRHd2WVc1aFozSmhabWxqWVZCaFoyRjBiM0psUGdvSkNUeHVZWHBwYjI1bFVHRm5ZWFJ2Y21VK1NWUThMMjVoZW1sdmJtVlFZV2RoZEc5eVpUNEtDUWs4WlMxdFlXbHNVR0ZuWVhSdmNtVStlSGg0ZUhoQWVIaDRlQzVqYjIwOEwyVXRiV0ZwYkZCaFoyRjBiM0psUGdvSlBDOXpiMmRuWlhSMGIxQmhaMkYwYjNKbFBnb0pQR1Z1ZEdWQ1pXNWxabWxqYVdGeWFXOCtDZ2tKUEdsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amIwSmxibVZtYVdOcFlYSnBiejRLQ1FrSlBIUnBjRzlKWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI4K1J6d3ZkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NEtDUWtKUEdOdlpHbGpaVWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno1NGVIaDRlSGc4TDJOdlpHbGpaVWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno0S0NRazhMMmxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjBKbGJtVm1hV05wWVhKcGJ6NEtDUWs4WkdWdWIyMXBibUY2YVc5dVpVSmxibVZtYVdOcFlYSnBiejU0ZUhoNGVEd3ZaR1Z1YjIxcGJtRjZhVzl1WlVKbGJtVm1hV05wWVhKcGJ6NEtDVHd2Wlc1MFpVSmxibVZtYVdOcFlYSnBiejRLQ1R4a1lYUnBWbVZ5YzJGdFpXNTBiejRLQ1FrOFpHRjBZVVZ6WldOMWVtbHZibVZRWVdkaGJXVnVkRzgrTWpBeU5DMHdOQzB3T1R3dlpHRjBZVVZ6WldOMWVtbHZibVZRWVdkaGJXVnVkRzgrQ2drSlBHbHRjRzl5ZEc5VWIzUmhiR1ZFWVZabGNuTmhjbVUrTVRVeExqVTJQQzlwYlhCdmNuUnZWRzkwWVd4bFJHRldaWEp6WVhKbFBnb0pDVHgwYVhCdlZtVnljMkZ0Wlc1MGJ6NURVRHd2ZEdsd2IxWmxjbk5oYldWdWRHOCtDZ2tKUEdsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amIxWmxjbk5oYldWdWRHOCtNREl3TURBd01EQXdNREF3TmpBd01EQThMMmxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFabGNuTmhiV1Z1ZEc4K0Nna0pQR052WkdsalpVTnZiblJsYzNSdlVHRm5ZVzFsYm5SdlBqQXdNREF3TURBd01EQXdNREF3TURFd01Ed3ZZMjlrYVdObFEyOXVkR1Z6ZEc5UVlXZGhiV1Z1ZEc4K0Nna0pQR1pwY20xaFVtbGpaWFoxZEdFK01Ed3ZabWx5YldGU2FXTmxkblYwWVQ0S0NRazhaR0YwYVZOcGJtZHZiRzlXWlhKellXMWxiblJ2UGdvSkNRazhhVzF3YjNKMGIxTnBibWR2Ykc5V1pYSnpZVzFsYm5SdlBqRTFNUzQxTmp3dmFXMXdiM0owYjFOcGJtZHZiRzlXWlhKellXMWxiblJ2UGdvSkNRazhhV0poYmtGalkzSmxaR2wwYno1SlZEQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURFOEwybGlZVzVCWTJOeVpXUnBkRzgrQ2drSkNUeGpZWFZ6WVd4bFZtVnljMkZ0Wlc1MGJ6NTRlSGg0ZUhoNFBDOWpZWFZ6WVd4bFZtVnljMkZ0Wlc1MGJ6NEtDUWtKUEdSaGRHbFRjR1ZqYVdacFkybFNhWE5qYjNOemFXOXVaVDU0ZUhoNGVIaDRQQzlrWVhScFUzQmxZMmxtYVdOcFVtbHpZMjl6YzJsdmJtVStDZ2tKUEM5a1lYUnBVMmx1WjI5c2IxWmxjbk5oYldWdWRHOCtDZ2s4TDJSaGRHbFdaWEp6WVcxbGJuUnZQZ284TDFKUVZEND08L3JwdD4KCQkJCTwvZWxlbWVudG9MaXN0YUNhcnJlbGxvUlBUPgoJCQk8L2xpc3RhUlBUPgoJCTwvcHB0OnBzcEludmlhQ2FycmVsbG9SUFQ+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg=="
        ]);


        $this->instance_2 = new pspInviaCarrelloRPT([
            "inserted_timestamp" =>  "2024-03-13 10:11:00.210",
            "tipoevento" =>  "pspInviaCarrelloRPT",
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
            "payload" => "PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpwYXlfaj0iaHR0cDovL3d3dy5jbmlwYS5nb3YuaXQvc2NoZW1hcy8yMDEwL1BhZ2FtZW50aS9BY2tfMV8wLyIgeG1sbnM6cHB0PSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnRucz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0IiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBwdDpwc3BJbnZpYUNhcnJlbGxvUlBUPgoJCQk8aWRlbnRpZmljYXRpdm9QU1A+UFNQX1JQVDwvaWRlbnRpZmljYXRpdm9QU1A+CgkJCTxpZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QU1A+ODg4ODg4ODg4ODg8L2lkZW50aWZpY2F0aXZvSW50ZXJtZWRpYXJpb1BTUD4KCQkJPGlkZW50aWZpY2F0aXZvQ2FuYWxlPjg4ODg4ODg4ODg4XzAxPC9pZGVudGlmaWNhdGl2b0NhbmFsZT4KCQkJPG1vZGVsbG9QYWdhbWVudG8+MTwvbW9kZWxsb1BhZ2FtZW50bz4KCQkJPGxpc3RhUlBUPgoJCQkJPGVsZW1lbnRvTGlzdGFDYXJyZWxsb1JQVD4KCQkJCQk8aWRlbnRpZmljYXRpdm9Eb21pbmlvPjc3Nzc3Nzc3Nzc3PC9pZGVudGlmaWNhdGl2b0RvbWluaW8+CgkJCQkJPGlkZW50aWZpY2F0aXZvVW5pdm9jb1ZlcnNhbWVudG8+MDIwMDAwMDAwMDAwNjAwMDE8L2lkZW50aWZpY2F0aXZvVW5pdm9jb1ZlcnNhbWVudG8+CgkJCQkJPGNvZGljZUNvbnRlc3RvUGFnYW1lbnRvPjAwMDAwMDAwMDAwMDAwMDEwMTwvY29kaWNlQ29udGVzdG9QYWdhbWVudG8+CgkJCQkJPHJwdD5QRkpRVkNCNGJXeHVjejBpYUhSMGNEb3ZMM2QzZHk1a2FXZHBkSEJoTG1kdmRpNXBkQzl6WTJobGJXRnpMekl3TVRFdlVHRm5ZVzFsYm5ScEx5SStDZ2s4ZG1WeWMybHZibVZQWjJkbGRIUnZQall1TWk0d1BDOTJaWEp6YVc5dVpVOW5aMlYwZEc4K0NnazhaRzl0YVc1cGJ6NEtDUWs4YVdSbGJuUnBabWxqWVhScGRtOUViMjFwYm1sdlBqYzNOemMzTnpjM056YzNQQzlwWkdWdWRHbG1hV05oZEdsMmIwUnZiV2x1YVc4K0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlUzUmhlbWx2Ym1WU2FXTm9hV1ZrWlc1MFpUNDNOemMzTnpjM056YzNOMTh3TVR3dmFXUmxiblJwWm1sallYUnBkbTlUZEdGNmFXOXVaVkpwWTJocFpXUmxiblJsUGdvSlBDOWtiMjFwYm1sdlBnb0pQR2xrWlc1MGFXWnBZMkYwYVhadlRXVnpjMkZuWjJsdlVtbGphR2xsYzNSaFBtWXpaV016Tm1SaU56aGtZVFEwTkdaaFlqUmpaakJtT1RBNE9XSm1aRGt3UEM5cFpHVnVkR2xtYVdOaGRHbDJiMDFsYzNOaFoyZHBiMUpwWTJocFpYTjBZVDRLQ1R4a1lYUmhUM0poVFdWemMyRm5aMmx2VW1samFHbGxjM1JoUGpJd01qUXRNRFF0TURsVU1qRTZOVE02TXpZOEwyUmhkR0ZQY21GTlpYTnpZV2RuYVc5U2FXTm9hV1Z6ZEdFK0NnazhZWFYwWlc1MGFXTmhlbWx2Ym1WVGIyZG5aWFIwYno1NGVIZzhMMkYxZEdWdWRHbGpZWHBwYjI1bFUyOW5aMlYwZEc4K0NnazhjMjluWjJWMGRHOVFZV2RoZEc5eVpUNEtDUWs4YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlVHRm5ZWFJ2Y21VK0Nna0pDVHgwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQbmc4TDNScGNHOUpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSkNUeGpiMlJwWTJWSlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtlSGg0ZUhoNGVEd3ZZMjlrYVdObFNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1R3dmFXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZVR0ZuWVhSdmNtVStDZ2tKUEdGdVlXZHlZV1pwWTJGUVlXZGhkRzl5WlQ1NGVIaDRlRHd2WVc1aFozSmhabWxqWVZCaFoyRjBiM0psUGdvSkNUeHVZWHBwYjI1bFVHRm5ZWFJ2Y21VK1NWUThMMjVoZW1sdmJtVlFZV2RoZEc5eVpUNEtDUWs4WlMxdFlXbHNVR0ZuWVhSdmNtVStlSGg0ZUhoQWVIaDRlQzVqYjIwOEwyVXRiV0ZwYkZCaFoyRjBiM0psUGdvSlBDOXpiMmRuWlhSMGIxQmhaMkYwYjNKbFBnb0pQR1Z1ZEdWQ1pXNWxabWxqYVdGeWFXOCtDZ2tKUEdsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amIwSmxibVZtYVdOcFlYSnBiejRLQ1FrSlBIUnBjRzlKWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI4K1J6d3ZkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NEtDUWtKUEdOdlpHbGpaVWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno1NGVIaDRlSGc4TDJOdlpHbGpaVWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno0S0NRazhMMmxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjBKbGJtVm1hV05wWVhKcGJ6NEtDUWs4WkdWdWIyMXBibUY2YVc5dVpVSmxibVZtYVdOcFlYSnBiejU0ZUhoNGVEd3ZaR1Z1YjIxcGJtRjZhVzl1WlVKbGJtVm1hV05wWVhKcGJ6NEtDVHd2Wlc1MFpVSmxibVZtYVdOcFlYSnBiejRLQ1R4a1lYUnBWbVZ5YzJGdFpXNTBiejRLQ1FrOFpHRjBZVVZ6WldOMWVtbHZibVZRWVdkaGJXVnVkRzgrTWpBeU5DMHdOQzB3T1R3dlpHRjBZVVZ6WldOMWVtbHZibVZRWVdkaGJXVnVkRzgrQ2drSlBHbHRjRzl5ZEc5VWIzUmhiR1ZFWVZabGNuTmhjbVUrTVRVeExqVTJQQzlwYlhCdmNuUnZWRzkwWVd4bFJHRldaWEp6WVhKbFBnb0pDVHgwYVhCdlZtVnljMkZ0Wlc1MGJ6NURVRHd2ZEdsd2IxWmxjbk5oYldWdWRHOCtDZ2tKUEdsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amIxWmxjbk5oYldWdWRHOCtNREl3TURBd01EQXdNREF3TmpBd01EQThMMmxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFabGNuTmhiV1Z1ZEc4K0Nna0pQR052WkdsalpVTnZiblJsYzNSdlVHRm5ZVzFsYm5SdlBqQXdNREF3TURBd01EQXdNREF3TURFd01Ed3ZZMjlrYVdObFEyOXVkR1Z6ZEc5UVlXZGhiV1Z1ZEc4K0Nna0pQR1pwY20xaFVtbGpaWFoxZEdFK01Ed3ZabWx5YldGU2FXTmxkblYwWVQ0S0NRazhaR0YwYVZOcGJtZHZiRzlXWlhKellXMWxiblJ2UGdvSkNRazhhVzF3YjNKMGIxTnBibWR2Ykc5V1pYSnpZVzFsYm5SdlBqY3dMalUyUEM5cGJYQnZjblJ2VTJsdVoyOXNiMVpsY25OaGJXVnVkRzgrQ2drSkNUeHBZbUZ1UVdOamNtVmthWFJ2UGtsVU1EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TVR3dmFXSmhia0ZqWTNKbFpHbDBiejRLQ1FrSlBHTmhkWE5oYkdWV1pYSnpZVzFsYm5SdlBuaDRlSGg0ZUhnOEwyTmhkWE5oYkdWV1pYSnpZVzFsYm5SdlBnb0pDUWs4WkdGMGFWTndaV05wWm1samFWSnBjMk52YzNOcGIyNWxQbmg0ZUhoNGVIZzhMMlJoZEdsVGNHVmphV1pwWTJsU2FYTmpiM056YVc5dVpUNEtDUWs4TDJSaGRHbFRhVzVuYjJ4dlZtVnljMkZ0Wlc1MGJ6NEtDUWs4WkdGMGFWTnBibWR2Ykc5V1pYSnpZVzFsYm5SdlBnb0pDUWs4YVcxd2IzSjBiMU5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQamd4TGpBd1BDOXBiWEJ2Y25SdlUybHVaMjlzYjFabGNuTmhiV1Z1ZEc4K0Nna0pDVHhwWW1GdVFXTmpjbVZrYVhSdlBrbFVNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01qd3ZhV0poYmtGalkzSmxaR2wwYno0S0NRa0pQR05oZFhOaGJHVldaWEp6WVcxbGJuUnZQbmg0ZUhoNGVIZzhMMk5oZFhOaGJHVldaWEp6WVcxbGJuUnZQZ29KQ1FrOFpHRjBhVk53WldOcFptbGphVkpwYzJOdmMzTnBiMjVsUG5oNGVIaDRlSGc4TDJSaGRHbFRjR1ZqYVdacFkybFNhWE5qYjNOemFXOXVaVDRLQ1FrOEwyUmhkR2xUYVc1bmIyeHZWbVZ5YzJGdFpXNTBiejRLQ1R3dlpHRjBhVlpsY25OaGJXVnVkRzgrQ2p3dlVsQlVQZz09PC9ycHQ+CgkJCQk8L2VsZW1lbnRvTGlzdGFDYXJyZWxsb1JQVD4KCQkJPC9saXN0YVJQVD4KCQk8L3BwdDpwc3BJbnZpYUNhcnJlbGxvUlBUPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4="
        ]);

        $this->instance_3 = new pspInviaCarrelloRPT(
            [
                "inserted_timestamp" =>  "2024-03-13 10:12:00.210",
                "tipoevento" =>  "pspInviaCarrelloRPT",
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
                "payload" => "PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpwYXlfaj0iaHR0cDovL3d3dy5jbmlwYS5nb3YuaXQvc2NoZW1hcy8yMDEwL1BhZ2FtZW50aS9BY2tfMV8wLyIgeG1sbnM6cHB0PSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnRucz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0IiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBwdDpwc3BJbnZpYUNhcnJlbGxvUlBUPgoJCQk8aWRlbnRpZmljYXRpdm9QU1A+UFNQX1JQVDwvaWRlbnRpZmljYXRpdm9QU1A+CgkJCTxpZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QU1A+ODg4ODg4ODg4ODg8L2lkZW50aWZpY2F0aXZvSW50ZXJtZWRpYXJpb1BTUD4KCQkJPGlkZW50aWZpY2F0aXZvQ2FuYWxlPjg4ODg4ODg4ODg4XzAxPC9pZGVudGlmaWNhdGl2b0NhbmFsZT4KCQkJPG1vZGVsbG9QYWdhbWVudG8+MTwvbW9kZWxsb1BhZ2FtZW50bz4KCQkJPGxpc3RhUlBUPgoJCQkJPGVsZW1lbnRvTGlzdGFDYXJyZWxsb1JQVD4KCQkJCQk8aWRlbnRpZmljYXRpdm9Eb21pbmlvPjc3Nzc3Nzc3Nzc3PC9pZGVudGlmaWNhdGl2b0RvbWluaW8+CgkJCQkJPGlkZW50aWZpY2F0aXZvVW5pdm9jb1ZlcnNhbWVudG8+MDIwMDAwMDAwMDAwNjAwMDI8L2lkZW50aWZpY2F0aXZvVW5pdm9jb1ZlcnNhbWVudG8+CgkJCQkJPGNvZGljZUNvbnRlc3RvUGFnYW1lbnRvPjAwMDAwMDAwMDAwMDAwMDEwMjwvY29kaWNlQ29udGVzdG9QYWdhbWVudG8+CgkJCQkJPHJwdD5QRkpRVkNCNGJXeHVjejBpYUhSMGNEb3ZMM2QzZHk1a2FXZHBkSEJoTG1kdmRpNXBkQzl6WTJobGJXRnpMekl3TVRFdlVHRm5ZVzFsYm5ScEx5SStDZ2s4ZG1WeWMybHZibVZQWjJkbGRIUnZQall1TWk0d1BDOTJaWEp6YVc5dVpVOW5aMlYwZEc4K0NnazhaRzl0YVc1cGJ6NEtDUWs4YVdSbGJuUnBabWxqWVhScGRtOUViMjFwYm1sdlBqYzNOemMzTnpjM056YzNQQzlwWkdWdWRHbG1hV05oZEdsMmIwUnZiV2x1YVc4K0Nna0pQR2xrWlc1MGFXWnBZMkYwYVhadlUzUmhlbWx2Ym1WU2FXTm9hV1ZrWlc1MFpUNDNOemMzTnpjM056YzNOMTh3TVR3dmFXUmxiblJwWm1sallYUnBkbTlUZEdGNmFXOXVaVkpwWTJocFpXUmxiblJsUGdvSlBDOWtiMjFwYm1sdlBnb0pQR2xrWlc1MGFXWnBZMkYwYVhadlRXVnpjMkZuWjJsdlVtbGphR2xsYzNSaFBtWXpaV016Tm1SaU56aGtZVFEwTkdaaFlqUmpaakJtT1RBNE9XSm1aRGt3UEM5cFpHVnVkR2xtYVdOaGRHbDJiMDFsYzNOaFoyZHBiMUpwWTJocFpYTjBZVDRLQ1R4a1lYUmhUM0poVFdWemMyRm5aMmx2VW1samFHbGxjM1JoUGpJd01qUXRNRFF0TURsVU1qRTZOVE02TXpZOEwyUmhkR0ZQY21GTlpYTnpZV2RuYVc5U2FXTm9hV1Z6ZEdFK0NnazhZWFYwWlc1MGFXTmhlbWx2Ym1WVGIyZG5aWFIwYno1NGVIZzhMMkYxZEdWdWRHbGpZWHBwYjI1bFUyOW5aMlYwZEc4K0NnazhjMjluWjJWMGRHOVFZV2RoZEc5eVpUNEtDUWs4YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlVHRm5ZWFJ2Y21VK0Nna0pDVHgwYVhCdlNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQbmc4TDNScGNHOUpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2drSkNUeGpiMlJwWTJWSlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtlSGg0ZUhoNGVEd3ZZMjlrYVdObFNXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZQZ29KQ1R3dmFXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZVR0ZuWVhSdmNtVStDZ2tKUEdGdVlXZHlZV1pwWTJGUVlXZGhkRzl5WlQ1NGVIaDRlRHd2WVc1aFozSmhabWxqWVZCaFoyRjBiM0psUGdvSkNUeHVZWHBwYjI1bFVHRm5ZWFJ2Y21VK1NWUThMMjVoZW1sdmJtVlFZV2RoZEc5eVpUNEtDUWs4WlMxdFlXbHNVR0ZuWVhSdmNtVStlSGg0ZUhoQWVIaDRlQzVqYjIwOEwyVXRiV0ZwYkZCaFoyRjBiM0psUGdvSlBDOXpiMmRuWlhSMGIxQmhaMkYwYjNKbFBnb0pQR1Z1ZEdWQ1pXNWxabWxqYVdGeWFXOCtDZ2tKUEdsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amIwSmxibVZtYVdOcFlYSnBiejRLQ1FrSlBIUnBjRzlKWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI4K1J6d3ZkR2x3YjBsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NEtDUWtKUEdOdlpHbGpaVWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno1NGVIaDRlSGc4TDJOdlpHbGpaVWxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno0S0NRazhMMmxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjBKbGJtVm1hV05wWVhKcGJ6NEtDUWs4WkdWdWIyMXBibUY2YVc5dVpVSmxibVZtYVdOcFlYSnBiejU0ZUhoNGVEd3ZaR1Z1YjIxcGJtRjZhVzl1WlVKbGJtVm1hV05wWVhKcGJ6NEtDVHd2Wlc1MFpVSmxibVZtYVdOcFlYSnBiejRLQ1R4a1lYUnBWbVZ5YzJGdFpXNTBiejRLQ1FrOFpHRjBZVVZ6WldOMWVtbHZibVZRWVdkaGJXVnVkRzgrTWpBeU5DMHdOQzB3T1R3dlpHRjBZVVZ6WldOMWVtbHZibVZRWVdkaGJXVnVkRzgrQ2drSlBHbHRjRzl5ZEc5VWIzUmhiR1ZFWVZabGNuTmhjbVUrTVRVeExqVTJQQzlwYlhCdmNuUnZWRzkwWVd4bFJHRldaWEp6WVhKbFBnb0pDVHgwYVhCdlZtVnljMkZ0Wlc1MGJ6NURVRHd2ZEdsd2IxWmxjbk5oYldWdWRHOCtDZ2tKUEdsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amIxWmxjbk5oYldWdWRHOCtNREl3TURBd01EQXdNREF3TmpBd01ESThMMmxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYjFabGNuTmhiV1Z1ZEc4K0Nna0pQR052WkdsalpVTnZiblJsYzNSdlVHRm5ZVzFsYm5SdlBqQXdNREF3TURBd01EQXdNREF3TURFd01qd3ZZMjlrYVdObFEyOXVkR1Z6ZEc5UVlXZGhiV1Z1ZEc4K0Nna0pQR1pwY20xaFVtbGpaWFoxZEdFK01Ed3ZabWx5YldGU2FXTmxkblYwWVQ0S0NRazhaR0YwYVZOcGJtZHZiRzlXWlhKellXMWxiblJ2UGdvSkNRazhhVzF3YjNKMGIxTnBibWR2Ykc5V1pYSnpZVzFsYm5SdlBqY3dMalUyUEM5cGJYQnZjblJ2VTJsdVoyOXNiMVpsY25OaGJXVnVkRzgrQ2drSkNUeHBZbUZ1UVdOamNtVmthWFJ2UGtsVU1EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TVR3dmFXSmhia0ZqWTNKbFpHbDBiejRLQ1FrSlBHTmhkWE5oYkdWV1pYSnpZVzFsYm5SdlBuaDRlSGg0ZUhnOEwyTmhkWE5oYkdWV1pYSnpZVzFsYm5SdlBnb0pDUWs4WkdGMGFWTndaV05wWm1samFWSnBjMk52YzNOcGIyNWxQbmg0ZUhoNGVIZzhMMlJoZEdsVGNHVmphV1pwWTJsU2FYTmpiM056YVc5dVpUNEtDUWs4TDJSaGRHbFRhVzVuYjJ4dlZtVnljMkZ0Wlc1MGJ6NEtDUWs4WkdGMGFWTnBibWR2Ykc5V1pYSnpZVzFsYm5SdlBnb0pDUWs4YVcxd2IzSjBiMU5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQamd4TGpBd1BDOXBiWEJ2Y25SdlUybHVaMjlzYjFabGNuTmhiV1Z1ZEc4K0Nna0pDVHhwWW1GdVFXTmpjbVZrYVhSdlBrbFVNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01qd3ZhV0poYmtGalkzSmxaR2wwYno0S0NRa0pQR05oZFhOaGJHVldaWEp6WVcxbGJuUnZQbmg0ZUhoNGVIZzhMMk5oZFhOaGJHVldaWEp6WVcxbGJuUnZQZ29KQ1FrOFpHRjBhVk53WldOcFptbGphVkpwYzJOdmMzTnBiMjVsUG5oNGVIaDRlSGc4TDJSaGRHbFRjR1ZqYVdacFkybFNhWE5qYjNOemFXOXVaVDRLQ1FrOEwyUmhkR2xUYVc1bmIyeHZWbVZ5YzJGdFpXNTBiejRLQ1R3dlpHRjBhVlpsY25OaGJXVnVkRzgrQ2p3dlVsQlVQZz09PC9ycHQ+CgkJCQk8L2VsZW1lbnRvTGlzdGFDYXJyZWxsb1JQVD4KCQkJCTxlbGVtZW50b0xpc3RhQ2FycmVsbG9SUFQ+CgkJCQkJPGlkZW50aWZpY2F0aXZvRG9taW5pbz43Nzc3Nzc3Nzc3ODwvaWRlbnRpZmljYXRpdm9Eb21pbmlvPgoJCQkJCTxpZGVudGlmaWNhdGl2b1VuaXZvY29WZXJzYW1lbnRvPjAyMDAwMDAwMDAwMDYwMDAzPC9pZGVudGlmaWNhdGl2b1VuaXZvY29WZXJzYW1lbnRvPgoJCQkJCTxjb2RpY2VDb250ZXN0b1BhZ2FtZW50bz4wMDAwMDAwMDAwMDAwMDAxMDI8L2NvZGljZUNvbnRlc3RvUGFnYW1lbnRvPgoJCQkJCTxycHQ+UEZKUVZDQjRiV3h1Y3owaWFIUjBjRG92TDNkM2R5NWthV2RwZEhCaExtZHZkaTVwZEM5elkyaGxiV0Z6THpJd01URXZVR0ZuWVcxbGJuUnBMeUkrQ2drOGRtVnljMmx2Ym1WUFoyZGxkSFJ2UGpZdU1pNHdQQzkyWlhKemFXOXVaVTluWjJWMGRHOCtDZ2s4Wkc5dGFXNXBiejRLQ1FrOGFXUmxiblJwWm1sallYUnBkbTlFYjIxcGJtbHZQamMzTnpjM056YzNOemMzUEM5cFpHVnVkR2xtYVdOaGRHbDJiMFJ2YldsdWFXOCtDZ2tKUEdsa1pXNTBhV1pwWTJGMGFYWnZVM1JoZW1sdmJtVlNhV05vYVdWa1pXNTBaVDQzTnpjM056YzNOemMzTjE4d01Ud3ZhV1JsYm5ScFptbGpZWFJwZG05VGRHRjZhVzl1WlZKcFkyaHBaV1JsYm5SbFBnb0pQQzlrYjIxcGJtbHZQZ29KUEdsa1pXNTBhV1pwWTJGMGFYWnZUV1Z6YzJGbloybHZVbWxqYUdsbGMzUmhQbVl6WldNek5tUmlOemhrWVRRME5HWmhZalJqWmpCbU9UQTRPV0ptWkRrd1BDOXBaR1Z1ZEdsbWFXTmhkR2wyYjAxbGMzTmhaMmRwYjFKcFkyaHBaWE4wWVQ0S0NUeGtZWFJoVDNKaFRXVnpjMkZuWjJsdlVtbGphR2xsYzNSaFBqSXdNalF0TURRdE1EbFVNakU2TlRNNk16WThMMlJoZEdGUGNtRk5aWE56WVdkbmFXOVNhV05vYVdWemRHRStDZ2s4WVhWMFpXNTBhV05oZW1sdmJtVlRiMmRuWlhSMGJ6NTRlSGc4TDJGMWRHVnVkR2xqWVhwcGIyNWxVMjluWjJWMGRHOCtDZ2s4YzI5bloyVjBkRzlRWVdkaGRHOXlaVDRLQ1FrOGFXUmxiblJwWm1sallYUnBkbTlWYm1sMmIyTnZVR0ZuWVhSdmNtVStDZ2tKQ1R4MGFYQnZTV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52UG5nOEwzUnBjRzlKWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI4K0Nna0pDVHhqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrZUhoNGVIaDRlRHd2WTI5a2FXTmxTV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52UGdvSkNUd3ZhV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52VUdGbllYUnZjbVUrQ2drSlBHRnVZV2R5WVdacFkyRlFZV2RoZEc5eVpUNTRlSGg0ZUR3dllXNWhaM0poWm1sallWQmhaMkYwYjNKbFBnb0pDVHh1WVhwcGIyNWxVR0ZuWVhSdmNtVStTVlE4TDI1aGVtbHZibVZRWVdkaGRHOXlaVDRLQ1FrOFpTMXRZV2xzVUdGbllYUnZjbVUrZUhoNGVIaEFlSGg0ZUM1amIyMDhMMlV0YldGcGJGQmhaMkYwYjNKbFBnb0pQQzl6YjJkblpYUjBiMUJoWjJGMGIzSmxQZ29KUEdWdWRHVkNaVzVsWm1samFXRnlhVzgrQ2drSlBHbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiMEpsYm1WbWFXTnBZWEpwYno0S0NRa0pQSFJwY0c5SlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtSend2ZEdsd2IwbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiejRLQ1FrSlBHTnZaR2xqWlVsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NTRlSGg0ZUhnOEwyTnZaR2xqWlVsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amJ6NEtDUWs4TDJsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amIwSmxibVZtYVdOcFlYSnBiejRLQ1FrOFpHVnViMjFwYm1GNmFXOXVaVUpsYm1WbWFXTnBZWEpwYno1NGVIaDRlRHd2WkdWdWIyMXBibUY2YVc5dVpVSmxibVZtYVdOcFlYSnBiejRLQ1R3dlpXNTBaVUpsYm1WbWFXTnBZWEpwYno0S0NUeGtZWFJwVm1WeWMyRnRaVzUwYno0S0NRazhaR0YwWVVWelpXTjFlbWx2Ym1WUVlXZGhiV1Z1ZEc4K01qQXlOQzB3TkMwd09Ud3ZaR0YwWVVWelpXTjFlbWx2Ym1WUVlXZGhiV1Z1ZEc4K0Nna0pQR2x0Y0c5eWRHOVViM1JoYkdWRVlWWmxjbk5oY21VK01UWXhMalUyUEM5cGJYQnZjblJ2Vkc5MFlXeGxSR0ZXWlhKellYSmxQZ29KQ1R4MGFYQnZWbVZ5YzJGdFpXNTBiejVEVUR3dmRHbHdiMVpsY25OaGJXVnVkRzgrQ2drSlBHbGtaVzUwYVdacFkyRjBhWFp2Vlc1cGRtOWpiMVpsY25OaGJXVnVkRzgrTURJd01EQXdNREF3TURBd05qQXdNRE04TDJsa1pXNTBhV1pwWTJGMGFYWnZWVzVwZG05amIxWmxjbk5oYldWdWRHOCtDZ2tKUEdOdlpHbGpaVU52Ym5SbGMzUnZVR0ZuWVcxbGJuUnZQakF3TURBd01EQXdNREF3TURBd01ERXdNand2WTI5a2FXTmxRMjl1ZEdWemRHOVFZV2RoYldWdWRHOCtDZ2tKUEdacGNtMWhVbWxqWlhaMWRHRStNRHd2Wm1seWJXRlNhV05sZG5WMFlUNEtDUWs4WkdGMGFWTnBibWR2Ykc5V1pYSnpZVzFsYm5SdlBnb0pDUWs4YVcxd2IzSjBiMU5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQamN3TGpVMlBDOXBiWEJ2Y25SdlUybHVaMjlzYjFabGNuTmhiV1Z1ZEc4K0Nna0pDVHhwWW1GdVFXTmpjbVZrYVhSdlBrbFVNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01Ud3ZhV0poYmtGalkzSmxaR2wwYno0S0NRa0pQR05oZFhOaGJHVldaWEp6WVcxbGJuUnZQbmg0ZUhoNGVIZzhMMk5oZFhOaGJHVldaWEp6WVcxbGJuUnZQZ29KQ1FrOFpHRjBhVk53WldOcFptbGphVkpwYzJOdmMzTnBiMjVsUG5oNGVIaDRlSGc4TDJSaGRHbFRjR1ZqYVdacFkybFNhWE5qYjNOemFXOXVaVDRLQ1FrOEwyUmhkR2xUYVc1bmIyeHZWbVZ5YzJGdFpXNTBiejRLQ1FrOFpHRjBhVk5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29KQ1FrOGFXMXdiM0owYjFOcGJtZHZiRzlXWlhKellXMWxiblJ2UGpreExqQXdQQzlwYlhCdmNuUnZVMmx1WjI5c2IxWmxjbk5oYldWdWRHOCtDZ2tKQ1R4cFltRnVRV05qY21Wa2FYUnZQa2xVTURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNand2YVdKaGJrRmpZM0psWkdsMGJ6NEtDUWtKUEdOaGRYTmhiR1ZXWlhKellXMWxiblJ2UG5oNGVIaDRlSGc4TDJOaGRYTmhiR1ZXWlhKellXMWxiblJ2UGdvSkNRazhaR0YwYVZOd1pXTnBabWxqYVZKcGMyTnZjM05wYjI1bFBuaDRlSGg0ZUhnOEwyUmhkR2xUY0dWamFXWnBZMmxTYVhOamIzTnphVzl1WlQ0S0NRazhMMlJoZEdsVGFXNW5iMnh2Vm1WeWMyRnRaVzUwYno0S0NUd3ZaR0YwYVZabGNuTmhiV1Z1ZEc4K0Nqd3ZVbEJVUGc9PTwvcnB0PgoJCQkJPC9lbGVtZW50b0xpc3RhQ2FycmVsbG9SUFQ+CgkJCTwvbGlzdGFSUFQ+CgkJPC9wcHQ6cHNwSW52aWFDYXJyZWxsb1JQVD4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+"
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
        $this->assertInstanceOf(\pagopa\crawler\methods\req\pspInviaCarrelloRPT::class, $this->instance_1->getMethodInterface());
        $this->assertInstanceOf(\pagopa\crawler\methods\req\pspInviaCarrelloRPT::class, $this->instance_2->getMethodInterface());
        $this->assertInstanceOf(\pagopa\crawler\methods\req\pspInviaCarrelloRPT::class, $this->instance_3->getMethodInterface());
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

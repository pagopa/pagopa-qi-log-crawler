<?php

namespace pagopa\methods\req;

use pagopa\crawler\methods\req\nodoInviaRPT;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

#[TestDox('methods\req\nodoInviaRPT::class')]
class nodoInviaRPTTest extends TestCase
{

    protected nodoInviaRPT $instance;

    public function setUp(): void
    {
        $this->instance = new nodoInviaRPT(base64_decode('PHNvYXA6RW52ZWxvcGUgeG1sbnM6c29hcD0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPgoJPHNvYXA6SGVhZGVyPgoJCTxuczQ6aW50ZXN0YXppb25lUFBUIFNPQVAtRU5WOmFjdG9yPSJodHRwOi8vcGRkNGoub3JnL3BvcnRhZG9taW5pbyIgU09BUC1FTlY6bXVzdFVuZGVyc3RhbmQ9IjEiIHhtbG5zPSIiIHhtbG5zOlNPQVAtRU5WPSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyIgeG1sbnM6bnMzPSJodHRwOi8vd3d3LmRpZ2l0cGEuZ292Lml0L3NjaGVtYXMvMjAxMS9QYWdhbWVudGkvIiB4bWxuczpuczQ9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvcHB0aGVhZCIgeG1sbnM6bnM1PSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyI+CgkJCTxpZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QQT43Nzc3Nzc3Nzc3NzwvaWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUEE+CgkJCTxpZGVudGlmaWNhdGl2b1N0YXppb25lSW50ZXJtZWRpYXJpb1BBPjc3Nzc3Nzc3Nzc3XzAxPC9pZGVudGlmaWNhdGl2b1N0YXppb25lSW50ZXJtZWRpYXJpb1BBPgoJCQk8aWRlbnRpZmljYXRpdm9Eb21pbmlvPjc3Nzc3Nzc3Nzc3PC9pZGVudGlmaWNhdGl2b0RvbWluaW8+CgkJCTxpZGVudGlmaWNhdGl2b1VuaXZvY29WZXJzYW1lbnRvPjAxMDAwMDAwMDAwMDAwMDAxPC9pZGVudGlmaWNhdGl2b1VuaXZvY29WZXJzYW1lbnRvPgoJCQk8Y29kaWNlQ29udGVzdG9QYWdhbWVudG8+YzAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDE8L2NvZGljZUNvbnRlc3RvUGFnYW1lbnRvPgoJCTwvbnM0OmludGVzdGF6aW9uZVBQVD4KCTwvc29hcDpIZWFkZXI+Cgk8c29hcDpCb2R5PgoJCTxuczU6bm9kb0ludmlhUlBUIHhtbG5zPSIiIHhtbG5zOm5zMz0iaHR0cDovL3d3dy5kaWdpdHBhLmdvdi5pdC9zY2hlbWFzLzIwMTEvUGFnYW1lbnRpLyIgeG1sbnM6bnM0PSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOm5zNT0iaHR0cDovL3dzLnBhZ2FtZW50aS50ZWxlbWF0aWNpLmdvdi8iPgoJCQk8cGFzc3dvcmQ+UExBQ0VIT0xERVI8L3Bhc3N3b3JkPgoJCQk8aWRlbnRpZmljYXRpdm9QU1A+MTUzNzYzNzEwMDk8L2lkZW50aWZpY2F0aXZvUFNQPgoJCQk8aWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUFNQPjE1Mzc2MzcxMDA5PC9pZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QU1A+CgkJCTxpZGVudGlmaWNhdGl2b0NhbmFsZT4xNTM3NjM3MTAwOV8wMTwvaWRlbnRpZmljYXRpdm9DYW5hbGU+CgkJCTx0aXBvRmlybWEvPgoJCQk8cnB0PlBEOTRiV3dnZG1WeWMybHZiajBpTVM0d0lpQmxibU52WkdsdVp6MGlWVlJHTFRnaUlITjBZVzVrWVd4dmJtVTlJbmxsY3lJL1BnbzhVbEJVSUhodGJHNXpQU0pvZEhSd09pOHZkM2QzTG1ScFoybDBjR0V1WjI5MkxtbDBMM05qYUdWdFlYTXZNakF4TVM5UVlXZGhiV1Z1ZEdrdklqNEtJQ0FnSUR4MlpYSnphVzl1WlU5bloyVjBkRzgrTmk0eVBDOTJaWEp6YVc5dVpVOW5aMlYwZEc4K0NpQWdJQ0E4Wkc5dGFXNXBiejRLSUNBZ0lDQWdJQ0E4YVdSbGJuUnBabWxqWVhScGRtOUViMjFwYm1sdlBqYzNOemMzTnpjM056YzNQQzlwWkdWdWRHbG1hV05oZEdsMmIwUnZiV2x1YVc4K0NpQWdJQ0E4TDJSdmJXbHVhVzgrQ2lBZ0lDQThhV1JsYm5ScFptbGpZWFJwZG05TlpYTnpZV2RuYVc5U2FXTm9hV1Z6ZEdFK2VIaDRlSGg0UEM5cFpHVnVkR2xtYVdOaGRHbDJiMDFsYzNOaFoyZHBiMUpwWTJocFpYTjBZVDRLSUNBZ0lEeGtZWFJoVDNKaFRXVnpjMkZuWjJsdlVtbGphR2xsYzNSaFBqSXdNalF0TURRdE1UQlVNakU2TVRRNk16ZzhMMlJoZEdGUGNtRk5aWE56WVdkbmFXOVNhV05vYVdWemRHRStDaUFnSUNBOFlYVjBaVzUwYVdOaGVtbHZibVZUYjJkblpYUjBiejVPTDBFOEwyRjFkR1Z1ZEdsallYcHBiMjVsVTI5bloyVjBkRzgrQ2lBZ0lDQThjMjluWjJWMGRHOVFZV2RoZEc5eVpUNEtJQ0FnSUNBZ0lDQThhV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52VUdGbllYUnZjbVUrQ2lBZ0lDQWdJQ0FnSUNBZ0lEeDBhWEJ2U1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBrWThMM1JwY0c5SlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtDaUFnSUNBZ0lDQWdJQ0FnSUR4amIyUnBZMlZKWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI4K2VIaDRQQzlqYjJScFkyVkpaR1Z1ZEdsbWFXTmhkR2wyYjFWdWFYWnZZMjgrQ2lBZ0lDQWdJQ0FnUEM5cFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOVFZV2RoZEc5eVpUNEtJQ0FnSUNBZ0lDQThZVzVoWjNKaFptbGpZVkJoWjJGMGIzSmxQbmg0ZUhoNFBDOWhibUZuY21GbWFXTmhVR0ZuWVhSdmNtVStDaUFnSUNBOEwzTnZaMmRsZEhSdlVHRm5ZWFJ2Y21VK0NpQWdJQ0E4Wlc1MFpVSmxibVZtYVdOcFlYSnBiejRLSUNBZ0lDQWdJQ0E4YVdSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlFtVnVaV1pwWTJsaGNtbHZQZ29nSUNBZ0lDQWdJQ0FnSUNBOGRHbHdiMGxrWlc1MGFXWnBZMkYwYVhadlZXNXBkbTlqYno1SFBDOTBhWEJ2U1dSbGJuUnBabWxqWVhScGRtOVZibWwyYjJOdlBnb2dJQ0FnSUNBZ0lDQWdJQ0E4WTI5a2FXTmxTV1JsYm5ScFptbGpZWFJwZG05VmJtbDJiMk52UGpjM056YzNOemMzTnpjM1BDOWpiMlJwWTJWSlpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOCtDaUFnSUNBZ0lDQWdQQzlwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5Q1pXNWxabWxqYVdGeWFXOCtDaUFnSUNBZ0lDQWdQR1JsYm05dGFXNWhlbWx2Ym1WQ1pXNWxabWxqYVdGeWFXOCtlSGg0ZUhoNFBDOWtaVzV2YldsdVlYcHBiMjVsUW1WdVpXWnBZMmxoY21sdlBnb2dJQ0FnUEM5bGJuUmxRbVZ1WldacFkybGhjbWx2UGdvZ0lDQWdQR1JoZEdsV1pYSnpZVzFsYm5SdlBnb2dJQ0FnSUNBZ0lEeGtZWFJoUlhObFkzVjZhVzl1WlZCaFoyRnRaVzUwYno0eU1ESTBMVEEwTFRFd1BDOWtZWFJoUlhObFkzVjZhVzl1WlZCaFoyRnRaVzUwYno0S0lDQWdJQ0FnSUNBOGFXMXdiM0owYjFSdmRHRnNaVVJoVm1WeWMyRnlaVDQwTlM0MU1Ed3ZhVzF3YjNKMGIxUnZkR0ZzWlVSaFZtVnljMkZ5WlQ0S0lDQWdJQ0FnSUNBOGRHbHdiMVpsY25OaGJXVnVkRzgrVUU4OEwzUnBjRzlXWlhKellXMWxiblJ2UGdvZ0lDQWdJQ0FnSUR4cFpHVnVkR2xtYVdOaGRHbDJiMVZ1YVhadlkyOVdaWEp6WVcxbGJuUnZQakF4TURBd01EQXdNREF3TURBd01EQXhQQzlwWkdWdWRHbG1hV05oZEdsMmIxVnVhWFp2WTI5V1pYSnpZVzFsYm5SdlBnb2dJQ0FnSUNBZ0lEeGpiMlJwWTJWRGIyNTBaWE4wYjFCaFoyRnRaVzUwYno1ak1EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNVHd2WTI5a2FXTmxRMjl1ZEdWemRHOVFZV2RoYldWdWRHOCtDaUFnSUNBZ0lDQWdQR1pwY20xaFVtbGpaWFoxZEdFK01Ed3ZabWx5YldGU2FXTmxkblYwWVQ0S0lDQWdJQ0FnSUNBOFpHRjBhVk5wYm1kdmJHOVdaWEp6WVcxbGJuUnZQZ29nSUNBZ0lDQWdJQ0FnSUNBOGFXMXdiM0owYjFOcGJtZHZiRzlXWlhKellXMWxiblJ2UGpRMUxqVXdQQzlwYlhCdmNuUnZVMmx1WjI5c2IxWmxjbk5oYldWdWRHOCtDaUFnSUNBZ0lDQWdJQ0FnSUR4cFltRnVRV05qY21Wa2FYUnZQa2xVTURBd01EQXdNREF3TURBd01EQXdNREF3TURBd01EQXdNVHd2YVdKaGJrRmpZM0psWkdsMGJ6NEtJQ0FnSUNBZ0lDQWdJQ0FnUEdOaGRYTmhiR1ZXWlhKellXMWxiblJ2UG5oNGVIaDRlRHd2WTJGMWMyRnNaVlpsY25OaGJXVnVkRzgrQ2lBZ0lDQWdJQ0FnSUNBZ0lEeGtZWFJwVTNCbFkybG1hV05wVW1selkyOXpjMmx2Ym1VK2VIaDRlSGg0UEM5a1lYUnBVM0JsWTJsbWFXTnBVbWx6WTI5emMybHZibVUrQ2lBZ0lDQWdJQ0FnUEM5a1lYUnBVMmx1WjI5c2IxWmxjbk5oYldWdWRHOCtDaUFnSUNBOEwyUmhkR2xXWlhKellXMWxiblJ2UGdvOEwxSlFWRDRLPC9ycHQ+CgkJPC9uczU6bm9kb0ludmlhUlBUPgoJPC9zb2FwOkJvZHk+Cjwvc29hcDpFbnZlbG9wZT4='));
    }

    #[TestDox('getBrokerPsp()')]
    public function testGetBrokerPsp()
    {
        $this->assertEquals('15376371009', $this->instance->getBrokerPsp());
    }

    #[TestDox('getTransferId()')]
    public function testGetTransferId()
    {
        $this->assertNull($this->instance->getTransferId());
    }

    #[TestDox('getStazione()')]
    public function testGetStazione()
    {
        $this->assertEquals('77777777777_01', $this->instance->getStazione());
    }

    #[TestDox('getImportoTotale()')]
    public function testGetImportoTotale()
    {
        $this->assertEquals('45.50', $this->instance->getImportoTotale());
    }

    #[TestDox('getPaymentMetaDataCount()')]
    public function testGetPaymentMetaDataCount()
    {
        $this->assertNull($this->instance->getPaymentMetaDataCount());
    }

    #[TestDox('getImporto()')]
    public function testGetImporto()
    {
        $this->assertEquals('45.50', $this->instance->getImporto());
    }

    #[TestDox('getTransferAmount()')]
    public function testGetTransferAmount()
    {
        $this->assertEquals('45.50', $this->instance->getTransferAmount(0));
        $this->assertNull($this->instance->getTransferAmount(1));
    }

    #[TestDox('getAllTokens()')]
    public function testGetAllTokens()
    {
        $this->assertEquals(['c0000000000000000000000000000001'], $this->instance->getAllTokens());
    }

    #[TestDox('isBollo()')]
    public function testIsBollo()
    {
        $this->assertFalse($this->instance->isBollo(0));
        $this->assertFalse($this->instance->isBollo(1));
    }

    #[TestDox('outcome()')]
    public function testOutcome()
    {
        $this->assertNull($this->instance->outcome());

    }

    #[TestDox('getNoticeNumber()')]
    public function testGetNoticeNumber()
    {
        $this->assertNull($this->instance->getNoticeNumber());

    }

    #[TestDox('getTransferMetaDataKey()')]
    public function testGetTransferMetaDataKey()
    {
        $this->assertNull($this->instance->getTransferMetaDataKey());

    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertEquals(1, $this->instance->getTransferCount());
    }

    #[TestDox('getAllNoticesNumbers()')]
    public function testGetAllNoticesNumbers()
    {
        $this->assertNull($this->instance->getAllNoticesNumbers());

    }

    #[TestDox('getCanale()')]
    public function testGetCanale()
    {
        $this->assertEquals('15376371009_01', $this->instance->getCanale());

    }

    #[TestDox('getTransferMetaDataValue()')]
    public function testGetTransferMetaDataValue()
    {
        $this->assertNull($this->instance->getTransferMetaDataValue());
    }

    #[TestDox('getPaymentMetaDataKey()')]
    public function testGetPaymentMetaDataKey()
    {
        $this->assertNull($this->instance->getPaymentMetaDataKey());
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $this->assertEquals(['01000000000000001'], $this->instance->getIuvs());
    }

    #[TestDox('getBrokerPa()')]
    public function testGetBrokerPa()
    {
        $this->assertEquals('77777777777', $this->instance->getBrokerPa());

    }

    #[TestDox('getToken()')]
    public function testGetToken()
    {
        $this->assertEquals('c0000000000000000000000000000001', $this->instance->getToken());
    }

    #[TestDox('getTransferPa()')]
    public function testGetTransferPa()
    {
        $this->assertEquals('77777777777', $this->instance->getTransferPa(0));
        $this->assertNull($this->instance->getTransferPa(1));
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->instance->getPaymentsCount());

    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $this->assertEquals(['77777777777'], $this->instance->getPaEmittenti());
    }

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $this->assertEquals('77777777777', $this->instance->getPaEmittente());
    }

    #[TestDox('getPsp()')]
    public function testGetPsp()
    {
        $this->assertEquals('15376371009', $this->instance->getPsp());
    }

    #[TestDox('getTransferIban()')]
    public function testGetTransferIban()
    {
        $this->assertEquals('IT0000000000000000000000001', $this->instance->getTransferIban(0));
        $this->assertNull($this->instance->getTransferIban(1));
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $this->assertEquals(['c0000000000000000000000000000001'], $this->instance->getCcps());
    }

    #[TestDox('getCcp()')]
    public function testGetCcp()
    {
        $this->assertEquals('c0000000000000000000000000000001', $this->instance->getCcp());
    }

    #[TestDox('getPaymentMetaDataValue()')]
    public function testGetPaymentMetaDataValue()
    {
        $this->assertNull($this->instance->getPaymentMetaDataValue());
    }

    #[TestDox('getPaymentMetaDataCount()')]
    public function testGetTransferMetaDataCount()
    {
        $this->assertNull($this->instance->getPaymentMetaDataCount());
    }

    #[TestDox('getIuv()')]
    public function testGetIuv()
    {
        $this->assertEquals('01000000000000001', $this->instance->getIuv());
    }
}

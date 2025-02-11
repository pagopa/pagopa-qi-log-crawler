<?php

namespace payload;

use pagopa\sert\payload\ResponseJson;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

#[TestDox('pagopa\sert\payload\ResponseJson::class')]
#[CoversClass(ResponseJson::class)]
class ResponseJsonTest extends TestCase
{

    protected ResponseJson $payload;


    protected function setUp(): void
    {
        $data = [
            'faultCode' => 'PPT_TOKEN_SCADUTO',
            'description' => 'Token scaduto'
        ];
        $this->payload = new ResponseJson(getPayloadJson('closePaymentV2', 'fault', $data));
    }

    #[TestDox('getFaultCode()')]
    public function testGetFaultCode()
    {
        $this->assertNull($this->payload->getFaultCode());
    }

    #[TestDox('getFaultString()')]
    public function testGetFaultString()
    {
        $this->assertNull($this->payload->getFaultString());
    }
}

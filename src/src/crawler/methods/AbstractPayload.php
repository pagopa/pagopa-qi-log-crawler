<?php

namespace pagopa\crawler\methods;

use pagopa\crawler\methods\MethodInterface;

abstract class AbstractPayload implements MethodInterface
{

    const XML_PAYLOAD = 'xml';
    const JSON_PAYLOAD = 'json';

    protected string $typePayload = self::XML_PAYLOAD;


    public static function getClass(string $payload, string $type_payload = self::XML_PAYLOAD) : AbstractPayload
    {
        return new static($payload, $type_payload);
    }

}
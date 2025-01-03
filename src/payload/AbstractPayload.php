<?php

namespace pagopa\sert\payload;

abstract class AbstractPayload implements Payload
{

    /**
     *
     */
    const XML_PAYLOAD = 'xml';

    /**
     *
     */
    const JSON_PAYLOAD = 'json';

    /**
     * @var string
     */
    protected string $typePayload = self::XML_PAYLOAD;


    /**
     * @param string $payload
     * @param string $type_payload
     * @return AbstractPayload
     */
    public static function getClass(string $payload, string $type_payload = self::XML_PAYLOAD) : AbstractPayload
    {
        return new static($payload, $type_payload);
    }

}
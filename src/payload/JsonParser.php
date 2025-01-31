<?php

namespace pagopa\sert\payload;

use pagopa\sert\payload\ParserInterface;

class JsonParser implements ParserInterface
{

    protected mixed $json;

    public function __construct(string $json_content)
    {
        $this->json = json_decode($json_content);
    }

    public function isValid(): bool
    {
        return (json_last_error() === JSON_ERROR_NONE);
    }

    public function jsonPath(string $path) : mixed
    {
        $payload = $this->json;
        $prop_arr = explode('.',$path);
        foreach($prop_arr as $p)
        {
            if (isset($payload->{$p}))
            {
                $payload = $payload->{$p};
            }
            else
            {
                return null;
            }
        }
        return $payload;
    }
    /**
     * Fornisci il json path. Restituisce null se non trova o se c'è un oggetto a quel path
     * @param string $xpath
     * @return string|null
     */
    public function getElement(string $xpath): string|null
    {
        $return = $this->jsonPath($xpath);
        if (is_array($return))
        {
            if (count($return) === 0)
            {
                return null;
            }
            return $return[0];
        }
        if (is_object($return))
        {
            return null;
        }
        return (empty($return)) ? null : $return;
    }

    public function getElementsCount(string $xpath): int
    {
        return (is_null($this->getElement($xpath))) ? 0 : 1;
    }
}
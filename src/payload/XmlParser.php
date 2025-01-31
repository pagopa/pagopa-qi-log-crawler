<?php

namespace pagopa\sert\payload;

use pagopa\sert\payload\ParserInterface;
use SimpleXMLElement;
use Exception;

class XmlParser implements ParserInterface
{

    protected string $xml;

    protected bool $isValid = true;

    public function __construct(string $xml_content)
    {
        try {
            libxml_use_internal_errors(true);
            $xml = new SimpleXMLElement($xml_content);
            $namespaces = $xml->getDocNamespaces(true);
            $namespaces = array_filter(array_keys($namespaces), function($k){return !empty($k);});
            $namespaces = array_map(function($ns){return "$ns:";}, $namespaces);
            $ns_clean_xml = str_replace("xmlns=", "ns=", $xml_content);
            $ns_clean_xml = str_replace($namespaces, array_fill(0, count($namespaces), ''), $ns_clean_xml);
            $this->xml = $ns_clean_xml;
        }
        catch (\Exception $e)
        {
            $this->isValid = false;
        }
    }


    public function isValid(): bool
    {
        return $this->isValid;
    }

    /**
     * Gli devi dare l'xpath corretto. Se ci sono più elementi, ti da il primo
     * @param string $xpath
     * @return string|null
     * @throws Exception
     */
    public function getElement(string $xpath): string|null
    {
        if ($xpath == '')
        {
            return null;
        }
        $xml = new SimpleXMLElement($this->xml);
        $query = $xml->xpath($xpath);

        if ((is_null($query)) || ($query === false) || (count($query) === 0))
        {
            return null;
        }
        return $query[0];
    }

    public function getElementsCount(string $xpath): int
    {
        if ($xpath == '')
        {
            return 0;
        }
        $xml = new SimpleXMLElement($this->xml);
        $query = $xml->xpath($xpath);
        return count($query);
    }
}
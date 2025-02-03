<?php

namespace pagopa\sert\payload;

use SimpleXMLElement;
use Exception;

/**
 * <p>Semplice classe che gestisce la ricerca di un elemento XML dato un <b>xPath</b> o restituisce il numero di elementi presenti in un XML
 * dato un <b>xPath</b></p>
 * <p>Effettua un check sulla sintassi dell'XML senza considerare namespace e contenuto dei tag xml</p>
 *
 * @see ParserInterface
 */
class XmlParser implements ParserInterface
{

    /**
     * Contiene il payload dell'evento senza i namespace
     * @var string
     */
    protected string $xml;

    /**
     * Contiene true/false in base alla validità del payload (solo check su sintassi XML, non su correttezza primitive)
     * @var bool
     */
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


    /**
     * Restituisce true/false se il payload dell'evento è o meno valido
     * @return bool
     */
    public function isValid(): bool
    {
        return $this->isValid;
    }

    /**
     * Restituisce l'elemento raggiunto da $xpath. Se $xpath è vuoto, restituisce null
     * Se ad $xpath non corrisponde nulla, restituisce null
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

    /**
     * Restituisce il numero di elementi trovati da $xpath. Se $xpath è vuoto, restituisce null
     * Se non trova elementi, restituisce 0
     * @param string $xpath
     * @return int
     * @throws Exception
     */
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
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
     * <p>Contiene il payload dell'evento senza i namespace</p>
     * @var string
     */
    protected string $xml;

    /**
     * <p>Contiene true/false in base alla validità del payload (solo check su sintassi XML, non su correttezza primitive)</p>
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
     * <p>Restituisce true/false se il payload dell'evento è o meno valido</p>
     * @return bool
     */
    public function isValid(): bool
    {
        return $this->isValid;
    }

    /**
     * <p>Restituisce l'elemento raggiunto da <code>\$xpath</code>. Se <code>\$xpath</code> è vuoto, restituisce <code>null</code></p>
     * <p>Se ad <code>\$xpath</code> non corrisponde nulla, restituisce <code>null</code></p>
     * @param string $xpath
     * @return string|null
     */
    public function getElement(string $xpath): string|null
    {
        if ($xpath == '')
        {
            return null;
        }
        try {
            $xml = new SimpleXMLElement($this->xml);
            $query = $xml->xpath($xpath);

            if ((is_null($query)) || ($query === false) || (count($query) === 0))
            {
                return null;
            }
            return $query[0];
        }
        catch (\Exception)
        {
            return null;
        }
    }

    /**
     * <p>Restituisce il numero di elementi trovati da <code>\$xpath</code>. Se <code>\$xpath</code> è vuoto, restituisce <code>null</code></p>
     * <p>Se non trova elementi, restituisce <b>0</b></p>
     * @param string $xpath
     * @return int
     */
    public function getElementsCount(string $xpath): int
    {
        if ($xpath == '')
        {
            return 0;
        }
        try {
            $xml = new SimpleXMLElement($this->xml);
            $query = $xml->xpath($xpath);
            return count($query);
        }
        catch (\Exception)
        {
            return 0;
        }
    }
}
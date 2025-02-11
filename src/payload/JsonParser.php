<?php

namespace pagopa\sert\payload;

/**
 * <p>Semplice classe che gestisce la ricerca di un elemento JSON dato un <b>xPath</b> o restituisce il numero di elementi presenti in un array JSON (non negli object JSON)
 * dato un <b>xPath</b></p>
 * <p>Effettua un check sulla sintassi del JSON senza considerare la validità dello schema</p>
 *
 * @see ParserInterface
 */

class JsonParser implements ParserInterface
{

    /**
     * Contiene il json rappresentato in formato PHP (array & object)
     * @var string
     */
    protected mixed $json;

    /**
     * Contiene true/false in base alla validità del payload (solo check su sintassi JSON)
     * @var bool
     */
    protected bool $isValid = true;

    public function __construct(string $json_content)
    {
        $this->json = json_decode($json_content, false);
        $this->isValid = (json_last_error() === JSON_ERROR_NONE);
    }

    /**
     * <p>Restituisce true/false se il payload dell'evento è un json valido</p>
     * @return bool
     */
    public function isValid(): bool
    {
        return $this->isValid;
    }

    /**
     * <p>Restituisce l'elemento trovato al path <code>\$path</code></p>
     * @param string $path <p>Percorso dell'elemento nella forma parent.child.<b>Nth</b>.name</p>
     * @return mixed <ul>
     *        <li>Se l'elemento <code>\$xpath</code> corrisponde ad un valore scalare json, ne restituisce il valore</li>
     *        <li>Se l'elemento <code>\$xpath</code> corrisponde ad un <code>array</code> o <code>object</code> restituisce l'elemento come <code>array</code></li>
     *   </ul>
     */
    public function jsonPath(string $path) : mixed
    {
        $payload = $this->json;
        $prop_arr = explode('.',$path);
        foreach($prop_arr as $p)
        {
            if (is_object($payload))
            {
                $payload = (array) $payload;
            }
            if (isset($payload[$p]))
            {
                $payload = $payload[$p];
            }
            else
            {
                return null;
            }
        }
        return $payload;
    }
    /**
     * <p>Restituisce il valore scalare presente al <code>\$xpath</code></p>
     * @param string $xpath <p>Percorso dell'elemento nella forma parent.child.<b>Nth</b>.name</p>
     * @return string|null <ul>
     *       <li>Se l'elemento <code>\$xpath</code> corrisponde ad un valore scalare json, ne restituisce il valore</li>
     *       <li>Se l'elemento <code>\$xpath</code> corrisponde ad un <code>array</code> o <code>object</code> o non esiste, restituisce <code>null</code></li>
     *  </ul>
     */
    public function getElement(string $xpath): string|null
    {
        if ($xpath == '')
        {
            return null;
        }
        $return = $this->jsonPath($xpath);
        if ((is_array($return)) || (is_object($return)) || (empty($return)))
        {
            return null;
        }
        return $return;
    }

    /**
     * <p>Restituisce il numero di elementi presenti in <code>$xpath</code></p>
     * @param string $xpath
     * @return int <ul>
     *       <li>Se l'elemento <code>\$xpath</code> corrisponde ad un array json, restituisce il numero di elementi contenuti in esso</li>
     *       <li>Se l'elemento <code>\$xpath</code> corrisponde ad un object json, restituisce <b>1</b></li>
     *       <li>Se l'elemento <code>\$xpath</code> corrisponde ad un valore scalare json, restituisce <b>1</b></li>
     *       <li>Se l'elemento <code>\$xpath</code> non esiste, restituisce <b>0</b></li>
     *  </ul>
     */
    public function getElementsCount(string $xpath): int
    {
        if ($xpath == '')
        {
            return 0;
        }
        $return = $this->jsonPath($xpath);
        if (empty($return))
        {
            return 0;
        }
        if (is_object($return))
        {
            return 1;
//            return count((array) $return);
        }
        if (is_array($return))
        {
            return count($return);
        }
        return 0;
    }
}
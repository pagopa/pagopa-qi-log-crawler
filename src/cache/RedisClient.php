<?php

namespace pagopa\sert\cache;

use Predis\Client;

class RedisClient
{

    protected Client $client;

    public function __construct(array $connection)
    {
        $this->client = new Client($connection);
    }

    /**
     * Restituisce un valore in cache. Se il valore è un json, lo restituisce come array PHP
     * @param string $key
     * @return mixed
     */
    public function get(string $key) : mixed
    {
        $value = $this->client->get($key);
        if (is_null($value))
        {
            return null;
        }
        $decode = json_decode($value, JSON_OBJECT_AS_ARRAY);
        return (json_last_error() === JSON_ERROR_NONE) ? $decode : $value;
    }

    /**
     * Configura un valore $value nella chiave $key. Mantiene la scadenza, che esista o meno (KEEPTTL)
     * @param string $key chiave in cache
     * @param mixed $value valore da memorizzare. Se si memorizza un array PHP, viene convertito in JSON
     * @return void
     */
    public function set(string $key, mixed $value) : void
    {
        $to_add = (is_array($value)) ? json_encode($value) : $value;
        $this->client->set($key, $to_add, 'KEEPTTL');
    }

    /**
     * Aggiunge un valore all'array presente in $key.
     * @param string $key
     * @param string $value
     * @return void
     */
    public function add(string $key, string $value) : void
    {
        $cached = $this->client->get($key);
        // se cached esiste
        if ($cached) {
            json_decode($cached);
            if (json_last_error() === JSON_ERROR_NONE)
            {
                // è un json
                $decode = json_decode($cached, JSON_OBJECT_AS_ARRAY);
                $decode[] = $value;
                $to_add = json_encode($decode);
            }
            else
            {
                $to_add = json_encode(array($cached, $value));
            }
        }
        else
        {
            $to_add = json_encode(array($value));
        }
        $this->client->set($key, $to_add, 'KEEPTTL');
    }


    /**
     * Elimina una chiave dalla cache
     * @param string $key
     * @return void
     */
    public function delete(string $key) : void
    {
        $this->client->del($key);
    }


    /**
     * Restituisce true/false se una chiave esiste
     * @param string $key
     * @return bool
     */
    public function hasKey(string $key): bool
    {
        $get = $this->client->get($key);
        return !is_null($get);
    }


    /**
     * Restituisce tutte le chiavi
     * @return array
     */
    public function getAllKeys(): array
    {
        return $this->client->keys('*');
    }


    /**
     * Restituisce il client Redis
     * @return Client
     */
    public function client() : Client
    {
        return $this->client;
    }
}
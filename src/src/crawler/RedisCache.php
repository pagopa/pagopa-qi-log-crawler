<?php

namespace pagopa\crawler;

use pagopa\crawler\CacheInterface;
use Predis\Client;

class RedisCache implements CacheInterface
{


    /**
     * Client di connessione a Redis
     * @var Client
     */
    protected Client $client;


    /**
     * Array di informazioni da passare al client
     * @param array $connection
     * @see https://github.com/predis/predis
     */
    public function __construct(array $connection)
    {
        $this->client = new Client($connection);
    }

    /**
     * @inheritDoc
     */
    public function clearCache(): void
    {
        $this->client->flushall();
    }

    /**
     * @inheritDoc
     */
    public function setValue(string $key, mixed $value, int $expiration = 0): void
    {
        $to_add = (is_array($value)) ? json_encode($value) : $value;
        if ($expiration == 0)
        {
            $this->client->set($key, $to_add);
        }
        else
        {
            $this->client->set($key, $to_add, 'EX', $expiration);
        }
    }

    /**
     * @inheritDoc
     */
    public function addValue(string $key, mixed $value, $ttl = 86400): void
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
                // è una stringa qualunque, faccio un add
                $to_add = json_encode(array($cached, $value));
            }
        }
        else
        {
            $to_add = json_encode(array($value));
        }
        $this->client->set($key, $to_add, 'EX', $ttl);
    }

    /**
     * @inheritDoc
     */
    public function getValue(string $key): mixed
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
     * @inheritDoc
     */
    public function deleteFromCache(string $key): void
    {
        $this->client->del($key);
    }

    /**
     * @inheritDoc
     */
    public function refreshExpired(string $key, int $expiration = 0): void
    {
        // TODO: Implement refreshExpired() method.
    }

    /**
     * @inheritDoc
     */
    public function hasKey(string $key): bool
    {
        $get = $this->client->get($key);
        return !is_null($get);
    }

    /**
     * @inheritDoc
     */
    public function getAllKeys(): array
    {
        return $this->client->keys('*');
    }
}
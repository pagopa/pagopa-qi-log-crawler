<?php

namespace pagopa\crawler;

use pagopa\crawler\CacheInterface;
use \Memcached as MC;

class Memcached implements CacheInterface
{

    protected MC $instance;

    public function __construct()
    {
        $this->instance = new MC();
        $this->instance->addServer(MEMCACHED_HOST, MEMCACHED_PORT);
    }

    /**
     * @inheritDoc
     */
    public function clearCache(): void
    {
        $this->instance->flushBuffers();
    }

    /**
     * @inheritDoc
     */
    public function setValue(string $key, mixed $value, int $expiration = 0): void
    {
        $this->instance->set($key, $value, $expiration);
    }

    /**
     * @inheritDoc
     */
    public function getValue(string $key): mixed
    {
        return $this->instance->get($key);
    }

    /**
     * @inheritDoc
     */
    public function deleteFromCache(string $key): void
    {
        $this->instance->delete($key);
    }

    /**
     * @inheritDoc
     */
    public function refreshExpired(string $key, int $expiration = 0): void
    {
        $value = $this->instance->get($key);
        $this->instance->set($key, $value, $expiration);
    }

    /**
     * @inheritDoc
     */
    public function hasKey(string $key): bool
    {
        return (bool) $this->instance->get($key);
    }

    /**
     * @param string $key
     * @param mixed $value
     * @param int $expiration
     * @return void
     */
    public function addValue(string $key, mixed $value, int $expiration = 0): void
    {
        $cached = $this->instance->get($key);
        if ($cached)
        {
            $cached[] = $value;
        }
        else
        {
            $cached = array($value);
        }
        $this->instance->set($key, $cached, 86400);
    }

    /**
     * @inheritDoc
     */
    public function getAllKeys(): array
    {
        return $this->instance->getAllKeys();
    }
}
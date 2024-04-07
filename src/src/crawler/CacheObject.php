<?php

namespace pagopa\crawler;

class CacheObject
{

    protected array $cache_data;

    public function __construct(array $cache_data)
    {
        $this->cache_data = $cache_data;
    }

    public function getKey(string $key) : string|null
    {
        return (array_key_exists($key, $this->cache_data)) ? $this->cache_data[$key] : null;
    }

    public function getId() : string
    {
        return $this->getKey('id');
    }

    public function getDateEvent() : string
    {
        return $this->getKey('date_event');
        //        $cache_value    =   [
        //            'date_event'        =>  $date_event,
        //            'id'                =>  $last_inserted_id,
        //            'iuv'               =>  $this->getEvent()->getIuv(0),
        //            'pa_emittente'      =>  $this->getEvent()->getPaEmittente(0),
        //            'token_ccp'         =>  $token,
        //            'transfer_added'    =>  false,
        //            'esito'             =>  false,
        //            'amount_update'     =>  false,
        //            'date_wf'           => json_encode(array())
        //        ];
    }

    public function getIuv() : string
    {
        return $this->getKey('iuv');
    }

    public function getPaEmittente() : string
    {
        return $this->getKey('pa_emittente');
    }

    public function getToken() : string
    {
        return $this->getKey('token_ccp');
    }

    public function getTransferAdded() : bool
    {
        return $this->getKey('transfer_added');
    }

    public function getEsito() : bool
    {
        return $this->getKey('esito');
    }
    public function getAmountUpdate() : bool
    {
        return $this->getKey('amount_update');
    }

    public function getDateWf() : string
    {
        return $this->getKey('date_wf');
    }

    public function getCacheData() : array
    {
        return $this->cache_data;
    }

    public function setKey(string $key, mixed $value) : void
    {
        $this->cache_data[$key] = $value;
    }

}
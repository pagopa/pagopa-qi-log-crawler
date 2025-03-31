<?php

namespace pagopa\sert;


use Ramsey\Uuid\Uuid;

/**
 *
 *  data format
 *
 *
 *  data
 *  save
 *  saved
 *
 */
class Payment
{

    protected string $payment;

    protected string $pa;

    protected array $data;


    protected string $nsUUIDv4 = '1992b8a91bee47c2b1208f9c1af63752';


    protected string $uuid;

    public function __construct(string $nav, string $pa, array $data = [])
    {
        $this->payment = $nav;
        $this->pa = $pa;
        $this->data = $data;
        $this->uuid = $this->getUUID();
    }



    public static function getFromData(array $data): self
    {
        return new self($data['payment'], $data['pa'], $data);
    }

    public function getUUID() : string
    {
        $name = sprintf('%s_%s', $this->payment, $this->pa);
        return Uuid::uuid5($this->nsUUIDv4, $name);
    }


}
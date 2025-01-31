<?php

namespace pagopa\sert\payload;

interface ParserInterface
{

    public function isValid() : bool;


    public function getElement(string $xpath) : string|null;

    public function getElementsCount(string $xpath) : int;


}
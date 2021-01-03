<?php

namespace Ragebee\Fishpond;

use Ragebee\Fishpond\GameInterface;

class Game implements GameInterface
{
    /** @var string */
    private $name;

    /** @var string */
    private $code;

    /** @var int */
    private $typeCode;

    /** @var array */
    private $translatedName;

    public function __construct(string $name, string $code, $typeCode, $translatedName = [])
    {
        $this->name = $name;
        $this->code = $code;
        $this->typeCode = $typeCode;
        $this->translatedName = $translatedName;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getTypeCode()
    {
        return $this->typeCode;
    }

    public function getTranslatedName()
    {
        return $this->translatedName;
    }

    public function __toString()
    {
        return $this->name;
    }

    public function __set($name, $value)
    {
        $this->{$name} = $value;
    }
}

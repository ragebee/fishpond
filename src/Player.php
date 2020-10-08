<?php

namespace Ragebee\Fishpond;

use Ragebee\Fishpond\PlayerInterface;

class Player implements PlayerInterface
{
    /** @var string */
    private $name;

    /**
     * @param string $name The user Name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function __set($name, $value)
    {
        $this->{$name} = $value;
    }

    public function getName()
    {
        return $this->name;
    }

    public function __toString()
    {
        return $this->name;
    }
}

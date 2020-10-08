<?php

namespace Gamesmkt\Fishpond;

use Gamesmkt\Fishpond\RecordInterface;

class Record implements RecordInterface
{
    /** @var string */
    private $id;

    /**
     * @param string $id The record id
     */
    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function __toString()
    {
        return $this->id;
    }

    public function __set($name, $value)
    {
        $this->{$name} = $value;
    }
}

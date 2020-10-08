<?php

namespace Ragebee\Fishpond;

use InvalidArgumentException;
use ReflectionClass;

class Type implements TypeInterface
{
    /** @var int */
    private $type;

    /**
     * @param int $type The record type
     */
    public function __construct(
        int $type
    ) {
        $this->assertType($type);

        $this->type = $type;
    }

    public function getType()
    {
        return $this->type;
    }

    private function assertType($type)
    {
        if (!is_int($type) || $type < 0) {
            throw new InvalidArgumentException('Type must be a positive integer.');
        }

        switch ($type) {
            case self::RECORD_BET:
                break;
            case self::RECORD_DONATE:
                break;
            case self::RECORD_TRANSFER:
                break;

            case self::GAME_ALL:
                break;
            case self::GAME_SPORT:
                break;
            case self::GAME_LOTTERY:
                break;
            case self::GAME_CHESS_CARD:
                break;
            case self::GAME_LIVE_VIDEO:
                break;
            case self::GAME_SLOT:
                break;
            case self::GAME_FISHING:
                break;
            case self::GAME_CELEBRITY:
                break;
            case self::GAME_SPECIAL:
                break;
            default:
                throw new InvalidArgumentException("Not support [$type] type.");
        }
    }

    public function __toString()
    {
        return $this->type;
    }

    public function getErrorMessage()
    {
        $class = new ReflectionClass(__CLASS__);
        $constants = array_flip($class->getConstants());

        return $constants[$this->getType()];
    }
}

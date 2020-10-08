<?php

namespace Ragebee\Fishpond\Adapter;

use Ragebee\Fishpond\AdapterInterface;
use Ragebee\Fishpond\Adapter\AutoCreatePlayer;
use Ragebee\Fishpond\Adapter\Polyfill\AutoCreatePlayerTrait;

abstract class AbstractAutoCreatePlayerAdapter implements AdapterInterface, AutoCreatePlayer
{
    use AutoCreatePlayerTrait;
}

<?php

namespace Gamesmkt\Fishpond\Adapter;

use Gamesmkt\Fishpond\AdapterInterface;
use Gamesmkt\Fishpond\Adapter\AutoCreatePlayer;
use Gamesmkt\Fishpond\Adapter\Polyfill\AutoCreatePlayerTrait;

abstract class AbstractAutoCreatePlayerAdapter implements AdapterInterface, AutoCreatePlayer
{
    use AutoCreatePlayerTrait;
}

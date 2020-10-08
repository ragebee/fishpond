<?php

namespace Gamesmkt\Fishpond\Adapter\Polyfill;

use Gamesmkt\Fishpond\Config;
use Gamesmkt\Fishpond\PlayerInterface;

trait AutoCreatePlayerTrait
{
    /**
     * @inheritdoc
     */
    public function createPlayer(PlayerInterface $player, Config $config)
    {
        $data['player'] = $player;

        return $data;
    }
}

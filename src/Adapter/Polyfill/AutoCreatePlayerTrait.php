<?php

namespace Ragebee\Fishpond\Adapter\Polyfill;

use Ragebee\Fishpond\Config;
use Ragebee\Fishpond\PlayerInterface;

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

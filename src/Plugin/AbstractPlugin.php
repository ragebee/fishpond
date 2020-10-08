<?php

namespace Gamesmkt\Fishpond\Plugin;

use Gamesmkt\Fishpond\FishpondInterface;
use Gamesmkt\Fishpond\PluginInterface;

abstract class AbstractPlugin implements PluginInterface
{
    /**
     * @var \Gamesmkt\Fishpond\FishpondInterface
     */
    protected $fishpond;

    /**
     * @inheritdoc
     */
    public function setFishpond(FishpondInterface $fishpond)
    {
        $this->fishpond = $fishpond;
    }
}

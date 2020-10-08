<?php

namespace Ragebee\Fishpond\Plugin;

use Ragebee\Fishpond\FishpondInterface;
use Ragebee\Fishpond\PluginInterface;

abstract class AbstractPlugin implements PluginInterface
{
    /**
     * @var \Ragebee\Fishpond\FishpondInterface
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

<?php

namespace Gamesmkt\Fishpond;

use Gamesmkt\Fishpond\FishpondInterface;

interface PluginInterface
{
    /**
     * Get the method name.
     *
     * @return string
     */
    public function getMethod();

    /**
     * Set the Fishpond object.
     *
     * @param \Gamesmkt\Fishpond\FishpondInterface $fishpond
     */
    public function setFishpond(FishpondInterface $fishpond);
}

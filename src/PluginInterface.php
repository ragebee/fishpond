<?php

namespace Ragebee\Fishpond;

use Ragebee\Fishpond\FishpondInterface;

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
     * @param \Ragebee\Fishpond\FishpondInterface $fishpond
     */
    public function setFishpond(FishpondInterface $fishpond);
}

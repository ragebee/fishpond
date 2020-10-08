<?php

namespace Gamesmkt\Fishpond\Plugin;

use BadMethodCallException;
use Gamesmkt\Fishpond\FishpondInterface;
use Gamesmkt\Fishpond\PluginInterface;
use Gamesmkt\Fishpond\Plugin\PluginNotFoundException;
use LogicException;

trait PluggableTrait
{
    /**
     * @var array
     */
    protected $plugins = [];

    /**
     * Register a plugin.
     *
     * @param \Gamesmkt\Fishpond\PluginInterface $plugin
     *
     * @throws \LogicException
     *
     * @return $this
     */
    public function addPlugin(PluginInterface $plugin)
    {
        if (!method_exists($plugin, 'handle')) {
            throw new LogicException(get_class($plugin) . ' does not have a handle method.');
        }

        $this->plugins[$plugin->getMethod()] = $plugin;

        return $this;
    }

    /**
     * Find a specific plugin.
     *
     * @param string $method
     *
     * @throws \Gamesmkt\Fishpond\Plugin\PluginNotFoundException
     *
     * @return \Gamesmkt\Fishpond\PluginInterface
     */
    protected function findPlugin($method)
    {
        if (!isset($this->plugins[$method])) {
            throw new PluginNotFoundException('Plugin not found for method: ' . $method);
        }

        return $this->plugins[$method];
    }

    /**
     * Invoke a plugin by method name.
     *
     * @param string              $method
     * @param array               $arguments
     * @param \Gamesmkt\Fishpond\FishpondInterface $fishpond
     *
     * @throws \Gamesmkt\Fishpond\Plugin\PluginNotFoundException
     *
     * @return mixed
     */
    protected function invokePlugin($method, array $arguments, FishpondInterface $fishpond)
    {
        $plugin = $this->findPlugin($method);
        $plugin->setFishpond($fishpond);
        $callback = [$plugin, 'handle'];

        return call_user_func_array($callback, $arguments);
    }

    /**
     * Plugins pass-through.
     *
     * @param string $method
     * @param array  $arguments
     *
     * @throws \BadMethodCallException
     *
     * @return mixed
     */
    public function __call($method, array $arguments)
    {
        try {
            return $this->invokePlugin($method, $arguments, $this);
        } catch (PluginNotFoundException $e) {
            throw new BadMethodCallException(
                'Call to undefined method '
                . get_class($this)
                . '::' . $method
            );
        }
    }
}

<?php

namespace Ragebee\Fishpond\Plugin;

use BadMethodCallException;
use LogicException;
use Ragebee\Fishpond\FishpondInterface;
use Ragebee\Fishpond\PluginInterface;
use Ragebee\Fishpond\Plugin\PluginNotFoundException;

trait PluggableTrait
{
    /**
     * @var array
     */
    protected $plugins = [];

    /**
     * Register a plugin.
     *
     * @param \Ragebee\Fishpond\PluginInterface $plugin
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
     * @throws \Ragebee\Fishpond\Plugin\PluginNotFoundException
     *
     * @return \Ragebee\Fishpond\PluginInterface
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
     * @param \Ragebee\Fishpond\FishpondInterface $fishpond
     *
     * @throws \Ragebee\Fishpond\Plugin\PluginNotFoundException
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

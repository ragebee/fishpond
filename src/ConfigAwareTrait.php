<?php

namespace Ragebee\Fishpond;

use LogicException;
use Ragebee\Fishpond\Config;

/**
 * @internal
 */
trait ConfigAwareTrait
{
    /**
     * @var Config
     */
    protected $config;

    /**
     * Set the config.
     *
     * @param Config|array|null $config
     */
    protected function setConfig($config)
    {
        $this->config = $config ? $this->ensureConfig($config) : new Config;
    }

    /**
     * Get the Config.
     *
     * @return Config config object
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Convert a config array to a Config object with the correct fallback.
     *
     * @param array $config
     *
     * @return Config
     */
    protected function prepareConfig(array $config)
    {
        $config = new Config($config);
        $config->setFallback($this->getConfig());

        return $config;
    }

    /**
     * Ensure a Config instance.
     *
     * @param Config|array|null $config
     *
     * @return Config config instance
     *
     * @throws LogicException
     */
    public static function ensureConfig($config)
    {
        if ($config === null) {
            return new Config();
        }

        if ($config instanceof Config) {
            return $config;
        }

        if (is_array($config)) {
            return new Config($config);
        }

        throw new LogicException('A config should either be an array or a Flysystem\Config object.');
    }

}

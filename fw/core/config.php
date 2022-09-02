<?php
/**
 * Global settings class
 */

namespace Fw\Core;

class Config
{
    /**
     * @var mixed
     */
    private $config;

    public function __construct()
    {
        $this->config = parse_ini_file(__DIR__ . './../config.ini', true);
    }

    public function get($path)
    {
        $cloneConfig = $this->config;
        return $this->getConfigValue($path,  $cloneConfig);
    }

    private function getConfigValue($path, $cloneConfig)
    {
        if (!is_array($cloneConfig)) {
            return $cloneConfig;
        }
        $keys = explode('/', $path);
        $key = array_shift($keys);
        $cloneConfig = $cloneConfig[$key];
        if (count($keys) === 0) {
            return $cloneConfig;
        }
        return $this->getConfigValue(implode('/', $keys), $cloneConfig, false);
    }
}

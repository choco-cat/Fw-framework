<?php
/**
 * Global settings class
 */

namespace Fw\Core;

use const Fw\GONFIG;

include realpath(__DIR__) . './../config.php';

class Config
{
    public static function get($path)
    {
        $cloneConfig = GONFIG;
        return self::getConfigValue($path,  $cloneConfig);
    }

    private static function getConfigValue($path, $cloneConfig)
    {
        $keys = explode('/', $path);
        foreach($keys as $key) {
          $cloneConfig = $cloneConfig[$key];
        }
       return $cloneConfig;
    }
}

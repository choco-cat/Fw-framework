<?php
namespace Fw\Core\Traits;

if (!defined('IN_FW')) {
    exit;
}

trait Singleton
{
    private static $instance = null;

    private function __construct() {}

    public static function getInstance()
    {
        self::$instance = self::$instance ?? new self();
        return self::$instance;
    }
}

<?php
namespace Fw\Core\Traits;

if (!defined('IN_FW')) {
    exit;
}

trait Single
{
    private static $instance = null;

    private function __construct() {}

    public static function getInstance()
    {
        return self::$instance ?? new self();
    }
}

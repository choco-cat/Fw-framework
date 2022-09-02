<?php
/**
 * Base app class
 */
namespace Fw\Core;

final class Application
{
    private $components = [];
    private $pager = null;
    private static $instance = null;
    private $template = null;

    private function __construct() {}

    public static function getInstance()
    {
        return self::$instance ?? new self();
    }
}

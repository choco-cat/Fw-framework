<?php
/**
 * Base app class
 */

namespace Fw;

final class App
{
    private static $instance = null;

    public static function getInstance()
    {
        return self::$instance ?? new self();
    }
}

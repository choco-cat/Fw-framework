<?php

namespace Fw\Core;

use Fw\Core\Traits\Singleton;
use Fw\Core\Config;

if (!defined('IN_FW')) {
    exit;
}

class Template
{
    use Singleton;

    private static $template;

    private function __construct()
    {
        self::$template = Config::get('site/template');
    }

    public function getHeader()
    {
        include(__DIR__ . './../templates/' . self::$template . '/header.php');
    }

    public function getFooter()
    {
        include (__DIR__ . './../templates/' . self::$template . '/footer.php');
    }
}

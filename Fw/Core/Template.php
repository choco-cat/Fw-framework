<?php

namespace Fw\Core;

use Fw\Core\Traits\Single;
use Fw\Core\Config;

if (!defined('IN_FW')) {
    exit;
}

class Template
{
    use Single;

    private static $template;

    private function __construct()
    {
        self::$template = Config::get('site/template');
    }

    public function getHeader()
    {
        return file_get_contents(__DIR__ . './../templates/' . self::$template . '/header.php');
    }

    public function getFooter()
    {
        return file_get_contents(__DIR__ . './../templates/' . self::$template . '/footer.php');
    }
}

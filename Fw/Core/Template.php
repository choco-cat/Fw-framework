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
    private $templateDir;

    private function __construct()
    {
        self::$template = Config::get('site/template');
        $this->templateDir = __DIR__ . './../templates/' . self::$template . '/';
    }

    public function getHeader()
    {
        include($this->templateDir. 'header.php');
    }

    public function getFooter()
    {
        include ($this->templateDir. 'footer.php');
    }
}

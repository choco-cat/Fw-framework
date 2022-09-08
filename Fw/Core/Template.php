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

    private $template;
    private $templateDir;

    private function __construct()
    {
        $this->template = Config::get('site/template');
        $this->templateDir = __DIR__ . './../templates/' . $this->template . '/';
    }

    public function includeHeader()
    {
        include($this->templateDir. 'header.php');
    }

    public function showHeader()
    {
        echo $this->includeHeader();
    }

    public function includeFooter()
    {
        include ($this->templateDir. 'footer.php');
    }

    public function showFooter()
    {
        echo $this->includeFooter();
    }
}

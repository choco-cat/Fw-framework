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

    private function __construct()
    {
        $this->template = Config::get('site/template');
    }

    public function includeHeader()
    {
        include(TEMPLATES_PATH .  $this->template . '/header.php');
    }

    public function showHeader()
    {
        echo $this->includeHeader();
    }

    public function includeFooter()
    {
        include(TEMPLATES_PATH.  $this->template . '/footer.php');
    }

    public function showFooter()
    {
        echo $this->includeFooter();
    }
}

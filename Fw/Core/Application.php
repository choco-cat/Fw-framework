<?php
/**
 * Base app class
 */
namespace Fw\Core;

use Fw\Core\Template;
use Fw\Core\Traits\Single;

if (!defined('IN_FW')) {
    exit;
}

final class Application
{
    use Single;

    private $components = [];
    private $pager = null;
    private static $template = null;

    private function __construct()
    {
        self::$template = Template::getInstance();
    }

    public function header()
    {
        echo self::$template->getHeader();
    }

    public function footer()
    {
        echo self::$template->getFooter();
    }
}

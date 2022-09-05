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

    public function startBuffer()
    {
        ob_start();
    }

    public function endBuffer()
    {
        $output = ob_get_contents();
        ob_end_clean();
        echo $output;
    }

    public function restartBuffer()
    {
        ob_clean();
    }

    public function header()
    {
        self::startBuffer();
        echo self::$template->getHeader();
    }

    public function footer()
    {
        echo self::$template->getFooter();
        self::endBuffer();
    }
}

<?php
/**
 * Base app class
 */
namespace Fw\Core;

use Fw\Core\Template;
use Fw\Core\Page;
use Fw\Core\Traits\Single;

if (!defined('IN_FW')) {
    exit;
}

final class Application
{
    use Single;

    private $components = [];
    private static $pager = null;
    private static $template = null;

    private function __construct()
    {
        self::$template = Template::getInstance();
        self::$pager = Page::getInstance();
    }

    public function startBuffer()
    {
        ob_start();
    }

    public function endBuffer()
    {
        $output = ob_get_contents();
        ob_end_clean();
        $allMacros = self::$pager->getAllReplace();
        $output = str_replace(array_keys($allMacros), array_values($allMacros), $output);
        echo $output;
    }

    public function restartBuffer()
    {
        ob_clean();
    }

    public function header()
    {
        self::$pager->addJs('https://google.by');
        self::$pager->addJs('https://mail.ru');
        self::$pager->addCss('/lib/w3schools30.css');
        self::$pager->addString('<meta property="og:image:height" content="228">');
        self::startBuffer();
        echo self::$template->getHeader();
    }

    public function footer()
    {
        echo self::$template->getFooter();
        self::endBuffer();
    }
}

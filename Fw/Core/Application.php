<?php
/**
 * Base app class
 */
namespace Fw\Core;

use Fw\Core\Template;
use Fw\Core\Page;
use Fw\Core\Traits\Singleton;

if (!defined('IN_FW')) {
    exit;
}

final class Application
{
    use Singleton;

    private $components = [];
    private $pager = null;
    private $template = null;

    private function __construct()
    {
        $this->template = Template::getInstance();
        $this->pager = Page::getInstance();
    }

    public function startBuffer()
    {
        ob_start();
    }

    public function endBuffer()
    {
        $output = ob_get_contents();
        ob_end_clean();
        $allMacros = $this->pager->getAllReplace();
        $output = str_replace(array_keys($allMacros), array_values($allMacros), $output);
        echo $output;
    }

    public function restartBuffer()
    {
        ob_clean();
    }

    public function initialPageParams()
    {
        $this->pager->addJs('https://google.by');
        $this->pager->addCss('/lib/w3schools30.css');
        $this->pager->addJs('https://mail.ru');
        $this->pager->addCss('/lib/w3schools30.css');
        $this->pager->addJs('https://mail.ru');
        $this->pager->addString('<meta property="og:image:height" content="228">');
        $this->pager->setProperty('#FW_SITE_NAME#', 'Название сайта');
        $this->pager->setProperty('#FW_SITE_DESCRIPTION#', 'О чем этот сайт - длинный текст');
    }

    public function header()
    {
        self::initialPageParams();
        self::startBuffer();
        $this->template->showHeader();
    }

    public function footer()
    {
        $this->template->showFooter();
        $this->endBuffer();
    }
}

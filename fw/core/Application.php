<?php
/**
 * Base app class
 */
namespace Fw\Core;

use Fw\Core\Request;
use Fw\Core\Server;
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
    private $request = null;
    private $server = null;

    private function __construct()
    {
        $this->template = Template::getInstance();
        $this->pager = Page::getInstance();
        $this->request = new Request();
        $this->server = new Server();
    }

    public function getServer()
    {
        return $this->server;
    }

    public function getRequest()
    {
        return $this->request;
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
        $this->pager->addCss('/lib/wd3schools30.css');
        $this->pager->addJs('https://mail.ru');
        $this->pager->addJs('https://google.by');
        $this->pager->addCss('/lib/wd3schools30.css');
        $this->pager->addJs('https://sсhools30.js');
        $this->pager->addJs('https://mail.ru');
        $this->pager->addString('<meta property="og:image:height" content="228">');
        $this->pager->addString('<meta name="twitter:card" content="summary"/>');
        $this->pager->setProperty('site_name', 'Название сайта');
        $this->pager->setProperty('site_description', 'О чем этот сайт - длинный текст');
    }

    public function header()
    {
        $this->initialPageParams();
        $this->startBuffer();
        $this->template->showHeader();
    }

    public function footer()
    {
        $this->template->showFooter();
        $this->endBuffer();
    }
}

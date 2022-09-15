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
use Fw\Components;

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

    public function includeComponent($component, $idTemplate, $params)
    {
        include_once(RELATIVE_COMPONENTS_PATH . $component .'\\'. '.class.php');
        $componentRealPath =
            COMPONENTS_PATH
            . str_replace('.', '\\', $component) . '\\'
            . COMPONENT_CLASS;
        $component = new $componentRealPath($component, $idTemplate, $params);
        $component->executeComponent();
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
        //Глобальные скрипты, стили
        $this->pager->addJs('https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js');
        $this->pager->addCss('https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css');
        $this->pager->setProperty('site_name', 'Создание fw');
        $this->pager->setProperty('site_description', 'О чем этот сайт - длинный текст');
        $this->pager->setProperty('site_copyright', 'Задание выполнила: Панфиленко Н.В.');
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

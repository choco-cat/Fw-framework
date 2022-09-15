<?php

namespace Fw\Components\InterfaceForm;

use Fw\Core\Component\Base;
use Fw\Core\Application;

if (!defined('IN_FW')) {
    exit;
}

class Component extends Base
{
    public function executeComponent()
    {
        $app = Application::getInstance();
        $elements = $this->params['elements'];
        $this->template->render($this->params, 'header');
        foreach ($elements as $element) {
            $app->includeComponent('interface.' . $element['type'], $this->template->id, []);
        }
        $this->template->render([], 'footer');
    }
}

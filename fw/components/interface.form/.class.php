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
        $this->params['elements'] = array();
        foreach ($elements as $element) {
            ob_start();
            $app->includeComponent('form.input', $this->template->id, $element);
            $this->params['htmlElements'][] = ob_get_contents();
            ob_end_clean();
        }
        $this->template->render($this->params);
    }
}

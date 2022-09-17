<?php

namespace Fw\Components\InterfaceForm;

use Fw\Core\Component\Base;
use Fw\Core\Application;

if (!defined('IN_FW')) {
    exit;
}

class Component extends Base
{
    public function __construct($id, $idTemplate, $params)
    {
        parent::__construct($id, $idTemplate, $params);
        $this->params += array(
            'additional_class' => '',
            'method' => 'post',
            'action' => '',
            'attr' => array(),
            'elements' => array(),
        );
    }

    public function executeComponent()
    {
        $app = Application::getInstance();
        $elements = $this->params['elements'];
        $this->params['elements'] = array();


        foreach ($elements as $element) {
            $type = 'input';
            $type = in_array($element['type'], ['select', 'textarea'])
                    ? $element['type']
                    : $type;
            ob_start();
            $app->includeComponent('form.'.$type, $this->template->id, $element);
            $this->params['htmlElements'][] = ob_get_contents();
            ob_end_clean();
        }
        $this->template->render($this->params);
    }
}

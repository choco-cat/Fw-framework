<?php

namespace Fw\Components\FormSelect;

use Fw\Core\Component\FormElement;

if (!defined('IN_FW')) {
    exit;
}

class Component extends FormElement
{
    public function __construct($id, $idTemplate, $params)
    {
        parent::__construct($id, $idTemplate, $params);
        $this->params += array(
            'multiple' => false,
            'list' =>  array(),
        );
    }

    public function executeComponent()
    {
        $options = $this->params['list'];
        foreach ($options as $key => $option) {
            $optionElement = new FormElement(null, '', $option);
            $this->params['options'][$key] = $optionElement->params;
            $this->params['options'][$key]['selected'] = $option['selected'] ?? false;
        }
        $this->template->render($this->params);
    }
}

<?php

namespace Fw\Components\FormSelect;

use Fw\Core\Component\FormElement;

if (!defined('IN_FW')) {
    exit;
}

class Component extends FormElement
{
    public function executeComponent()
    {
        $options = $this->params['list'];
        $this->params['multiple'] = $this->params['multiple'] ?? false;
        foreach ($options as $key => $option) {
            $optionElement = new FormElement(null, '', $option);
            $this->params['options'][$key] = $optionElement->params;
            $this->params['options'][$key]['selected'] = $option['selected'] ?? false;
        }
        $this->template->render($this->params);
    }
}

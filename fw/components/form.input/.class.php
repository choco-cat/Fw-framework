<?php

namespace Fw\Components\FormInput;

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
            'additional_class' => 'form-control',
            'type' => '',
            'name' => '',
            'attr' => array(),
            'title' => '',
            'default' => '',
        );
    }

    public function executeComponent()
    {
        $this->template->render($this->params);
    }
}

<?php

namespace Fw\Core\Component;

use Fw\Core\Component\Base;

if (!defined('IN_FW')) {
    exit;
}

class FormElement extends Base
{
    public function __construct($id, $idTemplate, $params)
    {
        parent::__construct($id, $idTemplate, $params);
        $this->params += array(
            'additional_class' => 'form-control',
            'type' => 'text',
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

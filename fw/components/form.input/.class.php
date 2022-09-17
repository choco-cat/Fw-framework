<?php

namespace Fw\Components\FormInput;

use Fw\Core\Component\FormElement;

if (!defined('IN_FW')) {
    exit;
}

class Component extends FormElement
{
    public function executeComponent()
    {
        $this->template->render($this->params);
    }
}

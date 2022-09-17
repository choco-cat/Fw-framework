<?php

namespace Fw\Components\FormInput;

use Fw\Core\Component\Base;

if (!defined('IN_FW')) {
    exit;
}

class Component extends Base
{
    public function executeComponent()
    {
        $this->template->render($this->params);
    }
}

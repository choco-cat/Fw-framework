<?php

namespace Fw\Components\InterfaceForm;

use Fw\Core\Component\Base;

if (!defined('IN_FW')) {
    exit;
}

class Component extends Base
{
    public function executeComponent()
    {
        $this->template->render();
    }
}

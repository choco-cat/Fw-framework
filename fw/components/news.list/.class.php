<?php

namespace Fw\Components\NewsList;

use Fw\Core\Component\Base;

if (!defined('IN_FW')) {
    exit;
}

// Логика работы компонента, принимает $params, рендерит шаблон, передавая туда $result (данные для вывода)
class Component extends Base
{
    public function executeComponent()
    {
        //Передавать в шаблон $result
        $result = array('title' => 'News', 'text' => 'News list');
        $this->template->render($result);
    }
}

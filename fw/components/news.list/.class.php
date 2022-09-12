<?php

namespace Fw\Components;

use Fw\Core\Component\Base;
use Fw\Core\Component\Template;

if (!defined('IN_FW')) {
    exit;
}

// Логика работы компонента, принимает $params, рендерит шаблон, передавая туда $result (данные для вывода)
class News_List extends Base
{
    public function __construct($template, $params)
    {
        $this->template = new Template('news.list', $template);
        $this->params = $params;
    }

    public function executeComponent()
    {
        //Передавать в шаблон $result
        $this->template->render();
    }
}

<?php

namespace Fw\Components;

use Fw\Core\Component\Base;
use Fw\Core\Component\Template;

if (!defined('IN_FW')) {
    exit;
}

// Логика работы компонента, принимает $arParams, рендерит шаблон
class News_List extends Base
{
    public function __construct($template, $arParams)
    {
        $this->template = new Template('news.list', $template);
        $this->params = $arParams;
    }

    public function executeComponent()
    {
        $this->template->render();
    }
}

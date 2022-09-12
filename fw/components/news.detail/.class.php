<?php

namespace Fw\Components;

use Fw\Core\Component\Base;

if (!defined('IN_FW')) {
    exit;
}

// Логика работы компонента, принимает $arParams, рендерит шаблон
class News_Detail extends Base
{
    public function __construct($arParams)
    {
    }

    public function executeComponent()
    {
        echo 'executeComponent news.detail';
    }
}

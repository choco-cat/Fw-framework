<?php

use Fw\Core\Application;

include './Fw/init.php';

$app = Application::getInstance();
$app->header();
?>

<pre>
    ---------05.09.2022---------
    1. Создан трейт Single, переписаны классы Singleton на классы с использованием трейта
    2. В init.ph Добавлена глобальная константа IN_FW для проверки подключения ядра
    3. Создана структура шаблона сайта, написан класс Template
    4. Класс Application доработан - передаем шаблон для вывода хедера и футера
</pre>

<?php
$app->footer();
?>
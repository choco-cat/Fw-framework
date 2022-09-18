<?php

use Fw\Core\Application;

include './fw/init.php';

$app = Application::getInstance();
$app->header();
$app->includeComponent(
    'news.list',
    'default',
    [
        'sort'    => 'id',
        'limit' => 10,
        'show_title' => 'N',
    ]
);

$app->footer();


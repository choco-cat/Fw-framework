<?php

use Fw\Core\Page;

if (!defined('IN_FW')) {
    exit;
}
$page = Page::getInstance();
?>

<!doctype html>
<html>
<head>
    <?php $page->showHead(); ?>
</head>
<body>
<header>Header default</header>
<main>
    <h1><?php $page->showProperty('#FW_SITE_NAME#'); ?></h1>
    <p><?php $page->showProperty('#FW_SITE_DESCRIPTION#'); ?></p>

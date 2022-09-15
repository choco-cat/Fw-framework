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
    <h1><?php $page->showProperty('site_name'); ?></h1>
    <p><?php $page->showProperty('site_description'); ?></p>

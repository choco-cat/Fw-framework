<?php

use Fw\Core\Page;

if (!defined('IN_FW')) {
    exit;
}
?>

<!doctype html>
<html>
<head>
    <?php Page::showHead(); ?>
</head>
<body>
<header>Header default</header>
<main>
    <h1><?php Page::showProperty('#FW_SITE_NAME#'); ?></h1>
    <?php Page::showProperty('#FW_SITE_DESCRIPTION#'); ?>

<?php
if (!defined('IN_FW')) {
    exit;
}
?>

<!doctype html>
<html>
<head>
    <?php
        use Fw\Core\Page;
        $pager = Page::getInstance();
        $pager->showHead();
    ?>
</head>
<body>
<header>
    Header default
</header>
<main>
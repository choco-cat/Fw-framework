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
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a href="#" class="navbar-brand"><?php $page->showProperty('site_name'); ?></a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse1">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse1">
                <div class="navbar-nav">
                    <a href="#" class="nav-item nav-link active">Home</a>
                    <a href="#" class="nav-item nav-link">About</a>
                    <a href="#" class="nav-item nav-link">Products</a>
                </div>
                <form class="d-flex ms-auto">
                    <input type="text" class="form-control me-sm-2" placeholder="Search">
                    <button type="submit" class="btn btn-outline-light">Search</button>
                </form>
            </div>
        </div>
    </nav>
</header>
<main>
<div class="container">
    <p><?php $page->showProperty('site_description'); ?></p>

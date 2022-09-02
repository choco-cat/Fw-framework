<?php
/**
 * autoload function
 * session start
 */

spl_autoload_register(function($className) {
    $file = $_SERVER["DOCUMENT_ROOT"] . '/' .  strtolower($className) . '.php';
    if (file_exists($file)) {
       include $file;
    }
});
session_start();

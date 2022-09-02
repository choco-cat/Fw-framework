<?php
/**
 * autoload function
 * session start
 */

spl_autoload_register(function($class_name) {
    $file = $_SERVER["DOCUMENT_ROOT"] . '/' .  strtolower($class_name) . '.php';
    if (file_exists($file)) {
       include $file;
    }
});
session_start();

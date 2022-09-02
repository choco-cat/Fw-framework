<?php
/**
 * autoload function
 * session start
 */

spl_autoload_register(function($class_name) {
    $file =  dirname(realpath(__FILE__)) . '/' . str_replace('\\', '/', $class_name) . '.php';
    if (file_exists($file)) {
       include $file;
    }
});

session_start();

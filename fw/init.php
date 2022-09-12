<?php
/**
 * autoload function
 * session start
 */

use Fw\Core\Application;

define('IN_FW', true);

include 'includes/constants.php';

spl_autoload_register(function ($className) {

    $file = $_SERVER['DOCUMENT_ROOT'] . '/' . str_replace('\\', '/', $className) . '.php';
    if (file_exists($file)) {
        include $file;
    } else if(strpos($className, '_')) {
        $dirClass = str_replace('_', '.',  $className);
        $file =  $_SERVER['DOCUMENT_ROOT'] . '/' . str_replace('\\', '/', $dirClass) . '/.class.php';
        if (file_exists($file)) {
            include $file;
        }
    }
});
session_start();

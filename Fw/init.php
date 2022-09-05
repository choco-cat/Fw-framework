<?php
/**
 * autoload function
 * session start
 */

use Fw\Core\Application;

define('IN_FW', true);

spl_autoload_register(function($className) {
    $file = $_SERVER['DOCUMENT_ROOT'] . '/' . str_replace('\\', '/', $className) . '.php';
    if (file_exists($file)) {
       include $file;
    }
});
session_start();
$app = Application::getInstance();
<?php
/**
 * autoload function
 * session start
 */

/*spl_autoload_register(function($className) {
    $file = $_SERVER['DOCUMENT_ROOT'] . '/' . str_replace('\\', '/', $className) . '.php';
    if (file_exists($file)) {
       include $file;
    }
});*/
spl_autoload_register(function ($class) {

    // project-specific namespace prefix
    //$prefix = 'Fw\\';
    $prefix = '';

    // base directory for the namespace prefix
    $base_dir = $_SERVER['DOCUMENT_ROOT'] . './';

    // does the class use the namespace prefix?
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        // no, move to the next registered autoloader
        return;
    }

    // get the relative class name
    $relative_class = substr($class, $len);

    // replace the namespace prefix with the base directory, replace namespace
    // separators with directory separators in the relative class name, append
    // with .php
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    // if the file exists, require it
    if (file_exists($file)) {
        require $file;
    }
});
session_start();

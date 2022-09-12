<?php

namespace Fw\Core\Component;

if (!defined('IN_FW')) {
    exit;
}

class Template
{
    public $id;
    public $__relativePath;
    public $__path;

    public function __construct($id, $page)
    {
        $this->id = $id;
        $this->__relativePath = RELATIVE_COMPONENTS_PATH  . $id . '/templates/' . $page . '/';
    }

    public function render($page = 'template')
    {
        $file = $this->__relativePath . $page . '.php';
        if (file_exists($file)) {
            include($file);
        } else {
            throw new \Exception("Component template $this->id not found!");
        }
    }
}

<?php

namespace Fw\Core\Component;

use Fw\Core\Page;

if (!defined('IN_FW')) {
    exit;
}

class Template
{
    private $__path;
    private $__relativePath;
    private $id;

    public function __construct($id, $page)
    {
        $this->id = $id;
        $this->__relativePath = RELATIVE_COMPONENTS_PATH  . $id . '/templates/' . $page . '/';
    }

    public function render($page = 'template')
    {
        $pager = Page::getInstance();
        if (file_exists($this->__relativePath . 'style.css')) {
            $pager->addCss($this->__relativePath . 'style.css');
        }
        if (file_exists($this->__relativePath . 'script.js')) {
            $pager->addJs($this->__relativePath . 'script.js');
        }
        if (file_exists($this->__relativePath . $page . '.php')) {
            include($this->__relativePath . $page . '.php');
        } else {
            throw new \Exception("Component template $this->id not found!");
        }
    }
}

<?php

namespace Fw\Core\Component;

if (!defined('IN_FW')) {
    exit;
}

abstract class Base
{
    public $result = array();
    public $id;
    protected $params;
    protected $template;
    protected $__path;

    abstract public function executeComponent();

    public function __construct()
    {
    }

}
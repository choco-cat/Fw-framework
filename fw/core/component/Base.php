<?php

namespace Fw\Core\Component;

use Fw\Core\Component\Template;

if (!defined('IN_FW')) {
    exit;
}

abstract class Base
{
    protected $result = array();
    protected $id;
    protected $params;
    protected $template;
    protected $__path;

    abstract public function executeComponent();

    public function __construct($id, $idTemplate, $params)
    {
        $this->template = new \Fw\Core\Component\Template($id, $idTemplate);
        $this->params = $params;
        $this->id = $id;
        $this->__path = RELATIVE_COMPONENTS_PATH . $id;
        $this->result = array();
    }
}

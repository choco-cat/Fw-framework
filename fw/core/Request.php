<?php

namespace Fw\Core;

use Fw\Core\Type\Dictionary;

if (!defined('IN_FW')) {
    exit;
}

class Request extends Dictionary
{
    private $data;

    public function __construct()
    {
        $this->data = $_REQUEST;
    }
}

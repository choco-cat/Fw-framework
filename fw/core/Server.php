<?php

namespace Fw\Core;

use Fw\Core\Type\Dictionary;

if (!defined('IN_FW')) {
    exit;
}

class Server extends Dictionary
{
    public function __construct()
    {
        $this->data = $_SERVER;
    }
}
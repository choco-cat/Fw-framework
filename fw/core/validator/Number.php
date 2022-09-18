<?php

namespace Fw\Core\Validator;

use Fw\Core\Validator\Regexp;

class Number extends Regexp
{
    public function __construct($type, $rule)
    {
        $rule = '#^[0-9]+$#';
        parent::__construct($type, $rule);
    }
}

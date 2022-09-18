<?php

namespace Fw\Core\Validator;

abstract class BaseValidator
{
    protected $rule;
    private $type;

    public function __construct($type, $rule)
    {
        $this->type = $type;
        $this->rule = $rule;
    }

    abstract function validate($value);
}

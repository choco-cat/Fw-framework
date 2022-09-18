<?php

namespace Fw\Core\Validator;

abstract class BaseValidator
{
    private $rule;
    private $type;
    protected $typeValue;

    public function __construct($type, $typeValue)
    {
        $this->type = $type;
        $this->typeValue = $typeValue;
    }
}

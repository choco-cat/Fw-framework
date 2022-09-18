<?php

namespace Fw\Core\Validator;

use Fw\Core\Validator\BaseValidator;

class Regexp extends BaseValidator
{
    public function validate($value)
    {
        return preg_match($this->typeValue, $value, $matches);
    }
}

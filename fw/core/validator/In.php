<?php

namespace Fw\Core\Validator;

use Fw\Core\Validator\BaseValidator;

class In extends BaseValidator
{
    public function validate($value)
    {
        if (!is_array($this->typeValue)) {
            return false;
        }
        return (in_array($value, $this->typeValue));
    }
}

<?php

namespace Fw\Core\Validator;

use Fw\Core\Validator\BaseValidator;

class In extends BaseValidator
{
    public function validate($value)
    {
        if (!is_array($this->rule)) {
            return false;
        }
        return (in_array($value, $this->rule));
    }
}

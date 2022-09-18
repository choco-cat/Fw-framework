<?php

namespace Fw\Core\Validator;

use Fw\Core\Validator\BaseValidator;

class MaxLength extends BaseValidator
{
    public function validate($value) {
        return $this->rule >= strlen($value);
    }
}

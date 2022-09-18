<?php

namespace Fw\Core\Validator;

use Fw\Core\Validator\BaseValidator;

class MinLength extends BaseValidator
{
    public function getName() {
        return 'MinLength';
    }
}

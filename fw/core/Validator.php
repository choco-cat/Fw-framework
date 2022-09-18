<?php

namespace Fw\Core;

use Fw\Core\Validator\ValidatorFactory;

class Validator
{
    private $validator;

    public function __construct($type, $typeValue)
    {
        $this->validator = ValidatorFactory::build($type, $typeValue);
    }

    public function exec($value) {
        echo $this->validator->validate($value);
    }
}

<?php

namespace Fw\Core\Validator;

class ValidatorFactory
{
    private $type;
    private $typeValue;

    public static function build($type,  $typeValue = null)
    {
        $validator = "Fw\\Core\\Validator\\" . ucfirst($type);
        if (class_exists($validator)) {
            return new $validator($type, $typeValue);
        } else {
            throw new \Exception("Неверный тип правила");
        }
    }
}

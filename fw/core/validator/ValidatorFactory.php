<?php

namespace Fw\Core\Validator;

class ValidatorFactory
{
    public static function build($type,  $rule = null)
    {
        $validator = "Fw\\Core\\Validator\\" . ucfirst($type);
        if (class_exists($validator)) {
            return new $validator($type, $rule);
        } else {
            throw new \Exception("Неверный тип правила");
        }
    }
}

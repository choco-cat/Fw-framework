<?php

namespace Fw\Core;

use Fw\Core\Validator\ValidatorFactory;

class Validator
{
    private $validators;
    private $type;
    private $rule;

    public function __construct($type, $rule = true, $validators = [])
    {
        $this->type = $type;
        $this->rule = $rule;
        if ($type === 'chain' && count($validators) > 0) {
            foreach ($validators as $validator) {
                if ($validator instanceof $this) {
                    $this->validators[] = ValidatorFactory::build(
                        $validator->getType(),
                        $validator->getRule()
                    );
                }
            }
        } else {
            $this->validators[] = ValidatorFactory::build($type, $rule);
        }
    }

    public function getType()
    {
        return $this->type;
    }

    public function getRule()
    {
        return $this->rule;
    }

    public function exec($value) {
        $result = true;
        foreach($this->validators as $validator) {
            $result &= $validator->validate($value);
        }
        return $result;
    }
}

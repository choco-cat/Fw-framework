<?php

namespace Fw\Core\Validator;

use Fw\Core\Validator\Regexp;

class Email extends Regexp
{
    public function __construct($type, $rule)
    {
        $rule = '#^([\w]+\.?)+(?<!\.)@(?!\.)[a-zа-я0-9ё\.-]+\.?[a-zа-яё]{2,}$#ui';
        parent::__construct($type, $rule);
    }
}

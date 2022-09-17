<?php

namespace Fw\Core\Type;

use IteratorAggregate;
use ArrayAccess;
use Countable;

if (!defined('IN_FW')) {
    exit;
}

class Dictionary implements IteratorAggregate, ArrayAccess, Countable
{
    protected $data;

    public function getIterator()
    {
        return new \ArrayIterator($this);
    }

    public function count()
    {
        return count($this->data);
    }

    public function offsetExists($offset)
    {
        return isset($this->data[$offset]);
    }

    public function offsetGet($offset)
    {
        return isset($this->data[$offset]) ? $this->data[$offset] : null;
    }

    public function offsetSet($offset, $value)
    {
        if(is_null($offset)) {
            $this->data[] = $value;
        } else {
            $this->data[$offset] = $value;
        }
    }

    public function offsetUnset($offset)
    {
        unset($this->data[$offset]);
    }
}

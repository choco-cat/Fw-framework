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
    public function getIterator()
    {
        return new \ArrayIterator($this);
    }

    public function count()
    {
    }

    public function offsetExists($offset)
    {
        // TODO: Implement offsetExists() method.
    }

    public function offsetGet($offset)
    {
        // TODO: Implement offsetGet() method.
    }

    public function offsetSet($offset, $value)
    {
        // TODO: Implement offsetSet() method.
    }

    public function offsetUnset($offset)
    {
        // TODO: Implement offsetUnset() method.
    }
}

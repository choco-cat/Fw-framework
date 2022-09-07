<?php

namespace Fw\Core;

use Fw\Core\Traits\Singleton;
use \Ds\Set;

if (!defined('IN_FW')) {
    exit;
}

class Page
{
    use Singleton;

    private $properties = [];
    private $headProperties = [];

    const JS_HEAD_MACROS = '#FW_HEAD_JS#';
    const CSS_HEAD_MACROS = '#FW_HEAD_CSS#';
    const STR_HEAD_MACROS = '#FW_HEAD_STR#';

    private function __construct()
    {
        $this->properties[static::JS_HEAD_MACROS] = '';
        $this->properties[static::CSS_HEAD_MACROS] = '';
        $this->properties[static::STR_HEAD_MACROS] = '';
        $this->headProperties[static::JS_HEAD_MACROS] = [];
        $this->headProperties[static::CSS_HEAD_MACROS] = [];
    }

    public function addJs($src)
    {
        if (!in_array($src, $this->headProperties[static::JS_HEAD_MACROS])) {
            $this->headProperties[static::JS_HEAD_MACROS][] = $src;
        }
    }

    public function addCss($src)
    {
        if (!in_array($src, $this->headProperties[static::CSS_HEAD_MACROS])) {
            $this->headProperties[static::CSS_HEAD_MACROS][] = $src;
        }
    }

    public function addString($src)
    {
        $this->properties[static::STR_HEAD_MACROS] .= $src;
    }

    private function embedJs($src)
    {
        return "<script type=\"text/javascript\" src=\"$src\"></script>\r\n";
    }

    private function embedCss($src)
    {
        return "<link type=\"text/css\" rel=\"stylesheet\" href=\"$src\">\r\n";
    }

    public function showHead()
    {
        echo static::JS_HEAD_MACROS;
        echo static::CSS_HEAD_MACROS;
        echo static::STR_HEAD_MACROS;
    }

    public function setProperty($id, $value = '')
    {
        if(!empty($id)) {
            $this->properties[$id] = $value;
        }
    }

    public function getProperty($id)
    {
        return $this->properties[$id] ?? '';
    }

    public function showProperty($id)
    {
        echo $id;
    }

    private function getHeader($type)
    {
        $key = '#FW_HEAD_' . strtoupper($type) . '#';
        if (!isset($this->headProperties[$key])) {
            return;
        }
        $methodName = 'embed' . lcfirst($type);
        if (method_exists($this, $methodName)) {
            $properties = array_map(array($this, $methodName), $this->headProperties[$key]);
        } else {
            $properties = $this->headProperties[$key];
        }
        $this->properties[$key] = implode('', $properties);
    }

    public function getAllReplace()
    {
        $this->getHeader('js');
        $this->getHeader('css');
        return $this->properties;
    }
}

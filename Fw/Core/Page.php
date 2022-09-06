<?php

namespace Fw\Core;

use Fw\Core\Traits\Single;

if (!defined('IN_FW')) {
    exit;
}

class Page
{
    use Single;

    private $properties = [];

    const JS_HEAD_MACROS = '#FW_HEAD_JS#';
    const CSS_HEAD_MACROS = '#FW_HEAD_CSS#';
    const STR_HEAD_MACROS = '#FW_HEAD_STR#';

    private function __construct()
    {
        $this->properties[static::JS_HEAD_MACROS] = '';
        $this->properties[static::CSS_HEAD_MACROS] = '';
        $this->properties[static::STR_HEAD_MACROS] = '';
    }

    public function addJs($src)
    {
        $this->properties[static::JS_HEAD_MACROS] .= $this->embedJs($src);
    }

    public function addCss($src)
    {
        $this->properties[static::CSS_HEAD_MACROS] .= $this->embedCss($src);
    }

    public function addString($src)
    {
        $this->properties[static::STR_HEAD_MACROS] .= $src;
    }

    private function embedJs($src)
    {
        return '<script type="text/javascript" src="' . $src . '"></script>';
    }

    private function embedCss($src)
    {
        return '<link type="text/css" rel="stylesheet" href="' . $src . '">';
    }

    public static function showHead()
    {
        echo static::JS_HEAD_MACROS;
        echo static::CSS_HEAD_MACROS;
        echo static::STR_HEAD_MACROS;
    }

    public function setProperty($id, $value)
    {

    }

    public function getProperty($src)
    {

    }

    public function showProperty($src)
    {

    }

    public function getAllReplace()
    {
        return $this->properties;
    }
}
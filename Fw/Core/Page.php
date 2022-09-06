<?php

namespace Fw\Core;

use Fw\Core\Traits\Single;

if (!defined('IN_FW')) {
    exit;
}

class Page
{
    use Single;

    private static $properties = [];
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
    }

    public function addJs($src)
    {
        $this->headProperties[static::JS_HEAD_MACROS][] = $src;
    }

    public function addCss($src)
    {
        $this->headProperties[static::CSS_HEAD_MACROS][] = $src;
    }

    public function addString($src)
    {
        $this->properties[static::STR_HEAD_MACROS] .= $src;
    }

    public static function insertTag($tag, $content)
    {
        echo "<$tag>$content</$tag>";
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

    public function setProperty($id, $value = '')
    {
        if(!empty($id)) {
            self::$properties[$id] = $value;
        }
    }

    public static function getProperty($id)
    {
        return self::$properties[$id] ?? '';
    }

    public static function showProperty($id)
    {
        echo self::getProperty($id);
    }

    public function getAllReplace()
    {
        $propertiesJsUniq = array_unique($this->headProperties[static::JS_HEAD_MACROS]);
        $propertiesJs = array_map(array($this, 'embedJs'), $propertiesJsUniq);
        $this->properties[static::JS_HEAD_MACROS] = implode('', $propertiesJs);
        $propertiesCssUniq = array_unique($this->headProperties[static::CSS_HEAD_MACROS]);
        $propertiesCss= array_map(array($this, 'embedCss'), $propertiesCssUniq);
        $this->properties[static::CSS_HEAD_MACROS] = implode('', $propertiesCss);
        return $this->properties;
    }
}

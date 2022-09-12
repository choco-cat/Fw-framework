<?php

namespace Fw\Core;

use Fw\Core\Traits\Singleton;

if (!defined('IN_FW')) {
    exit;
}

class Page
{
    use Singleton;

    private $properties = [];
    private $headProperties = [];

    private function __construct()
    {
        $this->setProperty(JS_HEAD_KEY);
        $this->setProperty(CSS_HEAD_KEY);
        $this->setProperty(STR_HEAD_KEY);
        $this->headProperties[JS_HEAD_KEY] = [];
        $this->headProperties[CSS_HEAD_KEY] = [];
    }

    public function getUniqueKey($src)
    {
       return md5($src);
    }

    public function addJs($src)
    {
        $key = $this->getUniqueKey($src);
        $this->headProperties[JS_HEAD_KEY][$key] = $src;
    }

    public function addCss($src)
    {
        $key = $this->getUniqueKey($src);
        $this->headProperties[CSS_HEAD_KEY][$key] = $src;
    }

    public function addString($src)
    {
        $str = $this->getProperty(STR_HEAD_KEY);
        $this->setProperty(STR_HEAD_KEY,  $str . $src);
    }

    private function embedJs($src)
    {
        return "<script type=\"text/javascript\" src=\"" . $src . "\"></script>\r\n";
    }

    private function embedCss($src)
    {
        return "<link type=\"text/css\" rel=\"stylesheet\" href=\"$src\">\r\n";
    }

    public function showHead()
    {
        $this->showProperty(JS_HEAD_KEY);
        $this->showProperty(CSS_HEAD_KEY);
        $this->showProperty(STR_HEAD_KEY);
    }

    public function createPropertyId($id)
    {
        return SYMBOL_START .strtoupper($id) . SYMBOL_END;
    }

    public function setProperty($id, $value = '')
    {
        if(!empty($id)) {
            $this->properties[$this->createPropertyId($id)] = $value;
        }
    }

    public function getProperty($id)
    {
        return $this->properties[$this->createPropertyId($id)] ?? '';
    }

    public function showProperty($id)
    {
        echo $this->createPropertyId($id);
    }

    private function glueArray($key)
    {
        if (!isset($this->headProperties[$key])) {
            return;
        }
        $parts = explode('_', $key);
        $type = $parts[1] ?? '';
        $methodName = 'embed' . ucfirst($type);
        if (method_exists($this, $methodName)) {
            $properties = array_map(array($this, $methodName), $this->headProperties[$key]);
        } else {
            $properties = $this->headProperties[$key];
        }
        $this->properties[$this->createPropertyId($key)] = implode('', $properties);
    }

    public function getAllReplace()
    {
        $this->glueArray(JS_HEAD_KEY);
        $this->glueArray(CSS_HEAD_KEY);
        return $this->properties;
    }
}

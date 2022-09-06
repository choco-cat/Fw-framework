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

    private function __construct()
    {
        $this->properties['#FW_HEAD_JS#'] = '';
        $this->properties['#FW_HEAD_CSS#'] = '';
        $this->properties['#FW_HEAD_STR#'] = '';
    }

    public function addJs($src)
    {
        $this->properties['#FW_HEAD_JS#'] .= $this->embedJs($src);
    }

    public function addCss($src)
    {
        $this->properties['#FW_HEAD_CSS#'] .= $this->embedCss($src);
    }

    public function addStr($src)
    {
        $this->properties['#FW_HEAD_STR#'] .= $src;
    }

    private function embedJs($src)
    {
        return '<script type="text/javascript" src="' . $src . '"></script>';
    }

    private function embedCss($src)
    {
        return '<link type="text/css" rel="stylesheet" href="' . $src . '">';
    }

    public function showHead()
    {
        echo '#FW_HEAD_JS#';
        echo '#FW_HEAD_CSS#';
        echo '#FW_HEAD_STR#';
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

<?php
/**
 * Base app class
 */
namespace Fw\Core;

use Fw\Core\Traits\Single;

if (!defined('IN_FW')) {
    exit;
}

final class Application
{
    use Single;

    private $components = [];
    private $pager = null;
    private $template = null;
}

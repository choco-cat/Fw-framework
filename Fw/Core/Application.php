<?php
/**
 * Base app class
 */
namespace Fw\Core;

use Fw\Core\Traits\Single;

final class Application
{
    use Single;

    private $components = [];
    private $pager = null;
    private $template = null;
}

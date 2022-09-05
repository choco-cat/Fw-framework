<?php

use Fw\Core\Application;
use Fw\Core\Config;

include './Fw/init.php';
$app = Application::getInstance();
$config = Config::getInstance();
echo $config->get('db/login');
echo '<br>';
echo $config->get('site/path');

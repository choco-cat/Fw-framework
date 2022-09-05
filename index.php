<?php

use Fw\Core\Config;

include './Fw/init.php';
$config = Config::getInstance();
echo $config->get('db/login');
echo '<br>';
echo $config->get('site/path');

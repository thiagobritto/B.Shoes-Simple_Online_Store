<?php

use \Slim\App;
use \Src\AppClass\SlimConfig;

require_once '../src/config.php';

$app = new App( SlimConfig::slimConfig() );

require_once ROOT . '/routes/routes.php';

$app->run();

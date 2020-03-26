<?php

use Slim\Slim;

require_once __DIR__ . '/../App/Controller/config.php';

$app = new Slim;

require_once ROOT . '/App/Routes/main.php';

$app->run();


<?php 

use \App\Controller\Home;

$app->get( '/', Home::class . ':index' );

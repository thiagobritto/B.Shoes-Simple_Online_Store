<?php 

/* REQUIRES */
use \App\Controller\Home;

/* ROUTES */
$app->get( '/', Home::class . ':index' );

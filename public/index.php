<?php 

/* Use */
use \Slim\App;
use \Src\AppClass\SlimConfig;

/* PSR-4 autoload */
require_once '../src/config.php';

/* Init Slim 3 */
$app = new App( SlimConfig::slimConfig() );

require_once ROOT . '/routes/routes.php';

/* End Slim 3 */
$app->run();

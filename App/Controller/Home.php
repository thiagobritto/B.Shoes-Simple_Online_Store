<?php 

namespace App\Controller;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Src\AppClass\TplView;

class Home
{
	public function index( Request $request, Response $response, array $args )
	{
		$tpl = new TplView;
		$page =  $tpl->draw( "index" );
		$response->getBody()->write( implode( "\n\n", $page ) );
	}
}

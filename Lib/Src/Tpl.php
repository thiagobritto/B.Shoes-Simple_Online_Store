<?php 

namespace Lib\Src;

use \Twig\Loader\FilesystemLoader;
use \Twig\Environment;

class Tpl
{
	private $pathDefault = [
		"header" => true,
		"footer" => true,
		"path"   => "App/View/site" 
	];

	public function __construct( array $path=[] )
	{
		$this->pathDefault = array_merge($this->pathDefault, $path);
		($this->pathDefault['header']) ? $this->draw('header') : 0 ; 		
	}

	public function draw( $index, array $params=[] )
	{
		$loader = new FilesystemLoader(ROOT . "/{$this->pathDefault['path']}");
		$twig = new Environment($loader, [
			//'cache' => '/path/to/compilation_cache',
		]);
		$template = $twig->load("{$index}.html");
		
		echo str_replace("__SITE__", SITE, $template->render($params));
	}

	public function __destruct()
	{
		($this->pathDefault['footer']) ? $this->draw('footer') : 0 ;
	}
}

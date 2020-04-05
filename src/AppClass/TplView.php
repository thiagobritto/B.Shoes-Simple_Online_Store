<?php 

namespace Src\AppClass;

use \Twig\Loader\FilesystemLoader;
use \Twig\Environment;

class TplView
{	
	protected $path = [
		"header" => true,
		"footer" => true,
		"path" => "resource/views/site"
	];

	protected $page = [];

	public function __construct( array $path=[] )
	{
		$this->path = array_merge( $this->path, $path );
	}
	
	private function setView( string $file, array $param=[])
	{
		$loader = new FilesystemLoader( ROOT . DS . $this->path['path'] );
		$twig = new Environment( $loader, [
			//"cache" => ROOT.DS."resource/cache",
		]);
		
		$template = $twig->load( "{$file}.html" );
		
		$content = $template->render( $param );
		
		return str_replace( "__SITE__", SITE, $content ); 
	}

	//echo str_replace('#site#', SITE, $content);
	public function draw( string $file, array $param=[] )
	{
		$this->page[] = $this->setView( $file, $param ); 
	
		if ($this->path["header"])
		{
			array_unshift( $this->page, $this->setView( 'header', $param ) );
		}
		if ( $this->path["footer"] ){	
			array_push( $this->page, $this->setView( 'footer', $param ) );
		}

		return $this->page;
	}
	
}

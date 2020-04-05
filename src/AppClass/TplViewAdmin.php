<?php 

namespace Src\AppClass;

class TplViewAdmin extends TplView
{
	public function __construct( array $path=[] )
	{
		$path = array_merge( ["path"=>'resource/views/admin'], $path );
		parent::__construct($path);
	}
}
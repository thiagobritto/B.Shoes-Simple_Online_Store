<?php 

namespace Lib\Src;

use \Lib\Faces\Sql as FaceSql;

class Sql implements FaceSql
{
	public function __construct()
	{
		echo "string";
	}
	
	public function create()
	{
		echo "create";
	}
}

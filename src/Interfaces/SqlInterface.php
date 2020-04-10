<?php 

namespace Src\Interfaces;

interface SqlInterface
{
	public function select( string $querySql, array $dataKeyValue );
	public function selectAll( string $querySql, array $dataKeyValue );
	public function query( string $querySql, array $dataKeyValue );
}
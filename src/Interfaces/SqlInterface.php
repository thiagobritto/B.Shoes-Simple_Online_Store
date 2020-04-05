<?php 

namespace Src\Interfaces;

interface SqlInterface
{
	public function select( string $query, array $params );
	public function selectAll( string $query, array $params );
	public function query( string $query, array $params );
}
<?php 

namespace Src\DataBase;

/**
* abstract Class MethodModify 
* gerencias os setting and gettings
* 
* @author Thiago Britto
* @copyright MIT 2020, Thiago Britto
* @version 1.0
* @package \Src\DataBase\MethodModify;
*/

abstract class MethodModify
{
	/**
	* Guarda dados de yabelas do 
	* banco de forma privada
	* 
	* @access private
	* @var array $params
	*/

	private $params=[];

	/**
	* Função especial do PHP 
	* 
	* @access public
	* @param string $name
	* @param array $params
	* @return mixed
	*/

	public function __call( string $name, array $params )
	{
		$action = substr( trim( $name ) , 0, 3 );
		$actionName = substr( trim( $name ) , 3, strlen( $name ) );
		switch ( $action )
		{
			case 'set':
				$this->params[$actionName] = $params[0];
				break;
			case 'get':
				return $this->params[$actionName] ?? [];
				break;
			default:
				return [];
				break;
		}

	} // end __call()

	/**
	* A Função recebe dados em foma de aray para 
	* serem tratados pela function __call()  
	* 
	* @access protected
	* @param array $params
	* @return void
	*/

	protected function setData( array $params )
	{
		foreach ( $params as $key => $value )
		{
			$this->{ "set" . $key }( $value );
		}

	} // end setData()

	/**
	* A Função retorna os dados 
	* já encapsulados pela classe  
	* 
	* @access public
	* @param int $opt
	* @return array/object
	*/

	public function getAll( int $opt=\PDO::FETCH_ASSOC )
	{
		if( $opt === \PDO::FETCH_OBJ )
		{
			return ( object ) $this->params;
		} elseif ( $opt === \PDO::FETCH_ASSOC ) {
			return ( array ) $this->params;
		}
		
	} // end getAll()

} // end class MethodModify

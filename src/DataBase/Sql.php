<?php 

namespace Src\DataBase;

/**
* Class para consulta ao banco de dados
* 
* @author Thiago Britto
* @copyright MIT 2020, Thiago Britto
* @version 1.0
* @package \Src\DataBase\Sql;
*/

use \Src\Interfaces\SqlInterface;

class Sql extends MethodModify implements SqlInterface
{
	/**
	* $conn guarda a Conexão Singleton 
	* @access private
	* @var $conn
	*/

	private $conn;

	/**
	* construtor da class pega a conexão 
	* e seta na propriedade $conn 
	* 
	* @access public
	* @return void
	*/

	public function __construct()
	{
		$this->conn = Connect::conn();
	} // end __construct()

	/**
	* Procedimento para buacar registro 
	* no banco da dados 
	* 
	* @access public
	* @param string $name 
	* @param array $params
	* @return void
	*/

	public function select( string $query, array $params=[] )
	{
		try {
			$stmt = $this->conn->prepare( $query );
			$stmt->execute( $params );
			$this->setData( $stmt->fetch( \PDO::FETCH_ASSOC ) );		
		} catch (\PDOException  $e) {
			echo json_encode([
				"message" => $e->getMessage(),
				"line" => $e->getLine(),
				"file" => $e->getFile(),
				"code" => $e->getCode()
			]);
		}
	} // end select()

	/**
	* Procedimento para buacar registros 
	* no banco da dados 
	* 
	* @access public
	* @param string $name
	* @param array $params
	* @return void
	*/

	public function selectAll( string $query, array $params=[] )
	{
		try {
			$stmt = $this->conn->prepare( $query );
			$stmt->execute( $params );
			$this->setData( $stmt->fetchAll( \PDO::FETCH_ASSOC ) );
		} catch (\Exception  $e) {
			echo json_encode([
				"message" => $e->getMessage(),
				"line" => $e->getLine(),
				"file" => $e->getFile(),
				"code" => $e->getCode()
			]);
		}
	} // end selectAll()

	/**
	* Função insert, update, delete 
	* registros no banco da dados 
	* 
	* @access public
	* @param string $name
	* @param array $params
	* @return boolean
	*/

	public function query( string $query, array $params )
	{
		try {
			$this->queryVerify( $query );
			$stmt = $this->conn->prepare( $query );
			$response = $this->setParams( $stmt, $params );
			if( !$response ){
				throw new \Exception("Error ao tentar executar $query !");
				return false;
				exit;
			}
			return true;
		} catch (\Exception  $e) {
			echo json_encode([
				"message" => $e->getMessage(),
				"line" => $e->getLine(),
				"file" => $e->getFile(),
				"code" => $e->getCode()
			]);
		}
	} // end insert()

	/**
	* Função agrega funcionalidades 
	* a Sql::query()
	* 
	* @access private
	* @param string $query
	* @param array $params
	* @return boolean
	*/

	private function setParams( object $stmt, array $params )
	{
		if( $params && !empty($params) && isset($params) )
		{
			foreach ( $params as $key => $value ) 
			{
				$stmt->bindValue( $key, $value, \PDO::PARAM_STR );
			}
			return $stmt->execute();
		} else {
			return false;
		}
	} // end setParams()

	/**
	* Função agrega funcionalidades 
	* a Sql::query()
	* 
	* @access private
	* @param string $query
	* @return boolean
	*/

	private function queryVerify( string $query )
	{
		if( strripos( $query, 'PDATE' ) || strripos( $query, 'ELETE' ) )
		{
			if( !strripos( $query, 'WHERE' ) )
			{
				throw new \Exception("Error em: '{$query}', sentimos a falta de um 'WHERE'");
				return false;
				exit;
			}
		}
	} // end qheryVerify()

} // end class Sql

<?php
 
// primeira configuração
session_start();

// definindo separador de diretorios
define('DS', DIRECTORY_SEPARATOR);

// Raiz do servidor ex: 'C:/xampp/htdocs'
/* remover |.DS.'site'| 
   quando em produção					   */ 
define('ROOT', $_SERVER['DOCUMENT_ROOT']);

// Dominio do servidor ex: 'http://localhost/site'
/* remover |.'/site'| 
   quando em produção					   */ 
define('SITE', $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME']);

// definindo const do database
define('MYDB', 'test');
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');

// definindo chaver de criptografia
define('SECERT_IV', pack('a16', 'exemplo-1'));
define('SECERT', 	pack('a16', 'ezemplo-2'));

// autoload do composer
require_once ROOT . '/vendor/autoload.php';

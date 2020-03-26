<?php 

use \Lib\Src\Tpl;

$app->get('/', function(){
	
	$tpl = new Tpl;
	$tpl->draw('home');

});

$app->get('/single/:id', function($id){
	
	$data['id'] = $id;

	$tpl = new Tpl;
	$tpl->draw('single', $data);

});

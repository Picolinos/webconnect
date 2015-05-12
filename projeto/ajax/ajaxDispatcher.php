<?php 

session_start();
require_once  '../classes/includes.php';
$metodo = $_REQUEST['metodo'];
$classe = $_REQUEST['classe'];

//$retorno   = $classe::$metodo($_REQUEST);

$handler = array( $classe,$metodo);
$params = array($_REQUEST);

if (!class_exists($classe)) {
	echo  "A classe ".$classe." n�o existe!";
	die();
}else{
	if(!method_exists($classe,$metodo)){
		echo  "O metodo ".$metodo." nao existe na Classe: ".$classe;
		die();
	}
}

if ( is_callable($handler) ) {
	$retorno = call_user_func_array( $handler , $params );	
}





function utf8_encode_deep(&$input) {
	if (is_string($input)) {
		$input = utf8_encode($input);
	} else if (is_array($input)) {
		foreach ($input as &$value) {
			utf8_encode_deep($value);
		}
		unset($value);
	} else if (is_object($input)) {
		$vars = array_keys(get_object_vars($input));
		foreach ($vars as $var) {
			utf8_encode_deep($input->$var);
		}
	}
}

utf8_encode_deep($retorno);
echo json_encode($retorno);
?>
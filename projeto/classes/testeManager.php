<?php
include_once 'entity.php';
include_once 'dbManager.php'; 
	$usuario = new Usuario();
	$usuario->login = 'teste';
 	$usuario->senha = 'teste';
 	$usuario->id_pessoa_fisica = 1;
 	dbManager::persist($usuario);
 
 
?>
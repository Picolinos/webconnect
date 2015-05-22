<?php

class eventoBusiness 

{

	public static function getUserByLoginAndPass($args) {
		$login = $args['login'];
		$senha = $args['senha'];
		$sql = "Select * from usuarios where login = '".$login."' and senha = '".$senha."'";
		$rs = dbManager::returnDescription($sql,new Usuarios());
		return $rs;
	}
	public static function persistUser($args) {
		$user = null;
		if($user['id_user'] != ""){ 
			$user = dbManager::getEntityByFilter(new Usuarios(), $id_user);
		}else{
			$user = new Usuario();
		}
		$nome = $args['nome'];
		$login = $args['login'];
		$email = $args['email'];
		$senha = $args['senha'];
		$user->nome = $nome;
		$user->senha = $senha;
		$user->login = $login;
		$user->email = $email;
		dbManager::persist($user);
		return $user;
	}
}
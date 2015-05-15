<?php

class eventoBusiness 

{

	public static function getEventos() {

		$sql = "select * from eventos "; 

		$rs = dbManager::getArrayObj($sql);

		return $rs;

	}

	public static function getAllEventosOrder($args){

		$sql = "SELECT * FROM `eventos` order by data_evento asc";

		$rs = dbManager::getArrayObj($sql);

		return $rs;

	

	}

	public static function persistEvento($args){

		$evento = null;

		if($args['id_evento'] != ""){ 

			$evento = dbManager::getEntityByFilter(new Evento(), $id_evento);

		}else{

			$evento = new Evento();

		}

		$var = $args['data_evento'];

		$date = str_replace('/', '-', $var);



		$evento->desc_evento = $args["desc_evento"];

		$evento->data_evento = date('Y-m-d', strtotime($date));; 

		dbManager::persist($evento);

		return $evento;

	}

	

	public static function excluirEvento($args){

		$id_evento = $args['id_evento'];

		$rs = empresaBusiness::getAllEmpresasByEvento($id_evento);

		if($rs == false) {

				dbManager::deleteByFilter(new Evento(), ' id_evento =  '.$id_evento);

				return true;

			}else{

				return false;

			}

		}

	}



?>

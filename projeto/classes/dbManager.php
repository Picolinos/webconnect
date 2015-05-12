<?php

include_once 'entity_class.php';

include_once 'entity.php';

 

class dbManager 

{

	public static function connection(){

		$server = "localhost:3310";

		$dbname='u846799235_wc'; 

		

		$usuario="u846799235_pico"; 

		$password="senac2015";



		 

		

		//1º passo – Conecta ao servidor MySQL 

		if(!($conexao = mysql_connect($server,$usuario,$password)))

		{

		   echo "Não foi possível estabelecer uma conexão com o gerenciador MySQL. Favor Contactar o Administrador.";

		   exit;

		} 

		//2º passo – Seleciona o Banco de Dados 

		if(!($con=mysql_select_db($dbname,$conexao))) { 

		   echo "Não foi possível estabelecer uma conexão com o gerenciador MySQL. Favor Contactar o Administrador.";

		   exit; 

		} 

		mysql_query("SET NAMES utf8");

	

	}

 

	public static function getArrayObj($sql , $objeto_class = "") {

		self::connection();

	

		$rs = mysql_query($sql);

		if($rs){

			$count = mysql_num_rows($rs);

			if($count > 0){

				while($row = mysql_fetch_object($rs)){

					if($objeto_class == '')

						$object = new stdClass();

					else

						eval('$object = new '.get_class($objeto_class).'();');

					foreach ($row as $key => $value)

					{

						$object->$key = utf8_decode($value);

					}

					

					$array[] = $object;

				}

				return  $array;

			}else{

				return false;

			}

		}else{

			return false;			

		}

	

	}

	public static function persist(Entity $objeto){

		self::connection();

		$primary = $objeto->getPrimaryKey();

		$tabela =  $objeto->getTableName();

		$keys = $objeto->getColumns();

		if( $objeto->{$primary} != null ){

		//edit

			

			foreach($keys as $row){

				if(!is_int( $objeto->{$row}  )){

					$aspasP = "'";

				}

				if($objeto->{$row} !== null){

					$set .= $row ." =  ".$aspasP.$objeto->{$row}.$aspasP." , ";

				}

				$aspasP = "";

				

			}

			$set = substr_replace($set ,"",-3);

			

			$sql = "UPDATE $tabela SET $set 

			

			WHERE ($primary = ".$objeto->{$primary}." )";

			mysql_query($sql);

			return self::getEntityByPrimaryKey($objeto, $objeto->{$primary});

			

		}else{

			//insert

			

			foreach($keys as $row){

				if($objeto->{$row} != null ){

					$colunas .= $row." , ";

				}

			

			}

			foreach($keys as $row){

				if($objeto->{$row} != null){

					if(!is_int ($objeto->{$row})){

						$aspas = "'";

					}

					$valores .= $aspas.$objeto->{$row}.$aspas." , ";

				}

			

			}

			



			$colunas = substr_replace($colunas ,"",-3);

			$valores = substr_replace($valores ,"",-3);

			$sql = "insert into $tabela ($colunas) VALUES ($valores)";

			mysql_query($sql);

			

			return self::getEntityByLastValueOfTabela($objeto);

		}

		

		

	}

 

	public  static function returnDescription($sql , Entity $objeto = null){

		$linha = self::getArrayObj($sql);

		if($linha != false){

			$rs =  $linha[0];

			$obj = self::objectToObject($rs, get_class($objeto));

			return $obj;

		}

		

		return 	false;

	}

	public static function deleteByFilter(Entity $objeto , $filter){

		$tabela = $objeto->getTableName();

		if($filter != ""){

			$sql = " DELETE FROM `$tabela` WHERE ($filter) ";

		}

		self::connection();

		$rs = mysql_query($sql);

	}

	public static function getEntityByFilter(Entity $objeto , $filter){

		 

		$tabela = $objeto->getTableName();

		$sql = "select * from $tabela where $filter    ";

		$rs = self::getArrayObj($sql , $objeto);

		

		return $rs;

	

	}

	public static function getEntityByPrimaryKey(Entity $objeto , $primaryKeyValue){

		$primaryKey = $objeto->getPrimaryKey();

		$tabela = $objeto->getTableName();

		$sql = "select * from $tabela where $primaryKey  =  '$primaryKeyValue' ";

		$rs = self::returnDescription($sql,$objeto);

		$obj = self::objectToObject($rs, get_class($objeto));

		return $obj;

		

	}

	public static  function objectToObject($instance, $className) {

		return unserialize(sprintf(

				'O:%d:"%s"%s',

				strlen($className),

				$className,

				strstr(strstr(serialize($instance), '"'), ':')

		));

	}

	public static function getEntityByLastValueOfTabela(Entity $objeto){

		$primaryKey = $objeto->getPrimaryKey();

		$tabela =  $objeto->getTableName();

		$sql = "select * from $tabela order by $primaryKey desc limit 1";

		$rs = self::returnDescription($sql , $objeto);

		return $rs;

		

	}

	

}

?>
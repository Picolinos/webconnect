<?php 
include_once 'dbManager.php';
$sql = "SELECT * FROM information_schema.TABLES where TABLE_SCHEMA = 'retrospectiva'";
$tabelas = dbManager::getArrayObj($sql);
$texto = "<?   include_once 'entity_class.php'; \n";
foreach($tabelas as $key=>$value) 
{ 

	$ClassName = $value->TABLE_NAME;
	$ClassName = str_replace("_"," ",$ClassName);
	$ClassName = ucwords($ClassName);
	$ClassName = str_replace(" ","",$ClassName);

	$texto .= " \nclass ".$ClassName."  extends Entity {";

	//colunas = atributos
	$sql = "select * from information_schema.COLUMNS where TABLE_NAME = '$value->TABLE_NAME'";
	$colunas =   dbManager::getArrayObj($sql);
	$primary = "";
	foreach($colunas as $index=>$valor)
	{
		
		$texto .= "\n  public $".$valor->COLUMN_NAME." = null;";
		if($valor->COLUMN_KEY == 'PRI'){
			$primary = $valor->COLUMN_NAME;
		}
	}
	$texto .= "\n  public static function getTableName(){ \n     return  '".$value->TABLE_NAME."'; \n   }";
	$texto .= "\n  public static function getPrimaryKey(){\n     return   '".$primary."'; \n   }";
	$texto .= "\n".'  public static function getColumns(){'."\n".'   return array_keys(get_class_vars(get_class($this))); '."\n".'   }';
	
	$texto .= " \n}; ";
	

}
$texto .= '?>';
$fp = fopen("entity.php","wb");
fwrite($fp,$texto);
fclose($fp);
echo "Criado com sucesso!";
?>
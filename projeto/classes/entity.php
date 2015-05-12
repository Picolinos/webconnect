<?php

include_once 'entity_class.php';  
class Evento  extends Entity {
  public $id_evento = null;
  public $desc_evento = null;
  public $data_evento = null;
  public static function getTableName(){ 
     return  'evento'; 
   }
  public static function getPrimaryKey(){
     return   'id_evento'; 
   }
  public static function getColumns(){
   return array_keys(get_class_vars(get_class($this))); 
   } 
}; ?>
<?   include_once 'entity_class.php'; 
 
class Avalaicao  extends Entity {
  public $id_avaliacao = null;
  public $id_usuario = null;
  public $id_evento = null;
  public $id_empresa = null;
  public $valor_avaliacao = null;
  public $comentario = null;
  public static function getTableName(){ 
     return  'avalaicao'; 
   }
  public static function getPrimaryKey(){
     return   'id_avaliacao'; 
   }
  public static function getColumns(){
   return array_keys(get_class_vars(get_class($this))); 
   } 
};  
class Categorias  extends Entity {
  public $id_categoria = null;
  public $nome = null;
  public static function getTableName(){ 
     return  'categorias'; 
   }
  public static function getPrimaryKey(){
     return   'id_categoria'; 
   }
  public static function getColumns(){
   return array_keys(get_class_vars(get_class($this))); 
   } 
};  
class Empresa  extends Entity {
  public $id_empresa = null;
  public $nome = null;
  public $coordenada_x = null;
  public $coordenada_y = null;
  public $descricao = null;
  public $telefone = null;
  public static function getTableName(){ 
     return  'empresa'; 
   }
  public static function getPrimaryKey(){
     return   'id_empresa'; 
   }
  public static function getColumns(){
   return array_keys(get_class_vars(get_class($this))); 
   } 
};  
class Eventos  extends Entity {
  public $id_evento = null;
  public $coordenada_x = null;
  public $coordenada_y = null;
  public $Nome = null;
  public $descricao = null;
  public $id_empresa = null;
  public $id_categoria = null;
  public static function getTableName(){ 
     return  'eventos'; 
   }
  public static function getPrimaryKey(){
     return   'id_evento'; 
   }
  public static function getColumns(){
   return array_keys(get_class_vars(get_class($this))); 
   } 
};  
class Favoritos  extends Entity {
  public $id_usuario = null;
  public $id_evento = null;
  public $id_empresa = null;
  public static function getTableName(){ 
     return  'favoritos'; 
   }
  public static function getPrimaryKey(){
     return   ''; 
   }
  public static function getColumns(){
   return array_keys(get_class_vars(get_class($this))); 
   } 
};  
class Usuarios  extends Entity {
  public $id_usuario = null;
  public $nome = null;
  public $login = null;
  public $senha = null;
  public $email = null;
  public static function getTableName(){ 
     return  'usuarios'; 
   }
  public static function getPrimaryKey(){
     return   'id_usuario'; 
   }
  public static function getColumns(){
   return array_keys(get_class_vars(get_class($this))); 
   } 
}; ?>
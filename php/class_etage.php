<?php include "databaseobject.class.php" ?>
<?php

class Monstre extends DatabaseObject {

    static public $table_name='etage';
    static public $db_columns= ['ID_Etag' , 'Num_Etag' , 'Difficult' , 'ID_Dun'];

    public function ajouter() {
      $this->validate();
      if(!empty($this->errors)) { return false; }

      $attributes = $this->sanitized_attributes();
      $sql = "INSERT INTO " . static::$table_name . " (";
      $sql .= join(', ', array_keys($attributes));
      $sql .= ") VALUES ('";
      $sql .= join("', '", array_values($attributes));
      $sql .= "')";
      $result = self::$database->query($sql);

      if(!$result) {
        die("Query Failed");
      }else {
        $this->ID_Etag = self::$database->insert_id;
      }
      return $result;
    }


    public function delete() {
      $sql  = "DELETE FROM " . static::$table_name . " ";
      $sql .= "WHERE  " .static::$db_columns['0']. " = '" . self::$database->escape_string($this->ID_Etag) . "' ";
      $sql .= "LIMIT 1";
      $result = self::$database->query($sql);
      return $result;
    }

  public $ID_Etag;
  public $Num_Etage;
  public $Difficult;
  public $ID_Dun;

  function __construct($args=[])
  {
    $this->ID_Etag=$args['ID_Etag'] ?? '';
    $this->Num_Etag=$args['Num_Etag'] ?? '';
    $this->Difficult=$args['Difficult'] ?? '';
    $this->ID_Dun=$args['ID_Dun'] ?? '';
  }
  public function name(){
    return "{$this->Num_Etag} Etage";
  }

  public function validate() {
    $this->errors = [];
    if(is_blank($this->Num_Etag)) {
      $this->errors[] = "Le num de l'etage ne peut pas etre vide.";
    }

    if(is_blank($this->Difficult)) {
      $this->errors[] = "La Difficulté ne peut pas etre vide.";
    }
    if(is_blank($this->ID_Dun)) {
      $this->errors[] = "Veuiller choisir le Dungeon.";
    }
    return $this->errors;
  }
}


?>

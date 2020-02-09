<?php include "databaseobject.class.php" ?>
<?php

class Dungeon extends DatabaseObject {

    static public $table_name='dungeon';
    static public $db_columns= ['ID_Dun' , 'Nom_Dun' , 'Width_Dun' , 'Height_Dun' , 'difficult_Dun' , 'Duree' , 'ID_Mond'];

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

      if($result) {
        $this->ID_Dun = self::$database->insert_id;
      }else {
        die("Query Failed");
      }
      return $result;
    }


    public function delete() {
      $sql  = "DELETE FROM " . static::$table_name . " ";
      $sql .= "WHERE  " .static::$db_columns['0']. " = '" . self::$database->escape_string($this->ID_Dun) . "' ";
      $sql .= "LIMIT 1";
      $result = self::$database->query($sql);
      return $result;
    }

  public $ID_Dun;
  public $Nom_Dun;
  public $Width_Dun;
  public $Height_Dun;
  public $difficult_Dun;
  public $Duree;
  public $ID_Mond;

  function __construct($args=[])
  {
    $this->Nom_Dun=$args['Nom_Dun'] ?? '';
    $this->Width_Dun=$args['Width_Dun'] ?? '';
    $this->Height_Dun=$args['Height_Dun'] ?? '';
    $this->difficult_Dun=$args['difficult_Dun'] ?? '';
    $this->Duree=$args['Duree'] ?? '';
    $this->ID_Mond=$args['ID_Mond'] ?? '';
  }
  public function name(){
    return "{$this->ID_Dun} - {$this->Nom_Dun}";
  }

  public function validate() {
    $this->errors = [];
    if(is_blank($this->Nom_Dun)) {
      $this->errors[] = "Le Nom du dungeon ne peut pas etre vide.";
    }

    if(is_blank($this->Width_Dun)) {
      $this->errors[] = "Lalargeur du dungeon ne peut pas etre vide.";
    }

    if(is_blank($this->Height_Dun)) {
      $this->errors[] = "La hauter du dungeon ne peut pas etre vide.";
    }

    if(is_blank($this->difficult_Dun)) {
      $this->errors[] = "La Difficulté ne peut pas etre vide.";
    }

    if(is_blank($this->Duree)) {
      $this->errors[] = "La duree ne peut pas etre vide.";
    }

    if(is_blank($this->ID_Mond)) {
      $this->errors[] = "Selectioné un Monde.";
    }
    return $this->errors;
  }
}


?>

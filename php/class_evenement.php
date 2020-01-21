<?php include "databaseobject.class.php" ?>
<?php

class Evenement extends DatabaseObject {

    static public $table_name='evenement';
    static public $db_columns= ['ID_Event' , 'Nom_Event' , 'Date_Debut_Event' , 'Date_Fin_Event' , 'Min_Level' , 'ID_Mond'];

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
        $this->ID_Event = self::$database->insert_id;
      }
      return $result;
    }


    public function delete() {
      $sql  = "DELETE FROM " . static::$table_name . " ";
      $sql .= "WHERE  " .static::$db_columns['0']. " = '" . self::$database->escape_string($this->ID_Event) . "' ";
      $sql .= "LIMIT 1";
      $result = self::$database->query($sql);
      return $result;
    }

  public $ID_Event;
  public $Nom_Event;
  public $Date_Debut_Event;
  public $Date_Fin_Event;
  public $Min_Level;
  public $ID_Mond;

  function __construct($args=[])
  {
    $this->ID_Event=$args['ID_Event'] ?? '';
    $this->Nom_Event=$args['Nom_Event'] ?? '';
    $this->Date_Debut_Event=$args['Date_Debut_Event'] ?? '';
    $this->Date_Fin_Event=$args['Date_Fin_Event'] ?? '';
    $this->Min_Level=$args['Min_Level'] ?? '';
    $this->ID_Mond=$args['ID_Mond'] ?? '';
  }
  public function name(){
    return "{$this->ID_Event} - {$this->Nom_Event}";
  }

  public function validate() {
    $this->errors = [];
    if(is_blank($this->Nom_Event)) {
      $this->errors[] = "Le Nom de l'évenement ne peut pas etre vide.";
    }

    if(is_blank($this->Date_Debut_Event>)) {
      $this->errors[] = "La date de debut ne peut pas etre vide.";
    }

    if(is_blank($this->Date_Fin_Event)) {
      $this->errors[] = "La date de fin ne peut pas etre vide.";
    }

    if(is_blank($this->Min_Level)) {
      $this->errors[] = "Le niveau minimum ne peut pas etre vide.";
    }
    return $this->errors;
  }
}


?>

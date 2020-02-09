<?php include "databaseobject.class.php" ?>
<?php

class Monstre extends DatabaseObject {

    static public $table_name='monstre';
    static public $db_columns= ['ID_Monst' , 'x' , 'y' , 'Nom_Monst' , 'HP' , 'Level' , 'Attaque' , 'ID_Etag'];

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
        $this->ID_Monst = self::$database->insert_id;
      }
      return $result;
    }


    public function delete() {
      $sql  = "DELETE FROM " . static::$table_name . " ";
      $sql .= "WHERE  " .static::$db_columns['0']. " = '" . self::$database->escape_string($this->ID_Monst) . "' ";
      $sql .= "LIMIT 1";
      $result = self::$database->query($sql);
      return $result;
    }

  public $ID_Monst;
  public $Nom_Monst;
  public $HP;
  public $x;
  public $y;
  public $Level;
  public $Attaque;
  public $ID_Etag;

  function __construct($args=[])
  {
    $this->ID_Monst=$args['ID_Monst'] ?? '';
    $this->Nom_Monst=$args['Nom_Monst'] ?? '';
    $this->x=$args['x'] ?? '';
    $this->y=$args['y'] ?? '';
    $this->HP=$args['HP'] ?? '';
    $this->Level=$args['Level'] ?? '';
    $this->Attaque=$args['Attaque'] ?? '';
    $this->ID_Etag=$args['ID_Etag'] ?? '';
  }
  public function name(){
    return "{$this->ID_Monst} - {$this->Nom_Monst}";
  }

  public function validate() {
    $this->errors = [];
    if(is_blank($this->Nom_Monst)) {
      $this->errors[] = "Le Nom du Monstre ne peut pas etre vide.";
    }

    if(is_blank($this->HP)) {
      $this->errors[] = "HP ne peut pas etre vide.";
    }

    if(is_blank($this->Level)) {
      $this->errors[] = "Le niveau ne peut pas etre vide.";
    }

    if(is_blank($this->Attaque)) {
      $this->errors[] = "Le niveau d'attaque ne peut pas etre vide.";
    }

    if(is_blank($this->ID_Etag)) {
      $this->errors[] = "L'etage ne peut pas etre vide.";
    }
    return $this->errors;
  }
}


?>

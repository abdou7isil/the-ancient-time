<?php include "databaseobject.class.php" ?>
<?php

  class Monde extends DatabaseObject {

      static public $table_name='monde';
      static public $db_columns= ['ID_Mond' , 'Nom_Mond' , 'Width' , 'Height' , 'date_de_creation'	, 'Roi_Mond'];

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
          $this->ID_Mond = self::$database->insert_id;
        }else {
          die("Query Failed");
        }
        return $result;
      }


      public function delete() {
        $sql  = "DELETE FROM " . static::$table_name . " ";
        $sql .= "WHERE  " .static::$db_columns['0']. " = '" . self::$database->escape_string($this->ID_Mond) . "' ";
        $sql .= "LIMIT 1";
        $result = self::$database->query($sql);
        return $result;
      }

    static  public function count_all_mondes(){
        $sql = "SELECT COUNT(*) as total FROM monde " ;
        $result = self::$database->query($sql);
        if(!$result) {
          exit("Database query failed.");
        }
        $row = $result->fetch_array();
        return array_shift($row);
      }

    public $ID_Mond;
    public $Nom_Mond;
    public $Width;
    public $Height;
    public $date_de_creation;
    public $Roi_Mond;

    function __construct($args=[])
    {
      $this->Nom_Mond=$args['Nom_Mond'] ?? '';
      $this->Width=$args['Width'] ?? '';
      $this->Height=$args['Height'] ?? '';
      $this->date_de_creation=$args['date_de_creation'] ?? '';
      $this->Roi_Mond=$args['Roi_Mond'] ?? '';
    }
    public function name(){
      return "{$this->ID_Mond} - {$this->Nom_Mond}";
    }

    public function validate() {
      $this->errors = [];
      if(is_blank($this->Nom_Mond)) {
        $this->errors[] = "Le Nom du Monde ne peut pas etre vide.";
      }

      if(is_blank($this->Width)) {
        $this->errors[] = "La largeur du Monde ne peut pas etre vide.";
      }

      if(is_blank($this->Height)) {
        $this->errors[] = "La hauteur du Monde ne peut pas etre vide.";
      }
      return $this->errors;
    }
  }


 ?>

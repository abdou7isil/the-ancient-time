<?php

class DatabaseObject {

  static protected $database='ancient_time_db';
  static protected $table_name = "";
  static protected $db_columns = [];
  public $errors = [];

  static public function set_database($database) {
    self::$database = $database;
  }

  static public function query($sql){
    $result = self::$database->query($sql);
    if(!$result) {
      exit("Database query failed.");
    }
    return $result;
  }

  static public function find_by_sql($sql) {
    $result = self::$database->query($sql);
    if(!$result) {
      exit("Database query failed.");
    }

    // results into objects
    $object_array = [];
    while($record = $result->fetch_assoc()) {
      $object_array[] = static::instantiate($record);
    }

    $result->free();

    return $object_array;
  }

  static public function find_all() {
    $sql = "SELECT * FROM " . static::$table_name;
    return static::find_by_sql($sql);
  }

  static public function find_by_id($id) {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE " .static::$db_columns['0']. " = '" . self::$database->escape_string($id) . "'";
    $obj_array = static::find_by_sql($sql);
    if(!empty($obj_array)) {
      return array_shift($obj_array);
    } else {
      return false;
    }
  }

  static protected function instantiate($record) {
    $object = new static;
    // Could manually assign values to properties
    // but automatically assignment is easier and re-usable
    foreach($record as $property => $value) {
      if(property_exists($object, $property)) {
        $object->$property = $value;
      }
    }
    return $object;
  }

  public function validate() {
    $this->errors = [];

    // Add custom validations

    return $this->errors;
  }

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
      $this->id_patient = self::$database->insert_id;
    }
    return $result;
  }


  public function update() {
    $this->validate();
    if(!empty($this->errors)) { return false; }

    $attributes = $this->sanitized_attributes();
    $attribute_pairs = [];
    foreach($attributes as $key => $value) {
      $attribute_pairs[] = "{$key}='{$value}'";
    }

    $sql = "UPDATE " . static::$table_name . " SET ";
    $sql .= join(', ', $attribute_pairs);
    $sql .= " WHERE " .static::$db_columns['0']. " = '"  . self::$database->escape_string($this->id) . "' ";
    $sql .= "LIMIT 1";
    $result = self::$database->query($sql);
    return $result;
  }

  public function save() {
    // A new record will not have an ID yet
    if(isset($this->id_patient)) {
      return $this->update();
    } else {
      return $this->create();
    }
  }
// pour lié les attributs et valeurs entré dans les formulaire notre site
  public function merge_attributes($args=[]) {
    foreach($args as $key => $value) {
      if(property_exists($this, $key) && !is_null($value)) {
        $this->$key = $value;
      }
    }
  }

  // Properties which have database columns, excluding ID

  // les proprietés qui ont une column de la table a par l'id de cette table
  public function attributes() {
    $attributes = [];

    foreach(static::$db_columns as $column) {
      if($column == static::$db_columns['0']) { continue; }
      $attributes[$column] = $this->$column;
    }
    return $attributes;
  }
// pour securisé les valeur entré
  protected function sanitized_attributes() {
    $sanitized = [];
    foreach($this->attributes() as $key => $value) {
      $sanitized[$key] = self::$database->escape_string($value);
    }
    return $sanitized;
  }

  public function delete() {
    $sql = "DELETE FROM " . static::$table_name . " ";
    $sql .= "WHERE  " .static::$db_columns['0']. " = '" . self::$database->escape_string($this->id) . "' ";
    $sql .= "LIMIT 1";
    $result = self::$database->query($sql);
    return $result;

    // After deleting, the instance of the object will still
    // exist, even though the database record does not.
    // This can be useful, as in:
    //   echo $user->first_name . " was deleted.";
    // but, for example, we can't call $user->update() after
    // calling $user->delete().
  }
  static public function find_by_email($email) {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE email='" . self::$database->escape_string($email) . "'";
    $obj_array = static::find_by_sql($sql);
    if(!empty($obj_array)) {
      return array_shift($obj_array);
    } else {
      return false;
    }
  }

  public function escap_s($val){
    $val = self::$database->escape_string($val);
    return  $val;

  }

  static public function find_all_monde() {
    $sql = "SELECT * FROM monde ";
  //  $sql .=" INNER JOIN monde ";
    //$sql .="ON evenement.ID_Mond = monde.ID_Mond ORDER BY Nom_Mond ASC";
    $result = self::$database->query($sql);
    if(!$result) {
      exit("Database query failed.");
    }
    return $result;
  }
  static public function find_all_dungeon_monde(){
    $sql = "SELECT * FROM dungeon";
    $sql .=" INNER JOIN monde ";
    $sql .="ON dungeon.ID_Mond = monde.ID_Mond ";
    $result = self::$database->query($sql);
    if(!$result) {
      exit("Database query failed.");
    }
    return $result;
  }

}


?>

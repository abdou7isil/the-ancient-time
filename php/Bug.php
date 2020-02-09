
<?php
require "databaseobject.class.php";

class Bug extends DatabaseObject {

    static public $table_name='bug';
    static public $db_columns= ['id_bug' , 'id_joueur' , 'probleme' , 'description' , 'date_send' , 'capture'];


  public $id_bug;
  public $id_joueur;
  public $probleme;
  public $description;
  public $date_send;
  public $capture;

  function __construct($args=[])
  {
    $this->id_bug=$args['id_bug'] ?? '';
    $this->id_joueur=$args['id_joueur'] ?? '';
    $this->probleme=$args['probleme'] ?? '';
    $this->description=$args['description'] ?? '';
    $this->date_send=$args['date_send'] ?? '';
    $this->capture=$args['capture'] ?? '';
  }
  public function name(){
    return "{$this->Num_Etag} Etage";
  }

    static  public function count_all_bug(){
        $sql = "SELECT COUNT(*) as total FROM bug " ;
        $result = self::$database->query($sql);
        if(!$result) {
          exit("Database query failed.");
        }
       $row=mysqli_fetch_assoc($result);
        return $row["total"];
      }
    }

?>

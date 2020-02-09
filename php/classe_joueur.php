  <?php
  require_once('database.php');
  require_once('databaseobject.class.php');
  define("DB_SERVER", "localhost");
  define("DB_USER", "root");
  define("DB_PASS", "");
  define("DB_NAME", "ancient_time_db");


  // Create connection
  function connectDB()
  {
    $conn = new mysqli(DB_SERVER, DB_USER, DB_PASS,DB_NAME);

  // Check connection
/*  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  echo "Connected successfully";*/
  return $conn;
}

  function myQuery($sql)
  { $conn=connectDB();
    if ($conn->query($sql) === TRUE)
      {
    echo " successfully";
      }
      else {
    echo "Error : " . $conn->error;
        }
  }

  function selectQuery($sql)
  {
    $conn=connectDB();
    $result = $conn->query($sql);

    return $result->fetch_assoc();

}

/*  function selectFirstQuery($sql)
  {
    $conn=connectDB();
    $result = mysqli_query($conn, $sql);


   $row = mysqli_fetch_assoc($result);

    return $row;
  }*/




class joueur
{
  protected $pa;
  protected $pm;
  protected $pv;
  protected $resistance;
  protected $Force;

  protected $ID=1;
  //protected $db=new DatabaseObject();

  function __construct()
  {
    $this->pa=$this->initPa();
    $this->pm=$this->initPm();
   $this->pv=$this->initPv();
    $this->resistance=$this->initResistance();
    $this->Force=$this->initForce();
  }
  public function afficher()
  {
    echo "<br> PA:".$this->pa;
    echo "<br>PM:".$this->pm;
    echo "<br>PV :".$this->pv;
    echo "<br> Resistance :".$this->resistance;
    echo "<br> Force :".$this->Force;
    echo "<br>Classe:".$this->getClass();


  }
  /*function __construct($id)
  {
    $this->ID=$id;
  }*/

  public  function getClass() // retourne la classe de ce joueur , ou besoin de cette fonction dans le calule pa/pm/pv/résistance
     {
      $id=$this->getID_J();
      $sql="select (nomClasse)from classe where (ID_class = (select(ID_class) from joueur where (ID_class = ".$id."))) LIMIT 1;";
      $classe=selectQuery($sql);
      return $classe["nomClasse"];
    }
  public    function getLevel() // retourne le niveau de ce joueur   ==> 250 points = +1 level

       {
         $id=$this->getID_J();
         $sql="select (Point)from joueur where (ID_class = ".$id.");";

        $result=selectQuery($sql);

         $lvl=intval($result["Point"]/250);



         return $lvl;

         // et chaque niveau vas améloirer les caractéristiques de ce joueur ( caractéristique= caractéristique+ 0.01*caractéristique)
         // les caractéristiques sont (Point de vie (pv) , pa, pm,résistance)
       }
  public  function initPa() // pa de joueur (pa de la classe + les objets équipés)
    {

  $id=$this->getID_J();
  $query="select (pa)from classe where (ID_class = (select(ID_class) from joueur where (ID_J=". $id.")));";

  $classe_Pa=  selectQuery($query);


  $classe_Pa=$classe_Pa["pa"];

  $query="select (objetpa)from objet where (ID_obj = (select(MainG) from joueur where (ID_J=".$id.")));";
  $MainG_Pa= selectQuery($query);

  $MainG_Pa= $MainG_Pa["objetpa"];
  $query="select (objetpa)from objet where (ID_obj = (select(MainD) from joueur where (ID_J=".$id.")));";
  $MainD_Pa= selectQuery($query);
  $MainD_Pa= $MainD_Pa["objetpa"];


  return $classe_Pa+$MainD_Pa+$MainG_Pa;


    }

  public function initPm()//// pm de joueur (pm de la classe + les objets équipés)
    {
      $id=$this->getID_J();
      $query="select (pm)from classe where (ID_class = (select(ID_class) from joueur where (ID_J=". $id.")));";
      $classe_Pm=  selectQuery($query);
      $classe_Pm=$classe_Pm["pm"];

      $query="select (objetpm)from objet where (ID_obj = (select(MainG) from joueur where (ID_J=".$id.")));";
      $MainG_Pm= selectQuery($query);
      $MainG_Pm= $MainG_Pm["objetpm"];


      $query="select (objetpm)from objet where (ID_obj = (select(MainD) from joueur where (ID_J=".$id.")));";
      $MainD_Pm= selectQuery($query);
      $MainD_Pm= $MainD_Pm["objetpm"];



      return $classe_Pm+$MainD_Pm+$MainG_Pm;

    }

  public  function initPv() // pv de joueur (pv de la classe + les objets équipés)
    {
      $id=$this->getID_J();
      $query="select (pv)from classe where (ID_class = (select(ID_class) from joueur where (ID_J=". $id.")));";
      $classe_Pv=  selectQuery($query);


      $query="select (objetpv)from objet where (ID_obj = (select(MainG) from joueur where (ID_J=".$id.")));";
      $MainG_Pv= selectQuery($query);

      $query="select (objetpv)from objet where (ID_obj = (select(MainD) from joueur where (ID_J=".$id.")));";
      $MainD_Pv= selectQuery($query);






        $classe_Pv=$classe_Pv["pv"];
          $classe_Pv+=$classe_Pv*$this->getLevel();
        $MainD_Pv= $MainD_Pv["objetpv"];
          $MainG_Pv= $MainG_Pv["objetpv"];

      return $classe_Pv+$MainD_Pv+$MainG_Pv;
    }

  public  function initResistance() // résistance de joueur (résistance de la classe + les objets équipés)
      {
        $id=$this->getID_J();
        $query="select (resistance)from classe where (ID_class = (select(ID_class) from joueur where (ID_J=".$id.")));";
        $classe_resistance=  selectQuery($query);

        $query="select (objetresistance)from objet where (ID_obj = (select(MainG) from joueur where (ID_J=".$id.")));";
        $MainG_res=  selectQuery($query);
        $query="select (objetresistance)from objet where (ID_obj = (select(MainD) from joueur where (ID_J=".$id.")));";
        $MainD_res=  selectQuery($query);

        $classe_resistance=$classe_resistance["resistance"];
        $classe_resistance+=$classe_resistance*$this->getLevel();
        $MainD_res= $MainD_res["objetresistance"];
          $MainG_res= $MainG_res["objetresistance"];
        return $classe_resistance+$MainD_res+$MainG_res;
      }
  public  function initForce()
      {$id=$this->getID_J();
        $query="select (laForce)from classe where (ID_class = (select(ID_class) from joueur where (ID_J=".$id.")));";
        $classe_force=  selectQuery($query);

        $query="select (for_ce)from objet where (ID_obj = (select(MainG) from joueur where (ID_J=".$id.")));";
        $MainG_force=  selectQuery($query);
        $query="select (for_ce)from objet where (ID_obj = (select(MainD) from joueur where (ID_J=".$id.")));";
        $MainD_force=  selectQuery($query);

        $classe_force=$classe_force["laForce"];
          $classe_force=$classe_force+$this->getLevel()*$classe_force;
        $MainD_force= $MainD_force["for_ce"];
          $MainG_force= $MainG_force["for_ce"];

        return $classe_force+$MainD_force+$MainG_force;
      }
    public   function  getID_J()
    { return 1;}
    public function getPa()
    {return $this->pa;}

    public function setPa($PA)
    {$this->pa=$PA;}

    public function getPm()
    {return $this->pm;}

    public function setPm($PM)
    {$this->pm=$PM;}

    public function getPv()
    {return $this->pv;}

    public function setPv($PV)
    {$this->pv=$PV;}

    public function getForce()
    {return $this->Force;}

    public function setForce($FORCE)
    {$this->Force=$FORCE;}
    public function getResistance()
    {return $this->resistance;}

    public function setResistance($RS)
    {
       $this->resistance=$RS;
    }

    public function attaquer($p2)
    {
      $degat= $this->Force * ($p2->resistance /200);
      $newPv=(int)$p2->pv-$degat;
      $p2->setPv($newPv);
      $p2->setPv((int)$p2->pv);
      $p2->afficher();

    }

}
   ?>

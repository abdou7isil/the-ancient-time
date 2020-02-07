<?php
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "ancient_time_db");


// Create connection
function connectDB()
{
  $conn = new mysqli(DB_SERVER, DB_USER, DB_PASS,DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
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
  $result = $conn->query($sql);
  $classe=$result->fetch_assoc();
 echo ($classe["nomClasse"]."-----------");
  return $result;
}
class joueur
{
  protected $pa;
  protected $pm;
  protected $pv;
  protected $resistance;
  protected $Force;
  protected $ID=1;
  //protected $db=new DatabaseObject();
/*  function __construct()
  {
    $this->pa=$this->initPa();
    $this->pm=initPm();
    $this->pv=initPv();
    $this->resistance=initResistance();
    $this->pv=initForce();
  }*/
        function __construct($id)
        {
          $this->ID=$id;
        }

        public  function getClass() // retourne la classe de ce joueur , ou besoin de cette fonction dans le calule pa/pm/pv/résistance
           {


             $sql="select (nomClasse)from classe where (ID_class = (select(ID_class) from joueur where (ID_J=1))) LIMIT 1;";
            // $classe=selectQuery($sql);

            $conn=connectDB();
              $result = $conn->query($sql);
              $classe=$result->fetch_assoc();
             


            return $classe["nomClasse"];




          }
  }
 ?>

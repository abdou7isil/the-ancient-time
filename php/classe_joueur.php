  <?php
  require_once('database.php');
  require_once('databaseobject.class.php');

class joueur
{
  protected $pa;
  protected $pm;
  protected $pv;
  protected $resistance;
  protected $Force;
  //protected $db=new DatabaseObject();
   function __construct()
   {
     $this->pa=this->initPa();
     $this->pm=this->initPm();
     $this->pv=this->initPv();
     $this->resistance=this->initResistance();
     $this->pv=this->initForce();
   }
  public static function initPa()
    {

  $query="select (pa)from classe where (ID_classe = (select(ID_classe) from joueur where (ID_J=".getID_J().")));");
  $classe_Pa=  DatabaseObject::query($query);

    }

  public static function initPm()
    {
      $query="select (pm)from classe where (ID_classe = (select(ID_classe) from joueur where (ID_J=".getID_J().")));");
      $classe_Pm=  DatabaseObject::query($query);
    }

  public static function initPv()
    {
      $query="select (pv)from classe where (ID_classe = (select(ID_classe) from joueur where (ID_J=".getID_J().")));");
      $classe_Pv=  DatabaseObject::query($query);
    }

  public static function initResistance()
      {
        $query="select (resistance)from classe where (ID_classe = (select(ID_classe) from joueur where (ID_J=".getID_J().")));");
        $classe_resistance=  DatabaseObject::query($query);
      }
  public static function initForce()
      {
        $query="select (laForce)from classe where (ID_classe = (select(ID_classe) from joueur where (ID_J=".getID_J().")));");
        $classe_Pa=  DatabaseObject::query($query);
      }
}
   ?>

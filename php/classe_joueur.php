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
  public static function getClass() // retourne la classe de ce joueur , ou besoin de cette fonction dans le calule pa/pm/pv/résistance
     {
       db_connect();
       $classe="select (nomClasse)from classe where (ID_classe = (select(ID_classe) from joueur where (ID_J=".getID_J().")));");
       db_disconnect();
       return $classe;
     }
  public static   function getLevel() // retourne le niveau de ce joueur   ==> 250 points = +1 level

       {
         db_connect();
         $result="select (Point)from joueur where (ID_classe = ".getID_J()."));");
         $lvl=intval($result/250);
         db_disconnect();
         return $lvl;
         // et chaque niveau vas améloirer les caractéristiques de ce joueur ( caractéristique= caractéristique+ 0.01*caractéristique)
         // les caractéristiques sont (Point de vie (pv) , pa, pm,résistance)
       }
  public static function initPa() // pa de joueur (pa de la classe + les objets équipés)
    {

  $query="select (pa)from classe where (ID_classe = (select(ID_classe) from joueur where (ID_J=".getID_J().")));");
  $classe_Pa=  DatabaseObject::query($query);
    $classe_Pa+=$classe_Pa*getLevel();
  $query="select (objetpa)from objet where (ID_obj = (select(MainG) from joueur where (ID_J=".getID_J().")));");
  $MainG_Pa=  DatabaseObject::query($query);
  $query="select (objetpa)from objet where (ID_obj = (select(MainD) from joueur where (ID_J=".getID_J().")));");
  $MainD_Pa=  DatabaseObject::query($query);
  return $classe_Pa+$MainD_Pa+$MainG_Pa;


    }

  public static function initPm()//// pm de joueur (pm de la classe + les objets équipés)
    {
      $query="select (pm)from classe where (ID_classe = (select(ID_classe) from joueur where (ID_J=".getID_J().")));");
      $classe_Pm=  DatabaseObject::query($query);
        $classe_Pm+=$classe_Pm*getLevel();
      $query="select (objetpm)from objet where (ID_obj = (select(MainG) from joueur where (ID_J=".getID_J().")));");
      $MainG_Pm=  DatabaseObject::query($query);
      $query="select (objetpm)from objet where (ID_obj = (select(MainD) from joueur where (ID_J=".getID_J().")));");
      $MainD_Pm=  DatabaseObject::query($query);
      return $classe_Pm+$MainD_Pm+$MainG_Pm;
    }

  public static function initPv() // pv de joueur (pv de la classe + les objets équipés)
    {
      $query="select (pv)from classe where (ID_classe = (select(ID_classe) from joueur where (ID_J=".getID_J().")));");
      $classe_Pv=  DatabaseObject::query($query);
      $classe_Pv+=$classe_Pv*getLevel();
      $query="select (objetpv)from objet where (ID_obj = (select(MainG) from joueur where (ID_J=".getID_J().")));");
      $MainG_Pm=  DatabaseObject::query($query);
      $query="select (objetpv)from objet where (ID_obj = (select(MainD) from joueur where (ID_J=".getID_J().")));");
      $MainD_Pm=  DatabaseObject::query($query);
      return $classe_Pv+$MainD_Pv+$MainG_Pv;
    }

  public static function initResistance() // résistance de joueur (résistance de la classe + les objets équipés)
      {
        $query="select (resistance)from classe where (ID_classe = (select(ID_classe) from joueur where (ID_J=".getID_J().")));");
        $classe_resistance=  DatabaseObject::query($query);
        $classe_resistance+=$classe_resistance*getLevel();
        $query="select (objetresistance)from objet where (ID_obj = (select(MainG) from joueur where (ID_J=".getID_J().")));");
        $MainG_res=  DatabaseObject::query($query);
        $query="select (objetresistance)from objet where (ID_obj = (select(MainD) from joueur where (ID_J=".getID_J().")));");
        $MainD_res=  DatabaseObject::query($query);
        return $classe_resistance+$MainD_res+$MainG_res;
      }
  public static function initForce()
      {
        $query="select (laForce)from classe where (ID_classe = (select(ID_classe) from joueur where (ID_J=".getID_J().")));");
        $classe_force=  DatabaseObject::query($query);
        $classe_force=$classe_force+getLevel()*$classe_force;
        $query="select (for_ce)from objet where (ID_obj = (select(MainG) from joueur where (ID_J=".getID_J().")));");
        $MainG_force=  DatabaseObject::query($query);
        $query="select (for_ce)from objet where (ID_obj = (select(MainD) from joueur where (ID_J=".getID_J().")));");
        $MainD_force=  DatabaseObject::query($query);
        return $classe_force+$MainD_force+$MainG_force;
      }
}
   ?>

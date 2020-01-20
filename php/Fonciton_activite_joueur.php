<?php
require_once('database.php');
require_once('databaseobject.class.php');

function getClass() // retourne la classe de ce joueur , ou besoin de cette fonction dans le calule pa/pm/pv/résistance
  {
    db_connect();
    $classe="select (nomClasse)from classe where (ID_classe = (select(ID_classe) from joueur where (ID_J=".getID_J().")));");
    db_disconnect();
    return $classe;
  }
  function getLevel() // retourne le niveau de ce joueur   ==> 250 points = +1 level

    {
      db_connect();
      $result="select (Point)from joueur where (ID_classe = ".getID_J()."));");
      $lvl=intval($result/250);
      db_disconnect();
      return $lvl;
      // et chaque niveau vas améloirer les caractéristiques de ce joueur ( caractéristique= caractéristique+ 0.01*caractéristique)
      // les caractéristiques sont (Point de vie (pv) , pa, pm,résistance)
    }

 ?>

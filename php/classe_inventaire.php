<?php
include 'classe_joueur.php';
class inventaire
  {
      $list_objet[];
      public static function getInventaire($id)
      {

        $query="select nom_obj from objet where (id_obj = (select ID_Objet from inventaire where (ID_joueur = ".joueur::getID()." ))) ";
        $rs=selectQuery($query);
      }


  }
?>

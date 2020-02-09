<!DOCTYPE html>
<html>
<head>
<title>test joueur</title>
</head>
<body>

  <?php

        include '../../php/classe_joueur.php';
        //echo'start \n';
        $joueur=new joueur();
      $joueur->afficher();
      echo"<br>";
      $joueur2=new joueur();
    $joueur2->afficher();
    echo"<br>";
    $joueur2->attaquer($joueur);
      echo"<br>";
      $joueur-> getInventaire();
      echo "<br>".$joueur->list_objet[0];
      $joueur->setMainG("massue");
        $joueur->setMainD("dague");




    ?>


</body>
</html>

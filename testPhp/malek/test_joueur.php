<!DOCTYPE html>
<html>
<head>
<title>test joueur</title>
</head>
<body>

  <?php

        include '../../php/classe_joueur.php';
        $joueur=new joueur(1);
        $cls=$joueur->getClass();
        echo $cls;


    ?>


</body>
</html>

<!DOCTYPE html>
<html>
<head>
<title>test joueur</title>
</head>
<body>

  <?php

        include '../../php/classe_joueur.php';
        echo'start \n';
        $joueur=new joueur();
        $cls=$joueur->getClass();
        echo"<br> cls <br>";
        echo ($cls);

        echo "<br>";
        $lvl=$joueur->getLevel();
        echo $lvl;
        $pa =$joueur->getPa();
        echo "<br> pa ".$pa;


    ?>


</body>
</html>


<!DOCTYPE html>
<?php
$sql_name="root";
$sql_pass="";
$server_name="localhost";
$db_name="oo";
$conn = new mysqli($server_name, $sql_name, $sql_pass, $db_name);
// Check connection
if ($conn->connect_error) {
  echo "string";
    die("Connection failed: " . $conn->connect_error);
}



?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="../css/style_admin.css">
    <link rel="stylesheet" href="../css/magasin.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../fontawesome/js/all.js"></script>
    <title>Admin</title>
    <style media="screen">

    @media (max-width: 768px) {
      .sidebar {
        position: static;
        height: auto;
      }

      .top-navbar {
        position: static;
      }
    }
    </style>
<style>
.buttom:hover {background-color: #ffb84d;}


</style>
  </head>
  <body>
    <?php
   include'../html/admin/navbar.php'
     ?>
      <section>
        <div class="container-fluid ">
        <div class="row">
          <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="row pt-md-5 mt-md-3 mb-5">
              <div class="col">


                <table class="tabble_revenus" style="Width:500px ; border-width: medium; " >
                  <h2> les packs</h2>
                  <thead>
                    <th style="background-color: #c2c2a3;">
                      <td style="background-color: #c2c2a3 ;border-width: medium;"> <strong>pack1 </strong></td>
                      <td style="background-color: #c2c2a3 ;border-width: medium;"><strong>pack2</strong></td>
                      <td style="background-color: #c2c2a3 ;border-width: medium;"><strong>pack3</strong></td>
                    </th>
                  </thead>
                  <tbody>
                    <?php
                    $query="select quantité from revenus";
                    $result=$conn->query($query);
                    while($row = $result->fetch_assoc()) {
                    echo ' <tr>
                      <td style="border-width: medium;background-color: #c2c2a3;" ><strong>quantité</strong></td>
                      <td style="border-width: medium;">'; echo $row;echo '</td>
                      <td style="border-width: medium;">'; echo $row; echo '</td>
                      <td style="border-width: medium;">'; echo $row; echo '</td>
                    </tr>';}
                    ?>
                  </tbody>
                </table><br>

                <table classe="table_achat" width=500px >
                  <h2> les achat</h2>
                  <thead>
                    <th style="background-color: #c2c2a3 ;border-width: medium;">
                      <td style="background-color: #c2c2a3 ;border-width: medium;"><strong>ID achat</strong></td>
                      <td style="background-color: #c2c2a3 ;border-width: medium;"><strong>Montant</strong></td>
                      <td style="background-color: #c2c2a3 ;border-width: medium;"><strong>Date ahat</strong></td>
                      <td style="background-color: #c2c2a3 ;border-width: medium;"><strong>ID joueur</strong></td>
                      <td style="background-color: #c2c2a3 ;border-width: medium;"><strong>ID oobjet</strong></td>
                   </th>
                  </thead>
                  <tbody>
                    <tr>
                      <td style="background-color: #c2c2a3 ;border-width: medium;"><strong>achat</strong></td>
                      <td style="border-width: medium;">1</td>
                      <td style="border-width: medium;">10</td>
                      <td style="border-width: medium;">10-02-2020</td>
                      <td style="border-width: medium;">1</td>
                      <td style="border-width: medium;">1</td>
                    </tr>
                  </tbody>
                </table>
                <br>

                <form>
                  <tr>
                    <td style="border : none"><h1>  </h1> </td>
                  </tr>

                  <tr>
                    <td style="border : none">  <h2>Ajouter remise</h2></td>
                  </tr>
                  <tr>

                    <td style="border : none"><strong>ID objet </strong></td>
                    <td style="border : none"><input type="textField" required></td>
                    <td style="border : none"><strong>pourcentage (%)   </strong></td>
                    <td style="border : none"><input type="textField" required></td>
                    <td style="border : none"><input class="buttom" type="submit" value="valider" style="color:#006600"></td>
                  </tr>
                </form><br>

                <table padding="10px" style="border-width: medium;">
                  <h2>Les objet</h2>
                  <th style="background-color: #c2c2a3;">
                    <td style="border-width: medium; background-color: #c2c2a3;" ><strong>ID objet</strong></td>
                    <td style="border-width: medium; background-color: #c2c2a3;"><strong>Nom d'object</strong></td>
                    <td style="border-width: medium; background-color: #c2c2a3;"><strong>le prix</strong></td>
                    <td style="border-width: medium; background-color: #c2c2a3;"><strong>Etat d'objet</strong></td>
                    <td style="border-width: medium; background-color: #c2c2a3;"><strong>La force</strong></td>
                    <td style="border-width: medium; background-color: #c2c2a3;"><strong>Point d'action</strong></td>
                    <td style="border-width: medium; background-color: #c2c2a3;"><strong>Point de mouvment</strong></td>
                    <td style="border-width: medium; background-color: #c2c2a3;"><strong>Point de vie</strong></td>
                    <td style="border-width: medium; background-color: #c2c2a3;"><strong>La résistance</strong></td>
                  </th>
                  <tr>
                    <td style="border-width: medium; background-color: #c2c2a3;"><strong>Objet</strong></td>
                    <td style="border-width: medium;">1</td>
                    <td style="border-width: medium;">épée</td>
                    <td style="border-width: medium;">10</td>
                    <td style="border-width: medium;">neu</td>
                    <td style="border-width: medium;">70</td>
                    <td style="border-width: medium;">0</td>
                    <td style="border-width: medium;">0</td>
                    <td style="border-width: medium;">80</td>
                    <td style="border-width: medium;">15</td>
                  </tr>
                </table><br>
                <div class="ajouter">
                <h2>Ajouter un objet</h2>
                <form>
                  <table style="border :none">
                  <tr><td style="border :none"><label>ID objet</label></td>
                  <td style="border :none"><input type="textField" required></td>
                  </tr><tr><td style="border :none"><label>Nom objet</label></td>
                  <td style="border :none"><input type="textField" required></td>
                  </tr><tr><td style="border :none"><label>Etat objet</label></td>
                  <td style="border :none"><input type="textField" required></td>
                  </tr><tr><td style="border :none"><label>L prix objet</label></td>
                  <td style="border :none"><input type="textField" required></td>
                  </tr><tr><td style="border :none"><label>La force</label></td>
                  <td style="border :none"><input type="textField" required></td>
                  </tr><tr><td style="border :none"><label>Point d'action</label></td>
                  <td style="border :none"><input type="textField" required></td>
                  </tr><tr><td style="border :none"><label>Point de mouvment</label></td>
                  <td style="border :none"><input type="textField" required></td>
                  </tr><tr><td style="border :none"><label>Point de vie</label></td>
                  <td style="border :none"><input type="textField" required></td>
                  </tr><tr><td style="border :none"><label>Résistance</label></td>
                  <td style="border :none"><input type="textField" required></td>
                </tr><tr><td style="border :none"><input class="buttom"type="submit" value="ajouter" ;  style="width:150px ; height:35px; color:#006600"><br></td></tr>


                </form>
              </div>
                <div class="supprimer">
                <form>
                  <tr>
                    <td style="border : none"><h1>  </h1> </td>
                  </tr>

                  <tr>
                    <td style="border : none">  <h2>Supprimer objet</h2></td>
                  </tr>
                  <tr>

                    <td style="border : none"><strong><h2>ID</h2>  </strong></td>
                    <td style="border : none"><input type="textField" required></td>
                    <td style="border : none"><input class="buttom" type="submit" value="supprimer" style="color:#e60000"></td>
                  </tr>
                </form>
              </div>





             </div>
          </div>
        </div>
      </div>
    </div>
      </section>







       <script src="../bootstrap/js/jquery.min.js" ></script>
       <script src="../bootstrap/js/popper.min.js"></script>
       <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>
</html>

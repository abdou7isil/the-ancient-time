<?php include "../php/database.php" ?>
<?php include "../php/class_etage.php" ?>
<?php include "../php/function.php" ?>
<?php include "../php/validation_fonctions.php" ?>
<?php include "../php/errors_status.php" ?>
<?php require('../php/dbinfo.php') ?>
<?php require('../php/init.php') ?>
<?php //require_login();
//$ID_Mond = $_GET['ID_Mond'] ?? false;
//echo $ID_Mond;?>
<?php
if(is_post_request()) {

  $args = $_POST['etage'];
  $etage = new Etage($args);

  $result = $etage->ajouter();
  if ($result) {
    // code...

  $ID_Dun = $args['ID_Dun'];

  $_SESSION['message'] = 'l Etage a était crée.';
//  redirect_to('mondeDetail.php?ID_Mond=' . $new_id);
  redirect_to('Etage.php?ID_Dun='. $ID_Dun);
}else {
  echo "string";
}
} else {
  // display the form
  $etage = new Etage;
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="../css/style_admin.css">
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

  </head>
  <body>
    <?php
    include'../html/admin/navbar.php'
      ?>
          <section style="background-color:#eee;">

          <div class="container-fluid ">
            <div class="row">
              <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                <div class="row pt-md-5 mt-md-3 mb-5">
                  <div class="col-md-8 ml-3">
                    <div class=" text-info mb-3">
                    </div>

                    <form action="ajouterEtage.php" method="post" style="border:2px solid #5D6D7E ;
                      box-shadow: 0px 4px 6px 6px #5D6D7E ;
                      border-radius: 5px;
                      align-self: center;" class="border border-secondary rounded  p-3">
                    <div class="text-secondary mb-2">

                    <i class="far fa-plus-square fa-2x d-inline"></i><h3 class="d-inline m-2">Ajouter un Etage</h3>
                    </div>
                    <?php include "../html/admin/forms/form_etage.php" ?>

                      <button type="submit" class="form-control btn btn-success">Ajouter l'Etage</button>
                    </form>
                  </div>
              </div>
            </div>
          </div>

              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>

        </section>







       <script src="../bootstrap/js/jquery.min.js" ></script>
       <script src="../bootstrap/js/popper.min.js"></script>
       <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>
</html>

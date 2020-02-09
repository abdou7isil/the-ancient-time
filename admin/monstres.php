<?php include "../php/database.php" ?>
<?php include "../php/class_monstre.php" ?>
<?php include "../php/pagination.class.php" ?>
<?php include "../php/function.php" ?>
<?php include "../php/validation_fonctions.php" ?>
<?php include "../php/errors_status.php" ?>
<?php require('../php/dbinfo.php') ?>
<?php require('../php/init.php') ?>
<?php //require_login();  ?>
<?php

  $result = Monstre::find_all_monstre_etage_dungeon_monde();
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
      <section>
                          <div class="container-fluid ">
                            <div class="row">
                              <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                                <div class="row pt-md-5 mt-md-3 mb-5">
                                  <div class="col">
                                    <table class="table table-striped table-bordered text-center table-responsive-md">
                                      <thead>
                                        <tr>
                                          <th scope="col">#Id Monstre</th>
                                          <th scope="col">Nom du Monstre</th>
                                          <th scope="col">Monde</th>
                                          <th scope="col">Dungeon</th>
                                          <th scope="col">Num Etage</th>
                                          <th scope="col">x</th>
                                          <th scope="col">y</th>
                                          <th scope="col">HP</th>
                                          <th scope="col">Level</th>
                                          <th scope="col">Attaque</th>
                                          <th scope="col" class="text-center">Suprimer</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <?php
                                        while($row = $result->fetch_assoc())
                                     {
                                        ?>
                                        <tr>
                                          <th scope="row"><?php echo h($row['ID_Monst']); ?></th>
                                          <td><?php echo h($row['Nom_Monst']); ?></td>
                                          <td><?php echo h($row['Nom_Mond']); ?></td>
                                          <td><?php echo h($row['Nom_Dun']); ?></td>
                                          <td><?php echo h($row['Num_Etag']); ?></td>
                                          <td><?php echo h($row['x']); ?></td>
                                          <td><?php echo h($row['y']); ?></td>
                                          <td><?php echo h($row['HP']); ?></td>
                                          <td><?php echo h($row['Level']);
                                          /*$dateOfBirth = $row['date_de_naissance'];
                                          $today = date("Y-m-d");
                                          $diff = date_diff(date_create($dateOfBirth), date_create($today));
                                          echo h($diff->format('%y'));
                                           */?></td>
                                           <td><?php echo h($row['Attaque']); ?></td>
                                           <td class="text-center  text-light"><a href="suprimerMonstre.php?ID_Monst=<?php echo ($row['ID_Monst']);?>" name="button" class="btn btn-danger" >Suprimer</a>
                                        </tr>
                                      <?php }?>
                                      </tbody>
                                   </table>
                                 <div class="col-md-12">
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


<?php include "../php/database.php" ?>
<?php include "../php/class_dungeon.php" ?>
<?php include "../php/pagination.class.php" ?>
<?php include "../php/function.php" ?>
<?php include "../php/validation_fonctions.php" ?>
<?php include "../php/errors_status.php" ?>
<?php require('../php/dbinfo.php') ?>
<?php require('../php/init.php') ?>
<?php //require_login();  ?>
<?php
  $ID_Mond = $_GET['ID_Mond'] ?? false;
  echo $ID_Mond;

  // $current_page = $_GET['page'] ?? 1;
  // $per_page = 5;
  // $sqlc="SELECT COUNT(*) AS total FROM dungeon";
  // $result = Dungeon::query($sqlc);
  // $row = $result->fetch_array();
  // $total_count = array_shift($row);
  //
  // $pagination = new Pagination($current_page, $per_page, $total_count);
  // $sql = "SELECT * FROM dungeon";
  // $sql .=" INNER JOIN monde ";
  // $sql .="ON dungeon.ID_Mond = monde.ID_Mond ORDER BY  ASC ,date_de_creation_dossier DESC ";
  // $sql .= "LIMIT {$per_page} ";
  // $sql .= "OFFSET {$pagination->offset()}";
  // $dossier = Dungeon::query($sql);
  $result = Dungeon::find_all_dungeon_monde();

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
                            <?php


                              ?>
                            <table class="table table-striped table-bordered text-center table-responsive-md">
                              <thead>
                                <tr>
                                  <th scope="col">#Id Dungeon</th>
                                  <th scope="col">Nom du Dungeon</th>
                                  <th scope="col">Monde</th>
                                  <th scope="col">Width</th>
                                  <th scope="col">Height</th>
                                  <th scope="col">Difficulte</th>
                                  <th scope="col">Duree</th>
                                  <th scope="col">Etage</th>
                                  <th scope="col" class="text-center">Suprimer</th>

                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                while($row = $result->fetch_assoc())
                             {
                                $cpt=0;
                                  if (  ($ID_Mond==$row['ID_Mond'])) {
                                ?>
                                <tr>
                                  <th scope="row"><?php echo h($row['ID_Dun']); ?></th>
                                  <td><?php echo h($row['Nom_Dun']); ?></td>
                                  <td><?php echo h($row['Nom_Mond']); ?></td>
                                  <td><?php echo h($row['Width_Dun']); ?></td>
                                  <td><?php echo h($row['Height_Dun']); ?></td>
                                  <td><?php echo h($row['difficult_Dun']);
                                  /*$dateOfBirth = $row['date_de_naissance'];
                                  $today = date("Y-m-d");
                                  $diff = date_diff(date_create($dateOfBirth), date_create($today));
                                  echo h($diff->format('%y'));
                                   */?></td>
                                   <td><?php echo h($row['Duree']); ?></td>
                                   <td class="text-center  text-light"><a href="Etage.php?ID_Dun=<?php echo ($row['ID_Dun']);?>" name="button" class="btn btn-success" >Etage</a>
                                   <td class="text-center  text-light"><a href="suprimerDungeon.php?ID_Dun=<?php echo ($row['ID_Dun']);?>" name="button" class="btn btn-danger" >Suprimer</a>
                                </tr>
                              <?php }}?>
                              </tbody>
                           </table>
                         <div class="col-md-12">
                             <a  class="btn btn-info btn-lg col mb-3" href="ajouterDungeon.php?ID_Mond=<?php echo $ID_Mond;?>">Crée un Dungeon</a>
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

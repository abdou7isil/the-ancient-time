<?php include "../php/database.php" ?>
<?php include "../php/class_monde.php" ?>
<?php include "../php/pagination.class.php" ?>
<?php include "../php/function.php" ?>
<?php include "../php/validation_fonctions.php" ?>
<?php include "../php/errors_status.php" ?>
<?php require('../php/dbinfo.php') ?>
<?php require('../php/init.php') ?>
<?php //require_login();  ?>
<?php
  $current_page = $_GET['page'] ?? 1;
  $per_page = 5;
  $total_count = Monde::count_all_mondes();

  $pagination = new Pagination($current_page, $per_page, $total_count);

  $sql = "SELECT * FROM monde";
  //$sql .=" INNER JOIN patient ";
  //$sql .="ON rendez_vous.id_patient = patient.id_patient";
//  $sql.= " ORDER BY date_rendez_vous ASC,heure_d ASC ";
  $sql .= " LIMIT {$per_page} ";
  $sql .= "OFFSET {$pagination->offset()}";
  $mondes = Monde::query($sql);

  // $rendez_vous = RendezVous::find_by_sql($sql);
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
        <section>

        <div class="container-fluid ">
          <div class="row">
            <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
              <div class="row pt-md-5 mt-md-3 mb-5">

                <div class="col">
                  <table class="table table-striped table-bordered text-center table-responsive-md">
                    <thead>
                      <tr>
                        <th scope="col">#Id Mondes</th>
                        <th scope="col">Nom du monde</th>
                        <th scope="col">Width</th>
                        <th scope="col">Height</th>
                        <th scope="col">Date de Création</th>
                        <th scope="col">Roi Du Monde</th>
                        <th scope="col" class="text-center">Suprimer</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      // $result = RendezVous::find_all_patient();
                      $cpt=0;
                      ?>
                      <?php   while(($row = $mondes->fetch_assoc()) && ($cpt < $per_page))
                      { $cpt += 1;  ?>
                      <tr>
                        <th scope="row"><?php echo h($row['ID_Mond']); ?></th>
                        <td><?php echo h($row['Nom_Mond']); ?></td>
                        <td><?php echo h($row['Width']); ?></td>
                        <td><?php echo h($row['Height']); ?></td>
                        <td><?php echo h($row['date_de_creation']);
                        /*$dateOfBirth = $row['date_de_naissance'];
                        $today = date("Y-m-d");
                        $diff = date_diff(date_create($dateOfBirth), date_create($today));
                        echo h($diff->format('%y'));
                         */?></td>
                         <td><?php echo h($row['Roi_Mond']); ?></td>
                        <td class="text-center  text-light"><a href="suprimermonde.php?ID_Mond=<?php echo ($row['ID_Mond']);?>" name="button" class="btn btn-danger" >Suprimer</a>
                      </tr>
                      <?php }?>
                    </tbody>
                 </table>


               </div>
                 <div class="col-md-12">
                     <a  class="btn btn-info btn-lg col mb-3" href="ajouterMonde.php">Crée un Monde</a>

                   <nav aria-label="test">

                   <ul class="pagination justify-content-center">

                   <?php
                   $url = 'rendez-vous.php';
                   echo $pagination->page_links($url);
                   ?>
                 </ul>
               </nav>
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

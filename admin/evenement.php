<?php include "../php/database.php" ?>
<?php include "../php/class_evenement.php" ?>
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
  $total_count = Evenement::count_all_evenements();

  $pagination = new Pagination($current_page, $per_page, $total_count);

  $sql = "SELECT * FROM evenement";
  $sql .= " LIMIT {$per_page} ";
  $sql .= "OFFSET {$pagination->offset()}";
  $evenements = Evenement::query($sql);

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
                                <th scope="col">#Id evenement</th>
                                <th scope="col">Nom de l'evenement</th>
                                <th scope="col">date de debut</th>
                                <th scope="col">date de fin</th>
                                <th scope="col">Min level</th>
                                <th scope="col">Monde</th>
                                <th scope="col" class="text-center">Suprimer</th>

                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              // $result = RendezVous::find_all_patient();
                              $cpt=0;
                              ?>
                              <?php   while(($row = $evenements->fetch_assoc()) && ($cpt < $per_page))
                              { $cpt += 1;  ?>
                              <tr>
                                <th scope="row"><?php echo h($row['ID_Event']); ?></th>
                                <td><?php echo h($row['Nom_Event']); ?></td>
                                <td><?php echo h($row['Date_Debut_Event']); ?></td>
                                <td><?php echo h($row['Date_Fin_Event']); ?></td>
                                <td><?php echo h($row['Min_Level']);
                                /*$dateOfBirth = $row['date_de_naissance'];
                                $today = date("Y-m-d");
                                $diff = date_diff(date_create($dateOfBirth), date_create($today));
                                echo h($diff->format('%y'));
                                 */?></td>
                                 <td><?php echo h($row['ID_Mond']); ?></td>
                                <td class="text-center  text-light"><a href="suprimerEvenement.php?ID_Event=<?php echo ($row['ID_Event']);?>" name="button" class="btn btn-danger" >Suprimer</a>
                              </tr>
                              <?php }?>
                            </tbody>
                         </table>


                       </div>
                         <div class="col-md-12">
                             <a  class="btn btn-info btn-lg col mb-3" href="ajouterEvenement.php">Crée un Evenement</a>

                           <nav aria-label="test">

                           <ul class="pagination justify-content-center">

                           <?php
                           $url = 'evenement.php';
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

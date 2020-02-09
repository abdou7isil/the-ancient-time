<?php include "../php/database.php" ?>
<?php require "../php/Bug.php" ?>
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
  $total_count = Bug::count_all_bug();
echo $total_count;
  $pagination = new Pagination($current_page, $per_page, $total_count);

  $sql = "select id_bug,probleme.nom,rapport.date_send  from bug join probleme on probleme.id_probleme=bug.id_probleme join rapport on rapport.id_rapport=bug.id_rapport order by date_send DESC ";
  //$sql .=" INNER JOIN patient ";
  //$sql .="ON rendez_vous.id_patient = patient.id_patient";
//  $sql.= " ORDER BY date_rendez_vous ASC,heure_d ASC ";
  $sql .= " LIMIT {$per_page} ";
  $sql .= "OFFSET {$pagination->offset()} ";
  $mondes = Bug::query($sql);

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
                        <th scope="col">Probleme</th>
                        <th scope="col">Date</th>
                        <th scope="col" class="text-center">Operation</th>

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
                       <td><?php echo h($row['nom']); ?></td>
                         <td><?php echo h($row['date_send']); ?></td>
                        <td class="text-center  text-light">
                          <a href="BugConsulter.php?id=<?php echo ($row['id_bug']);?>" name="button" class="btn btn-primary" >Consulter</a>
                         
                      </tr>
                      <?php }?>
                    </tbody>
                 </table>


               </div>
                 <div class="col-md-12">
                   <nav aria-label="test">

                   <ul class="pagination justify-content-center">

                   <?php
                   $url = 'bug.php';
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

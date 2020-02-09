<?php
if(!isset($_GET["id"])){
  //header("location: bug.php");
}
include '../php/Communication/database.inc';
$database=new database();
$result=$database->query("SELECT `rapport`.`id_rapport`, `id_joueur`, `description`, `date_send`,probleme.nom FROM `rapport` join bug on `rapport`.`id_rapport`=bug.`id_rapport` join probleme on probleme.id_probleme=bug.id_probleme where bug.id_bug=".$_GET["id"]);
$bug=mysqli_fetch_assoc($result);
var_dump($bug);
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

                    <form action="ajouterMonde.php" method="post"style="border:2px solid #5D6D7E ;
                       box-shadow: 0px 4px 6px 6px #5D6D7E ;
                      border-radius: 5px;
                      align-self: center;" class="border border-secondary rounded  p-3">
                      <div class="text-secondary mb-2">

                      <i class="far fa-plus-square fa-2x d-inline"></i><h3 class="d-inline m-2">Ajouter un Monde</h3>
                    </div>
                   <div class="font-weight-bold">
<div class="form-row">
<div class="form-group col-md-12">
  <label for="nom_monde">Nom :</label>
  <input type="text" name="nom" class="form-control" value="<?php echo $bug["nom"]?>"  placeholder="Nom du monde">
</div>
</div>
<div class="form-row">
<div class="form-group col-md-12">
  <label for="largeur">Description :</label>
  <textarea type="text" name="monde[Width]" class="form-control" > <?php echo $bug["description"]?> </textarea>
</div>
</div>
<div class="form-row">
<div class="form-group col-md-12">
  <label for="largeur">Date :</label>
  <input type="text"  class="form-control" value="<?php echo $bug["date_send"]?> ">
</div>
</div>
<?php if(file_exists("../img/Rapport/".$bug["id_rapport"].".jpg")){?>
<div class="form-row">
<div class="form-group col-md-12" style="overflow: hidden;">
  <label for="largeur">Capture :</label>
  <img src="../img/Rapport/<?php echo $bug["id_rapport"];?>.jpg">
</div>
</div>
</div>
<?php }?>
</div>

</div>


                      
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

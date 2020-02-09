<?php
include '../php/Communication/database.inc';
$database=new database();
if(isset($_POST["Suspendre"])){
 $database->query("INSERT INTO `suspendre`( `id_signal`, `id_joueur`, `date_debut`, `date_fin`) VALUES (".$_POST["id_signal"]." , ".$_POST["id_joueur_signal"]." , now(), '".date( 'Y-m-d', strtotime( '+'.$_POST["duree"].' days' ) )."' ) ");
}
if(
!isset($_GET["id"])){
  header("location: signal.php");
}

$result=$database->query("SELECT id_joueur_signal, signal_.id_signal,`rapport`.`id_rapport`, `id_joueur`, `description`, `date_send`,sprobleme.nom FROM `rapport` join signal_ on `rapport`.`id_rapport`=signal_.`id_rapport` join sprobleme on sprobleme.id_sprobleme=signal_.id_sprobleme where rapport.id_rapport=".$_GET["id"]);
if(mysqli_num_rows($result)==0){
  header("location: signal.php");
}
$bug=mysqli_fetch_assoc($result);

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

                    <form action="signalConsulter.php" method="post"style="border:2px solid #5D6D7E ;
                       box-shadow: 0px 4px 6px 6px #5D6D7E ;
                      border-radius: 5px;
                      align-self: center;" class="border border-secondary rounded  p-3">
                      <div class="text-secondary mb-2">

                      <i class="far fa-plus-square fa-2x d-inline"></i><h3 class="d-inline m-2">Signal</h3>
                    </div>
                   <div class="font-weight-bold">
<div class="form-row">
<div class="form-group col-md-12">
  <label for="nom_monde">Probleme :</label>
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
<div class="form-row">
<div class="form-group col-md-12">
  <label for="largeur">Durée :</label>
  <select name="duree"  class="form-control">
    <option value="1">1 jours</option>
     <option value="3">3 jours</option>
      <option value="5">5 jours</option>
       <option value="7">7 jours</option>
        <option value="15">15 jours</option>
         <option value="30">30 jours</option>
  </select>
</div>
</div>
<input type="hidden" name="id_signal" value="<?php echo $bug["id_signal"]?>">
<input type="hidden" name="id_joueur_signal" value="<?php echo $bug["id_joueur_signal"]?>">
<button type="submit" name="Suspendre" class="form-control btn btn-success">Suspendre</button>
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

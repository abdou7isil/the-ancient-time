<?php
require 'php\Communication\database.inc';
$database =new database();
session_start();
if(isset($_POST["envoyer"])){
  if(isset($_POST["description"]) && !empty($_POST["description"])){
     $database->query("INSERT INTO `rapport`(`id_joueur`, `description`, `date_send`) VALUES (1,'".$_POST["description"]."',now())");
     $id_rapport = $database->insertid();
     $database->query("INSERT INTO `signal_`(`id_joueur_signal`, `id_rapport`, `id_sprobleme`) VALUES (".$_POST["id_joueur_signal"].",".$id_rapport." , ".$_POST["id_probleme"].")");
     if(isset($_FILES["capture"])&&!empty($_FILES["capture"])){
      $target_file = "img/Rapport/".$id_rapport.".".strtolower(pathinfo($_FILES["capture"]["name"],PATHINFO_EXTENSION));
      move_uploaded_file($_FILES["capture"]["tmp_name"], $target_file);
    } 
    header("location: index.php");
  }
}
if(!(isset($_GET["j"])&&!empty($_GET["j"]))){
   header("location: index.php");
}else{
  $result_joueur=$database->query("select username from joueur where id_joueur=".$_GET["j"]);
  if(mysqli_num_rows($result_joueur)==1){
    $joueur=mysqli_fetch_assoc($result_joueur);
  } else{
    header("location: index.php");
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>
<link rel="stylesheet" type="text/css" href="default.css" media="screen"/>
<link rel="stylesheet" type="text/css" href="style.css">
<style type="text/css">
.error {	width: 90%;
	margin-bottom:15px;
 	 
	padding: 10px; 
	border: 1px solid #a94442; 
	color: #a94442; 
	background: #f2dede; 
	border-radius: 5px; 
	text-align: left;
	margin-left:20px;
}

</style>
<title>The Ancient Time</title>

</head>
<body>
<div id="LogoZone">
  <img src="img/logo.png" alt="" width="308" height="520" id="logo" />    
</div>

<div id="BoxZone">
  <img src="img/45545444.png" alt="" width="97" height="80" id="box" />
</div>

<div id="BarLog"><p id="ancient" align="center">The Ancient Time  </p>

  <p>
  <form id="formLog" method="post" action="">
    <p>
    <label><span id="user">User </span></label>
    
    <input name="userInpt" type="text" placeholder="Your user name" />
    </p>
    <p>
    <label><span id="pass">Password </span></label>
    
    <input name="passInpt" type="password" placeholder="********" />
    </p>
    <p align="center">
    <a href="#" class="obPass">Forgot your password ?</a></p>
    <p>&nbsp;</p>
    <p align="center">
      <button type="submit" name="logBtn">Connect</button>
 </p>
 </form>
    </p>
  
</div>

<div class="container">
 
  <div class="gfx"></div>
<div class="top">
    <div class="navigation"> <a href="#" id="selected">home</a> <a href="#">forum</a> <a href="#">property</a> <a href="#">player</a> <a href="#">history</a> </div>
    <div class="pattern"><span></span></div>
    <div class="header">
	
      <h1 align="right">  The Ancient Time </h1>
      <p  align="center" class="style2"> the greatest war and treasure hunt </p>
    </div>
    <div class="pattern"><span></span></div>
  </div>
  <div>
  <p>       </p>
  </div>
  <div class="content">
  <p align="center" >&nbsp;</p>
   <p align="center" id="reg">Signaler un compte     </p>
   <div id="BarReg">
      <form id="formReg" method="post" action="Signal.php" enctype="multipart/form-data">
      <div style="display: flex;justify-content: flex-start;">
        <img src="img/you.png">
          <label for="textfield"><span id="name"><?php echo $joueur["username"];?></span></label>
      </div>
      <p>
        <label for="textfield"><span id="name">Probleme (Sélectionnez en fonction) :</span></label>
        <select name="id_probleme" class="inputbug" >
          <?php
             $database =new database();
             $result=$database->query("select * from sprobleme");
             while($row=mysqli_fetch_assoc($result)){
               echo "<option value=\"".$row["id_sprobleme"]."\">".$row["nom"]."</option>";
             }
          ?>
        </select>
      </p>
      <p>
        <label for="textfield"><span id="name">Description :</span></label>
        <textarea name="description" class ="inputbug" rows="3"></textarea>
      </p>
      <p>
        <label for="textfield"><span id="name">Capture :</span></label>
        <input type="file" name="capture" class="inputbug" />
      </p>
      <p class="style20">&nbsp;</p>
      <input type="hidden" name="id_joueur_signal" value="<?php echo $_GET['j'];?>">
      <p align="center">
        <button type="submit" name="envoyer" >Envoyer</button>
      </p>
      <p>&nbsp;</p>
      </form>
   </div>
  </div>
   <div class="footer">
     <p>&copy;</p>
  </div>
</div>
</body>
</html>

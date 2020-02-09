<?php
session_start();
$name="";
$firstName="";
$dateOfBirth="";
$accountName="";
$email="";
$password_1="";
$password_2 ="";
 $errors = array(); 
	$_SESSION['success'] = "";

$db=mysqli_connect('localhost','root','','ancient_time_db');
 if (isset($_POST['reg_user'])) {
    
// receive all input values from the form
        $name = mysqli_real_escape_string($db, $_POST['name']);
		$firstName = mysqli_real_escape_string($db, $_POST['firstName']);
		$dateOfBirth = mysqli_real_escape_string($db, $_POST['dateOfBirth']);
		$accountName = mysqli_real_escape_string($db, $_POST['accountName']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
        $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
      
        //check empty stack
        if(empty($name)){ array_push($errors, "Name is requiered");}
         if(empty($firstName)){ array_push($errors, "First Name is required");}
          if(empty($dateOfBirth)){ array_push($errors, "date Of Birth is required");}
           if(empty($accountName)){ array_push($errors, "Account  Name is required");}
		     if(empty($email)){ array_push($errors, "Email is required");}
			    if(empty($password_1)){ array_push($errors, "¨Password is required");}
				 if(empty($password_2)){ array_push($errors, "¨Passsword confirm is required");}
		   if ($password_1 != $password_2) {
			 array_push($errors, "Password not match");
		}
		if(!isset($_POST['charter']))
		{array_push($errors, "Read the charter");}
		
		    if (count($errors) == 0){
        

        $password=md5($password_1);
        $query="INSERT INTO joueur (NomJ,PrenomJ,DateNaisJ,NomCompt,EmailJ,MotPasse)Values('$name','$firstName','$dateOfBirth','$accountName','$email','$password')";
        mysqli_query($db,$query);
        
        $_SESSION['accountName'] = $accountName;
			$_SESSION['success'] = "Register Successfull";
			header('location: AccountValidation.php');
}
}



// LOGIN USER
	if (isset($_POST['logBtn'])) {
		$userInpt = mysqli_real_escape_string($db, $_POST['userInpt']);
		$passInpt = mysqli_real_escape_string($db, $_POST['passInpt']);

		if (empty($userInpt)) {
			array_push($errors, "Username is required");
		}
		if (empty($passInpt)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM joueur WHERE NomCompt='$userInpt' AND MotPasse='$passInpt'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['userInpt'] = $userInpt;
				$_SESSION['success'] = "Login is succesed  ";
				header('location: PlayerPanel.php');
			}else {
				array_push($errors, " Error in username or password");
			}
		}
	}

// CREATE PERSONAGE
	if (isset($_POST['newPersn'])) {
		$nameP = mysqli_real_escape_string($db, $_POST['nameP']);
		$power = mysqli_real_escape_string($db, $_POST['power']);
		$PRR = mysqli_real_escape_string($db, $_POST['PRR']);
		$dext = mysqli_real_escape_string($db, $_POST['dext']);
		$const = mysqli_real_escape_string($db, $_POST['const']);
		$intel = mysqli_real_escape_string($db, $_POST['intel']);
		$race = mysqli_real_escape_string($db, $_POST['race']);
		$sexe = mysqli_real_escape_string($db, $_POST['sexe']);

		 if(empty($nameP)){ array_push($errors, "Name of personage is requiered");}
         if(empty($power)){ array_push($errors, "Power is required");}
          if(empty($PRR)){ array_push($errors, "PRR is required");}
           if(empty($dext)){ array_push($errors, "Dexterity is required");}
		     if(empty($const)){ array_push($errors, "Constitution is required");}
			    if(empty($intel)){ array_push($errors, "Intelligence is required");}
				 if(empty($race)){ array_push($errors, "Race is required");}
				  if(empty($sexe)){ array_push($errors, "Sexe is required");}

		if (count($errors) == 0){
        
	 $query="INSERT INTO personnage, classe c, joueur j  (Nom_Pers,For_ce,Dexterite,Constitution,Inteligence,c.Race,c.Sexe,j.PointRestRepart)Values('$nameP','$power','$dext','$const','$intel','$race','$sexe','$PRR')";
        mysqli_query($db,$query);
        
     
			header('location: play.php');
}
	}

if (isset($_POST['erase'])){
	$nameP="";
	$power="";
	$PRR = "";
		$dext = "";
		$const = "";
		$intel = "";
		$race = "";
		$sexe = "";
}

?>
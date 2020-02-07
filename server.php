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

$db=mysqli_connect('localhost','root','basma123','ancient_time_db');
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
			    if(empty($password_1)){ array_push($errors, "�Password is required");}
				 if(empty($password_2)){ array_push($errors, "�Passsword confirm is required");}
		   if ($password_1 != $password_2) {
			 array_push($errors, "Password not match");
		}
		    if (count($errors) == 0){


        $password=md5($password_1);
        $query="insert into joueur (ID_J,Nom_J,Prenom_J,Date_Nais_J,Nom_Compt,Email_J,Mot_Passe)Values(0,'$name','$firstName','$dateOfBirth','$accountName','$email','$password)";
        mysqli_query($db,$query);

        $_SESSION['firstName'] = $firstName;
			$_SESSION['success'] = "Register Successfull";
			header('location: register2.php');
}
}


/*
// LOGIN USER
	if (isset($_POST['login'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "Login is succesed  ";
				header('location: home.php');
			}else {
				array_push($errors, " Error in username or password");
			}
		}
	}



      // Add

	if (isset($_POST['send'])) {

 $itemname = mysqli_real_escape_string($db, $_POST['itemname']);
 $price = mysqli_real_escape_string($db, $_POST['price']);
  $amount = mysqli_real_escape_string($db, $_POST['amount']);
  $exp_d = mysqli_real_escape_string($db, $_POST['exp_d']);
  $type = mysqli_real_escape_string($db, $_POST['type']);
      $notes = mysqli_real_escape_string($db, $_POST['notes']);




      if (empty($itemname)) {array_push($errors, "Item name is required");}
      if (empty($price)) {array_push($errors, "Price is required");}
       if (empty($amount)) {array_push($errors, "Amount  is required");}
        if (empty($exp_d)) {array_push($errors, "Exp. Date  is required");}


         if ($type=='Select_Item') {array_push($errors, " Type is required");}




if (count($errors) == 0) {
      $query="insert into items(itemname,price,amount,exp_d,type,notes)Values('$itemname','$price','$amount','$exp_d','$type','$notes')";
        mysqli_query($db,$query);


       array_push($errors, "Done");


    }
    }

*/
?>

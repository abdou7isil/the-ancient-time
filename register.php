<?php include('server.php'); ?>
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
    </p>
  </form>
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
   <p align="center" id="reg">REGISTER    </p>
   <div id="BarReg">
      <form id="formReg" method="post" action="register.php">
      <?php include('errors.php'); ?>
      <p>
        <label for="textfield"><span id="name">Name :</span></label>
        <input name="name" type="text" id="nameInpt" size="50" value="<?php echo $name ?>" />
      </p>
      <p>
        <label for="label"><span id="Fname">First Name  :</span></label>
        <input name="firstName" type="text" id="FnameInpt" size="50" value="<?php echo $firstName ?>" />
      </p>
      <p>
        <label for="label2"><span class="Dbirth">Date of birth  :</span></label>
        <input name="dateOfBirth" type= "date" id="DbirthInpt" size="50" value="<?php echo $dateOfBirth ?>"/>
      </p>
      <p>
        <label for="label3"><span id="AccName">Account Name  :</span></label>
        <input name="accountName" type="text" id="AccNameInpt" size="50" value="<?php echo $accountName ?>" />
      </p>
      <p>
        <label for="label4"><span id="mail">E-mail Adress  :</span></label>
        <input name="email" type="email" id="mailInpt" size="50" value="<?php echo $email ?>"/>
      </p>
      <p>
        <label for="label5"><span id="pass1">Password:</span></label>
        <input name="password_1" type="password" id="pass1Inpt" size="50" value="<?php echo $password_1 ?>" />
      </p>
      <p>
        <label for="label6"><span id="pass2">Confirm Password :</span></label>
        <input name="password_2" type="password" id="pass2Inpt" size="50" value="<?php echo $password_2 ?>"  />
      </p>
      <p class="style20">&nbsp;</p>
      <p>
        <input type="checkbox" name="charter" value="checkbox" id="checkboxChart" />
        <label for="checkbox" id="cond"><em> I certify that I have read and accept <a href="#">the player charter</a></em>.</label>
      </p>
      <p align="center">
        <button type="submit" name="reg_user" >Validate and Confirm</button>
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

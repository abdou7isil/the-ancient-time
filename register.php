<?php include('server.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>
<link rel="stylesheet" type="text/css" href="default.css" media="screen"/>
<title>The Ancient Time</title>
<style type="text/css">

.style2 {font-size: 9}
#Layer1 {
	position:absolute;
	left:1092px;
	top:86px;
	width:399px;
	height:411px;
	z-index:1;
	visibility: visible;
}
#Layer7 {
	position:absolute;
	left:1303px;
	top:384px;
	width:130px;
	height:115px;
	z-index:4;
}
#Layer8 {
	position:absolute;
	left:469px;
	top:362px;
	width:586p
	height:530px;
	z-index:5;
	height: 594px;
}
#Layer8 input{boder-radius: 6px;
	-moz-border-radius: 6px;
	-webkit-border-radius: 6px;
	margin-bottom:15px;
	height:20px;
	background-color:#FCFFB7;
	}
#Layer8 input[name="checkbox"]
{
height:5px;
width:5px

}


#Layer8 span{
width:180px;
display:inline-block;
}
#Layer8 button{
height:40px;
background-color:#336633;
color:#FFFFFF;
boder-radius: 6px;
	-moz-border-radius: 6px;
	-webkit-border-radius: 6px;
width:200px;
font:"Times New Roman", Times, serif;
font-size:18px;
margin-left:180px;
}
#Layer8 button:hover{
border:1px solid #FF0000;
color:#16f998;
}
.error {
	width: 90%;
	margin-bottom:15px;
 	 
	padding: 10px; 
	border: 1px solid #a94442; 
	color: #a94442; 
	background: #f2dede; 
	border-radius: 5px; 
	text-align: left;
	margin-left:20px;
}

.style15 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 16px;
}
.style17 {font-size: 16px}
.style19 {font-size: xx-large}
.style20 {font-size: medium; }
.style22 {font-size: medium; font-weight: bold; }
#Layer9 {
	position:absolute;
	left:30px;
	top:603px;
	width:124px;
	height:220px;
	z-index:6;
}

-->
</style>
</head>
<body>

<div id="Layer1" ><img src="img/logo.png" alt="" width="320" height="411" /></div>
<div id="Layer7"><img src="img/45545444.png" alt="" width="132" height="89" /></div>
<div id="Layer8"> 
  <p align="center" class="style19"> Register</p>
  <form id="form1" method="post" action="register.php">
  <?php include('errors.php'); ?>
    <p>
      <label for="textfield"><span class="style22" id="name">Name :</span> </label>
      <input name="name" type="text" id="textfield" size="50" value="<?php echo $name ?>" />
    </p>
  
    <p>
      <label for="label"><span class="style22">First Name  :</span></label>
      <input name="firstName" type="text" id="label" size="50" value="<?php echo $firstName ?>" />
    </p>
 
    <p>
      <label for="label2"><span class="style22">Date of birth  :</span></label>
      <input name="dateOfBirth" type= "date" id="label2" size="50" value="<?php echo $dateOfBirth ?>"/>
    </p>
	
    <p>
      <label for="label3"><span class="style22">Account Name  :</span></label>
      <input name="accountName" type="text" id="label3" size="50" value="<?php echo $accountName ?>" />
    </p>
  
    <p>
      <label for="label4"><span class="style22">E-mail Adress  :</span></label>
      <input name="email" type="email" id="label4" size="50" value="<?php echo $email ?>"/>
    </p>
  
    <p>
      <label for="label5"><span class="style22">Password:</span> </label>
      <input name="password_1" type="password" id="label5" size="50" value="<?php echo $password_1 ?>" />
    </p>
  
    <p>
      <label for="label6"><span class="style22">Confirm Password :</span></label>
      <input name="password_2" type="password" id="label6" size="50" value="<?php echo $password_2 ?>"  />
    </p>
	 <p class="style20">&nbsp;</p>
  
    <p class="style20">
      <input type="checkbox" name="charter" value="checkbox" id="checkbox" />
      <label for="checkbox"><em>I certify that I have read and accept <a href="#">the player charter</a></em>.</label>
    </p>
	 <p>
	       <button type="submit" name="reg_user" >Validate and Confirm</button>
    </p>
	 <p>&nbsp;</p>
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
    <div class="divider">
      <p>&nbsp;</p>
    </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p><label></label>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </div>
   <div class="footer">
     <p>&copy;</p>
  </div>
</div>
</body>
</html>

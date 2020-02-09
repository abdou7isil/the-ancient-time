<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>
<link rel="stylesheet" type="text/css" href="default.css" media="screen"/>
<link rel="stylesheet" type="text/css" href="style.css">

<title>The Ancient Time</title>

</head>
<body>

<div class="container">
 
  <div class="gfx"></div>
<div class="top">
    <div class="navigation"> <a href="home.php" id="selected">HOME</a>  <a href="#">PROPERTY</a> <a href="#">PLAYER</a> <a href="#">HISTORY</a> </div>
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
   <p align="center" id="reg">PERSONAGE   </p>
<div id="BarPers">
  <form id="formPers" method="post" action="">   <p>
   <label for="textfield">
   <span id="namePers">Name of personage :
   </span>
   </label>
   <input name="nameP" type="text" id=    "namePersInpt" size="50" value="" />
   </p>
   <hr />
   <p>&nbsp;</p>
   <p>
   <label for="label">
   <span id="Power">Power  :</span>
   </label>
   <input name="power" type="number" id="PowerInpt" size="3" value="" />
   <label for="label">
   <span id="PRR">Points remaining to be distributed :  </span>
   </label>
   <input name="PRR" type="text" id="PRRInpt" size="3" value="" />
   
   </p>
   <p>
   <label for="label2">
   <span id="Dext">Dexterity  :</span>
   </label>
   <input name="dext" type= "number" id="DextInpt" size="3" value=""/>
   </p>
   <p>
   <label for="label3">
   <span id="Const">Constitution :</span>
   </label>
   <input name="const" type="number" id="ConstInpt" size="3" value="" />
   </p>
   <p>
   <label for="label4">
   <span id="Intel"> Intelligence  :</span>
   </label>
   <input name="intel" type="number" id="intelInpt" size="3" value=""/>
   </p>
   <hr />
   <p>&nbsp;</p> 
   <p>
   <label for="label5">
   <span id="Race">Race :</span>
   </label>
   <select id="chooseRace" name="race">
    <option value=" fées"> Fairies</option>
    <option value="anges">Angels</option>
    <option value="démons">Demons</option>
    <option value="géants">Giants</option>
    <option value="humains">Humans</option>
   </select>
   </p>
   <p>
   <label for="label5">
   <span id="Sexe">Sexe :</span>
   </label>
   <select id="chooseSexe" name="sexe">
    <option value=" homme"> Men</option>
    <option value="femme">Women</option>
   </select>
   </p>
   <p>&nbsp;</p>
   <p align="center">
   <button type="submit" name="erase" >Erase everything</button>

   <button type="submit" name="newPersn" >Validate and Confirm</button>
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

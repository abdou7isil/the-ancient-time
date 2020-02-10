<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<?php
$sql_name="root";
$sql_pass="";
$server_name="localhost";
$db_name="ancient_time_db";
$conn = new mysqli($server_name, $sql_name, $sql_pass, $db_name);
// Check connection
if ($conn->connect_error) {
  echo "string";
    die("Connection failed: " . $conn->connect_error);
}
echo "yessss";


?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>
<link rel="stylesheet" type="text/css" href="css/default.css" media="screen"/>
<title>The Ancient Time</title>
<style>
.or_pack{
  ;
}
.object{
  height: 50%;


}
.object_list{
  height: 50%;

}

}
.table-object{
  padding-right: 50px;
  margin-right: : 100px;
  float: right;
  width: 100%;
}
.table-image{
  float: left;
  width: 50%;
}

</style>

</head>
<body>

<div id="Layer1" ><img src="img/logo.png" alt="" width="232" height="411" /></div>
<div class="header" id="Layer3">
  <pre><a href="#" class="style8 style12">

Create an account</a>

<label><span class="style11">Login<br /></span></label><input name="login" type="text" placeholder= "your user name" /><label><span class="style11"><br />Password<br /><input name="login" type="password" placeholder="***********"  /></span></label>
  </pre>
  <form id="form1" method="post" action="">
    <pre class="style13"><input type="submit" name="Submit" value="Valider" />
    </pre>
  </form>

  <pre><a href="#" class="style8 style12">Forgot your password ?</a>
  </pre>
</div>

<div id="Layer7"><img src="img/45545444.png" alt="" width="132" height="89" /></div>
<div class="container">
   <div id="Layer5">
  <h1 align="center" class="style4">&nbsp;</h1>
  <h1 align="center" class="style6">The Ancient Time </h1>
</div>
   <div class="gfx"></div>
  <div class="top">
    <div class="navigation">
      <a href="#" id="selected">home</a>
      <a href="#">forum</a> <a href="#">property</a>
      <a href="#">player</a>
      <a href="#">magasin</a>
       <a href="history.php">history</a> </div>
    <div class="pattern"><span></span></div>
    <div class="header">

      <h1 align="right">  The Ancient Time </h1>
      <p  align="center" class="style2">only the strongest will survive</P><br>
      <p   align="center" > the greatest war and treasure hunt </p>
    </div>
    <div class="pattern"><span></span></div>
  </div>
  <div>
  <p>       </p>
  </div>
  <div class="content" style="display-item : inline-block;">

    <div class="or_pack">
      <table border="1px" >
        <thead>
          <tr background-color="white">
            <td> <img src="img/pack1.jpg" width="183px"> </td>
            <td><img src="img/pack2.jpg" width="188px"></td>
            <td><img src="img/pack3.jpg" width="178px"></td>
          </tr>
          <tr>
            <td> <input type="submit" value="acheter" style="width:183px;height:35px;background-color:#ffff4d;"/></td>
            <td> <input type="submit" value="acheter" style="width:188px;height:35px;background-color:#ffff4d;"/></td>
            <td> <input type="submit" value=" acheter"style="width:178px;height:35px; background-color:#ffff4d;"/> </td>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>

    <div class="object">


        <table margin="10px" padding="5px" width="500px">
	  	<tr>
	  		<td>   <img  src="img/arms/sward.png" alt=""width="100%" height="95px" /> </td>
	  		<td> <table width="200px"><tr>

          <td><strong> force :</strong></td>
          <td>70</td>
          <td><strong> etat :</strong></td>
          <td>neuf</td>
        </tr>
        <tr>
          <td><strong>pa :</strong> </td>
          <td>0</td>
          <td><strong>pm :</strong> </td>
          <td>0</td>
        </tr>
        <tr>
          <td><strong> résistance :</strong></td>
          <td>15</td>
          <td><strong>pv :</strong></td>
          <td>80</td>
        </tr> </table></td>
	  	</tr>

        <tr>
	  		<td><h2>épée</h2>
	  			<h2>10</h2> </td>
	  		<td></td>
	  	</tr>
      </table>



      </div>

  <div class="object_list">
    <table border="1px" Width="100%">
      <?php
      $query="select Nom_Obj,prix_objet from objet";
      $result=$conn->query($query);
      while($row = $result->fetch_assoc()) {

       echo '
      <tr>
        <td style="width:10%">  <img src="img/arms/'; echo $row["Nom_Obj"]; echo '.png" alt=""width="55px" ></td>
        <td style="Width:50%"> <h4>'; echo $row["Nom_Obj"]; echo '</h4> <h4>'; echo $row["prix_objet"]; echo '</h4> </td>
        <td> <input type="submit" name="';echo $row['Nom_Obj'];echo '" value="voir" style=" width: 250px;height:40px;background-color:#4dff4d;" > </td>
      </tr>
      ';
    }
     ?>
    </table>




  </div>







  </div>
   <div class="footer" Height="500px">
     <p>&copy;</p>
  </div>
</div>
</body>
</html>
}

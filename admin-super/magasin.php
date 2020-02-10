
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="../css/style_admin.css">
    <link rel="stylesheet" href="../css/magasin.css">
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
   include'../html/comptable/navbar.php'
     ?>
      <section>
        <div class="container-fluid ">
        <div class="row">
          <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="row pt-md-5 mt-md-3 mb-5">
              <div class="col">


                <table class="tabble_revenus" style="Width:500px ; border-width: medium; " >
                  <h2> les packs</h2>
                  <thead>
                    <th style="background-color: #c2c2a3;">
                      <td style="background-color: #c2c2a3 ;border-width: medium;"> <strong>pack1 </strong></td>
                      <td style="background-color: #c2c2a3 ;border-width: medium;"><strong>pack2</strong></td>
                      <td style="background-color: #c2c2a3 ;border-width: medium;"><strong>pack3</strong></td>
                    </th>
                  </thead>
                  <tbody>
                    <tr>
                      <td style="border-width: medium;background-color: #c2c2a3;" ><strong>quantité</strong></td>
                      <td style="border-width: medium;">1</td>
                      <td style="border-width: medium;">2</td>
                      <td style="border-width: medium;">3</td>
                    </tr>
                  </tbody>
                </table><br>

                <table classe="table_achat" width=500px >
                  <h2> les achat</h2>
                  <thead>
                    <th style="background-color: #c2c2a3 ;border-width: medium;">
                      <td style="background-color: #c2c2a3 ;border-width: medium;"><strong>ID achat</strong></td>
                      <td style="background-color: #c2c2a3 ;border-width: medium;"><strong>Montant</strong></td>
                      <td style="background-color: #c2c2a3 ;border-width: medium;"><strong>Date ahat</strong></td>
                      <td style="background-color: #c2c2a3 ;border-width: medium;"><strong>ID joueur</strong></td>
                      <td style="background-color: #c2c2a3 ;border-width: medium;"><strong>ID oobjet</strong></td>
                   </th>
                  </thead>
                  <tbody>
                    <tr>
                      <td style="background-color: #c2c2a3 ;border-width: medium;"><strong>achat</strong></td>
                      <td style="border-width: medium;">1</td>
                      <td style="border-width: medium;">10</td>
                      <td style="border-width: medium;">10-02-2020</td>
                      <td style="border-width: medium;">1</td>
                      <td style="border-width: medium;">1</td>
                    </tr>
                  </tbody>
                </table>
                <form>
                  <tr>
                    <td style="border : none"><h1>  </h1> </td>
                  </tr>

                  <tr>
                    <td style="border : none">  <h2>Ajouter remise</h2></td>
                  </tr>
                  <tr>

                    <td style="border : none"><strong>ID objet </strong></td>
                    <td style="border : none"><input type="textField" required></td>
                    <td style="border : none"><strong>pourcentage (%)   </strong></td>
                    <td style="border : none"><input type="textField" required></td>
                    <td style="border : none"><input type="submit" value="valider"></td>
                  </tr>
                </form>



             </div>
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

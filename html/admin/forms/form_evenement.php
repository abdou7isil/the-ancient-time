<div class="font-weight-bold">
<div class="form-row">
<div class="form-group col-md-6">
  <label for="nom_monde">Nom De L'Evenement :</label>
  <input type="text" name="event[Nom_Event]" class="form-control"  placeholder="Nom de l'event">
</div>
</div>
<div class="form-row">
<div class="form-group col-md-6">
  <label for="largeur">Date de début :</label>
  <input type="date" name="event[Date_Debut_Event]"   class="form-control" value="<?php echo date("Y-m-d"); ?>" placeholder="....">
</div>
<div class="form-group col-md-6">
 <label for="hauteur">Date De Fin :</label>
 <input type="date" name="event[Date_Fin_Event]" class="form-control" value="<?php echo date("Y-m-d"); ?>"  placeholder="....">
</div>
</div>

<div class="form-row">
<div class="form-group col-md-6">
<label for="date_de_creation">Min level :</label>
<input type="text" name="event[Min_Level]" class="form-control"  min="1900-01-01" max="<?php echo date("Y-m-d"); ?>">
</div>
</div>
<div class="form-row">
  <div class="form-group col-md-8">
    <label for="">Le Monde Pour l'Evenement :</label>
<?php
$result = Evenement::find_all_monde();
?>
<select class="custom-select" name="event[ID_Mond]">

  <?php   while($row = $result->fetch_assoc()){


   $monde = $row['ID_Mond']."- ".$row['Nom_Mond']." ".$row['date_de_creation'] ;
    $ID_Mond=$row['ID_Mond'];

echo "<option value='$ID_Mond'>$monde</option>";?>

<?php  }
 ?>
</select>
</div>
</div>

</div>

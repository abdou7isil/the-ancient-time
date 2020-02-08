<div class="font-weight-bold">
<div class="form-row">
<div class="form-group col-md-6">
  <label for="nom_monde">Nom Du Monde :</label>
  <input type="text" name="monde[Nom_Mond]" class="form-control"  placeholder="Nom du monde">
</div>
</div>
<div class="form-row">
<div class="form-group col-md-6">
  <label for="largeur">largeur du monde (x) :</label>
  <input type="text" name="monde[Width]"   class="form-control"  placeholder="....">
</div>
<div class="form-group col-md-6">
 <label for="hauteur">hauteur du monde (y) :</label>
 <input type="text" name="monde[Height]" class="form-control"  placeholder="....">
</div>
</div>

<div class="form-row">
<div class="form-group col-md-6">
<label for="date_de_creation">Date de creation :</label>
<input type="date" name="monde[date_de_creation]" class="form-control" value="<?php echo date("Y-m-d"); ?>" min="1900-01-01" max="<?php echo date("Y-m-d"); ?>">
</div>
</div>
<div class="form-row">
<div class="form-group col-md-6">
  <label for="largeur">Roi du monde :</label>
  <input type="text" name="monde[Roi_Mond]"   class="form-control"  placeholder="....">
</div>
</div>

</div>

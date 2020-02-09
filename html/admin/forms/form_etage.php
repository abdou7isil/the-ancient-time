<div class="font-weight-bold">
<div class="form-row">
<div class="form-group col-md-6">
  <label for="nom_monde">Num de l'etage :</label>
  <input type="text" name="etage[Num_Etag]" class="form-control"  placeholder="Num de l etage">
</div>
</div>
<div class="form-row">
<div class="form-group col-md-6">
  <label for="largeur">largeur de l'etage (x) :</label>
  <input type="text" name="etage[Width]"   class="form-control"  placeholder="....">
</div>
<div class="form-group col-md-6">
 <label for="hauteur">hauteur de l'etage (y) :</label>
 <input type="text" name="etage[Height]" class="form-control"  placeholder="....">
</div>
</div>

<div class="form-row">
<div class="form-group col-md-6">
<label for="date_de_creation">Difficulte :</label>
<input type="text" name="etage[Difficult]" class="form-control">
</div>
</div>
<div class="form-row">
<div class="form-group col-md-6">
  <input type="text" name="etage[ID_Dun]" class="form-control" hidden value="<?php echo $_GET['ID_Dun'] ?>"  placeholder="....">
</div>
</div>
</div>

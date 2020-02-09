<div class="font-weight-bold">
<div class="form-row">
<div class="form-group col-md-6">
  <label for="nom_monde">Nom du monstre:</label>
  <input type="text" name="monstre[Nom_Monst]" class="form-control"  placeholder="Nom du monstre">
</div>
</div>
<div class="form-row">
<div class="form-group col-md-6">
  <label for="largeur">position (x) :</label>
  <input type="text" name="monstre[x]"   class="form-control"  placeholder="....">
</div>
<div class="form-group col-md-6">
 <label for="hauteur">position (y) :</label>
 <input type="text" name="monstre[y]" class="form-control"  placeholder="....">
</div>
</div>

<div class="form-row">
<div class="form-group col-md-6">
  <label for="largeur">HP :</label>
  <input type="text" name="monstre[HP]"   class="form-control"  placeholder="....">
</div>
<div class="form-group col-md-6">
 <label for="hauteur">Level :</label>
 <input type="text" name="monstre[Level]" class="form-control"  placeholder="....">
</div>
</div>

<div class="form-row">
<div class="form-group col-md-6">
<label for="date_de_creation">Attaque :</label>
<input type="text" name="monstre[Attaque]" class="form-control">
</div>
</div>
<div class="form-row">
<div class="form-group col-md-6">
  <input type="text" name="monstre[ID_Etag]" class="form-control" hidden value="<?php echo $_GET['ID_Etag'] ?>"  placeholder="....">
</div>
</div>
</div>

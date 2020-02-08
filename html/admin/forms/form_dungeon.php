<div class="font-weight-bold">
<div class="form-row">
<div class="form-group col-md-6">
  <label for="nom_monde">Nom Du Dungeon :</label>
  <input type="text" name="dungeon[Nom_Dun]" class="form-control"  placeholder="Nom du monde">
</div>
</div>
<div class="form-row">
<div class="form-group col-md-6">
  <label for="largeur">largeur du Dungeon (x) :</label>
  <input type="text" name="dungeon[Width_Dun]"   class="form-control"  placeholder="....">
</div>
<div class="form-group col-md-6">
 <label for="hauteur">hauteur du Dungeon (y) :</label>
 <input type="text" name="dungeon[Height_Dun]" class="form-control"  placeholder="....">
</div>
</div>

<div class="form-row">
<div class="form-group col-md-6">
<label for="date_de_creation">Difficulte :</label>
<input type="text" name="dungeon[difficult_Dun]" class="form-control">
</div>
</div>
<div class="form-row">
<div class="form-group col-md-6">
  <label for="largeur"> Duree :</label>
  <input type="time" name="dungeon[Duree]"   class="form-control"  placeholder="....">
</div>
<div class="form-group col-md-6">
  <input type="text" name="dungeon[ID_Mond]" hidden  class="form-control" value="<?php $ID_Mond ?>"  placeholder="....">
</div>
</div>

</div>

<?php $linkrel = ""; ?>

<?php $image_page = ""; ?>

<?php $page_title = "Les prestataires"; ?>

<?php $page_subtitle = ""; ?>

<?php ob_start(); ?>
<div class="helpers-filter">
  <button id="selectAllHelpers" class="btn btn-primary selected">Toutes les prestataires</button>
  <div class="radio-list">
  <p>Par catégorie :</p>
  <input type="radio" id="fleurs" name="helperType" value="1">
  <label for="helperType">Fleurs</label>
  <input type="radio" id="photos" name="helperType" value="2">
  <label for="helperType">Photos</label>
  <input type="radio" id="voiture" name="helperType" value="3">
  <label for="helperType">Voitures</label>
  <input type="radio" id="robe" name="helperType" value="4">
  <label for="helperType">Robe de mariée</label>
  <input type="radio" id="costume" name="helperType" value="5">
  <label for="helperType">Costume de marié</label>
  <input type="radio" id="nourriture" name="helperType" value="6">
  <label for="helperType">Traiteur</label>
  <input type="radio" id="dessert" name="helperType" value="7">
  <label for="helperType">Pâtisserie</label>
  </div>
</div>
<section class="helpers-view">
<?php
foreach($helpers as $helper)
{
?>
<div class="card helpers"  data-helper="<?= $helper['id_type'] ?>" style="width: 18rem;">
    <img src="public/img/helper<?= $helper['id'] ?>.jpg" class="card-img-top" alt="image prestataire">
    <div class="card-body">
      <h5 class="card-title"><?= htmlspecialchars($helper['pseudo']) ?><br></h5>
      <a href="index.php?action=helperAdmin&amp;id=<?= $helper['id'] ?>" class="btn btn-primary">En savoir plus</a>
    </div>
    <button class="btn btn-primary" id="deleteHelperPageAdmin"><a href="index.php?action=deleteHelperPageAdmin&amp;id=<?= $helper['id'] ?>">Supprimer</a></button>
    <button class="btn btn-primary" id="updateHelperPageAdmin"><a href="index.php?action=updateHelperPageAdmin&amp;id=<?= $helper['id'] ?>">Modifier</a></button>
  </div>
<?php
}
?>
</section>
<div class="pagination">
<?php
for($i=1; $i<=$numberOfPages; $i++)
{
  echo '<a href="index.php?action=helpersAdmin&amp;pageId='. $i . '">' . $i . '</a>';
}
?>
</div>
<?php $main_content = ob_get_clean(); ?>

<?php ob_start(); ?>
<script src="public/js/helpers.js"></script>
<?php $script = ob_get_clean(); ?>

<?php require('templateBackend.php'); ?>

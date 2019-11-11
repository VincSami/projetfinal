<?php $linkrel = ""; ?>

<?php ob_start(); ?>
  <img class="fullwidth" src="#">
<?php $image_page = ob_get_clean(); ?>

<?php $page_title = "Les prestataires"; ?>

<?php $page_subtitle = ""; ?>

<?php ob_start(); ?>
<div class="helpers-filter">
  <button id="selectAllHelpers" class="selected">Toutes les prestataires</button>
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
<section class="helpers-view">
<?php
foreach($helpers as $helper)
{
?>
<div class="card helpers"  data-helper="<?= htmlspecialchars($helper['id_type']) ?>" style="width: 18rem;">
    <img src="public/img/helper<?= $helper['id'] ?>.jpg" class="card-img-top" alt="image wedding-planner">
    <div class="card-body">
      <h5 class="card-title"><?= htmlspecialchars($helper['pseudo']) ?><br></h5>
      <a href="index.php?action=helperMember&amp;id=<?= $helper['id'] ?>" class="btn btn-primary">En savoir plus</a>
    </div>
  </div>
<?php
}
?>
</section>
<?php $main_content = ob_get_clean(); ?>

<?php ob_start(); ?>
<script src="public/js/helpers.js"></script>
<?php $script = ob_get_clean(); ?>

<?php require('templateMember.php'); ?>

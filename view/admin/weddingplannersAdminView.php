<?php $linkrel = ""; ?>

<?php $image_page = ""; ?>

<?php $page_title = "les Wedding-Planners"; ?>

<?php $page_subtitle = ""; ?>

<?php ob_start(); ?>
<div class="weddingplanners-filter">
  <button id="selectAllWeddingplanners" class="btn btn-primary selected">Toutes les Wedding-Planners</button>
  <div class="radio-list">
  <p>Par spécialité :</p>
  <input type="radio" id="boheme" name="specialty" value="Bohème">
  <label for="specialty">Mariage bohème</label>
  <input type="radio" id="insolite" name="specialty" value="Insolite">
  <label for="specialty">Mariage insolite</label>
  <input type="radio" id="plage" name="specialty" value="Sur la plage">
  <label for="specialty">Mariage de plage</label>
  <input type="radio" id="luxe" name="specialty" value="Haut de gamme">
  <label for="specialty">Mariage haut de gamme</label>
  <input type="radio" id="intimiste" name="specialty" value="Intimiste">
  <label for="specialty">Mariage intimiste</label>
  <input type="radio" id="montagne" name="specialty" value="A la montagne">
  <label for="specialty">Mariage de montagne</label>
  </div>
</div>
<section class="weddingplanners-view">
<?php
foreach($weddingplanners as $weddingplanner)
{
?>
<div class="card weddingplanners" data-specialty="<?= htmlspecialchars($weddingplanner['specialty']) ?>" style="width: 18rem;">
    <img src="public/img/weddingPlanner<?= $weddingplanner['id'] ?>.jpg" class="card-img-top" alt="image wedding-planner">
    <div class="card-body">
      <h5 class="card-title"><?= htmlspecialchars($weddingplanner['pseudo']) ?><br></h5>
      <a href="index.php?action=weddingplannerAdmin&amp;id=<?= $weddingplanner['id'] ?>" class="btn btn-primary">En savoir plus</a>
    </div>
    <button class="btn btn-primary" id="deleteWeddingplannerPageAdmin"><a href="index.php?action=deleteWeddingplannerPageAdmin&amp;id=<?= $weddingplanner['id'] ?>">Supprimer</a></button>
    <button class="btn btn-primary" id="updateWeddingplannerPageAdmin"><a href="index.php?action=updateWeddingplannerPageAdmin&amp;id=<?= $weddingplanner['id'] ?>">Modifier</a></button>
  </div>
<?php
}
?>
</section>
<?php $main_content = ob_get_clean(); ?>

<?php ob_start(); ?>
<script src="public/js/weddingplanners.js"></script>
<?php $script = ob_get_clean(); ?>

<?php require('templateBackend.php'); ?>
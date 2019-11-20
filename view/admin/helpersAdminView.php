<?php $linkrel = ""; ?>

<?php $image_page = ""; ?>

<?php $page_title = "Les prestataires"; ?>

<?php $page_subtitle = ""; ?>

<?php ob_start(); ?>
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

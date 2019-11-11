<?php $linkrel = ""; ?>

<?php $page_title = "les prestataires"; ?>
<?php $page_subtitle = ""; ?>

<?php $image_page = ""; ?>

<?php ob_start(); ?>
<section class="helpersType-view">
<?php
foreach($helpersType as $helperType)
{
?>
<div class="card" style="width: 18rem;">
    <img src="public/img/helper<?= $helperType['id'] ?>.jpg" class="card-img-top" alt="image wedding-planner">
    <div class="card-body">
      <h5 class="card-title"><?= htmlspecialchars($helperType['pseudo']) ?><br></h5>
      <a href="index.php?action=helper&amp;id=<?= $helperType['id'] ?>" class="btn btn-primary">En savoir plus</a>
    </div>
  </div>
<?php
}
?>
</section>
<?php $main_content = ob_get_clean(); ?>

<?php $script = ""; ?>

<?php require('templateFrontend.php'); ?>

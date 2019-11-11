<?php $linkrel = ""; ?>

<?php ob_start(); ?>
    <img class="fullwidth" src="#">
<?php $image_page = ob_get_clean(); ?>

<?php $page_title = "Les prestataires" ?>

<?php ob_start(); ?>
  <?php
  foreach($helpersType as $helperType)
  {
  ?>
    <p><?= htmlspecialchars($helperType['title']) ?></p>
  <?php
  }
  ?>
<?php $page_subtitle = ob_get_clean(); ?>

<?php ob_start(); ?>
<section>
<?php
foreach($helpersType as $helperType)
{
?>
<div class="card" style="width: 18rem;">
    <img src="public/img/helper<?= $helperType['id'] ?>.jpg" class="card-img-top" alt="image wedding-planner">
    <div class="card-body">
      <h5 class="card-title"><?= htmlspecialchars($helperType['pseudo']) ?><br></h5>
      <a href="index.php?action=helperAdmin&amp;id=<?= $helperType['id'] ?>" class="btn btn-primary">En savoir plus</a>
    </div>
  </div>
<?php
}
?>
<?php $main_content = ob_get_clean(); ?>

<?php $script = ""; ?>

<?php require('templateBackend.php'); ?>

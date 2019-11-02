<?php ob_start(); ?>
  <img class="fullwidth" src="#">
<?php $image_page = ob_get_clean(); ?>

<?php $page_title = "Les prestataires"; ?>

<?php $page_subtitle = ""; ?>

<?php ob_start(); ?>
<section>
<?php
foreach($helpers as $helper)
{
?>
<div class="card" style="width: 18rem;">
    <img src="public/img/helper<?= $helper['id'] ?>.jpg" class="card-img-top" alt="image wedding-planner">
    <div class="card-body">
      <h5 class="card-title"><?= $helper['pseudo'] ?><br></h5>
      <a href="index.php?action=helper&amp;id=<?= $helper['id'] ?>" class="btn btn-primary">En savoir plus</a>
    </div>
  </div>
<?php
}
?>
</section>
<?php $main_content = ob_get_clean(); ?>

<?php require('templateFrontend.php'); ?>
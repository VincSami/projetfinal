<?php ob_start(); ?>
  <img class="fullwidth" src="#" alt="image lieu réception mariage">
<?php $image_page = ob_get_clean(); ?>

<?php $page_title = "Les lieux de réception"; ?>

<?php $page_subtitle = ""; ?>

<?php ob_start(); ?>
<section>
<?php
foreach($places as $place)
{
?>
<div class="card" style="width: 18rem;">
    <img src="public/img/place<?= $place['id'] ?>.jpg" class="card-img-top" alt="image wedding-planner">
    <div class="card-body">
      <h5 class="card-title"><?= $place['title'] ?><br></h5>
      <a href="index.php?action=place&amp;id=<?= $place['id'] ?>" class="btn btn-primary">En savoir plus</a>
    </div>
  </div>
<?php
}
?>
</section>
<?php $main_content = ob_get_clean(); ?>

<?php require('templateMember.php'); ?>

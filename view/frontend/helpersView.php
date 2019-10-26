<?php ob_start(); ?>
  <img class="fullwidth" src="public/img/tip<?= $tip['id'] ?>.jpg" alt="image lieu réception mariage">
<?php $image_post = ob_get_clean(); ?>

<?php $page_title = $tip['title']; ?>

<?php $page_subtitle = ""; ?>

<?php $location_content = ""; ?>

<?php $weddingPlanner_content = ""; ?>

<?php $tipsAstuces_content = ""; ?>

<?php require('templateFrontend.php'); ?>

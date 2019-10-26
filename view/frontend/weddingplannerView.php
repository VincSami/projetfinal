<?php ob_start(); ?>
    <img class="fullwidth" src="public/img/weddingPlanner<?= $weddingplanner['id'] ?>.jpg">
<?php $image_page = ob_get_clean(); ?>

<?php ob_start(); ?>
<form action="#" method="post">
  <label for="location">Où ?</label>
  <input type="text" name="location" id="location" />
  <label for="date">Quand ?</label>
  <input type="date" name="date" id="date" />
</form>
<?php $form_content = ob_get_clean(); ?>

<?php $page_title = "Lieu de réception" ?>

<?php $page_subtitle = $weddingplanner['pseudo'] ?>

<?php $main_content = $weddingplanner['presentation'] ?>

<?php require('templateFrontend.php'); ?>

<?php ob_start(); ?>
    <img class="fullwidth" src="public/img/helper<?= $helper['id'] ?>.jpg">
<?php $image_page = ob_get_clean(); ?>

<?php ob_start(); ?>
<form action="#" method="post">
  <label for="location">Où ?</label>
  <input type="text" name="location" id="location" />
  <label for="date">Quand ?</label>
  <input type="date" name="date" id="date" />
</form>
<?php $form_content = ob_get_clean(); ?>

<?php $page_title = "les prestataires" ?>

<?php $page_subtitle = $helper['pseudo'] ?>

<?php $main_content = $helper['content'] ?>

<?php require('templateUser.php'); ?>

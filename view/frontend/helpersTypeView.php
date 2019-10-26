<?php ob_start(); ?>
    <img class="fullwidth" src="#">
<?php $image_page = ob_get_clean(); ?>

<?php ob_start(); ?>
<form action="#" method="post">
  <label for="location">Où ?</label>
  <input type="text" name="location" id="location" />
  <label for="date">Quand ?</label>
  <input type="date" name="date" id="date" />
</form>
<?php $form_content = ob_get_clean(); ?>

<?php $page_title = $helpersType[''] ?>

<?php $page_subtitle = "" ?>

<?php $main_content = 

$helperTypes['title'] ?>

<?php require('templateFrontend.php'); ?>

<?php $linkrel = ""; ?>

<?php ob_start(); ?>
    <img class="fullwidth" src="public/img/helper<?= $helper['id'] ?>.jpg">
<?php $image_page = ob_get_clean(); ?>

<?php $page_title = "les prestataires" ?>

<?php $page_subtitle = $helper['pseudo'] ?>

<?php $main_content = $helper['content'] ?>

<?php $script = ""; ?>

<?php require('templateFrontend.php'); ?>

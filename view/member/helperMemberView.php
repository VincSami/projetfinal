<?php $linkrel = ""; ?>

<?php ob_start(); ?>
    <img class="fullwidth" src="public/img/helper<?= $helper['id'] ?>.jpg">
<?php $image_page = ob_get_clean(); ?>

<?php $page_title = "les prestataires" ?>

<?php $page_subtitle = htmlspecialchars($helper['pseudo']) ?>

<?php $main_content = htmlspecialchars($helper['content']) ?>

<?php $script = ""; ?>

<?php require('templateMember.php'); ?>

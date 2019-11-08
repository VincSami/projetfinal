<?php $linkrel = ""; ?>

<?php ob_start(); ?>
    <img class="fullwidth" src="public/img/place<?= $place['id'] ?>.jpg">
<?php $image_page = ob_get_clean(); ?>

<?php $page_title = "Lieu de réception" ?>

<?php $page_subtitle = $place['title'] ?>

<?php $main_content = $place['presentation'] ?>

<?php $script = ""; ?>

<?php require('templateMember.php'); ?>

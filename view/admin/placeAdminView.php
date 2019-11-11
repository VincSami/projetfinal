<?php $linkrel = ""; ?>

<?php ob_start(); ?>
    <img class="fullwidth" src="public/img/place<?= $place['id'] ?>.jpg">
<?php $image_page = ob_get_clean(); ?>

<?php $page_title = "Lieu de réception" ?>

<?php $page_subtitle = htmlspecialchars($place['title']) ?>

<?php $main_content = htmlspecialchars($place['presentation']) ?>

<?php $script = ""; ?>

<?php require('templateBackend.php'); ?>

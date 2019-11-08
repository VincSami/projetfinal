<?php $linkrel = ""; ?>

<?php ob_start(); ?>
    <img class="fullwidth" src="public/img/weddingPlanner<?= $weddingplanner['id'] ?>.jpg">
<?php $image_page = ob_get_clean(); ?>

<?php $page_title = "Lieu de réception" ?>

<?php $page_subtitle = $weddingplanner['pseudo'] ?>

<?php $main_content = $weddingplanner['presentation'] ?>

<?php $script = ""; ?>

<?php require('templateFrontend.php'); ?>

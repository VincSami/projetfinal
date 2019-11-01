<?php ob_start(); ?>
    <img class="fullwidth" src="public/img/place<?= $place['id'] ?>.jpg" alt="image lieu de réception">
<?php $image_page = ob_get_clean(); ?>

<?php $page_title = "Page de suppression du lieu de réception" ?>

<?php $page_subtitle = "Supprimer le lieu de réception : " . $place['title'] ?>

<?php $main_content_title = "Vous êtes sur le point de supprimer définitivement ce lieu de réception"; ?>

<?php ob_start(); ?>
        <button class="boutonVert"><a href="index.php?action=deletePlace&amp;id=<?= $place['id'] ?>">Supprimer le lieu de réception</a></button>
        <button class="boutonRouge"><a href="index.php">Annuler</a></button>
<?php $main_content_subtitle = ob_get_clean(); ?>

<?php $main_content = $place['presentation']?>

<?php require('templateBackend.php'); ?>

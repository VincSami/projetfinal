<?php $linkrel = ""; ?>

<?php ob_start(); ?>
    <img class="fullwidth" src="public/img/helper<?= $helper['id'] ?>.jpg" alt="image prestataire">
<?php $image_page = ob_get_clean(); ?>

<?php $page_title = "Page de suppression du prestataire" ?>

<?php $page_subtitle = "Supprimer le prestataire : " . $helper['pseudo'] ?>

<?php ob_start(); ?>
        <button class="btn btn-primary"><a href="index.php?action=deleteHelperAdmin&amp;id=<?= $helper['id'] ?>">Supprimer le prestataire</a></button>
        <button class="btn btn-primary"><a href="index.php">Annuler</a></button>
<?php $main_content_subtitle = ob_get_clean(); ?>

<?php $main_content = $helper['presentation']?>

<?php $script = ""; ?>

<?php require('templateBackend.php'); ?>

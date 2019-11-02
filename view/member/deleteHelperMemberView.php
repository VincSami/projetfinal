<?php ob_start(); ?>
    <img class="fullwidth" src="public/img/helper<?= $helper['id'] ?>.jpg" alt="image prestataire">
<?php $image_page = ob_get_clean(); ?>

<?php $page_title = "Page de suppression du prestataire" ?>

<?php $page_subtitle = "Supprimer le prestataire : " . $helper['pseudo'] ?>

<?php $main_content_title = "Vous êtes sur le point de supprimer définitivement ce prestataire"; ?>

<?php ob_start(); ?>
        <button class="boutonVert"><a href="index.php?action=deleteHelperMember&amp;id=<?= $helper['id'] ?>">Supprimer le prestataire</a></button>
        <button class="boutonRouge"><a href="index.php">Annuler</a></button>
<?php $main_content_subtitle = ob_get_clean(); ?>

<?php $main_content = $helper['content']?>

<?php require('templateMember.php'); ?>

<?php $linkrel = ""; ?>

<?php ob_start(); ?>
    <img class="fullwidth" src="public/img/helper<?= $helper['id'] ?>.jpg" alt="image prestataire">
<?php $image_page = ob_get_clean(); ?>

<?php $page_title = "Page de suppression du prestataire" ?>

<?php $page_subtitle = "Supprimer le prestataire : " . htmlspecialchars($helper['pseudo']) ?>

<?php ob_start(); ?>
    <button class="btn btn-primary"><a href="index.php?action=deleteHelperMember&amp;id=<?= $helper['id'] ?>">Supprimer le prestataire</a></button>
    <button class="btn btn-primary"><a href="index.php">Annuler</a></button><br><br>
    <?= htmlspecialchars($helper['content']); ?>
<?php $main_content = ob_get_clean(); ?>

<?php $script = ""; ?>

<?php require('templateMember.php'); ?>

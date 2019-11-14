<?php $linkrel = ""; ?>

<?php $image_page = ""; ?>

<?php $page_title = "Page de suppression du prestataire" ?>

<?php $page_subtitle = "Supprimer le prestataire : " . htmlspecialchars($helper['pseudo']) ?>

<?php ob_start(); ?>
    <div class="delete">
        <button class="btn btn-primary"><a href="index.php?action=deleteHelperAdmin&amp;id=<?= $helper['id'] ?>">Supprimer le prestataire</a></button>
        <button class="btn btn-primary"><a href="index.php">Annuler</a></button>
    </div>
    <?php htmlspecialchars($helper['presentation']) ?>
<?php $main_content = ob_get_clean() ?>

<?php $script = ""; ?>

<?php require('templateBackend.php'); ?>

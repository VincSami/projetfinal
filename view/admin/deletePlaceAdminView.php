<?php $linkrel = ""; ?>

<?php $image_page = ""; ?>

<?php $page_title = "Page de suppression du lieu de réception" ?>

<?php $page_subtitle = "Supprimer le lieu de réception : " . htmlspecialchars($place['title']) ?>



<?php $main_content_subtitle = ob_get_clean(); ?>

<?php ob_start(); ?>
    <div class="delete">
    <button class="btn btn-primary"><a href="index.php?action=deletePlaceAdmin&amp;id=<?= $place['id'] ?>">Supprimer le lieu de réception</a></button>
    <button class="btn btn-primary"><a href="index.php">Annuler</a></button>
    </div>
    <?= htmlspecialchars($place['presentation']) ?>
<?php $main_content = ob_get_clean(); ?>

<?php $script = ""; ?>

<?php require('templateBackend.php'); ?>

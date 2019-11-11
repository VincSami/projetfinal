<?php $linkrel = ""; ?>

<?php ob_start(); ?>
    <img class="fullwidth" src="public/img/place<?= $place['id'] ?>.jpg" alt="image lieu de réception">
<?php $image_page = ob_get_clean(); ?>

<?php $page_title = "Page de suppression du lieu de réception" ?>

<?php $page_subtitle = "Supprimer le lieu de réception : " . htmlspecialchars($place['title']) ?>

<?php ob_start(); ?>
    <button class="btn btn-primary"><a href="index.php?action=deletePlaceMember&amp;id=<?= $place['id'] ?>">Supprimer le lieu de réception</a></button>
    <button class="btn btn-primary"><a href="index.php">Annuler</a></button><br><br>
    <?= htmlspecialchars($place['presentation']); ?>
<?php $main_content = ob_get_clean(); ?>

<?php $script = ""; ?>

<?php require('templateMember.php'); ?>

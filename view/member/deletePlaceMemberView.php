<?php $linkrel = ""; ?>

<?php $image_page = ""; ?>

<?php $page_title = "Page de suppression du lieu de réception" ?>

<?php $page_subtitle = "Supprimer le lieu de réception : " . htmlspecialchars($place['title']) ?>

<?php ob_start(); ?>
<section class="delete-page">
<div class="delete-buttons">    
    <button class="btn btn-primary"><a href="index.php?action=deletePlaceMember&amp;id=<?= $place['id'] ?>">Supprimer le lieu de réception</a></button>
    <button class="btn btn-primary"><a href="index.php">Annuler</a></button>
</div>
<div class="delete-content">
    <img class="fullwidth" src="public/img/place<?= $place['id'] ?>.jpg">
    <p><?= htmlspecialchars($place['presentation']); ?></p>
</div>
</section>
<?php $main_content = ob_get_clean(); ?>

<?php $script = ""; ?>

<?php require('templateMember.php'); ?>

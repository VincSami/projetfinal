<?php $linkrel = ""; ?>

<?php $image_page = ""; ?>

<?php $page_title = "Page de suppression du prestataire" ?>

<?php $page_subtitle = "Supprimer le prestataire : " . htmlspecialchars($helper['pseudo']) ?>

<?php ob_start(); ?>
<section class="delete-page">
<div class="delete-buttons">
    <button class="btn btn-primary"><a href="index.php?action=deleteHelperAdmin&amp;id=<?= $helper['id'] ?>">Supprimer le prestataire</a></button>
    <button class="btn btn-primary"><a href="index.php">Annuler</a></button>
<div>
<div class="delete-content">  
    <img src="public/img/helper<?= $helper['id'] ?>.jpg">
    <p><?= htmlspecialchars($helper['content']); ?></p>
</div>
</section>
<?php $main_content = ob_get_clean(); ?>

<?php $script = ""; ?>

<?php require('templateBackend.php'); ?>

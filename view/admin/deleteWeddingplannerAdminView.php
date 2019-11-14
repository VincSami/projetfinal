<?php $linkrel = ""; ?>

<?php $image_page = ""; ?>

<?php $page_title = "Page de suppression de la Wedding-Planner" ?>

<?php $page_subtitle = "Supprimer la Wedding-Planner : " . htmlspecialchars($weddingplanner['pseudo']) ?>

<?php ob_start(); ?>
    <div class="delete">
        <button class="btn btn-primary"><a href="index.php?action=deleteWeddingplannerAdmin&amp;id=<?= $weddingplanner['id'] ?>">Supprimer la Wedding-Planner</a></button>
        <button class="btn btn-primary"><a href="index.php">Annuler</a></button>
    </div>
    <?php $main_content = htmlspecialchars($weddingplanner['presentation']) ?>
<?php $main_content = ob_get_clean(); ?>

<?php $script = ""; ?>

<?php require('templateBackend.php'); ?>

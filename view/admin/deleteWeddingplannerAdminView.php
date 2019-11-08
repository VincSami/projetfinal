<?php $linkrel = ""; ?>

<?php ob_start(); ?>
    <img class="fullwidth" src="public/img/weddingPlanner<?= $weddingplanner['id'] ?>.jpg" alt="image alaska épisode">
<?php $image_page = ob_get_clean(); ?>

<?php $page_title = "Page de suppression de la Wedding-Planner" ?>

<?php $page_subtitle = "Supprimer la Wedding-Planner : " . $weddingplanner['pseudo'] ?>

<?php ob_start(); ?>
        <button class="btn btn-primary"><a href="index.php?action=deleteWeddingplannerAdmin&amp;id=<?= $weddingplanner['id'] ?>">Supprimer la Wedding-Planner</a></button>
        <button class="btn btn-primary"><a href="index.php">Annuler</a></button>
        <?php $main_content = $weddingplanner['presentation']?>
<?php $main_content = ob_get_clean(); ?>

<?php $script = ""; ?>

<?php require('templateBackend.php'); ?>

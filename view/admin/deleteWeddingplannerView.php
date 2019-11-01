<?php ob_start(); ?>
    <img class="fullwidth" src="public/img/weddingPlanner<?= $weddingplanner['id'] ?>.jpg" alt="image alaska épisode">
<?php $image_page = ob_get_clean(); ?>

<?php $page_title = "Page de suppression de la Wedding-Planner" ?>

<?php $page_subtitle = "Supprimer la Wedding-Planner : " . $weddingplanner['pseudo'] ?>

<?php $main_content_title = "Vous êtes sur le point de supprimer définitivement cette Wedding-Planner"; ?>

<?php ob_start(); ?>
        <button class="boutonVert"><a href="index.php?action=deleteWeddingplanner&amp;id=<?= $weddingplanner['id'] ?>">Supprimer la Wedding-Planner</a></button>
        <button class="boutonRouge"><a href="index.php">Annuler</a></button>
<?php $main_content_subtitle = ob_get_clean(); ?>

<?php $main_content = $weddingplanner['presentation']?>

<?php require('templateBackend.php'); ?>

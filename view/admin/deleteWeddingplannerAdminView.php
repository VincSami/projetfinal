<?php $linkrel = ""; ?>

<?php $image_page = ""; ?>

<?php $page_title = "Page de suppression de la Wedding-Planner" ?>

<?php $page_subtitle = "Supprimer la Wedding-Planner : " . htmlspecialchars($weddingplanner['pseudo']) ?>

<?php ob_start(); ?>
<section class="delete-page">
<div class="delete-buttons">        
    <button class="btn btn-primary"><a href="index.php?action=deleteWeddingplannerAdmin&amp;id=<?= $weddingplanner['id'] ?>">Supprimer la Wedding-Planner</a></button>
    <button class="btn btn-primary"><a href="index.php">Annuler</a></button>
</div>       
<div class="delete-content">  
    <img class="fullwidth" src="public/img/weddingPlanner<?= $weddingplanner['id'] ?>.jpg" alt="image wedding-planner">
    <p><?= htmlspecialchars($weddingplanner['presentation']); ?></p>
</div>
</section>
<?php $main_content = ob_get_clean(); ?>

<?php $script = ""; ?>

<?php require('templateBackend.php'); ?>

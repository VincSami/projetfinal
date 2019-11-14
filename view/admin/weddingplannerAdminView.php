<?php $linkrel = ""; ?>

<?php $image_page = ""; ?>

<?php $page_title = "Les Wedding-Planner" ?>

<?php $page_subtitle = "" ?>

<?php ob_start(); ?>
<section class="presentationOnePage">
    <button class="btn btn-primary" id="deleteWeddingplannerPageAdmin"><a href="index.php?action=deleteWeddingplannerPageAdmin&amp;id=<?= $weddingplanner['id'] ?>">Supprimer</a></button>
    <button class="btn btn-primary" id="updateWeddingplannerPageAdmin"><a href="index.php?action=updateWeddingplannerPageAdmin&amp;id=<?= $weddingplanner['id'] ?>">Modifier</a></button>
    <div class="presentationOnePageLeft">
        <h3><?= htmlspecialchars($weddingplanner['pseudo']) ?></h3>
        <img class="fullwidth" src="public/img/weddingPlanner<?= $weddingplanner['id'] ?>.jpg">
    </div>
    <div class="presentationOnePageRight">
        <p><?= htmlspecialchars($weddingplanner['presentation']) ?><br><br>
        Contact : <?= htmlspecialchars($weddingplanner['mail']) ?></p>
    </div>
</section>
<?php $main_content = ob_get_clean(); ?>

<?php $script = ob_get_clean(); ?>

<?php require('templateBackend.php'); ?>
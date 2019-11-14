<?php $linkrel = ""; ?>

<?php $image_page = ""; ?>

<?php $page_title = "Les lieux de réception" ?>

<?php $page_subtitle = ""; ?>

<?php ob_start(); ?>
<section class="presentationOnePage">
    <button class="btn btn-primary" id="deletePlacePageAdmin"><a href="index.php?action=deletePlacePageAdmin&amp;id=<?= $place['id'] ?>">Supprimer</a></button>
    <button class="btn btn-primary" id="updatePlacePageAdmin"><a href="index.php?action=updatePlacePageAdmin&amp;id=<?= $place['id'] ?>">Modifier</a></button>
    <div class="presentationOnePageLeft">
        <h3><?= htmlspecialchars($place['title']) ?></h3>
        <img class="fullwidth" src="public/img/place<?= $place['id'] ?>.jpg">
    </div>
    <div class="presentationOnePageRight">
        <p><?= htmlspecialchars($place['presentation']) ?><br><br>
        Contact : <?= htmlspecialchars($place['mail']) ?></p>
    </div>
</section>
<?php $main_content = ob_get_clean(); ?>

<?php $script = ""; ?>

<?php require('templateBackend.php'); ?>

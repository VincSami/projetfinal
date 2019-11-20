<?php $linkrel = ""; ?>

<?php $image_page = ""; ?>

<?php $page_title = "Les lieux de réception" ?>

<?php $page_subtitle = ""; ?>

<?php ob_start(); ?>
<div class="delete-buttons">
    <button class="btn btn-primary" id="deletePlacePageAdmin"><a href="index.php?action=deletePlacePageAdmin&amp;id=<?= $place['id'] ?>">Supprimer</a></button>
    <button class="btn btn-primary" id="updatePlacePageAdmin"><a href="index.php?action=updatePlacePageAdmin&amp;id=<?= $place['id'] ?>">Modifier</a></button>
</div>
<section class="presentationOnePage">

    <div class="presentationOnePageLeft">
        <h3><?= htmlspecialchars($place['title']) ?></h3>
        <img class="fullwidth" src="public/img/place<?= $place['id'] ?>.jpg" alt="image lieu de réception">
    </div>
    <div class="presentationOnePageRight">
        <p><?= htmlspecialchars($place['presentation']) ?><br><br>
        Contact : <a href="mailto:<?= htmlspecialchars($place['mail']) ?>"><?= htmlspecialchars($place['mail']) ?></a></p>
    </div>
</section>
<?php $main_content = ob_get_clean(); ?>

<?php $script = ""; ?>

<?php require('templateBackend.php'); ?>

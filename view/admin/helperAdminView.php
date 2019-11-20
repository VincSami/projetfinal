<?php $linkrel = ""; ?>

<?php $image_page = ""; ?>

<?php $page_title = "Les prestataires" ?>

<?php $page_subtitle = ""; ?>

<?php ob_start(); ?>
<div class="delete-buttons">
    <button class="btn btn-primary" id="deleteHelperPageAdmin"><a href="index.php?action=deleteHelperPageAdmin&amp;id=<?= $helper['id'] ?>">Supprimer</a></button>
    <button class="btn btn-primary" id="updateHelperPageAdmin"><a href="index.php?action=updateHelperPageAdmin&amp;id=<?= $helper['id'] ?>">Modifier</a></button>
</div>
<section class="presentationOnePage">
    <div class="presentationOnePageLeft">
        <h3><?= htmlspecialchars($helper['pseudo']) ?></h3>
        <img class="fullwidth" src="public/img/helper<?= $helper['id'] ?>.jpg" alt="image prestataire">
    </div>
    <div class="presentationOnePageRight">
        <p><?= htmlspecialchars($helper['content']) ?><br><br>
        Contact : <a href="mailto:<?= htmlspecialchars($helper['mail']) ?>"><?= htmlspecialchars($helper['mail']) ?></a></p>
    </div>
</section>
<?php $main_content = ob_get_clean(); ?>

<?php $script = ""; ?>

<?php require('templateBackend.php'); ?>

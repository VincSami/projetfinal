<?php $linkrel = ""; ?>

<?php $image_page = ""; ?>

<?php $page_title = "les lieux de réception"; ?>

<?php $page_subtitle = ""; ?>

<?php ob_start(); ?>
<section class="presentationOnePage">
<div class="presentationOnePageLeft">
<h3><?= htmlspecialchars($place['title']) ?></h3>
<img class="fullwidth" src="public/img/place<?= $place['id'] ?>.jpg">
</div>
<div class="presentationOnePageRight">
<p><?= htmlspecialchars($place['presentation']) ?><br><br>
Contact : <a href="mailto=<?= htmlspecialchars($place['mail']) ?>"><?= htmlspecialchars($place['mail']) ?></a></p>
</div>
</section>
<?php $main_content = ob_get_clean(); ?>

<?php $script = ""; ?>

<?php require('templateFrontend.php'); ?>

<?php $linkrel = ""; ?>

<?php $image_page = ""; ?>

<?php $page_title = "Les lieux de réception" ?>

<?php $page_subtitle = ""; ?>

<?php ob_start(); ?>
<section class="presentationOnePage">
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

<?php require('templateMember.php'); ?>

<?php $linkrel = ""; ?>

<?php $image_page = ""; ?>

<?php $page_title = "Les prestataires"; ?>

<?php $page_subtitle = ""; ?>

<?php ob_start(); ?>
<section class="presentationOnePage">
<div class="presentationOnePageLeft">
<h3><?= htmlspecialchars($helper['pseudo']) ?></h3>
<img class="fullwidth" src="public/img/helper<?= $helper['id'] ?>.jpg">
</div>
<div class="presentationOnePageRight">
<p><?= htmlspecialchars($helper['content']) ?><br><br>
Contact : <?= htmlspecialchars($helper['mail']) ?></p>
</div>
</section>
<?php $main_content = ob_get_clean(); ?>

<?php $script = ""; ?>

<?php require('templateFrontend.php'); ?>

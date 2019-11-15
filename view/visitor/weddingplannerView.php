<?php $linkrel = ""; ?>

<?php $image_page = ""; ?>

<?php $page_title = "les Wedding-Planner"; ?>

<?php $page_subtitle = ""; ?>

<?php ob_start(); ?>
<section class="presentationOnePage">
<div class="presentationOnePageLeft">
<h3><?= htmlspecialchars($weddingplanner['pseudo']) ?></h3>
<img class="fullwidth" src="public/img/weddingPlanner<?= $weddingplanner['id'] ?>.jpg">
</div>
<div class="presentationOnePageRight">
<p><?= htmlspecialchars($weddingplanner['presentation']) ?><br><br>
Contact : <a href="mailto=<?= htmlspecialchars($weddingplanner['mail']) ?>"><?= htmlspecialchars($weddingplanner['mail']) ?></a></p>
</section>
<?php $main_content = ob_get_clean(); ?>

<?php $script = ""; ?>

<?php require('templateFrontend.php'); ?>

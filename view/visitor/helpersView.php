<?php $linkrel = ""; ?>

<?php $image_page = ""; ?>

<?php $page_title = "Les prestataires"; ?>

<?php $page_subtitle = ""; ?>

<?php ob_start(); ?>
<section class="helpers-view">
<?php
foreach($helpers as $helper):
?>
<div class="card helpers"  data-helper="<?= $helper['id_type'] ?>" style="width: 18rem;">
    <img src="public/img/helper<?= $helper['id'] ?>.jpg" class="card-img-top" alt="image prestataire">
    <div class="card-body">
      <h5 class="card-title"><?= htmlspecialchars($helper['pseudo']) ?><br></h5>
      <a href="index.php?action=helper&amp;id=<?= $helper['id'] ?>" class="btn btn-primary">En savoir plus</a>
    </div>
  </div>
<?php
endforeach;
?>
</section>
<div class="pagination">
<?php
for($i=1; $i<=$numberOfPages; $i++):
  echo '<a href="index.php?action=helpers&amp;pageId='. $i . '">' . $i . '</a>';
endfor;
?>
</div>
<?php $main_content = ob_get_clean(); ?>

<?php ob_start(); ?>
<script src="public/js/helpers.js"></script>
<?php $script = ob_get_clean(); ?>

<?php require('templateFrontend.php'); ?>
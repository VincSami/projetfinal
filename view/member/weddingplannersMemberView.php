<?php ob_start(); ?>
  <img class="fullwidth" src="#" alt="illustration page wedding planners">
<?php $image_page = ob_get_clean(); ?>

<?php $page_title = "les Wedding-Planners"; ?>

<?php $page_subtitle = ""; ?>

<?php ob_start(); ?>
<section>
<?php
foreach($weddingplanners as $weddingplanner)
{
?>
<div class="card" style="width: 18rem;">
    <img src="public/img/weddingPlanner<?= $weddingplanner['id'] ?>.jpg" class="card-img-top" alt="image wedding-planner">
    <div class="card-body">
      <h5 class="card-title"><?= $weddingplanner['pseudo'] ?><br></h5>
      <a href="index.php?action=weddingplannerMember&amp;id=<?= $weddingplanner['id'] ?>" class="btn btn-primary">En savoir plus</a>
    </div>
  </div>
<?php
}
?>
</section>
<?php $main_content = ob_get_clean(); ?>


<?php require('templateMember.php'); ?>
<?php ob_start(); ?>
  <img class="fullwidth" src="#" alt="illustration page wedding planners">
<?php $image_page = ob_get_clean(); ?>

<?php $page_title = "les Wedding-Planners"; ?>

<?php $page_subtitle = ""; ?>

<?php ob_start(); ?>
<ul>
  <?php
  foreach($weddingplanners as $weddingplanner)
  {
  ?>
  <li>
    <figure>
       <a href="index.php?action=weddingplannerAdmin&amp;id=<?= $weddingplanner['id'] ?>">
        <img src="public/img/weddingPlanner<?= $weddingplanner['id'] ?>.jpg">
      </a>
    </figure>
  </li>
  <?php
  }
  ?>
</ul>
<?php $main_content = ob_get_clean(); ?>


<?php require('templateBackend.php'); ?>
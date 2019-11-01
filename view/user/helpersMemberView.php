<?php ob_start(); ?>
  <img class="fullwidth" src="#">
<?php $image_page = ob_get_clean(); ?>

<?php $page_title = "Les prestataires"; ?>

<?php $page_subtitle = ""; ?>

<?php ob_start(); ?>
<ul>
  <?php
  foreach($helpers as $helper)
  {
  ?>
  <li>
    <figure>
       <a href="index.php?action=helperMember&amp;id=<?= $helper['id'] ?>">
        <img src="public/img/helper<?= $helper['id'] ?>.jpg">
      </a>
      <p><?= $helper['pseudo'] ?></p>
    </figure>
  </li>
  <?php
  }
  ?>
</ul>
<?php $main_content = ob_get_clean(); ?>

<?php require('templateUser.php'); ?>

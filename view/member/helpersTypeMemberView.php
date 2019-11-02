<?php ob_start(); ?>
    <img class="fullwidth" src="#">
<?php $image_page = ob_get_clean(); ?>

<?php ob_start(); ?>
<form action="#" method="post">
  <label for="location">Où ?</label>
  <input type="text" name="location" id="location" />
  <label for="date">Quand ?</label>
  <input type="date" name="date" id="date" />
</form>
<?php $form_content = ob_get_clean(); ?>

<?php $page_title = "Les prestataires" ?>

<?php ob_start(); ?>
  <?php
  foreach($helpersType as $helperType)
  {
  ?>
    <p><?= $helperType['title'] ?></p>
  <?php
  }
  ?>
<?php $page_subtitle = ob_get_clean(); ?>

<?php ob_start(); ?>
<section id="prestataires">
  <h2 class="titre_section">Prestataires</h2>
  <article>
    <ul>
      <?php
      foreach($helpersType as $helperType)
      {
      ?>
      <li>
        <figure>
          <a href="index.php?action=helper&amp;id=<?= $helperType['id'] ?>">
            <img src="public/img/helper<?= $helperType['id'] ?>.jpg">
          </a>
          <p><?= $helperType['pseudo'] ?></p>
        </figure>
      </li>
      <?php
      }
      ?>
    </ul>
  </article>
</section>
<?php $main_content = ob_get_clean(); ?>

<?php require('templateMember.php'); ?>

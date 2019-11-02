<?php ob_start(); ?>
  <img class="fullwidth" src="#" alt="image lieu réception mariage">
<?php $image_page = ob_get_clean(); ?>

<?php $page_title = "Les lieux de réception"; ?>

<?php $page_subtitle = ""; ?>

<?php ob_start(); ?>
<section id="place">
          <h2 class="titre_section">Lieux de réception</h2>
          <article>
            <ul>
              <?php
              foreach($places as $place)
              {
              ?>
              <li>
                <figure>
                  <a href="index.php?action=placeMember&amp;id=<?= $place['id'] ?>">
                    <img src="public/img/place<?= $place['id'] ?>.jpg">
                  </a>
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

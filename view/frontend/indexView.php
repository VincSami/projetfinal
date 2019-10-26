<?php ob_start(); ?>
  <img class="fullwidth" src="public/img/accueil.jpg" alt="image acceuil">
<?php $image_page = ob_get_clean(); ?>

<?php $page_title = 'Bienvenue sur Wedding & Love !'; ?>

<?php $page_subtitle = 'Préparez votre marriage en toute sérénité !'; ?>
<?php ob_start(); ?>
<form action="#" method="post">
  <label for="location">Où ?</label>
  <input type="text" name="location" id="location" />
  <label for="date">Quand ?</label>
  <input type="date" name="date" id="date" />
</form>
<?php $form_content = ob_get_clean(); ?>

<?php ob_start(); ?>
<section id="place">
          <h2 class="titre_section">Lieux de réception</h2>
          <article>
            <ul>
              <?php
              foreach($topPlaces as $topPlace)
              {
              ?>
              <li>
                <figure>
                  <a href="index.php?action=place&amp;id=<?= $topPlace['id'] ?>">
                    <img src="public/img/place<?= $topPlace['id'] ?>.jpg">
                  </a>
                </figure>
              </li>
              <?php
              }
              ?>
            </ul>
          </article>
        </section>
        <section id="weddingPlanner">
          <h2 class="titre_section">Wedding Planner</h2>
          <article>
          <ul>
              <?php
              foreach($topWeddingplanners as$topWeddingplanner)
              {
              ?>
              <li>
                <figure>
                   <a href="index.php?action=weddingplanner&amp;id=<?= $topWeddingplanner['id'] ?>">
                    <img src="public/img/weddingPlanner<?= $topWeddingplanner['id'] ?>.jpg">
                  </a>
                </figure>
              </li>
              <?php
              }
              ?>
            </ul>
          </article>
        </section>
        <section id="helpers"></section>
          <h2 class="titre_section">les helpers</h2>
          <article>
            <ul>
              <?php
              foreach($helperTypes as $helperType)
              {
              ?>
              <li>
                <figure>
                   <a href="index.php?action=helpersType&amp;id=<?= $helperType['id'] ?>">
                    <img src="#">
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

<?php require('templateFrontend.php'); ?>

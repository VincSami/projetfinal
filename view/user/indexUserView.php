<?php ob_start(); ?>
<iframe width="100%" height="600" src="https://www.youtube.com/embed/EWsv_E1k_bk?&autoplay=1?&mute=1" frameborder="0" allowfullscreen></iframe>
<?php $image_page = ob_get_clean(); ?>

<?php $page_title = 'Bienvenue sur Mariage & Coquillages !'; ?>

<?php $page_subtitle = 'Votre mariage à La Réunion les pieds dans l\'eau ou la tête dans les nuages'; ?>
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
                  <a href="index.php?action=placeMember&amp;id=<?= $topPlace['id'] ?>">
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
                   <a href="index.php?action=weddingplannerMember&amp;id=<?= $topWeddingplanner['id'] ?>">
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
                   <a href="index.php?action=helpersTypeMember&amp;id=<?= $helperType['id'] ?>">
                    <img src="public/img/helpersType<?= $helperType['id'] ?>.jpg">
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

<?php require('templateUser.php'); ?>

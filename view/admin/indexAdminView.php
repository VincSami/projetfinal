<?php ob_start(); ?>
  <img class="fullwidth" src="public/img/accueil.jpg" alt="image acceuil">
<?php $image_page = ob_get_clean(); ?>

<?php $page_title = 'Bienvenue sur Wedding & Love !'; ?>

<?php $page_subtitle = 'Votre marriage à La Réunion en toute sérénité !'; ?>

<?php $main_content_title = ""; ?>

<?php $main_content_subtitle = ""; ?>

<?php ob_start(); ?>
<section id="newAdminPage">
    <button>Ajouter une nouvelle prestation</button>
    <form action="index.php?action=creationAdminPage" method="post" enctype="multipart/form-data">
		<label for="newServicetype"><strong>Sélectionner le type de prestation à ajouter</strong></label><br />
		<select name="serviceType">
			<option value="">--Merci de choisir une option--</option>
			<option value="1">Fleuriste</option>
			<option value="2">Lieu de réception</option>
			<option value="3">Loueur de voitures et motos</option>
			<option value="4">Patiserie</option>
			<option value="5">Photographe</option>
			<option value="6">Traiteur</option>
			<option value="7">Vendeur et loueur de costumes de marié</option>
			<option value="8">Vendeur et loueur de robes de mariée</option>
			<option value="9">Wedding-Planner</option>
		</select>
		<input type="submit" name="submit" value="Valider">
	</form>
	<button class="boutonRouge"><a href="index.php">Annuler</a></button>
</section>
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
                  <a href="index.php?action=placeAdmin&amp;id=<?= $topPlace['id'] ?>">
                    <img src="public/img/place<?= $topPlace['id'] ?>.jpg">
                  </a>
                  <figcaption>
                    <?= $topPlace['title'] ?><br>
                    <button class="boutonRouge" id="deletePlacePageAdmin"><a href="index.php?action=deletePlacePageAdmin&amp;id=<?= $topPlace['id'] ?>">Supprimer</a></button>
                    <button class="boutonOrange" id="updatePlacePageAdmin"><a href="index.php?action=updatePlacePageAdmin&amp;id=<?= $topPlace['id'] ?>">Modifier</a></button>
                  </figcaption>
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
              foreach($topWeddingplanners as $topWeddingplanner)
              {
              ?>
              <li>
                <figure>
                   <a href="index.php?action=weddingplannerAdmin&amp;id=<?= $topWeddingplanner['id'] ?>">
                    <img src="public/img/weddingPlanner<?= $topWeddingplanner['id'] ?>.jpg">
                  </a>
                  <figcaption>
                    <?= $topWeddingplanner['pseudo'] ?><br>
                    <button class="boutonRouge" id="deleteWeddingplannerPageAdmin"><a href="index.php?action=deleteWeddingplannerPageAdmin&amp;id=<?= $topWeddingplanner['id'] ?>">Supprimer</a></button>
                    <button class="boutonOrange" id="updateWeddingplannerPageAdmin"><a href="index.php?action=updateWeddingplannerPageAdmin&amp;id=<?= $topWeddingplanner['id'] ?>">Modifier</a></button>
                  </figcaption>
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
                   <a href="index.php?action=helpersTypeAdmin&amp;id=<?= $helperType['id'] ?>">
                    <img src="public/img/helpersType<?= $helperType['id'] ?>.jpg">
                  </a>
                  <figcaption>
                    <?= $helperType['title'] ?><br>
                  </figcaption>
                </figure>
              </li>
              <?php
              }
              ?>
            </ul>
          </article>
        </section>
<?php $main_content = ob_get_clean(); ?>

<?php require('templateBackend.php'); ?>
<?php $linkrel = ""; ?>

<?php ob_start(); ?>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="public/img/accueil1" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="public/img/accueil2" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="public/img/accueil3" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<?php $image_page = ob_get_clean(); ?>

<?php $page_title = 'Bienvenue sur la page d\'administration de Mariage et Coquillages !'; ?>

<?php $page_subtitle = ''; ?>

<?php ob_start(); ?>
<section id="newAdminPage">
    <button id="addServicesButtonAdmin" class="btn btn-primary">Ajouter une nouvelle prestation</button>
    <form id="addServicesFormAdmin"action="index.php?action=creationAdminPage" method="post" enctype="multipart/form-data">
		<label for="servicetype"><strong>Sélectionner le type de prestation à ajouter</strong></label><br />
		<select name="serviceType" required>
			<option value="">--Merci de choisir une option--</option>
			<option value="1">Lieu de réception</option>
			<option value="2">Wedding-Planner</option>
			<option value="3">Autres prestataires</option>
		</select>
    <input class="btn btn-primary" type="submit" name="submit" value="Valider">
    <button id="cancelAddServicesAdminButton" class="btn btn-primary cancel-action"><a href="index.php">Annuler</a></button>
  </form>
</section>
<section>
<h3 class="center-title">Les lieux de réception tendances</h3>
<div class="topPlaces">
<?php
  foreach($topPlaces as $topPlace)
  {
  ?>
  <div class="card" style="width: 22rem;">
    <img src="public/img/place<?= $topPlace['id'] ?>.jpg" class="card-img-top" alt="image lieu de réception">
    <div class="card-body">
      <h5 class="card-title"><?= htmlspecialchars($topPlace['title']) ?><br></h5>
      <a href="index.php?action=placeAdmin&amp;id=<?= $topPlace['id'] ?>" class="btn btn-primary">En savoir plus</a>
    </div>
    <button class="btn btn-primary" id="deletePlacePageAdmin"><a href="index.php?action=deletePlacePageAdmin&amp;id=<?= $topPlace['id'] ?>">Supprimer</a></button>
    <button class="btn btn-primary" id="updatePlacePageAdmin"><a href="index.php?action=updatePlacePageAdmin&amp;id=<?= $topPlace['id'] ?>">Modifier</a></button>
  </div>
  <?php
  }
  ?> 
</div>
</section>        
<section>
<h3 class="center-title">Les Wedding-Planners de la semaine</h3>
<div class="topWeddingplanners">
<?php
  foreach($topWeddingplanners as $topWeddingplanner)
  {
  ?>
  <div class="card" style="width: 22rem;">
    <img src="public/img/weddingPlanner<?= $topWeddingplanner['id'] ?>.jpg" class="card-img-top" alt="image wedding-planner">
    <div class="card-body">
      <h5 class="card-title"><?= htmlspecialchars($topWeddingplanner['pseudo']) ?><br></h5>
      <a href="index.php?action=weddingplannerAdmin&amp;id=<?= $topWeddingplanner['id'] ?>" class="btn btn-primary">En savoir plus</a>
    </div>
    <button class="btn btn-primary" id="deleteWeddingplannerPageAdmin"><a href="index.php?action=deleteWeddingplannerPageAdmin&amp;id=<?= $topWeddingplanner['id'] ?>">Supprimer</a></button>
    <button class="btn btn-primary" id="updateWeddingplannerPageAdmin"><a href="index.php?action=updateWeddingplannerPageAdmin&amp;id=<?= $topWeddingplanner['id'] ?>">Modifier</a></button>
  </div>
  <?php
  }
  ?>  
</div>
</section>       
<section>
<h3 class="center-title">Les prestations indispensables pour votre mariage</h3>
<div class="helperTypesIndex">
<?php
  foreach($helperTypes as $helperType)
  {
  ?>
  <div class="card" style="width: 22rem;">
    <img src="public/img/helpersType<?= $helperType['id'] ?>.jpg" class="card-img-top" alt="image prestataire">
    <div class="card-body">
      <h5 class="card-title"><?= htmlspecialchars($helperType['title']) ?><br></h5>
      <a href="index.php?action=helpersTypeAdmin&amp;id=<?= $helperType['id'] ?>" class="btn btn-primary">En savoir plus</a>
    </div>
  </div>
  <?php
  }
  ?>  
<div>
</section> 
<?php $main_content = ob_get_clean(); ?>

<?php ob_start(); ?>
<script src="public/js/addServicesAdmin.js"></script>
<?php $script = ob_get_clean(); ?>

<?php require('templateBackend.php'); ?>
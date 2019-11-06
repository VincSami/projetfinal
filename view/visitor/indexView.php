<?php $page_title = 'Bienvenue sur Mariage & Coquillages !'; ?>

<?php $page_subtitle = 'Votre mariage à La Réunion les pieds dans l\'eau ou la tête dans les nuages'; ?>

<?php ob_start(); ?>
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="3000">
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
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<?php $image_page = ob_get_clean(); ?>

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
<h3>Les lieux de réception tendances</h3>
<?php
  foreach($topPlaces as $topPlace)
  {
  ?>
  <div class="card bg-dark text-white">
    <img class="card-img" src="public/img/place<?= $topPlace['id'] ?>.jpg" class="card-img-top" alt="image lieu de réception">
    <div class="card-img-overlay">
      <h3 class="card-title"><?= $topPlace['title'] ?></h3>
    </div>
  </div>
  <?php
  }
  ?> 
</section>        
<section id="weddingPlanner">
<h3>Les Wedding-Planners de la semaine</h3>
<?php
  foreach($topWeddingplanners as $topWeddingplanner)
  {
  ?>
  <div class="card" style="width: 18rem;">
    <img src="public/img/weddingPlanner<?= $topWeddingplanner['id'] ?>.jpg" class="card-img-top" alt="image wedding-planner">
    <div class="card-body">
      <h5 class="card-title"><?= $topWeddingplanner['pseudo'] ?><br></h5>
      <a href="index.php?action=weddingplanner&amp;id=<?= $topWeddingplanner['id'] ?>" class="btn btn-primary">En savoir plus</a>
    </div>
  </div>
  <?php
  }
  ?>  
</section>       
<section id="helpers">
<h3>Les prestations indispensables pour votre mariage</h3>
<?php
  foreach($helperTypes as $helperType)
  {
  ?>
  <div class="card" style="width: 18rem;">
    <img src="public/img/helpersType<?= $helperType['id'] ?>.jpg" class="card-img-top" alt="image wedding-planner">
    <div class="card-body">
      <h5 class="card-title"><?= $helperType['title'] ?><br></h5>
      <a href="index.php?action=helpersType&amp;id=<?= $helperType['id'] ?>" class="btn btn-primary">En savoir plus</a>
    </div>
  </div>
  <?php
  }
  ?>  
</section> 
<?php $main_content = ob_get_clean(); ?>

<?php require('templateFrontend.php'); ?>

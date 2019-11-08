<?php $linkrel = ""; ?>

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
<section id="place">
<h3 class="center-title">Les lieux de réception tendances</h3>
<div class="topPlaces">
<?php
  foreach($topPlaces as $topPlace)
  {
  ?>
  <div class="card" style="width: 22rem;">
    <img src="public/img/place<?= $topPlace['id'] ?>.jpg" class="card-img-top" alt="image wedding-planner">
    <div class="card-body">
      <h5 class="card-title"><?= $topPlace['title'] ?><br></h5>
      <a href="index.php?action=place&amp;id=<?= $topPlace['id'] ?>" class="btn btn-primary">En savoir plus</a>
    </div>
  </div>
  <?php
  }
  ?> 
</div>
</section>        
<section id="weddingPlanner">
<h3 class="center-title">Les Wedding-Planners de la semaine</h3>
<div class="topWeddingplanners">
<?php
  foreach($topWeddingplanners as $topWeddingplanner)
  {
  ?>
  <div class="card" style="width: 22rem;">
    <img src="public/img/weddingPlanner<?= $topWeddingplanner['id'] ?>.jpg" class="card-img-top" alt="image wedding-planner">
    <div class="card-body">
      <h5 class="card-title"><?= $topWeddingplanner['pseudo'] ?><br></h5>
      <a href="index.php?action=weddingplanner&amp;id=<?= $topWeddingplanner['id'] ?>" class="btn btn-primary">En savoir plus</a>
    </div>
  </div>
  <?php
  }
  ?> 
</div> 
</section>       
<section id="helpers">
<h3 class="center-title">Les prestations indispensables pour votre mariage</h3>
<div class="helperTypesIndex">
<?php
  foreach($helperTypes as $helperType)
  {
  ?>
  <div class="card" style="width: 22rem;">
    <img src="public/img/helpersType<?= $helperType['id'] ?>.jpg" class="card-img-top" alt="image wedding-planner">
    <div class="card-body">
      <h5 class="card-title"><?= $helperType['title'] ?><br></h5>
      <a href="index.php?action=helpersType&amp;id=<?= $helperType['id'] ?>" class="btn btn-primary">En savoir plus</a>
    </div>
  </div>
  <?php
  }
  ?>
</div>    
</section> 
<?php $main_content = ob_get_clean(); ?>

<?php ob_start(); ?>
<script src="public/js/member.js"></script>
<?php $script = ob_get_clean(); ?>

<?php require('templateFrontend.php'); ?>

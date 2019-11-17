<?php $linkrel = ""; ?>

<?php $page_title = 'Bienvenue sur Mariage & Coquillages !'; ?>

<?php $page_subtitle = 'Votre mariage à La Réunion en toute sérennité'; ?>

<?php ob_start(); ?>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="public/img/accueil1" class="d-block w-100" alt="image mariage accueil">
    </div>
    <div class="carousel-item">
      <img src="public/img/accueil2" class="d-block w-100" alt="image mariage accueil">
    </div>
    <div class="carousel-item">
      <img src="public/img/accueil3" class="d-block w-100" alt="image mariage accueil">
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

<?php ob_start(); ?>
<section id="place">
<h3 class="center-title">Les lieux de réception tendances</h3>
<div class="topPlaces">
<?php
  foreach($topPlaces as $topPlace)
  {
  ?>
  <div class="card" style="width: 22rem;">
    <img src="public/img/place<?= ($topPlace['id']) ?>.jpg" class="card-img-top" alt="image lieu de réception">
    <div class="card-body">
      <h5 class="card-title"><?= htmlspecialchars($topPlace['title']) ?><br></h5>
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
      <h5 class="card-title"><?= htmlspecialchars($topWeddingplanner['pseudo']) ?><br></h5>
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
    <img src="public/img/helpersType<?= $helperType['id'] ?>.jpg" class="card-img-top" alt="image prestataire">
    <div class="card-body">
      <h5 class="card-title"><?= htmlspecialchars($helperType['title']) ?><br></h5>
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

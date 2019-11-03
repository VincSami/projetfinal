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

<?php $page_title = 'Bienvenue sur le site du Voile de la Mariée !'; ?>

<?php $page_subtitle = 'Votre mariage à La Réunion en toute simplicité'; ?>
<?php ob_start(); ?>
<form action="#" method="post">
  <label for="location">Où ?</label>
  <input type="text" name="location" id="location" />
  <label for="date">Quand ?</label>
  <input type="date" name="date" id="date" />
</form>
<?php $form_content = ob_get_clean(); ?>

<?php ob_start(); ?>
<section>
<h3>Les lieux de réception tendances</h3>
<?php
  foreach($topPlaces as $topPlace)
  {
  ?>
  <div class="card" style="width: 18rem;">
    <img src="public/img/place<?= $topPlace['id'] ?>.jpg" class="card-img-top" alt="image lieu de réception">
    <div class="card-body">
      <h5 class="card-title"><?= $topPlace['title'] ?><br></h5>
      <a href="index.php?action=placeMember&amp;id=<?= $topPlace['id'] ?>" class="btn btn-primary">En savoir plus</a>
    </div>
  </div>
  <?php
  }
  ?> 
</section>        
<section>
<h3>Les Wedding-Planners de la semaine</h3>
<?php
  foreach($topWeddingplanners as $topWeddingplanner)
  {
  ?>
  <div class="card" style="width: 18rem;">
    <img src="public/img/weddingPlanner<?= $topWeddingplanner['id'] ?>.jpg" class="card-img-top" alt="image wedding-planner">
    <div class="card-body">
      <h5 class="card-title"><?= $topWeddingplanner['pseudo'] ?><br></h5>
      <a href="index.php?action=weddingplannerMember&amp;id=<?= $topWeddingplanner['id'] ?>" class="btn btn-primary">En savoir plus</a>
    </div>
  </div>
  <?php
  }
  ?>  
</section>       
<section>
<h3>Les prestations indispensables pour votre mariage</h3>
<?php
  foreach($helperTypes as $helperType)
  {
  ?>
  <div class="card" style="width: 18rem;">
    <img src="public/img/helpersType<?= $helperType['id'] ?>.jpg" class="card-img-top" alt="image wedding-planner">
    <div class="card-body">
      <h5 class="card-title"><?= $helperType['title'] ?><br></h5>
      <a href="index.php?action=helpersTypeMember&amp;id=<?= $helperType['id'] ?>" class="btn btn-primary">En savoir plus</a>
    </div>
  </div>
  <?php
  }
  ?>  
</section> 
<?php $main_content = ob_get_clean(); ?>

<?php require('templateMember.php'); ?>

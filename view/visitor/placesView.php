<?php ob_start(); ?>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />
<?php $linkrel = ob_get_clean(); ?>

<?php ob_start(); ?>
  <section id="map_container">
        <div id="map"></div>
        <div id="mapSide">
          <i id="closeMapSide" class="fas fa-times"></i>
          <div id="mapInfos">
            <p id="placeName"></p><br>
            <p id="placeImage"></p><br>
            <p id="placePresentation"></p><br>
          </div>
        </div>
  </section>
<?php $image_page = ob_get_clean(); ?>

<?php $page_title = "Les lieux de réception"; ?>

<?php $page_subtitle = ""; ?>

<?php ob_start(); ?>
<div class="places-filter">
  <button id="selectAllPlaces" class="btn btn-primary selected">Tous les lieux de réception</button>
  <p>Par région :</p>
  <input type="radio" id="selectPlacesNorth" name="region" value="Nord">
  <label for="region">Nord</label>
  <input type="radio" id="selectPlacesWest" name="region" value="Ouest">
  <label for="region">Ouest</label>
  <input type="radio" id="selectPlacesSouth" name="region" value="Sud">
  <label for="region">Est</label>
  <input type="radio" id="selectPlacesEast" name="region" value="Est">
  <label for="region">Sud</label>
  <button class="btn btn-primary" id="selectTopPlaces">Les plus populaires</button>
</div>
<section class="places-view">
<?php
foreach($places as $place)
{
?>
<div class="card places" data-region="<?= htmlspecialchars($place['region']) ?>" data-ranked="<?= htmlspecialchars($place['ranked']) ?>" style="width: 18rem;">
    <img src="public/img/place<?= $place['id'] ?>.jpg" class="card-img-top" alt="image wedding-planner">
    <div class="card-body">
      <h5 class="card-title"><?= htmlspecialchars($place['title']) ?><br></h5>
      <a href="index.php?action=place&amp;id=<?= $place['id'] ?>" class="btn btn-primary">En savoir plus</a>
    </div>
  </div>
<?php
}
?>
</section>
<?php $main_content = ob_get_clean(); ?>

<?php ob_start(); ?>
<script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js" integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og==" crossorigin=""></script>
<script src="public/js/ajax.js"></script>
<script src="public/js/map.js"></script>
<script src="public/js/places.js"></script>
<?php $script = ob_get_clean(); ?>

<?php require('templateFrontend.php'); ?>

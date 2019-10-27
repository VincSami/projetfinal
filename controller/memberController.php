<?php
//Chargement des classes avec require_once (pour éviter des appels en doublons)
require_once('model/PlaceManager.php');
require_once('model/WeddingplannerManager.php');
require_once('model/HelperManager.php');

//Accueil Membre
function homeMember()
{
    $placeManager = new PlaceManager();
    $weddingplannerManager = new WeddingplannerManager();
    $helperManager = new HelperManager();
    
    $topPlaces = $placeManager->getTopPlaces();
    $topWeddingplanners = $weddingplannerManager->getTopWeddingplanners();
    $helperTypes = $helperManager->getHelperTypes();

    require('view/frontend/indexView.php');
}
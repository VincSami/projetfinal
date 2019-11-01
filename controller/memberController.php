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

    require('view/user/indexUserView.php');
}

function placesMember()
{
    $placeManager = new PlaceManager();
    $places = $placeManager->getPlaces();
    require('view/visitor/placesView.php');
}

function placeMember($placeId)
{
    $placeManager = new PlaceManager();
    $place = $placeManager->getPlace($_GET['id']);
    require('view/visitor/placeView.php');
}

function weddingPlannersMember()
{
    $weddingplannerManager = new WeddingplannerManager();
    $weddingplanners = $weddingplannerManager->getWeddingplanners();
    require('view/visitor/weddingplannersView.php');
}

function weddingPlannerMember($weddingplannerId)
{
    $weddingplannerManager = new WeddingplannerManager();
    $weddingplanner = $weddingplannerManager->getWeddingplanner($_GET['id']);
    require('view/visitor/weddingplannerView.php');
}

function helpersMember()
{
    $helperManager = new HelperManager();
    $helpers = $helperManager->getHelpers();
    require('view/visitor/helpersView.php');
}

function helpersTypeMember($typeId)
{
    $helperManager = new HelperManager();
    $helpersType = $helperManager->getHelpersType($_GET['id']);
    require('view/visitor/helpersTypeView.php');
}

function helperMember($helperId)
{
    $helperManager = new HelperManager();
    $helper = $helperManager->getHelper($_GET['id']);
    require('view/visitor/helperView.php');
}
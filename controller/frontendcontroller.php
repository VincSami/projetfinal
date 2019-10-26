<?php

//Récupération des fonctions nécesaires dans le model
require_once('model/PlaceManager.php');
require_once('model/WeddingplannerManager.php');
require_once('model/HelperManager.php');


//Affichage des posts sur la page d'acceuil visiteur
function home()
{
    $placeManager = new PlaceManager();
    $weddingplannerManager = new WeddingplannerManager();
    $helperManager = new HelperManager();
    
    $topPlaces = $placeManager->getTopPlaces();
    $topWeddingplanners = $weddingplannerManager->getTopWeddingplanners();
    $helperTypes = $helperManager->getHelperTypes();

    require('view/frontend/indexView.php');
}

function places()
{
    $placeManager = new PlaceManager();
    $places = $placeManager->getPlaces();
    require('view/frontend/placesView.php');
}

function place($placeId)
{
    $placeManager = new PlaceManager();
    $place = $placeManager->getPlace($_GET['id']);
    require('view/frontend/placeView.php');
}

function weddingPlanners()
{
    $weddingplannerManager = new WeddingplannerManager();
    $weddingplanners = $weddingplannerManager->getWeddingplanners();
    require('view/frontend/weddingplannersView.php');
}

function weddingPlanner($weddingplannerId)
{
    $weddingplannerManager = new WeddingplannerManager();
    $weddingplanner = $weddingplannerManager->getWeddingplanner($_GET['id']);
    require('view/frontend/weddingplannerView.php');
}

function helpers()
{
    $helperManager = new HelperManager();
    $helpers = $helperManager->getHelpers();
    require('view/frontend/helpersView.php');
}

function helpersType($typeId)
{
    $helperManager = new HelperManager();
    $helpersType = $helperManager->getHelpersType($_GET['id']);
    require('view/frontend/helpersTypeView.php');
}

function helper($helperId)
{
    $helperManager = new HelperManager();
    $helper = $helperManager->getHelper($_GET['id']);
    require('view/frontend/helperView.php');
}

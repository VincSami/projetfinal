<?php

use VS\MariageCoquillages\model\{PlaceManager, WeddingplannerManager, HelperManager, MemberManager, AdminManager};

//Récupération des fonctions nécesaires dans le model
require_once('model/PlaceManager.php');
require_once('model/WeddingplannerManager.php');
require_once('model/HelperManager.php');
require_once('model/MemberManager.php');
require_once('model/AdminManager.php');

//Affichage des posts sur la page d'acceuil visiteur
function home()
{
    $placeManager = new PlaceManager();
    $weddingplannerManager = new WeddingplannerManager();
    $helperManager = new HelperManager();
    
    $topPlaces = $placeManager->getTopPlaces();
    $topWeddingplanners = $weddingplannerManager->getTopWeddingplanners();
    $helperTypes = $helperManager->getHelperTypes();

    require('view/visitor/indexView.php');
}

function subscribe($pseudo, $pass, $email)
{
    $memberManager = new MemberManager();

    $newMember = $memberManager->subscribeMember($pseudo, $pass, $email);
    header('Location:index.php');
}

    function connectMember($pseudo, $passMember)
{
    $memberManager = new MemberManager();
    $connectMember = $memberManager->AccessMember($pseudo, $passMember);
    header('Location:index.php');
}

function places()
{
    $placeManager = new PlaceManager();
    $places = $placeManager->getPlaces();
    require('view/visitor/placesView.php');
}

function place($placeId)
{
    $placeManager = new PlaceManager();
    $place = $placeManager->getPlace($placeId);
    require('view/visitor/placeView.php');
}

function weddingPlanners()
{
    $weddingplannerManager = new WeddingplannerManager();
    $weddingplanners = $weddingplannerManager->getWeddingplanners();
    require('view/visitor/weddingplannersView.php');
}

function weddingPlanner($weddingplannerId)
{
    $weddingplannerManager = new WeddingplannerManager();
    $weddingplanner = $weddingplannerManager->getWeddingplanner($weddingplannerId);
    require('view/visitor/weddingplannerView.php');
}

function helpers($pageId)
{
    $helperManager = new HelperManager();
    $helpers = $helperManager->getHelpers($pageId);
    $numberOfPages = $helperManager->getPageCount();
    require('view/visitor/helpersView.php');
}


function helpersType($typeId)
{
    $helperManager = new HelperManager();
    $helpersType = $helperManager->getHelpersType($typeId);
    require('view/visitor/helpersTypeView.php');
}

function helper($helperId)
{
    $helperManager = new HelperManager();
    $helper = $helperManager->getHelper($helperId);
    require('view/visitor/helperView.php');
}

function getPlacesCoords()
{
    $placeManager = new PlaceManager();
    $placesCoords = $placeManager->getCoordinates();
    
    echo(json_encode($placesCoords));
}

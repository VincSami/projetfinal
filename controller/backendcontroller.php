<?php
//Chargement des classes avec require_once (pour éviter des appels en doublons)
require_once('model/PlaceManager.php');
require_once('model/WeddingplannerManager.php');
require_once('model/HelperManager.php');

//Accueil Administrateur
function homeAdmin()
{
    $placeManager = new PlaceManager();
    $weddingplannerManager = new WeddingplannerManager();
    $helperManager = new HelperManager();
    
    $topPlaces = $placeManager->getTopPlaces();
    $topWeddingplanners = $weddingplannerManager->getTopWeddingplanners();
    $helperTypes = $helperManager->getHelperTypes();

    require('view/backend/indexAdminView.php');
}

//Page de suppression du billet et des commentaires
function deletePlacePage()
{ 
    $placeManager = new PlaceManager();

    $place = $placeManager->getPlace($_GET['id']);
    require('view/backend/deletePlaceView.php');
}

function deleteWeddingplannerPage()
{ 
    $weddingplannerManager = new WeddingplannerManager();

    $weddingplanner = $weddingplannerManager->getWeddingplanner($_GET['id']);
    require('view/backend/deleteWeddingplannerView.php');
}

function deleteHelperPage()
{ 
    $helperManager = new HelperManager();

    $helper = $helperManager->getHelper($_GET['id']);
    require('view/backend/deleteHelperView.php');
}

//Suppression du billet et des commentaires
function erasePlace($placeId)
{
    $adminManager = new AdminManager();
    $deletePlace = $adminManager->deletePlace($placeId);
    header('Location:index.php');
}

function eraseWeddingplanner($weddingplannerId)
{
    $adminManager = new AdminManager();
    $deleteWeddingplanner = $adminManager->deleteWeddingplanner($weddingplannerId);
    header('Location:index.php');
}

function eraseHelper($helperId)
{
    $adminManager = new AdminManager();
    $deleteHelper = $adminManager->deleteHelper($helperId);
    header('Location:index.php');
}

function updatePlacePage()
{ 
    $placeManager = new PlaceManager();

    $place = $placeManager->getPlace($_GET['id']);
    require('view/backend/updatePlaceView.php');
}

function updateWeddingplannerPage()
{ 
    $weddingplannerManager = new WeddingplannerManager();

    $weddingplanner = $weddingplannerManager->getWeddingplanner($_GET['id']);
    require('view/backend/updateWeddingplannerView.php');
}

function updateHelperPage()
{ 
    $helperManager = new HelperManager();

    $helper = $helperManager->getHelper($_GET['id']);
    require('view/backend/updateHelperView.php');
}

//Modification du billet
function updatePlace($placeId, $title, $city, $positionx, $positiony, $region, $website, $tel, $mail, $presentation)
{  
    $adminManager = new AdminManager();
    
    $updatedPlace = $adminManager->modifyPlace($placeId, $title, $city, $positionx, $positiony, $region, $website, $tel, $mail, $presentation);
    $placeImage = $adminManager->placeImage($placeId);
    
    if ($updatedPlace === false) {
        throw new Exception('Impossible de modifier le lieu de réception !');
    } 
    else {
        header('Location: index.php?action=place&id=' . $placeId);
    }
}

function updateWeddingplanner($weddingplannerId, $pseudo, $specialty, $presentation, $website, $tel, $mail)
{  
    $adminManager = new AdminManager();
    
    $updatedWeddingplanner = $adminManager->modifyWeddingplanner($weddingplannerId, $pseudo, $specialty, $presentation, $website, $tel, $mail);
    $weddingplannerImage = $adminManager->weddingplannerImage($weddingplannerId);
    
    if ($updatedWeddingplanner === false) {
        throw new Exception('Impossible de modifier le wedding-planner !');
    } 
    else {
        header('Location: index.php?action=weddingplanner&id=' . $weddingplannerId);
    }
}

function updateHelper($helperId, $pseudo, $presentation, $website, $tel, $mail, $id_type)
{  
    $adminManager = new AdminManager();
    
    $updatedHelper = $adminManager->modifyHelper($helperId, $pseudo, $presentation, $website, $tel, $mail, $id_type);
    $helperImage = $adminManager->helperImage($helperId);
    
    if ($updatedHelper === false) {
        throw new Exception('Impossible de modifier le prestataire !');
    } 
    else {
        header('Location: index.php?action=helper&id=' . $helperId);
    }
}

//Page de création d'un billet
function placeCreationPage()
{
  require('view/backend/createPlaceView.php');
}

function weddingplannerCreationPage()
{
  require('view/backend/createWeddingplannerView.php');
}

function helperCreationPage()
{
  require('view/backend/createHelperView.php');
}

//Création d'un nouveau billet
function newPlace($title, $city, $positionx, $positiony, $region, $website, $tel, $mail, $presentation)
{
    $adminManager = new AdminManager();
    $placeCreated = $adminManager->createPlace($title, $city, $positionx, $positiony, $region, $website, $tel, $mail, $presentation);
    $placeImage = $adminManager->placeImage($placeCreated);
    if ($placeCreated === false) {
        throw new Exception('Impossible d\'ajouter le lieu de réception !');
    } 
    else {
        header('Location: index.php');
    }
}

function newWeddingplanner($pseudo, $specialty, $presentation, $website, $tel, $mail)
{
    $adminManager = new AdminManager();
    $weddingplannerCreated = $adminManager->createWeddingplanner($pseudo, $specialty, $presentation, $website, $tel, $mail);
    $weddingplannerImage = $adminManager->weddingplannerImage($weddingplannerCreated);
    if ($weddingplannerCreated === false) {
        throw new Exception('Impossible d\'ajouter le wedding-planner !');
    } 
    else {
        header('Location: index.php');
    }
}

function newHelper($pseudo, $presentation, $website, $tel, $mail, $id_type)
{
    $adminManager = new AdminManager();
    $helperCreated = $adminManager->createHelper($pseudo, $presentation, $website, $tel, $mail, $id_type);
    $helperImage = $adminManager->helperImage($helperCreated);
    if ($helperCreated === false) {
        throw new Exception('Impossible d\'ajouter le prestataire !');
    } 
    else {
        header('Location: index.php');
    }
}
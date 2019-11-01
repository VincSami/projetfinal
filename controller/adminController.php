<?php
//Chargement des classes avec require_once (pour éviter des appels en doublons)
require_once('model/PlaceManager.php');
require_once('model/WeddingplannerManager.php');
require_once('model/HelperManager.php');
require_once('model/MemberManager.php');
require_once('model/AdminManager.php');

//Accueil Administrateur
function homeAdmin()
{
    $placeManager = new PlaceManager();
    $weddingplannerManager = new WeddingplannerManager();
    $helperManager = new HelperManager();
    
    $topPlaces = $placeManager->getTopPlaces();
    $topWeddingplanners = $weddingplannerManager->getTopWeddingplanners();
    $helperTypes = $helperManager->getHelperTypes();

    require('view/admin/indexAdminView.php');
}

function placesAdmin()
{
    $placeManager = new PlaceManager();
    $places = $placeManager->getPlaces();
    require('view/visitor/placesView.php');
}

function placeAdmin($placeId)
{
    $placeManager = new PlaceManager();
    $place = $placeManager->getPlace($_GET['id']);
    require('view/visitor/placeView.php');
}

function weddingPlannersAdmin()
{
    $weddingplannerManager = new WeddingplannerManager();
    $weddingplanners = $weddingplannerManager->getWeddingplanners();
    require('view/visitor/weddingplannersView.php');
}

function weddingPlannerAdmin($weddingplannerId)
{
    $weddingplannerManager = new WeddingplannerManager();
    $weddingplanner = $weddingplannerManager->getWeddingplanner($_GET['id']);
    require('view/visitor/weddingplannerView.php');
}

function helpersAdmin()
{
    $helperManager = new HelperManager();
    $helpers = $helperManager->getHelpers();
    require('view/visitor/helpersView.php');
}

function helpersTypeAdmin($typeId)
{
    $helperManager = new HelperManager();
    $helpersType = $helperManager->getHelpersType($_GET['id']);
    require('view/visitor/helpersTypeView.php');
}

function helperAdmin($helperId)
{
    $helperManager = new HelperManager();
    $helper = $helperManager->getHelper($_GET['id']);
    require('view/visitor/helperView.php');
}

//Page de suppression du billet et des commentaires
function deletePlacePageAdmin()
{ 
    $placeManager = new PlaceManager();

    $place = $placeManager->getPlace($_GET['id']);
    require('view/admin/deletePlaceView.php');
}

function deleteWeddingplannerPageAdmin()
{ 
    $weddingplannerManager = new WeddingplannerManager();

    $weddingplanner = $weddingplannerManager->getWeddingplanner($_GET['id']);
    require('view/admin/deleteWeddingplannerView.php');
}

function deleteHelperPageAdmin()
{ 
    $helperManager = new HelperManager();

    $helper = $helperManager->getHelper($_GET['id']);
    require('view/admin/deleteHelperView.php');
}

//Suppression du billet et des commentaires
function erasePlace($placeId)
{
    $adminManager = new AdminManager();
    $deletePlace = $adminManager->deletePlace($placeId);
    header('Location:index.php');
}

function eraseWeddingplannerAdmin($weddingplannerId)
{
    $adminManager = new AdminManager();
    $deleteWeddingplanner = $adminManager->deleteWeddingplanner($weddingplannerId);
    header('Location:index.php');
}

function eraseHelperAdmin($helperId)
{
    $adminManager = new AdminManager();
    $deleteHelper = $adminManager->deleteHelper($helperId);
    header('Location:index.php');
}

function updatePlacePageAdmin()
{ 
    $placeManager = new PlaceManager();

    $place = $placeManager->getPlace($_GET['id']);
    require('view/admin/updatePlaceView.php');
}

function updateWeddingplannerPageAdmin()
{ 
    $weddingplannerManager = new WeddingplannerManager();

    $weddingplanner = $weddingplannerManager->getWeddingplanner($_GET['id']);
    require('view/admin/updateWeddingplannerView.php');
}

function updateHelperPageAdmin()
{ 
    $helperManager = new HelperManager();

    $helper = $helperManager->getHelper($_GET['id']);
    require('view/admin/updateHelperView.php');
}

//Modification du billet
function updatePlaceAdmin($placeId, $title, $city, $positionx, $positiony, $region, $website, $tel, $mail, $presentation)
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

function updateWeddingplannerAdmin($weddingplannerId, $pseudo, $specialty, $presentation, $website, $tel, $mail)
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

function updateHelperAdmin($helperId, $pseudo, $presentation, $website, $tel, $mail, $id_type)
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
function placeCreationPageAdmin()
{
  require('view/admin/createPlaceView.php');
}

function weddingplannerCreationPageAdmin()
{
  require('view/admin/createWeddingplannerView.php');
}

function helperCreationPageAdmin()
{
  require('view/admin/createHelperView.php');
}

//Création d'un nouveau billet
function newPlaceAdmin($title, $city, $positionx, $positiony, $region, $website, $tel, $mail, $presentation)
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

function newWeddingplannerAdmin($pseudo, $specialty, $presentation, $website, $tel, $mail)
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

function newHelperAdmin($pseudo, $presentation, $website, $tel, $mail, $id_type)
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
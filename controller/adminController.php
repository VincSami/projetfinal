<?php
use VS\MariageCoquillages\Model\PlaceManager;
use VS\MariageCoquillages\Model\WeddingplannerManager;
use VS\MariageCoquillages\Model\HelperManager;
use VS\MariageCoquillages\Model\AdminManager;



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
    require('view/admin/placesAdminView.php');
}

function placeAdmin($placeId)
{
    $placeManager = new PlaceManager();
    $place = $placeManager->getPlace($placeId);
    require('view/admin/placeAdminView.php');
}

function weddingPlannersAdmin()
{
    $weddingplannerManager = new WeddingplannerManager();
    $weddingplanners = $weddingplannerManager->getWeddingplanners();
    require('view/admin/weddingplannersAdminView.php');
}

function weddingPlannerAdmin($weddingplannerId)
{
    $weddingplannerManager = new WeddingplannerManager();
    $weddingplanner = $weddingplannerManager->getWeddingplanner($weddingplannerId);
    require('view/admin/weddingplannerAdminView.php');
}

function helpersAdmin($pageId)
{
    $helperManager = new HelperManager();
    $helpers = $helperManager->getHelpers($pageId);
    $numberOfPages = $helperManager->getPageCount();
    require('view/admin/helpersAdminView.php');
}

function helpersTypeAdmin($typeId)
{
    $helperManager = new HelperManager();
    $helpersType = $helperManager->getHelpersType($typeId);
    require('view/admin/helpersTypeAdminView.php');
}

function helperAdmin($helperId)
{
    $helperManager = new HelperManager();
    $helper = $helperManager->getHelper($helperId);
    require('view/admin/helperAdminView.php');
}

function deletePlacePageAdmin()
{ 
    $placeManager = new PlaceManager();

    $place = $placeManager->getPlace($_GET['id']);
    require('view/admin/deletePlaceAdminView.php');
}

function deleteWeddingplannerPageAdmin()
{ 
    $weddingplannerManager = new WeddingplannerManager();

    $weddingplanner = $weddingplannerManager->getWeddingplanner($_GET['id']);
    require('view/admin/deleteWeddingplannerAdminView.php');
}

function deleteHelperPageAdmin()
{ 
    $helperManager = new HelperManager();

    $helper = $helperManager->getHelper($_GET['id']);
    require('view/admin/deleteHelperAdminView.php');
}

function erasePlaceAdmin($placeId)
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
    require('view/admin/updatePlaceAdminView.php');
}

function updateWeddingplannerPageAdmin()
{ 
    $weddingplannerManager = new WeddingplannerManager();

    $weddingplanner = $weddingplannerManager->getWeddingplanner($_GET['id']);
    require('view/admin/updateWeddingplannerAdminView.php');
}

function updateHelperPageAdmin()
{ 
    $helperManager = new HelperManager();

    $helper = $helperManager->getHelper($_GET['id']);
    require('view/admin/updateHelperAdminView.php');
}

function updatePlaceAdmin($title, $city, $positionx, $positiony, $region, $website, $tel, $mail, $presentation, $placeId)
{  
    $adminManager = new AdminManager();
    
    $updatedPlace = $adminManager->modifyPlaceAdmin($title, $city, $positionx, $positiony, $region, $website, $tel, $mail, $presentation, $placeId);
    $placeImage = $adminManager->placeImageAdmin($placeId);
    
    if ($updatedPlace == false) {
        throw new Exception('Impossible de modifier le lieu de réception !');
    } 
    else {
        header('Location: index.php?action=placeAdmin&id=' . $placeId);
    }
}

function updateWeddingplannerAdmin($pseudo, $specialty, $presentation, $website, $tel, $mail, $weddingplannerId)
{  
    $adminManager = new AdminManager();
    
    $updatedWeddingplanner = $adminManager->modifyWeddingplannerAdmin($pseudo, $specialty, $presentation, $website, $tel, $mail, $weddingplannerId);
    $weddingplannerImage = $adminManager->weddingplannerImageAdmin($weddingplannerId);
    
    if ($updatedWeddingplanner == false) {
        throw new Exception('Impossible de modifier le wedding-planner !');
    } 
    else {
        header('Location: index.php?action=weddingplannerAdmin&id=' . $weddingplannerId);
    }
}

function updateHelperAdmin($pseudo, $content, $website, $tel, $mail, $helperType, $helperId)
{  
    $adminManager = new AdminManager();
    
    $updatedHelper = $adminManager->modifyHelperAdmin($pseudo, $content, $website, $tel, $mail, $helperType, $helperId);
    $helperImage = $adminManager->helperImageAdmin($helperId);
    if ($updatedHelper == false) {
        throw new Exception('Impossible de modifier le prestataire !');
    } 
    else {
        header('Location: index.php?action=helperAdmin&id=' . $helperId);
    }
}


function newPlaceAdmin($title, $city, $positionx, $positiony, $region, $website, $tel, $mail, $presentation, $authorId)
{
    $adminManager = new AdminManager();
    $placeCreated = $adminManager->createPlaceAdmin($title, $city, $positionx, $positiony, $region, $website, $tel, $mail, $presentation, $authorId);
    $placeImage = $adminManager->placeImageAdmin($placeCreated);
    if ($placeCreated === false) {
        throw new Exception('Impossible d\'ajouter le lieu de réception !');
    } 
    else {
        header('Location: index.php?action=placeAdmin&id=' . $placeCreated);
    }
}

function newWeddingplannerAdmin($pseudo, $specialty, $presentation, $website, $tel, $mail, $authorId)
{
    $adminManager = new AdminManager();
    $weddingplannerCreated = $adminManager->createWeddingplannerAdmin($pseudo, $specialty, $presentation, $website, $tel, $mail, $authorId);
    $weddingplannerImage = $adminManager->weddingplannerImageAdmin($weddingplannerCreated);
    if ($weddingplannerCreated === false) {
        throw new Exception('Impossible d\'ajouter le wedding-planner !');
    } 
    else {
         header('Location: index.php?action=weddingplannerAdmin&id=' . $weddingplannerCreated);
    }
}

function newHelperAdmin($pseudo, $content, $website, $tel, $mail, $helperType, $authorId)
{
    $adminManager = new AdminManager();
    $helperCreated = $adminManager->createHelperAdmin($pseudo, $content, $website, $tel, $mail, $helperType, $authorId);
    $helperImage = $adminManager->helperImageAdmin($helperCreated);
    if ($helperCreated === false) {
        throw new Exception('Impossible d\'ajouter le prestataire !');
    } 
    else {
        header('Location: index.php?action=helperAdmin&id=' . $helperCreated);
    }
}

function getPlacesCoordsAdmin()
{
    $placeManager = new PlaceManager();
    $placesCoords = $placeManager->getCoordinates();
    
    echo(json_encode($placesCoords));
}
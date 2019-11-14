<?php

use VS\MariageCoquillages\model\PlaceManager;
use VS\MariageCoquillages\model\WeddingplannerManager;
use VS\MariageCoquillages\model\HelperManager;
use VS\MariageCoquillages\model\MemberManager;
require_once('model/PlaceManager.php');
require_once('model/WeddingplannerManager.php');
require_once('model/HelperManager.php');
require_once('model/MemberManager.php');

//Accueil Membre
function homeMember()
{
    $placeManager = new PlaceManager();
    $weddingplannerManager = new WeddingplannerManager();
    $helperManager = new HelperManager();
    
    $topPlaces = $placeManager->getTopPlaces();
    $topWeddingplanners = $weddingplannerManager->getTopWeddingplanners();
    $helperTypes = $helperManager->getHelperTypes();

    require('view/member/indexMemberView.php');
}

function userProfil($authorId)
{
    $placeManager = new PlaceManager();
    $weddingplannerManager = new WeddingplannerManager();
    $helperManager = new HelperManager();
    
    $memberPlaces = $placeManager->getMemberPlaces($authorId);
    $memberWeddingplanners = $weddingplannerManager->getMemberWeddingplanners($authorId);
    $memberHelpers = $helperManager->getMemberHelpers($authorId);

    require('view/member/managerMemberView.php');
}

function placesMember()
{
    $placeManager = new PlaceManager();
    $places = $placeManager->getPlaces();
    require('view/member/placesMemberView.php');
}

function placeMember($placeId)
{
    $placeManager = new PlaceManager();
    $place = $placeManager->getPlace($placeId);
    require('view/member/placeMemberView.php');
}

function weddingplannersMember()
{
    $weddingplannerManager = new WeddingplannerManager();
    $weddingplanners = $weddingplannerManager->getWeddingplanners();
    require('view/member/weddingplannersMemberView.php');
}

function weddingplannerMember($weddingplannerId)
{
    $weddingplannerManager = new WeddingplannerManager();
    $weddingplanner = $weddingplannerManager->getWeddingplanner($weddingplannerId);
    require('view/member/weddingplannerMemberView.php');
}

function helpersTypeMember($typeId)
{
    $helperManager = new HelperManager();
    $helpersType = $helperManager->getHelpersType($typeId);
    require('view/member/helpersTypeMemberView.php');
}

function helpersMember($pageId)
{
    $helperManager = new HelperManager();
    $helpers = $helperManager->getHelpers($pageId);
    $numberOfPages = $helperManager->getPageCount();
    require('view/member/helpersMemberView.php');
}

function helperMember($helperId)
{
    $helperManager = new HelperManager();
    $helper = $helperManager->getHelper($helperId);
    require('view/member/helperMemberView.php');
}

function deletePlacePageMember()
{ 
    $placeManager = new PlaceManager();

    $place = $placeManager->getPlace($_GET['id']);
    require('view/member/deletePlaceMemberView.php');
}

function deleteWeddingplannerPageMember()
{ 
    $weddingplannerManager = new WeddingplannerManager();

    $weddingplanner = $weddingplannerManager->getWeddingplanner($_GET['id']);
    require('view/member/deleteWeddingplannerMemberView.php');
}

function deleteHelperPageMember()
{ 
    $helperManager = new HelperManager();

    $helper = $helperManager->getHelper($_GET['id']);
    require('view/member/deleteHelperMemberView.php');
}

//Suppression du billet et des commentaires
function erasePlaceMember($placeId)
{
    $memberManager = new MemberManager();
    $deletePlace = $memberManager->deletePlace($placeId);
    header('Location:index.php');
}

function eraseWeddingplannerMember($weddingplannerId)
{
    $memberManager = new MemberManager();
    $deleteWeddingplanner = $memberManager->deleteWeddingplanner($weddingplannerId);
    header('Location:index.php');
}

function eraseHelperMember($helperId)
{
    $memberManager = new MemberManager();
    $deleteHelper = $memberManager->deleteHelper($helperId);
    header('Location:index.php');
}

function updatePlacePageMember()
{ 
    $placeManager = new PlaceManager();

    $place = $placeManager->getPlace($_GET['id']);
    require('view/member/updatePlaceMemberView.php');
}

function updateWeddingplannerPageMember()
{ 
    $weddingplannerManager = new WeddingplannerManager();

    $weddingplanner = $weddingplannerManager->getWeddingplanner($_GET['id']);
    require('view/member/updateWeddingplannerMemberView.php');
}

function updateHelperPageMember()
{ 
    $helperManager = new HelperManager();

    $helper = $helperManager->getHelper($_GET['id']);
    require('view/member/updateHelperMemberView.php');
}

//Modification du billet
function updatePlaceMember($title, $city, $positionx, $positiony, $region, $website, $tel, $mail, $presentation, $placeId)
{  
    $memberManager = new MemberManager();
    
    $updatedPlace = $memberManager->modifyPlaceMember($title, $city, $positionx, $positiony, $region, $website, $tel, $mail, $presentation, $placeId);
    $placeImage = $memberManager->placeImageMember($placeId);
    
    if ($updatedPlace == false) {
        throw new Exception('Impossible de modifier le lieu de réception !');
    } 
    else {
        header('Location: index.php?action=placeMember&id=' . $placeId);
    }
}

function updateWeddingplannerMember($pseudo, $specialty, $presentation, $website, $tel, $mail, $weddingplannerId)
{  
    $memberManager = new MemberManager();
    
    $updatedWeddingplanner = $memberManager->modifyWeddingplannerMember($pseudo, $specialty, $presentation, $website, $tel, $mail, $weddingplannerId);
    $weddingplannerImage = $memberManager->weddingplannerImageMember($weddingplannerId);
    
    if ($updatedWeddingplanner == false) {
        throw new Exception('Impossible de modifier le wedding-planner !');
    } 
    else {
        header('Location: index.php?action=weddingplannerMember&id=' . $weddingplannerId);
    }
}

function updateHelperMember($pseudo, $content, $website, $tel, $mail, $helperType, $helperId)
{  
    $memberManager = new MemberManager();
    
    $updatedHelper = $memberManager->modifyHelperMember($pseudo, $content, $website, $tel, $mail, $helperType, $helperId);
    $helperImage = $memberManager->helperImageMember($helperId);
    if ($updatedHelper == false) {
        throw new Exception('Impossible de modifier le prestataire !');
    } 
    else {
        header('Location: index.php?action=helperMember&id=' . $helperId);
    }
}


function newPlaceMember($title, $city, $positionx, $positiony, $region, $website, $tel, $mail, $presentation, $authorId)
{
    $memberManager = new MemberManager();
    $placeCreated = $memberManager->createPlaceMember($title, $city, $positionx, $positiony, $region, $website, $tel, $mail, $presentation, $authorId);
    $placeImage = $memberManager->placeImageMember($placeCreated);
    if ($placeCreated === false) {
        throw new Exception('Impossible d\'ajouter le lieu de réception !');
    } 
    else {
        header('Location: index.php?action=placeMember&id=' . $placeCreated);
    }
}

function newWeddingplannerMember($pseudo, $specialty, $presentation, $website, $tel, $mail, $authorId)
{
    $memberManager = new MemberManager();
    $weddingplannerCreated = $memberManager->createWeddingplannerMember($pseudo, $specialty, $presentation, $website, $tel, $mail, $authorId);
    $weddingplannerImage = $memberManager->weddingplannerImageMember($weddingplannerCreated);
    if ($weddingplannerCreated === false) {
        throw new Exception('Impossible d\'ajouter le wedding-planner !');
    } 
    else {
         header('Location: index.php?action=weddingplannerMember&id=' . $weddingplannerCreated);
    }
}

function newHelperMember($pseudo, $content, $website, $tel, $mail, $helperType, $authorId)
{
    $memberManager = new MemberManager();
    $helperCreated = $memberManager->createHelperMember($pseudo, $content, $website, $tel, $mail, $helperType, $authorId);
    $helperImage = $memberManager->helperImageMember($helperCreated);
    if ($helperCreated === false) {
        throw new Exception('Impossible d\'ajouter le prestataire !');
    } 
    else {
        header('Location: index.php?action=helperMember&id=' . $helperCreated);
    }
}
function getPlacesCoordsMember()
{
    $placeManager = new PlaceManager();
    $placesCoords = $placeManager->getCoordinates();
    
    echo(json_encode($placesCoords));
}
<?php

use VS\MariageCoquillages\Model\PlaceManager;
use VS\MariageCoquillages\Model\WeddingplannerManager;
use VS\MariageCoquillages\Model\HelperManager;
use VS\MariageCoquillages\Model\MemberManager;

spl_autoload_register('autoloader');

//page de profil de l'utilisateur
function userProfil()
{
    $placeManager = new PlaceManager();
    $weddingplannerManager = new WeddingplannerManager();
    $helperManager = new HelperManager();
    
    $memberPlaces = $placeManager->getMemberPlaces();
    $memberWeddingplanners = $weddingplannerManager->getMemberWeddingplanners();
    $memberHelpers = $helperManager->getMemberHelpers();

    require('view/member/managerMemberView.php');
}

function deletePlacePageMember()
{ 
    $placeManager = new PlaceManager();

    $place = $placeManager->getPlace($_GET['id']);
    
    if($place['author_id'] == $_SESSION['id']){
        require('view/member/deletePlaceMemberView.php');
    } else {
        throw new \Exception ("Vous n'êtes pas autorisé à réaliser cette action");
    }
}

function deleteWeddingplannerPageMember()
{ 
    $weddingplannerManager = new WeddingplannerManager();

    $weddingplanner = $weddingplannerManager->getWeddingplanner($_GET['id']);

    if($weddingplanner['author_id'] == $_SESSION['id']){
        require('view/member/deleteWeddingplannerMemberView.php');
    } else {
        throw new \Exception ("Vous n'êtes pas autorisé à réaliser cette action");
    }
}

function deleteHelperPageMember()
{ 
    $helperManager = new HelperManager();

    $helper = $helperManager->getHelper($_GET['id']);
    
    if($helper['author_id'] == $_SESSION['id']){
        require('view/member/deleteHelperMemberView.php');
    } else {
        throw new \Exception ("Vous n'êtes pas autorisé à réaliser cette action");
    }
}

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

    if($place['author_id'] == $_SESSION['id']){
    require('view/member/updatePlaceMemberView.php');
    } else{
        throw new \Exception ("Vous n'êtes pas autorisé à réaliser cette action");
    }
}

function updateWeddingplannerPageMember()
{ 
    $weddingplannerManager = new WeddingplannerManager();

    $weddingplanner = $weddingplannerManager->getWeddingplanner($_GET['id']);

    if($weddingplanner['author_id'] == $_SESSION['id']){
        require('view/member/updateWeddingplannerMemberView.php');
    } else{
        throw new \Exception ("Vous n'êtes pas autorisé à réaliser cette action");
    }
}

function updateHelperPageMember()
{ 
    $helperManager = new HelperManager();

    $helper = $helperManager->getHelper($_GET['id']);
    
    if($weddingplanner['author_id'] == $_SESSION['id']){
        require('view/member/updateHelperMemberView.php');
    } else{
        throw new \Exception ("Vous n'êtes pas autorisé à réaliser cette action");
    }
}

function updatePlaceMember($title, $city, $positionx, $positiony, $region, $website, $tel, $mail, $presentation, $placeId)
{  
    $memberManager = new MemberManager();
    
    $updatedPlace = $memberManager->modifyPlaceMember($title, $city, $positionx, $positiony, $region, $website, $tel, $mail, $presentation, $placeId);
    $placeImage = $memberManager->placeImageMember($placeId);
    if ($updatedPlace == false) {
        throw new \Exception('Impossible de modifier le lieu de réception !');
    } 
    else {
        header('Location: index.php?action=place&id=' . $placeId);
    }
}

function updateWeddingplannerMember($pseudo, $specialty, $presentation, $website, $tel, $mail, $weddingplannerId)
{  
    $memberManager = new MemberManager();
    
    $updatedWeddingplanner = $memberManager->modifyWeddingplannerMember($pseudo, $specialty, $presentation, $website, $tel, $mail, $weddingplannerId);
    $weddingplannerImage = $memberManager->weddingplannerImageMember($weddingplannerId);
    
    if ($updatedWeddingplanner == false) {
        throw new \Exception('Impossible de modifier le wedding-planner !');
    } 
    else {
        header('Location: index.php?action=weddingplanner&id=' . $weddingplannerId);
    }
}

function updateHelperMember($pseudo, $content, $website, $tel, $mail, $helperType, $helperId)
{  
    $memberManager = new MemberManager();
    
    $updatedHelper = $memberManager->modifyHelperMember($pseudo, $content, $website, $tel, $mail, $helperType, $helperId);
    $helperImage = $memberManager->helperImageMember($helperId);
    if ($updatedHelper == false) {
        throw new \Exception('Impossible de modifier le prestataire !');
    } 
    else {
        header('Location: index.php?action=helper&id=' . $helperId);
    }
}


function newPlaceMember($title, $city, $positionx, $positiony, $region, $website, $tel, $mail, $presentation, $authorId)
{
    $memberManager = new MemberManager();
    $placeCreated = $memberManager->createPlaceMember($title, $city, $positionx, $positiony, $region, $website, $tel, $mail, $presentation, $authorId);
    $placeImage = $memberManager->placeImageMember($placeCreated);
    if ($placeCreated === false) {
        throw new \Exception('Impossible d\'ajouter le lieu de réception !');
    } 
    else {
        header('Location: index.php?action=place&id=' . $placeCreated);
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
         header('Location: index.php?action=weddingplanner&id=' . $weddingplannerCreated);
    }
}

function newHelperMember($pseudo, $content, $website, $tel, $mail, $helperType, $authorId)
{
    $memberManager = new MemberManager();
    $helperCreated = $memberManager->createHelperMember($pseudo, $content, $website, $tel, $mail, $helperType, $authorId);
    $helperImage = $memberManager->helperImageMember($helperCreated);
    if ($helperCreated === false) {
        throw new \Exception('Impossible d\'ajouter le prestataire !');
    } 
    else {
        header('Location: index.php?action=helper&id=' . $helperCreated);
    }
}
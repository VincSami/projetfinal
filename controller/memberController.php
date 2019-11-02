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

function userProfil($authorId)
{
    $placeManager = new PlaceManager();
    $weddingplannerManager = new WeddingplannerManager();
    $helperManager = new HelperManager();
    
    $memberPlaces = $placeManager->getMemberPlaces($authorId);
    $memberWeddingplanners = $weddingplannerManager->getMemberWeddingplanners($authorId);
    $memberHelpers = $helperManager->getMemberHelpers($authorId);

    require('view/user/managerMemberView.php');
    var_dump($memberHelpers);
}

function placesMember()
{
    $placeManager = new PlaceManager();
    $places = $placeManager->getPlaces();
    require('view/user/placesMemberView.php');
}

function placeMember($placeId)
{
    $placeManager = new PlaceManager();
    $place = $placeManager->getPlace($_GET['id']);
    require('view/user/placeMemberView.php');
}

function weddingPlannersMember()
{
    $weddingplannerManager = new WeddingplannerManager();
    $weddingplanners = $weddingplannerManager->getWeddingplanners();
    require('view/user/weddingplannersMemberView.php');
}

function weddingPlannerMember($weddingplannerId)
{
    $weddingplannerManager = new WeddingplannerManager();
    $weddingplanner = $weddingplannerManager->getWeddingplanner($_GET['id']);
    require('view/user/weddingplannerMemberView.php');
}

function helpersTypeMember($typeId)
{
    $helperManager = new HelperManager();
    $helpersType = $helperManager->getHelpersType($_GET['id']);
    require('view/user/helpersTypeMemberView.php');
}

function helpersMember()
{
    $helperManager = new HelperManager();
    $helpers = $helperManager->getHelpers();
    require('view/user/helpersMemberView.php');
}

function helperMember($helperId)
{
    $helperManager = new HelperManager();
    $helper = $helperManager->getHelper($_GET['id']);
    require('view/user/helperMemberView.php');
}








function deletePlacePageMember()
{ 
    $placeManager = new PlaceManager();

    $place = $placeManager->getPlace($_GET['id']);
    require('view/user/deletePlaceMemberView.php');
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
    require('view/user/deleteHelperMemberView.php');
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
    require('view/user/updatePlaceMemberView.php');
}

function updateWeddingplannerPageMember()
{ 
    $weddingplannerManager = new WeddingplannerManager();

    $weddingplanner = $weddingplannerManager->getWeddingplanner($_GET['id']);
    require('view/user/updateWeddingplannerMemberView.php');
}

function updateHelperPageMember()
{ 
    $helperManager = new HelperManager();

    $helper = $helperManager->getHelper($_GET['id']);
    require('view/user/updateHelperMemberView.php');
}

//Modification du billet
function updatePlaceMember($placeId, $title, $city, $positionx, $positiony, $region, $website, $tel, $mail, $presentation)
{  
    $memberManager = new MemberManager();
    
    $updatedPlace = $memberManager->modifyPlace($placeId, $title, $city, $positionx, $positiony, $region, $website, $tel, $mail, $presentation);
    $placeImage = $memberManager->placeImage($placeId);
    
    if ($updatedPlace === false) {
        throw new Exception('Impossible de modifier le lieu de réception !');
    } 
    else {
        header('Location: index.php?action=place&id=' . $placeId);
    }
}

function updateWeddingplannerMember($weddingplannerId, $pseudo, $specialty, $presentation, $website, $tel, $mail)
{  
    $memberManager = new MemberManager();
    
    $updatedWeddingplanner = $memberManager->modifyWeddingplanner($weddingplannerId, $pseudo, $specialty, $presentation, $website, $tel, $mail);
    $weddingplannerImage = $memberManager->weddingplannerImage($weddingplannerId);
    
    if ($updatedWeddingplanner === false) {
        throw new Exception('Impossible de modifier le wedding-planner !');
    } 
    else {
        header('Location: index.php?action=weddingplanner&id=' . $weddingplannerId);
    }
}

function updateHelperMember($helperId, $pseudo, $presentation, $website, $tel, $mail, $id_type)
{  
    $memberManager = new MemberManager();
    
    $updatedHelper = $memberManager->modifyHelper($helperId, $pseudo, $presentation, $website, $tel, $mail, $id_type);
    $helperImage = $memberManager->helperImage($helperId);
    
    if ($updatedHelper === false) {
        throw new Exception('Impossible de modifier le prestataire !');
    } 
    else {
        header('Location: index.php?action=helper&id=' . $helperId);
    }
}


function newPlaceMember($title, $city, $positionx, $positiony, $region, $website, $tel, $mail, $presentation, $authorId)
{
    $memberManager = new memberManager();
    $placeCreated = $memberManager->createPlace($title, $city, $positionx, $positiony, $region, $website, $tel, $mail, $presentation, $authorId);
    $placeImage = $memberManager->placeImage($placeCreated);
    if ($placeCreated === false) {
        throw new Exception('Impossible d\'ajouter le lieu de réception !');
    } 
    else {
        header('Location: index.php');
    }
}

function newWeddingplannerMember($pseudo, $specialty, $presentation, $website, $tel, $mail, $authorId)
{
    $memberManager = new memberManager();
    $weddingplannerCreated = $memberManager->createWeddingplanner($pseudo, $specialty, $presentation, $website, $tel, $mail, $authorId);
    $weddingplannerImage = $memberManager->weddingplannerImage($weddingplannerCreated);
    if ($weddingplannerCreated === false) {
        throw new Exception('Impossible d\'ajouter le wedding-planner !');
    } 
    else {
        header('Location: index.php');
    }
}

function newHelperMember($pseudo, $presentation, $website, $tel, $mail, $id_type, $authorId)
{
    $memberManager = new memberManager();
    $helperCreated = $memberManager->createHelper($pseudo, $presentation, $website, $tel, $mail, $id_type, $authorId);
    $helperImage = $memberManager->helperImage($helperCreated);
    if ($helperCreated === false) {
        throw new Exception('Impossible d\'ajouter le prestataire !');
    } 
    else {
        header('Location: index.php');
    }
}
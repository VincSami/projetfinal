<?php

require('controller/memberController.php');


function memberRouter()
{
    if (isset($_GET['action'])) {                 
        if ($_GET['action'] == 'homeMember') {
            homeMember();
        }
        elseif ($_GET['action'] == 'placesMember') {
            placesMember();
        }
        elseif ($_GET['action'] == 'placesByTypeMember') {
            if(isset($_GET['type_id']) && $_GET['type_id'] > 0){
            placesByTypeMember($_GET['id']);
            }
        }
        elseif ($_GET['action'] == 'placeMember') {
            if(isset($_GET['id']) && $_GET['id'] > 0){
            placeMember($_GET['id']);
            }
        }
        elseif ($_GET['action'] == 'weddingplannersMember') {
            weddingPlannersMember();
        }        
        elseif ($_GET['action'] == 'weddingplannerMember') {
            weddingPlannerMember($_GET['id']);
        }
        elseif ($_GET['action'] == 'helpersMember') {
            helpersMember();
        }
        elseif ($_GET['action'] == 'helpersTypeMember') {
            helpersTypeMember($_GET['id']);
        }              
        elseif ($_GET['action'] == 'helperMember') {
            helperMember($_GET['id']);
        }
        elseif ($_GET['action'] == 'disconnect') {
            session_destroy();
            header('Location:index.php');
        }
        elseif ($_GET['action'] == 'profil') {
            userProfil($_GET['author']);
        }
        elseif ($_GET['action'] == 'creationMemberPage') {
            if ($_POST['userType'] == 2){
                require('view/user/createPlaceMemberView.php');
            }
            elseif ($_POST['userType'] == 9){
                require('view/user/createWeddingplannerMemberView.php');
            }
            else {
                require('view/user/createHelperMemberView.php');
            }
        }
        elseif ($_GET['action'] == 'createPlaceMember') {
            if (!empty($_POST['title']) && !empty($_POST['city']) && !empty($_POST['positionx']) && !empty($_POST['positiony']) && !empty($_POST['region']) && !empty($_POST['tel']) && !empty($_POST['mail']) && !empty($_POST['presentation'])){
            newPlaceMember($_POST['title'], $_POST['city'], $_POST['positionx'], $_POST['positiony'], $_POST['region'], $_POST['website'], $_POST['tel'], $_POST['mail'], $_POST['presentation'], $_GET['authorId']);
            } else {
                throw new Exception('tous les champs ne sont pas remplis !');
            }
        }
        elseif ($_GET['action'] == 'createWeddinplannerMember') {
            if (!empty($_POST['pseudo']) && !empty($_POST['specialty']) && !empty($_POST['presentation']) && !empty($_POST['website']) && !empty($_POST['tel']) && !empty($_POST['mail'])) {
            newWeddingplannerMember($_POST['pseudo'], $_POST['specialty'], $_POST['presentation'], $_POST['website'], $_POST['tel'], $_POST['mail'], $_GET['authorId']);
            } else {
                throw new Exception('tous les champs ne sont pas remplis !');
            }
        }
        elseif ($_GET['action'] == 'createHelperMember') {
            if (!empty($_POST['pseudo']) && !empty($_POST['presentation']) && !empty($_POST['tel']) && !empty($_POST['mail'])) {
                updateHelperMember($_POST['pseudo'], $_POST['presentation'], $_POST['website'], $_POST['tel'], $_POST['mail'], $_GET['authorId']);
            } else {
                throw new Exception('tous les champs ne sont pas remplis !');
            }
        }
        elseif ($_GET['action'] == 'mentions'){
            require ('view/mentions_legales.php');
        }
    }
    else{
        homeMember();
    }
}
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
         
        
        elseif ($_GET['action'] == 'profil') {
            userProfil($_GET['authorId']);
        }
        elseif ($_GET['action'] == 'creationMemberPage') {
            if ($_POST['memberType'] == 2){
                require('view/member/createPlaceMemberView.php');
            }
            elseif ($_POST['memberType'] == 9){
                require('view/member/createWeddingplannerMemberView.php');
            }
            else {
                require('view/member/createHelperMemberView.php');
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


        elseif ($_GET['action'] == 'updatePlacePageMember') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                updatePlacePageMember();
            }  
            else {
                throw new Exception("aucun identifiant de billet envoyé");
            }
        }
        elseif ($_GET['action'] == 'updateWeddingplannerPageMember') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                updateWeddingplannerPageMember();
            }  
            else {
                throw new Exception("aucun identifiant de billet envoyé");
            }
        }
        elseif ($_GET['action'] == 'updateHelperPageMember') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                updateHelperPageMember();
            }  
            else {
                throw new Exception("aucun identifiant de billet envoyé");
            }
        }
        elseif ($_GET['action'] == 'updatePlaceMember') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['title']) && !empty($_POST['city']) && !empty($_POST['positionx']) && !empty($_POST['positiony']) && !empty($_POST['region']) && !empty($_POST['website']) && !empty($_POST['tel']) && !empty($_POST['mail']) && !empty($_POST['presentation'])) {
                updatePlaceMember($_GET['id'], $_POST['title'], $_POST['city'], $_POST['positionx'], $_POST['positiony'], $_POST['region'], $_POST['website'], $_POST['tel'], $_POST['mail'], $_POST['presentation']);
                } else {
                    throw new Exception('tous les champs ne sont pas remplis !');
                }
            }  
            else {
                throw new Exception("aucun identifiant de billet envoyé");
            }
        }
        elseif ($_GET['action'] == 'updateWeddingplannerMember') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['pseudo']) && !empty($_POST['specialty']) && !empty($_POST['presentation']) && !empty($_POST['website']) && !empty($_POST['tel']) && !empty($_POST['mail'])) {
                updateWeddingplannerMember($_GET['id'], $_POST['pseudo'], $_POST['specialty'], $_POST['presentation'], $_POST['website'], $_POST['tel'], $_POST['mail']);
                } else {
                    throw new Exception('tous les champs ne sont pas remplis !');
                }
            }  
            else {
                throw new Exception("aucun identifiant de billet envoyé");
            }
        }
        elseif ($_GET['action'] == 'updateHelperMember') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['pseudo']) && !empty($_POST['presentation']) && !empty($_POST['helperType']) && !empty($_POST['website']) && !empty($_POST['tel']) && !empty($_POST['mail'])) {
                updateHelperMember($_GET['id'], $_POST['pseudo'], $_POST['helperType'], $_POST['presentation'], $_POST['website'], $_POST['tel'], $_POST['mail']);
                } else {
                    throw new Exception('tous les champs ne sont pas remplis !');
                }
            }  
            else {
                throw new Exception("aucun identifiant de billet envoyé");
            }
        }



        elseif ($_GET['action'] == 'deletePlacePageMember') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                deletePlacePageMember();
            }  
            else {
                throw new Exception("aucun identifiant de lieu de réception envoyé");
            }
        }
        elseif ($_GET['action'] == 'deleteWeddingplannerPageMember') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                deleteWeddingplannerPageMember();
            }  
            else {
                throw new Exception("aucun identifiant de Wedding-Planner envoyé");
            }
        }
        elseif ($_GET['action'] == 'deleteHelperPageMember') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                deleteHelperPageMember();
            }  
            else {
                throw new Exception("aucun identifiant de prestataire envoyé");
            }
        }
        elseif ($_GET['action'] == 'deletePlaceMember') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {  
                erasePlaceMember($_GET['id']);
            }
        }
        elseif ($_GET['action'] == 'deleteWeddingplannerMember') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {  
                eraseWeddingplannerMember($_GET['id']);
            }
        }
        elseif ($_GET['action'] == 'deleteHelperMember') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {  
                eraseHelperMember($_GET['id']);
            }
        }


        elseif ($_GET['action'] == 'mentions'){
            require ('view/mentions_legales.php');
        }
        elseif ($_GET['action'] == 'disconnect') {
            session_destroy();
            header('Location:index.php');
        }
    }
    else{
        homeMember();
    }
}
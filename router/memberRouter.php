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
                $_GET['id'] = intval($_GET['id']);
                placeMember($_GET['id']);
            } else {
                throw new Exception('Le lieu de réception n\'existe pas !');
            }
        }
        elseif ($_GET['action'] == 'weddingplannersMember') {
            weddingPlannersMember();
        }        
        elseif ($_GET['action'] == 'weddingplannerMember') {
            if(isset($_GET['id']) && $_GET['id'] > 0){
                $_GET['id'] = intval($_GET['id']);
                weddingPlannerMember($_GET['id']);
            } else {
                throw new Exception('Le Wedding-Planner n\'existe pas !');
            }
        }
        elseif ($_GET['action'] == 'helpersMember') {
            if(isset($_GET['pageId']) && $_GET['pageId'] > 0) {
                helpersMember($_GET['pageId']);
            } else {
                helpersMember(1);
            }
        }
        elseif ($_GET['action'] == 'helpersTypeMember') {
            if(isset($_GET['id']) && $_GET['id'] > 0){
                $_GET['id'] = intval($_GET['id']);
                helpersTypeMember($_GET['id']);
            } else {
                throw new Exception('Le type de prestataire demandé n\'existe pas !');
            }
        }              
        elseif ($_GET['action'] == 'helperMember') {
            if(isset($_GET['id']) && $_GET['id'] > 0){
                $_GET['id'] = intval($_GET['id']);
                helperMember($_GET['id']);
            } else {
                throw new Exception('Le prestataire n\'existe pas !');
            }
        }
        elseif ($_GET['action'] == 'profil') {
            if(isset($_GET['authorId']) && $_GET['authorId'] > 0){
                $_GET['authorId'] = intval($_GET['authorId']);
                userProfil($_GET['authorId']);
            } else {
                throw new Exception('Impossible d\'accéder au profil !');
            }
        }
        elseif ($_GET['action'] == 'creationMemberPage') {
            if ($_POST['memberType'] == 1){
                $_POST['memberType'] = intval($_POST['memberType']);
                require('view/member/createPlaceMemberView.php');
            }
            elseif ($_POST['memberType'] == 2){
                require('view/member/createWeddingplannerMemberView.php');
            }
            else {
                require('view/member/createHelperMemberView.php');
            }
        }
        elseif ($_GET['action'] == 'createPlaceMember') {
            if (!empty($_POST['title']) && !empty($_POST['city']) && !empty($_POST['positionx']) && !empty($_POST['positiony']) && !empty($_POST['region']) && !empty($_POST['tel']) && !empty($_POST['mail']) && !empty($_POST['presentation']) && !empty($_GET['authorId'])){
                $_GET['authorId'] = intval($_GET['authorId']);
                newPlaceMember(htmlspecialchars($_POST['title']), htmlspecialchars($_POST['city']), htmlspecialchars($_POST['positionx']), htmlspecialchars($_POST['positiony']), htmlspecialchars($_POST['region']), htmlspecialchars($_POST['website']), htmlspecialchars($_POST['tel']), htmlspecialchars($_POST['mail']), htmlspecialchars($_POST['presentation']), $_GET['authorId']);
            } else {
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
        }
        elseif ($_GET['action'] == 'createWeddingplannerMember') {
            if (!empty($_POST['pseudo']) && !empty($_POST['specialty']) && !empty($_POST['presentation']) && !empty($_POST['tel']) && !empty($_POST['mail']) && !empty($_GET['authorId'])) {
                $_GET['authorId'] = intval($_GET['authorId']);
                newWeddingplannerMember(htmlspecialchars($_POST['pseudo']), htmlspecialchars($_POST['specialty']), htmlspecialchars($_POST['presentation']), htmlspecialchars($_POST['website']), htmlspecialchars($_POST['tel']), htmlspecialchars($_POST['mail']), $_GET['authorId']);
            } else {
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
        }
        elseif ($_GET['action'] == 'createHelperMember') {
            if (!empty($_POST['pseudo']) && !empty($_POST['content']) && !empty($_POST['tel']) && !empty($_POST['mail']) && !empty($_POST['helperType']) && !empty($_GET['authorId'])) {
                $_GET['authorId'] = intval($_GET['authorId']);
                newHelperMember(htmlspecialchars($_POST['pseudo']), htmlspecialchars($_POST['content']), htmlspecialchars($_POST['website']), htmlspecialchars($_POST['tel']), htmlspecialchars($_POST['mail']), htmlspecialchars($_POST['helperType']), $_GET['authorId']);
            } else {
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
        }
        elseif ($_GET['action'] == 'updatePlacePageMember') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $_GET['id'] = intval($_GET['id']);
                updatePlacePageMember();
            }  
            else {
                throw new Exception("Aucun identifiant de lieu envoyé");
            }
        }
        elseif ($_GET['action'] == 'updateWeddingplannerPageMember') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $_GET['id'] = intval($_GET['id']);
                updateWeddingplannerPageMember();
            }  
            else {
                throw new Exception("aucun identifiant de wedding-planner envoyé");
            }
        }
        elseif ($_GET['action'] == 'updateHelperPageMember') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $_GET['id'] = intval($_GET['id']);
                updateHelperPageMember();
            }  
            else {
                throw new Exception("aucun identifiant de prestataire envoyé");
            }
        }
        elseif ($_GET['action'] == 'updatePlaceMember') {
            if (isset($_GET['placeId']) && $_GET['placeId'] > 0) {
                $_GET['placeId'] = intval($_GET['placeId']);
                if (!empty($_POST['title']) && !empty($_POST['city']) && !empty($_POST['positionx']) && !empty($_POST['positiony']) && !empty($_POST['region']) && !empty($_POST['tel']) && !empty($_POST['mail']) && !empty($_POST['presentation'])) {
                    updatePlaceMember(htmlspecialchars($_POST['title']), htmlspecialchars($_POST['city']), htmlspecialchars($_POST['positionx']), htmlspecialchars($_POST['positiony']), htmlspecialchars($_POST['region']), htmlspecialchars($_POST['website']), htmlspecialchars($_POST['tel']), htmlspecialchars($_POST['mail']), htmlspecialchars($_POST['presentation']), $_GET['placeId']);
                } else {
                    throw new Exception('tous les champs ne sont pas remplis !');
                }
            }  
            else {
                throw new Exception("aucun identifiant de billet envoyé");
            }
        }
        elseif ($_GET['action'] == 'updateWeddingplannerMember') {
            if (isset($_GET['weddingplannerId']) && $_GET['weddingplannerId'] > 0) {
                $_GET['weddingplannerId'] = intval($_GET['weddingplannerId']);
                if (!empty($_POST['pseudo']) && !empty($_POST['specialty']) && !empty($_POST['presentation']) && !empty($_POST['tel']) && !empty($_POST['mail'])) {
                updateWeddingplannerMember(htmlspecialchars($_POST['pseudo']), htmlspecialchars($_POST['specialty']), htmlspecialchars($_POST['presentation']), htmlspecialchars($_POST['website']), htmlspecialchars($_POST['tel']), htmlspecialchars($_POST['mail']), $_GET['weddingplannerId']);
                } else {
                    throw new Exception('tous les champs ne sont pas remplis !');
                }
            }  
            else {
                throw new Exception("aucun identifiant de billet envoyé");
            }
        }
        elseif ($_GET['action'] == 'updateHelperMember') {
            if (isset($_GET['helperId']) && $_GET['helperId'] > 0) {
                $_GET['helperId'] = intval($_GET['helperId']);
                if (!empty($_POST['pseudo']) && !empty($_POST['content']) && !empty($_POST['tel']) && !empty($_POST['mail']) && !empty($_POST['helperType'])) {
                updateHelperMember(htmlspecialchars($_POST['pseudo']), htmlspecialchars($_POST['content']), htmlspecialchars($_POST['website']), htmlspecialchars($_POST['tel']), htmlspecialchars($_POST['mail']), htmlspecialchars($_POST['helperType']), $_GET['helperId']);
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
                $_GET['id'] = intval($_GET['id']);
                deletePlacePageMember();
            }  
            else {
                throw new Exception("Aucun identifiant de lieu de réception envoyé");
            }
        }
        elseif ($_GET['action'] == 'deleteWeddingplannerPageMember') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $_GET['id'] = intval($_GET['id']);
                deleteWeddingplannerPageMember();
            }  
            else {
                throw new Exception("Aucun identifiant de Wedding-Planner envoyé");
            }
        }
        elseif ($_GET['action'] == 'deleteHelperPageMember') {
            $_GET['id'] = intval($_GET['id']);
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                deleteHelperPageMember();
            }  
            else {
                throw new Exception("Aucun identifiant de prestataire envoyé");
            }
        }
        elseif ($_GET['action'] == 'deletePlaceMember') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $_GET['id'] = intval($_GET['id']);  
                erasePlaceMember($_GET['id']);
            }
            else {
                throw new Exception("Aucun identifiant de lieu de réception envoyé");
            }
        }
        elseif ($_GET['action'] == 'deleteWeddingplannerMember') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $_GET['id'] = intval($_GET['id']); 
                eraseWeddingplannerMember($_GET['id']);
            } else {
                throw new Exception("Aucun identifiant de Wedding-Planner envoyé");
            }
        }
        elseif ($_GET['action'] == 'deleteHelperMember') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {  
                $_GET['id'] = intval($_GET['id']);
                eraseHelperMember($_GET['id']);
            } else {
                 throw new Exception("Aucun identifiant de prestataire envoyé");
            }
        }
        elseif ($_GET['action'] == 'mentions'){
            require ('view/mentions_legales.php');
        }
        elseif ($_GET['action'] == 'disconnect') {
            session_destroy();
            header('Location:index.php');
        }
        elseif ($_GET['action'] == 'getPlacesCoords') {
            getPlacesCoordsMember();
        }
    }
    else{
        homeMember();
    }
}
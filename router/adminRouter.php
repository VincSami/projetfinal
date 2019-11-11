<?php

require('controller/adminController.php');


function adminRouter()
{
    if (isset($_GET['action'])) {                 
        if ($_GET['action'] == 'homeAdmin') {
            homeAdmin();
        }
        elseif ($_GET['action'] == 'placesAdmin') {
            placesAdmin();
        }
        elseif ($_GET['action'] == 'placeAdmin') {
            if(isset($_GET['id']) && $_GET['id'] > 0){
                $_GET['id'] = intval($_GET['id']);
                placeAdmin($_GET['id']);
            } else {
                throw new Exception('Le lieu de réception n\'existe pas !');
            }
        }
        elseif ($_GET['action'] == 'weddingplannersAdmin') {
            weddingPlannersAdmin();
        }        
        elseif ($_GET['action'] == 'weddingplannerAdmin') {
            if(isset($_GET['id']) && $_GET['id'] > 0){
                $_GET['id'] = intval($_GET['id']);
                weddingPlannerAdmin($_GET['id']);
            } else {
                throw new Exception('Le lieu de réception n\'existe pas !');
            }
        }
        elseif ($_GET['action'] == 'helpersAdmin') {
            helpersAdmin();
        }
        elseif ($_GET['action'] == 'helpersTypeAdmin') {
            if(isset($_GET['id']) && $_GET['id'] > 0){
                $_GET['id'] = intval($_GET['id']);
                helpersTypeAdmin($_GET['id']);
            } else {
                throw new Exception('Le lieu de réception n\'existe pas !');
            }
        }              
        elseif ($_GET['action'] == 'helperAdmin') {
            if(isset($_GET['id']) && $_GET['id'] > 0){
                $_GET['id'] = intval($_GET['id']);
                helperAdmin($_GET['id']);
            } else {
                throw new Exception('Le lieu de réception n\'existe pas !');
            }
        }
        elseif ($_GET['action'] == 'creationAdminPage') {
            if(!empty($_POST['serviceType'])) {
                $_POST['serviceType'] = intval($_POST['serviceType']);
                if ($_POST['serviceType'] == 1){
                    require('view/admin/createPlaceAdminView.php');
                }
                elseif ($_POST['serviceType'] == 2){
                    require('view/admin/createWeddingplannerAdminView.php');
                }
                else {
                    require('view/admin/createHelperAdminView.php');
                }
            }
        }
        elseif ($_GET['action'] == 'createPlaceAdmin') {
            if (!empty($_POST['title']) && !empty($_POST['city']) && !empty($_POST['positionx']) && !empty($_POST['positiony']) && !empty($_POST['region']) && !empty($_POST['tel']) && !empty($_POST['mail']) && !empty($_POST['presentation']) && isset($_GET['authorId'])){
                $_GET['authorId'] = intval($_GET['authorId']);
                newPlaceAdmin(htmlspecialchars($_POST['title']), htmlspecialchars($_POST['city']), htmlspecialchars($_POST['positionx']), htmlspecialchars($_POST['positiony']), htmlspecialchars($_POST['region']), htmlspecialchars($_POST['website']), htmlspecialchars($_POST['tel']), htmlspecialchars($_POST['mail']), htmlspecialchars($_POST['presentation']), $_GET['authorId']);
            } else {
                throw new Exception('tous les champs ne sont pas remplis !');
            }
        }
        elseif ($_GET['action'] == 'createWeddingplannerAdmin') {
            if (!empty($_POST['pseudo']) && !empty($_POST['specialty']) && !empty($_POST['presentation']) && !empty($_POST['tel']) && !empty($_POST['mail']) && isset($_GET['authorId'])) {
                $_GET['authorId'] = intval($_GET['authorId']);
                newWeddingplannerAdmin(htmlspecialchars($_POST['pseudo']), htmlspecialchars($_POST['specialty']), htmlspecialchars($_POST['presentation']), htmlspecialchars($_POST['website']), htmlspecialchars($_POST['tel']), htmlspecialchars($_POST['mail']), ($_GET['authorId']));
            } else {
                throw new Exception('tous les champs ne sont pas remplis !');
            }
        }
        elseif ($_GET['action'] == 'createHelperAdmin') {
            if (!empty($_POST['pseudo']) && !empty($_POST['content']) && !empty($_POST['tel']) && !empty($_POST['mail']) && !empty($_POST['helperType']) && isset($_GET['authorId'])) {
                $_GET['authorId'] = intval($_GET['authorId']);
                newHelperAdmin(htmlspecialchars($_POST['pseudo']), htmlspecialchars($_POST['content']), htmlspecialchars($_POST['website']), htmlspecialchars($_POST['tel']), htmlspecialchars($_POST['mail']), htmlspecialchars($_POST['helperType']), $_GET['authorId']);
            } else {
                throw new Exception('tous les champs ne sont pas remplis !');
            }
        }
        elseif ($_GET['action'] == 'updatePlacePageAdmin') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $_GET['id'] = intval($_GET['id']);
                updatePlacePageAdmin();
            }  
            else {
                throw new Exception("aucun identifiant de lieu de réception envoyé");
            }
        }
        elseif ($_GET['action'] == 'updateWeddingplannerPageAdmin') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $_GET['id'] = intval($_GET['id']);
                updateWeddingplannerPageAdmin();
            }  
            else {
                throw new Exception("aucun identifiant de Wedding-Planner envoyé");
            }
        }
        elseif ($_GET['action'] == 'updateHelperPageAdmin') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $_GET['id'] = intval($_GET['id']);
                updateHelperPageAdmin();
            }  
            else {
                throw new Exception("aucun identifiant de prestataire envoyé");
            }
        }
        elseif ($_GET['action'] == 'updatePlaceAdmin') {
            if (isset($_GET['placeId']) && $_GET['placeId'] > 0) {
                $_GET['placeId'] = intval($_GET['placeId']);
                if (!empty($_POST['title']) && !empty($_POST['city']) && !empty($_POST['positionx']) && !empty($_POST['positiony']) && !empty($_POST['region']) && !empty($_POST['tel']) && !empty($_POST['mail']) && !empty($_POST['presentation'])) {
                updatePlaceAdmin(htmlspecialchars($_POST['title']), htmlspecialchars($_POST['city']), htmlspecialchars($_POST['positionx']), htmlspecialchars($_POST['positiony']), htmlspecialchars($_POST['region']), htmlspecialchars($_POST['website']), htmlspecialchars($_POST['tel']), htmlspecialchars($_POST['mail']), htmlspecialchars($_POST['presentation']), $_GET['placeId']);
                } else {
                    throw new Exception('tous les champs ne sont pas remplis !');
                }
            }  
            else {
                throw new Exception("aucun identifiant de lieu de réception envoyé");
            }
        }
        elseif ($_GET['action'] == 'updateWeddingplannerAdmin') {
            if (isset($_GET['weddingplannerId']) && $_GET['weddingplannerId'] > 0) {
                $_GET['weddingplannerId'] = intval($_GET['weddingplannerId']);
                if (!empty($_POST['pseudo']) && !empty($_POST['specialty']) && !empty($_POST['presentation']) && !empty($_POST['tel']) && !empty($_POST['mail'])) {
                updateWeddingplannerAdmin(htmlspecialchars($_POST['pseudo']), htmlspecialchars($_POST['specialty']), htmlspecialchars($_POST['presentation']), htmlspecialchars($_POST['website']), htmlspecialchars($_POST['tel']), htmlspecialchars($_POST['mail']), $_GET['weddingplannerId']);
                } else {
                    throw new Exception('tous les champs ne sont pas remplis !');
                }
            }  
            else {
                throw new Exception("aucun identifiant de Wedding-Planner envoyé");
            }
        }
        elseif ($_GET['action'] == 'updateHelperAdmin') {
            if (isset($_GET['helperId']) && $_GET['helperId'] > 0) {
                $_GET['helperId'] = intval($_GET['helperId']);
                if (!empty($_POST['pseudo']) && !empty($_POST['content']) && !empty($_POST['tel']) && !empty($_POST['mail']) && !empty($_POST['helperType'])) {
                updateHelperAdmin(htmlspecialchars($_POST['pseudo']), htmlspecialchars($_POST['content']), htmlspecialchars($_POST['website']), htmlspecialchars($_POST['tel']), htmlspecialchars($_POST['mail']), htmlspecialchars($_POST['helperType']), $_GET['helperId']);
                } else {
                    throw new Exception('tous les champs ne sont pas remplis !');
                }
            }  
            else {
                throw new Exception("aucun identifiant de prestataire envoyé");
            }
        }
        elseif ($_GET['action'] == 'deletePlacePageAdmin') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $_GET['id'] = intval($_GET['id']);
                deletePlacePageAdmin();
            }  
            else {
                throw new Exception("aucun identifiant de lieu de réception envoyé");
            }
        }
        elseif ($_GET['action'] == 'deleteWeddingplannerPageAdmin') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $_GET['id'] = intval($_GET['id']);
                deleteWeddingplannerPageAdmin();
            }  
            else {
                throw new Exception("aucun identifiant de Wedding-Planner envoyé");
            }
        }
        elseif ($_GET['action'] == 'deleteHelperPageAdmin') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $_GET['id'] = intval($_GET['id']);
                deleteHelperPageAdmin();
            }  
            else {
                throw new Exception("aucun identifiant de prestataire envoyé");
            }
        }
        elseif ($_GET['action'] == 'deletePlaceAdmin') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {  
                $_GET['id'] = intval($_GET['id']);

                erasePlaceAdmin($_GET['id']);
            } else {
                throw new Exception("aucun identifiant de lieu de réception envoyé");
            }
        }
        elseif ($_GET['action'] == 'deleteWeddingplannerAdmin') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {  
                $_GET['id'] = intval($_GET['id']);
                eraseWeddingplannerAdmin($_GET['id']);
            } else {
                throw new Exception("aucun identifiant de Wedding-Planner envoyé");
            }
        }
        elseif ($_GET['action'] == 'deleteHelperAdmin') {
            if (isset($_GET['id']) && $_GET['id'] > 0) { 
                $_GET['id'] = intval($_GET['id']); 
                eraseHelperAdmin($_GET['id']);
            } else {
                throw new Exception("aucun identifiant de prestataire envoyé");
            }
        }
        elseif ($_GET['action'] == 'disconnect') {
            session_destroy();
            header('Location:index.php');
        }
        elseif ($_GET['action'] == 'mentions'){
        require ('view/mentions_legales.php');
        }
        elseif ($_GET['action'] == 'getPlacesCoords') {
            getPlacesCoordsAdmin();
        }
    }
    else{
        homeAdmin();
    }
}
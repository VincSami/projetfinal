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
            placeAdmin($_GET['id']);
            }
        }
        elseif ($_GET['action'] == 'weddingplannersAdmin') {
            weddingPlannersAdmin();
        }        
        elseif ($_GET['action'] == 'weddingplannerAdmin') {
            weddingPlannerAdmin($_GET['id']);
        }
        elseif ($_GET['action'] == 'helpersAdmin') {
            helpersAdmin();
        }
        elseif ($_GET['action'] == 'helpersTypeAdmin') {
            helpersTypeAdmin($_GET['id']);
        }              
        elseif ($_GET['action'] == 'helperAdmin') {
            helperAdmin($_GET['id']);
        }
        elseif ($_GET['action'] == 'creationAdminPage') {
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
        elseif ($_GET['action'] == 'createPlaceAdmin') {
            if (!empty($_POST['title']) && !empty($_POST['city']) && !empty($_POST['positionx']) && !empty($_POST['positiony']) && !empty($_POST['region']) && !empty($_POST['tel']) && !empty($_POST['mail']) && !empty($_POST['presentation']) && !empty($_GET['authorId'])){
            newPlaceAdmin($_POST['title'], $_POST['city'], $_POST['positionx'], $_POST['positiony'], $_POST['region'], $_POST['website'], $_POST['tel'], $_POST['mail'], $_POST['presentation'], $_GET['authorId']);
            } else {
                throw new Exception('tous les champs ne sont pas remplis !');
            }
        }
        elseif ($_GET['action'] == 'createWeddingplannerAdmin') {
            if (!empty($_POST['pseudo']) && !empty($_POST['specialty']) && !empty($_POST['presentation']) && !empty($_POST['tel']) && !empty($_POST['mail']) && !empty($_GET['authorId'])) {
            newWeddingplannerAdmin($_POST['pseudo'], $_POST['specialty'], $_POST['presentation'], $_POST['website'], $_POST['tel'], $_POST['mail'], $_GET['authorId']);
            } else {
                throw new Exception('tous les champs ne sont pas remplis !');
            }
        }
        elseif ($_GET['action'] == 'createHelperAdmin') {
            if (!empty($_POST['pseudo']) && !empty($_POST['content']) && !empty($_POST['tel']) && !empty($_POST['mail']) && !empty($_POST['helperType']) && !empty($_GET['authorId'])) {
                newHelperAdmin($_POST['pseudo'], $_POST['content'], $_POST['website'], $_POST['tel'], $_POST['mail'], $_POST['helperType'], $_GET['authorId']);
            } else {
                throw new Exception('tous les champs ne sont pas remplis !');
            }
        }
        elseif ($_GET['action'] == 'updatePlacePageAdmin') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                updatePlacePageAdmin();
            }  
            else {
                throw new Exception("aucun identifiant de billet envoyé");
            }
        }
        elseif ($_GET['action'] == 'updateWeddingplannerPageAdmin') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                updateWeddingplannerPageAdmin();
            }  
            else {
                throw new Exception("aucun identifiant de billet envoyé");
            }
        }
        elseif ($_GET['action'] == 'updateHelperPageAdmin') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                updateHelperPageAdmin();
            }  
            else {
                throw new Exception("aucun identifiant de billet envoyé");
            }
        }
        elseif ($_GET['action'] == 'updatePlaceAdmin') {
            if (isset($_GET['placeId']) && $_GET['placeId'] > 0) {
                if (!empty($_POST['title']) && !empty($_POST['city']) && !empty($_POST['positionx']) && !empty($_POST['positiony']) && !empty($_POST['region']) && !empty($_POST['tel']) && !empty($_POST['mail']) && !empty($_POST['presentation'])) {
                updatePlaceAdmin($_POST['title'], $_POST['city'], $_POST['positionx'], $_POST['positiony'], $_POST['region'], $_POST['website'], $_POST['tel'], $_POST['mail'], $_POST['presentation'], $_GET['placeId']);
                } else {
                    throw new Exception('tous les champs ne sont pas remplis !');
                }
            }  
            else {
                throw new Exception("aucun identifiant de billet envoyé");
            }
        }
        elseif ($_GET['action'] == 'updateWeddingplannerAdmin') {
            if (isset($_GET['weddingplannerId']) && $_GET['weddingplannerId'] > 0) {
                if (!empty($_POST['pseudo']) && !empty($_POST['specialty']) && !empty($_POST['presentation']) && !empty($_POST['tel']) && !empty($_POST['mail'])) {
                updateWeddingplannerAdmin($_POST['pseudo'], $_POST['specialty'], $_POST['presentation'], $_POST['website'], $_POST['tel'], $_POST['mail'], $_GET['weddingplannerId']);
                } else {
                    throw new Exception('tous les champs ne sont pas remplis !');
                }
            }  
            else {
                throw new Exception("aucun identifiant de billet envoyé");
            }
        }
        elseif ($_GET['action'] == 'updateHelperAdmin') {
            if (isset($_GET['helperId']) && $_GET['helperId'] > 0) {
                if (!empty($_POST['pseudo']) && !empty($_POST['content']) && !empty($_POST['tel']) && !empty($_POST['mail']) && !empty($_POST['helperType'])) {
                updateHelperAdmin($_POST['pseudo'], $_POST['content'], $_POST['website'], $_POST['tel'], $_POST['mail'], $_POST['helperType'], $_GET['helperId']);
                } else {
                    throw new Exception('tous les champs ne sont pas remplis !');
                }
            }  
            else {
                throw new Exception("aucun identifiant de billet envoyé");
            }
        }
        elseif ($_GET['action'] == 'deletePlacePageAdmin') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                deletePlacePageAdmin();
            }  
            else {
                throw new Exception("aucun identifiant de lieu de réception envoyé");
            }
        }
        elseif ($_GET['action'] == 'deleteWeddingplannerPageAdmin') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                deleteWeddingplannerPageAdmin();
            }  
            else {
                throw new Exception("aucun identifiant de Wedding-Planner envoyé");
            }
        }
        elseif ($_GET['action'] == 'deleteHelperPageAdmin') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                deleteHelperPageAdmin();
            }  
            else {
                throw new Exception("aucun identifiant de prestataire envoyé");
            }
        }
        elseif ($_GET['action'] == 'deletePlaceAdmin') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {  
                erasePlaceAdmin($_GET['id']);
            }
        }
        elseif ($_GET['action'] == 'deleteWeddingplannerAdmin') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {  
                eraseWeddingplannerAdmin($_GET['id']);
            }
        }
        elseif ($_GET['action'] == 'deleteHelperAdmin') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {  
                eraseHelperAdmin($_GET['id']);
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
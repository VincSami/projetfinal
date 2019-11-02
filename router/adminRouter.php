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
        elseif ($_GET['action'] == 'placesByTypeAdmin') {
            if(isset($_GET['type_id']) && $_GET['type_id'] > 0){
            placesByTypeAdmin($_GET['id']);
            }
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
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['title']) && !empty($_POST['city']) && !empty($_POST['positionx']) && !empty($_POST['positiony']) && !empty($_POST['region']) && !empty($_POST['website']) && !empty($_POST['tel']) && !empty($_POST['mail']) && !empty($_POST['presentation'])) {
                updatePlaceAdmin($_GET['id'], $_POST['title'], $_POST['city'], $_POST['positionx'], $_POST['positiony'], $_POST['region'], $_POST['website'], $_POST['tel'], $_POST['mail'], $_POST['presentation']);
                } else {
                    throw new Exception('tous les champs ne sont pas remplis !');
                }
            }  
            else {
                throw new Exception("aucun identifiant de billet envoyé");
            }
        }
        elseif ($_GET['action'] == 'updateWeddingplannerAdmin') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['pseudo']) && !empty($_POST['specialty']) && !empty($_POST['presentation']) && !empty($_POST['website']) && !empty($_POST['tel']) && !empty($_POST['mail'])) {
                updateWeddingplannerAdmin($_GET['id'], $_POST['pseudo'], $_POST['specialty'], $_POST['presentation'], $_POST['website'], $_POST['tel'], $_POST['mail']);
                } else {
                    throw new Exception('tous les champs ne sont pas remplis !');
                }
            }  
            else {
                throw new Exception("aucun identifiant de billet envoyé");
            }
        }
        elseif ($_GET['action'] == 'updateHelperAdmin') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['pseudo']) && !empty($_POST['presentation']) && !empty($_POST['website']) && !empty($_POST['tel']) && !empty($_POST['mail'])) {
                updateHelperAdmin($_GET['id'], $_POST['pseudo'], $_POST['presentation'], $_POST['website'], $_POST['tel'], $_POST['mail']);
                } else {
                    throw new Exception('tous les champs ne sont pas remplis !');
                }
            }  
            else {
                throw new Exception("aucun identifiant de billet envoyé");
            }
        }
        elseif ($_GET['action'] == 'creationAdminPageAdmin') {
            if ($_POST['userType'] == 2){
                require('view/user/createPlaceAdminView.php');
            }
            elseif ($_POST['userType'] == 9){
                require('view/user/createWeddingplannerAdminView.php');
            }
            else {
                require('view/user/createHelperAdminView.php');
            }
        }
        elseif ($_GET['action'] == 'createPlaceAdmin') {
            if (!empty($_POST['title']) && !empty($_POST['city']) && !empty($_POST['positionx']) && !empty($_POST['positiony']) && !empty($_POST['region']) && !empty($_POST['tel']) && !empty($_POST['mail']) && !empty($_POST['presentation'])){
            newPlaceAdmin($_POST['title'], $_POST['city'], $_POST['positionx'], $_POST['positiony'], $_POST['region'], $_POST['website'], $_POST['tel'], $_POST['mail'], $_POST['presentation'], $_GET['authorId']);
            } else {
                throw new Exception('tous les champs ne sont pas remplis !');
            }
        }
        elseif ($_GET['action'] == 'createWeddinplannerAdmin') {
            if (!empty($_POST['pseudo']) && !empty($_POST['specialty']) && !empty($_POST['presentation']) && !empty($_POST['website']) && !empty($_POST['tel']) && !empty($_POST['mail'])) {
            newWeddingplannerAdmin($_POST['pseudo'], $_POST['specialty'], $_POST['presentation'], $_POST['website'], $_POST['tel'], $_POST['mail'], $_GET['authorId']);
            } else {
                throw new Exception('tous les champs ne sont pas remplis !');
            }
        }
        elseif ($_GET['action'] == 'createHelperAdmin') {
            if (!empty($_POST['pseudo']) && !empty($_POST['presentation']) && !empty($_POST['tel']) && !empty($_POST['mail'])) {
                updateHelperAdmin($_POST['pseudo'], $_POST['presentation'], $_POST['website'], $_POST['tel'], $_POST['mail'], $_GET['authorId']);
            } else {
                throw new Exception('tous les champs ne sont pas remplis !');
            }
        }
        elseif ($_GET['action'] == 'disconnect') {
            session_destroy();
            header('Location:index.php');
        }
        elseif ($_GET['action'] == 'mentions'){
        require ('view/mentions_legales.php');
        }
    }
    else{
        homeAdmin();
    }
}
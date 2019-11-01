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
        elseif ($_GET['action'] == 'deletePlacePage') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                deletePlacePage();
            }  
            else {
                throw new Exception("aucun identifiant de lieu de réception envoyé");
            }
        }
        elseif ($_GET['action'] == 'deleteWeddingplannerPage') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                deleteWeddingplannerPageAdmin();
            }  
            else {
                throw new Exception("aucun identifiant de Wedding-Planner envoyé");
            }
        }
        elseif ($_GET['action'] == 'deleteHelperPage') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                deleteHelperPageAdmin();
            }  
            else {
                throw new Exception("aucun identifiant de prestataire envoyé");
            }
        }
        elseif ($_GET['action'] == 'deletePlace') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {  
                erasePlaceAdmin($_GET['id']);
            }
        }
        elseif ($_GET['action'] == 'deleteWeddingplanner') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {  
                eraseWeddingplannerAdmin($_GET['id']);
            }
        }
        elseif ($_GET['action'] == 'deleteHelper') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {  
                eraseHelperAdmin($_GET['id']);
            }
        }
        elseif ($_GET['action'] == 'updatePlacePage') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                updatePlacePageAdmin();
            }  
            else {
                throw new Exception("aucun identifiant de billet envoyé");
            }
        }
        elseif ($_GET['action'] == 'updateWeddingplannerPage') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                updateWeddingplannerPageAdmin();
            }  
            else {
                throw new Exception("aucun identifiant de billet envoyé");
            }
        }
        elseif ($_GET['action'] == 'updateHelperPage') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                updateHelperPageAdmin();
            }  
            else {
                throw new Exception("aucun identifiant de billet envoyé");
            }
        }
        elseif ($_GET['action'] == 'updatePlace') {
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
        elseif ($_GET['action'] == 'updateWeddingplanner') {
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
        elseif ($_GET['action'] == 'updateHelper') {
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
        elseif ($_GET['action'] == 'newPlace') {
            placeCreationPageAdmin();
        }
        elseif ($_GET['action'] == 'newWeddingplanner') {
            weddingplannerCreationPageAdmin();
        }
        elseif ($_GET['action'] == 'newHelper') {
            helperCreationPageAdmin();
        }
        elseif ($_GET['action'] == 'createPlace') {
            if (!empty($_POST['title']) && !empty($_POST['city']) && !empty($_POST['positionx']) && !empty($_POST['positiony']) && !empty($_POST['region']) && !empty($_POST['tel']) && !empty($_POST['mail']) && !empty($_POST['presentation'])){
            newPlaceAdmin($_POST['title'], $_POST['city'], $_POST['positionx'], $_POST['positiony'], $_POST['region'], $_POST['website'], $_POST['tel'], $_POST['mail'], $_POST['presentation']);
            } else {
                throw new Exception('tous les champs ne sont pas remplis !');
            }
        }
        elseif ($_GET['action'] == 'createWeddinplanner') {
            if (!empty($_POST['pseudo']) && !empty($_POST['specialty']) && !empty($_POST['presentation']) && !empty($_POST['website']) && !empty($_POST['tel']) && !empty($_POST['mail'])) {
            newWeddingplannerAdmin($_POST['pseudo'], $_POST['specialty'], $_POST['presentation'], $_POST['website'], $_POST['tel'], $_POST['mail']);
            } else {
                throw new Exception('tous les champs ne sont pas remplis !');
            }
        }
        elseif ($_GET['action'] == 'createHelper') {
            if (!empty($_POST['pseudo']) && !empty($_POST['presentation']) && !empty($_POST['tel']) && !empty($_POST['mail'])) {
                updateHelperAdmin($_POST['pseudo'], $_POST['presentation'], $_POST['website'], $_POST['tel'], $_POST['mail']);
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
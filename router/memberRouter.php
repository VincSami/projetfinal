<?php

require('controller/memberController.php');


function memberRouter()
{
    if (isset($_GET['action'])) {                 
        if ($_GET['action'] == 'profil') {
                userProfil();
        }
        elseif ($_GET['action'] == 'creationMemberPage') {
            if (intval($_POST['memberType'] == 1)){
                require('view/member/createPlaceMemberView.php');
            }
            elseif (intval($_POST['memberType'] == 2)){
                require('view/member/createWeddingplannerMemberView.php');
            }
            else {
                require('view/member/createHelperMemberView.php');
            }
        }
        elseif ($_GET['action'] == 'createPlaceMember') {
            if (!empty($_POST['title']) && !empty($_POST['city']) && !empty($_POST['positionx']) && !empty($_POST['positiony']) && !empty($_POST['region']) && !empty($_POST['tel']) && !empty($_POST['mail']) && !empty($_POST['presentation']) && !empty(intval($_GET['authorId']))){
                $_GET['authorId'] = intval($_GET['authorId']);
                newPlaceMember(htmlspecialchars($_POST['title']), htmlspecialchars($_POST['city']), htmlspecialchars($_POST['positionx']), htmlspecialchars($_POST['positiony']), htmlspecialchars($_POST['region']), htmlspecialchars($_POST['website']), htmlspecialchars($_POST['tel']), htmlspecialchars($_POST['mail']), htmlspecialchars($_POST['presentation']), $_GET['authorId']);
            } else {
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
        }
        elseif ($_GET['action'] == 'createWeddingplannerMember') {
            if (!empty($_POST['pseudo']) && !empty($_POST['specialty']) && !empty($_POST['presentation']) && !empty($_POST['tel']) && !empty($_POST['mail']) && !empty($_GET['authorId'])) {
                $_GET['authorId'] = intval($_GET['authorId']);
                newWeddingplannerMember(htmlspecialchars($_POST['pseudo']), htmlspecialchars($_POST['specialty']), htmlspecialchars($_POST['presentation']), htmlspecialchars($_POST['website']), htmlspecialchars($_POST['tel']), htmlspecialchars($_POST['mail']), intval($_GET['authorId']));
            } else {
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
        }
        elseif ($_GET['action'] == 'createHelperMember') {
            if (!empty($_POST['pseudo']) && !empty($_POST['content']) && !empty($_POST['tel']) && !empty($_POST['mail']) && !empty($_POST['helperType']) && !empty($_GET['authorId'])) {
                $_GET['authorId'] = intval($_GET['authorId']);
                newHelperMember(htmlspecialchars($_POST['pseudo']), htmlspecialchars($_POST['content']), htmlspecialchars($_POST['website']), htmlspecialchars($_POST['tel']), htmlspecialchars($_POST['mail']), htmlspecialchars($_POST['helperType']), intval(($_GET['authorId'])));
            } else {
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
        }
        elseif ($_GET['action'] == 'updatePlacePageMember') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                updatePlacePageMember(intval($_GET['id']));
            }  
            else {
                throw new Exception("Aucun identifiant de lieu envoyé");
            }
        }
        elseif ($_GET['action'] == 'updateWeddingplannerPageMember') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                updateWeddingplannerPageMember(intval($_GET['id']));
            }  
            else {
                throw new Exception("aucun identifiant de wedding-planner envoyé");
            }
        }
        elseif ($_GET['action'] == 'updateHelperPageMember') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                updateHelperPageMember(intval($_GET['id']));
            }  
            else {
                throw new Exception("aucun identifiant de prestataire envoyé");
            }
        }
        elseif ($_GET['action'] == 'updatePlaceMember') {
            if (isset($_GET['placeId']) && $_GET['placeId'] > 0) {
                if (!empty($_POST['title']) && !empty($_POST['city']) && !empty($_POST['positionx']) && !empty($_POST['positiony']) && !empty($_POST['region']) && !empty($_POST['tel']) && !empty($_POST['mail']) && !empty($_POST['presentation'])) {
                    updatePlaceMember(htmlspecialchars($_POST['title']), htmlspecialchars($_POST['city']), htmlspecialchars($_POST['positionx']), htmlspecialchars($_POST['positiony']), htmlspecialchars($_POST['region']), htmlspecialchars($_POST['website']), htmlspecialchars($_POST['tel']), htmlspecialchars($_POST['mail']), htmlspecialchars($_POST['presentation']), intval($_GET['placeId']));
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
                if (!empty($_POST['pseudo']) && !empty($_POST['specialty']) && !empty($_POST['presentation']) && !empty($_POST['tel']) && !empty($_POST['mail'])) {
                    updateWeddingplannerMember(htmlspecialchars($_POST['pseudo']), htmlspecialchars($_POST['specialty']), htmlspecialchars($_POST['presentation']), htmlspecialchars($_POST['website']), htmlspecialchars($_POST['tel']), htmlspecialchars($_POST['mail']), intval($_GET['weddingplannerId']));
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
                if (!empty($_POST['pseudo']) && !empty($_POST['content']) && !empty($_POST['tel']) && !empty($_POST['mail']) && !empty($_POST['helperType'])) {
                    updateHelperMember(htmlspecialchars($_POST['pseudo']), htmlspecialchars($_POST['content']), htmlspecialchars($_POST['website']), htmlspecialchars($_POST['tel']), htmlspecialchars($_POST['mail']), htmlspecialchars($_POST['helperType']), intval($_GET['helperId']));
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
                deletePlacePageMember(intval($_GET['id']));
            }  
            else {
                throw new Exception("Aucun identifiant de lieu de réception envoyé");
            }
        }
        elseif ($_GET['action'] == 'deleteWeddingplannerPageMember') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                deleteWeddingplannerPageMember(intval($_GET['id']));
            }  
            else {
                throw new Exception("Aucun identifiant de Wedding-Planner envoyé");
            }
        }
        elseif ($_GET['action'] == 'deleteHelperPageMember') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                deleteHelperPageMember(intval($_GET['id']));
            }  
            else {
                throw new Exception("Aucun identifiant de prestataire envoyé");
            }
        }
        elseif ($_GET['action'] == 'deletePlaceMember') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                erasePlaceMember(intval($_GET['id']));
            }
            else {
                throw new Exception("Aucun identifiant de lieu de réception envoyé");
            }
        }
        elseif ($_GET['action'] == 'deleteWeddingplannerMember') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                eraseWeddingplannerMember(intval($_GET['id']));
            } else {
                throw new Exception("Aucun identifiant de Wedding-Planner envoyé");
            }
        }
        elseif ($_GET['action'] == 'deleteHelperMember') {
            if (isset($_GET['id']) && $_GET['id'] > 0) { 
                eraseHelperMember(intval($_GET['id']));
            } else {
                 throw new Exception("Aucun identifiant de prestataire envoyé");
            }
        }
        elseif ($_GET['action'] == 'disconnect') {
            session_destroy();
            header('Location:index.php');
        }
    }
}
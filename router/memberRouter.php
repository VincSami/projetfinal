<?php

require('controller/memberController.php');


function memberRouter()
{
    //On vérifie si une action est bien demandée
    if (isset($_GET['action'])) {      
        //affichage de l'accueil           
        if ($_GET['action'] == 'profil') {
                userProfil();
        }
        //création d'un nouveau prestataire
        elseif ($_GET['action'] == 'creationMemberPage') {
            //on détermine quel type de prestatation est à ajouter
            //lieu de réception
            if (intval($_POST['memberType'] == 1)){
                require('view/member/createPlaceMemberView.php');
            }
            //wedding-planner
            elseif (intval($_POST['memberType'] == 2)){
                require('view/member/createWeddingplannerMemberView.php');
            }
            //autre prestataire
            else {
                require('view/member/createHelperMemberView.php');
            }
        }
        //création d'un lieu de réception
        elseif ($_GET['action'] == 'createPlaceMember') {
            //On vérifie que tous les champs sont remplis
            if (!empty($_POST['title']) && !empty($_POST['city']) && !empty($_POST['positionx']) && !empty($_POST['positiony']) && !empty($_POST['region']) && !empty($_POST['tel']) && !empty($_POST['mail']) && !empty($_POST['presentation']) && !empty(intval($_GET['authorId']))){
                //on récupère l'id de l'auteur en s'assurant que c'est un bien un nombre entier
                $_GET['authorId'] = intval($_GET['authorId']);
                //On appelle la fonction newPlaceAdmin en passant en paramètre les champs remplis en évitant les injections XSS en les entourant de la fonction htmlspecialchars et on passe également en paramètre l'id de l'auteur qui a créé le nouveau prestataire
                newPlaceMember(htmlspecialchars($_POST['title']), htmlspecialchars($_POST['city']), htmlspecialchars($_POST['positionx']), htmlspecialchars($_POST['positiony']), htmlspecialchars($_POST['region']), htmlspecialchars($_POST['website']), htmlspecialchars($_POST['tel']), htmlspecialchars($_POST['mail']), htmlspecialchars($_POST['presentation']), intval($_GET['authorId']));
            } else {
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
        }
        //création wedding-plnner
        elseif ($_GET['action'] == 'createWeddingplannerMember') {
            if (!empty($_POST['pseudo']) && !empty($_POST['specialty']) && !empty($_POST['presentation']) && !empty($_POST['tel']) && !empty($_POST['mail']) && !empty($_GET['authorId'])) {
                newWeddingplannerMember(htmlspecialchars($_POST['pseudo']), htmlspecialchars($_POST['specialty']), htmlspecialchars($_POST['presentation']), htmlspecialchars($_POST['website']), htmlspecialchars($_POST['tel']), htmlspecialchars($_POST['mail']), intval($_GET['authorId']));
            } else {
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
        }
        //création autre prestataire
        elseif ($_GET['action'] == 'createHelperMember') {
            if (!empty($_POST['pseudo']) && !empty($_POST['content']) && !empty($_POST['tel']) && !empty($_POST['mail']) && !empty($_POST['helperType']) && !empty($_GET['authorId'])) {
                $_GET['authorId'] = intval($_GET['authorId']);
                newHelperMember(htmlspecialchars($_POST['pseudo']), htmlspecialchars($_POST['content']), htmlspecialchars($_POST['website']), htmlspecialchars($_POST['tel']), htmlspecialchars($_POST['mail']), htmlspecialchars($_POST['helperType']), intval(($_GET['authorId'])));
            } else {
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
        }
        //redirection ver la page de mise à jour d'un lieu de réception
        elseif ($_GET['action'] == 'updatePlacePageMember') {
            //On vérifie l'id du prestataire à mettre à jour, s'il est bien passé en URL et s'il est positif
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                updatePlacePageMember(intval($_GET['id']));
            }  
            else {
                throw new Exception("Aucun identifiant de lieu envoyé");
            }
        }
        //redirection ver la page de mise à jour d'un wedding-planner
        elseif ($_GET['action'] == 'updateWeddingplannerPageMember') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                updateWeddingplannerPageMember(intval($_GET['id']));
            }  
            else {
                throw new Exception("aucun identifiant de wedding-planner envoyé");
            }
        }
        //redirection ver la page de mise à jour d'un prestataire
        elseif ($_GET['action'] == 'updateHelperPageMember') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                updateHelperPageMember(intval($_GET['id']));
            }  
            else {
                throw new Exception("aucun identifiant de prestataire envoyé");
            }
        }
        //mise à jour lieu de réception
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
        //mise à jour wedding-planner
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
        //mise à jour autre prestataire
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
        //page de suppression lieu de réception
        elseif ($_GET['action'] == 'deletePlacePageMember') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                deletePlacePageMember(intval($_GET['id']));
            }  
            else {
                throw new Exception("Aucun identifiant de lieu de réception envoyé");
            }
        }
        //page de suppression wedding-planner
        elseif ($_GET['action'] == 'deleteWeddingplannerPageMember') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                deleteWeddingplannerPageMember(intval($_GET['id']));
            }  
            else {
                throw new Exception("Aucun identifiant de Wedding-Planner envoyé");
            }
        }
        //page de suppression autre prestataire
        elseif ($_GET['action'] == 'deleteHelperPageMember') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                deleteHelperPageMember(intval($_GET['id']));
            }  
            else {
                throw new Exception("Aucun identifiant de prestataire envoyé");
            }
        }
        //suppression lieu de réception
        elseif ($_GET['action'] == 'deletePlaceMember') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                erasePlaceMember(intval($_GET['id']));
            }
            else {
                throw new Exception("Aucun identifiant de lieu de réception envoyé");
            }
        }
        //suppression wedding-planner
        elseif ($_GET['action'] == 'deleteWeddingplannerMember') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                eraseWeddingplannerMember(intval($_GET['id']));
            } else {
                throw new Exception("Aucun identifiant de Wedding-Planner envoyé");
            }
        }
        //suppression prestataire
        elseif ($_GET['action'] == 'deleteHelperMember') {
            if (isset($_GET['id']) && $_GET['id'] > 0) { 
                eraseHelperMember(intval($_GET['id']));
            } else {
                 throw new Exception("Aucun identifiant de prestataire envoyé");
            }
        }
        //déconnexion du membre
        elseif ($_GET['action'] == 'disconnect') {
            session_destroy();
            header('Location:index.php');
        }
    }
}
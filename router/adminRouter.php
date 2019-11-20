<?php

require('controller/adminController.php');


function adminRouter()
{
      //On vérifie si une action est bien demandée
    if (isset($_GET['action'])) {                 
        if ($_GET['action'] == 'homeAdmin') {
            //On appelle la fonction homeAdmin du controller
            homeAdmin();
        }
        //Affichage des lieux de réception
        elseif ($_GET['action'] == 'placesAdmin') {
            //On appelle la fonction placesAdmin du controller
            placesAdmin();
        }
        //Affichage du lieu de réception sélectionné
        elseif ($_GET['action'] == 'placeAdmin') {
            //On vérifie l'id du lieu de réception à afficher, s'il est bien passé en URL et s'il est positif
            if(isset($_GET['id']) && $_GET['id'] > 0){
                //On appelle la fonction placesAdmin du controller. On convertit l'id en nombre entier pour plus de sécurité
                placeAdmin(intval($_GET['id']));
            } else {
                throw new Exception('Le lieu de réception n\'existe pas !');
            }
        }
        //Affichage des wedding-planners
        elseif ($_GET['action'] == 'weddingplannersAdmin') {
            //On appelle la fonction weddingPlannersAdmin du controller
            weddingPlannersAdmin();
        }  
        //Affichage du wedding-planner sélectionné      
        elseif ($_GET['action'] == 'weddingplannerAdmin') {
            //On vérifie l'id du wedding-planner à afficher, s'il est bien passé en URL et s'il est positif
            if(isset($_GET['id']) && $_GET['id'] > 0){
                //On appelle la fonction weddingPlannerAdmin du controller. On convertit l'id en nombre entier pour plus de sécurité
                weddingPlannerAdmin(intval($_GET['id']));
            } else {
                throw new Exception('Le lieu de réception n\'existe pas !');
            }
        }
        //Affichage des prestataires    
        elseif ($_GET['action'] == 'helpersAdmin') {
            //On vérifie l'id de la page à afficher, s'il est bien passé en URL et s'il est positif
            if(isset($_GET['pageId']) && $_GET['pageId'] > 0) {
                //Dans ce cas on affiche la page demandé en appelant la fonction helpersAdmin
                helpersAdmin(intval($_GET['pageId']));
            //Si aucun id de page est passé en paramètre, on affiche la page 1 par défaut
            } else {
                helpersAdmin(1);
            }
        }
        //Affichage du type de prestataire demandé  
        elseif ($_GET['action'] == 'helpersTypeAdmin') {
            //On vérifie l'id du type de prestataires à afficher, s'il est bien passé en URL et s'il est positif
            if(isset($_GET['id']) && $_GET['id'] > 0){
                //Dans ce cas on affiche le type de prestataire demandé en appelant la fonction helpersTypeAdmin
                helpersTypeAdmin(intval($_GET['id']));
            } else {
                throw new Exception('Le lieu de réception n\'existe pas !');
            }
        }
        //Affichage du prestataire demandé
        elseif ($_GET['action'] == 'helperAdmin') {
            //On vérifie l'id du prestataire à afficher, s'il est bien passé en URL et s'il est positif
            if(isset($_GET['id']) && $_GET['id'] > 0){
                //On appelle la fonction helperAdmin du controller. On convertit l'id en nombre entier pour plus de sécurité
                helperAdmin(intval($_GET['id']));
            } else {
                throw new Exception('Le lieu de réception n\'existe pas !');
            }
        }
        //Redirection vers la page de création d'un nouveau prestataire
        elseif ($_GET['action'] == 'creationAdminPage') {
            //On vérifie qu'un type de prestataire a été sélectionné dans le formulaire
            if(!empty($_POST['serviceType'])) {
                //Si le type de prestataire est 1, alors on redirige vers la page de création d'un lieu de réception
                if (intval($_POST['serviceType']) == 1){
                    require('view/admin/createPlaceAdminView.php');
                }
                //Si le type de prestataire est 2, alors on redirige vers la page de création d'un wedding-planner
                elseif (intval($_POST['serviceType']) == 2){
                    require('view/admin/createWeddingplannerAdminView.php');
                }
                //Sinon on redirige vers la page de création d'un autre prestataire
                else {
                    require('view/admin/createHelperAdminView.php');
                }
            }
        }
        //Création d'un nouveau lieu de réception
        elseif ($_GET['action'] == 'createPlaceAdmin') {
            //On vérifie que tous les champs sont remplis
            if (!empty($_POST['title']) && !empty($_POST['city']) && !empty($_POST['positionx']) && !empty($_POST['positiony']) && !empty($_POST['region']) && !empty($_POST['tel']) && !empty($_POST['mail']) && !empty($_POST['presentation']) && isset($_GET['authorId'])){
                //On appelle la fonction newPlaceAdmin en passant en paramètre les champs remplis en évitant les injections XSS en les entourant de la fonction htmlspecialchars et on passe également en paramètre l'id de l'auteur qui a créé le nouveau prestataire
                newPlaceAdmin(htmlspecialchars($_POST['title']), htmlspecialchars($_POST['city']), htmlspecialchars($_POST['positionx']), htmlspecialchars($_POST['positiony']), htmlspecialchars($_POST['region']), htmlspecialchars($_POST['website']), htmlspecialchars($_POST['tel']), htmlspecialchars($_POST['mail']), htmlspecialchars($_POST['presentation']), intval($_GET['authorId']));
            } else {
                throw new Exception('tous les champs ne sont pas remplis !');
            }
        }
        //Création d'un nouveau wedding-planner
        elseif ($_GET['action'] == 'createWeddingplannerAdmin') {
            //On vérifie que tous les champs sont remplis
            if (!empty($_POST['pseudo']) && !empty($_POST['specialty']) && !empty($_POST['presentation']) && !empty($_POST['tel']) && !empty($_POST['mail']) && isset($_GET['authorId'])) {
                //On appelle la fonction newWeddingplannerAdmin en passant en paramètre les champs remplis en évitant les injections XSS en les entourant de la fonction htmlspecialchars et on passe également en paramètre l'id de l'auteur qui a créé le nouveau prestataire
                newWeddingplannerAdmin(htmlspecialchars($_POST['pseudo']), htmlspecialchars($_POST['specialty']), htmlspecialchars($_POST['presentation']), htmlspecialchars($_POST['website']), htmlspecialchars($_POST['tel']), htmlspecialchars($_POST['mail']), intval($_GET['authorId']));
            } else {
                throw new Exception('tous les champs ne sont pas remplis !');
            }
        }
        //Création d'un nouveau prestataire
        elseif ($_GET['action'] == 'createHelperAdmin') {
            //On vérifie que tous les champs sont remplis
            if (!empty($_POST['pseudo']) && !empty($_POST['content']) && !empty($_POST['tel']) && !empty($_POST['mail']) && !empty($_POST['helperType']) && isset($_GET['authorId'])) {
                //On appelle la fonction newHelperAdmin en passant en paramètre les champs remplis en évitant les injections XSS en les entourant de la fonction htmlspecialchars et on passe également en paramètre l'id de l'auteur qui a créé le nouveau prestataire
                newHelperAdmin(htmlspecialchars($_POST['pseudo']), htmlspecialchars($_POST['content']), htmlspecialchars($_POST['website']), htmlspecialchars($_POST['tel']), htmlspecialchars($_POST['mail']), htmlspecialchars($_POST['helperType']), intval($_GET['authorId']));
            } else {
                throw new Exception('tous les champs ne sont pas remplis !');
            }
        }
        //Redirection vers la page de mise à jour d'un lieu de réception
        elseif ($_GET['action'] == 'updatePlacePageAdmin') {
            //On vérifie l'id du prestataire à mettre à jour, s'il est bien passé en URL et s'il est positif
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                //On appelle la fonction updatePlacePageAdmin du controller. On convertit l'id en nombre entier pour plus de sécurité
                updatePlacePageAdmin(intval($_GET['id']));
            }  
            else {
                throw new Exception("aucun identifiant de lieu de réception envoyé");
            }
        }
        //Redirection vers la page de mise à jour d'un wedding-planner
        elseif ($_GET['action'] == 'updateWeddingplannerPageAdmin') {
            //On vérifie l'id du prestataire à mettre à jour, s'il est bien passé en URL et s'il est positif
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                //On appelle la fonction updateWeddingplannerPageAdmin du controller. On convertit l'id en nombre entier pour plus de sécurité
                updateWeddingplannerPageAdmin(intval($_GET['id']));
            }  
            else {
                throw new Exception("aucun identifiant de Wedding-Planner envoyé");
            }
        }
        //Redirection vers la page de mise à jour d'un prestataire
        elseif ($_GET['action'] == 'updateHelperPageAdmin') {
            //On vérifie l'id du prestataire à mettre à jour, s'il est bien passé en URL et s'il est positif
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                //On appelle la fonction updateHelperPageAdmin du controller. On convertit l'id en nombre entier pour plus de sécurité
                updateHelperPageAdmin(intval($_GET['id']));
            }  
            else {
                throw new Exception("aucun identifiant de prestataire envoyé");
            }
        }
        //Mise à jour d'un lieu de récetion
        elseif ($_GET['action'] == 'updatePlaceAdmin') {
            //On vérifie l'id du prestataire à mettre à jour, s'il est bien passé en URL et s'il est positif
            if (isset($_GET['placeId']) && $_GET['placeId'] > 0) {
                //On vérifie que tous les champs sont remplis
                if (!empty($_POST['title']) && !empty($_POST['city']) && !empty($_POST['positionx']) && !empty($_POST['positiony']) && !empty($_POST['region']) && !empty($_POST['tel']) && !empty($_POST['mail']) && !empty($_POST['presentation'])) {
                //On appelle la fonction updatePlaceAdmin en passant en paramètre les champs remplis en évitant les injections XSS en les entourant de la fonction htmlspecialchars et on passe également en paramètre l'id de l'auteur qui a créé le nouveau prestataire
                updatePlaceAdmin(htmlspecialchars($_POST['title']), htmlspecialchars($_POST['city']), htmlspecialchars($_POST['positionx']), htmlspecialchars($_POST['positiony']), htmlspecialchars($_POST['region']), htmlspecialchars($_POST['website']), htmlspecialchars($_POST['tel']), htmlspecialchars($_POST['mail']), htmlspecialchars($_POST['presentation']), intval($_GET['placeId']));
                } else {
                    throw new Exception('tous les champs ne sont pas remplis !');
                }
            }  
            else {
                throw new Exception("aucun identifiant de lieu de réception envoyé");
            }
        }
        //Mise à jour d'un wedding-planner
        elseif ($_GET['action'] == 'updateWeddingplannerAdmin') {
            //On vérifie l'id du prestataire à mettre à jour, s'il est bien passé en URL et s'il est positif
            if (isset($_GET['weddingplannerId']) && $_GET['weddingplannerId'] > 0) {
                //On vérifie que tous les champs sont remplis
                if (!empty($_POST['pseudo']) && !empty($_POST['specialty']) && !empty($_POST['presentation']) && !empty($_POST['tel']) && !empty($_POST['mail'])) {
                //On appelle la fonction updateWeddingplannerAdmin en passant en paramètre les champs remplis en évitant les injections XSS en les entourant de la fonction htmlspecialchars et on passe également en paramètre l'id de l'auteur qui a créé le nouveau prestataire
                updateWeddingplannerAdmin(htmlspecialchars($_POST['pseudo']), htmlspecialchars($_POST['specialty']), htmlspecialchars($_POST['presentation']), htmlspecialchars($_POST['website']), htmlspecialchars($_POST['tel']), htmlspecialchars($_POST['mail']), intval($_GET['weddingplannerId']));
                } else {
                    throw new Exception('tous les champs ne sont pas remplis !');
                }
            }  
            else {
                throw new Exception("aucun identifiant de Wedding-Planner envoyé");
            }
        }
        //Mise à jour d'un prestataire
        elseif ($_GET['action'] == 'updateHelperAdmin') {
            //On vérifie l'id du prestataire à mettre à jour, s'il est bien passé en URL et s'il est positif
            if (isset($_GET['helperId']) && $_GET['helperId'] > 0) {
                //On vérifie que tous les champs sont remplis
                if (!empty($_POST['pseudo']) && !empty($_POST['content']) && !empty($_POST['tel']) && !empty($_POST['mail']) && !empty($_POST['helperType'])) {
                //On appelle la fonction updateHelperAdmin en passant en paramètre les champs remplis en évitant les injections XSS en les entourant de la fonction htmlspecialchars et on passe également en paramètre l'id de l'auteur qui a créé le nouveau prestataire
                updateHelperAdmin(htmlspecialchars($_POST['pseudo']), htmlspecialchars($_POST['content']), htmlspecialchars($_POST['website']), htmlspecialchars($_POST['tel']), htmlspecialchars($_POST['mail']), htmlspecialchars($_POST['helperType']), intval($_GET['helperId']));
                } else {
                    throw new Exception('tous les champs ne sont pas remplis !');
                }
            }  
            else {
                throw new Exception("aucun identifiant de prestataire envoyé");
            }
        }
        //Redirection vers la page de suppression du lieu de réception
        elseif ($_GET['action'] == 'deletePlacePageAdmin') {
            //On vérifie l'id du prestataire à mettre à jour, s'il est bien passé en URL et s'il est positif
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                //On appelle la fonction deletePlacePageAdmin du controller. On convertit l'id en nombre entier pour plus de sécurité
                deletePlacePageAdmin(intval($_GET['id']));
            }  
            else {
                throw new Exception("aucun identifiant de lieu de réception envoyé");
            }
        }
        //Redirection vers la page de suppression d'un wedding-planner
        elseif ($_GET['action'] == 'deleteWeddingplannerPageAdmin') {
            //On vérifie l'id du prestataire à mettre à jour, s'il est bien passé en URL et s'il est positif
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                //On appelle la fonction deleteWeddingplannerPageAdmin du controller. On convertit l'id en nombre entier pour plus de sécurité
                deleteWeddingplannerPageAdmin(intval($_GET['id']));
            }  
            else {
                throw new Exception("aucun identifiant de Wedding-Planner envoyé");
            }
        }
        //Redirection vers la page de suppression d'un prestataire
        elseif ($_GET['action'] == 'deleteHelperPageAdmin') {
            //On vérifie l'id du prestataire à mettre à jour, s'il est bien passé en URL et s'il est positif
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                //On appelle la fonction deleteHelperPageAdmin du controller. On convertit l'id en nombre entier pour plus de sécurité
                deleteHelperPageAdmin(intval($_GET['id']));
            }  
            else {
                throw new Exception("aucun identifiant de prestataire envoyé");
            }
        }
        //Supression d'un lieu de réception
        elseif ($_GET['action'] == 'deletePlaceAdmin') {
            //On vérifie l'id du prestataire à mettre à jour, s'il est bien passé en URL et s'il est positif
            if (isset($_GET['id']) && $_GET['id'] > 0) {  
                //On appelle la fonction erasePlaceAdmin du controller. On convertit l'id en nombre entier pour plus de sécurité
                erasePlaceAdmin(intval($_GET['id']));
            } else {
                throw new Exception("aucun identifiant de lieu de réception envoyé");
            }
        }
        //Supression d'un wedding-planner
        elseif ($_GET['action'] == 'deleteWeddingplannerAdmin') {
            //On vérifie l'id du prestataire à mettre à jour, s'il est bien passé en URL et s'il est positif
            if (isset($_GET['id']) && $_GET['id'] > 0) {  
                //On appelle la fonction eraseWeddingplannerAdmin du controller. On convertit l'id en nombre entier pour plus de sécurité
                eraseWeddingplannerAdmin(intval($_GET['id']));
            } else {
                throw new Exception("aucun identifiant de Wedding-Planner envoyé");
            }
        }
        //Supression d'un prestataire
        elseif ($_GET['action'] == 'deleteHelperAdmin') {
            //On vérifie l'id du prestataire à mettre à jour, s'il est bien passé en URL et s'il est positif
            if (isset($_GET['id']) && $_GET['id'] > 0) { 
                //On appelle la fonction eraseHelperAdmin du controller. On convertit l'id en nombre entier pour plus de sécurité
                eraseHelperAdmin(intval($_GET['id']));
            } else {
                throw new Exception("aucun identifiant de prestataire envoyé");
            }
        }
        //Deconnexion de l'administrateur
        elseif ($_GET['action'] == 'disconnect') {
            session_destroy();
            header('Location:index.php');
        }
        //Redirection vers la page des mentions légales
        elseif ($_GET['action'] == 'mentions'){
        require ('view/mentions_legales.php');
        }
        //Appelle de la fonction getPlacesCoordsAdmin pour la map des lieux de réception
        elseif ($_GET['action'] == 'getPlacesCoords') {
            getPlacesCoordsAdmin();
          return true;
        }
    }
    else{
        homeAdmin();
      return true;
    }
}
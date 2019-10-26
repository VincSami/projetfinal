<?php

require('controller/backendController.php');


function backendRouter()
{
    if (isset($_GET['action'])) {                 
        if ($_GET['action'] == 'home') {
            home();
        }
        elseif ($_GET['action'] == 'place') {
            place();
        }
        elseif ($_GET['action'] == 'deleteComment') {
            if (isset($_GET['commentId']) && ($_GET['commentId'] > 0)) {
                eraseComment($_GET['commentId'], $_GET['id'] );
                } else {
                    throw new Exception('Le commentaire n\'existe pas !');
                }
        }
        elseif ($_GET['action'] == 'goToDeletePage') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                deletePostAdmin();
            }  
            else {
                throw new Exception("aucun identifiant de billet envoyé");
            }
        }
        elseif ($_GET['action'] == 'delete') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {  
            erasePost($_GET['id']);
        }
        }
        elseif ($_GET['action'] == 'goToUpdatePage') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                updatePostAdmin();
            }  
            else {
                throw new Exception("aucun identifiant de billet envoyé");
            }
        }
        elseif ($_GET['action'] == 'update') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['title']) && !empty($_POST['content'])) {
                updatePost($_POST['title'], $_POST['content'], $_GET['id']);
                } else {
                    throw new Exception('tous les champs ne sont pas remplis !');
                }
            }  
            else {
                throw new Exception("aucun identifiant de billet envoyé");
            }
        }
        elseif ($_GET['action'] == 'newPost') {
            postCreation();
        }
        elseif ($_GET['action'] == 'createPost') {
            if (!empty($_POST['title']) && (!empty($_POST['content']))){
            newPost($_POST['title'], $_POST['content']);
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
        home();
    }
}
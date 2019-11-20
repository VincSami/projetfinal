<?php

require('controller/visitorController.php');

function visitorRouter()
{
    if (isset($_GET['action'])) { 
        if ($_GET['action'] == 'subscribe') {
          	if(!empty($_POST['pseudoSubscriber']) && !empty($_POST['passSubscriber']) && !empty($_POST['email'])){
                subscribe(htmlspecialchars($_POST['pseudoSubscriber']), htmlspecialchars($_POST['passSubscriber']), htmlspecialchars($_POST['email']));
            } else { throw new Exception('Tous les champs ne sont pas remplis !');
            }
        }
        elseif ($_GET['action'] == 'connect') {
            if ((!empty($_POST['pseudoMember'])) && (!empty($_POST['passMember']))) {
              connectMember(htmlspecialchars($_POST['pseudoMember']), htmlspecialchars($_POST['passMember']));
            } 
            else {
             throw new Exception('Tous les champs ne sont pas remplis !');
            }
        }     
        elseif ($_GET['action'] == 'places') {
            places();
        }
        elseif ($_GET['action'] == 'place') {
            if(isset($_GET['id']) && $_GET['id'] > 0){
            $_GET['id'] = intval($_GET['id']);
            place($_GET['id']);
            } else {
            throw new Exception('Le lieu de réception n\'existe pas !');
            }
        }
        elseif ($_GET['action'] == 'weddingplanners') {
            weddingPlanners();
        }        
        elseif ($_GET['action'] == 'weddingplanner') {
            if(isset($_GET['id']) && $_GET['id'] > 0){
            $_GET['id'] = intval($_GET['id']);
            weddingPlanner($_GET['id']);
            } else {
                throw new Exception('Le Wedding-Planner n\'existe pas !');
            }
        }
        elseif ($_GET['action'] == 'helpers') {
            if(isset($_GET['pageId']) && $_GET['pageId'] > 0) {
                helpers($_GET['pageId']);
            } else {
                helpers(1);
            }
        }
        elseif ($_GET['action'] == 'helpersType') {
            if(isset($_GET['id']) && $_GET['id'] > 0){
            $_GET['id'] = intval($_GET['id']);
            helpersType($_GET['id']);
            } else {
                throw new Exception('Le type de prestataire demandé n\'existe pas !');
            }
        }              
        elseif ($_GET['action'] == 'helper') {
            if(isset($_GET['id']) && $_GET['id'] > 0){
            $_GET['id'] = intval($_GET['id']);
            helper($_GET['id']);
            } else {
            throw new Exception('Le prestataire n\'existe pas !');
            }
        }
        elseif ($_GET['action'] == 'getPlacesCoords') {
            getPlacesCoords();
        }
        elseif ($_GET['action'] == 'mentions'){
            require ('view/mentions_legales.php');
        }
    }
    else {
        home();
    }
}
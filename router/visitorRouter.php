<?php

require('controller/visitorController.php');

function visitorRouter()
{
    if (isset($_GET['action'])) { 
        if ($_GET['action'] == 'subscribe') {
            if(!empty($_POST['pseudoSubscriber']) && !empty($_POST['passSubscriber']) && !empty($_POST['email'])){
                subscribe($_POST['pseudoSubscriber'], $_POST['passSubscriber'], $_POST['email']);
            }
            else{
                throw new Exception ("Tous les champs ne sont pas remplis !");
            }
        }
        elseif ($_GET['action'] == 'connect') {
            if ((!empty($_POST['pseudoMember'])) && (!empty($_POST['passMember']))) {
              connectMember($_POST['pseudoMember'], $_POST['passMember']);
            } 
            else {
             throw new Exception('Tous les champs ne sont pas remplis !');
            }
        }     
        elseif ($_GET['action'] == 'places') {
            places();
        }
        elseif ($_GET['action'] == 'placesByType') {
            if(isset($_GET['type_id']) && $_GET['type_id'] > 0){
            placesByType($_GET['id']);
            }
        }
        elseif ($_GET['action'] == 'place') {
            if(isset($_GET['id']) && $_GET['id'] > 0){
            place($_GET['id']);
            }
        }
        elseif ($_GET['action'] == 'weddingplanners') {
            weddingPlanners();
        }        
        elseif ($_GET['action'] == 'weddingplanner') {
            weddingPlanner($_GET['id']);
        }
        elseif ($_GET['action'] == 'helpers') {
            helpers();
        }
        elseif ($_GET['action'] == 'helpersType') {
            helpersType($_GET['id']);
        }              
        elseif ($_GET['action'] == 'helper') {
            helper($_GET['id']);
        }
    }
    else {
        home();
    }
}
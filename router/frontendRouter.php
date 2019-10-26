<?php

require('controller/frontendController.php');

function frontendRouter()
{
    if (isset($_GET['action'])) { 
        if ($_GET['action'] == 'places') {
            places();
        }
        elseif ($_GET['action'] == 'placesByType') {
            if(isset($_GET['type_id']) && $_GET['type_id'] > 0){
            placesByType($_GET['type_id']);
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
        elseif ($_GET['action'] == 'helper') {
            helper($_GET['id']);
        }
    }
    else {
        home();
    }
}
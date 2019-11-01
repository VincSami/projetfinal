<?php

require('controller/memberController.php');


function memberRouter()
{
    if (isset($_GET['action'])) {                 
        if ($_GET['action'] == 'homeMember') {
            homeMember();
        }
        elseif ($_GET['action'] == 'placesMember') {
            placesMember();
        }
        elseif ($_GET['action'] == 'placesByTypeMember') {
            if(isset($_GET['type_id']) && $_GET['type_id'] > 0){
            placesByTypeMember($_GET['id']);
            }
        }
        elseif ($_GET['action'] == 'placeMember') {
            if(isset($_GET['id']) && $_GET['id'] > 0){
            placeMember($_GET['id']);
            }
        }
        elseif ($_GET['action'] == 'weddingplannersMember') {
            weddingPlannersMember();
        }        
        elseif ($_GET['action'] == 'weddingplannerMember') {
            weddingPlannerMember($_GET['id']);
        }
        elseif ($_GET['action'] == 'helpersMember') {
            helpersMember();
        }
        elseif ($_GET['action'] == 'helpersTypeMember') {
            helpersTypeMember($_GET['id']);
        }              
        elseif ($_GET['action'] == 'helperMember') {
            helperMember($_GET['id']);
        }
        elseif ($_GET['action'] == 'disconnect') {
            session_destroy();
            header('Location:index.php');
        }
        elseif ($_GET['action'] == 'profil') {
            require ('view/user/managerMemberView.php');
        }
        elseif ($_GET['action'] == 'mentions'){
            require ('view/mentions_legales.php');
        }
    }
    else{
        homeMember();
    }
}
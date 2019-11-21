<?php
//implémentation de l'autoload pour le chargement automatique des classes
function autoloader($className) {
    include_once('model/' . substr($className, 28) . '.php');
}  

session_start();

//inclue les routers nécessaires
require('router/visitorRouter.php');
require('router/adminRouter.php');
require('router/memberRouter.php');

//détermine le routeur à appeler selon l'id de session et le type de membre
$routeFound=false;
try {
    if (isset($_SESSION['id'])) {
        if ($_SESSION['member_type'] == "admin") {
            $routeFound= adminRouter();
        }
        if ($routeFound==false && $_SESSION['member_type'] == "user") {
            $routeFound=memberRouter();
        }
    }
    if($routeFound==false){
        visitorRouter();
    } 
}
catch(Exception $e) {
    require('view/error.php');
}


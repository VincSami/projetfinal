<?php

function autoloader($className) {
    echo( "tried to load : " . $className );
    echo('  by including ' . 'model/' . $className . '.php' );
    include_once('model/' . $className . '.php');
}  

session_start();

require('router/visitorRouter.php');
require('router/adminRouter.php');
require('router/memberRouter.php');

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


<?php

session_start();

require('router/frontendRouter.php');
require('router/backendRouter.php');

try {
    if (isset($_SESSION['id'])) {
        backendRouter();	
    } else {
        frontendRouter();
    } 
}
catch(Exception $e) {
    require('view/error.php');
}

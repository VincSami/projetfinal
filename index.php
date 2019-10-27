<?php

session_start();

require('router/visitorRouter.php');
require('router/adminRouter.php');
require('router/memberRouter.php');

try {
    if (isset($_SESSION['id'])) {
        if ($_SESSION['type'] == "admin") {
            adminRouter();
        }
        else {
            memberRouter();
        }
    } else {
        visitorRouter();
    } 
}
catch(Exception $e) {
    require('view/error.php');
}

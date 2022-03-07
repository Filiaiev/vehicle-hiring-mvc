<?php
    session_start();

    // If user is loggen in, destroy session
    if(isset($_SESSION["user"])) {
        session_destroy();
    }

    // Return user to the login page
    require_once "../view/login_view.php";
?>
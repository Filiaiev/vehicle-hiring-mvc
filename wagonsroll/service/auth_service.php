<?php
    require_once "../model/role.php";
    require_once "../model/user.php";

    if(!isset($_SESSION)) {
        session_start();
    }

    if(!isset($_SESSION["user"])) {
        $_REQUEST["message"] = "You must first log in";
        require_once "../view/login_view.php";
        exit();
    }
?>
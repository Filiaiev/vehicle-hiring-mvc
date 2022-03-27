<?php
    require_once "../model/user.php";
    require_once "../model/contactDetails.php";

    session_start();

    if(!isset($_SESSION["user"])) {
        echo "Action is not allowed";
        exit();
    }

    $email = $_SESSION["user"]->email;
    $hasContactDetails = false;
    if ($_SESSION["contactDetails"]) {
        $firstName = $_SESSION["contactDetails"]->firstName;
        $familyName = $_SESSION["contactDetails"]->familyName;
        $mobile = $_SESSION["contactDetails"]->mobile;
        $addressLine = $_SESSION["contactDetails"]->address->addressLine1;
        $city = $_SESSION["contactDetails"]->address->city;
        $postcode = $_SESSION["contactDetails"]->address->postcode;
        $hasContactDetails = true;
    }

    require_once "../view/account_view.php";
?> 

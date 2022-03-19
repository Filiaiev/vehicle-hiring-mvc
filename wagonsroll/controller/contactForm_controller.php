<?php
    require_once "../model/user.php";
    require_once "../model/contactDetails.php";
    require_once "../model/address.php";

    if(!isset($_SESSION)) {
        session_start();
    }

    if(!isset($_SESSION["user"]) || $_SESSION["user"]->roleId != Role::CUSTOMER) {
        echo "Action is not allowed";
        exit();
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $addressDetails = new Address([
            "addressLine1" => $_POST['addressLine1'],
            "addressLine2" => $_POST['addressLine2'],
            "city" => $_POST['city'],
            "county" => $_POST['county'],
            "postcode" => $_POST['postcode']
        ]);

        $checkoutContactDetails = new ContactDetails([
            "email" => $_POST['email'],
            "mobile" => $_POST['mobile'],
            "firstName" => $_POST['firstName'],
            "familyName" => $_POST['familyName'],
            "address" => $addressDetails
        ]);

        require_once "../view/checkout_view.php";
    }else if($_SERVER['REQUEST_METHOD'] === 'GET') {
        require_once "../view/contactForm_view.php";
    }
?>
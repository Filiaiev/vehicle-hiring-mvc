<?php
    require_once "../model/role.php";
    require_once "../model/user.php";
    require_once "../model/contactDetails.php";
    require_once "../model/address.php";
    require_once "../dao/contactDetailsDAO.php";
    require_once "../dao/addressDAO.php";
    require_once "../dao/vehiclesBookingDAO.php";
    require_once "../dao/vehiclesBookingItemDAO.php";

    if(!isset($_SESSION)) {
        session_start();
    }

    if(isset($_SESSION["user"]) && $_SESSION["user"]->roleId != Role::CUSTOMER) {
        echo "Action is not allowed";
        exit();
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $checkoutContactDetails = array(
            "email" => $_POST['email'],
            "mobile" => $_POST['mobile'],
            "firstName" => $_POST['firstName'],
            "familyName" => $_POST['familyName'],
            "address" => array(
                "addressLine1" => $_POST['addressLine1'],
                "addressLine2" => $_POST['addressLine2'],
                "city" => $_POST['city'],
                "county" => $_POST['county'],
                "postcode" => $_POST['postcode']
            )
        );

        $cd = ContactDetailsDAO::getInstance()->getContactDetailsByDetails($checkoutContactDetails);

        // If contact details were not found -> check if address is present
        if($cd == null) {
            $address = AddressDAO::getInstance()->getAddressByDetails($checkoutContactDetails["address"]);

            // If address was not found -> save new to the DB
            if($address == null) {
                $address = AddressDAO::getInstance()->save($checkoutContactDetails["address"]);
            }

            // Save and fetch new contact details
            $checkoutContactDetails["addressId"] = $address->addressId;
            $cd = ContactDetailsDAO::getInstance()->save($checkoutContactDetails);
        }

        $bookingId = VehiclesBookingDAO::getInstance()->save([$_SESSION["totalPrice"], $cd->contactDetailsId]);

        foreach($_SESSION["cart"] as $field => $value) {
            VehiclesBookingItemDAO::getInstance()->save([$value["startDate"], $value["endDate"], $bookingId, $value["regNum"]]);
        }

        unset($_SESSION["cart"]);
        require_once "../view/checkout_view.php";
    }else if($_SERVER['REQUEST_METHOD'] === 'GET') {
        require_once "../view/contactForm_view.php";
    }
?>
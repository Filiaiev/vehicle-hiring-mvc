<?php 
    require_once "../dao/userDAO.php";
    require_once "../dao/addressDAO.php";
    require_once "../dao/contactDetailsDAO.php";
    session_start();

    if(isset($_SESSION["user"])) {
        require_once "../view/home_view.php";
    }else if($_SERVER["REQUEST_METHOD"] === "GET") {
        require_once "../view/register_view.php";
    }else if($_SERVER["REQUEST_METHOD"] === "POST") {
        $user = UserDAO::getInstance()->getUserByEmail($_POST["email"]);

        if($user == null) {
            $user = new User(
                ["roleId" => Role::CUSTOMER,
                 "email" => $_POST["email"],
                 "pass" => $_POST["pass"]
                ]);
            UserDAO::getInstance()->save($user);

            $addressDetails = [
                "addressLine1" => trim($_POST["addressLine1"]),
                "addressLine2" => trim($_POST["addressLine2"]),
                "city" => trim($_POST["city"]),
                "county" => trim($_POST["county"]),
                "postcode" => trim($_POST["postcode"])
            ];
            $address = AddressDAO::getInstance()->save($addressDetails);

            $contactDetails = [
                "firstName" => trim($_POST["firstName"]),
                "familyName" => trim($_POST["familyName"]),
                "mobile" => trim($_POST["mobile"]),
                "email" => trim($_POST["email"]),
                "addressId" => $address->addressId
            ];
            $contactDetailsObj = ContactDetailsDAO::getInstance()->save($contactDetails);
            
            $_REQUEST["registerMessage"] = "User has been registered!";
            require_once "../view/login_view.php";
        }else {
            $_REQUEST["registerMessage"] = "User is already exists";
            require_once "../view/register_view.php";
        }
    }
?>
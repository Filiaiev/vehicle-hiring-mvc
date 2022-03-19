<?php
    require_once "../model/user.php";
    
    if(!isset($_SESSION)) {
        session_start();
    }

    // If the user is already logged in, show the home page
    if(isset($_SESSION["user"])) {
        require_once "../view/home_view.php";
    }
    // If all credentials (email, pass) were entered as an input
    else if(isset($_POST["email"]) && $_POST["email"] != "" &&
       isset($_POST["pass"]) && $_POST["pass"] != "") {
        
        $email = $_POST["email"];
        $pass = $_POST["pass"];

        require_once "../dao/userDAO.php";

        // Fetch user from the DB
        $user = UserDAO::getInstance()->getUserByEmail($email);

        // If user with given email was found in the DB, but password is wrong,
        // set loginStatus to 'false' and show the login page
        if($user == null || !password_verify($pass, $user->pass)) {
            $_REQUEST["message"] = "Invalid credentials";
            require_once "../view/login_view.php";
        }
        // If login was successful, set the new session variable and show the home page
        else {
            $_SESSION["user"] = $user;
            
            require_once "../dao/contactDetailsDAO.php";
            $userContactDetails = ContactDetailsDAO::getInstance()->getContactDetailsByEmail($user->email);
            $_SESSION["contactDetails"] = $userContactDetails;

            if(isset($_POST["location"]) && $_POST["location"] != "") {
                header("Location:".$_POST["location"]);
                exit();
            }

            if($user->roleId == Role::CUSTOMER) {
                require_once "../controller/home_controller.php";
            } else if($user->roleId == Role::SHOP_MANAGER) {
                require_once "../controller/manager_controller.php";
            }
        }
    }else {
        require_once "../view/login_view.php";
    }
?>
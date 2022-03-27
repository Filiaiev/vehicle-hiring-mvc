<?php
    // DB Connection config
    // Change it to the private credentials for the testing purposes
    // Change it to the group credentials before deployment (at the end)
    const DSN = "mysql:host=localhost; dbname=db_pineapple";
    const USERNAME = "pineapple";
    const PASSWORD = "uchausei";
    const OPTIONS = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
?>
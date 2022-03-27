<?php
    // DB Connection config
    // Change it to the private credentials for the testing purposes
    // Change it to the group credentials before deployment (at the end)
    const DSN = "mysql:host=localhost; dbname=...";
    const USERNAME = "...";
    const PASSWORD = "...";
    const OPTIONS = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
?> 
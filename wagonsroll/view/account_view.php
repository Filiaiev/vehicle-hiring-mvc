<!DOCTYPE html>
<html lang="en">
<head>
    <title>Account</title>
    <script src="https://use.fontawesome.com/47474f8808.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../client/style/general.css">
    <link rel="stylesheet" href="../client/style/header.css"/>
</head>
<body>
    <?php require_once "../view/block/header.php" ?>
    <div class="container-fluid">
        <h1> Your personal information: </h1>
        <hr>
        <h3> Email - <?= $email ?> </h3>
        <?php if($hasContactDetails): ?>
            <h3> Name - <?= $firstName ?></h3>
            <h3> Family Name - <?= $familyName ?></h3>
            <h3> Mobile - <?= $mobile ?></h3>
            <h3> Address - <?= $addressLine ?>, <?= $city ?>, <?= $postcode ?> </h3>
        <?php endif ?>
        <a class="btn btn-secondary" href="home_controller.php">Return to main page</a>
    </div>
</body>
</html>
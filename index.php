<?php
require('config/connect.php');
if (isset($row['token'])) {
    require('auth/auth.php');
}

if (isset($_SESSION['token'])) {
    $sql = "SELECT token FROM tbl_users WHERE email = :email";
    $statement = $connect->prepare($sql);
    $statement->bindValue(":email", $_SESSION['email']);
    $statement->execute();
    $row = $statement->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="./css/index.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pathway+Gothic+One&display=swap" rel="stylesheet">

    <title>Secure Login System</title>
</head>

<body>
    <?php include('./components/Navbar.php'); ?>
    <?php
    if (!isset($row['token'])) {
        include('./components/Form.php');
    } else {
        include('./components/UserInfo.php');
    }
    ?>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="js/app.js"></script>

    <?php if (isset($row['token'])) {
        echo '<script src="auth/auth.js"></script>';
    }
    ?>

</body>

</html>
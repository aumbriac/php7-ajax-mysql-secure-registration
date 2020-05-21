<?php

require('../config/connect.php');

// AUTHENTICATION
if (isset($_POST['authenticate']) && isset($_SESSION['token'])) {
    $sql = "UPDATE tbl_users SET token_timestamp = NOW() WHERE email = :email";
    $statement = $connect->prepare($sql);
    $statement->bindValue(':email', $_SESSION['email']);
    $statement->execute();
    $_SESSION['token_timestamp'] = time();
    exit('valid');
}

// LOGIN CHECK
if (isset($_POST['login_check']) && isset($_SESSION['token'])) {
    if ((time() - $_SESSION['token_timestamp'] > 1900)) { // Last request > 15 minutes (1900 seconds)
        $sql = "UPDATE tbl_users SET token = NULL WHERE email = :email";
        $statement = $connect->prepare($sql);
        $statement->bindValue(':email', $_SESSION['email']);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $row['token'] === NULL;
        session_unset();
        session_destroy();
        exit('invalid');
    } else {
        exit('valid');
    }
}

if (isset($_SESSION['token'])) {
    // Ensure token in database === token in session
    $sql = "SELECT token FROM tbl_users WHERE :email = email";
    $statement = $connect->prepare($sql);
    $statement->bindValue(":email", $_SESSION['email']);
    $statement->execute();
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    if ($_SESSION['token'] !== $row['token']) {
        $row['token'] === NULL;
        session_unset();
        session_destroy();
        exit('invalid');
    }
}

<?php

require('../config/connect.php');

// LOGIN CHECK
if (isset($_POST['login_check'])) {
    if ((time() - $_SESSION['token_timestamp'] > 1900)) { // Last request > 15 minutes (1900 seconds)
        $sql = "UPDATE tbl_users SET token = NULL WHERE email = :email";
        $statement = $connect->prepare($sql);
        $statement->bindValue(':email', $_SESSION['email']);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $row['token'] === NULL;
        exit('invalid');
        session_unset();
        session_destroy();
        echo "<script>location.reload()</script>";
    } else {
        exit('valid');
    }
}

// REAUTHENTICATION

if (isset($_POST['reauthenticate'])) {
    $ip = $_SERVER['REMOTE_ADDR'];
    // $ipInfo = file_get_contents('http://ip-api.com/json/' . $ip);
    // $ipInfo = json_decode($ipInfo);
    // $timezone = $ipInfo->timezone;
    date_default_timezone_set('America/Los_Angeles');
    $sql = "UPDATE tbl_users SET token_timestamp = NOW() WHERE email = :email";
    $statement = $connect->prepare($sql);
    $statement->bindValue(':email', $_SESSION['email']);
    $statement->execute();
    $_SESSION['token_timestamp'] = time();
    exit('valid');
}

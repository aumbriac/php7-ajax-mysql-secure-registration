<?php

require("../config/connect.php");

if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $passwordAttempt = $_POST['password'];
    $sql = "SELECT * FROM tbl_users WHERE email = :email";
    $statement = $connect->prepare($sql);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    $password = $row['password'];
    $token = hash("sha256", uniqid());
    if (password_verify($passwordAttempt, $password) && $row['token'] === NULL) {
        $sql = "UPDATE tbl_users SET token = :token, token_timestamp = NOW(), last_login = NOW() WHERE email = :email";
        $statement = $connect->prepare($sql);
        $statement->bindValue(':token', $token);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $_SESSION['online'] = true;
        $_SESSION['name'] = $row['name'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['token'] = $token;
        $_SESSION['token_timestamp'] = time();
        $_SESSION['last_login'] = $row['last_login'];
        $_SESSION['created_on'] = $row['created_on'];
        $_SESSION['last_login'] = $row['last_login'];
        exit('success');
    } else {
        exit('error');
    }
};

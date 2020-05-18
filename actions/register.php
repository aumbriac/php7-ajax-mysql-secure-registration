<?php

require("../config/connect.php");

if (isset($_POST['register'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $sql = "SELECT COUNT(email) AS num 
        FROM tbl_users WHERE email = :email";
    $statement = $connect->prepare($sql);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    if ($row['num'] > 0) {
        exit('userExists');
    }
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO tbl_users
        (name, email, password, last_login)
        VALUES
        (:name, :email, :password, NOW())
        ";
    $statement = $connect->prepare($sql);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $passwordHash);
    if ($statement->execute()) {
        exit('success');
    } else {
        exit('error');
    }
}

<?php

require("../config/connect.php");

if (isset($_POST['logout'])) {
    $sql = "UPDATE tbl_users SET token = NULL WHERE email = :email";
    $statement = $connect->prepare($sql);
    $statement->bindValue(":email", $_SESSION['email']);
    $statement->execute();
    session_unset();
    session_destroy();
    exit('success');
}

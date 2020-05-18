<?php
$connect = new PDO("mysql:host=localhost;", "root", "");
$sql =
  "CREATE DATABASE users_database;

    CREATE TABLE users_database.tbl_users(
        id int AUTO_INCREMENT PRIMARY KEY,
        name varchar(50),
        email varchar(50),
        password varchar(255),
        token varchar(255),
        token_timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        last_login NULL,
        created_on TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

$statement = $connect->prepare($sql);
if ($statement->execute()) {
  echo "Database created successfully!";
} else {
  echo "Error. Please check source code.";
}

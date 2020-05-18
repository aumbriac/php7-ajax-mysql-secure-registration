<?php

$connect = new PDO("mysql:host=localhost;dbname=users_database", "root", "admin123");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$ip = $_SERVER['REMOTE_ADDR'];
// $ipInfo = file_get_contents('http://ip-api.com/json/' . $ip);
// $ipInfo = json_decode($ipInfo);
// $timezone = $ipInfo->timezone;
date_default_timezone_set('America/Los_Angeles');

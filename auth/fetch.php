<?php

require("../config/connect.php");

// GET TOKEN EXPIRATION
$tokenExpiration = date("h:i:sa", $_SESSION['token_timestamp'] + 900);
exit($tokenExpiration);

<?php

$hostName = "localhost";
$dbUser = "id20565118_amine";
$dbPassword = "MXIbFVQUsTg0x4@H";
$dbName = "logiid20565118_login_register";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Something went wrong;");
}

?>
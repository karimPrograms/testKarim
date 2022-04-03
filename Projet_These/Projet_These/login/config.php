<?php
$host = "localhost";
$user_name = "root";
$user_pass = "";
$database_in_use = "pharma";

$mysqli = new mysqli($host, $user_name, $user_pass, $database_in_use);

if ($mysqli->connect_errno) {
    echo "Échec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
?>
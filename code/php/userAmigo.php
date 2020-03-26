<?php

$server = "localhost";
$user ="root";
$pw = "";
$db = "amigo_db";

$conn = new mysqli($server, $user, $pw, $db);

if ($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}
echo "Connected succesfully";

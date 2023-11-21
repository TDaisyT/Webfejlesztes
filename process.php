<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "adatok";

$conn = new mysqli($servername, $username, $password, $dbname); //kapcsolat létrehozása

//kapcsolat ellenőrzése
if ($conn->connect_error) {
    die("Failed to connect: " . $conn->connect_error);
} else {
    echo ("Succeded in connecting.");
}

$conn->close();

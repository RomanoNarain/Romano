<?php
$servername = "localhost"; 
$username = "root";
$password = "";

// connectiem maken met de PDO.
$conn = new PDO("mysql:host=$servername", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

////////////////////////////////////////
include "connectpdo.php";


/// code van het aanmaken database 
try {
//$conn = new PDO("mysql:host=$servername", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE afsprakenDB";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Database succesvol aangemaakt!<br>";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>
<?php
$servername = "localhost"; 
$username = "root";
$password = "";

// connectiem maken met de PDO.
$conn = new PDO("mysql:host=$servername", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try {
    //$conn = new PDO("mysql:host=$servername", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE DATABASE afsprakenDB";
        
        $conn->exec($sql);
        echo "Database succesvol aangemaakt!<br>";
        }
    catch(PDOException $e)
        {
        echo $sql . "<br>" . $e->getMessage();
        }
    
    $conn = null;
    
    function createtable(){

        $sqltable = "CREATE TABLE afspraken (
            ad_naam VARCHAR(30)NOT NULL,
            ad_datum DATE NOT NULL,
            ad_locatie VARCHAR(30)NOT NULL,
			ad_tijd TIME NOT NULL,
            )";
    }
    createtable();
    ?>
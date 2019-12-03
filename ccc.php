<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "afsprakenDB";

include "connectpdo.php";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username,);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to create table
    $sql = "CREATE TABLE afspraken(
    ad_naam VARCHAR(30) NOT NULL,
	ad_datum CHAR(12)NOT NULL,
	ad_locatie VARCHAR(30)NOT NULL,
	ad_tijd CHAR(6)NOT NULL
    )";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Table afspraken created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
	$conn = null;
?>
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
	
    $sql = $conn->prepare("INSERT INTO afspraken (ad_naam, ad_datum, ad_locatie, ad_tijd)
    VALUES (:ad_naam, :ad_datum, :ad_locatie, :ad_tijd)");
    $sql->bindParam(':ad_naam', $naam);
    $sql->bindParam(':ad_datum', $datum);
    $sql->bindParam(':ad_locatie', $locatie);
    $sql->bindParam(':ad_tijd', $tijd);
	
	// insert a row
    $naam = "John";
    $datum = "10/3/2020";
    $locatie = "rotterdam";
    $tijd = "10:50";
    $sql->execute();
	
echo "Nieuwe reccord toegevoegd";
}
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
	
	$conn = null;

?>
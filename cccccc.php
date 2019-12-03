<?php
 
/*
 * Team naam: team scrum
 * Klas: 1G
 * Opdracht: Afspraken
 */
 
// PDO connection voor database
include "phpfunctie.php";
 
// Dit maakt de database
$dropsql = "DROP DATABASE IF EXISTS Overzicht;";
$createsql = "CREATE DATABASE Overzicht;";
 
 
// Dit maakt de table in SQ
$tablesql = "CREATE TABLE `Afspraken`(
 `product_backlog` VARCHAR(60),
 `sprint_backlog` VARCHAR(60),
 `to_do` VARCHAR(60),
 `busy` VARCHAR(60),
 `testen` VARCHAR(60),
 `done` VARCHAR(60)
)";
 
$insert_table = (
"INSERT INTO `Afspraken` VALUES(NULL, 'Alles in afspraken(php)', 'Print table', 'Design in word bestand', NULL, 'Create Database');" .
"INSERT INTO `Afspraken` VALUES(NULL, NULL, 'Website design met CSS', 'Maken van HTML table voor database', NULL, 'Create Table');" .
"INSERT INTO `Afspraken` VALUES(NULL, NULL, 'Print table', 'Scrumboard in afspraken database', NULL, 'insert table');" .
"INSERT INTO `Afspraken` VALUES(NULL, NULL, NULL, 'Product testen', NULL, 'account testen');" .
"INSERT INTO `Afspraken` VALUES(NULL, NULL, NULL, NULL, NULL, 'connection testen');" .
"INSERT INTO `Afspraken` VALUES(NULL, NULL, NULL, NULL, NULL, 'account aanmaken in de database met de juiste rechten');"
);
 
// Dit is voor print table
 
 
 
function CreateDatabase($createsql, $dropsql, $servername, $username, $password, $conn){
try {
        $conn->exec($dropsql);
        $conn->exec($createsql);
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }
}
CreateDatabase($createsql, $dropsql, $servername, $username, $password, $conn);
 
$conn = new PDO("mysql:host=$servername; dbname=Overzicht",$username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
function CreateTable($conn, $servername, $username, $password, $tablesql, $insert_table){
 
        $conn->exec($tablesql);
        echo "Table created<br>";
        $conn->exec($insert_table);
        echo "Injected perfectly";
}
 
CreateTable($conn, $servername, $username, $password, $tablesql, $insert_table);
 
$sql = "SELECT * FROM `afspraken`";
 
$result = $conn->prepare($sql);
$result->execute();
 
function TablePrint($result){
    echo "<table border='1' cellspacing='5' cellpadding='5' width='100%'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Product_backlog</th>";
    echo "<th>Sprint_backlog</th>";
    echo "<th>to_do</th>";
    echo "<th>busy</th>";
    echo "<th>Testen</th>";
    echo "<th>Done</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    for ($i = 0; $row = $result->fetch(); $i++) {
        echo "<tr>";
        echo "<td><label>" . $row['product_backlog'] . "</label></td>";
        echo "<td><label>" . $row['sprint_backlog'] . "</label></td>";
        echo "<td><label>" . $row['to_do'] . "</label></td>";
        echo "<td><label>" . $row['busy'] . "</label></td>";
        echo "<td><label>" . $row['testen'] . "</label></td>";
        echo "<td><label>" . $row['done'] . "</label></td>";
        echo "</tr>";
    }
    echo "</tbody>";
 
    echo "</table>";
}
TablePrint($result);
?>
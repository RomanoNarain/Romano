<?php 

try { 

$servername = "localhost"; 
$username = "root"; 
$password = "";
$dbname = "vuurwerk"; 

    $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username, $password);
    $result = $conn -> query("SELECT * from product"); 
    $result->setFetchMode(PDO::FETCH_ASSOC); 

    echo ""; 
    }
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}


$result = $conn -> query("SELECT * from product WHERE catogorie = 'knal'");
echo "<div class='product_grid'>";
while ($row = $result->fetch()) {
        echo "<img src=".$row['url_afbeelding'] . ">"; 
        echo "<div class='product'>";
        
        echo '<p>' .$row['vooraad'] . "</p>";
        echo '<p>' . $row['naam'] . "</p>";
        echo '<p>' . $row['prijs'] . "</p>";
        echo "</div>";

}
echo "</div>";
?>

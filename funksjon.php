<?php
function databaseConnection(){
    $host=getenv("DB_HOST");
$username=getenv("DB_USER");
$password=getenv("DB_PASSWORD");
$database=getenv ("DB_DATABASE");


$db=mysqli_connect($host,$username,$password,$database) or die ("ikke kontakt med serveren")
}

function getKlassekode(){
    $mysqli = databaseConnection();
    if (!$mysqli){
        return false;  
        }

    $result = $mysqli->query("SELECT Klassekode FROM Klasse");
    while ($row = $result->fetch_assoc()) {
        $data[] = $row['Klassekode'];
    }
    return $data;
}
?>
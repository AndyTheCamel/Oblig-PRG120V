<?php
include("db.tilkobling.php");

$sqlSetning = "SELECT * FROM Klasse";

$sql_resultat = mysqli_query($db, $sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");

$antallRader = mysqli_num_rows($sql_resultat);


print ("<h3>Registrerte klasser</h3>");
print ("<table border=1>");  
print ("<tr><th align=left>Klassekode</th> <th align=left>Klassenavn</th> <th align=left>Studiumkode</th></tr>"); 

for ($r=1;$r<=$antallRader;$r++)
{
    $rad = mysqli_fetch_array($sql_resultat);
    $Klassekode = $rad["Klassekode"];
    $Klassenavn = $rad["Klassenavn"];
    $Studiumkode = isset($rad["Studiumkode"]) ? $rad["Studiumkode"] : "";
    print ("<tr><td>$Klassekode</td> <td>$Klassenavn</td> <td>$Studiumkode</td></tr>");
}
print ("</table>");
?>

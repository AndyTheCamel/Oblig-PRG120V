<?php
include("db.tilkobling.php");

$sqlSetning = "SELECT * FROM student2";

$sql_resultat = mysqli_query($db, $sqlSetning)or die ("ikke mulig &aring; hente data fra databasen");

$antallRader = mysqli_num_rows($sql_resultat);


print ("<h3>Registrerte studenter</h3>");
print ("<table border=1>");  
print ("<tr><th align=left>Brukernavn</th> <th align=left>Fornavn</th> <th align=left>Etternavn</th> <th align=left>Klassekode</th></tr>"); 

for ($r=1;$r<=$antallRader;$r++)
{
    $rad = mysqli_fetch_array($sql_resultat);
    $Brukernavn = $rad["Brukernavn"];
    $Fornavn = $rad["Fornavn"];
    $Etternavn = $rad["Etternavn"];
    $Klassekode = $rad["Klassekode"];
    print ("<tr><td>$Brukernavn</td> <td>$Fornavn</td> <td>$Etternavn</td> <td>$Klassekode</td></tr>");
}
print ("</table>");
?>

<?php
include("db.tilkobling.php");

$sqlSetning = "SELECT * FROM student2";

$sql_resultat = mysqli_query($db, $sqlSetning)or die ("ikke mulig &aring; hente data fra databasen");

$antallRader = mysqli_num_rows($sql_resultat);


print ("<h3>Registrerte studenter</h3>");
print ("<table border=1>");  
print ("<tr><th align=left>studnr</th> <th align=left>navn</th></tr>"); 

for ($r=1;$r<=$antallRader;$r++)
{
    $rad = mysqli_fetch_array($sql_resultat);
    $studnr = $rad["studnr"];
    $navn = $rad["navn"];
    print ("<tr><td>$studnr</td> <td>$navn</td></tr>");
}
print ("</table>");
?>

<?php
include("db.tilkobling.php");
?>
<!DOCTYPE html>
<script src="funksjoner.js"></script>
<html>  
    <form method="post" action="" id="SlettStudent" name="SlettStudent">
 	 Brukernavn <select id="Brukernavn" name="Brukernavn" required>
            <option value="">Velg Brukernavn</option>
            <?php
            $sql = "SELECT Brukernavn FROM student2";
            $result = mysqli_query($db, $sql);
            if (!$result) {
                die("Feil ved henting av brukernavn: " . mysqli_error($db));
            }
            while ($row = mysqli_fetch_assoc($result)) {
                $brukernavn = htmlspecialchars($row["Brukernavn"], ENT_QUOTES, "UTF-8");
                echo "<option value=\"$brukernavn\">$brukernavn</option>";
            }
            ?>
        </select> <br/>
   	 <input type="submit" value="Slett" id="Slett" name="Slett"/>
      	 <input type="reset" value="Nullstill" id="Nullstill" name="Nullstill" /> <br /> </form>
</html>
<?php
if (isset($_POST["Slett"])) 
    {
    $Brukernavn= $_POST["Brukernavn"];
    $sqlSetning="DELETE FROM student2 WHERE Brukernavn='$Brukernavn';";
    $sqlresultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; slette data fra databasen");
    $antallRader=mysqli_num_rows($sqlresultat);

    if ($antallRader !=0)
        {
            print("Studenten finnes ikke i databasen");
        }
    else
        {
           $sqlSetning="DELETE FROM student2 WHERE Brukernavn='$Brukernavn';";
            mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; slette data fra databasen");

            print("Følgende student er slettet: Brukernavn: $Brukernavn, Fornavn: $Fornavn, Etternavn: $Etternavn, Klassekode: $Klassekode");
        }
    }
?>
<?php
include("db.tilkobling.php");
?>
<script src="funksjoner.js"></script>
<!DOCTYPE html>
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
if (isset($_POST["Slett"])) {
    $Brukernavn = isset($_POST["Brukernavn"]) ? $_POST["Brukernavn"] : "";

    if (!$Brukernavn) {
        print("Vennligst velg et brukernavn å slette.");
    } else {
        $sqlSetning = "DELETE FROM student2 WHERE Brukernavn='$Brukernavn';";
        if (mysqli_query($db, $sqlSetning)) {
            print("Studenten med brukernavn '$Brukernavn' er slettet fra databasen.");
        } else {
            print("Feil ved sletting av studenten: " . mysqli_error($db));
        }
    }
}
?>
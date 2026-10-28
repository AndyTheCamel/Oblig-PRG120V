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
    $Brukernavn = $_POST["Brukernavn"] ?? "";
    if ($Brukernavn === "") {
        print("Vennligst velg et brukernavn å slette.");
    } else {
        $statement = mysqli_prepare($db, "DELETE FROM student2 WHERE Brukernavn = ?");
        if (!$statement) {
            die("Feil ved klargjøring av sletting: " . mysqli_error($db));
        }
        mysqli_stmt_bind_param($statement, "s", $Brukernavn);
        if (!mysqli_stmt_execute($statement)) {
            die("Feil ved sletting av studenten: " . mysqli_stmt_error($statement));
        }

        if (mysqli_stmt_affected_rows($statement) > 0) {
            $escapedBrukernavn = htmlspecialchars($Brukernavn, ENT_QUOTES, "UTF-8");
            print("Studenten med brukernavn '$escapedBrukernavn' er slettet fra databasen.");
        } else {
            print("Studenten finnes ikke i databasen.");
        }
        mysqli_stmt_close($statement);
    }
    }
?>
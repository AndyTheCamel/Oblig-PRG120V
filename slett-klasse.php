<?php
include(db.tilkobling.php);
?>
<script src="functions.js"></script>
<html>
    <form method="post" action="" id="SlettKlasse" name="SlettKlasse">
        <select id="SlettKlasse" name="SlettKlasse" required>
            <option value="">Velg klasse</option>
            <?php
            $sql = "SELECT Klasse FROM klasse";
            $result = mysqli_query($db, $sql);
            if (!$result) {
                die("Feil ved henting av klasser: " . mysqli_error($db));
            }
            while ($row = mysqli_fetch_assoc($result)) {
                $klasse = htmlspecialchars($row["Klasse"], ENT_QUOTES, "UTF-8");
                echo "<option value=\"$klasse\">$klasse</option>";
            }
            ?>
        </select>
        <input type="submit" name="slett" value="Slett klasse">
    </form>
</html>
<?php
if (isset($_POST['slett'])) 
    {
        $klasse = $_POST['SlettKlasse'] ?? "";

        $sqlsetning = "DELETE FROM klasse WHERE Klasse = ?";
        $sqlResultat = mysqlquery($db, $sqlsetning); or die("Feil ved sletting av klasse: " . mysqli_error($db));
        $antallRader = mysqli_num_rows($sqlResultat);

        if ($antallRader == 0) 
            {
            print ("klassen finnes ikke i databasen.");
            } 
        else 
            {
            $sqlsetning = "DELETE FROM klasse WHERE Klasse = '$klasse'";
            mysqli_query($db, $sqlsetning) or die("Feil ved sletting av klasse: ");
            
            print ("Klassen $klasse er slettet fra databasen.");
            }
        }
<?php
include("db.tilkobling.php");
?>
<script src="functions.js"></script>
<html>
    <form method="post" action="" id="SlettKlasse" name="SlettKlasse">
        <select id="SlettKlasse" name="SlettKlasse" required>
            <option value="">Velg klasse</option>
            <?php
            $sql = "SELECT Klassekode FROM Klasse";
            $result = mysqli_query($db, $sql);
            if (!$result) {
                die("Feil ved henting av klasser: " . mysqli_error($db));
            }
            while ($row = mysqli_fetch_assoc($result)) {
                $klassekode = htmlspecialchars($row["Klassekode"], ENT_QUOTES, "UTF-8");
                echo "<option value=\"$klassekode\">$klassekode</option>";
            }
            ?>
        </select>
        <input type="submit" name="slett" value="Slett klasse">
    </form>
</html>
<?php
if (isset($_POST['slett'])) 
    {
        $klassekode = $_POST['SlettKlasse'] ?? "";
        if ($klassekode === "") {
            print("Vennligst velg en klasse å slette.");
        } else {
            $statement = mysqli_prepare($db, "DELETE FROM Klasse WHERE Klassekode = ?");
            if (!$statement) {
                die("Feil ved klargjøring av sletting: " . mysqli_error($db));
            }
            mysqli_stmt_bind_param($statement, "s", $klassekode);
            if (!mysqli_stmt_execute($statement)) {
                die("Feil ved sletting av klasse: " . mysqli_stmt_error($statement));
            }

            if (mysqli_stmt_affected_rows($statement) > 0) {
                $escapedKlassekode = htmlspecialchars($klassekode, ENT_QUOTES, "UTF-8");
                print("Klassen $escapedKlassekode er slettet fra databasen.");
            } else {
                print("Klassen finnes ikke i databasen.");
            }
            mysqli_stmt_close($statement);
        }
    }
?>
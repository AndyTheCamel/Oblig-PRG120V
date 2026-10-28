<?php
include("db.tilkobling.php");
?>
<script src=funksjon.js></script>
<!DOCTYPE html>
<html>  
    <form method="post" action="" id="SlettStudent" name="SlettStudent">
 	 Brukernavn <select id="Brukernavn" name="Brukernavn" required>
            <option value="">Velg brukernavn</option>
            <?php
            $sql = "SELECT brukernavn FROM student2";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["brukernavn"] . "'>" . $row["brukernavn"] . "</option>";
                }
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
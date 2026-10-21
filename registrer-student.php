<?php include("db.tilkobling.php"); ?>  
<?php require("funksjon.php"); ?>
<!DOCTYPE html>
<html>  
    <form method="post" action="" id="RegistrerStudent" name="RegistrerStudent">
 	 Brukernavn <input type="text" id="Brukernavn" name="Brukernavn" required /> <br/>
  	 Fornavn <input type="text" id="Fornavn" name="Fornavn" required /> 
   	 Etternavn <input type="text" id="Etternavn" name="Etternavn" required /> <br/>
     Klassekode
     <select name="Klassekode" id="Klassekode" required>
            <option value="">Velg klassekode</option>
            <?php
                $klassekoder = getKlassekode();
                foreach ($klassekoder as $klassekode) {
                    echo "<option value=\"$klassekode\">$klassekode</option>";
                }
            ?>
     </select>
   	 <input type="submit" value="Registrer" id="Registrer" name="Registrer"/>
     <input type="reset" value="Nullstill" id="Nullstill" name="Nullstill" /> <br /> </form>
</html>     
<?php
    if (isset($_POST["Registrer"]))
      {
        $Brukernavn = isset($_POST["Brukernavn"]) ? $_POST["Brukernavn"] : "";
        $Fornavn = isset($_POST["Fornavn"]) ? $_POST["Fornavn"] : "";
        $Etternavn = isset($_POST["Etternavn"]) ? $_POST["Etternavn"] : "";
        $Klassekode = isset($_POST["Klassekode"]) ? $_POST["Klassekode"] : "";

        if (!$Brukernavn || !$Fornavn || !$Etternavn || !$Klassekode)
            {
                print("Alle feltene m&aring; fylles ut");
            }
        else
            {
                $sqlSetning="SELECT * FROM student2 WHERE Brukernavn='$Brukernavn';";
                $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
                $antallRader=mysqli_num_rows($sqlResultat);
                if ($antallRader !=0)
                    {
                        print("Studenten er allerede registrert i databasen");
                    }
                else
                    {
                        $sqlSetning="INSERT INTO student2 VALUES('$Brukernavn','$Fornavn','$Etternavn','$Klassekode');";
                        mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; registrere data i databasen");
                    }
                print("Følgende data er registrert: $Brukernavn, $Fornavn, $Etternavn, $Klassekode");
            }
      }
?>
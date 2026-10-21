<?php include("db.tilkobling.php"); ?>  
<?php require("funksjon.php"); ?>
<!DOCTYPE html>
<html>  
    <form method="post" action="" id="RegistrerStudent" name="RegistrerStudent">
 	 Brukernavn <input type="text" id="Brukernavn" name="Brukernavn" required /> <br/>
  	 Fornavn <input type="text" id="Fornavn" name="Fornavn" required /> 
   	 Etternavn <input type="text" id="Etternavn" name="Etternavn" required /> <br/>
     Klassekode   <select name="Klassekode" id="Klassekode" required> <br/>
            <option value="">Velg klassekode</option> <br/>
            <?php
                $klassekoder = getKlassekode();
                foreach ($klassekoder as $klassekode) {
                    echo "<option value=\"$klassekode\">$klassekode</option>";
                }
            ?>
   	 <input type="submit" value="Registrer" id="Registrer" name="Registrer"/>
     <input type="reset" value="Nullstill" id="Nullstill" name="Nullstill" /> <br /> </form>
</html>     
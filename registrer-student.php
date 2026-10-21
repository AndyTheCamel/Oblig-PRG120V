<?php
include("db.tilkobling.php");
?>  
<!DOCTYPE html>
<html>  
    <form method="post" action="" id="RegistrerStudent" name="RegistrerStudent">
 	 Brukernavn <input type="text" id="Brukernavn" name="Brukernavn" required />
  	 Fornavn <input type="text" id="Fornavn" name="Fornavn" required /> <br/>
   	 Etternavn <input type="text" id="Etternavn" name="Etternavn" required /> <br/>
     Klassekode   <select name="Klassekode" id="Klassekode" required>
            <option value="">Velg klassekode</option>
   	 <input type="submit" value="Registrer" id="Registrer" name="Registrer"/>
     <input type="reset" value="Nullstill" id="Nullstill" name="Nullstill" /> <br /> </form>
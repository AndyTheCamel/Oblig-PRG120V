<?php
	include("db.tilkobling.php");
	?>
<!DOCTYPE html>
<html>  
	<form method="post" action="" id="registrerPoststedSkjema" name="registrerPoststedSkjema">
 	 Klassekode <input type="text" id="Klassekode" name="Klassekode" required />
  	 Klassenavn <input type="text" id="Klassenavn" name="Klassenavn" required /> <br/>
   	 Studiumkode <input type="text" id="Studiumkode" name="Studiumkode" required /> <br/>
   	 <input type="submit" value="Registrer" id="Registrer" name="Registrer"/ >
      	 <input type="reset" value="Nullstill" id="Nullstill" name="Nullstill" /> <br /> </form>
</html>

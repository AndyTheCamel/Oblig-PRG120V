<?php
	include("db.tilkobling.php");
	?>
<!DOCTYPE html>
<html>  
	<form method="post" action="" id="RegistrerStudent" name="RegistrerStudent">
 	 Klassekode <input type="text" id="Klassekode" name="Klassekode" required />
  	 Klassenavn <input type="text" id="Klassenavn" name="Klassenavn" required /> <br/>
   	 Studiumkode <input type="text" id="Studiumkode" name="Studiumkode" required /> <br/>
   	 <input type="submit" value="Registrer" id="Registrer" name="Registrer"/ >
      	 <input type="reset" value="Nullstill" id="Nullstill" name="Nullstill" /> <br /> </form>
</html>

<?php
	if (isset($_POST ["RegistrerStudent"]))
	  {
		$Klassekode=$_POST["Klassekode"];
		$Klassenavn=$_POST["Klassenavn"];
		$Studiumkode=$_POST["Studiumkode"];
	if (!$Klassekode || !$Klassenavn || !$Studiumkode)
		{
			print("B&aring;de postnr og poststed m&aring; fylles ut");
		}
	else 
		{
			include("db.tilkobling.php");
		$sqlsetning="SELECT * FROM Klasse WHERE Klassekode='$Klassekode';";
		$resultat=mysqli_query($db,$sqlsetning);
		}
?>
		 	

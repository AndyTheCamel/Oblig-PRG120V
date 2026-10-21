<?php
	include("db.tilkobling.php");
	?>
<!DOCTYPE html>
<html>  
	<form method="post" action="" id="RegistrerStudent" name="RegistrerStudent">
 	 Klassekode <input type="text" id="Klassekode" name="Klassekode" required />
  	 Klassenavn <input type="text" id="Klassenavn" name="Klassenavn" required /> <br/>
   	 Studiumkode <input type="text" id="Studiumkode" name="Studiumkode" required /> <br/>
   	 <input type="submit" value="Registrer" id="Registrer" name="Registrer"/>
      	 <input type="reset" value="Nullstill" id="Nullstill" name="Nullstill" /> <br /> </form>
</html>

<?php
	if (isset($_POST["Registrer"]))
	  {
		$Klassekode = isset($_POST["Klassekode"]) ? $_POST["Klassekode"] : "";
		$Klassenavn = isset($_POST["Klassenavn"]) ? $_POST["Klassenavn"] : "";
		$Studiumkode = isset($_POST["Studiumkode"]) ? $_POST["Studiumkode"] : "";

		if (!$Klassekode || !$Klassenavn || !$Studiumkode)
			{
				print("B&aring;de klassekode, klassenavn og studiumkode m&aring; fylles ut");
			}
		else
			{
				$sqlSetning="SELECT * FROM Klasse WHERE Klassekode='$Klassekode';";
				$sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
				$antallRader=mysqli_num_rows($sqlResultat);
				if ($antallRader !=0)
					{
						print("Klassen er allerede registrert i databasen");
					}
				else
					{
						$sqlSetning="INSERT INTO Klasse VALUES('$Klassekode','$Klassenavn','$Studiumkode');";
						mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; registrere data i databasen");
					}
				print("Følgende data er registrert: KLassekode: $Klassekode, Klassenavn: $Klassenavn, Studiumkode: $Studiumkode");
			}
	  }
?>
		 	

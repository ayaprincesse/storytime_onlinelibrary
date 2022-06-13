<?php 

require "dbh_inc.php";

$sql ="SELECT * FROM livre LIMIT 8";
		$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql)) // checking if it worked 
	    {
	    header ("Location: ../index.php?error=sqlerror10");
		exit();
	    }
	 else 
	   {
		 mysqli_stmt_execute($stmt);
		 $result=mysqli_stmt_get_result($stmt);
		 if (mysqli_num_rows($result)==8)
		 {
				echo "<table border='0'> ";

				while($row = mysqli_fetch_array($result))
				{
				echo "<tr >";
				echo "<td> <img src=".$row['Photo']." width='200' height='200'/> </td>";
				echo "<td> Titre : " . $row['Titre'] . " </br> Nom d'auteur : " . $row['NomAuteur'] . " </br> Genre : " . $row['Genre'] . "  </td>";
				
				echo "</tr>";
				}
				echo "</table>";

		 }
	   }


?>
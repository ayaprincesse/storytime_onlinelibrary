<?php 

require "dbh_inc.php";

$sql ="SELECT * FROM livre";
		$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql)) // checking if it worked 
	    {
	    header ("Location: ../userhome.php?error=sqlerror10");
		exit();
	    }
	 else 
	   {
		 mysqli_stmt_execute($stmt);
		 $result=mysqli_stmt_get_result($stmt);
		 while ($row = mysqli_fetch_array($result))
		 {
			    $id = $row['Id'];
				echo '<tr>';
				echo "<td> <img src=".$row['Photo']." width='200' height='200'/> </td>";
				echo "<td> Titre : " . $row['Titre'] ." </br> 
             			   Nom de l'auteur : " . $row['NomAuteur'] . "</br> 
						   Genre : ". $row['Genre']. "</br> 
						   Nombre de lectures : ". $row['NbrVue'] . "</br> </td>";
				echo '<td> <form action="bookdetails.php" method="post" > 
				<input type="hidden" name="livreid" value='.$id.'>
				<button class="userlistebtn" type="submit" name="viewdetailsubmit">Détails</button>
				</form> </td> ';
				echo '<td> <form action="includes/addbooktouserbiblio.php" method="post" > 
				<input type="hidden" name="livreid" value='.$id.'>
				<button class="userlistebtn" type="submit" name="addbooksubmit">Ajouter à ma Bibliothèque</button>
				</form> </td> ';
				
				echo ' </tr>';
		  }
				

		 }
	   
?>
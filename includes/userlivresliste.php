<?php 

require "dbh_inc.php";
$username = $_SESSION['username'];
$sql ="SELECT * From Livre where id in ( Select livreid FROM livreinuserbiblio Where biblioid in (select biblioid from utilisateurs where login='$username' ))";
		$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql)) // checking if it worked 
	    {
	    header ("Location: userbiblio.php?error=sqlerror13");
		exit();
	    }
	 else 
	   {
		 mysqli_stmt_execute($stmt);
		 $result = mysqli_stmt_get_result($stmt);
		 if(mysqli_num_rows($result)==0)
		 { echo "<h2>Vous n'avez pas encore ajouté un livre à votre bibliotheque ! </h2>";}
	     else{
			 
		 echo '<h2> Votre liste de livres : </h2>';
		 echo '<table >';
		 while ($row = mysqli_fetch_array($result))
		 {    
	            $id = $row['Id'] ;
			    echo '<tr>';
				echo "<td> <img src=".$row['Photo']." width='150' height='150'/> </td>";
				echo "<td> Titre : " . $row['Titre'] ." </br> 
             			   Nom de l'auteur : " . $row['NomAuteur'] . "</br> 
						   Genre : ". $row['Genre']. "</br> 
              			   Description : " . $row['Description']. " </br>
						   Nombre de lectures : ". $row['NbrVue'] . "</br></td> ";
				echo ' <td> <form action="includes/addviewtobook.php" method="post" > 
				<input type="hidden" name="livreid" value='.$id.'>
				<button type="submit" name="addviewsubmit" class="userlistebtn">Commencer la lecture !</button>
				</form> </td>';
				echo '<td> <form action="includes/removebookfromuserbiblio.php" method="post" > 
				<input type="hidden" name="livreid" value='.$id.'>
				<button type="submit" name="removebook" class="userlistebtn">Supprimer de ma bibliothèque</button>
				</form> </td>';
				echo ' </tr> ';
		  }
		  echo '</table></br>';
	      }	

		 }
	   
?>
<?php 
require "includes/dbh_inc.php";
require "header.php";
?>

<!doctype html>
<html>

<head><link rel="stylesheet" href="styles/detailstyle.css"/></head>
<body>
</br>
<?php 
$livreid = $_POST['livreid'];
$sql ="SELECT * FROM livre where id='$livreid'";
		$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql)) // checking if it worked 
	    {
	    header ("Location: bookdetails?error=sqlerror16");
		exit();
	    }
	 else 
	   {
		 mysqli_stmt_execute($stmt);
		 $result=mysqli_stmt_get_result($stmt);
		 echo '<table  >';
		 while ($row = mysqli_fetch_array($result))
		 {
			    $id = $row['Id'];
				//echo "<tr> <th></th> <th>Titre </th> <th><Nom de l'auteur </th> <th>Genre </th> <th>Nombre de lectures </th> <th>Description </th> </tr>";
				
				echo "<tr><td id='td1'> <img src=".$row['Photo']." width='250' height='250'/> </td>";
				echo "<td id='td2'> Titre :". $row['Titre'] ." </br>";
				echo "Nom de l'auteur :". $row['NomAuteur'] ."</br> ";
				echo "Genre :". $row['Genre'] ." </br>";
				echo "Nombre de lectures :". $row['NbrVue'] ." </td>";
				echo "<td id='td3'>Description :". $row['Description'] ." </td> ";
				echo '<td id="td4"> <form action="includes/addbooktouserbiblio.php" method="post" > 
				<input type="hidden" name="livreid" value='.$id.'>
				<button class="userlistebtn" type="submit" name="addbooksubmit">Ajouter à ma Bibliothèque</button>
				</form> </td> </tr>';
				
		 }
		 echo '</table>';
	   }
?>
</br>
<a href="userhome.php" >Retour</a>

</body>
</html>
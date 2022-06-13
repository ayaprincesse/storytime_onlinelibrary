<?php 
require "includes/dbh_inc.php";
require "header.php";
$nom = $_SESSION['nom'];
$prenom = $_SESSION['prenom'];
?>

<!doctype html>
<html>
<head><link rel="stylesheet" href="styles/style3.css"/></head>
<body>
<?php echo "<div id='welcome'><H1> Bienvenue ".$nom." ". $prenom." </h1></div>"; ?>

<div id="recherche">
<form action="" method="post">
Recherche par : 
<select name="recherches">
		<option value="nom">Titre du livre</option> 
		<option value="auteur">Nom d'auteur</option> 
		<option value="genre">Genre</option></select>
<input type="text"  Name="indice" />
<input type="submit" name="recherchersubmit" value="Rechercher livre" class="userlistebtn"/>
</form>
</div>
<?php 
require "sidebar.php";
?>
<?php 
if (isset($_POST['recherchersubmit']))
{
	
require "includes/dbh_inc.php";


$recherchepar = $_POST['recherches'];
$indice = $_POST['indice'];

$sql=" ";
if($recherchepar=="nom")
{ $sql= "select * from livre where Titre ='$indice'"; }
	else if ($recherchepar=="auteur")
	{ $sql= "select * from livre where NomAuteur ='$indice'" ;}
		else 
		{ $sql= "select * from livre where Genre ='$indice'" ;}

		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt,$sql)) // checking if it worked 
			{
			header ("Location: ../userhome.php?error=sqlerror17");
			exit();
			}
			else 
		{
		 mysqli_stmt_execute($stmt);
		 $result=mysqli_stmt_get_result($stmt);
		 if(mysqli_num_rows($result)==0)
		 { if($recherchepar=="nom") { echo " <p> Titre introuvable </p>"; }
				else if ($recherchepar=="auteur") { echo " <p> Auteur introuvable </p>" ;}
						else { echo "<p> Genre introuvable </p>";}
		 }
	     else{
			 echo "</br> <table border='0' >";
		 while ($row = mysqli_fetch_array($result))
		 {
			    $id = $row['Id'];
				echo '<tr  class="tablerecherche">';
				echo "<td> <img src=".$row['Photo']." width='200' height='200'/> </td>";
				echo "<td> Titre : " . $row['Titre'] ." </br> 
             			   Nom de l'auteur : " . $row['NomAuteur'] . "</br> 
						   Genre : ". $row['Genre']. "</br> 
						   Nombre de lectures : ". $row['NbrVue'] . "</br> </td>";
				echo '<td> <form action="bookdetails.php" method="post" > 
				<input type="hidden" name="livreid" value='.$id.'>
				<button class="userlistebtn" type="submit" name="viewdetailsubmit" >Détails</button>
				</form> </td>';
				echo '<td> <form action="includes/addbooktouserbiblio.php" method="post" > 
				<input type="hidden" name="livreid" value='.$id.'>
				<button class="userlistebtn" type="submit" name="addbooksubmit">Ajouter à ma Bibliothèque</button>
				</form> </td>';
				
				echo '</tr>';
		  } 
			echo '</table>  </br>';

		 }
	   }
}
?>




<p align="center" class="pp"> Ajouter à votre bibliothèque pour pouvoir lire un ouvrage ! <p>

<table align='center' >
<?php 
require "includes/fulllivresliste.php";
?>
</table>

<?php 
require "footer.php";
?>

</body>
</html>

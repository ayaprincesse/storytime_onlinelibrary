<?php
require 'includes/dbh_inc2.php' ;
$Id=$_GET['Id'];
//$requete0="select * from livre where Id='$Id'";
//$resultat0=mysqli_query($connexion,$requete0);
//$ligne=mysqli_fetch_assoc($resultat0);
$requete='delete from Administrateurs where Id="'.$Id.'"';
$stmt = mysqli_stmt_init($connexion); //init stants for initilise to tie the stmt to our db
						 if(!mysqli_stmt_prepare($stmt,$requete)) // checking if it didnt work
						 {
						 header ("Location: gereradmins.php?error=sqlerror40");
						 exit();
						  }
						 else 
						  {   mysqli_stmt_execute($stmt);
					          header("location: gereradmins.php");
				               exit();
						  }		  

?>

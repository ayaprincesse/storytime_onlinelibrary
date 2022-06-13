<?php
require 'includes/dbh_inc2.php' ;
$Id=$_GET['Id'];
//$requete0="select * from livre where Id='$Id'";
//$resultat0=mysqli_query($connexion,$requete0);
//$ligne=mysqli_fetch_assoc($resultat0);
$requete='delete from livre where Id="'.$Id.'"';
$resultat=mysqli_query($connexion,$requete);
header("location:admin.php");

?>

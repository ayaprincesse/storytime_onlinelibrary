<?php
require 'includes/dbh_inc2.php' ;
$Id=$_POST['Id'];
$Titre=$_POST['Titre'];
$NomAuteur=$_POST['NomAuteur'];
$Genre=$_POST['Genre'];
$Description=$_POST['Description'];
/*$nom_photo=$_FILES['photo']['name'];
$chemin_dest="images/".$nom_photo;
$chemin_source=$_FILES['photo']['name_tmp'];
move_uploaded_file($chemin_source,$chemin_dest);*/
$requete='update livre set Titre="'.$Titre.'", NomAuteur="'.$NomAuteur.'", Genre="'.$Genre.'", Description="'.$Description.'" where id="'.$Id.'"';
$resultat=mysqli_query($connexion,$requete);
header("location:admin.php");

?>
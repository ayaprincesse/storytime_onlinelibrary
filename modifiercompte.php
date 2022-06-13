<?php

require 'includes/dbh_inc2.php' ;include "includes/dbh_inc2.php" ;
session_start();

if(isset($_POST['Modifier_submit']))
{
$Id=$_SESSION['id'];
$Nom=$_POST['Nom'];
$Prenom=$_POST['Prenom'];
$Login=$_POST['Login'];
$Email=$_POST['Email'];
$Tel=$_POST['Tel'];
$Mdp=$_POST['Mdp'];
/*
$req2 = "SELECT * FROM administrateurs WHERE Id='$Id'";
$result2=mysqli_query($connexion,$req2);
$row2=mysqli_fetch_array($result2);
$res=$row2['Id'];
if($res==$Id){
	*/
	
$requete='update administrateurs set Nom="'.$Nom.'",Prenom="'.$Prenom.'",Login="'.$Login.'",Email="'.$Email.'", Tel="'.$Tel.'", Mdp="'.$Mdp.'" WHERE Id="'.$Id.'"';
$resultat=mysqli_query($connexion,$requete);

header("location:admin.php");
exit();
}
else {header("location:edit2.php"); exit();}

?>
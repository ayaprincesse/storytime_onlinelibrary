<?php
require 'includes/dbh_inc2.php' ;
require "adminheader.php" ;
/*if(isset($_SESSION['login'])){
require '';*/
if(isset($_POST['ajouter'])){ //debut de si il ya un champ vide
$erreur='';
if(empty($_POST['Titre'])){
	$erreur .-"titre vide";
	}
	else{
	$Titre = $_POST['Titre'];}
	
	if(empty($_POST['NomAuteur'])){
	$erreur .-"auteur vide";
	}
	else{
	$NomAuteur = $_POST['NomAuteur'];}
	
	if(empty($_POST['Genre'])){
	$erreur .-"genre vide";
	}
	else{
	$Genre = $_POST['Genre'];}
	
	$Description=$_POST['Description'];
	
    $Description = str_replace(array("'", "\"", "&quot;"), "", htmlspecialchars($Description) );
	
	
	$nom_photo=$_FILES['maphoto']['name'];
	$chemin_bdd="images/".$nom_photo;
	$chemin_tmp=$_FILES['maphoto']['tmp_name'];
	move_uploaded_file($chemin_tmp,$chemin_bdd);
	
	if (!empty($erreur)){
		header("location : admin.php?err=$erreur");
		exit(); // fin de si il y a un champ libre 
	}else {
	$req = "SELECT count(*) FROM livre WHERE Titre='$Titre' AND NomAuteur='$NomAuteur' AND Genre='$Genre' ";
    $result = mysqli_query($connexion,$req);
	$row= mysqli_fetch_array($result);
	if($row[0] == 1){header("location : admin.php?doublon='doublon detecté'");}
	else {
	$ajout ="INSERT INTO livre (Titre, NomAuteur, Genre, Description , Photo ) VALUES ('$Titre', '$NomAuteur', '$Genre', '$Description' ,'$chemin_bdd')";

	mysqli_query($connexion,$ajout);
	header ("location: admin.php");
	exit();
		}
}}
?>

<html>
<head>
<link rel="stylesheet" href="styles/addbookstyle.css" ></head>
<main align="center">
<h2>Ajouter un livre</h2>


<form method='POST' action="" enctype="multipart/form-data" align="center">
<table>
<tr>
<td>Titre : </td>
<td><input class="suinput"  type="text" name="Titre" placeholder="Titre"/></td></tr>

<tr><td>Auteur : </td>
<td><input class="suinput"  type="text" name="NomAuteur" placeholder="Nom d'auteur"/></td></tr>

<tr><td>Genre : </td>
<td><input  class="suinput" type="text" name="Genre" placeholder="Genre"/></td></tr>

<tr><td>Description : </td>
<td><textarea class="suinput"  rows="4" cols="50" name="Description" placeholder="Description" ></textarea> </td></tr>


<tr><td>Ajouter une image : </td>
<td><input  type="file" name="maphoto" /></td></tr>

<tr><td><input class="subtn"  type="submit" name="ajouter" value="Ajouter Livre"/></td>

</tr></table></form>

</main>
<a href='admin.php'>Retour</a>

</html>
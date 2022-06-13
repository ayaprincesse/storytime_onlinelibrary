<?php
session_start();
require 'includes/dbh_inc2.php' ;



if(isset($_POST['Modifier'])){ //debut de si il ya un champ vide
$erreur='';

$Id=$_GET['Id'];
if(empty($_POST['Nom'])){
	$erreur .-"nom vide";
	}
	else{
	$Nom = $_POST['Nom'];}
	
	if(empty($_POST['Prenom'])){
	$erreur .-"Prenom vide";
	}
	else{
	$Prenom = $_POST['Prenom'];}
	
	if(empty($_POST['Login'])){
	$erreur .-"Login vide";
	}
	else{
	$Login = $_POST['Login'];}
	
	if(empty($_POST['Email'])){
	$erreur .-"Email vide";
	}
	else{
	$Login = $_POST['Email'];}
	
	if(empty($_POST['Tel'])){
	$erreur .-"Tel vide";
	}
	else{
	$Tel = $_POST['Tel'];}
	if(empty($_POST['Mdp'])){
	$erreur .-"Mdp vide";
	}
	else{
	$Tel = $_POST['Mdp'];}
	
	
	if (!empty($erreur)){
		header("location : admin.php?err=$erreur");
		exit(); // fin de si il y a un champ libre 
	}else {
	$req = "SELECT count(*) FROM administrateurs WHERE Nom='$Nom' AND Prenom='$Prenom' AND Login='$login' AND Email='$Email' AND Tel='$Tel' AND Mdp='$Mdp' ";
    $result = mysqli_query($connexion,$req);
	$row= mysqli_fetch_array($result);
	if($row[0] == 1){header("location : admin.php?doublon=doublon detecté");}
	else {
	$ajout ="update administrateurs set Nom='$Nom',Prenom='$Prenom',Login='$Login',Email='$Email', Tel='$Tel', Mdp='$Mdp' WHERE Id='$Id'";
	mysqli_query($connexion,$ajout);
	header ("location: admin.php");
	exit();
		}
}}
?>









//edit

<html>
<head>
<title>Editer2</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php
session_start();
require 'includes/dbh_inc2.php' ;

$Id=$_GET['Id'];
$req2 = "SELECT * FROM administrateurs WHERE Id='$Id'";
$result2=mysqli_query($connexion,$req2); //executer une commande sql qui se trouve dans la var req
$row2=mysqli_fetch_array($result2);
?>

<form name="form2" method="post" action="modifiercompte" enctype="multipart/form-data">
Id :<input type="number" value="<?php echo $row2['Id']?>" name="Id" size="50" readonly="yes" /><br>
Nom :<input type=text value="<?php echo $row2['Nom']?>" name="Nom"  /><br>
Prenom :<input type="text" value="<?php echo $row2['Prenom']?>" name="Prenom"  /><br>
Login :<input type="text" value="<?php echo $row2['Login']?>" name="Login"  /><br>
Email :<input type="email" value="<?php echo $row2['Email']?>" name="Email"  /><br>
Tel :<input type="tel" value="<?php echo $row2['Tel']?>" name="Tel"  /><br>
Mdp :<input type="password" value="<?php echo $row2['Mdp']?>" name="Mdp"  /><br>
<input type="submit" value="Modifier" />
</form>
</body></html>
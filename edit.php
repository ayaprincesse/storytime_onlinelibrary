<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Editer</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="styles/addbookstyle.css" >
</head>

<body>
<?php
require 'includes/dbh_inc2.php' ;
$Id=$_GET['Id'];
$requete="select * from livre where Id=$Id";
$resultat=mysqli_query($connexion,$requete);
$ligne=mysqli_fetch_array($resultat);
?>

<main align="center">
<h2>Modifier le livre </h2>
<img src="<?php echo $ligne['Photo']?>" width="200" height="200"/>
<form name="form1" method="post" action="modifier.php" enctype="multipart/form-data">
<table>

<tr><td>Id : </td> <td><input class="suinput" type="number" value="<?php echo $ligne['Id']?>" name="Id" size="50" readonly="yes" /></td> </tr>
<tr><td>Titre : </td> <td><input class="suinput" type="text" value="<?php echo $ligne['Titre']?>" name="Titre" size="50" readonly="yes" /></td></tr> 
<tr><td>NomAuteur : </td> <td><input class="suinput" type="text" value="<?php echo $ligne['NomAuteur']?>" name="NomAuteur" size="50" /></td> </tr>
<tr><td>Genre : </td> <td><input class="suinput" type="text" value="<?php echo $ligne['Genre']?>" name="Genre" size="20" /></td> </tr>
<tr><td>Description : </td> <td><input size="70" class="suinputdescribe" type="text" value="<?php echo $ligne['Description']?>" name="Description" size="1000" /></td></tr> 
<tr><td><input type="submit" value="Modifier" class="subtn" /></td></tr>
</table>
</form>
</main>
<a href='admin.php'>Retour</a>
</body>
</html>
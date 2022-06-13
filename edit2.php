<?php

require 'includes/dbh_inc2.php' ;
require "adminheader.php" ;

$id=$_SESSION['id'];

$req2 = 'SELECT * FROM administrateurs WHERE Id="'.$id.'"';

$result2=mysqli_query($connexion,$req2);
$ligne=mysqli_fetch_array($result2);

?>
<html>
<head>
<title>Editer2</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<link rel="stylesheet" href="styles/addbookstyle.css" >
</head>

<body>
<main id="zmain">

<form name="form2" method="post" action="modifiercompte.php" enctype="multipart/form-data">
<table>
<tr><td>Nom :</td><td><input class="suinput" type="text " name="Nom" value="<?php echo $ligne['Nom']?>" /></td></tr>
<tr><td>Prenom :</td><td><input class="suinput"type="text" name="Prenom" value="<?php echo $ligne['Prenom']?>" /></td></tr>
<tr><td>Login :</td><td><input class="suinput"type="text"  name="Login" value="<?php echo $ligne['Login']?>" /></td></tr>
<tr><td>Email :</td><td><input class="suinput"type="text"  name="Email" value="<?php echo $ligne['Email']?>" /></td></tr>
<tr><td>Tel :</td><td><input class="suinput"type="text"  name="Tel"  value="<?php echo $ligne['Tel']?>" /></td></tr>
<tr><td>Mdp :</td><td><input class="suinput" type="text"  name="Mdp"  value="<?php echo $ligne['Mdp']?>"/></td></tr>
<tr><td><input type="submit" class="subtn" name="Modifier_submit" value="Modifier" /><td></tr>
</table></form>
</main>
<a href="admin.php">Retour</a>
</body></html>
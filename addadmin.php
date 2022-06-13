<html>
<head><link rel="stylesheet" href="styles/addbookstyle.css" ></head>
<body>


<div align="center" id="divaddadmin">
<h2>Ajouter un administrateur</h2>


<?php
if (isset($_GET['error']))
{
	
	if ($_GET['error']=='emptyfields')
	{echo '<p align="center">Veuillez remplir tous les cases!!</p>' ; }
	
	else if($_GET['error']=='invalidLogin')
	{echo '<p align="center">Verifier votre nom d utilisateur (LOGIN) !</p>' ;}
	
	else if ($_GET['error']=='invalidMail')
	{echo '<p align="center">Votre adresse mail n est pas valide!</p> ' ;}
	
	else if ($_GET['error']=='invalidTel')
	{echo '<p align="center">Votre num de tel n est pas valide!</p> ' ;}
	
	
	else if ($_GET['error']=='admintaken')
	{echo '<p align="center">ce nom d administrateur existe dèja</p>' ;}
}
else if( (isset($_GET['adminsignup'])) && ($_GET['adminsignup']=='success') )
{	
echo '<p align="center">ce compte a été crée avec succés !</p>' ;
}

?>

<form method='POST' action="addadmintraitement.php">
<table>
<tr>
<td>Nom : </td>
<td><input class="suinput"  type="text" name="Nom" 
			Value="<?php 
			if ((isset($_GET['error']))&& ($_GET['error']=='emptyfields') && (empty($_GET['Nom'])==false)) {echo $_GET['Nom']; }
			if ((isset($_GET['error']))&&($_GET['error']=='invalidLogin')) {echo $_GET['Nom']; }
			if ((isset($_GET['error']))&&($_GET['error']=='invalidTel')) {echo $_GET['Nom']; }
			if ((isset($_GET['error']))&&($_GET['error']=='invalidMail')) {echo $_GET['Nom']; }
			if ((isset($_GET['error']))&& ($_GET['error']=='admintaken')) {echo $_GET['Nom'];}
            ?>"
			/></td></tr>

<tr><td>Prenom : </td>
<td><input class="suinput" type="text" name="Prenom"
			Value="<?php 
			if ((isset($_GET['error']))&& ($_GET['error']=='emptyfields') && (empty($_GET['Prenom'])==false)) { echo $_GET['Prenom'];} 
			if ((isset($_GET['error']))&&($_GET['error']=='invalidLogin')) {echo $_GET['Prenom']; }
			if ((isset($_GET['error']))&&($_GET['error']=='invalidTel')) {echo $_GET['Prenom']; }
			if ((isset($_GET['error']))&&($_GET['error']=='invalidMail')) {echo $_GET['Prenom']; }
			if ((isset($_GET['error']))&& ($_GET['error']=='admintaken')) {echo $_GET['Prenom'];}
	        ?>"
			/></td></tr>

<tr><td>Email : </td>
<td><input class="suinput" type="text" name="Email"
			Value="<?php 
			if ((isset($_GET['error']))&& ($_GET['error']=='emptyfields') && (empty($_GET['Mail'])==false)) {echo $_GET['Mail'];}
			if ((isset($_GET['error']))&&($_GET['error']=='invalidLogin')) {echo $_GET['Mail']; } 
			if ((isset($_GET['error']))&&($_GET['error']=='invalidTel')) {echo $_GET['Mail']; } 
	        ?>" 
			/></td></tr>

<tr><td>Tel : </td>
<td><input class="suinput" type="text" name="Tel" /></td></tr>

<td>Login : </td>
<td><input class="suinput" type="text" name="Login" 
			Value="<?php 
			if ((isset($_GET['error']))&&($_GET['error']=='invalidMail')) {echo $_GET['Login'];} 
			if ((isset($_GET['error']))&& ($_GET['error']=='emptyfields') && (empty($_GET['Login'])==false)) {echo $_GET['Login'];} 
			if ((isset($_GET['error']))&&($_GET['error']=='invalidTel')) {echo $_GET['Login']; } 
			?>"
			/></td></tr>

<td>Mdp : </td>
<td><input class="suinput" type="text" name="Mdp" /></td></tr>

<tr><td><input class="subtn" type="submit" name="ajouteradmin" value="Ajouter" /></td>

</tr></table>
</form>
</div>
<a href='gereradmins.php'>Retour</a>

</body>
</html>
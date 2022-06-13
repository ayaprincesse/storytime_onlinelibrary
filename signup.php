<?php 
require "header.php";
?>
<html>
<head>
<link rel="stylesheet" href="styles/style2.css"/>
</head>
<main align="center" >
<h1 align="center">SIGN UP :</h1>

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
	
	else if ($_GET['error']=='passwordunmatch')
	{echo '<p align="center">votre mot de passe n est pas confirmé correctement </p>' ;}
	
	else if ($_GET['error']=='usertaken')
	{echo '<p align="center">ce nom d utilisateur existe dèja</p>' ;}
}
else if( (isset($_GET['signup'])) && ($_GET['signup']=='success') )
{	
echo '<p align="center">Votre compte a été crée avec succés !</p>' ;
}

?>

<form action="includes/signup_inc.php" method="post" align="center">

			<input class="suinput" type="text" name="Nom"  placeholder="Nom" 
			Value="<?php 
			if ((isset($_GET['error']))&& ($_GET['error']=='emptyfields') && (empty($_GET['Nom'])==false)) {echo $_GET['Nom']; }
			if ((isset($_GET['error']))&&($_GET['error']=='invalidLogin')) {echo $_GET['Nom']; }
			if ((isset($_GET['error']))&&($_GET['error']=='invalidTel')) {echo $_GET['Nom']; }
			if ((isset($_GET['error']))&&($_GET['error']=='invalidMail')) {echo $_GET['Nom']; }
			if ((isset($_GET['error']))&& ($_GET['error']=='passwordunmatch')) {echo $_GET['Nom'];}
			if ((isset($_GET['error']))&& ($_GET['error']=='usertaken')) {echo $_GET['Nom'];}
            ?>"
			>

			<br>
			<input class="suinput"  type="text" name="Prenom"  placeholder="Prenom" 
			Value="<?php 
			if ((isset($_GET['error']))&& ($_GET['error']=='emptyfields') && (empty($_GET['Prenom'])==false)) { echo $_GET['Prenom'];} 
			if ((isset($_GET['error']))&&($_GET['error']=='invalidLogin')) {echo $_GET['Prenom']; }
			if ((isset($_GET['error']))&&($_GET['error']=='invalidTel')) {echo $_GET['Prenom']; }
			if ((isset($_GET['error']))&&($_GET['error']=='invalidMail')) {echo $_GET['Prenom']; }
			if ((isset($_GET['error']))&& ($_GET['error']=='passwordunmatch')) {echo $_GET['Prenom'];}
			if ((isset($_GET['error']))&& ($_GET['error']=='usertaken')) {echo $_GET['Prenom'];}
			?>" >

			<br>
			<input class="suinput" type="text" name="Mail"  placeholder="Email" 
			Value="<?php 
			if ((isset($_GET['error']))&& ($_GET['error']=='emptyfields') && (empty($_GET['Mail'])==false)) {echo $_GET['Mail'];}
			if ((isset($_GET['error']))&&($_GET['error']=='invalidLogin')) {echo $_GET['Mail']; } 
			if ((isset($_GET['error']))&&($_GET['error']=='invalidTel')) {echo $_GET['Mail']; } 
			if ((isset($_GET['error']))&& ($_GET['error']=='passwordunmatch')) {echo $_GET['Mail'];}
			if ((isset($_GET['error']))&& ($_GET['error']=='usertaken')) {echo $_GET['Mail'];}
			?>" >

			<br>
			<input class="suinput" type="text" name="Tel"  placeholder="Tel" >

			<br>
			<input class="suinput" type="text" name="Login"   placeholder="Login" 
			Value="<?php 
			if ((isset($_GET['error']))&&($_GET['error']=='invalidMail')) {echo $_GET['Login'];} 
			if ((isset($_GET['error']))&& ($_GET['error']=='emptyfields') && (empty($_GET['Login'])==false)) {echo $_GET['Login'];} 
			if ((isset($_GET['error']))&& ($_GET['error']=='passwordunmatch')) {echo $_GET['Login'];}
			if ((isset($_GET['error']))&&($_GET['error']=='invalidTel')) {echo $_GET['Login']; } 
			?>" >

			<br>
			<input class="suinput" type="password" name="pwd"  placeholder="Password" >

			<br>
			<input class="suinput"  type="password" name="confirm"  placeholder="Password Confirmation" >

			<br>
			<input class="subtn"  type="submit" name="signup_submit" value="GO !" >

</form>

</main>
<?php 
require "footer.php";
?> 
</html>
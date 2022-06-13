


<?php 
require "header.php";
?> 

<html>
<head>
<link rel="stylesheet" href="styles/style1.css"/>
</head>
<main>

<?php 

if(isset( $_SESSION['entry']) && $_SESSION['entry']=="user")
{   header ("Location: userhome.php");
    exit() ;	 
}
else if (isset($_GET['error']))
{
	if ($_GET['error']=='emptyfields')
	{echo '<p align="center">Veuillez remplir tous les cases!</p>' ; }
	
	else if($_GET['error']=='wrongpwd')
	{echo '<p align="center">Votre mot de passe est incorrect</p>' ;}
	
	else if ($_GET['error']=='NoUserNoadmin')
	{echo '<p align="center">Ce compte nexiste pas !</p> ' ;}
	
	echo "<p align=center >Vous n'etes pas connecté</p>" ;
}

?>
<div id="firstdiv" >
<div class="ele" id="mainele">
<!-- <img src="images/bookss.jpg" width='350' height='500' align='right'/> -->
<span id="secondspan" >
</br>
</br>
<h1 id="id1"> Bonjour et Bienvenue à StoryTime !</h1>
<h3 id="id2"> La plateforme sociale d’histoires narratives la plus appréciée en Afrique <h3>
</br>
</br>
<button class='btnx'><a href="#listelivres" > DECOUVREZ NOS LIVRES ! </a></button>
<button class='btnx'><a href="signup.php" > S'INSCRIRE </a></button>
</br>
</br>
</br>
</br>
</br>
</br>
</span>
</div>
</div>

</br>
</br></br>
</br>
<div id="listelivres">
<h2 id="id3"> Ayez une idée de nos ouvrages <h2>
<?php 
require "includes/minilivresliste.php";
?> 
</div>


</main>
<?php 
require "footer.php";
?>
<script>
window.onload = (event) => {
 
  var element = document.getElementById("mainele");
  element.classList.add("eletransition");

};
</script> 
</html>

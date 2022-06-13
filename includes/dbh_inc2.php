<?php 

/*$servername = "localhost";
$username = "root";
$dbpassword = "";
$dbname = "bib";

$conn = mysqli_connect($servername,$username,$dbpassword,$dbname);

if(!$conn)
{
die("connexion failed : ". mysqli_connect_error()) ;
}*/
$connexion = mysqli_connect ("localhost","root","");
mysqli_select_db($connexion,"sitebiblio");
?>

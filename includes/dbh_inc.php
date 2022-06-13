<?php 

$servername = "localhost";
$username = "root";
$dbpassword = "";
$dbname = "sitebiblio";

$conn = mysqli_connect($servername,$username,$dbpassword,$dbname);

if(!$conn)
{
die("connexion failed : ". mysqli_connect_error()) ;
}
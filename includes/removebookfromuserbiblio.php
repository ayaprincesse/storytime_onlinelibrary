<?php 

require "dbh_inc.php";
session_start();
$livreid = $_POST['livreid'];
$username = $_SESSION['username'];
$sql = "DELETE FROM livreinuserbiblio WHERE Livreid='$livreid' and BiblioId in (SELECT BiblioId from utilisateurs where login='$username' )";
$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql)) // checking if it worked 
	    {
	    header ("Location: ../userbiblio.php?error=sqlerror15");
		exit();
	    }
	 else 
	   {
		 mysqli_stmt_execute($stmt);
		 header ("Location: ../userbiblio.php");
		exit();
	   }
?>
		 
<?php 

require "dbh_inc.php";
session_start();
$livreid = $_POST['livreid'];

$sql ="UPDATE Livre SET NbrVue = NbrVue+1 WHERE Id='$livreid' "; 
		$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql)) // checking if it worked 
	    {
	    header ("Location: ../userhome.php?error=sqlerror14");
		exit();
	    }
	 else 
	   {
		 mysqli_stmt_execute($stmt);
		 header ("Location: ../userbiblio.php?add=success");
	   }
?>
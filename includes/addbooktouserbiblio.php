<?php 

require "dbh_inc.php";
session_start();
$livreid = $_POST['livreid'];
$biblioid = $_SESSION['biblioid'];


$sql ="Insert into livreinuserbiblio values ('$livreid','$biblioid') "; 
		$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql)) // checking if it worked 
	    {
	    header ("Location: ../userhome.php?error=sqlerror12");
		exit();
	    }
	 else 
	   {
		 mysqli_stmt_execute($stmt);
		 header ("Location: ../userhome.php");
	   }
?>
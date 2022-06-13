<?php 
session_start(); //we are starting the session to end it
session_unset();  //empties the session variable we have when we are logged in 
session_destroy();
//header ("Location: index.php"); 
header ("Location: index.php"); 
exit();
?>

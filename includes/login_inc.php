<?php 

if(isset($_POST['login_submit']))
{
	require "dbh_inc.php";
	
	$Username = $_POST['username'];
	$pwd = $_POST['pwd'];
	
	if(empty($Username)||empty($pwd))
	{ 
	header ("Location: ../index.php?error=emptyfields"); 
     exit() ;
	}
	else
	{
		$sqluser ="SELECT * FROM Utilisateurs where Login = ? ";
		
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt,$sqluser)) // checking if it didnt work
	    {
			
	    header ("Location: ../index.php?error=sqlerror1");
		exit();
	    }
	   
	   else 
	   {
		 mysqli_stmt_bind_param($stmt , "s" , $Username  );
		 mysqli_stmt_execute($stmt);
		 $result=mysqli_stmt_get_result($stmt);
		 if($row = mysqli_fetch_assoc($result))
		   {
			   $pwdcheck = password_verify($pwd , $row['Mdp']) ;  //checks if the input pwd == the pwd in the selected row
			   if($pwdcheck == false)
			   {
				header ("Location: ../index.php?error=wrongpwd"); 
				exit() ;
			   }
			   if($pwdcheck == true)
			   {
				session_start(); 
			    $_SESSION['username']=$row['Login'];  //dont store in $_SESSION sensitive info
				$_SESSION['nom']=$row['Nom'];
				$_SESSION['prenom']=$row['Prenom'];
			    $_SESSION['entry']="user";
				$_SESSION['id']=$row['Id'];
			    $_SESSION['biblioid']=$row['BiblioId'];
			    header ("Location: ../userhome.php"); 
				exit() ;
				
			   }
		    }
			else 
			{
				$sqladmin ="SELECT * FROM Administrateurs where Login = ? and Mdp = ?";
				$stmt = mysqli_stmt_init($conn);
				if(!mysqli_stmt_prepare($stmt,$sqladmin)) // checking if it didnt work
				{
					
				header ("Location: ../index.php?error=sqlerror77");
				exit();
				} 
				else 
			   {
				 mysqli_stmt_bind_param($stmt , "ss" , $Username , $pwd );
				 mysqli_stmt_execute($stmt);
				 $result=mysqli_stmt_get_result($stmt);
				 if(mysqli_num_rows($result)==1)
				   {
					   $row = mysqli_fetch_assoc($result);
					  session_start(); 
					$_SESSION['username']=$row['Login'];  //dont store in $_SESSION sensitive info
					$_SESSION['nom']=$row['Nom'];
					$_SESSION['prenom']=$row['Prenom'];
					$_SESSION['entry']="admin";
					$_SESSION['id']=$row['Id'];
					$_SESSION['adminchef']="no";
					if($row['AdminChefId']==null) 
					{$_SESSION['adminchef']="yes"; }
					
					  header ("Location: ../admin.php"); 
					exit() ;
				   }
					else 
					{
						header ("Location: ../index.php?error=NoUserNoAdmin"); 
						exit() ;
					}
			}
			
		}
	 }
}
}
else{ header ("Location: ../index.php"); 
      exit() ;
}
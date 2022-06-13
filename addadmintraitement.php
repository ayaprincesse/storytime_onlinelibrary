<?php 

if(isset($_POST['ajouteradmin']))
{
		require "includes/dbh_inc.php";
		
		
		$email = $_POST['Email'];
		$telep = $_POST['Tel'];
		$username = $_POST['Login'];
		$pwd = $_POST['Mdp'];
		$nom = $_POST['Nom'];
		$prenom = $_POST['Prenom'];
	    
		if (empty($username)||empty($email)||empty($pwd) || empty($nom) || empty($prenom) )
		{
			header ("Location: addadmin.php?error=emptyfields&Login=".$username."&Mail=".$email."&Nom=".$nom."&Prenom=".$prenom."");
			exit();
		}
		
		else if(!preg_match("/^[A-Za-z0-9]+$/",$username))
		{ 
		   header ("Location: addadmin.php?error=invalidLogin&Nom=".$nom."&Prenom=".$prenom."&Mail=".$email."");
			exit();
		}
		
		else if(!preg_match("/^[0-9]+$/",$telep))
		{ 
		   header ("Location: addadmin.php?error=invalidTel&Login=".$username."&Nom=".$nom."&Prenom=".$prenom."&Mail=".$email."");
			exit();
		}
		
		else if(!filter_var($email,FILTER_VALIDATE_EMAIL))
		{ 
		   header ("Location: addadmin.php?error=invalidMail&Login=".$username."&Nom=".$nom."&Prenom=".$prenom."");
			exit();
		}
			
			
	 else {
			
		  $sql = "SELECT Login from Administrateurs Where Login='username' or Email='$email' or Tel='$telep'";
		  $stmt = mysqli_stmt_init($conn); //init stants for initilise to tie the stmt to our db
		  if(!mysqli_stmt_prepare($stmt,$sql)) // checking if it worked 
		  {
			header ("Location: addadmin.php?error=sqlerror30");
			exit();
		   }
		   else 
		 {
			  mysqli_stmt_execute($stmt);
			  mysqli_stmt_store_result($stmt);//storing the result in variable stmt
			  $resultcheck = mysqli_stmt_num_rows($stmt);
		
				if($resultcheck>0)
				{
				 header ("Location: addadmin.php?error=admintaken&Nom=".$nom."&Prenom=".$prenom."");
				 exit();
				}
				 else
			   {$chef=1;
				 $sql3 ="INSERT INTO Administrateurs (nom,prenom,email,tel,login,mdp,adminchefid) values('$nom','$prenom','$email','$telep','$username','$pwd',$chef)";
						$stmt = mysqli_stmt_init($conn); //init stants for initilise to tie the stmt to our db
						 if(!mysqli_stmt_prepare($stmt,$sql3)) // checking if it didnt work
						 {
						 header ("Location: addadmin.php?error=sqlerror4");
						 exit();
						  }
						 else 
						  {  
					         
							 mysqli_stmt_execute($stmt);
					         header ("Location: addadmin.php?adminsignup=success");
				             exit();
						  }
						  
					
				  }
			   }
		 }
	 

		mysqli_stmt_close($stmt);
		mysqli_close($conn);
}  
    
else { header ("Location:  addadmin.php"); }
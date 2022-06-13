<?php 

if(isset($_POST['signup_submit']))
{
		require "dbh_inc.php";
		
		
		$email = $_POST['Mail'];
		$telep = $_POST['Tel'];
		$username = $_POST['Login'];
		$pwd = $_POST['pwd'];
		$confirm = $_POST['confirm'];
		$nom = $_POST['Nom'];
		$prenom = $_POST['Prenom'];
	    
		if (empty($username)||empty($email)||empty($pwd)||empty($confirm) || empty($nom) || empty($prenom) )
		{
			header ("Location: ../signup.php?error=emptyfields&Login=".$username."&Mail=".$email."&Nom=".$nom."&Prenom=".$prenom."");
			exit();
		}
		
		else if(!preg_match("/^[A-Za-z0-9]+$/",$username))
		{ 
		   header ("Location: ../signup.php?error=invalidLogin&Nom=".$nom."&Prenom=".$prenom."&Mail=".$email."");
			exit();
		}
		
		else if(!preg_match("/^[0-9]+$/",$telep))
		{ 
		   header ("Location: ../signup.php?error=invalidTel&Login=".$username."&Nom=".$nom."&Prenom=".$prenom."&Mail=".$email."");
			exit();
		}
		
		else if(!filter_var($email,FILTER_VALIDATE_EMAIL))
		{ 
		   header ("Location: ../signup.php?error=invalidMail&Login=".$username."&Nom=".$nom."&Prenom=".$prenom."");
			exit();
		}
			
		else if($confirm!==$pwd)
		{ 
		   header ("Location: ../signup.php?error=passwordunmatch&Login=".$username."&Mail=".$email."&Nom=".$nom."&Prenom=".$prenom."");
			exit();
		}
			
	 else {
			
		  $sql = "SELECT Login from Utilisateurs Where Login=?";
		  $stmt = mysqli_stmt_init($conn); //init stants for initilise to tie the stmt to our db
		  if(!mysqli_stmt_prepare($stmt,$sql)) // checking if it worked 
		  {
			header ("Location: ../signup.php?error=sqlerror1");
			exit();
		   }
		   else 
		 {
			  mysqli_stmt_bind_param($stmt , "s" , $username );
			  mysqli_stmt_execute($stmt);
			  mysqli_stmt_store_result($stmt);//storing the result in variable stmt
			  $resultcheck = mysqli_stmt_num_rows($stmt);
		
				if($resultcheck>0)
				{
				 header ("Location: ../signup.php?error=usertaken&Mail=".$email."&Nom=".$nom."&Prenom=".$prenom."");
				 exit();
				}
				 else
			   {
				 $sql1 ="INSERT INTO Bibliotheque (Name) values('Mabibliothèque')";
				 $stmt = mysqli_stmt_init($conn); //init stants for initilise to tie the stmt to our db
				 if(!mysqli_stmt_prepare($stmt,$sql1)) // checking if it didnt work
				 {
				 header ("Location: ../signup.php?error=sqlerror2");
				 exit();
				  }
				 else 
				  { mysqli_stmt_execute($stmt);
					  
				    $sql2 ="SELECT id FROM bibliotheque ORDER BY Id DESC LIMIT 1";
				
				     $stmt = mysqli_stmt_init($conn); //init stants for initilise to tie the stmt to our db
				     if(!mysqli_stmt_prepare($stmt,$sql2)) // checking if it didnt work 
				    {
				     header ("Location: ../signup.php?error=sqlerror3");
				     exit();
				    }
				     else 
				    {
					$stmt->bind_result($id);
					$stmt->execute();
					while($stmt->fetch())
					{
					$value = $id;
					}
					 
						$sql3 ="INSERT INTO Utilisateurs (nom,prenom,email,tel,login,mdp,biblioid) values(?,?,?,?,?,?,?)";
						//example: INSERT INTO Utilisateurs (nom,prenom,email,tel,login,mdp,biblioid) values('user2','user2','user2@gmail.com','01234','user2','user2',2)
						$stmt = mysqli_stmt_init($conn); //init stants for initilise to tie the stmt to our db
						 if(!mysqli_stmt_prepare($stmt,$sql3)) // checking if it didnt work
						 {
						 header ("Location: ../signup.php?error=sqlerror4");
						 exit();
						  }
						 else 
						  {  
					        $hashedpwd = password_hash($pwd , PASSWORD_DEFAULT); //USE PASSWORD_DEFAULT(hashing method) since its always updated. do NOT use EMPTY5 or sha256
				             mysqli_stmt_bind_param($stmt , "sssssss" , $nom, $prenom , $email ,$telep , $username ,$hashedpwd ,$value);
					         mysqli_stmt_execute($stmt);
					         header ("Location: ../signup.php?signup=success");
				             exit();
						  }
						  
					}
				  }
			   }
		 }
	 }

		mysqli_stmt_close($stmt);
		mysqli_close($conn);
}  
    
else { header ("Location: ../signup.php"); }
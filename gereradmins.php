<?php

/*if(isset($_SESSION['login_submit'])){*/
require "includes/dbh_inc2.php" ;
require "adminheader.php" ;
?>

<html>
<head><link rel="stylesheet" href="styles/style4.css" ></head>
<body>
<div>
<?php

$req = "SELECT * FROM Administrateurs Where Adminchefid IS NOT NULL";
$result=mysqli_query($connexion,$req,); //executer une commande sql qui se trouve dans la var req
echo "<table border='1'  ><tr><th>Nom</th><th>Prenom</th><th>Email</th><th>Tel</th><th>Login</th><th>Mdp</th></tr>";
while ($row=mysqli_fetch_array($result)) //recuperer  la procedure sql $result et l'inserer dans un tableau nomé $row 
{
$id=$row['Id'];
echo "<tr>" ;
echo "<td>".$row['Nom']."</td>";
echo "<td>".$row['Prenom']."</td>";
echo "<td>".$row['Email']."</td>";
echo "<td>".$row['Tel']."</td>";
echo "<td>".$row['Login']."</td>";
echo "<td>".$row['Mdp']."</td>";
echo "<td>" 
?>
<a class="noback" href="supprimeradmin.php?Id=<?php echo $id ?>"> <img src="images/supprimer.png" /></a> 
<?php
echo ' </td> </tr>';
}

echo "</table>";
echo '</br> <a id="addadmin" href="addadmin.php" >Add new Admin</a>';
?>
</div>
</body>
</html> 
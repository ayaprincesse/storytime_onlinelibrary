<?php

/*if(isset($_SESSION['login_submit'])){*/
require "includes/dbh_inc2.php" ;
require "adminheader.php" ;
?>
<html>
<head><link rel="stylesheet" href="styles/adminstyle.css"/></head>
<?php
$req = "SELECT * FROM livre";
$result=mysqli_query($connexion,$req,); //executer une commande sql qui se trouve dans la var req
echo "<table align='center' >";
while ($row=mysqli_fetch_array($result)) //recuperer  la procedure sql $result et l'inserer dans un tableau nomé $row 
{
echo "<tr>" ;
echo "<td> <img src=".$row['Photo']." width='150' height='150'/> </td>";
echo "<td> Titre :".$row['Titre']."</td>";
echo "<td> Nom d'Auteur :".$row['NomAuteur']."</td>";
echo "<td> Genre :".$row['Genre']."</td>";
echo "<td>";
?>
   
    <a href="supprimer.php?Id=<?php echo $row['Id']?>" class="xbtn"><img src="images/supprimer.png" /></a> </td>
    <td><a href="edit.php?Id=<?php echo $row['Id']?>" class="xbtn"><img src="images/modifier.png" /></a> </td>

<?php
echo "</tr>";
}
echo "</table>";

?>
</html>
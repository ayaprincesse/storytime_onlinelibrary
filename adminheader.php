<?php

session_start();
?>

<html>
<head>
<link rel="stylesheet" href="styles/adminheaderstyle.css" >
</head>
<body>
<header>  

<nav >
<div id="headerdiv0">
<img src="images/xicon.png" width='50' height='50' class="headerspan" />
<p class="headerspan" id='pp'>StoryTime</p>
</div>
<div id="userheaderdiv" >
<a href="admin.php">Books</a>
<a href="ajouterLivre.php">Add Book</a>
<a href="edit2.php">Modify Account</a>
<a href="deconnexion.php">Log Out</a>

<?php 
if($_SESSION['adminchef']=="yes")
{
	echo '<a href="gereradmins.php">Manage Admins</a>';
}
?>
</div>
</nav>

</header>
</body>
</html> 
<?php 
session_start(); //so we can recognise the session variable in this page too
?>

<!doctype html>
<html>
<head>
<link rel="stylesheet" href="styles/headerstyle.css" >
</head>
<body>

<header>  

<nav >
<div id="headerdiv0">
<img src="images/xicon.png" width='50' height='50' class="headerspan" />
<p class="headerspan" id="ppp">StoryTime</p>
</div>

<?php 
if(isset( $_SESSION['entry']) && $_SESSION['entry']=="user")
{
echo 
'
<div id="userheaderdiv" >
<a href="userhome.php" class="headerspan" > Acceuil </a>
<a href="userbiblio.php" class="headerspan"> Ma Bibliotheque </a>
<form action="includes/logout_inc.php" method="post" class="headerspan">
<button class="logout" type="submit" name="logout_submit" class="headerspan" >LOGOUT</button>
</form>
</div >
';
}
else
{
echo 
'
<div id="headerdiv" >
<a href="index.php" class="headerspan"> Acceuil </a>
<form action="includes/login_inc.php" method="post" class="headerspan">
<input  type="text" name="username" placeholder="Username" class="headerspan" class="input">
<input type="password" name="pwd" placeholder="Password" class="headerspan"  class="input">
<input class="btn" type="submit" name="login_submit" value="LOGIN" class="headerspan"  class="btn" >
</form>



<a href="signup.php" id ="a"  class="headerspan">SignUp</a>
</div>
'
;
}

?>






</nav>

</header>

</body>
</html>
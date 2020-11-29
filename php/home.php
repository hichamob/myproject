<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylehome.css">
    <title>Free domaine</title>
</head>
<body lass="loggedin">
     <nav class="navtop">
			<div>
			  <h1>Freedomaine</h1>
              <a href="home.php">Home</a>
              <a href="domaine.html">Domaine</a>
              <a href="about.html">About me</a>
              <a href="contact.html">Contact us</a>
              <a href="lougout.php">Login out</a>
            </div>
      </nav>
    <div class="content">
			<h2>Home Page</h2>
			<p>Welcome back, <?=$_SESSION['name']?>!</p>
    </div>
</body>
</html>
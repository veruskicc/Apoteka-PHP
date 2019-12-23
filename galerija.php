<?php
    session_start();
    if(!isset($_SESSION['em'])){
        header('Location: index.html');
    }
?>

<?php
    error_reporting( E_ALL & ~E_NOTICE ^ E_DEPRECATED );
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="sajt.css" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Advent Pro' rel='stylesheet'>
</head>
<body style="background-color: turquoise">
<div class="prvi">
<h1 class="naslov">Apoteka "Lek"</h1>
</div>
<div>
<ul>
<li><a href="pocetna.php">Početna strana</a></li>
<li><a href="lekovi.php">Lekovi</a></li>
<li><a href="galerija.php">Galerija</a></li>
<li><a href="recenzije.php">Recenzije</a></li>
<li><a href="kupovina.php">Kupovina</a></li>
<li style="float:right;margin-right:90px;" class="padajucimeni"><a href="profil.php"><?php echo $_SESSION['em'] ?></a>
<ul class="padajucimenisadrzaj">
	<li><a href="profil.php">Profil</a></li>
	<li><a href="logout.php">Odjavi se</a></li>
</ul>
</li>
</ul>
</div>
<br>
<br>
<br>
<br>
<div>
	<h2 class="naslov1" style="margin-top: -75px;">Ovde možete dodati fotografije lekova kako bi obogatili našu galeriju!</h2>
	<br>
	<center>
	<form action="slike.php" method="post" enctype="multipart/form-data" class="forma">
		<input type="file" name="fajl">
		<button type="submit" name="upload">Dodajte fotografiju</button>
	</form>
</center>
</div>
<br>
<br>
<div>
<?php 
require('konekcija.php');
$upit=mysqli_query($konekcija,"SELECT * FROM slike_lekova");
while($podaci=mysqli_fetch_array($upit)){
	echo "<img src='".$podaci['Path']."'class='galerija1'>";
}
?>
</div>
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
<body class="pozadina">
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
<div>
<?php
require('konekcija.php');
$upit1="SELECT * FROM korisnici WHERE Email='".$_SESSION['em']."'";
$rez1=mysqli_query($konekcija,$upit1);
$podaci=mysqli_fetch_array($rez1);
$email=$podaci['Email'];
$ime=$podaci['Ime'];
$prezime=$podaci['Prezime'];
echo "<br><br><ol class='paragraf1'>Vaši podaci:<br><br> <li>Email: $email</li><br><li>Ime: $ime</li><br><li>Prezime: $prezime</li></ol>";
?>
<br>
<br>
<form autocomplete="on" class="forma" style="margin-left: 40px" name="forma" method="post" action="update.php">
<p class="paragraf1">Password: <input type="password" name="pass"></p>
<button type="submit" name="promenilozinku">Promeni lozinku</button>
</form>
</div>
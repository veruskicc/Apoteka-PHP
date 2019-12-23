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
<div>
	<br>
	<br>
	<br>
	<br>
		<a href="lekovi.php">Vrati se nazad</a>
	<br>
	<br>
<?php
require('konekcija.php');
if(isset($_POST['pretraga'])){
$pretraga=$_POST['search'];
$upit1="SELECT lekovi.Naziv,lekovi.Cena FROM lekovi WHERE lekovi.Naziv LIKE'%$pretraga%'"; 
$rez1=mysqli_query($konekcija,$upit1);
echo "<table border='1' style='width:100%;font-size:15px;font-weight:bold;'>";
echo "<thead><tr style='background-color:darkturquoise'><th>Naziv</th><th>Cena(din.)</th></thead><tbody style='background-color:lightblue'>";
if(mysqli_num_rows($rez1)>0){
	while($podaci=mysqli_fetch_array($rez1)){
	$naziv=$podaci['Naziv'];
	$cena=$podaci['Cena'];
	echo "<tr><td>$naziv</td><td style='text-align:center'>$cena</td>";}
}
else {
	echo "<p class='paragraf1'>Nema rezultata</p>";
}
}
?>
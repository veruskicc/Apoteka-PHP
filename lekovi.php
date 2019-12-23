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
	<form method="post" class="forma"  action="pretraga.php">
		<p class="paragraf1">Pretražite bazu lekova: <input type="text" name="search" placeholder="Unesite naziv leka"><input type="submit" name="pretraga" value="Pretraga">
		</form>
	<br>
<?php
require('konekcija.php');
$upit="SELECT vrste_lekova.Vrsta,lekovi.Naziv,lekovi.Cena FROM vrste_lekova INNER JOIN lekovi ON vrste_lekova.sifra=lekovi.SifraVrste ORDER BY vrste_lekova.Vrsta";
$rez=mysqli_query($konekcija,$upit);
echo "<table border='1' style='width:100%;font-size:15px;font-weight:bold;'>";
echo "<thead><tr style='background-color:darkturquoise'><th>Vrsta</th><th>Naziv</th><th>Cena(din.)</th></thead><tbody style='background-color:lightblue'>";
while($podaci=mysqli_fetch_array($rez)){
	$vrsta=$podaci['Vrsta'];
	$naziv=$podaci['Naziv'];
	$cena=$podaci['Cena'];
	echo "<tr></td><td>$vrsta</td><td>$naziv</td><td style='text-align:center'>$cena</td>";
}
echo "</tbody></table>";
?>

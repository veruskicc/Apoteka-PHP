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
<br>
<br>
<div>
	<?php
require('konekcija.php');
$upit="SELECT vrste_lekova.Vrsta,lekovi.Naziv,lekovi.Cena FROM vrste_lekova INNER JOIN lekovi ON vrste_lekova.sifra=lekovi.SifraVrste ORDER BY vrste_lekova.Vrsta";
$rez=mysqli_query($konekcija,$upit);
 ?>	
	<form action="kupi.php" method="post">
		<p class="paragraf1">Izaberite lek</p>
		<select name="selekt">
		<?php
		while($lek=mysqli_fetch_array($rez)){
			echo "<option value='".$lek['Naziv']."'>".$lek['Naziv']."</option>";
		} 
		?>
	</select>
	<input type="submit" name="kupi" value="Kupi">
	</form>

</div></body></html>

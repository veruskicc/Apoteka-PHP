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
		<?php
			require('konekcija.php'); 
			$upit="SELECT korisnici.Ime, korisnici.Prezime, recenzije.Komentar FROM korisnici INNER JOIN recenzije ON korisnici.Email=recenzije.Korisnik";
			$rez=mysqli_query($konekcija,$upit);
			while($podaci=mysqli_fetch_array($rez)){
				$ime=$podaci['Ime'];
				$prezime=$podaci['Prezime'];
				$komentar=$podaci['Komentar'];
				echo "<br><br><ol class='paragraf1'>Recenzije drugih korisnika:<br><br> <li>Ime i prezime: $ime $prezime</li><br><li>Recenzija: $komentar</li></ol>";
			}
		?>
		<br>
		<br>
	<form  method="post" class="forma" action="recenzije.php">
	<p class="paragraf1">Ostavite i Vi vašu recenziju naše apoteke:<br> <textarea name="koment" rows="10" cols="50"></textarea><br>
	<input type="submit" name="podeli" value="Podeli"></p>
	</form>
	<?php
	require('konekcija.php');
	if(isset($_POST['podeli'])){
	$korisnik=$_SESSION['em'];
	$komentar=$_POST['koment'];
	$upit1="INSERT INTO recenzije(Korisnik,Komentar) VALUES('".$korisnik."','".$komentar."')";
	$rez1=mysqli_query($konekcija,$upit1);
	if($rez1){
		echo "<script>alert('Uspesno ste dodali recenziju!')</script>";
		header('Location: recenzije.php');
	}else{
		echo mysqli_error($konekcija);
		echo "<script>alert('Nespesno')</script>";}}
	?>
	<form method="post" action="delete.php">
	<input type="submit" name="obrisi" value="Obrisite vasu recenziju">
</form>
</div>
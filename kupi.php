	<?php
    session_start();
    if(!isset($_SESSION['em'])){
        header('Location: index.html');
    }
?>

	<?php
	require('konekcija.php');
	if(isset($_POST['kupi'])){
		$korisnik=$_SESSION['em'];
		$lek=$_POST['selekt'];
		$sifra="SELECT Sifra FROM lekovi WHERE Naziv='".$lek."'";
		$rez1=mysqli_query($konekcija,$sifra);
		$rezultat="";
		while($nesto=mysqli_fetch_array($rez1)){
				$rezultat=$nesto['Sifra'];
		}
			

		$upit="INSERT INTO kupovina(Korisnik,SifraLeka) VALUES('".$korisnik."','".$rezultat."')" ;
		$rez=mysqli_query($konekcija,$upit);
		if($rez){
			echo "<script>alert('Uspesna kupovina!');window.location.assign('kupovina.php')</script>";
		}
		else{
			mysqli_error($konekcija);
		}
	}else{ echo "<script>alert('Nije')</script>";}
	?>
<?php
    session_start();
    if(!isset($_SESSION['em'])){
        header('Location: index.html');
    }
?>
<?php
require('konekcija.php');
if(isset($_POST['obrisi'])){
	$upit="DELETE FROM recenzije WHERE Korisnik='".$_SESSION['em']."'"; 
	$rez=mysqli_query($konekcija,$upit);
	if($rez){
		echo "<script>alert('Uspesno ste obrisali vasu recenziju!')</script>";
		echo "<script>window.location.assign('recenzije.php')</script>";
	}
	else{
		mysqli_error($konekcija);
		echo "<script>alert('Neuspesno')</script>";
	}
}

?>
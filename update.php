<?php
    session_start();
    if(!isset($_SESSION['em'])){
        header('Location: index.html');
    }
?>
<?php
		require('konekcija.php');
		if(isset($_POST['promenilozinku'])){
		$novalozinka=$_POST['pass'];
		$duzinapass=strlen($novalozinka);

		$passwordGreska = "";

 		if(empty($novalozinka) || $novalozinka == ""){
 				$passwordGreska = "Polje ne moze biti prazno!";
 				echo "<script>
				alert('Greska: $passwordGreska');
				window.location.assign('profil.php');
				</script>";}
 					
 			if($duzinapass<8){
 			$passwordGreska="Lozinka mora imati minimalno 8 karaktera!";
 			echo "<script>
 			alert('Greska: $passwordGreska');
 			window.location.assign('profil.php');
 			</script>";
 		}

if(empty($passwordGreska)){
$upit4="UPDATE korisnici SET Password=$novalozinka  WHERE Email='".$_SESSION['em']."'";
$rez4=mysqli_query($konekcija,$upit4);
if($rez4){
	echo "<script>alert('Uspesno ste azurirali Vasu lozinku!')</script>";
	echo "<script>window.location.assign('profil.php')</script>";
}
else{
	echo "<script>alert('Nije uspelo azuriranje!')";
}
}
}

?>
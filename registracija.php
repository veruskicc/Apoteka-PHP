<?php
	session_start();
?>

<?php
    error_reporting( E_ALL & ~E_NOTICE ^ E_DEPRECATED );
?>

<?php
	if(isset($_POST['dugme'])){
		$ime = $_POST['ime'];
		$prezime=$_POST['prezime'];
		$email = $_POST['mejl'];
		$password = $_POST['pass'];
		$password2 = $_POST['pass2'];
		$duzinapass=strlen($password);

		$imeGreska = "";
		$emailGreska = "";
		$passwordGreska = "";

		if(empty($ime) || $ime == "" || empty($prezime) || $prezime==""){
				$imeGreska = "Polje ne moze biti prazno!";
				echo "<script>
				alert('Greska: $imeGreska');
				window.location.assign('index.html');
				</script>"; 
 		} else {
 			if (!preg_match("/^[a-zA-Z ]*$/",$ime) || !preg_match("/^[a-zA-Z ]*$/",$prezime)) {
      			$imeGreska = "Dozvoljena su samo slova i razmaci!";
      			echo "<script>
				alert('Greska: $imeGreska');
				window.location.assign('index.html');
				</script>";
    		}
 		}

 		if(empty($email) || $email == ""){
 				$emailGreska = "Polje ne moze biti prazno!";
 				echo "<script>
				alert('Greska: $emailGreska');
				window.location.assign('index.html');
				</script>";
 		} else {
 			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      			$emailGreska = "Pogresan format email-a!";
      			echo "<script>
				alert('Greska: $emailGreska');
				window.location.assign('index.html');
				</script>";
    		}
 		}

 		if(empty($password) || $password == "" || empty($password2)||$password2==""){
 				$passwordGreska = "Polje ne moze biti prazno!";
 				echo "<script>
				alert('Greska: $passwordGreska');
				window.location.assign('index.html');
				</script>";
 		}
 		 if($password!==$password2){
 			$passwordGreska="Lozinke se ne poklapaju!";
 			echo "<script>
 			alert('Greska: $passwordGreska');
 			window.location.assign('index.html');
 			</script>";
 		}
 		if($duzinapass<8){
 			$passwordGreska="Lozinka mora imati minimalno 8 karaktera!";
 			echo "<script>
 			alert('Greska: $passwordGreska');
 			window.location.assign('index.html');
 			</script>";
 		}


 		if(empty($imeGreska) && empty($emailGreska) && empty($passwordGreska)){
 			require('konekcija.php');
					
					$x = mysqli_query($konekcija,"INSERT INTO korisnici(Email, Ime, Prezime, Password) VALUES('".$email."', '".$ime."','".$prezime."', '".$password."')");
					if($x){
					      $_SESSION['em'] = $email;
					      header('Location: pocetna.php');
						}
					}
				 else {
					echo '<div>
	  				          <strong>Greska:</strong> Nije moguce izabrati bazu.
					      </div>';
					  }
					}
					      else {
								echo '<div>
	  				      		<strong>Greska:</strong> Nije moguce povezati se na bazu.
					  			</div>';
								}
?>
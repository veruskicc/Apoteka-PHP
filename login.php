<?php
	session_start();
?>

<?php
    error_reporting( E_ALL & ~E_NOTICE ^ E_DEPRECATED );
?>

<?php

  if(isset($_POST['dugme'])){
      $email = $_POST['mejl'];
      $password = $_POST['pass'];

      require('konekcija.php');

      $sql = "SELECT * FROM korisnici WHERE Email='".$email."' AND Password='".$password."'";
      if(mysqli_connect($host, $server_username, $server_pass, $baza)){
              $x = mysqli_query($konekcija,$sql);
              if(mysqli_num_rows($x) == 1){

                  $_SESSION['em'] = $email;
                  header('Location: pocetna.php');
              } 
              else {
                  echo "<script>
				alert('Nema poklapanja!');
				window.location.assign('index.html');
				</script>";
              }
          }
      } else {
          echo "<script>
				alert('Nije moguce povezati se na server.');
				window.location.assign('index.html');
				</script>";
      }

?>
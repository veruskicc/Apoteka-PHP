<?php
$host = "localhost";
$server_username = "root";
$server_pass = "";
$baza = "apoteka";
$konekcija = mysqli_connect($host, $server_username, $server_pass, $baza);

if (!$konekcija) {
    die("Konekcija neuspesna: " . mysqli_connect_error());
}

?>
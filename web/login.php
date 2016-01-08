<?php
session_start();
error_reporting(0); 
include "main.php"; 
$nev = $_SESSION["nev"];
$jelszo = $_SESSION["jelszo"];

$query = mysqli_query($kapcsolat, "SELECT * FROM felhasznalok WHERE nev ='$nev'");
$adat = mysqli_fetch_assoc($query);
$letezik_nev = $adat["nev"];
$letezik_jelszo = $adat["jelszo"];
$email = $adat["email"];

//ha nincs ilyen felhasználó akkor hibaüzenet.
if($letezik_nev == ""){
	   print "<script language='javascript'>alert('Rossz felhasznalonev vagy jelszo!');</script>";
       print '<meta http-equiv="refresh" content="0; URL=bejelentkezes.php">';
      
}else{
    //különben beléphet és a jogosultságához megfelelõ menüpontokat fogja látni
	if($nev == $letezik_nev AND $jelszo == $letezik_jelszo){
		$_SESSION["nev"] = $nev;
        $_SESSION["email"] = $email;
		//header('Location: felhasznalo.php');
	}else{
	   print "<script language='javascript'>alert('Rossz felhasznalonev vagy jelszo!');</script>";
       print '<meta http-equiv="refresh" content="0; URL=bejelentkezes.php">';
      
	}
}


?>
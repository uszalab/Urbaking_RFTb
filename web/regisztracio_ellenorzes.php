<?php 
session_start();

include "main.php"; 

$query = mysqli_query($kapcsolat, "SELECT * FROM felhasznalok");
$adat = mysqli_fetch_assoc($query);

$nev = $_SESSION["nev"];
$jelszo1 = $_SESSION["jelszo1"];
$jelszo2 = $_SESSION["jelszo2"];
$email = $_SESSION["email"];
$telefon = $_SESSION["telefon"];

//email hitelesítése
$szetszed = explode("@", $email);
$valos_email = $szetszed[1];

$query1 = mysqli_query($kapcsolat, "SELECT * FROM felhasznalok WHERE nev='$nev'");
$adat1 = mysqli_fetch_assoc($query1);
$query2 = mysqli_query($kapcsolat, "SELECT * FROM felhasznalok WHERE email='$email'");
$adat2 = mysqli_fetch_assoc($query2);
$query3 = mysqli_query($kapcsolat, "SELECT * FROM felhasznalok WHERE telefon='$telefon'");
$adat3 = mysqli_fetch_assoc($query3);

$letezik_email = $adat2["email"];
$letezik_nev = $adat1["nev"];
$letezik_telefon = $adat3["telefon"];

//ha a felhasználónév, email és jelszó megfelel akkor sikerült a regisztráció
if($nev == ""){
    print "<script language='javascript'>alert('A név nem lehet üres');</script>";
    print '<meta http-equiv="refresh" content="0; URL=regisztracio.php">';

}else{
	if($jelszo1 == ""){
       print "<script language='javascript'>alert('A jelszó nem lehet üres');</script>";
       print '<meta http-equiv="refresh" content="0; URL=regisztracio.php">';
	}else{
		if($jelszo2 == ""){
			print  "<script language='javascript'>alert('A jelszó nem lehet üres');</script>";
            print '<meta http-equiv="refresh" content="0; URL=regisztracio.php">';
		}else{
			if($email == ""){
				 print "<script language='javascript'>alert('Az email nem lehet üres');</script>";
                 print '<meta http-equiv="refresh" content="0; URL=regisztracio.php">';
			}else{
				if($jelszo1 !== $jelszo2){
					 print "<script language='javascript'>alert('A két jelszó nem egyezik');</script>";
                     print '<meta http-equiv="refresh" content="0; URL=regisztracio.php">';
				}else{
					if($valos_email == ""){
						print "<script language='javascript'>alert('Érvénytelen e-mail!');</script>";
                        print '<meta http-equiv="refresh" content="0; URL=regisztracio.php">';
					}else{
						if($letezik_nev == ""){
							if($letezik_email == ""){
								
								mysqli_query($kapcsolat, "INSERT INTO felhasznalok (nev, password, email, telefon)
									VALUES ('$nev', '$jelszo1', '$email', '$telefon')");
								print "<script language='javascript'>alert('Mostmar be tud jelentkezni!');</script>";
								header('Location: bejelentkezes.php');
                                
								
							}else{
								print "<script language='javascript'>alert('Ez az e-mail cim már hasznalatban van vagy hibas a megadott ellenorzo kod!');</script>";
                                print '<meta http-equiv="refresh" content="0; URL=regisztracio.php">';
							}
						}else{
                            print "<script language='javascript'>alert('Ez a felhasználónév már foglalt!');</script>";
                            print '<meta http-equiv="refresh" content="0; URL=regisztracio.php">';
						}
					}
				}
			}
		}
	}
}
?>
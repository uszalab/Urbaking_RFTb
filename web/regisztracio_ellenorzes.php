<?php 
session_start();

include "main.php"; 

// Mindenek előtt: jó a captcha?
if (!(strtolower($_POST["captcha_code"]) == $_SESSION["captcha"]))
   {
// Képkód kiiktatva, debug célból
//die ("<h2>Hiba</h2><br>Hibás képkód!<br><br>Copyright &copy; 2015, Rft B csoport");
}

// Adatok beolvasása
$nev = $_POST["nev"];
$jelszo1 = $_POST["jelszo1"];
$jelszo2 = $_POST["jelszo2"];
$email = $_POST["email"];
$telefon = $_POST["telefon"];

//email hitelesítése (így insecure, de ígymarad)
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
if($nev == "")
{
die ("<h2>Hiba</h2><br>A név nem lehet üres!<br><br>Copyright &copy; 2015, Rft B csoport");
}
		if(($jelszo2 == "") || ($jelszo1 = ""))
{
die ("<h2>Hiba</h2><br>A jelszó nem lehet üres!<br><br>Copyright &copy; 2015, Rft B csoport");
		}

			if($email == "")
{
die ("<h2>Hiba</h2><br>Az email nem lehet üres!<br><br>Copyright &copy; 2015, Rft B csoport");
			}

if ( $jelszo1 != $jelszo2 )
{
die ("<h2>Hiba</h2><br>A két jelszónak egyeznie kell!<br><br>Copyright &copy; 2015, Rft B csoport");
				}

					if($valos_email == ""){
die ("<h2>Hiba</h2><br>Valós e-mail címet lehet csak beírni!<br><br>Copyright &copy; 2015, Rft B csoport");
					}

						if($letezik_nev == ""){
mysqli_query($kapcsolat, "INSERT INTO felhasznalok (id, nev, jelszo, email, telefon) VALUES ('', '$nev', '$jelszo1', '$email', '$telefon')");
								print "<script language='javascript'>alert('Mostmar be tud jelentkezni!');</script>";
                          
						}else{
                            print "<script language='javascript'>alert('Ez a felhasználónév már foglalt!');</script>";
                            print '<meta http-equiv="refresh" content="0; URL=regisztracio.php">';
						}
?>
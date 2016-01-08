<?php
session_start();
include "main.php";

// loginolva van? Mert akkor nem csinálunk semmit....
if (bejelentkezve())
{
header ("Location: index.php");
}

// olvasás
$nev = $_POST["nev"];
$jelszo = $_POST["jelszo"];

// Jó a képkód? 
  if (strtolower($_POST["captcha_code"]) == $_SESSION["captcha"])
   {
// Debug idejére megszüntetve
//die ("<h2>Hiba</h2><br>Hibás a képkód!<br><br>Copyright &copy; 2015, Rft B csoport");
       }

// Van ilyen felhasználó?
$lekerdezes ="SELECT id FROM felhasznalok WHERE nev ='$nev' AND jelszo ='$jelszo';";
$keres =mysqli_query($kapcsolat, $lekerdezes);
$eredmeny =mysqli_num_rows($keres);
if ($eredmeny ==0)
{
die ("<h2>Hiba</h2><br>Nincs ilyen felhasználói név, és / jelszó!<br><br>Copyright &copy; 2015, Rft B csoport");
}
// menjünk azért biztosra
else if ($eredmeny >0)
{
// Beléptetjük
$_SESSION["nev"] =$nev;
// Átdobjuk a fõoldalra
header ("Location: index.php");
}

?>
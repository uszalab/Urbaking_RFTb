<?php
session_start();
include "main.php";

// loginolva van? Mert akkor nem csin�lunk semmit....
if (bejelentkezve())
{
header ("Location: index.php");
}

// olvas�s
$nev = $_POST["nev"];
$jelszo = $_POST["jelszo"];

// J� a k�pk�d? 
  if (strtolower($_POST["captcha_code"]) == $_SESSION["captcha"])
   {
// Debug idej�re megsz�ntetve
//die ("<h2>Hiba</h2><br>Hib�s a k�pk�d!<br><br>Copyright &copy; 2015, Rft B csoport");
       }

// Van ilyen felhaszn�l�?
$lekerdezes ="SELECT id FROM felhasznalok WHERE nev ='$nev' AND jelszo ='$jelszo';";
$keres =mysqli_query($kapcsolat, $lekerdezes);
$eredmeny =mysqli_num_rows($keres);
if ($eredmeny ==0)
{
die ("<h2>Hiba</h2><br>Nincs ilyen felhaszn�l�i n�v, �s / jelsz�!<br><br>Copyright &copy; 2015, Rft B csoport");
}
// menj�nk az�rt biztosra
else if ($eredmeny >0)
{
// Bel�ptetj�k
$_SESSION["nev"] =$nev;
// �tdobjuk a f�oldalra
header ("Location: index.php");
}

?>
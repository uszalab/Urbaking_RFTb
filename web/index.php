<?php
// RFT beadand�
// Alper061
// INdex, f�oldal

// A f� f�jl, ami kezeli az adatb�zist, meg a men�t
include "main.php";

print "<h2>F�oldal</h2><br>";

if (bejelentkezve())
{
$nev =$_SESSION["nev"];
print "�dv�z�llek a webshop-ban, $nev!<br>V�lassz a men�pontok k�z�l!<br><br>Sikeres v�s�rl�st k�v�nunk!";
}
else
{
print "Kedves l�togat�! Az oldal regisztr�ci�k�teles, ez�rt k�rlek kattints a regisztr�ci�ra, �s regisztr�lj. Ezek ut�n bejelentkezve (bejelentkez�s men�pont) megkezdheted a v�s�rl�st!";
}

// A v�g�n bez�rjuk a kapcsolatot
mysqli_close($kapcsolat);

// Copyright
print "<br><br>Copyright &copy; 2015, Rft B csoport";
?>
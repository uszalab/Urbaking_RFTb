<?php
// RFT beadandó
// Alper061
// INdex, főoldal
error_reporting(0);
// A fő fájl, ami kezeli az adatbázist, meg a menüt
include "main.php";
include "bootstrap.php";
echo '
<html>
<head>
	<meta charset="UTF-8">
	<title>Belepes</title>
    <link rel="stylesheet" type="text/css" href="kinezet.css"/>
</head>';
print "<h2>Főoldal</h2><br>";

if (bejelentkezve())
{
$nev =$_SESSION["nev"];
print "Üdvözöllek a webshop-ban, $nev!<br>Válassz a menüpontok közül!<br><br>Sikeres vásárlást kívánunk!";
}
else
{
print "Kedves látogató! Az oldal regisztrációköteles, ezért kérlek kattints a regisztrációra, és regisztrálj. Ezek után bejelentkezve (bejelentkezés menüpont) megkezdheted a vásárlást!";
}

// A végén bezárjuk a kapcsolatot
mysqli_close($kapcsolat);

// Copyright
print "<br><br>Copyright &copy; 2015, Rft B csoport";
?>

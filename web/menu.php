<a href="index.php">Fõoldal</a><br>
<?php
if (bejelentkezve())
{
?>
<a href="termekek.php">Termékek, vásárlás</a><br>
<a href="vasarlasok.php">Vásárlások, rendelések</a><br>
<a href="felhasznalokezelo.php">Felhasználó kezelõ</a><br>
<a href="kilepes.php">Kijelentkezés</a><br>
<?php
}
else
{
?>
<a href="regisztracio.php">Regisztráció</a><br>
<a href="bejelentkezes.php">Bejelentkezés</a><br>
<?php
}
?>
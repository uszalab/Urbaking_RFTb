<a href="index.php">F�oldal</a><br>
<?php
if (bejelentkezve())
{
?>
<a href="termekek.php">Term�kek, v�s�rl�s</a><br>
<a href="vasarlasok.php">V�s�rl�sok, rendel�sek</a><br>
<a href="felhasznalokezelo.php">Felhaszn�l� kezel�</a><br>
<a href="kilepes.php">Kijelentkez�s</a><br>
<?php
}
else
{
?>
<a href="regisztracio.php">Regisztr�ci�</a><br>
<a href="bejelentkezes.php">Bejelentkez�s</a><br>
<?php
}
?>
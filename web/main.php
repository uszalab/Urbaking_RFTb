<?php
// RFT beadand�
// Alper061

// Konfig beh�v�sa
include "config.php";
// Db kapcsolat fel�p�t�se
$kapcsolat =mysqli_connect($sqlhost, $sqluser, $sqlpass, $sqldb);
// Siker?
if (mysqli_connect_errno($kapcsolat))
{
// Ha nem
   echo "Hiba a kapcsol�d�skor: " . mysqli_connect_error();
}

// J�het az oldal tetej�re a men�
include "menu.php";

?>

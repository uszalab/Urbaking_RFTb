<?php
session_start();
// Null�zzuk, t�r�lj�k a sessiont
session_unset();
session_destroy();
// Ir�ny a f�oldal
header("Location: index.php");
?>
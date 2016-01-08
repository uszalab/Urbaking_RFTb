<?php
session_start();
function bejelentkezve()
{
return isset($_SESSION["nev"]);
}

?>
<?php
//error_reporting(0); 
session_start();

//ha nincs bejelentkezve senki akkor a bejelentkezés.php-ra irányít
if($_SESSION['nev'] == "")
{
 header('location: bejelentkezes.php');
}

require_once "db.php"; 
$dbname="nimrod"; 
$con=connect("root","");
mysqli_select_db($con, "$dbname");

//egy random számot generálok a kép neve elé, az egyezés elkerülése végett
//és berakom a képek az images könyvtárba
//ha nincs megadva kép akkor a Default.jpg lesz a képe
$egyedi_kepnev=trim($_FILES['fenykep']['name']);
if($egyedi_kepnev != "")
{
     $egyedi_kepnev="images/".rand()."_".$egyedi_kepnev;
     move_uploaded_file($_FILES['fenykep']['tmp_name'],$egyedi_kepnev);
}
else
{
    $egyedi_kepnev="images/Default.jpg"; 
}
//beszúrom a megadott adatokat az adatbázisba, és a felvivő nevét

?>
